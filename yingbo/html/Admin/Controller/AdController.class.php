<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/6/13
 * Time: 11:37
 */
namespace Admin\Controller;
use Common\Common\AdminController;
class AdController extends AdminController
{
    //列表
    function showlist(){
        if($_POST){
            $search = $_POST;
            $map['title'] = array('LIKE',"%{$search['search']}%");
        }else{
            $map = '';
        }

        $count = D('Ad') -> count();
        $p = new \Think\Page($count,10);
        $info = D('Ad')
            ->alias('a')
            ->join('__COLUMN__ c on a.col_id=c.col_id')
            ->field('a.*,c.name')
            ->where($map)
            -> order('ad_id desc') ->limit($p->firstRow.','.$p->listRows)-> select();
        $page = $p->show();
        $this -> assign('page',$page);

        $this->assign('info',$info);
        $this->display();
    }


    //添加
    function tianjia(){
        if(IS_POST){
            $ad = new \Model\AdModel();
            if($_POST['col_id1'] != 0){
                $_POST['col_id'] =   $_POST['col_id1'] ;
            }
            if($_POST['col_id2'] != 0){
                $_POST['col_id'] =   $_POST['col_id2'] ;
            }
//            dump($_POST);  exit;
            $info = $ad->create();
            $info['input_time'] = time();
             $info['is_show']  = $_POST['is_show'];
            $cfg = array(
                'rootPath'    =>  './Public/', //保存根路径
                'savepath'  => 'Upl/ad/',
            );
            $up = new \Think\Upload($cfg);
            $z = $up -> uploadOne($_FILES['pic']);

            //把上传的图片"路径名"保存到数据库中
            $picname = $up->rootPath.$z['savepath'].$z['savename'];
            $info['pic'] = $picname;


            if($ad->add($info)){
                $this->success('添加成功','showlist',1);
            }else{
                $this->error('添加失败','tianjia',1);
            }
        }else{

            $colinfoA = D('Column')
                ->where(array('level'=>0))
                ->select();
            $this -> assign('colinfoA',$colinfoA);
//

            $this->display();
        }
    }

    //修改
    function upd(){
        $ad_id = I('get.ad_id');
        $ad = new \Model\AdModel();
        if(IS_POST){
            $shuju = $ad -> create();
            $shuju['input_time'] = time();
            $shuju['is_show']  = $_POST['is_show'];
            if($_FILES['pic']['error']===0) {
                if (!empty($shuju['ad_id'])) {
                    $oldinfo = D('Ad')->find($shuju['ad_id']);
                    if (!empty($oldinfo['pic'])) {
                        unlink($oldinfo['pic']);
                    }
                }

                $cfg = array(
                    'rootPath'    =>  './Public/', //保存根路径
                    'savepath'  => 'Upl/ad/',
                );
                $up = new \Think\Upload($cfg);
                $z = $up -> uploadOne($_FILES['pic']);

                //把上传的图片"路径名"保存到数据库中
                $picname = $up->rootPath.$z['savepath'].$z['savename'];
                $shuju['pic'] = $picname;
            }
            
            if($ad->save($shuju)){
                $this -> success('修改成功',U('showlist'),1);
            }else{
                $this -> error('修改失败',U('upd',array('ad_id'=>$ad_id)),1);
            }
        }else{
            $info = $ad->find($ad_id);

            // /****获得“第一级栏目信息”并传递给模板****/
            // $colinfoA = D('Column')
            //     ->where(array('level'=>0))
            //     ->select();
            // $this -> assign('colinfoA',$colinfoA);
            // /****获得“第一级栏目信息”并传递给模板****/

            // ***获得广告的所有扩展栏目信息***
            // $ext = D('AdColumn')
            //     ->where(array('ad_id'=>$ad_id))
            //     ->field('group_concat(col_id) as extids')
            //     ->find();
            // $extcolids = $ext['extids'];
            // $this -> assign('extcolids',$extcolids);
            /****获得广告的所有扩展栏目信息****/

            $this -> assign('info',$info);
            $this -> display();
        }
    }


    function del(){
        $ad_id = I('get.ad_id');

        if(D('Ad')->delete($ad_id)){
            $this->success('删除成功',U('showlist'));
        }else{
            $this->error('删除失败',U('del',array('ad_id'=>$ad_id)),1);
        }
    }


}