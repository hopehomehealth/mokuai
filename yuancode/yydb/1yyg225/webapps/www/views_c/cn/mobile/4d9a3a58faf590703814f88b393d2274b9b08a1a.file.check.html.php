<?php /* Smarty version Smarty-3.1.13, created on 2016-03-07 14:46:51
         compiled from "D:\test1yyg3.lnest.com\webapps\www\views\cn\mobile\order\check.html" */ ?>
<?php /*%%SmartyHeaderCode:575856dd23dbf109f7-75231876%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4d9a3a58faf590703814f88b393d2274b9b08a1a' => 
    array (
      0 => 'D:\\test1yyg3.lnest.com\\webapps\\www\\views\\cn\\mobile\\order\\check.html',
      1 => 1456367943,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '575856dd23dbf109f7-75231876',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'data' => 0,
    'm' => 0,
    'type' => 0,
    'id' => 0,
    'db_info' => 0,
    'L' => 0,
    'member' => 0,
    'total' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_56dd23dc2b31a9_81621248',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56dd23dc2b31a9_81621248')) {function content_56dd23dc2b31a9_81621248($_smarty_tpl) {?><?php if (isset($_smarty_tpl->tpl_vars['header'])) {$_smarty_tpl->tpl_vars['header'] = clone $_smarty_tpl->tpl_vars['header'];
$_smarty_tpl->tpl_vars['header']->value = 'header2'; $_smarty_tpl->tpl_vars['header']->nocache = null; $_smarty_tpl->tpl_vars['header']->scope = 0;
} else $_smarty_tpl->tpl_vars['header'] = new Smarty_variable('header2', null, 0);?>
<?php echo $_smarty_tpl->getSubTemplate ("top.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<link rel="stylesheet" href="/style/mobile/css/order.css">
<div id="content" class="container main">
    <form action="/order/done" method="post" target="iframeNews">
        <div class="tips-m">
            <ul class="m-cart-address">
                <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['data']->value['addressList']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['m']->key;
?>
                <li id="address-<?php echo $_smarty_tpl->tpl_vars['m']->value['id'];?>
" <?php if ($_SESSION['order_address_id']==$_smarty_tpl->tpl_vars['m']->value['id']){?> class="on"<?php }?>>
                <b><?php if ($_SESSION['order_address_id']==$_smarty_tpl->tpl_vars['m']->value['id']){?>寄送至：<?php }?></b>
                <label>
                    <input type="radio" name="address_id" value="<?php echo $_smarty_tpl->tpl_vars['m']->value['id'];?>
" onchange="changeAddress('<?php echo $_smarty_tpl->tpl_vars['m']->value['id'];?>
')" <?php if ($_SESSION['order_address_id']==$_smarty_tpl->tpl_vars['m']->value['id']){?> checked<?php }?> />
                    <?php echo $_smarty_tpl->tpl_vars['m']->value['area'];?>
 <?php echo $_smarty_tpl->tpl_vars['m']->value['address'];?>
（<?php echo $_smarty_tpl->tpl_vars['m']->value['name'];?>
 收）<span><?php echo $_smarty_tpl->tpl_vars['m']->value['mobile'];?>
</span>
                </label>
                <span style="display: none;"><a href="<?php echo url(((((('/member/address/').($_smarty_tpl->tpl_vars['m']->value['id'])).('?back=/order/buy/')).($_smarty_tpl->tpl_vars['type']->value)).('/')).($_smarty_tpl->tpl_vars['id']->value));?>
" class="ui-right address-edit"<?php if ($_SESSION['order_address_id']==$_smarty_tpl->tpl_vars['m']->value['id']){?> style="display:block"<?php }?>>修改本地址</a></span>
                </li>
                <?php } ?>
            </ul>
        </div>
        <div class="title-o">订单商品</div>
        <div class="pay-list">
            <ul>
                <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['data']->value['cart']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>
                <li class="ui-clr">
                    <span class="name"><a target="_blank" href="<?php if ($_SESSION['extension_code']!=3){?><?php echo url(('/auction/view/').($_smarty_tpl->tpl_vars['m']->value['goods_id']));?>
<?php }else{ ?><?php echo url(('/yunbuy/detail/').($_smarty_tpl->tpl_vars['db_info']->value['buy_id']));?>
<?php }?>"><?php echo $_smarty_tpl->tpl_vars['m']->value['goods_name'];?>
</a></span>
                    <span class="num"><b class="color01"><?php if ($_SESSION['extension_code']!=3){?><?php echo price_format($_smarty_tpl->tpl_vars['m']->value['goods_price']);?>
<?php }else{ ?><?php echo price_format($_smarty_tpl->tpl_vars['m']->value['market_price']);?>
<?php }?></b></span>
                </li>
                <?php } ?>
            </ul>
        </div>

        <div class="title-o">订单备注</div>
        <div class="order-area">
            <textarea name="goods_info" style="width:100%;height:60px;border:0;padding:5px;"><?php echo $_smarty_tpl->tpl_vars['data']->value['tips'];?>
</textarea>
        </div>

        <?php if ($_SESSION['extension_code']!=3){?>
        <div class="m-cart-order-options">
            <div class="option">
                <label class="w-checkbox">
                    <input type="checkbox" name="integral" id="integral" value="1" onchange="changeAmount({ integral:this.checked==true?1:0 })" />
                    <span>使用<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_pay_points'];?>
抵消部分余额，<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_pay_points'];?>
余额：<b class="color01"><?php echo $_smarty_tpl->tpl_vars['member']->value['pay_points'];?>
</b> ，此订单可使用：<b class="color01"><?php echo $_smarty_tpl->tpl_vars['data']->value['pay_points'];?>
</b> <?php echo $_smarty_tpl->tpl_vars['L']->value['unit_pay_points'];?>
</span>
                </label>
            </div>
            <div class="option">
                <label class="w-checkbox">
                    <input type="checkbox" name="surplus" id="surplus" value="1" onchange="changeAmount({ surplus:this.checked==true?1:0 })" />
                    <span>使用账户余额支付，帐户余额：<b class="color01"><?php echo price_format($_smarty_tpl->tpl_vars['member']->value['user_money']);?>
</b></span>
                </label>
            </div>
        </div>
        <?php }?>

        <?php if ($_SESSION['extension_code']!=3){?>
        <div class="m-cart-order-pay f-clear" style="min-height: 120px;">
            <?php echo $_smarty_tpl->getSubTemplate ("order/total.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

        </div>
        <?php }?>

        <div class="order-submit">
            <button class="ap-button" type="submit"><?php if ($_SESSION['extension_code']!=3){?>确认支付<?php }else{ ?>确认领取<?php }?></button>
        </div>
    </form>
</div>
<script type="text/javascript">
    $(function(){
        <?php if ($_smarty_tpl->tpl_vars['total']->value['integral']>0){?>
        $('#integral').click();
        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['total']->value['surplus']>0){?>
        $('#surplus').click();
        <?php }?>
    })
    function changeAddress(id){
        $('.m-cart-address li').removeClass('on').find('b').html('');
        $('#address-'+id).addClass('on').find('b').html('寄送至：');

        var D = { address_id:id };
        $.post("/order/updateAddress", D,
            function(data){
                //location.reload();
            }
        );
    }
    function changeAmount(D){
        $.post("/order/updateAmount", D,
            function(data){
                if(data){
                    $('.m-cart-order-pay').html(data);
                }
            }
        );
    }
</script>
<iframe name="iframeNews" style="display:none;"></iframe>
</body>
</html><?php }} ?>