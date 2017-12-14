<?php
namespace Model;
    use Think\Model;

class NewsModel extends Model{

    protected function _after_insert($data,$options)
    {

        //完成新闻扩展栏目信息填充
        if (!empty($_POST['ext_lan'])) {
            foreach ($_POST['ext_lan'] as $k => $v) {
                if ($v != "0") {
                    $arr = array(
                        'news_id' => $data['news_id'],
                        'lan_id' => $v,
                    );
                    D('NewsLanmu')->add($arr);
                }
            }
        }

    }



    protected function _after_update($data,$options){
        //完成新闻扩展栏目信息填充
        if(!empty($_POST['ext_lan'])){
            //去除旧的扩展栏目
            D('NewsLanmu')
                ->where(array('news_id'=>$data['news_id']))
                ->delete();
            foreach($_POST['ext_lan'] as $k => $v){
                if($v!="0"){
                    $arr = array(
                        'news_id'=>$data['news_id'],
                        'lan_id' => $v,
                    );
                    D('NewsLanmu')->add($arr);
                }
            }
        }
    }
}