<?php
/**
 * ZZCMS 栏目管理
 * ============================================================================
 * * 版权所有 2014-2016 厦门紫竹数码科技有限公司，并保留所有权利。
 * 网站地址: http://www.lnest.com；
 * ----------------------------------------------------------------------------
 * 这不是一个自由软件！您只能在不用于商业目的的前提下对程序代码进行修改和
 * 使用；不允许对程序代码以任何形式任何目的的再发布。
 */

class category extends Lowxp{
    function __construct(){
        #按钮
        $this->btnMenu = array(
            0=>array('url'=>'#!category/index','name'=>'栏目管理'),
            1=>array('url'=>'#!category/edit?com=xshow|添加栏目','name'=>'添加栏目'),
        );
        parent::__construct();
        #加载
        $this->load->model('category');
        $this->load->library('tree');
    }

    function index(){
        $list = $this->category->select();
        $array = array();
        foreach($list as $r) {
            $r['thumb'] = json_decode($r['thumb'],true);
            $r['str_manage'] = "";
            if($r['moduleid']>0 && $r['module']!='page'){
                $r['str_manage'] .= "<a href='#!content/index/".$r['module']."?catid=".$r['id']."' class='iconfont icon-a' title='查看内容'>&#xe601;</a> ";
            }elseif($r['moduleid']>0 && $r['module']=='page'){
                $r['str_manage'] .= "<a href='#!content/edit/".$r['module']."?id=".$r['id']."&com=xshow|编辑内容' class='iconfont icon-a' title='编辑内容'>&#xe601;</a> ";
            }
            $r['str_manage'] .= "<a href='#!category/edit/?parentid=".$r['id']."&com=xshow|添加子栏目' class='iconfont icon-a' title='添加子栏目'>&#xe604;</a>";
            $r['str_manage'] .= "<a href='#!category/edit/?id=".$r['id']."&com=xshow|编辑栏目' class='iconfont icon-a' title='编辑栏目'>&#xe603;</a>";
            $r['str_manage'] .= "<a href='javascript:;' onclick=\"main.confirm_del('category/del','".$r['id']."')\" class='iconfont icon-a' title='删除'>&#xe606;</a>";

            if($r['ismenu']==1){
                $r['ismenu']="<a href='javascript:;' class='c-green' onclick='main.chang_status(\"".$r['id']."\",\"category\",\"ismenu\")' title='点击设为不显示'>显示</a>";
            }else{
                $r['ismenu']="<a href='javascript:;' class='c-red' onclick='main.chang_status(\"".$r['id']."\",\"category\",\"ismenu\")' title='点击设为显示'>不显示</a>";
            }

            if($r['thumb'][0]['path']){
                $r['thumb'] = '<a href="'.$r['thumb'][0]['path'].'" target="_blank" class="iconfont c-green" title="缩略图">&#xe602;</a>';
            }

            if($r['type']==1){
                $r['module_title'] = '<span class="c-red">'.$r['module_title'].'</span>';
            }
            $array[] = $r;
        }
        $this->tree->set_params($array);

        $str = "<tr>
                    <td align='center'><input type='text' class='form-i-s w30' name='listorders[\$id]' value='\$listorder' /></td>
                    <td class='id' align='center'>\$id</td>
                    <td>\$spacer\$catname \$thumb</td>
                    <td align='center'>\$module_title</td>
                    <td align='center'>\$ismenu</td>
                    <td class='opera' align='center' nowrap>\$str_manage</td>
				</tr>";
        $data['list'] = $this->tree->get_tree(0, $str);

        $this->smarty->assign('data',$data);
        $this->smarty->display('manage/category/list.html');
    }

    //创建/更新
    function edit(){
        //提交
        if(isset($_POST['Submit'])){

            $res = $this->category->save();

            if(isset($res['code']) && $res['code']==0){
                $this->tip($res['message'],array('inIframe'=>true));
                //$this->exeJs("parent.location.href='/manage#!category/index'");
                $this->exeJs("parent.com.xhide();parent.main.refresh()");
            }else{
                $this->tip($res['message'],array('inIframe'=>true,'type'=>1));
            }
            die;
        }

        $id = (int) $_GET['id'];
        $parentid =  isset($_GET['parentid'])?(int)$_GET['parentid'] : 0;
        $row = array();

        //编辑
        if($id){
            $row = $this->db->get("SELECT * FROM ###_category WHERE id=".$id." AND lang=".LANG_ID);
            $this->smarty->assign('id',$id);
            $parentid =	intval($row['parentid']);

            #获取图片地址
            $this->load->model('upload');
            $row = $this->upload->getImgUrls($row,'id','category');
        }
        else{
            $row['ismenu'] = 1;
            $row['pagesize'] = 10;
            $row['listtype'] = 0;
        }

        //获取内容模型
        $array = $this->db->select("SELECT id,title,name FROM ###_module WHERE `type`=3 ORDER BY listorder,id");
        $module_list = array();
        foreach($array as $k=>$v){
            $module_list[$v['id']] = $v['title'];
        }
        $module_list[0] = '外部链接';
        $this->smarty->assign('module_list',$this->form->select($module_list,$row['moduleid'],'name="post[moduleid]" id="moduleid" onchange="javascript:category.chang_module(this.value,'.$row['listtype'].')"'));

        $templates = $this->template_file();
        $this->smarty->assign ( 'templates',$templates );

        //获取下拉分类
        $select_categorys = $this->category->category_option($parentid);
        $this->smarty->assign('select_categorys', $select_categorys);

        //生成图片控件
        $row['html_thumb'] = $this->form->files('thumb',$row['thumb']);

        if(!$id) $this->smarty->assign('btnNo',1);
        $this->smarty->assign('row',$row);
        $this->smarty->display('manage/category/edit.html');
    }

    //删除
    function del($id){
        $id = (int) $_POST['id'];
        if(!$id) die;
        include AppDir.'data/fixed.php';
        
        if(in_array($id, $fixed_array)){
        	$this->tip('该栏目禁止删除！',array('type'=>1));
        }
        #存在子菜单，不能允许直接删除
        $res = $this->db->get("select id from ###_category where parentid=".$id);
        if(!empty($res)){ $this->tip('请先删除它的子栏目！',array('type'=>1));die; }

        #单页模型删除对应的内容数据
        $res_category = $this->db->get("select id,module from ###_category where id=".$id);
        if($res_category['module']=='page'){
            $this->db->delete('###_page', array('id'=>$id));
        }

        admin_log('删除文章栏目：'.$this->db->getstr("SELECT catname FROM ###_category WHERE id=".$id));
        $this->db->delete('###_category', array('id'=>$id));
        $this->category->repair();
        $this->category->repair();

        $this->tip('删除成功');
    }

    //获取模板列表
    function template_file(){
        $moduleid = (int) $_POST['moduleid'];
        $listtype = (int) $_POST['listtype'];
        $template_show = $_POST['template_show'];
        $template_list = $_POST['template_list'];

        #模板类型对应的后缀
        $listtype_array = array(
            0=>'list',
            1=>'index',
            2=>'form',
        );

        if(empty($moduleid)) return;
        $path=''; $ext='html';

        $this->load->library('dir');
        $path= $path ? $path : AppDir.'views/'.LANG_NAME.'/';
        $tempfiles = $this->dir->dir_list($path,$ext);

        $listdata = '<select name="post[template_list]"><option value="">默认模板</option>';
        $showdata = '<select name="post[template_show]"><option value="">默认模板</option>';

        $module = $this->db->getstr("select name from ###_module where id='".$moduleid."'");
        foreach ($tempfiles as $key=>$file){
            $dirname = basename($file);
            $file_name = substr($dirname,0,strrpos($dirname, '.')); #文件名称，去后缀
            $start = strpos($file_name, '_');  #出现_的位置
            $module_file = substr($file_name,0,$start); #获取模型名称
            $module_value = substr($file_name,$start+1); #获取模型文件类型

            if($start && $module_file == $module && $module_value){
                if(strpos($module_value, $listtype_array[$listtype])!==false){
                    $selected = ($template_list == $module_value) ? ' selected' : '';
                    $listdata .= "<option value='".$module_value."'".$selected.">".$dirname."</option>";
                }
                else if(strpos($module_value, 'show')!==false){
                    $selected = ($template_show == $module_value) ? ' selected' : '';
                    $showdata .= "<option value='".$module_value."'".$selected.">".$dirname."</option>";
                }
            }
        }

        $listdata .= '</select>';
        $showdata .= '</select>';
        die(json_encode(array('listdata'=>$listdata,'showdata'=>$showdata)));
    }
}