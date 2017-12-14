<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/6/13
 * Time: 11:37
 */
namespace Home\Controller;
use Common\Common\HomeController;
class LinkController extends HomeController
{
     function showlist(){
         $info = D('Link')->select();
         $this->assign('info',$info);

         $adinfofen=D('Ad')->where("col_id=29")->select();
         $this->assign('adinfofen',$adinfofen);
         $this->display();
     }

    function tianjia(){
        if(IS_POST){
             $link = D('Link');
            $info = $link->create();

            $info['input_time'] = time();

            if($link->add($info)){
                $this->success('添加成功','showlist',1);
            }else{
                $this->error('添加失败','tianjia',1);
            }
        }else{
            $this->display();
        }
    }


    //修改
    function upd(){
        $link_id = I('get.link_id');
        $link = D('Link');
        if(IS_POST) {
            $info = $link->create();
            $info['input_time'] = time();

            if ($link->save($info)) {
                $this->success('修改成功', U('showlist'), 1);
            } else {
                $this->error('修改失败', U('upd', array('link_id' => $link_id)), 1);
            }
        }else{

            $info = $link->find($link_id);
            $this->assign('info',$info);
            $this->display();
        }
    }
    function del(){
        $link_id = I('get.link_id');

        if(D('Link')->delete($link_id)){
            $this->success('删除成功',U('showlist'));
        }else{
            $this->error('删除失败',U('del',array('link_id'=>$link_id)),1);
        }
    }

}