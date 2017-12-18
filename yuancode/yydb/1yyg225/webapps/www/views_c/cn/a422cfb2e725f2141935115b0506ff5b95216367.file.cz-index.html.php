<?php /* Smarty version Smarty-3.1.13, created on 2016-02-28 13:36:31
         compiled from "D:\test1yyg3.lnest.com\webapps\www\views\cn\newbie\auction\cz-index.html" */ ?>
<?php /*%%SmartyHeaderCode:1562956d2875f69e9c3-55453929%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a422cfb2e725f2141935115b0506ff5b95216367' => 
    array (
      0 => 'D:\\test1yyg3.lnest.com\\webapps\\www\\views\\cn\\newbie\\auction\\cz-index.html',
      1 => 1456367945,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1562956d2875f69e9c3-55453929',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'url' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_56d2875f7d18a2_33774034',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56d2875f7d18a2_33774034')) {function content_56d2875f7d18a2_33774034($_smarty_tpl) {?><?php if (isset($_smarty_tpl->tpl_vars['type'])) {$_smarty_tpl->tpl_vars['type'] = clone $_smarty_tpl->tpl_vars['type'];
$_smarty_tpl->tpl_vars['type']->value = '3'; $_smarty_tpl->tpl_vars['type']->nocache = null; $_smarty_tpl->tpl_vars['type']->scope = 0;
} else $_smarty_tpl->tpl_vars['type'] = new Smarty_variable('3', null, 0);?>
<?php echo $_smarty_tpl->getSubTemplate ("newbie/auction/head.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<ul class="lc-lsit fn-clear">
    <li class="lc-01 dq"><a href="<?php echo url(($_smarty_tpl->tpl_vars['url']->value).('cz-index'));?>
">第1步</a></li>
    <li class="lc-02 "><a href="<?php echo url(($_smarty_tpl->tpl_vars['url']->value).('cz-02'));?>
">第2步</a></li>
    <li class="lc-03 "><a href="<?php echo url(($_smarty_tpl->tpl_vars['url']->value).('cz-03'));?>
">第3步</a></li>
    <li class="lc-04 "><a href="<?php echo url(($_smarty_tpl->tpl_vars['url']->value).('cz-04'));?>
">第4步</a></li>
    <li class="lc-05 "><a href="<?php echo url(($_smarty_tpl->tpl_vars['url']->value).('cz-05'));?>
">第5步</a></li>
    <li class="lc-06 "><a href="<?php echo url(($_smarty_tpl->tpl_vars['url']->value).('cz-06'));?>
">第6步</a></li>
</ul>
<div class="lc-box">
    <img src="<?php echo url('/style/images/newbie/cz-1.gif');?>
" alt="" />
    <div class="cz-01">
        <a href="<?php echo url(($_smarty_tpl->tpl_vars['url']->value).('cz-02'));?>
"></a>
    </div>
</div>
<?php echo $_smarty_tpl->getSubTemplate ("newbie/auction/foot.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php }} ?>