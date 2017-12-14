<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/6/13
 * Time: 11:37
 */
namespace Home\Controller;
use Think\Controller;
class BaiduController extends Controller{
	private $token;
	private $wecha_id;
	private $alipayConfig;
	private $from;
	private $pro_name;
	private $return_url;
	private $order;
	private $setting;

	public function _initialize() {
		unset($_GET['_URL_']);
		$config = array();
		$config['SP_NO']      = '';
		$config['SP_KEY']     = '';
		$config['RETURN_URL'] = SITE_URL."index.php/Home/Baidu/return_url";
		$config['PAGE_URL']   = SITE_URL."index.php/Home/Baidu/page_url";
		$config['BFB_QUERY_RETRY_TIME']   = 3;
		$config['BFB_INTERFACE_ENCODING'] = 1;
		$data   = D('pay')->where("type = 'baidu'")->select();//百度钱包商户账号
		//var_dump($data);exit;
		if($data) {
			$config['SP_NO']      = $data[0]['bpartnerid'];
			$config['SP_KEY']     = $data[0]['bpaysignkey'];
		}
		$this->setting = $config;	
	}
	public function bdpay(){
		$orderid = I("id",0);
		$paytype = I("type",0);
		/*请求支付参数处理*start*/
        //积分充值支付参数
        if($paytype == "reg"){
            $regid = $id;
			$regfee = M('regfee')->find($regid);
            $out_trade_no = '1'.$regfee['reg_sn'];
            $total_fee = $regfee['amount'] * 100;
            $desc = "积分充值";
			//成功后跳转地址
			$return_url = SITE_URL."index.php/Home/User/regfee?restatus=success";

        //申请代理费用支付参数
        }else if($paytype == "agentfee"){
            $agent_id = $id;
			$agentfee = M('agentfee')->find($agent_id);
            $out_trade_no = '2'.$agentfee['agent_sn'];
            $total_fee = $agentfee['amount'] * 100;
            $desc = "代理费";
			//成功后跳转地址
			$return_url = SITE_URL."index.php/Home/User/channel";

        //首付款支付参数
        }else if($paytype == "downpay"){
            $book_id = $id;
			$bookinfo = M('booking')->where("book_id = {$book_id}")->find();
            $out_trade_no = '3'.$bookinfo['book_sn'];

            $total_fee = $bookinfo['downpay'] * 100;
			$goodsinfo = M('haoche')->find($bookinfo['goods_id']);
            $goods_name = $goodsinfo['goods_name'];
            $desc = $goods_name.' '."首付款";
			//成功后跳转地址
			$return_url = SITE_URL."index.php/Home/Booking/bookinfo";


        //订单单个商品支付参数
        }else if($paytype == "orderpay"){
            $orderid = $id;
			$orderinfo = M('order')->where("orderid = {$orderid}")->find();
            $out_trade_no = '4'.$orderinfo['orderno'];
            $total_fee = $orderinfo['downpay'] * 100;
            $goodsinfo = M('goods')->find($orderinfo['goods_id']);
            $desc = $goodsinfo['goods_name'].' '."首付款";
			//成功后跳转地址
			$return_url = SITE_URL."index.php/Home/Order/sending";


        }else if($paytype == "sumpay"){
            $sumid = $id;
			$orderinfo = M('sumorder')->where("sumid = {$sumid}")->find();
            $out_trade_no = '5'.$orderinfo['sum_sn'];
            $total_fee = $orderinfo['total_my'] * 100;
            $goods_name = $orderinfo['goods_name'];
            $desc = $goods_name.' '."首付款";
			//成功后跳转地址
			$return_url = SITE_URL."index.php/Home/Order/sending";

        }else if($paytype == "housepay"){
			$house_id = $id;
			$houseinfo = M('house')->find($house_id);
			$out_trade_no = '6'.$houseinfo['serial_no'];
			$total_fee = $houseinfo['deposit'] * 100;
			$desc = "0元购房申请意向金";
			//成功后跳转地址
			$return_url = SITE_URL."index.php/Home/House/showlist";

		}else if($paytype == "donate"){
			$id = $id;
			$cimoney = M('cimoney')->find($id);
			$out_trade_no = '7'.$cimoney['serial_no'];
			$total_fee = $cimoney['money'] * 100;
			$desc = "捐助金";
			//成功后跳转地址
			$return_url = SITE_URL."index.php/Home/Cishan/index/errormsg/OK";

		}else if($paytype == "banka"){
			$id = $id;
			$banka = M('caiclub')->find($id);
			$out_trade_no = '8'.$banka['serial_sn'];
			$total_fee = $banka['card_fee'] * 100;
			$desc = "办卡定金";
			//成功后跳转地址
			$return_url = SITE_URL."index.php/Home/Caiclub/apply/errormsg/OK1";

		}else if($paytype == "yangka"){
			$id = $id;
			$yangka = M('yangka')->find($id);
			$out_trade_no = '9'.$banka['serial_sn'];
			$total_fee = $yangka['amount'] * 100;
			$desc = "养卡定金";
			//成功后跳转地址
			$return_url = SITE_URL."index.php/Home/Caiclub/apply/errormsg/OK2";

		}else if($paytype == "tie"){
			$id = $id;
			$tie = M('tie')->find($id);
			$out_trade_no = '0'.$tie['serial_sn'];
			$total_fee = $tie['amount'] * 100;
			$desc = "提额定金";
			//成功后跳转地址
			$return_url = SITE_URL."index.php/Home/Caiclub/apply/errormsg/OK3";
		}else if($paytype == "daikuan"){
			$id = $id;
			$daikuan = M('daikuan')->find($id);
			$out_trade_no = '01'.$daikuan['serial_sn'];
			$total_fee = $daikuan['amount'] * 100;
			$desc = "贷款定金";
			//成功后跳转地址
			$return_url = SITE_URL."index.php/Home/Caiclub/apply/errormsg/OK4";
		}else if($paytype == "vipfee"){
            $bevip = M('bevip')->find($id);
            $out_trade_no = '02'.$bevip['ordersn'];
            $total_fee = $bevip['amount'] * 100;
            $desc = "会员缴费";
            //成功后跳转地址
            $return_url = SITE_URL."index.php/Home/Union/index";
        }else if($paytype == "mchfee"){
            $seller = M('seller')->find($id);
            $out_trade_no = '03'.$seller['ordersn'];

            $total_fee = $seller['amount'] * 100;
            $desc = "成为商家缴费";
            //成功后跳转地址
            $return_url = SITE_URL."index.php/Home/Core/bemerch";
        }else if($paytype == 'sorderpay'){
            $sorder = M('sorder')->alias('s')->field("s.*,g.goods_name")->join("hc_sgoods as g on g.goods_id = s.goods_id")->where("orderid = {$id}")->select();
            $out_trade_no = '04'.$sorder[0]['orderno'];
            $total_fee = $sorder[0]['orderamount'] * 100;
            $desc = $sorder[0]['goods_name'];
            //成功后跳转地址
            $return_url = SITE_URL."index.php/Home/Order/sending";
        }else if($paytype == 'together'){
            $together = M('together')->find($id);
            $out_trade_no = '05'.$together['orderno'];
            $total_fee = $together['orderamount'] * 100;
            $desc = '整单购买';
            //成功后跳转地址
            $return_url = SITE_URL."index.php/Home/Order/received";
        }else if($paytype == 'yuyue'){
			$yuyueinfo = M('yuyue')->find($id);
			$zenginfo = M('zeng')->find($yuyueinfo['zeng_id']);
			$out_trade_no = '06'.$yuyueinfo['orderno'];
			$total_fee = $yuyueinfo['orderamount'] * 100;
            $desc = $zenginfo['zeng_name'];
            //成功后跳转地址
            $return_url = SITE_URL."index.php/Home/Order/sending";
		}else if($paytype == 'quanyi'){
			$quanyiinfo = M('quanyiorder')->find($id);
			$goodsinfo = M('quanyi')->find($quanyiinfo['quanyi_id']);
			$out_trade_no = '07'.$goodsinfo['orderno'];
			$total_fee = $goodsinfo['orderamount'] * 100;
            $desc = $goodsinfo['name'];
            //成功后跳转地址
            $return_url = SITE_URL."index.php/Home/Order/sending";
		}
        /*请求参数处理*end*/
        $timestamp = time();
		$this->token = I("token",0);
		parse_str(urldecode($_SERVER['QUERY_STRING']), $_GET);
		if(isset($_GET['extra'])){
			$this->token = $_GET['extra'];
		}else{
			$this->token = md5(rand(0,999).time());
		}
        $desc = iconv("UTF-8", "GBK", urldecode($desc));
		$params = array (
			'order_no'          => $out_trade_no,      //订单号
			'order_create_time' => date("YmdHis",$timestamp),
			'goods_name'        => "{$desc}",          //品名
			'total_amount'      => $total_fee,       //总计
			'extra'             => $this->token
		);
		$baidu = new \Model\PayModel();
		$baidu->config($this->setting);
		$order_url = $baidu->create_order($params);
		//echo $order_url;exit;
		if($order_url) echo "<script>window.location=\"" . $order_url . "\";</script>";
		else die('Error');
	}

	public function return_url(){
		parse_str(urldecode($_SERVER['QUERY_STRING']), $_GET);
		$baidu = new \Model\PayModel();
		$baidu->config($this->setting);

		//fwrite(fopen("./Lib/Action/Wap/get.txt", "w"), print_r($get, true));
		//fwrite(fopen("./Lib/Action/Wap/server.txt", "w"), print_r($_SERVER, true));

		//检查非法请求
		if(!$baidu->check_sign($_GET)) die('非法请求');

		$order_no = $_GET['order_no'];  //订单号
		$rows     = $baidu->check_order($order_no);

		if(!$rows) {
			//fwrite(fopen('error.log', 'a'), $baidu->err_msg . "\n");
			exit;
		}
		//支付成功
		if($rows['pay_result'] == 1) {
			$out_trade_no = $parameter['out_trade_no'];
	        $paytype = substr($out_trade_no,0,1);
	        $out_trade_no = substr($out_trade_no,1);

	        if($paytype == 1){
	            $this->reg($out_trade_no);
	        }elseif($paytype == 2){
				$this->agentfee($out_trade_no);
	        }elseif($paytype == 3){
				$this->downpay($out_trade_no);
	        }elseif($paytype == 4){
	            $this->orderpay($out_trade_no);
	        }elseif($paytype == 5){
				$this->sumpay($out_trade_no);
	        }elseif($paytype == 6){
				$this->housepay($out_trade_no);
			}elseif($paytype == 7){
				$this->donate($out_trade_no);
			}elseif($paytype == 8){
				$this->banka($out_trade_no);
			}elseif($paytype == 9){
				$this->yangka($out_trade_no);
			}elseif($paytype == 0){
				$paytype = substr($out_trade_no,0,1);
				$out_trade_no = substr($out_trade_no,1);
				if($paytype == '1'){
					$this->daikuan($out_trade_no);
				}elseif('2' == $paytype){
					$this->vipfee($out_trade_no);
				}elseif('3' == $paytype){
					$this->mchfee($out_trade_no);
				}elseif('4' == $paytype){
					$this->sorderpay($out_trade_no);
				}elseif('5' == $paytype){
					$this->together($out_trade_no);
				}elseif('6' == $paytype){
					$this->yuyue($out_trade_no);
				}elseif('7' == $paytype){
					$this->quanyi($out_trade_no);
				}else{
					return false;
				}
			}else{
				return false;
			}
		}
		//向百付宝发起回执
		$baidu->notify();
		
	}
	//充值成功后操作
    private function reg($out_trade_no){
        $reg_sn = $out_trade_no;
        $detail_model = M('userdetail');
		$user_model = M('user');

		$setting_model = M('setting');
		$set = $setting_model->find();
        $regfee_model = M('regfee');
		$nowtime = time();
		//fwrite(fopen("./Home/zz.txt",'w'),print_r($reg_sn, true));
        $regfee = $regfee_model->where("reg_sn = '{$reg_sn}'")->select();
		fwrite(fopen("./Home/regfee.txt",'a'),print_r('用户id：'.$regfee[0]['userid'].'流水号：'.$regfee[0]['reg_sn'].'时间：'.date("Y-m-d H:i:s",$nowtime)."\r\n", true));
		//fwrite(fopen("./Home/zz.txt",'w'),print_r($regfee, true));
		$userid = $regfee[0]['userid'];
		$userinfo = $user_model->where("userid = {$userid}")->find();
		fwrite(fopen("./Home/userinfo.txt",'a'),print_r('用户id:'.$userinfo['userid'].'时间：'.date("Y-m-d H:i:s",$nowtime)."\r\n", true));

		//更新支付状态
        if($regfee_model->where("reg_sn = '{$out_trade_no}'")->setField('status','1')){
			$regfee_model->where("reg_sn = '{$out_trade_no}'")->setField('paytime',$nowtime);
			$logstr = '会员id：'.$userid.'会员名：'.$userinfo['nikename'].'会员电话：'.$userinfo['reg_phone'].'时间：'.date('Y-m-d H:i:s',time())."\r\n";
			fwrite(fopen("./Home/rechargelog.txt",'a'),print_r($logstr, true));
			$detail_model->where("userid = {$userid}")->setInc('shop_sc',$set['back_reg']);
			M('userdetail')->where("userid = {$userid}")->setInc('purse',$regfee[0]['amount'] * $set['purse_vol']);//更新兑现钱包大小
			//更新操作记录表
			$records['sourceid'] = $userid;
			$records['destid'] = $userid;
			$records['amount'] = $set['back_reg'];
			$records['type'] = '积分冲值';
			$records['sc_type'] = '乐购';
			$records['time'] = $nowtime;
			M('operate')->add($records);


			$user_model->where("userid = {$userid}")->setField('is_vip','1');
			//$_SESSION['userInfo']['is_vip'] = '1';//更新session中会员状态
			//查询上级信息
			$puserinfo = $user_model->where("userid = {$userinfo['pid']}")->find();
			if($puserinfo['is_vip'] == 1){
				$pback = ($set['regfee']/100)*$set['legou_one'];//返给上级的兑现积分
				$coin = floor($set['pct_scoretocoin'] * $pback / 100);//转化为联盟金币数量
				$cash_sc = $pback - $coin;
				$score['cash_sc'] = array('exp',"cash_sc+".$cash_sc);
				$score['credit_sc'] = array('exp',"credit_sc+".$cash_sc);
				$score['coin'] = array('exp','coin+'.$coin);
				$detail_model->where("userid = {$userinfo['pid']}")->save($score);
				//更新操作记录表
				$records['sourceid'] = $userid;
				$records['destid'] = $userinfo['pid'];
				$records['amount'] = $cash_sc;
				$records['coin'] = $coin;
				$records['type'] = '积分充值';
				$records['sc_type'] = '兑现';
				$records['time'] = time();
				M('operate')->add($records);
			}
			//上上级用户信息
			$ppuserinfo = $user_model ->find($puserinfo['pid']);
			if($ppuserinfo['is_vip'] == 1){
				$ppback = ($set['regfee']/100)*$set['legou_two'];//返给上上级的兑现积分
				$ppcoin = floor($set['pct_scoretocoin'] * $ppback / 100);//转化为联盟金币数量
				$ppcash_sc = $ppback - $ppcoin;
				$score['cash_sc'] = array('exp',"cash_sc+".$ppcash_sc);
				$score['credit_sc'] = array('exp',"credit_sc+".$ppcash_sc);
				$score['coin'] = array('exp','coin+'.$ppcoin);
				$detail_model->where("userid = {$puserinfo['pid']}")->save($score);
				//更新操作记录表
				$records['sourceid'] = $userid;
				$records['destid'] = $puserinfo['pid'];
				$records['amount'] = $ppcash_sc;
				$records['coin'] = $ppcoin;
				$records['type'] = '积分充值';
				$records['sc_type'] = '兑现';
				$records['time'] = time();
				M('operate')->add($records);
			}
		}
		return true;
    }
	//申请代理支付成功操作
	private function agentfee($out_trade_no) {
		//$userid = $_SESSION['userInfo']['userid'];
		$agent_sn = $out_trade_no;
		//$detail_model = M('userdetail');
		$user_model = M('user');
		$agent_model = M('agentfee');
		$agentfee = $agent_model -> where("agent_sn = '{$agent_sn}'")->select();
		$agentfee = $agentfee[0];
		$userid = $agentfee['userid'];
		$data['status'] = '1';
		//$data['paytime'] = time();
		//修改代理费用支付表
		if($agent_model->where("agent_sn = '{$agent_sn}'")->save($data)){
			$agent_model->where("agent_sn = '{$agent_sn}'")->setField('paytime',time());
			$user_model->where("userid = {$userid}")->setField('level','1');
		}


		return true;
	}
	//订车支付成功操作
	private function downpay($out_trade_no){
		//$pid = $_SESSION['userInfo']['pid'];
		//$userid = $_SESSION['userInfo']['userid'];
		$book_sn = $out_trade_no;
		$book_model = M('booking');
		$user_model = M('user');
		$detail_model = M('userdetail');
		$setting_model = M('setting');
		$set = $setting_model -> find();

		$data['is_paydown'] = '1';
		$data['paytype'] = '1';

		//修改订单状态
		if($book_model->where("book_sn = '{$book_sn}'")->save($data)){
			$nowtime = time();
			$book_model->where("book_sn = '{$book_sn}'")->setField('paytime',$nowtime);
			$bookinfo = $book_model->where("book_sn = '{$book_sn}'")->select();//订车单信息
			//减库存
			M('haoche')->where("goods_id = {$bookinfo[0]['goods_id']}")->setDec('number',1);
			$bookinfo = $bookinfo[0];
			$userinfo = $user_model ->find($bookinfo[0]['userid']);
			$userid = $userinfo['userid'];
			$pid = $userinfo['pid'];

			if($pid == 0){
				//如果上级不存在
			}else{
				//如果上级存在
				$condition['is_paydown'] = '1';
				$condition['userid'] = $pid;
				$condition['aplay_refunds'] = '0';
				$pbookinfo = $book_model->where($condition)->select();//上级订车单信息
				//如果上级定了车
				if($pbookinfo){
					$pback = ($bookinfo['downpay']/100)*$set['pct_backprev'];//返给上级的兑现积分
					$coin = floor($set['pct_scoretocoin'] * $pback / 100);//转化为联盟金币数量
					$cash_sc = $pback - $coin;
					$score['cash_sc'] = array('exp',"cash_sc+".$cash_sc);
					$score['credit_sc'] = array('exp',"credit_sc+".$cash_sc);
					$score['coin'] = array('exp',"coin+".$coin);
					$detail_model->where("userid = {$pid}")->save($score);
					//更新操作记录表
					$records['sourceid'] = $userid;
					$records['destid'] = $pid;
					$records['amount'] = $cash_sc;
					$records['coin'] = $coin;
					$records['type'] = '订车';
					$records['sc_type'] = '兑现';
					$records['time'] = time();
					M('operate')->add($records);
				}
				$puserinfo = $user_model->find($pid);//上级会员信息

				if($puserinfo['pid'] == 0){
					//如果上上级不存在
				}else{
					//如果上上级存在
					$condition['is_paydown'] = '1';
					$condition['userid'] = $puserinfo['pid'];
					$condition['aplay_refunds'] = '0';
					$ppbookinfo = $book_model->where($condition)->select();//上上级订车单信息
					if($ppbookinfo){
						$ppback = ($bookinfo['downpay']/100)*$set['pct_backpprev'];//返给上上级的消费积分
						$detail_model->where("userid = {$puserinfo['pid']}")->setInc("consume_sc",$ppback);
						//更新操作记录表
						$records['sourceid'] = $userid;
						$records['destid'] = $puserinfo['pid'];
						$records['amount'] = $ppback;
						$records['type'] = '订车';
						$records['sc_type'] = '消费';
						$records['time'] = time();
						M('operate')->add($records);
					}

				}
			}
		}
		return true;
	}
    //单个商品订单支付成功操作
    private function  orderpay($out_trade_no){
        //$userid = $_SESSION['userInfo']['userid'];
        $orderno = $out_trade_no;
        $setting_model = M('setting');
		//fwrite(fopen("./Home/xx.txt",'w'),print_r($out_trade_no, true));
        $detail_model = M('userdetail');
        $order_model = M('order');
        $set = $setting_model -> find();
		//查询订单信息
		$orderinfo = $order_model->where("orderno = '{$orderno}'")->find();
		$userid = $orderinfo['userid'];
		$logstr = '会员id：'.$orderinfo['userid'].'订单号：'.$out_trade_no.'金额：'.$orderinfo['downpay'].'积分：'.$orderinfo['score'].'时间：'.date("Y-m-d H:i:s",time())."\r\n";
		fwrite(fopen("./Home/orderlog.txt",'a'),print_r($logstr, true));
		//fwrite(fopen("./Home/xx.txt",'w'),print_r($orderinfo, true));
		//fwrite(fopen("./Home/zz.txt",'w'),print_r($userid, true));


        $data['pay_status'] = '1';
        //$data['paytime'] = time();
		//更改订单状态
        if($order_model -> where("orderno = '{$orderno}'") -> save($data)){
			$nowtime = time();
			$orderdata['paytime'] = $nowtime;
			$orderdata['fahuotime'] = strtotime(date('Y-m-d',$nowtime)) + 3600 * 24 * $orderinfo['cycle'];
			$order_model -> where("orderno = '{$orderno}'") -> save($orderdata);
			//从用户积分中扣除所需乐购积分
			$detail_model ->where("userid = {$userid}")->setDec('shop_sc',$orderinfo['score']);
			//减少库存
			M('goods')->where("goods_id = {$orderinfo['goods_id']}")->setDec('number',$orderinfo['number']);
			$orderids = $order_model->field("orderid")->where("userid = {$userid} AND pay_status = '0' AND shipping_status = '0' AND (goods_id = 111 OR goods_id = 353) AND is_del = '0' AND orderno != '{$orderno}'")->select();
			if(!$orderids){

			}else{
				$arr_userid = array();
				foreach($orderids as $key=>$value){
					if($orderinfo['orderid'] == $value['orderid']){
						unset($orderids[$key]);
					}else{
						$arr_userid[] = $value['orderid'];
					}
				}
				$str_userid = implode(',',$arr_userid);
				if(!empty($str_userid)){
					$map['orderid'] = array('in',$str_userid);
					$map['userid'] = $userid;
					$order_model->where($map)->setField('is_del','1');
				}
			}
		}
		return true;
    }
    //多个商品合并支付操作成功
    private function sumpay($out_trade_no){
		//$userid = $_SESSION['userInfo']['userid'];
        $sum_sn = $out_trade_no;
        $setting_model = M('setting');
        $sumorder_model = M('sumorder');
		$goods_model = M('goods');
        $detail_model = M('userdetail');
        $order_model = M('order');
        $set = $setting_model -> find();
        //查询合并订单信息
		$sumorderinfo = $sumorder_model->where("sum_sn = '{$sum_sn}'")->find();
		$userid = $sumorderinfo['userid'];



        //$data['paytime'] = time();
		//修改合并支付订单状态
        if($sumorder_model -> where("sum_sn = '{$sum_sn}'") -> setField('status','1')){
			$nowtime = time();
			$sumorder_model -> where("sum_sn = '{$sum_sn}'")->setField('paytime',$nowtime);
			//从用户积分中扣除所需乐购积分
			$detail_model ->where("userid = {$userid}")->setDec('shop_sc',$sumorderinfo['total_sc']);
			unset($data['status']);$data['pay_status'] = '1';
			$sum_order = $sumorder_model -> where("sum_sn = '{$sum_sn}'") -> select();
			$sumid = $sum_order[0]['sumid'];
			$order_model -> where("sumid = {$sumid} AND userid = {$userid}") ->save($data);//设置单个订单的状态
			$ids_arr = $order_model->field("goods_id,number,orderid")->where("sumid = {$sumid} AND userid = {$userid}")->select();
			//$newarr = array();
			foreach($ids_arr as $key=>$value){
				$orderinfo = $order_model -> find($value['orderid']);
				$orderdata['paytime'] = $nowtime;
				$orderdata['fahuotime'] = strtotime(date('Y-m-d',$nowtime)) + 3600 * 24 * $orderinfo['cycle'];
				$order_model -> where("orderid = {$orderinfo['orderid']}") -> save($orderdata);
				//减库存
				$goods_model->where("goods_id = {$value['goods_id']}")->setDec('number',$value['number']);
			}
		}
		return true;
    }
	//房天下意向金支付成功操作
	private function housepay($out_trade_no) {
		$serial_no = $out_trade_no;
		$data['pay_status'] = '1';
		$data['paytime'] = time();
		M('house')->where("serial_no = '{$serial_no}'")->save($data);

		return true;
	}
	//捐助成功后操作
	private function donate($out_trade_no) {
		$cimoney = M('cimoney')->where("serial_no = '{$serial_no}'")->select();
		$cimoney = $cimoney[0];
		$serial_no = $out_trade_no;
		if(M('cimoney')->where("serial_no = '{$serial_no}'")->setField('status','1')){
			$donate = M('donate')->find();
			M('donate')->where("id = {$donate['id']}")->setInc('surplus',$cimoney['money']);
		}
		return true;
	}
	//办卡成功后
	private function banka($out_trade_no) {
		//$userid = $_SESSION['userInfo']['userid'];
		//$pid = $_SESSION['userInfo']['pid'];
		$set = M('setting')->field('caishen')->find();
		$caiclub = M('Caiclub');
		$user_model = M('user');
		$serial_sn = $out_trade_no;
		//办卡信息
		$bankainfo = $caiclub -> where("serial_sn = '{$serial_sn}'") ->select();
		//用户资料
		$userinfo = $user_model -> find($bankayinfo[0]['userid']);
		$userid = $userinfo['userid'];
		$pid = $userinfo['pid'];
		$data['pay_status'] = '1';
		$data['paytime'] = time();
		if($caiclub->where("serial_sn = '{$serial_sn}'")->save($data)){
			if($pid != 0){
				$pbanka =  $caiclub->where("userid = {$pid}")->find();
				if($pbanka){
					$pback = round(($caiclub['card_fee']*$set['caishen'])/100,2);
					$score['cash_sc'] = array('exp',"cash_sc+".$pback);
					$score['credit_sc'] = array('exp',"credit_sc+".$pback);
					M('userdetail')->where("userid = {$userid}")->save($score);
					//更新操作记录表
					$records['sourceid'] = $userid;
					$records['destid'] = $pid;
					$records['amount'] = $pback;
					$records['type'] = '办卡';
					$records['sc_type'] = '兑现';
					$records['time'] = time();
					M('operate')->add($records);
				}
			}
		}

		return true;;
	}
	//养卡支付成功后
	private function yangka($out_trade_no) {
		$serial_sn = $out_trade_no;
		$data['pay_status'] = '1';
		$data['paytime'] = time();
		M('yangka')->where("serial_sn = '{$serial_sn}'")->save($data);
		return true;
	}
	//提额支付成功后
	private function tie($out_trade_no) {
		$serial_sn = $out_trade_no;
		$data['pay_status'] = '1';
		$data['paytime'] = time();
		M('tie')->where("serial_sn = '{$serial_sn}'")->save($data);
		return true;
	}
	//贷款支付成功后
	private function daikuan($out_trade_no) {
		$serial_sn = $out_trade_no;
		$data['pay_status'] = '1';
		$data['paytime'] = time();
		M('daikuan')->where("serial_sn = '{$serial_sn}'")->save($data);
		return true;
	}
	//会员费支付成功回调
    private function vipfee($out_trade_no){
        $bevip_model = M('bevip');
        $set = M('setting')->find();
        $nowtime = time();
        $vipfee = $bevip_model->where("ordersn = '{$out_trade_no}'")->find();//会员缴费信息
        $userid = $vipfee['userid'];
        $user_model = M('user');
        $userinfo = $user_model -> find($userid);//用户信息
		//fwrite(fopen("./Home/vv.txt",'a'),print_r($userid, true));


		//fwrite(fopen("./Home/vv.txt",'a'),print_r($paystatus, true));
        //如果修改支付状态成功，执行以下操作
        if($bevip_model->where("vipid = {$vipfee['vipid']}")->setField('status','1')){
			$paystatus1['paytime'] = $nowtime;
			$paystatus1['counts'] = array('exp','counts+1');
			$bevip_model->where("vipid = {$vipfee['vipid']}")->save($paystatus1);
            $data['is_supvip'] = '1';
            $data['is_vip'] = '1';
            $data['viptime'] = $nowtime;
            $data['vipexpire'] = $nowtime + $set['vipexpire'] * 365 * 24 * 3600;
            //如果修改用户状态成功，执行以下操作
            if($user_model->where("userid = {$userid}")->save($data)){

                //计算返回的兑现积分
                if($userinfo['pid'] != 0){
					$puserinfo = $user_model->where("userid = {$userinfo['pid']}")->find();
					if($puserinfo['is_supvip'] == 1){
						$pback = floor($vipfee['amount'] * $set['pct_prev'] / 100);
						//计算上级会员获得积分
						$coin = floor($set['pct_scoretocoin'] * $pback / 100);//转化为联盟金币数量
						$cash_sc = $pback - $coin;
						$score['cash_sc'] = array('exp','cash_sc+'.$cash_sc);
						$score['credit_sc'] = array('exp','credit_sc+'.$cash_sc);
						$score['coin'] = array('exp','coin+'.$coin);
						M('userdetail') -> where("userid = {$userinfo['pid']}") -> save($score);
						//更新操作记录表
						$records['sourceid'] = $userid;
						$records['destid'] = $userinfo['pid'];
						$records['amount'] = $cash_sc;
						$records['coin'] = $coin;
						$records['type'] = '成为联盟会员';
						$records['sc_type'] = '兑现';
						$records['time'] = $nowtime;
						M('operate')->add($records);
					}
                }else{
					$pback = 0;
				}


                if($puserinfo['pid'] != 0){
					//上上级会员信息
					$ppuserinfo = $user_model -> where("userid = {$puserinfo['pid']}") -> find();
					if($ppuserinfo['is_supvip'] == '1'){
						$ppback = floor($vipfee['amount'] * $set['pct_pprev'] / 100);
						//计算上上级会员获得积分
						$ppcoin = floor($set['pct_scoretocoin'] * $ppback / 100);//转化为联盟金币数量
						$ppcash_sc = $ppback - $ppcoin;
						$score['cash_sc'] = array('exp','cash_sc+'.$ppcash_sc);
						$score['credit_sc'] = array('exp','credit_sc+'.$ppcash_sc);
						$score['coin'] = array('exp','coin+'.$ppcoin);

						M('userdetail') -> where("userid = {$puserinfo['pid']}") -> save($score);
						//更新操作记录表
						$records['sourceid'] = $userid;
						$records['destid'] = $puserinfo['pid'];
						$records['amount'] = $ppcash_sc;
						$records['coin'] = $ppcoin;
						$records['type'] = '成为联盟会员';
						$records['sc_type'] = '兑现';
						$records['time'] = $nowtime;
						M('operate')->add($records);
					}
                }else{
					$ppback = 0;
				}
                //计算商家获得返利
                if($userinfo['sid'] != 0){
					$sellerinfo = M('seller')->where("userid = {$userinfo['sid']}")->find();
					$suserinfo = M('user')->where("userid = {$userinfo['sid']}")->find();
					if($sellerinfo && $suserinfo['is_merch'] == 1){
						$sback = round($vipfee['amount'] * $set['pct_other'] / 100,2);
						$usermoney['money'] = array('exp','money +'.$sback);
						$usermoney['totalmoney'] = array('exp','totalmoney +'.$sback);
						M('user') -> where("userid = {$userinfo['sid']}") -> save($usermoney);
						//商家收益记录
						$shuju['type'] = '';
						$shuju['orderid'] = $vipfee['vipid'];
						$shuju['sid'] = $userinfo['sid'];
						$shuju['amount'] = $sback;
						$shuju['ctime'] = time();
						M('sellershouyi')->add($shuju);
						$agentinfo = M('user')->where("userid = {$sellerinfo['agent_id']}")->find();
						if($agentinfo && $agentinfo['level'] == 1){
							$agentback = round(($vipfee['amount'] - $pback - $ppback - $sback) * $set['pct_agent_union'] / 100,2);//计算渠道商所得
							$usermoney1['money'] = array('exp','money +'.$agentback);
							$usermoney1['totalmoney'] = array('exp','totalmoney +'.$agentback);
							M('user') -> where("userid = {$sellerinfo['agent_id']}") -> save($usermoney1);
							//渠道商收益记录
							$shuju1['type'] = '';
							$shuju1['orderid'] = $vipfee['vipid'];
							$shuju1['agent_id'] = $sellerinfo['agent_id'];
							$shuju1['amount'] = $agentback;
							$shuju1['ctime'] = time();
							M('agent_shouyi')->add($shuju1);
						}
					}


                }

            }
        }
        return true;
    }
    //成为商家缴费成功回调
    private function mchfee($out_trade_no){
        $set = M('setting')->find();
        $seller_model = M('seller');
        $seller = $seller_model -> where("ordersn = '{$out_trade_no}'")->find();
        $userid = $seller['userid'];
        $seller_id = $seller['seller_id'];
        $userinfo = M('user')->find($userid);
        $nowtime = time();

        if($seller_model->where("seller_id = {$seller_id}")->setField('paystatus','1')){
			$pay1['counts'] = array('exp','counts+1');
			$pay1['paytime'] = $nowtime;
			$seller_model->where("seller_id = {$seller_id}")->save($pay1);
            //$data['is_merch'] = '1';
            //$data['merchtime'] = $nowtime;
            //$data['merchexpire'] = $nowtime + $set['merchexpire'] * 365 * 24 * 3600;
            //if(M('user')->where("userid = {$userid}")->save($data)){
            //记录缴费信息
            $shuju['type'] = 1;
            $shuju['sid'] = $userid;
            $shuju['ctime'] = $nowtime;
            $shuju['amount'] = $set['mchfee'];
            M('shouyi')->add($shuju);
            return true;
            //}
        }
        return true;
    }
    //商家订单支付成功回调
    private function sorderpay($out_trade_no){
		$set = M('setting')->find();
		$orderinfo = M('sorder') ->  where("orderno = '{$out_trade_no}'") -> find();
		$goodsinfo = M('sgoods') -> where("goods_id = {$orderinfo['goods_id']}") -> find();
		$userid = $orderinfo['userid'];
        $data['pay_status'] = '1';
        if(M('sorder')->where("orderno = '{$out_trade_no}'")->save($data)){
			$nowtime = time();
			M('sorder')->where("orderid = {$orderinfo['orderid']}")->setField('paytime',$nowtime);
			//$jifen['cash_sc'] = array('exp','cash_sc-'.$orderinfo['orderamount']);
			if($orderinfo['diyong'] > 0){
				$jifen['coin'] = array('exp','coin-'.$orderinfo['diyong']);
			}
			M('userdetail')->where("userid = {$userid}")->save($jifen);
			//更新操作记录表
			$records['come_away'] = '1';
			$records['sourceid'] = $userid;
			$records['destid'] = $userid;
			$records['amount'] = 0;
			$records['type'] = '购买'.$goodsinfo['goods_name'];
			$records['sc_type'] = '兑现';
			$records['coin'] = $orderinfo['diyong'];
			$records['time'] = $nowtime;
			M('operate')->add($records);
            return true;
        }
        return true;
    }
    //整单购买支付成功回调
    private function together($out_trade_no){
        $together_model = M('together');
        //设置支付状态
        if($together_model->where("orderno = '{$out_trade_no}'")->setField('status','1')){
			$orderinfo = $together_model->where("orderno = '{$out_trade_no}'")->find();
			$sellerinfo = M('seller')->where("userid = {$orderinfo['sid']}")->find();
			if($orderinfo['diyong'] > 0){
				M('userdetail')->where("userid = {$orderinfo['userid']}")->setDec('coin',$orderinfo['diyong']);
			}
			//更新操作记录表
			$records['come_away'] = '1';
			$records['sourceid'] = $orderinfo['userid'];
			$records['destid'] = $orderinfo['userid'];
			$records['amount'] = 0;
			$records['type'] = "在<b style='color:#8251de;'>".$sellerinfo['seller_name'].'</b>整单结算';
			$records['sc_type'] = '兑现';
			$records['coin'] = $orderinfo['diyong'];
			$records['time'] = time();
            return true;
        }
        return true;
    }
	//预约订单支付成功回调
	private function yuyue($out_trade_no) {
		$yuyue_model = M('yuyue');
		//设置支付状态
		if($yuyue_model->where("orderno = '{$out_trade_no}'")->setField('pay_status','1')){
			return true;
		}
		return false;
	}
	//预约订单支付成功回调
	private function quanyi($out_trade_no) {
		$quanyi_model = M('quanyiorder');
		//设置支付状态
		if($quanyi_model->where("orderno = '{$out_trade_no}'")->setField('pay_status','1')){
			return true;
		}
		return false;
	}
	public function page_url(){
		$baidu = new \Model\PayModel();
		$baidu->config($this->setting);
		//检查非法请求
		$_error = iconv('utf-8', 'gbk', '非法请求');
		if(!$baidu->check_sign($_GET)) die($_error);

		header("location:".$this->return_url);
		//下面去查订单表状态，成功还是失败
		/*$_str = iconv( 'gbk', 'utf-8','支付成功！<br />订单号：' . $order_no .'<br />');
		echo "<div style='text-align:center;font-size:16px;'>".$_str."</div>";*/
	}
}