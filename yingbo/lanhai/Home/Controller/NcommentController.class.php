<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/10/25 0025
 * Time: 9:44
 */
namespace Home\Controller;
use Common\Common\ComController;
class NcommentController extends ComController
{
    function sendComment()
    {
        //$content = $_POST['content'];
$result = mycheckword($_POST['content']);
			if($result != $_POST['content']){
				$this->ajaxReturn(array(
					'error'=> 'illegalword',
					'result'=> $result,
					'mingan' => '含有敏感词'
				));
			}else{
		 $news_id = I('post.news_id');
        D('News')->where(array('news_id'=>$news_id))->setInc('talk',1);
        //评论信息入库
        $arr['content'] = $result;
        $arr['news_id'] = $news_id;
        $arr['add_time'] = time();
        if ($newid = D('Ncomment')->add($arr)) {
            $arr['com_id'] = $newid;
            $arr['add_time'] = date('Y-m-d H:i');
            echo json_encode($arr);
        }
			}

    }


    //获得评论列表信息
    function getCommentInfo($news_id, $page = 0)
    {
        //mysql:from_unixtime() 时间戳变为格式化时间
        //mysql:left(field,length) 对field内容从左边截取length长度
        //先获得评论
        $info1 = D('Ncomment')
            ->field('com_id,content,left(from_unixtime(add_time),16) add_time')
            ->where(array('news_id' => $news_id,'display'=>'1'))
            ->order('com_id desc')
            ->limit($page * 10, 10)
            ->select();
       echo json_encode($info1);
      //return $info1;

    }
}