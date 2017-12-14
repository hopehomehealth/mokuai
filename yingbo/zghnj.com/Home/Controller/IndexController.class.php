<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/4/24 0024
 * Time: 16:06
 */
namespace Home\Controller;
use Common\Common\HomeController;
class IndexController extends HomeController
{
    function index(){
    	$newsmodel = M('news'); 
    	$catemodel = M('category');
    	//关注热点
    	$hot = $newsmodel->where("is_show = '0' AND cat_id = 0")->order('upd_time desc')->limit(1)->select();
    	$hot[0]['content'] = strip_tags($hot[0]['content']);
    	$this->assign('hot',$hot[0]);
    	//新闻资讯
    	$news = $newsmodel->where("is_show = '0' AND (cat_id = 6 or cat_id = 7)")->order("sort,upd_time desc")->limit(4)->select();
    	foreach($news as $k1=>$v1){
    		$news[$k1]['content'] = cutstr(strip_tags($v1['content']),50);
    	}
    	$this->assign('news',$news);
    	//技术前沿
    	$catinfo1 = $catemodel->field("introduce")->find(1);
    	$this->assign('catinfo1',$catinfo1);
    	$subcatlist1 = $catemodel->where("is_show = 1 AND pid = 1")->order("sort")->limit(3)->select();
        $this->assign('subcatlist1',$subcatlist1);
    	//产业发展
    	$catinfo2 = $catemodel->field("introduce")->find(8);
    	$this->assign('catinfo2',$catinfo2);
        $subcatlist2 = $catemodel->where("is_show = 1 AND pid = 8 AND cat_id != 9")->order("sort")->limit(3)->select();
        $this->assign('subcatlist2',$subcatlist2);
    	//产品与服务
    	$subcatlist3 = $catemodel->where("is_show = 1 AND pid = 13")->order("sort")->limit(4)->select();
        $this->assign('subcatlist3',$subcatlist3);
    	//应用客户
    	$customers = M('link')->where("is_show = 1")->order("sort,ctime desc")->select();
        $this->assign('customers',$customers);
        //工程图片
        //$cases = M('case')->where("is_show = 1")->order("sort,id desc")->select();
        //$this->assign('cases',$cases);
        //交流空间
        $analysis = $newsmodel->where("cat_id = 23 AND is_show = '0'")->order("sort,upd_time desc")->limit(4)->select();
        $this->assign('analysis',$analysis);
        $title = '中国缓粘结网';
        $this->assign('title',$title);
        $this->display();
    }
    function search(){
        if(isset($_GET['keywords']) && !empty($_GET['keywords'])){
            $search = $_GET['keywords'];
            $map['n.title'] = array('LIKE',"%{$search}%");
            $map['c.cat_name'] = array('LIKE',"%{$search}%");
            $map['n.content'] = array('LIKE',"%{$search}%");
            $map['_logic'] = 'OR';
        }
        if(isset($map)){
            $model = M('news');
            $count = $model
                ->alias('n')
                ->join('left join __CATEGORY__ c on n.cat_id=c.cat_id')
                ->where($map)
                ->count();
            $p = new \Think\Page($count,15);
            $result =  $model
                ->alias('n')
                ->field('n.news_id,n.content,n.title,n.address,n.datetime,n.upd_time,n.pic,c.ctrl,c.action')
                ->join('left join __CATEGORY__ c on n.cat_id=c.cat_id')
                ->where($map)
                ->order('n.upd_time desc')
                ->limit($p->firstRow.','.$p->listRows)
                ->select();
            foreach($result as $key=>$value){
                $result[$key]['href'] = 'http://'.$_SERVER['HTTP_HOST'].'/index.php/'.MODULE_NAME.'/'.$value['ctrl'].'/detail/id/'.$value['news_id'];
                $result[$key]['content'] = trim(cutstr(strip_tags($value['content']),200));
                if(!empty($value['datetime'])){
                    $result[$key]['datetime'] = date('Y.m.d',strtotime($value['datetime']));
                }
                if(empty($value['address'])){
                    $result[$key]['address'] = '';
                }
            }
            $page = $p->show();
            $this->assign('page',$page);
        }else{
            $result = null;
        }
        $this->assign('count',$count);
        $this->assign('result',$result);
        $title = $_GET['keywords'].'_搜索结果_中国缓粘结网';
        $this->assign('title',$title);
        $this->display();
    }
}