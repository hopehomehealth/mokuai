<?php
namespace Model;
use Think\Model;

//model模型类

class OrderModel extends Model {
    //数据写入成功后回调方法
    protected function _after_insert($data,$options){
        //dump($data);  array(['order_id']=>xxxx ...)
        //维护"订单-商品表"的数据,获得购物车商品并存储给sp_order_goods表
        $cart = new \Tools\Cart();
        $cartinfo = $cart -> getCartInfo();
        foreach($cartinfo as $k => $v){
            $arr = array(
                'order_id'          => $data['order_id'],
                'goods_id'          => $v['goods_id'],
                'goods_price'       => $v['goods_price'],
                'goods_number'      => $v['goods_buy_number'],
                'goods_total_price' => $v['goods_total_price'],
            );
            D('OrderGoods')->add($arr);
        }
        //清空购物车商品信息
        $cart -> delAll();
    }
}
