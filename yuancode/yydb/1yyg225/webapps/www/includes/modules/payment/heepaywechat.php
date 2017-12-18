<?php

!defined('App') && die('Hacking attempt');

include_once(AppDir . 'function/payment.php');
$payment_lang = AppDir . 'includes/languages/payment/heepaywechat.php';

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
    $modules[$i]['desc'] = 'heepaywechat_desc';

    /* 是否支持货到付款 */
    $modules[$i]['isCod'] = '0';

    /* 是否支持在线支付 */
    $modules[$i]['is_online'] = '1';

    /* 支付费用 */
    $modules[$i]['pay_fee'] = '0';

    /* 作者 */
    $modules[$i]['author'] = '汇付宝微信支付';

    /* 网址 */
    $modules[$i]['website'] = 'https://www.heepay.com/';

    /* 版本号 */
    $modules[$i]['version'] = '1.0.0';

    /* 配置信息 */
    $modules[$i]['config'] = array(
        array('name' => 'pc_app_id', 'type' => 'text', 'value' => ''),
        array('name' => 'pc_app_key', 'type' => 'text', 'value' => ''),
        array('name' => 'wap_app_id', 'type' => 'text', 'value' => ''),
        array('name' => 'wap_app_key', 'type' => 'text', 'value' => ''),
    );

    return;
}

class heepaywechat {

    public $agentId; //商户ID
    public $signKey; //尽量不要明文赋值
    public $payUrl = 'https://pay.Heepay.com/Payment/Index.aspx'; //网银支付接口地址
    public $queryUrl = 'https://query.heepay.com/Payment/Query.aspx';
    public $wapAppId;
    public $wapAppKey;
    public $pcAppId;
    public $pcAppKey;
    
    
    public function __construct() {
        $payment = get_payment('heepaywechat');
        if (IS_APP == 1 || IS_WECHAT == 1 || IS_MOBILE == 1) {
            $this->agentId = $payment['wap_app_id'];  //商户号
            $this->signKey = $payment['wap_app_key'];  //签名密钥
        } else {
            $this->agentId = $payment['pc_app_id']; //商户号
            $this->signKey = $payment['pc_app_key']; //签名密钥
        }

        $this->wapAppId = $payment['wap_app_id'];
        $this->wapAppKey = $payment['wap_app_key'];
        $this->pcAppId = $payment['pc_app_id'];
        $this->pcAppKey = $payment['pc_app_key'];

        $this->returnUrl = url(IS_APP == 1 ? '/api/welcome/respond' : '/welcome/respond') . '?code=heepaywechat&payid=1'; //回调地址
    }

    /**
     * 生成支付代码
     * @param type $order 订单信息
     * @param type $payment 支付方式信息
     * 
     * 正式交易地址： https://pay.heepay.com/Payment/Index.aspx
     * 
     * 接入方式 POST/GET方式
     * 
     * version          必填     当前接口版本号1
     * agent_id         必填     商户编号 如1234567（汇付宝商户编号：七位整数数字）
     * agent_bill_id    必填     商户系统内部的定单号（要保证唯一）。长度最长50字符
     * agent_bill_time  必填	     提交单据的时间yyyyMMddHHmmss 如：20100225102000 该参数共计14位，当时不满14位时，在后面加0补足14位
     * pay_type         必填     20，（数据类型：int）
     * pay_amt          必填     订单总金额 不可为空，取值范围（0.01到10000000.00），单位：元，小数点后保留两位。
     * notify_url       必填     支付后返回的商户处理页面，URL参数是以http://或https://开头的完整URL地址(后台处理) 提交的url地址必须外网能访问到,否则无法通知商户。值可以为空，但不可以为null。
     * return_ur        必填     支付后返回的商户显示页面，URL参数是以http:// 或https://开头的完整URL地址(前台显示)，原则上：该参数与notify_url提交的参数不一致。值可以为空，但不可以为null。
     * user_ip          必填     用户所在客户端的真实ip其中的“.”替换为“_” 。如 127_127_12_12。因为近期我司发现用户在提交数据时，user_ip在网络层被篡改，导致签名错误，所以我们规定使用这种格式。
     * is_test          选填     是否测试，1=测试，非测试请不用传本参数(如传了此参数，则必须参加MD5的验证)
     * goods_name       必填     商品名称, 长度最长25字符，不能为空（不参加签名）
     * goods_num        选填     产品数量,长度最长20字符（不参加签名）
     * goods_note       选填     支付说明, 长度50字符（不参加签名）
     * pay_code         选填     支付类型编码 pay_type=20时，pay_code此参数值为0时，则为跳到汇付宝界面选择银行。具体编码银行见表，（数据类型：char）
     * remark           必填     商户自定义 原样返回,长度最长50字符，可以为空。（不参加签名）
     * sign             必填     MD5签名结果
     * 
     * 友情提示：以上参数最后都是小写形式的，汉字格式编码均为gb2312，
     * 如agent_bill_id=ABC123456，最好转化为agent_bill_id=abc123456；汉字格式在开发中无法确认的话建议进行url编码后再进行数据传递；.这样开发会比较顺利。
     * 
     * 参数签名顺序（必须按照此顺序组织签名）说明及示例
     * sign=md5（接口版本号=1&商户编号=xxxxxxx&商户定单号=xxxxx&订单提交时间=yyyymmddhhmmss&支付类型=xx
     * &订单金额=xx.xx&异步回调地址= http://www.xxx.com/heepay1.aspx&同步回调地址= http://www.xxx.com/heepay2.aspx
     * &用户ip=1.1.1.1&是否测试=1&商户密钥=CC08C5E3E69F4E6B85F1DC0B)
     */
    public function get_code($order, $payment) {
        //获取用户IP
        $userIp = "";
        if (isset($_SERVER['HTTP_CLIENT_IP'])) {
            $userIp = $_SERVER['HTTP_CLIENT_IP'];
        } else if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $userIp = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            $userIp = $_SERVER['REMOTE_ADDR'];
        }

        //记录支付订单号
        $order_no = $order['order_sn'] . $order['log_id'];
        insert_order_sn($order['log_id'], array('order_no'=>$order_no));

        //获取项目URL
        $version = 1;
        $agentBillId = $order_no; //订单号
        $agentBillTime = date('YmdHis', time());
        $payCode = '0'; //char型，空字符串
        $payType = 30; //微信支付代码,int型
        $payAmt = $order['order_amount'] * 1;
        $goodsName = $order['order_sn'] . $order['log_id'];
        $goodsNum = 1;
        $goodsNote = '';
        $remark = $order['order_sn'];
        $wxpayType = IS_MOBILE == 1 ? 1 : 0;
        $wxpayType = IS_WECHAT == 1 ? 2 : $wxpayType;
        //微信支付类型（扫码支付、WAP支付、公众号支付）
        if ($wxpayType == 1) { //WAP支付
            //$payType = 30; //微信支付代码,int型
            $isPhone = 1;
            $isFrame = 0;
        } else if ($wxpayType == 2) { //公众号支付
            $isPhone = 1;
            $isFrame = 1;
        }

        /** ***********创建签名************** */
        $signStr = '';
        $signStr = $signStr . 'version=' . $version;
        $signStr = $signStr . '&agent_id=' . $this->agentId;
        $signStr = $signStr . '&agent_bill_id=' . $agentBillId;
        $signStr = $signStr . '&agent_bill_time=' . $agentBillTime;
        $signStr = $signStr . '&pay_type=' . $payType;
        $signStr = $signStr . '&pay_amt=' . $payAmt;
        $signStr = $signStr . '&notify_url=' . $this->returnUrl;
        $signStr = $signStr . '&return_url=' . $this->returnUrl;  //微信支付不涉及同步返回，此处可填写任意URL，没有实际使用
        $signStr = $signStr . '&user_ip=' . $userIp;
        $signStr = $signStr . '&key=' . $this->signKey;

        $url = '';
        $url .= '<form id="heepay" method="post" name="heepay" action="' . $this->payUrl . '">';
        $url .= '<input type="hidden" name="version" value="' . $version . '" />';
        $url .= '<input type="hidden" name="agent_id" value="' . $this->agentId . '" />';
        $url .= '<input type="hidden" name="agent_bill_id" value="' . $agentBillId . '" />';
        $url .= '<input type="hidden" name="agent_bill_time" value="' . $agentBillTime . '" />';
        $url .= '<input type="hidden" name="pay_type" value="' . $payType . '" />';
        //$url .= '<input type="hidden" name="pay_code" value="' . $payCode . '" />';
        $url .= '<input type="hidden" name="pay_amt" value="' . $payAmt . '" />';
        $url .= '<input type="hidden" name="notify_url" value="' . $this->returnUrl . '" />';
        $url .= '<input type="hidden" name="return_url" value="' . $this->returnUrl . '" />';
        $url .= '<input type="hidden" name="user_ip" value="' . $userIp . '" />';
        $url .= '<input type="hidden" name="goods_name" value="' . urlencode($goodsName) . '" />';
        $url .= '<input type="hidden" name="goods_num" value="' . urlencode($goodsNum) . '" />';
        $url .= '<input type="hidden" name="goods_note" value="' . urlencode($goodsNote) . '" />';
        $url .= '<input type="hidden" name="remark" value="' . urlencode($remark) . '" />';
        $url .= '<input type="hidden" name="is_phone" value="' . $isPhone . '" />';
        $url .= '<input type="hidden" name="is_frame" value="' . $isFrame . '" />';
        $url .= '<input type="hidden" name="sign" value="' . md5($signStr) . '" />';
        $url .= '<input type="submit" value="马上支付">';
        $url .= '</form>';

        if (IS_APP == 1) {
            $result = array();
            $result['data'] = $url. '<script>document.heepay.submit();</script>';
            $result['order_sn'] = $order['order_sn'];
        } else {
            $result = $url;
        }
        
        return $result;
    }

    /**
     * 响应操作
     * 商户提供的notify_url 和return_url
     * 通知方式 GET方式
     * 
     * result         必填  支付结果，1=成功 其它为未知
     * agent_id       必填  商户编号 如1234567
     * jnet_bill_no   必填  汇付宝交易号(订单号)
     * agent_bill_id  必填  商户系统内部的定单号
     * pay_type       必填  20
     * pay_amt        必填  订单实际支付金额(注意：此金额是用户的实付金额)
     * remark         必填  商家数据包，原样返回
     * pay_message    选填  支付结果信息，支付成功时为空
     * sign           必填  MD5签名结果
     * 
     * 友情提示：在notify_url 的处理过程中必须要做发货逻辑，同时维护并校验该订单的发货状态以保证不会重复发货。
     * 返回参数当中的pay_amt是用户实际支付的金额，此金额和商户前面请求的pay_amt订单总金额有可能不一至。
     * 支付成功后，商户收到异步通知，首先验签，签名无误后确认单据状态、汇付宝单号、交易金额，都没有问题后，才可以把这笔单处理成功，反馈给我方ok；
     * 如果没有异步通知，需要商户调用查询接口，确认单据状态、汇付宝单号、交易金额，以免造成损失。
     */
    public function respond() {
        $result = $_REQUEST['result'];
        $payMessage = $_REQUEST['pay_message'];
        $jnetBillNo = $_REQUEST['jnet_bill_no'];
        $agentBillId = $_REQUEST['agent_bill_id'];
        $payType = $_REQUEST['pay_type'];
        $payAmt = $_REQUEST['pay_amt'];
        $remark = $_REQUEST['remark'];
        $returnSign = $_REQUEST['sign'];

        $order = str_replace($remark, '', $agentBillId);
        $order = trim(addslashes($order));

        /* 检查支付的金额是否相符 */
        if (!check_money($order, $payAmt)) {
            return false;
        }
        
        $signStr1 = '';
        $signStr1 = $signStr1 . 'result=' . $result;
        $signStr1 = $signStr1 . '&agent_id=' . $this->wapAppId;
        $signStr1 = $signStr1 . '&jnet_bill_no=' . $jnetBillNo;
        $signStr1 = $signStr1 . '&agent_bill_id=' . $agentBillId;
        $signStr1 = $signStr1 . '&pay_type=' . $payType;
        $signStr1 = $signStr1 . '&pay_amt=' . $payAmt;
        $signStr1 = $signStr1 . '&remark=' . $remark;
        $signStr1 = $signStr1 . '&key=' . $this->wapAppKey;

        $signStr2 = '';
        $signStr2 = $signStr2 . 'result=' . $result;
        $signStr2 = $signStr2 . '&agent_id=' . $this->pcAppId;
        $signStr2 = $signStr2 . '&jnet_bill_no=' . $jnetBillNo;
        $signStr2 = $signStr2 . '&agent_bill_id=' . $agentBillId;
        $signStr2 = $signStr2 . '&pay_type=' . $payType;
        $signStr2 = $signStr2 . '&pay_amt=' . $payAmt;
        $signStr2 = $signStr2 . '&remark=' . $remark;
        $signStr2 = $signStr2 . '&key=' . $this->pcAppKey;
        
        $sign1 = md5($signStr1);
        $sign2 = md5($signStr2);
        
        //请确保 notify.php 和 return.php 判断代码一致
        if (($sign1 == $returnSign || $sign2 == $returnSign )&& $result == 1) {   //比较MD5签名结果 是否相等 确定交易是否成功  成功返回ok 否则返回error
            $data = order_paid($order, PS_PAYED);
            if($data['error'] > 0){ return false; }
            else{
                //记录第三方订单号
                insert_order_sn($order, array('transaction_id'=>$jnetBillNo));
            }
            return true;
        }
        return false;
    }

}
