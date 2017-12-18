<?php /* Smarty version Smarty-3.1.13, created on 2015-12-02 14:14:38
         compiled from "E:\projects\web\lnest\1yyg225\webapps\www\views\cn\yunbuy\pay.html" */ ?>
<?php /*%%SmartyHeaderCode:27796565e8c4e2ae6d9-19846052%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b271223e2ddba74627773ad94d6dc7baba521c15' => 
    array (
      0 => 'E:\\projects\\web\\lnest\\1yyg225\\webapps\\www\\views\\cn\\yunbuy\\pay.html',
      1 => 1418283576,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '27796565e8c4e2ae6d9-19846052',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'payment' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_565e8c4e2ecee0_10561209',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_565e8c4e2ecee0_10561209')) {function content_565e8c4e2ecee0_10561209($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

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