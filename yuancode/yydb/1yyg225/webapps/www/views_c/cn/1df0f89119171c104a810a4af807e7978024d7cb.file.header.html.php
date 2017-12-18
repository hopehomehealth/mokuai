<?php /* Smarty version Smarty-3.1.13, created on 2016-04-10 15:36:43
         compiled from "D:\test1yyg3.lnest.com\webapps\www\views\cn\disk\header.html" */ ?>
<?php /*%%SmartyHeaderCode:3185656cea306e5ee31-89640555%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1df0f89119171c104a810a4af807e7978024d7cb' => 
    array (
      0 => 'D:\\test1yyg3.lnest.com\\webapps\\www\\views\\cn\\disk\\header.html',
      1 => 1459401989,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3185656cea306e5ee31-89640555',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_56cea30704b852_02537927',
  'variables' => 
  array (
    'member' => 0,
    'L' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56cea30704b852_02537927')) {function content_56cea30704b852_02537927($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_truncate')) include 'D:\\test1yyg3.lnest.com\\system\\smarty\\plugins\\modifier.truncate.php';
?><div class="gr_header">
  <div class="left"><a href="/disk/index"><img src="/images/xz_logo1.png"></a></div>
  <div class="right"><p>欢迎您:<?php if ($_smarty_tpl->tpl_vars['member']->value['nickname']){?><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['member']->value['nickname'],6);?>
<?php }else{ ?><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['member']->value['username'],6);?>
<?php }?>&nbsp;&nbsp;&nbsp;&nbsp;<a href="/" target="_blank"><?php echo $_smarty_tpl->tpl_vars['L']->value['unit_yun'];?>
首页</a><a href="/member/doexit">[退出]</a></p></div>
</div><?php }} ?>