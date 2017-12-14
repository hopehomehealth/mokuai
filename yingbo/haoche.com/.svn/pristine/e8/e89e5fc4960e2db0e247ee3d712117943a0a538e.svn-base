<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/6/13
 * Time: 11:37
 */
namespace Admin\Controller;
use Think\Controller;
class HouseController extends Controller
{
    //列表
    function showlist(){

        if($_POST){
            $search = $_POST;
            $map['name'] = array('LIKE',"%{$search['search']}%");
        }else{
            $map = '';
        }

        $house = D('House');
        $count = $house -> count();
        $p = new \Think\Page($count,10);
        $info = D('House')
            ->alias('h')
            ->join('__USERDETAIL__ as u on h.userid=u.userid')
            ->field('h.*,u.phone,u.name')
             ->where($map)
            -> order('house_id desc') 
            ->limit($p->firstRow.','.$p->listRows)
            -> select();
        $page = $p->show();
        $this -> assign('page',$page);
        $this -> assign('info',$info);

        // $userinfo = D('Userdetail')
            
        //     ->field('phone,name')
        //     ->select();
        // $this->assign('userinfo',$userinfo);

        $setinfo = D('Setting')
            ->field('houseprice')
            ->select();
//        dump($setinfo);die;
        $this->assign('setinfo',$setinfo);
        $this->display();
    }

    function del(){
        $house_id = I('get.house_id');
        if(D('House')->delete($house_id)){
            $this->success('删除成功',U('showlist'));
        }else{
            $this->error('删除失败',U('del',array('house_id'=>$house_id)),1);
        }
    }

  //修改
    function upd(){
        $house_id = I('get.house_id');
        $house = D('House');
        if(IS_POST) {

            $info = $house->create();
            $info['upd_time'] = time();
            if ($house->save($info)) {
                $this->success('修改成功',U('showlist'));
            } else {
                $this->error('修改失败', U('upd', array('house_id' => $house_id)), 1);
            }
        }else{
            $userinfo = D('Userdetail')
                ->where('userid=79')
                ->field('phone,name')
                ->select();
            $this->assign('userinfo',$userinfo);
            $info = $house->find($house_id);
            $this->assign('info',$info);
            $this->display();
       }
    }


}