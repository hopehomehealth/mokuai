<?php /* Smarty version Smarty-3.1.13, created on 2016-12-15 09:20:40
         compiled from "/data/01/html/1yyg225/webapps/www/views/cn/member/pay.html" */ ?>
<?php /*%%SmartyHeaderCode:15907313005851efe8eec5a8-09629291%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e66ad0f3529162aebc6bbac5e6884a171edcf61a' => 
    array (
      0 => '/data/01/html/1yyg225/webapps/www/views/cn/member/pay.html',
      1 => 1456367946,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15907313005851efe8eec5a8-09629291',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'member' => 0,
    'site_config' => 0,
    'order' => 0,
    'payment_info' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5851efe9008085_16514099',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5851efe9008085_16514099')) {function content_5851efe9008085_16514099($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

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