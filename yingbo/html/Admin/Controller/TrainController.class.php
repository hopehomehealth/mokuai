<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/6/13
 * Time: 11:37
 */
namespace Admin\Controller;
use Common\Common\AdminController;
class TrainController extends AdminController
{
       //列表
    function showlist(){
        if($_POST){
            $search = $_POST;
            $map['china'] = array('LIKE',"%{$search['search']}%");
        }else{
            $map = '';
        }

        $n = D('Train');
        $count = $n -> count();
        $p = new \Think\Page($count,10);
        $info = $n ->where($map)
            -> order('train_id desc') ->limit($p->firstRow.','.$p->listRows)-> select();
        $page = $p->show();
        $this -> assign('page',$page);
        $this -> assign('info',$info);
        $this->display();
    }
    
    //添加
    function tianjia(){
       if(IS_POST){
           $train = D('Train');
           $info = $train
               ->create();
           $info['input_time'] = time();

           // 原图上传处理
           $cfg = array(
               'rootPath' => './Public/', //保存根路径
               'savepath'  => 'Upl/Train/',
           );
           $up = new \Think\Upload($cfg);

           $z = $up->upload(array($_FILES['pic']));

           foreach($z as $k1 =>$v1){
               $pic .= $up-> rootPath . $v1['savepath'] . $v1['savename'];
           }
           $info['pic'] = $pic;
           $info['content'] = $_POST['content'];
          if($train->add($info)){
              $this->success('发布成功','showlist',1);
          }else{
              $this->error('发布失败','tianjia',1);
          }
       }else{
           $this->display();
       }
    }

    //修改
    function upd(){
        $train_id = I('get.train_id');
        $train = D('Train');
        if(IS_POST) {
            $info = $train->create();
            $info['input_time'] = time();

            $info['content'] = $_POST['content'];
            if($_FILES['pic']['error']===0) {
                if (!empty($info['train_id'])) {
                    if (!empty($_POST['pic'])) {
                        unlink($_POST['pic']);
                    }
                }

                $cfg = array(
                    'rootPath' => './Public/', //保存根路径
               'savepath'  => 'Upl/Train/',
                );
                $up = new \Think\Upload($cfg);
                $z = $up -> uploadOne($_FILES['pic']);

                //把上传的图片"路径名"保存到数据库中
                $picname = $up->rootPath.$z['savepath'].$z['savename'];
                $info['pic'] = $picname;

            }
            if ($train->save($info)) {
                $this->success('修改成功', U('showlist'), 1);
            } else {
                $this->error('修改失败', U('upd', array('train_id' => $train_id)), 1);
            }
        }else{

            $info = $train->find($train_id);
            $this->assign('info',$info);
            $this->display();
       }
    }

    function del(){
        $train_id = I('get.train_id');;

       if(D('Train')->delete($train_id)){
           $this->success('删除成功',U('showlist'));
       }else{
           $this->error('删除失败',U('del',array('train_id'=>$train_id)),1);
       }

    }
}