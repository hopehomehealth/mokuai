<?php /* Smarty version Smarty-3.1.13, created on 2016-05-25 14:08:58
         compiled from "D:\test1yyg3.lnest.com\webapps\www\views\cn\mobile\member\lbi\list_accountdetail.html" */ ?>
<?php /*%%SmartyHeaderCode:200956d41d85a0c9d2-69689686%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'dd34c814e6ea2dd9b23e193345426d3a1f60c9f4' => 
    array (
      0 => 'D:\\test1yyg3.lnest.com\\webapps\\www\\views\\cn\\mobile\\member\\lbi\\list_accountdetail.html',
      1 => 1464092364,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '200956d41d85a0c9d2-69689686',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_56d41d85b113a4_59284963',
  'variables' => 
  array (
    'm' => 0,
    'L' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56d41d85b113a4_59284963')) {function content_56d41d85b113a4_59284963($_smarty_tpl) {?><dt><b><?php echo date('Y-m-d H:i',$_smarty_tpl->tpl_vars['m']->value['logtime']);?>
</b></dt>
<dd>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th>类型</th>
            <td>
                <?php echo $_smarty_tpl->tpl_vars['m']->value['stage_title'];?>

            </td>
        </tr>
        <?php if ($_smarty_tpl->tpl_vars['m']->value['amount']>0||$_smarty_tpl->tpl_vars['m']->value['amount']<0){?>
        <tr>
            <th>第三方支付</th>
            <td>
                <b class="color01"><?php echo $_smarty_tpl->tpl_vars['m']->value['amount'];?>
</b>
            </td>
        </tr>
        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['m']->value['user_money']>0||$_smarty_tpl->tpl_vars['m']->value['user_money']<0){?>
        <tr>
            <th>可用金额</th>
            <td>
                <b class="color01"><?php echo $_smarty_tpl->tpl_vars['m']->value['user_money'];?>
</b>
            </td>
        </tr>
        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['m']->value['frozen_money']>0||$_smarty_tpl->tpl_vars['m']->value['frozen_money']<0){?>
        <tr>
            <th>冻结金额</th>
            <td>
                <b class="color01"><?php echo $_smarty_tpl->tpl_vars['m']->value['frozen_money'];?>
</b>
            </td>
        </tr>
        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['m']->value['db_points']>0||$_smarty_tpl->tpl_vars['m']->value['db_points']<0){?>
        <tr>
            <th><?php echo $_smarty_tpl->tpl_vars['L']->value['unit_db_points'];?>
</th>
            <td>
                <?php echo $_smarty_tpl->tpl_vars['m']->value['db_points'];?>

            </td>
        </tr>
        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['m']->value['pay_points']>0||$_smarty_tpl->tpl_vars['m']->value['pay_points']<0){?>
        <tr>
            <th><?php echo $_smarty_tpl->tpl_vars['L']->value['unit_pay_points'];?>
</th>
            <td>
                <?php echo $_smarty_tpl->tpl_vars['m']->value['pay_points'];?>

            </td>
        </tr>
        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['m']->value['rank_points']>0||$_smarty_tpl->tpl_vars['m']->value['rank_points']<0){?>
        <tr>
            <th>经验值</th>
            <td>
                <?php echo $_smarty_tpl->tpl_vars['m']->value['rank_points'];?>

            </td>
        </tr>
        <?php }?>
        <tr>
            <th>备注</th>
            <td>
                <?php echo $_smarty_tpl->tpl_vars['m']->value['desc'];?>

            </td>
        </tr>
    </table>
</dd><?php }} ?>