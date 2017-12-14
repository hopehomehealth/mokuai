<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/3/31 0031
 * Time: 14:05
 */
namespace Admin\Controller;
use Common\Common\AdminController;
class SetController extends AdminController
{
    function config(){
        $model = M('set');
        if(IS_POST){
            $_POST['id'] = $_POST['setid'];
            $path = $this->upload();
            if($path){
              $_POST['logo'] = '/Public/'.$path;
            }
            if(!empty($_POST['keywords'])){
              $_POST['keywords'] = str_replace('，',' ',$_POST['keywords']);
              $_POST['keywords'] = str_replace(',',' ',$_POST['keywords']);
            }
            if($model->create()){
                if($model->save()){
                    $set = $model->find();
                    $str_temp = "<?php\r\n";
                    $str_end = "?>";
                    $str_temp .= "function getconfig(){"."\r\n";
                    $str_temp .= "\t$"."sysconfig = array();\r\n";
                    $str_temp .= "\t$"."sysconfig['name'] =". "'{$set[name]}';\r\n";//系统名称
                    $str_temp .= "\t$"."sysconfig['logo'] =". "'{$set[logo]}';\r\n";//网站logo
                    $str_temp .= "\t$"."sysconfig['records'] =". "'{$set[records]}';\r\n";
                    $str_temp .= "\t$"."sysconfig['keywords'] =". "'{$set[keywords]}';\r\n";
                    $str_temp .= "\t$"."sysconfig['description'] =". "'{$set[description]}';\r\n";
                    $str_temp .= "\t$"."sysconfig['linkman'] =". "'{$set[linkman]}';\r\n";//联系人
                    $str_temp .= "\t$"."sysconfig['linkphone'] =". "'{$set[linkphone]}';\r\n";//联系电话
                    $str_temp .= "\t$"."sysconfig['address'] =". "'{$set[address]}';\r\n";
                    $str_temp .= "\t$"."sysconfig['company'] =". "'{$set[company]}';\r\n";
                    $str_temp .= "\treturn $"."sysconfig;\r\n";
                    $str_temp .="}\r\n";
                    $str_temp .= $str_end;
                    $file = "./Common/Sysconfig/sysconfig.php";
                    fwrite(fopen($file,'w'),print_r($str_temp,true));
                    $this->success("操作成功");
                    exit;
                }
            }else{
                $this->error("系统繁忙，请稍后重试");
                exit;
            }
        }
        $set = $model->find();
        if(!$set){
            $data['name'] = '中国缓粘结';
            $lastid = $model->add($data);
            $set['id'] = $lastid;
        }
        $this->assign('set',$set);
        $this->display();
    }
    //上传图片
    function upload(){
        $upload=new \Think\Upload();
        $upload->exts=array("jpg","gif","png","jpeg");
        $upload->rootPath="./Public/";
        $upload->savePath="Upl/logo/";
        $info=$upload->uploadOne($_FILES['logo']);
        return $info['savepath'].$info['savename'];
    }
    function myswitch(){
        if(isset($_GET['op'])){
            if(($_GET['op'] == 0) || ($_GET['op'] == 1)){
                if(M('payment')->where("id = $_GET[id]")->setField('isopen',$_GET['op'])){
                    echo 'success';exit;
                }
            }
        }
    }
}
