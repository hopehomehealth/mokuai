<?php /* Smarty version Smarty-3.1.13, created on 2016-06-22 15:26:58
         compiled from "E:\projects\web\1yyg\1yyg225_full\webapps\www\views\manage\home.html" */ ?>
<?php /*%%SmartyHeaderCode:15905576a3dc279d576-11148939%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'abfb21967d05d25546b3339c12e9a62028f98f60' => 
    array (
      0 => 'E:\\projects\\web\\1yyg\\1yyg225_full\\webapps\\www\\views\\manage\\home.html',
      1 => 1456367947,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15905576a3dc279d576-11148939',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'L' => 0,
    'favicon' => 0,
    'subMenu' => 0,
    'vor' => 0,
    'menus' => 0,
    'k' => 0,
    'subkey' => 0,
    'm' => 0,
    'n' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_576a3dc28a5558_38737890',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_576a3dc28a5558_38737890')) {function content_576a3dc28a5558_38737890($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
后台管理</title>

.css?a=1" type="text/css" />
;
";

 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['menus']->value[0]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['menu']->key => $_smarty_tpl->tpl_vars['menu']->value){
$_smarty_tpl->tpl_vars['menu']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['menu']->key;
?>
 $_smarty_tpl->tpl_vars['subkey'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['menus']->value[$_smarty_tpl->tpl_vars['k']->value]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
 $_smarty_tpl->tpl_vars['subkey']->value = $_smarty_tpl->tpl_vars['m']->key;
?>
" href="javascript:;" class="has-childs">
</i><?php }?><span><?php echo $_smarty_tpl->tpl_vars['m']->value['name'];?>
</span>
" href="#!<?php echo $_smarty_tpl->tpl_vars['m']->value['mod'];?>
<?php if ($_smarty_tpl->tpl_vars['m']->value['action']){?>/<?php echo $_smarty_tpl->tpl_vars['m']->value['action'];?>
<?php }?><?php if ($_smarty_tpl->tpl_vars['m']->value['param']){?>/<?php echo $_smarty_tpl->tpl_vars['m']->value['param'];?>
<?php }?>">
</i><?php }?><span><?php echo $_smarty_tpl->tpl_vars['m']->value['name'];?>
</span>
 $_from = $_smarty_tpl->tpl_vars['menus']->value[$_smarty_tpl->tpl_vars['subkey']->value]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['n']->key => $_smarty_tpl->tpl_vars['n']->value){
$_smarty_tpl->tpl_vars['n']->_loop = true;
?>
" href="#!<?php echo $_smarty_tpl->tpl_vars['n']->value['mod'];?>
<?php if ($_smarty_tpl->tpl_vars['n']->value['action']){?>/<?php echo $_smarty_tpl->tpl_vars['n']->value['action'];?>
<?php }?><?php if ($_smarty_tpl->tpl_vars['n']->value['param']){?>/<?php echo $_smarty_tpl->tpl_vars['n']->value['param'];?>
<?php }?>">
</span>
</a>后台系统</span>
