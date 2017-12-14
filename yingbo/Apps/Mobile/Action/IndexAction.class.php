<?php
namespace Mobile\Action;

class IndexAction extends BaseAction {
	/**
	 * 跳到商城首页
	 */
    public function index(){
        $this->display("/index");
    }
 
}