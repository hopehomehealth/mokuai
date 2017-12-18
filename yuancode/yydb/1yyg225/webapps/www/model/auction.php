<?php

/**
 * Class auction_model
 */
class auction_model extends Lowxp_Model{

    public $baseTable = '###_goods_activity';
    public $logTable = '###_auction_log';
    public $disDays = 7; #中奖失效天数
    function __construct(){

    }

    //保存数据
    function save(){
        $post = $_POST['post'];
        $id = intval($_POST['id']);

        #表单处理
        if(empty($post['cat_type'])){ return array('code'=>10001, 'message'=>"请选择".$this->L['unit_pay']."商品分类!"); }
        if(empty($post['goods_id'])){ return array('code'=>10001, 'message'=>"请搜索并选择".$this->L['unit_pay']."商品!"); }
        if(empty($post['title'])){ return array('code'=>10001, 'message'=>'请输入商品名称!'); }
        if(empty($post['start_time']) || empty($post['end_time'])){ return array('code'=>10001, 'message'=>"请选择".$this->L['unit_pay']."起始时间!"); }

        if($this->base->validate($post['start_price'],'number')==false || trim($post['start_price']) < 0){
            return array('code'=>10001, 'message'=>'起拍价必须是大于等于0的数字!');
        }
        if($this->base->validate($post['amplitude'],'number')==false || trim($post['amplitude']) < 0){
            return array('code'=>10001, 'message'=>'加价幅度必须是大于等于0的数字!');
        }
        if($this->base->validate($post['deposit'],'number')==false || trim($post['deposit']) < 0){
            return array('code'=>10001, 'message'=>$this->L['unit_baozheng'].'必须是大于等于0的数字!');
        }

        #初始值 格式化
        $post['start_time'] = strtotime($post['start_time']);
        $post['end_time'] = strtotime($post['end_time']);
        if(!$id){
            $post['is_finished'] = 0;
        }

        $row = array();
        if($id){
            $row = $this->db->get("SELECT ext_info,end_time FROM ". $this->baseTable ." WHERE act_id=".$id);
            #有人参拍时,禁止修改起拍价和保证金
            if($this->logNumberUser($id) > 0){
                $ext_info = unserialize($row['ext_info']);
                $post['start_price'] = $ext_info['start_price'];
                $post['deposit'] = $ext_info['deposit'];
            }
        }
        else{
            $qishu = $this->db->getstr("SELECT IFNULL(MAX(qishu),0) FROM ". $this->baseTable ." WHERE goods_id=".$post['goods_id']);
            $post['qishu'] = $qishu + 1;
        }

        #竞拍参数
        $post['ext_info'] = serialize(array(
            'old_price'     => round(floatval($post['old_price']), 2),
            'start_price'   => round(floatval($post['start_price']), 2),
            'amplitude'     => round(floatval($post['amplitude']), 2),
            'deposit'       => round(floatval($post['deposit']), 2),
            'winnum'        => intval($post['winnum']),
            'win'           => trim($post['win']),
            'type'          => intval($post['type']),
            'typenum'       => intval($post['typenum']),
            'user'          => intval($post['user']),
            'painum'        => intval($post['painum']),
            'paib'          => intval($post['paib']),
            'oknum'         => 1,
        ));

        #处理图片数据
        if(isset($post['thumb']) && !empty($post['thumb'])){
            $arrData = array();
            foreach($post['thumb']['path'] as $k=>$v){
                $arrData[$k]['path'] = $v;
                $arrData[$k]['title'] = $post['thumb']['title'][$k];
            }
            $post['thumb'] = json_encode($arrData);
        }

        #保存
        $where = $id ? array('act_id'=>$id) : '';
        $res = $this->db->save($this->baseTable,$post,'',$where);

        if(empty($res)){ return array('code'=>10002, 'message'=>'数据操作失败!'); }
        if($id){
            admin_log("编辑".$this->L['unit_pay']."商品：".$post['title']);
            return array('code'=>0, 'type'=>'update', 'message'=>'更新成功');
        }
        else{
            admin_log("添加".$this->L['unit_pay']."商品：".$post['title']);
            return array('code'=>0, 'type'=>'insert', 'message'=>'添加成功');
        }
    }

    /**竞拍类别
     * @var array noteid公告分类ID，ggid广告位ID
     */
    public $actTypes = array(
        'kaquan'  => array('key'=>'kaquan','title'=>'卡券拍', 'noteid'=>59,'ggid'=>11,'bgcolor'=>'29cfaa'),
        'jingpin' => array('key'=>'jingpin','title'=>'竞拍专区', 'noteid'=>60,'ggid'=>12,'bgcolor'=>'2ed878'),
        'tiyan'   => array('key'=>'tiyan','title'=>'体验拍', 'noteid'=>61,'ggid'=>13,'bgcolor'=>'29cfaa'),
    );

    /**获取竞拍类别行
     * @param $key
     * @return array
     */
    function getType($key){
        if($this->actTypes[$key]){
            return $this->actTypes[$key];
        }else{
            return array();
        }
    }

    /** 获取竞拍类别关联的商品分类
     * @param $key
     * @return array
     */
    function getCats($key){
        $where = 'WHERE ismenu=1';
        if($key && $key!='all'){
            $where .= " AND a.cat_type='$key'";
        }
        $sql = "SELECT DISTINCT gc.id, gc.* FROM ###_goods_cat AS gc " .
            "LEFT JOIN ###_goods AS g ON g.cid=gc.id " .
            "LEFT JOIN ".$this->baseTable." AS a ON a.goods_id=g.id $where";
        $cate = $this->db->select($sql);
        return $cate;
    }

    /**载入竞拍分类及数量 （进行中的) 缓存
     * @param $key
     * @param $status
     * @param $option
     * @return array
     */
    function loadCats($key, $status, $options=array()){
        $array = array();
        if($options) return array();
        $data = empty($options) ? $this->base->read_static_cache($key.'_'.$status, 'auction_cats') : false;

        if ($data === false)
        {
            $array = $this->getCats($key);
            $array = array_merge(array(array(
                'id'=>0,'catname'=>'全部'
            )), $array);
            foreach($array as $k=>$v){
                $v['count'] = $this->auction->getList(0,1,$v['id'],$status,$options,$key);
                $array[$k] = $v;
            }
            if(empty($options)) $this->base->write_static_cache($key.'_'.$status, $array, 'auction_cats');
        }else{
            $array = $data;
        }

        return $array;
    }

    //竞拍详情
    function get($id, $options=array()){
        $id = intval($id);
        $table = $this->baseTable;

        $sql = "SELECT a.*, g.cid, g.pics, g.content, g.price, g.cover, g.desc, g.thumb, g.thumbs FROM ".$table . " AS a " .
            "LEFT JOIN ###_goods AS g ON g.id=a.goods_id WHERE a.act_type=0 AND a.act_id='$id'";
        $row = $this->db->get($sql);
        if(empty($row)) return false;
        $row = $this->getFormat($row, $options);

        #商品来源
        $row['desc'] = explode('|',$row['desc']);

        return $row;
    }

    /** 前台全局竞拍列表
     * @param $size:单页数
     * @param $page:当前页码
     * @param $id:商品分类id
     * @param $status:竞拍状态
     * @param array $options:
     * search:搜索相关
     * order:排序
     * imgw:图片宽度 imgh:图片高度
     * key:列表标识，解决倒计时冲突
     * mid:会员ID
     * @param string $type 竞拍分类
     */
    function getList($size=10, $page=1, $id=0, $status='', $options = array(), $type = ''){
        $table = $this->baseTable;
        $where = ' WHERE a.act_type=0 ';
        $orderDefault = 'a.listorder DESC,a.end_time ASC,a.act_id DESC';
        $now   = time();
        $list  = array();

        if($this->mod != 'member' && $this->mod != 'minfo'){
            $where .= " AND a.is_show=1";
        }

        #按商品分类ID
        if($id){
            $this->load->model('goodscat');
            $where .= " AND g.cid" . $this->goodscat->condArrchild($id);
        }

        #按竞拍商品分类
        if($type && $type != 'all'){
            $where .= " AND a.cat_type='".$type."'";
        }

        #按拍卖状态
        $sqlStatus = $this->status_sql($status,'a.');
        $where .= $sqlStatus?(' AND '.$sqlStatus):'';
        switch($status){
            case PRE_START: #未开始
                $orderDefault = 'a.start_time ASC';
                break;
            case FINISHED_ALL: #历史记录
                $orderDefault = 'a.qishu DESC,a.act_id DESC';
                break;
            default:break;
        }

        #按关键词搜索
        if(isset($options['k'])){
            if(isset($options['q']) && !empty($options['q'])){
                $where .= " AND a.title LIKE '%". htmlspecialchars(trim($options['q'])) ."%'";
            }
        }

        #按用户搜索
        if(!empty($options['mid'])){
            $where .= " AND l.bid_user='".$options['mid']."'";
        }

        #排序
        $order = ' ORDER BY ';
        $order .= isset($options['order']) ? $options['order'] : $orderDefault;

        #分组去重复
        $group = ' GROUP BY ';
        if($status == FINISHED_ALL){
            $group .= " tt.goods_id ";
        }else{
            $group .= " tt.act_id ";
        }

        #分页
        $this->load->model('page');
        $_GET['page'] = intval($page);
        $this->page->set_vars(array('per'=>$size));

        $sqlPublic = "FROM ".$table . " AS a " .
            "LEFT JOIN ###_goods AS g ON g.id=a.goods_id " .
            "LEFT JOIN " . $this->logTable . " AS l ON a.act_id = l.act_id " . $where;

        #size=0时，返回记录数
        if($size == 0){
            if($status == FINISHED_ALL){
                $sql = "SELECT count(DISTINCT a.goods_id) " . $sqlPublic;
            }else{
                $sql = "SELECT count(DISTINCT a.act_id) " . $sqlPublic;
            }
            $count = $this->db->getstr($sql);
            return $count;
        }

        #内容列表结果
        $urlQuery = isset($options['url']) ? $options['url'] : "$type/$status/$id/";
        $target = isset($options['target']) ? $options['target'] : "";
        $sql = "SELECT tt.* FROM (SELECT a.*,g.pics,g.price,g.cover,g.words,g.thumb AS thu " . $sqlPublic .") AS tt" . $group . str_replace('a.','tt.',$order);
        $res = $this->page->hashQuery($sql,$urlQuery,$target)->result_array();

        #格式化内容
        foreach($res as $row){
            $row = $this->getFormat($row, $options);
            $row['thumb'] = $row['thu'];
            $row = $this->getThumb($row);
            #其它参数
            $row['imgw'] = isset($options['imgw'])?$options['imgw']:270;
            $row['imgh'] = isset($options['imgh'])?$options['imgh']:170;
            $row['key'] = isset($options['key'])?$options['key']:'';

            $row['url'] = url('/auction/view/'.$row['act_id']);
            $list[] = $row;
        }
        return $list;
    }

    /** 出价记录
     * @param int $size
     * @param int $page
     * @param int $act_id 竞拍ID
     * @param int $mid 用户ID
     * @param string $status 中奖状态
     * @param array $options
     * order 排序
     * fields 其它表字段
     */
    function logList($size=10, $page=1, $act_id=0, $mid=0, $status='', $options=array(), $type=''){
        $where = ' WHERE m.mid<>0 AND g.act_type=0 ';
        $orderDefault = 'a.log_id DESC';
        $now   = time();
        $list  = array();

        #where
        $where .= isset($options['where']) ? $options['where'] : '';

        #竞拍ID
        if($act_id > 0){
            $where .= " AND a.act_id = '$act_id'";
        }

        #用户ID
        if($mid > 0){
            $where .= " AND a.bid_user = '$mid'";
        }

        #中奖状态
        if($status !== ''){
            if($status == AllWIN){ #所有中奖记录（包括已领奖）
                $where .= " AND a.status>0";
            }elseif($status == 'frozen'){ #未解冻的出价记录（包括最高出价记录）
                $where .= " AND a.first=1 AND a.frozen=0 AND g.end_time<'$now' AND g.deposit>0";
            }else{
                $where .= " AND a.status='$status'";
            }
        }

        #按竞拍商品分类
        if($type && $type != 'all'){
            $where .= " AND g.cat_type='".$type."'";
        }

        #排序
        $order = ' ORDER BY ' . (isset($options['order']) ? $options['order'] : $orderDefault);

        #分页
        $this->load->model('page');
        $_GET['page'] = intval($page);
        $this->page->set_vars(array('per'=>$size));

        $sqlPublic = " FROM ###_auction_log AS a " .
            "LEFT JOIN ".$this->baseTable." AS g ON g.act_id=a.act_id " .
            "LEFT JOIN ###_member AS m ON m.mid=a.bid_user " . $where . $order;

        #size=0时，返回记录数
        if($size == 0){
            $sql = "SELECT COUNT(DISTINCT a.log_id) " . $sqlPublic;
            $count = $this->db->getstr($sql);
            return $count;
        }

        #调取字段
        $fields = "DISTINCT a.log_id, a.*, m.username " .
            (isset($options['fields']) ? (', '.$options['fields']) : '');

        #内容列表结果
        $urlQuery = isset($options['url']) ? $options['url'] : "";
        $target = isset($options['target']) ? $options['target'] : '';
        $sql = "SELECT " . $fields . $sqlPublic;
        $res = $this->page->hashQuery($sql, $urlQuery, $target)->result_array();

        //最近的开奖日期记录
        $sql = "SELECT nexttime,addtime FROM ###_cod ORDER BY addtime DESC";
        $rowCod = $this->db->get($sql);

        $today = date('Y-m-d'); #今天日期
        $next_time = date('Y-m-d',$rowCod['nexttime']);
        $cod_time  = date('Y-m-d',$rowCod['addtime']);
        $end_time = strtotime($today . ' 14:00:00');  #今天14：00

        foreach($res as $row){
            #今天未开奖
            if($today != $cod_time){
                #今天14点后出价
                if($row['bid_time'] >= $end_time){
                    if($next_time <= $today){
                        $row['kj_time'] = '<i class="color01">等待'.$this->L['unit_kaijiang'].'日期</i>';
                    }else{
                        $row['kj_time'] = $next_time;
                    }
                }
                #今天14点前出价（包括今天之前）
                else{
                    if($next_time >= $today){
                        $row['kj_time'] = $next_time;
                    }else{
                        $row['kj_time'] = $today;
                    }
                }
            }
            #今天已开奖：显示下期开奖时间
            else{
                $row['kj_time'] = $next_time;
            }

            if(isset($row['ext_info'])){
                $ext_info = unserialize($row['ext_info']);
                unset($ext_info['win']);
                $row = array_merge($row, $ext_info);
            }

            $row['win'] = round($row['win'],2);

            #标题默认加期数
            if(isset($row['title']) && isset($row['qishu'])){
                $qishu = isset($options['qishu']) ? $options['qishu'] : 0;
                $row['title'] = ($qishu ? '(第'.$row['qishu'].'期) ' : '').$row['title'];
            }

            #判断是否失效
            if($row['status']==OKWIN && $row['cod_time']<strtotime('-'.$this->disDays.' days')){
                if($row['fdis']==1){ $row['disabled'] = 0; }
                else{ $row['disabled'] = 1; }
            }
            else{
                $row['diswin'] = 0;
            }

            $list[] = $row;
        }

        return $list;
    }

    /** 最后出价信息
     * @param $action
     */
    function last($auction){
        if ($auction['bid_last_id'] > 0){
            $sql = "SELECT * FROM " . $this->logTable . " WHERE log_id = '".$auction['bid_last_id']."'";
            $row = $this->db->select($sql);
            $row = $this->db->lJoin($row,'member','mid,username,nickname','bid_user','mid');
            if($row[0]) $auction['last_bid'] = $row[0];
        }

        /* 当前价 */
        $auction['current_price'] = isset($auction['last_bid']) ? $auction['last_bid']['bid_price'] : $auction['start_price'];
        return $auction;
    }

    /** 单个竞拍我的出价信息
     * @param $action
     */
    function myLog($auction, $mid){
        $act_id = $auction['act_id'];

        #我的最后出价
        $sql = "SELECT bid_price,bid_time FROM " . $this->logTable . " WHERE bid_user='$mid' AND act_id='$act_id' ORDER BY log_id DESC";
        $row = $this->db->get($sql);

        #我的随机码
        $sql = "SELECT cod,status FROM " . $this->logTable . " WHERE bid_user='$mid' AND act_id='$act_id' ORDER BY log_id ASC";
        $row = array_merge($row, $this->db->get($sql));

        $auction['my_bid'] = $row;
        return $auction;
    }

    /** 统计会员出价次数，统计参拍人数
     * @param int $act_id
     * @param int $user_id
     * @param int $type 0获取会员数 1获取出价数
     * @param int $distinct 是否获取重复记录
     * @return mixed
     */
    function logNumberUser($act_id=0, $user_id=0, $type=0, $distinct=false){
        $sql = "";
        $where = ' WHERE 1';

        if($act_id){
            $where .= " AND act_id='$act_id'";
        }
        if($user_id){
            $where .= " AND bid_user='$user_id'";
        }

        $distinct = $distinct ? '' : 'DISTINCT ';
        if($type==1){ #出价数
            $sql = "SELECT COUNT(".$distinct."log_id) FROM " . $this->logTable . $where;
        }
        else{ #会员数
            $sql = "SELECT COUNT(".$distinct."bid_user) FROM " . $this->logTable . $where;
        }

        $count = $this->db->getstr($sql);
        return $count?$count:0;
    }

    /**
     * 计算拍卖活动状态（注意参数一定是原始信息）
     * @param   array   $auction    拍卖活动原始信息
     * @return  int
     */
    function status($auction)
    {
        $now = time();
        if ($auction['is_finished'] == 0)
        {
            if ($now < $auction['start_time'])
            {
                return PRE_START; // 未开始
            }
            elseif ($now > $auction['end_time'])
            {
                return FINISHED; // 已结束，未处理
            }
            else
            {
                return UNDER_WAY; // 进行中
            }
        }
        elseif ($auction['is_finished'] == 1)
        {
            return FINISHED; // 已结束，未处理
        }
        else
        {
            return SETTLED; // 已结束，已处理
        }
    }

    /**
     * 查询竞拍状态的sql
     * @param   string  $status 状态
     * @param   string  $alias  竞拍表的别名（包括.例如 a.）
     * @return  string
     */
    function status_sql($status = '', $alias = ''){
        $sql = '';
        $now = time();
        if($status === '') return '';

        switch($status){
            case PRE_START: #未开始
                $sql = $alias."start_time>'$now' AND ".$alias."is_finished=0";
                break;
            case UNDER_WAY: #进行中
                $sql = $alias."start_time<='$now' AND ".$alias."end_time>='$now' AND ".$alias."is_finished=0";
                break;
            case FINISHED: #已结束（未处理）
                $sql = "((".$alias."end_time<'$now' AND is_finished=0) OR ".$alias."is_finished=1) AND ".$alias."type=1";
                break;
            case SETTLED: #已处理
                $sql = $alias."is_finished=2";
                break;
            case FINISHED_ALL: #已结束（包含已处理）
                $sql = "((".$alias."end_time<'$now' AND is_finished=0) OR ".$alias."is_finished=1 OR ".$alias."is_finished=2)";
                break;
            default:
                break;
        }

        return $sql;
    }

    /** 竞拍公用数据处理
     * @param $row
     * @param array $options
     * @return array
     */
    private function getFormat($row, $options = array()){
        $ext_info = unserialize($row['ext_info']);
        $row = array_merge($row, $ext_info);

        #竞拍状态
        $row['status'] = $this->status($row);

        #最后出价
        $last = $this->last($row);
        $row = array_merge($row, $last);

        #我的出价
        if(!empty($options['mid'])){
            $row = $this->myLog($row, $options['mid']);
        }

        #获取时间差
        if($row['status'] == PRE_START){
            $row['diff_time'] = $row['start_time'] - time();
        }else{
            $row['diff_time'] = $row['end_time'] - time();
        }

        #标题加关键词处理
        if(!empty($row['words'])){
            $words = explode('|',$row['words']);
            foreach($words as $v){
                $v = trim($v);
                if($v && strpos($row['title'],$v) !== false){
                    $row['title'] = str_replace($v,"<font class='color01'>".$v."</font>",$row['title']);
                }
            }
        }

        #标题默认加期数
        $qishu = isset($options['qishu']) ? $options['qishu'] : 1;
        $row['title'] = ($qishu ? '(第'.$row['qishu'].'期) ' : '').$row['title'];

        #获取主图
        $row = $this->getThumb($row, 1);

        return $row;
    }

    /** 重新获取
     * @param array $val 一元数组
     * @param int $type 1返回主图 2返回展示图集
     */
    function getThumb($val,$type=1,$sizeList=array('src')){
        //主图
        $thumb = isset($val['thumb']) ? json_decode($val['thumb'],true) : array();
        $thumbs = isset($val['thumbs']) ? json_decode($val['thumbs'],true) : array();
        if($type==2){
            $pics = array();
            foreach($thumbs as $k=>$v){
                $pics[$k]['imgurl_src'] = $v['path'];
            }
            return $pics;
        }else{
            if($thumb[0]['path']){
                $val['imgurl_src'] = $thumb[0]['path'];
            }else{
                $thumbs = json_decode($val['thumbs'],true);
                if($thumbs[0]['path']){
                    $val['imgurl_src'] = $thumbs[0]['path'];
                }
            }
            foreach($sizeList as $size){
                if(isset($val['imgurl_src'])){
                    $val['imgurl_'.$size] = $val['imgurl_src'];
                }
            }
            return $val;
        }
    }

    //统计搜索词
    function setSearch($q=''){
        $q = trim($q);
        if(empty($q)) return false;

        $where = '';
        $post = array(
            'word' => $q,
            'last_time' => time(),
        );

        $sql = "SELECT * FROM ###_search " .
            "WHERE `word`='$q'";
        $row = $this->db->get($sql);

        if($row){
            $where = array('word'=>$q);
            $post = array_merge($post,array(
                'qty' => $row['qty']+1,
                'ips' => $row['ips'].'|'.getIP(),
            ));
        }else{
            $post = array_merge($post,array(
                'qty' => 1,
                'ips' => getIP(),
                'start_time' => time(),
            ));
        }

        $this->db->save('search',$post,'',$where);
    }

}