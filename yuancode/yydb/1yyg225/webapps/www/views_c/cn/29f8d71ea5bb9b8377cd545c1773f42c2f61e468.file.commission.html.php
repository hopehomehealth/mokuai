<?php /* Smarty version Smarty-3.1.13, created on 2016-12-12 11:50:07
         compiled from "/data/01/html/1yyg225/webapps/www/views/cn/member/commission.html" */ ?>
<?php /*%%SmartyHeaderCode:341807466584e1e6f9e1a17-05110823%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '29f8d71ea5bb9b8377cd545c1773f42c2f61e468' => 
    array (
      0 => '/data/01/html/1yyg225/webapps/www/views/cn/member/commission.html',
      1 => 1464591166,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '341807466584e1e6f9e1a17-05110823',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'site_config' => 0,
    'commission_total' => 0,
    'member' => 0,
    'L' => 0,
    'list' => 0,
    'm' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_584e1e6fafb591_75912901',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_584e1e6fafb591_75912901')) {function content_584e1e6fafb591_75912901($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<link rel="stylesheet" href="/style/css/member.css">
<script type="text/javascript" src="/style/dp/WdatePicker.js"></script>
<?php echo $_smarty_tpl->getSubTemplate ("ur_here.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div id="container">
    <div class="fn-clear mt20 pb20">
        <?php echo $_smarty_tpl->getSubTemplate ("member/menu.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

        <div class="fn-right hy-r">
            <div class="fn-clear hy-tjxh">
                <div class="title"><h2>佣金明细</h2></div>
                <div class="db-nrbox fn-clear">
					<?php if ($_smarty_tpl->tpl_vars['site_config']->value['apply_jufu']!=1){?>
                    <div class="total ">
                        <dt></dt>
                        <dd>累计收入：<b class="color04"><?php echo $_smarty_tpl->tpl_vars['commission_total']->value;?>
</b>元</dd>     <dd>累计(充值<?php if ($_smarty_tpl->tpl_vars['site_config']->value['withdraw_status']==1){?>/提现<?php }?>)：<b class="color04"><?php echo $_smarty_tpl->tpl_vars['member']->value['deduct_commission'];?>
</b>元</dd>       <dd>佣金余额：<b class="color04"><?php echo $_smarty_tpl->tpl_vars['member']->value['commission'];?>
</b>元</dd><dd>
                        <?php if ($_smarty_tpl->tpl_vars['site_config']->value['withdraw_status']==1){?>
                        <a href="<?php echo url('/member/withdraw_commission');?>
" title="申请提现" class="hy-btn2">申请提现</a>
                        <?php }?>
                        <a href="<?php echo url('/member/recharge_commission');?>
" title="充值到<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_yun'];?>
账户" class="hy-btn2">充值到<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_yun'];?>
账户</a>
                        </dd>
                        <dd class="gray02 color03">佣金余额可实时充值到您的<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_yun'];?>
帐户，满<?php echo $_smarty_tpl->tpl_vars['site_config']->value['withdraw_commission'];?>
元时才可申请提现。</dd>
                    </div>
					<?php }?>
                    <div class="fn-clear mt20">
                        <div class="fn-left db-sxl">
                            <a href="<?php echo url('/member/commission');?>
" <?php if ($_GET['time']==''){?>class="dq"<?php }?>>全部</a>
                            <a href="<?php echo url('/member/commission');?>
?time=1" <?php if ($_GET['time']==1){?>class="dq"<?php }?>>今天</a>
                            <a href="<?php echo url('/member/commission');?>
?time=2" <?php if ($_GET['time']==2){?>class="dq"<?php }?>>本周</a>
                            <a href="<?php echo url('/member/commission');?>
?time=3" <?php if ($_GET['time']==3){?>class="dq"<?php }?>>本月</a>
                            <a href="<?php echo url('/member/commission');?>
?time=4" <?php if ($_GET['time']==4){?>class="dq"<?php }?>>最近三个月</a>
                        </div>
                        <form action="<?php echo url('/member/commission');?>
">
                            <div class="fn-right db-sxr">
                                <label id="Label1">选择时间段：</label>
                                <input name="from_data" type="text" onclick="WdatePicker()" class="dq-inpt" />
                                <label id="Label1">-</label>
                                <input name="to_data" type="text"  onclick="WdatePicker()" class="dq-inpt"  />
                                <input type="submit" value="搜索" />
                            </div>
                        </form>
                    </div>
                    <div class="hy-table" style="margin: 10px auto; width: 905px;">
                        <table>
                            <tbody>
                            <tr>
                                <th>被邀请人</th>
                                <th>时间</th>
                                <th>描述</th>
                                <th><?php echo $_smarty_tpl->tpl_vars['L']->value['unit_yun'];?>
金额(元)</th>
                                <th>佣金(元)</th>
                            </tr>
                            <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>
                              <tr>
                                  <td><?php echo $_smarty_tpl->tpl_vars['m']->value['ivt_username'];?>
</td>
                                  <td><?php echo date('Y-m-d H:i:s',$_smarty_tpl->tpl_vars['m']->value['addtime']);?>
</td>
                                  <td><?php echo $_smarty_tpl->tpl_vars['m']->value['desc'];?>
</td>
                                  <td><?php echo $_smarty_tpl->tpl_vars['m']->value['total'];?>
</td>
                                  <td><?php echo $_smarty_tpl->tpl_vars['m']->value['commission'];?>
</td>
                              </tr>
                            <?php } ?>
                            </tbody>
                         </table>
                     </div>
                    <?php echo $_smarty_tpl->getSubTemplate ("public_page.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

                </div>
            </div>
        </div>
    </div>
</div>
<?php echo $_smarty_tpl->getSubTemplate ("footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>