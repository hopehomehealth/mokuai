<?php
/**
 * ZZCMS 站点统计
 * ============================================================================
 * * 版权所有 2014-2016 厦门紫竹数码科技有限公司，并保留所有权利。
 * 网站地址: http://www.lnest.com；
 * ----------------------------------------------------------------------------
 * 这不是一个自由软件！您只能在不用于商业目的的前提下对程序代码进行修改和
 * 使用；不允许对程序代码以任何形式任何目的的再发布。
 */

class statistic extends Lowxp{
    function index(){
        $this->smarty->assign('title','数据统计');

        //总访问量
        $view = $this->db->get("SELECT sum(view_num) as total_view FROM statistic_view_info");
        $total_view = $view['total_view'];

        $this->smarty->assign('total_view',$total_view);

        $user = $this->db->get("SELECT * FROM m_user WHERE uid=".UID);
        $lastIp = $user['ip'];
        $this->smarty->assign('userip',$lastIp);

        $system = array(
            'type'=>php_uname('s'),
            'version'=>php_uname('r'),
            'phpversion'=>PHP_VERSION,

        );
        $this->smarty->assign('system',$system);

        $this->days7();

        $this->browser();

        $this->platform();

        $this->zone_city();

        #$res = $this->getIPLoc_sina('42.120.7.232');
        #$res = $this->getIPLoc_sina('61.172.240.228');
        #echo '<pre>';print_r($res);echo '</pre>';
        #echo '<pre>';print_r($days);echo '</pre>';
        #echo '<pre>';print_r($days);echo '</pre>';
        #echo '<pre>';print_r($days);echo '</pre>';

        $this->smarty->display('manage/statistic/index.html');
    }

    /**
     * 近7天访问统计
     */
    function days7(){
        //查近7天每日访问.
        $day7 = date('Y-m-d',strtotime('-6 days'));
        $rows = $this->db->select("SELECT * FROM statistic_view_info WHERE date>'".$day7."'");
        $day7rows = array();
        foreach($rows as $val)$day7rows[$val['date']] = $val;

        #$days7 = array();
        $sevenData = array(
            'days'=>array(),
            'data'=>array()
        );
        for($i=6;$i>-1;$i--){
            $timestamp = strtotime('-'.$i.' days');
            $day = date('Y-m-d',$timestamp);;
            $sevenData['days'][] = date('d',$timestamp);

            if(!isset($day7rows[$day])){
                $sevenData['data'][] = 0;
            }else{
                $sevenData['data'][] = $day7rows[$day]['view_num'];
            }
        }
        $sevenDays = json_encode($sevenData['days']);
        $sevenView = json_encode($sevenData['data']);
        $this->smarty->assign('seven_days',$sevenDays);
        $this->smarty->assign('seven_view',$sevenView);
    }

    /**
     * 浏览器分布
     */
    function browser(){
        $rows = $this->db->select("SELECT num,browser FROM statistic_view_browser");
        $browsers = array();
        $nums = array();
        $browserData = array();
        foreach($rows as $val){
            $browsers[] = $val['browser'];
            $nums[] = $val['num'];
            $browserData[] = array('name'=>$val['browser'],'value'=>$val['num']);
        }

        #echo '<pre>';print_r($rows);echo '</pre>';

        $this->smarty->assign('browsers_type',json_encode($browsers));
        $this->smarty->assign('browsers_data',json_encode($browserData));
    }

    /**
     * 浏览器分布
     */
    function platform(){
        $rows = $this->db->select("SELECT num,platform FROM statistic_view_platform");
        $platforms = array();
        #$nums = array();
        $platformData = array();
        foreach($rows as $val){
            $platforms[] = $val['platform'];
            #$nums[] = $val['num'];
            $platformData[] = array('name'=>$val['platform'],'value'=>$val['num']);
        }

        $this->smarty->assign('platforms_type',json_encode($platforms));
        $this->smarty->assign('platforms_data',json_encode($platformData));
    }

    function zone_city(){
        $rows = $this->db->select("SELECT * FROM statistic_view_city ORDER BY num DESC LIMIT 0,15");

        $citys = array();
        #$nums = array();
        $cityData = array();
        foreach($rows as $val){
            $citys[] = $val['city'];
            $cityData[] = array('name'=>$val['city'],'value'=>$val['num']);
        }

        $this->smarty->assign('citys',json_encode($citys));
        $this->smarty->assign('citys_data',json_encode($cityData));
    }

    /**
     * 根据新浪IP查询接口获取IP所在地
     * @param $queryIP
     * @return string
     */
    private function getIPLoc_sina($queryIP){
        $url = 'http://int.dpool.sina.com.cn/iplookup/iplookup.php?format=json&ip='.$queryIP;
        $ch = curl_init($url);
        //curl_setopt($ch,CURLOPT_ENCODING ,'utf8');
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true) ; // 获取数据返回
        $location = curl_exec($ch);
        $location = json_decode($location,true);

        curl_close($ch);

        return $location;
    }
}