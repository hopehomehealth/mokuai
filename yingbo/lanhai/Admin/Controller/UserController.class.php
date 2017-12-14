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
        if($_GET['search']){
            $search = $_GET['search'];
            $map['u.username'] = array('LIKE',"%{$search}%");
        }else{
            $map = '';
        }
        $bbsset = M('bbs')->field("pg_admin")->find();//获取论坛分页设置
        $user_model = M('user');
        $count = $user_model-> alias('u')-> join('cq_userdetail as d on d.user_id = u.user_id') ->where($map)-> count();
		//echo $count;
        $p = new \Think\Page($count,$bbsset['pg_admin']);
        $userList = $user_model
				  -> alias('u')
			      -> field('u.*,d.score as score1')
				  -> join('cq_userdetail as d on d.user_id = u.user_id')
                  -> where($map)
                  -> order('u.add_time desc')
                  -> limit($p->firstRow.','.$p->listRows)
                  -> select();
        $page = $p -> show();
        $nowpage = $_GET['p']?$_GET['p']:1;
        $No1 = ($nowpage-1)*$bbsset['pg_admin']+1;
        $this->assign('No1',$No1);
        $this ->assign('page',$page);
        //dump($userList);exit;
        $this -> assign('userList',$userList);
        $this->display();
    }
    function userdetail(){
        $userid = $_GET['user_id'];
        $user_model = M('user');
        $detail = $user_model -> alias('u') -> field("u.username,u.userhead,u.lastlogin,u.level,u.sex,d.mysign,d.birth,d.address,d.phone,d.qq,d.hobby") -> join("cq_userdetail as d on d.user_id = u.user_id") -> where("u.user_id = {$userid}") -> select();//用户资料
        // /dump($detail);
        $this->assign('detail',$detail[0]);
    	$this->display();
    }
}