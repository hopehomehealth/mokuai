<?php
    require_once 'Core.php';
    require_once 'Net.php';
    require_once AppDir . 'includes/modules/payment/ipaynow/utils/Log.php';

    if(function_exists("date_default_timezone_set")){
        date_default_timezone_set(Config::$timezone);
    }
    /**
     * 
     * @author Jupiter
     * 接口服务类
     * 
     * 用于处理通知以及查询等请求
     */
    class Services{
        /**
         * 查询处理方法
         * @param array $req
         * @param array $para
         * @return string
         */
        public static function queryOrder(Array $req,Array &$para){
            //组合报文
            $req_str=self::buildReq($req);
            payLog::outLog("订单查询(商户->中怡同创)", $req_str);
            //推送给中小开发者支付系统
            $resp_str=Net::sendMessage($req_str, Config::$query_url);
            payLog::outLog("订单查询(商户->中怡同创)", $resp_str);
            //验证签名
            return self::verifyResponse($resp_str, $para);
        }
        
        public static function buildReq(Array $req){
            return Core::createLinkString($req, false, true);
        }
        
        public static function verifySignature($para){
            $respSignature=$para[Config::SIGNATURE_KEY];
            $filteredReq=Core::paraFilter($para);
            $signature=Core::buildSignature($filteredReq);
            if ($respSignature!=""&&$respSignature==$signature) {
                return TRUE;
            }else {
                return FALSE;
            }
        }
        
        public static function buildSignature(Array $para){
            $filteredReq=Core::paraFilter($para);
            return Core::buildSignature($filteredReq);
        }
        
        public static function verifyResponse($resp_str,&$resp){
            if ($resp_str!="") {
                parse_str($resp_str,$para);
                
                $signIsValid=self::verifySignature($para);
                $resp=$para;
                if ($signIsValid) {
                    return TRUE;
                }else{
                    return FALSE;
                }
            }
        }
    }