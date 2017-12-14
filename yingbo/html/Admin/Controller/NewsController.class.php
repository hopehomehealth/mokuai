<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/6/13
 * Time: 11:37
 */
namespace Admin\Controller;
use Common\Common\AdminController;
class NewsController extends AdminController
{
       //列表
    function showlist(){
        if($_POST){
            $search = $_POST;
            $map['title'] = array('LIKE',"%{$search['search']}%");
        }else{
            $map = '';
        }
        
        $news = D('News');
        $count = $news -> count();
        $p = new \Think\Page($count,10);
        $info = $news ->where($map)
            -> order('news_id desc') ->limit($p->firstRow.','.$p->listRows)-> select();
        $page = $p->show();
        $this -> assign('page',$page);
        $this -> assign('info',$info);
        $this->display();
    }


    //添加
    function tianjia(){
       if(IS_POST){
           $news = D('News');
           $info = $news
               ->join('__COLUMN__ c on news.col_id = c.col_id')
               ->create();
           $info['input_time'] = time();
           $info['update_time'] = time();
           $info['content'] = $_POST['content'];
           $cfg = array(
               'rootPath'    =>  './Public/', //保存根路径
                 'savepath'  => 'Upl/news/',
           );
           $up = new \Think\Upload($cfg);
           $z = $up -> uploadOne($_FILES['pic']);
           $bigname = $up->rootPath.$z['savepath'].$z['savename'];
          $info['pic'] = $bigname;

          if($news->add($info)){
              $this->success('发布成功','showlist',1);
          }else{
              $this->error('发布失败','tianjia',1);
          }
       }else{

           /****获得“第一级栏目信息”并传递给模板****/
           $colinfoA = D('Column')
               ->where(array('level'=>0))
               ->select();
//           dump($colinfoA);die;
           $this -> assign('colinfoA',$colinfoA);

           /****获得“第一级栏目信息”并传递给模板****/

           /****获得供选取的上级(前两个级别)栏目信息****/
           $colinfo = D('Column')
               ->where(array('level'=>array('in','0,1')))
               ->select();

           $this -> assign('colinfo',$colinfo);
           /****获得供选取的上级(前两个级别)栏目信息****/
           $this->display();
       }
    }

    //修改
    function upd(){
        $news_id = I('get.news_id');
        $news = D('News');
        if(IS_POST) {
            $info = $news->create();
            $info['update_time'] = time();
            $info['content'] = $_POST['content'];
            if($_FILES['pic']['error']===0) {
                if (!empty($info['news_id'])) {
                    if (!empty($_POST['pic'])) {
                        unlink($_POST['pic']);
                    }
                }
                $cfg = array(
                    'rootPath'    =>  './Public/', //保存根路径
                     'savepath'  => 'Upl/news/',
                );
                $up = new \Think\Upload($cfg);
                $z = $up -> uploadOne($_FILES['pic']);
                $picname = $up->rootPath.$z['savepath'].$z['savename'];
                $info['pic'] = $picname;
            }
            if ($news->save($info)) {
                $this->success('修改成功', U('showlist'), 1);
            } else {
                $this->error('修改失败', U('upd', array('news_id' => $news_id)), 1);
            }
        }else{

            $info = $news->find($news_id);
            $this->assign('info',$info);
            $this->display();
       }
    }

    function del(){
        $news_id = I('get.news_id');
//        $info = D('News')->find($news_id);
//        unlink($info['news_id']);

       if(D('News')->delete($news_id)){
           $this->success('删除成功',U('showlist'));
       }else{
           $this->error('删除失败',U('del',array('news_id'=>$news_id)),1);
       }
    }
}