<?php /* Smarty version Smarty-3.1.13, created on 2016-12-10 13:28:03
         compiled from "/data/01/html/1yyg225/webapps/www/views/cn/business/order.html" */ ?>
<?php /*%%SmartyHeaderCode:1546058626584b926358d928-89209607%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cb678f91c4558fd7403977e59bb7d2a0617f2bb0' => 
    array (
      0 => '/data/01/html/1yyg225/webapps/www/views/cn/business/order.html',
      1 => 1481178229,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1546058626584b926358d928-89209607',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'k' => 0,
    'q' => 0,
    'orderStatus' => 0,
    'status' => 0,
    'm' => 0,
    'list' => 0,
    'g' => 0,
    'express' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_584b9263674e24_41159402',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_584b9263674e24_41159402')) {function content_584b9263674e24_41159402($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<link type="text/css" rel="stylesheet" href="/style/css_02/style.css" />
<link type="text/css" rel="stylesheet" href="/style/css/member.css" />
<link type="text/css" rel="stylesheet" href="/style/css_02/merchant.css" />
<div class="container menu-show">
    <?php echo $_smarty_tpl->getSubTemplate ("business/ur_here.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

    <?php echo $_smarty_tpl->getSubTemplate ("business/menu.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

    <div class="fn-right hy-r" id="m">
        <div class="shop-right">
            <h3>订单管理</h3>
        </div>
        <div class="shop-bor">
            <div class="shop-order">
                <form action="/business/order#m" method="get">
                    <select class="order-select" name="k">
                        <option value="order_sn" <?php if ($_smarty_tpl->tpl_vars['k']->value=='order_sn'){?>selected<?php }?>>订单号</option>
                    </select>
                    <input type="text" name="q" value="<?php echo $_smarty_tpl->tpl_vars['q']->value;?>
" class="order-input order-w" />
                    <select class="order-select" name="status">
                        <option value="">-订单状态-</option>
                        <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['orderStatus']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['m']->key;
?>
                        <option value="<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
"<?php if ($_smarty_tpl->tpl_vars['status']->value==$_smarty_tpl->tpl_vars['k']->value){?> selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['m']->value;?>
</option>
                        <?php } ?>
                    </select>
                    <input type="submit" class="order-input2" value="搜索" />
                </form>
            </div>
            <div class="shop-order1 box-sizing">
            <table width="100%">
                <thead>
                    <tr>
                        <th colspan="2">商品详情</th>
                        <th width="300">收货人信息</th>
                        <th width="140">订单总价/还需支付</th>
                        <th>状态与操作</th>
                    </tr>
                </thead>
                <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>
                <tbody>
                    <tr><td class="shop-border" colspan="5"></td></tr>
                    <tr>
                        <th colspan="5">
                            <span class="shop-color">订单编号：</span>
                            <font><?php echo $_smarty_tpl->tpl_vars['m']->value['order_sn'];?>
</font>
                            <span>（<?php echo $_smarty_tpl->tpl_vars['m']->value['order_code'];?>
）</span>
                            <span class="shop-color">下单时间：</span>
                            <span><?php echo date('Y-m-d H:i:s',$_smarty_tpl->tpl_vars['m']->value['c_time']);?>
</span>
                            <!--<a href="#"><i class="iconfont icon-product-doc"></i>订单详情</a>-->
                            <span>会员名：</span>
                            <span class="shop-color"><?php echo $_smarty_tpl->tpl_vars['m']->value['m_username'];?>
</span>
                            <?php if ($_smarty_tpl->tpl_vars['m']->value['m_nickname']){?>
                            <span>昵称：</span>
                            <span class="shop-color"><?php echo $_smarty_tpl->tpl_vars['m']->value['m_nickname'];?>
</span>
                            <?php }?>
                            <span>注册手机：</span>
                            <font><?php echo $_smarty_tpl->tpl_vars['m']->value['m_mobile'];?>
</font>
                            <?php if ($_smarty_tpl->tpl_vars['m']->value['m_status']==0){?>
                            <b style="color: #f00">已封号</b>
                            <?php }?>
                        </th>
                    </tr>
                    <?php  $_smarty_tpl->tpl_vars['g'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['g']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['m']->value['goods']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['f']['index']=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['g']->key => $_smarty_tpl->tpl_vars['g']->value){
$_smarty_tpl->tpl_vars['g']->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['f']['index']++;
?>
                    <tr class="shop-border1">
                        <td width="85"><a href="<?php echo $_smarty_tpl->tpl_vars['m']->value['goods_url'];?>
" target="_blank"><img src="<?php echo $_smarty_tpl->tpl_vars['g']->value['imgurl_thumb'];?>
" /></a></td>
                        <td width="320" class="shop-border2">
                            <a href="<?php echo $_smarty_tpl->tpl_vars['m']->value['goods_url'];?>
" target="_blank">
                                <?php echo $_smarty_tpl->tpl_vars['g']->value['goods_name'];?>
 <font class="color03">（数量：<?php echo $_smarty_tpl->tpl_vars['g']->value['buy_num'];?>
）</font>
                            </a>
                            <?php if ($_smarty_tpl->tpl_vars['g']->value['goods_info']){?>
                            <span><?php echo nl2br($_smarty_tpl->tpl_vars['g']->value['goods_info']);?>
</span>
                            <?php }?>
                            <?php if ($_smarty_tpl->tpl_vars['g']->value['goods_price']){?>
                            <p>原价：<?php echo $_smarty_tpl->tpl_vars['g']->value['goods_price'];?>
</p>
                            <?php }?>
                        </td>
                        <?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['f']['index']==0){?>
                        <td class="shop-border3" rowspan="<?php echo count($_smarty_tpl->tpl_vars['m']->value['goods']);?>
">
                            <p><?php echo $_smarty_tpl->tpl_vars['m']->value['name'];?>
[<?php echo $_smarty_tpl->tpl_vars['m']->value['mobile'];?>
]</p>
                            <?php if ($_smarty_tpl->tpl_vars['m']->value['area']||$_smarty_tpl->tpl_vars['m']->value['deliver']){?>
                            <p><i class="iconfont icon-truckfuzhi"></i><?php echo $_smarty_tpl->tpl_vars['m']->value['area'];?>
 <?php echo $_smarty_tpl->tpl_vars['m']->value['deliver'];?>
</p>
                            <?php }?>
                            <?php if ($_smarty_tpl->tpl_vars['m']->value['express_name']||$_smarty_tpl->tpl_vars['m']->value['express_num']){?><p><?php echo $_smarty_tpl->tpl_vars['m']->value['express_name'];?>
[<a href="http://www.kuaidi100.com/chaxun?com=<?php echo $_smarty_tpl->tpl_vars['m']->value['express_pinyin'];?>
&nu=<?php echo $_smarty_tpl->tpl_vars['m']->value['express_num'];?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['m']->value['express_num'];?>
</a>]</p><?php }?>
                            <?php if ($_smarty_tpl->tpl_vars['m']->value['note']){?><p><?php echo $_smarty_tpl->tpl_vars['m']->value['note'];?>
</p><?php }?>
                        </td>
                        <td rowspan="<?php echo count($_smarty_tpl->tpl_vars['m']->value['goods']);?>
">
                            <p><?php echo price_format($_smarty_tpl->tpl_vars['m']->value['order_price']);?>
</p>
                            <strong><?php echo price_format($_smarty_tpl->tpl_vars['m']->value['amount']);?>
</strong>
                        </td>
                        <td class="shop-border4" rowspan="<?php echo count($_smarty_tpl->tpl_vars['m']->value['goods']);?>
">
                            <?php if ($_smarty_tpl->tpl_vars['m']->value['status']==2||$_smarty_tpl->tpl_vars['m']->value['status']==7){?>
                            <!--收到货款,等待发货-->
                            <p><?php echo $_smarty_tpl->tpl_vars['m']->value['status_name'];?>
</p>
                            <p><a href="javascript:;" onclick="send('<?php echo $_smarty_tpl->tpl_vars['m']->value['order_sn'];?>
')" class="order-color">发货</a></p>

                            <?php }elseif($_smarty_tpl->tpl_vars['m']->value['status']==3){?>
                            <!--已发货-->
                            <p><?php echo $_smarty_tpl->tpl_vars['m']->value['status_name'];?>
</p>
                            <p><a href="http://www.kuaidi100.com/chaxun?com=<?php echo $_smarty_tpl->tpl_vars['m']->value['express_pinyin'];?>
&nu=<?php echo $_smarty_tpl->tpl_vars['m']->value['express_num'];?>
" target="_blank" class="order-color1">查看物流</a></p>

                            <?php }else{ ?>
                            <p><?php echo $_smarty_tpl->tpl_vars['m']->value['status_name'];?>
</p>
                            <?php }?>
                        </td>
                        <?php }?>
                    </tr>
                    <?php } ?>
                </tbody>
                <?php }
if (!$_smarty_tpl->tpl_vars['m']->_loop) {
?>
                <tfoot>
                    <tr>
                        <td colspan="10" style="text-align: center;padding: 20px 0;">没有找到符合条件的订单！</td>
                    </tr>
                </tfoot>
                <?php } ?>
            </table>
            </div>
            <?php echo $_smarty_tpl->getSubTemplate ("public_page.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

        </div>
    </div>
</div>
<div class="merchant"></div>
<div id="layer_send" style="display: none;">
    <style type="text/css">
        .shop-set{ padding: 15px 20px; }
        .shop-set table tr th, .shop-set tr td{ padding: 8px 10px; }
    </style>
    <div class="shop-set">
        <form class="layer_form" action="/business/doSend" method="post" target="iframeNews">
        <table width="100%" class="box-sizing" border="0">
            <tr>
                <th width="100">订单号：</th>
                <td>
                    <span id="order_sn"></span>
                    <input type="hidden" id="order_sn_input" name="order_sn" value="" />
                </td>
            </tr>
            <tr>
                <th>选择快递：</th>
                <td>
                    <select name="express">
                        <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['express']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>
                        <option value="<?php echo $_smarty_tpl->tpl_vars['m']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['m']->value['name'];?>
</option>
                        <?php } ?>
                    </select>
                </td>
            </tr>
            <tr>
                <th>快递单号：</th>
                <td>
                    <input type="text" name="express_no" class="shop-set2" />
                </td>
            </tr>
            <tr>
                <th>&nbsp;</th>
                <td><input type="submit" name="submit" value="确认发货" class="shop-set3" /></td>
                <th>&nbsp;</th>
                <td>&nbsp;</td>
            </tr>
        </table>
        </form>
    </div>
</div>
<?php echo $_smarty_tpl->getSubTemplate ("footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<script src="/style/css_02/common_02.js"></script>
<script type="text/javascript">
    function send(order_sn){
        $('#order_sn').html(order_sn);
        $('#order_sn_input').val(order_sn);
        var pagei = $.layer({
            type: 1,   //0-4的选择,
            title: '商家订单发货',
            area: ['400px', '300px'],
            page: {
                html: $('#layer_send').html()
            }
        });
    }
</script><?php }} ?>