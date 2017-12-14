<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/6/14
 * Time: 10:55
 */

//对富文本编辑器进行防止xss攻击函数
//参数$string 是被处理的字符串信息，内部有可能包含xss攻击内容
function fanXSS($string)
{
    //tp框架中，php代码处理，"./"当前目录都是这对index.php入口文件目录位置
    require_once './Common/Plugin/htmlpurifier/HTMLPurifier.auto.php';
    // 生成配置对象
    $cfg = HTMLPurifier_Config::createDefault();
    // 以下就是配置：
    $cfg->set('Core.Encoding', 'UTF-8');
    // 设置允许使用的HTML标签
    $cfg->set('HTML.Allowed','div,b,strong,i,em,a[href|title],ul,ol,li,br,span[style],img[width|height|alt|src]');
    // 设置允许出现的CSS样式属性
    $cfg->set('CSS.AllowedProperties', 'font,font-size,font-weight,font-style,font-family,text-decoration,padding-left,color,background-color,text-align');
    // 设置a标签上是否允许使用target="_blank"
    $cfg->set('HTML.TargetBlank', TRUE);
    // 使用配置生成过滤用的对象
    $obj = new HTMLPurifier($cfg);
    return $obj->purify($string);// 过滤字符串
}


/**
 * TODO 基础分页的相同代码封装，使前台的代码更少
 * @param $count 要分页的总记录数
 * @param int $pagesize 每页查询条数
 * @return \Think\Page
 */
function getpage($count, $pagesize = 5,$search) {
    $p = new Think\Page($count, $pagesize,$search);
    $p->parameter["search"] = $search;

    $p->setConfig('header','<li class="rows">&nbsp;第<b>%NOW_PAGE%</b>页/共<b>%TOTAL_PAGE%</b>页</li>');
    $p->setConfig('first','首页');
    $p->setConfig('prev','上一页');
    $p->setConfig('next','下一页');
    $p->setConfig('last','末页');

    $p->setConfig('theme','%FIRST%%UP_PAGE%%LINK_PAGE%%DOWN_PAGE%%END%%HEADER%');
    $p->lastSuffix = false;//最后一页不显示为总页数
    return $p;
}
function  log_result($file,$word)
{
    $fp = fopen($file,"a");
    flock($fp, LOCK_EX) ;
    fwrite($fp,"执行日期：".strftime("%Y-%m-%d-%H：%M：%S",time())."\n".$word."\n\n");
    flock($fp, LOCK_UN);
    fclose($fp);
}
function object2array(&$object) {
                     $object =  json_decode( json_encode( $object),true);
                     return  $object;
            }
function cutstr($sourcestr,$cutlength){
    $returnstr = '';
    $i = 0;
    $n = 0;
    $str_length = strlen($sourcestr);
    $mb_str_length = mb_strlen($sourcestr,'utf-8');
    while(($n < $cutlength) && ($i <= $str_length)){
    $temp_str = substr($sourcestr,$i,1);
    $ascnum = ord($temp_str);
    if($ascnum >= 224){
    $returnstr = $returnstr.substr($sourcestr,$i,3);
    $i = $i + 3;
    $n++;
    }
    elseif($ascnum >= 192){
    $returnstr = $returnstr.substr($sourcestr,$i,2);
    $i = $i + 2;
    $n++;
    }
    elseif(($ascnum >= 65) && ($ascnum <= 90)){
    $returnstr = $returnstr.substr($sourcestr,$i,1);
    $i = $i + 1;
    $n++;
    }
    else{
    $returnstr = $returnstr.substr($sourcestr,$i,1);
    $i = $i + 1;
    $n = $n + 0.5;
    }
    }
    if ($mb_str_length > $cutlength){
    $returnstr = $returnstr . "...";
    }
    return $returnstr; 
}

