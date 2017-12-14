<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/8/9 0009
 * Time: 11:35
 */

namespace Home\Controller;
use Think\Controller;
class ZengController extends Controller
{
    function showlist()
    {
        $daohang = array(
            'second'=>"1P管理",
            'third'=>"<a class='head_back2'>&nbsp;</a>",
        );
        $this -> assign('daohang',$daohang);

        $userid = $_SESSION['userInfo']['userid'];

        $zenginfo = D('Zeng')->where("is_del='0' AND userid=$userid")
            ->order('add_time desc')
            ->select();
        $this->assign('zenginfo',$zenginfo);

        $this->display();
    }

    function tianjia(){
        $daohang = array(
            'second'=>"1P商品添加",
            'third'=>"<a class='head_back2'>&nbsp;</a>",
        );
        $this -> assign('daohang',$daohang);
        $userid = $_SESSION['userInfo']['userid'];
        if(IS_POST){
            //dump($_POST);exit;
            if(count($_POST['way']) == 2){
                $_POST['way'] = '3';
            }else{
                $_POST['way'] = $_POST['way'][0];
            }
            $c = D('Zeng');
            $shuju = $c->create();
            $shuju['userid'] = $userid;
            $shuju['add_time'] = time();
            $shuju['upd_time'] = time();
            $cfg = array(
                'rootPath'    =>  './Public/Upd/zeng/', //保存根路径
            );
            $up = new \Think\Upload($cfg);
            $z = $up -> uploadOne($_FILES['pic']);

            //把上传的图片"路径名"保存到数据库中
            $picname = $up->rootPath.$z['savepath'].$z['savename'];
            $shuju['pic'] = $picname;
            if($c->add($shuju)){
                $this -> redirect('showlist');
            }else{
                $this -> redirect('tianjia');
            }
        }else{
            $this -> display();
        }
    }
    

    function upd(){
        $daohang = array(
            'second'=>"1P商品编辑",
            'third'=>"<a class='head_back2'>&nbsp;</a>",
        );
        $this -> assign('daohang',$daohang);
        $zeng_id = I('get.zeng_id');
        $userid = $_SESSION['userInfo']['userid'];
        $cat = D('Zeng');
        if(IS_POST){
            //dump($_POST);exit;
            if(count($_POST['way']) == 2){
                $_POST['way'] = '3';
            }else{
                $_POST['way'] = $_POST['way'][0];
            }
            $shuju = $cat -> create();
            $shuju['upd_time'] = time();
            $shuju['userid'] = $userid;
            if($_FILES['pic']['error']===0) {
                if (!empty($shuju['zeng_id'])) {
                    $oldinfo = D('Zeng')->find($shuju['zeng_id']);
                    if (!empty($oldinfo['pic'])) {
                        unlink($oldinfo['pic']);
                    }
                }

                $cfg = array(
                    'rootPath'    =>  './Public/Upd/zeng/', //保存根路径
                );
                $up = new \Think\Upload($cfg);
                $z = $up -> uploadOne($_FILES['pic']);

                //把上传的图片"路径名"保存到数据库中
                $picname = $up->rootPath.$z['savepath'].$z['savename'];
                $shuju['pic'] = $picname;
            }
            if($cat->save($shuju)){
                $this -> redirect('showlist');
            }else{
                $this -> redirect('upd',array('zeng_id'=>$zeng_id),1);
            }
        }else{
            $info = $cat->find($zeng_id);

            $this -> assign('info',$info);
            $this -> display();
        }
    }

    function del(){
        $zeng_id = I('get.zeng_id');
        $sql="update hc_zeng set is_del='1' where zeng_id=$zeng_id";
        if(D('Zeng')->execute($sql)){
            $this->redirect('showlist');
        }else{
            $this->redirect('showlist');
        }
    }
}