<?php

/**
 * 商品购物类
 * Class mall_model
 */
class mall_model extends Lowxp_Model{


    /**
     * 根据购物车的商品ID,获取购物车商品列表.
     * @param $mid
     * @param $cartids
     * @return array|mixed
     */
    function getCartListByIds($mid, $cartids){
        return $this->getCartList($mid,array(
            'cart_ids'=>$cartids
        ));
    }

    /**
     * 获取购物车商品列表
     */
    function getCartList($mid, $params = array('has_pic'=>true)){
        $conds = ' WHERE mid='.$mid;
        if(!empty($params['cart_ids'])){
            $conds.= " AND id IN(".$params['cart_ids'].")";
        }

        $items = $this->db->select("SELECT * FROM shoping_cart ".$conds);

        if(count($items)==0)return $items;

        $items = $this->db->lJoin($items,'goods','id,`name`,`desc`,cover,price,real_price','good_id','id','good_');

        //获取商品对应规格的价格
        foreach($items as $k=>$val){
            $gitem = $this->db->get("SELECT * FROM goods_item WHERE goods_id=".$val['good_id']." AND spec='".$val['spec']."'");

            if(isset($gitem['id'])){
                $items[$k]['good_real_price'] = $gitem['price'];#覆盖最新价格.
                $items[$k]['sp_stock'] = $gitem['stock'];
                $items[$k]['sp_serial'] = $gitem['serial'];
            }
        }

        if(isset($params['has_pic'])){
            $this->load->model('upload');
            $items = $this->upload->getImgUrls($items,'good_cover','goods',array('thumb'));
        }

        //计算团折优惠价.
        $items = $this->setGroupPrefPrice($items);
        $items = $this->setCheapPrice($items);
        $items = $this->setPromoSalePrice($items);

        return $items;
    }

    function getTotalPrice($items){
        $totalPrice = 0;
        foreach($items as $v){
            $totalPrice+= isset($v['sp_price'])
                ? $v['sp_price'] * $v['buy_num']
                : $v['good_real_price']*$v['buy_num'];
        }
        return $totalPrice;
    }

    /**
     * 设置沃销推广价
     * @param $items
     */
    function setPromoSalePrice($items){

        $memSaleIds = array();
        foreach($items as $val){
            if($val['from']=='sale'){
                $memSaleIds[] = $val['from_id'];
            }
        }

        if(count($memSaleIds)){
            $rows = $this->db->select("SELECT * FROM member_promo_sale WHERE id IN(".implode(',',$memSaleIds).")");
            $saleDiscount = array_column($rows,'scheme','id');

            foreach($saleDiscount as $k=>$v){
                $scheme = json_decode($v,true);
                $saleDiscount[$k] = floatval($scheme['discount']);
            }

            foreach($items as $k=>$v){

                if($v['from']=='sale' && isset($saleDiscount[$v['from_id']])){
                    $items[$k]['good_real_price'] = $v['good_real_price'] - $saleDiscount[$v['from_id']];
                    $items[$k]['sale_discount'] = $saleDiscount[$v['from_id']];
                }
            }
        }

        #echo '<pre>';print_r($items);echo '</pre>';
        return $items;
    }

    /**
     * 设置团折优惠价.不影响正常购物流程价格.
     */
    function setGroupPrefPrice($items){
        $groups = array();
        foreach($items as $val){
            if($val['from']=='group'){
                if(!isset($groups[$val['from_id']]['buy_num']))$groups[$val['from_id']]['buy_num'] = 0;
                $groups[$val['from_id']]['buy_num']+= $val['buy_num'];
            }
        }

        $groupPrefPrice = array();
        foreach($groups as $from_id => $val){
            $buyNum = $val['buy_num'];
            $promoGroup = $this->db->get("SELECT * FROM goods_promo_group WHERE id=".$from_id);
            if(!isset($promoGroup['id']))continue;

            $discount = json_decode($promoGroup['discount'],true);

            $prefPrice = 0;#优惠价格.
            if($buyNum>4 && $buyNum<10){
                $prefPrice = $discount['5-9'];
            }elseif($buyNum>9 && $buyNum<20){
                $prefPrice = $discount['10-19'];
            }elseif($buyNum>19){
                $prefPrice = $discount['20-infinity'];
            }
            $groupPrefPrice[$from_id] = $prefPrice;//团折优惠价.
        }

        #echo '<pre>';print_r($items);echo '</pre>';

        foreach($items as $k=>$val){
            if($val['from']=='group'){
                if(isset($groupPrefPrice[$val['from_id']])){
                    #$items
                    $items[$k]['good_real_price']-= $groupPrefPrice[$val['from_id']];
                    $items[$k]['group_pref_price'] = $groupPrefPrice[$val['from_id']];
                }
            }
        }


        return $items;
    }


    /**
     * 设置超级特惠价格.
     */
    function setCheapPrice($items){
        $cheapIds = array();
        foreach($items as $val){
            if($val['from']=='cheap'){
                $cheapIds[$val['from_id']] = $val['from_id'];
            }
        }

        if(count($cheapIds)){
            $rows = $this->db->select("SELECT * FROM goods_cheap WHERE id IN(".implode(',',$cheapIds).")");
            $cheapPrice = array_column($rows,'price','id');
            foreach($items as $k=>$val){
                if($val['from']=='cheap'){
                    if(isset($cheapPrice[$val['from_id']])){
                        $items[$k]['good_real_price'] = $cheapPrice[$val['from_id']];
                        $items[$k]['goods_cheap_price'] = $cheapPrice[$val['from_id']];
                    }
                }
            }
        }

        return $items;
    }




    function checkCoupon(){

    }
    function checkCredit(){

    }

    /**
     * 使用优惠券
     * @param $mid
     * @param $totalPrice
     * @return mixed
     */
    function useCoupon($mid, $totalPrice){

        if(empty($_POST['coupon']))return $totalPrice;

        $couponArr = explode('|',$_POST['coupon']);
        $member_coupon_id = $couponArr[0];

        $userCoupon = $this->db->get("SELECT id,coupon_id FROM member_coupon WHERE mid=".$mid." AND id=".$member_coupon_id." AND status=0");
        $coupon = $this->db->get("SELECT id,exchange_money FROM coupon WHERE id=".$userCoupon['coupon_id']." AND end_time>".RUN_TIME);

        $exchangeMoney = $coupon['exchange_money'];
        $totalPrice -= $exchangeMoney;

        $this->db->update('member_coupon',array(
            'order_time'=>RUN_TIME,
            'status'=>'1'#使用中,等付款的时候改为状态2(已使用)
        ),array('id'=>$userCoupon['id']));

        return $totalPrice;
    }


    /**
     * 使用积分,用于下订单的时候提交.
     * @param $mid
     * @param $totalPrice
     * @param $order_id
     * @return mixed
     */
    function useCredit($mid,$totalPrice,$order_id){
        if(!empty($_POST['use_credit']) && is_numeric($_POST['use_credit'])){
            #使用的积分。
            $credit = intval($_POST['use_credit']);
            $this->load->model('config');
            $useRatio = $this->config->get('credit_money_ratio');
            $minusPrice = $credit * $useRatio;
            //使用积分,抵用多少元.

            $totalPrice-= $minusPrice;

            $this->db->insert('member_credit_log',array(
                'flag'=>'3',
                'amount'=>$credit,
                'order_id'=>$order_id,
                'note'=>'订单中使用积分',
                'c_time'=>RUN_TIME
            ));

            $this->db->update('member','credit=credit-'.$credit,array('mid'=>$mid));
        }
        //扣除使用的积分
        return $totalPrice;
    }



    /**
     * 计算获得积分
     * 判断是不是超级会员,
     * 是超级会员,获得积分比例为1.5倍,消费超过2000元,获得的积分比例为1.8倍.
     */
    function statisticPoint($mid,$totalPrice){
        $member = $this->db->get("SELECT mid,xvip FROM member WHERE mid=".$mid);

        if(!isset($member['mid']))die('会员不存在!');
        $this->load->model('config');
        $ratio = $this->config->get('credit_ratio');
        $totalPoint = $totalPrice * $ratio;

        if($member['xvip']==1){
            if($totalPrice > 2000){
                $xvipRatio = $this->config->get('xvip_credit_ratio_2000');#大于两千消费额时,赠送积分比例.
                $totalPoint = $totalPoint * $xvipRatio;
            }else{
                $xvipRatio = $this->config->get('xvip_credit_ratio_default');#小于两千积分卡.
                $totalPoint = $totalPoint * $xvipRatio;
            }
        }

        return floor($totalPoint);

    }

    /**
     * 根据产品规格获取产品的名称.
     * @param $goods_id
     * @param string $spec
     * @return string
     */
    function getSpecNames($goods_id, $spec = ''){
        static $goodList;
        if(!isset($goodList[$goods_id])){
            $goods = $this->db->get("SELECT * FROM goods WHERE id=".$goods_id);
            $goodList[$goods_id] = $goods;
        }
        $Goods = $goodList[$goods_id];
        $sp_val = json_decode($Goods['sp_val'],true);
        $specItems = array();

        static $specList;
        if(is_null($specList)){
            $specs = $this->db->select("SELECT id,name FROM goods_spec");
            $specList = array_column($specs,'name','id');
        }

        foreach($sp_val as $sp_id=>$vals){
            foreach($vals as $spItemId=>$v){
                $specItems[$spItemId] = array(
                    'name'=>$v,'parent'=>$specList[$sp_id]
                );
            }
        }

        $curr_specs = explode('-',$spec);
        $goods_spec = array();
        foreach($curr_specs as $item_id){
            if(isset($specItems[$item_id])){
                $goods_spec[] = $specItems[$item_id]['parent'].':'.$specItems[$item_id]['name'];
            }
        }

        return implode(',',$goods_spec);
    }


}