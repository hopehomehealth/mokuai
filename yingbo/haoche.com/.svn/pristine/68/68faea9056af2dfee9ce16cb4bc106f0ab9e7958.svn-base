<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/8/9 0009
 * Time: 11:35
 */

namespace Sadmin\Controller;
use Common\Common\ScomaController;

class IndexController extends ScomaController
{
    function index(){

        $userid = $_SESSION['userInfo']['userid'];
        $sellerinfo = M('Seller')->where("userid={$userid}")->find();
        $this->assign('sellerinfo',$sellerinfo);
        /*
		//未付款订单
		$order_model = M('order');
		$paying = $order_model->where("pay_status = '0'")->order('paytime desc')->limit(5)->select();
		$this->assign('paying',$paying);
		//已付款订单
		$order_model = M('order');
		$paied = $order_model->where("pay_status = '1'")->order('paytime desc')->limit(5)->select();
		$this->assign('paied',$paied);
		//新加入会员
		$userList = M()->query("select a.*,a.nikename,b.nikename as pname,b.userhead as puserhead from hc_user as a left join hc_user as b on a.pid = b.userid order by userid desc limit 5");
		$this->assign('userList',$userList);
		//申请提现列表
		$exchange_model = M('exchange');
		$exchange = $exchange_model->alias("e")->field("e.*,u.nikename,u.userhead")->join("left join hc_user as u on u.userid = e.userid")->where("e.status = '0'")->limit(5)->select();
		$this->assign('exchange',$exchange);*/
        $this->display();
    }
}