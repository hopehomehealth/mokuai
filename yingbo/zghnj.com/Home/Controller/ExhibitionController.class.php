<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/4/24 0024
 * Time: 16:06
 */
namespace Home\Controller;
use Common\Common\HomeController;
class ExhibitionController extends HomeController
{
    function __construct()
    {
        parent::__construct();
        $category = M('category')->where("pid = 13 AND is_show = 1")->order("sort,cat_id")->select();
        $this->assign('category',$category);
    }
	//产品系列   
    function product(){
        $product = M('product');
        $count = $product->where("is_show = 1")->count();
        $p = new \Think\Page($count,10);
        $products = $product->where("is_show = 1")->order("ctime desc")->limit($p->firstRow.','.$p->listRows)->select();
        foreach($products as $_key=>$_value){
            $products[$_key]['features'] = unserialize(gzuncompress(base64_decode($_value['features'])));
        }
        $page = $p->show();
        $this->assign('page',$page);
        $this->assign('products',$products);
        $title = '产品系列_产品与服务_中国缓粘结网';
        $this->assign('title',$title);
        $this->display();
    }
    //技术服务
    function service(){
        $this->display();
    }
    //产品详情
    function detail(){
        $pdt_id = intval($_GET['pdt_id']);
        $detail = M('product')->find($pdt_id);
        $detail['introduce'] = htmlspecialchars_decode($detail['introduce']);
        $this->assign('detail',$detail);
        $photos = M('product_photo')->where("pdt_id = {$pdt_id}")->select();
        $this->assign('photos',$photos);
        $title = '产品详细介绍_产品与服务_中国缓粘结网';
        $this->assign('title',$title);
        $this->display();
    }
    //应用案例  
    function cases(){
        $case = M('case');
        $count = $case->where("is_show = 1")->count();
        $p = new \Think\Page($count,9);
        $cases = $case->where("is_show = 1")->order("sort,id desc")->limit($p->firstRow.','.$p->listRows)->select();
        $page = $p->show();
        $this->assign('page',$page);
        $this->assign('cases',$cases);
        $title = '应用案例_产品与服务_中国缓粘结网';
        $this->assign('title',$title);
        $this->display();
    }
    //应用客户  
    function customer(){
        $linkmodel = M('link');
        $count = $linkmodel->where("is_show = 1")->count();
        $p = new \Think\Page($count,36);
        $customers = $linkmodel->where("is_show = 1")->order("sort,ctime desc")->limit($p->firstRow.','.$p->listRows)->select();
        $page = $p->show();
        $this->assign('page',$page);
        $this->assign('customers',$customers);
        $title = '应用客户_产品与服务_中国缓粘结网';
        $this->assign('title',$title);
        $this->display();
    }
}