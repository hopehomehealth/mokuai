<?php /* Smarty version Smarty-3.1.13, created on 2016-05-26 14:37:20
         compiled from "D:\test1yyg3.lnest.com\webapps\www\views\cn\mobile\yunbuy\checkout.html" */ ?>
<?php /*%%SmartyHeaderCode:427956d53e4c768fa7-20235175%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '25f5a7d203257aa93e4c3128f682e78b4744e09b' => 
    array (
      0 => 'D:\\test1yyg3.lnest.com\\webapps\\www\\views\\cn\\mobile\\yunbuy\\checkout.html',
      1 => 1464163241,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '427956d53e4c768fa7-20235175',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_56d53e4c9e2936_93001038',
  'variables' => 
  array (
    'data' => 0,
    'm' => 0,
    'type' => 0,
    'id' => 0,
    'cartgoods' => 0,
    'L' => 0,
    'cart_total' => 0,
    'unit' => 0,
    'is_share' => 0,
    'bonus' => 0,
    'member' => 0,
    'payment' => 0,
    'disabled_sub' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56d53e4c9e2936_93001038')) {function content_56d53e4c9e2936_93001038($_smarty_tpl) {?><?php if (isset($_smarty_tpl->tpl_vars['header'])) {$_smarty_tpl->tpl_vars['header'] = clone $_smarty_tpl->tpl_vars['header'];
$_smarty_tpl->tpl_vars['header']->value = 'header2'; $_smarty_tpl->tpl_vars['header']->nocache = null; $_smarty_tpl->tpl_vars['header']->scope = 0;
} else $_smarty_tpl->tpl_vars['header'] = new Smarty_variable('header2', null, 0);?>
<?php echo $_smarty_tpl->getSubTemplate ("top.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<style type="text/css">
    .tips-m{ background: #fff; padding: 15px 10px 5px; font-size: 1.4rem; color: #666; }

    .m-cart-address{ font-size: 1.0rem; }
    .m-cart-address li{ padding:0 10px 0 0; margin-bottom: 5px; font-size: 1.2rem; }
    .m-cart-address li b{ display: inline-block; }
    .m-cart-address li span{ color: #666; }
    .m-cart-address li .address-edit{ display: none; }
    .m-cart-address li.on{ border: 1px solid #e54048; padding:4px 10px 4px 10px; background:#FFF0E8; color: #333; box-shadow: 5px 5px 0 #F3F3F3; margin-bottom: 10px; }
    .m-cart-address li.on b{ color: #f50; font-size: 1.2rem; }
</style>
<form action="<?php echo url('/yunbuy/done');?>
" id="checkoutFrom" method="post">
<input type="hidden" name="token" value="<?php echo createToken();?>
" />
<div id="content" class="container main">
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
            <b><?php if ($_SESSION['order_address_id']==$_smarty_tpl->tpl_vars['m']->value['id']){?>直购商品寄送至：<?php }?></b>
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
    <div class="pay-list">
        <ul>
            <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['cartgoods']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>
            <li class="ui-clr">
                <?php if ($_smarty_tpl->tpl_vars['m']->value['type']==3){?>
                <span class="name"><input type="hidden" name="id[]" value="<?php echo $_smarty_tpl->tpl_vars['m']->value['id'];?>
"><span class="color">【<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_go_buy'];?>
】</span><a href="<?php echo ('/yunbuy/detail/').($_smarty_tpl->tpl_vars['m']->value['buy_id']);?>
"><?php echo $_smarty_tpl->tpl_vars['m']->value['goods_name'];?>
</a></span>
                <span class="num"></span>
                <span class="num"><em class="color"><?php echo price_format($_smarty_tpl->tpl_vars['m']->value['price']);?>
</em> × <?php echo $_smarty_tpl->tpl_vars['m']->value['qty'];?>
</span>
                <?php }else{ ?>
                <span class="name"><input type="hidden" name="id[]" value="<?php echo $_smarty_tpl->tpl_vars['m']->value['id'];?>
"><a href="<?php echo ('/yunbuy/detail/').($_smarty_tpl->tpl_vars['m']->value['buy_id']);?>
">(第<?php echo $_smarty_tpl->tpl_vars['m']->value['qishu'];?>
期) <?php echo $_smarty_tpl->tpl_vars['m']->value['goods_name'];?>
</a></span>
                <span class="num">&nbsp;参与<em class="color"><?php echo $_smarty_tpl->tpl_vars['m']->value['multi'];?>
</em>期</span>
                <span class="num"><em class="color"><?php echo $_smarty_tpl->tpl_vars['m']->value['qty'];?>
</em>人次</span>
                <?php }?>
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
                首次<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_yun'];?>
可使用分享码 <input type="text" name="sharecode" value="" size="5" class="w-number-input"> <span class="share_notice color01"></span>
            </span>
            <?php }?>
            <?php if ($_smarty_tpl->tpl_vars['bonus']->value){?>
            <span>
                <input type="checkbox" value="1" name="bonus_pay" checked style="display: inline" />
                使用<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_bonus'];?>
：<b class="color01"><?php echo count($_smarty_tpl->tpl_vars['bonus']->value['list']);?>
</b><?php echo $_smarty_tpl->tpl_vars['L']->value['unit_bonus_unit'];?>

                价值： <b><?php echo $_smarty_tpl->tpl_vars['bonus']->value['money'];?>
</b>个<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_db_points'];?>

            </span><br>
            <?php }?>
            <?php if ($_POST['free']!=1){?>
            <span>
                <input type="checkbox" value="1" name="balance_pay" checked style="display: inline" />
                使用<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_db_points'];?>
：<b class="color01"><?php echo $_smarty_tpl->tpl_vars['member']->value['db_points'];?>
</b> 个
                账户余额：<b class="color01"><?php echo price_format($_smarty_tpl->tpl_vars['member']->value['user_money']);?>
</b>
            </span>
            <?php }else{ ?>
            <span>
                <input type="hidden" value="1" name="free" />
                <input type="checkbox" value="1" name="balance_pay" checked disabled="disabled">
                使用<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_pay_points'];?>
：<b class="color01"><?php echo $_smarty_tpl->tpl_vars['member']->value['pay_points'];?>
</b> 个
            </span>
            <?php }?>
        </div>
    </div>
    <?php if ($_POST['free']!=1){?>
    <div class="order-option">
        <div class="m-cart-order-pay checkBar">
            <div class="pay_online">
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
            </div>
        </div>
    </div>
    <?php }?>
    <div class="order-submit">
        <?php if ($_POST['free']==1&&$_smarty_tpl->tpl_vars['disabled_sub']->value){?>
        <a class="ap-button" href="/member#free"><?php echo $_smarty_tpl->tpl_vars['L']->value['unit_pay_points'];?>
不足，点击领<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_pay_points'];?>
</a>
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
    function changeAddress(id){
        $('.m-cart-address li').removeClass('on').find('b').html('');
        $('#address-'+id).addClass('on').find('b').html('直购商品寄送至：');

        var D = { address_id:id };
        $.post("/order/updateAddress", D,
                function(data){
                    //location.reload();
                }
        );
    }
</script>
</body>
</html>
<?php }} ?>