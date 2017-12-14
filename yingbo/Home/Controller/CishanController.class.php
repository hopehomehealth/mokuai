<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/6/13
 * Time: 11:37
 */
namespace Home\Controller;
use Think\Controller;
class CishanController extends Controller {
    function index(){
        $daohang = array(
            'second'=>'慈善基金',
        );
        $this -> assign('daohang',$daohang);

        $userid = $_SESSION['userInfo']['userid'];
        $userinfo = D('Userdetail')
            ->where(array('userid'=>$userid))
            ->field('name,phone')
            ->find();
        $this->assign('userinfo',$userinfo);
//       dump($userinfo);die;
        $zong = D('Cimoney')
            ->where("status = '1'")->sum('money');
        $this->assign('zong',$zong);
//        dump($zong);die;
        $count = D('Cimoney')
            ->where("status = '1'")->count();
        $this->assign('count',$count);
//        dump($count);die;
        $zizhu = D('Cishan')
            ->where("is_zizhu = '0'")->sum('zizhu');
        $this->assign('zizhu',$zizhu);
//        dump($zizhu);die;
        $cishaninfo = D('Cishan')
            ->where("is_show = '0'")->select();
        $this->assign('cishaninfo',$cishaninfo);
//dump(cishaninfo);die;

        $this ->display();
    }

    function fund(){
        $cishaninfo = D('Cishan')
            ->field('big_logo')
            ->where("is_show='0'")
            ->select();
        $this->assign('cishaninfo',$cishaninfo);



       $xinxi = M();
        $info = $xinxi -> query("select hc_booking.customer,hc_cimoney.money,hc_booking.taketime,hc_haoche.goods_name from hc_booking LEFT JOIN  hc_cimoney ON hc_booking.customer=hc_cimoney.username INNER JOIN hc_haoche ON hc_booking.goods_id=hc_haoche.goods_id where hc_booking.is_takecar='1' AND hc_cimoney.status='1'");
//        dump($info);die;
        $this->assign('info',$info);

//        dump($bookinfo);die;
        $this->display();
    }

    function juanzeng()
    {
		if(!isset($_SESSION['flag'])){
			$this->ajaxReturn(array(
				'error'=>1,
				'content'=>'请先登录'
			));
		}else{
			$userid = $_SESSION['userInfo']['userid'];
		}
        if ($_POST) {
            $username = $_POST['username'];
            $money = $_POST['money'];
            $arr['money'] = $money;
            $arr['username'] = $username;
			$arr['userid'] = $userid;
			$arr['serial_no'] = 'F'.time().rand(10,99);
            $arr['add_time'] = time();


            if ($newid = D('cimoney')->add($arr)) {

                $this->ajaxReturn(array(
					'error'=>0,
					'content'=>$newid
				));
            }
        }
    }

    function apply(){
        $userid = $_SESSION['userInfo']['userid'];
        $userinfo = D('Userdetail')
            ->where(array('userid'=>$userid))
            ->field('name,phone')
            ->find();
        $this->assign('userinfo',$userinfo);
        $this->display();
    }

    function shenqing()
    {
        if ($_POST) {
//            dump($_POST['username']);
            $username = $_POST['username'];
            $userphone = $_POST['userphone'];
//            dump($userphone);die;
            $introduce = $_POST['introduce'];
            $address = $_POST['address'];
            $arr['introduce'] = $introduce;
            $arr['username'] = $username;
            $arr['userphone'] = $userphone;
            $arr['address'] = $address;
            $arr['add_time'] = time();
			//var_dump($_POST);exit;
            if ($newid = D('Cishan')->add($arr)) {


                echo json_encode($arr);
            }
        }
    }
}