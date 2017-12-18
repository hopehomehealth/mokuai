<?php

/**
 * 商家管理
 */

class business extends Lowxp{
    function __construct(){
        #按钮
        $this->btnMenu = array(
            0=>array('url'=>'#!business/index','name'=>'商家管理'),
            1=>array('url'=>'#!business/index?status=0','name'=>'入驻审核'),
        );
        parent::__construct();
        #加载
        $this->load->model('business');

        if(!$this->business->business_power){
            die('<div style="font-family:\5FAE\8F6F\96C5\9ED1;font-size:24px;padding:10px;">商家为付费功能，请联系商务获取插件包！ :)</div>');
        }
    }

    function index($page=1){
        #检索
        $where = '';
        if(!empty($_GET['q'])){
            $where .= " AND ".trim($_GET['k'])." LIKE '".addslashes($_GET['q'])."'";
        }
        if(isset($_GET['status']) && $_GET['status'] != 99){
            if($_GET['status']==0){
                $this->smarty->assign('btnNo',1);
            }
            $where .= " AND `bus_status`=" . $_GET['status'];
        }else{
            $_GET['status'] = 99;
        }
        $this->smarty->assign($_GET);

        #分页
        $this->load->model('page');
        $_GET['page'] = intval($page);
        $this->page->set_vars(array(
            'per' => (int)$this->common['page_listrows']
        ));

        $sql = "select b.*,m.username from ###_business as b
                left join ###_member as m on m.mid=b.mid
                where 1 $where order by id desc";
        $list = $this->page->hashQuery($sql)->result_array();
        foreach($list as $k=>$v){
            $v['bus_status_row'] = $this->business->bus_status($v['bus_status']);
            $list[$k] = $v;
        }

        //商家状态
        $this->smarty->assign('bus_status',$this->business->bus_status(99));

        $this->smarty->assign('list',$list);
        $this->smarty->display('manage/business/list.html');
    }

    /**
     * 商家配置
     */
    function config(){
        #按钮
        $this->btnMenu = array(
            0=>array('url'=>'#!business/index','name'=>'基本配置'),
        );

        $this->smarty->assign('btnMenu',isset($this->btnMenu)?$this->btnMenu:array());
        $this->smarty->assign('btnNo',0);

        //获取配置
        $this->smarty->assign('config', $this->setting->value_other());

        //获取默认发布上限
        $this->smarty->assign('bus_limit', $this->business->bus_limit());

        $this->smarty->display('manage/business/config.html');
    }

    /**
     * 编辑商家
     */
    function edit($id=''){
        //提交
        if(isset($_POST['Submit'])){
            $res = $this->save();

            if(isset($res['code']) && $res['code']==0){
                $this->tip($res['message'],array('inIframe'=>true));
                $this->exeJs("parent.com.xhide();parent.main.refresh()");
            }else{
                $this->tip($res['message'],array('inIframe'=>true,'type'=>1));
            }
            die;
        }

        $row = array();
        if($id){
            $this->load->model('member');
            $row = $this->business->get(array('id'=>$id));
            $row_member = $this->member->member_info($row['mid'], 'username');
            $row['username'] = $row_member['username'];
        }

        //所属区域
        $this->load->model('linkage');
        $area = $this->linkage->select_linkage($row['bus_zone'] ? $row['bus_zone'] : 1,1,'bus_zone');
        $this->smarty->assign('area',$area);

        //商家状态
        $this->smarty->assign('bus_status',$this->business->bus_status(99));

        //获取默认发布上限
        $this->smarty->assign('bus_limit', $this->business->bus_limit());

        $this->smarty->assign('row',$row);
        $this->smarty->display('manage/business/edit.html');
    }

    /** 保存商家信息
     * @return array
     */
    private function save(){
        $post = $_POST['post'];
        $id = $_POST['id'];

        $row = array();
        if($id){
            $row = $this->business->get(array('id'=>$id));
        }

        #表单处理
        if(empty($post['bus_name'])){ return array('code'=>10001, 'message'=>'请输入店铺名称!'); }

        #重复处理
        $where = $id ? ' and id!='.$id : '';
        $res = $this->db->get("select id from ".$this->baseTable." where bus_name='".$post['bus_name']."'".$where);
        if($res){ return array('code'=>10003, 'message'=>'店铺名称已使用，请更换!'); }

        #添加或变更状态为开启时，写入开启时间
        if($post['bus_status'] == 10){
            if(!$row || $row['bus_status'] != $post['bus_status']){
                $post['time_open'] = time();
            }
        }

        $post['bus_zone'] = !empty($post['bus_zone']) ? end($post['bus_zone']) : '1';
        $this->load->Model('linkage');
        $post['bus_area'] = $post['bus_zone'] ? $this->linkage->pos_linkage($post['bus_zone'],false) : '';
        $post['bus_area'] = str_replace('>','',$post['bus_area']);

        #保存
        $where = $id ? array('id'=>(int) $id) : '';
        $res = $this->business->save($post,$where);

        if(empty($res)){ return array('code'=>10002, 'message'=>'数据操作失败!'); } //未知错误
        if($id){
            admin_log('编辑商家：'.$post['bus_name']);
            return array('code'=>0, 'type'=>'update', 'message'=>'更新成功');
        }
        else{
            admin_log('添加商家：'.$post['bus_name']);
            return array('code'=>0, 'type'=>'insert', 'message'=>'添加成功');
        }
    }

    //删除
    function del(){
        $id = (int) $_POST['id'];
        if(!$id) die;

        $row = $this->db->get("SELECT bus_name,bus_status FROM ###_business WHERE id=".$id);
        if($row['bus_status'] >= 10){
            $this->tip('禁止删除已审核的商家！',array('type'=>1));die;
        }

        admin_log('删除商家：'.$row['bus_name']);
        $this->db->delete('###_business', array('id'=>$id));
        $this->tip('删除成功',array('type'=>1));
    }

}