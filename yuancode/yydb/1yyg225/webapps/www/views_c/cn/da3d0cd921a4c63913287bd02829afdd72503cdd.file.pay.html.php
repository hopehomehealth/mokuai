<?php /* Smarty version Smarty-3.1.13, created on 2016-04-06 14:09:42
         compiled from "D:\test1yyg3.lnest.com\webapps\www\views\cn\yunbuy\pay.html" */ ?>
<?php /*%%SmartyHeaderCode:225585704a826a7d8c3-76587170%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'da3d0cd921a4c63913287bd02829afdd72503cdd' => 
    array (
      0 => 'D:\\test1yyg3.lnest.com\\webapps\\www\\views\\cn\\yunbuy\\pay.html',
      1 => 1456367945,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '225585704a826a7d8c3-76587170',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'payment' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5704a826af79e9_35885677',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5704a826af79e9_35885677')) {function content_5704a826af79e9_35885677($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

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