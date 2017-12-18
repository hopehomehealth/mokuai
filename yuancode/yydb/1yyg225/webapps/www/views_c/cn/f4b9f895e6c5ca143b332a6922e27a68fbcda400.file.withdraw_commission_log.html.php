<?php /* Smarty version Smarty-3.1.13, created on 2015-11-30 09:57:20
         compiled from "E:\projects\web\lnest\1yyg225\webapps\www\views\cn\member\withdraw_commission_log.html" */ ?>
<?php /*%%SmartyHeaderCode:26659565bad001ba7b2-94032842%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f4b9f895e6c5ca143b332a6922e27a68fbcda400' => 
    array (
      0 => 'E:\\projects\\web\\lnest\\1yyg225\\webapps\\www\\views\\cn\\member\\withdraw_commission_log.html',
      1 => 1418954028,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '26659565bad001ba7b2-94032842',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'list' => 0,
    'm' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_565bad002665d1_61822650',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_565bad002665d1_61822650')) {function content_565bad002665d1_61822650($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<link rel="stylesheet" href="/style/css/member.css">
<script type="text/javascript" src="/style/dp/WdatePicker.js"></script>
<?php echo $_smarty_tpl->getSubTemplate ("ur_here.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div id="container">
    <div class="fn-clear mt20 pb20">
        <?php echo $_smarty_tpl->getSubTemplate ("member/menu.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

        <div class="fn-right hy-r">
            <div class="fn-clear hy-tjxh">
                <div class="title"><h2>佣金提现记录</h2></div>
                <div class="db-nrbox fn-clear">
                    <div class="fn-clear mt20">
                        <div class="fn-left db-sxl">
                            <a href="<?php echo url('/member/withdraw_commission_log');?>
" <?php if ($_GET['time']==''){?>class="dq"<?php }?>>全部</a>
                            <a href="<?php echo url('/member/withdraw_commission_log');?>
?time=1" <?php if ($_GET['time']==1){?>class="dq"<?php }?>>今天</a>
                            <a href="<?php echo url('/member/withdraw_commission_log');?>
?time=2" <?php if ($_GET['time']==2){?>class="dq"<?php }?>>本周</a>
                            <a href="<?php echo url('/member/withdraw_commission_log');?>
?time=3" <?php if ($_GET['time']==3){?>class="dq"<?php }?>>本月</a>
                            <a href="<?php echo url('/member/withdraw_commission_log');?>
?time=4" <?php if ($_GET['time']==4){?>class="dq"<?php }?>>最近三个月</a>
                        </div>
                        <form action="<?php echo url('/member/withdraw_commission_log');?>
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
                                <th>申请时间</th>
                                <th>银行账户信息</th>
                                <th>提现金额(元)</th>
                                <th>手续费(元)</th>
                                <th>状态</th>
                            </tr>
                            <?php if ($_smarty_tpl->tpl_vars['list']->value){?>
                            <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>
                             <tr>
                                  <td><?php echo date('Y-m-d H:i:s',$_smarty_tpl->tpl_vars['m']->value['addtime']);?>
</td>
                                  <td><?php echo $_smarty_tpl->tpl_vars['m']->value['bankname'];?>
 <?php echo $_smarty_tpl->tpl_vars['m']->value['bankcard'];?>
</td>
                                  <td><?php echo $_smarty_tpl->tpl_vars['m']->value['commission'];?>
</td>
                                  <td><?php echo $_smarty_tpl->tpl_vars['m']->value['fee'];?>
</td>
                                  <td><?php if ($_smarty_tpl->tpl_vars['m']->value['status']==1){?>待处理<?php }elseif($_smarty_tpl->tpl_vars['m']->value['status']==2){?>处理中<?php }else{ ?>已处理<?php }?></td>
                              </tr>
                            <?php } ?>
                            <?php }else{ ?>
                            <tr><td colspan="5" align="center">暂时没有提现记录</td></tr>
                            <?php }?>
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