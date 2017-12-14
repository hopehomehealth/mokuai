<?php
namespace Wap\Controller;
use Common\Common\HomeController;
class EmptyController extends HomeController{
    function _empty(){
        header("HTTP/1.0 404 Not Found");//使HTTP返回404状态码 
        $this->display("Public:404");
    }
}