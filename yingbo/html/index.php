<?php
header("content-type:text/html;charset=utf-8");

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/6/13
 * Time: 11:19
 */

// 检测PHP环境
if(version_compare(PHP_VERSION,'5.3.0','<'))  die('require PHP > 5.3.0 !');


// 开启调试模式 建议开发阶段开启 部署阶段注释或者设为false
define('APP_DEBUG',true);

//后台Admin静态资源文件引入,设置常量
define('SITE_URL','http://www.1lehu.com/');
define('CSS_URL',SITE_URL."Public/Admin/css/");
define('IMG_URL',SITE_URL."Public/Admin/images/");
define('JS_URL',SITE_URL."Public/Admin/js/");


//前台Home静态资源文件引入,设置常量
define('HCSS_URL',SITE_URL."Public/Home/css/");
define('HIMG_URL',SITE_URL."Public/Home/images/");
define('HJS_URL',SITE_URL."Public/Home/js/");

//前台Mobile静态资源文件引入,设置常量
define('MBCSS_URL',SITE_URL."Public/Mobile/css/");
define('MBIMG_URL',SITE_URL."Public/Mobile/images/");
define('MBJS_URL',SITE_URL."Public/Mobile/js/");
//插件Plugin
define('PLUGIN_URL',SITE_URL."Common/Plugin/");



include "./ThinkPHP/ThinkPHP.php";