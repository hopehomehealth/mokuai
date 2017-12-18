<?php
//设置时区
date_default_timezone_set('PRC');

//程序开始运行的时间
define('RUN_TIME',isset($_SERVER['REQUEST_TIME']) ? $_SERVER['REQUEST_TIME'] : time());

//配置域名
defined('IS_DEV') || define('IS_DEV',true);

if(IS_DEV){ //本地
    define('Domain', 'i1y8.com');
    define('RootUrl','http://'.Domain.'/');
}else{ //服务器
    //error_reporting(0);
    define('Domain', 'i1y8.com');
    define('RootUrl','http://www.'.Domain.'/');
}

/**
 * 源码授权密钥
 * 服务器上必须配置，否则无法进入后台
 * 请联系客服获取
 */
define('AuthKey', 'KWpiHtqvNb4HvXIJAWaW');

//配置目录
define('CfgDir',AppDir.'config/');
//控制器目录
define('ControllerDir',AppDir.'controller/');

/**
 * 源码版本号
 */
include_once(CfgDir . 'version.php');

//配置常量
define('DefaultController','home');
define('DefaultAction','index');
define('ClassExt','');
define('PreloadFunc','');
define('initializeFunc','initialize_handle');
define('AfterloadFunc','');
define('IsAuction',false);
