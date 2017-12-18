<?php /* Smarty version Smarty-3.1.13, created on 2016-12-26 18:48:31
         compiled from "/data/01/html/1yyg225/webapps/www/views/manage/field/edit.html" */ ?>
<?php /*%%SmartyHeaderCode:11410299295860f57f8c8805-21085515%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6c19c14b878fdfaacabb571cdda0d6e63b38977d' => 
    array (
      0 => '/data/01/html/1yyg225/webapps/www/views/manage/field/edit.html',
      1 => 1456367948,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11410299295860f57f8c8805-21085515',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'module' => 0,
    'row' => 0,
    'moduleid' => 0,
    'field_type' => 0,
    'id' => 0,
    'field_validate' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5860f57f9330c4_93723741',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5860f57f9330c4_93723741')) {function content_5860f57f9330c4_93723741($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('../public_btn.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="html-box">
    <h3 class="table-title"><?php echo $_smarty_tpl->tpl_vars['module']->value['title'];?>
(<?php echo $_smarty_tpl->tpl_vars['module']->value['name'];?>
)</h3>

    <form target="iframeNewsTarget" method="post" action="/manage/field/edit">
    <?php if ($_smarty_tpl->tpl_vars['row']->value['id']){?>
    <input type="hidden" name="post[type]" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['type'];?>
" />
    <input type="hidden" name="post[id]" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['id'];?>
" />
    <input type="hidden" name="post[oldfield]" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['field'];?>
" />
    <?php }?>
    <input type="hidden" name="moduleid" value="<?php echo $_smarty_tpl->tpl_vars['moduleid']->value;?>
" />

    <table class="table-list">
    <tbody>

        <tr>
            <td class="td-label"><label>字段类型：</label></td>
            <td class="td-input">
                <?php echo $_smarty_tpl->tpl_vars['field_type']->value;?>

            </td>
        </tr>

        <tr id="fieldTR">
            <td class="td-label"><label>字段名：</label></td>
            <td class="td-input">
                <input type="text" class="form-i w200" id="fieldID" name="post[field]" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['field'];?>
"<?php if ($_smarty_tpl->tpl_vars['row']->value['issystem']==1&&$_smarty_tpl->tpl_vars['id']->value&&$_smarty_tpl->tpl_vars['module']->value['issystem']){?> disabled<?php }?> />
            </td>
        </tr>

        <tr>
            <td class="td-label"><label>别名：</label></td>
            <td class="td-input">
                <input type="text" class="form-i w200" id="nameID" name="post[name]" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['name'];?>
" />
            </td>
        </tr>

        <tr class="table-h3">
            <td colspan="2">表单验证</td>
        </tr>

        <tr>
            <td class="td-label"><label>必填：</label></td>
            <td class="td-input">
                <label><input name="post[required]" type="radio" value="1"<?php if ($_smarty_tpl->tpl_vars['row']->value['required']==1){?> checked<?php }?> /> 是 </label>
                <label><input name="post[required]" type="radio" value="0"<?php if (!$_smarty_tpl->tpl_vars['row']->value['required']){?> checked<?php }?> /> 否 </label>
            </td>
        </tr>

        <tr>
            <td class="td-label"><label>验证规则：</label></td>
            <td class="td-input">
                <?php echo $_smarty_tpl->tpl_vars['field_validate']->value;?>

            </td>
        </tr>

        <tr>
            <td class="td-label"><label>验证提示：</label></td>
            <td class="td-input">
                <input type="text" class="form-i w200" name="post[tips]" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['tips'];?>
" />
            </td>
        </tr>

        <tr class="table-h3">
            <td colspan="2">字段相关</td>
        </tr>

        <tr>
            <td colspan="2">
                <div id="field_step"></div>
            </td>
        </tr>

        <tr class="tr-btn">
            <td class="td-label"></td>
            <td class="td-input">
                <button type="submit" name="Submit" class="uiBtn BtnGreen">提&nbsp;&nbsp;交</button>
                <button type="reset" class="uiBtn">重&nbsp;&nbsp;置</button>
            </td>
        </tr>

    </tbody>
    </table>

    </form>
</div>

<script type="text/javascript">
$.loadJs('/admin/js/manage/field.js',function(){
    field.chang_field("<?php echo $_smarty_tpl->tpl_vars['row']->value['type'];?>
","<?php echo $_smarty_tpl->tpl_vars['row']->value['id'];?>
");
});
</script><?php }} ?>