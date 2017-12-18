<?php

/**
 * Name 管理员登录
 * Class login_adm
 */

class info extends Lowxp{



    function about(){
        //关于
        $this->smarty->assign('title','关于我们');
        $this->smarty->display('manage/company/info/index.html');
    }

    function contact(){
        $this->smarty->assign('title','联系我们');
        $this->smarty->display('manage/company/info/index.html');
    }

    /**
     * 轮播图管理
     */
    function slider(){
        $this->smarty->assign('title','轮播图设置');
        $rows = $this->db->select("SELECT * FROM site_slider");


        $this->smarty->assign('sliders',$rows);


        $this->smarty->display('manage/company/info/index.html');
        return;
        $this->smarty->display('manage/company/slider/index.html');
    }

    /**
     * 新增轮播图
     */
    function addSlider(){
        $this->smarty->display('manage/company/slider/add_slider.html');
    }

    /**
     * 创建轮播图
     */
    function createSlider(){
        #echo '<pre>';print_r($_POST);echo '</pre>';
        #die;

        $width = intval( empty($_POST['slider_width']) ? 0 : $_POST['slider_width'] );
        $height = intval( empty($_POST['slider_height']) ? 0 : $_POST['slider_height'] );
        $name = $_POST['slider_name'];

        $rule = array(
            'thumb'=>array('width'=>$width,'height'=>$height),
        );

        $this->db->insert('images_thumb',array(
            'note'=>$name,
            'rule'=>json_encode($rule)
        ));
        $imgcateId = $this->db->insert_id();

        $this->db->insert('site_slider',array(
            'imgcate_id'=>$imgcateId,
            'name'=>$name,
            'rule'=>($width?$width:'auto').' x '.($height?$height:'auto'),
            'c_time'=>RUN_TIME
        ));

        $this->tip('添加成功',array('hideWin'=>true));
        $this->exeJs('main.refresh()');
        #$this->smarty->display('manage/company/slider/add_slider.html');
    }

    /**
     * 轮播图管理
     * @param string $id
     */
    function sliderEdit($id = ''){
        is_numeric($id)||die;
        $slider = $this->db->get("SELECT * FROM site_slider WHERE id=".$id);
        $rows = $this->db->select("SELECT * FROM site_slider_item WHERE slider_id=".$id);
        $this->load->model('upload');
        $rows = $this->upload->getImgUrls($rows,'id',$slider['imgcate_id'],array('thumb','src'));


        $this->smarty->assign('slider',$slider);
        $this->smarty->assign('slides',$rows);
        $this->smarty->display('manage/company/slider/manage.html');
    }

    /**
     * 上传轮播图
     */
    function upSlider(){

        #upWechatImg
        $this->load->model('upload');

        $imgCateId = $_POST['imgcate_id'];
        #父级分类ID
        $this->db->insert('site_slider_item',array(
            'slider_id'=>$_POST['slider_id'],
            'title'=>$_POST['title'],
            'link'=>$_POST['link'],
            'c_time'=>RUN_TIME
        ));

        $id = $this->db->insert_id();
        $this->upload->image($id,'upFile',$imgCateId);

        $this->exeJs('parent.site.upsliderBack()');
    }

    /**
     * 删除轮播图中的图片.
     * @param string $id
     */
    function rmSlideImg($id = ''){
        is_numeric($id) || die;


        $item = $this->db->get("SELECT * FROM site_slider_item WHERE id=".$id);

        if(!isset($item['id']))die('');
        $slide = $this->db->get("SELECT * FROM site_slider WHERE id =".$item['slider_id']);
        isset($slide['id'])||die;

        $imageCateId = $slide['imgcate_id'];

        //删除一项.
        $this->db->delete('site_slider_item',array('id'=>$id));
        $this->load->model('upload');

        $this->upload->delImages($item['id'],$imageCateId);

    }

    /**
     * 删除轮播图
     * @param string $id
     */
    function rmSlide($id = ''){

        is_numeric($id)||die;

        $slide = $this->db->get("SELECT * FROM site_slider WHERE id =".$id);
        isset($slide['id'])||die;

        $imageCateId = $slide['imgcate_id'];
        $items = $this->db->select("SELECT * FROM site_slider_item WHERE slider_id=".$id);

        $this->load->model('upload');

        foreach($items as $val){
            $this->upload->delImages($val['id'],$imageCateId);
            $this->db->delete('site_slider_item',array('id'=>$val['id']));
        }

        $this->db->delete('site_slider',array('id'=>$id));

    }



}