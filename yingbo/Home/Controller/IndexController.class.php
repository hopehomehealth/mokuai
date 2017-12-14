<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/6/13
 * Time: 11:37
 */
namespace Home\Controller;
use Common\Common\ComController;
class IndexController extends ComController {
    function index(){
        $daohang = array(
            'first'=>'渠道建设',
            'second'=>'新农缘天下商城',
        );
        $this -> assign('daohang',$daohang);


        $setinfo = D('Setting')
            ->field('pct_supvip,pct_vip,pct_backprev')
            ->select();
        $this->assign('setinfo',$setinfo);
//          dump($setinfo);die;

       $bannerinfo = D('Banner')
            ->where("is_area='0'")
            ->select();
        $this->assign('bannerinfo',$bannerinfo);

        $newsinfo = D('News')
            ->order('news_id desc')
			->where("is_show='0'")
            ->limit(0,4)
            ->select();
        $this->assign('newsinfo',$newsinfo);


$map="is_show='0' AND is_del='0' AND h.cat_id=1";
        $haocheinfo1 = D('Haoche')
            ->alias('h')
            ->join('__HAOCATEGORY__ as hc on h.cat_id=hc.cat_id')
            ->field('h.*,hc.cat_name')
            ->order('goods_id desc')
            ->where($map)
            ->limit(0,3)
            ->select();
		foreach($haocheinfo1 as $key=>$value){
			$haocheinfo1[$key]['downpay'] = number_format(round($value['price']*$setinfo[0]['pct_vip']/10000/100,2),2);
			$haocheinfo1[$key]['fanzeng'] = number_format(round($value['price']*$setinfo[0]['pct_vip']*$setinfo[0]['pct_backprev']/10000/10000,2),2);
		}
		//dump($haocheinfo1);die;
        $this->assign('haocheinfo1',$haocheinfo1);
// dump($haocheinfo);die;
$haocheinfo2 = D('Haoche')
            ->alias('h')
            ->join('__HAOCATEGORY__ as hc on h.cat_id=hc.cat_id')
            ->field('h.*,hc.cat_name')
            ->order('goods_id desc')
			->where("is_show='0' AND is_del='0' AND h.cat_id=2")
            ->limit(0,3)
            ->select();
foreach($haocheinfo2 as $key=>$value){
			$haocheinfo2[$key]['downpay'] = number_format(round($value['price']*$setinfo[0]['pct_vip']/10000/100,2),2);
			$haocheinfo2[$key]['fanzeng'] = number_format(round($value['price']*$setinfo[0]['pct_vip']*$setinfo[0]['pct_backprev']/10000/10000,2),2);
		}
        $this->assign('haocheinfo2',$haocheinfo2);

        $this ->display();
    }
}