<?php
/**
 * Class wxnews
 */

class wxnews extends Lowxp{

    /**
     * 图文详情
     * @param $id
     */
    function detail($id){
        is_numeric($id) || die;
        $item = $this->db->get("SELECT * FROM wx_news_item WHERE id = '$id'");

        if(isset($item['id'])){
            #浏览次数累加
            $this->db->update('wx_news_item','view_num=view_num+1',array('id'=>$item['id']));
        }

        $this->load->model('upload');
        $item = $this->upload->getImgUrls($item,'cover','gallery',array('thumb','src'));
        $this->smarty->assign('item',$item);

        $this->smarty->display('wechat/news_detail.html');
    }
}