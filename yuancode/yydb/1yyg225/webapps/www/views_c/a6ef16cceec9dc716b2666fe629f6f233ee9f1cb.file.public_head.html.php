<?php /* Smarty version Smarty-3.1.13, created on 2016-12-05 16:05:24
         compiled from "/data/01/html/1yyg225/webapps/www/views/manage/public_head.html" */ ?>
<?php /*%%SmartyHeaderCode:45212262958451fc4cbb148-53504859%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a6ef16cceec9dc716b2666fe629f6f233ee9f1cb' => 
    array (
      0 => '/data/01/html/1yyg225/webapps/www/views/manage/public_head.html',
      1 => 1469247154,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '45212262958451fc4cbb148-53504859',
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
  'unifunc' => 'content_58451fc4cdac25_71734986',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58451fc4cdac25_71734986')) {function content_58451fc4cdac25_71734986($_smarty_tpl) {?><div id="img-overlay"></div>
" class="c-gray" target="_blank"><?php echo $_smarty_tpl->tpl_vars['common']->value['site_name'];?>
</a>
 $_from = $_smarty_tpl->tpl_vars['menus']->value[0]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>
</span>
</span>
&com=xshow|编辑管理员（<?php echo @constant('USER');?>
）" class="item-link">修改密码</a> <i>|</i>