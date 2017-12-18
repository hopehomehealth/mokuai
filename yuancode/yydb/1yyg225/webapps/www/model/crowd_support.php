<?php

/**
 * ZZCMS goodscat_model
 * ============================================================================
 * * 版权所有 2014-2016 厦门紫竹数码科技有限公司，并保留所有权利。
 * 网站地址: http://www.lnest.com；
 * ----------------------------------------------------------------------------
 * 这不是一个自由软件！您只能在不用于商业目的的前提下对程序代码进行修改和
 * 使用；不允许对程序代码以任何形式任何目的的再发布。
 */

/**
 * 支持流程模型
 */
class crowd_support_model extends Lowxp_Model {

    /**
     * 构造函数
     */
    public function __construct() {
        
    }

    /**
     * 读取众筹回报记录
     * 
     * @param int $returnId 回报ID
     * @return null | array
     */
    public function getReturnById($returnId) {
        $sql = 'SELECT r.rt_name,r.rt_id,r.price,r.rt_desc,r.is_address,r.draw_num,c.cd_name,c.cd_id,c.mid,c.status,r.end_num,r.limit_num,r.crowd_total,r.rt_desc'
                . ' FROM ###_crowd_return AS r,###_crowd AS c '
                . ' WHERE r.rt_id = \'' . $returnId . '\' '
                . ' AND r.cd_id = c.cd_id'
                . ' AND c.status = 2';
        return $this->db->get($sql);
    }

    /**
     * 读取当前会员保存的地址
     * 
     * @param int $memberId 会员ID
     * @param int $addressId 地址ID
     * @return  null | array
     */
    public function getMemberAddressById($memberId, $addressId = 0) {
        if ($addressId) {
            $address = ' AND id = \'' . $addressId . '\' ';
        }
        $sql = 'SELECT * '
                . ' FROM `###_member_address` '
                . ' WHERE `mid` = \'' . $memberId . '\' '
                . $address
                . 'ORDER BY is_default DESC';
        return $this->db->select($sql);
    }

    /**
     * 生成订单号
     * 
     * @return string
     */
    public function getSupportSn() {
        return date('YmdHis') . substr(implode(null, array_map('ord', str_split(substr(uniqid(md5(microtime(true)), true), 7, 13), 1))), 0, 8);
    }

    /**
     * 读取支持表记录
     * @param int $supportSn 支持表订单
     * @param int $memberId 会员ID
     * @param string $select 查询字段
     * @return  null | array
     */
    public function getSupportBySnAndMemberId($supportSn, $memberId, $select = '*') {
        $sql = 'SELECT  ' . $select
                . ' FROM ###_crowd_return AS r,###_crowd AS c,###_crowd_support AS s '
                . ' WHERE `support_sn` = \'' . $supportSn . '\' '
                . ' AND s.member_id =  \'' . $memberId . '\' '
                . ' AND r.cd_id = c.cd_id '
                . ' AND s.crowd_id = c.cd_id '
                . ' AND s.return_id = r.rt_id '
                . ' AND c.status = 2 ';
        return $this->db->get($sql);
    }

    /**
     * 读取支持表记录
     * @param int $supportId 支持表ID
     * @param string $select 查询字段
     * @return  null | array
     */
    public function getSupportBySupportId($supportId, $select = 'c.support_num AS crowd_support_num,c.*,r.*,s.*') {
        $sql = 'SELECT  ' . $select
                . ' FROM ###_crowd_return AS r,###_crowd AS c,###_crowd_support AS s '
                . ' WHERE `support_id` = \'' . $supportId . '\' '
                . ' AND r.cd_id = c.cd_id '
                . ' AND s.crowd_id = c.cd_id '
                . ' AND s.return_id = r.rt_id '
                . ' AND c.status = 2 ';
        return $this->db->get($sql);
    }

    /**
     * 更新支持支付状态
     * 
     * @param int $supportId 订单ID
     * @return int
     *  0 订单成功
     * -1 更新操作失败
     * -2 支持名额已满
     * -3 支持不存在
     */
    public function orderSupport($supportId) {
        $support = $this->getSupportBySupportId($supportId);

        if (empty($support)) {
            return -3;
        }
        $support_amount = $support['support_amount'];

        //更新回报总额，剩余人数，总人数等。
        $updateStatus = false;

        //如果更新失败，排队重新更新
        if ($support['limit_num'] > 0) {
            //剩余人数为0时跳出
            while (!$updateStatus && $support['end_num'] != 0) {
                $updateStatus = $this->updateSupport($support);
                $support = $this->getSupportBySupportId($supportId);
            }

            //排队失败，退款
            if (!$updateStatus) {
                //会员退款
                $this->crowdRefund($support['member_id'], $support);

                //限额已满，订单失败，
                $data = array('support_status' => 3, 'pay_time' => RUN_TIME);
                return $this->db->update('crowd_support', $data, array('support_id' => $supportId)) ? 0 : -1;
            }
        } else {
            $i = 0;
            $j = 50; //防止服务出现错误，限定循环次数
            //不限制人数，强制插入。
            while (!$updateStatus) {
                $updateStatus = $this->updateSupport($support);
                $support = $this->getSupportBySupportId($supportId);

                if ($i == $j && !$updateStatus) {
                    return -1;
                }
                $i++;
            }
        }
        //更新众筹项目支持人数与金额
        $this->db->update('crowd',"cd_total = cd_total+$support_amount,support_num = support_num+1","cd_id = '$support[cd_id]'");

        //发放开奖号码
        if ($support['draw_num'] > 0) {
            //发放开奖号码，更新支付状态
            return $this->updateSupportLotteryNumber($supportId, $support['rt_id']) ? 0 : -1;
        } else {
            //支付成功，更新付款状态
            $data = array('support_status' => 2, 'pay_time' => RUN_TIME);
            return $this->db->update('crowd_support', $data, array('support_id' => $supportId)) ? 0 : -1;
        }
    }

    /**
     * 众筹支持退款
     * 
     * @param int $memberId 会员ID
     * @param array $support 支持相关信息
     * @return bool
     */
    public function crowdRefund($memberId, $support) {
        $insert = array();
        $insert['mid'] = $memberId;
        $insert['desc'] = "众筹回报已满，退款，众筹名称 " . $support['cd_name'] . '，回报名称 ' . $support['rt_name'];
        $insert['user_money'] = $support['support_amount'];
        return $this->member->accountlog('support', $insert);
    }

    /**
     * 更新总额/人数/剩余人数
     * 
     * @param array $support 支持表单条数据
     * @return bool | array
     */
    public function updateSupport($support) {
        if (!is_array($support)) {
            return false;
        }

        //总额增加/人数增加
        $data = array('crowd_total' => $support['crowd_total'] + $support['support_amount'], 'support_num' => $support['support_num'] + 1);

        //乐观锁，判断当前读取的总人数是否有变化
        $where = array('rt_id' => $support['return_id'], 'support_num' => $support['support_num']);

        //回报限制人数
        if ($support['limit_num'] > 0 && $support['end_num'] >= 1) {
            //剩余人数减少
            $data = array_merge($data, array('end_num' => $support['end_num'] - 1));
            //乐观锁，增加剩余人数判断
            $where = array_merge($where, array('end_num' => $support['end_num']));
        }

        return $this->db->update("###_crowd_return", $data, $where);
    }

    /**
     * 发放开奖号码
     * 
     * @param int $supportId 支持ID 
     * @param int $returnId 回报ID 
     * @return type
     */
    public function updateSupportLotteryNumber($supportId, $returnId) {
        $sql = 'UPDATE ' . $this->db->pre_table('###_crowd_support') . ' a '
                . 'SET a.pay_time = \'' . RUN_TIME . '\' ,'
                . 'a.support_status = 2 , '
                . 'a.support_lottery_number = ( '
                . '  SELECT * '
                . '  FROM ( '
                . '    SELECT '
                . '    IF ( b.support_lottery_number = 0 OR ISNULL(b.support_lottery_number), ' . CROWD_LOTTERY . ', b.support_lottery_number + 1 ) '
                . '    FROM ' . $this->db->pre_table('###_crowd_support') . ' b'
                . '    WHERE b.return_id = ' . $returnId . ' '
                . '    AND b.support_id <> ' . $supportId . ' '
                . '    ORDER BY support_lottery_number DESC '
                . '    LIMIT 1) '
                . '  AS c) '
                . 'WHERE a.support_id = ' . $supportId . ' '
                . 'AND a.support_lottery_number = 0';
        return $this->db->query($sql);
    }

    /**
     * 更新支持支付状态
     * 
     * @param int $supportStatus 订单状态
     * 
     * 订单状态说明：
     * 0 未支付，未过期。
     * 1 未支付，已过期。
     * 2 已支付，未开奖。
     * 3 限额已满，订单失败，已退款。
     * 4 未中奖，已支付。
     * 5 未回报，已中奖，已支付。
     * 6 已回报，已中奖，已支付。
     * @param array $where 更新条件
     * @return bool
     */
    public function updateSupportStatus($supportStatus, $where) {
        return $this->db->update('crowd_support', array('support_status' => $supportStatus), $where);
    }

    /**
     * 获取所有回报的价格
     * 
     * @param int $crowdId 众筹ID
     * @return bool | array
     */
    public function getReturnPriceByCrowdId($crowdId) {
        $sql = 'SELECT price '
                . ' FROM ###_crowd_return '
                . ' WHERE cd_id = ' . $crowdId
                . ' AND price <> 0 '
                . ' ORDER BY price ASC';
        return $this->db->select($sql);
    }

    /**
     * 
     * 支持数据入库
     * 
     * @param array $address
     * @param array $return
     * @return int | bool
     * -1 地址或回报为空
     * -2 未登录
     * -3 回报校验失败
     * -4 入库失败
     * -5 金额小于1
     * 大于 0 更新成功
     */
    public function saveSupport($address = array(), $return = array()) {
        switch (true) {
            case ((!is_array($address) && $return['is_address']) || !is_array($return) || empty($return)):
                return -1; //空数组校验
            case (!isset($_SESSION['mid']) || !isset($_SESSION['username'])):
                return -2; //登录校验
            case (!isset($return['cd_id']) || !isset($return['rt_id']) || !isset($return['price']) || !isset($return['crowd_total'])):
                return -3; //回报校验
            //地址校验
            case $return['price'] == 0 && $_POST['price'] < 1:
                return -5;
        }


        $order['support_sn'] = $this->getSupportSn();           //订单号
        $order['support_amount'] = $return['price'] == 0 ? $_POST['price'] : $return['price'];            //价格
        $order['support_created_time'] = RUN_TIME;               //订单创建时间
        $order['support_remark'] = isset($_POST['remark']) ? $_POST['remark'] : '';            //备注
        $order['support_invoice'] = isset($_POST['invoice']) ? 1 : 0;  //发票，1为索取发票，0不索取
        $order['support_status'] = 0;                                  //订单状态
        $order['support_lottery_number'] = 0;                          //开奖号码
        $order['member_id'] = $_SESSION['mid'];                       //会员ID
        $order['member_username'] = $_SESSION['username'];            //会员名
        $order['crowd_id'] = $return['cd_id'];                         //众筹ID
        $order['return_id'] = $return['rt_id'];                        //回报ID
        $order['address'] = isset($address['address']) ? $address['address'] : '';             //收货地址
        $order['address_name'] = isset($address['name']) ? $address['name'] : '';              //收货人
        $order['address_area'] = isset($address['area']) ? $address['area'] : '';              //区域
        $order['address_zone'] = isset($address['zone']) ? $address['zone'] : '';              //地区
        $order['address_zip'] = isset($address['zip']) ? $address['zip'] : '';                  //邮编
        $order['address_mobile'] = isset($address['mobile']) ? $address['mobile'] : '';         //联系电话
        //订单入库
        return $this->db->insert("###_crowd_support", $order) ? $order['support_sn'] : -4;
    }

    /**
     * 回报开奖
     * 
     * 用户支持项目抽奖档位并支付成功后，会获得一个8位数的抽奖编号，为8xxxxxxx，
     * 第1个下单成功的用户的抽奖编号为80000000，第2个为80000001，第3个为80000002，依次类推；
     * 
     * 
     * $a 开奖指数，时时彩开奖指数。
     * $b 抽奖档参与人数。
     * $c = mod($a,$b);   A除以抽奖档参与人数B，余数为C，第1个中奖编号即为 C+80000000；
     * $d  中奖名额
     * $m = floor( $b / ( $d+1 ) );
     * 取“抽奖档参与人数 / (中奖人数+1)”的商的整数部分为M，中奖名额为D，则其余中奖编号为  C+M+80000000、C+M×2+80000000、……、C+(D-1)×M+80000000；
     * 
     * 如果计算结果大于或等于最大的抽奖编号，则中奖编号变为 C+(D-1)×M-B+80000000，并依次类推。
     * 余数：指整数除法中被除数未被除尽部分，且余数的取值范围为0到除数之间（不包括除数）的整数。例如26除以5，商数为5，余数为1。
     * 
     */
    public function lottery() {
        //读取需要开奖的回报数据
        $sql = 'SELECT  r.rt_id,c.cd_id,c.end_time,r.support_num,r.draw_num'
                . ' FROM ###_crowd_return AS r,###_crowd AS c'
                . ' WHERE c.is_success = 1 '    //众筹成功
                . ' AND r.draw_num > 0 '        //非无私奉献
                . ' AND r.rt_lottery = 0 '      //未开奖               
                . ' AND r.cd_id = c.cd_id '
                . ' AND c.status = 2';
        $return = $this->db->select($sql);
        if (!is_array($return)) {
            return;
        }
        $lottery = array();
        foreach ($return as $row) {
            //读取开奖指数
            if (!is_array($lottery[$row['cd_id']])) {
                $code = $this->getLotteryCode($row['end_time']);
                if (is_array($code) && empty($code['code'])) {
                    continue;
                }
                $lottery[$row['cd_id']] = $code;
            }

            //开奖指数，时时彩开奖指数。读取时时彩开奖指数。
            $a = $lottery[$row['cd_id']]['code'];
            //参与人数
            $b = $row['support_num'];
            //第1个中奖编号即为 C+80000000；
            $c = $a % $b;

            //中奖名额
            $d = floor(($row['support_num'] + $row['draw_num']) / $row['draw_num']);
            $m = floor($b / ( $d + 1 ));

            //最大的开奖号码
            $maxNumber = CROWD_LOTTERY + $row['support_num'] - 1;
            //开奖号码
            $winning = array();
            for ($i = 0; $i < $d; $i++) {
                $number = $c + CROWD_LOTTERY + ($m * $i);
                //如果计算结果大于或等于最大的抽奖编号，则中奖编号变为 C+(D-1)×M-B+80000000，并依次类推。
                $winning[$i] = $number > $maxNumber ? $number - $b : $number;
            }

            //开奖数据入库
            $arr['lottery_created_time'] = RUN_TIME;                         //创建时间
            $arr['lottery_number'] = json_encode($winning);                 //开奖号码
            $arr['lottery_ssc'] = $lottery[$row['cd_id']]['code'];          //时时彩开奖号码
            $arr['lottery_ssc_number'] = $lottery[$row['cd_id']]['qihao'];  //时时彩期号
            $arr['return_id'] = $row['rt_id'];                               //回报ID
            $this->db->insert("###_crowd_return_lottery", $arr);
            //更新回报表，已开奖
            $this->db->update("###_crowd_return", array('rt_lottery' => 1), array('rt_id' => $row['rt_id']));
            //更新用户中奖情况
            $winning = implode(',', $winning);
            $sql = 'UPDATE ' . $this->db->pre_table('###_crowd_support') . ''
                    . ' SET support_status ='
                    . ' IF (support_lottery_number IN (' . $winning . '),	5,	4)'
                    . ' WHERE return_id = ' . $row['rt_id']
                    . ' AND support_lottery_number >= ' . CROWD_LOTTERY;
            $this->db->query($sql);
        }
    }

    /**
     * 获取当前时间的上一期时时彩
     * @param string $time 时间戳
     */
    public function getLotteryCode($time) {
        $qihao = '';
        $hour = date('G', $time);  //当前 时
        $minute = date('i', $time); //当前 分

        switch (true) {
            //凌晨12点
            case $hour == 0 && (int) $minute < 5:
                $time = $time - 24 * 60 * 60;
                $qihao = '120';
            //当天2点前
            case $hour < 2:
                $qihao = floor(($hour * 60 + (int) $minute) / 5);
                break;
            //早于8点前，晚于2点后
            case $hour < 10 && $hour >= 2:
                $qihao = '024';
                break;
            //当天8点到22点
            case $hour >= 10 && $hour < 22:
                $qihao = floor((($hour - 10) * 60 + (int) $minute) / 10) + 24;
                break;
            //当天22点后
            case $hour >= 22:
                $qihao = floor((($hour) * 60 + (int) $minute) / 5) + 24 + 72;
                break;
        }
        $qihao = date('ymd', $time) . str_pad($qihao, 3, '0', STR_PAD_LEFT);
        $this->load->model('yunbuy');
        $code = $this->yunbuy->lottery_code($qihao);
        return compact('qihao', 'code');
    }

}
