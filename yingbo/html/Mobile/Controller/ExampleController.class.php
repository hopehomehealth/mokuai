<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/6/13
 * Time: 11:37
 */
namespace Mobile\Controller;
use Common\Common\FooterController;
class ExampleController extends FooterController
{
    function example()
    {
        $daohang = array(
        'first'=>'服务案例',
    );
        $this -> assign('daohang',$daohang);

        $example = D('Example');
        $exampleinfo = $example->order('example_id')->limit(3,4)->select();
        $this->assign('exampleinfo', $exampleinfo);
        $this->display();
    }

    function example_list(){
        $daohang = array(
            'first'=>'服务案例',
        );
        $this -> assign('daohang',$daohang);

        $example_id= I('get.example_id');
        $example = D('Example');
        $info=$example->where(array('example_id'=>$example_id))->find();
        $this->assign('info',$info);
        $this->display();
    }
    function liucheng(){
        $daohang = array(
            'first'=>'服务流程',
        );
        $this -> assign('daohang',$daohang);

        $this->display();
    }
}
