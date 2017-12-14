<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/6/13
 * Time: 11:37
 */
namespace Home\Controller;
use Common\Common\HomeController;
class ProductController extends HomeController
{

    function showlist()
    {
        $product = D('Product');
        $count  = $product->count();

        $p = getpage($count,6);
        $info = $product->order('pro_id desc')->limit($p->firstRow, $p->listRows)->select();
        $this->assign('info', $info); // 赋值数据集
        $this->assign('page', $p->show()); // 赋值分页输出

        $adinfofen=D('Ad')->where("col_id=29")->select();
        $this->assign('adinfofen',$adinfofen);
        $this->display();
    }


}
