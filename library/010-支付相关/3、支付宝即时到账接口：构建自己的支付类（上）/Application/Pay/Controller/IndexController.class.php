<?php
namespace Pay\Controller;
use Think\Controller;
class IndexController extends Controller {
	public function index(){
		$param = array(
			'service'=>'create_direct_pay_by_user',
			'partner'=>'2088802807619823',
			'_input_charset'=>'utf-8',
			'notify_url'=>'http://www.19981.com',
			'return_url'=>'http://www.19981.com',
			'out_trade_no'=>'XS20161234567l',
			'subject'=>'测试商品标题',
			'payment_type'=>'1',
			'total_fee'=>'10.1',
			'seller_email'=>'mzhsoft@126.com',			
		);
		//构造请求参数
		$res = $this->buildRequestPara($param);
		var_dump($res);
	}
	
	/**
     * 生成要请求给支付宝的参数数组
     * @param $para_temp 请求前的参数数组
     * @return 要请求的参数数组
     */
	function buildRequestPara($para_temp) {
		//除去待签名参数数组中的空值和签名参数
		$para_filter = $this->paraFilter($para_temp);

		//对待签名参数数组排序
		$para_sort = $this->argSort($para_filter);

		//生成签名结果
		$mysign = $this->buildRequestMysign($para_sort);
		
		//签名结果与签名方式加入请求提交参数组中
		$para_sort['sign'] = $mysign;
		$para_sort['sign_type'] = strtoupper(trim('MD5'));
		
		return $para_sort;
	}

	/**
	 * 除去数组中的空值和签名参数
	 * @param $para 签名参数组
	 * return 去掉空值与签名参数后的新签名参数组
	 */
	function paraFilter($para) {
		$para_filter = array();
		while (list ($key, $val) = each ($para)) {
			if($key == "sign" || $key == "sign_type" || $val == "")continue;
			else	$para_filter[$key] = $para[$key];
		}
		return $para_filter;
	}

	/**
	 * 对数组排序
	 * @param $para 排序前的数组
	 * return 排序后的数组
	 */
	function argSort($para) {
		ksort($para);
		reset($para);
		return $para;
	}


	/**
	 * 生成签名结果
	 * @param $para_sort 已排序要签名的数组
	 * return 签名结果字符串
	 */
	function buildRequestMysign($para_sort) {
		//把数组所有元素，按照“参数=参数值”的模式用“&”字符拼接成字符串
		$prestr = $this->createLinkstring($para_sort);
		
		$mysign = "";
		switch (strtoupper(trim('MD5'))) {
			case "MD5" :
				$mysign = $this->md5Sign($prestr, 'k2zu8i7h9enbkafsvtfrgdcuy1n273qn');
				break;
			default :
				$mysign = "";
		}
		
		return $mysign;
	}

	/**
	 * 把数组所有元素，按照“参数=参数值”的模式用“&”字符拼接成字符串
	 * @param $para 需要拼接的数组
	 * return 拼接完成以后的字符串
	 */
	function createLinkstring($para) {
		$arg  = "";
		while (list ($key, $val) = each ($para)) {
			$arg.=$key."=".$val."&";
		}
		//去掉最后一个&字符
		$arg = substr($arg,0,count($arg)-2);
		
		//如果存在转义字符，那么去掉转义
		if(get_magic_quotes_gpc()){$arg = stripslashes($arg);}
		
		return $arg;
	}

	/**
	 * 签名字符串
	 * @param $prestr 需要签名的字符串
	 * @param $key 私钥
	 * return 签名结果
	 */
	function md5Sign($prestr, $key) {
		$prestr = $prestr . $key;
		return md5($prestr);
	}


	
}