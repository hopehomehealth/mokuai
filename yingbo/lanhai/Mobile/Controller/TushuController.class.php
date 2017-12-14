<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/8/9 0009
 * Time: 11:35
 */

namespace Mobile\Controller;
use Common\Common\ComController;

class TushuController extends ComController
{
    function tushulist(){
        $lan_id= 38;
        $adinfo=D('Banner')->where("lan_id={$lan_id} AND is_show='0' AND is_del='0'")->order('add_time desc')->limit(0,1)->select();
//        dump($adinfo);die;
        $this->assign('adinfo',$adinfo);
        $news = D('News');
        $map['lan_id']= $lan_id;
        $map['is_show'] ='0';
        $map['is_del'] = '0';
        $info1 = $news->where($map)->order('click desc')->limit('0,1')->select();
      $news_id = $info1[0]['news_id'];
        $add_time =$info1[0]['add_time'];
        $this->assign('info1',$info1);
        $count =$news ->where($map)-> count();
        $p = new \Think\Page($count,5);
        $page = $p->show();
        foreach($map as $key=>$val) {
            $p->parameter   .=   "$key=".urlencode($val[1]).'&';
        }
   $adinfo=D('Banner')->where("lan_id={$lan_id} AND is_show='0'")->select();
        $this->assign('adinfo',$adinfo);
		//dump($adinfo);die;
        $info = $val = D('News')
            ->order('click desc')
            ->limit($p->firstRow.','.$p->listRows)
            ->where($map)

            ->select();
        foreach($info as $key=>$value){
			if($info[$key]['news_id']==$news_id){
            unset($info[$key]);
			}
        }
        $totalPages = $p->totalPages;
        if(IS_POST){
            $this->ajaxReturn(array(
                'error'   => 0,
                'content' => $info
            ));
        }

        $this->assign("totalPages",$totalPages);
        $this->assign('info',$info);
        $this -> assign('page',$page);

        $this->display();
    }

    public function downFile($path = ''){
        $news_id= I('get.news_id');
        $info=D('News')->where("news_id={$news_id}")->find();
        $pdf=$info['pdf'];
        $path=$pdf;
        if(!$path) header("Location: /");
        $this->download($path);
    }

    private function download($file_url,$new_name=''){
        if(!isset($file_url)||trim($file_url)==''){
            echo '500';
        }
        if(!file_exists($file_url)){ //检查文件是否存在
            echo '404';
        }
        $file_name=basename($file_url);
        $file_type=explode('.',$file_url);
        $file_type=$file_type[count($file_type)-1];
        $file_name=trim($new_name=='')?$file_name:urlencode($new_name);
        $file_type=fopen($file_url,'r'); //打开文件
        //输入文件标签
        header("Content-type: application/octet-stream");
        header("Accept-Ranges: bytes");
        header("Accept-Length: ".filesize($file_url));
        header("Content-Disposition: attachment; filename=".$file_name);
        //输出文件内容
        echo fread($file_type,filesize($file_url));
        fclose($file_type);
    }


    function detail(){

        $news_id= I('get.news_id');
        if($news_id == ''){
            $news_id = $_POST['news_id'];
        }

        $news = D('News');
        $news->where(array('news_id'=>$news_id))->setInc('click',1);
        $info=$news->find($news_id);
        $content = str_replace("_ueditor_page_break_tag_","",$info['content']);
        $info['content'] = $content;
        dump($info);exit;
        $this->assign('info',$info);

        $count = D('Ncomment')->where("news_id=$news_id")->count();

        $p = new \Think\Page($count,10);
        $cominfo = D('Ncomment')->where("news_id=$news_id")->order('add_time desc')->limit($p->firstRow.','.$p->listRows)->select();
        foreach($cominfo as $key=>$value){
            $cominfo[$key]['add_time'] = date("Y-m-d H:i",$value['add_time']);
        }
        $totalPages = $p->totalPages;
        if(IS_POST){
            $this->ajaxReturn(array(
                'error'   => 0,
                'content' => $cominfo
            ));
        }
        $this->assign("totalPages",$totalPages);
        $this->assign('cominfo',$cominfo);
        //获得评论的总条数
        $commenttotal = $info['talk'];
        $this -> assign('commenttotal',$commenttotal);
        //分享到微信、qq
        vendor("Wxshare.JSSDK");
        $sysconf = M('sysconfig')->field("appid,appsecret")->find();
        $jssdk = new \JSSDK("{$sysconf['appid']}", "{$sysconf['appsecret']}");
        $signPackage = $jssdk->GetSignPackage();
        $this->assign('signPackage',json_encode($signPackage));//签名数据
        //dump($signPackage);exit;
        $shareData = array();//分享的数据
        $shareData['title']  = $info['news_title'].'_蓝海长青';
        $shareData['desc']  =  cutstr(htmlspecialchars_decode(strip_tags($info['content'])),20);
        $shareData['link']  =  SITE_URL.'/index.php/Home/News/detail/news_id/'.$info['news_id'];
        if(!empty($info['pic'])){
            $shareData['imgUrl']  = 'http://'.$_SERVER['HTTP_HOST'].$info['pic']; 
        }else{
            $shareData['imgUrl']  = $info['picfirst'];
        }
        
        $this->assign('shareData',json_encode($shareData));
        $this->display();
    }

}