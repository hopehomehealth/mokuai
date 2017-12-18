<?php
/**
 * 云购
 * ============================================================================
 * * 版权所有 2014-2016 厦门紫竹数码科技有限公司，并保留所有权利。
 * 网站地址: http://www.lnest.com；
 * ----------------------------------------------------------------------------
 * 这不是一个自由软件！您只能在不用于商业目的的前提下对程序代码进行修改和
 * 使用；不允许对程序代码以任何形式任何目的的再发布。
 *
 */

class yunbuy extends Lowxp{
    function __construct(){
        parent::__construct();

        #按钮
        $this->btnMenu = array(
            0=>array('url'=>'#!yunbuy/index','name'=>"".$this->L['unit_yun']."商品"),
        );

        #直购按钮
        if(YUN_GO){
            $this->btnMenu[1] = array('url'=>"#!yunbuy/index?gobuy=1",'name'=>$this->L['unit_go_buy']."商品");
        }

        #圈子按钮
        $this->load->model('quanzi');
        if($this->quanzi->power == 1){
            $this->btnMenu[2] = array('url'=>"#!yunbuy/index?gobuy=2",'name'=>$this->L['unit_yun_team']."商品");
        }

        #发布按钮
        $btnNo = 0;
        $gobuy = isset($_GET['gobuy']) ? intval($_GET['gobuy']) : 0;
        switch($gobuy){
            case 0:
                $this->btnMenu[10] = array('url'=>"#!yunbuy/edit?com=xshow|发布".$this->L['unit_yun']."商品"."",'name'=>"发布".$this->L['unit_yun']."商品");
                break;
            case 1:
                $btnNo = 1;
                $this->btnMenu[11] = array('url'=>"#!yunbuy/edit?gobuy=1&com=xshow|发布".$this->L['unit_go_buy']."商品",'name'=>"发布".$this->L['unit_go_buy']."商品");
                break;
            case 2:
                if($this->quanzi->power == 1){
                    $btnNo = 2;
                    $this->btnMenu[12] = array('url'=>"#!yunbuy/edit?gobuy=2&com=xshow|发布".$this->L['unit_yun_team']."商品",'name'=>"发布".$this->L['unit_yun_team']."商品");
                    $this->btnMenu[21] = array('url'=>"#!yunbuy/qzConfig?gobuy=2",'name'=>$this->L['unit_yun_team']."配置");
                }
                break;
        }

        //按钮菜单
        $this->smarty->assign('btnMenu',isset($this->btnMenu)?$this->btnMenu:array());
        $this->smarty->assign('btnNo', $btnNo);

        #加载
        $this->load->model('yunbuy');
    }

    function index($page=1){
        #云购类型
        $go_buy = isset($_GET['gobuy']) ? intval($_GET['gobuy']) : 0;

        #检索
        if($go_buy == 1){
            //直购商品默认不检索状态
            $_GET['status'] = isset($_GET['status']) ? $_GET['status'] : 0;
        }else{
            $_GET['status'] = isset($_GET['status']) ? $_GET['status'] : 1;
        }
        $conds = $this->getConds();
        $condition = " WHERE buy_id<>0 ";

        $condition .= count($conds) ? ' AND '.implode(' AND ',$conds) : '';
        $orderby = " ORDER BY listorders DESC,buy_id DESC ";

        if($_GET['limit']==1){
            $condition .= " AND buynum <> 0 ";
        }
        if(!empty($_GET['price'])){
            $condition .= " AND price = '".intval($_GET['price'])."' ";
        }

        #分页
        $this->load->model('page');
        $_GET['page'] = intval($page);
        $this->page->set_vars(array('per'=>(int)$this->common['page_listrows']));

        #数据集
        $sql = "SELECT y.*,b.bus_name FROM ". $this->yunbuy->baseTable . " as y
                left join ###_business as b on b.mid=y.mid " . $condition . $orderby;
        $data['list'] = $this->page->hashQuery($sql)->result_array();

        //获取商家信息
        $this->load->model('business');
        $this->smarty->assign('business_power', $this->business->business_power);

        foreach($data['list'] as $k=>$v){
            $v['status'] = $this->yunbuy->status($v);
            $goods = $this->db->get("SELECT price,rebate FROM ###_goods WHERE id = $v[goods_id]");
            $v['true_price'] = $goods['price'];

            //计算平台分润
            if($v['mid']){
                $bus_price = $v['goods_price'];
                if($v['gobuy'] == 1){
                    $bus_price = $v['custom_price'];
                }
                if(!(int) $v['bus_money']){
                    $v['bus_money_manage'] = $this->business->bus_rebate($bus_price,1,$goods['rebate']);
                }else{
                    $v['bus_money_manage'] = $bus_price - $v['bus_money'];
                }
            }

            $data['list'][$k] = $v;
        }

        //根据云购类型更换列表模板
        $template = 'manage/yunbuy/list.html';
        if($go_buy > 0){
            $template = 'manage/yunbuy/list_'.$go_buy.'.html';
        }

        $this->smarty->assign('data',$data);
        $this->smarty->display($template);
    }

    //创建/更新
    function edit(){
        //提交
		$p_id = (int) $_POST['id'];
        if(isset($_POST['Submit'])){
            if($_POST['post']['start_time']) $_POST['post']['start_time'] = strtotime($_POST['post']['start_time']);
            $res = $this->yunbuy->save();
            if(isset($res['code']) && $res['code']==0){
				$home_order = (int) $_POST['post']['home_display_order'];
				$row = $this->db->get("SELECT * FROM ". $this->yunbuy->baseTable ." WHERE buy_id=".$p_id);
				$cid = $row['cid'];
				if(in_array($cid, array(1, 21, 22, 23, 25, 34))){
					$c_arr = '(1, 21, 22, 23, 25, 34)';
				}elseif(in_array($cid, array(35, 36, 37))){ 
					$c_arr = '(35, 36, 37)';
				}elseif(in_array($cid, array(4,26,27,28))){
					$c_arr = '(4,26,27,28)';
				}elseif(in_array($cid, array(3, 29, 30, 31))){
					$c_arr = '(3, 29, 30, 31)';
				}elseif(in_array($cid, array(2, 32))){
					$c_arr = '(2, 32)';
				}elseif(in_array($cid, array(8, 33))){
					$c_arr = '(8, 33)';
				}else{
					echo("<script>console.log('wrong cid');</script>");
				}
					
                $this->tip($res['message'],array('inIframe'=>true));
                $this->exeJs("parent.com.xhide();parent.main.refresh()");
		$set = array('home_display_order'=>0);
		$this->db->update($this->yunbuy->baseTable, $set, "buy_id <> ".$p_id." and home_display_order = ".$home_order." and cid in ".$c_arr);

                $wap_order = (int) $_POST['post']['wap_display_order'];
		$set = array('wap_display_order'=>0);
		$this->db->update($this->yunbuy->baseTable, $set, "buy_id <> ".$p_id." and wap_display_order = ".$wap_order);
            }else{
                $this->tip($res['message'],array('inIframe'=>true,'type'=>1));
            }
            /*
            if(!empty($p_id)){
                $need_num = ceil($_POST['post']['goods_price']/$_POST['post']['price']);
                $newcode_arr = range(10000001,10000000+$need_num);
                $newcode_arr = implode(',',$newcode_arr);
                $this->db->save("###_yuncollection",array('buy_id'=>$p_id,'yun_code_collection'=>$newcode_arr));
            }
            */
            /*
            if(!empty($new_id)){
                $this->load->model('setting');
                $site_config=$this->setting->value("'key_value'");
                $key_value=!empty($site_config['key_value'])?$site_config['key_value']:10000;
                $need_num = ceil($_POST['post']['goods_price']/$_POST['post']['price']);
                $newcode_arr = range(10000001,10000000+$need_num);
                $robot_arr = array();
                if($need_num>10000){
                    array_push($robot_arr,10000000+$need_num);
                    $robot_key = mt_rand(0,$key_value-1);
                    $f=intval($need_num/$key_value);
                    for($i=0;$i<=$f;$i++){
                        $temp=$i*$key_value+$robot_key+10000001;
                        if($temp<(10000000+$need_num)){
                            array_push($robot_arr,$temp);
                        }
                    }
                }
                $newcode_arr = array_diff($newcode_arr,$robot_arr);
                $newcode_arr = implode(',',$newcode_arr);
                $this->db->save("###_yuncollection",array('buy_id'=>$new_id,'yun_code_collection'=>$newcode_arr));
                $robot_arr = implode(',',$robot_arr);
                $this->db->save("###_robotcollection",array('buy_id'=>$new_id,'robot_code_collection'=>$robot_arr));
            }
            */
            exit;
        }

        $id = (int) $_GET['id'];
        $row = array();

        //编辑
        $gobuy = isset($_GET['gobuy']) ? intval($_GET['gobuy']) : 0;
        if($id){
            $row = $this->db->get("SELECT * FROM ". $this->yunbuy->baseTable ." WHERE buy_id=".$id);
            $ext_info = unserialize($row['ext_info']);
            if(!empty($ext_info)) $row = array_merge($row, $ext_info);
            $this->smarty->assign('id',$id);
            $gobuy = $row['gobuy'];
        }else{
            $row = array(
                'is_show' => 1,
                'type'    => 1,
                'posid'   => 0,
                'gobuy'   => $gobuy,
            );
        }

        #商品分类
        $this->load->model('goodscat');
        $select_categorys = $this->goodscat->category_option();
        $this->smarty->assign('select_categorys', $select_categorys);

        #云购分类
        $this->load->model('yuncat');
        $select_yuncategorys = $this->yuncat->category_option($row['cid']);
        $this->smarty->assign('select_yuncategorys', $select_yuncategorys);

        $this->smarty->assign('row',$row);
        if($gobuy > 0){
            $this->smarty->display('manage/yunbuy/edit_'.$gobuy.'.html');
        }else{
            $this->smarty->display('manage/yunbuy/edit.html');
        }
    }

    //删除
    function del(){
        $id = (int) $_POST['id'];
        if(!$id) die;

        admin_log('删除一元购商品：'.$this->db->getstr("SELECT title FROM ".$this->yunbuy->baseTable." WHERE buy_id=".$id));
        $this->db->delete($this->yunbuy->baseTable, array('buy_id'=>$id));
        $this->yunbuy->cacheYunInfo($id,4);
        $this->tip('删除成功',array('type'=>1));
    }
	
	//下架
    function off(){
    	$id = (int) $_POST['id'];
    	if(!$id) die;
    	$row = $this->db->get("SELECT is_off FROM ###_yunbuy WHERE buy_id = '$id' AND gobuy=0");
    	if($row['is_off']==1)die;
    	
    	admin_log('下架一元购商品：'.$this->db->getstr("SELECT title FROM ".$this->yunbuy->baseTable." WHERE buy_id=".$id));
        $set = array('is_off'=>1,'is_show'=>0);
    	$this->db->update($this->yunbuy->baseTable,$set, array('buy_id'=>$id));
    	//下架操作需要把余额都退还给玩家
    	//第一步查询db记录中的order_id
    	$sql = "SELECT * FROM ###_yundb WHERE status=2 AND buy_id = '$id'";
    	$db_array = $this->db->select($sql);
    	if(!empty($db_array)){
	    	/*foreach($db_array as $k=>$v){
	    		if($k==0)$orderids = $v['order_id'];
	    		else $orderids .= ",".$v['order_id'];
	    	}
	    	$sql = "SELECT mid,pay_points,total,status FROM ###_yunorder WHERE order_id in ($orderids)";
	    	$order_array = $this->db->select($sql);
	    	if(!empty($order_array)){*/
	    		$this->load->model('member');
	    		foreach($db_array as $v){
	    			//if($v['status']==2){
	    				$log_arr['mid'] = $v['mid'];
	    				if($v['type']==2){
	    					$log_arr['pay_points'] = $v['auto_multi']==1?$v['total']*$v['multi']:$v['total'];
	    				}elseif($v['type']==1){
	    					$log_arr['user_money'] = $v['auto_multi']==1?$v['total']*$v['multi']:$v['total'];
	    				}
	    				$log_arr['desc'] = "商品下架，以余额形式退回支付金额";
	    				$this->member->accountlog(ACT_OFFSHELF,$log_arr);
	    			//}
	    		}
	    	//}
    	}
    	$this->tip('下架成功',array('type'=>1));
    }

    //订单
    function order($page=1){
        $excel = (isset($_GET['excel'])&&$_GET['excel']==1)?1:0;

        $sql = "SELECT d.*, m.is_robots FROM ###_yundb AS d ";

        $condition = " WHERE d.id<>0 ";
        if($_GET['status']) $condition .= " AND d.status = '".intval($_GET['status'])."'";
        if($_GET['type']) $condition .= " AND d.type = '".intval($_GET['type'])."'";
        if($_GET['q']){
        	if($_GET['k']=='d.goods_name'){
                $condition .= " AND ".trim($_GET['k'])." LIKE '%".trim($_GET['q'])."%'";
        	}else{
                $condition .= " AND d.".trim($_GET['k'])." = '".trim($_GET['q'])."'";
        	}
        }
        if($_GET['mid']){
            $condition .= " AND d.mid = '".trim($_GET['mid'])."'";
        }
        if($_GET['is_award']) $condition .= $_GET['is_award']==1 ? " AND d.is_award = '1'" : " AND d.is_award = '0'";
        if($_GET['start_time']) $condition .= " AND d.add_time >= '".strtotime($_GET['start_time'])."'";
        if($_GET['end_time']) $condition .= " AND d.add_time <= '".(strtotime($_GET['end_time'])+3600*24)."'";
        $this->smarty->assign($_GET);

        $orderby = " ORDER BY id DESC ";

$sql .= " LEFT JOIN ###_member AS m ON m.mid = d.mid ";
        if(strpos($condition, 'o.') !== false){
            $sql .= " LEFT JOIN ###_yunorder AS o ON o.order_id = d.order_id ";
        }
        if(strpos($condition, 'p.') !== false){
            $sql .= " LEFT JOIN ###_pay_log AS p ON p.order_id = d.order_id AND p.order_type=2 ";
        }

        #分页
        $this->load->model('page');
        $_GET['page'] = intval($page);
        $this->page->set_vars(array('per'=>(int)$this->common['page_listrows']));

        #数据集
        $sql .= $condition . $orderby;

        if($excel==1){
            $data['list'] = $this->db->select($sql);
        }else{
            $data['list'] = $this->page->hashQuery($sql)->result_array();
        }

        $data['list'] = $this->db->lJoin($data['list'],'pay_log','order_id,order_no,transaction_id,order_type','order_id','order_id','',array('order_type'=>2));
        if($data['list']){
            foreach($data['list'] as $k=>$v){
                $v = $this->yunbuy->getThumb($v,1);

                //云购状态
                $status = $this->yunbuy->status_order($v['status']);
                if(isset($status['title'])){
                    $v['status_name'] = $status['title'];
                    $v['status_class'] = $status['class'];
                }

                $data['list'][$k] = $v;
            }
        }

        if($excel==1){
            return $data['list'];
        }

        $this->btnMenu = array(
            0=>array('url'=>'#!yunbuy/order','name'=>$this->L['unit_yun']."订单"),
        );
        $this->smarty->assign('btnMenu',isset($this->btnMenu)?$this->btnMenu:array());
        $this->smarty->assign('btnNo', 0);

        $this->btnRig = array(
            0=>array('url'=>'javascript:;','name'=>'导出Excel','str'=>"onclick='exportExcel()' title='导出已筛选的内容'"),
        );
        $this->smarty->assign('btnRig',$this->btnRig);
        $this->smarty->assign('btnNoRig',0);

        $this->smarty->assign('data',$data);
        $this->smarty->display('manage/yunbuy/order.html');
    }

    //订单详情
    function detail(){
        $id = intval($_GET['id']);
        $row = $this->db->get("SELECT * FROM ###_yundb WHERE id = '$id'");
        $row['yun_code'] = explode(",",$row['yun_code']);
        #商品图片
        if($row['cover']){
            $picdata = array('id'=>$row['cover']);
            $this->load->model('upload');
            $row['cover'] = $this->upload->getGalleryImgUrls($picdata,array('thumb'));
        }
        $this->smarty->assign('row',$row);
        $this->smarty->display('manage/yunbuy/detail.html');
    }

    /** 获取过滤条件
     * @return array
     */
    function getConds(){
        $where = array();

        #关键词搜索
        $array = array('k','q');
        foreach($array as $v){
            if(!isset($_GET[$v]))$_GET[$v] = '';
        }
        if(!empty($_GET['q'])){
            $where[] = "".trim($_GET['k'])." LIKE '%".addslashes($_GET['q'])."%'";
        }

        $array = array('status','type','posid');
        foreach($array as $v){
            if(!isset($_GET[$v]))$_GET[$v] = '';
        }
        if($_GET['type']!=''){
            $where[] = " `type`=".intval($_GET['type']);
        }
        if(isset($_GET['gobuy'])){
            $where[] = " `gobuy`=".intval($_GET['gobuy']);
        }else{
            $where[] = " `gobuy`=0";
        }
        if($_GET['status']!=='' && $_GET['type']!=3){
            $status_sql = $this->yunbuy->status_sql($_GET['status']);
            if($status_sql){
                $status_arr = explode('AND ',$status_sql);
                foreach($status_arr as $v){
                    if(trim($v)) $where[] = $v;
                }
            }
        }
        if($_GET['posid']){
            if($_GET['posid']==1){ $where[] = " posid=1"; }
            else{ $where[] = " posid!=1"; }
        }
        if(!empty($_REQUEST['publish']) && is_numeric($_REQUEST['publish'])){
            if($_REQUEST['publish'] == 1){
                $where[] = "y.mid<1";
            }elseif($_REQUEST['publish'] == 2){
                $where[] = "y.mid>0";
            }
        }
        if($_GET['is_show'] > 0){
            if($_GET['is_show'] == 99){
                $where[] = "y.is_show=0";
            }elseif($_GET['is_show'] == 1){
                $where[] = "y.is_show=1";
            }
        }

        $this->smarty->assign($_GET);
        return $where;
    }

    //圈子配置
    function qzConfig(){
        //获取配置
        $this->smarty->assign('config', $this->setting->value_other());

        $this->smarty->assign('btnNo', 21);
        $this->smarty->display('manage/yunbuy/qz_config.html');
    }

    /**
     * 导出Excel
     */
    function exportExcel(){
        $this->load->model('share');
        $_GET['excel'] = 1;
        $list = array();

        $data = $this->order();
        foreach($data as $k=>$v){
            //订单号信息
            $v['order_sn_info'] = "\"";
            if($v['order_no']){ $v['order_sn_info'] .= "商户订单号：".$v['order_no']."\r\n"; }
            if($v['transaction_id']){ $v['order_sn_info'] .= "支付订单号：".$v['transaction_id']."\r\n"; }
            $v['order_sn_info'] .= "\"";

            //参与人次【多期】
            $v['qty'] .= $v['qty']." [".$v['multi']."]";

            //参与时间
            $v['add_time'] = date('Y-m-d H:i:s', $v['add_time']);

            //云购状态
            $status = $this->yunbuy->status_order($v['status']);
            $v['status_name'] = isset($status['title']) ? $status['title'] : '';

            $data['list'][$k] = $v;

            $list[] = $v;
        }

        $fields = array(
            'id'=>'ID',
            'order_sn_info'=>'订单号',
            'goods_name'=>'商品名称',
            'username'=>'会员名',
            'goods_price'=>'商品总需',
            'price'=>'单次售价',
            'qty'=>'参与人次【多期】',
            'add_time'=>'参与时间',
            'status_name'=>'状态',
        );
        $this->share->SetExcelHeader($this->L['unit_yun'].'订单-'.date('Y-m-d H:i:s'),$this->L['unit_yun'].'订单');
        $this->share->SetExcelBody($fields, $list);
    }
}
