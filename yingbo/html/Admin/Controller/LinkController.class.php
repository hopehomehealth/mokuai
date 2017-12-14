<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/6/13
 * Time: 11:37
 */
namespace Admin\Controller;
use Common\Common\AdminController;
class LinkController extends AdminController
{
    //列表
    function showlist(){

        if($_POST){
            $search = $_POST;
            $map['name'] = array('LIKE',"%{$search['search']}%");
        }else{
            $map = '';
        }

        $link = D('Link');
        $count = $link -> count();
        $p = new \Think\Page($count,10);
        $info = $link ->where($map)
            -> order('link_id desc') ->limit($p->firstRow.','.$p->listRows)-> select();
        $page = $p->show();
        $this -> assign('page',$page);

        $this -> assign('info',$info);
        $this->display();
    }

    //添加
    function tianjia(){
       if(IS_POST){
           $post = I('post.');
           $link = D('Link');

           $cfg = array(
               'rootPath'    =>  './Public/', //保存根路径
               'savepath'  => 'Upl/link/',
           );
           $up = new \Think\Upload($cfg);
           $z = $up -> uploadOne($_FILES['pic']);
           $bigname = $up->rootPath.$z['savepath'].$z['savename'];
           $post['pic'] = $bigname;


           $rst = $link->add($post);

          if($rst){
              $this->success('添加成功','showlist');
          }else{
              $this->error('添加失败','tianjia');
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
            if($_FILES['pic']['error']===0) {
                if (!empty($info['link_id'])) {
                    if (!empty($_POST['pic'])) {
                        unlink($_POST['pic']);
                    }
                }

                $cfg = array(
                    'rootPath'    =>  './Public/', //保存根路径
                    'savepath'  => 'Upl/link/',
                );
                $up = new \Think\Upload($cfg);
                $z = $up -> uploadOne($_FILES['pic']);

                //把上传的图片"路径名"保存到数据库中
                $picname = $up->rootPath.$z['savepath'].$z['savename'];
                $info['pic'] = $picname;
            }
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
//        $info = D('Link')->find($link_id);
//        unlink($info['link_id']);

       if(D('Link')->delete($link_id)){
           $this->success('删除成功',U('showlist'));
       }else{
           $this->error('删除失败',U('del',array('link_id'=>$link_id)),1);
       }

    }
}