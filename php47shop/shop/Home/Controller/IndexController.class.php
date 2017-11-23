<?php
namespace Home\Controller;
use Tools\HomeController;

class IndexController extends HomeController {
    public function index(){
        //通过redis获得最近登录系统的会员信息
        //(只有5个会员)
        //$recentlyinfo = $this -> redis -> lrange('newlogin',0,4);
        //$this -> assign('recentlyinfo',$recentlyinfo);

        $this -> display();
    }
}
