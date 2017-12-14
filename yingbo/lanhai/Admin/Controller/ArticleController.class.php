<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/8/9 0009
 * Time: 11:35
 */

namespace Admin\Controller;
use Common\Common\AdminController;

class ArticleController extends AdminController
{
    //文章列表
    function showlist(){
        if($_GET['search']){
            $map['title'] = array('LIKE',"%{$_GET['search']}%");
            $map['username'] = array('LIKE',"%{$_GET['search']}%");
            $map['_logic'] = 'OR';
        }else{
            $map = '';
        }
        $bbsset = M('bbs')->field("pg_admin")->find();//获取论坛分页设置
        $art_model = M('article');
        $count = $art_model->alias('a')->join('cq_user as u on u.user_id=a.user_id') ->where($map)-> count();
        $p = new \Think\Page($count,$bbsset['pg_admin']);
        $articles =  $art_model
            ->alias('a')
            ->join('cq_user as u on u.user_id=a.user_id')
            ->join("left join cq_bgclass as c on c.class_id = a.class_id")
            ->field('a.*,u.username,c.class_name')
            ->order('a.is_hot desc,a.add_time desc')
            ->where($map)
            ->limit($p->firstRow.','.$p->listRows)
            ->select();
   
        $page = $p->show();
        $this -> assign('page',$page);
        //dump($articles);die;
        $this -> assign('articles',$articles);
        $this->display();
    }

    //推荐与普通标记操作
    function sort(){
        $art_model = M('article');
        if(IS_GET){
            if($_GET['is_hot'] == '0'){
                $art_model->where("art_id = {$_GET['art_id']}")->setField("is_hot",'1');
                $this->ajaxReturn(array(
                        'error'=>0,
                        'type' =>1
                    ));
            }else{
                $art_model->where("art_id = {$_GET['art_id']}")->setField("is_hot",'0');
                $this->ajaxReturn(array(
                        'error'=>0,
                        'type' =>2
                    ));
            }
        }
        if(IS_POST){
            $str_ids = implode(',',$_POST['art_id']);
            $map['art_id'] = array('in',$str_ids);
            if($str_ids == ''){
                $this->error('非法操作');
            }else{
                $art_model -> where($map) ->setField('is_hot',$_POST['optype']);
                $this->success('批量操作成功');
            }  
        }
    }

    //删除操作
    function doremove(){
        $art_model = M('article');
        if(IS_GET){
            $art_id = $_GET['art_id'];
            if($art_model->where("art_id = {$art_id}")->delete()){
                $this->ajaxReturn(array(
                        'error'=>0,
                    ));
            }
        }
        if(IS_POST){
            $str_ids = implode(',',$_POST['art_id']);
            $map['art_id'] = array('in',$str_ids);
            if($str_ids == ''){
                $this->error('非法操作');
            }else{
                $art_model -> where($map) ->delete();
                $this->success('批量操作成功');
            }  
        }
    }
    function upd(){
        $news_id = I('get.news_id');
        $news = new \Model\NewsModel();
        if(IS_POST){
            $shuju = $news -> create();
            $shuju['upd_time'] = time();

            $shuju['content'] = $_POST['content'];

            if($_POST['ext_lan'][0] == 0){
                $shuju['lan_id'] = $_POST['lan_id'];
            } else{
                $shuju['lan_id']=$_POST['ext_lan'][0];
            }
            if($_FILES['pic']['error']===0) {
                if (!empty($shuju['news_id'])) {
                    $oldinfo = D('News')->find($shuju['news_id']);
                    if (!empty($oldinfo['pic'])) {
                        unlink($oldinfo['pic']);
                    }
                }

                $cfg = array(
                    'rootPath'    =>  './Public/Upl/news/', //保存根路径
                );
                $up = new \Think\Upload($cfg);
                $z = $up -> uploadOne($_FILES['pic']);

                //把上传的图片"路径名"保存到数据库中
                $picname = $up->rootPath.$z['savepath'].$z['savename'];
                $shuju['pic'] = $picname;
            }
               //dump($shuju);die;
            if($news->save($shuju)){
                $this -> success('修改成功',U('showlist'),1);
            }else{
                $this -> error('修改失败',U('upd',array('news_id'=>$news_id)),1);
            }
        }else{
            $info = $news->find($news_id);
            $son_lan_id = $info['lan_id'];
            $laninfo1 = D('Lanmu')
                ->where(array('level'=>0))
                ->find($son_lan_id);

            $now_pid = $laninfo1['pid'];
            $info['now_pid']=$now_pid;
            //dump($info);die;
            /****获得“第一级栏目信息”并传递给模板****/
            $laninfoA = D('Lanmu')
                ->where(array('level'=>0))
                ->select();
            $this -> assign('laninfoA',$laninfoA);
            /****获得“第一级栏目信息”并传递给模板****/
            /****获得文章的所有扩展栏目信息****/
            $ext = D('NewsLanmu')
                ->where(array('news_id'=>$news_id))
                ->field('group_concat(lan_id) as extids')
                ->find();
            $extlanids = $ext['extids'];
            $this -> assign('extlanids',$extlanids);
            /****获得文章的所有扩展栏目信息****/

            $this -> assign('info',$info);
            $this -> display();
        }
    }

    function typelist(){

        $lan_id=I('get.lan_id');
        //dump($lan_id);die;
        if($_POST){
            $lan_id = $_POST['lan_id'];
            $search1 = $_POST;
            $map['news_title'] = array('LIKE',"%{$search1['search1']}%");
        }else{
            $map = "";
        }
        $map['b.lan_id']  =$lan_id;
        $count = D('News') ->alias('b')->where($map)-> count();
        $p = new \Think\Page($count,10);
        $info =  D('News')
            ->alias('b')
            ->join("__LANMU__ l on b.lan_id=l.lan_id")
            ->field('b.*,l.lan_title')
            ->order('news_id desc')
            ->where($map)
            ->limit($p->firstRow.','.$p->listRows)
            ->select();
        // dump($info);die;
        $page = $p->show();
        $this -> assign('page',$page);
        $this -> assign('info',$info);
        $this->display();
    }
    
    
    
    //批量展示
    function zhanshi(){
        $news = M('News');
        if(IS_GET){
            $news_id = $_GET['news_id'];
            if($news->where("news_id = {$news_id}")->setField('is_show','0')){
                $this->success('已成功展示一条数据',U('showlist'),1);
            }
        }
        if(IS_POST){
            $str_ids = implode(',',$_POST['news_id']);
            $map['news_id'] = array('in',$str_ids);
            if($str_ids == ''){
                $this->error('非法操作');
            }else{
                $news -> where($map) ->setField('is_show','0');
                $this->success('批量操作成功',U('showlist'),1);
            }
        }
    }

    //批量隐藏
    function yincang(){
        $news = M('News');
        if(IS_GET){
            $news_id = $_GET['news_id'];
            if($news->where("news_id = {$news_id}")->setField('is_show','1')){
                $this->success('已成功隐藏一条数据',U('showlist'),1);
            }
        }
        if(IS_POST){
            $str_ids = implode(',',$_POST['news_id']);
            $map['news_id'] = array('in',$str_ids);
            if($str_ids == ''){
                $this->error('非法操作');
            }else{
                $news -> where($map) ->setField('is_show','1');
                $this->success('批量隐藏成功',U('showlist'),1);
            }
        }
    }


    function del(){

        $news = M('News');
        if(IS_GET){
            $news_id = $_GET['news_id'];
            if($news->where("news_id = {$news_id}")->delete()){
                $this->success('已删除一条数据',U('showlist'),1);
            }
        }
        if(IS_POST){
            $str_ids = implode(',',$_POST['news_id']);
            $map['news_id'] = array('in',$str_ids);
            if($str_ids == ''){
                $this->error('非法操作');
            }else{
                $news -> where($map) ->delete();
                $this->success('批量删除成功',U('showlist'),1);
            }
        }
    }

}