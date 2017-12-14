<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/6/13
 * Time: 11:37
 */
namespace Admin\Controller;
use Common\Common\AdminController;
class BasicController extends AdminController
{
    function baseSet()
    {
        $basic = D('basic');
        $baseSet = $basic ->field('id,name,weixin,logo,description,keyword')-> select();
        if($baseSet){
            $op = 'upd';
            $this ->assign('op',$op);
            $this ->assign('baseSet',$baseSet[0]);
        }else{
             $op = 'add';
            $this ->assign('op',$op);
            $this ->assign('baseSet','');
        }
        $this ->display();
    }
    function sysSet(){
        $basic = D('basic');
        $sysSet = $basic ->field('id,appid,appsecret,apid')-> select();
        if($sysSet){
            $op = 'upd';
            $this ->assign('op',$op);
            $this ->assign('sysSet',$sysSet[0]);
        }else{
            $op = 'add';
            $this ->assign('op',$op);
            $this ->assign('sysSet','');
        }
        $this ->display();
    }
    function add(){
        $basic = D('basic');
        if($_POST){
            foreach($_POST as $value){
                if(empty($value)){
                    $this ->error("有未填项");
                    exit;
                }
            }
//            $_POST['logo'] = $this->upload();
            if($basic ->create()){
                if($basic ->add()){
                    $this ->success("操作成功");
                }
            }else{
                $this ->error("操作失败");
            }
        }
    }
    function upd(){
        $basic = D('basic');
        if($_POST){
//            $i = 0;
//            foreach($_POST as $key =>$value){
//                $i++;
//                if($i == 4){
//                    break;
//                }else{
//                    if($_POST['old'.$key] == $value){
//                        unset($_POST[$key]);
//                    }
//                }
//            }
//            $path = $this ->upload();
//            if($path){
//                //如果上传了新图像则删除老图像
//                unlink("./Public/".$_POST['oldlogo']);
//                $_POST['logo'] = $path;
//            }
//            dump($_POST);die;
            $id = $_POST['basicid'];
            if($basic ->create()){
                if($basic ->where("id = {$id}")-> save()){
                    $this ->success("操作成功");
                }else{
                    $this ->error('操作失败');
                }
            }
        }
      
    }
//    function upload(){
//        $upload=new \Think\Upload();
//        $upload->maxSize=100000000;
//        $upload->exts=array("jpg","gif","png","jpeg");
//        $upload->rootPath="./Public/";
//        $upload->savePath="Upl/logo/";
//        $info=$upload->uploadOne($_FILES['logo']);
//        return $info['savepath'].$info['savename'];
//    }
}