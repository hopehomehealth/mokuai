<?php
define('ACCESS', './rsa_private_key.pem');
define('PRV', './rsa_public_key.pem');
return array(
    //'配置项'=>'配置值'
    //支付宝配置参数
    'alipay_config' => array(
        'partner'       => '',   //这里是你在成功申请支付宝接口后获取到的PID；
        'key'           => '',//这里是你在成功申请支付宝接口后获取到的Key
        'sign_type'     => strtoupper('MD5'),
        'input_charset' => strtolower('utf-8'),
        'cacert'        => getcwd() . '\\cacert.pem',
        'transport'     => 'http',
    ),
    //以上配置项，是从接口包中alipay.config.php 文件中复制过来，进行配置；

    'alipay' => array(
        //这里是卖家的支付宝账号，也就是你申请接口时注册的支付宝账号
        'seller_email' => '',

        //这里是异步通知页面url，提交到项目的Pay控制器的notifyurl方法；
        'notify_url'   => __ROOT__ . '/Home/Pay/notifyurl',

        //这里是页面跳转通知url，提交到项目的Pay控制器的returnurl方法；
        'return_url'   => 'http://www.youseng.com/Home/Pay/notifyurl',

        //支付成功跳转到的页面，我这里跳转到项目的User控制器，myorder方法，并传参payed（已支付列表）
        'successpage'  => '支付成功',

        //支付失败跳转到的页面，我这里跳转到项目的User控制器，myorder方法，并传参unpay（未支付列表）
        'errorpage'    => '支付失败',
    ),

    'WxLogin_DoMain'      => 'http://' . $_SERVER['SERVER_NAME'] . '/Home/WeChat/getWebAccessToken',//微信网页授权的 域名
    'WxOpenId_DoMain'     => 'http://' . $_SERVER['SERVER_NAME'] . '/Home/WeChat/getOpenId',//只获取openId 回调域名
    'notify_url_wx_weiyi' => 'http://' . $_SERVER['SERVER_NAME'] . '/Home/WxJsApiNotify/WXJsPayUrl9961',//JSAPI 回调地址
    'jsapi_log_pash'      => __ROOT__ . '/ThinkPHP/Library/Vendor/WxPay',
    'MOBILE_DOMAIN'       => 'http://m.shopsn.net',//手机端域名


);