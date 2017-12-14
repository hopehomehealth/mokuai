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
		$setinfo = D('Setting')
            ->field('pct_cash')
            ->select();
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
         $catinfo8 = D('Gocategory')
            ->where('cat_id=8')
            ->select();
        $this->assign('catinfo8',$catinfo8);
        /*
         * 加油卡商品信息
         */
		 $map="is_show='0' AND is_del='0'";
		 $cat_ids1=D('Gocategory')->where('pid=1')
			// ->field('group_concat(cat_id) cid')
			 ->select();
		//dump($cat_ids1);die;

$goodsinfo11 = array();
		foreach($cat_ids1 as $k=>$v){
			 $goodsinfo11 =	D('Goods')
			  ->where(array('cat_id'=>$v['cat_id']))
            ->where($map)
            ->order('goods_id desc')
           ->limit('0,1')
            ->select();

		$goodsinfo1[] = $goodsinfo11[0];
		 }

		foreach($goodsinfo1 as $key=>$value){
			$goodsinfo1[$key]['downpay'] = number_format(round($value['price']*$setinfo[0]['pct_cash']/100,2),2);
		}
		//dump($goodsinfo1);die;
        $this->assign('goodsinfo1',$goodsinfo1);
        //自主品牌
        $cat_ids2=D('Gocategory')->where('pid=2')
			// ->field('group_concat(cat_id) cid')
			 ->select();
		//dump($cat_ids1);die;

$goodsinfo22 = array();
		foreach($cat_ids2 as $k=>$v){
			 $goodsinfo22 =	D('Goods')
			  ->where(array('cat_id'=>$v['cat_id']))
            ->where($map)
            ->order('goods_id desc')
           ->limit('0,1')
            ->select();

		$goodsinfo2[] = $goodsinfo22[0];
		 }

		foreach($goodsinfo2 as $key=>$value){
			$goodsinfo2[$key]['downpay'] = number_format(round($value['price']*$setinfo[0]['pct_cash']/100,2),2);
		}
        $this->assign('goodsinfo2',$goodsinfo2);



        $cart = new \Common\Common\Cart();
        //把购物车商品"总数量"获取并返回
        $numberprice = $cart -> getNumberPrice();
        $this-> assign("number",$numberprice['number']);



        $this->assign('setinfo',$setinfo);

        $this->display();
    }

    //分类列表页
    function catlist(){
        $cat_id = I('get.cat_id');
		if(IS_POST){
			$cat_id = $_POST['cat_id'];
		}
        $catinfo = D('Gocategory')
            ->where(array('cat_id'=>$cat_id))
        ->select();
        $this->assign('catinfo',$catinfo);
		//查询设置信息
		$setinfo = D('Setting')
            ->field('pct_cash')
            ->select();
		$count = D('Goods')->where(array('cat_id'=>$cat_id))->where("is_show='0' AND is_del = '0'")->count();
        $p = new \Think\Page($count,6);
        $goodsinfo = D('Goods')
            ->where(array('cat_id'=>$cat_id))
            ->where("is_show='0' AND is_del = '0'")
            ->order('goods_id desc')
			->limit($p->firstRow.','.$p->listRows)
            ->select();
		foreach($goodsinfo as $key=>$value){
			$goodsinfo[$key]['downpay'] = number_format(round($value['price']*$setinfo[0]['pct_cash']/100,2),2);
			$goodsinfo[$key]['logo'] = substr($value['logo'],1);
		}
		$totalPages = $p->totalPages;
		if(IS_POST){
			$this->ajaxReturn(array(
				'error'   => 0,
				'content' => $goodsinfo
			));
		}

		$this->assign("totalPages",$totalPages);
        $this->assign('goodsinfo2',$goodsinfo2);
        $this->assign('goodsinfo',$goodsinfo);


        $cart = new \Common\Common\Cart();
        //把购物车商品"总数量"获取并返回
        $numberprice = $cart -> getNumberPrice();
        $this-> assign("number",$numberprice['number']);


        $this->assign('setinfo',$setinfo);
        $this->display();
    }

    //全部分类页
    function allcatlist(){
		$cat_id = I('get.cat_id');

		$setinfo = D('Setting')
            ->field('pct_cash')
            ->select();



        //判断当前分类是第几个级别
        $now_cat_info = D('Gocategory')->find($cat_id);
        //把当前点击分类信息传递给模板
        $this -> assign('now_cat_info',$now_cat_info);
        $cdt['cat_id'] = $cat_id;
        if($now_cat_info['level']=='0'){
            //第1个级别,直接去sp_goods里边获得商品信息,条件cat_id=$cat_id
            $goodsids = D('Goods')
                ->field('group_concat(goods_id) gid')
                ->where($cdt)
                ->find();
        }else{
            //第2/3级别，去sp _goods_cat表中获得商品信息
            $goodsids = D('GoodsCat')
                ->where($cdt)
                ->field('group_concat(goods_id) gid')
                ->find();
        }
         $goods_ids_str = $goodsids['gid'];
        if($goods_ids_str == ''){
            $goods_ids_str = 0;
        }


// dump($goods_ids_str);die;
 /** 把当前选中分类所在的其他全部分类都获得出来 start **/
        //拆分选中分类的全路径
        $cat_arr = explode('-',$now_cat_info['path']);
        $ding_path = $cat_arr[0];

        //A 获得全部子级(第2/3级别)分类信息
        $son_catinfo = D('Gocategory')
            ->field('cat_id,cat_name,pid,level')
            ->where(array('path'=>array('like',$ding_path.'-%')))
            ->order('cat_id')
            ->select();
            $son_cats = array();
         foreach ($son_catinfo as $key => $v) {
                $son_cats[] = $v['cat_id'];
            }
$son_cats_str = implode(',', $son_cats);


// dump($son_cats_str);die;


        //B 获得顶级分类信息
        $ding_catinfo = D('Gocategory')
            ->field('cat_id,cat_name,pid')
            ->find($ding_path);//返回一维

        $this -> assign('ding_catinfo',$ding_catinfo);


        //dump(array_merge($son_catinfo,$ding_catinfo));
        /** 把当前选中分类所在的其他全部分类都获得出来 end **/



   //商品数据
        $map="is_show='0' AND is_del='0'";
        $goodsinfo = D('Goods')
            // ->alias('g')
            // ->join('__GOCATEGORY__ gc on gc.cat_id = g.cat_id')
            // ->field('g.*,gc.*')
            // array('cat_level'=>array('in','0,1'))
            ->where(array('cat_id'=>array('in',$son_cats_str)))
            ->where($map)
            ->order('goods_id desc')
            ->select();
            // dump($goodsinfo);die;
 foreach($goodsinfo as $key=>$value){
			$goodsinfo[$key]['downpay'] = number_format(round($value['price']*$setinfo[0]['pct_cash']/100,2),2);

		}
         foreach($son_catinfo as $k =>$v){
            $son_catinfo[$k]['goodsinfo']= array();
            foreach($goodsinfo as $kk => $vv){
                if($v['cat_id'] == $vv['cat_id']){
                    $son_catinfo[$k]['goodsinfo'][] = $vv;
                }
            }
        }

         //dump($goodsinfo);die;
   $this->assign('setinfo',$setinfo);
        $this->assign('goodsinfo',$goodsinfo);
  $this -> assign('son_catinfo',$son_catinfo);

        $cart = new \Common\Common\Cart();
        //把购物车商品"总数量"获取并返回
        $numberprice = $cart -> getNumberPrice();
        $this-> assign("number",$numberprice['number']);


        $this->display();
    }

    //详情页
    function detail(){
        $goods_id= I('get.goods_id');
		$setinfo = D('Setting')
            ->field('pct_cash')
            ->select();
        $this->assign('setinfo',$setinfo);
        $info = D('Goods')
            ->where(array('goods_id'=>$goods_id))
            ->where("is_show='0'")
            ->find();
		$info['downpay'] = number_format(round($info['price']*$setinfo[0]['pct_cash']/100,2),2);
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



        /**获得商品“单选”属性信息 start**/
        $attrinfo1 = D('GoodsAttr')
            ->alias('ga')
            ->join('__GOATTRIBUTE__ a on ga.attr_id=a.attr_id')
            ->where(array('ga.goods_id'=>$goods_id,'a.attr_sel'=>'0'))
            ->field('a.attr_id,a.attr_name,ga.attr_value attrval')
            ->select();
        $this -> assign('attrinfo1',$attrinfo1);
        /**获得商品“单选”属性信息 end**/


        //多选
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
		if($goodsinfo['number'] < 1){
			$this->ajaxReturn(array(
				'error'=>3
			));
		}
		if(($goodsinfo['cycle'] == 0) || ($goodsinfo['cycle'] == '')){
			$this->ajaxReturn(array(
				'error'=>0
			));
		}else{
			$userid = $_SESSION['userInfo']['userid'];
			$order = M('order')->where("userid = {$userid} AND goods_id = {$goods_id} AND shipping_status = '1'")->select();
			//var_dump($order);exit;
			//如果是加油卡
			if($goods_id == 111){
				if($order){
					$this->ajaxReturn(array(
						'error'=>2
					));
				}else{
					$this->ajaxReturn(array(
						'error'=>0
					));
				}
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
		 $setinfo = D('Setting')
            ->field('pct_cash')
            ->select();
   $searchinfo = D('Goods')
            ->order('goods_id desc')
            ->where($map)
            ->where("is_show='0' AND is_del='0'")
            ->select();
   foreach($searchinfo as $key=>$value){
			$searchinfo[$key]['downpay'] = number_format(round($value['price']*$setinfo[0]['pct_cash']/100,2),2);
		}
         $this->assign('searchinfo',$searchinfo);



        $this->assign('setinfo',$setinfo);
        $this->display();
    }
	//加入购物车
	function addCart() {
		if(!isset($_SESSION['flag'])){
			echo json_encode(array('error'=>1));return;
		}else{
			$userid = $_SESSION['userInfo']['userid'];
		}
		$goods_id = $_GET['goods_id'];
		$attr_model = M('goods_attr');
		$goods_attr = $attr_model->field("attr_id")->where("goods_id = {$goods_id}")->select();
		$goods_attr = array_unique($goods_attr);
		$attrid_str = '';
		foreach($goods_attr as $key => $value){
			$attrid_str.= $value['attr_id'].',';
		}
		$map['attr_id'] = array('in',rtrim($attrid_str,','));
		$attribute = M('goattribute')->field("attr_name,attr_vals")->where($map)->select();
		$spec = '';
		foreach($attribute as $key => $value){
			$spec .= $value['attr_name'].explode(',',$value['attr_vals'])[0];
		}

		//echo $spec;exit;

        //根据$goods_id获得其他信息(name/price/number/totalprice)
        $goodsinfo = D('Goods')
            ->field('cycle,goods_name,price,mid_logo')
            ->find($goods_id);
		if(($goodsinfo['cycle'] == 0) || ($goodsinfo['cycle'] == '')){

		}else{
			$order = M('order')->where("userid = {$userid} AND goods_id = {$goods_id} AND order_status = '0'")->select();
			if($order){
				echo json_encode(array('error'=>2));return;
			}
		}
        $arr = array(
            'goods_id'=>$goods_id,
            'goods_name'=>$goodsinfo['goods_name'],
            'mid_logo'=>$goodsinfo['mid_logo'],
            'price'=>$goodsinfo['price'],
            'spec'=>$spec,
            'goods_buy_number'=>1,
            'goods_total_price'=>$goodsinfo['price'],
        );
        //使得$arr进入购物车
        $cart = new \Common\Common\Cart(); //已经获得购物车存在的商品信息了
        $cart -> add($arr);
        //获得购物车商品总数量和总价格，返回给客户端显示
        $numberprice = $cart -> getNumberPrice();
//        dump($numberprice);die;
        echo json_encode($numberprice);
	}
}