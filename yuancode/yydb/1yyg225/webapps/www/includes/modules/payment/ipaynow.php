<?php
if (!defined('App'))
{
    die('Hacking attempt');
}
include_once(AppDir . 'function/payment.php');
include_once(AppDir . 'includes/modules/payment/ipaynow/services/Services.php');
$payment_lang = AppDir . 'includes/languages/payment/ipaynow.php';

if (file_exists($payment_lang))
{
    global $_LANG;

    include_once($payment_lang);
}

/* 模块的基本信息 */
if (isset($set_modules) && $set_modules == TRUE)
{
    $i = isset($modules) ? count($modules) : 0;

    /* 代码 */
    $modules[$i]['code']    = basename(__FILE__, '.php');

    /* 描述对应的语言项 */
    $modules[$i]['desc']    = 'ipaynow_desc';

    /* 是否支持货到付款 */
    $modules[$i]['is_cod']  = '1';

    /* 是否支持在线支付 */
    $modules[$i]['is_online']  = '1';

    /* 支付费用 */
    $modules[$i]['pay_fee'] = '0';

    /* 作者 */
    $modules[$i]['author']  = '现在支付';

    /* 网址 */
    $modules[$i]['website'] = 'https://payment.ipaynow.cn';

    /* 版本号 */
    $modules[$i]['version'] = '1.0';

    /* 配置信息 */
    $modules[$i]['config'] = array(
        array('name' => 'app_id', 'type' => 'text', 'value' => ''),
        array('name' => 'secure_key',     'type' => 'text', 'value' => '')
    );

    return;
}
class Config{
    static $timezone="Asia/Shanghai";
    static $app_id="";//该处配置您的APPID
    static $secure_key="";//该处配置您的应用秘钥
    static $query_url="http://api.ipaynow.cn";
    static $notify_url="";//配置您接收通知地址

    const VERIFY_HTTPS_CERT=false;
    const QUERY_FUNCODE_KEY="MQ001";
    const SIGNATURE_KEY="signature";
    const SIGNTYPE_KEY="signType";
    const MHT_SIGN_TYPE_KEY="mhtSignType";
    const MHT_SIGNATURE_KEY="mhtSignature";
    const CHARSET="UTF-8";
    const SIGN_TYPE="MD5";
    const QSTRING_EQUAL="=";
    const QSTRING_SPLIT="&";

    function __construct(){
        $payment = get_payment('ipaynow');
        if(isset($payment)){
            self::$app_id	=  $payment['app_id'];
            self::$secure_key = $payment['secure_key'];
            self::$notify_url	= url('/api/welcome/respond');
        }
    }
}
/**
 * 类
 */
class ipaynow
{
    /**
     * 构造函数
     *
     * @access  public
     * @param
     *
     * @return void
     */
    function ipaynow()
    {
    }

    function __construct()
    {
        $this->ipaynow();
    }
	
    /**
     * 生成支付代码
     * @param   array   $order      订单信息
     * @param   array   $payment    支付方式信息
     */
    function get_code($order, $payment)
    {
        $req=array();
        $req["paydata"]=$_POST['paydata'];
        $params=array();
        parse_str($req['paydata'],$params);
        $temp["mhtSignature"]=Services::buildSignature($params);
        $temp["mhtSignType"]="MD5";
        $response=Services::buildReq($temp);
        payLog::outLog("简便形式支付接口",$response.$req["paydata"]);
        return $response;
    }

    /**
     * 响应操作
     */
    function respond()
    {
        //$payment        = get_payment(basename(__FILE__, '.php'));
        $request=file_get_contents('php://input');
        payLog::outLog("通知接口", $request);
        parse_str($request,$request_form);
        if (Services::verifySignature($request_form)){
            //echo "success=Y";
            $log_id = explode('_',$_REQUEST['mhtOrderNo']);
            $log_id = $log_id[1];
            $tradeStatus=$_REQUEST['tradeStatus'];
            if($tradeStatus!=""&&$tradeStatus=="A001"){
                $data = order_paid($log_id);
                if($data['error'] > 0){ return false; }
            }else{
                /**
                 * 其他失败情况
                 */
            }
        }else{
            payLog::outLog("签名验证失败", $request);
        }
    }
}

?>