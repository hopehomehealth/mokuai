<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/6/13
 * Time: 11:37
 */
namespace Home\Controller;
use Common\Common\ComController;
class ZucheController extends ComController {
    function showlist(){
        $daohang = array(
            'second'=>'0元购房',
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
            $size= I('post.size');
            $building = $_POST['building'];
            $address = $_POST['address'];
            $type = I('post.type');

            $arr['size'] = $size;
            $arr['building'] = $building;
            $arr['type'] = $type;
            $arr['address'] = $address;
            $arr['add_time'] = time();
            $arr['upd_time'] = time();
            if ($newid = D('House')->add($arr)) {
                $arr['house_id'] = $newid;
                $arr['add_time'] = date('Y-m-d H:i:s');
                $arr['upd_time'] = date('Y-m-d H:i:s');

                echo json_encode($arr);
            }
        }
    }
}