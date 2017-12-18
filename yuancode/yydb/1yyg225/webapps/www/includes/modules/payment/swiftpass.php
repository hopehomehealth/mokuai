<?php

!defined('App') && die('Hacking attempt');

include_once(AppDir . 'function/payment.php');

require(AppDir . 'includes/modules/payment/swiftpass/Utils.class.php');
require(AppDir . 'includes/modules/payment/swiftpass/RequestHandler.class.php');
require(AppDir . 'includes/modules/payment/swiftpass/ClientResponseHandler.class.php');
require(AppDir . 'includes/modules/payment/swiftpass/PayHttpClient.class.php');

$payment_lang = AppDir . 'includes/languages/payment/swiftpass.php';

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
    $modules[$i]['desc'] = 'swiftpass_desc';

    /* 是否支持货到付款 */
    $modules[$i]['isCod'] = '0';

    /* 是否支持在线支付 */
    $modules[$i]['is_online'] = '1';

    /* 支付费用 */
    $modules[$i]['pay_fee'] = '0';

    /* 作者 */
    $modules[$i]['author'] = '威富通网银支付';

    /* 网址 */
    $modules[$i]['website'] = 'http://www.swiftpass.cn/';

    /* 版本号 */
    $modules[$i]['version'] = '1.0.0';

    /* 配置信息 */
    $modules[$i]['config'] = array(
        array('name' => 'app_id', 'type' => 'text', 'value' => ''),
        array('name' => 'app_key', 'type' => 'text', 'value' => ''),
    );

    return;
}

class swiftpass {

    public $payUrl = 'https://pay.swiftpass.cn/pay/gateway'; //提交订单URL
    public $queryUrl = 'https://api.zwxpay.com/pay/orderquery'; //查询订单URL
    public $refundUrl = 'https://api.zwxpay.com/secapi/pay/refund'; //退款URL
    public $queryRefundUrl = 'https://api.zwxpay.com/pay/refundquery'; //查询退款URL
    public $mchId = ''; //商户ID
    public $key = ''; //尽量不要明文赋值
    public $returnUrl;

    public function __construct() {
        $payment = get_payment('swiftpass');
        //商户号
        $this->mchId = $payment['app_id'];
        //签名密钥
        $this->key = $payment['app_key'];
        $this->returnUrl = url('/welcome/respond') . '?code=swiftpass'; //回调地址
    }

    /**
     * 生成支付代码
     * @param type $order 订单信息
     * @param type $payment 支付方式信息
     * 
     */
    public function get_code($order, $payment) {
        //记录支付订单号
        $order_no = $order['order_sn'] . $order['log_id'];
        insert_order_sn($order['log_id'], array('order_no'=>$order_no));

        $userIp = '';
        if (isset($_SERVER['HTTP_CLIENT_IP'])) {
            $userIp = $_SERVER['HTTP_CLIENT_IP'];
        } else if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $userIp = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            $userIp = $_SERVER['REMOTE_ADDR'];
        }
        if (!preg_match('/^((?:(?:25[0-5]|2[0-4]\d|((1\d{2})|([1-9]?\d)))\.){3}(?:25[0-5]|2[0-4]\d|((1\d{2})|([1-9]?\d))))$/', $userIp)) {
            $userIp = '127.0.0.1';
        }

        $fee = number_format($order['order_amount'], 2, '.', '') * 100;
        $resHandler = new ClientResponseHandler();
        $reqHandler = new RequestHandler();
        $pay = new PayHttpClient();

        $reqHandler->setKey($this->key);
        $reqHandler->setParameter('mch_id', $this->mchId);                                 //必填项，商户号，由梓微兴分配
        $reqHandler->setParameter('out_trade_no', $order_no); //商户订单号
        $reqHandler->setParameter('body', $order['order_sn']);         //商品描述：
        $reqHandler->setParameter('attach', $order['order_sn']);                           //附加信息 
        if (IS_WECHAT) {
            $reqHandler->setParameter('sub_openid', cookie('openid'));                           //附加信息      
        }
        $reqHandler->setParameter('total_fee', $fee); //总金额    单位：分
        $reqHandler->setParameter('mch_create_ip', $userIp);                             //终端IP
        //$reqHandler->setParameter('time_start', $this->mchId);   //订单生成时间
        //$reqHandler->setParameter('time_expire', $this->mchId);  //订单超时时间

        $reqHandler->setParameter('nonce_str', mt_rand(time(), time() + rand())); //随机字符串，必填项，不长于 32 位
        $reqHandler->setParameter('notify_url', $this->returnUrl);               //回调通知
        $reqHandler->setParameter('callback_url', url('/welcome/respond/') . $order['log_id']);               //回调通知
        ##APP支付
        if (IS_APP == 1) {
            return $reqHandler->getAllParameters();
        }
        /*
          trade.weixin.jspay 公众号支付
          trade.weixin.native 原生扫码支付
          trade.weixin.wappay 手机浏览器支付 h5支付
          trade.alipay.native 支付宝扫码支付
          trade.alipay.micropay
         */
        $tradeType = IS_WECHAT == 1 ? 'pay.weixin.jspay' : 'pay.weixin.native' /* ( IS_MOBILE == 1 ? 'trade.weixin.wappay' : 'trade.weixin.native') */;

        $reqHandler->setParameter('service', $tradeType);
        $reqHandler->createSign();

        $data = Utils::toXml($reqHandler->getAllParameters());

        $pay->setReqContent($this->payUrl, $data);
        if ($pay->call()) {
            $resHandler->setContent($pay->getResContent());
            $resHandler->setKey($reqHandler->getKey());

            if ($resHandler->isTenpaySign()) {
                //当return_code 和result_code都为SUCCESS的时，才返回支付二维码，其它结果请查看接口文档
                if ($resHandler->getParameter('status') == 0 && $resHandler->getParameter('result_code') == 0) {
                    if (IS_WECHAT == 1) {
                        //sysdebug($pay->getResContent());
                        $button = '<form id="frmSubmit" method="get" name="frmSubmit" action="https://pay.swiftpass.cn/pay/jspay">';
                        $button .= '<input type="hidden" name="token_id" value="' . $resHandler->getParameter('token_id') . '">';
                        $button .= '<input type="hidden" name="showwxtitle" value="1">';
                        $button .= '<input type="submit" value="立即使用微信支付">';
                        $button .= '</form>';
                        /* } elseif (IS_MOBILE == 1 ) {
                          $url .= '<form id="frmSubmit" method="post" name="frmSubmit" action="' . $resHandler->getParameter('prepay_url') . '">';
                          $url .= '<input type="submit" value="马上支付">';
                          $url .= '</form>';
                         */
                    } else {
                        $button = '<form action="/welcome/weixin_qrcode" method="post">' . "\n";
                        $button .= '<input type="hidden" name="url" value="' . $resHandler->getParameter('code_url') . '" />' . "\n";
                        $button .= '<input type="hidden" name="log_id" value="' . $order['log_id'] . '" />' . "\n";
                        $button .= '<input type="hidden" name="money" value="' . $order['order_amount'] . '" />' . "\n";
                        $button .= '<input type="submit" value="立即使用微信支付"/>' . "\n";
                        $button .= '</form>' . "\n";
                    }
                    return $button;
                } else {
                    $code = $resHandler->getParameter('err_code');
                    $msg = $resHandler->getParameter('err_msg');
                }
            } else {
                $code = $resHandler->getParameter('status');
                $msg = $resHandler->getParameter('message');
            }
        } else {
            $code = $pay->getResponseCode();
            $msg = $pay->getErrInfo();
        }
        return $code . '<br>' . $msg;
    }

    /**
     * 响应操作
     */
    public function respond() {
        $resHandler = new ClientResponseHandler();
        $xml = file_get_contents('php://input');

//        $data = Utils::parseXML($xml);
//        Utils::dataRecodes(date('Y-m-d H:i:s',time()),$data);

        $resHandler->setContent($xml);
        $resHandler->setKey($this->key);
        if ($resHandler->isTenpaySign()) {
            if ($resHandler->getParameter('status') == 0 && $resHandler->getParameter('result_code') == 0) {
                $order = str_replace($resHandler->getParameter('attach'), '', $resHandler->getParameter('out_trade_no'));
                $order = trim(addslashes($order));

                /* 检查支付的金额是否相符 */
                if (!check_money($order, $resHandler->getParameter('total_fee') / 100)) {
                    return false;
                }

                $data = order_paid($order, PS_PAYED);
                if($data['error'] > 0){ return false; }
                else{
                    //记录第三方订单号
                    insert_order_sn($order, array('transaction_id'=>$resHandler->getParameter["transaction_id"]));
                }
                return true;
            }
        }
        return false;
    }

}
