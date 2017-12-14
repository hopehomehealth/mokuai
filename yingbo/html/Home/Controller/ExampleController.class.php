<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/6/13
 * Time: 11:37
 */
namespace Home\Controller;
use Common\Common\HomeController;
class ExampleController extends HomeController
{

    function showlist()
    {
        $example = D('Example');

        $count  = $example->count();

        $p = getpage($count,6);
        $exampleinfo = $example->order('example_id desc')->limit($p->firstRow, $p->listRows)->select();
        $this->assign('exampleinfo', $exampleinfo); // 赋值数据集
        $this->assign('page', $p->show()); // 赋值分页输出

        $adinfofen=D('Ad')->where("col_id=29")->select();
        $this->assign('adinfofen',$adinfofen);
        $this->display();
    }

    function example_list(){

        $example_id= I('get.example_id');
        $example = D('Example');
        $info=$example->where(array('example_id'=>$example_id))->find();
        $this->assign('info',$info);
        //上一篇
        $preid = $example_id - 1;
        $preshow = $example->order('example_id desc')->where('example_id='.$preid)->find();
        if (!$preshow){
            $firstid =  $example->order('example_id desc')->limit(0,1)->select();
            $preshow['example_id']=$firstid[0]['example_id'];
            $preshow['name'] = '第一篇';
        }
        $this->assign('preshow',$preshow);

        //下一篇
        $nextid = $example_id + 1;
        $nextshow = $example->order('example_id desc')->where('example_id='.$nextid)->find();
        if (!$nextshow){
            $lastid = $example->order('example_id')->limit(0,1)->select();
            $nextshow['example_id']= $lastid[0]['example_id'];
            $nextshow['name'] = '最后一篇';
        }
        $this->assign('nextshow',$nextshow);
//        dump($exampleicalinfo);die;
        $adinfofen=D('Ad')->where("col_id=29")->select();
        $this->assign('adinfofen',$adinfofen);
        $this->display();
    }
}
