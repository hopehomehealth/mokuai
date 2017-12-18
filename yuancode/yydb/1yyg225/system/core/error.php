<?php
//微信授权验证文件免上传
$url = empty($_SERVER['QUERY_STRING']) ? $_SERVER['REQUEST_URI'] : $_SERVER['QUERY_STRING'];
$match = array();
preg_match('/(?<=MP_verify_)(.*)(?=.txt)/i', $url, $match);
if ( ! empty($match[0])) {
    header('Content-Type: text/plain; charset=utf-8');
    exit($match[0]);
}