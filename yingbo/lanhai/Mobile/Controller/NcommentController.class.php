<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/10/25 0025
 * Time: 9:44
 */
namespace Mobile\Controller;
use Common\Common\ComController;
class NcommentController extends ComController
{
    function sendComment()
    {
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

}