<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/4/24 0024
 * Time: 16:06
 */
namespace Home\Controller;
use Common\Common\HomeController;
class SingleController extends HomeController
{
    //联系我们
    function contact(){
        $detail = M('news')->field("content")->where("cat_id = 25")->order("upd_time desc")->find();
        if(!$detail){
            echo '文章不存在';exit;
        }
        $detail['content'] = htmlspecialchars_decode($detail['content']);
        $this->assign('detail',$detail);
        $pagename = '联系我们';
        $this->assign('pagename',$pagename);
        $title = $detail['title'].'_中国缓粘结网';
        $this->assign('title',$title);
        $this->display('detail');
    }
    //法律声明
    function clare(){
        $detail = M('news')->field("content")->where("cat_id = 24")->order("upd_time desc")->find();
        if(!$detail){
            echo '文章不存在';exit;
        }
        $detail['content'] = htmlspecialchars_decode($detail['content']);
        $this->assign('detail',$detail);
        $pagename = '法律声明';
        $this->assign('pagename',$pagename);
        $title = '法律声明_中国缓粘结网';
        $this->assign('title',$title);
        $this->display('detail');
    }
    //帮助中心
    function help(){
        $detail = M('news')->field("content")->where("cat_id = 26")->order("upd_time desc")->find();
        if(!$detail){
            echo '文章不存在';exit;
        }
        $detail['content'] = htmlspecialchars_decode($detail['content']);
        $this->assign('detail',$detail);
        $pagename = '帮助中心';
        $this->assign('pagename',$pagename);
        $title = '帮助中心_中国缓粘结网';
        $this->assign('title',$title);
        $this->display('detail');
    }
}