<?php
namespace Common\Common;
use Think\Controller;
class HomeController extends Controller
{
    function __construct()
    {
        parent::__construct();
        $controller = CONTROLLER_NAME;
        $requesturi = $_SERVER['REQUEST_URI'];
        preg_match('/^\/index.php\/(.*?)\//',$_SERVER['REQUEST_URI'],$result);
        if($this->isMobile()){
            if($result[1] == 'Home'){
                $requesturi = preg_replace('/^\/index.php\/(.*?)\//','/index.php/Wap/',$requesturi);
                header("location:http://".$_SERVER['HTTP_HOST'].$requesturi);exit;
            }
        }else{
            if($result[1] == 'Wap'){
                $requesturi = preg_replace('/^\/index.php\/(.*?)\//','/index.php/Home/',$requesturi);
                header("location:http://".$_SERVER['HTTP_HOST'].$requesturi);exit;
            }
        }
        switch($controller){
            case 'Index':
                $catid = 0;
                break;
            case 'Technology':
                $catid = 1;
                break;
            case 'News':
                $catid = 5;
                break;
            case 'Develop':
                $catid = 8;
                break;
            case 'Exhibition':
                $catid = 13;
                break;
            case 'Communicate':
                $catid = 18;
                break;
            default:
                $catid = '';
                break;
        }
        if($catid === ''){
        }else{
            if($catid == 0){
                $limit = 6;
            }else{
                $limit = 1;
            }
            $slides = M('slide')->where("is_show = '0' AND cat_id = {$catid}")->order("sort,upd_time desc")->limit($limit)->select();
            $this->assign('slides',$slides);
        }
        $sysconfig = sysconfig();
        $this->assign('sysconfig',$sysconfig);
    }
    public function _empty() {
      R('Empty/_empty');
    }
    protected function wxshare($title,$desc,$link,$imgurl){
        //分享到微信或qq
        vendor("Wxshare.JSSDK");
        try{
            $sysconf = sysconfig('base');
            $jssdk = new \JSSDK("{$sysconf['appid']}", "{$sysconf['appsecret']}");
            $signPackage = $jssdk->GetSignPackage();
        }catch(Exception $e){
            echo $e->getMessage();
        }
        $shareData = array();//分享的数据
        $shareData['title']  = $title;
        $shareData['desc']  =  $desc;
        $shareData['link']  =  $link;
        $shareData['imgUrl']  = $imgurl;
        $this->assign('signPackage',json_encode($signPackage));//签名数据
        $this->assign('shareData',json_encode($shareData));
    } 
    protected function upload($folder,$file){
        $upload=new \Think\Upload();
        $upload->exts=array("jpg","gif","png","jpeg");
        $upload->saveName  =     array('uniqid','');
        $upload->rootPath="./Public/";
        $upload->savePath="Upl/{$folder}/";
        $info=$upload->uploadOne($file);
        return $info['savepath'].$info['savename'];
    }
    protected function isMobile()
    { 
        // 如果有HTTP_X_WAP_PROFILE则一定是移动设备
        if (isset ($_SERVER['HTTP_X_WAP_PROFILE']))
        {
            return true;
        } 
        // 如果via信息含有wap则一定是移动设备,部分服务商会屏蔽该信息
        if (isset ($_SERVER['HTTP_VIA']))
        { 
            // 找不到为flase,否则为true
            if(stristr($_SERVER['HTTP_VIA'], "wap")){
                return true;
            }
        } 
        $useragents = array('ios','ipod','iphone','android','ipad');
        if (preg_match("/(" . implode('|', $useragents) . ")/i", strtolower($_SERVER['HTTP_USER_AGENT'])))
        {
            return true;
        } 
        return false;
    } 
}
