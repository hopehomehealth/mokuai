<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/8/9 0009
 * Time: 11:35
 */

namespace Mobile\Controller;
use Common\Common\ComController;

class BbsController extends ComController
{
    //论坛首页
    function blog(){
        //长青博客
        $art_model = M('article');
        $count = $art_model -> alias('a') ->join("cq_user as u on u.user_id = a.user_id")-> count();
        $p = new \Think\Page($count,10);
        $articles = $art_model -> alias('a') ->field("a.title,a.content,a.art_id,a.add_time,u.username,a.user_id,u.userhead")->join("cq_user as u on u.user_id = a.user_id")-> order("is_hot desc,a.add_time desc") -> limit($p->firstRow.','.$p->listRows) -> select();
        if(IS_AJAX){
            if($articles){
                foreach($articles as $key=>$value){
                    $articles[$key]['add_time'] = date("Y-m-d H:i",$value['add_time']);
                }
                $this->ajaxReturn(array(
                  'error' => 0,
                  'content' => $articles
                ));
            }else{
                exit;
            }
        }
        $this->assign('articles',$articles);
        $this->display();
    }
    function bbs(){
        //巅峰论坛
        $boards_model = M('boards');
        $boards = M()->query("select p1.*,b.board_id,b.board_title,b.todposts,b.posts,b.board_img,u.username from (select p.* from cq_posts as p where p.ctime = (select max(ctime) from cq_posts where board_id = p.board_id)) as p1 right join cq_boards as b on b.board_id = p1.board_id left join cq_user as u on u.user_id = p1.user_id where b.pid <> 0 order by b.sort");
        foreach($boards as $key => $value){
            if(!empty($value['ctime'])){
                $boards[$key]['ctime'] = date("Y-m-d H:i",$value['ctime']);
            }
        }
        $this->assign('boards',$boards);
        $this->display();
    }
    function mingjia(){
        //名家讲坛
        $famous_model = M('famous');
        $count = M()->query("select count(*) as count from (select s.* from cq_slanders as s where s.add_time = (select max(add_time) from cq_slanders where f_id = s.f_id)) as s1 right join cq_famous as f on f.f_id = s1.f_id where f.f_type = '1'");
        $p = new \Think\Page($count[0]['count'],10);
        $famous1 = M()->query("select s1.*,f.f_id,f.f_name,f.f_photo,f.f_artnums from (select s.* from cq_slanders as s where s.add_time = (select max(add_time) from cq_slanders where f_id = s.f_id)) as s1 right join cq_famous as f on f.f_id = s1.f_id where f.f_type = '1' order by f.is_index desc,f.f_fans desc,f.f_artnums desc limit {$p->firstRow},{$p->listRows}");
        foreach($famous1 as $key => $value){
            if(!empty($value['add_time'])){
                $famous1[$key]['add_time'] = date("Y-m-d H:i",$value['add_time']);
            }
        }
        if(IS_AJAX){
            if($famous1){
                $this->ajaxReturn(array(
                  'error' => 0,
                  'content' => $famous1
                ));
            }else{
                exit;
            }
        }
        $this->assign('famous1',$famous1);
        $this->display();
    }
    function renwu(){
        //蓝海人物
        $famous_model = M('famous');
        $count = $famous_model -> where("f_type = '2'") -> count();
        $p = new \Think\Page($count,10);
        $famous2 = $famous_model->where("f_type = '2'")->order("f_fans desc,f_artnums desc")->limit($p->firstRow.','.$p->listRows)->select();
        if(IS_AJAX){
            if($famous2){
                $this->ajaxReturn(array(
                  'error' => 0,
                  'content' => $famous2
                ));
            }else{
                exit;
            }
        }
        $this->assign('famous2',$famous2);
        $this->display();
    }
}