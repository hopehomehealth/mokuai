<?php /* Smarty version Smarty-3.1.13, created on 2017-01-13 11:00:31
         compiled from "/data/01/html/1yyg225/webapps/www/views/cn/mobile/member/lbi/list_db_order.html" */ ?>
<?php /*%%SmartyHeaderCode:746423016587842cf311797-52704435%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6d2e48b9b84b03a7f3ccf92382fb893ea3190191' => 
    array (
      0 => '/data/01/html/1yyg225/webapps/www/views/cn/mobile/member/lbi/list_db_order.html',
      1 => 1456367944,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '746423016587842cf311797-52704435',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'r' => 0,
    'L' => 0,
    'm' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_587842cf4480f4_93745245',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_587842cf4480f4_93745245')) {function content_587842cf4480f4_93745245($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/data/01/html/1yyg225/system/smarty/plugins/modifier.date_format.php';
?><dt class="db-order color03">
    <div style="float:right">
        还需：<span class="color01">
            <?php if ($_smarty_tpl->tpl_vars['r']->value['type']==1){?>
            <?php echo $_smarty_tpl->tpl_vars['r']->value['order_amount'];?>
<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_db_points'];?>

            <?php }else{ ?>
            <?php echo $_smarty_tpl->tpl_vars['r']->value['total'];?>
<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_pay_points'];?>

            <?php }?>
        </span>
        <?php if ($_smarty_tpl->tpl_vars['r']->value['allow_pay']){?><br/><a href="<?php echo url(('/yunbuy/pay/').($_smarty_tpl->tpl_vars['r']->value['order_sn']));?>
" target="_blank" class="color02">支付订单</a><?php }?>
    </div>
    订单号：<span><?php echo $_smarty_tpl->tpl_vars['r']->value['order_sn'];?>
</span><br>
<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_yun'];?>
时间：<span><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['r']->value['add_time'],'Y-m-d H:i:s');?>
</span>
</dt>
<?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['r']->value['db']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>
<dt class="ui-clr">
    <div class="db-img"><a href="<?php echo url(('/yunbuy/detail/').($_smarty_tpl->tpl_vars['m']->value['buy_id']));?>
" target="_blank"><img src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['zz'][0][0]->_callViewFunc(array('mod'=>'fileurl','source'=>$_smarty_tpl->tpl_vars['m']->value['imgurl_src'],'width'=>90,'type'=>0),$_smarty_tpl);?>
" alt="<?php echo $_smarty_tpl->tpl_vars['m']->value['goods_name'];?>
" /></a></div>
    <div class="db-txt">
        <p class="p1"><?php if ($_smarty_tpl->tpl_vars['m']->value['type']==2){?><span class="type-free">霸王餐区</span><?php }?> <a href="<?php echo url(('/yunbuy/detail/').($_smarty_tpl->tpl_vars['m']->value['buy_id']));?>
" target="_blank" class="color00"><span class="color01">(第<?php echo $_smarty_tpl->tpl_vars['m']->value['qishu'];?>
期)</span> <?php echo $_smarty_tpl->tpl_vars['m']->value['goods_name'];?>
</a></p>
        <p class="color03">总需：<?php echo $_smarty_tpl->tpl_vars['m']->value['buy']['need_num'];?>
<?php if ($_smarty_tpl->tpl_vars['m']->value['type']==1){?>人次<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['L']->value['unit_pay_points'];?>
<?php }?></p>
        <?php if ($_smarty_tpl->tpl_vars['m']->value['buy']['luck_code']==0){?>
        <p class="db-jdt">
            <span style="width:<?php echo $_smarty_tpl->tpl_vars['m']->value['buy']['jindu'];?>
%"></span>
        </p>
        <ul class="db-nums ui-clr color03">
            <li class="tr">剩余<span><?php echo $_smarty_tpl->tpl_vars['m']->value['buy']['end_num'];?>
</span></li>
            <li class="tl">已参与<span><?php echo $_smarty_tpl->tpl_vars['m']->value['buy']['buy_num'];?>
</span></li>
        </ul>
        <?php }else{ ?>
        <p>
        获得者：<a href="<?php echo url(('/minfo?id=').($_smarty_tpl->tpl_vars['m']->value['buy']['member_id']));?>
#dbCod" target="_blank"><?php echo nickname($_smarty_tpl->tpl_vars['m']->value['buy']['member_name'],$_smarty_tpl->tpl_vars['m']->value['luck_nickname']);?>
</a>（本期共参与<?php echo $_smarty_tpl->tpl_vars['m']->value['luck_qty'];?>
人次）<br/>
        幸运号码：<b class="color01"><?php echo $_smarty_tpl->tpl_vars['m']->value['buy']['luck_code'];?>
</b><br/>
        揭晓时间：<?php echo microtime_format($_smarty_tpl->tpl_vars['m']->value['buy']['end_time'],'Y-m-d H:i:s.x');?>

        </p>
        <?php }?>
    </div>
</dt>
<dd>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th>参与人次</th>
            <td>
                <?php echo $_smarty_tpl->tpl_vars['m']->value['qty'];?>
人次
            </td>
        </tr>
    </table>
</dd>
<?php } ?><?php }} ?>