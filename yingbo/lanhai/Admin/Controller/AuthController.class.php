<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/6/13
 * Time: 11:37
 */
namespace Admin\Controller;
use Common\Common\AdminController;
class AuthController extends AdminController
{
    //列表
    function showlist(){
        $n = D('Auth');
        $count = $n -> count();
        $p = new \Think\Page($count,20);
        $info = $n
            -> order('auth_path') ->limit($p->firstRow.','.$p->listRows)-> select();
        $page = $p->show();
        $this -> assign('page',$page);
        $this -> assign('info',$info);
        $this -> display();
    }
    //添加权限
    function tianjia(){
        $auth = new \Model\AuthModel();
        if(IS_POST){
            $shuju = $auth -> create();
            //auth_path和auth_level两个字段在瞻前顾后机制维护
            if($auth->add($shuju)){
                $this -> success('添加权限成功',U('showlist'),1);
            }else{
                $this -> error('添加权限失败',U('tianjia'),1);
            }
        }else{
            //获取供选择的上级权限信息
            $authinfo = D('Auth')->order('auth_path')->select();
            $this -> assign('authinfo',$authinfo);
            $this -> display();
        }
    }

    function del(){
        $auth_id = I('get.auth_id');

        if(D('Auth')->delete($auth_id)){
            $this->success('删除成功',U('showlist'));
        }else{
            $this->error('删除失败',U('del',array('auth_id'=>$auth_id)),1);
        }

    }

     function upd(){
         $auth_id = I('get.auth_id');
        $auth = new \Model\AuthModel();
        if(IS_POST){
            //dump($_POST);
            $shuju = $auth -> create();
                if($auth->save($shuju)){
                $this -> success('修改权限成功',U('showlist'),1);
                }else{
                    $this -> error('修改权限失败',U('upd',array('auth_id'=>$auth_id)),1);
                }
        }else{
            $info = $auth->find($auth_id);
            $son_lan_id = $info['auth_id'];
            $laninfo1 = D('Auth')
                ->where(array('auth_level'=>0))
                ->find($son_lan_id);
            $now_pid = $laninfo1['auth_pid'];
            $info['now_pid']=$now_pid;
           // dump($now_pid);die;
            $authinfo = D('Auth')->order('auth_path')->select();
            $this -> assign('authinfo',$authinfo);

            $this -> assign('info',$info);
            $this -> display();
        }
     }
}