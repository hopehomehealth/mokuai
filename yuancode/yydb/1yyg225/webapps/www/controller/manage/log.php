<?php/** * ZZCMS 日志管理 * ============================================================================ * * 版权所有 2014-2016 厦门紫竹数码科技有限公司，并保留所有权利。 * 网站地址: http://www.lnest.com； * ---------------------------------------------------------------------------- * 这不是一个自由软件！您只能在不用于商业目的的前提下对程序代码进行修改和 * 使用；不允许对程序代码以任何形式任何目的的再发布。 */class log extends Lowxp{    function __construct(){        #按钮        $this->btnMenu = array(            0=>array('url'=>'#!log/index','name'=>'后台日志'),            1=>array('url'=>'#!log/sms','name'=>'短信验证码日志'),            2=>array('url'=>'#!log/smslog','name'=>'短信发送记录'),            3=>array('url'=>'#!log/maillog','name'=>'邮件发送记录'),            5=>array('url'=>'#!log/search','name'=>'关键词搜索记录'),        );        parent::__construct();        $this->load->model('log');    }    #管理员日志    function index($page=1){        #检索        $conds = $this->getCondsLog();        $condition = " WHERE 1 AND user_id!=1";        $condition .= count($conds) ? " AND ".implode(' AND ',$conds) : '';        $orderby = " ORDER BY log_id DESC ";        #非超级管理员帐号，禁止查看超级管理员日志        if(GID > 0){            $condition .= " AND u.group_id>0";        }        #分页        $this->load->model('page');        $_GET['page'] = intval($page);        $this->page->set_vars(array('per'=>(int)$this->common['page_listrows']));        #数据集        $sql = "SELECT l.*,u.username FROM ".$this->log->logTable." AS l " .               "LEFT JOIN ###_m_user AS u ON u.uid=l.user_id " . $condition . $orderby;        $data['list'] = $this->page->hashQuery($sql)->result_array();        $this->smarty->assign('data',$data);        $this->smarty->display('manage/log/list.html');    }    #短信验证码日志    function sms($page = 1){        #检索        $conds = $this->getCondsSms();        $condition = " WHERE 1 ";        $condition .= count($conds) ? " AND ".implode(' AND ',$conds) : '';        $orderby = " ORDER BY id DESC ";        #分页        $this->load->model('page');        $_GET['page'] = intval($page);        $this->page->set_vars(array('per'=>(int)$this->common['page_listrows']));        #数据集        $sql = "SELECT DISTINCT s.id,s.*,m.username FROM ".$this->log->smslogTable." AS s " .            "LEFT JOIN ###_member AS m ON m.mid=s.reguid " . $condition . $orderby;        $data['list'] = $this->page->hashQuery($sql)->result_array();        $this->smarty->assign('data',$data);        $this->smarty->assign('btnNo',1);        $this->smarty->display('manage/log/list_sms.html');    }    #短信验证码日志    function smslog($page = 1){        #检索        $conds = $this->getCondsSmslog();        $condition = " WHERE 1 ";        $condition .= count($conds) ? " AND ".implode(' AND ',$conds) : '';        $orderby = " ORDER BY id DESC ";        #分页        $this->load->model('page');        $_GET['page'] = intval($page);        $this->page->set_vars(array('per'=>(int)$this->common['page_listrows']));        #数据集        $sql = "SELECT * FROM ###_sms $condition $orderby";        $data['list'] = $this->page->hashQuery($sql)->result_array();        $this->smarty->assign('data',$data);        $this->smarty->assign('btnNo',2);        $this->smarty->display('manage/log/list_smslog.html');    }    #邮件发送记录    function maillog($page = 1){        #检索        $conds = $this->getCondsmaillog();        $condition = " WHERE 1 ";        $condition .= count($conds) ? " AND ".implode(' AND ',$conds) : '';        $orderby = " ORDER BY id DESC ";        #分页        $this->load->model('page');        $_GET['page'] = intval($page);        $this->page->set_vars(array('per'=>(int)$this->common['page_listrows']));        #数据集        $sql = "SELECT * FROM ###_mail $condition $orderby";        $data['list'] = $this->page->hashQuery($sql)->result_array();        $this->smarty->assign('data',$data);        $this->smarty->assign('btnNo',3);        $this->smarty->display('manage/log/list_maillog.html');    }    #语音日志    function voice($page = 1){        #检索        $conds = $this->getCondsVoice();        $condition = " WHERE 1 ";        $condition .= count($conds) ? " AND ".implode(' AND ',$conds) : '';        $orderby = " ORDER BY v.id DESC ";        #分页        $this->load->model('page');        $_GET['page'] = intval($page);        $this->page->set_vars(array('per'=>(int)$this->common['page_listrows']));        #数据集        $sql = "SELECT v.* FROM ###_voice AS v ".               $condition . $orderby;        $data['list'] = $this->page->hashQuery($sql)->result_array();        $data['list'] = $this->db->ljoin($data['list'],'member','mobile,is_voice','mobile','mobile','v_');        $this->smarty->assign('data',$data);        $this->smarty->assign('btnNo',4);        $this->smarty->display('manage/log/list_voice.html');    }    #管理员日志    function search($page=1){        #检索        $conds = $this->getCondsLogSearch();        $condition = " WHERE 1 ";        $condition .= count($conds) ? " AND ".implode(' AND ',$conds) : '';        $orderby = " ORDER BY qty DESC ";        #分页        $this->load->model('page');        $_GET['page'] = intval($page);        $this->page->set_vars(array('per'=>(int)$this->common['page_listrows']));        #数据集        $sql = "SELECT * FROM ###_search " . $condition . $orderby;        $data['list'] = $this->page->hashQuery($sql)->result_array();        $this->smarty->assign('data',$data);        $this->smarty->assign('btnNo',5);        $this->smarty->display('manage/log/list_search.html');    }    /** 获取过滤条件     * @return array     */    function getCondsLog(){        $where = array();        #关键词搜索        $array = array('k','q');        foreach($array as $v){            if(!isset($_GET[$v]))$_GET[$v] = '';        }        if(!empty($_GET['q'])){            if($_GET['k'] == 'username'){                $where[] = "u.".trim($_GET['k'])." LIKE '%".addslashes($_GET['q'])."%'";            }else{                $where[] = "l.".trim($_GET['k'])." LIKE '%".addslashes($_GET['q'])."%'";            }        }        $this->smarty->assign($_GET);        return $where;    }    /** 获取过滤条件     * @return array     */    function getCondsLogSearch(){        $where = array();        #关键词搜索        $array = array('k','q');        foreach($array as $v){            if(!isset($_GET[$v]))$_GET[$v] = '';        }        if(!empty($_GET['q'])){            $where[] = "`".trim($_GET['k'])."` LIKE '%".addslashes($_GET['q'])."%'";        }        $this->smarty->assign($_GET);        return $where;    }    /** 获取过滤条件     * @return array     */    function getCondsSms(){        $where = array();        #关键词搜索        $array = array('k','q');        foreach($array as $v){            if(!isset($_GET[$v]))$_GET[$v] = '';        }        if(!empty($_GET['q'])){            if($_GET['k'] == 'username'){                $where[] = "m.".trim($_GET['k'])." LIKE '%".addslashes($_GET['q'])."%'";            }else{                $where[] = "s.".trim($_GET['k'])." LIKE '%".addslashes($_GET['q'])."%'";            }        }        $this->smarty->assign($_GET);        return $where;    }    function getCondsSmslog(){        $where = array();        #关键词搜索        if(!empty($_GET['mobile'])){            $where[] = "mobile LIKE '".addslashes($_GET['mobile'])."'";        }        if(!empty($_GET['content'])){            $where[] = "content LIKE '%".addslashes($_GET['content'])."%'";        }        $this->smarty->assign($_GET);        return $where;    }    function getCondsmaillog(){        $where = array();        #关键词搜索        if(!empty($_GET['email'])){            $where[] = "email LIKE '".addslashes($_GET['email'])."'";        }        if(!empty($_GET['content'])){            $where[] = "content LIKE '%".addslashes($_GET['content'])."%'";        }        $this->smarty->assign($_GET);        return $where;    }    function getCondsVoice(){        $where = array();        #关键词搜索        if(!empty($_GET['mobile'])){            $where[] = "v.mobile LIKE '".addslashes($_GET['mobile'])."'";        }        if(isset($_GET['status']) && $_GET['status']){            $status = $_GET['status'];            if($status==99){                $where[] = "v.status = '0'";            }elseif($status=='1'){                $where[] = "v.status!='error'&&v.status!=0";            }else{                $where[] = "v.status = '$status'";            }        }        //手机认证        if(isset($_GET['is_voice']) && $_GET['status']){            if($_GET['is_voice']==99){                $where[] = "m.is_voice=0";            }else{                $where[] = "m.is_voice=1";            }        }        $this->smarty->assign($_GET);        return $where;    }    //删除管理员日志    function del_log(){        $log_date = (int) $_POST['log_date'];        if($log_date < 7){            $this->tip('请选择您要清除的日期',array('inIframe'=>true,'type'=>1));            die;        }        $time = RUN_TIME-$log_date*24*3600;        $where = "log_time<'$time'";        $this->db->query("DELETE FROM `".$this->db->pre_table($this->log->logTable)."` WHERE ".$where);        admin_log('清除管理日志：'.$log_date.'天以前的');        $this->tip('日志清除成功',array('inIframe'=>true));        $this->exeJs("parent.location.href='/manage#!log/index';parent.main.refresh();");        die;    }    //删除短信验证码日志    function del_log_sms(){        $log_date = (int) $_POST['log_date'];        if($log_date < 7){            $this->tip('请选择您要清除的日期',array('inIframe'=>true,'type'=>1));            die;        }        $time = RUN_TIME-$log_date*24*3600;        $where = "dateline<'$time'";        $this->db->query("DELETE FROM `".$this->db->pre_table($this->log->smslogTable)."` WHERE ".$where);        admin_log('清除短信验证码记录：'.$log_date.'天以前的');        $this->tip('日志清除成功',array('inIframe'=>true));        $this->exeJs("parent.location.href='/manage#!log/sms';parent.main.refresh();");        die;    }    //删除短信发送记录    function del_log_smslog(){        $log_date = (int) $_POST['log_date'];        if($log_date < 7){            $this->tip('请选择您要清除的日期',array('inIframe'=>true,'type'=>1));            die;        }        $time = RUN_TIME-$log_date*24*3600;        $where = "send_time<'$time'";        $this->db->query("DELETE FROM `".$this->db->pre_table('sms')."` WHERE ".$where);        admin_log('清除短信发送记录：'.$log_date.'天以前的');        $this->tip('日志清除成功',array('inIframe'=>true));        $this->exeJs("parent.location.href='/manage#!log/smslog';parent.main.refresh();");        die;    }    //删除邮件发送记录    function del_log_maillog(){        $log_date = (int) $_POST['log_date'];        if($log_date < 7){            $this->tip('请选择您要清除的日期',array('inIframe'=>true,'type'=>1));            die;        }        $time = RUN_TIME-$log_date*24*3600;        $where = "send_time<'$time'";        $this->db->query("DELETE FROM `".$this->db->pre_table('mail')."` WHERE ".$where);        admin_log('清除邮件发送记录：'.$log_date.'天以前的');        $this->tip('日志清除成功',array('inIframe'=>true));        $this->exeJs("parent.location.href='/manage#!log/maillog';parent.main.refresh();");        die;    }    //删除语音记录    function del_log_voice(){        $log_date = (int) $_POST['log_date'];        if($log_date < 7){            $this->tip('请选择您要清除的日期',array('inIframe'=>true,'type'=>1));            die;        }        $time = RUN_TIME-$log_date*24*3600;        $where = "send_time<'$time'";        $this->db->query("DELETE FROM `".$this->db->pre_table('voice')."` WHERE ".$where);        admin_log('清除语音记录：'.$log_date.'天以前的');        $this->tip('日志清除成功',array('inIframe'=>true));        $this->exeJs("parent.location.href='/manage#!log/voice';parent.main.refresh();");        die;    }    //删除    function del_search(){        $id = (int) $_POST['id'];        if(!$id) die;        admin_log('删除搜索词：'.$this->db->getstr("SELECT word FROM ###_search WHERE id=".$id));        $this->db->delete('###_search', array('id'=>$id));        $this->tip('删除成功',array('type'=>1));    }}