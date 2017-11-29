<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2014 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用入口文件

// 检测PHP环境
if(version_compare(PHP_VERSION,'5.3.0','<'))  die('require PHP > 5.3.0 !');

// 开启调试模式 建议开发阶段开启 部署阶段注释或者设为false
define('APP_DEBUG',True);

// 定义应用目录
define('APP_PATH','./Application/');

// 引入ThinkPHP入口文件
require './ThinkPHP/ThinkPHP.php';

// 亲^_^ 后面不需要任何代码了 就是如此简单



//echo '__ROOT__  ： 网站根目录地址'. ROOT__;
//
//echo '__APP__  ： 当前项目（入口文件）地址'.__APP__.'<br>';
//echo '__GROUP__：当前分组地址'.__GROUP__.'<br>';
//echo '__URL__  ： 当前模块地址'.__URL_.'<br>';
//echo '__ACTION__ ： 当前操作地址'.__ACTION__.'<br>';
//echo '__SELF__  ： 当前 URL 地址'.__SELF__.'<br>';
//echo '__CURRENT__  ： 当前模块的模板目录'.__CURRENT__.'<br>';
//echo 'ACTION_NAME ： 当前操作名称'.ACTION_NAME.'<br>';
//echo 'APP_PATH ： 当前项目目录'.APP_PATH.'<br>';
//echo 'APP_NAME ： 当前项目名称'.APP_NAME.'<br>';
//echo 'APP_TMPL_PATH ： 项目模板目录'.APP_TMPL_PATH.'<br>';
//echo 'APP_PUBLIC_PATH ：项目公共文件目录'.APP_PUBLIC_PATH.'<br>';
//echo 'CACHE_PATH ： 项目模版缓存目录'.CACHE_PATH.'<br>';
//echo 'CONFIG_PATH ：项目配置文件目录'.CONFIG_PATH.'<br>';
//echo 'COMMON_PATH ： 项目公共文件目录'.COMMON_PATH.'<br>';
//echo 'DATA_PATH ： 项目数据文件目录'.DATA_PATH.'<br>';
//echo 'GROUP_NAME ：当前分组名称'.GROUP_NAME.'<br>';
//echo 'HTML_PATH ： 项目静态文件目录'.HTML_PATH.'<br>';
//echo 'IS_APACHE ： 是否属于 Apache (2.1版开始已取消)'.IS_APACHE.'<br>';
//echo 'IS_CGI ：是否属于 CGI模式'.IS_CGI.'<br>';
//echo 'IS_IIS ：是否属于 IIS  (2.1版开始已取消)'.IS_IIS.'<br>';
//echo 'IS_WIN ：是否属于Windows 环境'.IS_WIN.'<br>';
//echo 'LANG_SET ： 浏览器语言'.LANG_SET.'<br>';
//echo 'LIB_PATH ： 项目类库目录'.LIB_PATH.'<br>';
//echo 'LOG_PATH ： 项目日志文件目录'.LOG_PATH.'<br>';
//echo 'LANG_PATH ： 项目语言文件目录'.LANG_PATH.'<br>';
//echo 'MODULE_NAME ：当前模块名称'.MODULE_NAME.'<br>';
//echo 'MEMORY_LIMIT_ON ： 是否有内存使用限制'.MEMORY_LIMIT_ON.'<br>';
//echo 'MAGIC_QUOTES_GPC ： MAGIC_QUOTES_GPC'.MAGIC_QUOTES_GPC.'<br>';
//echo 'TEMP_PATH  ：项目临时文件目录'.TEMP_PATH.'<br>';
//echo 'TMPL_PATH ： 项目模版目录'.TMPL_PATH.'<br>';
//echo 'THINK_PATH ： ThinkPHP 系统目录'.THINK_PATH.'<br>';
//echo 'THINK_VERSION ：ThinkPHP版本号'.THINK_VERSION.'<br>';
//echo 'TEMPLATE_NAME ：当前模版名称'.TEMPLATE_NAME.'<br>';
//echo 'TEMPLATE_PATH ：当前模版路径'.TEMPLATE_PATH.'<br>';
//echo 'VENDOR_PATH ： 第三方类库目录'.VENDOR_PATH.'<br>';
//echo 'WEB_PUBLIC_PATH ：网站公共目录'.WEB_PUBLIC_PATH.'<br>';
//echo 'TAPP_CACHE_NAME ： 系统缓存文件名  2.1版本新增'.TAPP_CACHE_NAME.'<br>';


