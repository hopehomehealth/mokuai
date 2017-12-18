<?php

/**
 * Class goods_model
 */
class goods_model extends Lowxp_Model{

    private $baseTable = '###_goods';

    function __construct(){}

    /**
     * 商品规格格式化.按spec_item_id排序(从小到大)
     * @param $specstr
     * @return string
     */
    function spec_format($specstr){
        $arr = explode('-',$specstr);
        if(count($arr)){
            foreach($arr as $k=>$val)$arr[$k] = intval($val);
            sort($arr);
            $spec = implode('-',$arr);
        }else{
            $spec = $specstr;
        }
        return $spec;
    }

    /**
     * 获取当个商品
     */
    function get($id, $where='', $field='*'){
        $where = ' WHERE id<>0 '.$where;
        $sql  = "SELECT $field FROM ".$this->baseTable.$where." AND id=".$id;
        $row = $this->db->get($sql);
        if(isset($row['cover']) && $row['cover']){
            $picData = array('id'=>$row['cover']);
            $this->load->model('upload');
            $row['cover'] = $this->upload->getGalleryImgUrls($picData,array('middle','src','thumb'));
        }
        return $row;
    }

}