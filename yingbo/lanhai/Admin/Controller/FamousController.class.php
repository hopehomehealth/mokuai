<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/8/9 0009
 * Time: 11:35
 */

namespace Admin\Controller;
use Common\Common\AdminController;

class FamousController extends AdminController
{
    //名家讲坛
    function showlist(){
        if($_GET['search']){
            $map['f_name'] = array('like',"%{$_GET['search']}%");
        }
        $map['f_type'] = '1';
        $bbsset = M('bbs')->field("pg_admin")->find();//获取论坛分页设置
        $count = M('famous')->where($map)->count();
        $p = new \Think\Page($count,$bbsset['pg_admin']);
        $famous = M('famous')->where($map)->order('is_index')->limit($p->firstRow.','.$p->listRows)->select();
        $page = $p->show();
        $this->assign('famous',$famous);
        $this->assign('page',$page);
        $this->display();
    }
    //蓝海人物
    function man(){
        if($_GET['search']){
            $map['f_name'] = array('like',"%{$_GET['search']}%");
        }
        $map['f_type'] = '2';
        $bbsset = M('bbs')->field("pg_admin")->find();//获取论坛分页设置
        $count = M('famous')->where($map)->count();
        $p = new \Think\Page($count,$bbsset['pg_admin']);
        $famous = M('famous')->where($map)->order('is_index')->limit($p->firstRow.','.$p->listRows)->select();
        $page = $p->show();
        $this->assign('famous',$famous);
        $this->assign('page',$page);
        $this->display();
    }
    //添加人物
    function adduser(){
        if(IS_POST){
            $famous_model = M('famous');
            $path = $this->upload();
            if($path){
                $_POST['f_photo'] = $path;
            }
            if($famous_model->create()){
                $famous_model -> add();
                $this->success('添加成功');
                exit;
            }
            $this->error('添加失败');
            exit;
        }
        $this->display();
    }
      //编辑人物
    function upduser(){
        $famous_model = M('famous');
        if(IS_POST){
            $path = $this->upload();
            if($path && $path != '/Public/'){
                $_POST['f_photo'] = $path;
            }
            if($famous_model->create()){
                $famous_model -> save();
                $this->success('修改成功');
                exit;
            }
            $this->error('修改失败');
            exit;
        }
        $f_id = $_GET['f_id'];
        $famous = $famous_model->find($f_id);
        $this->assign('famous',$famous);
        $this->display();
    }
    //删除人物
    function doremove(){
        $famous_model = M('famous');
        if(IS_GET){
            $f_id = $_GET['f_id'];
            if($famous_model->where("f_id = {$f_id}")->delete()){
                $this->ajaxReturn(array(
                        'error'=>0,
                    ));
            }
        }
        if(IS_POST){
            $str_ids = implode(',',$_POST['f_id']);
            $map['f_id'] = array('in',$str_ids);
            if($str_ids == ''){
                $this->error('非法操作');
            }else{
                $famous_model -> where($map) ->delete();
                $this->success('批量操作成功');
            }
        }
    }
    //是否显示到首页
    function isindex(){
        $famous_model = M('famous');
        if(IS_GET){
            if($_GET['is_index'] == '0'){
                $famous_model->where("f_id = {$_GET['f_id']}")->setField("is_index",'1');
                $this->ajaxReturn(array(
                        'error'=>0,
                        'type' =>1
                    ));
            }else{
                $famous_model->where("f_id = {$_GET['f_id']}")->setField("is_index",'0');
                $this->ajaxReturn(array(
                        'error'=>0,
                        'type' =>2
                    ));
            }
        }
        if(IS_POST){
            $str_ids = implode(',',$_POST['f_id']);
            $map['f_id'] = array('in',$str_ids);
            if($str_ids == ''){
                $this->error('非法操作');
            }else{
                $famous_model -> where($map) ->setField('is_index',$_POST['optype']);
                $this->success('批量操作成功');
            }
        }
    }
    //是否设为推荐
    function istuijian(){
        $famous_model = M('famous');
        if(IS_GET){
            if($_GET['is_tuijian'] == '0'){
                $famous_model->where("f_id = {$_GET['f_id']}")->setField("is_tuijian",'1');
                $this->ajaxReturn(array(
                        'error'=>0,
                        'type' =>1
                    ));
            }else{
                $famous_model->where("f_id = {$_GET['f_id']}")->setField("is_tuijian",'0');
                $this->ajaxReturn(array(
                        'error'=>0,
                        'type' =>2
                    ));
            }
        }
        if(IS_POST){
            $str_ids = implode(',',$_POST['f_id']);
            $map['f_id'] = array('in',$str_ids);
            if($str_ids == ''){
                $this->error('非法操作');
            }else{
                $famous_model -> where($map) ->setField('is_tuijian',$_POST['optype']);
                $this->success('批量操作成功');
            }
        }
    }
    //名家言论
    function slanders(){
        if($_GET['search']){
            $map['f_name'] = array('like',"%{$_GET['search']}%");
            $map['title'] = array('like',"%{$_GET['search']}%");
            $map['_logic'] = 'OR';
        }else{
            $map = '';
        }
        $slanders_model = M('slanders');
        $bbsset = M('bbs')->field("pg_admin")->find();//获取论坛分页设置
        $count = $slanders_model-> alias('s')-> join("cq_famous as f on f.f_id = s.f_id")->where($map)->count();
        $p = new \Think\Page($count,$bbsset['pg_admin']);
        $slanders = $slanders_model
                  -> alias('s')
                  -> join("cq_famous as f on f.f_id = s.f_id")
                  -> where($map)
                  -> order("add_time desc")
                  -> limit($p->firstRow.','.$p->listRows)
                  -> select();
        $page = $p->show();
        $this->assign('page',$page);
        $this->assign('slanders',$slanders);
        $this->display();
    }
    //添加文章言论
    function addslander(){
        if(IS_POST){
            $slanders_model = M('slanders');
            $_POST['add_time'] = time();
            $famousinfo = M('famous') -> find($_POST['f_id']);
            $_POST['type'] = $famousinfo['f_type'];
            $path = $this->upload2();
            if($path){
                if(file_exists('.'.$_POST['sland_img'])){
                    unlink('.'.$_POST['sland_img']);
                    $_POST['sland_img'] = '/Public/'.$path;
                }
            }
            if($slanders_model->create()){
                $slanders_model->add();
                M('famous')->where("f_id = {$_POST['f_id']}")->setInc('f_artnums',1);
                $this->redirect("Famous/slanders");
            }
            $this->error('添加失败');
            exit;
        }
        $this->display();
    }
    //编辑文章言论
    function updslander(){
        $sland_id = $_GET['sland_id'];
        $slanders_model = M('slanders');
        if(IS_POST){
            $path = $this->upload2();
            if($path){
                    $_POST['sland_img'] = '/Public/'.$path;
            }
            $_POST['add_time'] = time();
            if($slanders_model->create()){
                $slanders_model->save();
                $this->redirect("Famous/slanders");
            }
            $this->error('修改失败');
            exit;
        }
        $slander = $slanders_model->find($sland_id);
        $this->assign('slander',$slander);
        $this->display();
    }
    //文章显示
    function slandshow(){
        $slanders_model = M('slanders');
        if(IS_POST){
            $str_ids = implode(',',$_POST['sland_id']);
            $map['sland_id'] = array('in',$str_ids);
            if($str_ids == ''){
                $this->error('非法操作');
            }else{
                $slanders_model -> where($map) ->setField('is_show','1');
                $this->success('批量操作成功');
            }
        }
    }
    //隐藏
    function slandhide(){
        $slanders_model = M('slanders');
        if(IS_POST){
            $str_ids = implode(',',$_POST['sland_id']);
            $map['sland_id'] = array('in',$str_ids);
            if($str_ids == ''){
                $this->error('非法操作');
            }else{
                $slanders_model -> where($map) ->setField('is_show','0');
                $this->success('批量操作成功');
            }
        }
    }
    //删除文章
    function delsland(){
        $slanders_model = M('slanders');
        if(IS_POST){
            $str_ids = implode(',',$_POST['sland_id']);
            $map['sland_id'] = array('in',$str_ids);
            if($str_ids == ''){
                $this->error('非法操作');
            }else{
				foreach($_POST['sland_id'] as $key => $value){
					$slanderinfo = $slanders_model->find($value);
					if($slanders_model->where("sland_id = {$value}")->delete()){
						M('famous')->where("f_id = {$slanderinfo['f_id']}")->setDec('f_artnums',1);
					}
				}
                $this->success('批量删除成功');
            }
        }
    }
    //文章评论
    function comments(){
        if($_GET['search']){
            $map['username'] = array('LIKE',"%{$_GET['search']}%");
            $map1['username'] = array('LIKE',"%{$_GET['search']}%");
        }
        $map['sland_id'] = $_GET['sland_id'];
        $map1['c.sland_id'] = $_GET['sland_id'];
        $com_model = M('scomment');
        $bbsset = M('bbs')->field("pg_admin")->find();//获取论坛分页设置
        $count = $com_model->alias('c')->join('cq_user as u on u.user_id=c.user_id') ->where($map)-> count();
        $p = new \Think\Page($count,$bbsset['pg_admin']);
        $comments = $com_model
                 ->alias('c')
                 ->join("left join cq_user as u on u.user_id = c.user_id")
                 ->join("left join cq_slanders as a on a.sland_id = c.sland_id")
                 ->field("c.*,u.username,u.userhead,a.title")
                 ->where($map1)
                 ->order("c.add_time desc")
                 ->limit($p->firstRow.','.$p->listRows)
                 ->select();
                 foreach($comments as $key => $value){
                    $comments[$key]['content'] = htmlspecialchars_decode($value['content']);
                 }
                 //dump($comments);exit;
        $page = $p->show();
        $nowpage = $_GET['p']?$_GET['p']:1;
        $No1 = ($nowpage-1)*$bbsset['pg_admin']+1;
        $this->assign('No1',$No1);
        $this -> assign('page',$page);
        $this->assign('comments',$comments);
        $this->display();
    }
    //删除回复
    function del(){
        $com_id = $_GET['com_id'];
        if(M('scomment')->where("com_id = {$com_id}")->delete()){
            $this->success('删除成功');
        }else{
            $this->error('删除失败');
        }
    }
    //显示隐藏
    function isdisplay(){
        if(IS_POST){
            if($_POST['display'] == 1){
                $value = 0;
            }elseif($_POST['display'] == 0){
                $value = 1;
            }
            if(M('scomment')->where("com_id = {$_POST['com_id']}")->setField('display',$value)){
                echo 'success';
            }else{
                echo 'fail';
            }
        }
    }
    private function upload(){
        $upload=new \Think\Upload();
        $upload->exts=array("jpg","gif","png","jpeg");
        $upload->rootPath="./Public/";
        $upload->savePath="Upl/boardimg/";
        $info=$upload->uploadOne($_FILES['f_photo']);
        //dump($info);exit;
        return '/Public/'.$info['savepath'].$info['savename'];
    }
    private function upload2(){
        $upload=new \Think\Upload();
        $upload->exts=array("jpg","gif","png","jpeg");
        $upload->rootPath="./Public/";
        $upload->savePath="Upl/sland_img/";
        $info=$upload->uploadOne($_FILES['sland_img']);
        //dump($info);exit;
        return $info['savepath'].$info['savename'];
    }
}