<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/6/13
 * Time: 11:37
 */
namespace Mobile\Controller;
use Common\Common\FooterController;
//use Think\Controller;
class ProductController extends FooterController {
    function fuwu(){

        $daohang = array(
            'first'=>'选择服务',
        );
        $this -> assign('daohang',$daohang);

        $productinfo = D('Product')->select();
        $catinfo = D('Productclass')->select();
        foreach($catinfo as $k =>$v){
            $catinfo[$k]['productinfo']= array();
            foreach($productinfo as $kk => $vv){
                if($v['cat_id'] == $vv['cat_id']){
                    $catinfo[$k]['productinfo'][] = $vv;
                }
            }
        }
//      dump($catinfo);die;
        $this->assign('catinfo',$catinfo);
        $this ->display();
    }

    function detail(){
        $daohang = array(
            'first'=>'选择服务',
        );
        $this -> assign('daohang',$daohang);

        $pro_id= I('get.pro_id');
        $product = D('Product');
        $info=$product->where(array('pro_id'=>$pro_id))->find();
        $this->assign('info',$info);
        $this->display();
    }
}