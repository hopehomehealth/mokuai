<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/6/13
 * Time: 11:37
 */
namespace Admin\Controller;
use Think\Controller;
class BannerController extends Controller
{
    //列表
    function showlist(){
        if($_POST){
            $search = $_POST;
            $map['title'] = array('LIKE',"%{$search['search']}%");
        }else{
            $map = '';
        }

        $count = D('Banner') -> count();
        $p = new \Think\Page($count,10);
        $info = D('Banner')

            ->where($map)
            -> order('ad_id desc') ->limit($p->firstRow.','.$p->listRows)-> select();
        $page = $p->show();
        $this -> assign('page',$page);

        $this->assign('info',$info);
        $this->display();
    }


    //添加
    function tianjia(){
        if(IS_POST){
            $ad = D('Banner');

            $info = $ad->create();
            $info['add_time'] = time();
             $info['is_show']  = $_POST['is_show'];
            $info['is_area'] = $_POST['is_area'];
            $cfg = array(
                'rootPath'    =>  './Public/Upd/banner/', //保存根路径
            );
            $up = new \Think\Upload($cfg);
            $z = $up -> uploadOne($_FILES['pic']);

            //把上传的图片"路径名"保存到数据库中
            $picname = $up->rootPath.$z['savepath'].$z['savename'];
            $info['pic'] = $picname;


            if($ad->add($info)){
                $this->success('添加成功','showlist',1);
            }else{
                $this->error('添加失败','tianjia',1);
            }
        }else{
            $this->display();
        }
    }

    //修改
    function upd(){
        $ad_id = I('get.ad_id');
        $ad = D('Banner');
        if(IS_POST){
            $shuju = $ad -> create();
            $shuju['add_time'] = time();
            $shuju['is_show']  = $_POST['is_show'];
            $shuju['is_area'] = $_POST['is_area'];
            if($_FILES['pic']['error']===0) {
                if (!empty($shuju['ad_id'])) {
                    $oldinfo = D('Banner')->find($shuju['ad_id']);
                    if (!empty($oldinfo['pic'])) {
                        unlink($oldinfo['pic']);
                    }
                }

                $cfg = array(
                    'rootPath'    =>  './Public/Upd/banner/', //保存根路径
                );
                $up = new \Think\Upload($cfg);
                $z = $up -> uploadOne($_FILES['pic']);

                //把上传的图片"路径名"保存到数据库中
                $picname = $up->rootPath.$z['savepath'].$z['savename'];
                $shuju['pic'] = $picname;
            }
            
            if($ad->save($shuju)){
                $this -> success('修改成功',U('showlist'),1);
            }else{
                $this -> error('修改失败',U('upd',array('ad_id'=>$ad_id)),1);
            }
        }else{
            $info = $ad->find($ad_id);
            $this -> assign('info',$info);
            $this -> display();
        }
    }


    function del(){
        $ad_id = I('get.ad_id');

        if(D('Banner')->delete($ad_id)){
            $this->success('删除成功',U('showlist'));
        }else{
            $this->error('删除失败',U('del',array('ad_id'=>$ad_id)),1);
        }
    }


}