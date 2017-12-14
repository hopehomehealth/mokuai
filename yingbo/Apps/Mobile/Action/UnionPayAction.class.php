<?php
namespace Mobile\Action;
class UnionPayAction extends BaseAction{

    public function doPay(){
        vendor('UnionPayMobile.common');
        vendor('UnionPayMobile.SDKConfig');
        vendor('UnionPayMobile.secureUtil');
        vendor('UnionPayMobile.PhpLog');
        $log = new \PhpLog( SDK_LOG_FILE_PATH, "PRC", SDK_LOG_LEVEL );
        $log->LogInfo ( "============处理前台请求开始===============" );
        $orderNum='12378473843';
        $sum = 0.01*100;//一分钱
        // 初始化日志
        $params = array(
        'version' => '5.0.0',               //版本号
        'encoding' => 'utf-8',              //编码方式
        'certId' => getSignCertId (),           //证书ID
        'txnType' => '01',              //交易类型  
        'txnSubType' => '01',               //交易子类
        'bizType' => '000201',              //业务类型
        'frontUrl' =>  SDK_FRONT_NOTIFY_URL,        //前台通知地址
        'backUrl' => SDK_BACK_NOTIFY_URL,       //后台通知地址    
        'signMethod' => '01',       //签名方法
        'channelType' => '08',      //渠道类型，07-PC，08-手机
        'accessType' => '0',        //接入类型
        'merId' => '*********',      //商户代码，请改自己的商户号
        'orderId' => $orderNum,  //商户订单号
        'txnTime' => date('YmdHis'),    //订单发送时间
        'txnAmt' => $sum,       //交易金额，单位分
        'currencyCode' => '156',    //交易币种
        'defaultPayType' => '0001', //默认支付方式    
        //'orderDesc' => '订单描述',  //订单描述，网关支付和wap支付暂时不起作用
        'reqReserved' =>' 透传信息', //请求方保留域，透传字段，查询、通知、对账文件中均会原样出现
        );
        // 签名
        sign ( $params );
        // 前台请求地址
        $front_uri = SDK_FRONT_TRANS_URL;
        $log->LogInfo ( "前台请求地址为>" . $front_uri );
        // 构造 自动提交的表单
        $html_form = create_html ( $params, $front_uri );

        $log->LogInfo ( "-------前台交易自动提交表单>--begin----" );
        $log->LogInfo ( $html_form );
        $log->LogInfo ( "-------前台交易自动提交表单>--end-------" );
        $log->LogInfo ( "============处理前台请求 结束===========" );
        echo $html_form;
    }
    
        /******************************
        服务器同步通知页面方法
        其实这里就是将notify_url.php文件中的代码复制过来进行处理
        
        *******************************/
    function createNote(){
        vendor('UnionPayMobile.common');
        vendor('UnionPayMobile.SDKConfig');
        vendor('UnionPayMobile.secureUtil');
        vendor('UnionPayMobile.PhpLog');
        $log = new \PhpLog( SDK_LOG_FILE_PATH, "PRC", SDK_LOG_LEVEL );
        if (isset ( $_POST ['signature'] )) { 
            if(verify ( $_POST )){
                //验证成功，改变订单状态

            }

        } else {
            echo '签名为空';
        }
    }
     /******************************
        服务器异步通知页面方法
        其实这里就是将notify_url.php文件中的代码复制过来进行处理
        
        *******************************/
    function sureNote(){
        vendor('UnionPayMobile.common');
        vendor('UnionPayMobile.SDKConfig');
        vendor('UnionPayMobile.secureUtil');
        vendor('UnionPayMobile.PhpLog');
        $log = new \PhpLog( SDK_LOG_FILE_PATH, "PRC", SDK_LOG_LEVEL );
       foreach ( $_POST as $key => $val ) {
         P(isset($mpi_arr[$key]) ?$mpi_arr[$key] : $key);
         P($val);
       }
       if (isset ( $_POST ['signature'] )) { 
            P(verify ( $_POST ) ? '验签成功' : '验签失败');
            P($orderId = $_POST ['orderId']); //其他字段也可用类似方式获取
              //验证成功，改变订单状态  
        } else {
            echo '签名为空';
        }
    }
}
?>