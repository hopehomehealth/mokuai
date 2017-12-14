<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/8/9 0009
 * Time: 11:35
 */

namespace Admin\Controller;
use Think\Controller;

class LianmengxieyiController extends Controller
{
   function lianmengxieyi(){
    $info=D('Lianmengxieyi')->select();
    $this->assign('info',$info);
    //dump($info);die;
    $this->display();
   }
}