<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/6/13
 * Time: 11:37
 */
namespace Home\Controller;
use Common\Common\ComController;
class CaidetailController extends ComController {
    function detail(){
$id = I('get.id');
        $info = D('Caidetail')
        ->where(array('id' =>$id))
            ->find();
        $this->assign('info',$info);
        $this ->display();
    }
	function cailist() {
		if($_GET['type'] == 1){
			$daohang = array(
				'second'=>'办卡专区',
			);
		}elseif($_GET['type'] == 2){
			$daohang = array(
				'second'=>'精养卡实战',
			);
		}elseif($_GET['type'] == 3){
			$daohang = array(
				'second'=>'小贷中心',
			);
		}elseif($_GET['type'] == 4){
			$daohang = array(
				'second'=>'金融技术街',
			);
		}elseif($_GET['type'] == 5){
			$daohang = array(
				'second'=>'大数据营销',
			);
		}

		$cailist = D('Caidetail')->where("type = {$_GET['type']}")->select();
		$this->assign('cailist',$cailist);
		$this->assign('daohang',$daohang);
		$this->display("list");
	}
	function checklogin() {
		if(!isset($_SESSION['flag'])){
			echo 'error';
		}else{
			echo 'success';
		}
	}
}