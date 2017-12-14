<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/6/13
 * Time: 11:37
 */
namespace Admin\Controller;
use Think\Controller;
class CaidetailController extends Controller {
    function showlist(){

        $info = D('Caidetail')
            ->select();
        $this->assign('info',$info);
        $this ->display();
    }

    function upd(){
        $id = I('get.id');
        $n = D('Caidetail');
        if(IS_POST){
            $info = $n -> create();
         
            $info['introduce'] = $_POST['introduce'];
           

            if($n->save($info)){
                $this -> success('修改成功',U('showlist'),1);
            }else{
                $this -> error('修改失败',U('upd',array('id'=>$id)),1);
            }
        }else{
            $info = $n->find($id);
            $this -> assign('info',$info);

            $this -> display();
        }
    }

}