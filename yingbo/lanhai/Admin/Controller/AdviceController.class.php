<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/6/13
 * Time: 11:37
 */
namespace Admin\Controller;
use Common\Common\AdminController;
class AdviceController extends AdminController
{
    //列表
    function showlist(){

        if($_POST){
            $search = $_POST;
            $map['name'] = array('LIKE',"%{$search['search']}%");
        }else{
            $map = '';
        }

        $advice = D('Advice');
        $count = $advice -> count();
        $p = new \Think\Page($count,10);
        $info = $advice ->where($map)
            -> order('advice_id desc') ->limit($p->firstRow.','.$p->listRows)-> select();
        $page = $p->show();
        $this -> assign('page',$page);
        $this -> assign('info',$info);
        $this->display();
    }

    function del(){
        $advice_id = I('get.advice_id');

        if(D('Advice')->delete($advice_id)){
            $this->success('删除成功',U('showlist'));
        }else{
            $this->error('删除失败',U('del',array('advice_id'=>$advice_id)),1);
        }
    }


//    //修改
    function upd(){
        $advice_id = I('get.advice_id');
        $advice = D('Advice');
        if(IS_POST) {

            $info = $advice->create();

            $info['add_time'] = time();
            if ($advice->save($info)) {
                $this->redirect('showlist');
            } else {
                $this->error('修改失败', U('upd', array('advice_id' => $advice_id)), 1);
            }
        }else{

            $info = $advice->find($advice_id);
            $this->assign('info',$info);
            $this->display();
       }
    }


}