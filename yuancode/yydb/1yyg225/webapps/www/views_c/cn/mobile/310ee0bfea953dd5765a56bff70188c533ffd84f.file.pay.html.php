<?php /* Smarty version Smarty-3.1.13, created on 2016-05-24 14:17:30
         compiled from "D:\test1yyg3.lnest.com\webapps\www\views\cn\mobile\yunbuy\pay.html" */ ?>
<?php /*%%SmartyHeaderCode:101865743f1fae8b253-65475985%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '310ee0bfea953dd5765a56bff70188c533ffd84f' => 
    array (
      0 => 'D:\\test1yyg3.lnest.com\\webapps\\www\\views\\cn\\mobile\\yunbuy\\pay.html',
      1 => 1460613259,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '101865743f1fae8b253-65475985',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'payment' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5743f1faf05374_00681689',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5743f1faf05374_00681689')) {function content_5743f1faf05374_00681689($_smarty_tpl) {?><?php if (isset($_smarty_tpl->tpl_vars['header'])) {$_smarty_tpl->tpl_vars['header'] = clone $_smarty_tpl->tpl_vars['header'];
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