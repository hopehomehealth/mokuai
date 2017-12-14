<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/6/13
 * Time: 11:37
 */
namespace Home\Controller;
use Common\Common\ComController;
class CaidetailController extends ComController {
    function detail(){
$id = I('get.id');
        $info = D('Caidetail')
        ->where(array('id' =>$id))
            ->find();
        $this->assign('info',$info);
        $this ->display();
    }

}