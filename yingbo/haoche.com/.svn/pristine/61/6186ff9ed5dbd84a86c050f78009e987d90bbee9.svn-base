<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/6/13
 * Time: 11:37
 */
namespace Home\Controller;
use Common\Common\ComController;
class HaocheController extends ComController {
    function showlist(){

        $brandinfoA = D('Haoche')
            ->alias('c')
            ->join('__HAOBRAND__ b on c.brand_id=b.brand_id')
            ->field('b.*')
            ->where("is_show='0' AND cat_id=1")
            ->select();
        $this->assign('brandinfoA',$brandinfoA);
        $brandinfoB = D('Haoche')
            ->alias('c')
            ->join('__HAOBRAND__ b on c.brand_id=b.brand_id')
            ->field('b.*')
            ->where("is_show='0' AND cat_id=2")
            ->select();
        $this->assign('brandinfoB',$brandinfoB);

        $priceinfoA = D('Haoche')
            ->alias('c')
            ->join('__HAOPRICE__ p on c.price_id=p.price_id')
            ->field('p.*')
            ->order('price_id')
            ->where("is_show='0' AND cat_id=1")
            ->select();
        $this->assign('priceinfoA',$priceinfoA);
        $priceinfoB = D('Haoche')
            ->alias('c')
            ->join('__HAOPRICE__ p on c.price_id=p.price_id')
            ->field('p.*')
            ->order('price_id')
            ->where("is_show='0' AND cat_id=2")
            ->select();
        $this->assign('priceinfoB',$priceinfoB);


        $haocheinfoA=D('Haoche')
        ->alias('h')
            ->join('__HAOCATEGORY__ as hc on h.cat_id=hc.cat_id')
            ->field('h.*,hc.cat_name')
            ->order('goods_id desc')
            ->where("is_show='0' AND hc.cat_id=1")
            ->select();
        $this->assign('haocheinfoA',$haocheinfoA);
        $haocheinfoB=D('Haoche')
        ->alias('h')
            ->join('__HAOCATEGORY__ as hc on h.cat_id=hc.cat_id')
            ->field('h.*,hc.cat_name')
            ->order('goods_id desc')
            ->where("is_show='0' AND hc.cat_id=2")
            ->select();
        $this->assign('haocheinfoB',$haocheinfoB);


        $setinfo = D('Setting')
            ->field('pct_supvip,backme')
            ->select();
        $this->assign('setinfo',$setinfo);


        $this ->display();
    }

    function nbrandlist(){
        $brand_id= I('get.brand_id');
       $brandinfo=D('Haobrand')->where(array('brand_id'=>$brand_id))->find();
        $this->assign('brandinfo',$brandinfo);


        $haocheinfo=D('Haoche')
        ->alias('h')
            ->join('__HAOCATEGORY__ as hc on h.cat_id=hc.cat_id')
            ->field('h.*,hc.cat_name')
            ->order('goods_id desc')
            ->where(array('brand_id'=>$brand_id))
            ->where("is_show='0' AND h.cat_id=1")
            ->select();
//        dump($haocheinfoA);die;
        $this->assign('haocheinfo',$haocheinfo);


        $setinfo = D('Setting')
            ->field('pct_supvip,backme')
            ->select();
        $this->assign('setinfo',$setinfo);
        $this ->display();
    }

    function obrandlist(){
        $brand_id= I('get.brand_id');
        $brandinfo=D('Haobrand')->where(array('brand_id'=>$brand_id))->find();
        $this->assign('brandinfo',$brandinfo);


        $haocheinfo=D('Haoche')
        ->alias('h')
            ->join('__HAOCATEGORY__ as hc on h.cat_id=hc.cat_id')
            ->field('h.*,hc.cat_name')
            ->order('goods_id desc')
            ->where(array('brand_id'=>$brand_id))
            ->where("is_show='0' AND h.cat_id=2")
            ->select();
//        dump($haocheinfo);die;
        $this->assign('haocheinfo',$haocheinfo);


        $setinfo = D('Setting')
            ->field('pct_supvip,backme')
            ->select();
        $this->assign('setinfo',$setinfo);
        $this ->display();
    }


    function price(){
        $price_id = I('get.price_id');
        $priceinfo=D('Haoprice')->where(array('price_id'=>$price_id))->find();
        $this->assign('priceinfo',$priceinfo);
//        dump($price_id);die;
        $haocheinfo=D('Haoche')
         ->alias('h')
            ->join('__HAOCATEGORY__ as hc on h.cat_id=hc.cat_id')
            ->field('h.*,hc.cat_name')
            ->order('goods_id desc')
            ->where(array('price_id'=>$price_id))
            ->where("is_show='0' AND is_del='0'")
            ->select();
//        dump($haocheinfo);die;
        $this->assign('haocheinfo',$haocheinfo);


        $setinfo = D('Setting')
            ->field('pct_supvip,backme')
            ->select();
        $this->assign('setinfo',$setinfo);
        $this->display();
    }

    function detail(){
        $goods_id= I('get.goods_id');
        $info = D('Haoche')
         ->alias('h')
            ->join('__HAOCATEGORY__ as hc on h.cat_id=hc.cat_id')
            ->field('h.*,hc.cat_name')
            ->where(array('goods_id'=>$goods_id))
            ->where("is_show='0'")
            ->find();
        $this->assign('info',$info);

        $picsinfoA = D('HaochePics')
            ->where(array('goods_id'=>$goods_id))
            ->limit(0,4)
            ->select();
        $this->assign('picsinfoA',$picsinfoA);
        $picsinfoB = D('HaochePics')
            ->where(array('goods_id'=>$goods_id))
            ->limit(4,8)
            ->select();
        $this->assign('picsinfoB',$picsinfoB);

        $setinfo = D('Setting')
            ->field('pct_supvip,backme')
            ->select();
        $this->assign('setinfo',$setinfo);

        $attrinfo2 = D('HaocheAttr')
            ->alias('ga')
            ->join('__HAOATTRIBUTE__ a on ga.attr_id=a.attr_id')
            ->where(array('ga.goods_id'=>$goods_id,'a.attr_sel'=>'1'))
            ->field('a.attr_id,a.attr_name,group_concat(ga.attr_value) attrval')
            ->group('attr_id')
            ->select();
        foreach($attrinfo2 as $k => $v){
            $attrinfo2[$k]['val'] = explode(',',$v['attrval']);
        }
        $this -> assign('attrinfo2',$attrinfo2);
        $this->display();
    }


    function search(){
           //搜索
        if($_POST){
            $searchname = $_POST;
            $map['goods_name'] = array('LIKE',"%{$searchname['searchname']}%");

        }else{
            $map = '';

        }

   $searchinfo = D('Haoche')
         ->alias('h')
            ->join('__HAOCATEGORY__ as hc on h.cat_id=hc.cat_id')
            ->field('h.*,hc.cat_name')
            ->order('goods_id desc')
            ->where($map)
            ->where("is_show='0'")
            ->select();
         $this->assign('searchinfo',$searchinfo);


        $setinfo = D('Setting')
            ->field('pct_supvip,backme')
            ->select();
        $this->assign('setinfo',$setinfo);
        $this->display();
    }
}