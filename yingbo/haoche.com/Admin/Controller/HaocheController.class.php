<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/8/9 0009
 * Time: 11:35
 */

namespace Admin\Controller;
use Think\Controller;

class HaocheController extends Controller
{
    function showlist(){
        if($_POST){
            $search = $_POST;
            $map['goods_name'] = array('LIKE',"%{$search['search']}%");
        }else{
            $map = '';
        }
        
        $count = D('Haoche') ->where($map)-> count();
        $p = new \Think\Page($count,10);
        $info =  D('Haoche')
            ->alias('c')
            ->join('__HAOCATEGORY__ hc on c.cat_id=hc.cat_id')
            ->field('c.*,hc.cat_name')
            ->order('goods_id desc')
            ->where($map)
            ->where("is_del='0' AND is_show='0'")
            ->limit($p->firstRow.','.$p->listRows)
            ->select();
        $page = $p->show();
        $this -> assign('page',$page);
        $this -> assign('info',$info);
        $this->display();

    }

    function tianjia(){
        if(IS_POST){
            $goods = new \Model\HaocheModel();
            $shuju = $goods -> create();
            $shuju['add_time'] = time();
            $shuju['upd_time'] = time();
            $shuju['introduce'] = $_POST['introduce'];
            $this -> deal_logo($shuju);

            if($newid = $goods->add($shuju)){
                $this -> deal_pics($newid);
                $this -> success('添加商品成功',U('showlist'),1);
            }else{
                $this -> error('添加商品失败',U('tianjia'),1);
            }
        }else{

            /****获得“类型”并传递给模板****/
            $typeinfo = D('Haotype')->select();
            $this -> assign('typeinfo',$typeinfo);
            /****获得“类型”并传递给模板****/

            /****获得“品牌”并传递给模板****/
            $brandinfo = D('Haobrand')->select();
            $this -> assign('brandinfo',$brandinfo);
            /****获得“品牌”并传递给模板****/

            /****获得“价格区间”并传递给模板****/
            $priceinfo = D('Haoprice')->select();
            $this -> assign('priceinfo',$priceinfo);
            /****获得“价格区间”并传递给模板****/

            /****获得“第一级分类信息”并传递给模板****/
            $catinfoA = D('Haocategory')
                ->where(array('level'=>0))
                ->select();
            $this -> assign('catinfoA',$catinfoA);
            /****获得“第一级分类信息”并传递给模板****/

            $this -> display();
        }
    }

    private function deal_logo(&$data){
        if($_FILES['logo']['error']===0){
            if(!empty($data['goods_id'])){
                $oldinfo = D('Haoche')->find($data['goods_id']);
                if(!empty($oldinfo['logo'])){
                    unlink($oldinfo['logo']);
                }
            }

            $cfg = array(
                'rootPath'      =>  './Public/Upd/haoche/logo/',
            );
            $up = new \Think\Upload($cfg);
            $z = $up -> uploadOne($_FILES['logo']);

            $bigname = $up->rootPath.$z['savepath'].$z['savename'];
            $data['logo'] = $bigname;

            $im = new \Think\Image();
            $im -> open($bigname);
            $im -> thumb(87,67,6);

            $smallname = $up->rootPath.$z['savepath'].'s_'.$z['savename'];
            $im -> save($smallname);

            $data['thumb_logo'] = $smallname;

        }
    }

    //实现商品相册图片的上传处理
    private function deal_pics($goods_id){

        $cfg = array(
            'rootPath'      =>  './Public/Upd/haoche/pics/',
        );
        $up = new \Think\Upload($cfg);

        $z = $up ->upload(array($_FILES['goods_pics']));
        $im = new \Think\Image();
        foreach($z as $k => $v){
            $yuanname = $up->rootPath.$v['savepath'].$v['savename'];

            $im -> open($yuanname);
            //3个缩略图同时制作，必须按照大、中、小的顺序制作
            $im -> thumb(800,800,6); //大图 缩略图
            $bigname = $up->rootPath.$v['savepath'].'b_'.$v['savename'];
            $im -> save($bigname);

            $im -> thumb(375,250,6); //中图 缩略图
            $midname = $up->rootPath.$v['savepath'].'m_'.$v['savename'];
            $im -> save($midname);

            $im -> thumb(337,189,6); //小图 缩略图
            $smaname = $up->rootPath.$v['savepath'].'s_'.$v['savename'];
            $im -> save($smaname);

            $arr = array(
                'goods_id'=>$goods_id,
                'pics_big'=>$bigname,
                'pics_mid'=>$midname,
                'pics_sma'=>$smaname,
            );
            D('HaochePics')->add($arr);
        }
    }

    function upd(){
        $goods_id = I('get.goods_id');
        $goods = new \Model\HaocheModel();
        if(IS_POST){
            $shuju = $goods -> create();
            $shuju['upd_time'] = time();
            $shuju['introduce'] = $_POST['introduce'];
            $this -> deal_logo($shuju);
            $this -> deal_pics($shuju['goods_id']);

            if($goods->save($shuju)){
                $this -> success('修改商品成功',U('showlist'),1);
                exit;
            }else{
                $this -> error('修改商品失败',U('upd',array('goods_id'=>$goods_id)),1);
                exit;
            }
        }else{
            $info = $goods->find($goods_id);

            /****相册图片信息goods_pics****/
            $picsinfo = D('HaochePics')
                ->where(array('goods_id'=>$goods_id))
                ->select();
            $this -> assign('picsinfo',$picsinfo);
            /****相册图片信息****/

            /****获得“类型”并传递给模板****/
            $typeinfo = D('Haotype')->select();
            $this -> assign('typeinfo',$typeinfo);
            /****获得“类型”并传递给模板****/
            /****获得“价格区间”并传递给模板****/
            $priceinfo = D('Haoprice')->select();
            $this -> assign('priceinfo',$priceinfo);
            /****获得“价格区间”并传递给模板****/

            /****获得“品牌”并传递给模板****/
            $brandinfo = D('Haobrand')->select();
            $this -> assign('brandinfo',$brandinfo);
            /****获得“品牌”并传递给模板****/

            /****获得“第一级分类信息”并传递给模板****/
            $catinfoA = D('Haocategory')
                ->where(array('level'=>0))
                ->select();
            $this -> assign('catinfoA',$catinfoA);
            /****获得“第一级分类信息”并传递给模板****/

            /****获得商品的所有扩展分类信息****/
            $ext = D('HaocheCat')
                ->where(array('goods_id'=>$goods_id))
                ->field('group_concat(cat_id) as extids')
                ->find();
            $extcatids = $ext['extids'];
            $this -> assign('extcatids',$extcatids);
            /****获得商品的所有扩展分类信息****/

            $this -> assign('info',$info);
            $this -> display();
        }
    }


    function delPics(){
        $pics_id = I('get.pics_id');
        $picsinfo = D('HaochePics')->find($pics_id);

        unlink($picsinfo['pics_big']);
        unlink($picsinfo['pics_mid']);
        unlink($picsinfo['pics_sma']);
        D('HaochePics')->delete($pics_id);

        echo json_encode(array('flag'=>1));
    }

    function del(){
        $goods_id = I('get.goods_id');
        $sql="update hc_haoche set is_del='1' where goods_id=$goods_id";
        if(D('Haoche')->execute($sql)){
            $this->success('删除成功',U('showlist'));
        }else{
            $this->error('删除失败',U('del',array('goods_id'=>$goods_id)),1);
        }
    }
}