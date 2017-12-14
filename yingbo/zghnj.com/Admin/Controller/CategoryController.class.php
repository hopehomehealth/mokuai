<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/4/23 0023
 * Time: 10:14
 */
namespace Admin\Controller;
use Common\Common\AdminController;
class CategoryController extends AdminController
{
    //栏目列表
    function showlist(){
        $model = M('category');
        $result = $model->order("sort,cat_id")->select();
        $catlist = array();
        $subcate = array();
        foreach($result as $_key=>$_value){
            if($_value['pid'] == 0){
                $catlist[] = $_value;
            }else{
                $subcate[$_value['pid']][] =  $_value;
            }
        }
        foreach($subcate as $_k=>$_v){
            $subcate[$_k] = my_sort($_v,'sort',SORT_ASC);
        }
        foreach($catlist as $_kk=>$_vv){
            if(isset($subcate[$_vv['cat_id']])){
                $catlist[$_kk]['subcate'] = $subcate[$_vv['cat_id']];
            }
        }
        $this->assign('catlist',$catlist);
        $this->display();
    }
    //添加栏目
    function add(){
        $model = M('category');
        if(IS_POST){
            if(empty($_POST['pid'])){
                $_POST['pid'] = 0;
            }
            $path = $this->upload('category',$_FILES['pic']);
            if($path){
                $_POST['pic'] = '/Public/'.$path;
            }
            if($model->create()){
                if($model->add()){
                    $this->productMenu();
                    $this->success('添加成功',U('showlist'));exit;
                }
            }
            $this->error('添加失败');exit;
        }
        $catlist = $model->where("pid = 0")->select();
        $this->assign('catlist',$catlist);
        $this->display();
    }
    //编辑栏目
    function upd(){
        $model = M('category');
        $cat_id = intval($_GET['cat_id']);
        if(IS_POST){
            if(empty($_POST['pid'])){
                $_POST['pid'] = 0;
            }
            $path = $this->upload('category',$_FILES['pic']);
            if($path){
                $_POST['pic'] = '/Public/'.$path;
            }
            if($model->create()){
                if($model->where("cat_id = {$cat_id}")->save()){
                    $this->productMenu();
                    $this->success('修改成功',U('showlist'));exit;
                }
            }
            $this->error('修改失败');exit;
        }
        $catinfo = $model->find($cat_id);
        $this->assign('catinfo',$catinfo); 
        $catlist = $model->where("pid = 0")->select();
        $this->assign('catlist',$catlist);
        $this->display();
    }
    //删除栏目
    function del(){
        $model = M('category');
        $cat_id = intval($_GET['cat_id']);
        if($model->delete($cat_id)){
            $this->productMenu();
            $this->success('删除成功');exit;
        }
        $this->error('删除失败');exit;
    }

    private function productMenu(){
        $model = M('category');
        $result = $model->where("is_show = 1")->order("sort,cat_id")->select();
        $catlist = array();
        $subcate = array();
        foreach($result as $_key=>$_value){
            if($_value['pid'] == 0){
                $catlist[] = $_value;
            }else{
                $subcate[$_value['pid']][] =  $_value;
            }
        }
        foreach($subcate as $_k=>$_v){
            $subcate[$_k] = my_sort($_v,'sort',SORT_ASC);
        }
        foreach($catlist as $_kk=>$_vv){
            if(isset($subcate[$_vv['cat_id']])){
                $catlist[$_kk]['subcate'] = $subcate[$_vv['cat_id']];
            }
        }
        $str_temp = '<div class="menu-bj">'."\r\n";
        $str_temp .= "\t".'<div class="column">'."\r\n";
        $str_temp .= "\t\t".'<if condition="$_SESSION[\'loginstatus\'] eq \'\'">'."\r\n";
        $str_temp .= "\t\t".'<div class="menu-r fr">'."\r\n";
        $str_temp .= "\t\t\t".'<p class="login fl">登&nbsp;录</p>'."\r\n";
        $str_temp .= "\t\t\t".'<p class="register fl">注&nbsp;册</p>'."\r\n";
        $str_temp .= "\t\t".'</div>'."\r\n";
        $str_temp .= "\t\t".'<else/>'."\r\n";
        $str_temp .= "\t\t".'<div class="fr" style="padding-top:0px;width:157px">'."\r\n";
        $str_temp .= "\t\t\t".'<p style="height:46px;line-height:46px;color:white">{$_SESSION[\'user\'][\'info\'][\'username\']}　<a href="__MODULE__/User/logout" style="text-decoration:underline;color:white;cursor:pointer">退出</a></p>'."\r\n";
        $str_temp .= "\t\t".'</div>'."\r\n";
        $str_temp .= "\t\t".'</if>'."\r\n";
        $str_temp .= "\t\t".'<ul class="menu_nr">'."\r\n";
        $str_temp .= "\t\t\t".'<li <if condition="CONTROLLER_NAME eq \'Index\'">class="cur"</if>><a href="http://'.$_SERVER['HTTP_HOST'].'/index.php/Home/Index/index">首页</a></li>'."\r\n";
        $str_temp2 = '<ul class="sumenu fl">'."\r\n";
        $str_temp3 = '<ul class="clearfix">'."\r\n";
        $str_temp3.= "\t".'<li>'."\r\n";
        $str_temp3.= "\t\t".'<h3 class="yjchan">'."\r\n";
        $str_temp3.= "\t\t\t".'<a href="http://'.$_SERVER['HTTP_HOST'].'/index.php/Wap/Index/index" class="cur">首页</a>'."\r\n";
        $str_temp3.= "\t\t".'</h3>'."\r\n";
        $str_temp3.= "\t".'</li>'."\r\n";
        foreach($catlist as $_catinfo){
            if(empty($_catinfo['subcate'])){
                $str_temp .= "\t\t\t".'<li <if condition="CONTROLLER_NAME eq \''.$_catinfo['ctrl'].'\'">class="cur"</if>><a href="http://'.$_SERVER['HTTP_HOST'].'/index.php/Home/'.$_catinfo['ctrl'].'/'.$_catinfo['action'].'">'.$_catinfo['cat_name'].'</a></li>'."\r\n";
                $str_temp3.= "\t".'<li>'."\r\n";
                $str_temp3.= "\t\t".'<h3 class="yjchan">'."\r\n";
                $str_temp3.= "\t\t\t".'<a href="http://'.$_SERVER['HTTP_HOST'].'/index.php/Wap/'.$_catinfo['ctrl'].'/'.$_catinfo['action'].'" class="cur">'.$_catinfo['cat_name'].'</a>'."\r\n";
                $str_temp3.= "\t\t".'</h3>'."\r\n";
                $str_temp3.= "\t".'</li>'."\r\n";
            }else{
                $str_temp .= "\t\t\t".'<li <if condition="CONTROLLER_NAME eq \''.$_catinfo['ctrl'].'\'">class="cur"</if>><a>'.$_catinfo['cat_name'].'</a>'."\r\n";
                $str_temp .= "\t\t\t\t".'<div class="childnavin">'."\r\n";
                $str_temp2.= "\t".'<li>'."\r\n";
                $str_temp2.= "\t\t".'<span class="fs14 white pb10 di-b">'.$_catinfo['cat_name'].'</span>'."\r\n";
                $str_temp3.= "\t".'<li>'."\r\n";
                $str_temp3.= "\t\t".'<h3>'."\r\n";
                $str_temp3.= "\t\t\t".'<a>'.$_catinfo['cat_name'].'</a>'."\r\n";
                $str_temp3.= "\t\t\t".'<span></span>'."\r\n";
                $str_temp3.= "\t\t".'</h3>'."\r\n";
                $str_temp3.= "\t\t".'<div class="navlist" style="display: none;">'."\r\n";
                foreach($_catinfo['subcate'] as $_subinfo){
                    $str_temp .= "\t\t\t\t\t".'<a href="http://'.$_SERVER['HTTP_HOST'].'/index.php/Home/'.$_subinfo['ctrl'].'/'.$_subinfo['action'].'">'.$_subinfo['cat_name'].'</a>'."\r\n";
                    $str_temp2.= "\t\t".'<a href="http://'.$_SERVER['HTTP_HOST'].'/index.php/Home/'.$_subinfo['ctrl'].'/'.$_subinfo['action'].'">'.$_subinfo['cat_name'].'</a>'."\r\n";
                    $str_temp3.= "\t\t\t".'<div class="navdrop">'."\r\n";
                    $str_temp3.= "\t\t\t\t".'<h4>'."\r\n";
                    $str_temp3.= "\t\t\t\t\t".'<a href="http://'.$_SERVER['HTTP_HOST'].'/index.php/Wap/'.$_subinfo['ctrl'].'/'.$_subinfo['action'].'">'.$_subinfo['cat_name'].'</a>'."\r\n";
                    $str_temp3.= "\t\t\t\t".'</h4>'."\r\n";
                    $str_temp3.= "\t\t\t".'</div>'."\r\n";
                }
                $str_temp .= "\t\t\t\t".'</div>'."\r\n";
                $str_temp .= "\t\t\t".'</li>'."\r\n";
                $str_temp2.= "\t".'</li>'."\r\n";
                $str_temp3.= "\t\t".'</div>'."\r\n";
                $str_temp3.= "\t".'</li>'."\r\n";
            }
        }
        $str_temp .= "\t\t".'</ul>'."\r\n";  
        $str_temp .= "\t".'</div>'."\r\n";
        $str_temp .= '</div>'."\r\n";  
        $str_temp2.= '</ul>'."\r\n";   
        fwrite(fopen("./Home/view/header.html",'w'),print_r($str_temp,true)); 
        fwrite(fopen("./Home/view/footer.html",'w'),print_r($str_temp2,true));   
        fwrite(fopen("./Wap/view/header.html",'w'),print_r($str_temp3,true));   
    }
}