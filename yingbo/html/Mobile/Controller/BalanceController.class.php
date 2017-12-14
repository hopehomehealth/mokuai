<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/6/13
 * Time: 11:37
 */
namespace Mobile\Controller;
use Think\Controller;
class BalanceController extends Controller{
	function pay(){
		$orderid = $_POST['orderid'];
		$userid = $_SESSION['userInfo']['userid'];
		$order = D('user_order');
		$patient = D('user_patient');
		$orderinfo = $order ->find($orderid);
		if($orderinfo['if_say'] == 1){
			$this ->ajaxReturn(array(
					"error" => 1,
					"content" =>"请勿重复支付"
				));
		}
		$userinfo = $patient ->find($userid);
		if($orderinfo['ssum'] > $userinfo['money']){
			$this ->ajaxReturn(array(
					"error" => 1,
					"content" =>"余额不足"
				));
		}else{
			$data['money'] = $userinfo['money'] - $orderinfo['ssum'];
			if($patient ->where("userid ={$userid}")->save($data)){
				if(!empty($orderinfo['auserid'])){
					$paydata['if_say'] = '1';
					$paydata['if_pay'] = '1';
					$order ->where("orderid ={$orderid}")->save($paydata);
					D('user_assess')->where("userid = {$orderinfo['auserid']}")->setInc('money',$orderinfo['psum']);
					$this ->ajaxReturn(array(
					"error" => 0,
					"content" =>"支付成功",
					"url" =>SITE_URL.'index.php/Mobile/Patient/seelist?orderid='.$orderid
				));
				}else{	
					$paydata['if_say'] = '1';
					$order ->where("orderid ={$orderid}")->save($paydata);
					$this ->ajaxReturn(array(
					"error" => 0,
					"content" =>"支付成功",
					"url" =>SITE_URL.'index.php/Mobile/Patient/orderinfo?orderid='.$orderid
				));
				}

			}else{
				$this ->ajaxReturn(array(
					"error" => 1,
					"content" =>"支付失败"
				));
			}
		}
	}

}