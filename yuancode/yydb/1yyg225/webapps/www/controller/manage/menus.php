<?php
/**
 * ZZCMS 后台菜单
 * ============================================================================
 * * 版权所有 2014-2016 厦门紫竹数码科技有限公司，并保留所有权利。
 * 网站地址: http://www.lnest.com；
 * ----------------------------------------------------------------------------
 * 这不是一个自由软件！您只能在不用于商业目的的前提下对程序代码进行修改和
 * 使用；不允许对程序代码以任何形式任何目的的再发布。
 */

class menus extends Lowxp{
    function __construct(){
        #按钮
        $this->btnMenu = array(
            0=>array('url'=>'#!menus/index','name'=>'后台菜单'),
            1=>array('url'=>'#!menus/edit?com=xshow|添加菜单','name'=>'添加菜单'),
        );
        parent::__construct();
        #加载
        $this->load->library('tree');
        $this->list = $this->db->select("SELECT * FROM ###_menus ORDER BY listorder,id");
    }

    function index(){
        $array = array();
        foreach($this->list as $r) {
            $r['str_manage'] = '';

            if($r['type'] == 1){
                $r['str_manage'] .= "<a href='#!menus/edit/?parentid=".$r['id']."&com=xshow|添加子菜单' class='iconfont icon-a' title='添加子菜单'>&#xe604;</a>";
            }else{
                $r['str_manage'] .= "<span class='iconfont icon-a c-disable'>&#xe604;</span>";
                $r['name'] = '<span class="c-gray">'.$r['name'].'</span>';
            }

            $r['str_manage'] .= "<a href='#!menus/edit/?id=".$r['id']."&com=xshow|编辑菜单' class='iconfont icon-a' title='编辑'>&#xe603;</a>";

            if($r['issystem']==1){
                $r['str_manage'] .= "<span class='iconfont icon-a c-disable'>&#xe606;</span>";
            }else{
                $r['str_manage'] .= "<a href='javascript:;' onclick=\"main.confirm_del('menus/del','".$r['id']."')\" class='iconfont icon-a' title='删除'>&#xe606;</a>";
            }

            if($r['status']==1){
                $r['status']="<a href='javascript:;' onclick=\"main.chang_status('".$r['id']."','menus')\" class='c-green' title='点击禁用'>开启</a>";
            }else{
                $r['status']="<a href='javascript:;' onclick=\"main.chang_status('".$r['id']."','menus')\" class='c-red' title='点击开启'>禁用</a>";
            }
            $array[] = $r;
        }
        $this->tree->set_params($array);

        $str = "<tr>
                    <td align='center'><input type='text' class='form-i-s w30' name='listorders[\$id]' value='\$listorder' /></td>
                    <td class='id' align='center'>\$id</td>
                    <td>\$spacer\$name</td>
                    <td align='center'>\$status</td>
                    <td class='opera' align='center' nowrap>\$str_manage</td>
				</tr>";
        $data['list'] = $this->tree->get_tree(0, $str);

        $this->smarty->assign('data',$data);
        $this->smarty->display('manage/menus/list.html');
    }

    //创建/更新
    function edit(){
        //提交
        if(isset($_POST['Submit'])){

            $post = $_POST['post'];
            $res = $this->menus->save($post);

            if(isset($res['code']) && $res['code']==0){
                $this->tip($res['message'],array('inIframe'=>true));
                //$this->exeJs("parent.location.href='/manage#!menus/index'");
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
            $row = $this->db->get("SELECT * FROM ###_menus WHERE id=".$id);
            $this->smarty->assign('id',$id);
            $parentid =	intval($row['parentid']);
        }

        //获取下拉分类
        foreach($this->list as $r) {
            if($r['type']!=1) continue;
            $r['selected'] = $r['id'] == $parentid ? 'selected' : '';
            $array[] = $r;
        }
        $str  = "<option value='\$id' \$selected>\$spacer\$name</option>";
        $this->tree->set_params($array);

        $select_categorys = $this->tree->get_tree(0, $str, $parentid);
        $this->smarty->assign('select_categorys', $select_categorys);

        if(!$id) $this->smarty->assign('btnNo',1);
        $this->smarty->assign('row',$row);
        $this->smarty->display('manage/menus/edit.html');
    }

    //删除
    function del($id){
        $id = (int) $_POST['id'];
        if(!$id) die;

        #存在子菜单，不能允许直接删除
        $res = $this->db->get("select id from ###_menus where parentid=".$id);
        if(!empty($res)){ $this->tip('请先删除它的子菜单！',array('type'=>1));die; }

        admin_log('删除后台菜单：'.$this->db->getstr("SELECT name FROM ###_menus WHERE id=".$id));
        $this->db->delete('###_menus', array('id'=>$id));
        $this->tip('删除成功');
    }
}