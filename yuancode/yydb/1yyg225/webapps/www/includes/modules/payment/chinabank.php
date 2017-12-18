<?php
/**
 * 网银在线插件
 */

if (!defined('App'))die('Hacking attempt');

include_once(AppDir . 'function/payment.php');
$payment_lang = AppDir . 'includes/languages/payment/chinabank.php';

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
    $modules[$i]['desc']    = 'chinabank_desc';

    /* 是否支持货到付款 */
    $modules[$i]['is_cod']  = '0';

    /* 是否支持在线支付 */
    $modules[$i]['is_online']  = '1';

    /* 支付费用 */
    $modules[$i]['pay_fee'] = '1%';

    /* 作者 */
    $modules[$i]['author']  = 'ECSHOP TEAM';

    /* 网址 */
    $modules[$i]['website'] = 'http://www.chinabank.com.cn';

    /* 版本号 */
    $modules[$i]['version'] = '1.0.1';

    /* 配置信息 */
    $modules[$i]['config'] = array(
        array('name' => 'chinabank_account', 'type' => 'text', 'value' => ''),
        array('name' => 'chinabank_key',     'type' => 'text', 'value' => ''),
    );

    return;
}

/**
 * 类
 */
class chinabank
{
    /**
     * 构造函数
     *
     * @access  public
     * @param
     *
     * @return void
     */
    function chinabank()
    {
    }

    function __construct()
    {
        $this->chinabank();
    }

    /**
     * 生成支付代码
     * @param   array   $order      订单信息
     * @param   array   $payment    支付方式信息
     */
    function get_code($order, $payment)
    {
        //记录支付订单号
        $order_no = $order['order_sn'];
        insert_order_sn($order['log_id'], array('order_no'=>$order_no));

        $data_vid           = trim($payment['chinabank_account']);
        $data_vpaykey       = trim($payment['chinabank_key']);
        $data_orderid       = $order_no;
        $data_vamount       = $order['order_amount'];
        $data_vmoneytype    = 'CNY';
        $remark1            = $order['log_id'];
        $data_vreturnurl    = return_url(basename(__FILE__, '.php'));
        $remark2            = "[url:=".return_url(basename(__FILE__, '.php')).'&ajax]';

        //直连银行编码
        $bank               = (isset($order['bank']) && trim($order['bank'])) ? trim($order['bank']) : '';
        $pmode_id           = $bank;

        $MD5KEY =$data_vamount.$data_vmoneytype.$data_orderid.$data_vid.$data_vreturnurl.$data_vpaykey;
        //echo $MD5KEY;die;
        $MD5KEY = strtoupper(md5($MD5KEY));

        $def_url  = '<form method=post action="https://tmapi.jdpay.com/PayGate">';
        $def_url .= "<input type=HIDDEN name='v_mid' value='".$data_vid."'>";
        $def_url .= "<input type=HIDDEN name='v_oid' value='".$data_orderid."'>";
        $def_url .= "<input type=HIDDEN name='v_amount' value='".$data_vamount."'>";
        $def_url .= "<input type=HIDDEN name='v_moneytype'  value='".$data_vmoneytype."'>";
        $def_url .= "<input type=HIDDEN name='v_url'  value='".$data_vreturnurl."'>";
        $def_url .= "<input type=HIDDEN name='v_md5info' value='".$MD5KEY."'>";
        $def_url .= "<input type=HIDDEN name='pmode_id' value='".$pmode_id."'>";
        $def_url .= "<input type=HIDDEN name='remark1' value='".$remark1."'>";
        $def_url .= "<input type=HIDDEN name='remark2' value='".$remark2."'>";
        $def_url .= "<input type=submit class='payBtn' value='" .$GLOBALS['_LANG']['pay_button'].($bank ? '（银行直连）' : ''). "'>";
        $def_url .= "</form>";

        return $def_url;
    }

    /**
 * 响应操作
 */
    function respond()
    {
        $payment        = get_payment(basename(__FILE__, '.php'));

        $v_oid          = trim($_POST['v_oid']);
        $v_pmode        = trim($_POST['v_pmode']);
        $v_pstatus      = trim($_POST['v_pstatus']);
        $v_pstring      = trim($_POST['v_pstring']);
        $v_amount       = trim($_POST['v_amount']);
        $v_moneytype    = trim($_POST['v_moneytype']);
        $remark1        = trim($_POST['remark1' ]);
        $remark2        = trim($_POST['remark2' ]);
        $v_md5str       = trim($_POST['v_md5str' ]);

        /**
         * 重新计算md5的值
         */
        $key            = $payment['chinabank_key'];

        $md5string=strtoupper(md5($v_oid.$v_pstatus.$v_amount.$v_moneytype.$key));

        /* 检查秘钥是否正确 */
        if ($v_md5str==$md5string)
        {
            if ($v_pstatus == '20')
            {
                /* 改变订单状态 */
                $data = order_paid($remark1);
                if($data['error'] > 0){ return false; }
                return true;
            }
        }
        else
        {
            return false;
        }
    }
}

?>