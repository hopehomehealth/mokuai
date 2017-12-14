<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/6/13
 * Time: 11:37
 */
namespace Mobile\Controller;
use Common\Common\FooterController;
class GongyiController extends FooterController
{
    function showlist()
    {
        $daohang = array(
            'first'=>'乐护公益',
        );
        $this -> assign('daohang',$daohang);

        $trailer = D('Trailer');
        $gonginfo = $trailer->order('trailer_id')->select();
        $this->assign('gonginfo', $gonginfo);
        $this->display();
    }

    function gongyi_list(){
        $daohang = array(
            'first'=>'乐护公益',
        );
        $this -> assign('daohang',$daohang);

        $trailer_id= I('get.trailer_id');
        $trailer = D('Trailer');
        $info=$trailer->where(array('trailer_id'=>$trailer_id))->find();
        $this->assign('info',$info);
        $this->display();
    }
}