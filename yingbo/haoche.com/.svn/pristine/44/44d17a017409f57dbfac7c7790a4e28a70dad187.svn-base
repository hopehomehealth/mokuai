<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/6/13
 * Time: 11:37
 */
namespace Home\Controller;
use Common\Common\ComController;
class BookingController extends ComController {
    //豪车订单信息
    function booking(){
        $userid = $_SESSION['userInfo']['userid'];
        $pid = $_SESSION['userInfo']['pid'];
        $booking_model = M('booking');
        $detail_model = M('userdetail');
        $setting_model = M('setting');
        $haoche_model = M('haoche');


        $userdetail = $detail_model->find($userid);//获取会员详情表数据
		//判断用户是否为会员
		//如果不是会员
		if($_SESSION['userInfo']['is_vip'] == '0'){
			$this->ajaxReturn(array(
				'error' => 4,
				'content'=>'对不起，你不是会员'
			));
		}
        //判断会员资料是否完善，否则不能订车
        if(empty($userdetail['name'])){
            $this->ajaxReturn(array(
                        'error' => 2,
                        'content'=>'请先完善资料'
                    ));
        }
        if(empty($userdetail['city'])){
            $this->ajaxReturn(array(
                        'error' => 2,
                        'content'=>'请先完善资料'
                    ));
        }
        if(!isset($_SESSION['userInfo']['openid'])){
            $this->ajaxReturn(array(
                        'error' => 3,
                        'content'=>'请同步微信资料'
                    ));
        }

        //判断用户是否已经定过车
        $isbook = $booking_model->where("userid = {$userid}")->select();
        if($isbook){
            $this->ajaxReturn(array(
                        'error' => 1,
                        'content'=>'仅限购一部'
                    ));
        }
        //获取系统设置数据
        $set = $setting_model->select();
        $set = $set[0];
        if($_POST){
            $goodsinfo = $haoche_model->find($_POST['goods_id']);
            $_POST['attr'] = $_POST['attrcolor'];//获取商品属性
            if($_POST['paytype'] == 'on'){
                $_POST['paytype'] = '1';
            }else{
                $_POST['paytype'] = '0';
            }                                    //支付方式

            $_POST['userid'] = $userid;
            $_POST['book_sn'] = 'B'.time().rand(10,99);//订单号
            //首付比例
            if($pid == 0){
                $_POST['per_downpay'] = $set['pct_supvip'];
            }else{
                $_POST['per_downpay'] = $set['pct_vip'];
            }                                           //首付比例
            $_POST['amount'] = $goodsinfo['price'];
            $_POST['downpay'] = ($_POST['per_downpay'] * $_POST['amount'])/100;//首付金额
			//$_POST['downpay'] = 0.01;
            $_POST['score'] = ceil($_POST['amount'] - $_POST['downpay']);//所需积分数
            $_POST['inputtime'] = time();                               //订车时间
            $_POST['nikename'] = $_SESSION['userInfo']['nikename'];
            $_POST['customer'] = $userdetail['name'];   //订车客户姓名
            $_POST['phone'] = $userdetail['phone'];     //订车客户电话

            if($booking_model->create()){
                $booking_model->add();
                $this->ajaxReturn(array(
                        'error' => 0,
                        'content' =>'订车成功'
                    ));
            }else{
                $this->ajaxReturn(array(
                        'error' => 1,
                        'content' =>'订车失败'
                    ));
            }

        }
    }
    //豪车预定详细信息
    function bookinfo(){
        $daohang = array(
            'second'=>'豪车预定',
        );
        $userid = $_SESSION['userInfo']['userid'];
        $haoche_model = M('haoche');
        $booking_model = M('booking');
        $bookinfo = $booking_model->where("userid = {$userid}")->find();

        if($bookinfo){
            $haocheinfo = $haoche_model->where("goods_id = {$bookinfo['goods_id']}")->find();
            $this->assign('haocheinfo',$haocheinfo);
        }
        //dump($haocheinfo);dump($bookinfo);exit;
        $this->assign('bookinfo',$bookinfo);
        $this->assign('daohang',$daohang);
        $this->display();
    }
    //申请退款
    function aplayrefunds(){
        $userid = $_SESSION['userInfo']['userid'];
        $booking_model = M('booking');
        $detail_model = M('userdetail');
		$set = M('setting')->find();
        if($_POST){
            $allowdate = $_POST['inputtime'] + $set['refunds']*24*3600;
            $nowdate = time();
            if($nowdate < $allowdate){
                $this->ajaxReturn(array(
                        'error' => 1,
                        'content' =>'暂不能退款'
                    ));
            }
			$data['aplay_refunds'] = '1';
			$data['aplaytime'] = time();
            if($booking_model->where("userid = {$userid}")->save($data)){
                $this->ajaxReturn(array(
                        'error' => 0,
                        'content' =>'申请成功,等待处理'
                    ));
            }
        }
    }
    //取消订车
    function cancel(){
        $userid = $_SESSION['userInfo']['userid'];
        $book_id = $_GET['book_id'];
        $booking_model = M('booking');
		$bookinfo = $booking_model->find($book_id);
		if($bookinfo['is_paydown'] == '1'){
			$this->redirect("Booking/bookinfo");
		}
        if($booking_model ->where("userid = {$userid} AND book_id = {$book_id}")->delete()){
            $this->redirect("Booking/bookinfo");
        }
    }
	//上传转账截图
	function upscreen() {
			$book_model = M('booking');
			$path = $this->upload();
			if($path){
                if(file_exists("./Public/".$_POST['picscreen'])){
                    unlink("./Public/".$_POST['picscreen']);
                }
                $_POST['picscreen'] = $path;
            }
			if($book_model->create()){
				$book_model->save();
				$this->ajaxReturn(array('error'=>0));
			}
	}
	function upload(){
        $upload=new \Think\Upload();
        $upload->exts=array("jpg","gif","png","jpeg");
        $upload->rootPath="./Public/";
        $upload->savePath="Upl/payscreen/";
        $info=$upload->uploadOne($_FILES['picscreen']);
        return $info['savepath'].$info['savename'];
    }
}