<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/8/9 0009
 * Time: 11:35
 */

namespace Admin\Controller;
use Think\Controller;

class SellerController extends Controller
{
    function userlist(){
        if($_GET['keywords']){
            $search = $_GET['keywords'];
            $map['seller_name'] = array('LIKE',"%{$search}%");
            $where['s.seller_name'] = array('LIKE',"%{$search}%");
        }else{
            $map = '';
            $where = '';
        }
        $seller_model = M('seller');
        $count = $seller_model ->where($map)-> count();
		//echo $count;
        $p = new \Think\Page($count,10);
        $seller = $seller_model
                ->alias('s')
                ->field("s.*,u.nikename,u.userhead,u.merchtime,u.merchexpire,u.is_merch,z.zeng_id,s2.cat_name")
                ->join("hc_user as u on u.userid = s.userid")
                ->join("right join hc_zeng as z on z.userid = u.userid")
                ->join("hc_sellercat as s2 on s2.cat_id = s.cat_id")
                ->group("s.seller_id")
                ->where($where)
                ->order("u.is_merch,s.paystatus desc,s.add_time desc")
                ->limit($p->firstRow.','.$p->listRows)
                ->select();
                $nowtime = time(); 
                foreach($seller as $key=>$value){
                    if(!empty($value['merchexpire'])){
                        if($nowtime >= $value['merchexpire']){
                            $seller[$key]['isexpire'] = '1';
                        }else{
                            $seller[$key]['isexpire'] = '0';
                        }
                    }else{
                        $seller[$key]['isexpire'] = '0';
                    }
                    
                }
                //dump($seller);exit; 
        $page = $p -> show();
        $this ->assign('page',$page);
        //dump($userList);
        $this -> assign('seller',$seller);
        $this->display();
    }

    //显示隐藏
    function isdisplay(){
        if(IS_POST){
            if($_POST['is_show'] == 1){
                $value = 0;
            }elseif($_POST['is_show'] == 0){
                $value = 1;
            }
            if(M('Sgoods')->where("goods_id = {$_POST['goods_id']}")->setField('is_show',$value)){
                echo 'success';
            }else{
                echo 'fail';
            }
        }
    }
    function isdisplay2(){
        if(IS_POST){
            if($_POST['is_show'] == 1){
                $value = 0;
            }elseif($_POST['is_show'] == 0){
                $value = 1;
            }
            if(M('Zeng')->where("zeng_id = {$_POST['zeng_id']}")->setField('is_show',$value)){
                echo 'success';
            }else{
                echo 'fail';
            }
        }
    }
   function goodslist(){
       if($_POST){
           $search = $_POST;
           $map['goods_name'] = array('LIKE',"%{$search['search']}%");
           $map['is_del'] = '0';
       }else{
           $map['is_del'] = '0';
       }

       $count = D('Sgoods')
           ->where($map)
           -> count();
       $p = new \Think\Page($count,10);

       $info = D('Sgoods')
           ->field('hc_sgoods.*,hc_seller.seller_name,hc_sellercat.cat_name')
           ->join('left join hc_seller on hc_sgoods.userid=hc_seller.userid')
           ->join('right join hc_sellercat on hc_seller.cat_id=hc_sellercat.cat_id')
           ->order('goods_id desc')
           ->limit($p->firstRow.','.$p->listRows)
           ->where($map)
           ->select();
       $page = $p->show();
       $this -> assign('page',$page);
       $this -> assign('info',$info);

       $this->display();
   }

    //店铺商品列表
    function dianpulist(){
        $userid = I('get.userid');
        if($_POST){
            $search = $_POST;
            $map['goods_name'] = array('LIKE',"%{$search['search']}%");
            $map['is_del'] = '0';
            $map['hc_sgoods.userid'] = $userid;
        }else{
            $map['is_del'] = '0';
            $map['hc_sgoods.userid'] = $userid;
        }

        $count = D('Sgoods')
            ->where($map)
            -> count();
        $p = new \Think\Page($count,10);

        $info = D('Sgoods')
            ->field('hc_sgoods.*,hc_seller.seller_name,hc_sellercat.cat_name')
            ->join('left join hc_seller on hc_sgoods.userid=hc_seller.userid')
            ->join('right join hc_sellercat on hc_seller.cat_id=hc_sellercat.cat_id')
            ->order('goods_id desc')
            ->limit($p->firstRow.','.$p->listRows)
            ->where($map)
            ->select();
        $page = $p->show();
        $this -> assign('page',$page);
        $this -> assign('info',$info);

        $this->display();
    }

    //1p管理
    function freelist(){
        if($_POST){
            $search = $_POST;
            $map['zeng_name'] = array('LIKE',"%{$search['search']}%");
            $map['is_del'] = '0';
        }elseif($_GET){
            $map['zeng_id'] = $_GET['zeng_id'];
            $map['is_del'] = '0';
        }else{
            $map['is_del'] = '0';
        }
        $count = D('Zeng')
            ->where($map)
            -> count();
        $p = new \Think\Page($count,10);

        $info = D('Zeng')
            ->field('hc_zeng.*,hc_seller.seller_name,hc_sellercat.cat_name')
            ->join('left join hc_seller on hc_zeng.userid=hc_seller.userid')
            ->join('right join hc_sellercat on hc_seller.cat_id=hc_sellercat.cat_id')
            ->order('zeng_id desc')
            ->limit($p->firstRow.','.$p->listRows)
            ->where($map)
            ->select();
        $page = $p->show();
        $this -> assign('page',$page);
        $this -> assign('info',$info);

        $this->display();
    }

    function freedianpulist(){
        $userid = I('get.userid');
        if($_POST){
            $search = $_POST;
            $map['zeng_name'] = array('LIKE',"%{$search['search']}%");
            $map['is_del'] = '0';
            $map['hc_zeng.userid'] = $userid;
        }else{
            $map['is_del'] = '0';
            $map['hc_zeng.userid'] = $userid;
        }

        $count = D('Zeng')
            ->where($map)
            -> count();
        $p = new \Think\Page($count,10);

        $info = D('Zeng')
            ->field('hc_zeng.*,hc_seller.seller_name,hc_sellercat.cat_name')
            ->join('left join hc_seller on hc_zeng.userid=hc_seller.userid')
            ->join('right join hc_sellercat on hc_seller.cat_id=hc_sellercat.cat_id')
            ->order('zeng_id desc')
            ->limit($p->firstRow.','.$p->listRows)
            ->where($map)
            ->select();
        $page = $p->show();
        $this -> assign('page',$page);
        $this -> assign('info',$info);

        $this->display();
    }
    //1p通过操作
    function oppass(){
        $zeng = M('zeng');
        $zeng_id = $_GET['zeng_id'];
        $data['status'] = '1';

        if($zeng ->where("zeng_id = {$zeng_id}")->save($data)){
            $this->success("操作成功");
        }else{
            $this->error("系统繁忙，请稍后重试");
        }

    }
    //1p不通过操作
    function opfail(){
        $zeng = M('zeng');
        $zeng_id = $_GET['zeng_id'];
        $data['status'] = '0';
        if($zeng ->where("zeng_id = {$zeng_id}")->save($data)){
            $this->success("操作成功");
        }else{
            $this->error("系统繁忙，请稍后重试");
        }
    }

    function lianmengxieyi(){
        $id = I('get.id');
        $xieyi = D('Lianmengxieyi');
        if(IS_POST){
            $shuju = $xieyi -> create();
            // dump($shuju);die;

            $shuju['content'] = $_POST['content'];

            if($xieyi->save($shuju)){
                $this -> success('编辑成功',U('lianmengxieyi'),1);
                exit;
            }else{
                $this -> error('编辑失败',U('lianmengxieyi',array('id'=>$id)),1);
                exit;
            }
        }else{
            $info = $xieyi->find();
            $this -> assign('info',$info);
            $this -> display();
        }
    }

    function quanyixieyi(){
        $id = I('get.id');
        $xieyi = D('Quanyixieyi');
        if(IS_POST){
            $shuju = $xieyi -> create();
            // dump($shuju);die;

            $shuju['content'] = $_POST['content'];

            if($xieyi->save($shuju)){
                $this -> success('编辑成功',U('quanyixieyi'),1);
                exit;
            }else{
                $this -> error('编辑失败',U('quanyixieyi',array('id'=>$id)),1);
                exit;
            }
        }else{
            $info = $xieyi->find();
            $this -> assign('info',$info);
            $this -> display();
        }
    }
    //添加店铺
    function addseller(){
        $this->display();
    }
    //审核操作
    function examine(){
        if(IS_GET){
            $set = M('setting')->find();
            $sellerinfo = M('seller')->find($_GET['seller_id']);
            $userid = $sellerinfo['userid'];
            $userinfo = M('user')->find($userid);
            $nowtime = time();
            if($_GET['op'] == '1'){
                $data['is_merch'] = 1;
                if(empty($userinfo['merchtime'])){
                    $data['merchtime'] = $nowtime;
                }
                $data['merchexpire'] = $nowtime + $set['merchexpire'] * 365 * 24 * 3600;
                M('seller')->where("userid = {$userid}")->setField('status','1');
                M('user')->where("userid = {$userid}")->save($data);
                $this->success('操作成功');
            }
            if($_GET['op'] == 2){
                $data['is_merch'] = '0';
                $data['merchexpire'] = '';
                M('user')->where("userid = {$userid}")->save($data);
                $status['paystatus'] = '0';
                $status['status'] = '0';
                M('seller')->where("userid = {$userid}")->save($status);
                
                $this->success('操作成功');
            }
        }
    }
}