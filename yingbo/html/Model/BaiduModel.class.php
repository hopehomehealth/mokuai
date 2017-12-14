<?php
namespace Model;
use Think\Model;
/**
 * ThinkPHP 聚合模型扩展 
 */
class BaiduModel extends Model
{
    public $sp_conf = Array (
            	'SP_NO'                         => '',
            	'SP_KEY'                        => '',
            	'RETURN_URL'                    => '',
            	'PAGE_URL'                      => '',
            	'SP_PAY_RESULT_SUCCESS'         => 1,
            	'SP_PAY_RESULT_WAITING'         => 2,
            	'LOG_FILE'                      => 'sdk.log',
            	'BFB_QUERY_RETRY_TIME'          => 3,
            	'BFB_PAY_RESULT_SUCCESS'        => 1,
            	'BFB_NOTIFY_META'               => "<meta name=\"VIP_BFB_PAYMENT\" content=\"BAIFUBAO\">",
            	'BFB_QUERY_INTERFACE_SERVICE_ID'=> 11,
            	'BFB_INTERFACE_ENCODING'        => 1,
            	'BFB_INTERFACE_OUTPUT_FORMAT'   => 1,
            );
	public $err_msg;
	public $order_no;

	function config($config) {
	    foreach($config as $k => $v) if(isset($this->sp_conf[$k]))$this->sp_conf[$k] = $v;
	}

	/**
	 * 生成百付宝即时到账支付接口对应的URL
	 */
	function create_order($post, $i = 0) {

	    $time   = date("YmdHis");
        $params = array (
        		'service_code'      => 1,
        		'sp_no'             => $this->sp_conf['SP_NO'],
        		'order_create_time' => date("YmdHis"),
        		'order_no'          => $time . sprintf ( '%06d', rand(0, 999999)),
        		'goods_name'        => 'shop',
        		'total_amount'      => 0,
        		'currency'          => 1,
        		'return_url'        => $this->sp_conf['RETURN_URL'],
        		'page_url'          => $this->sp_conf['PAGE_URL'],
        		'pay_type'          => 2,
        		'bank_no'           => '',
        		'input_charset'     => $this->sp_conf['BFB_INTERFACE_ENCODING'],
        		'version'           => 2,
        		'sign_method'       => 1,	
        );

        foreach($post as $k=> $v) if(isset($params[$k]))$params[$k] = $v;

		$url = array ("https://www.baifubao.com/api/0/pay/0/wapdirect","https://www.baifubao.com/api/0/pay/0/direct","https://www.baifubao.com/api/0/pay/0/direct/0");

		if (!isset($url[$i])) $i = 0;
		$pay_url = $url[$i];

		if (false === ($sign = $this->make_sign($params))) {
			return false;
		}
		$this->order_no = $params['order_no'];
		$params['sign'] = $sign;
		$params_str = http_build_query($params);
		return $pay_url . '?' . $params_str;
	}

	function check_order($order_no) {
		$params = array (
			'service_code' => 11,
			'sp_no' => $this->sp_conf['SP_NO'],
			'order_no' => $order_no,
			'output_type' => 1,
			'output_charset' => 1,
			'version' => 2,
			'sign_method' => 1
		);

		// 百付宝订单号查询接口参数，具体的参数取值参见接口文档
		$sign = $this->make_sign($params);
		$params ['sign'] = $sign;
		$params_str = http_build_query($params);

		$query_url = 'https://www.baifubao.com/api/0/query/0/pay_result_by_order_no?' . $params_str;
		$content = $this->request($query_url);

		$retry = 0;
		while (empty($content) && $retry < $this->sp_conf['BFB_QUERY_RETRY_TIME']) {
			$content = $this->request($query_url);
			$retry++;
		}
		if (empty($content)) {
			$this->err_msg = '调用百付宝订单号查询接口失败';
			return false;
		}

		$response_arr = json_decode(json_encode(simplexml_load_string($content)), true);
		foreach ($response_arr as &$value) {
			if (empty($value) && is_array($value)) {
				$value = '';
			}
		}
		unset($value);
		// 检查返回结果
		if (empty($response_arr) || !isset($response_arr ['query_status']) ||
				 !isset($response_arr ['sp_no']) ||
				 !isset($response_arr ['order_no']) ||
				 !isset($response_arr ['bfb_order_no']) ||
				 !isset($response_arr ['bfb_order_create_time']) ||
				 !isset($response_arr ['pay_time']) ||
				 !isset($response_arr ['pay_type']) ||
				 !isset($response_arr ['goods_name']) ||
				 !isset($response_arr ['total_amount']) ||
				 !isset($response_arr ['fee_amount']) ||
				 !isset($response_arr ['currency']) ||
				 !isset($response_arr ['pay_result']) ||
				 !isset($response_arr ['sign']) ||
				 !isset($response_arr ['sign_method'])) {
			$this->err_msg = sprintf('百付宝的订单查询接口查询失败，返回数据为[%s]',
					print_r($response_arr, true));
			return false;
		}
		// 检查订单查询接口的响应数据中查询状态query_status是否为0，0代表查询成功
		if (0 != $response_arr ['query_status']) {
			$this->err_msg = sprintf('百付宝的订单查询接口查询失败，查询状态为[%s]', $response_arr ['query_status']);
			return false;
		}
		// 检查商户ID是否是自己，如果传过来的sp_no不是商户自己的，那么说明这个百付宝的订单查询接口的响应数据无效
		if ($this->sp_conf['SP_NO'] != $response_arr ['sp_no']) {
			$this->err_msg = '百付宝的订单查询接口的响应数据中商户ID无效，该通知无效';
			return false;
		}
		// 检查订单查询接口的响应数据中的支付结果是否为支付成功
		if ($this->sp_conf['BFB_PAY_RESULT_SUCCESS'] != $response_arr ['pay_result']) {
			$this->err_msg = '百付宝的订单查询接口的响应数据中商户支付结果异常，该通知无效';
			return false;
		}

		// 将可能出现中文的字段按照查询接口中定义的编码方式进行转码，此处测试是用的GBK编码
		$response_arr ['goods_name'] = iconv("UTF-8", "GBK", $response_arr ['goods_name']);
		if (isset($response_arr ['buyer_sp_username'])) {
			$response_arr ['buyer_sp_username'] = iconv("UTF-8", "GBK", $response_arr ['buyer_sp_username']);
		}
		// 校验返回结果中的签名
		if (false === $this->check_sign($response_arr)) {
			$this->err_msg = '百付宝订单查询接口响应数据签名校验失败';
			return false;
		}

		return $response_arr;
	}

	/**
	 * 计算数组的签名
	 */
	private function make_sign($params) {
	    ksort($params);
        $params['key'] = $this->sp_conf['SP_KEY'];
        $arr_temp = array ();
        foreach ($params as $key => $val) {
            $arr_temp [] = $key . '=' . $val;
        }
        $sign_str = implode('&', $arr_temp);
        return md5($sign_str);
	}

	/**
	 * 校验签名，传入的参数必须是一个数组
	 * @return boolean	生成签名成功返回true, 失败返回false
	 */
	public function check_sign($params) {
		$sign = $params['sign'];
		unset($params['sign']);
		foreach ($params as &$value) {
			$value = urldecode($value); // URL编码的解码
		}
		unset($value);
		if (false !== ($my_sign = $this->make_sign($params))) {
			if (0 !== strcmp($my_sign, $sign)) {
				return false;
			}
			return true;
		} else {
			return false;
		}
	}

	function request($url) {
		$curl = curl_init(); // 初始化curl
		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl, CURLOPT_HEADER, false); // 设置header
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true); // 要求结果为字符串且输出到屏幕上
		curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 3); // 设置等待时间
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);

		$res = curl_exec($curl); // 运行curl
		$err = curl_error($curl);

		if (false === $res || !empty($err)) {
			$info = curl_getinfo($curl);
			$this->err_msg = $info;
			return false;
		}
		curl_close($curl); // 关闭curl
		return $res;
	}

	//给百付宝的回执
	function notify() {
		$rep_str = "<html><head>" . $this->sp_conf['BFB_NOTIFY_META'] .
		"</head><body><h1>这是一个return_url页面</h1></body></html>";
		echo "$rep_str";
	}

}

?>