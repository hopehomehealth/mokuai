<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/6/13
 * Time: 11:37
 */
namespace Admin\Controller;
use Common\Common\AdminController;
class TeamHealthController extends AdminController
{
       //列表
    function showlist(){
        if($_POST){
            $search = $_POST;
            $map['title'] = array('LIKE',"%{$search['search']}%");
        }else{
            $map = '';
        }

        $n = D('TeamHealth');
        $count = $n -> count();
        $p = new \Think\Page($count,10);
        $info = $n ->where($map)
            -> order('team_id desc') ->limit($p->firstRow.','.$p->listRows)-> select();
        $page = $p->show();
        $this -> assign('page',$page);
        $this -> assign('info',$info);
        $this->display();
    }
    

    //添加
    function tianjia(){
       if(IS_POST){
           $team = D('TeamHealth');
           $info = $team->create();

           $info['input_time'] = time();

           $cfg = array(
               'rootPath'    =>  './Public/', //保存根路径
                   'savepath'  => 'Upl/Team/health/',
           );
           $up = new \Think\Upload($cfg);
           $z = $up -> uploadOne($_FILES['pic']);

           //把上传的图片"路径名"保存到数据库中
           $picname = $up->rootPath.$z['savepath'].$z['savename'];
           $info['pic'] = $picname;

          if($team->add($info)){
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
        $team_id = I('get.team_id');
        $team = D('TeamHealth');
        if(IS_POST) {
            $info = $team->create();
            $info['input_time'] = time();
            $info['description'] = $_POST['description'];
            if($_FILES['pic']['error']===0) {
                if (!empty($info['team_id'])) {
                    if (!empty($_POST['pic'])) {
                        unlink($_POST['pic']);
                    }
                }

                $cfg = array(
                    'rootPath'    =>  './Public/', //保存根路径
                      'savepath'  => 'Upl/Team/health/',
                );
                $up = new \Think\Upload($cfg);
                $z = $up -> uploadOne($_FILES['pic']);

                //把上传的图片"路径名"保存到数据库中
                $picname = $up->rootPath.$z['savepath'].$z['savename'];
                $info['pic'] = $picname;
            }
            if ($team->save($info)) {
                $this->success('修改成功', U('showlist'), 1);
            } else {
                $this->error('修改失败', U('upd', array('team_id' => $team_id)), 1);
            }
        }else{

            $info = $team->find($team_id);
            $this->assign('info',$info);
            $this->display();
       }
    }

    function del(){
        $team_id = I('get.team_id');

       if(D('TeamHealth')->delete($team_id)){
           $this->success('删除成功',U('showlist'));
       }else{
           $this->error('删除失败',U('del',array('team_id'=>$team_id)),1);
       }
    }
}