<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/6/13
 * Time: 11:37
 */
namespace Admin\Controller;
use Common\Common\AdminController;
class IndexController extends AdminController {
    function index(){
    	$order = D("user_order");
        $today = date('Y-m-d',time());
        $starttime = strtotime($today);
        $endtime = strtotime($today.' 23:59:59');
        //今日订单数量
        $map['inputtime'] = array('between',array($starttime,$endtime));
    	$countorder = $order->where($map)->count();
        $this->assign('countorder',$countorder);
        //今日销售额
        $map['if_say'] = '1';
        $summoney = $order->field('sum(ssum) as sum')->where($map)->select();
        $this->assign('summoney',$summoney[0]);

    	$unorderlist = $order->where("if_say = '0'")->order("inputtime desc")->limit(5)->select();
    	$orderlist = $order->where("if_say = '1'")->order("inputtime desc")->limit(5)->select();
    	$res = D('user_recharge')->select();
    	//dump($res);
    	
    	$this->assign('unorderlist',$unorderlist);
    	$this->assign('orderlist',$orderlist);

        $count=file_get_contents("count.txt");
    
        $this->assign('count',$count);
        $this->display();
    }
}