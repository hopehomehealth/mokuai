<?php /* Smarty version Smarty-3.1.13, created on 2016-12-14 13:34:16
         compiled from "/data/01/html/1yyg225/webapps/www/views/cn/mobile/yunbuy/success.html" */ ?>
<?php /*%%SmartyHeaderCode:14562551365850d9d800cdd7-46840580%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fcb5ded7728cff7e65490332d1f2a71895a90af4' => 
    array (
      0 => '/data/01/html/1yyg225/webapps/www/views/cn/mobile/yunbuy/success.html',
      1 => 1456367944,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '14562551365850d9d800cdd7-46840580',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'L' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5850d9d8098157_13356956',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5850d9d8098157_13356956')) {function content_5850d9d8098157_13356956($_smarty_tpl) {?><?php if (isset($_smarty_tpl->tpl_vars['header'])) {$_smarty_tpl->tpl_vars['header'] = clone $_smarty_tpl->tpl_vars['header'];
$_smarty_tpl->tpl_vars['header']->value = 'header2'; $_smarty_tpl->tpl_vars['header']->nocache = null; $_smarty_tpl->tpl_vars['header']->scope = 0;
} else $_smarty_tpl->tpl_vars['header'] = new Smarty_variable('header2', null, 0);?>
<?php echo $_smarty_tpl->getSubTemplate ("top.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<style type="text/css">
    .pay_success{ padding: 30px; font-size: 12px; }
    .pay_success h2{ font-size: 16px;}
    .pay_success .p1{ font-weight: bold; font-size: 12px; }
    .pay_success .p2{ font-size: 12px; }
    .share_box{ margin: 10px 0 0; padding:10px;background:#ececec;border-radius:5px; }
</style>
<div id="content" class="container main">
    <div class="pay_success">
        <h2 class="color01">恭喜您，支付成功！</h2>
        <p class="p1">请等待系统为您揭晓！</p>
        <p class="p2">您现在可以
            <a href="<?php echo url('/member/db');?>
" class="color02">查看<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_yun'];?>
记录</a> 或
            <a href="<?php echo url('/yunbuy');?>
" class="color02">继续<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_yun'];?>
</a>
        </p>
    </div>
</div><?php }} ?>