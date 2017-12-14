<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/4/1 0001
 * Time: 15:30
 */
namespace Admin\Controller;
use Common\Common\AdminController;
class LeaguerController extends AdminController
{
    private function catelist(){
        $model = M('category');
        $result = $model->order("sort,cat_id")->select();
        $catlist = array();
        foreach($result as $_key=>$_value){
            if($_value['pid'] == 0){
                $catlist[] = $_value;
                foreach($result as $_k=>$_v){
                    if($_v['pid'] == $_value['cat_id']){
                        $catlist[] = $_v;
                    }
                }
            }
        }
        return $catlist;
    } 
    function showlist(){
        $model = M('leaguer');
        $count = $model->alias('l')->join("left join __CATEGORY__ as c on c.cat_id = l.cat_id")->count();
        $p = new \Think\Page($count,10);
        $links = $model->alias('l')->field("l.*,c.cat_name")->join("left join __CATEGORY__ as c on c.cat_id = l.cat_id")->order('l.sort,l.ctime')->limit($p->firstRow.','.$p->listRows)->select();
        $page = $p->show();
        $this->assign('page',$page);
        $this->assign('links',$links);
        $this->display();
    }
    function add(){
        if(IS_POST){
            $model = M('leaguer');
            $path = $this -> upload('link',$_FILES['picture']);
            if($path){
                $_POST['picture'] = '/Public/'.$path;
            }
            $_POST['ctime'] = NOW_TIME;
            if($model->create()){
                if($model->add()){
                    $this->success('添加成功',U('showlist'));exit;
                }
            }
            $this->error('添加失败');exit;
        }
        $this -> assign('catlist',$this->catelist());
        $this->display();
    }
    function upd(){
        $id = intval($_GET['id']);
        $model = M('leaguer');
        if(IS_POST){
            $path = $this -> upload('link',$_FILES['picture']);
            if($path){
                $_POST['picture'] = '/Public/'.$path;
            }
            if($model->create()){
                if($model->where("id = {$id}")->save()){
                    $this->success('修改成功',U('showlist'));exit;
                }
            }
            $this->error('修改失败');exit;
        }
        $this -> assign('catlist',$this->catelist());
        $linkinfo = $model->find($id);
        $this->assign('linkinfo',$linkinfo);
        $this->display();
    }
    function del(){
        $id = intval($_GET['id']);
        $model = M('leaguer');
        if($model->delete($id)){
            $this->success('删除成功');exit;
        }
        $this->error('修改失败');exit;
        $this->display();
    }
}