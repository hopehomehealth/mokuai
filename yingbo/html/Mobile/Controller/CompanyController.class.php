<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/6/13
 * Time: 11:37
 */
namespace Mobile\Controller;
use Common\Common\FooterController;
class CompanyController extends FooterController {

     function company(){

         $daohang = array(
             'first'=>'公司介绍',
         );
         $this -> assign('daohang',$daohang);

         $aboutinfo=D('About')
           ->where('about_id=1')
            ->select();
//         dump($about);die;
       $this->assign('aboutinfo',$aboutinfo);
        $this ->display();
    }

	// 读取关键字图文消息
	function news(){
		
		$id = $_GET['id'];
		$info = M("img")->where(array("id"=>$id))->find();
		$daohang = array(
             'first'=>$info['keyword'],
         );
        $this -> assign('daohang',$daohang);

		$this->assign('info',$info);
		$this->display();
	}
}