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
        C('SHOW_PAGE_TRACE',false);

        //最新留言
        $adviceinfo = D('Advice')->order('add_time desc')->limit(0,5)->select();
        $this->assign('adviceinfo',$adviceinfo);

		//最新注册会员
        $userlist = M('user')->order('user_id desc')->limit(0,4)->select();
        $this->assign('userlist',$userlist);

		//最新帖子
        $postlist = M('posts')->order('ctime desc')->limit(0,4)->select();
        $this->assign('postlist',$postlist);

		//最新博文
        $articles = M('article')->order('add_time desc')->limit(0,4)->select();
        $this->assign('articles',$articles);
        $this->display();
    }
}