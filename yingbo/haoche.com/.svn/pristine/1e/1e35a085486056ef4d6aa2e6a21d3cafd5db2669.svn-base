<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/6/13
 * Time: 11:37
 */
namespace Admin\Controller;
use \Think\Controller;
class TnewsController extends Controller
{
       //列表
    function index(){
    	if($_POST){
            $search = $_POST;
            $map['title'] = array('LIKE',"%{$search['search']}%");
        }else{
            $map = '';
        }

        $count = D('img') -> count();
        $p = new \Think\Page($count,10);
        $list = D('img')
            
            ->where($map)
            -> order('id desc') ->limit($p->firstRow.','.$p->listRows)-> select();
        $page = $p->show();
        $this -> assign('page',$page);

		$this->assign('list',$list);
        $this->display();
    }

    


    //添加
    function tianjia(){
        $this->display();
    } 
	//未定义时回复
	function tianjia_n(){
        $this->display();
    }

	//添加数据
	function insert(){
		$cfg = array(
                    'rootPath'    =>  './Public/', //保存根路径
                     'savepath'  => 'Upl/news/',

                );
		$up = new \Think\Upload($cfg);
		$z = $up -> uploadOne($_FILES['pic']);

		//把上传的图片"路径名"保存到数据库中
		$picname = $up->rootPath.$z['savepath'].$z['savename'];
		//echo $picname;exit;
		$url = $_POST['url'];
		$content = $_POST['content'];
		$title=$_POST['title'];
		$description = $_POST['description'];
		$key = $_POST['keyword'];
		$time = date("Y-m-d H:i:s");
		
		$insert = M('img')->add(array('keyword'=>$key,'jianjie'=>$description,'title'=>$title,'img_url'=>$picname,'descs'=>$content,'url'=>$url,'addTime'=>$time));
		if($insert){
			$this->success('添加成功',U('index'));
		}else{
			$this->success('系统繁忙，请稍后操作！',U('添加'));
		}
	}


    //修改
    function upd(){
		$keyword = D('img');
		if(IS_POST){
			if($_FILES['pic']['error']===0) {
                if (!empty($POST['t_id'])) {
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

                //把上传的图片"路径名"保存到数据库中
                $picname = $up->rootPath.$z['savepath'].$z['savename'];
                $data['img_url'] = $picname;

            }
			$data['descs'] = $_POST['content'];
			$data['jianjie'] = $_POST['description'];
			$data['keyword'] = $_POST['keyword'];
			$data['title'] = $_POST['title'];
			$data['url'] = $_POST['url'];
			$info = $keyword->where(array('id'=>$_POST['t_id']))->save($data);
			//echo $keyword->getlastsql();exit;
			if($info){
				$this->success('编辑成功',U('index'));
			}else{
				$this->error('系统繁忙，请稍后操作！',U('del',array('id'=>$_POST['news_id'])),1);
			}
		}else{
			
			$news_id = I('get.id');
			$info = $keyword->find($news_id);
			$info['img_url'] = substr($info['img_url'],1);
			$this->assign('info',$info);
			//$this->assign("type",$info['type']);
			$this->display();
		}
    }

	function content(){
		echo $_GET['id'];
	}

    function del(){
        $news_id = I('get.id');
//        $info = D('News')->find($news_id);
//        unlink($info['news_id']);

       if(D('img')->delete($news_id)){
           $this->success('删除成功',U('index'));
       }else{
           $this->error('系统繁忙，请稍后操作！',U('del',array('id'=>$news_id)),1);
       }
    }
}