<?php /* Smarty version Smarty-3.1.13, created on 2016-12-10 01:56:49
         compiled from "/data/01/html/1yyg225/webapps/www/views/manage/order/list.html" */ ?>
<?php /*%%SmartyHeaderCode:19229189425845202809dfe1-06494522%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5a8aa950b289147cd078b9e0a58070bc604a00de' => 
    array (
      0 => '/data/01/html/1yyg225/webapps/www/views/manage/order/list.html',
      1 => 1481178229,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19229189425845202809dfe1-06494522',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5845202820c293_10562817',
  'variables' => 
  array (
    'btnMenu' => 0,
    'btnNo' => 0,
    'key' => 0,
    'm' => 0,
    'data' => 0,
    'business_power' => 0,
    'list' => 0,
    'g' => 0,
    'n' => 0,
    'goodsForm' => 0,
    'k' => 0,
    'page' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5845202820c293_10562817')) {function content_5845202820c293_10562817($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/data/01/html/1yyg225/system/smarty/plugins/modifier.date_format.php';
?><header>    <style type="text/css">        .order_disable{ color: #999; }        .order_disable *{ color: #999 !important; }    </style></header><h3 class="info-tag">    <a class="uiBtn BtnGreen r" href="javascript:;" onclick="exportMember()">导出Excel</a>    <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['btnMenu']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['m']->key;
?>    <a class="uiBtn<?php if ($_smarty_tpl->tpl_vars['btnNo']->value==$_smarty_tpl->tpl_vars['key']->value){?> BtnBlue<?php }?>" href="<?php echo $_smarty_tpl->tpl_vars['m']->value['url'];?>
"<?php if ($_smarty_tpl->tpl_vars['m']->value['str']){?> <?php echo $_smarty_tpl->tpl_vars['m']->value['str'];?>
<?php }?>><?php echo $_smarty_tpl->tpl_vars['m']->value['name'];?>
</a>    <?php } ?></h3><div class="html-box">    <form class="cond-form clear" action="#!order/index" method="get" onsubmit="return xForm.submit(this)">        <?php echo $_smarty_tpl->getSubTemplate ('../order/public_form.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
    </form>    <?php if ($_smarty_tpl->tpl_vars['data']->value){?>    <div class="tips">        采购成本：        <b class="c-red"><?php echo price_format((($tmp = @$_smarty_tpl->tpl_vars['data']->value['oldprice'])===null||$tmp==='' ? 0 : $tmp));?>
</b>        <span class="form-tip">（订单设置的采购价）</span>        商品成本：        <b class="c-red"><?php echo price_format((($tmp = @$_smarty_tpl->tpl_vars['data']->value['price'])===null||$tmp==='' ? 0 : $tmp));?>
</b>        <span class="form-tip">（商品设置的原价）</span>        订单支付（不含第三方支付）：        <b class="c-red"><?php echo price_format((($tmp = @$_smarty_tpl->tpl_vars['data']->value['order_price'])===null||$tmp==='' ? 0 : $tmp));?>
</b>        第三方支付：        <b class="c-red"><?php echo price_format((($tmp = @$_smarty_tpl->tpl_vars['data']->value['money_paid'])===null||$tmp==='' ? 0 : $tmp));?>
</b>        <?php if ($_smarty_tpl->tpl_vars['business_power']->value){?>        平台返佣：        <b class="c-red"><?php echo price_format((($tmp = @$_smarty_tpl->tpl_vars['data']->value['bus_money_manage'])===null||$tmp==='' ? 0 : $tmp));?>
</b>        <?php }?>    </div>    <?php }?>    <table class="tb-goods" style="width:100%">        <thead>            <tr>                <th nowrap class="oid" colspan="3">商品详情</th>                <th nowrap class="w120">收货人信息</th>                <th nowrap class="w140">订单总价/还需支付</th>                <th nowrap>状态与操作</th>            </tr>        </thead>        <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>        <tbody>            <tr><td colspan="10" class="sep-row"></td></tr>            <tr class="order-head"><td colspan="10">                订单编号：<span class="order-no"><?php echo $_smarty_tpl->tpl_vars['m']->value['order_sn'];?>
</span><span class="c-gray">（<?php echo $_smarty_tpl->tpl_vars['m']->value['order_code'];?>
<?php if ($_smarty_tpl->tpl_vars['m']->value['cod_time']){?> <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['m']->value['cod_time'],'Y-m-d H:i');?>
<?php }?>）</span> ，                下单时间：<span class="order-date"><?php echo date('Y-m-d H:i:s',$_smarty_tpl->tpl_vars['m']->value['c_time']);?>
</span>                <a class="uiBtn BtnXs" href="#!order/detail/<?php echo $_smarty_tpl->tpl_vars['m']->value['id'];?>
?com=xshow|订单详情(<?php echo $_smarty_tpl->tpl_vars['m']->value['order_sn'];?>
)"><i class="iconfont">&#xe601;</i><span>订单详情</span></a>                &nbsp;                <span class="c-gray">会员名：</span><span><?php echo $_smarty_tpl->tpl_vars['m']->value['m_username'];?>
</span>                <?php if ($_smarty_tpl->tpl_vars['m']->value['m_nickname']){?><span class="c-gray">昵称：</span><span><?php echo $_smarty_tpl->tpl_vars['m']->value['m_nickname'];?>
</span><?php }?>                <?php if ($_smarty_tpl->tpl_vars['m']->value['m_realname']){?><span class="c-gray">姓名：</span><b class="c-orange"><?php echo $_smarty_tpl->tpl_vars['m']->value['m_realname'];?>
</b><?php }?>                <span class="c-gray">注册手机：</span><span class="c-green"><?php echo $_smarty_tpl->tpl_vars['m']->value['m_mobile'];?>
</span>                <?php if ($_smarty_tpl->tpl_vars['m']->value['m_status']==0){?>                <b class="c-red">已封号</b>                <?php }?>            </td></tr>            <?php  $_smarty_tpl->tpl_vars['g'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['g']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['m']->value['goods']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['g']->key => $_smarty_tpl->tpl_vars['g']->value){
$_smarty_tpl->tpl_vars['g']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['g']->key;
?>            <tr>                <td class="bdl w5"></td>                <td class="w70"><img src="<?php echo $_smarty_tpl->tpl_vars['g']->value['imgurl_thumb'];?>
" style="width:70px" /></td>                <td class="bdr<?php if ($_smarty_tpl->tpl_vars['g']->value['bus_name']){?> order_disable<?php }?>" style="line-height: 1.5;">                    <div class="oi-name">                        <a href="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['g']->value['goods_url'])===null||$tmp==='' ? $_smarty_tpl->tpl_vars['m']->value['goods_url'] : $tmp);?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['g']->value['goods_name'];?>
</a>                        <span class="c-gray">（数量：<?php echo $_smarty_tpl->tpl_vars['g']->value['buy_num'];?>
）</span>                        <?php if ($_smarty_tpl->tpl_vars['g']->value['bus_name']){?>                        <p>                            <span class="c-red">商家：<?php echo $_smarty_tpl->tpl_vars['g']->value['bus_name'];?>
</span>                            <?php if ($_smarty_tpl->tpl_vars['g']->value['item_status_name']){?>                            【<?php echo $_smarty_tpl->tpl_vars['g']->value['item_status_name'];?>
】【<?php echo $_smarty_tpl->tpl_vars['g']->value['express_name'];?>
: <?php echo $_smarty_tpl->tpl_vars['g']->value['item_express_num'];?>
】                            <?php }?>                        </p>                        <?php }?>                    </div>                    <?php if ($_smarty_tpl->tpl_vars['g']->value['virtual_list']){?>                    <ul class="virtual_ul c-red">                        <?php  $_smarty_tpl->tpl_vars['n'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['n']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['g']->value['virtual_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['n']->key => $_smarty_tpl->tpl_vars['n']->value){
$_smarty_tpl->tpl_vars['n']->_loop = true;
?>                        <li>                            <span>卡号：<?php echo $_smarty_tpl->tpl_vars['n']->value['vir_number'];?>
</span>                        </li>                        <?php } ?>                    </ul>                    <?php }?>                    <div class="oi-name" style="color:#999"><?php echo $_smarty_tpl->tpl_vars['g']->value['rule'];?>
</div>                    <?php if ($_smarty_tpl->tpl_vars['g']->value['goods_info']){?>                    <div class="c-gray" style="line-height: 1.2;">                        <?php echo nl2br($_smarty_tpl->tpl_vars['g']->value['goods_info']);?>
                    </div>                    <?php }?>                    <div class="c-red">                        <?php if ($_smarty_tpl->tpl_vars['g']->value['goods_price']){?>                        原价：<?php echo $_smarty_tpl->tpl_vars['g']->value['goods_price'];?>
<br>                        <?php }?>                        <?php if ($_smarty_tpl->tpl_vars['m']->value['oldprice']>0){?>                        采购价：<?php echo $_smarty_tpl->tpl_vars['m']->value['oldprice'];?>
<br>                        <?php }?>                        <?php if ($_smarty_tpl->tpl_vars['m']->value['fow']){?>                        采购站点：<?php echo $_smarty_tpl->tpl_vars['goodsForm']->value[$_smarty_tpl->tpl_vars['m']->value['fow']]['title'];?>
<br>                        <?php }?>                        <?php if ($_smarty_tpl->tpl_vars['m']->value['fono']){?>                        采购订单号：<?php echo $_smarty_tpl->tpl_vars['m']->value['fono'];?>
<br>                        <?php }?>                    </div>                </td>                <?php if ($_smarty_tpl->tpl_vars['k']->value==0){?>                <td class="ac bdr w300" rowspan="<?php echo count($_smarty_tpl->tpl_vars['m']->value['goods']);?>
">                    <div><?php echo $_smarty_tpl->tpl_vars['m']->value['name'];?>
[<?php echo $_smarty_tpl->tpl_vars['m']->value['mobile'];?>
]</div>                    <?php if ($_smarty_tpl->tpl_vars['m']->value['area']||$_smarty_tpl->tpl_vars['m']->value['deliver']){?><div><i class="iconfont">&#xe655;</i> <?php echo $_smarty_tpl->tpl_vars['m']->value['area'];?>
 <?php echo $_smarty_tpl->tpl_vars['m']->value['deliver'];?>
</div><?php }?>                    <?php if ($_smarty_tpl->tpl_vars['m']->value['express_name']||$_smarty_tpl->tpl_vars['m']->value['express_num']){?><div><?php echo $_smarty_tpl->tpl_vars['m']->value['express_name'];?>
[<?php echo $_smarty_tpl->tpl_vars['m']->value['express_num'];?>
]</div><?php }?>                    <?php if ($_smarty_tpl->tpl_vars['m']->value['note']){?><div><?php echo $_smarty_tpl->tpl_vars['m']->value['note'];?>
</div><?php }?>                </td>                <td class="ac bdr" rowspan="<?php echo count($_smarty_tpl->tpl_vars['m']->value['goods']);?>
" style="line-height:18px;">                    <?php echo price_format($_smarty_tpl->tpl_vars['m']->value['order_price']);?>
<br />                    <b style="color:#f60"><?php echo price_format($_smarty_tpl->tpl_vars['m']->value['amount']);?>
</b>                    <?php if ($_smarty_tpl->tpl_vars['m']->value['ismoney']){?>                    <!--<a href="javascript:;" onclick="if(confirm('确认设为财务未确认吗?')) main.chang_status('<?php echo $_smarty_tpl->tpl_vars['m']->value['id'];?>
','goods_order','ismoney')" class='iconfont icon-a c-green' title="点击设置为财务未确认">&#xe648;</a>-->                    <?php }else{ ?>                    <!--<a href="javascript:;" onclick="if(confirm('确认设为财务已确认吗?')) main.chang_status('<?php echo $_smarty_tpl->tpl_vars['m']->value['id'];?>
','goods_order','ismoney')" class='iconfont icon-a c-gray' title="点击财务确认">&#xe648;</a>-->                    <?php }?>                    <?php if ($_smarty_tpl->tpl_vars['m']->value['status']=='1'){?>                    <!--<br><a href="javascript:;" class="uiBtn BtnXs e2-order-chPrice-<?php echo $_smarty_tpl->tpl_vars['m']->value['id'];?>
">调整价格</a>-->                    <?php }?>                </td>                <td class="ac bdr" rowspan="<?php echo count($_smarty_tpl->tpl_vars['m']->value['goods']);?>
">                    <div style="line-height:18px">                        <?php if ($_smarty_tpl->tpl_vars['m']->value['share_id']){?><a class="c-green" href="/minfo?id=<?php echo $_smarty_tpl->tpl_vars['m']->value['mid'];?>
#share#vid=<?php echo $_smarty_tpl->tpl_vars['m']->value['share_id'];?>
" target="_blank">已晒单</a><br>                        <?php }else{ ?><span class="c-gray">未晒单</span><br><?php }?>                        <?php if ($_smarty_tpl->tpl_vars['m']->value['status']==1){?>                        <!--等待付款  订单状态,1已下单等待付款,2已付款等待发货,3已发货填入物流单号,4已签收完成交易-->                        <?php echo $_smarty_tpl->tpl_vars['m']->value['status_name'];?>
<br>                        <!--<a href="javscript:;" class="od-cancel e2-order-cancel-<?php echo $_smarty_tpl->tpl_vars['m']->value['id'];?>
">取消订单</a><br>                        <a href="javascript:;" class="uiBtn BtnBlue BtnXs e2-order-receivedPay-<?php echo $_smarty_tpl->tpl_vars['m']->value['id'];?>
">收到货款</a>-->                        <?php }elseif($_smarty_tpl->tpl_vars['m']->value['status']==2||$_smarty_tpl->tpl_vars['m']->value['status']==7){?>                        <!--收到货款,等待发货-->                        <?php echo $_smarty_tpl->tpl_vars['m']->value['status_name'];?>
<br>                        <a href="#!order/send/<?php echo $_smarty_tpl->tpl_vars['m']->value['id'];?>
?com=xshow|发货" class="uiBtn BtnGreen BtnXs">发货</a>                        <?php }elseif($_smarty_tpl->tpl_vars['m']->value['status']==3){?>                        <!--已发货-->                        <?php echo $_smarty_tpl->tpl_vars['m']->value['status_name'];?>
<br>                        <a style="display:none" href="javascript:;" class="uiBtn BtnOrange BtnXs e2-order-viewExpress-<?php echo $_smarty_tpl->tpl_vars['m']->value['id'];?>
">查看物流</a>                        <a href="http://www.kuaidi100.com/chaxun?com=<?php echo $_smarty_tpl->tpl_vars['m']->value['express_pinyin'];?>
&nu=<?php echo $_smarty_tpl->tpl_vars['m']->value['express_num'];?>
" target="_blank" class="uiBtn BtnOrange BtnXs">查看物流</a>                        <?php }elseif($_smarty_tpl->tpl_vars['m']->value['status']==4){?>                        <!--交易完成-->                        <?php echo $_smarty_tpl->tpl_vars['m']->value['status_name'];?>
<br>                        <?php }elseif($_smarty_tpl->tpl_vars['m']->value['status']==5){?>                        <!--订单已取消-->                        <?php echo $_smarty_tpl->tpl_vars['m']->value['status_name'];?>
<br>                        <?php }?>                    </div>                </td>                <?php }?>            </tr>            <?php } ?>        </tbody>        <?php }
if (!$_smarty_tpl->tpl_vars['m']->_loop) {
?>        <tbody>        <tr><td class="bdl bdr" style="text-align:center" colspan="10">            没有找到符合条件的订单!        </td></tr>        <?php } ?>    </table>    <div class="foot-btn">        <div class="pager r"><?php echo $_smarty_tpl->tpl_vars['page']->value;?>
</div>    </div>        <style type="text/css">        .setorder{line-height:18px; height:18px}        .setorder i{vertical-align:middle}        .order_num{text-align:center}        .span10 .order_num .order{width:30px; min-width:0; text-align:center; display:block; margin:0 auto}    </style>    <script type="text/javascript" src="/admin/js/manage/order.js"></script>    <script type="text/javascript">        function exportMember(){            var arr = location.hash.split("?");            var get = arr[1]?('?'+arr[1]):'';            if(!get){                com.xtip('导出量较大，请先进行筛选操作！',{type:1});            }else{                location.href='/manage/order/exportExcel'+get;            }        }    </script>    </div><?php }} ?>