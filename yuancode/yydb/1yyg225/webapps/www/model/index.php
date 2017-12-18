<?php/** * Class index_model */class index_model extends Lowxp_Model{    function __construct(){        $this->load->model('yunbuy');        $this->load->model('auction');    }    //首页-PC默认-直购模板    function index_pc_buy(& $data){        #商品推荐        $data['rec'] = $this->yunbuy->getyunbuy("gobuy=1 AND is_show=1 AND need_num>0 AND posid=1 ORDER BY buy_id DESC",5);        #最新上架        $data['new'] = $this->yunbuy->getyunbuy("gobuy=1 AND is_show=1 AND need_num>0 ORDER BY buy_id DESC",10);        #人气商品        $data['sale'] = $this->yunbuy->getyunbuy("gobuy=1 AND is_show=1 AND need_num>0 ORDER BY buy_num DESC",10);    }    //首页-PC-theme01-直购模板    function index_theme_01_buy(& $data){        #商品推荐        $data['rec'] = $this->yunbuy->getyunbuy("gobuy=1 AND is_show=1 AND need_num>0 AND posid=1 ORDER BY buy_id DESC",5);        #新品上架        $data['new'] = $this->yunbuy->getyunbuy("gobuy=1 AND is_show=1 AND need_num>0 ORDER BY buy_id DESC",8);        #获取楼层商品        $data['cat'] = $this->index_yun_floor(1);    }    //首页-PC-theme02-直购模板    function index_theme_02_buy(& $data){        #最新上架        $data['new'] = $this->yunbuy->getyunbuy("gobuy=1 AND is_show=1 AND need_num>0 ORDER BY buy_id DESC",8);        #人气商品        $data['sale'] = $this->yunbuy->getyunbuy("gobuy=1 AND is_show=1 AND need_num>0 ORDER BY buy_num DESC",8);    }    //首页-PC-theme03-直购模板    function index_theme_03_buy(& $data){        #商品推荐        $data['rec'] = $this->yunbuy->getyunbuy("gobuy=1 AND is_show=1 AND need_num>0 AND posid=1 ORDER BY buy_id DESC",5);        #新品上架        $data['new'] = $this->yunbuy->getyunbuy("gobuy=1 AND is_show=1 AND need_num>0 ORDER BY buy_id DESC",8);        #获取楼层商品        $data['cat'] = $this->index_yun_floor(1, 3);    }    //首页-移动端-直购模板    function index_mobile_buy(& $data){        #移动端分类        $this->load->model('mobilecat');        $mobileCat = $this->mobilecat->select();        $this->smarty->assign('mobileCat',$mobileCat);        #热门推荐        $data['rec'] = $this->yunbuy->getyunbuy("gobuy=1 AND is_show=1 AND need_num>0 AND posid=1 ORDER BY buy_id DESC",4);        #云购列表        $size = 4;        $this->smarty->assign('size',$size);        $orderby = isset($_GET['order'])?$_GET['order']:'listorders DESC,buy_id ';        $ordersort = isset($_GET['sort'])?$_GET['sort']:'DESC';        $list = $this->yunbuy->getyunbuy("gobuy=1 AND need_num > 0 AND is_show = 1 ORDER BY $orderby $ordersort",$size,1);        $this->smarty->assign('list',$list);        #判断是否关注        $this->subscribe();    }    //首页-移动端    function index_mobile(& $data){        #获取已揭晓        $this->smarty->assign('luck_db', $this->index_yun_end(20));        #云购列表        $size = 4;        $this->smarty->assign('size',$size);        $orderby = isset($_GET['order'])?$_GET['order']:'listorders DESC,buy_id ';        $ordersort = isset($_GET['sort'])?$_GET['sort']:'DESC';        $list = $this->yunbuy->getyunbuy("end_num > 0 AND is_show = 1 AND type=1 ORDER BY $orderby $ordersort",$size,1,"*,buy_num/need_num AS ratio");        $this->smarty->assign('list',$list);        #移动端分类        $this->load->model('mobilecat');        $mobileCat = $this->mobilecat->select();        $this->smarty->assign('mobileCat',$mobileCat);        #判断是否关注        $this->subscribe();    }    //首页-pc模板-默认    function index_pc(& $data){        #焦点图右侧夺宝推荐位        $rec_buy = $this->index_yun_rec(5, "AND posid=1");        $this->smarty->assign("recbuy", $rec_buy);        #获取已揭晓        $data['jxdb'] = $this->index_yun_end(5, array('new_buy'=>1));        #即将揭晓        $yunbuy = $this->yunbuy->getyunbuy("end_num<> 0 AND is_show = 1 ORDER BY ratio DESC,buy_id DESC",8,1,"*,buy_num/need_num AS ratio");        $yunbuy = $this->db->lJoin($yunbuy,'goods','id,price','goods_id','id','g_');        $this->smarty->assign("yunbuy",$yunbuy);        #获取最新夺宝        $newyunbuy = $this->yunbuy->getyunbuy("end_num<> 0 AND is_show = 1 AND type = 1 ORDER BY buy_id DESC",10);        $this->smarty->assign("newyunbuy",$newyunbuy);		#数码电器		$digitalyunbuysub = $this->yunbuy->getyunbuy("end_num<> 0 AND is_show = 1 AND type = 1 AND cid in (1, 21, 22, 23, 25, 34) AND home_display_order = 0 ORDER BY update_time DESC", 5);        $digitalyunbuy5 = $this->yunbuy->getyunbuy("end_num<> 0 AND is_show = 1 AND type = 1 AND cid in (1, 21, 22, 23, 25, 34) AND home_display_order = 5 ORDER BY update_time DESC", 1);		$digitalyunbuy4 = $this->yunbuy->getyunbuy("end_num<> 0 AND is_show = 1 AND type = 1 AND cid in (1, 21, 22, 23, 25, 34) AND home_display_order = 4 ORDER BY update_time DESC", 1);		$digitalyunbuy3 = $this->yunbuy->getyunbuy("end_num<> 0 AND is_show = 1 AND type = 1 AND cid in (1, 21, 22, 23, 25, 34) AND home_display_order = 3 ORDER BY update_time DESC", 1);		$digitalyunbuy2 = $this->yunbuy->getyunbuy("end_num<> 0 AND is_show = 1 AND type = 1 AND cid in (1, 21, 22, 23, 25, 34) AND home_display_order = 2 ORDER BY update_time DESC", 1);		$digitalyunbuy1 = $this->yunbuy->getyunbuy("end_num<> 0 AND is_show = 1 AND type = 1 AND cid in (1, 21, 22, 23, 25, 34) AND home_display_order = 1 ORDER BY update_time DESC", 1); 		if(empty($digitalyunbuy5)){			if($digitalyunbuysub[0]){				$digitalyunbuy5[] = array_shift($digitalyunbuysub);			}			}		if(empty($digitalyunbuy4)){			if($digitalyunbuysub[0]){				$digitalyunbuy4[] = array_shift($digitalyunbuysub);			}		}		if(empty($digitalyunbuy3)){			if($digitalyunbuysub[0]){				$digitalyunbuy3[] = array_shift($digitalyunbuysub);			}		}		if(empty($digitalyunbuy2)){			if($digitalyunbuysub[0]){				$digitalyunbuy2[] = array_shift($digitalyunbuysub);			}		}		if(empty($digitalyunbuy1)){			if($digitalyunbuysub[0]){				$digitalyunbuy1[] = array_shift($digitalyunbuysub);			}		}		$digitalyunbuy = array_merge($digitalyunbuy5, $digitalyunbuy4, $digitalyunbuy3, $digitalyunbuy2, $digitalyunbuy1);		$this->smarty->assign("digitalyunbuy",$digitalyunbuy); 				#汽车专区		$caryunbuysub = $this->yunbuy->getyunbuy("end_num<> 0 AND is_show = 1 AND type = 1 AND cid in (35, 36, 37) AND home_display_order = 0 ORDER BY update_time DESC", 5); 		$caryunbuy5 = $this->yunbuy->getyunbuy("end_num<> 0 AND is_show = 1 AND type = 1 AND cid in (35, 36, 37) AND home_display_order = 5 ORDER BY update_time DESC", 1);		$caryunbuy4 = $this->yunbuy->getyunbuy("end_num<> 0 AND is_show = 1 AND type = 1 AND cid in (35, 36, 37) AND home_display_order = 4 ORDER BY update_time DESC", 1);		$caryunbuy3 = $this->yunbuy->getyunbuy("end_num<> 0 AND is_show = 1 AND type = 1 AND cid in (35, 36, 37) AND home_display_order = 3 ORDER BY update_time DESC", 1);		$caryunbuy2 = $this->yunbuy->getyunbuy("end_num<> 0 AND is_show = 1 AND type = 1 AND cid in (35, 36, 37) AND home_display_order = 2 ORDER BY update_time DESC", 1);		$caryunbuy1 = $this->yunbuy->getyunbuy("end_num<> 0 AND is_show = 1 AND type = 1 AND cid in (35, 36, 37) AND home_display_order = 1 ORDER BY update_time DESC", 1);		if(empty($caryunbuy5)){			if($caryunbuysub[0]){				$caryunbuy5[] = array_shift($caryunbuysub);			}		}		if(empty($caryunbuy4)){			if($caryunbuysub[0]){				$caryunbuy4[] = array_shift($caryunbuysub);			}		}		if(empty($caryunbuy3)){			if($caryunbuysub[0]){				$caryunbuy3[] = array_shift($caryunbuysub);			}		}		if(empty($caryunbuy2)){			if($caryunbuysub[0]){				$caryunbuy2[] = array_shift($caryunbuysub);			}		}		if(empty($caryunbuy1)){			if($caryunbuysub[0]){				$caryunbuy1[] = array_shift($caryunbuysub);			}		}		$caryunbuy = array_merge($caryunbuy5, $caryunbuy4, $caryunbuy3, $caryunbuy2, $caryunbuy1);		$this->smarty->assign("caryunbuy",$caryunbuy);            				#时尚潮流		$fashionyunbuysub = $this->yunbuy->getyunbuy("end_num<> 0 AND is_show = 1 AND type = 1 AND cid in (4,26,27,28) AND home_display_order = 0 ORDER BY update_time DESC", 5); 		$fashionyunbuy5 = $this->yunbuy->getyunbuy("end_num<> 0 AND is_show = 1 AND type = 1 AND cid in (4,26,27,28) AND home_display_order = 5 ORDER BY update_time DESC", 1);		$fashionyunbuy4 = $this->yunbuy->getyunbuy("end_num<> 0 AND is_show = 1 AND type = 1 AND cid in (4,26,27,28) AND home_display_order = 4 ORDER BY update_time DESC", 1);		$fashionyunbuy3 = $this->yunbuy->getyunbuy("end_num<> 0 AND is_show = 1 AND type = 1 AND cid in (4,26,27,28) AND home_display_order = 3 ORDER BY update_time DESC", 1);		$fashionyunbuy2 = $this->yunbuy->getyunbuy("end_num<> 0 AND is_show = 1 AND type = 1 AND cid in (4,26,27,28) AND home_display_order = 2 ORDER BY update_time DESC", 1);		$fashionyunbuy1 = $this->yunbuy->getyunbuy("end_num<> 0 AND is_show = 1 AND type = 1 AND cid in (4,26,27,28) AND home_display_order = 1 ORDER BY update_time DESC", 1);		if(empty($fashionyunbuy5)){			if($fashionyunbuysub[0]){				$fashionyunbuy5[] = array_shift($fashionyunbuysub);			}		}		if(empty($fashionyunbuy4)){			if($fashionyunbuysub[0]){				$fashionyunbuy4[] = array_shift($fashionyunbuysub);			}		}		if(empty($fashionyunbuy3)){			if($fashionyunbuysub[0]){				$fashionyunbuy3[] = array_shift($fashionyunbuysub);			}		}		if(empty($fashionyunbuy2)){			if($fashionyunbuysub[0]){				$fashionyunbuy2[] = array_shift($fashionyunbuysub);			}		}		if(empty($fashionyunbuy1)){			if($fashionyunbuysub[0]){				$fashionyunbuy1[] = array_shift($fashionyunbuysub);			}		}		$fashionyunbuy = array_merge($fashionyunbuy5, $fashionyunbuy4, $fashionyunbuy3, $fashionyunbuy2, $fashionyunbuy1);		$this->smarty->assign("fashionyunbuy",$fashionyunbuy);				#生活超市		$lifeyunbuysub = $this->yunbuy->getyunbuy("end_num<> 0 AND is_show = 1 AND type = 1 AND cid in (3, 29, 30, 31) AND home_display_order = 0 ORDER BY update_time DESC", 5); 		$lifeyunbuy5 = $this->yunbuy->getyunbuy("end_num<> 0 AND is_show = 1 AND type = 1 AND cid in (3, 29, 30, 31) AND home_display_order = 5 ORDER BY update_time DESC", 1);		$lifeyunbuy4 = $this->yunbuy->getyunbuy("end_num<> 0 AND is_show = 1 AND type = 1 AND cid in (3, 29, 30, 31) AND home_display_order = 4 ORDER BY update_time DESC", 1);		$lifeyunbuy3 = $this->yunbuy->getyunbuy("end_num<> 0 AND is_show = 1 AND type = 1 AND cid in (3, 29, 30, 31) AND home_display_order = 3 ORDER BY update_time DESC", 1);		$lifeyunbuy2 = $this->yunbuy->getyunbuy("end_num<> 0 AND is_show = 1 AND type = 1 AND cid in (3, 29, 30, 31) AND home_display_order = 2 ORDER BY update_time DESC", 1);		$lifeyunbuy1 = $this->yunbuy->getyunbuy("end_num<> 0 AND is_show = 1 AND type = 1 AND cid in (3, 29, 30, 31) AND home_display_order = 1 ORDER BY update_time DESC", 1);		if(empty($lifeyunbuy5)){			if($lifeyunbuysub[0]){				$lifeyunbuy5[] = array_shift($lifeyunbuysub);			}		}		if(empty($lifeyunbuy4)){			if($lifeyunbuysub[0]){				$lifeyunbuy4[] = array_shift($lifeyunbuysub);			}		}		if(empty($lifeyunbuy3)){			if($lifeyunbuysub[0]){				$lifeyunbuy3[] = array_shift($lifeyunbuysub);			}		}		if(empty($lifeyunbuy2)){			if($lifeyunbuysub[0]){				$lifeyunbuy2[] = array_shift($lifeyunbuysub);			}		}		if(empty($lifeyunbuy1)){			if($lifeyunbuysub[0]){				$lifeyunbuy1[] = array_shift($lifeyunbuysub);			}		}		$lifeyunbuy = array_merge($lifeyunbuy5, $lifeyunbuy4, $lifeyunbuy3, $lifeyunbuy2, $lifeyunbuy1);		$this->smarty->assign("lifeyunbuy",$lifeyunbuy);       				#户外运动		$outdooryunbuysub = $this->yunbuy->getyunbuy("end_num<> 0 AND is_show = 1 AND type = 1 AND cid in (2, 32) AND home_display_order = 0 ORDER BY update_time DESC", 5); 		$outdooryunbuy5 = $this->yunbuy->getyunbuy("end_num<> 0 AND is_show = 1 AND type = 1 AND cid in (2, 32) AND home_display_order = 5 ORDER BY update_time DESC", 1);		$outdooryunbuy4 = $this->yunbuy->getyunbuy("end_num<> 0 AND is_show = 1 AND type = 1 AND cid in (2, 32) AND home_display_order = 4 ORDER BY update_time DESC", 1);		$outdooryunbuy3 = $this->yunbuy->getyunbuy("end_num<> 0 AND is_show = 1 AND type = 1 AND cid in (2, 32) AND home_display_order = 3 ORDER BY update_time DESC", 1);		$outdooryunbuy2 = $this->yunbuy->getyunbuy("end_num<> 0 AND is_show = 1 AND type = 1 AND cid in (2, 32) AND home_display_order = 2 ORDER BY update_time DESC", 1);		$outdooryunbuy1 = $this->yunbuy->getyunbuy("end_num<> 0 AND is_show = 1 AND type = 1 AND cid in (2, 32) AND home_display_order = 1 ORDER BY update_time DESC", 1);		if(empty($outdooryunbuy5)){			if($outdooryunbuysub[0]){				$outdooryunbuy5[] = array_shift($outdooryunbuysub);			}		}		if(empty($outdooryunbuy4)){			if($outdooryunbuysub[0]){				$outdooryunbuy4[] = array_shift($outdooryunbuysub);			}		}		if(empty($outdooryunbuy3)){			if($outdooryunbuysub[0]){				$outdooryunbuy3[] = array_shift($outdooryunbuysub);			}		}		if(empty($outdooryunbuy2)){			if($outdooryunbuysub[0]){				$outdooryunbuy2[] = array_shift($outdooryunbuysub);			}		}		if(empty($outdooryunbuy1)){			if($outdooryunbuysub[0]){				$outdooryunbuy1[] = array_shift($outdooryunbuysub);			}		}		$outdooryunbuy = array_merge($outdooryunbuy5, $outdooryunbuy4, $outdooryunbuy3, $outdooryunbuy2, $outdooryunbuy1);		$this->smarty->assign("outdooryunbuy",$outdooryunbuy); 				#充值卡类		$cardyunbuysub = $this->yunbuy->getyunbuy("end_num<> 0 AND is_show = 1 AND type = 1 AND cid in (8, 33) AND home_display_order = 0 ORDER BY update_time DESC", 5); 		$cardyunbuy5 = $this->yunbuy->getyunbuy("end_num<> 0 AND is_show = 1 AND type = 1 AND cid in (8, 33) AND home_display_order = 5 ORDER BY update_time DESC", 1);		$cardyunbuy4 = $this->yunbuy->getyunbuy("end_num<> 0 AND is_show = 1 AND type = 1 AND cid in (8, 33) AND home_display_order = 4 ORDER BY update_time DESC", 1);		$cardyunbuy3 = $this->yunbuy->getyunbuy("end_num<> 0 AND is_show = 1 AND type = 1 AND cid in (8, 33) AND home_display_order = 3 ORDER BY update_time DESC", 1);		$cardyunbuy2 = $this->yunbuy->getyunbuy("end_num<> 0 AND is_show = 1 AND type = 1 AND cid in (8, 33) AND home_display_order = 2 ORDER BY update_time DESC", 1);		$cardyunbuy1 = $this->yunbuy->getyunbuy("end_num<> 0 AND is_show = 1 AND type = 1 AND cid in (8, 33) AND home_display_order = 1 ORDER BY update_time DESC", 1);		if(empty($cardyunbuy5)){			if($cardyunbuysub[0]){				$cardyunbuy5[] = array_shift($cardyunbuysub);			}		}		if(empty($cardyunbuy4)){			if($cardyunbuysub[0]){				$cardyunbuy4[] = array_shift($cardyunbuysub);			}		}		if(empty($cardyunbuy3)){			if($cardyunbuysub[0]){				$cardyunbuy3[] = array_shift($cardyunbuysub);			}		}		if(empty($cardyunbuy2)){			if($cardyunbuysub[0]){				$cardyunbuy2[] = array_shift($cardyunbuysub);			}		}		if(empty($cardyunbuy1)){			if($cardyunbuysub[0]){				$cardyunbuy1[] = array_shift($cardyunbuysub);			}		}		$cardyunbuy = array_merge($cardyunbuy5, $cardyunbuy4, $cardyunbuy3, $cardyunbuy2, $cardyunbuy1);		$this->smarty->assign("cardyunbuy",$cardyunbuy);		#狗屎运        $luck_db = $this->yunbuy->getyunDb("AND d.status <> 1 ORDER BY d.id DESC",18,1);        $this->smarty->assign('luck_db',$luck_db);        #晒单记录        $share = $this->yunbuy->getShare("s.is_show>0 AND s.mid<>0 ORDER BY id DESC",12);        $this->smarty->assign('share',$share);        #竞拍数据        if(IsAuction){            #获取开奖列表            $sql = "SELECT cod,addtime FROM ###_cod ORDER BY id DESC LIMIT 3";            $res = $this->db->select($sql);            foreach($res as $k=>$v){                $a = substr($v['cod'],0,4);                $v['cod'] = str_replace($a,$a.'.',$v['cod']);                if($k==0){                    $data['cod'] = $v;                }else{                    $data['codlist'][] = $v;                }            }            #获取8个竞拍推荐商品            $data['indexAuction'] = $this->auction->getList(8,1,0,UNDER_WAY);            #获取最近的一个即将开始竞拍商品的开始时间            $sql = "SELECT start_time FROM ###_goods_activity WHERE act_type=0 AND " . $this->auction->status_sql(PRE_START) . " ORDER BY start_time ASC LIMIT 1";            $data['pre_start_time'] = $this->db->getstr($sql);            $data['pre_start_time'] = $data['pre_start_time'] - time();            #最新参拍记录            $size = 15;            $data['log'] = $this->auction->logList($size,1,0,0,AllWIN,array(                'fields' => 'g.title,g.ext_info,m.photo,m.nickname'            ));        }    }    //首页-pc模板-theme_01    function index_theme_01(& $data){        #焦点图右侧夺宝推荐位        $rec_buy = $this->index_yun_rec(5, "AND posid=1");        $this->smarty->assign("recbuy", $rec_buy);        #获取已揭晓        $data['jxdb'] = $this->index_yun_end(7);        #晒单记录        $share = $this->yunbuy->getShare("s.is_show>0 AND s.mid<>0 ORDER BY id DESC",12);        $this->smarty->assign('share',$share);        #新品上架        $newyunbuy = $this->yunbuy->getyunbuy("end_num<> 0 AND is_show = 1 ORDER BY buy_id DESC",8);        $this->smarty->assign("newyunbuy",$newyunbuy);        #获取楼层商品        $this->smarty->assign('yuncat', $this->index_yun_floor());    }    //首页-pc模板-theme_02    function index_theme_02(& $data){        #获取已揭晓        $data['jxdb'] = $this->index_yun_end(7);        #晒单记录        $share = $this->yunbuy->getShare("s.is_show>0 AND s.mid<>0 ORDER BY id DESC",12);        $this->smarty->assign('share',$share);        #狗屁运        $luck_db = $this->yunbuy->getyunDb("AND d.status<>1 ORDER BY d.id DESC",18,1);        $this->smarty->assign('luck_db',$luck_db);        #热门推荐        $yun_hot = $this->index_yun_rec(8, "", "posid DESC,");        $this->smarty->assign("yun_hot", $yun_hot);        #即将揭晓        $yun_end = $this->yunbuy->getyunbuy("end_num<>0 AND is_show=1 ORDER BY ratio DESC,buy_id DESC",4,1,"*,buy_num/need_num AS ratio");        $yun_end = $this->db->lJoin($yun_end,'goods','id,price','goods_id','id','g_');        $this->smarty->assign("yun_end",$yun_end);        #新品上架        $yun_new = $this->yunbuy->getyunbuy("end_num<>0 AND is_show=1 ORDER BY buy_id DESC",4);        $this->smarty->assign("yun_new",$yun_new);        #直购专区        $yun_go_sale = $this->yunbuy->getyunbuy("gobuy=1 AND is_show=1 AND need_num>0 ORDER BY buy_num DESC",4);        $this->smarty->assign("yun_go_sale",$yun_go_sale);        #晒单记录 精华 普通        $share_rec = $this->yunbuy->getShare("s.is_show>0 AND s.mid<>0 ORDER BY is_rec DESC,id DESC",1);        if($share_rec){            $share_pub = $this->yunbuy->getShare("s.is_show>0 AND s.mid<>0 AND s.id!='".$share_rec[0]['id']."' ORDER BY id DESC",6);            $this->smarty->assign('share_rec',$share_rec);            $this->smarty->assign('share_pub',$share_pub);        }    }    //获取已揭晓商品    function index_yun_end($limit = 7, $option = array()){        $option['new_buy'] = isset($option['new_buy']) ? $option['new_buy'] : 0; //获取下一期        $sql = "SELECT * FROM ###_yunbuy where luck_code>0 and is_show=1 and gobuy!=1 order by end_time DESC,buy_id DESC LIMIT " . $limit;        $list = $this->db->select($sql);        $list = $this->db->lJoin($list,'yundb','ip,qty,buy_id,goods_name','buy_id','buy_id','',array('status'=>3));        $list = $this->db->lJoin($list,'goods','id,price','goods_id','id','g_');        $list = $this->db->lJoin($list,'member','mid,username,nickname,photo','member_id','mid');        if($list){            $this->load->model('yunbuy');            foreach($list as $k=>$v){                if($option['new_buy']){                    $new_buy = $this->db->get("SELECT buy_id,qishu FROM ###_yunbuy WHERE sid = '".$v['sid']."' and is_show=1 and gobuy=0 ORDER BY  buy_id DESC");                    if($new_buy['qishu'] > $v['qishu']){                        $v['new_buy'] = $new_buy;                    }                }                $this->yunbuy->getYunUrl($v);                $v = $this->yunbuy->getThumb($v);                $count_qty = $this->db->getStr("SELECT SUM(qty) FROM ###_yundb WHERE mid=$v[mid] AND buy_id=$v[buy_id] AND status>1");                $list[$k] = $v;                $list[$k]['qty'] = $count_qty;            }        }        return $list;    }    //首页-pc模板-theme_03    function index_theme_03(& $data){        #焦点图右侧夺宝推荐位        $rec_buy = $this->index_yun_rec(5, "AND posid=1");        $this->smarty->assign("recbuy", $rec_buy);        #获取已揭晓        $data['jxdb'] = $this->index_yun_end(7);        #狗屎运        $luck_db = $this->yunbuy->getyunDb("AND d.status <> 1 ORDER BY d.id DESC",15,1);        $this->smarty->assign('luck_db',$luck_db);        #晒单记录        $share = $this->yunbuy->getShare("s.is_show>0 AND s.mid<>0 ORDER BY id DESC",12);        $this->smarty->assign('share',$share);        #热门商品        $yun_hot = $this->yunbuy->getyunbuy("end_num<>0 AND is_show=1 ORDER BY ratio DESC,buy_id DESC",5,1,"*,buy_num/need_num AS ratio");        $this->smarty->assign("yun_hot",$yun_hot);        #获取楼层商品        $this->smarty->assign('yuncat', $this->index_yun_floor(0, 3));    }    //获取推荐云购商品    function index_yun_rec($limit = 5, $where = '', $order = ''){        $list = $this->yunbuy->getyunbuy("end_num<>0 AND is_show=1 $where ORDER BY $order buy_id DESC", $limit);        $list = $this->db->lJoin($list,'goods','id,price','goods_id','id','g_');        return $list;    }    /** 获取楼层商品     * @param int $type 0云购 1直购     * @return mixed     */    function index_yun_floor($type = 0, $num = 5){        #获取楼层商品        $this->load->model('yuncat');        $list = $this->yuncat->select();        if($list){            foreach($list as $k=>$v){                if($type == 1){                    $v['list'] = $this->yunbuy->getyunbuy("gobuy=1 AND is_show=1 AND need_num>0 AND cid".$this->yuncat->condArrchild($v['id'])." ORDER BY buy_num DESC",$num,1);                }else{                    $v['list'] = $this->yunbuy->getyunbuy("end_num<>0 AND is_show=1 AND cid".$this->yuncat->condArrchild($v['id'])." ORDER BY listorders DESC,ratio DESC,buy_id DESC",$num,1,"*,buy_num/need_num AS ratio");                }                $list[$k] = $v;                //$this->yunbuy->getyunbuy("gobuy=1 AND is_show=1 AND need_num>0 ORDER BY buy_id DESC",10);            }        }        return $list;    }    //微信关注判断    function subscribe(){        $subscribe = 1; //0已关注 1未关注        if($this->is_wechat){            if(isset($_SESSION['mid'])){                $this->load->model('member');                $member_info = $this->member->member_info($_SESSION['mid'],'mid,subscribe_time,openid');            }            //获取OPENID            $openid = $member_info ? $member_info['openid'] : '';            if(empty($openid) && !empty($_SESSION['oauth']['openid'])){                $openid = $_SESSION['oauth']['openid'];            }            if($openid){                if($member_info && !empty($member_info['subscribe_time'])){                    $subscribe = 0;                }else{                    //未关注进行关注验证                    $this->load->model('wxapi');                    $user_info = $this->wxapi->userInfo($openid);                    if($user_info['subscribe']){                        $subscribe = 0;                        if($member_info && empty($member_info['subscribe_time'])){                            $this->db->update('member',array('subscribe_time' => time()),array('mid'=>$member_info['mid']));                        }                    }                }            }            $this->smarty->assign("subscribe", $subscribe);        }    }}
