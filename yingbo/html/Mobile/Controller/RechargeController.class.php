<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/6/13
 * Time: 11:37
 */
namespace Mobile\Controller;
use Think\Controller;
class RechargeController extends Controller {
    private $preorder = array();
    private $token;
    private $wecha_id;
    private $alipayConfig;
    private $from;
    private $pro_name;
    private $setting;
    public function _initialize()
    {
        unset($_GET['_URL_']);
        $config = array();
        $config['SP_NO']      = '';
        $config['SP_KEY']     = '';
        $config['RETURN_URL'] = SITE_URL."index.php/Mobile/Recharge/return_url";
        $config['PAGE_URL']   = SITE_URL."index.php/Mobile/Recharge/page_url";
        $config['BFB_QUERY_RETRY_TIME']   = 3;
        $config['BFB_INTERFACE_ENCODING'] = 1;
        $data   = D('pay')->where("type = 'baidu'")->select();
        //var_dump($data);exit;
        if($data) {
            $config['SP_NO']      = $data[0]['bpartnerid'];
            $config['SP_KEY']     = $data[0]['bpaysignkey'];
        }
        $this->setting = $config;
        //引入WxPayPubHelper
       Vendor('Wxpay.WxPayPubHelper.WxPayPubHelper');
    }
    public function js_api_call(){ 
        $daohang = array(
            'first'=>'微信支付',
        );
        $rc_id = I('rc_id',0);
        $recharge = D('user_recharge')->find($rc_id);
        $data = $recharge;
        $data['desc'] = '账户充值'; 
        /*$patient = D('user_patient');
        $patientinfo = $patient ->find($data['userid']);*/
        /*$data['pre_money'] = $patientinfo['money'];
        if(!isset($_SESSION['preorder'])){
             $_SESSION['preorder'] = $data;
        } */
        $pay = D('pay');
        $payconfig = $pay ->where("type = 'wxpay'")->select();
        $config =array();
        $config['appid'] = $payconfig[0]['appid'];
        $config['mchid'] = $payconfig[0]['partnerid'];
        $config['key'] = $payconfig[0]['paysignkey'];
        $config['appsecret'] = $payconfig[0]['appsecret'];
        /*$config['sslcert_path'] = 'http://lehu.ew9t.cn/ThinkPHP/Library/Vendor/Wxpay/WxPayPubHelper/cacert/apiclient_cert.pem';
        $config['sslkey_path'] = 'http://lehu.ew9t.cn/ThinkPHP/Library/Vendor/Wxpay/WxPayPubHelper/cacert/apiclient_key.pem';*/
        $config['js_api_call_url'] = SITE_URL.'index.php/Mobile/Recharge/js_api_call';
        $config['notify_url'] = SITE_URL.'index.php/Mobile/Recharge/notify_url';
        $jsApi =new \JsApi_pub($config);
        //=========步骤1：网页授权获取用户openid============
        //通过code获得openid
        if(!isset($_GET['code']))
        {
        //触发微信返回code码
        /*$url =$jsApi->createOauthUrlForCode(\WxPayConf_pub::JS_API_CALL_URL.'?userid='.$data['userid'].'&amount='.$data['amount'].'&rc_no='.$data['rc_no']);*/
        $url = $jsApi->JS_API_CALL_URL."?rc_id={$rc_id}";
        $url =$jsApi->createOauthUrlForCode($url);
        Header("Location: $url");
        }else{
        //获取code码，以获取openid
        $code =$_GET['code'];
        $jsApi->setCode($code);
        $openid =$jsApi->getOpenId();
        }
        //dump($data);
        //=========步骤2：使用统一支付接口，获取prepay_id============
        //使用统一支付接口
        $unifiedOrder =new \UnifiedOrder_pub($config);
        $unifiedOrder->setParameter("openid","{$openid}");//openid
        $unifiedOrder->setParameter("body",$data['desc']);//商品描述
        //自定义订单号，此处仅作举例
        //$timeStamp =(string)time();
        //var_dump($this->preorder);exit;
        //$out_trade_no =\WxPayConf_pub::APPID."{$timeStamp}";
        $unifiedOrder->setParameter("out_trade_no",$data['rc_no']);//商户订单号
        $total_fee = $data['amount'] * 100;
        $unifiedOrder->setParameter("total_fee","$total_fee");//总金额
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
        //$return_url = "http://lehu.ew9t.cn/index.php/Mobile/Patient/userindex";
        $this->assign('daohang',$daohang);
        $this->assign('orderinfo',array('ordernumber'=>$data['rc_no'],'ssum'=>$total_fee/100));
        $this->assign("return_url",$notify_url."/rc_id/".$rc_id);
        $this->assign("jsApiParameters",$jsApiParameters);
        $this->display('zhifu');
    }
    function notify_url(){
        //$orderid = I("orderid",0);
       /* Vendor('Wxpay.WxPayPubHelper.WxPayPubHelper');
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
        $log_name= "http://lehu.ew9t.cn/index.php/Public/notify_url.log";//log文件路径
        
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
                    $recharge = D('user_recharge');
                    $patient = D('user_patient');
                    $rc_id = $_GET['rc_id'];
                    $rcinfo = $recharge->find($rc_id);
                    $data = $rcinfo;
                    if($recharge ->where("rc_no = '{$data['rc_no']}'")->setField('status',1)){
                        $money['money'] = $data['money'];
                        $patient ->where("userid = {$data['userid']}")->save($money);
                    }
                    
                    /*log_result($log_name,"【支付成功】:\n".$xml."\n");*/
                    echo 'SUCCESS';
                    $this ->redirect("Patient/userindex");
             /*   }
                
            }*/
        }
        public function pay(){
        
            $rc_id = I("rc_id",0);
            $data = D('user_recharge')->find($rc_id);
            $this->token = I("token",0);
            parse_str(urldecode($_SERVER['QUERY_STRING']), $_GET);
            if(isset($_GET['extra'])){
                $this->token = $_GET['extra'];
            }else{
                $this->token = md5(rand(0,999).time());
            }
            $data['desc'] = iconv("UTF-8", "GBK", urldecode("账户充值"));
            $params = array (
                'order_no'          => $data['rc_no'],      //订单号
                'order_create_time' => date("YmdHis",$data['inputtime']),
                'goods_name'        => "{$data['desc']}",          //品名
                'total_amount'      => $data['amount'] * 100,       //总计
                'extra'             => $this->token
            );
            $baidu = new \Model\PayModel();
            $baidu->config($this->setting);
            $order_url = $baidu->create_order($params);
            //echo $order_url;exit;
            if($order_url) echo "<script>window.location=\"" . $order_url . "\";</script>";
            else die('Error');
        }

        public function return_url(){

            parse_str(urldecode($_SERVER['QUERY_STRING']), $_GET);

            $baidu = new \Model\PayModel();
            $baidu->config($this->setting);

            //fwrite(fopen("./Lib/Action/Wap/get.txt", "w"), print_r($get, true));
            //fwrite(fopen("./Lib/Action/Wap/server.txt", "w"), print_r($_SERVER, true));

            //检查非法请求
            if(!$baidu->check_sign($_GET)) die('非法请求');

            $order_no = $_GET['order_no'];  //订单号
            $rows     = $baidu->check_order($order_no);

            if(!$rows) {
                /*fwrite(fopen('error.log', 'a'), $baidu->err_msg . "\n");*/
                exit;
            }

            //支付成功
            if($rows['pay_result'] == 1) {

                //订单状态
                $recharge = D('user_recharge');
                $order = $recharge ->where("rc_no = '{$order_no}'")->select();
                
                $data = $order[0];
                if($recharge->where("rc_no = '{$order_no}'")->setField('status',1)){
                    $money['money'] = $data['money'];
                    D('user_patient')->where("userid = {$data['userid']}")->save($money);
                } 
                //print_r($rows);

            }

            //向百付宝发起回执
            $baidu->notify();
        }

        public function page_url(){
            $baidu = new \Model\PayModel();
            $baidu->config($this->setting);
            //检查非法请求
            $_error = iconv('utf-8', 'gbk', '非法请求');
            if(!$baidu->check_sign($_GET)) die($_error);

            $order_no = $_GET['order_no'];  //订单号

            $orderinfo = D('user_recharge')->where("rc_no = '{$order_no}'")->select();
            if($orderinfo){
                $this ->redirect("Patient/userindex");
            }
            //下面去查订单表状态，成功还是失败

            /*$_str = iconv( 'gbk', 'utf-8','支付成功！<br />订单号：' . $order_no);
            echo "<div style='text-align:center;font-size:16px;'>".$_str."</div>";*/
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
