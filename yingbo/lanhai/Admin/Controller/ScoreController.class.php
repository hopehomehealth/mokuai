<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/8/9 0009
 * Time: 11:35
 */

namespace Admin\Controller;
use Common\Common\AdminController;

class ScoreController extends AdminController
{
    //论坛积分规则列表
    function showlist(){
    	$score_model = M('score');
    	$scorelist = $score_model->select();
    	$this->assign('scorelist',$scorelist);
        $this->display();
    }
    //添加规则
    function tianjia(){
    	if(IS_POST){
    		$score_model = M('score');
    		if($score_model->create()){
    			if($score_model->add()){
    				$this->success("添加成功");
    				exit;
    			}else{
    				$this->error("添加失败");
    				exit;
    			}
    		}else{
				$this->error("添加失败");
				exit;
    		}
    	}
    	$this->display();
    }
    //修改规则
    function upd(){
    	if(IS_POST){
    		$score_model = M('score');
    		if($score_model->create()){
    			if($score_model->where("id = {$_POST['scoreid']}")->save()){
    				echo 'success';
    				exit;
    			}else{
    				echo 'error';
    				exit;
    			}
    		}else{
				echo 'error';
				exit;
    		}
    	}
    }
    //删除规则
    function del(){
    	if(IS_POST){
    		$score_model = M('score');
    		if($score_model->where("id = {$_POST['id']}")->delete()){
    			echo 'success';
    		}else{
    			echo 'error';
    		}
    	}
    }
}