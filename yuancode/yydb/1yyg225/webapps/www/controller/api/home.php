<?php

/**
 * Class home 首页
 */
class home extends Lowxp{ 
    function getbanner(){
        $id = 25;
        $this->load->model('upload');
        $ad = $this->db->get("SELECT * FROM ###_ad WHERE id = '$id' AND status = 1");
        $ad['image'] = json_decode($ad['images'],true);

        if(!empty($ad['image'])){
            foreach($ad['image'] as $key=>$val){
                if(strstr($val['title'],'http://')===false && strstr($val['title'],'https://')===false){
                    $data = explode(',',$val['title']);
                    $parame = array();
                    if(!empty($data)){
                        foreach($data as $v){
                            $arr = explode(':',$v);
                            $parame[$arr[0]] = $arr[1];
                        }
                    }
                    if(!empty($parame['win'])) $ad['image'][$key]['page'] = $parame['win'];
                    if(!empty($parame['tab'])) $ad['image'][$key]['tab'] = $parame['tab'];
                    $ad['image'][$key]['title'] = json_encode($parame);
                    //$ad['image'][$key]['title'] = str_replace('"','\'',json_encode($parame));
                }else{
                    $ad['image'][$key]['url'] = $val['title'];
                }
                $ad['image'][$key]['path'] = $this->upload->thumb($val['path'],array('width'=>'580','height'=>'350'));
            }
        }
        $this->api_result(array('data'=>$ad['image']));
    } 

    function old_getbanner(){
        //$id = 18;
        $id = 10;
        $this->load->model('upload');
        $ad = $this->db->get("SELECT * FROM ###_ad WHERE id = '$id' AND status = 1");
        $ad['image'] = json_decode($ad['images'],true);

        if(!empty($ad['image'])){
            foreach($ad['image'] as $key=>$val){
                $data = explode(',',$val['title']);
                $parame = array();
                if(!empty($data)){
                    foreach($data as $v){
                        $arr = explode(':',$v);
                        $parame[$arr[0]] = $arr[1];
                    }
                }
                if(!empty($parame['win'])) $ad['image'][$key]['page'] = $parame['win'];
                if(!empty($parame['tab'])) $ad['image'][$key]['tab'] = $parame['tab'];
                $ad['image'][$key]['title'] = json_encode($parame);
                //$ad['image'][$key]['title'] = str_replace('"','\'',json_encode($parame));
                $ad['image'][$key]['path'] = $this->upload->thumb($val['path'],array('width'=>'640','height'=>'200'));
            }
        }
        $this->api_result(array('data'=>$ad['image']));
    }

    function getindexdata(){
        $this->load->model('yunbuy');
        $this->load->model('taglib');
        #获取已揭晓
        //$where = " AND d.status=3 AND d.is_show=1";
        //$data['count'] = $this->yunbuy->getyunDb($where,'count',1);
        $sql = "SELECT * FROM ###_yunbuy WHERE luck_code>0 ORDER BY end_time DESC LIMIT 4";
        $list = $this->db->select($sql);
        $list = $this->db->lJoin($list,'yundb','buy_id,goods_name','buy_id','buy_id');
        $list = $this->db->lJoin($list,'goods','id,price','goods_id','id','g_');
        $list = $this->db->lJoin($list,'member','mid,nickname,photo','member_id','mid');
        $data['luck_db'] = $list;
        if(!empty($data['luck_db'])){
            foreach($data['luck_db'] as $key=>$val){
                $data['luck_db'][$key]['imgurl_thumb'] = $this->taglib->_fileurl(array('source'=>$val['thumb'],'width'=>200,'height'=>200,'type'=>1));
                $data['luck_db'][$key]['username'] = nickname($val['member_name'],$val['nickname']);
                $data['luck_db'][$key]['photo'] = $this->taglib->_photo(array('source'=>$val['photo'],'size'=>30));
            }
        }
        #热门挖宝
        $data['yunbuy'] = $this->yunbuy->getyunbuy("end_num<> 0 AND is_show = 1 ORDER BY listorders DESC,buy_id DESC",6);
        #导航
        $nav = nav(5,5);
        if(!empty($nav)){
            foreach($nav as $key=>$val){
                $link = explode('|',$val['linkurl']);
                $d = explode(',',$link[2]);
                $parame = array();
                if(!empty($d)){
                    foreach($d as $v){
                        $arr = explode(':',$v);
                        $parame[$arr[0]] = $arr[1];
                    }
                }
                $nav[$key]['class'] = $link[0];
                $nav[$key]['color'] = $link[1];
                if(!empty($parame['tab'])){
                    $nav[$key]['tab'] = $parame['tab'];
                    unset($parame['tab']);
                }
                if(!empty($parame['win'])){
                    $nav[$key]['win'] = $parame['win'];
                    unset($parame['win']);
                }
                //$nav[$key]['parame'] = json_encode($parame);
                $nav[$key]['parame'] = str_replace('"','\'',json_encode($parame));
            }
            $data['nav'] = $nav;
        }
        $this->api_result(array('data'=>$data));

    }
    function getsiteconfig(){
        $this->load->model('taglib');
        if($this->site_config['app_logo']!='[]'){
            $this->site_config['app_logo'] = $this->taglib->_fileurl(array('source'=>$this->site_config['app_logo']));
        }else{
            $this->site_config['app_logo']='';
        }
        $this->api_result(array('data'=>$this->site_config));
    }
    function getVersion(){
        $this->api_result(array('data'=>$this->site_config['now_checking']));
    }
    function getShareUrl(){
        $this->api_result(array('data'=>$this->site_config['app_shareurl']));
    }
    function getIosUrl(){
        $this->api_result(array('data'=>$this->site_config['ios_url']));
    }
    function getAndroidUrl(){
        $this->api_result(array('data'=>$this->site_config['and_url']));
    }
   

}
