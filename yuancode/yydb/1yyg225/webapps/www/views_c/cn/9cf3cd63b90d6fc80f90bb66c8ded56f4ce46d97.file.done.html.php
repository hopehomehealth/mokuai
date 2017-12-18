<?php /* Smarty version Smarty-3.1.13, created on 2015-12-02 16:59:35
         compiled from "E:\projects\web\lnest\1yyg225\webapps\www\views\cn\order\done.html" */ ?>
<?php /*%%SmartyHeaderCode:23526565e692cb1d094-86445304%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9cf3cd63b90d6fc80f90bb66c8ded56f4ce46d97' => 
    array (
      0 => 'E:\\projects\\web\\lnest\\1yyg225\\webapps\\www\\views\\cn\\order\\done.html',
      1 => 1449046718,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '23526565e692cb1d094-86445304',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_565e692cb8a6b0_31343820',
  'variables' => 
  array (
    'payment' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_565e692cb8a6b0_31343820')) {function content_565e692cb8a6b0_31343820($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

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