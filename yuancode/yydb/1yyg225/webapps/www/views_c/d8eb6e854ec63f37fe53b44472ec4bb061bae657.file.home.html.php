<?php /* Smarty version Smarty-3.1.13, created on 2016-06-03 09:51:34
         compiled from "D:\test1yyg3\webapps\www\views\manage\home.html" */ ?>
<?php /*%%SmartyHeaderCode:30245750e2a6ae7477-13366757%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd8eb6e854ec63f37fe53b44472ec4bb061bae657' => 
    array (
      0 => 'D:\\test1yyg3\\webapps\\www\\views\\manage\\home.html',
      1 => 1456367947,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '30245750e2a6ae7477-13366757',
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
  'unifunc' => 'content_5750e2a6c14145_44738049',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5750e2a6c14145_44738049')) {function content_5750e2a6c14145_44738049($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
