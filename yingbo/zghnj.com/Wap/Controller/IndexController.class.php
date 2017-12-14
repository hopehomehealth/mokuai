<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/4/24 0024
 * Time: 16:06
 */
namespace Wap\Controller;
use Common\Common\HomeController;
class IndexController extends HomeController
{
    function index(){
    	/*$newsmodel = M('news'); 
    	$catemodel = M('category');
    	//关注热点
    	$hot = $newsmodel->where("is_show = '0' AND cat_id = 0")->order('upd_time desc')->limit(1)->select();
    	$hot[0]['content'] = strip_tags($hot[0]['content']);
    	$this->assign('hot',$hot[0]);
    	//新闻资讯
    	$news = $newsmodel->where("is_show = '0' AND (cat_id = 6 or cat_id = 7)")->order("sort,upd_time desc")->limit(4)->select();
    	foreach($news as $k1=>$v1){
    		$news[$k1]['content'] = strip_tags($v1['content']);
    	}
    	$this->assign('news',$news);
    	//技术前沿
    	$catinfo1 = $catemodel->field("introduce")->find(1);
    	$this->assign('catinfo1',$catinfo1);
    	$technology = $newsmodel->where("is_show = '0' AND (cat_id = 3 or cat_id = 4)")->order("sort,upd_time desc")->limit(3)->select();
    	foreach($technology as $k2=>$v2){
    		$technology[$k2]['content'] = strip_tags($v2['content']);
    	}
    	//dump($technology);exit;
    	$this->assign('technology',$technology);
    	//产业发展
    	$catinfo2 = $catemodel->field("introduce")->find(8);
    	$this->assign('catinfo2',$catinfo2);
    	//产品与服务
    	$types = M('type')->where("is_show = '0'")->order("sort,type_id")->limit(5)->select();
    	$product = M('product');
    	foreach($types as $k3=>$v3){
    		$types[$k3]['products'] = $product->where("type_id = {$v3['type_id']} AND is_show = 1")->order("ctime desc")->limit(3)->select();
    	}
        $this->assign('types',$types);
    	//应用客户
    	$customers = M('link')->where("is_show = 1")->order("sort,ctime desc")->select();
        $this->assign('customers',$customers);
        //工程图片
        //$cases = M('case')->where("is_show = 1")->order("sort,id desc")->select();
        //$this->assign('cases',$cases);
        //交流空间
        $analysis = $newsmodel->where("cat_id = 23 AND is_show = '0'")->order("sort,upd_time desc")->limit(4)->select();
        $this->assign('analysis',$analysis);*/
        $title = '中国缓粘结网';
        $this->assign('title',$title);
        $category = M('category')->where("pid = 0 AND is_show = 1")->order("sort,cat_id")->select();
        $this->assign('category',$category);
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
            $p = new \Think\Page($count,15);
            $count = $model
                ->alias('n')
                ->join('left join __CATEGORY__ c on n.cat_id=c.cat_id')
                ->where($map)
                ->count();
            $result =  $model
                ->alias('n')
                ->field('n.news_id,n.content,n.title,n.address,n.datetime,n.pic,c.ctrl,c.action')
                ->join('left join __CATEGORY__ c on n.cat_id=c.cat_id')
                ->where($map)
                ->order('n.upd_time desc')
                ->limit($p->firstRow.','.$p->listRows)
                ->select();
            foreach($result as $key=>$value){
                $result[$key]['href'] = 'http://'.$_SERVER['HTTP_HOST'].'/index.php/'.MODULE_NAME.'/'.$value['ctrl'].'/detail/id/'.$value['news_id'];
                $result[$key]['content'] = trim(cutstr(strip_tags($value['content']),60));
                if(!empty($value['datetime'])){
                    $result[$key]['datetime'] = date('Y.m.d',strtotime($value['datetime']));
                }
                if(empty($value['address'])){
                    $result[$key]['address'] = '';
                }
            }
        }else{
            $result = null;
        }
        if(IS_AJAX){
            if($result){
                foreach($result as $_key=>$_value){
                    $result[$_key]['pic'] = substr($_value['pic'],1);
                }
                $this->ajaxReturn(array('error'=>0,'content'=>$result));
            }else{
                exit;
            }
        }
        $this->assign('count',$count);
        $this->assign('result',$result);
        $title = $_GET['keywords'].'_搜索结果_中国缓粘结网';
        $this->assign('title',$title);
        $this->display();
    }
}