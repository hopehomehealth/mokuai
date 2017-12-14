<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/8/9 0009
 * Time: 11:35
 */

namespace Admin\Controller;
use Common\Common\AdminController;

class BoardsController extends AdminController
{
    function showlist(){
    	$boards_model = M('boards');
    	$boards = $boards_model
    			->field("board_id,board_title,board_desc,pid,sort,concat(path,'/',sort) as newpath")
    	        ->order("newpath")
    	        ->select();
    	foreach($boards as $key=>$value){
    		$count = substr_count($value['newpath'],'/') - 1;
    		if($value['pid'] == 0){
    		}else{
    			$boards[$key]['board_title'] = "<span style='color:#ccc;font-size:1.3em'>├──".str_repeat('──',$count)."</span>".$value['board_title'];
    		}
    	}
        $this->assign('boards',$boards);
        $this->display();
    }
    function tianjia(){
    	$boards_model = M('boards');
    	if(IS_POST){

    		if($_POST['pid'] == 0){
    			$_POST['path'] = '';
                $boardinfo = $boards_model -> where("pid = 0") -> order('sort desc') -> limit(1) -> select();
                if($boardinfo){
                    $_POST['sort'] = $boardinfo[0]['sort'] + 1;
                }else{
                    $_POST['sort'] = 0;
                }

    		}else{
                $board = $boards_model->find($_POST['pid']);
                $boardinfo = $boards_model->where("pid = {$_POST['pid']}")->order('sort desc')->limit(1)->select();
                if($boardinfo){
                    $_POST['sort'] = $boardinfo[0]['sort'] + 1;
                }
    			$_POST['path'] = $boards['path'].'/'.$board['sort'];
    		}
            $path = $this->upload();
            if($path){
                $_POST['board_img'] = '/Public/'.$path;
            }
    		if($boards_model->create()){
    			$boards_model->add();
    			$this->redirect("Boards/showlist","添加成功");
    			exit;
    		}
    	}
    	$boards = $boards_model
    			->field("board_id,board_title,board_desc,pid,concat(path,'/',sort) as newpath")
    			->order("newpath")
    	        ->select();
    	foreach($boards as $key=>$value){
    		$count = substr_count($value['newpath'],'/') - 1;
    		$boards[$key]['board_title'] = str_repeat('--',$count).$value['board_title'];
    	}
    	//dump($boards);exit;
    	$this->assign("boards",$boards);
    	$this->display();
    }
    function upd(){
    	$board_id = $_GET['board_id'];
    	$boards_model = M('boards');
    	if(IS_POST){
			//dump($_POST);exit;
    		$path = $this->upload();
            if($path){
                if(file_exists('.'.$_POST['oldimg'])){
                    unlink('.'.$_POST['oldimg']);
                }
                $_POST['board_img'] = '/Public/'.$path;
            }



    		if($boards_model->create()){
    			$boards_model->where("board_id = {$_POST['board_id']}")->save();
    			$this->redirect("Boards/showlist","修改成功");
    			exit;
    		}
    	}
    	$boards = $boards_model
    			->field("*,concat(path,'/',sort) as newpath")
    			->order("newpath")
    	        ->select();
    	foreach($boards as $key=>$value){
    		if($value['board_id'] == $board_id){
    			$nowboard = $boards[$key];
    		}
    		$count = substr_count($value['newpath'],'/') - 1;
    		$boards[$key]['board_title'] = str_repeat('--',$count).$value['board_title'];
    	}
    	//dump($nowboard);exit;
    	$this->assign('nowboard',$nowboard);
    	$this->assign("boards",$boards);
    	$this->display();
    }
    //排序
    function sortboard(){
        if(IS_POST){
            $boards_model = M('boards');
            $boardinfo = $boards_model->find($_POST['board_id']);
            if($_POST['type'] == 'moveup'){
                $preboard = $boards_model -> where("pid = {$boardinfo['pid']} AND sort < {$boardinfo['sort']}") -> order('sort desc') ->limit(1) -> select();
                if($preboard){
                    $boards_model -> where("board_id = {$preboard[0]['board_id']}") -> setField('sort',$boardinfo['sort']);
                    $boards_model -> where("board_id = {$boardinfo['board_id']}") -> setField('sort',$preboard[0]['sort']);
                    echo 'success';
                }else{
                    echo 'error';
                }
            }else if($_POST['type'] == 'movedown'){
                $nextboard = $boards_model -> where("pid = {$boardinfo['pid']} AND sort > {$boardinfo['sort']}") -> order('sort') ->limit(1) -> select();
                if($nextboard){
                    $boards_model -> where("board_id = {$nextboard[0]['board_id']}") -> setField('sort',$boardinfo['sort']);
                    $boards_model -> where("board_id = {$boardinfo['board_id']}") -> setField('sort',$nextboard[0]['sort']);
                    echo 'success';
                }else{
                    echo 'error';
                }
            }
        }
    }
    function del(){
        $board_id = $_GET['board_id'];
        $boards_model = M('boards');
        $posts_model = M('posts');
        $boardinfo = $boards_model -> find($board_id);
        if($boardinfo['pid'] == 0){
            $count = $boards_model -> where("pid = {$board_id}") -> count();
            if($count > 0){
                $this->error('无法删除主板块,请先删除子级版块');
            }else{
                $boards_model -> where("board_id = {$board_id}") -> delete();
                $this->success('删除成功');
            }
        }else{
            $count = $posts_model -> where("board_id = {$board_id}") -> count();
            if($count > 0){
                $this->error('无法删除板块,请先删除下面的帖子');
            }else{
                $boards_model -> where("board_id = {$board_id}") -> delete();
                $this->success('删除成功');
            }
        }
    }
    private function upload(){
        $upload=new \Think\Upload();
        $upload->exts=array("jpg","gif","png","jpeg");
        $upload->rootPath="./Public/";
        $upload->savePath="Upl/boardimg/";
        $info=$upload->uploadOne($_FILES['board_img']);
        //dump($info);exit;
        return $info['savepath'].$info['savename'];
    }
}