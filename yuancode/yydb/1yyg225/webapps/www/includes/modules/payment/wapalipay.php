<?php

/**
 * 支付宝插件
 */

if (!defined('App'))die('Hacking attempt');

include_once(AppDir . 'function/payment.php');


$payment_lang = AppDir . 'includes/languages/payment/wapalipay.php';


if (file_exists($payment_lang))
{
    global $_LANG;
    include_once($payment_lang);
}

/* 模块的基本信息 */
if (isset($set_modules) && $set_modules == TRUE)
{
    $i = isset($modules) ? count($modules) : 0;

    /* 代码 */
    $modules[$i]['code']    = basename(__FILE__, '.php');

    /* 描述对应的语言项 */
    $modules[$i]['desc']    = 'alipay_desc';

    /* 是否支持货到付款 */
    $modules[$i]['is_cod']  = '0';

    /* 是否支持在线支付 */
    $modules[$i]['is_online']  = '1';

    /* 作者 */
    $modules[$i]['author']  = 'ECSHOP TEAM';

    /* 网址 */
    $modules[$i]['website'] = 'http://www.alipay.com';

    /* 版本号 */
    $modules[$i]['version'] = '1.0.2';

    /* 配置信息 */
    $modules[$i]['config']  = array(
        array('name' => 'alipay_partner',           'type' => 'text',   'value' => ''),
        array('name' => 'alipay_pay_method',        'type' => 'select', 'value' => '')
    );

    return;
}

/**
 * 类
 */
class wapalipay
{

    /**
     * 构造函数
     *
     * @access  public
     * @param
     *
     * @return void
     */
    function wapalipay()
    {
    	
    }

    function __construct()
    {
        $this->wapalipay();
    }

    /**
     * 生成支付代码
     * @param   array   $order      订单信息
     * @param   array   $payment    支付方式信息
     */
    function get_code($order, $payment)
    {
        //记录支付订单号
        $order_no = $order['order_sn'] . $order['log_id'];
        insert_order_sn($order['log_id'], array('order_no'=>$order_no));

		$alipay_config = $this->config($payment);
        //构造要请求的参数数组，无需改动
		$parameter = array(
				"service" => "alipay.wap.create.direct.pay.by.user",
				"partner" => trim($alipay_config['partner']),
				"seller_id" => trim($alipay_config['seller_id']),
				"payment_type"	=> 1,
				"notify_url"	=> return_url(basename(__FILE__, '.php')),
				"return_url"	=> return_url(basename(__FILE__, '.php')),
				"out_trade_no"	=> $order_no,
				"subject"	=> $order['order_sn'],
				"total_fee"	=> $order['order_amount'],
				"show_url"	=> $show_url,
				"body"	=> $payment['alipay_account'],
				"it_b_pay"	=> $it_b_pay,
				"extern_token"	=> $extern_token,
				"_input_charset"	=> trim(strtolower($alipay_config['input_charset']))
		);
		//echo print_r($alipay_config).'<br>';
		//echo print_r($parameter);die;
		//建立请求
		$alipaySubmit = new AlipaySubmit($alipay_config);
		$html_text = $alipaySubmit->buildRequestForm($parameter,"get", "确认");
		
		echo $html_text;
		
		//include_once(AppDir . "includes/modules/payment/alipayapi.php");
    }

    /**
     * 响应操作
     */
    function respond()
    {
    	if (!empty($_POST))
    	{
    		foreach($_POST as $key => $data)
    		{
    			$_GET[$key] = $data;
    		}
    	}
    	$payment  = get_payment($_GET['code']);
    	$alipay_config = $this->config($payment);
        $alipay_config['notify_url'] = $alipay_config['return_url'] = return_url(basename(__FILE__, '.php'));
		require_once(AppDir."includes/modules/payment/alipay/lib/alipay_notify.class.php");
        $alipayNotify = new AlipayNotify($alipay_config);
        $verify_result = $alipayNotify->verifyReturn();
        if($verify_result) {//验证成功
            $seller_email = rawurldecode($_GET['seller_email']);
            $order_sn = str_replace($_GET['subject'], '', $_GET['out_trade_no']);
            $order_sn = trim(addslashes($order_sn));
			
            /* 检查支付的金额是否相符 */
            if (!check_money($order_sn, $_GET['total_fee']))
            {
                return false;
            }


            if($_GET['trade_status'] == 'TRADE_FINISHED' || $_GET['trade_status'] == 'TRADE_SUCCESS') {
                //判断该笔订单是否在商户网站中已经做过处理
                //如果没有做过处理，根据订单号（out_trade_no）在商户网站的订单系统中查到该笔订单的详细，并执行商户的业务程序
                //如果有做过处理，不执行商户的业务程序
                $data = order_paid($order_sn, 2);
                if($data['error'] > 0){ return false; }
                else{
                    //记录第三方订单号
                    insert_order_sn($order_sn, array('transaction_id'=>$_GET["trade_no"]));
                }
                return true;
            }
            else {
                return true;
            }

            return true;

            //——请根据您的业务逻辑来编写程序（以上代码仅作参考）——

            /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        }
        else {
            //验证失败
            //如要调试，请看alipay_notify.php页面的verifyReturn函数
            return false;
        }


    }
    
    function config($payment){
    	include_once(AppDir . "includes/modules/payment/alipay/alipay.config.php");
    	include_once(AppDir . "includes/modules/payment/alipay/lib/alipay_submit.class.php");
    	$alipay_config['partner']		= $payment['alipay_partner'];
    	$alipay_config['seller_id'] = $alipay_config['partner'];
    	//商户的私钥（后缀是.pen）文件相对路径
    	//$alipay_config['private_key_path']	= AppDir."includes/modules/payment/alipay/".'key/rsa_private_key.pem';
    	
    	//支付宝公钥（后缀是.pen）文件相对路径
    	//$alipay_config['ali_public_key_path']= AppDir."includes/modules/payment/alipay/".'key/alipay_public_key.pem';
    	//商户的私钥,此处填写原始私钥去头去尾，RSA公私钥生成：https://doc.open.alipay.com/doc2/detail.htm?spm=a219a.7629140.0.0.nBDxfy&treeId=58&articleId=103242&docType=1
		$private_key = file_get_contents(AppDir."includes/modules/payment/alipay/".'key/rsa_private_key.pem');
		
    	//$alipay_config['private_key']	= 'MIICXQIBAAKBgQDILTO8VtkFnTMcvQDeAnDYaKtWnOuEZLCvkqzWcoYHsR1QbYoNGoR0g3ewZC6bPeLIP3VRF5jQrs3cDJRfAfzfgM4yYB7jXkgQgdr2Qr7zUoTkZbFsfdKz3DE0hky6BV/v1kyZVlWethPCAm8355E/6jgTCCHZ1pTDBFvtdzXQEwIDAQABAoGBALh5T7BFqQKPeEcHtwDh5vTIoP3U5wa/dESZO0b1i6cTBhzUleC1i1OExIx+BqVyRsicEpWE1YObVINx5FoaDtqYmBjYT5de49MlNjoNOB6M0U6Idoxazr9eJhXtbk1p2jfZxaw6tL6dzT/AJhzKKYBt/HkJQvMcBSH2FFKx0GQBAkEA7sivxtys6hmZnhltMWbC5826MG9jJk6vBZ5RWAjPZoJIWsnI6Pjtr8xYO32gO69Pzg3Hs1fWjwwcIkBOFKVjkwJBANab7T4OnubQ6pWoEo5pHGgA2mCj/2aO8gxqe+Cciz/WABrlctF+J5QSfaRmIrMHG9ap7xKuuyQqRfTISWGisYECQQDNYzumrpvhBMIYtkAw9PYDEvbqwHSlN5reF05ajcFvp/J6fQReN/eidf8StL0FeYcIctvqDEzWYBE2+N7wbU4XAkAXV24+SajOwfpBvL4H7za/uRgHWs70gKei4hIHI/+hOc1ZH4uVbXswh7JSpyku/57vghwWlBqWnGJvdTlF/UQBAkB1b9OwtTa8W+215X1NdQcIJFTcR4+sIdmtvmyo1c4Um9Aplx8wqRdIhciYtzYeO5eZiM3cPU6aG3f5PVeuCRjf';
		$alipay_config['private_key'] = $private_key;
		
		//支付宝的公钥，查看地址：https://openhome.alipay.com/platform/keyManage.htm?keyType=partner
		$alipay_public_key = file_get_contents(AppDir."includes/modules/payment/alipay/".'key/alipay_public_key.pem');
		//$alipay_config['alipay_public_key']= 'MIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQDILTO8VtkFnTMcvQDeAnDYaKtWnOuEZLCvkqzWcoYHsR1QbYoNGoR0g3ewZC6bPeLIP3VRF5jQrs3cDJRfAfzfgM4yYB7jXkgQgdr2Qr7zUoTkZbFsfdKz3DE0hky6BV/v1kyZVlWethPCAm8355E/6jgTCCHZ1pTDBFvtdzXQEwIDAQAB';
		$alipay_config['alipay_public_key'] = $alipay_public_key;
		
    	return $alipay_config;
    }
}

?>