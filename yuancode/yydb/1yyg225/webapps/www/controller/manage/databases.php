<?php/** * ZZCMS 数据库相关 * ============================================================================ * * 版权所有 2014-2016 厦门紫竹数码科技有限公司，并保留所有权利。 * 网站地址: http://www.lnest.com； * ---------------------------------------------------------------------------- * 这不是一个自由软件！您只能在不用于商业目的的前提下对程序代码进行修改和 * 使用；不允许对程序代码以任何形式任何目的的再发布。 */class databases extends Lowxp{    function __construct(){        $this->btnMenu = array(            0=>array('url'=>'#!databases/sql','name'=>'SQL执行'),        );        parent::__construct();        $this->load->model('databases');    }    /*function test(){        $this->db->save('config',array('step'=>'{"options":"\u4e0a\u6d77\u4e92\u4ebf|1\r\n\u4e91\u901a\u8baf|2\r\n\u641c\u72d0\u77ed\u4fe1|3","fieldtype":"varchar","numbertype":"1","labelwidth":"","default":""}'),'',array('varname'=>'sms_type'));    }*/    //sql执行页    function sql(){        $this->smarty->display('manage/databases/sql.html');    }    //sql执行    function query(){        $sql = stripslashes($_POST['sql']);        $data = $this->databases->query_sql($sql);        die(json_encode($data));    }    //数据库更新    function updateDb(){        $data = array('error'=>0,'type'=>0,'html'=>'数据库更新完成');        $ok = $this->databases->updateDb();        if(!$ok){            $data = array('error'=>1,'type'=>1,'html'=>'数据库已更新过了！');            die(json_encode($data));        }        $this->base->clear_caches();        die(json_encode($data));    }}