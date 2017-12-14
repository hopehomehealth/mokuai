<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/6/13
 * Time: 11:37
 */
namespace Admin\Controller;
use Common\Common\AdminController;
class ExampleController extends AdminController
{

    function showlist()
    {
        if($_POST){
            $search = $_POST;
            $map['name'] = array('LIKE',"%{$search['search']}%");
        }else{
            $map = '';
        }

        $example = D('Example');
        $count = $example -> count();
        $p = new \Think\Page($count,10);
        $exampleinfo = $example ->where($map)
            -> order('example_id desc') ->limit($p->firstRow.','.$p->listRows)-> select();
        $page = $p->show();
        $this -> assign('page',$page);
       
        $this->assign('exampleinfo', $exampleinfo);
        $this->display();
    }

    //添加
    function tianjia(){
        if(IS_POST){

            $example = D('Example');
            $info=$example->create();
            $info['input_time'] = time();
            $info['content'] = $_POST['content'];

            $cfg = array(
                'rootPath'    =>  './Public/', //保存根路径
                'savepath'  => 'Upl/Case/',
            );
            $up = new \Think\Upload($cfg);
            $z = $up->uploadOne($_FILES['pic']);

            //把上传的图片"路径名"保存到数据库中
            $bigname = $up->rootPath.$z['savepath'].$z['savename'];
            $info['pic'] = $bigname;

//              dump($info);die;
            $rst = $example->add($info);

            if($rst){
                $this->success('添加成功','showlist');
            }else{
                $this->error('添加失败','tianjia');
            }
        }else{
            $this->display();
        }
    }

    //修改
    function upd(){
        $example_id = I('get.example_id');
        $example = D('Example');

        if(IS_POST) {
            $info = $example->create();
            $info['input_time'] = time();

            $info['content'] = $_POST['content'];
            if($_FILES['pic']['error']===0) {
                //判断出来当前是"修改"、"添加"动作
                if (!empty($info['example_id'])) {
                    if (!empty($_POST['pic'])) {
                        unlink($_POST['pic']);
                    }
                }
                $cfg = array(
                    'rootPath'    =>  './Public/', //保存根路径
                    'savepath'  => 'Upl/Case/',
                );
                $up = new \Think\Upload($cfg);
                $z = $up -> uploadOne($_FILES['pic']);
                //把上传的图片"路径名"保存到数据库中
                $picname = $up->rootPath.$z['savepath'].$z['savename'];
                $info['pic'] = $picname;
            }
            if ($example->save($info)) {
                $this->success('修改成功', U('showlist'), 1);
            } else {
                $this->error('修改失败', U('upd', array('example_id' => $example_id)), 1);
            }
        }else{

            $info = $example->find($example_id);
            $this->assign('info',$info);
            $this->display();
        }
    }

    function del(){
        $example_id = I('get.example_id');
//        $info = D('Example')->find($example_id);
//        unExample($info['example_id']);

        if(D('Example')->delete($example_id)){
            $this->success('删除成功',U('showlist'));
        }else{
            $this->error('删除失败',U('del',array('example_id'=>$example_id)),1);
        }

    }
}
