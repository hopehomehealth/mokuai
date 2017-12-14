<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/6/13
 * Time: 11:37
 */
namespace Home\Controller;
use Common\Common\HomeController;
class ContactController extends HomeController
{
       //列表
    function showlist(){
        $adinfofen=D('Ad')->where("col_id=29")->select();
        $this->assign('adinfofen',$adinfofen);
        $this->display();
    }


    function liuYan(){
           if($_POST){
               $content = $_POST['content'];
               $name = $_POST['xingming'];
               $sex = I('post.sex');
               $iphone = $_POST['iphone'];
               $address = $_POST['address'];
               $visit = I('post.visit');


               $arr['content'] = $content;
               $arr['name'] = $name;
               $arr['sex'] = $sex;
               $arr['iphone'] = $iphone;
               $arr['address'] = $address;
               $arr['visit'] = $visit;
               $arr['input_time'] = time();
               if($newid = D('Contact')->add($arr)){
                   $arr['contact_id'] = $newid;
                   $arr['input_time'] = date('Y-m-d H:i');
                   echo json_encode($arr);
               }
           }
    }
    
//    //添加
//    function tianjia(){
//       if(IS_POST){
//           $contact = D('Contact');
//           $info = $contact
//               ->create();
//           $info['input_time'] = time();
//           //ueditor内容不经过create()处理
//           $info['content'] = \fanXSS($_POST['content']);
//           // 原图上传处理
//           $cfg = array(
//               'rootPath' => './Public/Upl/Contact/', //保存根路径
//           );
//           $up = new \Think\Upload($cfg);
//
//           $z = $up->upload(array($_FILES['pic']));
//
//           foreach($z as $k1 =>$v1){
//               $pic .= $up-> rootPath . $v1['savepath'] . $v1['savename'];
//           }
//           $info['pic'] = $pic;
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
//    function upd(){
//        $contact_id = I('get.Contact_id');
//        $contact = D('Contact');
//        if(IS_POST) {
//            $info = $contact->create();
//            $info['input_time'] = time();
//            //ueditor内容不经过create()处理
//            $info['content'] = \fanXSS($_POST['content']);
//
//            if ($contact->save($info)) {
//                $this->success('修改成功', U('showlist'), 1);
//            } else {
//                $this->error('修改失败', U('upd', array('Contact_id' => $contact_id)), 1);
//            }
//        }else{
//
//            $info = $contact->find($contact_id);
//            $this->assign('info',$info);
//            $this->display();
//       }
//    }
//
//    function del(){
//        $contact_id = I('get.Contact_id');;
//
//       if(D('Contact')->delete($contact_id)){
//           $this->success('删除成功',U('showlist'));
//       }else{
//           $this->error('删除失败',U('del',array('Contact_id'=>$contact_id)),1);
//       }
//
//    }
}