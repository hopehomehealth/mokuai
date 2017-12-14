<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/6/13
 * Time: 11:37
 */
namespace Admin\Controller;
use Common\Common\AdminController;
class PatientController extends AdminController
{
    //商品列表
    function index()
    {
        $patient = D('user_patient');
        if($_POST['keywords']){
            $search = $_POST['keywords'];
        }else if($_GET){
            $search = $_GET['keywords'];
        }else{
            $search = '';
        }
        $map['username'] = array(LIKE,"%{$search}%");
        $count = $patient ->where($map)-> count();
        $p = new \Think\Page($count,10);
        $patientList = $patient->where($map)->order('inputtime desc')->limit($p->firstRow.','.$p->listRows) -> select();
        $page = $p -> show();
        $first = $_GET['p'] ? $_GET['p']:'1';
        $this ->assign('firstno',($first-1)*10+1);
        $this ->assign('page',$page);
        //dump($patientList);exit;
        $this -> assign('patientList',$patientList);
        $this->display();
    }
    function upd(){
        $patient = D('user_patient');
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
            if($patient->create()){
                $patient->save();
                D('user')->where("userid = {$_POST['userid']}")->setField('user',$_POST['username']);
                $this ->success("操作成功");
                exit;
            }
        }
        $userinfo = $patient ->find($_GET['userid']);
        $provincelist = D('province')->field('id,name')->where("upid = 1")->select();
        $this ->assign('provincelist',$provincelist);
        $this->assign('userinfo',$userinfo);
        $this->display();
    }
    function del(){
        /*$user = D('user');
        $user->delete();*/
        $patient = D('user_patient');
        //$patient ->where("userid = {$_GET['userid']}")->delete();
        $this->error("嘿！单反，请暂时不要执行删除操作！");
    }
}