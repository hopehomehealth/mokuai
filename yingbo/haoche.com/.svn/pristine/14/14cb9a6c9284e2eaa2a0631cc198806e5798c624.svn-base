<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/8/9 0009
 * Time: 11:35
 */

namespace Admin\Controller;
use Think\Controller;

class NewsController extends Controller
{
    function showlist(){
         if($_POST){
            $search = $_POST;
            $map['title'] = array('LIKE',"%{$search['search']}%");
        }else{
            $map = '';
        }
        
        $count = D('News') ->where($map)-> count();
        $p = new \Think\Page($count,10);
        $info =  D('News')
            ->alias('n')
            ->join('__NEWSTYPE__ ns on n.type_id=ns.type_id')
            ->order('news_id desc')
            ->where($map)
            ->where("is_show='0'")
            ->limit($p->firstRow.','.$p->listRows)
            ->select();
        $page = $p->show();
        $this -> assign('page',$page);
        $this -> assign('info',$info);
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
                $this->success('发布成功','showlist');
            }else{
                $this->error('发布失败','tianjia');
            }
        }else{
            $newstypeinfo = D('Newstype')->select();
            $this -> assign('newstypeinfo',$newstypeinfo);
            $this->display();
        }
    }


    function upd(){
        $news_id = I('get.news_id');
        $news = D('News');
        if(IS_POST){
            $shuju = $news -> create();
            $shuju['add_time'] = time();
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
                $this -> success('修改成功',U('showlist'),1);
            }else{
                $this -> error('修改失败',U('upd',array('news_id'=>$news_id)),1);
            }
        }else{
            $info = $news->find($news_id);

            $newstypeinfo = D('Newstype')->select();
            $this -> assign('newstypeinfo',$newstypeinfo);
            $this -> assign('info',$info);
            $this -> display();
        }
    }

    function del(){
        $news_id = I('get.news_id');

        if(D('News')->delete($news_id)){
            $this->success('删除成功',U('showlist'));
        }else{
            $this->error('删除失败',U('del',array('news_id'=>$news_id)),1);
        }
    }
}