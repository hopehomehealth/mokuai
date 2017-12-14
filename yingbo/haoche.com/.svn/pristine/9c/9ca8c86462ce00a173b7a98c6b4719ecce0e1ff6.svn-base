<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/6/13
 * Time: 11:37
 */
namespace Home\Controller;
use Think\Controller;
class QuanyiController extends Controller {
    function showlist(){
        $daohang = array(
            'second'=>'商家权益',
            'third'=>"<a class='head_back2'>&nbsp;</a>",
        );
        $this -> assign('daohang',$daohang);

        $info= D('Quanyi')
            ->where("is_show='0' AND is_del='0'")
            ->order('quanyi_id desc')
            ->select();
        $this->assign('info',$info);

        $this ->display();
    }



    //详情页
    function detail(){
        $daohang = array(
            'second'=>"权益商品详情",
            'third'=>"<a class='head_back2'>&nbsp;</a>",
        );
        $this -> assign('daohang',$daohang);
        $quanyi_id = I('get.quanyi_id');
        $quanyiinfo = D('Quanyi')
            ->where("quanyi_id = $quanyi_id")
            ->select();
$content =html_entity_decode($quanyiinfo[0]['introduce']);
         $this->assign('content',$content);
        $this->assign('quanyiinfo',$quanyiinfo);


        $this->display();
    }

}