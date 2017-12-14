<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/6/13
 * Time: 11:37
 */
namespace Mobile\Controller;
use Common\Common\FooterController;
class IndexController extends FooterController {
    function index(){

        $daohang = array(
            'head'=>'乐护首页',
            'first'=>'乐护首页',
        );
        $this -> assign('daohang',$daohang);

        $adinfo=D('Ad')
           ->where('col_id=19')
            ->select();

//        $adinfo = D('AdColumn')
//            ->alias('ac')
//            ->join('__Ad__ a on ac.col_id=a.col_id')
//            ->where(array('ga.ad_id'=>$adid,'a.col_id'=>$colid))
//            ->field('a.ad_id,a.title,a.is_show,a.pic,group_concat(ga.col_id) colids')
//            ->group('a.ad_id')
//            ->select();
////       dump($adinfo);die;
       $this->assign('adinfo',$adinfo);
        $this ->display();
    }
}