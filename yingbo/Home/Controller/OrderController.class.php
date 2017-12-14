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
            $orderList[$goods_id]['downpay'] = round(($goodsinfo['price'] * $set['pct_cash'])/100,2);//首付金额
            $orderList[$goods_id]['orderamount'] = $goodsinfo['price'];
            $orderList[$goods_id]['score'] = round($goodsinfo['price'] - $orderList[$goods_id]['downpay']);//积分数量积分
            $total_my = $orderList[$goods_id]['downpay'];
            $total_sc = $orderList[$goods_id]['score'] * $orderList[$goods_id]['number'];
            //dump($orderList);exit;
        }
        if($_POST['id']){
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
					//如果是加油卡
					if($value == 111){

						$order = M('order')->where("userid = {$userid} AND goods_id = {$value} AND shipping_status = '1'")->select();
						if($order){
							//如果该商品已经下过单并且没有完成则删除
							unset($orderList[$value]);
							continue;
						}
						$orderList[$value]['number'] = 1;
						$orderList[$value]['orderamount'] = $goodsinfo['price'];
					}else{
						$orderList[$value]['orderamount'] = $otherinfo['price'];
					}

				}
				//$orderList[$value]['kucun'] = $goodsinfo['number'];
                $orderList[$value]['goodsinfo'] = $goodsinfo;
                $orderList[$value]['downpay'] = round(($orderList[$value]['orderamount'] * $set['pct_cash'])/100,2);//首付金额

                $orderList[$value]['score'] = round($orderList[$value]['orderamount'] - $orderList[$value]['downpay']);//积分总数量
                $total_my += $orderList[$value]['downpay'];
                $total_sc += $orderList[$value]['score'];
            }
            $total_my = $total_my;
        }
		if(!cookie('goods_ids') && !cookie('goods_id')){
			$url = $_SERVER['HTTP_REFERER'];
			header("location:$url");exit;
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
		//查询会员的积分信息
		//$userdetail = M('userdetail')->field("shop_sc")->where("userid = {$userid}")->find();
		//dump($userdetail);
		/*if($userdetail['shop_sc'] >= $_POST['total_sc']){
			//用户的乐购积分大于购物所需积分
			$allowbuy = true;
		}else{
			$allowbuy = false;
		}*/
        unset($_POST['total_sc']);
        unset($_POST['total_my']);

        $result = array();
        $goods_name = '';
        $corderno = '';
		//dump($_POST);exit;
        /*for($i=0;$i<count($_POST['goods_id']);$i++){
            foreach($_POST as $key=>$value){
                $result[$i][$key] = $value[$i];
                $result[$i]['inputtime'] = $data['inputtime'];
                $result[$i]['orderno'] = 'E'.time().rand(10,99).$i;
				$result[$i]['number'] = $value['number'];
                $result[$i]['userid'] = $userid;
                $result[$i]['nikename'] = $nikename;
				$result[$i]['orderamount'] = round(($value['downpay'] + $value['score']),2);
            }
            $goods_name .= $_POST['goods_name'][$i].',';
            $corderno .=  $_POST['orderno'][$i].',';
        }*/
		for($i=0;$i<count($_POST['goods_id']);$i++){
			$result[$i]['orderno'] = 'E'.time().rand(10,99).$i;
			$result[$i]['userid'] = $userid;
            $result[$i]['nikename'] = $nikename;
			$result[$i]['inputtime'] = $data['inputtime'];
            foreach($_POST as $key=>$value){
                $result[$i][$key] = $value[$i];
            }
			$result[$i]['orderamount'] = round(($result[$i]['downpay'] + $result[$i]['score']));
            $goods_name .= $_POST['goods_name'][$i].',';
            $corderno .=  $_POST['orderno'][$i].',';
        }
        if(count($result) == 1){
            $result = $result[0];
            $cart = new \Common\Common\Cart();
			$orderid = $order_model ->add($result);
            if($orderid){
                $cart -> del($result['goods_id']);
				//echo $allowbuy;exit;
				//if($allowbuy == true){
					$this->redirect("Wxpay/pay",array('type'=>'orderpay','id'=>$orderid));
				//}else{
				//	$this->redirect("Order/placeorder",array('errormsg'=>'errorscore'));
				//}
                //$this->redirect("order/paying");
            }
        }else{
			$cart = new \Common\Common\Cart();
			foreach($_POST['goods_id'] as $value){
				$cart -> del($value);
			}
			$data['corderno'] = rtrim($corderno,',');
			$data['goods_name'] = rtrim($goods_name,',');
			//$data['total_my'] = 0.01;
			$sumorderid = $sumorder_model -> add($data);
			if($sumorderid){//生成合并支付订单
				foreach($result as $key => $value){
					$result[$key]['sumid'] = $sumorderid;
				}
				$order_model->addAll($result);
				//if($allowbuy === true){
					$this->redirect("Wxpay/pay",array('type'=>'sumpay','id'=>$sumorderid));
				//}else{
				//	$this->redirect("Order/paying",array('errormsg'=>'errorscore'));
				//}
			}else{
				$this->redirect("Order/paying");
			}
        }
    }
	//检查积分是否够及检查库存是否足够
	function checkscore2() {
		if(IS_POST){
			//dump($_POST);exit;
			$userid = $_SESSION['userInfo']['userid'];
			$userdetail = M('userdetail')->where("userid = {$userid}")->find();
			//dump($userdetail);exit;
			if($userdetail['shop_sc'] >= $_POST['total_sc']){
				//检查库存
				for($i=0;$i<count($_POST['goods_id']);$i++){
					if($_POST['number'][$i] > $_POST['kucun'][$i]){
						$this->ajaxReturn(array(
							'error' => 2
						));
					}
				}
				$this->ajaxReturn(array(
					'error' => 0
				));
			}else{
				$this->ajaxReturn(array(
					'error' => 1
				));
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
    //待支付订单
    function paying(){
        $userid = $_SESSION['userInfo']['userid'];
        $daohang = array(
            'second'=>'我的订单',
        );
        $model = M();
        $userid = $_SESSION['userInfo']['userid'];
		$count = M("order") ->where("userid = {$userid}")-> count();

        $p = new \Think\Page($count,5);
        $orderlist = $model ->field("o.*,g.goods_name,g.logo,g.price")->table("hc_goods as g,hc_order as o")->where("g.goods_id = o.goods_id AND o.userid = {$userid} AND o.pay_status = '0'")->order("inputtime desc")->limit($p->firstRow.','.$p->listRows)->select();
		foreach($orderlist as $key => $value){
			$orderlist[$key]['logo'] = substr($value['logo'],1);
			$orderlist[$key]['inputtime'] = date("Y-m-d H:i:s",$value['inputtime']);
		}
		$totalPages = $p->totalPages;
		if(IS_POST){
			$this->ajaxReturn(array(
				'error'   => 0,
				'content' => $orderlist
			));
		}
		//dump($orderlist);exit;
		$this->assign("totalPages",$totalPages);
        $this ->assign('orderlist',$orderlist);
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
		$count = M("order") ->where("userid = {$userid}")-> count();

        $p = new \Think\Page($count,5);
        $orderlist = $model ->field("o.*,g.goods_name,g.logo,g.price")->table("hc_goods as g,hc_order as o")->where("g.goods_id = o.goods_id AND o.userid = {$userid} AND o.shipping_status = '0' AND o.pay_status = '1'")->order("paytime")->limit($p->firstRow.','.$p->listRows)->select();
		foreach($orderlist as $key => $value){
			$orderlist[$key]['logo'] = substr($value['logo'],1);
			$orderlist[$key]['inputtime'] = date("Y-m-d H:i:s",$value['inputtime']);
		}
		$totalPages = $p->totalPages;
		if(IS_POST){
			$this->ajaxReturn(array(
				'error'   => 0,
				'content' => $orderlist
			));
		}
		$this->assign("totalPages",$totalPages);
        $this ->assign('orderlist',$orderlist);
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
		$count = M("order") ->where("userid = {$userid}")-> count();

        $p = new \Think\Page($count,5);
        $orderlist = $model ->field("o.*,g.goods_name,g.logo,g.price")->table("hc_goods as g,hc_order as o")->where("g.goods_id = o.goods_id AND o.userid = {$userid} AND o.shipping_status = '1' AND o.pay_status = '1'")->order("paytime")->limit($p->firstRow.','.$p->listRows)->select();
		foreach($orderlist as $key => $value){
			$orderlist[$key]['logo'] = substr($value['logo'],1);
			$orderlist[$key]['inputtime'] = date("Y-m-d H:i:s",$value['inputtime']);
		}
		$totalPages = $p->totalPages;
		if(IS_POST){
			$this->ajaxReturn(array(
				'error'   => 0,
				'content' => $orderlist
			));
		}
		$this->assign("totalPages",$totalPages);
        $this ->assign('orderlist',$orderlist);
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
		$count = M("order") ->where("userid = {$userid}")-> count();

        $p = new \Think\Page($count,5);
        $orderlist = $model ->field("o.*,g.goods_name,g.logo,g.price")->table("hc_goods as g,hc_order as o")->where("g.goods_id = o.goods_id AND o.userid = {$userid} AND o.shipping_status = '2' AND o.pay_status = '1'")->order("paytime desc")->limit($p->firstRow.','.$p->listRows)->select();
		foreach($orderlist as $key => $value){
			$orderlist[$key]['logo'] = substr($value['logo'],1);
			$orderlist[$key]['inputtime'] = date("Y-m-d H:i:s",$value['inputtime']);
		}
		$totalPages = $p->totalPages;
		if(IS_POST){
			$this->ajaxReturn(array(
				'error'   => 0,
				'content' => $orderlist
			));
		}
		$this->assign("totalPages",$totalPages);
        $this ->assign('orderlist',$orderlist);
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
	//判断用户的乐购积分是否够
	function checkscore() {
		$paytype = $_GET['type'];
		$id = $_GET['id'];
		$userid = $_SESSION['userInfo']['userid'];
		$userdetail = M('userdetail')->where("userid = {$userid}")->find();
		$orderinfo = M('order')->find($id);
		if($userdetail['shop_sc'] >= $orderinfo['score']){
			$goodsinfo = M('goods')->find($orderinfo['goods_id']);
			if($goodsinfo['number'] > $orderinfo['number']){
			}else{
				$this->ajaxReturn(array(
					'error' => 2
				));
			}
			$this->ajaxReturn(array(
				'error' => 0,
				'url' =>"/Wxpay/pay/type/".$paytype.'/id/'.$id
			));
		}else{
			$this->ajaxReturn(array(
				'error' => 1
			));
		}
	}
}