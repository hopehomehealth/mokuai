<?php
!defined('App') && die('Hacking attempt');

include_once(AppDir . 'function/payment.php');
$payment_lang = AppDir . 'includes/languages/payment/yoyipay.php';

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
    $modules[$i]['desc'] = 'yoyipay_desc';

    /* 是否支持货到付款 */
    $modules[$i]['isCod'] = '0';

    /* 是否支持在线支付 */
    $modules[$i]['is_online'] = '1';

    /* 支付费用 */
    $modules[$i]['pay_fee'] = '0';

    /* 作者 */
    $modules[$i]['author'] = '甬易支付';

    /* 网址 */
    $modules[$i]['website'] = 'http://www.yoyipay.com/';

    /* 版本号 */
    $modules[$i]['version'] = '1.0.0';

    /* 配置信息 */
    $modules[$i]['config'] = array(
        array('name' => 'app_id', 'type' => 'text', 'value' => ''),
        array('name' => 'app_key', 'type' => 'text', 'value' => ''),
        array('name' => 'app_preprocess', 'type' => 'text', 'value' => 'http://60.12.221.84:8080/pay/preprocess.do'),
        array('name' => 'app_query', 'type' => 'text', 'value' => 'http://60.12.221.84:8080/pay/orderQuery.do'),
    );

    return;
}

class yoyipay {

    public $merId;
    public $key;
    public $postUrl;
    public $respondUrl;
    public $noticeUrl;
    public $nodeAuthorizationURL;
    public $getOrderURL;

    public function __construct() {
        $payment = get_payment('yoyipay');

        $this->merId = $payment['app_id'];        //商户编号
        $this->key = $payment['app_key'];         //key
        $this->respondUrl = url('/welcome/respond') . '?code=yoyipay'; //回调地址
        $this->noticeUrl = $this->respondUrl;
        $this->nodeAuthorizationURL = $payment['app_preprocess'];
        $this->getOrderURL = $payment['app_query'];
    }

    /**
     * 生成支付代码
     * @param array $order 订单信息
     * @param array $payment 支付方式信息
     * 
     * 参数说明
     *  接口名称     interfaceName
     *  版本号       version
     *  交易数据     tranData
     *  订单签名数据 merSignMsg
     *  商户代码     merchantId

     *  商户代码        merchantId
     *  订单号          orderNo
     *  订单金额        orderAmt
     *  支付币种        curType
     *  商户返回URL     returnURL
     *  商户后台通知URL notifyURL
     *  备注字段        remark
     * @return bool
     */
    public function get_code($order, $payment) {
        //记录支付订单号
        $order_no = $order['order_sn'] . $order['log_id'];
        insert_order_sn($order['log_id'], array('order_no'=>$order_no));

        //支付通道编码 ,交易数据
        $tranData = '<?xml version="1.0" encoding="GBK"?>';
        $tranData .= '<B2CReq>';
        $tranData .= '<merchantId>' . $this->merId . '</merchantId>';    //商户编号 测试编号'M100001085';
        $tranData .= '<curType>' . Yoyi::$curType . '</curType>';
        $tranData .= '<returnURL>' . $this->respondUrl . '</returnURL>';  //商户接收支付成功页面跳转的地址
        $tranData .= '<notifyURL>' . $this->noticeUrl . '</notifyURL>';   //商户接收支付成功后台通知
        $tranData .= '<orderNo>' . $order_no . '</orderNo>'; //订单号
        $tranData .= '<orderAmt>' . ($order['order_amount'] * 1) . '</orderAmt>';         //金额
        $tranData .= '<remark>' . $order['order_sn'] . '</remark>';                       //备注
        $tranData .='</B2CReq>';

        //商家密钥  测试KEY'1234567890abcdefg';  //支付网关URL
        return Yoyi::buildPost($this->merId, $tranData, $this->key, $this->nodeAuthorizationURL);
    }

    /**
     * 响应操作
     * 
     * 参数说明：
     * 接口名称                 interfaceName
     * 版本号                   version
     * 通知结果数据             tranData
     * 甬易对通知结果的签名数据  signData
     * 
     * 商户代码                 merchantId
     * 商户订单号               orderNo
     * 支付流水号               tranSerialNo
     * 订单金额                 orderAmt
     * 支付币种                 curType
     * 返回交易成功日期时间      tranTime
     * 订单处理状态             tranStat
     * 备注字段                 remark
     */
    public function respond() {
        //$interfaceName = $_POST['interfaceName'];
        //$version = $_POST['version'];
        $tranData = $_POST['tranData'];       // 通知结果数据
        $sign = $_POST['signData'];        // 甬易对通知结果的签名数据
        //对返回的tranData做base64的解码
        $tranDataDecode = base64_decode($tranData);

        // 获得MD5-HMAC签名
        $hmac = Yoyi::hmacMd5($tranDataDecode, $this->key);

        // 对返回的数据也进行验签
        if ($hmac == $sign) {
            //对返回的XML数据进行解析
            $retXml = simplexml_load_string($tranDataDecode);
            $order = trim(addslashes(str_replace($retXml->remark, '', $retXml->orderNo)));

            //获取订单的支付状态 0/未支付; 1/已支付; 2/支付失败;
            if ($retXml->tranStat == 1) {
                $data = order_paid($order, PS_PAYED);
                if($data['error'] > 0){ return false; }
                else{
                    //记录第三方订单号
                    insert_order_sn($order, array('transaction_id'=>$retXml->tranSerialNo));
                }
                return true;
            }
        }
        return false;
    }

}

class Yoyi {

    //接口名称
    public static $interfaceName = 'PayOrder';  
    //版本
    public static $version = 'B2C1.0';            
    public static $curType = 'CNY';

    /**
     * 
     * @param type $data
     * @param type $key
     * @return type
     */
    public static function hmacMd5($data, $key) {
        // RFC 2104 HMAC implementation for php.    
        // Creates an md5 HMAC.    
        // Eliminates the need to install mhash to compute a HMAC    
        // written by shihh
        //需要配置环境支持iconv，否则中文参数不能正常处理    
        $key = iconv("GB2312", "UTF-8", $key);
        $data = iconv("GB2312", "UTF-8", $data);

        $b = 64; // byte length for md5    
        if (strlen($key) > $b) {
            $key = pack("H*", md5($key));
        }
        $key = str_pad($key, $b, chr(0x00));
        $ipad = str_pad('', $b, chr(0x36));
        $opad = str_pad('', $b, chr(0x5c));
        $k_ipad = $key ^ $ipad;
        $k_opad = $key ^ $opad;

        return md5($k_opad . pack("H*", md5($k_ipad . $data)));
    }

    /**
     * 
     * @param string $data
     * @return string
     */
    public static function getMd5($data) {
        return strtoupper(md5($data));
    }

    /**
     * 
     * @param type $data
     * @param type $key
     * @param type $merchantId
     * @return type
     */
    public static function getHmacMd5($data, $key, $merchantId) {
        $enkey = self::getMd5($key) . $merchantId;
        $enkey = self::getMd5($enkey);
        return self::hmacMd5($data, $enkey);
    }

    /**
     * 
     * @param string $merId 商户ID
     * @param string $tranData 传输数据
     * @param string $key 商户密钥
     * @param string $nodeAuthorizationURL
     * @return string
     */
    public static function buildPost($merId, $tranData, $key, $nodeAuthorizationURL) {
        // 获得MD5-HMAC签名
        $hmac = self::hmacMd5($tranData, $key);     //签名数据
        $tranDataBase64 = base64_encode($tranData);  //交易数据Base64编码

        $form = '<form id="yoyipay" name="yoyipay" action="' . $nodeAuthorizationURL . '" method="POST">';
        $form .= '<input type="hidden"  name="interfaceName"   value="' . self::$interfaceName . '">';   //接口名称
        $form .= '<input type="hidden"  name="tranData"        value="' . $tranDataBase64 . '">';       //交易数据
        $form .= '<input type="hidden"  name="version"         value="' . self::$version . '">';          //版本号
        $form .= '<input type="hidden"  name="merSignMsg"      value="' . $hmac . '">';                   //订单签名数据
        $form .= '<input type="hidden"  name="merchantId"      value="' . $merId . '">';                  //商户代码
        $form .= '<input type="submit"  value="现在支付"/>';
        $form .= '</form><script>document.yoyipay.submit();</script>';

        return $form;
    }

}
