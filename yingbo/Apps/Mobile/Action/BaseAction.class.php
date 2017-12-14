<?php
namespace Mobile\Action;
/**
 * ============================================================================
 * JHJYMall开源商城
 * 官网地址:http://www.wstmall.com 
 * 联系QQ:707563272
 * ============================================================================
 * 基础控制器
 */
use Think\Controller;
class BaseAction extends Controller {
	public function __construct(){
		parent::__construct();
		//初始化系统信息
		
	}
	
	/**
	 * 
	 */
	public function getBaseInfo(){
		
	}
	
	/**
	 * 空操作处理
	 */
    public function _empty($name){
        
    }

	/**
	 * 用户登录验证-主要用来判断会员和商家共同功能的部分
	 */
	public function isLogin(){
		if(!session('user_id')){
			$this->redirect('Users/login');
		}
   }
  
   /**
    * 检查登录状态
    */
   public function checkLoginStatus(){
   	//    $USER = session('JHJY_USER');
	   // if (empty($USER)){
	   // 	    die("{status:-999}");
	   // }else{
	   // 		die("{status:1}");
	   // }
   }
   
    /**
	 * 单个上传图片
	 */
    public function uploadPic(){
	 //   $config = array(
		//         'maxSize'       =>  0, //上传的文件大小限制 (0-不做限制)
		//         'exts'          =>  array('jpg','png','gif','jpeg'), //允许上传的文件后缀
		//         'rootPath'      =>  './Upload/', //保存根路径
		//         'driver'        =>  'LOCAL', // 文件上传驱动
		//         'subName'       =>  array('date', 'Y-m'),
		//         'savePath'      =>  I('dir','uploads')."/"
		// );
		// $upload = new \Think\Upload($config);
		// $rs = $upload->upload($_FILES);
		// if(!$rs){
		// 	$this->error($upload->getErrorMsg());
		// }else{
		// 	$images = new \Think\Image();
		// 	$images->open('./Upload/'.$rs['Filedata']['savepath'].$rs['Filedata']['savename']);
		// 	$newsavename = str_replace('.','_thumb.',$rs['Filedata']['savename']);
		// 	$vv = $images->thumb(I('width',100), I('height',100))->save('./Upload/'.$rs['Filedata']['savepath'].$newsavename);
	 //        $rs['Filedata']['savepath'] = "Upload/".$rs['Filedata']['savepath'];
		// 	$rs['Filedata']['savethumbname'] = $newsavename;
		// 	$rs['status'] = 1;
		// 	echo json_encode($rs);
		// }	
    }
	
};