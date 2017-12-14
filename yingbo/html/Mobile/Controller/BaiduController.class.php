<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/6/13
 * Time: 11:37
 */
namespace Mobile\Controller;
use Think\Controller;
class BaiduController extends Controller{
	private $token;
	private $wecha_id;
	private $alipayConfig;
	private $from;
	private $pro_name;
	private $order;
	private $setting;

	public function _initialize() {
		unset($_GET['_URL_']);
		$config = array();
		$config['SP_NO']      = '';
		$config['SP_KEY']     = '';
		$config['RETURN_URL'] = SITE_URL."index.php/Mobile/Baidu/return_url";
		$config['PAGE_URL']   = SITE_URL."index.php/Mobile/Baidu/page_url";
		$config['BFB_QUERY_RETRY_TIME']   = 3;
		$config['BFB_INTERFACE_ENCODING'] = 1;
		$data   = D('pay')->where("type = 'baidu'")->select();
		//var_dump($data);exit;
		if($data) {
			$config['SP_NO']      = $data[0]['bpartnerid'];
			$config['SP_KEY']     = $data[0]['bpaysignkey'];
		}
		$this->setting = $config;
		//$this->token ='ahdphgppgah';
		//fwrite(fopen("./Lib/Action/Wap/gets.txt", "w"), print_r($_GET, true));
		//fwrite(fopen("./Lib/Action/Wap/gets.txt", "a"), print_r($_SERVER, true));
		
		//$data   = M('Alipay_config')->where(array('token'=>$this->token,'open'=>'1','paytype'=>'baidu'))->find();
		
	}
	public function pay(){
		$orderid = I("orderid",0);
		$payType = I("payType",0);
		$pro_name = I("china",0);
		$this->token = I("token",0);
		parse_str(urldecode($_SERVER['QUERY_STRING']), $_GET);
		if(isset($_GET['extra'])){
			$this->token = $_GET['extra'];
		}else{
			$this->token = md5(rand(0,999).time());
		}
		$order = D('user_order');
		$this->order = $order ->find($orderid);
        $this->pro_name = $pro_name? $pro_name : "评估建议收费金额";
        $this->pro_name = iconv("UTF-8", "GBK", urldecode($this->pro_name));
		$params = array (
			'order_no'          => $this->order['ordernumber'],      //订单号
			'order_create_time' => date("YmdHis",$this->order['inputtime']),
			'goods_name'        => "{$this->pro_name}",          //品名
			'total_amount'      => $this->order['ssum'] * 100,       //总计
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
			$order = D('user_order');
			$orderinfo = $order->where("ordernumber = {$rows['order_no']}")->select();
			if(empty($orderinfo[0]['shopid'])){
				$data['if_say'] = 1;
				$data['if_pay'] = 1;
				$order->where("ordernumber = {$rows['order_no']}")->save($data);
				D('user_assess')->where("userid = {$orderinfo[0]['auserid']}")->setInc('money',$orderinfo[0]['psum']);
				
			}else{
				//订单状态
				$data['if_say'] = 1;
				//var_dump($rows);
				D('user_order')->where("ordernumber = {$rows['order_no']}")->save($data);
				//print_r($rows);
			}

		}
		//向百付宝发起回执
		$baidu->notify();
		
	}

	public function page_url(){
		$baidu = new \Model\PayModel();
		$baidu->config($this->setting);
		//检查非法请求
		$_error = iconv('utf-8', 'gbk', '非法请求');
		if(!$baidu->check_sign($_GET)) die($_error);

		$order_no = $_GET['order_no'];  //订单号

		$orderinfo = D('user_order')->field('orderid')->where("ordernumber = {$order_no}")->select();
		if(empty($orderinfo[0]['shopid'])){
			$this->redirect('Patient/seelist',array('orderid'=>$orderinfo[0]['orderid']));
		}else{
			$this->redirect('Patient/orderinfo',array('orderid'=>$orderinfo[0]['orderid']));
		}
		//下面去查订单表状态，成功还是失败
		/*$_str = iconv( 'gbk', 'utf-8','支付成功！<br />订单号：' . $order_no .'<br />');
		echo "<div style='text-align:center;font-size:16px;'>".$_str."</div>";*/
	}
}