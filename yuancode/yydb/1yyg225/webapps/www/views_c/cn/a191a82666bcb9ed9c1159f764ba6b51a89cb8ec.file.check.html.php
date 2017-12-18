<?php /* Smarty version Smarty-3.1.13, created on 2016-02-25 17:05:11
         compiled from "D:\test1yyg3.lnest.com\webapps\www\views\cn\order\check.html" */ ?>
<?php /*%%SmartyHeaderCode:764056cec3c7bbd818-39434387%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a191a82666bcb9ed9c1159f764ba6b51a89cb8ec' => 
    array (
      0 => 'D:\\test1yyg3.lnest.com\\webapps\\www\\views\\cn\\order\\check.html',
      1 => 1456367945,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '764056cec3c7bbd818-39434387',
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
  'unifunc' => 'content_56cec3c7e58c27_42174741',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56cec3c7e58c27_42174741')) {function content_56cec3c7e58c27_42174741($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<link rel="stylesheet" href="<?php echo url('/style/css/yiyuanbao.css');?>
">
<?php echo $_smarty_tpl->getSubTemplate ("ur_here.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<form action="/order/done" method="post" target="iframeNews">
<div class="g-body blue">
    <div class="g-wrap">
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
            <li style="display: none;">
                <b></b>
                <label>
                    <input type="radio" style="visibility: hidden" />
                    <a href="<?php echo url((((('/member/address/').('?back=/order/buy/')).($_smarty_tpl->tpl_vars['type']->value)).('/')).($_smarty_tpl->tpl_vars['id']->value));?>
">使用其它地址</a>
                </label>
            </li>
        </ul>

        <div class="m-cart-order m-cart-order-list">
            <div data-pro="order">
                <table class="w-table">
                    <thead>
                    <tr>
                        <th>商品名称</th>
                        <th width="100">购买价格</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['data']->value['cart']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>
                    <tr>
                        <td style="text-align:left">
                            <a target="_blank" href="<?php if ($_SESSION['extension_code']!=3){?><?php echo url(('/auction/view/').($_smarty_tpl->tpl_vars['m']->value['goods_id']));?>
<?php }else{ ?><?php echo url(('/yunbuy/detail/').($_smarty_tpl->tpl_vars['db_info']->value['buy_id']));?>
<?php }?>"><?php echo $_smarty_tpl->tpl_vars['m']->value['goods_name'];?>
</a>
                        </td>
                        <td style="text-align:left"><em><?php if ($_SESSION['extension_code']!=3){?><?php echo price_format($_smarty_tpl->tpl_vars['m']->value['goods_price']);?>
<?php }else{ ?><?php echo price_format($_smarty_tpl->tpl_vars['m']->value['market_price']);?>
<?php }?></em></td>
                    </tr>
                    <?php } ?>
                    </tbody>
                </table>

                <table class="w-table">
                    <thead>
                    <tr>
                        <th class="color01">订单备注</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td class="m-order-desc">
                            <textarea name="goods_info"><?php echo $_smarty_tpl->tpl_vars['data']->value['tips'];?>
</textarea>
                        </td>
                    </tr>
                    </tbody>
                </table>

                <?php if ($_SESSION['extension_code']!=3){?><div class="m-cart-order-options">
                    <div class="option">
                        <label class="w-checkbox">
                            <input type="checkbox" name="integral" id="integral" value="1" onchange="changeAmount({ integral:this.checked==true?1:0 })" />
                            <span>使用<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_pay_points'];?>
抵消部分余额，<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_pay_points'];?>
余额：<em><?php echo $_smarty_tpl->tpl_vars['member']->value['pay_points'];?>
</em> ，此订单可使用：<em><?php echo $_smarty_tpl->tpl_vars['data']->value['pay_points'];?>
</em> <?php echo $_smarty_tpl->tpl_vars['L']->value['unit_pay_points'];?>
</span>
                        </label>
                    </div>
                    <div class="option">
                        <label class="w-checkbox">
                            <input type="checkbox" name="surplus" id="surplus" value="1" onchange="changeAmount({ surplus:this.checked==true?1:0 })" />
                            <span>使用账户余额支付，帐户余额：<em><?php echo price_format($_smarty_tpl->tpl_vars['member']->value['user_money']);?>
</em></span>
                        </label>
                    </div>
                </div><?php }?>
            </div>
            <?php if ($_SESSION['extension_code']!=3){?>
            <div class="m-cart-order-pay f-clear" style="min-height: 120px;">
                <?php echo $_smarty_tpl->getSubTemplate ("order/total.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

            </div>
            <?php }?>

        </div>

        <div class="m-cart-submit">
            <button class="w-button w-button-main w-button-xl" id="pro-view-10" type="submit"><span><?php if ($_SESSION['extension_code']!=3){?>确认支付<?php }else{ ?>确认领奖<?php }?></span></button>
        </div>
        <?php if ($_SESSION['extension_code']!=3){?>
        <div class="w-payTips">
            <p class="w-payTips-title">付款遇到问题</p>
            <ol>
                <li>1、如您未开通网上银行，即可以使用储蓄卡快捷支付轻松完成付款；</li>
                <li>2、如果您没有网银，可以使用银联在线支付，银联有支持无需开通网银的快捷支付和储值卡支付；</li>
                <li>3、如果您有财付通或快钱、手机支付账户，可将款项先充入相应账户内，然后使用账户余额进行一次性支付；</li>
                <li>4、如果银行卡已经扣款，但您的账户中没有显示，有可能因为网络原因导致，将在第二个工作日恢复。</li>
            </ol>
        </div>
        <?php }?>

    </div>
</div>
</form>
<div class="clear mb20"></div>
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
<?php echo $_smarty_tpl->getSubTemplate ("footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>