<?php /* Smarty version Smarty-3.1.13, created on 2016-04-25 15:25:27
         compiled from "D:\test1yyg3.lnest.com\webapps\www\views\cn\order\done.html" */ ?>
<?php /*%%SmartyHeaderCode:1491456d50e8c024438-09644484%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6d941f98510cde9f57d9fbde7b5e22cff930440c' => 
    array (
      0 => 'D:\\test1yyg3.lnest.com\\webapps\\www\\views\\cn\\order\\done.html',
      1 => 1461225497,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1491456d50e8c024438-09644484',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_56d50e8c0cc2c1_22043871',
  'variables' => 
  array (
    'order_sn' => 0,
    'payment' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56d50e8c0cc2c1_22043871')) {function content_56d50e8c0cc2c1_22043871($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div style="padding:200px;" class="tc">
    <h2 style="text-align:center; font-size: 24px;">正在为您跳转支付...</h2>
    <div style="display: none;" id="pay" order_sn="<?php echo $_smarty_tpl->tpl_vars['order_sn']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['payment']->value['pay_button'];?>
</div>
</div>

<script type="text/javascript">
    $(function(){
        $("#pay input").click();
    });
</script>

<?php echo $_smarty_tpl->getSubTemplate ("footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>