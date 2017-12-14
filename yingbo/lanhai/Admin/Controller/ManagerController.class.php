<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/6/13
 * Time: 11:37
 */


namespace Admin\Controller;
use Common\Common\AdminController;
class ManagerController extends AdminController
{
    function showlist(){
        if($_POST){
            $search = $_POST;
            $map['mg_name'] = array('LIKE',"%{$search['search']}%");
        }else{
            $map = '';
        }

        $count = D('Manager') -> count();
        $p = new \Think\Page($count,10);
        $info = D('Manager')
            ->alias('m')
            ->join('__ROLE__ r on m.role_id = r.role_id')
            ->field('m.*,r.role_name')
            ->order('role_id') ->where($map)
            ->limit($p->firstRow.','.$p->listRows)-> select();
        $page = $p->show();
        $this -> assign('page',$page);

        $this->assign('info',$info);
        $this->display();
    }

    function tianjia(){
        if(IS_POST){
            $mg = D('Manager');
            $info=$mg->create();
            $info['mg_time'] = time();
            $info['mg_pwd'] = md5($_POST['mg_pwd']);
            if($mg->add($info)){
                $this->success('添加成功','showlist',1);
            }else{
                $this->error('添加失败','tianjia',1);
            }
        }else{
            $roleinfo = D('Role')->select();
            $this->assign('roleinfo',$roleinfo);
            $this->display();
        }
    }

    function upd(){
        $mg_id = I('get.mg_id');
        $mg = D('Manager');
        if(IS_POST){
            $shuju = $mg -> create();
            $shuju['mg_time'] = time();
            $shuju['mg_pwd'] = md5($_POST['mg_pwd']);
            if($mg->save($shuju)){
                $this -> success('修改成功',U('showlist'),1);
            }else{
                $this -> error('修改失败',U('upd',array('mg_id'=>$mg_id)),1);
            }
        }else{
            $info = $mg->find($mg_id);

            $roleinfo = D('Role')->select();
            $this -> assign('roleinfo',$roleinfo);

            $this -> assign('info',$info);
            $this -> display();
        }
    }


    function login(){
        layout(false);
        C('SHOW_PAGE_TRACE',false);
        if(IS_POST){
            $name = $_POST['admin_name'];
            $pwd = md5($_POST['admin_pwd']);

            $info = D('Manager')
                ->where(array('mg_name'=>$name,'mg_pwd'=>$pwd))
                ->find();

            if($info !== null){
                session('admin_id',$info['mg_id']);
                session('admin_name',$info['mg_name']);
                $this -> redirect('Index/index'); //迅速发生跳转
            }else{
                echo "<script type='text/javascript'>alert('用户名或密码错误');</script>";
            }
        }
        $this -> display();
    }


    //退出系统
    function logout(){

        session(null); //销毁session
        $this -> redirect('login');
    }



}