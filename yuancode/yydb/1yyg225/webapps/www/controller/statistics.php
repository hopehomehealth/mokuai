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

class statistics extends Lowxp{
    /**
     * 访问日志记录
     */
    function doLog(){

        $this->load->library('browser');

        #浏览器名称
        $browserName = $this->browser->getBrowser();

        #平台名称
        $platform = $this->browser->getPlatform();

        #浏览器版本
        $version = $this->browser->getVersion();

        #isMobile
        $isMobile = $this->browser->isMobile();

        #isRobot
        $isRobot = $this->browser->isRobot();

        $viewPage = '';#访问页
        $ip = getIP();
        #$ip = '219.133.170.93';

        $date = date('Y-m-d');

        //page_view和ip统计
        $info = $this->db->get("SELECT * FROM statistic_view_info WHERE date='".$date."'");
        if(!isset($info['id'])){
            $this->db->insert('statistic_view_info',array('date'=>$date));
        }else{
            $log = $this->db->get("SELECT * FROM statistic_view_log WHERE date='".$date."' AND ip='".$ip."'");
            //访问一次增加一次浏览量.
            $set = 'view_num=view_num+1';

            //不同的ip增加一个ip访问量.
            if(!isset($log['id']))$set.= " AND ip_num=ip_num+1";

            $this->db->update('statistic_view_info',$set,array('date'=>$date));
        }

        //浏览器统计
        $ckBrowser = $this->db->get("SELECT * FROM statistic_view_browser WHERE browser='".$browserName."'");
        if(!isset($ckBrowser['id'])){
            $this->db->insert('statistic_view_browser',array(
                'browser'=>$browserName,
            ));
        }else{
            $this->db->update('statistic_view_browser','num=num+1',array('id'=>$ckBrowser['id']));
        }


        //平台统计
        $ckPlatform = $this->db->get("SELECT * FROM statistic_view_platform WHERE platform='".$platform."'");
        if(!isset($ckPlatform['id'])){
            $this->db->insert('statistic_view_platform',array(
                'platform'=>$platform,
            ));
        }else{
            $this->db->update('statistic_view_platform','num=num+1',array('id'=>$ckPlatform['id']));
        }


        //ip地址加1

        $input = array(
            'ip'=>$ip,
            'browser'=>$browserName,
            'platform'=>$platform,
            'version'=>$version,
            'is_mobile'=>$isMobile ? 1 : 0,
            'is_robot'=>$isRobot ? 1 : 0,
            'date'=>$date
        );

        $location = $this->getIPLoc_sina($ip);
        if(isset($location['province'])){
            $input['province'] = $location['province'];

            //城市统计.
            if(isset($location['city'])){
                $ckCity = $this->db->get("SELECT * FROM statistic_view_city WHERE city='".$location['city']."'");
                if(!isset($ckCity['id'])){
                    $this->db->insert('statistic_view_city',array(
                        'city'=>$location['city'],
                    ));
                }else{
                    $this->db->update('statistic_view_city',array('num'=>$ckCity['num']+1),array('id'=>$ckCity['id']));
                }

                $input['city'] = $location['city'];
            }
        }

        //todo:ip过滤,防刷新机制.
        $this->db->insert('statistic_view_log',$input);

    }


    function browsers(){

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