<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/6/13
 * Time: 11:37
 */
namespace Admin\Controller;
use Common\Common\AdminController;
class AssessController extends AdminController
{
    //商品列表
    function index()
    {
        $assess = D('user_assess');
        if($_POST['keywords']){
            $search = $_POST['keywords'];
        }else if($_GET){
            $search = $_GET['keywords'];
        }else{
            $search = '';
        }
        $map['username'] = array(LIKE,"%{$search}%");
        $count = $assess ->where($map)-> count();
        $p = new \Think\Page($count,10);
        $assessList = $assess->where($map)->order('inputtime desc')->limit($p->firstRow.','.$p->listRows) -> select();
        $page = $p -> show();
        $first = $_GET['p'] ?$_GET['p'] : '1';
        $this ->assign('firstno',($first-1)*10+1);
        //$user = D('user')->select();
        //dump($user);
        //dump($assessList);exit;
        $this ->assign('page',$page);
        $this -> assign('assessList',$assessList);
        $this->display();
    }
    function confirm(){
        $user = D("user");
        $assess = D("user_assess");
        $userid = $_GET['userid'];
        $data['status'] = 1; 
        if($user -> where("userid = {$userid}")->save($data)){
            if($assess ->where("userid = {$userid}")->save($data)){
                $this ->success("认证成功");
            }   
        }
    }
    function cancel(){
        $user = D("user");
        $assess = D("user_assess");
        $userid = $_GET['userid'];
        $data['status'] = 0; 
        if($user -> where("userid = {$userid}")->save($data)){
            if($assess ->where("userid = {$userid}")->save($data)){
                $this ->success("成功取消认证");
            }   
        }
    }
    function upd(){
        $userid = $_GET['userid'];
        $assess = D('user_assess');
        if($_POST){
            if(isset($_POST['province_id']) && !empty($_POST['province_id'])){
                if((isset($_POST['city_id']) && empty($_POST['city_id'])) || (isset($_POST['country_id']) && empty($_POST['country_id']))){
                    unset($_POST['province_id']);
                    unset($_POST['city_id']);
                    unset($_POST['country_id']);
                    unset($_POST['city']);
                }
            }else{
                unset($_POST['province_id']);
                unset($_POST['city_id']);
                unset($_POST['country_id']);
                unset($_POST['city']);
            }
            //dump($_POST);exit;
            $path = $this->upload();
            if($path){
                if(file_exists("./Public/".$_POST['oldphoto'])){
                    unlink("./Public/".$_POST['oldphoto']);
                }
                $_POST['photo'] = $path;
            }
            if($assess ->create()){
                if($assess ->save()){
                    D('user')->where("userid = {$_POST['userid']}")->setField('user',$_POST['username']);
                    $this ->success("操作成功");
                    exit;
                }
            }
        }
        $provincelist = D('province')->field('id,name')->where("upid = 1")->select();
        $this ->assign('provincelist',$provincelist);
        $assessinfo = $assess ->find($userid);
        $this->assign('assessinfo',$assessinfo);
        $this->display();
    }
    /*function delassess(){
        $assess = D('user_assess');
        $assessList = $assess ->select();
        dump($assessList);
        $assess-> where("userid = {$_GET['userid']}")->delete();
    }
    function delnurse(){
        $nurse = D('user_nurse');
        $nurseList = $nurse ->select();
        dump($nurseList);
        $nurse-> where("userid = {$_GET['userid']}")->delete();
    }*/
    function upload(){
        $upload=new \Think\Upload();
        $upload->exts=array("jpg","gif","png","jpeg");
        $upload->rootPath="./Public/";
        $upload->savePath="Upl/userimg/";
        $info=$upload->uploadOne($_FILES['photo']);
        return $info['savepath'].$info['savename'];
    }
}