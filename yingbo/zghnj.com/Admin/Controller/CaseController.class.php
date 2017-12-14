<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/3/29 0029
 * Time: 10:07
 */
namespace Admin\Controller;
use Common\Common\AdminController;
class CaseController extends AdminController
{
    function cases(){
        $model = M('case');
        $count = $model->count();
        $p = new \Think\Page($count,15);
        $cases = $model->order('sort,ctime')->limit($p->firstRow.','.$p->listRows)->select();
        $page = $p->show();
        $this->assign('page',$page);
        $this->assign('cases',$cases);
        $this->display();
    }
    function add_case(){
        if(IS_POST){
            $model = M('case');
            $path = $this -> upload('case',$_FILES['picture']);
            if($path){
                $_POST['picture'] = '/Public/'.$path;
            }
            $_POST['ctime'] = NOW_TIME;
            if($model->create()){
                if($model->add()){
                    $this->success('添加成功',U('cases'));exit;
                }
            }
            $this->error('添加失败');exit;
        }
        $this->display();
    }
    function upd_case(){
        $id = intval($_GET['id']);
        $model = M('case');
        if(IS_POST){
            $path = $this -> upload('case',$_FILES['picture']);
            if($path){
                $_POST['picture'] = '/Public/'.$path;
            }
            if($model->create()){
                if($model->where("id = {$id}")->save()){
                    $this->success('修改成功',U('cases'));exit;
                }
            }
            $this->error('修改失败');exit;
        }
        $caseinfo = $model->find($id);
        $this->assign('caseinfo',$caseinfo);
        $this->display();
    }
    function del_case(){
        $id = intval($_GET['id']);
        $model = M('case');
        if($model->delete($id)){
            $this->success('删除成功');exit;
        }
        $this->error('修改失败');exit;
        $this->display();
    }
}