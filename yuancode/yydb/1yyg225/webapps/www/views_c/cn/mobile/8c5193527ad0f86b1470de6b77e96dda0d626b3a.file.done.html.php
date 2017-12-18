<?php /* Smarty version Smarty-3.1.13, created on 2015-12-02 17:24:36
         compiled from "E:\projects\web\lnest\1yyg225\webapps\www\views\cn\mobile\order\done.html" */ ?>
<?php /*%%SmartyHeaderCode:14346565eb81bbacb21-35725331%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8c5193527ad0f86b1470de6b77e96dda0d626b3a' => 
    array (
      0 => 'E:\\projects\\web\\lnest\\1yyg225\\webapps\\www\\views\\cn\\mobile\\order\\done.html',
      1 => 1449048248,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '14346565eb81bbacb21-35725331',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_565eb81bbef1b3_36989549',
  'variables' => 
  array (
    'payment' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_565eb81bbef1b3_36989549')) {function content_565eb81bbef1b3_36989549($_smarty_tpl) {?><?php if (isset($_smarty_tpl->tpl_vars['header'])) {$_smarty_tpl->tpl_vars['header'] = clone $_smarty_tpl->tpl_vars['header'];
$_smarty_tpl->tpl_vars['header']->value = 'header2'; $_smarty_tpl->tpl_vars['header']->nocache = null; $_smarty_tpl->tpl_vars['header']->scope = 0;
} else $_smarty_tpl->tpl_vars['header'] = new Smarty_variable('header2', null, 0);?>
<?php echo $_smarty_tpl->getSubTemplate ("top.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<link rel="stylesheet" href="/style/mobile/css/order.css">
<div style="padding:200px;" class="tc">
    <h2 style="text-align:center; font-size: 2rem;">正在为您跳转支付...</h2>
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