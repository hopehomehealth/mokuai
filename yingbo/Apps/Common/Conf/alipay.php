<?php
define('ALIPAY_URL', '');//配置域名
//支付宝配置参数
return array(
    'alipay_config'=>array(
	    'partner' =>'',   //这里是你在成功申请支付宝接口后获取到的PID；
	    'seller_id' =>'',   //这里是你在成功申请支付宝接口后获取到的PID；
	    'key'=>'',//这里是你在成功申请支付宝接口后获取到的Key
	    'private_key_path'=> ALIPAY_URL.'/Public/pem/rsa_private_key.pem',
	    'ali_public_key_path'=>ALIPAY_URL.'/Public/pem/alipay_public_key.pem',
	    'sign_type'=>strtoupper('RSA'),
	    'input_charset'=> strtolower('utf-8'),
	    'cacert'=> getcwd().'\\cacert.pem',//证书路径，证书要放在当前目录
	    'transport'=> 'http',
      ),
    
	'alipay'   =>array(
		 //这里是卖家的支付宝账号，也就是你申请接口时注册的支付宝账号
		'seller_email'=>'',

		//这里是异步通知页面url，提交到项目的Pay控制器的notifyurl方法；
		'notify_url'=>ALIPAY_URL.'/index.php/Mobile/Alipay/notifyUrl', 

		//这里是页面跳转通知url，提交到项目的Pay控制器的returnurl方法；
		'return_url'=>ALIPAY_URL.'/index.php/Mobile/Alipay/returnUrl',

	),
	'recharge'   =>array(
		 //这里是卖家的支付宝账号，也就是你申请接口时注册的支付宝账号
		'seller_email'=>'',

		//这里是异步通知页面url，提交到项目的Pay控制器的notifyurl方法；
		'notify_url'=>ALIPAY_URL.'/index.php/Mobile/Recharge/notifyUrl', 

		//这里是页面跳转通知url，提交到项目的Pay控制器的returnurl方法；
		'return_url'=>ALIPAY_URL.'/index.php/Mobile/Recharge/returnUrl',

	),
);