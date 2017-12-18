<?php /* Smarty version Smarty-3.1.13, created on 2015-12-03 10:47:22
         compiled from "F:\WWW\1yyg225\webapps\www\views\cn\mobile\yunbuy\checkout.html" */ ?>
<?php /*%%SmartyHeaderCode:13159565fad3a4ab443-17452523%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0db470c0b0404ebf2d828b6ad5d138a7647a47df' => 
    array (
      0 => 'F:\\WWW\\1yyg225\\webapps\\www\\views\\cn\\mobile\\yunbuy\\checkout.html',
      1 => 1449048041,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13159565fad3a4ab443-17452523',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'cartgoods' => 0,
    'm' => 0,
    'cart_total' => 0,
    'unit' => 0,
    'is_share' => 0,
    'bonus' => 0,
    'member' => 0,
    'disabled_sub' => 0,
    'payment' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_565fad3a5c1ba4_89456829',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_565fad3a5c1ba4_89456829')) {function content_565fad3a5c1ba4_89456829($_smarty_tpl) {?><?php if (isset($_smarty_tpl->tpl_vars['header'])) {$_smarty_tpl->tpl_vars['header'] = clone $_smarty_tpl->tpl_vars['header'];
$_smarty_tpl->tpl_vars['header']->value = 'header2'; $_smarty_tpl->tpl_vars['header']->nocache = null; $_smarty_tpl->tpl_vars['header']->scope = 0;
} else $_smarty_tpl->tpl_vars['header'] = new Smarty_variable('header2', null, 0);?>
<?php echo $_smarty_tpl->getSubTemplate ("top.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<form action="<?php echo url('/yunbuy/done');?>
" id="checkoutFrom" method="post">
<div id="content" class="container main">
    <div class="pay-list">
        <ul>
            <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['cartgoods']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>
            <li class="ui-clr">
                <span class="name"><input type="hidden" name="id[]" value="<?php echo $_smarty_tpl->tpl_vars['m']->value['id'];?>
"><a href="<?php echo ('/yunbuy/detail/').($_smarty_tpl->tpl_vars['m']->value['buy_id']);?>
">(第<?php echo $_smarty_tpl->tpl_vars['m']->value['qishu'];?>
期) <?php echo $_smarty_tpl->tpl_vars['m']->value['goods_name'];?>
</a></span>
                <span class="num"><em class="color"><?php echo $_smarty_tpl->tpl_vars['m']->value['qty'];?>
</em>人次</span>
            </li>
            <?php } ?>
        </ul>
    </div>
    <div class="order-total">
        商品合计：<strong style="font-size:14px;"><?php echo $_smarty_tpl->tpl_vars['cart_total']->value;?>
</strong><?php echo $_smarty_tpl->tpl_vars['unit']->value;?>

    </div>
    <div class="order-option">
        <div class="checkBar">
            <?php if ($_smarty_tpl->tpl_vars['is_share']->value){?>
            <span>
                首次夺宝可使用分享码 <input type="text" name="sharecode" value="" size="5" class="w-number-input"> <span class="share_notice color01"></span>
            </span>
            <?php }?>
            <?php if ($_smarty_tpl->tpl_vars['bonus']->value){?>
            <span>
                <input type="checkbox" value="1" name="bonus_pay" checked>
                使用抵用券：<b class="color01"><?php echo count($_smarty_tpl->tpl_vars['bonus']->value['list']);?>
</b>张
                价值： <b><?php echo $_smarty_tpl->tpl_vars['bonus']->value['money'];?>
</b>个云购币
            </span><br>
            <?php }?>
            <?php if ($_POST['free']!=1){?>
            <span>
                <input type="checkbox" value="1" name="balance_pay" checked>
                使用云购币：<b class="color01"><?php echo $_smarty_tpl->tpl_vars['member']->value['db_points'];?>
</b> 个
                账户余额：<b class="color01"><?php echo price_format($_smarty_tpl->tpl_vars['member']->value['user_money']);?>
</b>
            </span>
            <?php }else{ ?>
            <span>
                <input type="checkbox" value="1" name="balance_pay" checked disabled="disabled">
                使用拍币：<b class="color01"><?php echo $_smarty_tpl->tpl_vars['member']->value['pay_points'];?>
</b> 个
            </span>
            <?php }?>
        </div>
    </div>
    <?php if ($_smarty_tpl->tpl_vars['disabled_sub']->value==1){?>
    <div class="order-option">
        <div class="m-cart-order-pay checkBar">
            <div class="pay_online">
                <?php if (1==1){?>
                <div data-pro="paySelector">
                    <div class="w-pay" id="pro-view-2">
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
    </div>
    <?php }?>
    <div class="order-submit">
        <?php if ($_POST['free']==1&&$_smarty_tpl->tpl_vars['disabled_sub']->value){?>
        <a class="ap-button" href="/member#free">拍币不足，点击领拍币</a>
        <?php }else{ ?>
        <button class="ap-button" type="submit">确 认 支 付</button>
        <?php }?>
    </div>
</div>
</form>
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
</body>
</html>
<?php }} ?>