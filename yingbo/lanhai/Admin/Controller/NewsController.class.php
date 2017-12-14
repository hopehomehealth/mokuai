<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/8/9 0009
 * Time: 11:35
 */

namespace Admin\Controller;
use Common\Common\AdminController;

class NewsController extends AdminController
{
    function showlist(){
         if($_POST){
            $search = $_POST;
            $map['news_title'] = array('LIKE',"%{$search['search']}%");
        }else{
            $map = '';
        }

        $count = D('News') ->where($map)-> count();

        $p = new \Think\Page($count,10);
        $info =  D('News')
            ->alias('n')
            ->join('__LANMU__ l on n.lan_id=l.lan_id')
            ->field('n.*,l.lan_title')
            ->order('news_id desc')
           ->where($map)
            ->limit($p->firstRow.','.$p->listRows)
            ->select();

		foreach($info as $k=>$v){
$match = substr($info[$k]['picfirst'],0,4);
$info[$k]['match'] = $match;
		}


        $page = $p->show();
        $p = I('get.p');
$this->assign('p',$p);
        $this -> assign('page',$page);
        $this -> assign('info',$info);
        $this->display();
    }

	function del1() {
$news_id = I('get.news_id');
D('News')->where("news_id=$news_id")->setField('pic','');
$this->redirect('News/upd', array('news_id' => $news_id));
	}

    function tianjia(){

        if(IS_POST){
            $news = new \Model\NewsModel();
            $shuju = $news->create();

            $shuju['upd_time'] = time();
            $shuju['content'] = $_POST['content'];
			$parrent = "/(href|src)=([\"|']?)([^\"'>]+.(jpg|JPG|jpeg|JPEG|gif|GIF|png|PNG))/i";
			$str = $_POST['content'];
			 preg_match($parrent,$str,$match);
			 //dump($match);die;

			$shuju['picfirst'] = $match[3];

            if($_POST['ext_lan'][0] == 0){
                 $shuju['lan_id'] = $_POST['lan_id'];
            } else{
                  $shuju['lan_id']=$_POST['ext_lan'][0];
            }
             if($shuju['lan_id']==38){
                $this->pdf($shuju);
             }


if(!empty($_FILES['pic']['name'])){
            $cfg = array(
                'rootPath'    =>  './Public/Upl/news/', //保存根路径
            );
            $up = new \Think\Upload($cfg);$im = new \Think\Image();
            $z = $up -> uploadOne($_FILES['pic']);

            $picname = $up->rootPath.$z['savepath'].$z['savename'];
			 $im -> open($picname);//打开原图
            $im -> thumb(540,295,\Think\Image::IMAGE_THUMB_CENTER); //大图 缩略图
            $liename = $up->rootPath.$z['savepath'].'l_'.$z['savename'];
            $im -> save($liename);

	    $im ->thumb(310,180,3);
	    $mob = $up->rootPath.$z['savepath'].'m_'.$z['savename'];
	    $im -> save($mob);
	    $shuju['picmobile'] = $mob;

$im -> thumb(300,300,3);
            $bigname = $up->rootPath.$z['savepath'].'b_'.$z['savename'];
            $im -> save($bigname);
			$shuju['piclie'] = $liename;
            $shuju['pictui'] = $bigname;
	    


            $shuju['pic'] = $picname;
//            dump($shuju);die;
}

            if(empty($_POST['news_title'])){
                $this->error('文章标题不能为空');
                exit;
            }

            if(empty($_POST['content'])){
                $this->error('文章内容不能为空');
                exit;
            }
	    if(empty($_POST['author'])){
                $this->error('作者不能为空');
                exit;
            }
			 if($_POST['lan_id'] == 0){
                $this->error('请选择栏目');
                exit;
            }
           
            if($news->add($shuju)){
                $this->success('发布成功','showlist');
            }else{

                $this->error('发布失败','tianjia');
            }
        }else{
            /****获得“第一级栏目信息”并传递给模板****/
            $laninfoA = D('Lanmu')
                ->where(array('level'=>0))
                ->select();
            foreach($laninfoA as $k=>$v){
                if($v['lan_id'] == 7 | $v['lan_id'] == 1){
                    unset($laninfoA[$k]);
                }
            }
            $this -> assign('laninfoA',$laninfoA);
            /****获得“第一级栏目信息”并传递给模板****/

            //顶部广告
            $dinginfo = D('Bannerx')->where("is_show='0' AND is_del='0' AND is_area='0'")->select();
            $this->assign('dinginfo',$dinginfo);
            //右一广告
            $youyiinfo = D('Bannerx')->where("is_show='0' AND is_del='0' AND is_area='1'")->select();
            $this->assign('youyiinfo',$youyiinfo);
            //右二广告
            $youerinfo = D('Bannerx')->where("is_show='0' AND is_del='0' AND is_area='2'")->select();
            $this->assign('youerinfo',$youerinfo);
            //右三广告
            $yousaninfo = D('Bannerx')->where("is_show='0' AND is_del='0' AND is_area='3'")->select();
            $this->assign('yousaninfo',$yousaninfo);
            $this->display();
        }
    }


    function upd(){
        $news_id = I('get.news_id');
        $news = new \Model\NewsModel();
        $p = I('get.p');
        if(IS_POST){
            //dump($_POST);die;
            $shuju = $news -> create();
			$shuju['add_time'] = $_POST['add_time'];
            $shuju['upd_time'] = time();

            $shuju['content'] = $_POST['content'];

			$parrent = "/(href|src)=([\"|']?)([^\"'>]+.(jpg|JPG|jpeg|JPEG|gif|GIF|png|PNG))/i";
			$str = $_POST['content'];
			 preg_match($parrent,$str,$match);



$shuju['picfirst'] = $match[3];



            if($_POST['ext_lan'][0] == 0){
                $shuju['lan_id'] = $_POST['lan_id'];
            } else{
                $shuju['lan_id']=$_POST['ext_lan'][0];
            }

            if($_FILES['pdf']['error']===0) {
                if (!empty($shuju['news_id'])) {
                    $oldinfo = D('News')->find($shuju['news_id']);
                    if (!empty($oldinfo['pdf'])) {
                        unlink($oldinfo['pdf']);
                    }
                }
            }
            if($shuju['lan_id']==38){
                $this->pdf($shuju);
            }
            if($_FILES['pic']['error']===0) {
                if (!empty($shuju['news_id'])) {
                    $oldinfo = D('News')->find($shuju['news_id']);
                    if (!empty($oldinfo['pic'])) {
                        unlink($oldinfo['pic']);
                    }
		     if (!empty($oldinfo['pictui'])) {
                        unlink($oldinfo['pictui']);
                    }
		     if (!empty($oldinfo['piclie'])) {
                        unlink($oldinfo['piclie']);
                    }
		      if (!empty($oldinfo['picmobile'])) {
                        unlink($oldinfo['picmobile']);
                    }		    
                }

                $cfg = array(
                    'rootPath'    =>  './Public/Upl/news/', //保存根路径
                );
                $up = new \Think\Upload($cfg);$im = new \Think\Image();
                $z = $up -> uploadOne($_FILES['pic']);

                //把上传的图片"路径名"保存到数据库中
                $picname = $up->rootPath.$z['savepath'].$z['savename'];
				 $im -> open($picname);//打开原图
				  $im -> thumb(540,295,\Think\Image::IMAGE_THUMB_CENTER); //大图 缩略图
            $liename = $up->rootPath.$z['savepath'].'l_'.$z['savename'];
            $im -> save($liename);
$im ->thumb(310,180,3);
$mob = $up->rootPath.$z['savepath'].'m_'.$z['savename'];
$im -> save($mob);
	    $shuju['picmobile'] = $mob;	    
            $im -> thumb(300,300,3); //大图 缩略图
            $bigname = $up->rootPath.$z['savepath'].'b_'.$z['savename'];
            $im -> save($bigname);
            $shuju['pictui'] = $bigname;
			$shuju['piclie'] = $liename;
                $shuju['pic'] = $picname;

	
            }
               //dump($shuju);die;
            if($news->save($shuju)){
                $this -> success('修改成功',U('showlist',array('news_id'=>$news_id,'p'=>$p)),1);
            }else{
                $this -> error('修改失败',U('upd',array('news_id'=>$news_id,'p'=>$p)),1);
            }
        }else{
            $info = $news->where(array('news_id'=>$news_id))->find();
//dump($info);die;
            $son_lan_id = $info['lan_id'];
            $laninfo1 = D('Lanmu')
                ->where(array('level'=>0))
                ->find($son_lan_id);
            //dump($laninfo1);die;
            $now_pid = $laninfo1['pid'];
            if($now_pid == 0){
                $info['now_pid']=$son_lan_id;
            } else{
                $info['now_pid']=$now_pid;
            }

            //dump($info);die;
            /****获得“第一级栏目信息”并传递给模板****/
            $laninfoA = D('Lanmu')
                ->where(array('level'=>0))
                ->select();
            foreach($laninfoA as $k=>$v){
                if($v['lan_id'] == 7 | $v['lan_id'] == 1){
                    unset($laninfoA[$k]);
                }
            }
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
            //顶部广告
            $dinginfo = D('Bannerx')->where("is_show='0' AND is_del='0' AND is_area='0'")->select();
            $this->assign('dinginfo',$dinginfo);
            //dump($dinginfo);die;
            //右一广告
            $youyiinfo = D('Bannerx')->where("is_show='0' AND is_del='0' AND is_area='1'")->select();
            $this->assign('youyiinfo',$youyiinfo);
            //右二广告
            $youerinfo = D('Bannerx')->where("is_show='0' AND is_del='0' AND is_area='2'")->select();
            $this->assign('youerinfo',$youerinfo);
            //右三广告
            $yousaninfo = D('Bannerx')->where("is_show='0' AND is_del='0' AND is_area='3'")->select();
            $this->assign('yousaninfo',$yousaninfo);
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
    	foreach($info as $k=>$v){
$match = substr($info[$k]['picfirst'],0,4);
$info[$k]['match'] = $match;
		}
        $page = $p->show();
                $p = I('get.p');
$this->assign('p',$p);
        $this -> assign('page',$page);
        $this -> assign('info',$info);
        $this->display();
    }
    function tuilist(){

        $info =  D('News')
            ->alias('n')
            ->join('__LANMU__ l on n.lan_id=l.lan_id')
            ->field('n.*,l.lan_title')
            ->order('news_id desc')
            ->where("n.is_show='0' AND n.is_tui='0'")
            ->select();
				foreach($info as $k=>$v){
$match = substr($info[$k]['picfirst'],0,4);
$info[$k]['match'] = $match;
		}
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



    private function pdf(&$data){
        //引入类库
        Vendor('mpdf.mpdf');
        //设置中文编码
        $mpdf=new \mPDF('zh-cn','A4', 0, '宋体', 0, 0);
        $mpdf->SetWatermarkText('蓝海长青',0.1);
        $strContent = $data['content'];
        $mpdf->showWatermarkText = true;
        $mpdf->SetHTMLHeader( $data['news_title'] );
        $mpdf->SetHTMLFooter( 'www.lanhai.com  蓝海长青版权所有' );
        //$stylesheet =file_get_contents('themes/wei/css/bootstrap.min.css');
        //$mpdf->WriteHTML($stylesheet, 1);
        $mpdf->WriteHTML($strContent);

        $title = time();
        //保存ss.pdf文件
        $mpdf->Output("./Public/Upl/pdf/$title.pdf");
        //直接浏览器输出pdf
//        $mpdf->Output("./Public/Upl/pdf/$title.pdf",true);
//        $mpdf->Output("./Public/Upl/pdf/$title.pdf",'d');
//        $mpdf->Output();
//        exit;
        $name="./Public/Upl/pdf/$title.pdf";
        $data['pdf']=$name;
    }
}