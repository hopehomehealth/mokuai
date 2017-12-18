<?php /* Smarty version Smarty-3.1.13, created on 2017-01-12 16:09:11
         compiled from "/data/01/html/1yyg225/webapps/www/views/cn/mobile/order/done.html" */ ?>
<?php /*%%SmartyHeaderCode:556105896587739a7dfad13-41966889%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b21d59334d79a2033e080202d89d87f04e3578da' => 
    array (
      0 => '/data/01/html/1yyg225/webapps/www/views/cn/mobile/order/done.html',
      1 => 1467339302,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '556105896587739a7dfad13-41966889',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'order_sn' => 0,
    'payment' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_587739a7e57d80_97637023',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_587739a7e57d80_97637023')) {function content_587739a7e57d80_97637023($_smarty_tpl) {?><?php if (isset($_smarty_tpl->tpl_vars['header'])) {$_smarty_tpl->tpl_vars['header'] = clone $_smarty_tpl->tpl_vars['header'];
$_smarty_tpl->tpl_vars['header']->value = 'header2'; $_smarty_tpl->tpl_vars['header']->nocache = null; $_smarty_tpl->tpl_vars['header']->scope = 0;
} else $_smarty_tpl->tpl_vars['header'] = new Smarty_variable('header2', null, 0);?>
<?php echo $_smarty_tpl->getSubTemplate ("top.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<link rel="stylesheet" href="/style/mobile/css/order.css">
<div style="text-align:center; margin-top: 150px;" class="tc">
    <h2 style="text-align:center;">正在为您跳转支付...</h2>
    <div id="pay" style="display: none;" order_sn="<?php echo $_smarty_tpl->tpl_vars['order_sn']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['payment']->value['pay_button'];?>
</div>
</div>

<script type="text/javascript">
    $(function(){
        
        var order_sn = $("#pay").attr("order_sn");
        var postdata =  { 'order_sn':order_sn };
        $.ajax({
            url:"/yunbuy/ajaxclear",
            type:"POST",
            data:postdata,
            dataType:"json",
            success:function(data){
            	$("#pay input").click();
            	$('.pb').click();
            }
        });
    });
</script>

</body>
</html><?php }} ?>