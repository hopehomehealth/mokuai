<?php /* Smarty version Smarty-3.1.13, created on 2016-07-22 16:37:51
         compiled from "E:\projects\web\1yyg\1yyg225_full\webapps\www\views\manage\setting\config.html" */ ?>
<?php /*%%SmartyHeaderCode:17647576a3ed92ae4a1-39737209%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '915d2320655ae2dee3cb42ca311ee49f1003546b' => 
    array (
      0 => 'E:\\projects\\web\\1yyg\\1yyg225_full\\webapps\\www\\views\\manage\\setting\\config.html',
      1 => 1469086295,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17647576a3ed92ae4a1-39737209',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_576a3ed94010f7_93730887',
  'variables' => 
  array (
    'btnNo' => 0,
    'field_type' => 0,
    'btnMenu' => 0,
    'k' => 0,
    'm' => 0,
    'images_data' => 0,
    'L' => 0,
    'pc_list' => 0,
    'skin' => 0,
    'mobile_list' => 0,
    'formInfo' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_576a3ed94010f7_93730887')) {function content_576a3ed94010f7_93730887($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('../public_btn.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<div class="html-box">    <form target="iframeNewsTarget" method="post" action="/manage/setting/index/<?php echo $_smarty_tpl->tpl_vars['btnNo']->value;?>
" enctype="multipart/form-data">    <table class="table-list">    <tbody>                <?php if ($_smarty_tpl->tpl_vars['btnNo']->value=='add'){?>        <tr>            <td class="td-label"><label>字段类型：</label></td>            <td class="td-input">                <?php echo $_smarty_tpl->tpl_vars['field_type']->value;?>
            </td>        </tr>        <tr>            <td class="td-label"><label>选择分组：</label></td>            <td class="td-input">                <select name="post[group]">                    <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['btnMenu']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['m']->key;
?>                    <?php if ($_smarty_tpl->tpl_vars['k']->value!='add'){?>                    <option value="<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['m']->value['name'];?>
</option>                    <?php }?>                    <?php } ?>                </select>            </td>        </tr>        <tr>            <td class="td-label"><label>变量介绍：</label></td>            <td class="td-input">                <input type="text" class="form-i w200" name="post[title]" value="" />            </td>        </tr>        <tr>            <td class="td-label"><label>变量名：</label></td>            <td class="td-input">                <input type="text" class="form-i w200" name="post[varname]" value="" />            </td>        </tr>        <tr>            <td class="td-label"><label>注释说明：</label></td>            <td class="td-input">                <textarea name="post[tip]"></textarea>            </td>        </tr>        <tr>            <td class="td-label" style="vertical-align:middle"><label>字段相关：</label></td>            <td>                <div id="field_step"></div>            </td>        </tr>        <?php }else{ ?>		<?php if ($_smarty_tpl->tpl_vars['btnNo']->value=='images'){?>        <tr>            <td class="td-input" colspan="2">                <div class="c-red">                    注意：图片名称与格式需要跟上传框右侧名称一样，否则上传无效                </div>            </td>        </tr>		<?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['images_data']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['m']->key;
?>		<tr>            <td class="td-label"><label><?php echo $_smarty_tpl->tpl_vars['m']->value['title'];?>
：</label></td>            <td class="td-input">                <input type="file" name="<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
" class="form-i w200" />                <span class="form-tip"><?php echo $_smarty_tpl->tpl_vars['m']->value['name'];?>
（规格:<?php echo $_smarty_tpl->tpl_vars['m']->value['guige'];?>
）</span>                <div class="form-tip"><?php if ($_smarty_tpl->tpl_vars['m']->value['url']){?><a href="<?php echo $_smarty_tpl->tpl_vars['m']->value['url'];?>
" target="_blank"><?php if ($_smarty_tpl->tpl_vars['m']->value['des']){?>[<?php echo $_smarty_tpl->tpl_vars['m']->value['des'];?>
]<?php }else{ ?>[请点击这里查看位置]<?php }?></a><?php }else{ ?><a target="_blank">[<?php echo $_smarty_tpl->tpl_vars['m']->value['des'];?>
]</a><?php }?><a href="/<?php echo $_smarty_tpl->tpl_vars['m']->value['address'];?>
<?php echo $_smarty_tpl->tpl_vars['m']->value['name'];?>
" target="_blank">[请点击查看图片]</a></div>            </td>        </tr>        <?php } ?>        <?php }elseif($_smarty_tpl->tpl_vars['btnNo']->value=='words'){?>        <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['L']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['m']->key;
?>        <tr>            <td class="td-label"><label><?php echo $_smarty_tpl->tpl_vars['k']->value;?>
：</label></td>            <td class="td-input">                <input type="text" name="post[<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
]" value="<?php echo $_smarty_tpl->tpl_vars['m']->value;?>
" class="form-i w300" />            </td>        </tr>        <?php } ?>        <?php }elseif($_smarty_tpl->tpl_vars['btnNo']->value=='skin'){?>        <tr class="table-h3">            <td colspan="2">选择模板</td>        </tr>        <tr>            <td class="td-label"><label>选择PC端模板：</label></td>            <td class="td-input">                <select name="post[pc_skin]">                    <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['pc_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>                    <option value="<?php echo $_smarty_tpl->tpl_vars['m']->value;?>
"<?php if ($_smarty_tpl->tpl_vars['skin']->value['pc_skin']==$_smarty_tpl->tpl_vars['m']->value){?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['m']->value;?>
</option>                    <?php } ?>                </select>                <span class="form-tip">cn为默认模板（新模板请联系商务获取）</span>            </td>        </tr>        <tr>            <td class="td-label"><label>选择移动端模板：</label></td>            <td class="td-input">                <select name="post[mobile_skin]">                    <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['mobile_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>                    <option value="<?php echo $_smarty_tpl->tpl_vars['m']->value;?>
"<?php if ($_smarty_tpl->tpl_vars['skin']->value['mobile_skin']==$_smarty_tpl->tpl_vars['m']->value){?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['m']->value;?>
</option>                    <?php } ?>                </select>                <span class="form-tip">cn为默认模板</span>            </td>        </tr>        <tr class="table-h3">            <td colspan="2">模板配置</td>        </tr>        <tr>            <td class="td-label"><label>隐藏累计参拍人次：</label></td>            <td class="td-input">                <select name="post[hide_bidCount]">                    <option value="0"<?php if (!$_smarty_tpl->tpl_vars['skin']->value['hide_bidCount']){?>selected<?php }?>>否</option>                    <option value="1"<?php if ($_smarty_tpl->tpl_vars['skin']->value['hide_bidCount']==1){?>selected<?php }?>>是</option>                </select>                <span class="form-tip">页面头部累计参与人次</span>            </td>        </tr>        <?php }else{ ?>        <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['formInfo']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>        <tr>            <td class="td-label"><label><?php echo $_smarty_tpl->tpl_vars['m']->value['title'];?>
：</label></td>            <td class="td-input">                <?php echo $_smarty_tpl->tpl_vars['m']->value['html'];?>
                <?php if ($_smarty_tpl->tpl_vars['m']->value['user']&&@constant('GID')==-1){?><a href='javascript:;' onclick="main.confirm_del('setting/del','<?php echo $_smarty_tpl->tpl_vars['m']->value['field'];?>
')" class='iconfont icon-a' title='删除'>&#xe606;</a><?php }?>                <span class="form-tip"><?php echo $_smarty_tpl->tpl_vars['m']->value['field'];?>
</span>                <?php if ($_smarty_tpl->tpl_vars['m']->value['tip']){?><div class="form-tip" style="line-height: 1.5;padding-top:5px;"><?php echo $_smarty_tpl->tpl_vars['m']->value['tip'];?>
</div><?php }?>            </td>        </tr>        <?php } ?>        <?php if ($_smarty_tpl->tpl_vars['btnNo']->value=='mail'){?>        <tr>            <td class="td-label"><label>测试邮箱：</label></td>            <td class="td-input">                <input type="text" id="mailto" class="form-i w200" />                <button class="uiBtn BtnBlue" onclick="setting.testMail()">发送测试邮件</button>                <div class="form-tip">请保存后再测试邮件</div>                                <script type="text/javascript">                    $.loadJs('/admin/js/manage/setting.js',function(){ });                </script>                            </td>        </tr>        <?php }?>		<?php }?>        <?php }?>        <tr class="tr-btn">            <td class="td-label"></td>            <td class="td-input">                <button type="submit" name="<?php if ($_smarty_tpl->tpl_vars['btnNo']->value=='add'){?>SubmitAdd<?php }else{ ?>Submit<?php }?>" class="uiBtn BtnGreen">提&nbsp;&nbsp;交</button>                <button type="reset" class="uiBtn">重&nbsp;&nbsp;置</button>            </td>        </tr>    </tbody>    </table>    </form></div><?php if ($_smarty_tpl->tpl_vars['btnNo']->value=='add'){?><script type="text/javascript">    $.loadJs('/admin/js/manage/field.js',function(){        field.chang_field("text",'',true);    });</script><?php }?><?php }} ?>