<?php
if (!defined('App'))
{
    die('Hacking attempt');
}

include_once(AppDir . 'function/payment.php');
$payment_lang = AppDir . 'includes/languages/payment/teegon.php';

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
    $modules[$i]['desc']    = 'teegon_desc';

    /* 是否支持货到付款 */
    $modules[$i]['is_cod']  = '0';

    /* 是否支持在线支付 */
    $modules[$i]['is_online']  = '1';

    /* 支付费用 */
    $modules[$i]['pay_fee'] = '1%';

    /* 作者 */
    $modules[$i]['author']  = '天工';

    /* 网址 */
    $modules[$i]['website'] = 'https://charging.teegon.com/';

    /* 版本号 */
    $modules[$i]['version'] = '1.0';

    /* 配置信息 */
    $modules[$i]['config'] = array(
        array('name' => 'TEE_CLIENT_ID', 'type' => 'text', 'value' => ''),
        array('name' => 'TEE_CLIENT_SECRET', 'type' => 'text', 'value' => '')
    );

    return;
}

include('teegon/config.php');
include('teegon/teegon.php');
class teegon{
    /**
     * 生成支付代码
     * @param   array   $order      订单信息
     * @param   array   $payment    支付方式信息
     */
    function get_code($order,$payment){
        if($order['payment_type'] == 'alipay' || $order['payment_type'] == 'wxpay' || $order['payment_type'] == 'alipay_wap' || $order['payment_type'] == 'wxpay_jsapi'){
            $type = $order['payment_type'];
        }else{
            $type = 'alipay';
        }

        if($type == 'wxpay_jsapi'){
            $sys_protocal= isset($_SERVER['SERVER_PORT']) && $_SERVER['SERVER_PORT'] == '443'? 'https://': 'http://';
            $host = $sys_protocal.$_SERVER['HTTP_HOST'];
            $param['order_no'] = substr(md5(time().print_r($_SERVER,1)), 0, 24);
            //插入订单号
            insert_order_sn($order[log_id], $param['order_no']);
            $param['channel'] = $type;
            $param['amount'] = $order['order_amount'];
            $param['subject'] = '充值'.$order['order_sn'];
            $param['metadata'] = "$order[log_id]:$payment[TEE_CLIENT_SECRET]:teegon";
            $form = "
            <script src='https://teegon.com/jslib/t-charging.min.js'></script>
            <form id='form'>
            	<input type='hidden' name='order_no' value='$param[order_no]'>
                <input type='hidden' name='channel' value='$param[channel]'>
                <input type='hidden' name='amount' value='$param[amount]'>
                <input type='hidden' name='subject' value='$param[subject]'>
                <input type='hidden' name='metadata' value='$param[metadata]'>
            </form>
            <input type='submit' class='pb' channel='wxpay_jsapi' value='支付'></br>
            <script>
                $('.pb').click(function(e){
                    $.ajax({
                        url:'$host/teegon/ajaxPay',
                        data: $('#form').serialize(),
                        type:'post',
                    }).done(tee.charge);
                });
            </script>
            ";
            return $form;
        }else{
            $param['order_no'] = substr(md5(time().print_r($_SERVER,1)), 0, 24);
            //插入订单号
            insert_order_sn($order[log_id], $param['order_no']);
            $param['channel'] = $type;
            $param['return_url'] = return_url(basename(__FILE__, '.php'));
            $param['amount'] = $order['order_amount'];
            $param['subject'] = '充值'.$order['order_sn'];
            $param['metadata'] = "$order[log_id]:$payment[TEE_CLIENT_SECRET]:teegon";
            $param['notify_url'] = return_url(basename(__FILE__, '.php'));

            if(!empty($_SERVER["HTTP_CLIENT_IP"])){
                $param['client_ip'] = $_SERVER["HTTP_CLIENT_IP"];
            } elseif(!empty($_SERVER["HTTP_X_FORWARDED_FOR"])){
                $param['client_ip'] = $_SERVER["HTTP_X_FORWARDED_FOR"];
            } elseif(!empty($_SERVER["REMOTE_ADDR"])){
                $param['client_ip'] = $_SERVER["REMOTE_ADDR"];
            } else{
                $param['client_ip'] = "ip无法获取！";
            }

            $param['client_id'] = $payment['TEE_CLIENT_ID'];

            $teegon = new TeegonService(TEE_API_URL);
            $sign = $teegon->sign($param,$payment);
            $param['sign'] = $sign;

            $form_url = TEE_API_URL."charge/pay";
            $form = "
            <form action='$form_url' method='post'>
                <input type='hidden' name='order_no' value='$param[order_no]'>
                <input type='hidden' name='channel' value='$param[channel]'>
                <input type='hidden' name='amount' value='$param[amount]'>
                <input type='hidden' name='subject' value='$param[subject]'>
                <input type='hidden' name='metadata' value='$param[metadata]'>
                <input type='hidden' name='client_ip' value='$param[client_ip]'>
                <input type='hidden' name='return_url' value='$param[return_url]'>
                <input type='hidden' name='notify_url' value='$param[notify_url]'>
                <input type='hidden' name='sign' value='$param[sign]'>
                <input type='hidden' name='client_id' value='$param[client_id]'>
                <input type='submit' value='支付'></br>
            </form>
            ";
            return $form;
        }
    }

    /**
     * 响应操作
     */
    function respond(){
        $data = explode(':',$_REQUEST['metadata']);
        define('TEE_CLIENT_SECRET',$data[1]);
        $teegon = new TeegonService(TEE_API_URL);
        $s = $teegon->verify_return();
        if($s['status'] == 0){
            $log_id = $data[0];
            order_paid($log_id, 2);
            return true;
        } else{
            return false;
        }
    }
}