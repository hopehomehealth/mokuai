<?php /* Smarty version Smarty-3.1.13, created on 2016-02-25 15:58:34
         compiled from "D:\test1yyg3.lnest.com\webapps\www\views\manage\content\edit.html" */ ?>
<?php /*%%SmartyHeaderCode:21585660fbdacc9071-82373047%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0880e8ad5093044d82b6613a9f499b90be5bdfa7' => 
    array (
      0 => 'D:\\test1yyg3.lnest.com\\webapps\\www\\views\\manage\\content\\edit.html',
      1 => 1456367946,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '21585660fbdacc9071-82373047',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5660fbdadf35c7_07879003',
  'variables' => 
  array (
    'moduleinfo' => 0,
    'row' => 0,
    'fieldsinfo' => 0,
    'm' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5660fbdadf35c7_07879003')) {function content_5660fbdadf35c7_07879003($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('../public_btn.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="html-box">
    <form target="iframeNewsTarget" method="post" action="/manage/content/edit/<?php echo $_smarty_tpl->tpl_vars['moduleinfo']->value['name'];?>
" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['id'];?>
" />

    <table class="table-list">
    <tbody>
        <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['fieldsinfo']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>
        <tr>
            <td class="td-label"><label><?php echo $_smarty_tpl->tpl_vars['m']->value['name'];?>
：<?php if ($_smarty_tpl->tpl_vars['m']->value['required']){?><span class="c-red"> *</span><?php }?></label></td>
            <td class="td-input">
                <?php echo $_smarty_tpl->tpl_vars['m']->value['html'];?>

            </td>
        </tr>
        <?php } ?>

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
$.loadJs('/admin/js/manage/linkage.js',function(){

});
</script><?php }} ?>