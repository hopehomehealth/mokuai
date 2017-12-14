<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/4/24 0024
 * Time: 16:06
 */
namespace Home\Controller;
use Common\Common\HomeController;
class CommunicateController extends HomeController
{
    function __construct(){
        parent::__construct();
        $category = M('category')->where("pid = 18 AND is_show = 1")->order("sort,cat_id")->select();
        $this->assign('category',$category);
    }
	//常识解答
    function knowledge(){
        $model = M('news');
        $count = $model->where("cat_id = 19 AND is_show = '0'")->count();
        $p = new \Think\Page($count,10);
        $news = $model->where("cat_id = 19 AND is_show = '0'")->order("sort,upd_time desc")->limit($p->firstRow.','.$p->listRows)->select();
        foreach($news as $key=>$value){
            $news[$key]['content'] = strip_tags($value['content']);
        }
        $page = $p->show();
        $this->assign("page",$page);
        $this->assign("news",$news);
        $title = '常识解答_交流空间_中国缓粘结网';
        $this->assign('title',$title);
        $this->display();
    }
    //会员专属
    function exclusive(){
        $model = M('news');
        $count = $model->where("cat_id = 20 AND is_show = '0'")->count();
        $p = new \Think\Page($count,10);
        $news = $model->where("cat_id = 20 AND is_show = '0'")->order("sort,upd_time desc")->limit($p->firstRow.','.$p->listRows)->select();
        foreach($news as $key=>$value){
            $news[$key]['content'] = strip_tags($value['content']);
        }
        $page = $p->show();
        $this->assign("page",$page);
        $this->assign("news",$news);
        $title = '会员专属_交流空间_中国缓粘结网';
        $this->assign('title',$title);
        $this->display();
    }
    //经典解析
    function analysis(){
        $model = M('news');
        $count = $model->where("cat_id = 23 AND is_show = '0'")->count();
        $p = new \Think\Page($count,6);
        $news = $model->where("cat_id = 23 AND is_show = '0'")->order("sort,upd_time desc")->limit($p->firstRow.','.$p->listRows)->select();
        foreach($news as $key=>$value){
            $news[$key]['content'] = trim(cutstr(strip_tags($value['content']),160));
        }
        $page = $p->show();
        $this->assign("page",$page);
        $this->assign("news",$news);
        $title = '经典解析_交流空间_中国缓粘结网';
        $this->assign('title',$title);
        $this->display();
    }
    //详情页
    function detail(){
        $id = intval($_GET['id']);
        $detail = M('news')->alias("n")->field("n.news_id,n.cat_id,n.title,n.content,n.upd_time,n.author,n.auth")->join("__CATEGORY__ as c on c.cat_id = n.cat_id")->where("n.news_id = {$id} AND (n.cat_id = 19 OR n.cat_id = 20 OR n.cat_id = 23) AND n.is_show = '0'")->find();
        if(!$detail){
            echo '文章不存在';exit;
        }
        if(($detail['auth'] == 1) && !isset($_SESSION['loginstatus'])){
            $_SESSION['user']['redirect'] = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
            if(isset($_GET['login'])){
                header("location:".$_SERVER['HTTP_REFERER']);exit;
            }else{
                header("location:".$_SERVER['HTTP_REFERER'].'?login');exit;
            }
        }
        $detail['content'] = htmlspecialchars_decode($detail['content']);
        $this->assign('detail',$detail);
        //上一篇
        $prenews = M('news')->field("news_id,title")->where("cat_id = {$detail['cat_id']} AND news_id < {$detail['news_id']}")->order("news_id desc")->limit(1)->select();
        //下一篇
        $nextnews = M('news')->field("news_id,title")->where("cat_id = {$detail['cat_id']} AND news_id > {$detail['news_id']}")->order("news_id")->limit(1)->select();
        $this->assign('prenews',$prenews[0]);
        $this->assign('nextnews',$nextnews[0]);
        $title = $detail['title'].'_交流空间_中国缓粘结网';
        $this->assign('title',$title);
        $this->display();
    }
}