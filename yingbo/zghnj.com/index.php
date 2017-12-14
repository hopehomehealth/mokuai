<?php
header("content-type:text/html;charset=utf-8");


// 检测PHP环境
if(version_compare(PHP_VERSION,'5.3.0','<'))  die('require PHP > 5.3.0 !');

// 开启调试模式 建议开发阶段开启 部署阶段注释或者设为false
define('APP_DEBUG',true);

//后台Admin静态资源文件引入,设置常量
define('SITE_URL','http://'.$_SERVER['HTTP_HOST']);
define('CSS_URL',SITE_URL.'/'."Public/Admin/css/");
define('IMG_URL',SITE_URL.'/'."Public/Admin/images/");
define('JS_URL',SITE_URL.'/'."Public/Admin/js/");


//前台Wap静态资源文件引入,设置常量
define('WCSS_URL',SITE_URL.'/'."Public/Wap/css/");
define('WIMG_URL',SITE_URL.'/'."Public/Wap/images/");
define('WJS_URL',SITE_URL.'/'."Public/Wap/js/");

//前台PC静态资源文件引入,设置常量
define('HCSS_URL',SITE_URL.'/'."Public/Home/css/");
define('HIMG_URL',SITE_URL.'/'."Public/Home/images/");
define('HJS_URL',SITE_URL.'/'."Public/Home/js/");
//插件Plugin
define('PLUGIN_URL',SITE_URL.'/'."Common/Plugin/");



include "./ThinkPHP/ThinkPHP.php";