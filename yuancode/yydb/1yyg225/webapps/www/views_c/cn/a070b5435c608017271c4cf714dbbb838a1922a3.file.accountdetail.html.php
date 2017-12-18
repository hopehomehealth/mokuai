<?php /* Smarty version Smarty-3.1.13, created on 2016-06-01 13:59:46
         compiled from "D:\test1yyg3.lnest.com\webapps\www\views\cn\member\accountdetail.html" */ ?>
<?php /*%%SmartyHeaderCode:2336756cea4721567f5-53857279%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a070b5435c608017271c4cf714dbbb838a1922a3' => 
    array (
      0 => 'D:\\test1yyg3.lnest.com\\webapps\\www\\views\\cn\\member\\accountdetail.html',
      1 => 1464591165,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2336756cea4721567f5-53857279',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_56cea4722c3418_03116880',
  'variables' => 
  array (
    'site_config' => 0,
    'L' => 0,
    'list' => 0,
    'm' => 0,
    'data' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56cea4722c3418_03116880')) {function content_56cea4722c3418_03116880($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<link rel="stylesheet" href="<?php echo url('/style/css/member.css');?>
">
<?php echo $_smarty_tpl->getSubTemplate ("ur_here.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div id="container">
    <div class="fn-clear mt20 pb20">
        <?php echo $_smarty_tpl->getSubTemplate ("member/menu.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

        <div class="fn-right hy-r">
            <div class="fn-clear hy-tjxh">
                <div class="title">
                    <h2>账户明细</h2>
                </div>
                <div class="hy-zjfl">
                    <a href="<?php echo url('/member/recchage');?>
">充值</a> | 
                    <?php if ($_smarty_tpl->tpl_vars['site_config']->value['withdraw_status']==1){?>
                    <a href="<?php echo url('/member/withdraw');?>
">提现</a> | 
                    <?php }?>
                    <a href="<?php echo url('/member/accountdetail');?>
" class="dq">查看账户明细</a> | 
                    <a href="<?php echo url('/member/accountlog');?>
">查看充值<?php if ($_smarty_tpl->tpl_vars['site_config']->value['withdraw_status']==1){?>/提现<?php }?>记录</a>
                </div>
                <div class="hy-box">
                    <div class="mt15 hy-table">
                        <table>
                            <thead>
                            <tr>
                                <th>操作时间</th>
                                <th>类型 </th>
                                <th style="width:80px;">第三方支付</th>
                                <th style="width:80px;">可用金额</th>
                                <th style="width:80px;">冻结金额</th>
                                <th style="width:80px;"><?php echo $_smarty_tpl->tpl_vars['L']->value['unit_db_points'];?>
</th>
                                <th style="width:80px;"><?php echo $_smarty_tpl->tpl_vars['L']->value['unit_pay_points'];?>
</th>
                                <th style="width:80px;">经验值</th>
                                <th>备注</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>
                            <tr>
                                <td><span class="color03"><?php echo date('Y-m-d H:i',$_smarty_tpl->tpl_vars['m']->value['logtime']);?>
</span></td>
                                <td>
                                    <?php echo $_smarty_tpl->tpl_vars['m']->value['stage_title'];?>

                                </td>
                                <td><span class="color01"><?php echo $_smarty_tpl->tpl_vars['m']->value['amount'];?>
</span></td>
                                <td><span class="color01"><?php echo $_smarty_tpl->tpl_vars['m']->value['user_money'];?>
</span></td>
                                <td><span class="color02"><?php echo $_smarty_tpl->tpl_vars['m']->value['frozen_money'];?>
</span></td>
                                <td><span class="color01"><?php echo $_smarty_tpl->tpl_vars['m']->value['db_points'];?>
</span></td>
                                <td><span class="color02"><?php echo $_smarty_tpl->tpl_vars['m']->value['pay_points'];?>
</span></td>
                                <td><span class="color02"><?php echo $_smarty_tpl->tpl_vars['m']->value['rank_points'];?>
</span></td>
                                <td style="text-align:left;"><?php echo $_smarty_tpl->tpl_vars['m']->value['desc'];?>
</td>
                            </tr>
                            <?php } ?>
                            </tbody>
                            <tfoot>
                            <tr>
                                <td colspan="20" style="text-align: right">
                                    第三方支付总计：<span class="color01"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['data']->value['amount_in'])===null||$tmp==='' ? 0 : $tmp);?>
</span><br>
                                    余额统计：收入<span class="color02"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['data']->value['user_money_in'])===null||$tmp==='' ? 0 : $tmp);?>
</span> 支出<span class="color01"><?php echo (($tmp = @abs($_smarty_tpl->tpl_vars['data']->value['user_money_out']))===null||$tmp==='' ? 0 : $tmp);?>
</span><br>
                                    <?php echo $_smarty_tpl->tpl_vars['L']->value['unit_db_points'];?>
统计：收入<span class="color02"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['data']->value['db_points_in'])===null||$tmp==='' ? 0 : $tmp);?>
</span> 支出<span class="color01"><?php echo (($tmp = @abs($_smarty_tpl->tpl_vars['data']->value['db_points_out']))===null||$tmp==='' ? 0 : $tmp);?>
</span><br>
                                    <?php echo $_smarty_tpl->tpl_vars['L']->value['unit_pay_points'];?>
统计：收入<span class="color02"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['data']->value['pay_points_in'])===null||$tmp==='' ? 0 : $tmp);?>
</span> 支出<span class="color01"><?php echo (($tmp = @abs($_smarty_tpl->tpl_vars['data']->value['pay_points_out']))===null||$tmp==='' ? 0 : $tmp);?>
</span><br>
                                </td>
                            </tr>
                            </tfoot>
                        </table>
                        <div class="foot-btn">
                            <?php echo $_smarty_tpl->getSubTemplate ("public_page.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php echo $_smarty_tpl->getSubTemplate ("footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>