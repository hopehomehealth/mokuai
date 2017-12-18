<?php /* Smarty version Smarty-3.1.13, created on 2016-03-07 17:16:19
         compiled from "D:\test1yyg3.lnest.com\webapps\www\views\cn\newbie\auction\index.html" */ ?>
<?php /*%%SmartyHeaderCode:1526856dd46e34f1847-99041249%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5b2b355ee583d9a9156736c218ce107707e0f8aa' => 
    array (
      0 => 'D:\\test1yyg3.lnest.com\\webapps\\www\\views\\cn\\newbie\\auction\\index.html',
      1 => 1456367945,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1526856dd46e34f1847-99041249',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'url' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_56dd46e3635958_08649365',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56dd46e3635958_08649365')) {function content_56dd46e3635958_08649365($_smarty_tpl) {?><?php if (isset($_smarty_tpl->tpl_vars['type'])) {$_smarty_tpl->tpl_vars['type'] = clone $_smarty_tpl->tpl_vars['type'];
$_smarty_tpl->tpl_vars['type']->value = '1'; $_smarty_tpl->tpl_vars['type']->nocache = null; $_smarty_tpl->tpl_vars['type']->scope = 0;
} else $_smarty_tpl->tpl_vars['type'] = new Smarty_variable('1', null, 0);?>
<?php echo $_smarty_tpl->getSubTemplate ("newbie/auction/head.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<ul class="lc-lsit fn-clear">
    <li class="lc-01 dq"><a href="<?php echo url(($_smarty_tpl->tpl_vars['url']->value).('index'));?>
">第1步</a></li>
    <li class="lc-02"><a href="<?php echo url(($_smarty_tpl->tpl_vars['url']->value).('zc-02'));?>
">第2步</a></li>
</ul>
<div class="lc-box">
    <img src="<?php echo url('/style/images/newbie/zc1.gif');?>
" alt="" />
    <div class="zc-01">
        <a href="<?php echo url(($_smarty_tpl->tpl_vars['url']->value).('zc-02'));?>
"></a>
    </div>
</div>
<?php echo $_smarty_tpl->getSubTemplate ("newbie/auction/foot.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>