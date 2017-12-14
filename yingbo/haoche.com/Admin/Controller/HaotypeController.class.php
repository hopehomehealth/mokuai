<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/8/9 0009
 * Time: 11:35
 */

namespace Admin\Controller;
use Think\Controller;

class HaotypeController extends Controller
{
    function showlist(){
if($_POST){
            $search = $_POST;
            $map['type_name'] = array('LIKE',"%{$search['search']}%");
        }else{
            $map = '';
        }
        
        $count = D('Haotype') ->where($map)-> count();
        $p = new \Think\Page($count,10);
        $info =  D('Haotype')
            ->order('type_id desc')
            ->where($map)
            ->limit($p->firstRow.','.$p->listRows)
            ->select();
        $page = $p->show();
        $this -> assign('page',$page);
        $this -> assign('info',$info);
        $this->display();



        $goods = D('Haotype');
        $info = $goods ->order('type_id desc')-> select();

        $this -> assign('info',$info);
        $this -> display();

    }

    function tianjia(){
        if(IS_POST){
            $type = D('Haotype');
            $info = $type->create();
            $info['add_time'] = time();
            $info['upd_time'] = time();
            if($type->add($info)){
                $this->success('添加成功','showlist');
            }else{
                $this->error('添加失败','tianjia');
            }
        }else{
            $this->display();
        }
    }

    function upd(){
        $type_id = I('get.type_id');
        $type = D('Haotype');
        if(IS_POST){
            $shuju = $type -> create();
            $shuju['add_time'] = time();
            $shuju['upd_time'] = time();

            if($type->save($shuju)){
                $this -> success('修改成功',U('showlist'),1);
            }else{
                $this -> error('修改失败',U('upd',array('type_id'=>$type_id)),1);
            }
        }else{
            $info = $type->find($type_id);
            $this -> assign('info',$info);
            $this -> display();
        }
    }

    function del(){
        $type_id = I('get.type_id');

        if(D('Haotype')->delete($type_id)){
            $this->success('删除成功',U('showlist'));
        }else{
            $this->error('删除失败',U('del',array('type_id'=>$type_id)),1);
        }
    }
}