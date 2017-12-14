<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/6/13
 * Time: 11:37
 */
namespace Mobile\Controller;
use Common\Common\FooterController;
class CultureController extends FooterController {

     function culture(){
         $daohang = array(
             'first'=>'企业文化介绍',
         );
         $this -> assign('daohang',$daohang);

         $aboutinfo=D('About')
             ->where('about_id=2')
             ->select();
         $this->assign('aboutinfo',$aboutinfo);
         $this ->display();
    }
}