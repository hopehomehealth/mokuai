<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/6/13
 * Time: 11:37
 */
namespace Admin\Controller;
use Common\Common\AdminController;
class ContactController extends AdminController
{
    //列表
    function showlist(){

        if($_POST){
            $search = $_POST;
            $map['name'] = array('LIKE',"%{$search['search']}%");
        }else{
            $map = '';
        }

        $contact = D('Contact');
        $count = $contact -> count();
        $p = new \Think\Page($count,10);
        $info = $contact ->where($map)
            -> order('contact_id desc') ->limit($p->firstRow.','.$p->listRows)-> select();
        $page = $p->show();
        $this -> assign('page',$page);
        $this -> assign('info',$info);
        $this->display();
    }

    function del(){
        $contact_id = I('get.contact_id');
//        $info = D('Contact')->find($contact_id);
//        unlink($info['contact_id']);

        if(D('Contact')->delete($contact_id)){
            $this->success('删除成功',U('showlist'));
        }else{
            $this->error('删除失败',U('del',array('contact_id'=>$contact_id)),1);
        }
    }

//    //添加
//    function tianjia(){
//       if(IS_POST){
//           $contact = D('Contact');
//           $info = $contact->create();
//
//           $info['input_time'] = time();
//
//          if($contact->add($info)){
//              $this->success('发布成功','showlist',1);
//          }else{
//              $this->error('发布失败','tianjia',1);
//          }
//       }else{
//           $this->display();
//       }
//    }
//
//    //修改
    function upd(){
        $contact_id = I('get.contact_id');
        $contact = D('Contact');
        if(IS_POST) {

            $info = $contact->create();

            $info['input_time'] = time();
            if ($contact->save($info)) {
                $this->redirect('showlist');
            } else {
                $this->error('修改失败', U('upd', array('contact_id' => $contact_id)), 1);
            }
        }else{

            $info = $contact->find($contact_id);
            $this->assign('info',$info);
            $this->display();
       }
    }


}