<?php /* Smarty version Smarty-3.1.13, created on 2015-12-02 14:52:33
         compiled from "E:\projects\web\lnest\1yyg225\webapps\www\views\cn\member\order.html" */ ?>
<?php /*%%SmartyHeaderCode:27006565e9531468564-64118310%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7ec51ee0d94f895bc3744f7a57ed904458c91a5b' => 
    array (
      0 => 'E:\\projects\\web\\lnest\\1yyg225\\webapps\\www\\views\\cn\\member\\order.html',
      1 => 1425112908,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '27006565e9531468564-64118310',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'total' => 0,
    'list' => 0,
    'r' => 0,
    'm' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_565e95315f6cc8_43006021',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_565e95315f6cc8_43006021')) {function content_565e95315f6cc8_43006021($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'E:\\projects\\web\\lnest\\1yyg225\\system\\smarty\\plugins\\modifier.date_format.php';
?><?php echo $_smarty_tpl->getSubTemplate ("header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<link rel="stylesheet" href="<?php echo url('/style/css/member.css');?>
">
<script type="text/javascript" src="/style/dp/WdatePicker.js"></script>
<?php echo $_smarty_tpl->getSubTemplate ("ur_here.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div id="container">
    <div class="fn-clear mt20 pb20">
        <?php echo $_smarty_tpl->getSubTemplate ("member/menu.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

        <div class="fn-right hy-r">
        <div class="hy-tjxh fn-clear">
            <div class="db-nrbox fn-clear">
                <?php if (!isset($_GET['order'])){?>
                <div class="dq-ts">
                    我的订单： 待付款<a href="<?php echo url('/member/order');?>
?status=1" class="color01 fwb">（<?php echo $_smarty_tpl->tpl_vars['total']->value['notpay'];?>
）</a> 待发货<a href="<?php echo url('/member/order');?>
?status=2" class="color01 fwb">（<?php echo $_smarty_tpl->tpl_vars['total']->value['wait'];?>
）</a> 已发货<a href="<?php echo url('/member/order');?>
?status=3" class="color01 fwb">（<?php echo $_smarty_tpl->tpl_vars['total']->value['shiped'];?>
）</a> 已完成<a href="<?php echo url('/member/order');?>
?status=4" class="color01 fwb">（<?php echo $_smarty_tpl->tpl_vars['total']->value['finish'];?>
）</a>
                </div>
                <?php }?>
                <div class="fn-clear mt20">
                    <div class="fn-left db-sxl">
                        <a href="<?php echo url('/member/order');?>
<?php if (isset($_GET['order'])){?>?order<?php }?>" <?php if ($_GET['time']==''){?>class="dq"<?php }?>>全部</a>
                        <a href="<?php echo url('/member/order');?>
?time=1<?php if (isset($_GET['order'])){?>&order<?php }?>" <?php if ($_GET['time']==1){?>class="dq"<?php }?>>今天</a>
                        <a href="<?php echo url('/member/order');?>
?time=2<?php if (isset($_GET['order'])){?>&order<?php }?>" <?php if ($_GET['time']==2){?>class="dq"<?php }?>>本周</a>
                        <a href="<?php echo url('/member/order');?>
?time=3<?php if (isset($_GET['order'])){?>&order<?php }?>" <?php if ($_GET['time']==3){?>class="dq"<?php }?>>本月</a>
                        <a href="<?php echo url('/member/order');?>
?time=4<?php if (isset($_GET['order'])){?>&order<?php }?>" <?php if ($_GET['time']==4){?>class="dq"<?php }?>>最近三个月</a>
                    </div>
                    <form action="<?php echo url('/member/order');?>
">
                    <div class="fn-right db-sxr">
                        <label>选择时间段：</label>
                        <input name="from_data" type="text" onclick="WdatePicker()" class="dq-inpt" />
                        <label>-</label>
                        <input name="to_data" type="text"  onclick="WdatePicker()" class="dq-inpt"  />
                        <input type="submit" value="搜索" />
                    </div>
                    </form>
                </div>
                <div class="dq-tab-t">
                    <table>
                        <tr>
                            <th width="116">商品图片</th>
                            <th>商品名称</th>
                            <th width="250">收货人信息</th>
                            <th width="150">状态与操作</th>
                        </tr>
                    </table>
                </div>
                <div class="db-tab-list">
                    <table>
                        <?php if ($_smarty_tpl->tpl_vars['list']->value){?>
                        <?php  $_smarty_tpl->tpl_vars['r'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['r']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['r']->key => $_smarty_tpl->tpl_vars['r']->value){
$_smarty_tpl->tpl_vars['r']->_loop = true;
?>
                        <div class="db-tab-list">
                            <table>
                                <tr>
                                    <th colspan="2" style="text-align:left;">
                                        <span style="margin-left:20px;">
                                            订单号：<b class="color02"><?php echo $_smarty_tpl->tpl_vars['r']->value['order_sn'];?>
</b>
                                        </span>
                                        下单时间：<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['r']->value['c_time'],'Y-m-d H:i:s');?>

                                        (<?php echo $_smarty_tpl->tpl_vars['r']->value['order_code'];?>
)
                                    </th>
                                    <th colspan="2">
                                        <span>订单总额：<?php echo $_smarty_tpl->tpl_vars['r']->value['order_price'];?>
</span>
                                        <?php if ($_smarty_tpl->tpl_vars['r']->value['amount']>0){?>
                                            <span class="color01">还需支付：<?php echo $_smarty_tpl->tpl_vars['r']->value['amount'];?>
</span>
                                            <?php if ($_smarty_tpl->tpl_vars['r']->value['status']<3){?>
                                            <a href="<?php echo url(('/order/pay/').($_smarty_tpl->tpl_vars['r']->value['id']));?>
" target="_blank" class="hy-btn2">支付订单</a>
                                            <?php }?>
                                        <?php }?>
                                    </th>
                                </tr>
                                <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['r']->value['goods']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>
                                <tr>
                                    <td  width="116">
                                        <div class="db-img"><img src="<?php echo $_smarty_tpl->tpl_vars['m']->value['imgurl_thumb'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['m']->value['goods_name'];?>
" /></div>
                                    </td>
                                    <td style="text-align: left;">
                                        <a href="<?php echo $_smarty_tpl->tpl_vars['r']->value['goods_url'];?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['m']->value['goods_name'];?>
</a>
                                    </td>
                                    <td width="250" style="text-align:left;">
                                        <div><?php echo $_smarty_tpl->tpl_vars['r']->value['name'];?>
(<?php echo $_smarty_tpl->tpl_vars['r']->value['mobile'];?>
) <?php echo $_smarty_tpl->tpl_vars['r']->value['area'];?>
 <?php echo $_smarty_tpl->tpl_vars['r']->value['deliver'];?>
</div>
                                        <?php if ($_smarty_tpl->tpl_vars['r']->value['express_num']){?><?php echo $_smarty_tpl->tpl_vars['r']->value['express_name'];?>
单号: <?php echo $_smarty_tpl->tpl_vars['r']->value['express_num'];?>
<br />
                                        <span style="color: #999">
                                            <?php if ($_smarty_tpl->tpl_vars['r']->value['express_pinyin']=='tmall'){?>
                                                <?php if ($_smarty_tpl->tpl_vars['m']->value['goods_desc'][1]){?>
                                                <a class="color02" href="<?php echo $_smarty_tpl->tpl_vars['m']->value['goods_desc'][1];?>
" target="_blank" style="display: none;">商品来源</a>
                                                <?php }?>
                                            <?php }elseif($_smarty_tpl->tpl_vars['r']->value['express_pinyin']!='none'&&$_smarty_tpl->tpl_vars['r']->value['express_num']>0){?>
                                            <a class="color02" href="http://www.kuaidi100.com/chaxun?com=<?php echo $_smarty_tpl->tpl_vars['r']->value['express_pinyin'];?>
&nu=<?php echo $_smarty_tpl->tpl_vars['r']->value['express_num'];?>
" target="_blank">查看物流</a>&nbsp;
                                            <?php }?>
                                        </span>
                                        <?php }?>
                                    </td>
                                    <td width="150">
                                        <span class="color01"><?php echo $_smarty_tpl->tpl_vars['r']->value['status_name'];?>
</span><br/>
                                        <?php if ($_smarty_tpl->tpl_vars['r']->value['status']==3){?><a href="javascript:;" onclick="zz_confirm('您确认已经收到该订单商品？','<?php echo url(('/member/finish_order/').($_smarty_tpl->tpl_vars['r']->value['id']));?>
')" class="hy-btn2">确认收货</a><br/><?php }?>
                                        <?php if ($_smarty_tpl->tpl_vars['r']->value['status']>2&&$_smarty_tpl->tpl_vars['r']->value['is_share']==0){?><a href="<?php echo url(('/member/post_share/').($_smarty_tpl->tpl_vars['r']->value['id']));?>
" class="hy-btn2">晒单</a> <?php }?>
                                    </td>
                                </tr>
                                <?php } ?>
                            </table>
                        </div>
                        <?php } ?>
                        <?php }else{ ?>
                        <tr><td>暂时没有相关记录</td></tr>
                        <?php }?>
                    </table>
                </div>
                <div class="foot-btn">
                    <?php echo $_smarty_tpl->getSubTemplate ("public_page.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

                </div>
            </div>
        </div>

        </div>
     </div>
</div>
<?php echo $_smarty_tpl->getSubTemplate ("footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>