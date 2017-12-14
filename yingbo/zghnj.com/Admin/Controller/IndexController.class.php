<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/8/9 0009
 * Time: 11:35
 */

namespace Admin\Controller;
use Common\Common\AdminController;

class IndexController extends AdminController
{
    function index(){
    	//最新文章
    	$news = M('news')->alias('n')->field("n.*,c.cat_name")->join("left join __CATEGORY__ as c on c.cat_id = n.cat_id")->where("n.is_show = '0'")->order("n.upd_time desc")->limit(5)->select();
    	$this->assign('news',$news);
    	//最新加入会员
    	$users = M('user')->order("ctime desc")->limit(5)->select();
    	$this->assign('users',$users);
        $this->display();
    }
}