<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/8/9 0009
 * Time: 11:35
 */

namespace Admin\Controller;
use Think\Controller;

class FinanceController extends Controller
{
    function legou(){
		$order_model = M('order');
		$orderList = $order_model
			       ->alias("o")
			       ->field("o.*,u.nikename")
				   ->join("left join hc_user as u on u.userid = o.userid")
				   ->where("o.pay_status = '1'")
				   ->order("o.paytime desc")
				   ->select();
		//dump($orderList);exit;
		$this->assign('orderList',$orderList);
    	$this->display();
    }
    function recharge(){
		$regfee_model = M('regfee');
		$regfee =  $regfee_model
				   ->alias("r")
			       ->field("r.*,u.nikename")
				   ->join("left join hc_user as u on u.userid = r.userid")
				   ->where("r.status = '1'")
				   ->order("r.paytime desc")
				   ->select();
		$this->assign('regfee',$regfee);
    	$this->display();
    }
	function haoche(){
		$book_model = M('booking');
		$bookinfo = $book_model
				   ->alias("b")
			       ->field("b.*,u.nikename")
				   ->join("left join hc_user as u on u.userid = b.userid")
				   ->where("b.is_paydown = '1'")
				   ->order("b.paytime desc")
				   ->select();
		$this->assign('bookinfo',$bookinfo);
    	$this->display();
    }
	function channel(){
		$agent_model = M('agentfee');
		$agentfee = $agent_model
			       ->alias("a")
			       ->field("a.*,u.nikename")
				   ->join("left join hc_user as u on u.userid = a.userid")
				   ->where("a.status = '1'")
				   ->order("a.paytime desc")
				   ->select();
		$this->assign('agentfee',$agentfee);
    	$this->display();
    }
	function donate(){
		$cimoney_model = M('cimoney');
		$cimoney = $cimoney_model
				 ->alias("c")
			       ->field("c.*,u.nikename")
				   ->join("left join hc_user as u on u.userid = c.userid")
				   ->where("c.status = '1'")
				   ->order("c.add_time desc")
				   ->select();
		$this->assign('cimoney',$cimoney);
    	$this->display();
    }
	function caiclub(){
		$caiclub_model = M('caiclub');
		$caiclub = $caiclub_model
				 ->alias("c")
			       ->field("c.*,u.nikename")
				   ->join("left join hc_user as u on u.userid = c.userid")
				   ->where("c.pay_status = '1'")
				   ->order("c.paytime desc")
				   ->select();
		$this->assign('caiclub',$caiclub);
    	$this->display();
    }
	function yangka(){
		$yangka_model = M('yangka');
		$yangka = $yangka_model
				 ->alias("y")
			       ->field("y.*,u.nikename")
				   ->join("left join hc_user as u on u.userid = y.userid")
				   ->where("y.pay_status = '1'")
				   ->order("y.paytime desc")
				   ->select();
		$this->assign('yangka',$yangka);
    	$this->display();
    }
	function tie(){
		$tie_model = M('tie');
		$tie = $tie_model
				 ->alias("t")
			       ->field("t.*,u.nikename")
				   ->join("left join hc_user as u on u.userid = t.userid")
				   ->where("t.pay_status = '1'")
				   ->order("t.paytime desc")
				   ->select();
		$this->assign('tie',$tie);
    	$this->display();
    }
	function daikuan(){
		$daikuan_model = M('daikuan');
		$daikuan = $daikuan_model
				 ->alias("d")
			       ->field("d.*,u.nikename")
				   ->join("left join hc_user as u on u.userid = d.userid")
				   ->where("d.pay_status = '1'")
				   ->order("d.paytime desc")
				   ->select();
		$this->assign('daikuan',$daikuan);
    	$this->display();
    }
	function house(){
		$house_model = M('house');
		$house = $house_model
				 ->alias("h")
			       ->field("h.*,u.nikename")
				   ->join("left join hc_user as u on u.userid = h.userid")
				   ->where("h.pay_status = '1'")
				   ->order("h.paytime desc")
				   ->select();
		$this->assign('house',$house);
    	$this->display();
    }
}