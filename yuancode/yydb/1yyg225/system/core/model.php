<?php
/**
 * 基类
 * Class Lowxp_Model
 * @property Lowxp_Loader $load
 * @property database $db
 * @property share_model $share
 * @property debug_model $debug
 * @property Smarty $smarty
 * @property page_model $page
 * @property upload_model $upload
 * @property user_model $user
 * @property wxapi_model $wxapi
 * @property wxnews_model $wxnews
 * @property Image_Library $image
 * @property UserAgent_Library $useragent
 *
 * @method body($key=null, $default=null, $xss=1)
 * @method query($key=null, $default=null, $xss=1)
 */
class Lowxp_Model{

    function __get($key){
        $lowxp = & get_instance();
        return $lowxp->$key;
    }

    /** 格式化WHERE
     * @param $sql
     * @return array|string
     */
    function whereFormat($sql){
        $where = '';
        if(is_array($sql)){
            foreach($sql as $k=>$v){
                $where[] = "`$k`='$v'";
            }
            $where = implode(' AND ',$where);
        }else{
            $where = $sql;
        }
        return $where;
    }

}