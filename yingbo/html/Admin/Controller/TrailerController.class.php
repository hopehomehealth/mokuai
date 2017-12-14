<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/6/13
 * Time: 11:37
 */
namespace Admin\Controller;
use Common\Common\AdminController;
class TrailerController extends AdminController
{
     function showlist(){
         if($_POST){
             $search = $_POST;
             $map['title'] = array('LIKE',"%{$search['search']}%");
         }else{
             $map = '';
         }

         $n = D('Trailer');
         $count = $n -> count();
         $p = new \Think\Page($count,10);
         $info = $n ->where($map)
             -> order('trailer_id desc') ->limit($p->firstRow.','.$p->listRows)-> select();
         $page = $p->show();
         $this -> assign('page',$page);
         $this -> assign('info',$info);
         $this->display();
     }

    function tianjia(){
        if(IS_POST){
             $trailer = D('Trailer');
            $info = $trailer->create();

            $info['input_time'] = time();

            // 原图上传处理
            $cfg = array(
                'rootPath' => './Public/', //保存根路径.
                 'savepath'  => 'Upl/Trailer/',
            );
            $up = new \Think\Upload($cfg);

            $z = $up->upload(array($_FILES['pic']));

            foreach($z as $k1 =>$v1){
                $pic .= $up-> rootPath . $v1['savepath'] . $v1['savename'];
            }
            $info['pic'] = $pic;


            if($trailer->add($info)){
                $this->success('添加成功','showlist',1);
            }else{
                $this->error('添加失败','tianjia',1);
            }
        }else{
            $this->display();
        }
    }


    //修改
    function upd()
    {
        $trailer_id = I('get.trailer_id');
        $trailer = D('Trailer');
        if (IS_POST) {
            $info = $trailer->create();
            $info['input_time'] = time();

            if ($_FILES['pic']['error'] === 0) {
                if (!empty($info['trailer_id'])) {
                    if (!empty($_POST['pic'])) {
                        unlink($_POST['pic']);
                    }
                }

                $cfg = array(
                    'rootPath' => './Public/', //保存根路径
                    'savepath'  => 'Upl/Trailer/',
                );
                $up = new \Think\Upload($cfg);
                $z = $up->uploadOne($_FILES['pic']);

                //把上传的图片"路径名"保存到数据库中
                $picname = $up->rootPath . $z['savepath'] . $z['savename'];
                $info['pic'] = $picname;
            }
                if ($trailer->save($info)) {
                    $this->success('修改成功', U('showlist'), 1);
                } else {
                    $this->error('修改失败', U('upd', array('trailer_id' => $trailer_id)), 1);
                }
            } else {

                $info = $trailer->find($trailer_id);
                $this->assign('info', $info);
                $this->display();
            }
        }

    function del(){
        $trailer_id = I('get.trailer_id');

        if(D('Trailer')->delete($trailer_id)){
            $this->success('删除成功',U('showlist'));
        }else{
            $this->error('删除失败',U('del',array('trailer_id'=>$trailer_id)),1);
        }
    }

}