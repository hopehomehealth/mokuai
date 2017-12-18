<?php

/**
 * Class group 社区圈子
 */
class group extends Lowxp{

    function index(){
        $this->display_before();

        $this->ur_here($this->site_config['site_name'].'圈');
        $this->smarty->display('group/home.html');
    }

}