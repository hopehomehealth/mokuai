<?php
if(!defined('App'))die('Access Deny!');
error_reporting(E_ALL ^ E_NOTICE);

//环境，测试环境。
$_HOST = isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : '';#兼容后台命令行运行

define('IS_DEV',strpos($_HOST,'.local')!==false);

//程序根目录
define('RootDir', str_replace('system/core/lowxp.php', '', str_replace('\\', '/', __FILE__)));
define('WebDir', RootDir.'web/');
define('SysDir', RootDir.'system/');
define('AppDir', RootDir.'webapps/'.App.'/');
define('SysCfg', RootDir.'system/config/');#系统公共配置路径

include(AppDir.'config/config.php');

// ssl异常开启处理
if(strpos(RootUrl, 'https://') !== false){
    if(! isset($_SERVER['HTTPS']) || $_SERVER['HTTPS'] != 'on'){
        $_SERVER['HTTPS'] = 'on';
    }
    if(! isset($_SERVER['SERVER_PORT']) || $_SERVER['SERVER_PORT'] != '443'){
        $_SERVER['SERVER_PORT'] = '443';
    }
}

// 引入日志c
include SysDir . '/library/log/log.php';// 日志配置
$LOG_CONFIG = array(
    // 'log_type' => 'seaslog',
    'log_type' => 'file', // 日志类型: file, seaslog
    // 'log_level' => 'EMERG,ALERT,CRIT,ERR,WARN,NOTIC,INFO,DEBUG,SQL',  // 日志等级: 从左到右依次为8级日志,减少这里的内容时 log::record 不记录对应级别日志
    'log_path' => RootDir . 'log/', // 日志根目录
);
CLog::init($LOG_CONFIG);

include(RootDir.'system/core/common.php');
require(RootDir.'system/core/error.php');

//路由
$Router = &loadClass('router','core');
//包含路由配置
$_RouteFile = AppDir.'config/route.php';
if(is_file($_RouteFile))include($_RouteFile);

$requestUri = $Router->getRequestUrl();
$controller_file = $Router->location($requestUri);
#echo '<pre>';print_r(Lowxp_Router::getInstance()->segments);echo '</pre>';

$class = Lowxp_Router::$class;
$method = Lowxp_Router::$method;
$params = Lowxp_Router::$params;

//加载器
$Loader = &loadClass('loader','core');
#$Loader->config('autoload');

//错误处理
#$Error = &load_class('error','core');

/**
 * 执行路由返回的类方法
 */
//包含控制器基础类
require(RootDir.'system/core/controller.php');
if(is_file(AppDir.'controller/controller.php')){
    require(AppDir.'controller/controller.php');
}

//包含模型基础类
require(RootDir.'system/core/model.php');

//file_not_exist or exit!
if(!is_file($controller_file))URL_404();
include($controller_file);

$className = $class.ClassExt;
if(!class_exists($className))ShowError('Controller '.$class." Not Exists!");

$lowxp = new $className;
/**
 * 返回控制器实例
 * @return Lowxp_Controller
 */
function & get_instance(){
    return Lowxp_Controller::get_instance();
}
//执行调用
if(method_exists($lowxp,$method)){
    if(is_callable(array($lowxp,$method))){
        if(method_exists($lowxp,initializeFunc))$lowxp->{initializeFunc}();
        //调用前执行
        if(method_exists($lowxp,PreloadFunc))$lowxp->{PreloadFunc}();

        //调用当前访问方法
        call_user_func_array(array($lowxp, $method),$params);

        //调用后执行
        if(method_exists($lowxp,AfterloadFunc))$lowxp->{AfterloadFunc}();
    }else{
        URL_404();
    }
}else{
    URL_404();
}

/**读缓存文件*/
function read_static_cache($cache_name, $dir='static')
{
    static $resultAuth = array();
    if (!empty($resultAuth[$cache_name]))
    {
        return $resultAuth[$cache_name];
    }
    $cache_file_path = AppDir . '/data/' . ($dir ? $dir.'/' : '') . $cache_name . '.php';
    if (file_exists($cache_file_path))
    {
        include_once($cache_file_path);
        $result[$cache_name] = $data;
        return $result[$cache_name];
    }
    else
    {
        return false;
    }
}
/**写缓存文件*/
function write_static_cache($cache_name, $caches, $dir='static')
{
    $cache_file_path = AppDir . 'data/' . ($dir ? $dir.'/' : '') . $cache_name . '.php';
    $content = "<?php ";
    $content .= "\$data = " . var_export($caches, true) . ";";
    $content .= " ?>";
    file_put_contents($cache_file_path, $content, LOCK_EX);
}
