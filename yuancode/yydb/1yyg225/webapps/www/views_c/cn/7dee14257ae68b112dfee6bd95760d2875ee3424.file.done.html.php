<?php /* Smarty version Smarty-3.1.13, created on 2015-12-03 10:31:55
         compiled from "F:\WWW\1yyg225\webapps\www\views\cn\order\done.html" */ ?>
<?php /*%%SmartyHeaderCode:9453565fa99b7e7724-15471720%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7dee14257ae68b112dfee6bd95760d2875ee3424' => 
    array (
      0 => 'F:\\WWW\\1yyg225\\webapps\\www\\views\\cn\\order\\done.html',
      1 => 1449046718,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9453565fa99b7e7724-15471720',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'payment' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_565fa99b83c0f0_80270570',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_565fa99b83c0f0_80270570')) {function content_565fa99b83c0f0_80270570($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

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