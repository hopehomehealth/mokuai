<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/8/9 0009
 * Time: 11:35
 */

namespace Admin\Controller;
use Think\Controller;

class HaopriceController extends Controller
{
    function showlist(){
        $goods = D('Haoprice');
        $info = $goods -> select();

        $this -> assign('info',$info);
        $this -> display();

    }

    function tianjia(){
        if(IS_POST){
            $brand = D('Haoprice');
            $info = $brand->create();

            if($brand->add($info)){
                $this->success('添加成功','showlist',1);
            }else{
                $this->error('添加失败','tianjia',1);
            }
        }else{
            $this->display();
        }
    }

    function upd(){
        $price_id = I('get.price_id');
        $brand = D('Haoprice');
        if(IS_POST){
            $shuju = $brand -> create();

            if($brand->save($shuju)){
                $this -> success('修改成功',U('showlist'),1);
            }else{
                $this -> error('修改失败',U('upd',array('price_id'=>$price_id)),1);
            }
        }else{
            $info = $brand->find($price_id);
            $this -> assign('info',$info);
            $this -> display();
        }
    }

    function del(){
        $price_id = I('get.price_id');

        if(D('Haoprice')->delete($price_id)){
            $this->success('删除成功',U('showlist'));
        }else{
            $this->error('删除失败',U('del',array('price_id'=>$price_id)),1);
        }
    }
}