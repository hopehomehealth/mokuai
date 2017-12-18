<?php /* Smarty version Smarty-3.1.13, created on 2016-02-27 00:25:21
         compiled from "D:\test1yyg3.lnest.com\webapps\www\views\cn\newbie\auction\zh-index.html" */ ?>
<?php /*%%SmartyHeaderCode:584056d07c71a676a0-92440607%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f5ec60024b66338c2312a12c38e0883cd3413bd3' => 
    array (
      0 => 'D:\\test1yyg3.lnest.com\\webapps\\www\\views\\cn\\newbie\\auction\\zh-index.html',
      1 => 1456367945,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '584056d07c71a676a0-92440607',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'url' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_56d07c71bc1032_49882595',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56d07c71bc1032_49882595')) {function content_56d07c71bc1032_49882595($_smarty_tpl) {?><?php if (isset($_smarty_tpl->tpl_vars['type'])) {$_smarty_tpl->tpl_vars['type'] = clone $_smarty_tpl->tpl_vars['type'];
$_smarty_tpl->tpl_vars['type']->value = '2'; $_smarty_tpl->tpl_vars['type']->nocache = null; $_smarty_tpl->tpl_vars['type']->scope = 0;
} else $_smarty_tpl->tpl_vars['type'] = new Smarty_variable('2', null, 0);?>
<?php echo $_smarty_tpl->getSubTemplate ("newbie/auction/head.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<ul class="lc-lsit fn-clear">
    <li class="lc-01 dq"><a href="zh-index.html<?php echo url(($_smarty_tpl->tpl_vars['url']->value).('zh-index'));?>
">第1步</a></li>
    <li class="lc-02 "><a href="<?php echo url(($_smarty_tpl->tpl_vars['url']->value).('zh-02'));?>
">第2步</a></li>
    <li class="lc-03 "><a href="<?php echo url(($_smarty_tpl->tpl_vars['url']->value).('zh-03'));?>
">第3步</a></li>
    <li class="lc-04 "><a href="<?php echo url(($_smarty_tpl->tpl_vars['url']->value).('zh-04'));?>
">第4步</a></li>
    <li class="lc-05 "><a href="<?php echo url(($_smarty_tpl->tpl_vars['url']->value).('zh-05'));?>
">第5步</a></li>
    <li class="lc-06 "><a href="<?php echo url(($_smarty_tpl->tpl_vars['url']->value).('zh-06'));?>
">第6步</a></li>
    <li class="lc-07 "><a href="<?php echo url(($_smarty_tpl->tpl_vars['url']->value).('zh-07'));?>
">第7步</a></li>
    <li class="lc-08 "><a href="<?php echo url(($_smarty_tpl->tpl_vars['url']->value).('zh-08'));?>
">第8步</a></li>
    <li class="lc-09 "><a href="<?php echo url(($_smarty_tpl->tpl_vars['url']->value).('zh-09'));?>
">第9步</a></li>
    <li class="lc-010 "><a href="<?php echo url(($_smarty_tpl->tpl_vars['url']->value).('zh-10'));?>
">第10步</a></li>
</ul>
<div class="lc-box">
    <img src="<?php echo url('/style/images/newbie/zh-1.gif');?>
" alt="" />
    <div class="zh-01">
        <a href="<?php echo url(($_smarty_tpl->tpl_vars['url']->value).('zh-02'));?>
"></a>
    </div>
</div>
<?php echo $_smarty_tpl->getSubTemplate ("newbie/auction/foot.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php }} ?>