<?php /* Smarty version Smarty-3.1.13, created on 2015-12-01 18:58:09
         compiled from "E:\projects\web\lnest\1yyg225\webapps\www\views\manage\public_head.html" */ ?>
<?php /*%%SmartyHeaderCode:468565d7d41eea728-90124626%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9e5ede16ec4f65e2f4d596c57a7e40eafa42bb96' => 
    array (
      0 => 'E:\\projects\\web\\lnest\\1yyg225\\webapps\\www\\views\\manage\\public_head.html',
      1 => 1448963764,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '468565d7d41eea728-90124626',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'common' => 0,
    'menus' => 0,
    'm' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_565d7d41f156b0_44101172',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_565d7d41f156b0_44101172')) {function content_565d7d41f156b0_44101172($_smarty_tpl) {?><div id="img-overlay"></div>
</a>
 $_from = $_smarty_tpl->tpl_vars['menus']->value[0]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>
</span>
</span>
&com=xshow|编辑管理员（<?php echo @constant('USER');?>
）" class="item-link">修改密码</a> <i>|</i>