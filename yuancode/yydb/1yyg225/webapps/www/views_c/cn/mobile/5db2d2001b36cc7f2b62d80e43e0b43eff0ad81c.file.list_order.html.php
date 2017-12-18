<?php /* Smarty version Smarty-3.1.13, created on 2016-05-24 14:17:09
         compiled from "D:\test1yyg3.lnest.com\webapps\www\views\cn\mobile\member\lbi\list_order.html" */ ?>
<?php /*%%SmartyHeaderCode:541156d41d7d8257a1-97725744%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5db2d2001b36cc7f2b62d80e43e0b43eff0ad81c' => 
    array (
      0 => 'D:\\test1yyg3.lnest.com\\webapps\\www\\views\\cn\\mobile\\member\\lbi\\list_order.html',
      1 => 1463453764,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '541156d41d7d8257a1-97725744',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_56d41d7d9fe3f9_03403695',
  'variables' => 
  array (
    'r' => 0,
    'm' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56d41d7d9fe3f9_03403695')) {function content_56d41d7d9fe3f9_03403695($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'D:\\test1yyg3.lnest.com\\system\\smarty\\plugins\\modifier.date_format.php';
?><dt class="db-order color03">
    <div style="float:right">
        <span>订单总额：<?php echo $_smarty_tpl->tpl_vars['r']->value['order_price'];?>
</span>
        <?php if ($_smarty_tpl->tpl_vars['r']->value['amount']>0){?>
        <br /><span class="color01">还需支付：<?php echo $_smarty_tpl->tpl_vars['r']->value['amount'];?>
</span>
        <?php if ($_smarty_tpl->tpl_vars['r']->value['status']<3){?>
        <a href="<?php echo url(('/order/pay/').($_smarty_tpl->tpl_vars['r']->value['id']));?>
" target="_blank" class="db-btn">支付订单</a>
        <?php }?>
        <?php }?>
    </div>
    订单号：<span><?php echo $_smarty_tpl->tpl_vars['r']->value['order_sn'];?>
</span><br>
    下单时间：<span><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['r']->value['c_time'],'Y-m-d H:i:s');?>
</span><span style="color: #000">（<?php echo $_smarty_tpl->tpl_vars['r']->value['order_code'];?>
）</span>
</dt>
<?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['r']->value['goods']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>
<dt class="ui-clr" style="min-height:75px;">
    <div class="db-img"><a href="<?php echo $_smarty_tpl->tpl_vars['r']->value['goods_url'];?>
" target="_blank"><img src="<?php echo $_smarty_tpl->tpl_vars['m']->value['imgurl_thumb'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['m']->value['goods_name'];?>
" width="90" /></a></div>
    <div class="db-txt">
        <p class="p1"><a href="<?php echo $_smarty_tpl->tpl_vars['r']->value['goods_url'];?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['m']->value['goods_name'];?>
</a></p>
        <div>
            <span class="color01"><?php echo $_smarty_tpl->tpl_vars['r']->value['status_name'];?>
</span><br/>
            <?php if ($_smarty_tpl->tpl_vars['r']->value['status']==3){?><a href="javascript:;" onclick="zz_confirm('您确认已经收到该订单商品？','<?php echo url(('/member/finish_order/').($_smarty_tpl->tpl_vars['r']->value['id']));?>
')" class="btn-small">确认收货</a>
            <?php }elseif($_smarty_tpl->tpl_vars['r']->value['status']==4&&$_smarty_tpl->tpl_vars['r']->value['is_share']==0){?><a href="<?php echo url(('/member/post_share/').($_smarty_tpl->tpl_vars['r']->value['id']));?>
" class="btn-small">晒单</a> <?php }?>
        </div>
    </div>
</dt>
<dd>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th>物流信息</th>
            <td>
                <div><span><?php echo $_smarty_tpl->tpl_vars['r']->value['name'];?>
</span> (<?php echo $_smarty_tpl->tpl_vars['r']->value['mobile'];?>
) <?php echo $_smarty_tpl->tpl_vars['r']->value['area'];?>
 <?php echo $_smarty_tpl->tpl_vars['r']->value['deliver'];?>
</div>
                <?php if ($_smarty_tpl->tpl_vars['r']->value['express_num']){?><?php echo $_smarty_tpl->tpl_vars['r']->value['express_name'];?>
单号 : <?php echo $_smarty_tpl->tpl_vars['r']->value['express_num'];?>
 <br/><a class="color02" href="http://m.kuaidi100.com/result.jsp?com=<?php echo $_smarty_tpl->tpl_vars['r']->value['express_pinyin'];?>
&nu=<?php echo $_smarty_tpl->tpl_vars['r']->value['express_num'];?>
" target="_blank">查看物流</a> <?php }?>
            </td>
        </tr>
    </table>
</dd>
<?php } ?><?php }} ?>