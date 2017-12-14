<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/6/13
 * Time: 11:37
 */
namespace Admin\Controller;
use Common\Common\AdminController;
class AboutController extends AdminController
{
    //列表
    function about(){
        $aboutinfo = D('About')
            ->select();
//   dump($aboutinfo);die;
        $this -> assign('aboutinfo',$aboutinfo);
        $this->display();
    }


    //添加
    function tianjia(){
        if(IS_POST){
            $about = D('About');
            $aboutinfo = $about
                ->create();

            $aboutinfo['input_time'] = time();

            $aboutinfo['content'] = $_POST['content'];
            if($about->add($aboutinfo)){
                $this->success('发布成功','about',1);
            }else{
                $this->error('发布失败','tianjia',1);
            }
        }else{
            
            $this->display();
        }
    }

    //修改
    function upd(){
        $about_id = I('get.about_id');
        $about = D('About');
        if(IS_POST) {
            $aboutinfo = $about->create();
            $aboutinfo['input_time'] = time();

            $aboutinfo['content'] = $_POST['content'];
            if ($about->save($aboutinfo)) {
                $this->success('修改成功', U('about'), 1);
            } else {
                $this->error('修改失败', U('upd', array('about_id' => $about_id)), 1);
            }
        }else{

            $aboutinfo = $about->find($about_id);
            $this->assign('aboutinfo',$aboutinfo);
            $this->display();
        }
    }

    function del(){
        $about_id = I('get.about_id');

        if(D('About')->delete($about_id)){
            $this->success('删除成功',U('about'));
        }else{
            $this->error('删除失败',U('del',array('about_id'=>$about_id)),1);
        }

    }
}