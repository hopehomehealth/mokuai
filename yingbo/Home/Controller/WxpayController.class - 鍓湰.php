<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/6/13
 * Time: 11:37
 */
namespace Home\Controller;
use Common\Common\ComController;
class WxpayController extends ComController {
    //初始化
    public function _initialize()
    {
        //引入WxPayPubHelper
       //Vendor('Wxpay.WxPayPubHelper.WxPayPubHelper');
    }
    public function pay(){
        Vendor('Wxpay.WxPayPubHelper.WxPayPubHelper');
        /*微信支付配置信息start*/
        $setting_model = D('setting');
        $set = $setting_model->find();
        $config =array();
        $config['appid'] = $set['appid'];
        $config['mchid'] = $set['partnerid'];
        $config['key'] = $set['paysignkey'];
        $config['appsecret'] = $set['appsecret'];
        /*$config['sslcert_path'] = 'http://lehu.ew9t.cn/ThinkPHP/Library/Vendor/Wxpay/WxPayPubHelper/cacert/apiclient_cert.pem';
        $config['sslkey_path'] = 'http://lehu.ew9t.cn/ThinkPHP/Library/Vendor/Wxpay/WxPayPubHelper/cacert/apiclient_key.pem';*/
        $config['js_api_call_url'] = SITE_URL.'index.php/Home/Wxpay/pay';
        $config['notify_url'] = SITE_URL.'index.php/Home/Wxpay/notify_url';
        /*微信支付配置信息end*/
		if(strlen($_GET['state']) > 5){
			$state = json_decode(json_encode(json_decode($_GET['state'])),true);
			if(!is_array($state)){
				$state = $_GET['state'];
				$state = str_replace('{','{"',$state);
				$state = str_replace(':','":"',$state);
				$state = str_replace('}','"}',$state);
				$state = str_replace(',','","',$state);

				$state = json_decode(trim($state,chr(239).chr(187).chr(191)),true);
			}

			$paytype = $state['type'];
			$id = $state['id'];//这里的id并非数据表里的主键而是定义的一个参数名(它可能是一个订单的id也可能是一个支付的流水号)
		}else{
			$paytype = I("type",0);
			$id = I("id",0);//这里的id并非数据表里的主键而是定义的一个参数名(它可能是一个订单的id也可能是一个支付的流水号)
		}

        /*请求支付参数处理*start*/
        //注册金支付参数
        if($paytype == "reg"){
            $regid = $id;
			$regfee = M('regfee')->find($regid);
            $out_trade_no = '1'.$regfee['reg_sn'];
            $total_fee = $regfee['amount'] * 100;
            $desc = "积分充值";
			//echo $out_trade_no.'-----'.$total_fee.'----'.$desc;exit;
            //$parameter = "?type={$paytype}&reg_sn={$reg_sn}";
        //申请代理费用支付参数
        }else if($paytype == "agentfee"){
            $agent_id = $id;
			$agentfee = M('agentfee')->find($agent_id);
            $out_trade_no = '2'.$agentfee['agent_sn'];
            $total_fee = $agentfee['amount'] * 100;
            $desc = "代理费";
            //$parameter = "id_sn={$id_sn}";
        //首付款支付参数
        }else if($paytype == "downpay"){
            $book_id = $id;
			$bookinfo = M('booking')->where("book_id = {$book_id}")->find();
            $out_trade_no = '3'.$bookinfo['book_sn'];

            $total_fee = $bookinfo['downpay'] * 100;
			$goodsinfo = M('haoche')->find($bookinfo['goods_id']);
            $goods_name = $goodsinfo['goods_name'];
            $desc = $goods_name.' '."首付款";
            //$parameter = "?paytype={$paytype}&book_sn={$book_sn}&downpay={$downpay}&goods_name={$goods_name}";
        //订单单个商品支付参数
        }else if($paytype == "orderpay"){
            $orderid = $id;
			$orderinfo = M('order')->where("orderid = {$orderid}")->find();
            $out_trade_no = '4'.$orderinfo['orderno'];
            $total_fee = $orderinfo['downpay'] * 100;
            $goodsinfo = M('goods')->find($orderinfo['goods_id']);
            $desc = $goodsinfo['goods_name'].' '."首付款";
           // $parameter = "?type={$paytype}&orderid={$orderid}";
        }else if($paytype == "sumpay"){
            $sumid = $id;
			$orderinfo = M('sumorder')->where("sumid = {$sumid}")->find();
            $out_trade_no = '5'.$orderinfo['sum_sn'];
            $total_fee = $orderinfo['total_my'] * 100;
            $goods_name = $orderinfo['goods_name'];
            $desc = $goods_name.' '."首付款";
            //$parameter = "?paytype={$paytype}&sum_sn={$sum_sn}&total_my={$total_my}&goods_name={$goods_name}";
        }else if($paytype == "housepay"){
			$house_id = $id;
			$houseinfo = M('house')->find($house_id);
			$out_trade_no = '6'.$houseinfo['serial_no'];
			$total_fee = $houseinfo['deposit'] * 100;
			$desc = "0元购房申请意向金";
		}else if($paytype == "donate"){
			$id = $id;
			$cimoney = M('cimoney')->find($id);
			$out_trade_no = '7'.$cimoney['serial_no'];
			$total_fee = $cimoney['money'] * 100;
			$desc = "捐助金";
		}else if($paytype == "banka"){
			$id = $id;
			$banka = M('caiclub')->find($id);
			$out_trade_no = '8'.$banka['serial_sn'];
			$total_fee = $banka['card_fee'] * 100;
			$desc = "办卡定金";
		}else if($paytype == "yangka"){
			$id = $id;
			$yangka = M('yangka')->find($id);
			$out_trade_no = '9'.$banka['serial_sn'];
			$total_fee = $yangka['amount'] * 100;
			$desc = "养卡定金";
		}else if($paytype == "tie"){
			$id = $id;
			$tie = M('tie')->find($id);
			$out_trade_no = '0'.$tie['serial_sn'];
			$total_fee = $tie['amount'] * 100;
			$desc = "提额定金";
		}else if($paytype == "daikuan"){
			$id = $id;
			$daikuan = M('daikuan')->find($id);
			$out_trade_no = 'A'.$daikuan['serial_sn'];
			$total_fee = $daikuan['amount'] * 100;
			$desc = "贷款定金";
		}
        /*请求参数处理*end*/



        $jsApi =new \JsApi_pub($config);
        //=========步骤1：网页授权获取用户openid============
        //通过code获得openid
        if(!isset($_GET['code']))
        {
            //触发微信返回code码
            $url = $jsApi->JS_API_CALL_URL;
            $url =$jsApi->createOauthUrlForCode($url);
            $state = json_encode(array(
                "type" => $paytype,
                "id" => $id
            ));
            $url = str_replace("STATE", $state, $url);
            Header("Location: $url");
        }else{
            //获取code码，以获取openid
            $code =$_GET['code'];//echo $code;exit;
            $jsApi->setCode($code);
            $openid =$jsApi->getOpenId();
			//echo $openid;
        }
		//echo $out_trade_no.'-----'.$total_fee.'----'.$desc;

		//$total_fee = 1;
        //=========步骤2：使用统一支付接口，获取prepay_id============
        //使用统一支付接口
        $unifiedOrder =new \UnifiedOrder_pub($config);

        $unifiedOrder->setParameter("openid","{$openid}");//openid
        $unifiedOrder->setParameter("body","{$desc}");//商品描述
        //自定义订单号，此处仅作举例
        //$timeStamp =(string)time();
        //$out_trade_no =$jsApi->APPID."{$timeStamp}";
        $unifiedOrder->setParameter("out_trade_no","{$out_trade_no}");//商户订单号
        $unifiedOrder->setParameter("total_fee","$total_fee");//总金额
        //$unifiedOrder->setParameter("total_fee","1");
        $notify_url =  SITE_URL.'index.php/Home/Wxpay/notify_url';
		//echo $notify_url;exit;
        $unifiedOrder->setParameter("notify_url","$notify_url");//通知地址
        $unifiedOrder->setParameter("trade_type","JSAPI");//交易类型
		$unifiedOrder->setParameter("input_charset", "UTF-8"); //字符编码
        $prepay_id =$unifiedOrder->getPrepayId();
        //=========步骤3：使用jsapi调起支付============
        $jsApi->setPrepayId($prepay_id);
        //echo '111<br/>'.$prepay_id;exit;
        $jsApiParameters =$jsApi->getParameters();
        /*$this->assign("orderinfo",array('ordernumber'=>$orderinfo['ordernumber'],'ssum'=>$total_fee/100));*/
        $daohang = array(
            'second'=>'微信支付',
        );
        $this->assign('daohang',$daohang);
        $this->assign('return_url',SITE_URL.'index.php/Home/Wxpay/notify_url1'."/out_trade_no/".$out_trade_no);
        $this->assign("jsApiParameters",$jsApiParameters);
        //dump($jsApiParameters);exit;
        $this->display('regfee');
    }
    /*function notify_url(){
        Vendor('Wxpay.WxPayPubHelper.WxPayPubHelper');
        $notify = new \Notify_pub();
        $xml = $GLOBALS['HTTP_ROW_POST_DATA'];
        $notify -> saveData($xml);
        if($notify ->checkSign() == FALSE){
            $notify -> setReturnParameter("return_code","FAIL");//返回状态码
            $notify -> setReturnParameter("return_msg","签名失败");//返回信息
        }else{
            $notify ->setReturnParameter("return_code","SUCCESS");//设置返回码
        }
        $returnXml = $notify ->returnXml();
         //==商户根据实际情况设置相应的处理流程，此处仅作举例=======

        //以log文件形式记录回调信息
        //$log_ = new Log_();
        //$log_name= SITE_URL."index.php/Public/notify_url.log";//log文件路径

        //log_result($log_name,"【接收到的notify通知】:\n".$xml."\n");
        //下面商户根据实际情况设置相应处理流程
        $parameter = $notify ->xmlToArray($xml);
        if($notify ->checkSign() == TRUE){
            if($notify ->data['return_code'] == "FAIL"){
                //此处应该更新一下订单状态商户自行增删操作
                //通信出错设为无效订单
                //log_result($log_name,"【通信出错】:\n".$xml."\n");
                echo 'error';
            }else if($notify ->data['result_code'] == "FAIL"){
                //此处应该更新一下订单状态商户自行增删操作
                //通信出错设为无效订单
                //log_result($log_name,"【业务出错】:\n".$xml."\n");
                echo 'error';
            }else{
                //没有处理成功，微信会间隔的发送请求
                if ($this->process($parameter)) {
                    //处理成功后输出success，微信就不会再下发请求了
                    echo 'success';
                    //$this->redirect("User/register");
                }else {
                    //没有处理成功，微信会间隔的发送请求
                    echo 'error';

                }
            }
        }
    }*/
	function notify_url() {
		Vendor('Wxpay.WxPayPubHelper.WxPayPubHelper');
        $notify = new \Notify_pub();
        $xml = file_get_contents("php://input");
        $notify -> saveData($xml);
        if($notify ->checkSign() == FALSE){
            $notify -> setReturnParameter("return_code","FAIL");//返回状态码
            $notify -> setReturnParameter("return_msg","签名失败");//返回信息
        }else{
            $notify ->setReturnParameter("return_code","SUCCESS");//设置返回码
        }
        $returnXml = $notify ->returnXml();
         //==商户根据实际情况设置相应的处理流程，此处仅作举例=======

        //以log文件形式记录回调信息
        //$log_ = new Log_();
        //$log_name= SITE_URL."index.php/Public/notify_url.log";//log文件路径

        //log_result($log_name,"【接收到的notify通知】:\n".$xml."\n");
        //下面商户根据实际情况设置相应处理流程
        $parameter = $notify ->xmlToArray($xml);
		fwrite(fopen("./Home/cc.txt",'w'),print_r($parameter, true));
        if($notify ->checkSign() == TRUE){
            if($notify ->data['return_code'] == "FAIL"){
                //此处应该更新一下订单状态商户自行增删操作
                //通信出错设为无效订单
                //log_result($log_name,"【通信出错】:\n".$xml."\n");
                echo 'error';
            }else if($notify ->data['result_code'] == "FAIL"){
                //此处应该更新一下订单状态商户自行增删操作
                //通信出错设为无效订单
                //log_result($log_name,"【业务出错】:\n".$xml."\n");
                echo 'error';
            }else{
                //没有处理成功，微信会间隔的发送请求
                if ($this->notify_url1($parameter)) {
                    //处理成功后输出success，微信就不会再下发请求了
                    echo 'success';
                    //$this->redirect("User/register");
                }else {
                    //没有处理成功，微信会间隔的发送请求
                    echo 'error';

                }
            }
        }
	}

    function notify_url1($parameter){
        //此处应该更新一下订单的状态，商户自行增删操作
        //返回的数据最少有以下几个
        /*$parameter = array(
          'out_trade_no' =>xxx,//商户订单号
          'total_fee' => xxx,//支付金额
          'openid' => xxx,//付款的用户id
        );*/

        //var_dump($parameter);exit;
        //$out_trade_no = $_GET['out_trade_no'];
		$out_trade_no = $parameter['out_trade_no'];
        $paytype = substr($out_trade_no,0,1);
        $out_trade_no = substr($out_trade_no,1);
        if($paytype == 1){
            $status = $this->reg($out_trade_no);
            echo success;
            $this->redirect("User/regfee",array('restatus'=>$status));
        }else if($paytype == 2){
			$this->agentfee($out_trade_no);
            echo success;
            $this->redirect("User/channel");
        }else if($paytype == 3){
			$this->downpay($out_trade_no);
            echo success;
            $this->redirect("Booking/bookinfo");
        }else if($paytype == 4){
            $this->orderpay($out_trade_no);
            echo success;
            $this->redirect("Order/sending");
        }else if($paytype == 5){
			$this->sumpay($out_trade_no);
			echo success;
            $this->redirect("Order/sending");
        }else if($paytype == 6){
			$this->housepay($out_trade_no);
			echo success;
            $this->redirect("House/showlist");
		}else if($paytype == 7){
			$status = $this->donate($out_trade_no);
			echo success;
            $this->redirect("Cishan/index",array("errormsg"=>$status));
		}else if($paytype == 8){
			$status = $this->banka($out_trade_no);
			echo success;
            $this->redirect("Caiclub/apply",array("errormsg"=>$status));
		}else if($paytype == 9){
			$status = $this->yangka($out_trade_no);
			echo success;
            $this->redirect("Caiclub/apply",array("errormsg"=>$status));
		}else if($paytype == 0){
			$status = $this->tie($out_trade_no);
			echo success;
            $this->redirect("Caiclub/apply",array("errormsg"=>$status));
		}else if($paytype == 'A'){
			$status = $this->daikuan($out_trade_no);
			echo success;
            $this->redirect("Caiclub/apply",array("errormsg"=>$status));
		}
    }
    //充值成功后操作
    private function reg($out_trade_no){
        $reg_sn = $out_trade_no;
        $detail_model = M('userdetail');
		$user_model = M('user');

		$setting_model = M('setting');
		$set = $setting_model->find();
        $regfee_model = M('regfee');

        $regfee = $regfee_model->where("reg_sn = '{$reg_sn}'")->select();
		$userid = $regfee[0]['userid'];
		$userinfo = $user_model->where("userid = {$userid}")->find();
		$nowtime = time();
		$data['status'] = '1';
		$data['paytime'] = $nowtime;
		//更新支付状态
        if($regfee_model->where("reg_sn = '{$out_trade_no}'")->save($data)){
			$detail_model->where("userid = {$userid}")->setInc('shop_sc',$set['back_reg']);
			//更新操作记录表
			$records['sourceid'] = $userid;
			$records['destid'] = $userid;
			$records['amount'] = $set['back_reg'];
			$records['type'] = '积分冲值';
			$records['sc_type'] = '乐购';
			$records['time'] = $nowtime;
			M('operate')->add($records);
		}

		$user_model->where("userid = {$userid}")->setField('is_vip','1');
		$_SESSION['userInfo']['is_vip'] = '1';//更新session中会员状态
		//查询上级信息
		$puserinfo = $user_model->where("userid = {$userinfo['pid']}")->find();
		if($puserinfo['is_vip'] == 1){
			$pback = ($set['regfee']/100)*$set['legou_one'];//返给上级的兑现积分
			$score['cash_sc'] = array('exp',"cash_sc+".$pback);
			$score['credit_sc'] = array('exp',"credit_sc+".$pback);
			$detail_model->where("userid = {$userinfo['pid']}")->save($score);
			//更新操作记录表
			$records['sourceid'] = $userid;
			$records['destid'] = $userinfo['pid'];
			$records['amount'] = $pback;
			$records['type'] = '积分充值';
			$records['sc_type'] = '兑现积分';
			$records['time'] = time();
			M('operate')->add($records);
			//上上级用户信息
			$ppuserinfo = $user_model ->find($puserinfo['pid']);
			if($ppuserinfo['is_vip']){
				$ppback = ($set['regfee']/100)*$set['legou_two'];//返给上上级的兑现积分
				$score['cash_sc'] = array('exp',"cash_sc+".$ppback);
				$score['credit_sc'] = array('exp',"credit_sc+".$ppback);
				$detail_model->where("userid = {$puserinfo['pid']}")->save($score);
				//更新操作记录表
				$records['sourceid'] = $userid;
				$records['destid'] = $puserinfo['pid'];
				$records['amount'] = $ppback;
				$records['type'] = '积分充值';
				$records['sc_type'] = '兑现积分';
				$records['time'] = time();
				M('operate')->add($records);
			}
		}


		return 'success';
    }
	//申请代理支付成功操作
	private function agentfee($out_trade_no) {
		$userid = $_SESSION['userInfo']['userid'];
		$agent_sn = $out_trade_no;
		//$detail_model = M('userdetail');
		$user_model = M('user');
		$agent_model = M('agentfee');
		//$agentfee = $agent_model -> where("agent_sn = '{$agent_sn}'")->select();
		//$agentfee = $agentfee[0];
		$data['status'] = '1';
		$data['paytime'] = time();
		$agent_model->where("agent_sn = '{$agent_sn}'")->save($data);//修改代理费用支付表
		$user_model->where("userid = {$userid}")->setField('is_aplay','1');
	}
	//订车支付成功操作
	private function downpay($out_trade_no){
		$pid = $_SESSION['userInfo']['pid'];
		$userid = $_SESSION['userInfo']['userid'];
		$book_sn = $out_trade_no;
		$book_model = M('booking');
		$user_model = M('user');
		$detail_model = M('userdetail');
		$setting_model = M('setting');
		$set = $setting_model -> find();

		$data['is_paydown'] = '1';
        $data['paytime'] = time();
		$book_model->where("book_sn = '{$book_sn}'")->save($data);//修改订单状态
		$bookinfo = $book_model->where("book_sn = '{$book_sn}'")->select();//订车单信息
		$bookinfo = $bookinfo[0];

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
				$score['cash_sc'] = array('exp',"cash_sc+".$pback);
				$score['credit_sc'] = array('exp',"credit_sc+".$pback);
				$detail_model->where("userid = {$pid}")->save($score);
				//更新操作记录表
				$records['sourceid'] = $userid;
				$records['destid'] = $pid;
				$records['amount'] = $pback;
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
    //单个商品订单支付成功操作
    private function  orderpay($out_trade_no){
        $userid = $_SESSION['userInfo']['userid'];
        $orderno = $out_trade_no;
        $setting_model = M('setting');

        $detail_model = M('userdetail');
        $order_model = M('order');
        $set = $setting_model -> find();
		//查询订单信息
		$orderinfo = $order_model->where("orderno = '{$orderno}'")->find();
		//从用户积分中扣除所需乐购积分
		$detail_model ->where("userid = {$userid}")->setDec('shop_sc',$orderinfo['score']);

        $data['pay_status'] = '1';
        $data['paytime'] = time();
        $order_model -> where("orderno = '{$orderno}'") -> save($data);//修改订单状态
    }
    //多个商品合并支付操作成功
    private function sumpay($out_trade_no){
		$userid = $_SESSION['userInfo']['userid'];
        $sum_sn = $out_trade_no;
        $setting_model = M('setting');
        $sumorder_model = M('sumorder');
        $detail_model = M('userdetail');
        $order_model = M('order');
        $set = $setting_model -> find();
        //查询合并订单信息
		$sumorderinfo = $sumorder_model->where("sum_sn = '{$sum_sn}'")->find();
		//从用户积分中扣除所需乐购积分
		$detail_model ->where("userid = {$userid}")->setDec('shop_sc',$sumorderinfo['total_sc']);

		$data['status'] = '1';
        $data['paytime'] = time();
        $sumorder_model -> where("sum_sn = '{$sum_sn}'") -> save($data);//修改合并支付订单状态
        unset($data['status']);$data['pay_status'] = '1';
        $sum_order = $sumorder_model -> where("sum_sn = '{$sum_sn}'") -> select();
		$sumid = $sum_order[0]['sumid'];
        $order_model -> where("sumid = {$sumid} AND userid = {$userid}") ->save($data);//设置单个订单的状态
    }
	//房天下意向金支付成功操作
	private function housepay($out_trade_no) {
		$serial_no = $out_trade_no;
		$data['pay_status'] = '1';
		$data['paytime'] = time();
		M('house')->where("serial_no = '{$serial_no}'")->save($data);
	}
	//捐助成功后操作
	private function donate($out_trade_no) {
		$cimoney = M('cimoney')->where("serial_no = '{$serial_no}'")->select();
		$cimoney = $cimoney[0];
		$serial_no = $out_trade_no;
		M('cimoney')->where("serial_no = '{$serial_no}'")->setField('status','1');
		$donate = M('donate')->find();
		M('donate')->where("id = {$donate['id']}")->setInc('surplus',$cimoney['money']);
		return OK;
	}
	//办卡成功后
	private function banka($out_trade_no) {
		$userid = $_SESSION['userInfo']['userid'];
		$pid = $_SESSION['userInfo']['pid'];
		$set = M('setting')->field('caishen')->find();
		$caiclub = M('Caiclub');
		$serial_sn = $out_trade_no;
		$data['pay_status'] = '1';
		$data['paytime'] = time();
		$caiclub->where("serial_sn = '{$serial_sn}'")->save($data);
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
		return OK1;
	}
	//养卡支付成功后
	private function yangka($out_trade_no) {
		$serial_sn = $out_trade_no;
		$data['pay_status'] = '1';
		$data['paytime'] = time();
		M('yangka')->where("serial_sn = '{$serial_sn}'")->save($data);
		return OK2;
	}
	//提额支付成功后
	private function tie($out_trade_no) {
		$serial_sn = $out_trade_no;
		$data['pay_status'] = '1';
		$data['paytime'] = time();
		M('tie')->where("serial_sn = '{$serial_sn}'")->save($data);
		return OK3;
	}
	//贷款支付成功后
	private function daikuan($out_trade_no) {
		$serial_sn = $out_trade_no;
		$data['pay_status'] = '1';
		$data['paytime'] = time();
		M('daikuan')->where("serial_sn = '{$serial_sn}'")->save($data);
		return OK4;
	}
}