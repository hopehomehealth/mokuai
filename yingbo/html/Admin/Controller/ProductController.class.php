<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/6/13
 * Time: 11:37
 */
namespace Admin\Controller;
use Common\Common\AdminController;
class ProductController extends AdminController
{
    //商品列表
    function showlist()
    {
        if($_POST){
            $search = $_POST;
            $map['china'] = array('LIKE',"%{$search['search']}%");
        }else{
            $map = '';
        }
        $product = D('Product');
        $count = $product-> count();
        $p = new \Think\Page($count,10);
        $info = D('Product')
            ->alias('p')
            ->join('__PRODUCTCLASS__ pc on p.cat_id=pc.cat_id')
            ->field('p.*,pc.name')
            ->where($map)
            ->order('pro_id desc')->limit($p->firstRow.','.$p->listRows)
            ->select();
        $page = $p->show();

            // $url = "http://". MODULE_PATH ; //二维码内容
            // dump($url);die;
//www.1lehu.com/index.php/Mobile/Product/detail/pro_id/79

        $this -> assign('page',$page);
        $this -> assign('info',$info);



        $this->display();
    }



    function tianjia(){
          // var_dump($_FILES);exit;
        if($_POST){
            $product = D('product');
            $info = $product->create();
            $info['input_time'] = time();
            if(empty($_POST['china'])){
                $this -> error('商品名不能为空');
                exit;
            }
            if(empty($_POST['price'])){
                $this -> error('商品价格不能为空');
                exit;
            }
            if($_POST['cat_id'] == 0){
                $this -> error('商品分类不能为空');
                exit;
            }


            $cfg = array(
                'rootPath'    =>  './Public/', //保存根路径
                 'savepath'  => 'Upl/product/',
            );
            $up = new \Think\Upload($cfg);
            $z = $up -> uploadOne($_FILES['pic']);

            $picname = $up->rootPath.$z['savepath'].$z['savename'];
            $info['pic'] = $picname;

            if($product -> add($info)){
                $this -> redirect('Product/showlist');
            }
        }else{
            $productClass = D('productclass');
            $classList = $productClass ->field("cat_id,name") -> select();
            $this -> assign('classList',$classList);
            $this -> display();
        }
    }
    function del(){
        $product =D('product');
        $product ->where("pro_id={$_GET['pro_id']}")-> delete();
        $this -> success("删除成功",U('showlist'));
    }

    function upd(){
        $pro_id = I('get.pro_id');
        $product = new \Model\ProductModel();
        if(IS_POST){
            $shuju = $product -> create();

            $shuju['input_time'] = time();

            if($_FILES['pic']['error']===0) {
                if (!empty($shuju['pro_id'])) {
                    $oldinfo = D('Product')->find($shuju['pro_id']);
                    if (!empty($oldinfo['pic'])) {
                        unlink($oldinfo['pic']);
                    }
                }

                $cfg = array(
                    'rootPath'    =>  './Public/', //保存根路径
                    'savepath'  => 'Upl/product/',
                );
                $up = new \Think\Upload($cfg);
                $z = $up -> uploadOne($_FILES['pic']);

                //把上传的图片"路径名"保存到数据库中
                $picname = $up->rootPath.$z['savepath'].$z['savename'];
                $shuju['pic'] = $picname;
            }

            if($product->save($shuju)){
                $this -> success('修改商品成功',U('showlist'),1);
            }else{
                $this -> error('修改商品失败',U('upd',array('pro_id'=>$pro_id)),1);
            }
        }else{
            $info = $product->find($pro_id);

            /****获得“第一级分类信息”并传递给模板****/
            $catinfoA = D('Productclass')
                ->where(array('level'=>0))
                ->select();
            $this -> assign('catinfoA',$catinfoA);
            /****获得“第一级分类信息”并传递给模板****/

            $this -> assign('info',$info);
            $this -> display();
        }
    }

public function qrcode(){
        Vendor('phpqrcode.phpqrcode');
        //生成二维码图片
        $object = new \QRcode();
        $qrcode_path='';
        $file_tmp_name='';
        $errors=array();
        if(!empty($_POST)){

            $url = "http://".$_SERVER ['HTTP_HOST'].$_SERVER['PHP_SELF']; //二维码内容
            dump($url);die;
            // $contentSize=$this->getStringLength($url);
            // if($contentSize>150){
            //     $errors[]='字数过长，不能多于150个字符！';
            // }
            if(isset($_FILES['upimage']['tmp_name']) && $_FILES['upimage']['tmp_name'] && is_uploaded_file($_FILES['upimage']['tmp_name'])){
                if($_FILES['upimage']['size']>512000){
                    $errors[]="你上传的文件过大，最大不能超过500K。";
                }
                $file_tmp_name=$_FILES['upimage']['tmp_name'];
                $fileext = array("image/pjpeg","image/jpeg","image/gif","image/x-png","image/png");
                if(!in_array($_FILES['upimage']['type'],$fileext)){
                    $errors[]="你上传的文件格式不正确，仅支持 png, jpg, gif格式。";
                }
            }
            $tpgs=$_POST['tpgs'];//图片格式
            $qrcode_bas_path='./Public/Upl/qrcode/';
            if(!is_dir($qrcode_bas_path)){
                mkdir($qrcode_bas_path, 0777, true);
            }
            $uniqid_rand=date("Ymdhis").uniqid(). rand(1,1000);
            $qrcode_path=$qrcode_bas_path.$uniqid_rand. "_1.".$tpgs;//原始图片路径
            $qrcode_path_new=$qrcode_bas_path.$uniqid_rand."_2.".$tpgs;//二维码图片路径
            if(Helper::getOS()=='Linux'){
                $mv = move_uploaded_file($file_tmp_name, $qrcode_path);
            }else{
                //解决windows下中文文件名乱码的问题
                $save_path = Helper::safeEncoding($qrcode_path,'GB2312');
                if(!$save_path){
                    $errors[]='上传失败，请重试！';
                }
                $mv = move_uploaded_file($file_tmp_name, $qrcode_path);
            }
            if(empty($errors)){
                $errorCorrectionLevel = $_POST['errorCorrectionLevel'];//容错级别
                $matrixPointSize = $_POST['matrixPointSize'];//生成图片大小
                $matrixMarginSize = $_POST['matrixMarginSize'];//边距大小
                //生成二维码图片
                $object::png($url,$qrcode_path_new, $errorCorrectionLevel, $matrixPointSize, $matrixMarginSize);
                $QR = $qrcode_path_new;//已经生成的原始二维码图
                $logo = $qrcode_path;//准备好的logo图片
                if (file_exists($logo)) {
                    $QR = imagecreatefromstring(file_get_contents($QR));
                    $logo = imagecreatefromstring(file_get_contents($logo));
                    $QR_width = imagesx($QR);//二维码图片宽度
                    $QR_height = imagesy($QR);//二维码图片高度
                    $logo_width = imagesx($logo);//logo图片宽度
                    $logo_height = imagesy($logo);//logo图片高度
                    $logo_qr_width = $QR_width / 5;
                    $scale = $logo_width/$logo_qr_width;
                    $logo_qr_height = $logo_height/$scale;
                    $from_width = ($QR_width - $logo_qr_width) / 2;
                    //重新组合图片并调整大小
                    imagecopyresampled($QR, $logo, $from_width, $from_width, 0, 0, $logo_qr_width,
                    $logo_qr_height, $logo_width, $logo_height);
                    //输出图片
                    //header("Content-type: image/png");
                    imagepng($QR,$qrcode_path);
                    imagedestroy($QR);
                }else{
                    $qrcode_path=$qrcode_path_new;
                }
            }else{
                $qrcode_path='';
            }
        }
        $data=array('data'=>array('errors'=>$errors,'qrcode_path'=>$qrcode_path));
        $this->assign('data',$data);
        $this->display();

    }
}