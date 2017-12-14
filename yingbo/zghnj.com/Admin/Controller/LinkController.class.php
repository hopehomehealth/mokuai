<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/4/1 0001
 * Time: 15:30
 */
namespace Admin\Controller;
use Common\Common\AdminController;
class LinkController extends AdminController
{
    function showlist(){
        $model = M('link');
        $count = $model->count();
        $p = new \Think\Page($count,10);
        $links = $model->order('sort,ctime')->limit($p->firstRow.','.$p->listRows)->select();
        $page = $p->show();
        $this->assign('page',$page);
        $this->assign('links',$links);
        $this->display();
    }
    function add(){
        if(IS_POST){
            $model = M('link');
            $path = $this -> upload('link',$_FILES['picture']);
            if($path){
                $_POST['picture'] = '/Public/'.$path;
            }
            $_POST['ctime'] = NOW_TIME;
            if($model->create()){
                if($model->add()){
                    $this->success('添加成功',U('showlist'));exit;
                }
            }
            $this->error('添加失败');exit;
        }
        $this->display();
    }
    function upd(){
        $id = intval($_GET['id']);
        $model = M('link');
        if(IS_POST){
            $path = $this -> upload('link',$_FILES['picture']);
            if($path){
                $_POST['picture'] = '/Public/'.$path;
            }
            if($model->create()){
                if($model->where("id = {$id}")->save()){
                    $this->success('修改成功',U('showlist'));exit;
                }
            }
            $this->error('修改失败');exit;
        }
        $linkinfo = $model->find($id);
        $this->assign('linkinfo',$linkinfo);
        $this->display();
    }
    function del(){
        $id = intval($_GET['id']);
        $model = M('link');
        if($model->delete($id)){
            $this->success('删除成功');exit;
        }
        $this->error('修改失败');exit;
        $this->display();
    }
}