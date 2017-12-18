<?php /* Smarty version Smarty-3.1.13, created on 2016-02-27 00:25:21
         compiled from "D:\test1yyg3.lnest.com\webapps\www\views\cn\newbie\auction\head.html" */ ?>
<?php /*%%SmartyHeaderCode:1812156d07c71d09ee2-90103309%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4b719fda1f04d2222e4f514bf313827fed5aa0b5' => 
    array (
      0 => 'D:\\test1yyg3.lnest.com\\webapps\\www\\views\\cn\\newbie\\auction\\head.html',
      1 => 1456367945,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1812156d07c71d09ee2-90103309',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'site_config' => 0,
    'type' => 0,
    'url' => 0,
    'L' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_56d07c71db25a1_22847937',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56d07c71db25a1_22847937')) {function content_56d07c71db25a1_22847937($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("top.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<link rel="stylesheet" href="<?php echo url('/style/css/basis.css');?>
">

<div id="wrap">
    <div class="top-box fn-clear">
        <div class="fn-left logo">
            <a href="<?php echo url();?>
"><img src="<?php echo url('/style/images/logo.png');?>
" alt="" /></a>
        </div>
        <div class="fn-right top-r">
            <a href="<?php echo url();?>
">返回<?php echo $_smarty_tpl->tpl_vars['site_config']->value['site_name'];?>
首页>></a>
        </div>
    </div>

    <ul class="nav-box fn-clear">
        <li<?php if ($_smarty_tpl->tpl_vars['type']->value==1){?> class="dq"<?php }?>><a href="<?php echo url(($_smarty_tpl->tpl_vars['url']->value).('index'));?>
">账户注册</a></li>
        <li<?php if ($_smarty_tpl->tpl_vars['type']->value==2){?> class="dq"<?php }?>><a href="<?php echo url(($_smarty_tpl->tpl_vars['url']->value).('zh-index'));?>
">账户设置</a></li>
        <li<?php if ($_smarty_tpl->tpl_vars['type']->value==3){?> class="dq"<?php }?>><a href="<?php echo url(($_smarty_tpl->tpl_vars['url']->value).('cz-index'));?>
">充值<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_pay'];?>
</a></li>
        <li<?php if ($_smarty_tpl->tpl_vars['type']->value==4){?> class="dq"<?php }?>><a href="<?php echo url(($_smarty_tpl->tpl_vars['url']->value).('jp-index'));?>
"><?php echo $_smarty_tpl->tpl_vars['L']->value['unit_pay'];?>
信息</a></li>
    </ul><?php }} ?>