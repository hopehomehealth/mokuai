<?php /* Smarty version Smarty-3.1.13, created on 2015-12-03 10:56:41
         compiled from "F:\WWW\1yyg225\webapps\www\views\cn\yunbuy\pay.html" */ ?>
<?php /*%%SmartyHeaderCode:7939565faf69239a72-95973960%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6ac79be4d3f183eed4be8f947b22bd3eea058785' => 
    array (
      0 => 'F:\\WWW\\1yyg225\\webapps\\www\\views\\cn\\yunbuy\\pay.html',
      1 => 1449043990,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7939565faf69239a72-95973960',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'payment' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_565faf69299849_32307292',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_565faf69299849_32307292')) {function content_565faf69299849_32307292($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div style="padding:200px;" class="tc">
    <h2 style="text-align:center; font-size: 24px;">正在为您跳转支付...</h2>
   <div style="display: none;" id="pay"><?php echo $_smarty_tpl->tpl_vars['payment']->value['pay_button'];?>
</div>
</div>

<script type="text/javascript">
$(function(){
   $("#pay input").click();
});
</script>

<?php echo $_smarty_tpl->getSubTemplate ("footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>