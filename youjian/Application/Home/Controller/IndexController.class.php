<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
        $this->show('<style type="text/css">*{ padding: 0; margin: 0; } div{ padding: 4px 48px;} body{ background: #fff; font-family: "微软雅黑"; color: #333;font-size:24px} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.8em; font-size: 36px } a,a:hover{color:blue;}</style><div style="padding: 24px 48px;"> <h1>:)</h1><p>欢迎使用 <b>ThinkPHP</b>！</p><br/>版本 V{$Think.version}</div><script type="text/javascript" src="http://ad.topthink.com/Public/static/client.js"></script><thinkad id="ad_55e75dfae343f5a1"></thinkad><script type="text/javascript" src="http://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script>','utf-8');
    }

    public function test(){

    	echo 'testtttttttt';
    }

    public function testSend(){

      sendMail();
    }
   


      public function tianqi(){
        header("content-type:text/html;charset=utf-8");
    // $city = '武汉';
    $city = '哈尔滨';
    $AppKey = 'b0fa56f63ecfc8b736b845c620bb97cf';
    //1.url
    $url = 'http://v.juhe.cn/weather/index?format=2&cityname='.$city.'&key='.$AppKey;
    //2.get请求，直接进行发送请求
     // $apistr=file_get_contents($url); //获取xml内容
     $apistr = request($url,false);
     //3.处理返回值,实际这里是解析xml文档
     // $apiobj=simplexml_load_string($apistr);//解析xml代码
     // $todayobj=$apiobj->results->result[0]->date;//读取星期
     // $weatherobj=$apiobj->results->result[0]->weather;//读取天气
     // $windobj=$apiobj->results->result[0]->wind;//读取风力
     // $temobj=$apiobj->results->result[0]->temperature;//读取温度
     // $contentStr = "天津\n{$todayobj}\n天气：{$weatherobj}\n风力：{$windobj}\n温度：{$temobj}";
     // echo $contentStr;
     
     var_dump($apistr);
     $apistr = json_decode($apistr,true);
     echo "<pre>";
     var_dump($apistr);

   }


   public function getAreaByPhone(){
    header("content-type:text/html;charset=utf-8");
    // $phone = I('get.phone');
    $phone = '13354280969';
    //1.url地址
    $url = 'http://cx.shouji.360.cn/phonearea.php?number='.$phone;
    // $url = 'http://www.youdao.com/smartresult-xml/search.s?jsFlag=true&type=mobile&q='.$phone;
    //2.没有需要组合的post数据，那么直接请求
    $content = request($url,false);
    //3.处理返回值,最简单的就是先看看返回值
    //把json字符转变为一个对象
    $content = json_decode($content,true);
    echo "<pre>";
    var_dump($content);
    // dump($content);
    // echo '省份：'.$content->data->province.'<br />';
    // echo '城市：'.$content->data->city.'<br />';
    // echo '运营商：'.$content->data->sp.'<br />';
    // dump($content);
   }

}