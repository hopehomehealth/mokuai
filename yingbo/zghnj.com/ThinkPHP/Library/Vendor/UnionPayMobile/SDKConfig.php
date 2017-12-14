<?php
	// define('UNIONPAY_URL', 'http://bannong.ibona.cn');
	// cvn2加密 1：加密 0:不加密
	 SDK_CVN2_ENC = 0;
	// 有效期加密 1:加密 0:不加密
	 SDK_DATE_ENC = 0;
	// 卡号加密 1：加密 0:不加密
	 SDK_PAN_ENC = 0;
	 SDK_MCHID = '2';
	// 签名证书路径
	 SDK_SIGN_CERT_PATH = '';
	// 签名证书密码
	 SDK_SIGN_CERT_PWD = '000000';
	// 密码加密证书
	 SDK_ENCRYPT_CERT_PATH = '';
	// 验签证书路径（请配到文件夹，不要配到具体文件）
	 SDK_VERIFY_CERT_DIR = '2';
	// 前台请求地址
	 SDK_FRONT_TRANS_URL = '';
	// 后台请求地址
	 SDK_BACK_TRANS_URL = '';
	//文件传输请求地址
	 SDK_FILE_QUERY_URL = 'https://gateway.test.95516.com/';
	 SDK_App_Request_Url='https://gateway.test.95516.com/gateway/api/appTransReq.do';
	//有卡交易地址
	 SDK_Card_Request_Url = 'gateway.test.95516.com/gateway/api/cardTransReq.do';
	// 前台通知地址 (商户自行配置通知地址)
	 SDK_FRONT_NOTIFY_URL = 'https://gateway.test.95516.com/gateway/api/frontTransReq.do';
	// 后台通知地址 (商户自行配置通知地址)
	 SDK_BACK_NOTIFY_URL = 'https://gateway.test.95516.com/gateway/api/backTransReq.do';
	//文件下载目录
	 SDK_FILE_DOWN_PATH = '';
	//日志 目录
	 SDK_LOG_FILE_PATH = '2';
	//日志级别
	 SDK_LOG_LEVEL = PhpLog::INFO;
?>