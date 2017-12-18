<?php

/**
 * Class user_model
 */
class wxnews_model extends Lowxp_Model{


    /**
     * 获取微信图文图片等信息.
     * @param $wxnews
     * @return array
     */
    function setNewsInfo($wxnews){

        $singleData = false;
        if(isset($wxnews['id'])){
            $singleData = true;
            $wxnews = array($wxnews);
        }

        $newsIds = array_column($wxnews,'id');

        if(count($newsIds)){
            $items = $this->db->select("SELECT * FROM wx_news_item WHERE news_id IN(".implode(',',$newsIds).")");
            $this->load->model('upload');
            $items = $this->upload->getImgUrls($items,'cover','gallery',array('thumb','src'));

            $width = 140; $height = 70;
            $this->load->model('share');
            foreach($items as $key=>$val){
                $items[$key]['thumb_size'] = $this->share->getSizeFormat($val['img_size'],$width,$height);
            }
            $newsItem = array();
            foreach($items as $val){
                $newsItem[$val['news_id']][] = $val;
            }
            foreach($wxnews as $key=>$val){
                $wxnews[$key]['items'] = isset($newsItem[$val['id']]) ? $newsItem[$val['id']] : array();
            }
        }

        return $singleData ? $wxnews[0] : $wxnews;
    }


    function getMsgsByReplys($idlist = array()){
        $single = false;
        if(isset($idlist['msg_type'])){
            $single = true;
            $idlist = array($idlist);
        }
        if(!isset($idlist[0]['msg_type']))return $idlist;

        $ids = array(
            'text'=>array(),
            'news'=>array(),
            'wheel'=>array(),
            'image'=>array()
        );
        #$imgids = array();
        foreach($idlist as $val)$ids[$val['msg_type']][] = $val['msg_id'];

        $matchdata = array();

        #文本
        if(count($ids['text'])){
            $textlist = $this->db->select("SELECT * FROM wx_autoreply_text WHERE id IN(".implode(',',$ids['text']).")");
            foreach($textlist as $val)$matchdata['text'][$val['id']] = $val;
        }
        #图文
        if(count($ids['news'])){
            $newslist = $this->db->select("SELECT * FROM wx_news_item WHERE news_id IN(".implode(',',$ids['news']).")");
            $this->load->model('upload');
            $newslist = $this->upload->getImgUrls($newslist,'cover','gallery',array('thumb','src'));

            $width = 140; $height = 70;
            $this->load->model('share');
            foreach($newslist as $val){
                $val['thumb_size'] = $this->share->getSizeFormat($val['img_size'],$width,$height);
                $val['imgurl'] = $val['imgurl_src'];
                $matchdata['news'][$val['news_id']]['news_list'][] = $val;
            }
        }
        #大转盘
        if(count($ids['wheel'])){
            $wheels = $this->db->select("SELECT * FROM wx_lottery_wheel WHERE id IN(".implode(',',$ids['wheel']).")");
            $this->load->model('upload');
            $wheels = $this->upload->getImgUrls($wheels,'news_cover','wechat',array('src','thumb'));

            foreach($wheels as $val)$matchdata['wheel'][$val['id']]['news_list'][] = array(
                'id'=>$val['id'],
                'title'=>$val['news_title'],
                'desc'=>$val['news_desc'],
                'content'=>$val['news_desc'],
                'imgurl_src'=>$val['imgurl_src'],
                'imgurl'=>$val['imgurl_src']
            );
        }

        $ret = array();
        foreach($idlist as $key=>$val){
            if(isset($matchdata[$val['msg_type']][$val['msg_id']])){
                $tmp1 = $matchdata[$val['msg_type']][$val['msg_id']];
                $ret[$key] = array_merge($tmp1,$val);
            }
        }

        return $single ? $ret[0] : $ret;
    }

}