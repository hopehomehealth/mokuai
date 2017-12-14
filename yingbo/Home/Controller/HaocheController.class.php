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
 $setinfo = D('Setting')
            ->field('pct_supvip,pct_vip,pct_backprev')
            ->select();
        $this->assign('setinfo',$setinfo);


$map="is_del='0'";
        $brandinfoA = D('Haoche')
            ->alias('c')
            ->join(' __HAOBRAND__ b on c.brand_id=b.brand_id')
            ->field('distinct b.brand_id,b.*')
            ->where($map)
            ->where("c.is_show='0' AND c.cat_id=1")
            ->select();
		foreach($brandinfoA as $key=>$value){
			$brandinfoA[$key]['downpay'] = number_format(round($value['price']*$setinfo[0]['pct_vip']/10000/100,2),2);
			$brandinfoA[$key]['fanzeng'] = number_format(round($value['price']*$setinfo[0]['pct_vip']*$setinfo[0]['pct_backprev']/10000/10000,2),2);
		}
        // dump($brandinfoA);die;
        $this->assign('brandinfoA',$brandinfoA);
        $brandinfoB = D('Haoche')
            ->alias('c')
            ->join('__HAOBRAND__ b on c.brand_id=b.brand_id')
            ->field('distinct b.brand_id,b.*')
            ->where($map)
            ->where("c.is_show='0' AND c.cat_id=2")
            ->select();
		foreach($brandinfoB as $key=>$value){
			$brandinfoB[$key]['downpay'] = number_format(round($value['price']*$setinfo[0]['pct_vip']/10000/100,2),2);
			$brandinfoB[$key]['fanzeng'] = number_format(round($value['price']*$setinfo[0]['pct_vip']*$setinfo[0]['pct_backprev']/10000/10000,2),2);
		}
        $this->assign('brandinfoB',$brandinfoB);
// dump($brandinfoB);die;
        $priceinfoA = D('Haoche')
            ->alias('c')
            ->join('__HAOPRICE__ p on c.price_id=p.price_id')
            ->field('distinct p.price_id,p.*')
            ->order('price_id')
            ->where($map)
            ->where("is_show='0' AND c.cat_id=1")
            ->select();
		foreach($priceinfoA as $key=>$value){
			$priceinfoA[$key]['downpay'] = number_format(round($value['price']*$setinfo[0]['pct_vip']/10000/100,2),2);
			$priceinfoA[$key]['fanzeng'] = number_format(round($value['price']*$setinfo[0]['pct_vip']*$setinfo[0]['pct_backprev']/10000/10000,2),2);
		}
        $this->assign('priceinfoA',$priceinfoA);
        $priceinfoB = D('Haoche')
            ->alias('c')
            ->join('__HAOPRICE__ p on c.price_id=p.price_id')
            ->field('distinct p.price_id,p.*')
            ->order('price_id')
            ->where($map)
            ->where("is_show='0' AND c.cat_id=2")
            ->select();
		foreach($priceinfoB as $key=>$value){
			$priceinfoB[$key]['downpay'] = number_format(round($value['price']*$setinfo[0]['pct_vip']/10000/100,2),2);
			$priceinfoB[$key]['fanzeng'] = number_format(round($value['price']*$setinfo[0]['pct_vip']*$setinfo[0]['pct_backprev']/10000/10000,2),2);
		}
        $this->assign('priceinfoB',$priceinfoB);


        $haocheinfoA=D('Haoche')
        ->alias('h')
            ->join('__HAOCATEGORY__ as hc on h.cat_id=hc.cat_id')
            ->field('h.*,hc.cat_name')
            ->order('goods_id desc')
            ->where("is_show='0' AND hc.cat_id=1 AND is_del='0'")
            ->select();
		foreach($haocheinfoA as $key=>$value){
			$haocheinfoA[$key]['downpay'] = number_format(round($value['price']*$setinfo[0]['pct_vip']/10000/100,2),2);
			$haocheinfoA[$key]['fanzeng'] = number_format(round($value['price']*$setinfo[0]['pct_vip']*$setinfo[0]['pct_backprev']/10000/10000,2),2);
		}
        $this->assign('haocheinfoA',$haocheinfoA);
        $haocheinfoB=D('Haoche')
        ->alias('h')
            ->join('__HAOCATEGORY__ as hc on h.cat_id=hc.cat_id')
            ->field('h.*,hc.cat_name')
            ->order('goods_id desc')

            ->where("is_show='0' AND hc.cat_id=2 AND is_del='0'")
            ->select();
			foreach($haocheinfoB as $key=>$value){
			$haocheinfoB[$key]['downpay'] = number_format(round($value['price']*$setinfo[0]['pct_vip']/10000/100,2),2);
			$haocheinfoB[$key]['fanzeng'] = number_format(round($value['price']*$setinfo[0]['pct_vip']*$setinfo[0]['pct_backprev']/10000/10000,2),2);
		}
        $this->assign('haocheinfoB',$haocheinfoB);



        $this ->display();
    }

    function nbrandlist(){
        $brand_id= I('get.brand_id');
       $brandinfo=D('Haobrand')->where(array('brand_id'=>$brand_id))->find();
        $this->assign('brandinfo',$brandinfo);

$setinfo = D('Setting')
            ->field('pct_supvip,pct_vip,pct_backprev')
            ->select();
        $this->assign('setinfo',$setinfo);

        $haocheinfo=D('Haoche')
        ->alias('h')
            ->join('__HAOCATEGORY__ as hc on h.cat_id=hc.cat_id')
            ->field('h.*,hc.cat_name')
            ->order('goods_id desc')
            ->where(array('brand_id'=>$brand_id))
            ->where("is_show='0' AND h.cat_id=1 AND is_del='0'")
            ->select();
//        dump($haocheinfoA);die;
foreach($haocheinfo as $key=>$value){
			$haocheinfo[$key]['downpay'] = number_format(round($value['price']*$setinfo[0]['pct_vip']/10000/100,2),2);
			$haocheinfo[$key]['fanzeng'] = number_format(round($value['price']*$setinfo[0]['pct_vip']*$setinfo[0]['pct_backprev']/10000/10000,2),2);
		}
        $this->assign('haocheinfo',$haocheinfo);


        $this ->display();
    }

    function obrandlist(){
        $brand_id= I('get.brand_id');
        $brandinfo=D('Haobrand')->where(array('brand_id'=>$brand_id))->find();
        $this->assign('brandinfo',$brandinfo);

$setinfo = D('Setting')
            ->field('pct_supvip,pct_vip,pct_backprev')
            ->select();
        $this->assign('setinfo',$setinfo);

        $haocheinfo=D('Haoche')
        ->alias('h')
            ->join('__HAOCATEGORY__ as hc on h.cat_id=hc.cat_id')
            ->field('h.*,hc.cat_name')
            ->order('goods_id desc')
            ->where(array('brand_id'=>$brand_id))
            ->where("is_show='0' AND h.cat_id=2 AND is_del='0'")
            ->select();
//        dump($haocheinfo);die;
foreach($haocheinfo as $key=>$value){
			$haocheinfo[$key]['downpay'] = number_format(round($value['price']*$setinfo[0]['pct_vip']/10000/100,2),2);
			$haocheinfo[$key]['fanzeng'] = number_format(round($value['price']*$setinfo[0]['pct_vip']*$setinfo[0]['pct_backprev']/10000/10000,2),2);
		}
        $this->assign('haocheinfo',$haocheinfo);

        $this ->display();
    }


    function price(){
        $price_id = I('get.price_id');
        $priceinfo=D('Haoprice')->where(array('price_id'=>$price_id))->find();
        $this->assign('priceinfo',$priceinfo);
//        dump($price_id);die;

$setinfo = D('Setting')
            ->field('pct_supvip,pct_vip,pct_backprev')
            ->select();
        $this->assign('setinfo',$setinfo);

        $haocheinfo=D('Haoche')
         ->alias('h')
            ->join('__HAOCATEGORY__ as hc on h.cat_id=hc.cat_id')
            ->field('h.*,hc.cat_name')
            ->order('goods_id desc')
            ->where(array('price_id'=>$price_id))
            ->where("is_show='0' AND is_del='0'")
            ->select();
//        dump($haocheinfo);die;
foreach($haocheinfo as $key=>$value){
			$haocheinfo[$key]['downpay'] = number_format(round($value['price']*$setinfo[0]['pct_vip']/10000/100,2),2);
			$haocheinfo[$key]['fanzeng'] = number_format(round($value['price']*$setinfo[0]['pct_vip']*$setinfo[0]['pct_backprev']/10000/10000,2),2);
		}
        $this->assign('haocheinfo',$haocheinfo);



        $this->display();
    }

    function detail(){
        $goods_id= I('get.goods_id');

$setinfo = D('Setting')
            ->field('pct_supvip,pct_vip,pct_backprev')
            ->select();
        $this->assign('setinfo',$setinfo);

        $info = D('Haoche')
         ->alias('h')
            ->join('__HAOCATEGORY__ as hc on h.cat_id=hc.cat_id')
            ->field('h.*,hc.cat_name')
            ->where(array('goods_id'=>$goods_id))
            ->where("is_show='0'")
            ->select();
		//dump($info);die;
foreach($info as $key=>$value){
			$info[$key]['downpay'] = number_format(round($value['price']*$setinfo[0]['pct_vip']/10000/100,2),2);
			$info[$key]['fanzeng'] = number_format(round($value['price']*$setinfo[0]['pct_vip']*$setinfo[0]['pct_backprev']/10000/10000,2),2);
		}
//dump($info);die;
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



        /**获得商品“单选”属性信息 start**/
        $attrinfo1 = D('HaocheAttr')
            ->alias('ga')
            ->join('__HAOATTRIBUTE__ a on ga.attr_id=a.attr_id')
            ->where(array('ga.goods_id'=>$goods_id,'a.attr_sel'=>'0'))
            ->field('a.attr_id,a.attr_name,ga.attr_value attrval')
            ->select();
        $this -> assign('attrinfo1',$attrinfo1);
        /**获得商品“单选”属性信息 end**/

        //多选
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

		$setinfo = D('Setting')
            ->field('pct_supvip,pct_vip,pct_backprev')
            ->select();
        $this->assign('setinfo',$setinfo);

   $searchinfo = D('Haoche')
         ->alias('h')
            ->join('__HAOCATEGORY__ as hc on h.cat_id=hc.cat_id')
            ->field('h.*,hc.cat_name')
            ->order('goods_id desc')
            ->where($map)
            ->where("is_show='0'")
            ->select();
   	foreach($searchinfo as $key=>$value){
			$searchinfo[$key]['downpay'] = number_format(round($value['price']*$setinfo[0]['pct_vip']/10000/100,2),2);
			$searchinfo[$key]['fanzeng'] = number_format(round($value['price']*$setinfo[0]['pct_vip']*$setinfo[0]['pct_backprev']/10000/10000,2),2);
		}
         $this->assign('searchinfo',$searchinfo);



        $this->display();
    }
}