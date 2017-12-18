<?php /* Smarty version Smarty-3.1.13, created on 2016-02-26 10:52:32
         compiled from "D:\test1yyg3.lnest.com\webapps\www\views\cn\mobile\content\lbi\list_share.html" */ ?>
<?php /*%%SmartyHeaderCode:1014856cfbdf0e90c91-28481311%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5269d6ddd0e873fa84d088301d0693a0a5794319' => 
    array (
      0 => 'D:\\test1yyg3.lnest.com\\webapps\\www\\views\\cn\\mobile\\content\\lbi\\list_share.html',
      1 => 1456367943,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1014856cfbdf0e90c91-28481311',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'm' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_56cfbdf10e8499_12603196',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56cfbdf10e8499_12603196')) {function content_56cfbdf10e8499_12603196($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_truncate')) include 'D:\\test1yyg3.lnest.com\\system\\smarty\\plugins\\modifier.truncate.php';
if (!is_callable('smarty_modifier_date_format')) include 'D:\\test1yyg3.lnest.com\\system\\smarty\\plugins\\modifier.date_format.php';
?><p class="title"><a href="<?php echo url(('/content/share?id=').($_smarty_tpl->tpl_vars['m']->value['id']));?>
"><?php echo $_smarty_tpl->tpl_vars['m']->value['obj_name'];?>
<span class="color03">（第<?php echo $_smarty_tpl->tpl_vars['m']->value['qishu'];?>
期）</span></a></p>
<div class="cont ui-clr">
    <div class="pic"><a href="<?php echo url(('/content/share?id=').($_smarty_tpl->tpl_vars['m']->value['id']));?>
"><img src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['zz'][0][0]->_callViewFunc(array('mod'=>'fileurl','source'=>$_smarty_tpl->tpl_vars['m']->value['thumb'],'width'=>200,'type'=>0),$_smarty_tpl);?>
" alt="<?php echo $_smarty_tpl->tpl_vars['m']->value['title'];?>
" /></a></div>
    <div class="txt">
        <p class="mb5"><b style="color:#000"><?php echo $_smarty_tpl->tpl_vars['m']->value['title'];?>
</b></p>
        <a href="<?php echo url(('/content/share?id=').($_smarty_tpl->tpl_vars['m']->value['id']));?>
"><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['m']->value['content'],200);?>
</a>
    </div>
</div>
<div class="author ui-clr">
    <a href="<?php echo url(('/content/share?id=').($_smarty_tpl->tpl_vars['m']->value['id']));?>
" class="color04"><?php echo nickname($_smarty_tpl->tpl_vars['m']->value['username'],$_smarty_tpl->tpl_vars['m']->value['nickname']);?>
</a>
    <time datetime="<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['m']->value['addtime'],'m-d H:i');?>
"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['m']->value['addtime'],'m-d H:i');?>
</time>
</div><?php }} ?>