<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/6/13
 * Time: 11:37
 */
namespace Home\Controller;
use Common\Common\ComController;
class GoodsController extends ComController {
    //商城首页
    function index(){
        $daohang = array(
            'second'=>'乐购商城',
//            'third'=>'<a class="head_login" href="showlist.html">&nbsp;</a>',
        );
        $this -> assign('daohang',$daohang);

        $bannerinfo = D('Banner')
            ->where("is_area='2'")
            ->select();
        $this->assign('bannerinfo',$bannerinfo);


        /*
         * 分类数据
         */
        $catinfo1 = D('Gocategory')
            ->where('cat_id=1')
            ->select();
        $this->assign('catinfo1',$catinfo1);
        $catinfo2 = D('Gocategory')
            ->where('cat_id=2')
            ->select();
        $this->assign('catinfo2',$catinfo2);
        $catinfo3 = D('Gocategory')
            ->where('cat_id=3')
            ->select();
        $this->assign('catinfo3',$catinfo3);
        $catinfo4 = D('Gocategory')
            ->where('cat_id=4')
            ->select();
        $this->assign('catinfo4',$catinfo4);
        $catinfo5 = D('Gocategory')
            ->where('cat_id=5')
            ->select();
        $this->assign('catinfo5',$catinfo5);
        $catinfo6 = D('Gocategory')
            ->where('cat_id=6')
            ->select();
        $this->assign('catinfo6',$catinfo6);
        $catinfo7 = D('Gocategory')
            ->where('cat_id=7')
            ->select();
        $this->assign('catinfo7',$catinfo7);

        /*
         * 手机商品信息
         */
        $goodsinfo1 = D('Goods')
            ->alias('g')
            ->join('__GOBRAND__ gb on gb.brand_id = g.brand_id')
            ->field('g.*,gb.brand_name')
            ->where("is_show='0' AND cat_id=1")
            ->order('goods_id desc')
            ->select();

        $this->assign('goodsinfo1',$goodsinfo1);
        $goodsinfo2 = D('Goods')
            ->alias('g')
            ->join('__GOBRAND__ gb on gb.brand_id = g.brand_id')
            ->field('g.*,gb.brand_name')
            ->where("is_show='0' AND cat_id=2")
            ->order('goods_id desc')
            ->select();
        $this->assign('goodsinfo2',$goodsinfo2);



        $cart = new \Common\Common\Cart();
        //把购物车商品"总数量"获取并返回
        $numberprice = $cart -> getNumberPrice();
        $this-> assign("number",$numberprice['number']);


        $setinfo = D('Setting')
            ->field('pct_cash')
            ->select();
        $this->assign('setinfo',$setinfo);

        $this->display();
    }

    //分类列表页
    function catlist(){
        $cat_id = I('get.cat_id');
        $catinfo = D('Gocategory')
            ->where(array('cat_id'=>$cat_id))
        ->select();
        $this->assign('catinfo',$catinfo);

        $goodsinfo = D('Goods')
            ->where(array('cat_id'=>$cat_id))
            ->where("is_show='0'")
            ->order('goods_id desc')
            ->select();
        $this->assign('goodsinfo',$goodsinfo);


        $cart = new \Common\Common\Cart();
        //把购物车商品"总数量"获取并返回
        $numberprice = $cart -> getNumberPrice();
        $this-> assign("number",$numberprice['number']);

        $setinfo = D('Setting')
            ->field('pct_cash')
            ->select();
        $this->assign('setinfo',$setinfo);
        $this->display();
    }

    //全部分类页
    function allcatlist(){

        //手机类
        $goodsinfo1 = D('Goods')
            ->alias('g')
            ->join('__GOCATEGORY__ gc on gc.cat_id = g.cat_id')
            ->field('g.*,gc.cat_name')
            ->where("is_show='0' AND g.cat_id=1")
            ->order('goods_id desc')
            ->select();
        $this->assign('goodsinfo1',$goodsinfo1);
//        dump($goodsinfo);die;
        //家电类
        $goodsinfo2 = D('Goods')
            ->alias('g')
            ->join('__GOCATEGORY__ gc on gc.cat_id = g.cat_id')
            ->field('g.*,gc.cat_name')
            ->where("is_show='0' AND g.cat_id=2")
            ->order('goods_id desc')
            ->select();
        $this->assign('goodsinfo2',$goodsinfo2);
               //服装类
        $goodsinfo3 = D('Goods')
            ->alias('g')
            ->join('__GOCATEGORY__ gc on gc.cat_id = g.cat_id')
            ->field('g.*,gc.cat_name')
            ->where("is_show='0' AND g.cat_id=3")
            ->order('goods_id desc')
            ->select();
        $this->assign('goodsinfo3',$goodsinfo3);
              //礼品类
        $goodsinfo4 = D('Goods')
            ->alias('g')
            ->join('__GOCATEGORY__ gc on gc.cat_id = g.cat_id')
            ->field('g.*,gc.cat_name')
            ->where("is_show='0' AND g.cat_id=4")
            ->order('goods_id desc')
            ->select();
        $this->assign('goodsinfo4',$goodsinfo4);
                      //居家类
        $goodsinfo5 = D('Goods')
            ->alias('g')
            ->join('__GOCATEGORY__ gc on gc.cat_id = g.cat_id')
            ->field('g.*,gc.cat_name')
            ->where("is_show='0' AND g.cat_id=5")
            ->order('goods_id desc')
            ->select();
        $this->assign('goodsinfo5',$goodsinfo5);
                              //美妆类
        $goodsinfo6 = D('Goods')
            ->alias('g')
            ->join('__GOCATEGORY__ gc on gc.cat_id = g.cat_id')
            ->field('g.*,gc.cat_name')
            ->where("is_show='0' AND g.cat_id=6")
            ->order('goods_id desc')
            ->select();
        $this->assign('goodsinfo6',$goodsinfo6);

                                  //美食类
        $goodsinfo7 = D('Goods')
            ->alias('g')
            ->join('__GOCATEGORY__ gc on gc.cat_id = g.cat_id')
            ->field('g.*,gc.cat_name')
            ->where("is_show='0' AND g.cat_id=7")
            ->order('goods_id desc')
            ->select();
        $this->assign('goodsinfo7',$goodsinfo7);
        $cart = new \Common\Common\Cart();
        //把购物车商品"总数量"获取并返回
        $numberprice = $cart -> getNumberPrice();
        $this-> assign("number",$numberprice['number']);

        $setinfo = D('Setting')
            ->field('pct_cash')
            ->select();
        $this->assign('setinfo',$setinfo);
        $this->display();
    }

    //详情页
    function detail(){
        $goods_id= I('get.goods_id');
        $info = D('Goods')
            ->where(array('goods_id'=>$goods_id))
            ->where("is_show='0'")
            ->find();
        $this->assign('info',$info);

        $picsinfoA = D('GoodsPics')
            ->where(array('goods_id'=>$goods_id))
            ->limit(0,4)
            ->select();
        $this->assign('picsinfoA',$picsinfoA);
//        dump($picsinfoA);die;
        $picsinfoB = D('GoodsPics')
            ->where(array('goods_id'=>$goods_id))
            ->limit(4,8)
            ->select();
        $this->assign('picsinfoB',$picsinfoB);

        $setinfo = D('Setting')
            ->field('pct_cash')
            ->select();
        $this->assign('setinfo',$setinfo);

        $attrinfo2 = D('GoodsAttr')
            ->alias('ga')
            ->join('__GOATTRIBUTE__ a on ga.attr_id=a.attr_id')
            ->where(array('ga.goods_id'=>$goods_id,'a.attr_sel'=>'1'))
            ->field('a.attr_id,a.attr_name,group_concat(ga.attr_value) attrval')
            ->group('attr_id')
            ->select();
        foreach($attrinfo2 as $k => $v){
            $attrinfo2[$k]['val'] = explode(',',$v['attrval']);
        }
         // dump($attrinfo2[$k]['val']);die;
        $cart = new \Common\Common\Cart();
        //把购物车商品"总数量"获取并返回
        $numberprice = $cart -> getNumberPrice();
        $this-> assign("number",$numberprice['number']);
        $this -> assign('attrinfo2',$attrinfo2);

        $this->display();
    }
	//立即下单的Ajax验证
	function checkorder() {
		if(!isset($_SESSION['flag'])){
			$this->ajaxReturn(array(
				'error'=>1
			));
		}else{
			$userid = $_SESSION['userInfo']['userid'];
		}
		$goods_id = $_POST['goods_id'];
		$goodsinfo = D('Goods')
            ->find($goods_id);
		if(($goodsinfo['cycle'] == 0) || ($goodsinfo['cycle'] == '')){
			$this->ajaxReturn(array(
				'error'=>0
			));
		}else{
			$userid = $_SESSION['userInfo']['userid'];
			$order = M('order')->where("userid = {$userid} AND goods_id = {$goods_id} AND order_status = '0'")->select();
			//var_dump($order);exit;
			if($order){
				$this->ajaxReturn(array(
					'error'=>2
				));
			}else{
				$this->ajaxReturn(array(
					'error'=>0
				));
			}
		}
	}


     function search(){
           //搜索
        if($_POST){
            $searchname = $_POST;
            $map['goods_name'] = array('LIKE',"%{$searchname['searchname']}%");

        }else{
            $map = '';

        }

   $searchinfo = D('Goods')
            ->order('goods_id desc')
            ->where($map)
            ->where("is_show='0'")
            ->select();
         $this->assign('searchinfo',$searchinfo);


         $setinfo = D('Setting')
            ->field('pct_cash')
            ->select();
        $this->assign('setinfo',$setinfo);
        $this->display();
    }
}