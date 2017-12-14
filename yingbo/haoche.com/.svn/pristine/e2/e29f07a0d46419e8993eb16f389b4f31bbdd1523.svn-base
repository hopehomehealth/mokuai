<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/6/13
 * Time: 11:37
 */
namespace Home\Controller;
use Think\Controller;
class UnionController extends Controller {
    function index(){
        $daohang = array(
            'second'=>'369商家联盟',
            'third'=>"<a class='head_login'>&nbsp;</a> ",
        );
        $this -> assign('daohang',$daohang);

        /*
    * 分类数据
    */
        if(isset($_SESSION['flag'])){
            $userid = $_SESSION['userInfo']['userid'];
            $userinfo = M('user')->find($userid);
            if($userinfo['vipexpire'] <= time()){
                $buyvip = '1';
            }else{
                $buyvip = '0';
            }
            
        }else{
            $buyvip = '1';
        }
        $this->assign('buyvip',$buyvip);
        $catinfo1 = D('Sellercat')
            ->where('cat_id=1')
            ->select();
        $this->assign('catinfo1',$catinfo1);
        $catinfo2 = D('Sellercat')
            ->where('cat_id=2')
            ->select();
        $this->assign('catinfo2',$catinfo2);
        $catinfo3 = D('Sellercat')
            ->where('cat_id=3')
            ->select();
        $this->assign('catinfo3',$catinfo3);
        $catinfo4 = D('Sellercat')
            ->where('cat_id=4')
            ->select();
        $this->assign('catinfo4',$catinfo4);

        $zenginfo = D('Seller')
            ->alias('s')
            ->join('__ZENG__ as z on z.userid=s.userid')
            ->field('z.*,s.seller_id,s.seller_name')
            ->where("z.is_show='0' AND z.is_del='0' AND z.status='1' AND s.status = '1'")
            ->order('z.zeng_id desc')
            ->limit(0,5)
            ->select();
//        dump($zenginfo);die;
        $this->assign('zenginfo',$zenginfo);

        $this ->display();
    }

    //店铺分类页
    function allcatlist(){
        $daohang = array(
            'second'=>'商家分类',
            'third'=>"<a class='head_back2'>&nbsp;</a>",
        );
        $this -> assign('daohang',$daohang);
        $sellerinfo = D('Seller')->where("status='1'")->select();
        $catinfo = D('Sellercat')->select();
        foreach($catinfo as $k =>$v){
            $catinfo[$k]['sellerinfo']= array();
            foreach($sellerinfo as $kk => $vv){
                if($v['cat_id'] == $vv['cat_id']){
                    $catinfo[$k]['sellerinfo'][] = $vv;
                }
            }
        }
//dump($catinfo);die;
        $this->assign('catinfo',$catinfo);
        $this->display();
    }
      //店铺公告
    function gonggao(){
        $daohang = array(
            'second'=>"店铺公告",
            'third'=>"<a class='head_back2'>&nbsp;</a>",
        );
        $this -> assign('daohang',$daohang);
        $seller_id = I('get.seller_id');
         $info = D('Seller')->where("seller_id=$seller_id")->select();

        $content =html_entity_decode($info[0]['content']);
        $this->assign('content',$content);
        $this->display();
    }
    //店铺详情页
    function diandetail(){
        $daohang = array(
            'second'=>"店铺主页",
            'third'=>"<a class='head_back2'>&nbsp;</a>",
        );
        $this -> assign('daohang',$daohang);
        $seller_id = I('get.seller_id');
        $zenginfo = D('Zeng')
            ->alias('z')
            ->join('__SELLER__ as s on z.userid=s.userid')
            ->field('z.*,s.seller_id,s.seller_name,s.pic_dian')
            ->where("is_show='0' AND is_del='0' AND seller_id = $seller_id")
            ->order('add_time desc')
            ->select();
//        dump($zenginfo);die;
        $this->assign('zenginfo',$zenginfo);

        $userid = $zenginfo[0]['userid'];


        $hotinfo = D('Sgoods')
            ->where("is_show='0' AND is_del='0' AND is_hot='0' AND userid = $userid")
            ->order('add_time desc')
            ->select();
        $this->assign('hotinfo',$hotinfo);

        $sgoodsinfo = D('Sgoods')->where("is_show='0' AND is_del='0' AND userid = $userid")->select();
        $catinfo = D('Scategory')->where("userid=$userid")->select();
        foreach($catinfo as $k =>$v){
            $catinfo[$k]['sgoodsinfo']= array();
            foreach($sgoodsinfo as $kk => $vv){
                if($v['cat_id'] == $vv['cat_id']){
                    $catinfo[$k]['sgoodsinfo'][] = $vv;
                }
            }
        }
//dump($catinfo);die;
        $this->assign('catinfo',$catinfo);


        $this->display();
    }

    //店铺搜索页
    function diansearch(){
        $daohang = array(
            'second'=>"店铺搜索结果",
            'third'=>"<a class='head_back2'>&nbsp;</a>",
        );
        $this -> assign('daohang',$daohang);
        if($_POST){
            $searchname = $_POST;
            $map['seller_name'] = array('LIKE',"%{$searchname['searchname']}%");
        }else{
            $map = '';

        }

        $searchinfo = D('Seller')
            ->order('seller_id desc')
            ->where($map)
            ->where("status='1'")
            ->select();
        $this->assign('searchinfo',$searchinfo);

        $this->display();
    }

    //1p商品详情页
    function freedetail(){
        $daohang = array(
            'second'=>"1P产品详情",
            'third'=>"<a class='head_back2'>&nbsp;</a>",
        );
        $this -> assign('daohang',$daohang);
        $zeng_id = I('get.zeng_id');
        $zenginfo = D('Zeng')
            ->where("zeng_id = $zeng_id")
            ->select();
$content =html_entity_decode($zenginfo[0]['introduce']);
         $this->assign('content',$content);
        $this->assign('zenginfo',$zenginfo);
        $userid = $zenginfo[0]['userid'];
        $zenginfo2 = D('Zeng')
            ->where("is_show='0' AND is_del='0' AND status='1' AND zeng_id != $zeng_id AND userid=$userid")
            ->order('add_time desc')
            ->select();
//        dump($zenginfo);die;
        $this->assign('zenginfo2',$zenginfo2);

        $this->display();
    }


    //商品详情页
    function goodsdetail(){
        $daohang = array(
            'second'=>"商品详情",
            'third'=>"<a class='head_back2'>&nbsp;</a>",
        );
        $this -> assign('daohang',$daohang);
        $goods_id = I('get.goods_id');
        $goodsinfo = D('Sgoods')
            ->where("goods_id = $goods_id")
            ->select();
        $content =html_entity_decode($goodsinfo[0]['introduce']);
        $this->assign('content',$content);
        $this->assign('goodsinfo',$goodsinfo);


        $this->display();
    }

    //商品搜索页
    function goodsearch(){
        $daohang = array(
            'second'=>"商品搜索结果",
            'third'=>"<a class='head_back2'>&nbsp;</a>",
        );
        $this -> assign('daohang',$daohang);
        if($_POST){
            $searchname = $_POST;
            $map['goods_name'] = array('LIKE',"%{$searchname['searchname']}%");

        }else{
            $map = '';

        }
         $seller_id = $_POST['seller_id'];
        $userinfo = D('Seller')->field('userid')->find($seller_id);
        $userid=$userinfo['userid'];
//        dump($userid);die;
        $searchinfo = D('Sgoods')
            ->order('goods_id desc')
            ->where($map)
            ->where("userid=$userid")
            ->select();
        $this->assign('searchinfo',$searchinfo);

        $this->display();
    }

    //热销详情页
    function hotdetail(){
        $daohang = array(
            'second'=>"热销产品详情",
            'third'=>"<a class='head_back2'>&nbsp;</a>",
        );
        $this -> assign('daohang',$daohang);
        $goods_id = I('get.goods_id');
        $hotinfo = D('Sgoods')
            ->where("goods_id = $goods_id")
            ->select();
        $content =html_entity_decode($hotinfo[0]['introduce']);
        $this->assign('content',$content);
        $this->assign('hotinfo',$hotinfo);
        $userid = $hotinfo[0]['userid'];
        $hotinfo2 = D('Sgoods')
            ->where("is_show='0' AND is_del='0' AND is_hot='0' AND goods_id != $goods_id AND userid=$userid")
            ->order('add_time desc')
            ->select();
//        dump($zenginfo);die;
        $this->assign('hotinfo2',$hotinfo2);

        $this->display();
    }

    function lianmengxieyi() {
        $daohang = array(
            'second'=>"369商家联盟协议",
            'third'=>"<a class='head_back2'>&nbsp;</a>",
        );
        $this -> assign('daohang',$daohang);
        $xieyi = M('Lianmengxieyi')->find();
        $this->assign('xieyi',$xieyi);
        $this->display();
    }

    function quanyixieyi() {
        $daohang = array(
            'second'=>"商家权益协议",
            'third'=>"<a class='head_back2'>&nbsp;</a>",
        );
        $this -> assign('daohang',$daohang);
        $xieyi = M('Quanyixieyi')->find();
        $this->assign('xieyi',$xieyi);
        $this->display();
    }
}