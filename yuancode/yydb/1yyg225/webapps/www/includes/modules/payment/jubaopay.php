<?php
if (!defined('App'))
{
    die('Hacking attempt');
}
include_once(AppDir . 'function/payment.php');
require_once AppDir . 'includes/modules/payment/jubaopay/jubaopay.php';
$payment_lang = AppDir . 'includes/languages/payment/jubaopay.php';

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
    $modules[$i]['desc']    = 'jubaopay_desc';

    /* 是否支持货到付款 */
    $modules[$i]['is_cod']  = '0';

    /* 是否支持在线支付 */
    $modules[$i]['is_online']  = '1';

    /* 支付费用 */
    $modules[$i]['pay_fee'] = '0';

    /* 作者 */
    $modules[$i]['author']  = '聚宝付';

    /* 网址 */
    $modules[$i]['website'] = 'http://www.jubaopay.com/index.html';

    /* 版本号 */
    $modules[$i]['version'] = '1.0';

    /* 配置信息 */
    $modules[$i]['config'] = array(
        array('name' => 'appid', 'type' => 'text', 'value' => ''),
        array('name' => 'psw', 'type' => 'text', 'value' => '')
    );

    return;
}

/**
 * 类
 */
class jubaopay
{
    /**
     * 构造函数
     *
     * @access  public
     * @param
     *
     * @return void
     */
    function jubaopay()
    {




    }

    function __construct()
    {
        $payment = get_payment('jubaopay');
        $this->appid = $payment['appid'];
        $this->jubaopay();
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

        $partnerid=$this->appid;
        $url = IS_APP ==1 ? '/api/welcome/respond' : '/welcome/respond';
        $returnURL=url($url);    // 可在商户后台设置
        $callBackURL=url($url).'?code=jubaopay';  // 可在商户后台设置
        //商户利用支付订单（payid）和商户号（mobile）进行对账查询
        $jubaopay=new jbpay(AppDir . 'includes/modules/payment/jubaopay/jubaopay.ini');
        $jubaopay->setEncrypt("payid", $order_no);
        $jubaopay->setEncrypt("partnerid", $partnerid);
        $jubaopay->setEncrypt("amount", $order['order_amount']);
        $jubaopay->setEncrypt("payerName", $order['order_sn']);
        $jubaopay->setEncrypt("remark", '');
        $jubaopay->setEncrypt("returnURL", $returnURL);
        $jubaopay->setEncrypt("callBackURL", $callBackURL);
        $jubaopay->setEncrypt("goodsName", '充值'.$order['order_sn']);
        $jubaopay->interpret();
        $message = $jubaopay->message;
        $signature = $jubaopay->signature;
        if(IS_APP ==1){
            $result = array();
            $result['posturl'] = 'http://www.jubaopay.com/apiwapsyt.htm';
            $result['message'] = $message;
            $result['signature'] = $signature;
            $result['order_sn'] = $order['order_sn'];
            $result['log_id'] = $order['log_id'];
        }else{
            $form_url = IS_MOBILE ? 'http://www.jubaopay.com/apiwapsyt.htm' : 'http://www.jubaopay.com/apipay.htm';
            $result = '<form method="post" action="'.$form_url.'" id="payForm">
            <input type="hidden" name="message" value="'.$message.'"/>
            <input type="hidden" name="signature" value="'.$signature.'"/>
            <input type="submit" value="立即支付"/>
        </form>';
        }

        return $result;
    }

    /**
     * 响应操作
     */
    function respond()
    {
        $message=$_REQUEST["message"];
        $signature=$_REQUEST["signature"];

        $jubaopay=new jbpay(AppDir . 'includes/modules/payment/jubaopay/jubaopay.ini');

        $jubaopay->decrypt($message);
        // 校验签名，然后进行业务处理
        $result=$jubaopay->verify($signature);
        if($result==1) {
            $log_id = explode('_',$jubaopay->getEncrypt("payid"));
            $log_id = $log_id[1];
            $data = order_paid($log_id, 2);
            if($data['error'] > 0){ return false; }
            // 得到解密的结果后，进行业务处理
            // echo "mobile=".$jubaopay->getEncrypt("mobile")."<br />";
            // echo "amount=".$jubaopay->getEncrypt("amount")."<br />";
            // echo "remark=".$jubaopay->getEncrypt("remark")."<br />";
            // echo "orderNo=".$jubaopay->getEncrypt("orderNo")."<br />";
            // echo "state=".$jubaopay->getEncrypt("state")."<br />";
            // echo "partnerid=".$jubaopay->getEncrypt("partnerid")."<br />";
            // echo "modifyTime=".$jubaopay->getEncrypt("modifyTime")."<br />";
            return true;
        } else {
            return false;
        }

    }

}
?>