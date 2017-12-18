<?php /* Smarty version Smarty-3.1.13, created on 2017-01-11 20:37:34
         compiled from "/data/01/html/1yyg225/webapps/www/views/cn/yunbuy/checkout.html" */ ?>
<?php /*%%SmartyHeaderCode:1200536569584aed63bb92c7-61407463%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '521c8d5b3b3a125f0c42da2ed074d1ea9263d8e4' => 
    array (
      0 => '/data/01/html/1yyg225/webapps/www/views/cn/yunbuy/checkout.html',
      1 => 1484103638,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1200536569584aed63bb92c7-61407463',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_584aed63e20772_49937344',
  'variables' => 
  array (
    'disabled_sub' => 0,
    'data' => 0,
    'm' => 0,
    'type' => 0,
    'id' => 0,
    'L' => 0,
    'cartgoods' => 0,
    'unit' => 0,
    'cart_total' => 0,
    'bonus' => 0,
    'site_config' => 0,
    'rules' => 0,
    'member' => 0,
    'payment' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_584aed63e20772_49937344')) {function content_584aed63e20772_49937344($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<link rel="stylesheet" href="<?php echo url('/style/css/yiyuanbao.css');?>
">
<?php echo $_smarty_tpl->getSubTemplate ("ur_here.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="g-body blue">
    <div class="m-header">
        <div class="g-wrap">
            <?php if (isset($_smarty_tpl->tpl_vars["progress"])) {$_smarty_tpl->tpl_vars["progress"] = clone $_smarty_tpl->tpl_vars["progress"];
$_smarty_tpl->tpl_vars["progress"]->value = "2"; $_smarty_tpl->tpl_vars["progress"]->nocache = null; $_smarty_tpl->tpl_vars["progress"]->scope = 0;
} else $_smarty_tpl->tpl_vars["progress"] = new Smarty_variable("2", null, 0);?>
            <?php echo $_smarty_tpl->getSubTemplate ("yunbuy/progress_cart.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

        </div>
    </div>
    <form action="<?php echo url('/yunbuy/done');?>
" id="checkoutFrom" name="checkoutFrom" method="post"<?php if ($_smarty_tpl->tpl_vars['disabled_sub']->value){?> target="_blank"<?php }?>>
        <input type="hidden" name="token" value="<?php echo createToken();?>
" />
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
                <b style="width: 100px;"><?php if ($_SESSION['order_address_id']==$_smarty_tpl->tpl_vars['m']->value['id']){?>直购商品寄送至：<?php }?></b>
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
                        <caption>订单<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_price'];?>
</caption>
                        <colgroup>
                            <col class="w-table-col0">
                            <col class="w-table-col1">
                            <col class="w-table-col2">
                            <col class="w-table-col3">
                            <col class="w-table-col5">
                        </colgroup>
                        <thead>
                        <tr>
                            <th><?php echo $_smarty_tpl->tpl_vars['L']->value['unit_price'];?>
名称</th>
                            <th class="tc">价值</th>
                            <th class="tc"><?php echo $_smarty_tpl->tpl_vars['L']->value['unit_yun'];?>
价</th>
                            <th class="tc">参与人次</th>
                            <th class="tc">参与多期</th>
                            <th class="tc">小计</th>
                        </tr></thead>
                        <tbody>
                        <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['cartgoods']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>
                        <tr>
                            <td style="text-align: left;">
                                <input type="hidden" name="id[]" value="<?php echo $_smarty_tpl->tpl_vars['m']->value['id'];?>
">
                                <?php if ($_smarty_tpl->tpl_vars['m']->value['type']==3){?>
                                <a target="_blank" href="<?php echo ('/yunbuy/detail/').($_smarty_tpl->tpl_vars['m']->value['buy_id']);?>
"><?php echo $_smarty_tpl->tpl_vars['m']->value['goods_name'];?>
</a>
                                <span class="color01">【<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_go_buy'];?>
商品】</span>
                                <?php }else{ ?>
                                <a target="_blank" href="<?php echo ('/yunbuy/detail/').($_smarty_tpl->tpl_vars['m']->value['buy_id']);?>
">(第<?php echo $_smarty_tpl->tpl_vars['m']->value['qishu'];?>
期) <?php echo $_smarty_tpl->tpl_vars['m']->value['goods_name'];?>
</a>
                                <?php }?>
                            </td>
                            <td>
                                <?php if ($_smarty_tpl->tpl_vars['m']->value['type']==3){?>
                                --
                                <?php }elseif($_smarty_tpl->tpl_vars['m']->value['type']==1){?>
                                <?php echo price_format($_smarty_tpl->tpl_vars['m']->value['goods_price']);?>

                                <?php }else{ ?>
                                <?php echo $_smarty_tpl->tpl_vars['m']->value['goods_price'];?>
<?php echo $_smarty_tpl->tpl_vars['unit']->value;?>

                                <?php }?>
                            </td>
                            <td>
                                <?php if ($_smarty_tpl->tpl_vars['m']->value['type']==2){?>
                                <?php echo $_smarty_tpl->tpl_vars['m']->value['price'];?>
<?php echo $_smarty_tpl->tpl_vars['unit']->value;?>

                                <?php }else{ ?>
                                <?php echo price_format($_smarty_tpl->tpl_vars['m']->value['price']);?>

                                <?php }?>
                            </td>
                            <td><?php echo $_smarty_tpl->tpl_vars['m']->value['qty'];?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['m']->value['multi'];?>
</td>
                            <td><em>
                                <?php if ($_smarty_tpl->tpl_vars['m']->value['type']==2){?>
                                <?php echo $_smarty_tpl->tpl_vars['m']->value['subtotal'];?>
 <?php echo $_smarty_tpl->tpl_vars['unit']->value;?>

                                <?php }else{ ?>
                                <?php echo price_format($_smarty_tpl->tpl_vars['m']->value['subtotal']);?>

                                <?php }?>
                            </em></td>
                        </tr>
                        <?php } ?>
                        </tbody>
                    </table>

                    <div class="m-cart-order-total">
                        <a href="<?php echo url('/yunbuy/cart');?>
<?php if ($_POST['free']==1){?>?free<?php }?>" style="font-size: 14px;">返回清单修改</a>
                        <span class="total txt-gray">
                            <?php if (isset($_POST['free'])){?>
                            合计：<strong><?php echo $_smarty_tpl->tpl_vars['cart_total']->value;?>
</strong> <?php echo $_smarty_tpl->tpl_vars['unit']->value;?>

                            <?php }else{ ?>
                            合计：<strong><?php echo price_format($_smarty_tpl->tpl_vars['cart_total']->value);?>
</strong>
                            <?php }?>
                        </span>
                    </div>

                    <div class="m-cart-order-options">
                        <?php if ($_smarty_tpl->tpl_vars['bonus']->value){?>
                        <div class="option">
                            <label class="w-checkbox w-checkbox-disabled">
                                <input type="checkbox" value="1" name="bonus_pay" checked />
                                <span data-pro="text" style="color:#000;font-weight:bold;">使用<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_bonus'];?>
：<span class="color01"><?php echo count($_smarty_tpl->tpl_vars['bonus']->value['list']);?>
</span> <?php echo $_smarty_tpl->tpl_vars['L']->value['unit_bonus_unit'];?>
 价值： <em><?php echo $_smarty_tpl->tpl_vars['bonus']->value['money'];?>
</em> 个<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_db_points'];?>
</span>
                                <?php if ($_smarty_tpl->tpl_vars['site_config']->value['pay_discount_status']==1){?><span style="color:rgba(229, 64, 72, 1);">（买网盘送<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_db_points'];?>
）</span><?php }?>
                            	<?php if ($_smarty_tpl->tpl_vars['rules']->value){?><span style="color:rgba(229, 64, 72, 1);">（<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_bonus'];?>
使用规则【<?php echo $_smarty_tpl->tpl_vars['site_config']->value['full_cut'];?>
】：购物车单笔满<?php echo $_smarty_tpl->tpl_vars['rules']->value[0];?>
，就可以使用价值<?php echo $_smarty_tpl->tpl_vars['rules']->value[1];?>
的<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_bonus'];?>
）</span><?php }?>
                            </label>
                        </div>
                        <?php }?>
                        <div class="option">
                            <?php if ($_POST['free']!=1){?>
                            <label class="w-checkbox w-checkbox-disabled"><input type="checkbox" value="1" name="balance_pay" checked /> <span data-pro="text" style="color:#000;font-weight:bold;">使用<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_db_points'];?>
：<span class="color01"><?php echo $_smarty_tpl->tpl_vars['member']->value['db_points'];?>
</span> 个 账户余额： <em>￥ <?php echo $_smarty_tpl->tpl_vars['member']->value['user_money'];?>
</em></span> <span style="color:#999">（使用账户余额或<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_db_points'];?>
支付）</span></label>
                            <?php }else{ ?>
                            <input type="hidden" value="1" name="free" />
                            <label class="w-checkbox w-checkbox-disabled"><input type="checkbox" value="1" name="balance_pay" checked disabled="disabled" /> <span data-pro="text">剩余<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_pay_points'];?>
：<em><?php echo $_smarty_tpl->tpl_vars['member']->value['pay_points'];?>
</em>个</span> <span style="color:#999">（使用<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_pay_points'];?>
支付）</span></label>
                            <?php }?>
                        </div>
                    </div>
                </div>
                <?php if ($_POST['free']!=1){?>
                <div class="m-cart-order-pay f-clear" style="padding-bottom: 0;">
                    <div class="pay_online">
                        <div class="tips" style="padding:10px 20px 5px;display: none;">
                            <p>每支付1元购买网盘空间，系统将会赠送1个<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_db_points'];?>
（即1次<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_choujiang'];?>
机会），可联系客服在线开通，支付的款项将无法退回。</p>
                        </div>
                        <div>
                            <div class="w-pay">
                                <div class="w-pay-title">支付方式：</div>
                                <div class="w-pay-selector">
                                    <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['payment']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['payment']['iteration']=0;
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['payment']['iteration']++;
?>
                                    <div style="float: left">
                                        <label class="w-pay-type w-pay-type-3 <?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['payment']['iteration']==1){?>w-pay-selected<?php }?> <?php echo $_smarty_tpl->tpl_vars['m']->value['pay_code'];?>
"><input type="radio" name="pay_id" value="<?php echo $_smarty_tpl->tpl_vars['m']->value['pay_id'];?>
" style="display: none;" <?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['payment']['iteration']==1){?>checked<?php }?>><?php echo $_smarty_tpl->tpl_vars['m']->value['pay_name'];?>
</label>
                                        <?php if ($_smarty_tpl->tpl_vars['m']->value['pay_code']=='teegon'){?>
                                        <div class="payment" style="display: none;">

                                        </div>
                                        <?php }?>
                                    </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php }?>

                <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['cartgoods']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>
                <?php if ($_smarty_tpl->tpl_vars['m']->value['type']==3){?>
                <table class="w-table">
                    <thead style="border-top:0;">
                    <tr>
                        <th class="color01">下单备注：<?php echo $_smarty_tpl->tpl_vars['m']->value['goods_name'];?>
（<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_go_buy'];?>
商品）</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td class="m-order-desc">
                            <textarea name="goods_info_<?php echo $_smarty_tpl->tpl_vars['m']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['m']->value['tips'];?>
</textarea>
                        </td>
                    </tr>
                    </tbody>
                </table>
                <?php }?>
                <?php } ?>
            </div>
            <div class="m-cart-submit" data-pro="submit">
                <?php if ($_POST['free']==1&&$_smarty_tpl->tpl_vars['disabled_sub']->value){?>
                <a style="float:right;color:#fff;" href="/member#free" class="w-button w-button-main w-button-xl"><span><?php echo $_smarty_tpl->tpl_vars['L']->value['unit_pay_points'];?>
不足，点击领<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_pay_points'];?>
</span></a>
                <?php }else{ ?>
                <button type="submit" class="w-button w-button-main w-button-xl" id="pro-view-10" onclick="return submitCheck()"><span>确认支付</span></button>
                <?php }?>
            </div>

            <div class="w-payTips" style="margin-bottom: 10px;">
                <p class="w-payTips-title">付款遇到问题</p>
                <ol>
                    <li>1、如您未开通网上银行，即可以使用储蓄卡快捷支付轻松完成付款；</li>
                    <li>2、如果您没有网银，可以使用银联在线支付，银联有支持无需开通网银的快捷支付和储值卡支付；</li>
                    <li>3、如果您有财付通或快钱、手机支付账户，可将款项先充入相应账户内，然后使用账户余额进行一次性支付；</li>
                    <li>4、如果银行卡已经扣款，但您的账户中没有显示，有可能因为网络原因导致，将在第二个工作日恢复。</li>
                </ol>
            </div>

        </div>
    </form>
</div>
<script type="text/javascript">
    $('input[name=sharecode]').blur(total);
    $(function(){
        $('.w-pay-selector').each(function(){
            var selector = $(this);
            selector.find('.w-pay-type').bind('click',function(){
                $('.w-pay-selector').find('.w-pay-type').removeClass('w-pay-selected');
                $('.w-pay-selector').find('.w-pay-type').children('input[name=pay_id]').attr('checked',false);
                $(this).addClass('w-pay-selected');
                $(this).children('input[name=pay_id]').attr('checked',true);
                if($(this).hasClass('teegon') == true){
                    $('.payment').empty();
                    $('.payment').css('display','block');
                    $('.payment').append('<input type="radio" name="payment_type" value="alipay" checked>支付宝' +
                            '<input type="radio" name="payment_type" value="wxpay">微信支付')
                }else {
                    $('.payment').empty();
                    $('.payment').css('display','none');
                }
            });
        });

        if($('.w-pay-selected').hasClass('teegon')){
            $('.payment').empty();
            $('.payment').css('display','block');
            $('.payment').append('<input type="radio" name="payment_type" value="alipay" checked>支付宝' +
                    '<input type="radio" name="payment_type" value="wxpay">微信支付')
        }

    });
    function total(){
        var sharecode = $("input[name='sharecode']").val();

        var ids = '';
        var i=0;
        $("input[name='id[]']").each(function(){
            i++;
            ids += i==$("input[name='id[]']").length ? $(this).val() :$(this).val()+',';
        });
        $.getJSON('/yunbuy/total', { sharecode:sharecode,ids:ids } ,function(data){
            $(".share_notice").html(data.msg);
        });
    }
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
    function submitCheck(){
        <?php if ($_smarty_tpl->tpl_vars['disabled_sub']->value){?>
        $.layer({
            type: 2,
            fix: true,
            shadeClose: false,
            title: '温馨提示',
            iframe: { src : '/yunbuy/payTip' },
            area: ['420px' , '230px']
        });
        <?php }?>
        return true;
    }
</script>
<?php echo $_smarty_tpl->getSubTemplate ("footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>