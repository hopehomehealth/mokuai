<?php
namespace Home\Controller;
use Common\Common\HomeController;
class AboutController extends HomeController {

         function about(){
             $aboutinfo = D('About')
                 ->where('about_id=1')
                 ->select();
//  dump($aboutinfo);die;
             $this -> assign('aboutinfo',$aboutinfo);

             $adinfofen=D('Ad')->where("col_id=29")->select();
             $this->assign('adinfofen',$adinfofen);
//              dump($adinfofen);die;
             $this->display();
         }

    function qywh(){
        $adinfofen=D('Ad')->where("col_id=29")->select();
        $this->assign('adinfofen',$adinfofen);
        $qywhinfo = D('About')->where('about_id=2')->select();
        $this->assign('qywhinfo',$qywhinfo);
        $this->display();
    }
}