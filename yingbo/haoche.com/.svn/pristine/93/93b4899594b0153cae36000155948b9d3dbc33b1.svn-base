<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/8/9 0009
 * Time: 11:35
 */

namespace Admin\Controller;
use Think\Controller;
class SettingController extends Controller
{
    function base(){
    	$setting = M('setting');

    	if(IS_POST){
            $_POST['id'] = $_POST['setid'];
            //dump($_POST);exit;
    		$path = $this->upload();
    		if($path){
    		   unlink("./Public/".$_POST['oldlogo']);
               $_POST['qrcode'] = $path;
    		}
    		if($setting->create()){
    			$setting->save();
                $this->success("操作成功");
                exit;
    		}else{
                $this->error("系统繁忙，请稍后重试");
                exit;
            }
    	}
    	$set = $setting -> find();
        if(!$set){
            $data['name'] = '';
            $lastid = $setting->add($data);
            $set['id'] = $lastid;
        }
    	$this->assign('set',$set);
    	$this->display();
    }
    function percent(){
    	$setting = M('setting');
    	if(IS_POST){
            $_POST['id'] = $_POST['setid'];
    		if($setting->create()){
    			$setting->save();
                $this->success("操作成功");
                exit;
    		}else{
                $this->error("系统繁忙，请稍后重试");
                exit;
            }
    	}
    }
    function setcount(){
        $setting = M('setting');
        if(IS_POST){
            $_POST['id'] = $_POST['setid'];
            if($setting->create()){
                $setting->save();
                $this->success("操作成功");
                exit;
            }else{
                $this->error("系统繁忙，请稍后重试");
                exit;
            }
        }
    }
    function weixin(){
    	$setting = M('setting');
    	if(IS_POST){
            $_POST['id'] = $_POST['setid'];
    		if($setting->create()){
    			$setting->save();
                $this->success("操作成功");
                exit;
    		}else{
                $this->error("系统繁忙，请稍后重试");
                exit;
            }
    	}
    	$set = $setting -> find();
        if(!$set){
            $data['name'] = '';
            $lastid = $setting->add($data);
            $set['id'] = $lastid;
        }
    	$this->assign('set',$set);
    	$this->display();
    }
    function upload(){
       $upload=new \Think\Upload();
       $upload->exts=array("jpg","gif","png","jpeg");
       $upload->rootPath="./Public/";
       $upload->savePath="Upl/qrcode/";
       $info=$upload->uploadOne($_FILES['qrcode']);
       return $info['savepath'].$info['savename'];
   }
}