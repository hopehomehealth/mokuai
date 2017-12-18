<?php /* Smarty version Smarty-3.1.13, created on 2016-05-18 11:21:01
         compiled from "D:\test1yyg3.lnest.com\webapps\www\views\manage\order\detail.html" */ ?>
<?php /*%%SmartyHeaderCode:650056d10bf40a0204-24562778%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'befee59068f185c7c808babde44a0011f758cfd1' => 
    array (
      0 => 'D:\\test1yyg3.lnest.com\\webapps\\www\\views\\manage\\order\\detail.html',
      1 => 1463453674,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '650056d10bf40a0204-24562778',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_56d10bf42a8b77_57107003',
  'variables' => 
  array (
    'order' => 0,
    'g' => 0,
    'k' => 0,
    'order_logs' => 0,
    'm' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56d10bf42a8b77_57107003')) {function content_56d10bf42a8b77_57107003($_smarty_tpl) {?><h3 class="info-tag">    <a class="uiBtn r" href="javascript:history.go(-1);void(0)">返回</a>    订单详情<span></span></h3><style type="text/css">.order-info{border:1px solid #ddd; }.oi-tag{background-color:#eee; line-height:24px; height:24px; padding-left:10px; border-bottom:1px solid #ddd}.oi-text{padding:10px; line-height:24px}.oi-goods{}.oi-goods img{float:left; display:block; border:none; margin:2px}.oi-goods .oi-name{float:left}</style><div class="html-box">    <table class="tb-goods" style="width:100%;margin-bottom:5px">        <tr class="order-head">            <td colspan="8">                订单编号:<span class="order-no"><?php echo $_smarty_tpl->tpl_vars['order']->value['order_sn'];?>
</span>，下单时间：<span class="order-date"><?php echo date('Y-m-d H:i:s',$_smarty_tpl->tpl_vars['order']->value['c_time']);?>
</span>            </td></tr>        <?php  $_smarty_tpl->tpl_vars['g'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['g']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['order']->value['goods']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['g']->key => $_smarty_tpl->tpl_vars['g']->value){
$_smarty_tpl->tpl_vars['g']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['g']->key;
?>        <tr>            <td class="bdl w5"></td>            <td class="w70"><img src="<?php echo $_smarty_tpl->tpl_vars['g']->value['imgurl_thumb'];?>
" style="width:70px" /></td>            <td>                <div class="oi-name"><?php echo $_smarty_tpl->tpl_vars['g']->value['goods_name'];?>
</div>                <div class="c-gray" style="line-height: 1.2">                    <?php echo nl2br($_smarty_tpl->tpl_vars['g']->value['goods_info']);?>
                    <p><a href='#!order/goods?id=<?php echo $_smarty_tpl->tpl_vars['g']->value['id'];?>
&com=xshow|修改订单商品(<?php echo $_smarty_tpl->tpl_vars['order']->value['order_sn'];?>
)' class='uiBtn'>修改商品备注</a></p>                </div>                <div style="color:#999"><?php echo $_smarty_tpl->tpl_vars['g']->value['rule'];?>
</div>            </td>            <td class="ac"><?php echo $_smarty_tpl->tpl_vars['g']->value['sell_price'];?>
</td>            <td class="ac bdr"><?php echo $_smarty_tpl->tpl_vars['g']->value['buy_num'];?>
</td>            <?php if ($_smarty_tpl->tpl_vars['k']->value==0){?>            <td class="ac bdr" rowspan="<?php echo count($_smarty_tpl->tpl_vars['order']->value['goods']);?>
">售后/投诉</td>            <td class="ac bdr" rowspan="<?php echo count($_smarty_tpl->tpl_vars['order']->value['goods']);?>
">买家：<?php echo $_smarty_tpl->tpl_vars['order']->value['m_username'];?>
                <br><?php echo $_smarty_tpl->tpl_vars['order']->value['note'];?>
            </td>            <td class="ac bdr" rowspan="<?php echo count($_smarty_tpl->tpl_vars['order']->value['goods']);?>
">                <b style="color:#f60">￥<?php echo $_smarty_tpl->tpl_vars['order']->value['order_price'];?>
</b>            </td>            <?php }?>        </tr>        <?php } ?>        <tr>            <td colspan="8" class="bdl bdr">                收货信息：                <?php if (is_array($_smarty_tpl->tpl_vars['order']->value['deliver'])){?>                <span style="color:#666"><?php echo substr($_smarty_tpl->tpl_vars['order']->value['deliver']['prov_name'],2);?>
<?php echo $_smarty_tpl->tpl_vars['order']->value['deliver']['city_name'];?>
<?php echo $_smarty_tpl->tpl_vars['order']->value['deliver']['district_name'];?>
</span>                <span style="color:#999"><?php echo $_smarty_tpl->tpl_vars['order']->value['deliver']['address'];?>
</span>                <span style="color:#333"><?php echo $_smarty_tpl->tpl_vars['order']->value['deliver']['real_name'];?>
-<?php echo $_smarty_tpl->tpl_vars['order']->value['deliver']['mobile'];?>
(<?php echo $_smarty_tpl->tpl_vars['order']->value['deliver']['zipcode'];?>
)</span>                <?php }else{ ?>                <?php }?>            </td>        </tr>    </table>    <div class="order-info">        <div class="oi-tag">            订单信息        </div>        <div class="oi-text">            状态：<?php echo $_smarty_tpl->tpl_vars['order']->value['status_name'];?>
<br>            快递：<?php echo $_smarty_tpl->tpl_vars['order']->value['express_name'];?>
<br>            <?php if (!empty($_smarty_tpl->tpl_vars['order']->value['express_num'])){?>            物流单号：<?php echo $_smarty_tpl->tpl_vars['order']->value['express_num'];?>
            <a href="http://www.kuaidi100.com/chaxun?com=<?php echo $_smarty_tpl->tpl_vars['order']->value['express_pinyin'];?>
&nu=<?php echo $_smarty_tpl->tpl_vars['order']->value['express_num'];?>
" target="_blank" class="uiBtn BtnOrange BtnXs">查看物流</a><br>            <?php }?>            <?php if (!empty($_smarty_tpl->tpl_vars['order']->value['pay_time'])){?>支付时间：<?php echo date('Y-m-d H:i:s',$_smarty_tpl->tpl_vars['order']->value['pay_time']);?>
<br><?php }?>        </div>        <div class="oi-text">            <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['order_logs']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>            <div class="clear">                <span class="l w60" style="color:#5690D2"><?php echo $_smarty_tpl->tpl_vars['m']->value['state'];?>
:</span>                <span class="l w200"><?php echo $_smarty_tpl->tpl_vars['m']->value['state_info'];?>
</span>                <span class="l w160" style="color:#999"><?php echo date('Y-m-d H:i',$_smarty_tpl->tpl_vars['m']->value['c_time']);?>
</span></div>            <?php } ?>        </div>    </div>    <div style="padding: 10px 0 0;">        <a href="javscript:;" class="uiBtn e2-order-cancel-<?php echo $_smarty_tpl->tpl_vars['order']->value['id'];?>
">取消订单</a>        <a href="#!order/edit?id=<?php echo $_smarty_tpl->tpl_vars['order']->value['id'];?>
&com=xshow|修改订单信息(<?php echo $_smarty_tpl->tpl_vars['order']->value['order_sn'];?>
)" class="uiBtn">修改订单</a>    </div></div><?php }} ?>