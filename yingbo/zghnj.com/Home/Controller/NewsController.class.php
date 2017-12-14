<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/4/24 0024
 * Time: 16:06
 */
namespace Home\Controller;
use Common\Common\HomeController;
class NewsController extends HomeController
{
	function __construct(){
		parent::__construct();
        $category = M('category')->where("pid = 5 AND is_show = 1")->order("sort,cat_id")->select();
        $this->assign('category',$category);
	}
	//行业新闻
    function industries(){
    	$model = M('news');
        $count = $model->where("cat_id = 6 AND is_show = '0'")->count();
        $p = new \Think\Page($count,10);
    	$news = $model->where("cat_id = 6 AND is_show = '0'")->order("sort,upd_time desc")->limit($p->firstRow.','.$p->listRows)->select();
    	foreach($news as $key=>$value){
    		$news[$key]['content'] = trim(cutstr(strip_tags($value['content']),200));
    	}
        $page = $p->show();
        $this->assign('page',$page);
    	$this->assign("news",$news);
        $title = '行业新闻_新闻资讯_中国缓粘结网';
        $this->assign('title',$title);
        $this->display();
    }
    //行业活动
    function activities(){
    	$model = M('news');
    	$nowtime = date('Y-m-d',NOW_TIME);
        $count = $model->where("cat_id = 7 AND is_show = '0' AND datetime < '$nowtime'")->count();
        $p = new \Think\Page($count,4);
        $review = $model->where("cat_id = 7 AND is_show = '0' AND datetime < '$nowtime'")->order("sort,datetime desc")->limit($p->firstRow.','.$p->listRows)->select();
        foreach($review as $key=>$value){
            $review[$key]['content'] = trim(cutstr(strip_tags($value['content']),1));
        }
        if(IS_AJAX){
            if($review){
                foreach($review as $_key=>$_value){
                    $review[$_key]['pic'] = substr($_value['pic'],1);
                    $review[$_key]['datetime'] = date('Y.m.d',strtotime($_value['datetime']));
                }
                $this->ajaxReturn(array('error'=>0,'content'=>$review));
            }else{
                exit;
            }
        }
        $this->assign("review",$review);
        

    	$foreshow = $model->where("cat_id = 7 AND is_show = '0' AND datetime > '$nowtime'")->order("sort,datetime")->select();
    	foreach($foreshow as $key=>$value){
    		$foreshow[$key]['content'] = strip_tags($value['content']);
    	}
    	$this->assign("foreshow",$foreshow);
        $title = '行业活动_新闻资讯_中国缓粘结网';
        $this->assign('title',$title);
        $this->display(); 
    }
    function detail(){
    	$id = intval($_GET['id']);
    	$detail = M('news')->alias("n")->field("n.news_id,n.cat_id,n.title,n.content,n.upd_time,n.author,n.auth")->join("left join __CATEGORY__ as c on c.cat_id = n.cat_id")->where("n.news_id = {$id} AND (n.cat_id = 6 OR n.cat_id = 7 OR n.cat_id = 0) AND n.is_show = '0'")->find();
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
        $title = $detail['title'].'_新闻资讯_中国缓粘结网';
        $this->assign('title',$title);
    	$this->display();
    }
}