<?php /* Smarty version Smarty-3.1.13, created on 2016-12-14 16:37:41
         compiled from "/data/01/html/1yyg225/webapps/www/views/cn/mobile/member/lbi/list_accountlog.html" */ ?>
<?php /*%%SmartyHeaderCode:1539465440585104d5393742-85976422%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5199c68515f4f71e67495bee4926125a63e37a01' => 
    array (
      0 => '/data/01/html/1yyg225/webapps/www/views/cn/mobile/member/lbi/list_accountlog.html',
      1 => 1456367944,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1539465440585104d5393742-85976422',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'm' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_585104d53ee820_44274145',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_585104d53ee820_44274145')) {function content_585104d53ee820_44274145($_smarty_tpl) {?><dt><b><?php echo date('Y-m-d H:i',$_smarty_tpl->tpl_vars['m']->value['add_time']);?>
</b></dt>
<dd>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th>类型</th>
            <td>
                <?php if ($_smarty_tpl->tpl_vars['m']->value['type']==1){?>充值<?php }else{ ?>提现<?php }?>
            </td>
        </tr>
        <tr>
            <th>金额</th>
            <td>
                <b class="color01"><?php echo price_format($_smarty_tpl->tpl_vars['m']->value['amount']);?>
</b>
            </td>
        </tr>
        <tr>
            <th>手续费</th>
            <td>
                <?php echo price_format($_smarty_tpl->tpl_vars['m']->value['fee']);?>

            </td>
        </tr>
        <tr>
            <th>支付方式</th>
            <td>
                <?php echo $_smarty_tpl->tpl_vars['m']->value['pay_name'];?>

            </td>
        </tr>
        <tr>
            <th>处理备注</th>
            <td>
                <?php echo $_smarty_tpl->tpl_vars['m']->value['admin_note'];?>

            </td>
        </tr>
        <tr>
            <th>操作</th>
            <td>
                <?php if ($_smarty_tpl->tpl_vars['m']->value['type']==1&&$_smarty_tpl->tpl_vars['m']->value['status']==1){?><a href="<?php echo url('/member/pay/');?>
<?php echo $_smarty_tpl->tpl_vars['m']->value['id'];?>
" class="color02">付款</a>&nbsp;&nbsp;<?php }?>
                <?php if ($_smarty_tpl->tpl_vars['m']->value['status']==1){?><a href="javascript:zz_confirm('您确认取消该申请？','<?php echo url('/member/account_cancel/');?>
<?php echo $_smarty_tpl->tpl_vars['m']->value['id'];?>
');" class="color02">取消</a><?php }?>
            </td>
        </tr>
    </table>
</dd><?php }} ?>