<?php /* Smarty version Smarty-3.1.13, created on 2016-07-22 16:37:41
         compiled from "E:\projects\web\1yyg\1yyg225_full\webapps\www\views\manage\public_head.html" */ ?>
<?php /*%%SmartyHeaderCode:12870576a3dc28b48b2-81663932%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c5b1d0dfb8ba555fc43bd12e65c3bff81f2bd1d1' => 
    array (
      0 => 'E:\\projects\\web\\1yyg\\1yyg225_full\\webapps\\www\\views\\manage\\public_head.html',
      1 => 1468326727,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12870576a3dc28b48b2-81663932',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_576a3dc28dcb42_83369441',
  'variables' => 
  array (
    'common' => 0,
    'menus' => 0,
    'm' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_576a3dc28dcb42_83369441')) {function content_576a3dc28dcb42_83369441($_smarty_tpl) {?><div id="img-overlay"></div>
</a>
 $_from = $_smarty_tpl->tpl_vars['menus']->value[0]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>
</span>
</span>
&com=xshow|编辑管理员（<?php echo @constant('USER');?>
）" class="item-link">修改密码</a> <i>|</i>