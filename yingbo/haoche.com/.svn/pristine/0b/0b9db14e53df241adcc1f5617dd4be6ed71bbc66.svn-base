<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/6/13
 * Time: 11:37
 */
namespace Home\Controller;
use Common\Common\ComController;
class HouseController extends ComController {
    function showlist(){
        $daohang = array(
            'second'=>'房天下',
        );
        $this -> assign('daohang',$daohang);

        $userid = $_SESSION['userInfo']['userid'];
        $userinfo = D('Userdetail')
            ->where(array('userid'=>$userid))
            ->field('name,phone')
            ->find();
        $this->assign('userinfo',$userinfo);
//        dump($userinfo);die;

        $houseinfo = D('House')
            ->field('house_id')
            ->order('house_id desc')
            ->limit('0,1')
            ->select();
        $this->assign('houseinfo',$houseinfo);
//        dump($houseinfo);die;

        $setinfo = D('Setting')
            ->field('houseprice')
            ->select();
        $this->assign('setinfo',$setinfo);
//          dump($setinfo);die;
        $this ->display();
    }

    function fang()
    {
        if ($_POST) {
			if(!isset($_SESSION['flag'])){
				$this->ajaxReturn(array(
					'error'=>2
				));
			}else{
				$userid = $_SESSION['userInfo']['userid'];
				$houseinfo = M('house')->where("userid = {$userid}")->select();
				if($houseinfo){
					if($houseinfo[0]['pay_status'] == 1){
						$this->ajaxReturn(array(
							'error'=>1,
							'content'=>'你已经申请过了'
						));
					}else{
						$this->ajaxReturn(array(
							'error'=>0,
							'content'=> '已申请去支付',
							'house_id'=>$houseinfo[0]['house_id']
						));
					}
				}
			}
			$set = M('setting')->find();
            $size= I('post.size');
            $building = $_POST['building'];
            $address = $_POST['address'];
            $type = I('post.type');

            $arr['size'] = $size;
            $arr['building'] = $building;
            $arr['type'] = $type;
			$arr['userid'] = $userid;
            $arr['address'] = $address;
			$arr['deposit'] = $set['houseprice'];
			$arr['serial_no'] = 'H'.time().rand(10,99);
            $arr['add_time'] = time();
            $arr['upd_time'] = time();
            if ($newid = D('House')->add($arr)) {
                $arr['house_id'] = $newid;
                $arr['add_time'] = date('Y-m-d H:i:s');
                $arr['upd_time'] = date('Y-m-d H:i:s');
				$this->ajaxReturn(array(
					'error'=>0,
					'content'=>'申请成功',
					'house_id'=>$newid
				));
                //echo json_encode($arr);
            }
        }
    }
}