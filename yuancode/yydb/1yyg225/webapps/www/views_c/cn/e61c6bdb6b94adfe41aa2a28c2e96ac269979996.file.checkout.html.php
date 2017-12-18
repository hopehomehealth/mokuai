<?php /* Smarty version Smarty-3.1.13, created on 2015-12-03 10:31:50
         compiled from "F:\WWW\1yyg225\webapps\www\views\cn\yunbuy\checkout.html" */ ?>
<?php /*%%SmartyHeaderCode:18180565fa996581929-45758651%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e61c6bdb6b94adfe41aa2a28c2e96ac269979996' => 
    array (
      0 => 'F:\\WWW\\1yyg225\\webapps\\www\\views\\cn\\yunbuy\\checkout.html',
      1 => 1449047006,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18180565fa996581929-45758651',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'cartgoods' => 0,
    'm' => 0,
    'unit' => 0,
    'cart_total' => 0,
    'is_share' => 0,
    'bonus' => 0,
    'member' => 0,
    'disabled_sub' => 0,
    'payment' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_565fa9966c4dd7_96551650',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_565fa9966c4dd7_96551650')) {function content_565fa9966c4dd7_96551650($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

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
" id="checkoutFrom" method="post">
        <div class="g-wrap">
            <div class="m-cart-order m-cart-order-list">
                <div data-pro="order">
                    <table class="w-table">
                        <caption>订单奖品</caption>
                        <colgroup>
                            <col class="w-table-col0">
                            <col class="w-table-col1">
                            <col class="w-table-col2">
                            <col class="w-table-col3">
                            <col class="w-table-col5">
                        </colgroup>
                        <thead>
                        <tr>
                            <th>奖品名称</th>
                            <th class="tc">价值</th>
                            <th class="tc">夺宝价</th>
                            <th class="tc">参与人次</th>
                            <th class="tc">小计</th>
                        </tr></thead>
                        <tbody>
                        <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['cartgoods']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>
                        <tr>
                            <td style="text-align: left;"><input type="hidden" name="id[]" value="<?php echo $_smarty_tpl->tpl_vars['m']->value['id'];?>
"><a target="_blank" href="<?php echo ('/yunbuy/detail/').($_smarty_tpl->tpl_vars['m']->value['buy_id']);?>
">(第<?php echo $_smarty_tpl->tpl_vars['m']->value['qishu'];?>
期) <?php echo $_smarty_tpl->tpl_vars['m']->value['goods_name'];?>
</a></td>
                            <td>
                                <?php echo $_smarty_tpl->tpl_vars['m']->value['goods_price'];?>
<?php echo $_smarty_tpl->tpl_vars['unit']->value;?>

                            </td>
                            <td><?php echo $_smarty_tpl->tpl_vars['m']->value['price'];?>
<?php echo $_smarty_tpl->tpl_vars['unit']->value;?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['m']->value['qty'];?>
</td>
                            <td><em><?php echo $_smarty_tpl->tpl_vars['m']->value['subtotal'];?>
<?php echo $_smarty_tpl->tpl_vars['unit']->value;?>
</em></td>
                        </tr>
                        <?php } ?>
                        </tbody>
                    </table>

                    <div class="m-cart-order-total">
                        <a href="<?php echo url('/yunbuy/cart');?>
<?php if ($_POST['free']==1){?>?free<?php }?>" style="font-size: 14px;">返回清单修改</a>
                        <span class="total txt-gray">奖品合计：<strong><?php echo $_smarty_tpl->tpl_vars['cart_total']->value;?>
</strong> <?php echo $_smarty_tpl->tpl_vars['unit']->value;?>
</span>
                    </div>

                    <div class="m-cart-order-options">
                        <?php if ($_smarty_tpl->tpl_vars['is_share']->value){?>
                        <div class="option">
                            首次夺宝可使用分享码 <input type="text" name="sharecode" value="" size="5" class="w-number-input"> <span class="share_notice color02"></span>
                        </div>
                        <?php }?>
                        <?php if ($_smarty_tpl->tpl_vars['bonus']->value){?>
                        <div class="option">
                            <label class="w-checkbox w-checkbox-disabled">
                                <input type="checkbox" value="1" name="bonus_pay" checked>
                                <span data-pro="text" style="color:#000;font-weight:bold;">使用抵用券：<span class="color01"><?php echo count($_smarty_tpl->tpl_vars['bonus']->value['list']);?>
</span> 张 价值： <em><?php echo $_smarty_tpl->tpl_vars['bonus']->value['money'];?>
</em> 个夺宝币</span></label>
                        </div>
                        <?php }?>
                        <div class="option">
                            <?php if ($_POST['free']!=1){?>
                            <label class="w-checkbox w-checkbox-disabled"><input type="checkbox" value="1" name="balance_pay" checked> <span data-pro="text" style="color:#000;font-weight:bold;">使用云购币：<span class="color01"><?php echo $_smarty_tpl->tpl_vars['member']->value['db_points'];?>
</span> 个 账户余额： <em>￥ <?php echo $_smarty_tpl->tpl_vars['member']->value['user_money'];?>
</em></span> <span style="color:#999">（使用账户余额或夺宝币支付）</span></label>
                            <?php }else{ ?>
                            <label class="w-checkbox w-checkbox-disabled"><input type="checkbox" value="1" name="balance_pay" checked disabled="disabled"> <span data-pro="text">剩余拍币：<em><?php echo $_smarty_tpl->tpl_vars['member']->value['pay_points'];?>
</em>个</span> <span style="color:#999">（使用拍币支付）</span></label>
                            <?php }?>
                        </div>
                    </div>
                </div>
                <?php if ($_smarty_tpl->tpl_vars['disabled_sub']->value==1){?>
                <div class="m-cart-order-pay f-clear" style="padding-bottom: 0;">
                    <div class="pay_online">
                        <div class="tips" style="padding:10px 20px 5px;display: none;">
                            <p>每支付1元购买网盘空间，系统将会赠送1个夺宝币（即1次抽奖机会），可联系客服在线开通，支付的款项将无法退回。</p>
                        </div>
                        <?php if (1==1){?>
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
                                    <label class="w-pay-type w-pay-type-3 <?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['payment']['iteration']==1){?>w-pay-selected<?php }?>"><input type="radio" name="pay_id" value="<?php echo $_smarty_tpl->tpl_vars['m']->value['pay_id'];?>
" style="display: none;" <?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['payment']['iteration']==1){?>checked<?php }?>><?php echo $_smarty_tpl->tpl_vars['m']->value['pay_name'];?>
</label>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        <?php }?>
                    </div>
                </div>
                <?php }?>
            </div>
            <div class="m-cart-submit" data-pro="submit">
                <?php if ($_POST['free']==1&&$_smarty_tpl->tpl_vars['disabled_sub']->value){?>
                <a style="float:right;color:#fff;" href="/member#free" class="w-button w-button-main w-button-xl"><span>拍币不足，点击领拍币</span></a>
                <?php }else{ ?>
                <button onclick="$('#checkoutFrom').submit()" class="w-button w-button-main w-button-xl" id="pro-view-10"><span>确认支付</span></button>
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
               $(this).addClass('w-pay-selected').siblings().removeClass('w-pay-selected');
           })
       });
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
</script>
<?php echo $_smarty_tpl->getSubTemplate ("footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>