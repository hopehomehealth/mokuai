<?php
namespace Common\Common;
use Think\Controller;
class ScomaController extends Controller
{
    function __construct()
    {

        parent::__construct();
		
		if(!isset($_SESSION['flag'])){
			if((CONTROLLER_NAME == 'User') && (ACTION_NAME == 'login')){

			}else{
				$this->redirect('Suser/login','请登录');
			}
		}

		//判断是否是微信
		if($is_weixin){
			echo "<script>alert('请在pc上打开')</script>";
		}
    }


	function is_weixin()
	{
		if ( strpos($_SERVER['HTTP_USER_AGENT'], 'MicroMessenger') !== false ) {
			return true;
		}
			return false;
	}
}
