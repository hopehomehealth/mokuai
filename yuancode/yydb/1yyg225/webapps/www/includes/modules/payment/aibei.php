<?php
if (!defined('App'))
{
    die('Hacking attempt');
}
include_once(AppDir . 'function/payment.php');
require_once AppDir . 'includes/modules/payment/ipaynow/utils/Log.php';
$payment_lang = AppDir . 'includes/languages/payment/aibei.php';

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
    $modules[$i]['desc']    = 'aibei_desc';

    /* 是否支持货到付款 */
    $modules[$i]['is_cod']  = '0';

    /* 是否支持在线支付 */
    $modules[$i]['is_online']  = '1';

    /* 支付费用 */
    $modules[$i]['pay_fee'] = '0';

    /* 作者 */
    $modules[$i]['author']  = '爱贝支付';

    /* 网址 */
    $modules[$i]['website'] = 'https://www.iapppay.com/home.html';

    /* 版本号 */
    $modules[$i]['version'] = '1.0';

    /* 配置信息 */
    $modules[$i]['config'] = array(
        array('name' => 'appid', 'type' => 'text', 'value' => ''),
        array('name' => 'appkey',     'type' => 'text', 'value' => ''),
        array('name' => 'platpkey',     'type' => 'text', 'value' => '')
    );

    return;
}

/**
 * 类
 */
class aibei
{
    public $iapppayCpUrl = "http://ipay.iapppay.com:9999";
    //登录令牌认证接口 url
    public $tokenCheckUrl = "";

    //下单接口 url
    public $orderUrl = "";

    //支付结果查询接口 url
    public $queryResultUrl = "";

    //契约查询接口url
    public $querysubsUrl = "";

    //契约鉴权接口Url
    public $ContractAuthenticationUrl = "";

    //取消契约接口Url
    public $subcancel = "";
    //H5和PC跳转版支付接口Url
    public $h5url = "https://web.iapppay.com/czb/exbegpay?";
    public $pcurl = "https://web.iapppay.com/czb-pc/exbegpay?";
    public $appid = "";
    public $appkey = "";
    public $platpkey = "";
    /**
     * 构造函数
     *
     * @access  public
     * @param
     *
     * @return void
     */
    function aibei(){

    }

    function __construct()
    {
        $this->tokenCheckUrl = $this->iapppayCpUrl."/openid/openidcheck";
        $this->orderUrl=$this->iapppayCpUrl . "/payapi/order";
        $this->queryResultUrl=$this->iapppayCpUrl . "/payapi/queryresult";
        $this->querysubsUrl=$this->iapppayCpUrl . "/payapi/subsquery";
        $this->ContractAuthenticationUrl=$this->iapppayCpUrl . "/payapi/subsauth";
        $this->subcancel=$this->iapppayCpUrl . "/payapi/subcancel";
        $payment = get_payment('aibei');
        //应用编号
        $this->appid = $payment['appid'];
        //应用私钥
        $this->appkey = $payment['appkey'];
        //平台公钥
        $this->platpkey = $payment['platpkey'];
        $this->aibei();
    }

    /**
     * 生成支付代码
     * @param   array   $order      订单信息
     * @param   array   $payment    支付方式信息
     */
    function get_code($order, $payment)
    {
        //记录支付订单号
        $order_no = $order['order_sn'].'_'.$order['log_id'];
        insert_order_sn($order['log_id'], array('order_no'=>$order_no));

        //下单接口
        $orderReq['appid'] = "$this->appid";
        $orderReq['waresid'] = 1;
        $orderReq['cporderid'] = $order_no; //确保该参数每次 都不一样。否则下单会出问题。
        $orderReq['price'] = $order['order_amount']*1;   //单位：元
        $orderReq['currency'] = 'RMB';
        $orderReq['appuserid'] = "$order[log_id]";
        $orderReq['cpprivateinfo'] = "$order[order_sn]";
        $url = (IS_APP == 1) ? '/api/welcome/respond' : '/welcome/respond';
        $orderReq['notifyurl'] = url($url) . '?code=aibei';
        //组装请求报文  对数据签名
        $reqData = composeReq($orderReq, $this->appkey);
        //echo  "$reqData";
        //发送到爱贝服务后台请求下单
        $respData = request_by_curl($this->orderUrl, $reqData, 'order test');
        $result = array();
        //验签数据并且解析返回报文
        if(!parseResp($respData, $this->platpkey, $respJson)) {
            $result['msg'] = str_replace('transdata=','',$orderReq);
        }else{
            $result['transid'] = $respJson->transid;
            $result['redirecturl'] = $orderReq['notifyurl'];
            $result['sign'] = $this->H5IframeSign($result['transid'],$orderReq['notifyurl'],'',$this->appkey);

            if(IS_APP != 1){
                $button = $this->H5orPCpay($respJson,$order);
                return $button;
            }
        }
        return $result;
    }

    /**
     * 响应操作
     */
    function respond()
    {
        global $lowxp;
        payLog::outLog("爱贝通知", json_encode($_REQUEST));
        $string = $_REQUEST;//接收post请求数据
        $cporderid = '';
        if($string ==null){
            return false;
        }else{
            $transdata=$string['transdata'];
            //echo "$transdata\n";
            if(stripos("%22",$transdata)){ //判断接收到的数据是否做过 Urldecode处理，如果没有处理则对数据进行Urldecode处理
                $string= array_map ('urldecode',$string);
            }
            //print_r('<pre>');var_dump($string);print_r('</pre>');exit;
            $respData = stripslashes('transdata='.$string['transdata'].'&sign='.$string['sign'].'&signtype='.$string['signtype']);//把数据组装成验签函数要求的参数格式
            $respData = str_replace('&quot;','"',$respData);
            //  验签函数parseResp（） 中 只接受明文数据。数据如：transdata={"appid":"3003686553","appuserid":"10123059","cporderid":"1234qwedfq2as123sdf3f1231234r","cpprivate":"11qwe123r23q232111","currency":"RMB","feetype":0,"money":0.12,"paytype":403,"result":0,"transid":"32011601231456558678","transtime":"2016-01-23 14:57:15","transtype":0,"waresid":1}&sign=jeSp7L6GtZaO/KiP5XSA4vvq5yxBpq4PFqXyEoktkPqkE5b8jS7aeHlgV5zDLIeyqfVJKKuypNUdrpMLbSQhC8G4pDwdpTs/GTbDw/stxFXBGgrt9zugWRcpL56k9XEXM5ao95fTu9PO8jMNfIV9mMMyTRLT3lCAJGrKL17xXv4=&signtype=RSA
            //echo $respData;die;
            if(!parseResp($respData, $this->platpkey, $respJson)) {
                //验签失败
                if(isset($_REQUEST['order_sn'])){
                    return false;
                }else{
                    echo 'failed';die;
                }
            }else{
                //验签成功
                //以下是 验签通过之后 对数据的解析。
                $arr=$respJson;

                $appid=$arr->appid;
                $appuserid=$arr->appuserid;
                $cporderid=$arr->cporderid;
                $cpprivate=$arr->cpprivate;
                $money=$arr->money;
                $result=$arr->result;
                $transid=$arr->transid;
                $transtime=$arr->transtime;
                $waresid=$arr->waresid;
                /* 改变订单状态 */
                $order_amount = $lowxp->db->getstr("SELECT order_amount FROM ###_pay_log WHERE log_id = '$appuserid'");
                if($order_amount != $money) return false;
                $data = order_paid($appuserid, 2);
                if($data['error'] > 0){ return false; }
                else{
                    //记录第三方订单号
                    insert_order_sn($appuserid, array('transaction_id'=>$transid));
                }
                if(isset($_REQUEST['order_sn'])){
                    return true;
                }else{
                    echo 'success';die;
                }
            }
        }
    }

    //此为H5 和PC 版本调收银台时需要的参数组装函数   特别提醒的是  下面的函数中有  $h5url 和$pcurl 两个url地址。 只需要更换这两个地址就可以 调出 H5 收银台和PC版本收银台。
    function H5orPCpay($respJson,$order) {
        //下单接口
        $orderReq['transid'] = $respJson->transid;
        $url = (IS_APP == 1) ? '/api/welcome/respond' : '/welcome/respond';
        $orderReq['redirecturl'] = url($url) . '?code=aibei&order_sn='.$order['order_sn'];
        $orderReq['cpurl'] = '';

        //组装请求报文 对数据签名
        $reqData = composeReq($orderReq, $this->appkey);
        $url = (IS_MOBILE || IS_WECHAT) ? $this->h5url : $this->pcurl;

        $button = '<div><input type="button" onclick="window.location.href=\''.$url.$reqData.'\'" class="payBtn" value="立即使用爱贝支付" /></div>';
        return $button;
    }

    function H5IframeSign($transid,$redirecturl,$cpurl, $appkey){
        $content=trim($transid).''.trim($redirecturl).''.trim($cpurl);//拼接$transid   $redirecturl    $cpurl
        $appkey=formatPriKey($appkey);
        $sign=sign($content,$appkey);
        return $sign;
    }
}

function formatPubKey($pubKey) {
    $fKey = "-----BEGIN PUBLIC KEY-----\n";
    $len = strlen($pubKey);
    for($i = 0; $i < $len; ) {
        $fKey = $fKey . substr($pubKey, $i, 64) . "\n";
        $i += 64;
    }
    $fKey .= "-----END PUBLIC KEY-----";
    return $fKey;
}

/**格式化公钥
 * $priKey PKCS#1格式的私钥串
 * return pem格式私钥， 可以保存为.pem文件
 */
function formatPriKey($priKey) {
    $fKey = "-----BEGIN RSA PRIVATE KEY-----\n";
    $len = strlen($priKey);
    for($i = 0; $i < $len; ) {
        $fKey = $fKey . substr($priKey, $i, 64) . "\n";
        $i += 64;
    }
    $fKey .= "-----END RSA PRIVATE KEY-----";
    return $fKey;
}

/**RSA签名
 * $data待签名数据
 * $priKey商户私钥
 * 签名用商户私钥
 * 使用MD5摘要算法
 * 最后的签名，需要用base64编码
 * return Sign签名
 */
function sign($data, $priKey) {
    //转换为openssl密钥
    $res = openssl_get_privatekey($priKey);

    //调用openssl内置签名方法，生成签名$sign
    openssl_sign($data, $sign, $res, OPENSSL_ALGO_MD5);

    //释放资源
    openssl_free_key($res);

    //base64编码
    $sign = base64_encode($sign);
    return $sign;
}

/**RSA验签
 * $data待签名数据
 * $sign需要验签的签名
 * $pubKey爱贝公钥
 * 验签用爱贝公钥，摘要算法为MD5
 * return 验签是否通过 bool值
 */
function verify($data, $sign, $pubKey)  {
    //转换为openssl格式密钥
    $res = openssl_get_publickey($pubKey);

    //调用openssl内置方法验签，返回bool值
    $result = (bool)openssl_verify($data, base64_decode($sign), $res, OPENSSL_ALGO_MD5);

    //释放资源
    openssl_free_key($res);

    //返回资源是否成功
    return $result;
}


/**
 * 解析response报文
 * $content  收到的response报文
 * $pkey     爱贝平台公钥，用于验签
 * $respJson 返回解析后的json报文
 * return    解析成功TRUE，失败FALSE
 */
function parseResp($content, $pkey, &$respJson) {
    $arr=array_map(create_function('$v', 'return explode("=", $v);'), explode('&', $content));
    foreach($arr as $value) {
        $resp[($value[0])] = $value[1];
    }

    //解析transdata
    if(array_key_exists("transdata", $resp)) {
        $respJson = json_decode($resp["transdata"]);
    } else {
        return FALSE;
    }

    //验证签名，失败应答报文没有sign，跳过验签
    if(array_key_exists("sign", $resp)) {
        //校验签名
        $pkey = formatPubKey($pkey);
        return verify($resp["transdata"], $resp["sign"], $pkey);
    } else if(array_key_exists("errmsg", $respJson)) {
        return FALSE;
    }

    return TRUE;
}

/**
 * curl方式发送post报文
 * $remoteServer 请求地址
 * $postData post报文内容
 * $userAgent用户属性
 * return 返回报文
 */
function request_by_curl($remoteServer, $postData, $userAgent) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $remoteServer);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_USERAGENT, $userAgent);
    $data = urldecode(curl_exec($ch));
    curl_close($ch);

    return $data;
}

/**
 * 组装request报文
 * $reqJson 需要组装的json报文
 * $vkey  cp私钥，格式化之前的私钥
 * return 返回组装后的报文
 */
function composeReq($reqJson, $vkey) {
    //获取待签名字符串
    $content = json_encode($reqJson);
    //格式化key，建议将格式化后的key保存，直接调用
    $vkey = formatPriKey($vkey);

    //生成签名
    $sign = sign($content, $vkey);

    //组装请求报文，目前签名方式只支持RSA这一种
    $reqData = "transdata=".urlencode($content)."&sign=".urlencode($sign)."&signtype=RSA";

    return $reqData;
}

//发送post请求 ，并得到响应数据  和对数据进行验签
function HttpPost($Url,$reqData){
    global  $cpvkey, $platpkey;
    $respData = request_by_curl($Url,$reqData," demo ");
    if(!parseResp($respData,$platpkey, $notifyJson)) {
        echo "fail";
    }
    echo "TEST respData:$respData\n";
}
?>