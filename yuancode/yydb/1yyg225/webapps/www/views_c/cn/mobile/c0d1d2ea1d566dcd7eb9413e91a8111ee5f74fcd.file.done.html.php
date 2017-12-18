<?php /* Smarty version Smarty-3.1.13, created on 2015-12-03 10:47:26
         compiled from "F:\WWW\1yyg225\webapps\www\views\cn\mobile\order\done.html" */ ?>
<?php /*%%SmartyHeaderCode:29972565fad3e0e0774-50912744%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c0d1d2ea1d566dcd7eb9413e91a8111ee5f74fcd' => 
    array (
      0 => 'F:\\WWW\\1yyg225\\webapps\\www\\views\\cn\\mobile\\order\\done.html',
      1 => 1449048309,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '29972565fad3e0e0774-50912744',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'payment' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_565fad3e13a164_09636806',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_565fad3e13a164_09636806')) {function content_565fad3e13a164_09636806($_smarty_tpl) {?><?php if (isset($_smarty_tpl->tpl_vars['header'])) {$_smarty_tpl->tpl_vars['header'] = clone $_smarty_tpl->tpl_vars['header'];
$_smarty_tpl->tpl_vars['header']->value = 'header2'; $_smarty_tpl->tpl_vars['header']->nocache = null; $_smarty_tpl->tpl_vars['header']->scope = 0;
} else $_smarty_tpl->tpl_vars['header'] = new Smarty_variable('header2', null, 0);?>
<?php echo $_smarty_tpl->getSubTemplate ("top.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<link rel="stylesheet" href="/style/mobile/css/order.css">
<div style="text-align:center" class="tc">
    <h2 style="text-align:center;">正在为您跳转支付...</h2>
    <div style="display: none;" id="pay"><?php echo $_smarty_tpl->tpl_vars['payment']->value['pay_button'];?>
</div>
</div>

<script type="text/javascript">
    $(function(){
        $("#pay input").click();
    });
</script>

</body>
</html><?php }} ?>