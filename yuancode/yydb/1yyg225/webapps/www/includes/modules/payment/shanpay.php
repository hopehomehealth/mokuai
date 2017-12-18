<?php

/**
 * 云通付支付插件
 */

if (!defined('App'))die('Hacking attempt');

include_once(AppDir . 'function/payment.php');
$payment_lang = AppDir . 'includes/languages/payment/shanpay.php';

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
    $modules[$i]['desc']    = 'shanpay_desc';

    /* 是否支持货到付款 */
    $modules[$i]['is_cod']  = '0';

    /* 是否支持在线支付 */
    $modules[$i]['is_online']  = '1';

    /* 支付费用 */
    $modules[$i]['pay_fee'] = '0';

    /* 作者 */
    $modules[$i]['author']  = '云通付';

    /* 网址 */
    $modules[$i]['website'] = 'http://www.passpay.net';

    /* 版本号 */
    $modules[$i]['version'] = '1.5.3';

    /* 配置信息 */
    $modules[$i]['config'] = array(
        array('name' => 'shanpay_partner', 'type' => 'text', 'value' => ''),
        array('name' => 'shanpay_key',     'type' => 'text', 'value' => ''),
		array('name' => 'user_seller',     'type' => 'text', 'value' => ''),
		
    );

    return;
}

/**
 * 类
 */
class shanpay
{
    /**
     * 构造函数
     *
     * @access  public
     * @param
     *
     * @return void
     */
    function shanpay()
    {
    }

    function __construct()
    {
        $this->shanpay();
    }
	
    /**
     * 生成支付代码
     * @param   array   $order      订单信息
     * @param   array   $payment    支付方式信息
     */
    function get_code($order, $payment)
    {
		include(AppDir."includes/modules/payment/shanpay/shanpayfunction.php");
		
		 //商户订单号
        $out_order_no = $order['order_sn'].'@'.$order['log_id'];//商户网站订单系统中唯一订单号，必填

        //记录支付订单号
        insert_order_sn($order['log_id'], array('order_no'=>$out_order_no));

        //订单名称
        $subject = $order['order_sn'];//必填

        //付款金额
        $total_fee = $order['order_amount'];//必填

        //订单描述
        $body = $order['order_sn'];
		
		
		//服务器异步通知页面路径
        $notify_url = return_url(basename(__FILE__, '.php'));
        //需http://格式的完整路径，不能加?id=123这类自定义参数

        //页面跳转同步通知页面路径
        $return_url = return_url(basename(__FILE__, '.php'));
        //需http://格式的完整路径，不能加?id=123这类自定义参数，不能写成http://localhost/
       
		//商品展示地址
        $orurl = "";
        //需http://格式的完整路径，不能加?id=123这类自定义参数，如原网站带有 参数请彩用伪静态或短网址解决

        //商品形象图片地址
        $orimg = "";
        //需http://格式的完整路径，必须为图片完整地址
		
		//构造要请求的参数数组，无需改动
		$parameter = array(
				"partner" => trim($payment['shanpay_partner']),
				"user_seller"	=> $payment['user_seller'],
				"out_order_no"	=> $out_order_no,
				"subject"	=> $subject,
				"total_fee"	=> $total_fee,
				"body"	=> $body,
				"notify_url"	=> $notify_url,
				"return_url"	=> $return_url,
		);
        //建立请求
        $html_text = buildRequestFormShan($parameter, $GLOBALS['_LANG']['pay_button']);
        return $html_text;
    }

    /**
     * 响应操作
     */
    function respond()
    {
        $payment  = get_payment(basename(__FILE__, '.php'));
        include(AppDir."includes/modules/payment/shanpay/shanpayfunction.php");
		
		//计算得出通知验证结果
		$shanNotify = md5VerifyShan($_REQUEST['out_order_no'],$_REQUEST['total_fee'],$_REQUEST['trade_status'],$_REQUEST['sign'],$payment['shanpay_key'],$payment['shanpay_partner']);
		//验证成功
		if($shanNotify) {
            if($_REQUEST['trade_status']=='TRADE_SUCCESS'){                
                //商户订单号
                $out_trade_no = $_REQUEST['out_order_no'];
                //云通付交易号
                $trade_no = $_REQUEST['trade_no'];
                //价格
                $price = $_REQUEST['total_fee'];
                $log_arr = explode('@', $out_trade_no);
                $log_id  = $log_arr[1];
                /* 检查支付的金额是否相符 */
                if (!check_money($log_id, $price))
                {
                    return false;
                }
                //改变订单状态
                $data = order_paid( $log_id , 2);
                if($data['error'] > 0){ return false; }
                else{
                    //记录第三方订单号
                    insert_order_sn($log_id, array('transaction_id'=>$trade_no));
                }
                return true;
            }else{
                return false;
            }
			
		}else{
			 return false;
		}
		
    }
}

?>