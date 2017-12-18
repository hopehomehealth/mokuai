<?php/** * Name 微信菜单设置 * Class wxmenu */class wxmenu extends Lowxp{    /**     * 微信菜单设置     */    function index(){        $menuRow = $this->db->get("SELECT * FROM wx_menu_data WHERE id=1");        $json = $menuRow['json'];        $this->smarty->assign('menusjson',$json);        $this->smarty->display('manage/wxmenu/index.html');    }    //保存微信菜单内容.    function test(){        unset($_POST['ajax']);        $data = array();
        $string = "";
        if(count($_POST)>1){
        	foreach($_POST as $k=>$v){
        		if($k!='button'){
        			$string .= "&".$k."=".$v;
        		}
        	}
        	$data['button'] = $_POST['button'];
        	if($data['button']){
        		foreach($data['button'] as $key=>$value){
        			if(is_array($value)){
        				foreach($value as $k=>$v)
        					if($k=='data'){
        					$data['button'][$key][$k] = $v.$string;
        				}
        			}
        		}
        	}
        }else{
        	$data = $_POST;
        }
        $json = json_encode($data);        $this->db->update('wx_menu_data',array('json'=>$json),array('id'=>'1'));    }    /**     * 提交发布菜单     */    function postMenu(){        $this->load->model('wxapi');        $reslut = $this->wxapi->menuCreate();        if($reslut['errmsg']=='ok'){            $this->tip('提交成功');        }else{            $this->tip('提交失败'.$reslut['errcode'].$reslut['errmsg'],array('type'=>1));        }    }    /**     * 获取图文回复     */    function getNewsList($page = 1){        $this->load->model('page');        $_GET['page'] = $page;        $wxnews = $this->page->query("SELECT * FROM wx_news")->result_array();        $this->load->model('wxnews');        $wxnews = $this->wxnews->setNewsInfo($wxnews);        $this->smarty->assign('list',$wxnews);        $this->smarty->display('manage/wxmenu/news_list.html');    }}