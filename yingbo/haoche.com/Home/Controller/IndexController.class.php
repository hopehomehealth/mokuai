<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/6/13
 * Time: 11:37
 */
namespace Home\Controller;
use Common\Common\ComController;
class IndexController extends ComController {
    function index(){
        $daohang = array(
            'first'=>'渠道建设',
            'second'=>'新农缘天下商城',
        );
        $this -> assign('daohang',$daohang);

        $bannerinfo = D('Banner')
            ->where("is_area='0'")
            ->select();
        $this->assign('bannerinfo',$bannerinfo);

        $newsinfo = D('News')
            ->order('news_id desc')
            ->limit(0,4)
            ->select();
        $this->assign('newsinfo',$newsinfo);

        $haocheinfo = D('Haoche')
            ->alias('h')
            ->join('__HAOCATEGORY__ as hc on h.cat_id=hc.cat_id')
            ->field('h.*,hc.cat_name')
            ->order('goods_id desc')
            ->where("is_show='0'")
            ->limit(0,4)
            ->select();
        $this->assign('haocheinfo',$haocheinfo);
// dump($haocheinfo);die;


        $setinfo = D('Setting')
            ->field('pct_supvip,backme')
            ->select();
        $this->assign('setinfo',$setinfo);
//          dump($setinfo);die;
        $this ->display();
    }
}