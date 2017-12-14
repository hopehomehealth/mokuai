<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/8/9 0009
 * Time: 11:35
 */

namespace Sadmin\Controller;
use Think\Controller;
class ZengController extends Controller
{
    function showlist()
    {
        if ($_POST) {
            $search = $_POST;
            $map['zeng_name'] = array('LIKE', "%{$search['search']}%");
            $map['is_del'] = '0';
        } else {
            $map['is_del'] = '0';
        }

        $count = D('Zeng')
            ->where($map)
            ->count();
        $p = new \Think\Page($count, 10);
        $userid = $_SESSION['userInfo']['userid'];
        $info = D('Zeng')
//            ->alias('z')
//            ->join('__SELLER__ s on z.seller_id=s.seller_id')
//            ->field('z.*,s.seller_name')
            ->order('zeng_id desc')
            ->where("userid={$userid}")
            ->limit($p->firstRow . ',' . $p->listRows)
            ->where($map)
            ->select();
        $page = $p->show();
        $this->assign('page', $page);
        $this->assign('info', $info);

        $this->display();
    }

    function tianjia(){
        $userid = $_SESSION['userInfo']['userid'];
        if(IS_POST){

            $c = D('Zeng');
            $shuju = $c->create();
            $shuju['userid'] = $userid;
            $shuju['add_time'] = time();
            $shuju['upd_time'] = time();
            $cfg = array(
                'rootPath'    =>  './Public/Upd/zeng/', //保存根路径
            );
            $up = new \Think\Upload($cfg);
            $z = $up -> uploadOne($_FILES['pic']);

            //把上传的图片"路径名"保存到数据库中
            $picname = $up->rootPath.$z['savepath'].$z['savename'];
            $shuju['pic'] = $picname;
            if($c->add($shuju)){
                $this -> success('添加成功',U('showlist'),1);
            }else{
                $this -> error('添加失败',U('tianjia'),1);
            }
        }else{
            $sellerinfo =  D('Seller')->select();
            $this->assign('sellerinfo',$sellerinfo);
            $this -> display();
        }
    }
    

    function upd(){
        $zeng_id = I('get.zeng_id');
        $userid = $_SESSION['userInfo']['userid'];
        $cat = D('Zeng');
        if(IS_POST){
            $shuju = $cat -> create();
            $shuju['upd_time'] = time();
            $shuju['userid'] = $userid;
            if($_FILES['pic']['error']===0) {
                if (!empty($shuju['zeng_id'])) {
                    $oldinfo = D('Zeng')->find($shuju['zeng_id']);
                    if (!empty($oldinfo['pic'])) {
                        unlink($oldinfo['pic']);
                    }
                }

                $cfg = array(
                    'rootPath'    =>  './Public/Upd/zeng/', //保存根路径
                );
                $up = new \Think\Upload($cfg);
                $z = $up -> uploadOne($_FILES['pic']);

                //把上传的图片"路径名"保存到数据库中
                $picname = $up->rootPath.$z['savepath'].$z['savename'];
                $shuju['pic'] = $picname;
            }
            if($cat->save($shuju)){
                $this -> success('修改成功',U('showlist'),1);
            }else{
                $this -> error('修改失败',U('upd',array('zeng_id'=>$zeng_id)),1);
            }
        }else{
            $info = $cat->find($zeng_id);

            $sellerinfo =  D('Seller')->select();
            $this->assign('sellerinfo',$sellerinfo);

            $this -> assign('info',$info);
            $this -> display();
        }
    }

    function del(){
        $zeng_id = I('get.zeng_id');
        $sql="update hc_zeng set is_del='1' where zeng_id=$zeng_id";
        if(D('Zeng')->execute($sql)){
            $this->success('删除成功');
        }else{
            $this->error('删除失败');
        }
    }
}