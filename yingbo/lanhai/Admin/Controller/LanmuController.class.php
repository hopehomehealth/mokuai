<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/8/9 0009
 * Time: 11:35
 */

namespace Admin\Controller;
use Common\Common\AdminController;

class LanmuController extends AdminController
{
    function showlist(){
        if($_POST){
            $search = $_POST;
            $map['lan_title'] = array('LIKE',"%{$search['search']}%");
        }else{
            $map = '';
        }

        $count = D('Lanmu') ->where($map)-> count();
        $p = new \Think\Page($count,50);
        $info =  D('Lanmu')
            ->order('path')
            ->where($map)
            ->where("is_show='0'")
            ->limit($p->firstRow.','.$p->listRows)
            ->select();
        $page = $p->show();
        $this -> assign('page',$page);
        $this -> assign('info',$info);
        $this->display();


    }

    function tianjia(){
        if(IS_POST){
            $lan = new \Model\LanmuModel();
            $info = $lan->create();
            if($lan->add($info)){
                $this->success('添加成功',U('showlist'));
            }else{
                $this->error('添加失败',U('tianjia'));
            }
        }else{
            $laninfo = D('Lanmu')
                ->where(array('level'=>0))
                ->order('path')
                ->select();
                foreach ($laninfo as $key => $value) {
    if($value['is_dan'] == 0){
        unset($laninfo[$key]);
    }
}
            $this -> assign('laninfo',$laninfo);
            $this->display();
        }
    }


    function upd(){
        $lan_id = I('get.lan_id');
        $lan = new \Model\LanmuModel();
        if(IS_POST){
            // dump($_POST);die;
            $shuju = $lan -> create();
                if($shuju['is_dan'] == ''){
                    $shuju['is_dan'] = 1;
                }

                if($shuju['pid'] == 0){
                    $shuju['path'] = $shuju['lan_id'];
                    $level = substr_count($shuju['path'], '-');
                     $shuju['level'] = $level;
                }else{
                     $ppath = $lan
                        ->where(array('lan_id'=>$shuju['pid']))
                        ->getField('path');
                     $lan_id = $shuju['lan_id'];
                    if($shuju['path'] != ''){
                        $sql ="UPDATE cq_lanmu SET path = '' where lan_id = $lan_id";
                        $lan->execute($sql);
                    }
                    $shuju['path'] = $ppath."-".$shuju['lan_id'];
                     $level = substr_count($shuju['path'], '-');
                     $shuju['level'] = $level;
                }





            if($lan->save($shuju)){
                $this -> success('修改成功',U('showlist'),1);
            }else{
                $this -> error('修改失败',U('upd',array('lan_id'=>$lan_id)),1);
            }
        }else{
            $info = D('Lanmu')
                ->find($lan_id);

            $laninfoA = D('Lanmu')
                ->where(array('level'=>0))
                ->order('path')
                ->select();
foreach ($laninfoA as $key => $value) {
    if($value['is_dan'] == 0){
        unset($laninfoA[$key]);
    }
}
            $this -> assign('laninfoA',$laninfoA);
            $this->assign('info',$info);

            $this -> display();
        }
    }

    function del(){
        $lan_id = I('get.lan_id');

        if(D('Lanmu')->delete($lan_id)){
            $this->success('删除成功',U('showlist'));
        }else{
            $this->error('删除失败',U('del',array('lan_id'=>$lan_id)),1);
        }
    }


    //根据父级获得子级的分类信息
    function getLanByPid(){
        $lan_id = I('get.lan_id');

        //查询子级分类信息
        $laninfo = D('Lanmu')
            -> where(array('pid'=>$lan_id))
			->where("is_show='0'")
            -> select();



        echo json_encode($laninfo);
    }
}