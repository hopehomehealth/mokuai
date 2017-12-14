<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/6/13
 * Time: 11:37
 */
namespace Admin\Controller;
use \Think\Controller;
class KeywordController extends Controller
{
       //列表
    function showlist(){
		$where = '';
		if($_POST['search'] != ''){
			$where = " keyword like "."'%$_POST[search]%'";
		}
        $list = M('keyword')->where($where)->select();
		var_dump($list);exit;
		$this->assign('list',$list);
        $this->display();
    }


    //添加
    function tianjia(){
        $this->display();
    } 
	//未定义时回复
	function tianjia_n(){
        $this->display();
    }

	//添加数据
	function insert(){
		$description = $_POST['description'];
		$key = $_POST['key'];
		$insert = M('keyword')->add(array('keyword'=>$key,'descs'=>$description));
		if($insert){
			echo 1;
		}else{
			echo 0;
		}
	}

//添加数据
	function insert_n(){
		$description = $_POST['description'];
		$type = 3;
		$info = M('keyword')->where(array('type'=>3))->find();
		if(!$info){
			$insert = M('keyword')->add(array('descs'=>$description,'type'=>$type));
			if($insert){
				echo 1;
			}else{
				echo 0;
			}
		}else{
			echo 2;
		}
	}

    //修改
    function upd(){
		$keyword = D('keyword');
		if(IS_POST){
			$info = $keyword->where(array('id'=>$_POST['news_id']))->save($_POST);
			//echo $keyword->getlastsql();exit;
			if($info){
				$this->success('编辑成功',U('index'));
			}else{
				$this->error('系统繁忙，请稍后操作！',U('del',array('id'=>$_POST['news_id'])),1);
			}
		}else{
			
			$news_id = I('get.id');
			$info = $keyword->find($news_id);
			$this->assign('info',$info);
			$this->assign("type",$info['type']);
			$this->display();
		}
    }

    function del(){
        $news_id = I('get.id');
//        $info = D('News')->find($news_id);
//        unlink($info['news_id']);

       if(D('keyword')->delete($news_id)){
           $this->success('删除成功',U('index'));
       }else{
           $this->error('系统繁忙，请稍后操作！',U('del',array('id'=>$news_id)),1);
       }
    }


	//关注时回复
	function guanzhu(){
		if(IS_POST){
			$content = $_POST['content'];
			$guanzhu = M('key_n')->find();
			if($guanzhu){
				$insert = M('key_n')->where(array('id'=>$guanzhu['id']))->save(array('content'=>$content));
			}else{
				$insert =M("key_n")->add(array('content'=>$content,'time'=>date('Y-m-d H:i:s')));
			}
			if($insert){
				 $this->success('编辑成功',U('guanzhu'));
			}else{
				$this->success('系统繁忙，请稍后操作！',U('guanzhu'));
			}
		}else{
			$guanzhu = M('key_n')->find();
			$this->assign('guanzhu',$guanzhu);
			$this->display();
		}
	}
}