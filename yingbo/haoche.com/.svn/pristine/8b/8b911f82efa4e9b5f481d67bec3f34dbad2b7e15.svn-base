<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/8/9 0009
 * Time: 11:35
 */

namespace Admin\Controller;
use Think\Controller;

class NewstypeController extends Controller
{
    function showlist(){
if($_POST){
            $search = $_POST;
            $map['type_name'] = array('LIKE',"%{$search['search']}%");
        }else{
            $map = '';
        }
        
        $count = D('Newstype') ->where($map)-> count();
        $p = new \Think\Page($count,10);
        $info =  D('Newstype')
            ->order('type_id desc')
            ->where($map)
            ->limit($p->firstRow.','.$p->listRows)
            ->select();
        $page = $p->show();
        $this -> assign('page',$page);
        $this -> assign('info',$info);
        $this->display();
    }

    function tianjia(){
        if(IS_POST){
            $news= D('Newstype');
            $info = $news->create();
          
            if($news->add($info)){
                $this->success('添加成功','showlist',1);
            }else{
                $this->error('添加失败','tianjia',1);
            }
        }else{
            $this->display();
        }
    }

    function upd(){
        $type_id = I('get.type_id');
        $news= D('Newstype');
        if(IS_POST){
            $shuju = $news-> create();

            if($news->save($shuju)){
                $this -> success('修改成功',U('showlist'),1);
            }else{
                $this -> error('修改失败',U('upd',array('type_id'=>$type_id)),1);
            }
        }else{
            $info = $news->find($type_id);
            $this -> assign('info',$info);
            $this -> display();
        }
    }

    function del(){
        $type_id = I('get.type_id');

        if(D('Newstype')->delete($type_id)){
            $this->success('删除成功',U('showlist'));
        }else{
            $this->error('删除失败',U('del',array('type_id'=>$type_id)),1);
        }
    }
}