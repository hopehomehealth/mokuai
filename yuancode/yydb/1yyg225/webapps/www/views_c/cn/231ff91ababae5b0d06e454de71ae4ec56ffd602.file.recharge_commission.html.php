<?php /* Smarty version Smarty-3.1.13, created on 2016-02-27 19:20:08
         compiled from "D:\test1yyg3.lnest.com\webapps\www\views\cn\member\recharge_commission.html" */ ?>
<?php /*%%SmartyHeaderCode:2069556d18668a183b7-70605736%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '231ff91ababae5b0d06e454de71ae4ec56ffd602' => 
    array (
      0 => 'D:\\test1yyg3.lnest.com\\webapps\\www\\views\\cn\\member\\recharge_commission.html',
      1 => 1456367944,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2069556d18668a183b7-70605736',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'L' => 0,
    'member' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_56d18668adbaf1_12586393',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56d18668adbaf1_12586393')) {function content_56d18668adbaf1_12586393($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<link rel="stylesheet" href="/style/css/member.css">
<?php echo $_smarty_tpl->getSubTemplate ("ur_here.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div id="container">
    <div class="fn-clear mt20 pb20">
        <?php echo $_smarty_tpl->getSubTemplate ("member/menu.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

        <div class="fn-right hy-r">
            <div class="fn-clear hy-tjxh">
                <div class="title"><h2>佣金充值<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_yun'];?>
</h2></div>
                <div class="hy-zjfl">
                    <a href="<?php echo url('/member/withdraw_commission');?>
">提现</a> | <a href="<?php echo url('/member/recharge_commission');?>
" class="dq">充值<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_yun'];?>
账户</a>
                </div>
                <div class="hy-yhk">
                <form target="iframeNews" method="post">
                <table>
                    <tr><th>当前可充值佣金：</th><td><b class="color04"><?php echo $_smarty_tpl->tpl_vars['member']->value['commission'];?>
</b> 元 <span class="color03">当佣金余额满1元即可充值</span></td></tr>
                    <tr><th>充值金额：</th><td><input id="txtCZMoney" name="change_money" class="inpt-style2 w100" value="" tip="请输入充值金额" type="text"><b>元</b>&nbsp;<span class="color03">以整数为单位提取</span></td></tr>
                    <tr><th>&nbsp;</th><td><input type="hidden" name="Submit" value="1"/><input type="submit" value="充值" class="hy-btn2"/></td></tr>
                </table>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php echo $_smarty_tpl->getSubTemplate ("footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>