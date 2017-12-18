<?php /* Smarty version Smarty-3.1.13, created on 2016-03-15 17:08:43
         compiled from "D:\test1yyg3.lnest.com\webapps\www\views\cn\member\accountlog.html" */ ?>
<?php /*%%SmartyHeaderCode:567956e7d11be1cbc9-10909054%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6798a38f9dd6985bda147e0095c29d23bbc71833' => 
    array (
      0 => 'D:\\test1yyg3.lnest.com\\webapps\\www\\views\\cn\\member\\accountlog.html',
      1 => 1456367944,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '567956e7d11be1cbc9-10909054',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'list' => 0,
    'm' => 0,
    'L' => 0,
    'member' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_56e7d11c108c03_06603348',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56e7d11c108c03_06603348')) {function content_56e7d11c108c03_06603348($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<link rel="stylesheet" href="<?php echo url('/style/css/member.css');?>
">
<?php echo $_smarty_tpl->getSubTemplate ("ur_here.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div id="container">
    <div class="fn-clear mt20 pb20">
        <?php echo $_smarty_tpl->getSubTemplate ("member/menu.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

        <div class="fn-right hy-r">
            <div class="fn-clear hy-tjxh">
                <div class="title">
                    <h2><?php if ($_GET['type']==1){?>充值<?php }?><?php if ($_GET['type']==2){?>提现<?php }?><?php if (!$_GET['type']){?>充值/提现<?php }?>记录</h2>
                </div>

                <div class="hy-box">
                    <div class="mt15 hy-table">
                        <table>
                            <tr>
                                <th style="width:130px;">操作时间</th>
                                <th style="width:80px">类型</th>
                                <th style="width:110px">金额</th>
                                <th style="width:60px">手续费</th>
                                <th style="width:175px">支付方式</th>
                                <th style="width:125px">处理备注</th>
                                <th style="width:110px">状态</th>
                                <th>操作</th>
                            </tr>
                            <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>
                            <tr>
                                <td><span class="color03"><?php echo date('Y-m-d H:i',$_smarty_tpl->tpl_vars['m']->value['add_time']);?>
</span></td>
                                <td><?php if ($_smarty_tpl->tpl_vars['m']->value['type']==1){?>充值<?php }else{ ?>提现<?php }?></td>
                                <td><span class="color01">￥<?php echo $_smarty_tpl->tpl_vars['m']->value['amount'];?>
</span></td>
                                <td><span class="color01">￥<?php echo $_smarty_tpl->tpl_vars['m']->value['fee'];?>
</span></td>
                                <td><?php echo $_smarty_tpl->tpl_vars['m']->value['pay_name'];?>
</td>
                                <td><?php echo $_smarty_tpl->tpl_vars['m']->value['admin_note'];?>
</td>
                                <td><?php if ($_smarty_tpl->tpl_vars['m']->value['status']==1){?>待付款<?php }elseif($_smarty_tpl->tpl_vars['m']->value['status']==2){?>已完成<?php }else{ ?>已取消<?php }?></td>
                                <td class="hy-rza">
                                    <?php if ($_smarty_tpl->tpl_vars['m']->value['type']==1&&$_smarty_tpl->tpl_vars['m']->value['status']==1){?><a href="<?php echo url('/member/pay/');?>
<?php echo $_smarty_tpl->tpl_vars['m']->value['id'];?>
">付款</a><?php }?>
                                    <?php if ($_smarty_tpl->tpl_vars['m']->value['status']==1){?><a href="javascript:zz_confirm('您确认取消该申请？','<?php echo url('/member/account_cancel/');?>
<?php echo $_smarty_tpl->tpl_vars['m']->value['id'];?>
');">取消</a><?php }?>
                                </td>
                            </tr>
                            <?php } ?>
                            <tr>
                                <td colspan="8" style="text-align:right;">您当前的可用<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_baozheng'];?>
为：<span class="color01">￥<?php echo $_smarty_tpl->tpl_vars['member']->value['user_money'];?>
</span>	冻结<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_baozheng'];?>
：<span class="color02">￥<?php echo $_smarty_tpl->tpl_vars['member']->value['frozen_money'];?>
</span> </td>
                            </tr>
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