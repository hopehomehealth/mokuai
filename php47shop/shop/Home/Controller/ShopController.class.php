<?php
namespace Home\Controller;
use Tools\HomeController;

/***
    超市控制器
    实现对购物车工具的使用，进而给购物车进行商品的增、删、改、查功能实现
*/

class ShopController extends HomeController{
    //给购物车添加商品
    function addCart(){
        $goods_id = I('get.goods_id');//接收goods_id参数信息
        //把需要存储给购物车的商品信息查询出来
        $goodsinfo = D('Goods')->find($goods_id);
        //组装存储给购物车的信息
        //$goods  array('goods_id'=>'10','goods_name'=>'诺基亚','goods_price'=>'1750','goods_buy_number'=>'1','goods_total_price'=>1750);
        $cartinfo['goods_id'] = $goodsinfo['goods_id'];
        $cartinfo['goods_name'] = $goodsinfo['goods_name'];
        $cartinfo['goods_price'] = $goodsinfo['goods_price'];
        $cartinfo['goods_buy_number'] = 1;
        $cartinfo['goods_total_price'] = $goodsinfo['goods_price'];

        //使用购物车类
        $cart = new \Tools\Cart();
        $cart -> add($cartinfo);  //添加商品到购物车

        //获取商品的"总数量、总价格"返回
        $numberprice = $cart -> getNumberPrice();
        echo json_encode($numberprice);
    }

    //购物车商品数量修改
    function changeNumber(){
        $num = I('get.num');
        $goods_id = I('get.goods_id');

        $cart = new \Tools\Cart();
        $xiaoji = $cart -> changeNumber($num,$goods_id);
        //获得购物车商品总价格(总数量)
        $numberprice = $cart -> getNumberPrice();
        $arr['xiaoji'] = $xiaoji;  //被改数量商品的小计价格
        $arr['zongji'] = $numberprice['price'];//全部购物车的总价格
        echo json_encode($arr);
    }

    //展示购物车商品信息
    function flow1(){
        //获得购物车的商品信息，传递给模板展示
        $cart = new \Tools\Cart();
        $cartinfo = $cart -> getCartInfo();
        //获得商品对应的图片
        //$cartinfo = array(102=>array(id,name,price...),235=>array(id,name,price..),417=>array(id,name,price..))
        //$goods_ids = "102,235,417";
        $goods_ids = arrayToString($cartinfo,'goods_id');

        $picinfo = D('Goods')->field('goods_id,goods_small_logo')->select($goods_ids);
        //整合$picinfo
        $picTmp = array();
        foreach($picinfo as $k => $v){
            $picTmp[$v['goods_id']] = $v['goods_small_logo'];
        }
        /*dump($picTmp);
        array(3) {
          [25] => string(44) "./Public/logo/2016-05-24/s_5743fa03f2de9.jpg"
          [27] => string(44) "./Public/logo/2016-05-28/s_5748e6b8298ef.jpg"
          [28] => string(44) "./Public/logo/2016-05-29/s_574a35b8965f9.jpg"
        }*/
        $this -> assign('picTmp',$picTmp);
        $this -> assign('cartinfo',$cartinfo);

        $numberprice = $cart -> getNumberPrice(); //获得购物车商品“总数量、总价格”
        $this -> assign('numberprice',$numberprice);
        $this -> display();
    }

    //准备生成订单
    function flow2(){
        //登录判断
        $user_name = session('user_name');
        if(empty($user_name)){
            //跳转到登录页面去
            //定义回跳地址，session定义
            session('back_url','Shop/flow2');

            $this -> redirect('User/login');
            exit;
        }

        /*****获得购物车商品、及对应图片信息******/
        $cart = new \Tools\Cart();
        //购物车商品信息
        $cartinfo = $cart -> getCartInfo();
        $goods_ids = arrayToString($cartinfo,'goods_id');
        //获得购物车商品的图片信息
        $picinfo = D('Goods')->field('goods_id,goods_small_logo')->select($goods_ids);
        $picTmp = array();
        foreach($picinfo as $k => $v){
            $picTmp[$v['goods_id']] = $v['goods_small_logo'];
        }
        //获得购物车商品的总价格信息
        $numberprice = $cart -> getNumberPrice(); //获得购物车商品“总数量、总价格”
        $this -> assign('picTmp',$picTmp);
        $this -> assign('cartinfo',$cartinfo);
        $this -> assign('numberprice',$numberprice);
        /*****获得购物车商品、及对应图片信息******/

        $this -> display();
    }

    //生成订单并实现付款逻辑
    function makeOrderAndPay(){
        //1) 生成订单
        //dump($_POST);
        //① 生成订单记录信息
        $info['order_number'] = "itcast_".date("YmdHis")."_".mt_rand(1000,9999);
        $info['order_pay'] = I('post.order_pay');
        $info['order_fapiao_title'] = I('post.order_fapiao_title');
        $info['order_fapiao_company'] = I('post.order_fapiao_company');
        $info['order_fapiao_content'] = I('post.order_fapiao_content');
        $info['cgn_id'] = I('post.cgn_id');
        $info['add_time'] = $info['upd_time'] = time();
        $cart = new \Tools\Cart(); //购物车对象
        $numberprice = $cart -> getNumberPrice();
        $info['order_price'] = $numberprice['price'];

        $orderid = D('Order')->add($info); //返回新记录的主键id值

        //② 生成订单对应的商品记录信息
        $cartinfo = $cart -> getCartInfo();
        foreach($cartinfo as $k => $v){
            $arr['order_id'] = $orderid;
            $arr['goods_id'] = $v['goods_id'];
            $arr['goods_price'] = $v['goods_price'];
            $arr['goods_number'] = $v['goods_buy_number'];
            $arr['goods_total_price'] = $v['goods_total_price'];
            D('OrderGoods')->add($arr);
        }

        //③ 清空购物车商品信息
        $cart -> delall();
        //2) 付款

        //收集支付信息 付款金额、订单号码、订单名称、订单描述、商品展示地址
        //WIDout_trade_no--订单号
        //WIDsubject--订单名称
        //WIDtotal_fee--付款金额
        //WIDbody--订单描述
        //WIDshow_url--商品展示地址
        //使用post方式把以上5个信息传递给alipayapi.php接口文件
        $order_number = $info['order_number'];
        $order_price = $info['order_price'];
        $fm = <<<eof
        <form action="/Common/Plugin/alipay/alipayapi.php" method="post">
            <input type="hidden" name="WIDout_trade_no" value="$order_number" />
            <input type="hidden" name="WIDsubject" value="购买华为999手机" />
            <input type="hidden" name="WIDtotal_fee" value="$order_price" />
            <input type="hidden" name="WIDbody" value="" />
            <input type="hidden" name="WIDshow_url" value="" />
        </form>
        <script type="text/javascript">
            document.getElementsByTagName('form')[0].submit();
        </script>
eof;
        echo $fm;
    }
}

