<?php /* Smarty version Smarty-3.1.13, created on 2017-01-13 11:00:35
         compiled from "/data/01/html/1yyg225/webapps/www/views/cn/mobile/yunbuy/pay.html" */ ?>
<?php /*%%SmartyHeaderCode:666180579587842d3c01924-98403734%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9f162afb42d5069afa9749038fdc6162ca40602f' => 
    array (
      0 => '/data/01/html/1yyg225/webapps/www/views/cn/mobile/yunbuy/pay.html',
      1 => 1460613260,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '666180579587842d3c01924-98403734',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'payment' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_587842d3c403c8_26799826',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_587842d3c403c8_26799826')) {function content_587842d3c403c8_26799826($_smarty_tpl) {?><?php if (isset($_smarty_tpl->tpl_vars['header'])) {$_smarty_tpl->tpl_vars['header'] = clone $_smarty_tpl->tpl_vars['header'];
$_smarty_tpl->tpl_vars['header']->value = 'header2'; $_smarty_tpl->tpl_vars['header']->nocache = null; $_smarty_tpl->tpl_vars['header']->scope = 0;
} else $_smarty_tpl->tpl_vars['header'] = new Smarty_variable('header2', null, 0);?>
<?php echo $_smarty_tpl->getSubTemplate ("top.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div style="padding:10px 0;">
    <h2 style="text-align:center; font-size:18px;">正在为您跳转支付...</h2>
    <div style="display:none;" id="pay"><?php echo $_smarty_tpl->tpl_vars['payment']->value['pay_button'];?>
</div>
</div>

<script type="text/javascript">
    $(function(){
        $("#pay input").click();
    });
</script>
<?php }} ?>