<?php
/**
 * 商家中心控制器
 * ============================================================================
 * * 版权所有 2014-2016 厦门紫竹数码科技有限公司，并保留所有权利。
 * 网站地址: http://www.lnest.com；
 * ----------------------------------------------------------------------------
 * 这不是一个自由软件！您只能在不用于商业目的的前提下对程序代码进行修改和
 * 使用；不允许对程序代码以任何形式任何目的的再发布。
 * version 0019.00
 */
class business extends Lowxp{
    function __construct(){
        parent::__construct();

        //进入商家中心须登录
        if(!$_SESSION['mid']){
            $this->exeJs('location.href="'.url('/member/login').'"');
            die;
        }

        define('MID',$_SESSION['mid']);
        define('USER',$_SESSION['username']);

        //商家开关
        $this->load->model('business');
        if(!$this->business->business_power){
            $this->exeJs('location.href="/"');die;
        }

    }

    //申请商家
    function apply(){
        $this->_before();
        if($this->business_row['bus_status'] >= 10){
            exit($this->msg("商家入驻申请已通过！", array(
                'iniframe'=>false,
                'icon'=>1,
                'link'=>array(
                    array('link' => '/business', 'text' => '进入商家中心'),
            ))));
        }

        //入驻开关
        $config_other = $this->setting->value_other();
        if(!isset($config_other['bus_apply']) || !$config_other['bus_apply']){
            exit($this->msg("商家入驻功能尚未开启！", array('iniframe'=>false,'url'=>'/')));
        }

        //最大申请次数
        $bus_time_max = 3;
        $this->smarty->assign('bus_time_max', $bus_time_max);

        //提交申请
        if(isset($_POST['submit'])){
            $where = '';
            $bus_times = 1;
            if(!empty($this->business_row)){
                $bus_times = $this->business_row['bus_times'] + 1;
                $where = array('mid'=>MID);
            }
            //判断入驻状态
            if($this->business_row['bus_status'] >= 10){
                exit($this->msg("商家入驻申请已通过，进入商家中心！", array('icon'=>1, 'url'=>'/business')));
            }
            //判断入驻次数
            if($bus_times > $bus_time_max){
                exit($this->msg("申请超过 $bus_time_max 次，不可再申请，请联系客服处理！"));
            }
            //获取POST数据
            $post['mid'] = MID;
            $post['bus_name'] = isset($_POST['name']) ? trim($_POST['name']) : '';
            $post['bus_company'] = isset($_POST['company']) ? trim($_POST['company']) : '';
            $post['bus_tel'] = isset($_POST['tel']) ? trim($_POST['tel']) : '';
            $post['bus_qq'] = isset($_POST['qq']) ? trim($_POST['qq']) : '';
            $post['bus_address'] = isset($_POST['address']) ? trim($_POST['address']) : '';
            $post['bus_zone'] = !empty($_POST['zone']) ? end($_POST['zone']) : '1';
            $post['bus_company_type'] = isset($_POST['company_type']) ? trim($_POST['company_type']) : '';
            $post['bus_scope'] = isset($_POST['scope']) ? trim($_POST['scope']) : '';
            $this->load->Model('linkage');
            $post['bus_area'] = $post['bus_zone'] ? $this->linkage->pos_linkage($post['bus_zone'],false) : '';
            $post['bus_area'] = str_replace('>','',$post['bus_area']);
            $post['bus_status'] = 0;
            $post['bus_times'] = $bus_times;
            $post['time_apply'] = time();
            //数据验证
            if(!$_POST['agree']){ exit($this->msg("请先阅读并同意《商家入驻协议》！")); }
            if(!$post['bus_name']){ exit($this->msg("请输入店铺名称！")); }
            if(!$post['bus_scope']){ exit($this->msg("请输入经营范围！")); }
            if(!$post['bus_company']){ exit($this->msg("请输入实体名称！")); }
            if(!$post['bus_company_type']){ exit($this->msg("请输入实体类型！")); }
            if(!$post['bus_tel']){ exit($this->msg("请输入客服电话！")); }
            if(!$post['bus_address']){ exit($this->msg("请输入联系地址！")); }
            //唯一性验证
            $res = $this->db->get("select id from ".$this->baseTable." where bus_name='".$post['bus_name']."'" . ($where ? " AND mid!=".MID : ''));
            if($res){ exit($this->msg("店铺名称已使用，请更换！")); }

            if($this->business->save($post, $where)){
                exit($this->msg("入驻申请成功！", array('icon'=>1,'url'=>'reload')));
            }else{
                exit($this->msg("申请失败！"));
            }
        }

        $this->display_before(array('title'=>'商家入驻申请'));
        $this->smarty->display('business/apply.html');
    }

    //商家首页
    function index(){
        $this->_before();

        //获取4个商家发布的商品
        $options = array(
            'where' => " AND y.is_show=1 AND y.is_off=0 AND y.buy_num < y.need_num", #已上架、进行中
            'order' => 'y.end_num ASC',
        );
        $data['list'] = $this->business->getYunList(MID,4,1,$options);
        $data['list'] = $this->db->lJoin($data['list'],'goods','id,price','goods_id','id','g_');

        $this->smarty->assign('data',$data);
        $this->smarty->display('business/index.html');
    }

    //店铺设置
    function info(){
        $this->_before();

        //提交申请
        if(isset($_POST['submit'])){
            $where = array('mid'=>MID);
            //获取POST数据
            $post['bus_name'] = isset($_POST['name']) ? trim($_POST['name']) : '';
            $post['bus_company'] = isset($_POST['company']) ? trim($_POST['company']) : '';
            $post['bus_tel'] = isset($_POST['tel']) ? trim($_POST['tel']) : '';
            $post['bus_qq'] = isset($_POST['qq']) ? trim($_POST['qq']) : '';
            $post['bus_address'] = isset($_POST['address']) ? trim($_POST['address']) : '';
            $post['bus_zone'] = !empty($_POST['zone']) ? end($_POST['zone']) : '1';
            $post['bus_company_type'] = isset($_POST['company_type']) ? trim($_POST['company_type']) : '';
            $post['bus_scope'] = isset($_POST['scope']) ? trim($_POST['scope']) : '';
            $this->load->Model('linkage');
            $post['bus_area'] = $post['bus_zone'] ? $this->linkage->pos_linkage($post['bus_zone'],false) : '';
            $post['bus_area'] = str_replace('>','',$post['bus_area']);
            if((isset($_POST['bus_logo']) && !empty($_POST['bus_logo']))){
                $post['bus_logo'] = trim($_POST['bus_logo']);
            }
            //数据验证
            if(!$post['bus_name']){ exit($this->msg("请输入店铺名称！")); }
            if(!$post['bus_scope']){ exit($this->msg("请输入经营范围！")); }
            if(!$post['bus_company']){ exit($this->msg("请输入实体名称！")); }
            if(!$post['bus_company_type']){ exit($this->msg("请输入实体类型！")); }
            if(!$post['bus_tel']){ exit($this->msg("请输入客服电话！")); }
            if(!$post['bus_address']){ exit($this->msg("请输入联系地址！")); }
            //唯一性验证
            $res = $this->db->get("select id from ".$this->baseTable." where bus_name='".$post['bus_name']."'" . ($where ? " AND mid!=".MID : ''));
            if($res){ exit($this->msg("店铺名称已使用，请更换！")); }

            if($this->business->save($post, $where)){
                //删除原LOGO
                $this->load->model('upload');
                if(!empty($post['bus_logo']) && !empty($this->business_row['bus_logo'])){
                    $this->upload->rmFile(RootDir . 'web' . $this->business_row['bus_logo']);
                }

                exit($this->msg("更新成功！", array('icon'=>1,'url'=>'reload')));
            }else{
                exit($this->msg("更新失败！"));
            }
        }

        $this->smarty->assign('nav','info');
        $this->smarty->display('business/info.html');
    }

    //店铺介绍
    function introduction(){
        $this->_before();

        //提交申请
        if(isset($_POST['submit'])){
            $where = array('mid'=>MID);
            //获取POST数据
            $post['bus_intro'] = isset($_POST['intro']) ? $_POST['intro'] : '';

            if($this->business->save($post, $where)){
                exit($this->msg("更新成功！", array('icon'=>1,'url'=>'reload')));
            }else{
                exit($this->msg("更新失败！"));
            }
        }

        $this->smarty->assign('nav','introduction');
        $this->smarty->display('business/introduction.html');
    }

    //广告图
    function ad(){
        $this->_before();

        //解析原广告图集
        $ads_old = json_decode($this->business_row['bus_ads'],true);
        $this->smarty->assign('ads',$ads_old);

        //提交申请
        if(isset($_POST['submit'])){
            $where = array('mid'=>MID);
            //获取POST数据
            $ads = array();
            if((isset($_POST['ad0']) && !empty($_POST['ad0']))){
                $ads[] = array('path'=>trim($_POST['ad0']),'title'=>'');
            }else{
                $ads[] = isset($ads_old[0]) ? $ads_old[0] : array('path'=>'','title'=>'');
            }
            if((isset($_POST['ad1']) && !empty($_POST['ad1']))){
                $ads[] = array('path'=>trim($_POST['ad1']),'title'=>'');
            }else{
                $ads[] = isset($ads_old[1]) ? $ads_old[1] : array('path'=>'','title'=>'');
            }
            if((isset($_POST['ad2']) && !empty($_POST['ad2']))){
                $ads[] = array('path'=>trim($_POST['ad2']),'title'=>'');
            }else{
                $ads[] = isset($ads_old[2]) ? $ads_old[2] : array('path'=>'','title'=>'');
            }
            if((isset($_POST['ad3']) && !empty($_POST['ad3']))){
                $ads[] = array('path'=>trim($_POST['ad3']),'title'=>'');
            }else{
                $ads[] = isset($ads_old[3]) ? $ads_old[3] : array('path'=>'','title'=>'');
            }

            $post['bus_ads'] = json_encode($ads);
            if($this->business->save($post, $where)){
                //删除原图
                $this->load->model('upload');
                foreach($ads_old as $k=>$v){
                    if($ads[$k]['path'] != $ads_old[$k]['path']){
                        $this->upload->rmFile(RootDir . 'web' . $ads_old[$k]['path']);
                    }
                }

                exit($this->msg("更新成功！", array('icon'=>1,'url'=>'reload')));
            }else{
                exit($this->msg("更新失败！"));
            }
        }

        $this->smarty->assign('nav','ad');
        $this->smarty->display('business/ad.html');
    }

    //商品管理（云购）
    function yunbuy($page=1){
        $this->_before();
        $size = 10;

        if($this->site_config['index_skin'] == 2){
            $this->exeJs('location.href="/business/yunbuy_gobuy#m"');die;
        }

        //条件
        $options = array('where'=>'');
        #审核状态
        $status = isset($_GET['status']) ? (int) $_GET['status'] : 0;
        switch($status){
            case 0: //已上架
                $options['where'] .= " AND y.is_show=1 AND y.is_off=0";
                break;
            case 1: //审核中
                $options['where'] .= " AND y.is_show=0 AND y.is_off=0";
                break;
            default: //已下架
                $options['where'] .= " AND y.is_off=1";
                break;
        }
        #云购状态
        $statusY = isset($_GET['statusY']) ? (int) $_GET['statusY'] : 0;
        switch($statusY){
            case 1: //进行中
                $options['where'] .= " AND y.buy_num < y.need_num";
                break;
            case 2: //待揭晓
                $options['where'] .= " AND y.wait_time <> '' AND y.luck_code = '0'";
                break;
            case 3: //已开奖
                $options['where'] .= " AND y.luck_code <> '0'";
                break;
            case 4: //已满期
                $options['where'] .= " AND y.qishu >= y.max_qishu";
                break;
        }

        $data['list'] = $this->business->getYunList(MID,$size,$page,$options);
        $data['list'] = $this->db->lJoin($data['list'],'goods','id,rebate','goods_id','id','g_');
        foreach($data['list'] as $k=>$v){
            //计算商家分润
            $bus_price = $v['goods_price'];
            if($v['gobuy'] == 1){
                $bus_price = $v['custom_price'];
            }
            if(!(int) $v['bus_money']){
                $v['bus_money'] = $this->business->bus_rebate($bus_price,0,$v['g_rebate']);
            }
            $data['list'][$k] = $v;
        }

        $this->smarty->assign('data',$data);
        $this->smarty->assign('nav','yunbuy');
        $this->smarty->display('business/yunbuy.html');
    }

    //商品管理（直购）
    function yunbuy_gobuy($page=1){
        $this->_before();
        $size = 10;

        //条件
        $options = array('where'=>'');
        #审核状态
        $status = isset($_GET['status']) ? (int) $_GET['status'] : 0;
        switch($status){
            case 0: //已上架
                $options['where'] .= " AND y.is_show=1 AND y.is_off=0";
                break;
            case 1: //审核中
                $options['where'] .= " AND y.is_show=0 AND y.is_off=0";
                break;
            default: //已下架
                $options['where'] .= " AND (y.is_off=1 OR y.is_show=0)";
                break;
        }
        #云购状态
        $statusY = isset($_GET['statusY']) ? (int) $_GET['statusY'] : 0;
        switch($statusY){
            case 1: //进行中
                $options['where'] .= " AND y.need_num > 0";
                break;
            case 2: //库存不足
                $options['where'] .= " AND y.need_num <= 0";
                break;
        }

        $options['gobuy'] = 1; //只调取直购商品
        $data['list'] = $this->business->getYunList(MID,$size,$page,$options);
        $data['list'] = $this->db->lJoin($data['list'],'goods','id,rebate','goods_id','id','g_');
        foreach($data['list'] as $k=>$v){
            //计算商家分润
            $bus_price = $v['goods_price'];
            if($v['gobuy'] == 1){
                $bus_price = $v['custom_price'];
            }
            if(!(int) $v['bus_money']){
                $v['bus_money'] = $this->business->bus_rebate($bus_price,0,$v['g_rebate']);
            }
            $data['list'][$k] = $v;
        }

        $this->smarty->assign('data',$data);
        $this->smarty->assign('nav','yunbuy');
        $this->smarty->display('business/yunbuy_gobuy.html');
    }

    /** 发布商品（云购/直购）
     * @param string $type
     */
    function yunbuy_edit($type = ''){
        $this->_before();

        //获取已发布数量
        $count = $this->business->getYunList(MID,1,1,array('type'=>'count'));
        //获取发布上限
        $bus_limit = $this->business->bus_limit($this->business_row);
        $this->smarty->assign('bus_limit',$bus_limit);
        if($count >= $bus_limit){
            exit($this->msg('您发布的商品数量已达到上限！',array('iniframe'=>false,'url'=>'/business/yunbuy')));
        }

        //发布商家发布过的商品
        $id = isset($_GET['id']) ? intval($_GET['id']) : 0;
        if($id){
            $this->load->model('yunbuy');
            $yunInfo = $this->yunbuy->yuninfo($id);
            $goods = $this->db->get("select * from ###_goods where id=".$yunInfo['goods_id']);
            if(!$yunInfo){
                $url = $type == 'gobuy' ? '/business/yunbuy_gobuy' : '/business/yunbuy';
                exit($this->msg('该商品不存在！',array('iniframe'=>false,'url'=>$url.'#m')));
            }
        }

        //提交申请
        if(isset($_POST['submit'])){
            $_POST['buy_id'] = 0;
            $buy_id = isset($_POST['buy_id']) ? (int) $_POST['buy_id'] : '0';
            $where = array('buy_id'=>$buy_id);
            //获取商品POST数据
            $post_goods['name'] = isset($_POST['title']) ? trim($_POST['title']) : '';
            $post_goods['content'] = isset($_POST['content']) ? trim($_POST['content']) : '';
            $post_goods && SafeFilter($post_goods, 1);
            $post_goods['price'] = isset($_POST['true_price']) ? floatval($_POST['true_price']) : 0;
            $post_goods['u_time'] = $post_goods['c_time'] = time();
            $post_goods['tips'] = isset($_POST['tips']) ? trim($_POST['tips']) : '';
            $post_goods['is_sale'] = 0;
            $post_goods['mid'] = MID;

            if(!$id){
                //品牌处理
                $add_brand = isset($_POST['add_brand']) ? (int) $_POST['add_brand'] : 0;
                $brand_name = isset($_POST['brand_name']) ? trim($_POST['brand_name']) : '';
                if($add_brand){
                    if($brand_name){
                        $cid = $this->db->getstr("select id from ###_brand where catname='$brand_name'");
                        if(!$cid){ //品牌名称不存在，添加品牌并获取ID
                            $cid = $this->db->save('brand', array('catname'=>$brand_name,'mid'=>MID,'ismenu'=>0));
                        }
                        $post_goods['bid'] = $cid;
                    }
                }else{
                    $post_goods['bid'] = isset($_POST['bid']) ? (int) $_POST['bid'] : 0;
                }

                //缩略图处理
                $thumb_arr = array();
                $thumbs_arr = array();
                if(isset($_POST['goods']) && !empty($_POST['goods'])){
                    foreach($_POST['goods'] as $k=>$v){
                        if($k == 0){
                            $thumb_arr[$k]['path'] = $v;
                            $thumb_arr[$k]['title'] = '';
                        }
                        $thumbs_arr[$k]['path'] = $v;
                        $thumbs_arr[$k]['title'] = '';
                    }
                }
                $post_goods['thumb'] = json_encode($thumb_arr);
                $post_goods['thumbs'] = json_encode($thumbs_arr);
            }else{
                //发布过的商品，某些字段直接复制
                $post_goods['thumb'] = $goods['thumb'];
                $post_goods['thumbs'] = $goods['thumbs'];
            }

            //获取云购POST数据
            $post_yunbuy['title'] = $post_goods['name'];
            $post_yunbuy['goods_subtit'] = isset($_POST['sub_title']) ? trim($_POST['sub_title']) : '';
            $post_yunbuy['thumb'] = $post_goods['thumb'];
            $post_yunbuy['thumbs'] = $post_goods['thumbs'];
            $post_yunbuy['cid'] = isset($_POST['cid']) ? (int) $_POST['cid'] : 0;
            $post_yunbuy['custom_price'] = $post_goods['price'];
            $post_yunbuy['goods_price'] = isset($_POST['goods_price']) ? $_POST['goods_price'] : 0;
            $post_yunbuy['price'] = isset($_POST['price']) ? (int) $_POST['price'] : 1;
            $post_yunbuy['need_num'] = ceil($post_yunbuy['goods_price']/$post_yunbuy['price']);
            $post_yunbuy['end_num'] = $post_yunbuy['need_num'];
            $post_yunbuy['buy_num'] = 0;
            $post_yunbuy['max_qishu'] = isset($_POST['max_qishu']) ? (int) $_POST['max_qishu'] : 1;
            $post_yunbuy['qishu'] = 1;
            $post_yunbuy['add_time'] = time();
            $post_yunbuy['is_show'] = 0;
            $post_yunbuy['type'] = 1;
            $post_yunbuy['buynum'] = isset($_POST['limit']) ? (int) $_POST['limit'] : 0;
            $post_yunbuy['ext_info'] = serialize(array(
                'buynum'   => intval($post_yunbuy['buynum']),
                'usernum'  => 0,
                'isreal'   => 0,
                'member'   => 0,
                'notjoin'  => 0
            ));
            $post_yunbuy['mid'] = MID;

            //数据验证
            if(!$post_goods['name']){ exit($this->msg("请输入商品名称！")); }
            if(!$thumb_arr && !$id){ exit($this->msg("请至少上传一张商品图片！")); }
            if($type == 'gobuy'){
                //直购数据
                $post_yunbuy['gobuy'] = 1;
                $post_yunbuy['need_num'] = $post_yunbuy['end_num'] = (int) $_POST['need_num'];

                if(!(int) $post_yunbuy['custom_price']){ exit($this->msg("请输入商品购买价格！")); }
                if(!(int) $post_yunbuy['need_num']){ exit($this->msg("请输入商品库存！")); }
            }else{
                if(!(int) $post_yunbuy['goods_price']){ exit($this->msg("请输入商品总需价格！")); }
                if(!$post_yunbuy['price']){ exit($this->msg("请输入单次购买价格！")); }
                if(!$post_yunbuy['max_qishu'] || $post_yunbuy['max_qishu']>500){ exit($this->msg("请输入最大购买期数且不可大于500！")); }
                //总需必须是单次价格的整数倍
                $rc = $post_yunbuy['goods_price']/$post_yunbuy['price'];
                if(ceil($rc) != $rc){ exit($this->msg("商品总需必须是单次价格的整数倍！")); }
            }

            //资质检查
            $data = $this->base->certW(array(
                'title' => array('name'=>'商品名称','content'=>$post_yunbuy['title']),
                'goods_subtit' => array('name'=>'副标题','content'=>$post_yunbuy['goods_subtit']),
            ), $post_yunbuy['goods_price']);
            if($data['error']>0){
                exit($this->msg($data['error_text']));
            }

            if(!$id){
                //写入商品
                $goods_id = $this->db->save('goods', $post_goods);
                if(!$goods_id){ exit($this->msg("发布失败！")); }
            }else{
                $goods_id = $goods['id'];
            }

            //写入云购
            $post_yunbuy['goods_id'] = $goods_id;
            $buy_id = $this->db->save('yunbuy',$post_yunbuy);
            if($buy_id){
                $this->db->update('yunbuy',array('sid'=>$buy_id),array('buy_id'=>$buy_id));
            }

            $url = $type == 'gobuy' ? '/business/yunbuy_gobuy?status=1' : '/business/yunbuy?status=1';
            exit($this->msg("商品发布成功，等待管理员审核！", array('icon'=>1,'url'=>$url.'#m')));
        }

        if($type == 'gobuy'){
            //发布直购标记
            $row['gobuy'] = 1;
        }else{
            if($this->site_config['index_skin'] == 2){
                $this->exeJs('location.href="/business/yunbuy_edit/gobuy#m"');die;
            }
        }

        //商品分类
        $this->load->model('yuncat');
        $yuncat = $this->yuncat->select();
        $this->smarty->assign('yuncat',$yuncat);

        //商品品牌
        $this->load->model('brand');
        $brand = $this->brand->select('',' AND parentid=0');
        $this->smarty->assign('brand',$brand);

        //生成编辑器
        $row['html_content'] = $this->form->editor('content','','name="content" style="width:100%;height:300px;"',array('toolbar'=>'basic'));

        //商家配置
        $config_other = $this->setting->value_other();
        if($goods){
            $rebate = $goods['rebate'];
            if($rebate < 0 && $rebate == -1){ $config_other['bus_rebate'] = 0; }
            elseif($rebate > 0){ $config_other['bus_rebate'] = $rebate; }
            if($config_other['bus_rebate']>100 || $config_other['bus_rebate']<0){ $config_other['bus_rebate'] = 0; }
        }
        $this->smarty->assign('config_other',$config_other);

        if($yunInfo){
            $this->smarty->assign('yunInfo', $yunInfo);
            $this->smarty->assign('goods', $goods);
        }

        $this->smarty->assign('row',$row);
        $this->smarty->assign('nav','yunbuy');
        $this->smarty->display('business/yunbuy_add.html');
    }

    /**
     * 分润明细
     */
    function account($page = 1){
        $this->_before();
            $size = $this->site_config['page_size'];

        $_GET['page'] = $page;
        $this->load->model('page');
        $this->page->set_vars(array('per'=>$size));
        $this->load->model('member');

        $list = $this->page->hashQuery("SELECT * FROM ###_account_log WHERE mid = '".MID."' AND `desc` like '%商家资金结算%' ORDER BY id DESC")->result_array();

        //第三方支付统计
        $sql = "SELECT SUM(user_money) FROM ###_account_log WHERE mid = '".MID."' AND `desc` like '%商家资金结算%'";
        $data['user_money'] = $this->db->getstr($sql);

        $this->smarty->assign('list',$list);
        $this->smarty->assign('data',$data);
        $this->smarty->assign('nav','account');
        $this->smarty->display('business/account.html');
    }

    //商家订单
    function order($page=1){
        $this->_before();

        //商家订单列表
        $where = "WHERE g.mid='".MID."' ";
        $order = ' ORDER BY go.id DESC';

        //检索
        $k = isset($_REQUEST['k']) ? trim($_GET['k']) : '';
        $q = isset($_REQUEST['q']) ? trim($_GET['q']) : '';
        $status = isset($_REQUEST['status']) ? trim($_GET['status']) : '';
        if($q && $k){
            if(in_array($k,array('order_sn'))){
                $where .= " AND ".$k." LIKE '".$q."'";
            }
        }
        if($status){
            $where .= " AND go.status='".$status."'";
        }
        $this->smarty->assign($_GET);

        //分页
        $this->load->model('page');
        $_GET['page'] = $page;

        //列表
        $sql = "SELECT DISTINCT go.id,go.* FROM ###_goods_order AS go ".
               "LEFT JOIN ###_goods_order_item AS goi ON goi.order_id=go.id ".
               "LEFT JOIN ###_goods AS g ON g.id=goi.good_id " . $where . $order;
        $list = $this->page->hashQuery($sql)->result_array();

        $this->load->model('order');
        $list = $this->order->unionOrderGoods($list, array('bus_mid'=>MID));

        //订单状态
        $orderStatus = array(
            //'1'=>'等待付款',
            '2'=>'等待发货',
            //'7'=>'正在备货',
            '3'=>'已经发货',
            '4'=>'交易完成',
            //'5'=>'取消订单'
        );
        $this->smarty->assign('orderStatus',$orderStatus);

        //快递公司
        $express = $this->db->select("SELECT * FROM ###_express ORDER BY id ASC");
        $this->smarty->assign('express',$express);

        $this->smarty->assign('list',$list);
        $this->smarty->assign('nav','order');
        $this->smarty->display('business/order.html');
    }

    //商家发货
    function doSend($order_id){
        $order_sn = isset($_POST['order_sn']) ? trim($_POST['order_sn']) : '';
        $express = isset($_POST['express']) ? intval($_POST['express']) : '';
        $express_no = isset($_POST['express_no']) ? trim($_POST['express_no']) : '';

        if(!$order_sn){ exit($this->msg('商户订单不存在！')); }
        if(!$express){ exit($this->msg('请选择快递公司！')); }
        if(!$express_no){ exit($this->msg('请输入快递单号！')); }

        $order = $this->db->get("SELECT id,extension_code,status,bus_mid FROM goods_order WHERE order_sn='".$order_sn."' AND status IN(2,7)");
        if(!$order){ exit($this->msg('发货订单不存在！')); }

        //直购根据商户发货
        $order_send_bus_status = 0; #1 商家商品全部已发货，更新总订单状态
        if ($order['extension_code'] == CART_BUY) {
            $goods_list = $this->db->select("SELECT id,mid FROM ###_goods WHERE mid>0");
            if($goods_list){
                $ids_bus_mid = array();
                $ids_bus = array();
                foreach($goods_list as $v){
                    $ids_bus[] = $v['id'];
                    if($v['mid'] == MID){
                        $ids_bus_mid[] = $v['id'];
                    }
                }
                if(count($ids_bus_mid)>0){
                    $res = $this->db->update('goods_order_item',array(
                        'item_status'=>3,
                        'item_express'=>$express,
                        'item_express_num'=>$express_no,
                        'item_express_time'=>RUN_TIME
                    ), "order_id='".$order['id']."' AND good_id IN(".implode(',',$ids_bus_mid).")");

                    //给商家发放佣金
                    $this->load->model('business');
                    $this->business->bus_commission($order['id'],0,MID);

                    if($res && $order['status'] < 3){
                        //总订单商品数量
                        $count = $this->db->getstr("SELECT COUNT(id) FROM ###_goods_order_item WHERE order_id='".$order['id']."'");
                        //商家订单商品数量（已发货）
                        $count_bus = $this->db->getstr("SELECT COUNT(id) FROM ###_goods_order_item WHERE order_id='".$order['id']."' AND item_status>=3 AND good_id IN(".implode(',',$ids_bus).")");
                        if($count == $count_bus){
                            $order_send_bus_status = 1;
                        }
                    }
                }
            }
        }

        if ($order['extension_code'] != CART_BUY || $order_send_bus_status == 1) {
            if($order['bus_mid'] != MID && $order_send_bus_status == 0){ exit($this->msg('发货订单不存在！')); }

            $this->load->model('order');
            $this->order->chageOrderState($order['id'],3,'商家发货');

            if($order_send_bus_status == 0){
                $this->db->update('goods_order',array(
                    'express'=>$express,
                    'express_num'=>$express_no,
                    'express_send_time'=>RUN_TIME
                ),array('id'=>$order['id']));
            }
        }

        exit($this->msg('发货成功！',array('icon'=>1,'url'=>'reload')));
    }

    //前置处理
    private function _before(){
        $method = $_SERVER['request']['method'];

        //商家信息
        $this->business_row = $business_row = $this->business->get(array('mid'=>MID));
        $this->smarty->assign('business_row', $business_row);
        if(!$business_row || $business_row['bus_status'] < 10){
            //没有申请记录 或者 申请未通过 或者 申请审核中... 都转申请页
            if(!in_array($method, array('apply'))){
                $this->exeJs('location.href="/business/apply"');die;
            }
        }elseif($business_row['bus_status'] == 20){
            exit($this->msg("商家店铺已关闭，请联系客服！", array('iniframe'=>false,'url'=>'/')));
        }

        $this->load->model('member');
        $this->memberinfo = $this->member->member_info(MID);
        $this->smarty->assign('member',$this->memberinfo);

        #获取抵用券张数
        $this->load->model('bonus');
        $this->smarty->assign('bonus_count',$this->bonus->getBonusUser(array(
            'mid' => MID
        ),1));

        $this->display_before(array('title'=>'商家中心'));
        $this->ur_here('',array(0=>array('url'=>url('/business'),'name'=>'商家中心')));
    }

}