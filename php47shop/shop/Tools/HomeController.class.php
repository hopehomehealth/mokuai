<?php

namespace Tools;
use Think\Controller;

class HomeController extends Controller{
    protected $mem = null; //memcache对象
    protected $redis = null; //redis对象
    //构造方法
    function __construct(){
        parent::__construct();

        //$this -> mem = new \Memcache();
        //$this -> mem -> connect('localhost',11211);

        //$this -> redis = new \Redis();
        //$this -> redis -> connect('localhost',6379);

        //读取memcache的数据
        //$catinfoA = $this -> mem -> get('catinfoA');
        //$catinfoB = $this -> mem -> get('catinfoB');
        //$catinfoC = $this -> mem -> get('catinfoC');

        //获得并展示商品分类信息
        $category = D('category');
        if(empty($catinfoA)){
            //echo "AAA";
            //① 第1级分类
            $catinfoA = $category
                ->where(array('cat_level'=>'0'))
                ->select();
            //把数据库获得数据再存储给memcache，供下次使用
            //$this -> mem ->set('catinfoA',$catinfoA);
        }
        if(empty($catinfoB)){
            //② 第2级分类
            //echo "BB";
            $catinfoB = $category
                ->where(array('cat_level'=>'1'))
                ->select();
            //$this -> mem ->set('catinfoB',$catinfoB);
        }
        if(empty($catinfoC)){
            //③ 第3级分类
            //echo "CCC";
            $catinfoC = $category
                ->where(array('cat_level'=>'2'))
                ->select();
            //$this -> mem ->set('catinfoC',$catinfoC);
        }

        //assign的变量信息在“普通和布局”模板中都可以使用
        $this -> assign('catinfoA',$catinfoA);
        $this -> assign('catinfoB',$catinfoB);
        $this -> assign('catinfoC',$catinfoC);
    }
}
