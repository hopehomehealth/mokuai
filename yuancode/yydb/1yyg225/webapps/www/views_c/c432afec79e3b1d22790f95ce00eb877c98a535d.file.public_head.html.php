<?php /* Smarty version Smarty-3.1.13, created on 2016-06-21 10:35:09
         compiled from "E:\projects\web\1yyg\1yyg225_0016\webapps\www\views\manage\public_head.html" */ ?>
<?php /*%%SmartyHeaderCode:134175768a7dde0db70-49294530%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c432afec79e3b1d22790f95ce00eb877c98a535d' => 
    array (
      0 => 'E:\\projects\\web\\1yyg\\1yyg225_0016\\webapps\\www\\views\\manage\\public_head.html',
      1 => 1456367946,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '134175768a7dde0db70-49294530',
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
  'unifunc' => 'content_5768a7dde39df6_83190561',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5768a7dde39df6_83190561')) {function content_5768a7dde39df6_83190561($_smarty_tpl) {?><div id="img-overlay"></div>
</a>
 $_from = $_smarty_tpl->tpl_vars['menus']->value[0]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>
</span>
</span>
&com=xshow|编辑管理员（<?php echo @constant('USER');?>
）" class="item-link">修改密码</a> <i>|</i>