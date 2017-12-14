<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/6/13
 * Time: 11:37
 */
namespace Home\Controller;
use Common\Common\ComController;

class CartController extends ComController{
    //购物车添加商品信息
    function  addCart($goods_id,$spec){
		if(!isset($_SESSION['flag'])){
			echo json_encode(array('error'=>1));return;
		}else{
			$userid = $_SESSION['userInfo']['userid'];
		}
        //根据$goods_id获得其他信息(name/price/number/totalprice)
        $goodsinfo = D('Goods')
            ->field('cycle,goods_name,price,mid_logo')
            ->find($goods_id);
		if(($goodsinfo['cycle'] == 0) || ($goodsinfo['cycle'] == '')){

		}else{
			$order = M('order')->where("userid = {$userid} AND goods_id = {$goods_id} AND order_status = '0'")->select();
			if($order){
				echo json_encode(array('error'=>2));return;
			}
		}
        $arr = array(
            'goods_id'=>$goods_id,
            'goods_name'=>$goodsinfo['goods_name'],
            'mid_logo'=>$goodsinfo['mid_logo'],
            'price'=>$goodsinfo['price'],
            'spec'=>$spec,
            'goods_buy_number'=>1,
            'goods_total_price'=>$goodsinfo['price'],
        );
        //使得$arr进入购物车
        $cart = new \Common\Common\Cart(); //已经获得购物车存在的商品信息了
        $cart -> add($arr);
        //获得购物车商品总数量和总价格，返回给客户端显示
        $numberprice = $cart -> getNumberPrice();
//        dump($numberprice);die;
        echo json_encode($numberprice);
    }

    /***
    对"购物车"指定的商品进行删除
    @param int $goods_id 被删除的商品id信息
     */
    function delGoods($goods_id){
        $cart = new \Common\Common\Cart();
        $cart -> del($goods_id);

        //把购物车最新的商品总价格(总数量)返回
        $numberprice = $cart -> getNumberPrice();
        echo json_encode($numberprice);
    }

    /***
    查看购物车商品列表信息
     */
    function showlist(){
        //获得购物车商品信息
        $cart = new \Common\Common\Cart();
        $cartinfo = $cart -> getCartInfo();
        //dump($cartinfo);
        $this -> assign('cartinfo',$cartinfo);

        //获得购物车“总数量和总价格”
        $numberprice = $cart -> getNumberPrice();
        $this -> assign('numberprice',$numberprice);
//        dump($numberprice);die;


        $this -> display();
    }



    /****
    实现购物车商品数量变化
     */
    function cartChangeNumber($goods_id,$number){
        //使得购物车商品数量变化
        $cart = new \Common\Common\Cart();

        //使得$goods_id的数量发生变化
        //并返回当前商品的"小计"价格
        $nowgoodsprice = $cart -> changeNumber($number,$goods_id);

        //再把购物车商品"总数量、总价格"获取并返回
        $numberprice = $cart -> getNumberPrice();

        $info['nowgoodsprice'] = $nowgoodsprice;
        $info['numberprice'] = $numberprice;

        echo json_encode($info);
    }
    /****
    全选时购物车总价
     */
    function allSelect(){
        //使得购物车商品数量变化
        $cart = new \Common\Common\Cart();


        //再把购物车商品"总数量、总价格"获取并返回
        $numberprice = $cart -> getNumberPrice();

        $info['numberprice'] = $numberprice;

        echo json_encode($info);
    }
    /****
    购物车中选中一个商品的总价
     */
    function oneSelect($goods_id){
        //使得购物车商品数量变化
        $cart = new \Common\Common\Cart();


        //再把购物车商品"总数量、总价格"获取并返回
        $numberprice = $cart -> getOneNumberPrice($goods_id);

        $info['numberprice'] = $numberprice;

        echo json_encode($info);
    }
}