<?php
namespace Common\Common;
use Think\Controller;
class ComController extends Controller
{
    function __construct()
    {
        parent::__construct();
        //检查自动登录
        if(!isset($_SESSION['flag']) && cookie('remember_key')){
        	$remember_key = cookie('remember_key');
        	$remember_model = M('remember');
        	$keyinfo = $remember_model -> where("remember_key = '{$remember_key}'") ->find();
        	if($keyinfo){
        		$userinfo = M('user')->find($keyinfo['user_id']);
        		$_SESSION['userInfo'] = $userinfo;
                $_SESSION['flag'] = md5($userinfo['user_id']);
                echo "<script>window.location.reload(true)</script>";
        	}
        }
		if(CONTROLLER_NAME == "Index"){
			if(isMobile() && (MODULE_NAME == 'Home')){
				header('location:http://'.$_SERVER['HTTP_HOST'].'/index.php/Mobile');exit;
			}
		}
		if((CONTROLLER_NAME == "Blog") || (CONTROLLER_NAME == "Tushu") || (CONTROLLER_NAME == "Posts") || (CONTROLLER_NAME == "News") || (CONTROLLER_NAME == "Blog")){
			if(ACTION_NAME == 'detail'){
				if(isMobile() && (MODULE_NAME == 'Home')){
					//dump($_SERVER);exit;
					$modurl = 'http://'.$_SERVER['HTTP_HOST'].str_replace('Home','Mobile',$_SERVER['REQUEST_URI']);
					//echo $modurl;exit;
					header('location:'.$modurl);exit;
				}
			}
		}
		if(CONTROLLER_NAME == "Posts"){
			if((ACTION_NAME == 'reply') || (ACTION_NAME == 'createpost') || (ACTION_NAME == 'collect')){
				if(!isset($_SESSION['flag'])){
                    if(IS_AJAX){
                        $this->ajaxReturn('nologin');
                    }else{
                        $this->redirect('User/login');
                    }
                }
			}
		}
		if(CONTROLLER_NAME == "User"){
			if((ACTION_NAME == 'register') || (ACTION_NAME == 'login') || (ACTION_NAME == 'otherlogin') || (ACTION_NAME == 'callback') || (ACTION_NAME == 'verifyImg') || (ACTION_NAME == 'checkcode') || (ACTION_NAME == 'checkname') || (ACTION_NAME == 'checkemail')){
				if((ACTION_NAME == 'register') || (ACTION_NAME == 'login')){
					if(isMobile() && (MODULE_NAME == 'Home')){
						header('location:http://'.$_SERVER['HTTP_HOST'].'/index.php/Mobile/User/'.ACTION_NAME);exit;
					}
				}
			}else{
				if(!isset($_SESSION['flag'])){
                    if(IS_AJAX){
                        $this->ajaxReturn('nologin');
                    }else{
                        $this->redirect('User/login');
                    }
                }
			}
		}
		if(CONTROLLER_NAME == 'Bbs' && ACTION_NAME == 'index'){
			if(isMobile()){
				header('location:http://'.$_SERVER['HTTP_HOST'].'/index.php/Mobile/Bbs/blog');exit;
			}
		}
        if(CONTROLLER_NAME == 'Blog'){
            if((ACTION_NAME == 'index') || (ACTION_NAME == 'detail') || (ACTION_NAME == 'comments') || (ACTION_NAME == 'myarticle') || (ACTION_NAME == 'myzone')){
            }else{
                if(!isset($_SESSION['flag'])){
                    if(IS_AJAX){
                        $this->ajaxReturn('nologin');
                    }else{
                        $this->redirect('User/login');
                    }
                }
            }
        }
        if(CONTROLLER_NAME == 'Famous'){
            if((ACTION_NAME == 'comment')){
                if(!isset($_SESSION['flag'])){
                    if(IS_AJAX){
                        $this->ajaxReturn('nologin');
                    }else{
                        $this->redirect('User/login');
                    }
                }
            }
        }


//截取域名
//$s = $_SERVER['QUERY_STRING'];
//dump($s);
//dump(parse_url($_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"]));
$lan_id =substr($_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"],-7,2);
      //  if(!is_numeric($lan_id)){

    //        $lan_id = substr( $lan_id,-7,2);

     //   }
// dump($lan_id);die;
$lan_id= I('get.lan_id');
        $this->assign('lan_id',$lan_id);
//栏目循环
$shouye = D('Lanmu')->where("is_show='0' AND lan_id=1")->select();
$this->assign('shouye',$shouye);

$guanyu1 = D('Lanmu')->where("is_show='0' AND lan_id=2")->select();
$this->assign('guanyu1',$guanyu1);
$guanyu2 = D('Lanmu')
	->where("(is_show = '0') AND pid=2 ")
    ->order('sort')
	->select();
     //dump($guanyu2);die;
$this->assign('guanyu2',$guanyu2);
$guanyu3 = D('Lanmu')
	->where("(is_show = '0') AND pid=2 ")
    ->order('sort')
	->limit(0,6)
	->select();
     //dump($guanyu2);die;
$this->assign('guanyu3',$guanyu3);

$toutiao1 = D('Lanmu')->where("is_show='0' AND lan_id=3")->select();
$this->assign('toutiao1',$toutiao1);

$lanhaizixun1 = D('Lanmu')->where("is_show='0' AND lan_id=4")->select();
$this->assign('lanhaizixun1',$lanhaizixun1);
$lanhaizixun2 = D('Lanmu')
    ->where("(is_show = '0') AND pid=4")
    ->order('sort')
    ->select();
     //dump($lanhaizixun);die;
$this->assign('lanhaizixun2',$lanhaizixun2);
$lanhaizixun3 = D('Lanmu')
    ->where("(is_show = '0') AND pid=4")
    ->order('sort')
	->limit(0,6)
    ->select();
     //dump($lanhaizixun);die;
$this->assign('lanhaizixun3',$lanhaizixun3);

$junminronghe1 = D('Lanmu')->where("is_show='0' AND lan_id=5")->select();
$this->assign('junminronghe1',$junminronghe1);
$junminronghe2 = D('Lanmu')
    ->where("(is_show = '0') AND pid=5")
    ->order('sort')
    ->select();
    // dump($junminronghe);die;
$this->assign('junminronghe2',$junminronghe2);

$zixunfuwu1 = D('Lanmu')->where("is_show='0' AND lan_id=6")->select();
$this->assign('zixunfuwu1',$zixunfuwu1);
$zixunfuwu2 = D('Lanmu')
    ->where("(is_show = '0') AND pid=6")
    ->order('sort')
    ->select();
    // dump($zixunfuwu);die;
$this->assign('zixunfuwu2',$zixunfuwu2);

$changqingluntan1 = D('Lanmu')->where("is_show='0' AND lan_id=7")->select();
$this->assign('changqingluntan1',$changqingluntan1);
$changqingluntan2 = D('Lanmu')
    ->where("(is_show = '0') AND pid=7")
    ->order('sort')
    ->select();
    // dump($changqingluntan);die;
$this->assign('changqingluntan2',$changqingluntan2);
$changqingluntan3 = D('Lanmu')
    ->where("(is_show = '0') AND pid=7")
    ->order('sort')
	->limit(0,4)
    ->select();
    // dump($changqingluntan);die;
$this->assign('changqingluntan3',$changqingluntan3);

$gongyi = D('Lanmu')->where("is_show='0' AND lan_id=8")->select();
$this->assign('gongyi',$gongyi);

$lanhaifabu = D('Lanmu')->where("is_show='0' AND lan_id=9")->select();
$this->assign('lanhaifabu',$lanhaifabu);

$phoneinfo = D('Sysconfig')->find();
$webphone = $phoneinfo['phone'];
$this->assign('webphone',$webphone);
    }
	//等级计算
	function transformlevel($score,$userid) {
		$rowrankinfo = M('rank')->where("score <= {$score}")->order('score desc')->limit(1)->select();
		$rankinfo = $rowrankinfo[0];
		$data['level'] = $rankinfo['rank_name'];
		$data['level_img'] = $rankinfo['rank_img'];
		M('user')->where("user_id = {$userid}")->save($data);
	}
	function qrcode($data,$filename,$picPath=false,$logo=false,$size='4',$level='L',$padding=2,$saveandprint=false){
         vendor("phpqrcode.phpqrcode");//引入工具包
         $object = new \QRcode();
         // 下面注释了把二维码图片保存到本地的代码,如果要保存图片,用$fileName替换第二个参数false

          $path = "./Public/Upl/shareqr/qrcode"; //图片输出路径
          //使用 “$path = $picPath?$picPath:SITE_PATH."\\Uploads\\Picture\\QRcode"; //图片输出路径” 的方式是有问题的。
          //如果路径不存在可以创建 mkdir($path);
         //在二维码上面添加LOGO

        if ($filename==false){
            //$filename=tempnam('','').'.png';//生成临时文件
            die('参数错误');
         }else {
             //生成二维码,保存到文件
             $filename = $path . '/' . $filename; //合成路径
         }
         $object::png($data, $filename, $level, $size, $padding);
         $QR = imagecreatefromstring(file_get_contents($filename));
         $logo = imagecreatefromstring(file_get_contents($logo));
         $QR_width = imagesx($QR);
         $QR_height = imagesy($QR);
         $logo_width = imagesx($logo);
         $logo_height = imagesy($logo);
         $logo_qr_width = $QR_width / 5;
         $scale = $logo_width / $logo_qr_width;
         $logo_qr_height = $logo_height / $scale;
         $from_width = ($QR_width - $logo_qr_width) / 2;
         imagecopyresampled($QR, $logo, $from_width, $from_width, 0, 0, $logo_qr_width,$logo_qr_height, $logo_width, $logo_height);
         if ($filename === false) {
             Header("Content-type: image/png");
             imagepng($QR);
         } else {
             if ($saveandprint === true) {
                 imagepng($QR, $filename);
                 header("Content-type: image/png");//输出到浏览器
                 imagepng($QR);
             } else {
                imagepng($QR, $filename);
             }
        }
        return str_replace('./','/',$filename); //输出时加上前面的/
    }
	//敏感词检查
	function mycheckwords($word)
	{
		$content = file_get_contents('./Home/mingan.txt');
		$arr=explode("\r\n",$content);
		$newstr = '';
		for($i=0;$i<count($arr)-1;$i++)
		{
			preg_match('/'.$arr[$i].'/',$word,$mnt);
			if(count($mnt) > 0){
				$newstr = $mnt[0];
			}
		}
		return $newstr;
	}


}
