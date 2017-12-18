<?php /* Smarty version Smarty-3.1.13, created on 2016-02-25 14:53:35
         compiled from "D:\test1yyg3.lnest.com\webapps\www\views\cn\member\pay.html" */ ?>
<?php /*%%SmartyHeaderCode:17328566108cad86d97-27629086%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '26c6e0422ed7c703aef4ecbbd139b72adcc6f612' => 
    array (
      0 => 'D:\\test1yyg3.lnest.com\\webapps\\www\\views\\cn\\member\\pay.html',
      1 => 1456367944,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17328566108cad86d97-27629086',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_566108cae7e5e2_01140318',
  'variables' => 
  array (
    'member' => 0,
    'site_config' => 0,
    'order' => 0,
    'payment_info' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_566108cae7e5e2_01140318')) {function content_566108cae7e5e2_01140318($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<link rel="stylesheet" href="<?php echo url('/style/css/member.css');?>
">
<?php echo $_smarty_tpl->getSubTemplate ("ur_here.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<style type="text/css">
    .pay_button input{ background: #e54048; border: 0; font-size: 22px; color: #fff; font-weight: bold; padding:10px 20px; margin: 10px 0; cursor: pointer }
</style>
<div id="container">
    <div class="fn-clear mt20 pb20">
        <?php echo $_smarty_tpl->getSubTemplate ("member/menu.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

        <div class="fn-right hy-r">
            <div class="fn-clear hy-tjxh">
                <div class="title">
                    <h2>充值确认</h2>
                </div>

                <div class="hy-box">
                    <div style="font-size:18px;color:#000;">尊敬的<b class="color01"><?php echo $_smarty_tpl->tpl_vars['member']->value['username'];?>
</b>用户：</div>
                    <div style="border-top:1px dotted #ccc;border-bottom:1px dotted #ccc;padding:10px 0;margin:10px 0;">
                        <p>商户名称：<b class="color01"><?php echo $_smarty_tpl->tpl_vars['site_config']->value['site_name'];?>
</b></p>
                        <p>您的充值金额为：<b class="color01"><?php echo $_smarty_tpl->tpl_vars['order']->value['surplus_amount'];?>
</b>元</p>
                        <?php if ($_smarty_tpl->tpl_vars['payment_info']->value['pay_fee']){?>
                        <p>支付手续费用为：<b class="color01"><?php echo $_smarty_tpl->tpl_vars['payment_info']->value['pay_fee'];?>
</b>元</p>
                        <?php }?>
                        <p>您选择的支付方式为：<b class="color01"><?php echo $_smarty_tpl->tpl_vars['payment_info']->value['pay_name'];?>
</b></p>
                        <div class="pay_button"><?php echo $_smarty_tpl->tpl_vars['payment_info']->value['pay_button'];?>
</div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<style type="text/css">
.pay_button input{ background: #e54048; border: 0; font-size: 14px; color: #fff; font-weight: bold; padding:10px 20px; margin: 10px 0; cursor: pointer }
</style>
<?php echo $_smarty_tpl->getSubTemplate ("footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>