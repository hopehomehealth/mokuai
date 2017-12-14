<?php
namespace Model;
use Think\Model;
/**
 * ThinkPHP �ۺ�ģ����չ 
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
	 * ���ɰٸ�����ʱ����֧���ӿڶ�Ӧ��URL
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

		// �ٸ��������Ų�ѯ�ӿڲ���������Ĳ���ȡֵ�μ��ӿ��ĵ�
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
			$this->err_msg = '���ðٸ��������Ų�ѯ�ӿ�ʧ��';
			return false;
		}

		$response_arr = json_decode(json_encode(simplexml_load_string($content)), true);
		foreach ($response_arr as &$value) {
			if (empty($value) && is_array($value)) {
				$value = '';
			}
		}
		unset($value);
		// ��鷵�ؽ��
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
			$this->err_msg = sprintf('�ٸ����Ķ�����ѯ�ӿڲ�ѯʧ�ܣ���������Ϊ[%s]',
					print_r($response_arr, true));
			return false;
		}
		// ��鶩����ѯ�ӿڵ���Ӧ�����в�ѯ״̬query_status�Ƿ�Ϊ0��0�����ѯ�ɹ�
		if (0 != $response_arr ['query_status']) {
			$this->err_msg = sprintf('�ٸ����Ķ�����ѯ�ӿڲ�ѯʧ�ܣ���ѯ״̬Ϊ[%s]', $response_arr ['query_status']);
			return false;
		}
		// ����̻�ID�Ƿ����Լ��������������sp_no�����̻��Լ��ģ���ô˵������ٸ����Ķ�����ѯ�ӿڵ���Ӧ������Ч
		if ($this->sp_conf['SP_NO'] != $response_arr ['sp_no']) {
			$this->err_msg = '�ٸ����Ķ�����ѯ�ӿڵ���Ӧ�������̻�ID��Ч����֪ͨ��Ч';
			return false;
		}
		// ��鶩����ѯ�ӿڵ���Ӧ�����е�֧������Ƿ�Ϊ֧���ɹ�
		if ($this->sp_conf['BFB_PAY_RESULT_SUCCESS'] != $response_arr ['pay_result']) {
			$this->err_msg = '�ٸ����Ķ�����ѯ�ӿڵ���Ӧ�������̻�֧������쳣����֪ͨ��Ч';
			return false;
		}

		// �����ܳ������ĵ��ֶΰ��ղ�ѯ�ӿ��ж���ı��뷽ʽ����ת�룬�˴��������õ�GBK����
		$response_arr ['goods_name'] = iconv("UTF-8", "GBK", $response_arr ['goods_name']);
		if (isset($response_arr ['buyer_sp_username'])) {
			$response_arr ['buyer_sp_username'] = iconv("UTF-8", "GBK", $response_arr ['buyer_sp_username']);
		}
		// У�鷵�ؽ���е�ǩ��
		if (false === $this->check_sign($response_arr)) {
			$this->err_msg = '�ٸ���������ѯ�ӿ���Ӧ����ǩ��У��ʧ��';
			return false;
		}

		return $response_arr;
	}

	/**
	 * ���������ǩ��
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
	 * У��ǩ��������Ĳ���������һ������
	 * @return boolean	����ǩ���ɹ�����true, ʧ�ܷ���false
	 */
	public function check_sign($params) {
		$sign = $params['sign'];
		unset($params['sign']);
		foreach ($params as &$value) {
			$value = urldecode($value); // URL����Ľ���
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
		$curl = curl_init(); // ��ʼ��curl
		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl, CURLOPT_HEADER, false); // ����header
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true); // Ҫ����Ϊ�ַ������������Ļ��
		curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 3); // ���õȴ�ʱ��
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);

		$res = curl_exec($curl); // ����curl
		$err = curl_error($curl);

		if (false === $res || !empty($err)) {
			$info = curl_getinfo($curl);
			$this->err_msg = $info;
			return false;
		}
		curl_close($curl); // �ر�curl
		return $res;
	}

	//���ٸ����Ļ�ִ
	function notify() {
		$rep_str = "<html><head>" . $this->sp_conf['BFB_NOTIFY_META'] .
		"</head><body><h1>����һ��return_urlҳ��</h1></body></html>";
		echo "$rep_str";
	}

}

?>