<?php
/**
 * 竞拍控制器
 * ============================================================================
 * * 版权所有 2014-2016 厦门紫竹数码科技有限公司，并保留所有权利。
 * 网站地址: http://www.lnest.com；
 * ----------------------------------------------------------------------------
 * 这不是一个自由软件！您只能在不用于商业目的的前提下对程序代码进行修改和
 * 使用；不允许对程序代码以任何形式任何目的的再发布。
 */

class auction extends Lowxp{

    function __construct(){
        parent::__construct();
        $this->load->model('auction');
        $this->load->model('goodscat');
    }

    /** 竞拍列表
     * @param string $type 竞拍商品分类key
     * @param int $status 状态
     * @param int $id 商品分类ID
     * @param int $page 页码
     */
    function lists($type='all', $status=UNDER_WAY, $id=0, $page=1){
        $tpl = 'auction/lists.html';
        $data = array();

        #竞拍分类详情
        if($type!='all'){
            $data['row'] = $data['top'] = $this->auction->getType($type);
            if(empty($data['row'])) exit($this->msg());
        }
        $data['type'] = $type;

        #商品分类详情
        if($id){
            $data['row'] = $this->goodscat->get($id);
            if(empty($data['row'])) exit($this->msg());
        }
        $data['id'] = $id;

        if(empty($data['top'])){
            $data['top'] = array(
                'title' => '所有商品'
            );
        }

        #获取一级分类信息
        switch($status){
            case PRE_START:
                $data['top']['statusLang'] = '下期预告';
                break;
            case UNDER_WAY:
                $data['top']['statusLang'] = '热拍中';
                break;
            case 99: //所有
                $data['top']['statusLang'] = '所有'.$this->L['unit_pay'];
                break;
            default:
                $status = FINISHED_ALL;
                $data['top']['statusLang'] = '历史成交';
                break;
        }
        $data['status'] = $status;

        if(STPL == 'mobile'){
            if($_POST['ajaxcontent']==1){
                if(isAjax()==false){ $this->msg(); }
                #排序
                $order = isset($_POST['order']) ? trim($_POST['order']) : 'default';
                $sort = isset($_POST['sort']) ? trim($_POST['sort']) : 'DESC';
                $orderBy = '';
                if($order=='count'){
                    $order = 'tt.bid_user_count';
                }elseif($order=='new'){
                    $order = 'tt.act_id';
                }elseif($order=='price'){
                    $order = 'tt.price';
                }else{
                    $order = 'tt.end_time';
                }

                $size = 10;
                $list = $this->auction->getList($size,$page,$id,$status,array(
                    'order' => $order.' '.$sort
                ),$type);
                $this->smarty->assign('list',$list);
                $array['content'] = $this->smarty->fetch('auction/lbi/list.html');

                die(json_encode($array));
            }
        }else{
            #绑定公告分类、广告位
            $data['noteid'] = $data['top']['noteid']?$data['top']['noteid']:0;
            $data['ggid']   = $data['top']['ggid']?$data['top']['ggid']:0;

            #中奖名单（10个最新）
            $size = 10;
            $data['log'] = $this->auction->logList($size,1,0,0,AllWIN,array(
                'fields' => 'g.title,g.ext_info,m.nickname'
            ), $type);

            #搜索
            $options = array();
            $data['urlQuery'] = '';
            if(isset($_REQUEST['k'])){
                $options = $_REQUEST;
                $data['urlQuery'] = '?k=1&q='.$options['q'];
                if($page==1) $this->auction->setSearch($options['q']);
            }

            #获取所有关联的分类
            $data['cate'] = $this->auction->loadCats($type,$status,$options);

            #猜你喜欢
            $size = 15;
            $data['love'] = $this->auction->getList($size,$page,0,UNDER_WAY,array(
                'order'=>'rand()',
                'imgw'=>210,
                'imgh'=>130,
                'key'=>'love'
            ),$type);

            #竞拍列表
            $size = 16;
            $options['target'] = "#m";
            $data['list'] = $this->auction->getList($size,$page,$id,$status,$options,$type);
            #敬请期待
            $data['listNo'] = 4-count($data['list'])%4;
            $this->ur_here($data['top']['statusLang'], $data['top']['title']?array(
                array('name'=>$data['top']['title'],'url'=>url("/auction/lists/".$type))
            ):array());
        }

        $this->display_before($data['row']);
        $this->smarty->assign('data',$data);
        $this->smarty->assign('navMark','auction');
        $this->smarty->display($tpl);
    }

    #竞拍详情
    function view($id, $page=0){
        if ($id <= 0){ $this->msg();die; }

        $data = array();
        if($id){
            $options = array();
            if(STPL == 'mobile'){
                $options = array('qishu'=>1);
                $this->smarty->assign('row',array('head'=>$this->L['unit_pay'].'详情'));
            }else{
                $options = array('qishu'=>0);
            }
            $data['row'] = $this->auction->get($id, $options);
            if(empty($data['row']) || $data['row']['is_show'] == 0){ $this->msg();die; }
        }
        $data['id'] = $id;

        #获取一级分类
        $data['top'] = $this->goodscat->getTop($data['row']['cid']);
        switch($data['row']['status']){
            case PRE_START:
                $data['top']['statusLang'] = '下期预告';
                break;
            case UNDER_WAY:
                $data['top']['statusLang'] = '热拍中';
                break;
            default:
                $data['top']['statusLang'] = '历史成交';
                break;
        }

        #猜你喜欢
        $size = 15;
        $data['love'] = $this->auction->getList($size,1,$data['top']['id'],UNDER_WAY,array('order'=>'rand()','imgw'=>210,'imgh'=>130,'key'=>'love'));

        #获取所有栏目
        $data['cat'] = $this->goodscat->get($data['row']['cid']);

        #中奖人数
        $data['codCount'] = $this->auction->logList(0, 1, $id, 0, AllWIN);

        #出价范围
        $data['priceList'] = $this->priceList($data['row']);
        #判断资金密码是否有修改
        $data['is_mobile'] = false;
        $mid = isset($_SESSION['mid']) ? $_SESSION['mid'] : 0;
        if($mid){
            $this->load->model('member');
            $member = $this->member->member_info($mid,'mobile,salt,pay_password');

            $mobile_salt = substr(trim($member['mobile']),-6);
            $mobile_salt = $this->member->get_salt_hash($mobile_salt, $member['salt']);

            if($mobile_salt == $member['pay_password']){
                $data['is_mobile'] = true;
            }
        }

        if($data['row']['cat_type'] == 'tiyan'){
            $this->ur_here('免费'.$this->L['unit_pay'], array(
                array('name'=>'体验拍','url'=>url("/auction/lists/tiyan"),'style'=>'color:#e54048'),
                array('name'=>$data['top']['statusLang'],'url'=>url("/auction/lists/tiyan/".$data['row']['status']))
            ));
        }
        else{
            $catType = $this->auction->getType($data['row']['cat_type']);
            $this->ur_here($data['top']['statusLang'], array(
                array('name'=>$catType['title'],'url'=>url("/auction/lists/".$catType['key'])),
                array('name'=>$data['cat']['catname'],'url'=>url("/auction/lists/$catType[key]/".$data['row']['status']."/".$data['cat']['id']))
            ));
        }

        $this->display_before($data['row']);
        $this->smarty->assign('data',$data);
        $this->smarty->display('auction/view.html');
    }

    #出价入口
    function bid(){
        #竞拍商品ID
        $id = isset($_POST['id']) ? intval($_POST['id']) : 0;
        if(!$id){ die(json_encode(array('url'=>'/'))); }

        #竞拍商品信息
        $auction = $this->auction->get($id);
        if(empty($auction)){ die(json_encode(array('url'=>'/'))); }

        #是否登录
        $mid = isset($_SESSION['mid']) ? $_SESSION['mid'] : 0;
        if($mid <= 0){
            die(json_encode(array('msg'=>'出价之前请先登录！','url'=>'/member/login')));
        }
        $this->load->model('member');
        $member = $this->member->member_info($mid);

        #活动是否正在进行
        if ($auction['status'] != UNDER_WAY){
            die(json_encode(array('msg'=>$this->L['unit_pay'].'活动已结束，不能再出价了！')));
        }

        #验证码
        $scode = isset($_POST['scode']) ? trim($_POST['scode']) : '';
        if (empty($scode) || $scode != $_SESSION['icode']) {
            die(json_encode(array('msg'=>'验证码不正确!')));
        }

        #资金密码
        $password_pay = (isset($_POST['password_pay']) && trim($_POST['password_pay'])) ? trim($_POST['password_pay']) : '';
        if(empty($password_pay)){
            die(json_encode(array('msg'=>'请输入您的资金密码!')));
        }
        $password_pay = $this->member->get_salt_hash($password_pay, $member['salt']);
        if($password_pay != $member['pay_password']){
            die(json_encode(array('msg'=>'资金密码不正确!')));
        }

        #全局出价时间限制
        $now = time();
        $_SESSION['bid_time'] = isset($_SESSION['bid_time']) ? $_SESSION['bid_time'] : $now;
        if($_SESSION['bid_time'] > $now){
            die(json_encode(array('msg'=>'出价太快哦，请休息片刻!')));
        }else{
            $_SESSION['bid_time'] = $now + 5;
        }

        #出价次数：从0开始
        $logNum = $this->auction->logNumberUser($id,$mid,1);

        #抽奖模式不允许重复出价
        if($auction['type'] == 0 && $logNum > 0){
            die(json_encode(array('msg'=>$this->L['unit_choujiang'].'模式不允许重复出价!')));
        }

        #仅新会员参拍
        if($auction['user'] == 1 && $logNum == 0){
            $day7 = strtotime("-7 days");
            if($day7 > $member['c_time']){
                die(json_encode(array('msg'=>"此".$this->L['unit_pay']."商品只允许7天内注册的新会员首次出价!")));
            }
        }

        #取得出价
        $auto = isset($_POST['auto']) ? intval($_POST['auto']) : 0;
        $bid_price = 0;
        if($auto){ #自动出价
            $bid_price = $auction['current_price'] + $auction['amplitude'];
        }
        else{
            $bid_price = isset($_POST['price']) ? round(floatval($_POST['price']), 2) : 0;
        }

        #第一次出价要高于起拍价
        if($auction['bid_user_count'] == 0){
            $min_price = $auction['start_price'];
        }
        #非第一次出价：需要大于等于上一个出价+加价幅度
        else{
            $min_price = $auction['last_bid']['bid_price'] + $auction['amplitude'];
        }
        if (bccomp($bid_price, $min_price, 2) == -1)
        {
            die(json_encode(array('msg'=>sprintf("您的出价低于当前最高出价 %s,请尝试系统自动配价！", price_format($min_price, false)))));
        }

        #同一会员不可连续出价
        if ($auction['last_bid']['bid_user'] == $mid)
        {
            die(json_encode(array('msg'=>'您已经是这个商品的最高出价人了!')));
        }

        #未设置保证金时，充值和实名认证必须满足一个
        /*if($auction['deposit'] <= 0 && $member['user_money'] > 0 && !empty($member['realname'])){
            die(json_encode(array('msg'=>'体验区商品出价必须满足以下条件：1、帐户有余额；2、身份证实名认证')));
        }*/

        #可用资金够吗
        if (($member['user_money'] < $auction['deposit']) && $logNum == 0)
        {
            die(json_encode(array('msg'=>"您的可用资金不足以支付".$this->L['unit_baozheng']."，点击确定充值!",'url'=>'/member/recchage')));
        }

        #判断拍币是否足够
        $is_paib = false;
        if ($auction['paib'] > 0 && $logNum == 0)
        {
            if ($member['pay_points'] < $auction['paib']){
                die(json_encode(array('msg'=>"您的".$this->L['unit_pay_points']."不够支付此次出价，点击确定领".$this->L['unit_pay_points']."!",'url'=>'/member')));
            }
            $is_paib = true;
        }
        #扣除拍币
        if($is_paib){
            $this->member->accountlog(ACT_AUCTION, array(
                'pay_points' => (-1)*$auction['paib'],
                'mid'        => $mid,
                'desc'       => "扣除".$this->L['unit_pay_points']."：".$this->L['unit_pay']."ID（".$auction['act_id']."）",
            ));
        }

        #推荐人获取拍币
        if ($logNum == 0 && $auction['cat_type'] != 'tiyan' && $member['ivt_id']){
            $this->member->accountlog(ACT_IVTREG,array(
                'pay_points' => 1,
                'mid'        => $member['ivt_id'],
                'desc'       => '邀请参拍'.$this->L['unit_jiangli'],
            ));
        }

        #冻结保证金:第一次出价
        if ($logNum == 0 && $auction['deposit'] > 0){
            $this->member->accountlog(ACT_AUCTION, array(
                'user_money'   => (-1)*$auction['deposit'],
                'frozen_money' => $auction['deposit'],
                'mid'          => $mid,
                'desc'         => "冻结".$this->L['unit_baozheng']."：".$this->L['unit_pay']."ID（".$auction['act_id']."）",
            ));
        }

        #获取随机码
        $cod = ($logNum == 0) ? $this->random() : '';

        #插入出价记录
        $dataLog = array(
            'act_id'    => $id,
            'bid_user'  => $mid,
            'bid_price' => $bid_price,
            'bid_time'  => microtime_float(),
            'first'     => $logNum+1,
            'cod'       => $cod,
            'status'    => 0,
            'ip'        => getIP(),
        );
        #100中奖率，直接转为中奖状态
        if($auction['win'] == 100 && $logNum == 0){
            $dataLog['status'] = 1;
            $dataLog['cod_time'] = RUN_TIME;
        }
        $log_id = $this->db->save('auction_log',$dataLog);
        $this->setting->logCount();

        /******更新竞拍商品表*******/
        $dataAct = array('bid_count'=>$auction['bid_count']+1,'bid_last_id'=>$log_id);
        if($logNum==0){
            $dataAct += array('bid_user_count'=>$auction['bid_user_count']+1);
        }
        #插入随机码到竞拍商品
        if($cod){
            $dataAct += $auction['logs'] ? array('logs'=>$auction['logs'].','.$cod) : array('logs'=>$cod);
        }
        #转竞拍模式
        if($auction['type'] == 0 && $auction['typenum'] > 0 && $auction['bid_user_count'] >= ($auction['typenum']-1)){
            $ext_info = unserialize($auction['ext_info']);
            $ext_info['type'] = 1;
            $dataAct += array(
                'ext_info' => serialize($ext_info),
                'type' => 1
            );
        }
        #更新参与人数
        $this->db->save('goods_activity',$dataAct,'',array('act_id'=>$id));

        #添加经验值
        $this->member->accountlog(ACT_AUCTION,array('rank_points'=>(int)1,'desc'=>$this->L['unit_pay'].'出价获得经验值'));

        #发送随机码短信
        $setting = $this->setting->value("'sms_open'");
        if($logNum == 0 && $this->site_config['sms_open'] == 1 && statusTpl('sms_rand')){
            $this->smarty->assign('cod', $cod);
            $this->smarty->assign('username', $_SESSION['username']);
            $this->load->library('sms');
            $ret = $this->sms->sendSmsTpl($member['mobile'], 'sms_rand');
        }

        die(json_encode(array('msg'=>'出价成功!','type'=>1,'count'=>$auction['bid_user_count']+1,'price'=>$bid_price)));
    }

    #出价范围
    private function priceList($auction,$num=5){
        $amplitude = floatval($auction['amplitude']);
        $list = array();
        $num = $amplitude?$num:1;
        for($i=1;$i<=$num;$i++){
            $list[] = $amplitude*$i+$auction['current_price'];
        }
        return $list;
    }

    #出价随机码
    private function random(){
        //return substr(implode(NULL,array_map('ord',str_split(substr(uniqid(),7,13),1))) , -6 , 6);
        PHP_VERSION < '4.2.0' && mt_srand((double)microtime() * 1000000);
        $cod = '';
        for($i = 0; $i < 6; $i++) {
            $cod .= mt_rand(0, 9);
        }
        return $cod;
    }

    #ajax出价/中奖记录
    function ajax_log($page=1){
        if(!isAjax()){ $this->msg(); }
        $id=intval($_REQUEST['id']);
        $size = 10;

        $status=trim($_REQUEST['status']);
        $data['status'] = $status;
        if($status == 'cod'){ $status = AllWIN; }
        else{ $status = ''; }

        $data['logList'] = $this->auction->logList($size, $page, $id, 0, $status, array(
            'fields' => 'm.photo,m.nickname,m.sex,g.ext_info',
        ));

        if(STPL == 'mobile'){
            $this->smarty->assign('list',$data['logList']);
            $array['content'] = $this->smarty->fetch('auction/lbi/list_log.html');

            die(json_encode($array));
        }

        $this->smarty->assign('data',$data);
        $this->smarty->display('auction/ajax_log.html');
    }

    #ajax获取历史期数
    function ajax_qishu(){
        $id=intval($_GET['id']);
        $data['id'] = $id;
        $now = time();

        $sql = "SELECT qishu,act_id,start_time,end_time FROM ###_goods_activity WHERE goods_id=(SELECT goods_id FROM ###_goods_activity WHERE act_id=$id) AND start_time < '$now' ORDER BY qishu DESC";
        $list = $this->db->select($sql);

        foreach($list as $k=>$v){
            $v['url'] = url('/auction/view/'.$v['act_id']);
            if($v['end_time'] > $now && $v['start_time'] < $now){ #进行中
                $v['ing'] = 1;
            }elseif($v['start_time'] > $now){ #即将开始
                $v['ing'] = 0;
            }else{ #历史期数
                $v['ing'] = 2;
            }
            $data['qishuList'][$k] = $v;
        }

        $this->smarty->assign('data',$data);
        $this->smarty->display('auction/ajax_qishu.html');
    }

}