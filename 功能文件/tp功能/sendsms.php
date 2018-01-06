<?php
/**
 * 阿里大鱼API接口（短信接口）Thinkphp专版范例
 *
 * @author CaRE <2017-11-14 13:18:10>
 */
namespace WXAPI\Controller;
use Think\Controller;
use Alidayu\AlidayuClient as Client;
use Alidayu\Request\SmsNumSend;
use Aliyun\Core\Config;
use Aliyun\Core\Profile\DefaultProfile;
use Aliyun\Core\DefaultAcsClient;
use Aliyun\Api\Sms\Request\V20170525\SendSmsRequest;
class SendMsgController extends BaseController
{
    public function index(){
        $mobile = I('mobile');
        $a = $this->sendMsg_test($mobile,1);
        echo json_decode($a);
    }
    public function sendMsg_test($mobile){
        if(!check_mobile($mobile)){
            return -1;
        }
        $check = M("Users")->where(['userPhone'=>$mobile])->find();
        if($check){
            return -2;
        }
        $code = rand(1000,9999);
        $res = M('Send_msg')->add(['userPhone'=>$mobile,'code'=>$code,'send_time'=>time()]);
        if($res){
            return true;
        }
        
        
    }
    public function sendMsg($mobile,$username)
    {
        header("Content-type: text/html; charset=utf-8");
        require_once  './api_sdk/dysms/vendor/autoload.php';    //此处为你放置API的路径
        Config::load();             //加载区域结点配置
        $accessKeyId = '****';
        $accessKeySecret = '****';
        $templateCode = '****';   //短信模板ID
        //短信API产品名（短信产品名固定，无需修改）
        $product = "Dysmsapi";
        //短信API产品域名（接口地址固定，无需修改）
        $domain = "dysmsapi.aliyuncs.com";
        //暂时不支持多Region（目前仅支持cn-hangzhou请勿修改）
        $region = "cn-hangzhou";
        // 初始化用户Profile实例
        $profile = DefaultProfile::getProfile($region, $accessKeyId, $accessKeySecret);
        // 增加服务结点
        DefaultProfile::addEndpoint("cn-hangzhou", "cn-hangzhou", $product, $domain);
        // 初始化AcsClient用于发起请求
        $acsClient = new DefaultAcsClient($profile);
    
        // 初始化SendSmsRequest实例用于设置发送短信的参数
        $request = new SendSmsRequest();
        // 必填，设置短信接收号码
        $request->setPhoneNumbers($mobile);    //$moblie是我前台传入的电话
    
        // 必填，设置签名名称
        $request->setSignName("****");      //此处需要填写你在阿里上创建的签名
    
        // 必填，设置模板CODE
        $request->setTemplateCode("****");    //短信模板编号
        
        $smsData = array('code'=>'1234');    //所使用的模板若有变量 在这里填入变量的值  我的变量名为username此处也为username
        
        $request->setTemplateParam(json_encode($smsData));
        
        //发起访问请求
        $acsResponse = $acsClient->getAcsResponse($request);
        
        //返回请求结果
        $result = json_decode(json_encode($acsResponse), true);
        dump($result);die;
        return $result;
        
    }
}
?>