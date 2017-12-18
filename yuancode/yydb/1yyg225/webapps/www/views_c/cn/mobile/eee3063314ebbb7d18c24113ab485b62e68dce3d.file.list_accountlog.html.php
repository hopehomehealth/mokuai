<?php /* Smarty version Smarty-3.1.13, created on 2016-02-29 18:36:44
         compiled from "D:\test1yyg3.lnest.com\webapps\www\views\cn\mobile\member\lbi\list_accountlog.html" */ ?>
<?php /*%%SmartyHeaderCode:1750256d41f3ca70be7-78363237%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'eee3063314ebbb7d18c24113ab485b62e68dce3d' => 
    array (
      0 => 'D:\\test1yyg3.lnest.com\\webapps\\www\\views\\cn\\mobile\\member\\lbi\\list_accountlog.html',
      1 => 1456367943,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1750256d41f3ca70be7-78363237',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'm' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_56d41f3cbc8bd6_36773984',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56d41f3cbc8bd6_36773984')) {function content_56d41f3cbc8bd6_36773984($_smarty_tpl) {?><dt><b><?php echo date('Y-m-d H:i',$_smarty_tpl->tpl_vars['m']->value['add_time']);?>
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