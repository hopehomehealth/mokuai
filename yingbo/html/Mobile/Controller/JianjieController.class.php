<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/6/13
 * Time: 11:37
 */
namespace Mobile\Controller;
use Common\Common\FooterController;
class JianjieController extends FooterController {

     function jianjie(){
         $daohang = array(
             'first'=>'乐护简介',
         );
         $this -> assign('daohang',$daohang);

         $adinfo=D('Ad')
           ->where('col_id=20')
            ->select();
//         dump($adinfo);die;
       $this->assign('adinfo',$adinfo);
        $this ->display();
    }
}