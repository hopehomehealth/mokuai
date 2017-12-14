<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/3/29 0029
 * Time: 10:07
 */
namespace Admin\Controller;
use Common\Common\AdminController;
class ProductController extends AdminController
{
    function showlist(){
        if(isset($_GET['search'])){
            $keywords = $_GET['search'];
            $map['pdt_name'] = array('like',"%$keywords%");
        }
        $map['is_show'] = 1;
        $product = M('product');
        $count = $product->where($map)->count();
        $p = new \Think\Page($count,15);
        $products = $product->where($map)->order("ctime desc")->limit($p->firstRow.','.$p->listRows)->select();
        $page = $p->show();
        $this->assign('page',$page);
        $this->assign('products',$products);
        $this->display();
    }

    function tianjia(){
        $product = M('product');
        if(IS_POST){
            foreach($_POST['features'] as $key=>$value){
                if(empty($value)){
                    unset($_POST['features'][$key]);
                }else{
                    $_POST['features'][$key] = $value;
                }
            }
            if(empty($_POST['features'])){
                $_POST['features'] = '';
            }else{
                $_POST['features'] = base64_encode(gzcompress(serialize($_POST['features'])));
            }
            $path = $this->upload('product',$_FILES['logo']);
            if($path){
                $_POST['logo'] = '/Public/'.$path;
            }
            $_POST['ctime'] = NOW_TIME;
            $shuju = $product->create();
            $pdt_id = $product->add($shuju);
            if($pdt_id){
                $upload = new \Think\Upload();// 实例化上传类
                $upload->maxSize   =     3145728 ;// 设置附件上传大小
                $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
                $upload->rootPath  =     './Public/'; // 设置附件上传根目录
                $upload->savePath  =     'Upl/product/'; // 设置附件上传（子）目录
                // 上传文件 
                $info   =   $upload->upload(array($_FILES['url']));
                $photos = array();
                $temp['pdt_id'] = $pdt_id;
                if($info){
                    foreach($info as $_k=>$_v){
                        $temp['url'] = '/Public/'.$_v['savepath'].$_v['savename'];
                        $photos[] = $temp;
                    }
                }
                M('product_photo')->addAll($photos);
                $this->success('产品保存成功',U('showlist'),1);exit;
            }
            $this->error('产品保存失败');exit;
        }else{
           $this->display();
        }
    }


    function upd(){
        $product = M('product');
        if(IS_POST){
            $pdt_id = intval($_GET['pdt_id']);
            foreach($_POST['features'] as $key=>$value){
                if(empty($value)){
                    unset($_POST['features'][$key]);
                }else{
                    $_POST['features'][$key] = $value;
                }
            }
            if(empty($_POST['features'])){
                $_POST['features'] = '';
            }else{
                $_POST['features'] = base64_encode(gzcompress(serialize($_POST['features'])));
            }
            
            $path = $this->upload('product',$_FILES['logo']);
            if($path){
                unlink('.'.$_POST['oldlogo']);
                $_POST['logo'] = '/Public/'.$path;
            }
            $shuju = $product->create();
            $product->where("pdt_id = {$pdt_id}")->save($shuju);
            //更新产品相册
            $upload = new \Think\Upload();// 实例化上传类
            $upload->maxSize   =     3145728 ;// 设置附件上传大小
            $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
            $upload->rootPath  =     './Public/'; // 设置附件上传根目录
            $upload->savePath  =     'Upl/product/'; // 设置附件上传（子）目录
            // 上传文件 
            $info   =   $upload->upload(array($_FILES['url']));
            $photos = array();
            $temp['pdt_id'] = $pdt_id;
            $model = M('product_photo');
            if($_POST['delpicture']){
                foreach($_POST['delpicture'] as $_key=>$_value){
                    unlink('.'.$_value);
                    $model->delete(intval($_key));
                }
            }
            if($info){
                foreach($info as $_k=>$_v){
                    $temp['url'] = '/Public/'.$_v['savepath'].$_v['savename'];
                    $photos[] = $temp;
                }
                M('product_photo')->addAll($photos);
            }
            $this->success('产品保存成功',U('showlist'),1);exit;
        }else{
            $pdt_id = intval($_GET['pdt_id']);
            $productinfo = $product->find($pdt_id);
            $productinfo['features'] = unserialize(gzuncompress(base64_decode($productinfo['features'])));
            $photos = M('product_photo')->where("pdt_id = {$pdt_id}")->order("id")->select();
            $this->assign('productinfo',$productinfo);
            $this->assign('photos',$photos);
        }
        $this->display();
    }

    
    function del(){
        if(IS_GET){
            $pdt_id = intval($_GET['pdt_id']);
            $photos = M('product_photo')->where("pdt_id = {$pdt_id}")->select();
            if(M('product')->where("pdt_id = {$pdt_id}")->delete()){
                foreach($photos as $value){
                    unlink('.'.$value['url']);
                    M('product_photo')->delete($value['id']);
                }
                $this->success('已删除一条数据',U('showlist'),1);exit;
            }
            $this->error('删除数据失败');
        }
    }

    /*function typelist(){
        if($_POST){
            $search = $_POST;
            $map['type_name'] = array('LIKE',"%{$search['search']}%");
        }else{
            $map = '';
        }

        $count = D('Type') ->where($map)-> count();
        $p = new \Think\Page($count,10);
        $info =  D('Type')
            ->order('type_id desc')
            ->where($map)
            ->limit($p->firstRow.','.$p->listRows)
            ->select();
        $page = $p->show();
        $this -> assign('page',$page);
        $this -> assign('info',$info);
        $this->display();
    }
    function add_type(){
        if(IS_POST){
            $news= D('Type');
            $info = $news->create();

            if($news->add($info)){
                $this->success('添加成功','typelist',1);
            }else{
                $this->error('添加失败','add_type',1);
            }
        }else{
            $this->display();
        }
    }
    function upd_type(){
        $type_id = I('get.type_id');
        $news= D('Type');
        if(IS_POST){
            $shuju = $news->create();
            if($news->save($shuju)){
                $this -> success('修改成功',U('typelist'),1);
            }else{
                $this -> error('修改失败',U('upd_type',array('type_id'=>$type_id)),1);
            }
        }else{
            $info = $news->find($type_id);
            $this -> assign('info',$info);
            $this -> display();
        }
    }

    function del_type(){
        $type_id = I('get.type_id');

        if(D('Type')->delete($type_id)){
            $this->success('删除成功',U('typelist'));
        }else{
            $this->error('删除失败',U('del_type',array('type_id'=>$type_id)),1);
        }
    }*/
}