<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/8/9 0009
 * Time: 11:35
 */

namespace Admin\Controller;
use Common\Common\AdminController;

class SlandersController extends AdminController
{
    function showlist(){
        $this->display();
    }
    function userdetail(){
    	$this->display();
    }
}