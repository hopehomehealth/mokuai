<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/6/13
 * Time: 11:37
 */
namespace Home\Controller;
use Think\Controller;
class AgricultureController extends Controller {
    function index(){
        $daohang = array(
            'second'=>'农业科技部',
        );
        $this -> assign('daohang',$daohang);

        $bannerinfo = D('Banner')
            ->where("is_area='3'")
            ->select();
        $this->assign('bannerinfo',$bannerinfo);

        $userid = $_SESSION['userInfo']['userid'];
        $userinfo = D('Userdetail')
            ->where(array('userid'=>$userid))
            ->field('name,phone')
            ->find();
        $this->assign('userinfo',$userinfo);

        $info = D('Agriculture')
            ->order('ag_id desc')
            ->select();
        $this->assign('info',$info);

        $this ->display();
    }


    function gaveshen()
    {
        if ($_POST) {
            $userid = $_SESSION['userInfo']['userid'];
            $userinfo = D('Userdetail')
                ->where(array('userid'=>$userid))
                ->field('name,phone')
                ->find();

            $username = $userinfo['name'];
            $userphone = $userinfo['phone'];

            $introduce = $_POST['introduce'];
            $title = $_POST['title'];
            $arr['introduce'] = $introduce;
            $arr['username'] = $username;
            $arr['phone'] = $userphone;
            $arr['title'] = $title;
            $arr['add_time'] = time();
            if ($newid = D('Agrigave')->add($arr)) {
                $arr['id'] = $newid;
                $arr['add_time'] = date('Y-m-d H:i:s');

                echo json_encode($arr);
            }
        }
    }

    function needshen()
    {
        if ($_POST) {
            $userid = $_SESSION['userInfo']['userid'];
            $userinfo = D('Userdetail')
                ->where(array('userid'=>$userid))
                ->field('name,phone')
                ->find();

            $username = $userinfo['name'];
            $userphone = $userinfo['phone'];

            $introduce = $_POST['introduce'];
            $title = $_POST['title'];
            $arr['introduce'] = $introduce;
            $arr['username'] = $username;
            $arr['phone'] = $userphone;
            $arr['title'] = $title;
            $arr['add_time'] = time();
            if ($newid = D('Agrineed')->add($arr)) {
                $arr['id'] = $newid;
                $arr['add_time'] = date('Y-m-d H:i:s');

                echo json_encode($arr);
            }
        }
    }

    function detail(){
        $ag_id= I('get.ag_id');
        $info = D('Agriculture')
            ->where(array('ag_id'=>$ag_id))
            ->where("is_show='0'")
            ->select();
        $this->assign('info',$info);
//        dump($info);die;

        $this->display();
    }
}