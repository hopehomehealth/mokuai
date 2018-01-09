<?php
define('__SERVER__', 'http://test.shopsn.net');
set_time_limit(0);
return array(
	//'配置项' => '配置值'
    'DEFAULT_MODULE'     => 'Home', //默认模块
    'URL_MODEL'          => '2', //URL模式
    'LOAD_EXT_CONFIG'    => 'db_config', // 加载数据库配置文件
    /* 加载公共函数 */
    'LOAD_EXT_FILE'      => 'common',
    //设置短信有效时间---5分钟
    'send_msg_time'      => 300,
    // 系统默认的变量过滤机制
    //'DEFAULT_FILTER'        => 'strip_sql,htmlspecialchars',
    //图片域名地址
    'img_url'            => 'http://test.shopsn.net',
    // 上传头像等图片设置图片大小
    'img_size'           => 3145728,
    'img_type'           => array('jpg', 'gif', 'png', 'jpeg'),
    'page_size'          => 10,// 配置分页大小
	 //加密字符串设置
	 'DATA_AUTH_KEY'      =>'zhongwen',
	  'ALIPAY_MOBILE_CONFIG' => array(

	'app_id' =>"",//此处填写应用ID,您的APPID。
	'merchant_private_key'=>"",//支付宝网关私钥

	//异步通知地址
	'notify_url' => "http://api.shopsn.net/home/AlipayMobile/aliMobileNot",

	//同步跳转
	'return_url' => "http://api.shopsn.net/#/home",

	//编码格式
	'charset' => "UTF-8",

	//签名方式
	'sign_type'=>"RSA",

	//支付宝网关
	'gatewayUrl' => "https://openapi.alipay.com/gateway.do",

	//支付宝公钥,查看地址：https://openhome.alipay.com/platform/keyManage.htm 对应APPID下的支付宝公钥。
	'alipay_public_key' => "",// 接收支付状态的连接
),
//	'SHOW_PAGE_TRACE'=>true,

	/*微信支付配置*/
	'WxJsApi'=>array(
			'APPID' => '您的APPID',
			'MCHID' => '您的商户ID',
			'KEY' => '商户秘钥',
			'APPSECRET' => '您的APPSECRET',
			'JS_API_CALL_URL' => WEB_HOST.'/index.php/Home/WxJsAPI/jsApiCall',
			'SSLCERT_PATH' => WEB_HOST.'/ThinkPHP/Library/Vendor/WxPayPubHelper/cacert/apiclient_cert.pem',
			'SSLKEY_PATH' => WEB_HOST.'/ThinkPHP/Library/Vendor/WxPayPubHelper/cacert/apiclient_key.pem',
			'NOTIFY_URL' =>  WEB_HOST.'/index.php/Home/WxJsAPI/notify',
			'CURL_TIMEOUT' => 30
	)
);