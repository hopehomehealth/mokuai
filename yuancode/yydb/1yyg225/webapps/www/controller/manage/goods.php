<?php

/**
 * Name 产品管理
 * Class product_adm
 */

class goods extends Lowxp{

    function __construct(){
        #按钮
        $this->btnMenu = array(
            0=>array('url'=>'#!goods/index','name'=>'商品管理'),
            1=>array('url'=>'#!goods/add','name'=>'添加商品'),
        );

        parent::__construct();
        $this->load->model('goodscat');
        $this->load->model('brand');
    }

    /**
     * IndexAction
     */
    function index($page=1){
        #检索
        foreach(array('name') as $v){
            if(!isset($_GET[$v])){
                $_GET[$v] = '';
            }
        }

        $conds = $this->getCondtions();
        $condtions = empty($conds) ? '' : ' WHERE '.implode(' AND ',$conds);
        $condtions .= " ORDER BY g.listorder DESC,g.id DESC";

        #分页
        $this->load->model('page');
        $_GET['page'] = intval($page);
        $this->page->set_vars(array('per'=>(int)$this->common['page_listrows']));

        $sql = "SELECT g.*,b.bus_name FROM ###_goods as g
                left join ###_business as b on b.mid=g.mid ".$condtions;
        $rows = $this->page->hashQuery($sql)->result_array();

        //获取商家信息
        $this->load->model('business');
        $this->smarty->assign('business_power', $this->business->business_power);

        //获取下拉分类
        $select_categorys = $this->goodscat->category_option($_GET['cid']);
        $this->smarty->assign('select_categorys', $select_categorys);
        #获取下拉品牌
        $select_brands = $this->brand->category_option($_GET['bid']);
        $this->smarty->assign('select_brands', $select_brands);

        //设置缩略图宽高.
        if($rows){
            foreach($rows as $k=>$v){
                if($v['cid']) $v['catestr'] = $this->goodscat->get_catnamestr($v['cid']);
                if($v['bid']) $v['brand'] = $this->brand->get_catnamestr($v['bid']);
                $v['thumb'] = json_decode($v['thumb'],true);
                $v['thumb'] = $v['thumb'][0]['path']?$v['thumb'][0]['path']:'';
                $rows[$k] = $v;
            }
        }

        //虚拟卡开关
        $this->load->model('virtual');
        $this->smarty->assign('virtual_power', $this->virtual->power);

        $this->smarty->assign('list',$rows);
        $this->smarty->display('manage/goods/list.html');
    }

    function edit($id){
        is_numeric($id)||exit('Error');
        $row = $this->db->get("SELECT * FROM ###_goods WHERE id = ".$id);
        $row['sp_val'] = json_decode($row['sp_val'],true);
        $sp_ids = array();
        if(is_array($row['sp_val']))foreach($row['sp_val'] as $sp_id=>$val){
            $sp_ids[] = $sp_id;
        }
        $row['sp_ids'] = implode(',',$sp_ids);

        $row['pics'] = json_decode($row['pics'],true);
        $row['params'] = json_decode($row['params'],true);
        if(!is_array($row['params']))$row['params'] = array();

        $this->load->model('share');
        $picdata = array();

        if(is_array($row['pics'])){
            foreach($row['pics'] as $v)$picdata[] = array('id'=>$v);
            $this->load->model('upload');
            $row['pics'] = $this->upload->getGalleryImgUrls($picdata);
            foreach($row['pics'] as $k=>$val){
                $row['pics'][$k]['thumb_size'] = $this->share->getSizeFormat($val['img_size'],90,90);
            }
        }else{
            $row['pics'] = array('','','','','','');
        }

        $items = $this->db->select("SELECT * FROM ###_goods_item WHERE goods_id=".$id);
        $goodsItem = array();
        foreach($items as $val){
            $goodsItem['price-'.$val['spec']] = $val['price'];
            $goodsItem['stock-'.$val['spec']] = $val['stock'];
            $goodsItem['serial-'.$val['spec']] = $val['serial'];
        }

        $this->smarty->assign('goodsItem',json_encode($goodsItem));
        $this->add($row);
    }

    function add($product = array()){
        if(!isset($product['id'])){
            $product = array(
                'id'=>'',
                'name'=>'',
                'desc'=>'',
                'content'=>'',
                'imgurl_src'=>'',
                'price'=>'',
                'real_price'=>'',
                'cid'=>'0',
                'bid'=>'0',
                'stock'=>'0',
                'is_sale'=>'1',
                'rule'=>array(),
                'pics'=>array('','','','','',''),
                'sp_val'=>array(),
                'sp_ids'=>isset($_GET['spec']) ? $_GET['spec'] : '',
                'params'=>array(),
                'thumb'=>'',
                'thumbs'=>'',
                'virtual'=>'0',
                'rebate'=>'-1',
            );
            $this->smarty->assign('btnNo',1);
        }
        $this->smarty->assign('picsType',array('商品正面图','商品背面图','款式细节','做工细节','辅料细节','模特正面图'));

        //获取下拉分类
        $select_categorys = $this->goodscat->category_option($product['cid']);
        $this->smarty->assign('select_categorys', $select_categorys);

        #获取下拉品牌
        $select_brands = $this->brand->category_option($product['bid']);
        $this->smarty->assign('select_brands', $select_brands);

        if(empty($product['sp_ids'])){
            if(isset($_GET['spec']))$product['sp_ids'] = $_GET['spec'];
        }

        if(!empty($product['sp_ids'])){
            $speclist = $this->db->select("SELECT * FROM goods_spec WHERE id IN(".$product['sp_ids'].")");
            $rows = $this->db->select("SELECT * FROM goods_spec_item WHERE spec_id IN(".$product['sp_ids'].")");
            $specItems = array();
            foreach($rows as $v)$specItems[$v['spec_id']][] = $v;
            foreach($speclist as $k=>$val){
                $speclist[$k]['values'] = isset($specItems[$val['id']]) ? $specItems[$val['id']] : array();
            }

            $this->smarty->assign('spec_list',$speclist);
        }else{
            $this->smarty->assign('spec_list',array());
        }

        //初始化内容
        $product['html_content'] = $this->form->editor('content',$product['content'],'name="content" style="width:600px;height:240px;"',array('toolbar'=>'full'));

        //生成图片控件
        $product['html_thumb'] = $this->form->files('thumb',$product['thumb']);
        $product['html_goods_thumb'] = $this->form->files('thumbs',$product['thumbs'],'上传图集',array(
            'maxnum' => 5
        ));

        //虚拟卡开关
        $this->load->model('virtual');
        $this->smarty->assign('virtual_power', $this->virtual->power);

        //商家开关
        $this->load->model('business');
        $this->smarty->assign('business_power', $this->business->business_power);

        $this->smarty->assign('product',$product);
        $this->smarty->display('manage/goods/edit.html');
    }

    /**
     * 删除产品
     * @param $id
     */
    function del(){
        $id = (int) $_POST['id'];
        if(!$id) die;

        $row = $this->db->get("SELECT * FROM goods WHERE id=".$id);
        if(isset($row['id'])){
            admin_log('删除商品：'.$row['name']);
            //$this->db->update('product',array('status'=>'-1'),array('id'=>$id));
            $this->db->delete('goods',array('id'=>$id));
            $this->tip('删除成功',array('type'=>1));
        }
    }

    function submit(){
        //规格值
        $sp_val = (isset($_POST['sp_val']) && is_array($_POST['sp_val'])) ? json_encode($_POST['sp_val']) : '';

        //保存产品参数
        $params = array();
        if(isset($_POST['params']['name']) && is_array($_POST['params']['name'])){
            $paramsVals = $_POST['params']['value'];
            foreach($_POST['params']['name'] as $index=>$val){
                if(empty($val))continue;
                $params[] = array('name'=>$val,'value'=>$paramsVals[$index]);
            }
        }

        $data = $this->base->certW(array(
            'name' => array('name'=>'商品名称','content'=>$_POST['name']),
            'content' => array('name'=>'商品详情','content'=>$_POST['content']),
        ), $_POST['price']);
        if($data['error']>0){
            $this->tip($data['error_text'],array('inIframe'=>true,'type'=>1));die;
        }

        $input = array(
            'name'=>$_POST['name'],
            'desc'=>$_POST['desc'],
            'content'=>$_POST['content'],
            'price'=>$_POST['price'],
            'real_price'=>$_POST['real_price'],
            'stock'=>$_POST['stock'],
            'cid'=>intval($_POST['cid']),
            'bid'=>intval($_POST['bid']),
            'sp_val'=>$sp_val,
            'is_sale'=>intval($_POST['is_sale']),
            'params'=>json_encode($params),
            'u_time'=>RUN_TIME,
            'tips'=>$_POST['tips'],
            'words'=>trim($_POST['words']),
            'wxshares'=>$_POST['wxshares'],
            'virtual'=>intval($_POST['virtual']),
            'rebate'=>intval($_POST['rebate']),
        );

        if(isset($_POST['pics']) && is_array($_POST['pics'])){
            $input['cover'] = $_POST['pics'][0];
            $input['pics'] = json_encode($_POST['pics']);
        }

        if(isset($_POST['rule'])){
            foreach($_POST['rule'] as $k=>$v){
                if(empty($v) || (count($v)==1 && empty($v[0]))){
                    unset($_POST['rule'][$k]);
                }
            }
            $input['rule'] = json_encode($_POST['rule']);
        }

        #处理缩略图
        $post = $_POST['post'];
        if(isset($post['thumb']) && !empty($post['thumb'])){
            $arrData = array();
            foreach($post['thumb']['path'] as $k=>$v){
                if($k==0){
                    $arrData[$k]['path'] = $v;
                    $arrData[$k]['title'] = $post['thumb']['title'][$k];
                }
            }
            $input['thumb'] = json_encode($arrData);
        }else{
            $this->tip('请上传缩略图!',array('inIframe'=>true,'type'=>1));die;
        }

        #处理图集
        if(isset($post['thumbs']) && !empty($post['thumbs'])){
            $arrData = array();
            foreach($post['thumbs']['path'] as $k=>$v){
                $arrData[$k]['path'] = $v;
                $arrData[$k]['title'] = $post['thumbs']['title'][$k];
            }
            $input['thumbs'] = json_encode($arrData);
        }else{
            $this->tip('请至少上传一张展示图集!',array('inIframe'=>true,'type'=>1));die;
        }

        if(isset($_POST['id']) && is_numeric($_POST['id'])){
            $goods_id = intval($_POST['id']);

            //商家商品上下架处理
            $goods = $this->db->get("select mid,is_sale from ###_goods where id=".$goods_id);
            if($goods['mid'] > 0 && $goods['is_sale'] != $input['is_sale']){
                $update[] = '`is_show`='.($input['is_sale']==1 ? 1 : 0);
                $where = "mid='".$goods['mid']."' and goods_id='".$goods_id."' and buy_num=0";
                $this->db->update('yunbuy',implode(',',$update),$where);
            }

            $this->db->update('goods',$input,array('id'=>$goods_id));
            $this->db->update('yunbuy',array('cover'=>$input['cover'],'pics'=>$input['pics'],'thumb'=>$input['thumb'],'thumbs'=>$input['thumbs']),"goods_id = $goods_id");
            admin_log('更新商品：'.$input['name']);
            $this->tip('更新成功!',array('inIframe'=>true));
        }else{
            $input['c_time'] = RUN_TIME;
            $this->db->insert('goods',$input);
            $goods_id = $this->db->insert_id();
            //新汽车生成表,分类39，40？
            if($input['cid']==39||$input['cid']==40){
                $sql="CREATE TABLE `zz_".$goods_id."_collection` (
                      `id` int(10) NOT NULL AUTO_INCREMENT,
                      `buy_id` int(10) NOT NULL,
                      `qishu` int(10) NOT NULL,
                      `num` varchar(255) NOT NULL,
                      `is_robot` tinyint(5) NOT NULL DEFAULT '0',
                      `is_used` tinyint(5) NOT NULL DEFAULT '0',
                      PRIMARY KEY (`id`),
                      KEY `num` (`num`) USING BTREE
                    ) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
                $this->db->query($sql);
            }

            admin_log('添加商品：'.$input['name']);
            $this->tip('添加成功!',array('inIframe'=>true));

            if($input['virtual'] == 1){
                $this->exeJs('parent.location.href="/manage#!virtual/index?goods_id='.$goods_id.'";');die;
            }
        }
        $this->exeJs('parent.location.href="/manage#!goods/index";');
    }

    /**
     * ajax检索商品
     */
    function search_goods(){
        if($_POST['ajax']){
            $conds = $this->getCondtions();
            $condtions = empty($conds) ? '' : ' WHERE '.implode(' AND ',$conds);
            $condtions .= " ORDER BY listorder DESC,id DESC";

            $sql = "SELECT id,name,price,mid FROM ###_goods ".$condtions;
            $rows = $this->db->select($sql);
            $rows = $this->db->lJoin($rows,'business','mid,bus_name','mid','mid');

            $x = array('html'=>'', 'name'=>'',  'price'=>0);
            foreach($rows as $k=>$v){
                if($k==0){
                    $x['name'] = $v['name'];
                    $x['price'] = $v['price'];
                }
                $x['html'] .= "<option value='$v[id]' price='$v[price]'>$v[name]".($v['bus_name']?"（商家：".$v['bus_name']."）":"")."</option>";
            }
            exit(json_encode($x));
        }else{
            exit('error');
        }
    }

    /** 检索条件
     * @return array
     */
    private function getCondtions(){
        $where = array();

        #关键词搜索
        $array = array('k','q');
        foreach($array as $v){
            if(!isset($_REQUEST[$v]))$_REQUEST[$v] = '';
        }
        if(!empty($_REQUEST['q'])){
            $where[] = "".trim($_REQUEST['k'])." LIKE '%".addslashes($_REQUEST['q'])."%'";
        }

        #无限级分类
        if(!empty($_REQUEST['cid']) && is_numeric($_REQUEST['cid'])){
            $where[] = 'cid'.$this->goodscat->condArrchild($_REQUEST['cid']);
        }
        if(!empty($_REQUEST['bid']) && is_numeric($_REQUEST['bid'])){
            $where[] = 'bid'.$this->brand->condArrchild($_REQUEST['bid']);
        }
        if(!empty($_REQUEST['is_sale']) && is_numeric($_REQUEST['is_sale'])){
            if($_REQUEST['is_sale']==99){
                $where[] = "is_sale=0";
            }elseif($_REQUEST['is_sale']==1){
                $where[] = "is_sale=1";
            }
        }
        if(!empty($_REQUEST['publish']) && is_numeric($_REQUEST['publish'])){
            if($_REQUEST['publish'] == 1){
                $where[] = "g.mid<1";
            }elseif($_REQUEST['publish'] == 2){
                $where[] = "g.mid>0";
            }
        }
        if(!empty($_REQUEST['virtual']) && is_numeric($_REQUEST['virtual'])){
            if($_REQUEST['virtual']==99){
                $where[] = "virtual=0";
            }elseif($_REQUEST['virtual']==1){
                $where[] = "virtual=1";
            }
        }

        $this->smarty->assign($_REQUEST);

        #删除状态
        $where[] = 'status>-1';
        return $where;
    }

}