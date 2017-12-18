<?php

/**
 * Name 微信菜单设置
 * Class wxmenu
 */

class wxmedia extends Lowxp{

    /**
     * 微信菜单设置
     */
    function index($page = 1){
        $this->load->model('page');
        $_GET['page'] = $page;
        $this->page->set_vars(array(
            'url'=>'href="#!wxmedia/index/{num}"'
        ));

        $wxnews = $this->page->query("SELECT * FROM wx_news")->result_array();
        $this->load->model('wxnews');

        $wxnews = $this->wxnews->setNewsInfo($wxnews);


        $this->smarty->assign('list',$wxnews);
        $this->smarty->display('manage/wxmedia/list.html');
    }

}