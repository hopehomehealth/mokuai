<?php /* Smarty version Smarty-3.1.13, created on 2015-12-02 10:47:32
         compiled from "E:\projects\web\lnest\1yyg225\webapps\www\views\cn\member\accountdetail.html" */ ?>
<?php /*%%SmartyHeaderCode:22750565e5bc4995387-23036295%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '17971aeb0ad44db4f2787a8fdd15bac783f228a6' => 
    array (
      0 => 'E:\\projects\\web\\lnest\\1yyg225\\webapps\\www\\views\\cn\\member\\accountdetail.html',
      1 => 1422930632,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '22750565e5bc4995387-23036295',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'list' => 0,
    'm' => 0,
    'member' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_565e5bc4da8401_87039843',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_565e5bc4da8401_87039843')) {function content_565e5bc4da8401_87039843($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

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
">充值</a> | <a href="<?php echo url('/member/withdraw');?>
">提现</a> | <a href="<?php echo url('/member/accountdetail');?>
" class="dq">查看账户明细</a> | <a href="<?php echo url('/member/accountlog');?>
">查看充值/提现记录</a>
                </div>
                <div class="hy-box">
                    <div class="mt15 hy-table">
                        <table>
                            <tr>
                                <th style="width:140px;">操作时间</th>
                                <th style="width:150px;">类型 </th>
                                <th style="width:80px;">可用金额</th>
                                <th style="width:80px;">冻结金额</th>
                                <th style="width:80px;">夺宝币</th>
                                <th style="width:80px;">拍币</th>
                                <th style="width:80px;">经验值</th>
                                <th>备注</th>
                            </tr>
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
                            <tr>
                                <td colspan="20" style="text-align:right;">您当前的可用保证金为：<span class="color01">￥<?php echo $_smarty_tpl->tpl_vars['member']->value['user_money'];?>
</span>	冻结保证金：<span class="color02">￥<?php echo $_smarty_tpl->tpl_vars['member']->value['frozen_money'];?>
</span> 元</td>
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