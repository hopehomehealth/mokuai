<?php
/**
 * 店铺主页
 * ============================================================================
 * * 版权所有 2014-2016 厦门紫竹数码科技有限公司，并保留所有权利。
 * 网站地址: http://www.lnest.com；
 * ----------------------------------------------------------------------------
 * 这不是一个自由软件！您只能在不用于商业目的的前提下对程序代码进行修改和
 * 使用；不允许对程序代码以任何形式任何目的的再发布。
 */
class store extends Lowxp{
    function __construct(){
        parent::__construct();

        //商家开关
        $this->load->model('business');
        if(!$this->business->business_power){
            //$this->exeJs('location.href="/"');die;
        }

    }

    //店铺主页
    function index($mid=0, $page=1){
        $this->load->model('taglib');
        $this->load->model('yuncat');
        $this->_before($mid);
        $data = array();

        $options = array(
            'where' => ' AND y.is_show=1 AND y.is_off=0',
            'order' => "",
            'url' => $mid . '/',
        );

        #排序
        $order = isset($_REQUEST['order']) ? trim($_REQUEST['order']) : 'ratio';
        $sort = isset($_REQUEST['sort']) ? trim($_REQUEST['sort']) : 'DESC';

        //其它类型
        $zq = isset($_REQUEST['zq']) ? trim($_REQUEST['zq']) : '';
        if ($zq == 'buy') {
            $data['cate_name'] = $this->L['unit_go_buy'] . '商品';
            $options['where'] .= " AND y.need_num > 0";
            $options['gobuy'] = 1;
            $order = 'new';
        } else {
            $data['cate_name'] = $this->L['unit_yun'] . '商品';
            $options['where'] .= " AND y.buy_num < y.need_num";
        }

        if ($order == 'new') {
            $options['order'] = 'y.buy_id DESC';
        } elseif ($order == 'end_num') {
            $options['order'] = 'y.end_num ASC';
        } elseif ($order == 'need_numd') {
            $options['order'] = 'y.need_num DESC';
        } elseif ($order == 'need_numa') {
            $options['order'] = 'y.need_num ASC';
        } elseif ($order == 'price') {
            $options['order'] = 'y.custom_price';
        } elseif ($order == 'ratio') {
            $options['order'] = 'ratio DESC';
        } else {
            $options['order'] = 'y.listorders DESC,y.buy_id DESC';
            $sort = '';
        }
        //$options['order'] .= " " . $sort;

        //云购分类
        $cid = isset($_REQUEST['cid']) ? intval($_REQUEST['cid']) : '';
        if ($cid) {
            $cat = $this->db->get("SELECT * FROM yuncat WHERE id = '$cid'");
            if (!empty($cat))
                $options['where'] .= " AND y.cid" . $this->yuncat->condArrchild($cid);
        }

        #分页
        $this->load->model('page');
        $_GET['page'] = intval($page);
        
        $size = 6;
        $this->page->set_vars(array('per'=>$size));

        #查询列表
        $list = $this->business->getYunList($mid, $size, $page, $options);
        $list = $this->db->lJoin($list, 'goods', 'id,price', 'goods_id', 'id', 'g_');

        if($list){
            foreach($list as $key=>$val){
                $val['jindu'] = sprintf("%.2f",$val['buy_num']/$val['need_num']*100);
                if(!empty($val['ext_info'])){
                    $ext_info = unserialize($val['ext_info']);
                    if(!empty($ext_info)) $val = array_merge($val, $ext_info);
                }
                $val['goods_price'] = $val['price'];
                $val['num2char'] = num2char($val['price']);
                $val['imgw'] = 100;
                $val['imgh'] = 100;
                $val = $this->yunbuy->getThumb($val,1);
                $val['imgurl_src'] = $this->taglib->_fileurl(array('source'=>$val['imgurl_src'],'width'=>200,'height'=>200,'type'=>1));
                if($val['type']==2) $val['unit'] = $this->L['unit_pay_points'];
                $list[$key] = $val;
            }
        }
        #异步加载
        if($_REQUEST['ajaxcontent']){
            $data = array();
            if(!empty($list)) $data['yunbuy'] = $list;
        }else {
            //分类加载

            $yuncat = $this->yuncat->select();

            $data['yunbuy'] = $list;
            $cat_array = array();
            foreach ($yuncat as $val){
                $val['catname_en'] = 'cid:'.$val['id'];
                $cat_array[] = $val;
            }
            array_unshift($cat_array,array('catname'=>'直购商品','catname_en'=>"cid:'',zq:'buy'"));
            array_unshift($cat_array,array('catname'=>'云购商品','catname_en'=>"cid:'',limit:''"));
            foreach($cat_array as $key=>$val){
                $cat_array[$key]['catname_en'] = $val['catname_en'].',ckey:'.$key;
            }
            $data['cat'] = $cat_array;
            $data['title'] = $this->business_row['bus_name'].'_商家店铺';
        }
        
        $code = 1;
        $this->api_result(compact('data','code'));
    }

    //云购列表
    function yunbuy($mid=0, $page=1){
        $this->_before($mid);

        //获取商家商品列表
        $size = 9;
        $options = array(
            'where' => " AND y.is_show=1 AND y.is_off=0 AND y.buy_num < y.need_num", #已上架、进行中
            'order' => 'ratio DESC,y.buy_id DESC',
            'url'   => $mid.'/',
        );
        $data['list'] = $this->business->getYunList($mid,$size,$page,$options);
        $data['list'] = $this->db->lJoin($data['list'],'goods','id,price','goods_id','id','g_');

        $this->smarty->assign('mid',$mid);
        $this->smarty->assign('data',$data);
        $this->smarty->display('store/yunbuy.html');
    }

    //直购列表
    function gobuy($mid=0, $page=1){
        $this->_before($mid);

        //获取商家商品列表
        $size = 9;
        $options = array(
            'where' => " AND y.is_show=1 AND y.is_off=0 AND y.need_num > 0", #已上架、有库存
            'order' => 'y.buy_num DESC,y.buy_id DESC',
            'url'   => $mid.'/',
            'gobuy' => 1,
        );
        $data['list'] = $this->business->getYunList($mid,$size,$page,$options);
        $data['list'] = $this->db->lJoin($data['list'],'goods','id,price','goods_id','id','g_');

        $this->smarty->assign('mid',$mid);
        $this->smarty->assign('data',$data);
        $this->smarty->display('store/gobuy.html');
    }

    //前置处理
    private function _before($mid=0){
        if(!$mid){ $this->api_result(); }

        //商家信息
        $this->business_row = $business_row = $this->business->get(array('mid'=>$mid));

        //会员信息
        $this->load->model('member');
        $member_info = $this->member->member_info($mid, "photo,sex,nickname,username");
        $this->smarty->assign('member', $member_info);

        $this->smarty->assign('business_row', $business_row);
        if(!$business_row || $business_row['bus_status'] < 10){
            $this->api_result(array('msg'=> '商家店铺不存在！'));
        }elseif($business_row['bus_status'] == 20){
            $this->api_result(array('msg'=> '商家店铺已关闭！'));
        }
    }

}