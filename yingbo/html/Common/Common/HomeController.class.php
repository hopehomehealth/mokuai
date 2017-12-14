<?php
namespace Common\Common;
use Think\Controller;
class HomeController extends Controller
{
    function __construct()
    {
        parent::__construct();

        $basicinfo = D('Basic')
            ->field('id,name,description,keyword')
            ->select();
        $this->assign('basicinfo', $basicinfo);

    }
}
