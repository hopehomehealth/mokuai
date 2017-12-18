<?php

require_once '../conf/Config.php';
require_once '../services/Services.php';
/**
 * Created by PhpStorm.
 * User: JupiterY
 * Date: 2015/8/13
 * Time: 21:50
 */
class tradition_pay
{
    public function pay(){
        $req=array();
        $req["appId"]=Config::$app_id;
        $req["mhtOrderNo"]=date("YmdHis");
        $req["mhtOrderName"]="App测试Demo";
        $req["mhtOrderType"]="01";
        $req["mhtCurrencyType"]="156";
        $req["mhtOrderAmt"]="10";
        $req["mhtOrderDetail"]="App测试";
        $req["mhtOrderStartTime"]=date("YmdHis");
        $req["notifyUrl"]=Config::$notify_url;
        $req["mhtCharset"]="UTF-8";
        $req["mhtReserved"]="test";
        $req["mhtSignature"]=Services::buildSignature($req);
        $req["mhtSignType"]="MD5";
        $response=Services::buildReq($req);
        Log::outLog("传统方式支付接口响应",$response);
        echo $response;
    }
}
$pay=new tradition_pay();
$pay->pay();