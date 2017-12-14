<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/8/9 0009
 * Time: 11:35
 */

namespace Sadmin\Controller;
use Common\Common\ScomaController;
class SorderController extends ScomaController
{
	public static $getp = 0;
    //订单列表展示
    function showlist(){
        if($_POST['search'] && $_POST['search'] != ''){
            if($_POST['searchType'] != ''){
                $map[$_POST['searchType']] = $_POST['search'];
				//echo $_SERVER['HTTP_REFERER'];echo $_SERVER['QUERY_STRING'];exit;
            }else{
                $map['hc_sorder.orderno'] = $_POST['search'];
                $map['hc_sorder.expressno'] = $_POST['search'];
                $map['hc_sorder.userid'] = $_POST['search'];
                $map['hc_sorder.consigner'] = $_POST['search'];
                $map['hc_sorder.phone'] = $_POST['search'];
                $map['_logic'] = "OR";
				//echo $_SERVER['HTTP_REFERER'];echo $_SERVER['QUERY_STRING'];exit;
            }
        }else{
            $map = '';
        }

        //dump($map);//exit;
    	$order_model = M('sorder');
        $count = $order_model->where($map)->count();
		//echo $count;
        $p = new \Think\Page($count,10);
        //$orderList = $order_model->where($map)->limit($p->firstRow.','.$p->listRows)-> select();
		$orderList = $order_model
			-> field("hc_sorder.*,hc_userdetail.shop_sc,hc_goods.cycle,hc_goods.goods_name")
			-> join("left join hc_userdetail on hc_userdetail.userid = hc_sorder.userid")
			->join("left join hc_goods on hc_goods.goods_id = hc_sorder.goods_id")
			->where($map)
			->order("hc_sorder.inputtime desc")
			->limit($p->firstRow.','.$p->listRows)
			-> select();
		$nowtime = time();
		foreach($orderList as $key=>$value){
			if(($value['shop_sc'] > $value['score']) && ($nowtime >= ($value['inputtime'] + $value['cycle'] * 3600 * 24))){
				if($value['pay_status'] == 1){
					$orderList[$key]['checksend'] = '1';
				}else{
					$orderList[$key]['checksend'] = '0';
				}
			}else{
				$orderList[$key]['checksend'] = '0';
			}
		}
        $page = $p -> show();
        $first = $_GET['p'] ? $_GET['p']:'1';
        $this ->assign('firstno',($first-1)*10+1);
        $this ->assign('page',$page);
        $this ->assign('orderList',$orderList);
        $this->display();
    }
    //过滤后的订单列表
    function filterorder(){
            $filter = $_GET['filter'];
            if($filter == 1){
                $map['pay_status'] = '0';
            }
            if($filter == 2){
                $map['pay_status'] = '1';
            }
            if($filter == 3){
                $map['shipping_status'] = '0';
                $map['pay_status'] = '1';
            }
            if($filter == 4){
                $map['shipping_status'] = '1';
                $map['pay_status'] = '1';
            }
            if($filter == 5){
                $map['shipping_status'] = '2';
            }
            if($filter == 6){
                $map['order_status'] = '1';
            }
            $order_model = M('sorder');
            $count = $order_model->where($map)->count();
            $p = new \Think\Page($count,10);
            //$orderList = $order_model ->where($map)->limit($p->firstRow.','.$p->listRows)-> select();
			$orderList = $order_model
			-> field("hc_sorder.*,hc_userdetail.shop_sc,hc_goods.cycle,hc_goods.goods_name")
			-> join("left join hc_userdetail on hc_userdetail.userid = hc_sorder.userid")
			->join("left join hc_goods on hc_goods.goods_id = hc_sorder.goods_id")
			->where($map)
			->order("hc_sorder.inputtime desc")
			->limit($p->firstRow.','.$p->listRows)
			-> select();
			$nowtime = time();
            foreach($orderList as $key=>$value){
				if(($value['shop_sc'] > $value['score']) && ($nowtime >= ($value['inputtime'] + $value['cycle'] * 3600 * 24))){
					if($value['pay_status'] == 1){
						$orderList[$key]['checksend'] = '1';
					}else{
						$orderList[$key]['checksend'] = '0';
					}
				}else{
					$orderList[$key]['checksend'] = '0';
				}
                $orderList[$key]['inputtime'] = date('Y-m-d H:i:s',$value['inputtime']);
                $orderList[$key]['paytime']   = empty($value['paytime'])?'':date('Y-m-d H:i:s',$value['paytime']);

            }
            $page = $p -> show();
            $first = $_GET['p'] ? $_GET['p']:'1';
            $firstno = ($first-1)*10+1;
            $this->ajaxReturn(array(
                    'error'=>0,
                    'orderList'=>$orderList,
                    'page'=>$page,
                    'firstno'=>$firstno
                ));
    }
    //订单详情
    function orderinfo(){
        $orderid = $_GET['orderid'];
        $goods_model = M('goods');
        $detail_model = M('userdetail');
        $order_model = M('sorder');
        //订单基本信息
        $orderinfo = $order_model -> find($orderid);
        //下单人信息
        $userdetail = $detail_model -> find($orderinfo['userid']);
        //商品信息
        $goodsinfo = $goods_model -> find($orderinfo['goods_id']);
		//发货时间
		$sendtime = $goodsinfo['cycle'] * 3600 * 24 + $orderinfo['inputtime'];
		if((time() >= $sendtime) && ($orderinfo['pay_status'] == '1')){
			$checksend = '1';
		}else{
			$checksend = '0';
		}
		$this->assign('checksend',$checksend);
		$this->assign('sendtime',$sendtime);
        $this->assign('orderinfo',$orderinfo);
        $this->assign('userdetail',$userdetail);
        $this->assign('goodsinfo',$goodsinfo);
        $this->display();
    }
	//发货
	function shipping() {
		$orderid = $_GET['orderid'];
		$data['shipping_status'] = '1';
		if(M('order')->where("orderid = {$orderid}")->save($data)){
			$this->success("发货成功");
		}else{
			$this->error("发货失败");
		}
	}
	//平台确认收货
	function confirm() {
		$orderid = $_GET['orderid'];
		$set = M('setting')->find();
		$order_model = M('sorder');
		//订单信息
		$orderinfo = $order_model->find($orderid);
		//商品信息
		$goodsinfo = M('goods')->find($orderinfo['goods_id']);
		//对接任id
		$sponsor_id = $goodsinfo['userid']?$goodsinfo['userid']:0;
		$data['confirm'] = '1';
		if($order_model->where("orderid = {$orderid}")->save($data)){
			if($sponsor_id != 0){
				$cash_sc = $goodsinfo['price']*$orderinfo['number']*$set['pct_sponsor']/1000;
				M('userdetail')->where("userid = {$sponsor_id}")->setInc('cash_sc',$cash_sc);
				//更新操作记录表
				$records['sourceid'] = $orderinfo['userid'];
				$records['destid'] = $sponsor_id;
				$records['amount'] = $cash_sc;
				$records['type'] = '对接佣金';
				$records['sc_type'] = '兑现';
				$records['time'] = time();
				M('operate')->add($records);
			}

			$this->success("已确认收货成功");
		}else{
			$this->error("确认收货失败");
		}
	}
    //订单取消
    function cancel(){
        $orderid = $_GET['orderid'];
        $order_model = M('sorder');
        //订单基本信息
        $orderinfo = $order_model -> find($orderid);
        if($orderinfo['pay_status'] == '1'){
            $this->error('无法删除已付款的订单');
        }else{
            if($order_model -> where("orderid = {$orderid}")->delete()){
                $this->success("订单取消成功");
            }else{
                $this->error("系统繁忙，请稍后重试");
            }
        }
    }
    //修改收货人
    function modifyconsigner(){
        $orderid = $_POST['orderid'];
        $order_model = M('sorder');
        if($order_model ->where("orderid = {$orderid}") ->setField('consigner',$_POST['consigner'])){
            $this->ajaxReturn(array(
                    'error' => 0
                ));
        }else{
            $this->ajaxReturn(array(
                    'error' => 1
                ));
        }
    }
	//修改电话
    function modifyphone(){
        $orderid = $_POST['orderid'];
        $order_model = M('sorder');
        if($order_model ->where("orderid = {$orderid}") ->setField('phone',$_POST['phone'])){
            $this->ajaxReturn(array(
                    'error' => 0
                ));
        }else{
            $this->ajaxReturn(array(
                    'error' => 1
                ));
        }
    }
	//修改收货地址
    function modifyaddr(){
        $orderid = $_POST['orderid'];
        $order_model = M('sorder');
        if($order_model ->where("orderid = {$orderid}") ->setField('delivery',$_POST['delivery'])){
            $this->ajaxReturn(array(
                    'error' => 0
                ));
        }else{
            $this->ajaxReturn(array(
                    'error' => 1
                ));
        }
    }
	//快递信息
    function kuaidi(){
        $orderid = $_POST['orderid'];
        $order_model = M('sorder');
        if($order_model ->where("orderid = {$orderid}") ->setField($_POST['key'],$_POST['value'])){
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