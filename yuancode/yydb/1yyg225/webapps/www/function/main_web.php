<?php #前台函数库，方便模板调用

/** 整站链接转换，静态扩展
 * @param $url 动态地址
 * @param $httpsOn 是否ssl访问
 * @return mixed
 */
function url($url=''){
    #处理远程地址
    if(strpos($url,'http://') !== false || strpos($url,'https://') !== false){
        return $url;
    }

    $http = ($_SERVER['HTTPS']=='on')?'https':'http';
    $rootUrl = ($http == 'https') ? str_replace('http://','https://',RootUrl) : RootUrl;

    if(empty($url)){ $url = $rootUrl; }
    else $url = substr($rootUrl,0,strlen($rootUrl)-1).$url;

    #手机端
    if(getUrl('www')=='m'){
        if(strpos($url, 'www.') !== false){
            $url = str_replace('www.','m.',$url);
        }elseif(strpos($url, 'm.') === false){
            $url = str_replace('http://','http://m.',$url);
        }
    }

    return $url;
}

/** 获取模型字段值，主要用于单选，多选...配置了选项的字段内容
 * @param $value
 * @param $field
 * @param string $catid
 * @param string $module
 * @param type 0获取内容值 1获取配置项数组
 * @return string
 */
function options($value,$field,$catid='',$module='article',$type=0){
    global $lowxp;
    $lowxp->load->model('category');
    $lowxp->load->model('content');
    $lowxp->load->library('base');

    if($catid){
        $row_category = $lowxp->category->get($catid);
        if(empty($row_category)) return;
        $module = $row_category['module'];
    }

    $lowxp->content->chkModule($module);
    $fieldsinfo = $lowxp->content->getFieldsinfo();
    $options = $fieldsinfo[$field]['setup']['options'];

    $string = '';
    if(!empty($options)){
        $array = $lowxp->base->explodeChar($options);
        if($type==1){ return $array; }
        $string = $array[$value];
    }

    return $string?$string:$value;
}

/**
 * SWFUPLOAD 图片上传
 */
function upload_btn($input,$width='',$height='',$limit=1,$file_types='',$file_size='',$option=array()){
    global $lowxp;
    $lowxp->load->library('form');
    $html = $lowxp->form->upload_files($input,$width,$height,$limit,$file_types,$file_size,$option);
    return $html;
}
/**
 * 联动菜单
 */
function linkage($input,$value='',$hidetop=1){
    global $lowxp;
    $lowxp->load->model('linkage');
    $linkage = $lowxp->linkage->select_linkage($value,$hidetop,$input,true);
    $html = '<div id="select_linkage">'.$linkage.'</div><script type="text/javascript" src="/style/linkage.js"></script>';
    return $html;
}

/** 分享插件
 * @param int $type
 * @return string
 */
function share($comment=''){
        $js = '<!-- JiaThis Button BEGIN -->
<div class="jiathis_style_24x24">
	<a class="jiathis_button_qzone"></a>
	<a class="jiathis_button_tqq"></a>
	<a class="jiathis_button_tsina"></a>
	<a class="jiathis_button_cqq"></a>
	<!--<a class="jiathis_button_weixin"></a>-->
	<!-- <a href="http://www.jiathis.com/share" class="jiathis jiathis_txt jtico jtico_jiathis" target="_blank"></a> -->
</div>
<script type="text/javascript" src="http://v3.jiathis.com/code/jia.js" charset="utf-8"></script>
<!-- JiaThis Button END -->';
        return $js;
}

/** 用户名与昵称显示
 * @param $username
 * @param $nickname
 */
function nickname($username, $nickname=""){
    $nickname = DeleteHtml(trim($nickname));
    if($nickname){
        return mb_substr($nickname,0,8,'utf-8');
    }else{
        if(is_email($username)){
            $array = explode('@',$username);
            $array[0] = mb_substr($array[0],0,-3,'utf-8').'***';
            return implode('@',$array);
        }elseif(is_mobile($username)){
            return mb_substr($username,0,-3,'utf-8').'***';
        }else{
            if(mb_strlen($username,'utf-8')<2){
                return $username.'***';
            }elseif(mb_strlen($username,'utf-8')<3){
                return mb_substr($username,0,-1,'utf-8').'***';
            }else{
                return mb_substr($username,0,-2,'utf-8').'***';
            }
        }
    }
}

/** 生成自定义导航 缓存
 * @param int $type
 * @return array
 */
function nav($type=0,$limit=''){
    global $lowxp;
    $array = array();
    
    $data = $lowxp->base->read_static_cache('nav-'.$type);

    if ($data === false)
    {
        $where = " WHERE status=1 ";
        $where .= $type ? "AND type=" . $type : '';
        $limit = $limit ? ' LIMIT ' . $limit : '';
        $array = $lowxp->db->select("SELECT * FROM ###_nav $where ORDER BY listorder,id " . $limit);
        $lowxp->base->write_static_cache('nav-'.$type, $array);
    }else{
        $array = $data;
    }
    return $array;
}

/**
 * 数字转中文
 * @param $num
 * @param bool $mode
 * @return array|string
 */
function num2char($number){
    $number = intval($number);
    $basical=array("零","一","二","三","四","五","六","七","八","九","十");
    $basical['20'] = "二十";
    $basical['50'] = "五十";
    $basical['100'] = "百";
    $basical['500'] = "五百";
    $basical['1000'] = "千";
    return $basical[$number]?$basical[$number]:$number;
}

/** 生成自定义栏目 缓存
 * @param int $type
 * @return array
 */
function cate($type=0){
    global $lowxp;
    $array = array();
    $data = $lowxp->base->read_static_cache('cate-'.LANG_ID.'-'.$type);

    if ($data === false)
    {
        $where = " WHERE ismenu=1 AND lang=".LANG_ID;
        $list = $lowxp->db->select("SELECT * FROM ###_category ".$where." ORDER BY listorder,id");
        $array = array();
        foreach($list as $v){
            $array[$v['id']] = $v;
        }
        $lowxp->base->write_static_cache('cate-'.LANG_ID.'-'.$type, $array);
    }else{
        $array = $data;
    }
    return $array;
}

function progress($total=0,$need=0){
    return floor($total/$need*100);
}
function endDay($end_time){
    $endDay = ceil(($end_time-time())/(3600*24));
    return $endDay>=0 ? $endDay .'天' : '0 天';
}
