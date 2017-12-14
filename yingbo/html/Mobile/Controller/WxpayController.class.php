<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/6/13
 * Time: 11:37
 */
namespace Mobile\Controller;
use Think\Controller;
class WxpayController extends Controller {
    //初始化
    public function _initialize()
    {
        //引入WxPayPubHelper
       Vendor('Wxpay.WxPayPubHelper.WxPayPubHelper');
    }
    public function js_api_call(){ 
        $daohang = array(
            'first'=>'微信支付',
        );
        $orderid = I("orderid",0);
        $pro_name = I("china",0);
        $payType = I("payType",0);
        $order = D('user_order');
        $pay = D('pay');
        $payconfig = $pay ->where("type = 'wxpay'")->select();
        $orderinfo = $order ->find($orderid);
        $pro_name = $pro_name? $pro_name : "评估建议收费金额";
        $config =array();
        $config['appid'] = $payconfig[0]['appid'];
        $config['mchid'] = $payconfig[0]['partnerid'];
        $config['key'] = $payconfig[0]['paysignkey'];
        $config['appsecret'] = $payconfig[0]['appsecret'];
        /*$config['sslcert_path'] = 'http://lehu.ew9t.cn/ThinkPHP/Library/Vendor/Wxpay/WxPayPubHelper/cacert/apiclient_cert.pem';
        $config['sslkey_path'] = 'http://lehu.ew9t.cn/ThinkPHP/Library/Vendor/Wxpay/WxPayPubHelper/cacert/apiclient_key.pem';*/
        $config['js_api_call_url'] = SITE_URL.'index.php/Mobile/Wxpay/js_api_call';
        $config['notify_url'] = SITE_URL.'index.php/Mobile/Wxpay/notify_url';
        $jsApi =new \JsApi_pub($config);
        //=========步骤1：网页授权获取用户openid============
        //通过code获得openid
        if(!isset($_GET['code']))
        {
        //触发微信返回code码
        $url = $jsApi->JS_API_CALL_URL."?orderid={$orderid}&china={$pro_name}";
        $url =$jsApi->createOauthUrlForCode($url);
        Header("Location: $url");
        }else{
        //获取code码，以获取openid
        $code =$_GET['code'];//echo $code;
        $jsApi->setCode($code);
        $openid =$jsApi->getOpenId();
        }
        //=========步骤2：使用统一支付接口，获取prepay_id============
        //使用统一支付接口
        $unifiedOrder =new \UnifiedOrder_pub($config);
        $unifiedOrder->setParameter("openid","{$openid}");//openid
        $unifiedOrder->setParameter("body","$pro_name");//商品描述
        //自定义订单号，此处仅作举例
        //$timeStamp =(string)time();
        //$out_trade_no =$jsApi->APPID."{$timeStamp}";
        $unifiedOrder->setParameter("out_trade_no","{$orderinfo['ordernumber']}");//商户订单号
        $total_fee = $orderinfo['ssum'] * 100;
        $unifiedOrder->setParameter("total_fee","{$total_fee}");//总金额
        //$unifiedOrder->setParameter("total_fee","1");
        $notify_url = $jsApi->NOTIFY_URL;
        $unifiedOrder->setParameter("notify_url","$notify_url");//通知地址
        $unifiedOrder->setParameter("trade_type","JSAPI");//交易类型
        $prepay_id =$unifiedOrder->getPrepayId();
        //=========步骤3：使用jsapi调起支付============
        //echo $prepay_id;
        $jsApi->setPrepayId($prepay_id);
        $jsApiParameters =$jsApi->getParameters();
        //dump($orderid);
        //dump(json_encode($orderinfo));
        //dump($jsApiParameters);
        $this->assign("orderinfo",array('ordernumber'=>$orderinfo['ordernumber'],'ssum'=>$total_fee/100));
        $this->assign('daohang',$daohang);
        $this->assign('return_url',$notify_url."/orderid/".$orderid);
        $this->assign("jsApiParameters",$jsApiParameters);
        $this->display('zhifu');
    }
    function notify_url(){
        /*//$orderid = I("orderid",0);
        
        exit;
        Vendor('Wxpay.WxPayPubHelper.WxPayPubHelper');
        $notify = new \Notify_pub();
        $xml = $GLOBALS['HTTP_ROW_POST_DATA'];
        $notify -> saveData($xml);
        if($notify ->checkSign() == FALSE){
            $notify -> setReturnParameter("return_code","FAIL");//返回状态码
            $notify -> setReturnParameter("return_msg","签名失败");//返回信息
        }else{
            $notify ->setReturnParameter("return_code","SUCCESS");//设置返回码
        }
        $returnXml = $notify ->returnXml();
         //==商户根据实际情况设置相应的处理流程，此处仅作举例=======
        
        //以log文件形式记录回调信息
 //         $log_ = new Log_();
        $log_name= SITE_URL."index.php/Public/notify_url.log";//log文件路径
        
        log_result($log_name,"【接收到的notify通知】:\n".$xml."\n");
        //下面商户根据实际情况设置相应处理流程
        $parameter = $notify ->xmlToArray($xml);
        if($notify ->checkSign() == TRUE){
            if($notify ->data['return_code'] == "FAIL"){
                //此处应该更新一下订单状态商户自行增删操作
                //通信出错设为无效订单
                log_result($log_name,"【通信出错】:\n".$xml."\n");
                //echo 'error';
            }else if($notify ->data['result_code'] == "FAIL"){
                //此处应该更新一下订单状态商户自行增删操作
                //通信出错设为无效订单
                log_result($log_name,"【业务出错】:\n".$xml."\n");
                //echo 'error';
            }else{
                    //没有处理成功，微信会间隔的发送请求*/
                    $order =D('user_order');
                    $orderinfo = $order->find($_GET['orderid']);
                    if(empty($orderinfo['shopid'])){
                        $data['if_say'] = 1;
                        $data['if_pay'] = 1;
                        $order->where("orderid = {$orderinfo['orderid']}")->save($data);
                        D('user_assess')->where("userid = {$orderinfo['auserid']}")->setInc('money',$orderinfo['psum']);
                        //log_result($log_name,"【支付成功】:\n".$xml."\n");
                        echo 'SUCCESS';
                        $this->redirect('Patient/seelist',array('orderid'=>$orderinfo['orderid']));
                        //echo 'error';
                    }else{
                        //订单状态
                        $data['if_say'] = 1;
                        //var_dump($rows);
                        D('user_order')->where("orderid = {$orderinfo['orderid']}")->save($data);
                        echo 'SUCCESS';
                        $this->redirect('Patient/orderinfo',array('orderid'=>$orderinfo['orderid']));
                        //print_r($rows);
                        //log_result($log_name,"【支付成功】:\n".$xml."\n");
                        //echo 'error';
                    }
         /*       }
                
            }*/
        }
    }
    /*private function process($parameter){
        //此处应该更新一下订单的状态，商户自行增删操作
        返回的数据最少有以下几个
         $parameter = array(
          'out_trade_no' =>xxx,//商户订单号
          'total_fee' => xxx,//支付金额
          'openid' => xxx,//付款的用户id
          );
         
        var_dump($parameter);exit;
        return true;
    }*/
