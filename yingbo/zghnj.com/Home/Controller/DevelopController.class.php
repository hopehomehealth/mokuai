<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/4/24 0024
 * Time: 16:06
 */
namespace Home\Controller;
use Common\Common\HomeController;
class DevelopController extends HomeController
{
    function __construct(){
        parent::__construct();
        $category = M('category')->where("pid = 8 AND is_show = 1")->order("sort,cat_id")->select();
        $this->assign('category',$category);
    }
	//产业概览
    function overview(){
        $title = '产业概览_产业发展_中国缓粘结网';
        $this->assign('title',$title);
        $this->display();
    }
    //工程材料与机具
    function material(){
        $model = M('news');
        $news = $model->where("cat_id = 10 AND is_show = '0'")->order("sort,upd_time desc")->select();
        $this->assign('news',$news);
        $leaguers = M('leaguer')->where("is_show = 1 AND cat_id = 10")->order("sort,ctime desc")->select();
        $this->assign('leaguers',$leaguers);
        $title = '工程材料与机具_产业发展_中国缓粘结网';
        $this->assign('title',$title);
        $this->display();
    }
    //工程设计与施工  
    function designer(){
        $model = M('news');
        $news = $model->where("cat_id = 11 AND is_show = '0'")->order("sort,upd_time desc")->select();
        $this->assign('news',$news);
        $leaguers = M('leaguer')->where("is_show = 1 AND cat_id = 11")->order("sort,ctime desc")->select();
        $this->assign('leaguers',$leaguers);
        $title = '工程设计与施工_产业发展_中国缓粘结网';
        $this->assign('title',$title);
        $this->display();
    }
    //产品检验检测     
    function check(){
        $model = M('news');
        $news = $model->where("cat_id = 12 AND is_show = '0'")->order("sort,upd_time desc")->select();
        foreach($news as $key=>$value){
            $news[$key]['content'] = trim(cutstr(strip_tags($value['content']),300));
        }
        $this->assign('news',$news);
        $title = '产品检验检测_产业发展_中国缓粘结网';
        $this->assign('title',$title);
        $this->display();
    }
    //详细信息
    function detail(){
        $id = intval($_GET['id']);
        $detail = M('news')->alias("n")->field("n.news_id,n.cat_id,n.title,n.content,n.upd_time,n.author,n.auth")->join("left join __CATEGORY__ as c on c.cat_id = n.cat_id")->where("n.news_id = {$id} AND n.cat_id = 12 AND n.is_show = '0'")->find();
        if(!$detail){
            echo '文章不存在';exit;
        }
        $detail['content'] = htmlspecialchars_decode($detail['content']);
        $this->assign('detail',$detail);
        $title = $detail['title'].'_快速检验方法_中国缓粘结网';
        $this->assign('title',$title);
        $this->display();
    }
}