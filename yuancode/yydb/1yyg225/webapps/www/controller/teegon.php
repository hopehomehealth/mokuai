<?php
/**
 * Created by PhpStorm.
 * User: hjr
 * Date: 2016/6/17
 * Time: 17:11
 */
require_once AppDir.'includes/modules/payment/teegon/config.php';
require_once AppDir.'includes/modules/payment/teegon/teegon.php';
class teegon extends Lowxp{

    public function ajaxPay(){
        $param['order_no'] = $_POST['order_no'];
        $param['channel'] = $_POST['channel'];
        $param['return_url'] = RootUrl . 'welcome/respond?code=teegon';
        $param['amount'] = $_POST['amount'];
        $param['subject'] = $_POST['subject'];
        $param['metadata'] = $_POST['metadata'];
        $param['notify_url'] = RootUrl . 'welcome/respond?code=teegon';
        $param['wx_openid'] = isset($_POST['wx_openid'])?$_POST['wx_openid']:'';

        $sql = "SELECT * FROM ###_payment WHERE pay_code = 'teegon'";
        $payment = $this->db->get($sql);
        $payment = unserialize_config($payment['pay_config']);

        $param['TEE_CLIENT_ID'] = $payment['TEE_CLIENT_ID'];
        $param['TEE_CLIENT_SECRET'] = $payment['TEE_CLIENT_SECRET'];
        $teegon = new TeegonService(TEE_API_URL);
        echo $teegon->pay($param,false);
        exit;
    }
}