<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/8/9 0009
 * Time: 11:35
 */

namespace Admin\Controller;
use Think\Controller;

class HaobrandController extends Controller
{
    function showlist(){
         if($_POST){
            $search = $_POST;
            $map['brand_name'] = array('LIKE',"%{$search['search']}%");
        }else{
            $map = '';
        }
        
        $count = D('Haobrand') ->where($map)-> count();
        $p = new \Think\Page($count,10);
        $info =  D('Haobrand')
            ->order('brand_id desc')
            ->where($map)
            ->limit($p->firstRow.','.$p->listRows)
            ->select();
        $page = $p->show();
        $this -> assign('page',$page);
        $this -> assign('info',$info);
        $this->display();

    }

    function tianjia(){
        if(IS_POST){
            $brand = D('Haobrand');
            $info = $brand->create();
            $info['add_time'] = time();
            $info['upd_time'] = time();


            $cfg = array(
                'rootPath'    =>  './Public/Upd/haoche/brand/', //保存根路径
            );
            $up = new \Think\Upload($cfg);
            $z = $up -> uploadOne($_FILES['logo']);

            $picname = $up->rootPath.$z['savepath'].$z['savename'];
            $info['logo'] = $picname;

            if($brand->add($info)){
                $this->success('添加成功','showlist',1);
            }else{
                $this->error('添加失败','tianjia',1);
            }
        }else{
            $this->display();
        }
    }

    function upd(){
        $brand_id = I('get.brand_id');
        $brand = D('Haobrand');
        if(IS_POST){
            $shuju = $brand -> create();
            $shuju['add_time'] = time();
            $shuju['upd_time'] = time();
            if($_FILES['logo']['error']===0) {
                if (!empty($shuju['brand_id'])) {
                    $oldinfo = D('Haobrand')->find($shuju['brand_id']);
                    if (!empty($oldinfo['logo'])) {
                        unlink($oldinfo['logo']);
                    }
                }

                $cfg = array(
                    'rootPath'    =>  './Public/Upd/haoche/brand/', //保存根路径
                );
                $up = new \Think\Upload($cfg);
                $z = $up -> uploadOne($_FILES['logo']);

                //把上传的图片"路径名"保存到数据库中
                $picname = $up->rootPath.$z['savepath'].$z['savename'];
                $shuju['logo'] = $picname;
            }

            if($brand->save($shuju)){
                $this -> success('修改成功',U('showlist'),1);
            }else{
                $this -> error('修改失败',U('upd',array('brand_id'=>$brand_id)),1);
            }
        }else{
            $info = $brand->find($brand_id);
            $this -> assign('info',$info);
            $this -> display();
        }
    }

    function del(){
        $brand_id = I('get.brand_id');

        if(D('Haobrand')->delete($brand_id)){
            $this->success('删除成功',U('showlist'));
        }else{
            $this->error('删除失败',U('del',array('brand_id'=>$brand_id)),1);
        }
    }
}