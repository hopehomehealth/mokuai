<?php /* Smarty version Smarty-3.1.13, created on 2016-03-02 14:37:58
         compiled from "D:\test1yyg3.lnest.com\webapps\www\views\cn\mobile\order\done.html" */ ?>
<?php /*%%SmartyHeaderCode:3247156d68a46254811-47137534%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8b964e1c53567c71f9b909d9bc5a85f143186b4f' => 
    array (
      0 => 'D:\\test1yyg3.lnest.com\\webapps\\www\\views\\cn\\mobile\\order\\done.html',
      1 => 1456367943,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3247156d68a46254811-47137534',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'payment' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_56d68a4630fad8_61384725',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56d68a4630fad8_61384725')) {function content_56d68a4630fad8_61384725($_smarty_tpl) {?><?php if (isset($_smarty_tpl->tpl_vars['header'])) {$_smarty_tpl->tpl_vars['header'] = clone $_smarty_tpl->tpl_vars['header'];
$_smarty_tpl->tpl_vars['header']->value = 'header2'; $_smarty_tpl->tpl_vars['header']->nocache = null; $_smarty_tpl->tpl_vars['header']->scope = 0;
} else $_smarty_tpl->tpl_vars['header'] = new Smarty_variable('header2', null, 0);?>
<?php echo $_smarty_tpl->getSubTemplate ("top.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<link rel="stylesheet" href="/style/mobile/css/order.css">
<div style="text-align:center; margin-top: 150px;" class="tc">
    <h2 style="text-align:center;">正在为您跳转支付...</h2>
    <div id="pay" style="display: none;"><?php echo $_smarty_tpl->tpl_vars['payment']->value['pay_button'];?>
</div>
</div>

<script type="text/javascript">
    $(function(){
        $("#pay input").click();
    });
</script>

</body>
</html><?php }} ?>