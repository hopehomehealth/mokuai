<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/8/9 0009
 * Time: 11:35
 */

namespace Admin\Controller;
use Common\Common\AdminController;

class RankController extends AdminController
{
    //自定义等级列表
    function showlist(){
    	$rank_model = M('rank');
    	$ranklist = $rank_model->select();
    	$this->assign('ranklist',$ranklist);
        $this->display();
    }
    //添加修改
    function tianjia(){
    	if(IS_POST){
    		$rank_model = M('rank');
    		//添加操作
    		$_POST['score'] = intval($_POST['score']);
    		if(empty($_POST['id'])){
    			unset($_POST['id']);
    			$path = $this->upload();
    			if($path){
    				$_POST['rank_img'] = '/Public/'.$path;
    			}
    			if($data=$rank_model->create()){
    				if($rank_model->add()){
    					$this->success('添加成功');
    					exit;
    				}
    			}
    			$this->error("添加失败");
    		}else{
    			//修改操作
    			$path = $this->upload();
    			if($path){
    				$_POST['rank_img'] = '/Public/'.$path;
    			}
    			//dump($_POST);exit;
    			if($rank_model->create()){
    				if($rank_model->save()){
    					$this->success('修改成功');
    					exit;
    				}
    			}
    			$this->error("修改失败");
    		}
    	}
    }
    //删除
    function del(){
    	$id = $_GET['id'];
    	$rank_model = M('rank');
    	if($rank_model -> where("id = {$id}") -> delete()){
    		$this->success('删除成功');
    		exit;
    	}
    	$this->error('删除失败');
    }
    private function upload(){
        $upload=new \Think\Upload();
        $upload->exts=array("jpg","gif","png","jpeg");
        $upload->rootPath="./Public/";
        $upload->savePath="Upl/rankimg/";
        $info=$upload->uploadOne($_FILES['rank_img']);
        //dump($info);exit;
        return $info['savepath'].$info['savename'];
    }
}