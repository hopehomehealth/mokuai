<?php

/**
 * Name 会员管理
 * Class member_adm
 */

class member extends Lowxp{
    function __construct(){
        #按钮
        $this->btnMenu = array(
            0=>array('url'=>'#!member/index','name'=>'会员管理'),
            1=>array('url'=>'#!member/edit?com=xshow|添加会员','name'=>'添加会员'),
            2=>array('url'=>'#!member/account_log','name'=>'帐户明细'),
        );
        parent::__construct();
        #加载
        $this->load->model('member');

        #右侧按钮
        $segments = Lowxp_Router::getInstance()->segments;
        if(in_array($segments[2],array('index','account_log'))){
            $this->btnRig = array(
                0=>array('url'=>'javascript:;','name'=>'导出Excel','str'=>"onclick='exportExcel()' title='导出已筛选的内容'"),
            );
            $this->smarty->assign('btnRig',$this->btnRig);
            $this->smarty->assign('btnNoRig',0);
        }
    }

    function index($page=1){
        $excel = (isset($_GET['excel'])&&$_GET['excel']==1)?1:0;

        #检索
        $conds = $this->getFilterCond();
        $condition = $conds['where'];
        $orderby = $conds['order'];

        $sc ="";
        if(!empty($_GET['dbcs'])){
            $sc .=" WHERE status=2";
        }

        #分页
        $this->load->model('page');
        $_GET['page'] = intval($page);
        $this->page->set_vars(array(
            'per' => (int)$this->common['page_listrows']
        ));

/* xxx temp opt
        $sql = "SELECT DISTINCT a.mid,a.*,b.c_time AS stime,IFNULL(c.username,'-') AS ivt_name FROM ###_member AS a ".
               "LEFT JOIN ".$this->session->baseTable." AS b ON b.mid=a.mid " .
               "LEFT JOIN ###_member AS c ON c.mid=a.ivt_id " .
               ($condition!=''?" WHERE $condition":'') . $orderby;
*/
        // $sql = "SELECT DISTINCT a.mid,a.*,b.c_time AS stime,IFNULL(c.username,'-') AS ivt_name FROM ###_member AS a ".
        //        "LEFT JOIN (SELECT * FROM ".$this->session->baseTable." WHERE `zz_member_login_log`.mid > 0) AS b ON b.mid=a.mid " .
        //        "LEFT JOIN ###_member AS c ON c.mid=a.ivt_id " .
        //        ($condition!=''?" WHERE $condition":'') . $orderby;

        $sql = "SELECT DISTINCT a.mid,a.*,b.c_time AS stime,IFNULL(c.username,'-') AS ivt_name FROM ###_member AS a ".
               "LEFT JOIN (SELECT count(mid) AS count,sum(order_amount+user_money) AS payamount,username,mid,status FROM ###_yunorder" . $sc . " group by mid) AS dd ON dd.mid=a.mid ".
               "LEFT JOIN (SELECT * FROM ".$this->session->baseTable." WHERE `zz_member_login_log`.mid > 0) AS b ON b.mid=a.mid " .
               "LEFT JOIN ###_member AS c ON c.mid=a.ivt_id " .
               ($condition!=''?" WHERE $condition":'') . $orderby;

        // $sql = "SELECT DISTINCT a.mid,a.*,b.c_time AS stime,IFNULL(c.username,'-') AS ivt_name FROM".
        //        "(SELECT count(mid) AS count,username,mid,status FROM ###_yunorder" . $sc . " group by mid) AS dd ".
        //        "LEFT JOIN ###_member AS a ON dd.mid=a.mid ".
        //        "LEFT JOIN (SELECT * FROM ".$this->session->baseTable." WHERE `zz_member_login_log`.mid > 0) AS b ON b.mid=a.mid " .
        //        "LEFT JOIN ###_member AS c ON c.mid=a.ivt_id " .
        //        ($condition!=''?" WHERE $condition":'') . $orderby;
        error_log($sql);
        if($excel==1){
            $list = $this->db->select($sql);
        }else{
            $list = $this->page->hashQuery($sql)->result_array();
        }

        foreach($list as $k=>$v){
            #在线离线判断
            if($v['stime'] && (time()-$v['stime'])<$this->session->expire){
                $v['online'] = 1;
            }else{
                $v['online'] = 0;
            }
            #重新统计推荐人数
            $sql = "SELECT COUNT(*) FROM ###_member WHERE ivt_id=".$v['mid'];
            $v['ivt_count_true'] = $this->db->getstr($sql);
            if($v['ivt_count_true'] != $v['ivt_count']){
                $this->db->save('member',array('ivt_count'=>$v['ivt_count_true']),'',array('mid'=>$v['mid']));
                $v['ivt_count'] = $v['ivt_count_true'];
            }
            $list[$k] = $v;
        }

        if($excel==1){
            return $list;
        }

        #对搜索结果进行批量操作
        $batch = isset($_GET['batch'])?trim($_GET['batch']):'';
        $tpl = '';
        if($batch=='sms' || $batch=='mail'){
            if($batch=='sms') $tpl = $_GET['smstpl'];
            elseif($batch=='mail') $tpl = $_GET['mailtpl'];
            $rowTpl = $this->db->get("SELECT * FROM ###_templates WHERE template_code='".$tpl."' AND status=1 AND is_system=0");
            if($rowTpl){
                $mlist = $this->db->select($sql);
                foreach($mlist as $v){
                    $data = array(
                        'mid'  => $v['mid'],
                        'content'  => $rowTpl['template_content'],
                        'type'  => $batch,
                        'template_code'  => $tpl,
                        'staus'  => 0,
                        'add_time'  => time(),
                    );
                    $this->db->save('send',$data);
                }
            }
        }

        #等级列表
        $sql = "SELECT * FROM ###_member_rank ORDER BY id";
        $this->smarty->assign('ranklist', $this->db->select($sql));

        #自定义短信邮件模板
        $sql = "SELECT * FROM ###_templates WHERE is_system=0 AND status=1";
        $this->smarty->assign('template_list', $this->db->select($sql));

        unset($_GET['page']);
        $this->smarty->assign($_GET);
        $this->smarty->assign('list',$list);
        $this->smarty->display('manage/member/list.html');
    }

    /**
     * ajax统计会员人数
     */
    function online(){
        $act = isset($_POST['act']) ? trim($_POST['act']) : '';

        #自动清除过期的session
        $this->db->delete($this->session->baseTable,"(mid>0 AND c_time<".(time()-$this->session->expire).") OR (mid=0 AND c_time<".(time()-$this->session->expire2).")");

        #统计并发在线人数
        $expire = 10; #并发在线时间段
        $sql = "SELECT COUNT(sesskey) AS online FROM " . $this->session->baseTable . " WHERE c_time>".(time()-$expire);
        $online = $this->db->getstr($sql);
        if($act=='bf') exit($online);

        #统计在线人数
        $sql = "SELECT COUNT(sesskey) AS online_nomid FROM " . $this->session->baseTable . " WHERE mid=0 AND c_time>".(time()-$this->session->expire2);
        $online_nomid = $this->db->getstr($sql);
        $sql = "SELECT COUNT(sesskey) AS online_mid FROM " . $this->session->baseTable . " WHERE mid>0 AND c_time>".(time()-$this->session->expire);
        $online_mid = $this->db->getstr($sql);

        $str = "在线游客(<b class='c-orange'>$online_nomid</b>) 在线会员(<b class='c-orange'>$online_mid</b>) ".$expire."秒内在线(<b class='c-orange' id='online_BF'>$online</b>) <a href='javascript:member.online();'>更新</a>";
        exit($str);
    }

    /**
     * 编辑会员
     */
    function edit($mid=''){
        $mid = intval($mid);
        //提交
        if(isset($_POST['Submit'])){
            $post = $_POST['post'];
        	if($post['nickname']){
            	$post['nickname'] = str_replace(array("\r\n", "\r", "\n"," ","%"), "", $post['nickname']);
            }
            if($post['username']){
            	$post['username'] = str_replace(array("\r\n", "\r", "\n"," ","%"), "", $post['username']);
            }
            if(empty($post['mid'])) $res = $this->member->create_user($post);
            else $res = $this->member->update_user($post);
            #判断会员等级更改分享码使用次数
            if($post['rank_id']){
                $rank = $this->db->get("SELECT * FROM ###_member_rank WHERE id = '$post[rank_id]'");
                if(!empty($rank['allow_time'])){
                    $this->db->update("sharecode",array('allow_time'=>$rank['allow_time']),array('mid'=>$post['mid']));
                }
            }

            if(isset($res['code']) && $res['code']==0){
                $this->tip($res['message'],array('inIframe'=>true));
                //$this->exeJs("parent.location.href='/manage#!category/index'");
                $this->exeJs("parent.com.xhide();parent.main.refresh()");
            }else{
                $this->tip($res['message'],array('inIframe'=>true,'type'=>1));
            }
            die;
        }
        if($mid){
            $row = $this->db->get("SELECT * FROM ###_member WHERE mid=".$mid);
        }


        #非特殊等级列表
        $sql = "SELECT * FROM ###_member_rank ORDER BY id";
        $this->smarty->assign('ranklist', $this->db->select($sql));

        $this->load->model('linkage');
        $area = $this->linkage->select_linkage($row['zone'] ? $row['zone'] : 1,1,'zone');
        $this->smarty->assign('area',$area);
        $this->smarty->assign('row',$row);

        $template = "manage/member/edit.html";
        if($_GET['act']=='mobile'){
            $template = "manage/member/mobile_status.html";
        }
        $this->smarty->display($template);
    }

    /**
     * 消费充值记录
     */
    function paylog($mid = '', $page = 1){
        is_numeric($mid) || $this->fatalError('参数错误!');

        $member = $this->db->get("SELECT * FROM ###_member WHERE mid=".$mid);
        $this->smarty->assign('member',$member);

        $this->load->model('page');
        $_GET['page'] = $page;
        $this->page->set_vars(array(
            'url'=>' href="#!member/paylog/'.$mid.'/{num}"'
        ));
        $list = $this->page->hashQuery("SELECT * FROM ###_member_pay_log WHERE mid=".$mid)->result_array();

        $this->smarty->assign('list',$list);
        $this->smarty->display('manage/member/paylog.html');

    }

    /**
     * 调整账户金额/积分
     */
    function change_account($mid=''){
        //提交
        if(isset($_POST['Submit'])){
            $post = $_POST['post'];
            $row = $this->db->get("SELECT * FROM ###_member WHERE mid=".intval($post['mid']));
            if(empty($row)) $res =  array('code'=>10001, 'message'=>'用户不存在!');

            $input['user_money'] = $post['addfee_user_money']*floatval($post['user_money']);
            $input['frozen_money'] = $post['addfee_frozen_money']*floatval($post['frozen_money']);
            $input['db_points'] = $post['addfee_db_points']*intval($post['db_points']);
            $input['pay_points'] = $post['addfee_pay_points']*intval($post['pay_points']);
            $input['desc'] = '手动调整帐户 '.trim($post['remark']);
            $input['mid'] = $post['mid'];

            $res = $this->member->accountlog('admin',$input);
            admin_log('调整会员帐户余额：' . $row['username']);
			
            #发送中奖短信
            if(abs($input['user_money'])>=5000 && $this->common['sms_open']==1 && statusTpl('sms_account')){
                $this->smarty->assign('username',$row['username']);
                $this->smarty->assign('user_money',$input['user_money']);

                if($this->common['sms_tel']){
                    $this->load->library('sms');
                    $ret = $this->sms->sendSmsTpl($this->common['sms_tel'], 'sms_account');
                }
            }

            if(isset($res['code']) && $res['code']==0){
                $this->tip($res['message'],array('inIframe'=>true));
                //$this->exeJs("parent.location.href='/manage#!category/index'");
                $this->exeJs("parent.com.xhide();parent.main.refresh()");
            }else{
                $this->tip($res['message'],array('inIframe'=>true,'type'=>1));
            }
            die;
        }
        $row = $this->db->get("SELECT * FROM ###_member WHERE mid=".$mid);
        $this->smarty->assign('row',$row);
        $this->smarty->display('manage/member/change_account.html');
    }

    /**
     * 账户明细
     */
    function account_log($page='1'){
        $excel = (isset($_GET['excel'])&&$_GET['excel']==1)?1:0;

        #操作类型
        $this->smarty->assign('stages', $this->member->stages());

        $where = '';
        $order = ' ORDER BY ';
        if($_GET['stage']) $where .= " AND stage = '$_GET[stage]'";
        if($_GET['start_time']) $where .= " AND logtime >= '".strtotime($_GET['start_time'])."'";
        if($_GET['end_time']) $where .= " AND logtime <= '".strtotime($_GET['end_time'])."'";
        if($_GET['points']) $where .= " AND ".trim($_GET['points'])."<>0";
        if($_GET['sortorder']){
            if($_GET['points']){
                $order .= trim($_GET['points'])." ".$_GET['sortorder'];
            }else{
                $order .= "id ".$_GET['sortorder'];
            }
        }else{
            $order .= 'id DESC';
        }

        #关键词搜索
        $array = array('k','q');
        foreach($array as $v){
            if(!isset($_GET[$v]))$_GET[$v] = '';
        }
        if(!empty($_GET['q'])){
            $k = trim($_GET['k']);
            if(in_array($k, array('username','mobile','nickname'))){
                $list = $this->db->select("SELECT mid FROM ###_member WHERE `".trim($_GET['k'])."`='".addslashes($_GET['q'])."'");
                $mids = array();
                if($list){
                    foreach($list as $v){
                        $mids[] = $v['mid'];
                    }
                }
                if(!empty($mids)){
                    $mids = implode(',', $mids);
                    $where .= " AND mid IN($mids)";
                }
            }elseif($k == 'mid' && empty($_GET['q'])){
                $_GET['mid'] = $_GET['q'];
            }else{
                $where .= " AND `".trim($_GET['k'])."` LIKE '%".addslashes($_GET['q'])."%'";
            }
        }

        $mid = intval($_GET['mid']);
        if($mid) $where .= " AND mid = '$mid'";

        $this->smarty->assign($_GET);

        $this->load->model('page');
        $_GET['page'] = intval($page);
        $this->page->set_vars(array(
            'per' => (int)$this->common['page_listrows'],
            'url'=>' href="#!member/account_log/{num}?mid='.$mid.'"'
        ));

        $sql = "SELECT * FROM ###_account_log WHERE id <> 0 $where $order";

        if($excel==1){
            $list = $this->db->select($sql);
        }else{
            $list = $this->page->hashQuery($sql)->result_array();
        }
        $list = $this->db->lJoin($list,'member','mid,username,mobile','mid','mid');

        if($excel==1){
            return $list;
        }

        $this->smarty->assign('list',$list);

        $total = $this->db->get("SELECT SUM(amount) as amount,SUM(user_money) as user_money,SUM(frozen_money) as frozen_money,SUM(pay_points) as pay_points,SUM(db_points) as db_points FROM ###_account_log WHERE id <> 0 $where");
        $this->smarty->assign('total',$total);

        $this->smarty->assign('btnNo',2);
        $this->smarty->display('manage/member/account_log.html');
    }

    /**
     * 充值提现申请
     */
    function member_account($page='1'){
        $sql = "SELECT * FROM ###_member_account AS m ";
        $excel = (isset($_GET['excel'])&&$_GET['excel']==1)?1:0;

        $this->load->model('page');
        $_GET['page'] = intval($page);
        $this->page->set_vars(array(
            'per' => (int)$this->common['page_listrows']
        ));

        $where = ' WHERE m.mid<>0 ';
        if($_GET['type']) $where .= " AND m.type = '".intval($_GET['type'])."' ";
        if($_GET['status']) $where .= " AND m.status = '".intval($_GET['status'])."' ";
        if($_GET['q']){
            if(in_array($_GET['k'], array('username','mobile'))){
                $mid = $this->db->getstr("select mid from ###_member where `".$_GET['k']."` like '".trim($_GET['q'])."'");
                if($mid){ $where .= " AND m.mid=$mid"; }
                else{ $where .= " AND m.mid=-1"; }
            }else{
                $where .= " AND ".trim($_GET['k']) . " LIKE '".trim($_GET['q'])."'";
            }
        }
        if($_GET['start_time']) $where .= " AND m.add_time >= '".strtotime($_GET['start_time'])."'";
        if($_GET['end_time']) $where .= " AND m.add_time <= '".strtotime($_GET['end_time'])."'";
        if($_GET['pay_id']) $where .= " AND m.pay_id = '".intval($_GET['pay_id'])."' ";

        if(strpos($where, 'p.') !== false){
            $sql .= " LEFT JOIN ###_pay_log AS p ON p.order_id = m.id AND p.order_type=1 ";
        }

        $sql .= $where . " ORDER BY m.id DESC";
        if($excel==1){
            $list = $this->db->select($sql);
        }else{
            $list = $this->page->hashQuery($sql)->result_array();
        }
        $list = $this->db->lJoin($list,'member','mid,realname,mobile','mid','mid');
        $list = $this->db->lJoin($list,'pay_log','order_id,order_no,transaction_id','id','order_id','',array('order_type'=>1));

        //导出
        if($excel==1){
            return $list;
        }

        $sql = "SELECT SUM(m.amount) as total, SUM(m.fee) as fee FROM ###_member_account AS m ";
        if(strpos($where, 'p.') !== false){
            $sql .= " LEFT JOIN ###_pay_log AS p ON p.order_id = m.id AND p.order_type=1 ";
        }
        $sql .= $where;
        $row = $this->db->get($sql);
        $this->smarty->assign('total',$row['total']>0 ? $row['total'] : '0.00');
        $this->smarty->assign('fee',$row['fee']>0 ? $row['fee'] : '0.00');

        #支付方式
        $this->load->model('payment');
        $this->smarty->assign('payment',$this->payment->getPayment("is_cod<>1 AND pay_code<>'balance'"));

        $this->load->model('share');
        $this->smarty->assign('list',$list);
        $this->smarty->display('manage/member/member_account.html');
    }
    /**
     * 充值提现编辑
     */
    function member_account_edit($id=''){
        if($id){
            $row = $this->db->select("SELECT * FROM ###_member_account WHERE id=".$id);
            $row = $this->db->lJoin($row,'member','mid,realname,mobile','mid','mid');
            $row = $row[0];
        }
        //提交
        if(isset($_POST['Submit'])){
            $post = $_POST['post'];
            $res = $this->member->member_account_save($post);
            if(isset($res['code']) && $res['code']==0){
                //成功
                if($post['status']==2){
                    //充值
                    if($row['type']==1){
                        $this->member->accountlog('recharge',array('mid'=>$row['mid'],'user_money'=>$row['amount'],'desc'=>'通过'.$row['pay_name'].'充值账户'));
                    }else{
                    //提现
                        $this->member->accountlog('withdraw',array('mid'=>$row['mid'],'frozen_money'=>-$row['amount'],'desc'=>'通过'.$row['pay_name'].'提现账户'));
                    }
                }elseif($post['status']==3 && $row['type']==2){
                    $input = array();
                    $input['mid'] = $row['mid'];
                    $input['user_money'] = $row['amount'];
                    $input['frozen_money'] = -$row['amount'];
                    $input['desc'] = '取消账户提现,解冻'.$this->L['unit_baozheng'];
                    $this->member->accountlog('withdraw',$input);
                }
                admin_log('编辑提现充值：R'.$id);
                $this->tip($res['message'],array('inIframe'=>true));
                $this->exeJs("parent.com.xhide();parent.main.refresh()");
            }else{
                $this->tip($res['message'],array('inIframe'=>true,'type'=>1));
            }
            die;

        }

        $this->smarty->assign('row',$row);
        $this->smarty->display('manage/member/member_account_edit.html');
    }
    /**
     * 删除充值申请
     */
    function member_account_del(){
        $id = (int) $_POST['id'];
        if(!$id) die;
        $row = $this->db->get("SELECT * FROM ###_member_account WHERE id=".$id);
        if(isset($row['id'])){
            admin_log('删除充值/提现申请：'.$row['username']);
            //删除提现解冻保证金
            if($row['type']==2 && $row['status']==1){
                $input = array();
                $input['mid'] = $row['mid'];
                $input['user_money'] = $row['amount'];
                $input['frozen_money'] = -$row['amount'];
                $input['desc'] = '取消账户提现,解冻'.$this->L['unit_baozheng'];
                $this->member->accountlog('withdraw',$input);
            }
            $this->db->delete('member_account',array('id'=>$id));
            $this->tip('删除成功',array('type'=>1));
        }
    }

    /**
     * 认证身份证
     */
    function verify_idcard($page=1){
        $where = '';

        #关键词搜索
        $array = array('k','q');
        foreach($array as $v){
            if(!isset($_GET[$v]))$_GET[$v] = '';
        }
        if(!empty($_GET['q'])){
            $where .= " AND ".trim($_GET['k'])." LIKE '".addslashes($_GET['q'])."'";
        }

        if($_GET['status']){
            $where .= " AND status = '".$_GET['status']."'";
        }
        $this->smarty->assign($_GET);

        $this->load->model('page');
        $_GET['page'] = intval($page);
        $this->page->set_vars(array(
            'per' => (int)$this->common['page_listrows']
        ));
        $list = $this->page->hashQuery("SELECT * FROM ###_verify_idcard WHERE mid<>0 $where ORDER BY id DESC")->result_array();
        $list = $this->db->lJoin($list,'member','mid,mobile,is_voice','mid','mid');
        $this->smarty->assign('list',$list);
        $this->smarty->display('manage/member/verify_idcard.html');
    }
    function verify_idcard_edit($id=''){
        $row = $this->db->get("SELECT * FROM verify_idcard WHERE id=".$id);
        if(isset($_POST['Submit'])){
            $post = $_POST['post'];
            $post['id'] = $id;
            $this->member->verify_idcard_save($post);
            if($post['status']==2){
                $post = array();
                $post['realname'] = $row['realname'];
                $post['idcard'] = $row['card'];
                $this->db->update('member',$post,array('mid'=>$row['mid']));
            }elseif($post['status']==3){
                //拒绝通过审核，扣除10元保证金
                //$input = array();
                //$input['mid'] = $row['mid'];
                //$input['user_money'] = -10;
                //$input['desc'] = '实名认证审核未通过，扣除'.$this->L['unit_baozheng'];
                //$this->member->accountlog('admin',$input);
                //更新会员实名
                $post = array();
                $post['realname'] = '';
                $post['idcard'] = '';
                $this->db->update('member',$post,array('mid'=>$row['mid']));
                //站内信通知用户
                $this->load->model('msg');
                $input_arr = array();
                $input_arr['type'] = 1;
                $input_arr['to_mid'] = $row['mid'];
                $input_arr['to_username'] = $row['username'];
                $input_arr['title'] = '您的实名认证未通过系统认证';
                $input_arr['content'] = '您的实名认证未通过系统认证,拒绝理由-'.$post['remark'];
                $this->msg->msg_save($input_arr);
            }
            //$this->tip('保存成功',array('inIframe'=>true,'type'=>1));
            //$this->exeJs("parent.com.xhide();parent.main.refresh();");
            $this->tip('保存成功',array('inIframe'=>true,'type'=>1));
            $this->exeJs("parent.location.href='/manage#!member/verify_idcard/'");
        }
        $this->smarty->assign('row',$row);
        $this->smarty->display('manage/member/verify_idcard_edit.html');
    }
    /**
     * 收货地址
     */
    function address($mid=''){
        $list = $this->db->select("SELECT * FROM ###_member_address WHERE mid=$mid ORDER BY is_default DESC");
        $this->smarty->assign('list',$list);
        $this->smarty->display('manage/member/address.html');
    }
    /**
     * 银行账号
     */
    function bankcard($mid=''){
        $list = $this->db->select("SELECT * FROM ###_member_bankcard WHERE mid=$mid ORDER BY is_default DESC");
        $this->smarty->assign('list',$list);
        $this->smarty->display('manage/member/bankcard.html');
    }

    /**
     * 会员留言
     */
    function message($page=1){
        #按钮
        $this->btnMenu += array(
            3=>array('url'=>'#!member/message','name'=>'会员留言')
        );

        #筛选
        $where = 'WHERE 1 ';
        #关键词搜索
        if(!empty($_GET['q'])){
            if($_GET['k'] == 'ids'){
                //查询该ID所有留言过程

            }else{
                $where .= " AND ".trim($_GET['k'])." LIKE '%".addslashes($_GET['q'])."%'";
            }
        }

        //发送者
        $user = isset($_GET['user']) ? $_GET['user'] : 'username';
        $username = isset($_GET['username']) ? trim($_GET['username']) : '';
        $sys = isset($_GET['sys']) ? $_GET['sys'] : 0;
        $where .= " AND ( ";
        $and = "AND";
        if($sys == 1){
            $where .= " (mid=0 OR mid is Null) ";
            $and = "OR";
        }else{
            $where .= " 1 ";
        }
        if($username){
            $where .= " $and `$user`='$username' ";
        }
        $where .= " ) ";

        //接收者
        $to_user = isset($_GET['to_user']) ? $_GET['to_user'] : 'to_username';
        $to_username = isset($_GET['to_username']) ? trim($_GET['to_username']) : '';
        $to_sys = isset($_GET['to_sys']) ? $_GET['to_sys'] : 0;
        $where .= " AND ( ";
        $and = "AND";
        if($to_sys == 1){
            $where .= " (to_mid=0 OR to_mid is Null) ";
            $and = "OR";
        }else{
            $where .= " 1 ";
        }
        if($to_username){
            $where .= " $and `$to_user`='$to_username' ";
        }
        $where .= " ) ";

        $this->smarty->assign($_GET);
        $this->load->model('page');
        $_GET['page'] = intval($page);
        $this->page->set_vars(array(
            'per' => (int)$this->common['page_listrows']
        ));

        $list = $this->page->hashQuery("SELECT * FROM msg $where ORDER BY id DESC")->result_array();
        if($list){
            foreach($list as $key=>$val){
                $list[$key]['reply'] = $this->db->get("SELECT * FROM msg WHERE parent_id = '{$val[id]}'");
            }
        }

        $this->smarty->assign('btnNo',3);
        $this->smarty->assign('btnMenu',$this->btnMenu);
        $this->smarty->assign('list',$list);
        $this->smarty->display('manage/member/message.html');
    }
    function message_reply($id=''){
        $row = $this->db->get("SELECT * FROM msg WHERE id = '{$id}'");
        //提交
        if(isset($_POST['Submit'])){
            $this->load->model('msg');
            $post = $_POST['post'];
            $input = array();
            $input['to_mid'] = $row['mid'];
            $input['to_username'] = $row['username'];
            $input['mid'] = UID;
            $input['username'] = USER;
            $input['content'] = $post['content'];
            $input['type'] = 1;
            $input['parent_id'] = !empty($id) ? $id : 0;
            $this->msg->msg_save($input);
            $this->tip('回复成功',array('inIframe'=>true));
            $this->exeJs("parent.com.xhide();parent.main.refresh()");
        }

        $this->smarty->assign('row',$row);
        $this->smarty->display('manage/member/message_reply.html');
    }

    /**
     * 会员过滤条件
     * @return array
     */
    function getFilterCond(){
        $where = ' 1 ';
        $order = ' ORDER BY ';

        #关键词搜索
        $array = array('k','q');
        foreach($array as $v){
            if(!isset($_GET[$v]))$_GET[$v] = '';
        }
        if(!empty($_GET['q'])){
            //按推荐人
            if($_GET['k']=='itv'){
                $itv_id = $this->db->getstr("SELECT mid FROM ###_member WHERE username='".$_GET['q']."'");
                if($itv_id){
                	$where .= " AND a.ivt_id=".$itv_id;
                }
            }elseif(in_array($_GET['k'], array('mid'))){
                $where .= " AND a.mid=".addslashes($_GET['q']);
            }else{
                $where .= " AND a.".trim($_GET['k'])." LIKE '%".addslashes($_GET['q'])."%'";
            }
        }
        elseif($_GET['k']=='itv'){
            $where .= " AND a.ivt_id>0";
        }

        $fields = array('start_time','end_time');
        foreach($fields as $v){
            if(!isset($_GET[$v]))$_GET[$v] = '';
        }

        //起始时间：查关注时间
        if(!empty($_GET['start_time'])){
            $where .= " AND a.c_time>".strtotime($_GET['start_time']);
        }
        //结束时间：查关注时间
        if(!empty($_GET['end_time'])){
            $where .= " AND a.c_time<".strtotime($_GET['end_time']);
        }
        //会员等级
        if(!empty($_GET['rank_id'])){
            $where .= " AND a.rank_id=".intval($_GET['rank_id']);
        }
        //在线离线状态
        if($_GET['online']==1){
            $where .= " AND b.mid>0 AND b.c_time>".(time()-$this->session->expire);
        }
        //手机状态
        if(isset($_GET['verify_mobile']) && $_GET['verify_mobile']!==''){
            if($_GET['verify_mobile']==99){
                $where .= " AND (a.verify_mobile=0 OR a.verify_mobile IS NULL OR a.verify_mobile='')";
            }else{
                $where .= " AND a.verify_mobile=".$_GET['verify_mobile'];
            }
        }
		//用户类别
        if($_GET['robots']){
        	if($_GET['robots']=='99'){
        		$where .= " AND a.is_robots!=1";
        	}else if($_GET['robots']=='1'){
        		$where .= " AND a.is_robots=1";
        	}
        }
        //用户状态
        if($_GET['status']){
            if($_GET['status']==99){
                $where .= " AND a.status!=1";
            }else{
                $where .= " AND a.status=1";
            }
        }
        //手机认证
        if($_GET['is_voice']){
            if($_GET['is_voice']==99){
                $where .= " AND a.is_voice=0";
            }else{
                $where .= " AND a.is_voice=1";
            }
        }
        //赚拍币
        if($_GET['free']){
            if($_GET['free']==99){
                $where .= " AND a.free!=1";
            }else{
                $where .= " AND a.free=1";
            }
        }

        $where .= " AND NOT ISNULL(a.mid) ";

        //夺宝次数
        if(!empty($_GET['dbcs'])){
            $where .= " AND dd.payamount>=".$_GET['dbcs'];
        }

        
        #快速排序
        $order .= isset($_GET['sortby']) ? $_GET['sortby'] : 'a.mid';
        $order .= ' ';
        $order .= isset($_GET['sortorder']) ? $_GET['sortorder'] : 'DESC';

        return array('where'=>$where, 'order'=>$order);
    }

    /**
     * 导出充值提现
     */
    function export_account(){
        $_GET['excel'] = 1;
        $data = $this->member_account();
        $list = array();
        foreach($data as $k=>$v){
            $v['add_time'] = date('Y-m-d H:i:s',$v['add_time']);
            $v['type'] = $v['type']==1 ? '充值' : '提现';

            //订单号信息
            $v['order_sn_info'] = "\"";
            if($v['order_no']){ $v['order_sn_info'] .= "商户订单号：".$v['order_no']."\r\n"; }
            if($v['transaction_id']){ $v['order_sn_info'] .= "支付订单号：".$v['transaction_id']."\r\n"; }
            $v['order_sn_info'] .= "\"";

            $v['status_name'] = '已取消';
            if($v['status'] == 1){ $v['status_name'] = '待付款'; }
            if($v['status'] == 2){ $v['status_name'] = '已完成'; }

            $list[] = $v;
        }

        $fields = array(
            'mid'=>'会员ID',
            'order_sn_info'=>'订单号',
            'username'=>'会员名',
            'type'=>'类型',
            'realname'=>'真实姓名',
            'amount'=>'金额',
            'pay_name'=>'支付方式',
            'user_note'=>'银行账号',
            'add_time'=>'申请时间',
            'status_name'=>'状态',
        );

        $this->load->model('share');
        $this->share->SetExcelHeader('充值提现-'.date('Y-m-d-H-i'),'充值提现记录');
        $this->share->SetExcelBody($fields, $list);
    }

    /**
     * 批量处理充值提现
     */
    function batch_account(){
        $ids = trim($_GET['ids']);

        if($ids){
            foreach(explode(",",$ids) as $id){
                $row = $this->db->get("SELECT * FROM ###_member_account WHERE id=".$id);
                $post['status'] = intval($_GET['status']);
                $post['id'] = $id;
                if($row['status']==1) $res = $this->member->member_account_save($post);

                if(isset($res['code']) && $res['code']==0){
                    //成功
                    if($post['status']==2){
                        //充值
                        if($row['type']==1){
                            $this->member->accountlog('recharge',array('mid'=>$row['mid'],'user_money'=>$row['amount'],'desc'=>'通过'.$row['pay_name'].'充值账户'));
                        }else{
                            //提现
                            $this->member->accountlog('withdraw',array('mid'=>$row['mid'],'frozen_money'=>-$row['amount'],'desc'=>'通过'.$row['pay_name'].'提现账户'));
                        }
                    }
                }
            }
            $this->tip('操作成功',array('type'=>1));
            $this->exeJs("parent.main.refresh()");
        }
    }

    /**
     * 邀请奖励
     */
    function award_ivt($page=1){
        $where = '';
        if($_GET['q']) $where .= "AND ".trim($_GET['k']) . " LIKE '".trim($_GET['q'])."'";
        if($_GET['status']) $where .= "AND status = '$_GET[status]'";
        if($_GET['num']) $where .= "AND num = '$_GET[num]'";
        $this->smarty->assign($_GET);
        $this->load->model('page');
        $_GET['page'] = intval($page);
        $this->page->set_vars(array(
            'per' => (int)$this->common['page_listrows']
        ));
        $list = $this->page->hashQuery("SELECT * FROM ###_award_ivt WHERE mid<>0 $where ORDER BY id DESC")->result_array();
        $this->smarty->assign('list',$list);
        $this->smarty->display('manage/member/award_ivt.html');
    }

    /**
     * 审核奖励
     */
    function award_ivt_edit($id=""){
        $row = $this->db->get("SELECT * FROM ###_award_ivt WHERE id = '$id'");
        $this->smarty->assign('row',$row);
        $this->smarty->display('manage/member/award_ivt_edit.html');
    }
    /**
     * 佣金明细
     */
    function commission($page=1){
        $this->load->model('page');
        $_GET['page'] = intval($page);
        $this->page->set_vars(array(
            'per' => (int)$this->common['page_listrows']
        ));

        $where = '';
        if($_GET['q']){
            if(in_array($_GET['k'], array('mid', 'ivt_mid'))){
                $where .= "AND ".trim($_GET['k']) . " LIKE '".trim($_GET['q'])."'";
            }else{
                $where .= "AND ".trim($_GET['k']) . " LIKE '%".trim($_GET['q'])."%'";
            }
        }
        if($_GET['start_time']) $where .= "AND addtime >= '".strtotime($_GET['start_time'])."'";
        if($_GET['end_time']) $where .= "AND addtime <= '".strtotime($_GET['end_time'])."'";
        if($_GET['mid']) $where .= "AND mid = " . $_GET['mid'];
        if($_GET['ivt_mid']) $where .= "AND ivt_mid = " . $_GET['ivt_mid'];
        $this->smarty->assign($_GET);
        $list = $this->page->hashQuery("SELECT * FROM ###_commission WHERE mid<>0 $where ORDER BY id DESC")->result_array();
        $total = $this->db->getstr("SELECT SUM(commission) as total  FROM ###_commission WHERE mid<>0 $where");
        $this->smarty->assign('total',$total>0 ? $total : '0.00');

        $this->smarty->assign('list',$list);
        $this->smarty->display('manage/member/commission.html');
    }

    /**
     * 佣金提现记录
     */
    function withdraw_commission($page=1){
        $this->load->model('page');
        $_GET['page'] = intval($page);
        $this->page->set_vars(array(
            'per' => (int)$this->common['page_listrows']
        ));

        $where = '';
        if($_GET['q']) $where .= "AND ".trim($_GET['k']) . " LIKE '%".trim($_GET['q'])."%'";
        if($_GET['start_time']) $where .= "AND addtime >= '".strtotime($_GET['start_time'])."'";
        if($_GET['end_time']) $where .= "AND addtime <= '".strtotime($_GET['end_time'])."'";
        $list = $this->page->hashQuery("SELECT * FROM ###_withdraw_commission WHERE mid<>0 $where ORDER BY id DESC")->result_array();
        $total = $this->db->getstr("SELECT SUM(commission) as total  FROM ###_withdraw_commission WHERE mid<>0 $where");
        $this->smarty->assign('total',$total>0 ? $total : '0.00');

        $this->smarty->assign('list',$list);
        $this->smarty->display('manage/member/withdraw_commission.html');
    }

    /**
     * 佣金提现编辑
     */
    function withdraw_commission_edit($id=""){
        $row = $this->db->get("SELECT * FROM ###_withdraw_commission WHERE id = '$id'");
        if(isset($_POST['Submit'])){
            $this->db->update('withdraw_commission',array('status'=>$_POST['status']),array('id'=>$id));
            $this->tip('操作成功',array('inIframe'=>true));
            $this->exeJs("parent.com.xhide();parent.main.refresh()");
        }
        $this->smarty->assign('row',$row);
        $this->smarty->display('manage/member/withdraw_commission_edit.html');
    }

    /**
     * 删除会员留言
     */
    function del_msg(){
        $id = (int) $_POST['id'];
        if(!$id) die;

        admin_log('删除会员留言：'.$id);
        $this->db->delete('###_msg', array('id'=>$id));
        $this->tip('删除成功',array('type'=>1));
    }

    /**
     * 导出Excel
     */
    function exportExcel(){
        set_time_limit(0);
        $this->load->model('share');
        $type = isset($_GET['type']) ? intval($_GET['type']) : 0;
        $_GET['excel'] = 1;
        $list = array();

        if($type == 1){
            //导出帐户明细
            $data = $this->account_log();
            foreach($data as $k=>$v){
                $v['logtime'] = date('Y-m-d H:i', $v['logtime']);
                $list[] = $v;
            }

            $fields = array(
                'id'=>'id',
                'username'=>'会员名',
                'mobile'=>'手机号',
                'amount'=>'第三方支付',
                'user_money'=>'可用余额',
                'frozen_money'=>'冻结金额',
                'db_points'=>$this->L['unit_db_points'],
                'pay_points'=>$this->L['unit_pay_points'],
                'rank_points'=>'经验值',
                'stage'=>'操作类型',
                'logtime'=>'操作时间',
                'desc'=>'操作描述',
            );
            $this->share->SetExcelHeader('帐户明细-'.date('Y-m-d H:i:s'),'帐户明细');
            $this->share->SetExcelBody($fields, $list);
        }else{
            //导出会员信息
            $data = $this->index();
            foreach($data as $k=>$v){
                $list[] = $v;
            }

            $fields = array(
                'mid'=>'id',
                'username'=>'用户名',
                'nickname'=>'昵称',
                'realname'=>'真实姓名',
                'mobile'=>'手机号码',
            );
            $this->share->SetExcelHeader('会员信息-'.date('Y-m-d H:i:s'),'会员信息');
            $this->share->SetExcelBody($fields, $list);
        }
    }

    /**
     * 批量禁用删除
     */
    function batch_delete(){
        //if(!isAjax()){ die; }
        $type = isset($_POST['type']) ? intval($_POST['type']) : 1;
        $ids = isset($_POST['ids']) ? trim($_POST['ids']) : '';
        if($type == 2){
            //删除所有筛选的结果
            $_GET['excel'] = 1;
            $list = $this->index();
            if(empty($list)){ die(0); }
            $ids = '';
            foreach($list as $k=>$v){
                $ids .= $ids ? (','.$v['mid']) : $v['mid'];
            }
        } elseif(empty($ids)){ die(0); }

        $this->db->update('member', array('status'=>0), "mid IN($ids)");
        die(1);
    }

}
