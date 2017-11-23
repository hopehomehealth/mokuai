<?php
namespace Home\Controller;
use Tools\HomeController;

class CommentController extends HomeController {
    //ajax添加评论
    function addCmt(){
        $shuju['cmt_star'] = I('post.cmt_star');
        $shuju['cmt_msg'] = \fangXSS($_POST['cmt_msg']);
        $shuju['goods_id'] = I('post.goods_id');
        $shuju['user_id'] = session('user_id');
        $shuju['add_time'] = $shuju['upd_time'] = time();

        if($newid = D('Comment')->add($shuju)){
            //把添加好的评论信息返回给ajax以便显示到页面
            //mysql函数：from_unixtime() 把时间戳变为格式化时间
            //           left(字段，长度) 获得内容“左边长度”位数信息
            $cmtinfo = D('Comment')
                ->alias('c')
                ->join('__USER__ u on c.user_id=u.user_id')
                ->field('u.user_name,c.cmt_id,c.cmt_msg,c.cmt_star,left(from_unixtime(c.add_time),16) cmttime')
                ->find($newid);
            echo json_encode($cmtinfo);
        }
    }

    //获得评论列表信息内容
    function getCmtList(){
        $goods_id = I('get.goods_id');
        $page_index = I('get.page_index');//当前页码-1  的信息

        //A.获得“评论信息”
        $per = 3;
        $info = D('Comment')
            ->alias('c')
            ->join('__USER__ u on c.user_id=u.user_id')
            ->field('u.user_name,c.cmt_id,c.cmt_msg,c.cmt_star,left(from_unixtime(c.add_time),16) cmttime')
            ->where(array('is_show'=>'0','goods_id'=>$goods_id))
            ->order('c.cmt_id desc')
            ->limit($page_index*$per,$per)
            ->select();
        
        //B.根据评论获得对应的“回复信息”
        //收集评论的cmt_id信息
        $cmt_ids = arrayToString($info,'cmt_id');
        $backinfo = D('Back')
            ->alias('b')
            ->join('__USER__ u on b.user_id=u.user_id')
            ->field('u.user_name,b.back_msg,b.back_id,left(from_unixtime(b.add_time),16) backtime,b.cmt_id')
            ->where(array('b.cmt_id'=>array('in',$cmt_ids),'b.is_show'=>'0'))
            ->select();

        //C.对评论和回复信息进行整合
        foreach($info as $k => $v){
            foreach($backinfo as $kk => $vv){
                //判断回复与评论有“联系”
                if($vv['cmt_id']===$v['cmt_id']){
                    $info[$k]['backinfo'][] = $vv;
                }
            }
        }
        echo json_encode($info); //给ajax返回数据
    }

    //添加“回复”内容
    function sendBack(){
        $shuju['back_msg'] = I('post.back_msg');
        $shuju['cmt_id'] = I('post.cmt_id');
        $shuju['user_id'] = session('user_id');
        $shuju['add_time'] = $shuju['upd_time'] = time();
        if($newid = D('Back')->add($shuju)){
            //把添加好的回复内容回传给ajax显示
            $backinfo = D('Back')
                ->alias('b')
                ->join('__USER__ u on b.user_id=u.user_id')
                ->field('u.user_name,b.back_id,b.back_msg,left(from_unixtime(b.add_time),16) backtime')
                ->find($newid);
            echo json_encode($backinfo);//Object { user_name="linken", back_id="11", back_msg="临时决定离开时间的", 更多...}
        }
    }
}
