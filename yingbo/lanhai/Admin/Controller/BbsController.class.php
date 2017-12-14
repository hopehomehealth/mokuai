<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/8/9 0009
 * Time: 11:35
 */

namespace Admin\Controller;
use Common\Common\AdminController;

class BbsController extends AdminController
{
    //论坛基本设置
    function base(){
    	$bbs_model = M('bbs');
    	$bbsset = $bbs_model -> find();
    	if($bbsset){
    		if(IS_POST){
                $_POST['id'] = $bbsset['id'];
    			if($bbs_model->create()){
    				$bbs_model->save();
    				$this->success('设置成功');
    			}else{
    				$this->error('系统繁忙请稍后再试');
    			}
    		}else{
    			$this->assign('bbsset',$bbsset);
    			$this->display();
    		}
    	}else{
    		$bbs_model -> add(array('id'=>1));
    		$this->redirect('Bbs/base');
    	}
    }
}