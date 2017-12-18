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
            $this->exeJs('location.href="/"');die;
        }

    }

    //店铺主页
    function index($mid=0, $page=1){
        $this->_before($mid);
        $data = array();

        if(STPL == 'mobile'){
            if($this->site_config['index_skin'] == 2){
                if(!isset($_REQUEST['zq']) || $_REQUEST['zq'] != 'buy'){
                    $this->exeJs('location.href="/store/index/'.$mid.'?zq=buy"');die;
                }
            }

            $options = array(
                'where' => ' AND y.is_show=1 AND y.is_off=0',
                'order' => "",
                'url'   => $mid.'/',
            );

            #排序
            $order = isset($_REQUEST['order']) ? trim($_REQUEST['order']) : 'ratio';
            $sort = isset($_REQUEST['sort']) ? trim($_REQUEST['sort']) : 'DESC';

            //其它类型
            $zq = isset($_REQUEST['zq']) ? trim($_REQUEST['zq']) : '';
            if($zq =='buy'){
                $data['cate_name'] = $this->L['unit_go_buy'].'商品';
                $options['where'] .= " AND y.need_num > 0";
                $options['gobuy'] = 1;
                $order = 'new';
            }else{
                $data['cate_name'] = $this->L['unit_yun'].'商品';
                $options['where'] .= " AND y.buy_num < y.need_num";
            }

            if($order=='new'){
                $options['order'] = 'y.buy_id';
            }elseif($order=='end_num'){
                $options['order'] = 'y.end_num';
            }elseif($order=='need_num'){
                $options['order'] = 'y.need_num';
            }elseif($order=='price'){
                $options['order'] = 'y.custom_price';
            }elseif($order=='ratio'){
                $options['order'] = 'ratio';
            }elseif(!$order){
                $options['order'] = 'y.listorders DESC,y.buy_id DESC';
                $sort = '';
            }
            $options['order'] .= " " . $sort;

            //云购分类
            $cid = isset($_REQUEST['cid']) ? intval($_REQUEST['cid']) : '';
            if($cid){
                $cat = $this->db->get("SELECT * FROM yuncat WHERE id = '$cid'");
                if(!empty($cat)) $options['where'] .= " AND y.cid" . $this->yuncat->condArrchild($cid);
            }

            #分页
            $size = !empty($_REQUEST['size']) ? intval($_REQUEST['size']) : 10;
            $this->load->model('page');
            $_GET['page'] = intval($page);
            $this->page->set_vars(array('per'=>$size));

            #查询列表
            $list = $this->business->getYunList($mid,$size,$page,$options);
            $list = $this->db->lJoin($list,'goods','id,price','goods_id','id','g_');
            $this->smarty->assign('list',$list);

            #选择模板
            $template_lbi = 'yunbuy/lbi/list.html';
            if($zq == 'buy'){ $template_lbi = 'yunbuy/lbi/list_buy.html'; }
            $this->smarty->assign('template_lbi', $template_lbi);

            #异步加载
            if(isset($_GET['load'])){
                if($list){
                    $content = $this->smarty->fetch($template_lbi);
                    echo $content;die;
                }
            }
        }else{
            //获取商家云购商品
            if($this->site_config['index_skin'] != 2){
                $size = 9;
                $options = array(
                    'where' => " AND y.is_show=1 AND y.is_off=0 AND y.buy_num < y.need_num", #已上架、进行中
                    'order' => 'ratio DESC,y.buy_id DESC',
                    'url'   => $mid.'/',
                );
                $data['list_yunbuy'] = $this->business->getYunList($mid,$size,$page,$options);
                $data['list_yunbuy'] = $this->db->lJoin($data['list_yunbuy'],'goods','id,price','goods_id','id','g_');
            }

            //获取商家直购商品
            $size = 9;
            $options = array(
                'where' => " AND y.is_show=1 AND y.is_off=0 AND y.need_num > 0", #已上架、有库存
                'order' => 'y.buy_num DESC,y.buy_id DESC',
                'url'   => $mid.'/',
                'gobuy' => 1,
            );
            $data['list_gobuy'] = $this->business->getYunList($mid,$size,$page,$options);
            $data['list_gobuy'] = $this->db->lJoin($data['list_gobuy'],'goods','id,price','goods_id','id','g_');
        }

        $this->smarty->assign('mid',$mid);
        $this->smarty->assign('data',$data);
        $this->smarty->display('store/index.html');
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
        if(!$mid){ exit($this->msg()); }

        //商家信息
        $this->business_row = $business_row = $this->business->get(array('mid'=>$mid));

        //会员信息
        $this->load->model('member');
        $member_info = $this->member->member_info($mid, "photo,sex,nickname,username");
        $this->smarty->assign('member', $member_info);

        $this->smarty->assign('business_row', $business_row);
        if(!$business_row || $business_row['bus_status'] < 10){
            exit($this->msg("商家店铺不存在！", array('iniframe'=>false,'url'=>'/')));
        }elseif($business_row['bus_status'] == 20){
            exit($this->msg("商家店铺已关闭！", array('iniframe'=>false,'url'=>'/')));
        }

        $this->display_before(array('title'=>$this->business_row['bus_name'].'_商家店铺'));
    }

}