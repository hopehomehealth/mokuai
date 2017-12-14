<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/8/9 0009
 * Time: 11:35
 */

namespace Home\Controller;
use Common\Common\ComController;

class TushuController extends ComController
{
    function tushulist(){
      $title = "新书推荐_咨询服务_蓝海长青";
$this->assign('title',$title);
        $lan_id= 38;
        $news = D('News');
        $map['lan_id']= $lan_id;
        $map['is_show'] ='0';
        $info1 = $news->where($map)->order('add_time desc')->limit('0,1')->select();
        $add_time =$info1[0]['add_time'];
        $this->assign('info1',$info1);
        $count =$news ->where($map)  ->where("add_time < '{$add_time}'")-> count();

        $p = new \Think\Page($count,5);
        $page = $p->show();
        foreach($map as $key=>$val) {
            $p->parameter   .=   "$key=".urlencode($val[1]).'&';
        }

        $info = $val = D('News')
            ->order('add_time desc')

            ->limit($p->firstRow.','.$p->listRows)
            ->where($map)
            ->where("add_time < '{$add_time}'")
            ->select();
	//dump($info);die;
		foreach($info as $k=>$v){
$match = substr($info[$k]['picfirst'],0,4);
$info[$k]['match'] = $match;
		}
        $this->assign('info',$info);
        $this -> assign('page',$page);

$adinfo0=D('Banner')->where("lan_id={$lan_id} AND is_show='0' AND is_area='0'")->order('add_time desc')->limit(0,1)->select();
        $this->assign('adinfo0',$adinfo0);
        $adinfo3=D('Banner')->where("lan_id={$lan_id} AND is_show='0' AND is_area='3'")->order('add_time desc')->limit(0,1)->select();
        $this->assign('adinfo3',$adinfo3);
        $adinfo4=D('Banner')->where("lan_id={$lan_id} AND is_show='0' AND is_area='4'")->order('add_time desc')->limit(0,1)->select();
        $this->assign('adinfo4',$adinfo4);
        $adinfo5=D('Banner')->where("lan_id={$lan_id} AND is_show='0' AND is_area='5'")->order('add_time desc')->limit(0,1)->select();
        $this->assign('adinfo5',$adinfo5);




        //排行

            $clickinfo1 = D('News')
                ->where("lan_id = 38")
                ->order('click desc')->limit(0,1)->select();

        $this->assign('clickinfo1',$clickinfo1);
        $clickinfo2 = D('News')
            ->where("lan_id = 38")
            ->order('click desc')->limit(1,9)->select();

        $this->assign('clickinfo2',$clickinfo2);
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
        $news = D('News');
        $news->where(array('news_id'=>$news_id))->setInc('click',1);
        $info=$news->find($news_id);
        $this->assign('info',$info);
  $title = $info['news_title'].'_'.'新书推荐'.'_'.'蓝海长青';
$this->assign('title',$title);
        $lan_id=$info['lan_id'];
        //dump($lan_id);die;
        $adinfo=D('Banner')->where("lan_id={$lan_id} AND is_show='0'")->select();
        $this->assign('adinfo',$adinfo);

        $laninfo=D('Lanmu')->where(array('lan_id'=>$lan_id))->select();
        //dump($laninfo);die;
        $pid=$laninfo[0]['pid'];
        $this->assign('pid',$pid);

        $firstname = $laninfo[0]['lan_title'];
        //dump($firstname);die;
        $laninfo2=D('Lanmu')->where(array('lan_id'=>$pid))->select();
        $secondname= $laninfo2[0]['lan_title'];
        $daohang=array(
            'first'=>"$firstname",
            'second'=>"$secondname",
            'first_url'=>U('newslist',array('lan_id'=>$pid)),
        );
        $this -> assign('daohang',$daohang);

        //排行
        if($pid == 0){
            $clickinfo = D('News')
                ->where("is_show='0' AND is_del='0' AND lan_id={$lan_id}")->order('click desc')->limit(0,10)->select();
        }else{
            $clickinfo = D('News')
                ->alias('n')
                ->join('__LANMU__ l on n.lan_id=l.lan_id')
                ->where("n.is_show='0' AND n.is_del='0' AND l.pid={$pid}")
                ->order('click desc')->limit(0,10)->select();
        }
        $this->assign('clickinfo',$clickinfo);

        //获得评论的总条数
        $commenttotal = $info['talk'];
        $this -> assign('commenttotal',$commenttotal);

        $this->display();
    }





}