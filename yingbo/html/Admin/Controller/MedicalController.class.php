<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/6/13
 * Time: 11:37
 */
namespace Admin\Controller;
use Common\Common\AdminController;
class MedicalController extends AdminController
{
    //列表
    function showlist(){
        if($_POST){
            $search = $_POST;
            $map['title'] = array('LIKE',"%{$search['search']}%");
        }else{
            $map = '';
        }


        $n = D('Medical');
        $count = $n -> count();
        $p = new \Think\Page($count,10);
        $info = $n ->where($map)
            -> order('medical_id desc') ->limit($p->firstRow.','.$p->listRows)-> select();
        $page = $p->show();
        $this -> assign('page',$page);
        $this->assign('info',$info);
        $this->display();
    }


    //添加
    function tianjia(){
        if(IS_POST){
            $medical = new \Model\MedicalModel();
//            if($_POST['col_id1'] != 0){
//                $_POST['col_id'] =   $_POST['col_id1'] ;
//            }
//            if($_POST['col_id2'] != 0){
//                $_POST['col_id'] =   $_POST['col_id2'] ;
//            }
////            dump($_POST);  exit;
            $info = $medical->create();
            $info['input_time'] = time();
            $info['is_show']  = $_POST['is_show'];
            $info['content'] = $_POST['content'];
            $cfg = array(
                'rootPath'    =>  './Public/', //保存根路径
                'savepath'  => 'Upl/Medical/',
            );
            $up = new \Think\Upload($cfg);
            $z = $up -> uploadOne($_FILES['pic']);
            
            $picname = $up->rootPath.$z['savepath'].$z['savename'];
            $info['pic'] = $picname;
            
            if($medical->add($info)){
                $this->success('发布成功','showlist',1);
            }else{
                $this->error('发布失败','tianjia',1);
            }
        }else{
//            $colinfoA = D('Column')
//                ->where(array('level'=>0))
//                ->select();
//            $this -> assign('colinfoA',$colinfoA);
            $this->display();
        }
    }

    //修改
    function upd(){
        $medical_id = I('get.medical_id');
        $medical = new \Model\MedicalModel();
        if(IS_POST){
            $shuju = $medical -> create();
            $shuju['input_time'] = time();
            $shuju['is_show']  = $_POST['is_show'];
            $shuju['content'] = $_POST['content'];
            if($_FILES['pic']['error']===0) {
                if (!empty($shuju['medical_id'])) {
                    if (!empty($_POST['pic'])) {
                        unlink($_POST['pic']);
                    }
                }

                $cfg = array(
                    'rootPath'    =>  './Public/', //保存根路径
                      'savepath'  => 'Upl/Medical/',
                );
                $up = new \Think\Upload($cfg);
                $z = $up -> uploadOne($_FILES['pic']);

                $picname = $up->rootPath.$z['savepath'].$z['savename'];
                $shuju['pic'] = $picname;
            }

            if($medical->save($shuju)){
                $this -> success('修改成功',U('showlist'),1);
            }else{
                $this -> error('修改失败',U('upd',array('medical_id'=>$medical_id)),1);
            }
        }else{
            $info = $medical->find($medical_id);

//            /****获得“第一级栏目信息”并传递给模板****/
//            $colinfoA = D('Column')
//                ->where(array('level'=>0))
//                ->select();
//            $this -> assign('colinfoA',$colinfoA);
//            /****获得“第一级栏目信息”并传递给模板****/
//
//            /****获得所有扩展栏目信息****/
//            $ext = D('AdColumn')
//                ->where(array('medical_id'=>$medical_id))
//                ->field('group_concat(col_id) as extids')
//                ->find();
//            $extcolids = $ext['extids'];
//            $this -> assign('extcolids',$extcolids);
            /****获得所有扩展栏目信息****/

            $this -> assign('info',$info);
            $this -> display();
        }
    }


    function del(){
        $medical_id = I('get.medical_id');

        if(D('Medical')->delete($medical_id)){
            $this->success('删除成功',U('showlist'));
        }else{
            $this->error('删除失败',U('del',array('medical_id'=>$medical_id)),1);
        }
    }


}