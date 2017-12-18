<?php /* Smarty version Smarty-3.1.13, created on 2016-03-04 16:14:46
         compiled from "D:\test1yyg3.lnest.com\webapps\www\views\manage\bonus\edit.html" */ ?>
<?php /*%%SmartyHeaderCode:1412756ce7b1703a0e0-52261290%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '828227b87899d3820ba65e5f038d9a1251ee1582' => 
    array (
      0 => 'D:\\test1yyg3.lnest.com\\webapps\\www\\views\\manage\\bonus\\edit.html',
      1 => 1457079278,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1412756ce7b1703a0e0-52261290',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_56ce7b171cd732_89631470',
  'variables' => 
  array (
    'row' => 0,
    'L' => 0,
    'money_types' => 0,
    'k' => 0,
    'm' => 0,
    'send_types' => 0,
    'use_days' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56ce7b171cd732_89631470')) {function content_56ce7b171cd732_89631470($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('../public_btn.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<div class="html-box">    <form target="iframeNewsTarget" method="post" action="/manage/bonus/edit">    <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['id'];?>
" />    <table class="table-list">    <tbody>        <tr>            <td class="td-label"><label><?php echo $_smarty_tpl->tpl_vars['L']->value['unit_bonus'];?>
名称：<span class="c-red">*</span></label></td>            <td class="td-input">                <input type="text" class="form-i w200" name="post[title]" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['title'];?>
" />            </td>        </tr>        <tr>            <td class="td-label"><label><?php echo $_smarty_tpl->tpl_vars['L']->value['unit_bonus'];?>
价值：<span class="c-red">*</span></label></td>            <td class="td-input">                <input type="text" class="form-i w100" name="post[money]" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['money'];?>
" <?php if ($_smarty_tpl->tpl_vars['row']->value['money']==1&&$_smarty_tpl->tpl_vars['row']->value['send_type']==1){?>readonly<?php }?> />                <select name="post[money_type]">                    <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['money_types']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['m']->key;
?>                    <option value="<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
"<?php if ($_smarty_tpl->tpl_vars['row']->value['money_type']==$_smarty_tpl->tpl_vars['k']->value){?> selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['m']->value;?>
</option>                    <?php } ?>                </select>            </td>        </tr>        <tr>            <td class="td-label"><label>赠送类型：</label></td>            <td class="td-input">                <select name="post[send_type]">                    <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['send_types']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['m']->key;
?>                    <option value="<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
"<?php if ($_smarty_tpl->tpl_vars['row']->value['send_type']==$_smarty_tpl->tpl_vars['k']->value){?> selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['m']->value;?>
</option>                    <?php } ?>                </select>            </td>        </tr>        <tr>            <td class="td-label"><label>有效时间：</label></td>            <td class="td-input">                <select name="post[use_day]">                    <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['use_days']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['m']->key;
?>                    <option value="<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
"<?php if ($_smarty_tpl->tpl_vars['row']->value['use_day']==$_smarty_tpl->tpl_vars['k']->value){?> selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['m']->value;?>
</option>                    <?php } ?>                </select>            </td>        </tr>        <tr class="tr-btn">            <td class="td-label"></td>            <td class="td-input">                <button type="submit" name="Submit" class="uiBtn BtnGreen">提&nbsp;&nbsp;交</button>                <button type="reset" class="uiBtn">重&nbsp;&nbsp;置</button>            </td>        </tr>    </tbody>    </table>    </form></div><?php }} ?>