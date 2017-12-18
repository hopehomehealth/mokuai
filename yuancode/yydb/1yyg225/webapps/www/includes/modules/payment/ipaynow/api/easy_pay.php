<?php
require_once '../services/Services.php';
/**
 * Created by PhpStorm.
 * User: JupiterY
 * Date: 2015/8/13
 * Time: 22:31
 */
class easy_pay
{
    public function pay(){
        $req=array();
        $req["paydata"]=$_POST['paydata'];
        $params=array();
        parse_str($req['paydata'],$params);
        $temp["mhtSignature"]=Services::buildSignature($params);
        $temp["mhtSignType"]="MD5";
        $response=Services::buildReq($temp);
        Log::outLog("简便形式支付接口",$response);
        echo $response;
    }
}
$pay=new easy_pay();
$pay->pay();