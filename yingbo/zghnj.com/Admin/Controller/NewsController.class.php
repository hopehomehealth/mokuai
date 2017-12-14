<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/3/29 0029
 * Time: 10:07
 */
namespace Admin\Controller;
use Common\Common\AdminController;
class NewsController extends AdminController
{
    private function catelist(){
        $model = M('category');
        $result = $model->order("sort,cat_id")->select();
        $catlist = array();
        foreach($result as $_key=>$_value){
            if($_value['pid'] == 0){
                $catlist[] = $_value;
                foreach($result as $_k=>$_v){
                    if($_v['pid'] == $_value['cat_id']){
                        $catlist[] = $_v;
                    }
                }
            }
        }
        return $catlist;
    } 
    function showlist(){
        if(isset($_GET['search']) && !empty($_GET['search'])){
            $search = $_GET['search'];
            $map['title'] = array('LIKE',"%{$search}%");
        }
        if(isset($_GET['cat_id']) && ($_GET['cat_id'] != '')){
            $map['n.cat_id'] = intval($_GET['cat_id']);
        }
        if(!isset($map)){
            $map = '';
        }
        $count = D('News')->alias('n')
            ->join('__CATEGORY__ c on n.cat_id=c.cat_id')
            ->where($map)-> count();
        $p = new \Think\Page($count,15);
        $info =  D('News')
            ->alias('n')
            ->join('left join __CATEGORY__ c on n.cat_id=c.cat_id')
            ->order('news_id desc')
            ->field('n.*,c.cat_id,c.cat_name')
            ->where($map)
            ->limit($p->firstRow.','.$p->listRows)
            ->select();
        foreach($info as $key=>$value){
            if(empty($value['cat_id'])){
                $info[$key]['cat_name'] = '关注热点';
                $info[$key]['cat_id'] = 0;
            }
        }
        $page = $p->show();
        $this -> assign('page',$page);
        $this -> assign('info',$info);
        $this -> assign('catlist',$this->catelist());
        $this->display();
    }

    function tianjia(){
        if(IS_POST){
            $news = D('News');
            $info = $news->create();
            $info['add_time'] = time();
            $info['upd_time'] = time();
            $info['content'] = $_POST['content'];


            $cfg = array(
                'rootPath'    =>  './Public/Upd/news/', //保存根路径
            );
            $up = new \Think\Upload($cfg);
            $z = $up -> uploadOne($_FILES['pic']);

            $picname = $up->rootPath.$z['savepath'].$z['savename'];
            $info['pic'] = $picname;

            if($news->add($info)){
                $this->success('发布成功',U('News/showlist',array('p'=>$_GET['nowpage']?$_GET['nowpage']:1)));
            }else{
                $this->error('发布失败',U('News/tianjia',array('nowpage'=>$_GET['nowpage']?$_GET['nowpage']:1)));
            }
        }else{
            $this -> assign('catlist',$this->catelist());
            $this->display();
        }
    }


    function upd(){
        $news_id = I('get.news_id');
        $news = D('News');
        if(IS_POST){
            $shuju = $news -> create();
            $shuju['upd_time'] = time();
            $shuju['content'] = $_POST['content'];
            if($_FILES['pic']['error']===0) {
                if (!empty($shuju['news_id'])) {
                    $oldinfo = D('News')->find($shuju['news_id']);
                    if (!empty($oldinfo['pic'])) {
                        unlink($oldinfo['pic']);
                    }
                }

                $cfg = array(
                    'rootPath'    =>  './Public/Upd/news/', //保存根路径
                );
                $up = new \Think\Upload($cfg);
                $z = $up -> uploadOne($_FILES['pic']);

                //把上传的图片"路径名"保存到数据库中
                $picname = $up->rootPath.$z['savepath'].$z['savename'];
                $shuju['pic'] = $picname;
            }

            if($news->save($shuju)){
                $this -> success('修改成功',U('News/showlist',array('p'=>$_GET['nowpage']?$_GET['nowpage']:1)),1);
            }else{
                $this -> error('修改失败',U('upd',array('news_id'=>$news_id,'nowpage'=>$_GET['nowpage']?$_GET['nowpage']:1)),1);
            }
        }else{
            $this -> assign('catlist',$this->catelist());
            $info = $news->find($news_id);
            $this -> assign('info',$info);
            $this -> display();
        }
    }

    //批量展示
    function zhanshi(){
        $news = M('News');
        if(IS_GET){
            $news_id = $_GET['news_id'];
            if($news->where("news_id = {$news_id}")->setField('is_show','0')){
                $this->success('已成功展示一条数据',U('News/showlist',array('p'=>$_GET['nowpage']?$_GET['nowpage']:1)),1);
            }
        }
        if(IS_POST){
            $str_ids = implode(',',$_POST['news_id']);
            $map['news_id'] = array('in',$str_ids);
            if($str_ids == ''){
                $this->error('非法操作');
            }else{
                $news -> where($map) ->setField('is_show','0');
                $this->success('批量操作成功',U('News/showlist',array('p'=>$_GET['nowpage']?$_GET['nowpage']:1)),1);
            }
        }
    }

    //批量隐藏
    function yincang(){
        $news = M('News');
        if(IS_GET){
            $news_id = $_GET['news_id'];
            if($news->where("news_id = {$news_id}")->setField('is_show','1')){
                $this->success('已成功隐藏一条数据',U('News/showlist',array('p'=>$_GET['nowpage']?$_GET['nowpage']:1)),1);
            }
        }
        if(IS_POST){
            $str_ids = implode(',',$_POST['news_id']);
            $map['news_id'] = array('in',$str_ids);
            if($str_ids == ''){
                $this->error('非法操作');
            }else{
                $news -> where($map) ->setField('is_show','1');
                $this->success('批量隐藏成功',U('News/showlist',array('p'=>$_GET['nowpage']?$_GET['nowpage']:1)),1);
            }
        }
    }
    function del(){
        $news = M('News');
        if(IS_GET){
            $news_id = $_GET['news_id'];
            if($news->where("news_id = {$news_id}")->delete()){
                $this->success('已删除一条数据',U('News/showlist',array('p'=>$_GET['nowpage']?$_GET['nowpage']:1)),1);
            }
        }
        if(IS_POST){
            $str_ids = implode(',',$_POST['news_id']);
            $map['news_id'] = array('in',$str_ids);
            if($str_ids == ''){
                $this->error('非法操作');
            }else{
                $news -> where($map) ->delete();
                $this->success('批量删除成功',U('News/showlist',array('p'=>$_GET['nowpage']?$_GET['nowpage']:1)),1);
            }
        }
    }

    function cases(){
        $model = M('case');
        $count = $model->count();
        $p = new \Think\Page($count,15);
        $cases = $model->order('sort,ctime')->limit($p->firstRow.','.$p->listRows)->select();
        $page = $p->show();
        $this->assign('page',$page);
        $this->assign('cases',$cases);
        $this->display();
    }
    function add_case(){
        if(IS_POST){
            $model = M('case');
            $path = $this -> upload('case',$_FILES['picture']);
            if($path){
                $_POST['picture'] = '/Public/'.$path;
            }
            $_POST['ctime'] = NOW_TIME;
            if($model->create()){
                if($model->add()){
                    $this->success('添加成功',U('cases'));exit;
                }
            }
            $this->error('添加失败');exit;
        }
        $this->display();
    }
    function upd_case(){
        $id = intval($_GET['id']);
        $model = M('case');
        if(IS_POST){
            $path = $this -> upload('case',$_FILES['picture']);
            if($path){
                $_POST['picture'] = '/Public/'.$path;
            }
            if($model->create()){
                if($model->where("id = {$id}")->save()){
                    $this->success('修改成功',U('cases'));exit;
                }
            }
            $this->error('修改失败');exit;
        }
        $caseinfo = $model->find($id);
        $this->assign('caseinfo',$caseinfo);
        $this->display();
    }
    function del_case(){
        $id = intval($_GET['id']);
        $model = M('case');
        if($model->delete($id)){
            $this->success('删除成功');exit;
        }
        $this->error('修改失败');exit;
        $this->display();
    }
}