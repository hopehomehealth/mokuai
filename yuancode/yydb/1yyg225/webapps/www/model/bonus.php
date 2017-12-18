<?php/** * Class bonus_model */class bonus_model extends Lowxp_Model{    public $baseTable = '###_bonus';    public $mbTable = '###_member_bonus';    #保存管理员信息    function save(){        $post = $_POST['post'];        $id = $_POST['id'];        #初始化数据        #表单处理        if(empty($post['title'])){ return array('code'=>10001, 'message'=>"".$this->L['unit_bonus']."名称不能为空!"); }        if($post['send_type']==1){            $where = $id ? " id!=$id AND " : '';            $row = $this->db->get("SELECT id FROM ". $this->baseTable . " WHERE " . $where . "send_type=1");            if($row){ return array('code'=>10001, 'message'=>"免费".$this->L['unit_winning']."赠送类型的".$this->L['unit_bonus']."已经添加，不可添加多个!"); }        }        #保存        $where = $id ? array('id'=>(int) $id) : '';        $res = $this->db->save($this->baseTable,$post,'',$where);        if(empty($res)){ return array('code'=>10002, 'message'=>'数据操作失败!'); } //未知错误        if($id){            admin_log("编辑".$this->L['unit_bonus']."：".$post['title']);            return array('code'=>0, 'type'=>'update', 'message'=>'更新成功');        }        else{            admin_log('添加'.$this->L['unit_bonus'].'：'.$post['title']);            return array('code'=>0, 'type'=>'insert', 'message'=>'添加成功');        }    }    //发放抵用券入口（针对单个会员）    function send($options){        //post参数：bonus_id抵用券ID,number发放数量,mid用户ID        $number=(!isset($options['number'])||!intval($options['number']))?1:intval($options['number']);        $bonus_id=(isset($options['bonus_id']))?intval($options['bonus_id']):0;        $mid=(isset($options['mid']))?intval($options['mid']):0;        $desc=(isset($options['desc']))?$options['desc']:'';        $money=(isset($options['money']))?intval($options['money']):0;        $send_type = 0;        //按抵用券金额赠送        if($money>0){            $bonus_id = $this->db->getstr("SELECT id FROM ".$this->baseTable." WHERE money='$money' ORDER BY id LIMIT 1");        }        //免费夺宝中奖自动赠送        elseif(isset($options['send_type']) && $options['send_type'] == 1){            $bonus_id = $this->db->getstr("SELECT id FROM ".$this->baseTable." WHERE send_type=1 LIMIT 1");            $send_type = 1;            $number = 1;        }elseif(isset($options['send_type']) && $options['send_type']==2){        	$bonus_id = $this->db->getstr("SELECT id FROM ".$this->baseTable." WHERE send_type='".$options['send_type']."' LIMIT 1");        	$send_type = 2;        }        $bonus = $this->db->get("SELECT * FROM ".$this->baseTable." WHERE id=".$bonus_id);        if(!$bonus){ return array('code'=>10002, 'message'=>"".$this->L['unit_bonus']."不存在!"); }        $member = $this->db->get("SELECT * FROM ###_member WHERE mid=".$mid);        if(!$member){ return array('code'=>10002, 'message'=>'会员不存在!'); }        if($number>0){            for($i=0;$i<$number;$i++){                $id = $this->db->save($this->mbTable,array(                    'bonus_id'   => $bonus_id,                    'bonus_sn'   => $this->get_bonus_sn(),                    'money'      => $bonus['money'],                    'money_type' => $bonus['money_type'],                    'mid'        => $mid,                    'start_time' => time(),                    'end_time'   => ($bonus['use_day']>0)?(time()+$bonus['use_day']*3600*24):0,                    'desc'       => $desc,                ));                if($send_type==1){ return $id; }            }        }        return array('code'=>0, 'message'=>"".$this->L['unit_bonus']."生成成功!");    }    /**     * @param int $mid     * @param int $type 1获取抵用券数量 0获取要使用的抵用券     */    function getBonusUser($options=array(),$type=0){        $now = time();        $mid = $options['mid'];        $money = isset($options['money'])?intval($options['money']):1;        $sql_add1 = "";        $sql_add2 = "";        $gobuy_money = isset($options['gobuy_money'])?intval($options['gobuy_money']):0;        $sql_bonus = "SELECT id FROM ###_bonus WHERE send_type<>2";        $bonus = $this->db->select($sql_bonus);        if(!empty($bonus)){        	foreach($bonus as $k=>$v){        		if($k==0)$ids = $v['id'];        		$ids .= ",".$v['id'];        	}        	$sql_add1 = " AND bonus_id IN($ids) ";        }        if($gobuy_money){        	$sql_bonus = "SELECT id FROM ###_bonus WHERE send_type=2";        	$bonus = $this->db->select($sql_bonus);        	if(!empty($bonus)){        		foreach($bonus as $k=>$v){        			if($k==0)$ids = $v['id'];        			$ids .= ",".$v['id'];        		}        		$sql_add2 = " AND bonus_id IN($ids) ";        	}        }        $sql_public = "FROM ###_member_bonus WHERE mid='$mid' AND order_id=0 AND start_time<'$now' AND (end_time>'$now' || end_time = '')";        if($type==1){            $sql = "SELECT * ".$sql_public;            $list = $this->db->select($sql);            $array = array('count'=>count($list),'count_dis'=>0,'money'=>0);            foreach($list as $v){                if(($v['end_time'] < time()+3600*24*3)&&($v['end_time']>0)){                    $array['count_dis'] += 1;                }                $array['money'] += $v['money'];            }            return $array;        }else{            //加上满减            $full_cut = $this->full_cut($money);            $sql = "SELECT * ".$sql_public.$sql_add1." ORDER BY end_time LIMIT $money";            $list = $this->db->select($sql);                        if($sql_add2){            	//加上满减            	$full_cut = $this->full_cut($gobuy_money);            	$sql = "SELECT * ".$sql_public.$sql_add2." ORDER BY end_time LIMIT $gobuy_money";            	$gobuy_list = $this->db->select($sql);            	$list = array_merge($list,$gobuy_list);            }                        $array = array('money'=>0,'ids'=>'');            if(!empty($list)){                foreach($list as $v){                    if($money-$array['money'] < $v['money']){ continue; }                    if($full_cut['is_use_num'] && ($array['money']+$v['money'])>$full_cut['use_num']){ continue; }                    $array['money'] += $v['money'];                    $array['ids'] .= empty($array['ids'])?$v['id']:(','.$v['id']);                    $array['list'][] = $v;                }            }            return $array;        }    }    //满减处理    function full_cut($money=0){        $data['use_num'] = 0;        $data['is_use_num'] = false;        $full_cut_discount = explode('|',$this->site_config['full_cut']);        if($full_cut_discount[0] && $full_cut_discount[1]){            //可以用的抵用券数额            if($money>0){                $data['use_num'] = floor($money/$full_cut_discount[0])*$full_cut_discount[1];            }            $data['is_use_num'] = true;            $data['full_cut_0'] = $full_cut_discount[0];            $data['full_cut_1'] = $full_cut_discount[1];        }        return $data;    }    //获取抵用券赠送类别    function getSendType($type=''){        $types = array(            0=>'普通类型',            1=>'自动赠送',        		        	2=>'未中返回',        );        if($type!==''){ return $types[$type]; }        else{ return $types; }    }    //获取抵用券类型    function getMoneyType($type=''){        $types = array(            0=>"".$this->L['unit_db_points']."",        );        if($type!==''){ return $types[$type]; }        else{ return $types; }    }    //获取抵用券使用天数    function getUseDay($type=''){        $types = array(            0=>'永久有效',            1=>'一天',            7=>'一周',            15=>'半个月',            30=>'一个月',            90=>'三个月',            365=>'一年',        );        if($type!==''){ return $types[$type]; }        else{ return $types; }    }    //生成抵用券序列号    function get_bonus_sn()    {        $sn = date('Ymd').substr( implode(NULL,array_map('ord',str_split(substr(uniqid(),7,13),1))) , -8 , 8);        return $sn;    }}