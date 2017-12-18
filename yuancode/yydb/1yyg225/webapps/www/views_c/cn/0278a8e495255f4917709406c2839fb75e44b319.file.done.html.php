<?php /* Smarty version Smarty-3.1.13, created on 2016-12-10 01:44:13
         compiled from "/data/01/html/1yyg225/webapps/www/views/cn/order/done.html" */ ?>
<?php /*%%SmartyHeaderCode:269381666584aed6da55b93-43748590%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0278a8e495255f4917709406c2839fb75e44b319' => 
    array (
      0 => '/data/01/html/1yyg225/webapps/www/views/cn/order/done.html',
      1 => 1469693762,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '269381666584aed6da55b93-43748590',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'order_sn' => 0,
    'payment' => 0,
    'usertype' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_584aed6daa2f83_18656447',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_584aed6daa2f83_18656447')) {function content_584aed6daa2f83_18656447($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div style="padding:200px;" class="tc">
    <h2 style="text-align:center; font-size: 24px;">正在为您跳转支付...</h2>
    <div style="display: none;" id="pay" order_sn="<?php echo $_smarty_tpl->tpl_vars['order_sn']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['payment']->value['pay_button'];?>
</div>
</div>

<script type="text/javascript">
    $(function(){
        $("#pay input").click();
        $('.pb').click();
    });
</script>

<?php if ($_smarty_tpl->tpl_vars['usertype']->value!='zwxpay'){?>
<?php echo $_smarty_tpl->getSubTemplate ("footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php }?><?php }} ?>