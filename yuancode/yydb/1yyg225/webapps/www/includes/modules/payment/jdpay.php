<?php
!defined('App') && die('Hacking attempt');

include_once(AppDir . 'function/payment.php');
include_once AppDir . 'includes/modules/payment/jdpay/Jd.php';

$payment_lang = AppDir . 'includes/languages/payment/jdpay.php';

if (file_exists($payment_lang)) {
    global $_LANG;
    include_once($payment_lang);
}

/* 模块的基本信息 */
if (isset($set_modules) && $set_modules == TRUE) {
    $i = isset($modules) ? count($modules) : 0;

    /* 代码 */
    $modules[$i]['code'] = basename(__FILE__, '.php');

    /* 描述对应的语言项 */
    $modules[$i]['desc'] = 'jdpay_desc';

    /* 是否支持货到付款 */
    $modules[$i]['isCod'] = '0';

    /* 是否支持在线支付 */
    $modules[$i]['is_online'] = '1';

    /* 支付费用 */
    $modules[$i]['pay_fee'] = '0';

    /* 作者 */
    $modules[$i]['author'] = '京东支付';

    /* 网址 */
    $modules[$i]['website'] = 'http://www.yoyipay.com/';

    /* 版本号 */
    $modules[$i]['version'] = '';

    /* 配置信息 */
    $modules[$i]['config'] = array(
        array('name' => 'app_id', 'type' => 'text', 'value' => ''),
        array('name' => 'app_key', 'type' => 'text', 'value' => ''),
    );

    return;
}

class jdpay {

    public $merId;
    public $key;
    public $postUrl;
    public $respondUrl;
    public $noticeUrl;
    public $nodeAuthorizationURL;
    public $getOrderURL;
    public $merchantNum; //商户开通的商户号
    public $desKey; // 商户DES密钥
    public $serverPayUrl; //京东支付服务地址
    public $serverQueryUrl; //京东查询服务地址
    public $refundUrl; //退款服务地址
    public $callbackUrl; //callback地址
    public $notifyUrl; //异步通知地址

    public function __construct() {
        $payment = get_payment('jdpay');

        $this->merchantNum = $payment['app_id']; //商户开通的商户号22294531;
        $this->desKey = $payment['app_key']; // 商户DES密钥 'ta4E/aspLA3lgFGKmNDNRYU92RkZ4w2t';
        $this->serverPayUrl = (IS_APP == 1 || IS_MOBILE == 1 ) ? 'https://h5pay.jd.com/jdpay/saveOrder' : 'https://wepay.jd.com/jdpay/saveOrder'; //京东支付服务地址
        $this->serverQueryUrl = 'http://paygate.jd.com/service/query'; //京东查询服务地址
        $this->refundUrl = 'http://paygate.jd.com/service/refund'; //退款服务地址
        $this->callbackUrl = url(IS_APP == 1 ? '/api/welcome/respond' : '/welcome/respond') . '?code=jdpay&payid=1'; //callback地址
        $this->notifyUrl = $this->callbackUrl; //异步通知地址
    }

    /**
     * 生成支付代码
     * @param array $order 订单信息
     * @param array $payment 支付方式信息
     * 
     * PC版调用地址：https://wepay.jd.com/jdpay/saveOrder
     * H5版调用地址：https://h5pay.jd.com/jdpay/saveOrder
     * 编码格式: UTF-8
     * 调用方式：POST
     * 数据格式：Form表单
     * 版本号              version       是	String(10)	当前固定填写：V2.0
     * 交易信息签名         sign         是	String(256)	用户交易信息签名后的值
     * 商户号           merchant         是	String(32)	商户号
     * 设备号             device         否	String(32)	商户门店或收银设备ID
     * 交易流水号       tradeNum         是	String(32)	商户提供的唯一交易流水号（字母和数字）
     * 交易名称        tradeName         是	String（128）	商户提供的订单的标题/商品名称/关键字等
     * 交易描述	        tradeDesc        否	String(1024)	商户提供的订单的具体描述信息
     * 交易时间        tradeTime         是	String(14)	订单生成时间，格式为“yyyyMMddHHmmss”
     * 交易金额           amount         是	Long	商户提供的订单的资金总额，单位：分，大于0。
     * 订单类型         orderType	是	String(1)	0-实物，1-虚拟
     * 业务类型      industryCategoryCode 否	String(32)	订单业务类型
     * 货币种类         currency          是	String(8)	货币类型，固定填CNY
     * 商户备注             note          否	String(256)	商户备注信息
     * 支付成功跳转路径	callbackUrl      是	String(256)	支付成功后跳转的URL
     * 异步通知页面地址	notifyUrl        是	String(256)	支付完成后，异步通知商户服务相关支付结果
     * 用户IP                 ip         否	String(16)	用户IP
     * 用户指定卡号       specCardNo      否	String（64）	指定银行卡号
     * 用户指定身份证     specId          否	String（64）	身份证号
     * 用户指定姓名      specName         否	String（64）	姓名
     * 用户账号类型      userType         否	String (5)	BIZ-企业号、TOKEN-token、JD-京东用户
     * 用户账号           userId         否	String(64)	商户的用户账号
     * 订单失效时长      expireTime       否	Integer	订单的失效时长，单位：秒，失效后则不能再支付，默认失效时间为7天
     * @return bool
     */
    public function get_code($order, $payment) {
        //记录支付订单号
        $order_no = $order['order_sn'] . $order['log_id'];
        insert_order_sn($order['log_id'], array('order_no'=>$order_no));

        $keys = base64_decode($this->desKey);
        $param = array();
        $param["tradeNum"] = $order_no;
        $param["tradeName"] = $order['order_sn'];
        $param["tradeTime"] = date('YmdHis');
        $param["amount"] = ( number_format($order['order_amount'], 2, '.', '') * 100 ) . '';
        $param["currency"] = 'CNY';
        $param["note"] = $order['order_sn'];

        $param["callbackUrl"] = $this->callbackUrl;
        $param["notifyUrl"] = $this->notifyUrl;
        $param["ip"] = '';
        $param["orderType"] = '1';

        $param["version"] = 'V2.0';
        $param["merchant"] = $this->merchantNum;
        $param["device"] = '';
        $param["tradeDesc"] = '';
        $param["specCardNo"] = '';
        $param["specId"] = '';
        $param["specName"] = '';
        $param["userType"] = 'BIZ';
        $param["userId"] = $_SESSION['mid'];
        $param["expireTime"] = '';
        $param["industryCategoryCode"] = '';

        $param["sign"] = SignUtil::signWithoutToHex($param, array("sign"));
        $param["userType"] = Jd::encrypt2HexStr($keys, $param["userType"]);
        $param["userId"] = Jd::encrypt2HexStr($keys, $param["userId"]);
        $param["tradeNum"] = Jd::encrypt2HexStr($keys, $param["tradeNum"]);
        $param["tradeName"] = Jd::encrypt2HexStr($keys, $param["tradeName"]);
        $param["tradeTime"] = Jd::encrypt2HexStr($keys, $param["tradeTime"]);
        $param["amount"] = Jd::encrypt2HexStr($keys, $param["amount"]);
        $param["currency"] = Jd::encrypt2HexStr($keys, $param["currency"]);
        $param["note"] = Jd::encrypt2HexStr($keys, $param["note"]);

        $param["callbackUrl"] = Jd::encrypt2HexStr($keys, $param["callbackUrl"]);
        $param["notifyUrl"] = Jd::encrypt2HexStr($keys, $param["notifyUrl"]);
        $param["ip"] = TDESUtil::encrypt2HexStr($keys, $param["ip"]);
        $param["orderType"] = Jd::encrypt2HexStr($keys, $param["orderType"]);

        if (IS_APP == 1) {
            $result = array();
            $result['data'] = Jd::buildPost($param, $this->serverPayUrl) . '<script>document.jdpay.submit();</script>';
            $result['order_sn'] = $order['order_sn'];
        } else {
            $result = Jd::buildPost($param, $this->serverPayUrl);
        }

        return $result;
    }

    /**
     * 响应操作
     * 
     * 交易流水号	tradeNum      是	   String(32)
     * 交易金额         amount         是   Long
     * 货币种类         currency       是   String(8)
     * 交易时间         tradeTime      是   String(14)
     * 交易备注         note           是   String(256)
     * 交易状态         status         是   Integer
     * 签名             sign           是   String(256)
     */
    public function respond() {
        $keys = base64_decode($this->desKey);
        $param = array();
        $param["tradeNum"] = Jd::decrypt4HexStr($keys, $_POST["tradeNum"]);
        $param["amount"] = Jd::decrypt4HexStr($keys, $_POST["amount"]);
        $param["currency"] = Jd::decrypt4HexStr($keys, $_POST["currency"]);
        $param["tradeTime"] = Jd::decrypt4HexStr($keys, $_POST["tradeTime"]);
        $param["note"] = Jd::decrypt4HexStr($keys, $_POST["note"]);
        $param["status"] = Jd::decrypt4HexStr($keys, $_POST["status"]);

        $strSourceData = SignUtil::signString($param, array());
        //$decryptBASE64Arr = base64_decode($sign);
        $decryptStr = RSAUtils::decryptByPublicKey($_POST["sign"]);
        $sha256SourceSignString = hash("sha256", $strSourceData);

        $order = str_replace($param["note"], '', $param["tradeNum"]);
        
        /* 检查支付的金额是否相符 */
        if (!check_money($order, round($param["amount"] / 100 ,2))) {
            return false;
        }
        
        if ($decryptStr == $sha256SourceSignString && $param["status"] === '0') {
            $data = order_paid($order, PS_PAYED);
            if($data['error'] > 0){ return false; }
            return true;
        }
        return false;
    }

}
