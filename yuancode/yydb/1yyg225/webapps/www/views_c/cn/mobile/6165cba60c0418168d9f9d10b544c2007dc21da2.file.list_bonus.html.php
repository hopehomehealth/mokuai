<?php /* Smarty version Smarty-3.1.13, created on 2017-01-11 20:51:02
         compiled from "/data/01/html/1yyg225/webapps/www/views/cn/mobile/member/lbi/list_bonus.html" */ ?>
<?php /*%%SmartyHeaderCode:161691290158762a367f4b53-46730942%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6165cba60c0418168d9f9d10b544c2007dc21da2' => 
    array (
      0 => '/data/01/html/1yyg225/webapps/www/views/cn/mobile/member/lbi/list_bonus.html',
      1 => 1484103638,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '161691290158762a367f4b53-46730942',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'm' => 0,
    'L' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_58762a36859580_09869746',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58762a36859580_09869746')) {function content_58762a36859580_09869746($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/data/01/html/1yyg225/system/smarty/plugins/modifier.date_format.php';
?><dt><b><?php echo $_smarty_tpl->tpl_vars['m']->value['bonus_sn'];?>
</b></dt>
<dd>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?php echo $_smarty_tpl->tpl_vars['L']->value['unit_bonus'];?>
名称</th>
            <td><?php echo $_smarty_tpl->tpl_vars['m']->value['b_title'];?>
</td>
        </tr>
        <tr>
            <th><?php echo $_smarty_tpl->tpl_vars['L']->value['unit_bonus'];?>
价值</th>
            <td><b class="color01"><?php echo $_smarty_tpl->tpl_vars['m']->value['money'];?>
</b><?php echo $_smarty_tpl->tpl_vars['m']->value['money_type_title'];?>
</td>
        </tr>
        <tr>
            <th>有效时间</th>
            <td>
                <?php if ($_smarty_tpl->tpl_vars['m']->value['start_time']){?><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['m']->value['start_time'],'Y-m-d H:i:s');?>
<?php }else{ ?>--<?php }?><br>
                <?php if ($_smarty_tpl->tpl_vars['m']->value['end_time']){?><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['m']->value['end_time'],'Y-m-d H:i:s');?>
<?php }else{ ?>--<?php }?>
            </td>
        </tr>
        <?php if ($_smarty_tpl->tpl_vars['m']->value['used_time']){?>
        <tr>
            <th>使用时间</th>
            <td>
                <?php if ($_smarty_tpl->tpl_vars['m']->value['used_time']){?><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['m']->value['used_time'],'Y-m-d H:i:s');?>
<?php }else{ ?>--<?php }?>
            </td>
        </tr>
        <tr>
            <th>订单号</th>
            <td>
                <?php if ($_smarty_tpl->tpl_vars['m']->value['order_id']){?><?php echo $_smarty_tpl->tpl_vars['m']->value['order_id'];?>
<?php }else{ ?>--<?php }?>
            </td>
        </tr>
        <?php }?>
        <tr>
            <th>状态</th>
            <td>
                <?php if ($_smarty_tpl->tpl_vars['m']->value['disabled']==1){?>
                <?php if ($_smarty_tpl->tpl_vars['m']->value['order_id']){?>
                <span class="color01">已使用</span>
                <?php }else{ ?>
                <span class="color01">已过期</span>
                <?php }?>
                <?php }else{ ?>
                未使用
                <?php }?>
            </td>
        </tr>
    </table>
</dd><?php }} ?>