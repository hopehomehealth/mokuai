<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/8/9 0009
 * Time: 11:35
 */

namespace Admin\Controller;
use Common\Common\AdminController;

class UserController extends AdminController
{
    function showlist(){
        if(isset($_GET['keywords'])){
            $keywords = $_GET['keywords'];
            $map['phone'] = "$keywords";
            $map['username'] = array('LIKE',"%{$keywords}%");
            $map['name'] = array('LIKE',"%{$keywords}%");
            $map['_logic'] = 'OR';
        }else{
            $map = '';
        }
        $user_model = M('user');
        $count = $user_model ->where($map)-> count();
        $p = new \Think\Page($count,15);
        $userlist = $user_model ->where($map)->order("ctime desc")->limit($p->firstRow.','.$p->listRows)->select();
        $page = $p -> show();
        $this ->assign('page',$page);
        $this -> assign('userlist',$userlist);
        $this->display();
    }
}