<?php
include 'common/BytesUtils.php';
include 'common/ConfigUtil.php';
include 'common/DesUtils.php';
include 'common/HttpUtils.php';
include 'common/RSAUtils.php';
include 'common/SignUtil.php';
include 'common/TDESUtil.php';
include 'common/XMLUtil.php';

class Jd {
    
    /**
     * 
     * @param string $keys
     * @param string $param
     * @return type
     */
    public static function decrypt4HexStr($keys, $param) {
        if ($param != null && $param != "") {
            return TDESUtil::decrypt4HexStr($keys, $param);
        }
        return $param;
    }

    /**
     * 
     * @param string $keys
     * @param string $param
     * @return type
     */
    public static function encrypt2HexStr($keys, $param) {
        if ($param != null && $param != "") {
            return TDESUtil::encrypt2HexStr($keys, $param);
        }
        return $param;
    }
    
    /**
     * 
     * @param type $param
     * @param type $oriUrl
     * @return string
     */
    public static function buildPost($param, $oriUrl) {
        $form = '<form name="jdpay" id="jdpay" action="' . $oriUrl . '"  method="post">';
        $form .= '<input type="hidden" name="version" value="' . $param['version'] . '"/>';
        $form .= '<input type="hidden" name="merchant" value="' . $param['merchant'] . '"/>';
        $form .= '<input type="hidden" name="device" value="' . $param['device'] . '"/>';
        $form .= '<input type="hidden" name="tradeNum" value="' . $param['tradeNum'] . '"/>';
        $form .= '<input type="hidden" name="tradeName" value="' . $param['tradeName'] . '"/>';
        $form .= '<input type="hidden" name="tradeDesc" value="' . $param['tradeDesc'] . '"/>';
        $form .= '<input type="hidden" name="tradeTime" value="' . $param['tradeTime'] . '"/>';
        $form .= '<input type="hidden" name="amount" value="' . $param['amount'] . '"/>';
        $form .= '<input type="hidden" name="currency" value="' . $param['currency'] . '"/>';
        $form .= '<input type="hidden" name="note" value="' . $param['note'] . '"/>';
        $form .= '<input type="hidden" name="callbackUrl" value="' . $param['callbackUrl'] . '"/>';
        $form .= '<input type="hidden" name="notifyUrl" value="' . $param['notifyUrl'] . '"/>';
        $form .= '<input type="hidden" name="ip" value="' . $param['ip'] . '"/>';
        $form .= '<input type="hidden" name="userType" value="' . $param['userType'] . '"/>';
        $form .= '<input type="hidden" name="userId" value="' . $param['userId'] . '"/>';
        $form .= '<input type="hidden" name="expireTime" value="' . $param['expireTime'] . '"/>';
        $form .= '<input type="hidden" name="orderType" value="' . $param['orderType'] . '"/>';
        $form .= '<input type="hidden" name="industryCategoryCode" value="' . $param['industryCategoryCode'] . '"/>';
        $form .= '<input type="hidden" name="specCardNo" value="' . $param['specCardNo'] . '"/>';
        $form .= '<input type="hidden" name="specId" value="' . $param['specId'] . '"/>';
        $form .= '<input type="hidden" name="specName" value="' . $param['specName'] . '"/>';
        $form .= '<input type="hidden" name="sign" value="' . $param['sign'] . '"/>';
        $form .= '<input type="submit" value="立即支付"/></form>';

        return $form;
    }

}
