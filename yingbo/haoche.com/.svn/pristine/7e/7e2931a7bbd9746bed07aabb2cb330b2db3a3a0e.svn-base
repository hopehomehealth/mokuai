<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/8/9 0009
 * Time: 11:35
 */

namespace Admin\Controller;
use Think\Controller;

class BookingController extends Controller
{
    //豪车预定列表
    function showlist(){
        if($_GET['search'] && $_GET['search'] != ''){
            $_GET['search'] = $_GET['search'];
            if($_GET['searchType'] != ''){
                $map[$_GET['searchType']] = $_GET['search'];
            }else{
                $map['book_sn'] = $_GET['search'];
                $map['userid'] = $_GET['search'];
                $map['customer'] = $_GET['search'];
                $map['phone'] = $_GET['search'];
                $map['_logic'] = "OR";
            }
        }else{
            $map = '';
        }
        //dump($map);//exit;
    	$booking_model = M('booking');
        $count = $booking_model->where($map)->count();
        $p = new \Think\Page($count,2);
        $orderList = $booking_model->where($map)->limit($p->firstRow.','.$p->listRows)-> select();
        $page = $p -> show();
        $first = $_GET['p'] ? $_GET['p']:'1';
        $this ->assign('firstno',($first-1)*2+1);
        $this ->assign('page',$page);
        //echo $page;exit;
        $this ->assign('orderList',$orderList);
        $this->display();
    }
    //过滤后的订单列表
    function filterorder(){
            $filter = $_GET['filter'];
            if($filter == 1){
                $map['is_paydown'] = '0';
            }
            if($filter == 2){
                $map['is_paydown'] = '1';
                $map['is_refunds'] = '0';
                $map['is_takecar'] = '0';
            }
            if($filter == 3){
                $map['is_paydown'] = '1';
                $map['aplay_refunds'] = '0';
                $map['is_takecar'] = '0';
            }
            if($filter == 4){
                $map['is_takecar'] = '1';
            }
            if($filter == 5){
                $map['aplay_refunds'] = '1';
                $map['is_refunds'] = '0';
            }
            if($filter == 6){
                $map['is_refunds'] = '1';
            }
			if($filter == 7){
                $map['picscreen'] = array('neq','null');
            }
            $booking_model = M('booking');
            $count = $booking_model->where($map)->count();
            $p = new \Think\Page($count,2);
            $orderList = $booking_model ->where($map)->limit($p->firstRow.','.$p->listRows)-> select();
            foreach($orderList as $key=>$value){
                $orderList[$key]['inputtime'] = date('Y-m-d H:i:s',$value['inputtime']);
            }
            $page = $p -> show();
            $first = $_GET['p'] ? $_GET['p']:'1';
            $firstno = ($first-1)*2+1;
            $this->ajaxReturn(array(
                    'error'=>0,
                    'orderList'=>$orderList,
                    'page'=>$page,
                    'firstno'=>$firstno
                ));
    }
    //订单详情
    function orderinfo(){
        $book_id = $_GET['book_id'];
        $haoche_model = M('haoche');
        $detail_model = M('userdetail');
        $booking_model = M('booking');
        //订单基本信息
        $orderinfo = $booking_model -> find($book_id);
        //下单这信息
        $userdetail = $detail_model ->where("userid = {$orderinfo['userid']}")-> find();
        //商品信息
        $goodsinfo = $haoche_model -> find($orderinfo['goods_id']);
        //dump($goodsinfo);
        $this->assign('orderinfo',$orderinfo);
        $this->assign('userdetail',$userdetail);
        $this->assign('goodsinfo',$goodsinfo);
        $this->display();
    }
    //订单取消
    function cancel(){
        $book_id = $_GET['book_id'];
        $booking_model = M('booking');
        //订单基本信息
        $orderinfo = $booking_model -> find($book_id);
        if($orderinfo['is_paydown'] == '1'){
            $this->error('无法删除已付款的订单');
        }else{
            if($booking_model -> where("book_id = {$book_id}")->delete()){
                $this->success("订单取消成功");
            }else{
                $this->error("系统繁忙，请稍后重试");
            }
        }
    }
    //确认付款后的操作
    function pay(){
        $book_id = $_GET['book_id'];
        $user_model = M('user');
        $detail_model = M('userdetail');
        $booking_model = M('booking');
        $setting_model = M('setting');
        $set = $setting_model->find();

        $bookinfo = $booking_model->find($book_id);//订车单信息

        $userinfo = $user_model->find($bookinfo['userid']);//订车会员信息

        if($userinfo['pid'] == 0){
            //如果上级不存在
        }else{
            //如果上级存在
            $pback = ($bookinfo['downpay']/100)*$set['pct_backprev'];//返给上级的兑现积分
            $detail_model->where("userid = {$userinfo['pid']}")->setInc("cash_sc",$pback);
            $puserinfo = $user_model->find($userinfo['pid']);//上级会员信息
            if($puserinfo['pid'] == 0){
                //如果上上级不存在
            }else{
                //如果上上级存在
                $ppback = ($bookinfo['downpay']/100)*$set['pct_backpprev'];//返给上上级的消费积分
                $detail_model->where("userid = {$puserinfo['pid']}")->setInc("consume_sc",$ppback);
            }
        }
        $data['paytime'] = time();
        $data['is_paydown'] = '1';
        $booking_model->where("book_id = {$book_id}")->save($data);
        $this->success("确认支付操作成功");
    }
    //确认退款后的操作
    function refunds(){
        $book_id = $_GET['book_id'];
        $booking_model = M('booking');
        $data['refundstime'] = time();
        $data['is_refunds'] = '1';
        $booking_model->where("book_id = {$book_id}")->save($data);
        $this->success("确认退款操作成功");
    }
    //确认提车后的操作
    function takecar(){
        $book_id = $_GET['book_id'];
        $user_model = M('user');
        $detail_model = M('userdetail');
        $booking_model = M('booking');
        $setting_model = M('setting');
        $set = $setting_model->find();


        $data['taketime'] = time();
        $data['is_takecar'] = '1';
        if($booking_model->where("book_id = {$book_id}")->save($data)){
			$bookinfo = $booking_model->find($book_id);//订车单信息

			$userinfo = $user_model->find($bookinfo['userid']);//订车会员信息
			if($userinfo['pid'] == 0){
				//如果上级不存在
			}else{
				//如果上级存在
				$puserinfo = $user_model->find($userinfo['pid']);//上级会员信息
				//判断上级是否为代理
				if($puserinfo['level'] == '0'){
					//不是代理时返兑现积分数量
					$pback = ($bookinfo['downpay']/100)*$set['pct_takepre'];
				}else{
					//如果是代理
					$pback = ($bookinfo['downpay']/100)*($set['pct_takepre'] + $set['pct_takeagent'] / 10);
				}
				$detail_model ->where("userid = {$puserinfo['userid']}")-> setInc("cash_sc",$pback);
			}
			$this->success("确认提车操作成功");
		}else{
			$this->error("确认提车操作失败");
		}
    }
}