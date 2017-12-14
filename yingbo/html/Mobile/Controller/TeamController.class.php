<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/6/13
 * Time: 11:37
 */
namespace Mobile\Controller;
use Common\Common\FooterController;
class TeamController extends FooterController {

     function team(){

         $daohang = array(
             'first'=>'团队介绍',
         );
         $this -> assign('daohang',$daohang);

         $teaminfo1=D('UserAssess')
           ->field('userid,username,photo,school,company')
            ->order('userid')
            ->limit('0,3')
            ->select();
        $this->assign('teaminfo1',$teaminfo1);

         $teaminfo2=D('UserNurse')
             ->field('userid,username,photo,type,school,company,experience,departments')
             ->order('userid')
             ->limit('0,3')
             ->select();
         $this->assign('teaminfo2',$teaminfo2);
        $this ->display();
    }
}