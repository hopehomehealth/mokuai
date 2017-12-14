<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/6/13
 * Time: 11:37
 */
namespace Home\Controller;
use Common\Common\ComController;
class OrderController extends ComController {
    //生成订单数据采集
    function placeorder(){
        $userid = $_SESSION['userInfo']['userid'];
        $setting_model = M('setting');
        //系统设置数据
        $set = $setting_model->find();
        $daohang = array(
            'second'=>'订单提交',
        );



        $detail_model = M('userdetail');
        $dl_model = M('delivery');
        $goods_model = M('goods');
		if(empty($_POST) && empty($_GET['goods_id'])){
			if(cookie('goods_id')){
				$_GET['goods_id'] = cookie('goods_id');
			}else if(cookie('goods_ids')){
				$_POST['id'] = unserialize(cookie('goods_ids'));
			}
		}
        if($_GET['goods_id']){
			if(cookie('goods_ids')){
				cookie('goods_ids',null);
			}
			cookie('goods_id',$_GET['goods_id']);
            $goods_id = $_GET['goods_id'];
            $spec = $_GET['spec'];
            $goodsinfo = $goods_model->find($goods_id);
            $orderList = array();
            $orderList[$goods_id] = array();
            $orderList[$goods_id]['goodsinfo'] = $goodsinfo;
            $orderList[$goods_id]['number'] = 1;
            $orderList[$goods_id]['spec'] = $spec;
            $orderList[$goods_id]['downpay'] = ceil(($goodsinfo['price'] * $set['pct_cash'])/100).'.00';//首付金额
            $orderList[$goods_id]['orderamount'] = $goodsinfo['price'];
            $orderList[$goods_id]['score'] = intval($goodsinfo['price'] - ceil(($goodsinfo['price'] * $set['pct_cash'])/100));//积分数量积分
            $total_my = $orderList[$goods_id]['downpay'];
            $total_sc = $orderList[$goods_id]['score'] * $orderList[$goods_id]['number'];
            //dump($orderList);exit;
        }
        if($_POST){
			if(cookie('goods_id')){
				cookie('goods_id',null);
			}
			cookie('goods_ids',serialize($_POST['id']));
            $arr_id = $_POST['id'];
            $cart = new \Common\Common\Cart();
            $orderList = array();
            foreach($arr_id as $key=>$value){
                $value = str_replace('goods_tr_','',$value);
                $otherinfo = $cart->getOneNumberPrice($value);
                $goodsinfo = $goods_model->find($value);
                $orderList[$value]['spec'] = $otherinfo['spec'];
                $orderList[$value]['number'] = $otherinfo['number'];
				if(($goodsinfo['cycle'] == 0) || ($goodsinfo['cycle'] == '')){
					$orderList[$value]['orderamount'] = $otherinfo['price'];
				}else{
					$order = M('order')->where("userid = {$userid} AND goods_id = {$value} AND order_status = '0'")->select();
					if($order){
						//如果该商品已经下过单并且没有完成则删除
						unset($orderList[$value]);
						continue;
					}
					$orderList[$value]['number'] = 1;
					$orderList[$value]['orderamount'] = $goodsinfo['price'];
				}
                $orderList[$value]['goodsinfo'] = $goodsinfo;
                $orderList[$value]['downpay'] = ceil(($orderList[$value]['orderamount'] * $set['pct_cash'])/100).'.00';//首付金额

                $orderList[$value]['score'] = $orderList[$value]['orderamount'] - $orderList[$value]['downpay'];//积分数量积分
                $total_my += $orderList[$value]['downpay'];
                $total_sc += $orderList[$value]['score'];
            }
            $total_my = $total_my.'.00';
        }


        $userdetail = $detail_model->where("userid = {$userid}")->find();
        if($userdetail['dl_id']){
            $delivery = $dl_model->find($userdetail['dl_id']);
        }else{
            $delivery = '';
        }
		if($_GET['dl_id']){
			$delivery = $dl_model->find($_GET['dl_id']);
		}
		//dump($delivery);dump($orderList);exit;



        //$this->assign('goodsinfo',$goodsinfo);
        $this->assign('delivery',$delivery);
        $this->assign('daohang',$daohang);
		$this->assign('total_my',$total_my);
        $this->assign('total_sc',$total_sc);
		//echo $total_sc;exit;
        $this->assign('orderList',$orderList);
		$this->display();
    }

    //生成订单并支付
    function addorder(){
		if(cookie('goods_id')){
			cookie('goods_id',null);
		}else if(cookie('goods_ids')){
			cookie('goods_ids',null);
		}
        $userid = $_SESSION['userInfo']['userid'];
        $nikename = $_SESSION['userInfo']['nikename']?$_SESSION['userInfo']['nikename']:"匿名购买";
        $sumorder_model = M('sumorder');
        $order_model = M('order');
        $data['inputtime'] = time();
        $data['sum_sn'] = 'S'.time().rand(10,99);
        $data['total_sc'] = $_POST['total_sc'];
        $data['total_my'] = $_POST['total_my'];
        $data['userid'] = $userid;
        $data['goods_ids'] = implode(',',$_POST['goods_id']);
        $data['goods_name'] = $_POST['goods_name'];
        unset($_POST['total_sc']);
        unset($_POST['total_my']);

        $result = array();
        $goods_name = '';
        $corderno = '';
        for($i=0;$i<count($_POST['goods_id']);$i++){
            foreach($_POST as $key=>$value){
                $result[$i][$key] = $value[$i];
                $result[$i]['inputtime'] = $data['inputtime'];
                $result[$i]['orderno'] = 'E'.time().rand(10,99).$i;
                $result[$i]['userid'] = $userid;
                $result[$i]['nikename'] = $nikename;
            }
            $goods_name .= $_POST['goods_name'][$i].',';
            $corderno .=  $_POST['orderno'][$i].',';
        }
        if(count($result) == 1){
            $result = $result[0];
            $cart = new \Common\Common\Cart();
			$orderid = $order_model ->add($result);
            if($orderid){
                $cart -> del($result['goods_id']);
                $this->redirect("Wxpay/pay",array('type'=>'orderpay','id'=>$orderid));
                //$this->redirect("order/paying");
            }
        }else{
			$cart = new \Common\Common\Cart();
			foreach($_POST['goods_id'] as $value){
				$cart -> del($value);
			}
			$data['corderno'] = rtrim($corderno,',');
			$data['goods_name'] = rtrim($goods_name,',');
			$data['total_my'] = 0.01;
			$sumorderid = $sumorder_model -> add($data);
			if($sumorderid){//生成合并支付订单
				foreach($result as $key => $value){
					$result[$key]['sumid'] = $sumorderid;
				}
				$order_model->addAll($result);
				$this->redirect("Wxpay/pay",array('type'=>'sumpay','id'=>$sumorderid));
			}else{
				$this->redirect("Order/paying");
			}
        }
    }
    //订单详情
    function orderinfo(){
        $userid = $_SESSION['userInfo']['userid'];
        $orderid = $_GET['orderid'];
        $model = M();
        $orderinfo = $model ->field("o.*,g.goods_name,g.logo,g.price")->table("hc_goods as g,hc_order as o")->where("g.goods_id = o.goods_id AND o.orderid = {$orderid} AND o.userid = {$userid}")->select();
        $this->assign('orderinfo',$orderinfo[0]);
        $daohang = array(
            'second'=>'订单详情',
        );
        $this->assign('daohang',$daohang);
        $this->display();
    }
    //商家联盟订单详情
    function sorderinfo(){
        $userid = $_SESSION['userInfo']['userid'];
        $orderid = $_GET['orderid'];
        $sorderinfo = M('sorder')
                    ->alias('o')
                    ->join("hc_sgoods as s on s.goods_id = o.goods_id")
                    ->where("o.orderid = {$orderid} AND o.userid = {$userid}")
                    ->select();
                    $this->assign('sorderinfo',$sorderinfo[0]);
        $daohang = array(
            'second'=>'订单详情',
        );
        $this->assign('daohang',$daohang);
        $this->display();
    }
    //预约详情
    function yuyueinfo(){
        $userid = $_SESSION['userInfo']['userid'];
        $orderid = $_GET['orderid'];
        $yuyueinfo = M('yuyue')
                   ->alias('y')
                   ->field("y.*,z.*,y.status as orderstatus")
                   ->join("hc_zeng as z on z.zeng_id = y.zeng_id")
                   ->where("y.orderid = {$orderid} AND y.userid = {$userid}")
                   ->select();
                   $this->assign('yuyueinfo',$yuyueinfo[0]);
                   //dump($yuyueinfo);exit;
        $daohang = array(
            'second'=>'预约详情',
        );
        $this->assign('daohang',$daohang);
        $this->display();
    }
    //待支付订单
    function paying(){
        $userid = $_SESSION['userInfo']['userid'];
        $daohang = array(
            'second'=>'我的订单',
        );
        $model = M();
        $userid = $_SESSION['userInfo']['userid'];
        $orderlist = $model ->field("o.*,g.goods_name,g.logo,g.price")->table("hc_goods as g,hc_order as o")->where("g.goods_id = o.goods_id AND o.userid = {$userid} AND o.pay_status = '0'")->order("inputtime desc")->select();
        $this ->assign('orderlist',$orderlist);
        /*商家联盟订单start*/
        $sorderlist = M('sorder')
                    ->alias('o')
                    ->field("g.*,o.orderid,o.orderno,o.inputtime,s.seller_name,s.pic_dian,s.seller_id")
                    ->join("hc_sgoods as g on g.goods_id = o.goods_id")
                    ->join("hc_seller as s on s.userid = o.userid")
                    ->where("o.userid = {$userid} AND o.pay_status = '0' AND o.is_del = '0'")
                    ->order("o.inputtime desc")
                    ->select();
        $this ->assign('sorderlist',$sorderlist);
                    //dump($sorderlist);exit;
        /*商家联盟订单end*/
        /*预约start*/
        $yuyuelist = M('yuyue')
                   ->alias('y')
                   ->field("z.*,y.orderid,y.orderno,y.inputtime,s.seller_name,s.pic_dian,s.seller_id")
                   ->join("hc_zeng as z on z.zeng_id = y.zeng_id")
                   ->join("hc_seller as s on s.userid = y.userid")
                   ->where("y.userid = {$userid} AND y.status = '0' AND y.is_del = '0'")
                   ->order("y.inputtime desc")
                   ->select();
                   //dump($yuyuelist);exit;
        $this->assign('yuyuelist',$yuyuelist);
        /*预约end*/
        /*商家权益预约start*/
        $quanyilist = M('quanyiorder')
                   ->alias('o')
                   ->field("q.*,o.orderid,o.orderno,o.inputtime")
                   ->join("hc_quanyi as q on q.quanyi_id = o.quanyi_id")
                   ->where("o.userid = {$userid} AND o.status = '0' AND o.is_del = '0'")
                   ->order("o.inputtime desc")
                   ->select();
                   //dump($quanyilist);exit;
        $this->assign('quanyilist',$quanyilist);
        /*商家权益预约end*/
        if(!$orderlist && !$sorderlist && !$yuyuelist && !$quanyilist){
            $this->assign('data','null');
        }else{
            $this->assign('data','notnull');
        }
        $this->assign('daohang',$daohang);
        $this->display();
    }
    //待发货订单
    function sending(){
        $userid = $_SESSION['userInfo']['userid'];
        $daohang = array(
            'second'=>'我的订单',
        );
        $model = M();
        $userid = $_SESSION['userInfo']['userid'];
        $orderlist = $model ->field("o.*,g.goods_name,g.logo,g.price")->table("hc_goods as g,hc_order as o")->where("g.goods_id = o.goods_id AND o.userid = {$userid} AND o.shipping_status = '0' AND o.pay_status = '1'")->order("paytime")->select();
        $this ->assign('orderlist',$orderlist);
        /*商家联盟订单start*/
        $sorderlist = M('sorder')
                    ->alias('o')
                    ->field("g.*,o.orderid,o.orderno,o.inputtime,s.seller_name,s.pic_dian,s.seller_id")
                    ->join("hc_sgoods as g on g.goods_id = o.goods_id")
                    ->join("hc_seller as s on s.userid = o.userid")
                    ->where("o.userid = {$userid} AND o.pay_status = '1' AND o.shipping_status = '0' AND o.is_del = '0'")
                    ->order("o.inputtime desc")
                    ->select();
        $this ->assign('sorderlist',$sorderlist);
                    //dump($sorderlist);exit;
        /*商家联盟订单end*/
        if(!$orderlist && !$sorderlist){
            $this->assign('data','null');
        }else{
            $this->assign('data','notnull');
        }
        $this->assign('daohang',$daohang);
        $this->display();
    }
    //待收货订单
    function receiving(){
        $userid = $_SESSION['userInfo']['userid'];
        $daohang = array(
            'second'=>'我的订单',
        );
        $model = M();
        $userid = $_SESSION['userInfo']['userid'];
        $orderlist = $model ->field("o.*,g.goods_name,g.logo,g.price")->table("hc_goods as g,hc_order as o")->where("g.goods_id = o.goods_id AND o.userid = {$userid} AND o.shipping_status = '1' AND o.pay_status = '1'")->order("paytime")->select();
        $this ->assign('orderlist',$orderlist);
        /*商家联盟订单start*/
        $sorderlist = M('sorder')
                    ->alias('o')
                    ->field("g.*,o.orderid,o.orderno,o.inputtime,s.seller_name,s.pic_dian,s.seller_id")
                    ->join("hc_sgoods as g on g.goods_id = o.goods_id")
                    ->join("hc_seller as s on s.userid = o.userid")
                    ->where("o.userid = {$userid} AND o.pay_status = '1' AND o.shipping_status = '1' AND o.is_del = '0'")
                    ->order("o.inputtime desc")
                    ->select();
        $this ->assign('sorderlist',$sorderlist);
                    //dump($sorderlist);exit;
        /*商家联盟订单end*/
        if(!$orderlist && !$sorderlist){
            $this->assign('data','null');
        }else{
            $this->assign('data','notnull');
        }
        $this->assign('daohang',$daohang);
        $this->display();
    }
    //已收货订单
    function received(){
        $userid = $_SESSION['userInfo']['userid'];
        $daohang = array(
            'second'=>'我的订单',
        );
        $model = M();
        $userid = $_SESSION['userInfo']['userid'];
        $orderlist = $model ->field("o.*,g.goods_name,g.logo,g.price")->table("hc_goods as g,hc_order as o")->where("g.goods_id = o.goods_id AND o.userid = {$userid} AND o.shipping_status = '2' AND o.pay_status = '1'")->select();
        $this ->assign('orderlist',$orderlist);
        /*商家联盟订单start*/
        $sorderlist = M('sorder')
                    ->alias('o')
                    ->field("g.*,o.orderid,o.orderno,o.inputtime,s.seller_name,s.pic_dian,s.seller_id")
                    ->join("hc_sgoods as g on g.goods_id = o.goods_id")
                    ->join("hc_seller as s on s.userid = o.userid")
                    ->where("o.userid = {$userid} AND o.pay_status = '1' AND o.shipping_status = '2' AND o.is_del = '0'")
                    ->order("o.inputtime desc")
                    ->select();
        $this ->assign('sorderlist',$sorderlist);
                    //dump($sorderlist);exit;
        /*商家联盟订单end*/
        /*预约start*/
        $yuyuelist = M('yuyue')
                   ->alias('y')
                   ->field("z.*,y.orderid,y.orderno,y.inputtime,s.seller_name,s.pic_dian,s.seller_id")
                   ->join("hc_zeng as z on z.zeng_id = y.zeng_id")
                   ->join("hc_seller as s on s.userid = y.userid")
                   ->where("y.userid = {$userid} AND y.status = '1' AND y.is_del = '0'")
                   ->order("y.inputtime desc")
                   ->select();
                   //dump($yuyuelist);exit;
        $this->assign('yuyuelist',$yuyuelist);
        /*预约end*/
        /*商家权益预约start*/
        $quanyilist = M('quanyiorder')
                   ->alias('o')
                   ->field("q.*,o.orderid,o.orderno,o.inputtime")
                   ->join("hc_quanyi as q on q.quanyi_id = o.quanyi_id")
                   ->where("o.userid = {$userid} AND o.status = '1' AND o.is_del = '0'")
                   ->order("o.inputtime desc")
                   ->select();
                   //dump($quanyilist);exit;
        $this->assign('quanyilist',$quanyilist);
        /*商家权益预约end*/
        if(!$orderlist && !$sorderlist && !$yuyuelist){
            $this->assign('data','null');
        }else{
            $this->assign('data','notnull');
        }
        $this->assign('daohang',$daohang);
        $this->display();
    }
    //以下是订单的操作类方法
    //删除订单
    function delorder(){
        $userid = $_SESSION['userInfo']['userid'];
        $orderid = $_GET['orderid'];
        $map['orderid'] = $orderid;
        $map['userid'] = $userid;
        $where['pay_status'] = '0';
        $where['shipping_status'] = '2';
        $where['_logic'] = 'or';
        $order_model = M('order');
        $order_model ->where($map)->delete();
        $url_str = $_SERVER['HTTP_REFERER'];
        $url_arr = explode('index.php',$url_str);
        if(count($url_arr) == 2){
            $url_arr = explode('.html',$url_arr[1]);
        }
        $this->redirect($url_arr[0]);
    }
    //删除商家联盟订单
    function delsorder(){
        $sorder_model = M('sorder');
        $userid = $_SESSION['userInfo']['userid'];
        $orderid = $_GET['orderid'];
        $map['userid'] = $userid;
        $map['orderid'] = $orderid;
        $sorderinfo = $sorder_model->find($orderid);
        if($sorder_model->where($map)->setField('is_del','1')){
            if($sorderinfo['shipping_status'] == '0'){
                header("location:".SITE_URL.'index.php/Home/Order/paying');
            }elseif($sorderinfo['shipping_status'] == '2'){
                header("location:".SITE_URL.'index.php/Home/Order/received');
            }
        }else{
            header("location:".$_SERVER['HTTP_REFERER']);
        }
    }
    //取消预约
    function delyuyue(){
        $yuyue_model = M('yuyue');
        $userid = $_SESSION['userInfo']['userid'];
        $orderid = $_GET['orderid'];
        $map['userid'] = $userid;
        $map['orderid'] = $orderid;
        $yuyueinfo = $yuyue_model->find($orderid);
        if($yuyue_model->where($map)->setField('is_del','1')){
            if($yuyueinfo['status'] == '0'){
                header("location:".SITE_URL.'index.php/Home/Order/paying');
            }else{
                header("location:".SITE_URL.'index.php/Home/Order/received');
            }
        }else{
            header("location:".$_SERVER['HTTP_REFERER']);
        }
    }
    //取消权益商品预约
    function delquanyi(){
        $quanyi_model = M('quanyiorder');
        $userid = $_SESSION['userInfo']['userid'];
        $orderid = $_GET['orderid'];
        $map['userid'] = $userid;
        $map['orderid'] = $orderid;
        $quanyiinfo = $quanyi_model->find($orderid);
        if($quanyi_model->where($map)->setField('is_del','1')){
            if($quanyiinfo['status'] == '0'){
                header("location:".SITE_URL.'index.php/Home/Order/paying');
            }else{
                header("location:".SITE_URL.'index.php/Home/Order/received');
            }
        }else{
            header("location:".$_SERVER['HTTP_REFERER']);
        }
    }
    //确认收货
    function confirm(){
        $userid = $_SESSION['userInfo']['userid'];
        $orderid = $_GET['orderid'];
        $order_model = M('order');
        $map['orderid'] = $orderid;
        $map['userid'] = $userid;
        $order_model->where($map)->setField("shipping_status",'2');
        $this->redirect("Order/received");
    }
    //商家联盟订单确认收货
    function sconfirm(){
        $userid = $_SESSION['userInfo']['userid'];
        $orderid = $_GET['orderid'];
        $sorder_model = M('sorder');
        $map['orderid'] = $orderid;
        $map['userid'] = $userid;
        if($sorder_model->where($map)->setField("shipping_status",'2')){
            $this->redirect("Order/received");
        }else{
            header("location:".$_SERVER['HTTP_REFERER']);
        }
    }
}