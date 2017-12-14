<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/8/9 0009
 * Time: 11:35
 */

namespace Admin\Controller;
use Think\Controller;

class QuanyixieyiController extends Controller
{
   function quanyixieyi(){
    $info=D('Quanyixieyi')->select();
    $this->assign('info',$info);
    //dump($info);die;
    $this->display();
   }
}