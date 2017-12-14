<?php
//定义回调URL通用的URL
define('URL_CALLBACK', 'http://'.$_SERVER['SERVER_NAME'].'/index.php/Home/User/callback/type/');
return array(
    //给后台设置layout布局
    'LAYOUT_ON'             =>  true, // 是否启用布局
    'LAYOUT_NAME'           =>  'layout', // 当前布局名称 默认为layout
    'SHOW_PAGE_TRACE'		=>  false,
    //腾讯QQ登录配置
	'THINK_SDK_QQ' => array(
		'APP_KEY'    => '101362682', //应用注册成功后分配的 APP ID
		'APP_SECRET' => '38edf8005182876d258941e46037e16a', //应用注册成功后分配的KEY
		'CALLBACK'   => URL_CALLBACK . 'qq',
	),
	//微信登录配置
	'THINK_SDK_WEIXIN' => array(
        'APP_KEY'    => 'wx08f00480fa675c37', //应用注册成功后分配的 APP ID
        'APP_SECRET' => '96f09fb6446c536d02ed10df830b2ebf', //应用注册成功后分配的KEY
        'CALLBACK'   => URL_CALLBACK . 'weixin',
    ),
);