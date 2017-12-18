<?php /* Smarty version Smarty-3.1.13, created on 2015-11-28 18:11:46
         compiled from "H:\projects\web\lnest02\1yyg\webapps\www\views\cn\yunbuy\cart.html" */ ?>
<?php /*%%SmartyHeaderCode:1475456597de295ed02-23208163%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '218dbd3f95d77289f592f0ce9d3c4d62afae009b' => 
    array (
      0 => 'H:\\projects\\web\\lnest02\\1yyg\\webapps\\www\\views\\cn\\yunbuy\\cart.html',
      1 => 1427115572,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1475456597de295ed02-23208163',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'unit' => 0,
    'cart_total' => 0,
    'cart_goods' => 0,
    'm' => 0,
    'not_buy' => 0,
    'rec_buy' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_56597de2b1c4f8_29614183',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56597de2b1c4f8_29614183')) {function content_56597de2b1c4f8_29614183($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<link rel="stylesheet" href="<?php echo url('/style/css/yiyuanbao.css');?>
" xmlns="http://www.w3.org/1999/html">
<?php echo $_smarty_tpl->getSubTemplate ("ur_here.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="g-body mb15">
    <div class="m-user">
        <div class="g-wrap">
            <div class="g-body">
            <div class="m-header">
                <div class="g-wrap">
                    <?php if (isset($_smarty_tpl->tpl_vars["progress"])) {$_smarty_tpl->tpl_vars["progress"] = clone $_smarty_tpl->tpl_vars["progress"];
$_smarty_tpl->tpl_vars["progress"]->value = "1"; $_smarty_tpl->tpl_vars["progress"]->nocache = null; $_smarty_tpl->tpl_vars["progress"]->scope = 0;
} else $_smarty_tpl->tpl_vars["progress"] = new Smarty_variable("1", null, 0);?>
                    <?php echo $_smarty_tpl->getSubTemplate ("yunbuy/progress_cart.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

                </div>
            </div>
            <div class="g-wrap">
                <form action="<?php echo url('/yunbuy/checkout');?>
" method="post">
                <div class="m-cart-order" data-pro="order">
                    <table id="pro-view-5" class="w-table ">
                        <colgroup>
                            <col class="w-table-col0">
                            <col class="w-table-col1">
                            <col class="w-table-col2">
                            <col class="w-table-col3">
                            <col class="w-table-col4">
                            <col class="w-table-col5">
                            <col class="w-table-col6">
                            <col class="w-table-col7">
                        </colgroup>
                        <thead>
                        <tr>
                            <th class="w-table-chk " style="padding: 8px 15px;">
                                <label id="pro-view-6" class="w-checkbox"><input class="selectall" type="checkbox" checked></label></th>
                            <th colspan="2" style="">奖品名称</th>
                            <th style="text-align: center;">价值</th>
                            <th style="text-align: center;">夺宝价</th>
                            <th style="text-align: center;">参与人次</th>

                            <th style="text-align: center;">小计（<?php echo $_smarty_tpl->tpl_vars['unit']->value;?>
）</th>
                            <th class="w-table-opt" style="">操作</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <td colspan="8">
                                <div class="footer">
                                    <div class="total">
                                        总计：<strong><span id="total"><?php echo $_smarty_tpl->tpl_vars['cart_total']->value;?>
</span></strong>
                                        <?php echo $_smarty_tpl->tpl_vars['unit']->value;?>
 </div>
                                    <label id="pro-view-7" class="w-checkbox"><input class="selectall" type="checkbox" checked></label>
                                    <a class="delChecked" href="javascript:void(0);" style="font-weight: bold;">删除选中</a> </div>
                            </td>
                        </tr>
                        </tfoot>
                        <?php if ($_smarty_tpl->tpl_vars['cart_goods']->value){?>
                        <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['cart_goods']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>
                        <tr>
                            <td class="w-table-chk" style=""><input value="<?php echo $_smarty_tpl->tpl_vars['m']->value['id'];?>
" name="id[]" type="checkbox" <?php if ($_smarty_tpl->tpl_vars['m']->value['notbuy']){?>disabled<?php }else{ ?>checked<?php }?>/></td>
                            <td style=""><img alt="(第<?php echo $_smarty_tpl->tpl_vars['m']->value['qishu'];?>
期) <?php echo $_smarty_tpl->tpl_vars['m']->value['goods_name'];?>
" height="48" src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['zz'][0][0]->_callViewFunc(array('mod'=>'fileurl','source'=>$_smarty_tpl->tpl_vars['m']->value['imgurl_thumb'],'width'=>64,'height'=>48,'type'=>1),$_smarty_tpl);?>
" width="64"></td>
                            <td style="">
                                <p>
                                    <a href="<?php echo url(('/yunbuy/detail/').($_smarty_tpl->tpl_vars['m']->value['buy_id']));?>
" target="_blank">(第<?php echo $_smarty_tpl->tpl_vars['m']->value['qishu'];?>
期) <?php echo $_smarty_tpl->tpl_vars['m']->value['goods_name'];?>
</a></p>
                                <p>总需<b class="color02"><?php echo $_smarty_tpl->tpl_vars['m']->value['need_num'];?>
</b>人次参与，还剩<?php echo $_smarty_tpl->tpl_vars['m']->value['end_num'];?>
人次</p>
                            </td>
                            <td style="text-align: center;"><?php echo $_smarty_tpl->tpl_vars['m']->value['goods_price'];?>
<?php echo $_smarty_tpl->tpl_vars['unit']->value;?>
</td>
                            <td style="text-align: center;"><?php echo $_smarty_tpl->tpl_vars['m']->value['price'];?>
<?php echo $_smarty_tpl->tpl_vars['unit']->value;?>
</td>
                            <td style="text-align: center;">
                                <div id="pro-view-9" class="w-number w-number-inline">
                                    <input class="w-number-input" value="<?php echo $_smarty_tpl->tpl_vars['m']->value['qty'];?>
" data-id="<?php echo $_smarty_tpl->tpl_vars['m']->value['id'];?>
" data-max="<?php echo $_smarty_tpl->tpl_vars['m']->value['end_num'];?>
">
                                    <a class="w-number-btn w-number-btn-plus" data-pro="plus" href="javascript:void(0);">+</a>
                                    <a class="w-number-btn w-number-btn-minus" data-pro="minus" href="javascript:void(0);">-</a>
                                </div>
                                <?php if ($_smarty_tpl->tpl_vars['m']->value['num_notbuy']){?><p class="txt-err">该期奖品活动已结束，<br>请先删除再进行结算</p>
                                <?php }elseif($_smarty_tpl->tpl_vars['m']->value['extData']['error']==1){?><p class="txt-err">该期夺宝限制最大参与<?php echo $_smarty_tpl->tpl_vars['m']->value['extData']['buynum'];?>
人次</p>
                                <?php }elseif($_smarty_tpl->tpl_vars['m']->value['extData']['error']==2){?><p class="txt-err">参与该期夺宝需推荐<?php echo $_smarty_tpl->tpl_vars['m']->value['extData']['usernum'];?>
人次,您未满足要求</p>
                                <?php }elseif($_smarty_tpl->tpl_vars['m']->value['extData']['error']==3){?><p class="txt-err"><?php echo $_smarty_tpl->tpl_vars['m']->value['extData']['error_text'];?>
</p>
                                <?php }elseif($_smarty_tpl->tpl_vars['m']->value['extData']['error']==4){?><p class="txt-err">该商品可参与人群：从未夺宝成功的用户</p>
                                <?php }?>
                            </td>
                            <td style="text-align: center;"><em>
                                <span id="subtotal_<?php echo $_smarty_tpl->tpl_vars['m']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['m']->value['subtotal'];?>
</span><?php echo $_smarty_tpl->tpl_vars['unit']->value;?>
</em></td>
                            <td class="w-table-opt"><a data-pro="del" onclick="delCart('<?php echo $_smarty_tpl->tpl_vars['m']->value['id'];?>
',1)" class="w-button w-button-main" style="color:#fff;">删除</a></td>
                        </tr>
                        <?php } ?>
                        <?php }else{ ?>
                        <td style="text-align: center;padding: 50px 0px;" colspan="8">您的清单里还没有任何奖品，<a class="color02" href="<?php echo url('/yunbuy');?>
">马上去逛逛~</a></td>
                        <?php }?>
                    </table>
                </div>
                <div class="m-cart-submit" data-pro="submit">
                    <a id="pro-view-1" class="w-button w-button-aside w-button-xl" href="<?php echo url();?>
"><span>返回首页</span></a>
                    <input type="hidden" name="Submit" value="1"/>
                    <?php if (isset($_GET['free'])){?><input type="hidden" name="free" value="1"/><?php }?>
                    <button class="w-button w-button-main w-button-xl <?php if ($_smarty_tpl->tpl_vars['not_buy']->value){?>w-button-disabled<?php }?>" onclick="submit()" <?php if ($_smarty_tpl->tpl_vars['not_buy']->value){?>disabled<?php }?>><span>同意以下协议，提交订单</span></button>
                </div>
                </form>
                <div class="m-helpcenter-detail-bd" style="height:auto;">
                    <?php if (isset($_GET['free'])){?>
                    <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['zz'][0][0]->_callViewFunc(array('mod'=>'block','mark'=>'server02'),$_smarty_tpl);?>

                    <?php }else{ ?>
                    <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['zz'][0][0]->_callViewFunc(array('mod'=>'block','mark'=>'server'),$_smarty_tpl);?>

                    <?php }?>
                </div>
            </div>

            <div class="m-cart-tuijian">
                <div class="w-hd">
                    <h3 class="w-hd-title">推荐夺宝</h3>
                    <a class="w-hd-more" href="<?php echo url('/yunbuy');?>
">想看更多精彩，逛一下吧！</a> </div>
                <div class="m-cart-tuijian-bd">
                    <ul class="w-goodsList f-clear">
                        <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['rec_buy']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>
                        <li class="w-goodsList-item row-first">
                            <div class="w-goods w-goods-brief">
                                <div class="w-goods-pic">
                                    <a href="<?php echo url(('/yunbuy/detail/').($_smarty_tpl->tpl_vars['m']->value['buy_id']));?>
" target="_blank" title="<?php echo $_smarty_tpl->tpl_vars['m']->value['title'];?>
">
                                        <img alt="<?php echo $_smarty_tpl->tpl_vars['m']->value['title'];?>
" src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['zz'][0][0]->_callViewFunc(array('mod'=>'fileurl','source'=>$_smarty_tpl->tpl_vars['m']->value['imgurl_src'],'width'=>200,'height'=>150,'type'=>0),$_smarty_tpl);?>
">
                                    </a></div>
                                <p class="w-goods-title f-txtabb">
                                    <a href="<?php echo url(('/yunbuy/detail/').($_smarty_tpl->tpl_vars['m']->value['buy_id']));?>
" target="_blank" title="<?php echo $_smarty_tpl->tpl_vars['m']->value['title'];?>
">
                                        (第<?php echo $_smarty_tpl->tpl_vars['m']->value['qishu'];?>
期) <?php echo $_smarty_tpl->tpl_vars['m']->value['title'];?>
</a></p>
                                <p class="w-goods-price">总需：<?php echo $_smarty_tpl->tpl_vars['m']->value['need_num'];?>
 人次 </p>
                            </div>
                        </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
            </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(function(){
        $(".w-number-btn-plus").click(function(){
            var id = $(this).parent().children('input.w-number-input').attr('data-id');
            var max = $(this).parent().children('input.w-number-input').attr('data-max');
            var qty = $(this).parent().children('input.w-number-input').val()*1;
            if(qty < max){
                $(this).parent().children('input.w-number-input').val(qty+1);
            }
            updatecart(id,$(this).parent().children('input.w-number-input').val());
        });
        $(".w-number-btn-minus").click(function(){
            var id = $(this).parent().children('input.w-number-input').attr('data-id');
            var qty = $(this).parent().children('input.w-number-input').val()*1;
            if(qty>1){
                $(this).parent().children('input.w-number-input').val(qty-1);
            }
            updatecart(id,$(this).parent().children('input.w-number-input').val());
        });
        $(".w-number-input").blur(function(){
            var id = $(this).attr('data-id');
            var max = $(this).attr('data-max')*1;
            if($(this).val()>max){
                $(this).val(max);
            }
            if($(this).val()<=0) $(this).val(1);
            updatecart(id,$(this).val());
        });
        function updatecart(id,qty){
            var ids = '';
            var i = 0;
            $("input[name='id[]']").each(function(){
                if($(this).is(':checked')){
                    i++;
                    ids += i==$("input[name='id[]']:checked").length ? $(this).val() :$(this).val()+',';
                }
            });
            $.post('/yunbuy/updatecart',{id:id,qty:qty,ids:ids},function(data){
                $('#subtotal_'+id).html(data.subtotal);
                $('#total').html(data.total);
            },'json');
        }
        $('.selectall').click(function(){
            $("input[name='id[]']").not(':disabled').prop("checked",$(this).is(':checked'));
            $('.selectall').prop('checked',$(this).is(':checked'));
            show_total();
        });
        $("input[name='id[]']").click(function(){
            show_total();
        });
        function show_total(){
            var ids = '';
            var i=0;
            $("input[name='id[]']").each(function(){
                if($(this).is(':checked')){
                    i++;
                    ids += i==$("input[name='id[]']:checked").length ? $(this).val() :$(this).val()+',';
                }
            });
            $.getJSON('/yunbuy/total',{ids:ids},function(data){
                $('#total').html(data.amount);
                if(data.amount==0){
                    $('.w-button-xl').addClass('w-button-disabled').attr("disabled",true);
                }else{
                    $('.w-button-xl').removeClass('w-button-disabled').removeAttr("disabled");
                }
            });
        }
        $('.delChecked').click(function(){
            var ids = '';
            var i = 0;
            $("input[name='id[]']").each(function(){
                if($(this).is(':checked')){
                    i++;
                    ids += i==$("input[name='id[]']:checked").length ? $(this).val() :$(this).val()+',';
                }
            });
            $.post('/yunbuy/delcart/'+ids,{ajax:1},function(data){
                if(data){
                    location.reload();
                }
            });
        });
    });
</script>

<?php echo $_smarty_tpl->getSubTemplate ("footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>