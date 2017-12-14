<?php
namespace Model;
use Think\Model;

class BannerModel extends Model{

    protected function _after_insert($data,$options)
    {

        //完成新闻扩展栏目信息填充
        if (!empty($_POST['ext_lan'])) {
            foreach ($_POST['ext_lan'] as $k => $v) {
                if ($v != "0") {
                    $arr = array(
                        'banner_id' => $data['banner_id'],
                        'lan_id' => $v,
                    );
                    D('BannerLanmu')->add($arr);
                }
            }
        }

    }



    protected function _after_update($data,$options){
        //完成新闻扩展栏目信息填充
        if(!empty($_POST['ext_lan'])){
            //去除旧的扩展栏目
            D('BannerLanmu')
                ->where(array('banner_id'=>$data['banner_id']))
                ->delete();
            foreach($_POST['ext_lan'] as $k => $v){
                if($v!="0"){
                    $arr = array(
                        'banner_id'=>$data['banner_id'],
                        'lan_id' => $v,
                    );
                    D('BannerLanmu')->add($arr);
                }
            }
        }
    }
}