<?php /* Smarty version Smarty-3.1.13, created on 2017-01-11 20:36:49
         compiled from "/data/01/html/1yyg225/webapps/www/views/cn/yunbuy/cart.html" */ ?>
<?php /*%%SmartyHeaderCode:104234391584aed5f2ca241-70955437%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bb06570bb7a35ac4138036526ec8a3fd1cc09c3b' => 
    array (
      0 => '/data/01/html/1yyg225/webapps/www/views/cn/yunbuy/cart.html',
      1 => 1484103638,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '104234391584aed5f2ca241-70955437',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_584aed5f6c8b80_91585283',
  'variables' => 
  array (
    'is_cart_db' => 0,
    'is_cart_db_free' => 0,
    'L' => 0,
    'site_config' => 0,
    'cart_goods' => 0,
    'm' => 0,
    'unit' => 0,
    'is_cart_buy' => 0,
    'cart_total' => 0,
    'not_buy' => 0,
    'rec_buy' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_584aed5f6c8b80_91585283')) {function content_584aed5f6c8b80_91585283($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<link rel="stylesheet" href="<?php echo url('/style/css/yiyuanbao.css');?>
" xmlns="http://www.w3.org/1999/html">
<?php echo $_smarty_tpl->getSubTemplate ("ur_here.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="g-body mb15">
    <div class="m-user">
        <div class="g-wrap">
            <div class="g-body">
            <form action="<?php echo url('/yunbuy/checkout');?>
" id="cartForm" method="post">
                <?php if ($_smarty_tpl->tpl_vars['is_cart_db']->value||($_smarty_tpl->tpl_vars['is_cart_db_free']->value&&isset($_GET['free']))){?>
                <div class="m-header">
                    <div class="g-wrap">
                        <?php if (isset($_smarty_tpl->tpl_vars["progress"])) {$_smarty_tpl->tpl_vars["progress"] = clone $_smarty_tpl->tpl_vars["progress"];
$_smarty_tpl->tpl_vars["progress"]->value = "1"; $_smarty_tpl->tpl_vars["progress"]->nocache = null; $_smarty_tpl->tpl_vars["progress"]->scope = 0;
} else $_smarty_tpl->tpl_vars["progress"] = new Smarty_variable("1", null, 0);?>
                        <?php echo $_smarty_tpl->getSubTemplate ("yunbuy/progress_cart.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

                    </div>
                </div>
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
                                <label id="pro-view-6" class="w-checkbox"><input class="selectall" type="checkbox" checked></label>
                            </th>
                            <th style="text-align: center;"><?php echo $_smarty_tpl->tpl_vars['L']->value['unit_yun'];?>
商品</th>
                            <th style="text-align: center;">名称</th>
                            <th style="text-align: center;">价值</th>
                            <th style="text-align: center;"><?php echo $_smarty_tpl->tpl_vars['L']->value['unit_yun'];?>
价</th>
                            <th style="text-align: center;">参与人次</th>
                            <th style="text-align: center;"><?php if ($_smarty_tpl->tpl_vars['site_config']->value['open_multi']==1){?>参与多期<?php }?></th>
                            <th style="text-align: center;">小计</th>
                            <th class="w-table-opt" style="">操作</th>
                        </tr>
                        </thead>
                        <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['cart_goods']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>
                        <?php if ($_smarty_tpl->tpl_vars['m']->value['type']!=3){?>
                        <tr>
                            <td class="w-table-chk" style=""><input value="<?php echo $_smarty_tpl->tpl_vars['m']->value['id'];?>
" name="id[]" type="checkbox" <?php if ($_smarty_tpl->tpl_vars['m']->value['notbuy']){?>disabled<?php }else{ ?>checked<?php }?>/></td>
                            <td style=""><img alt="(第<?php echo $_smarty_tpl->tpl_vars['m']->value['qishu'];?>
期) <?php echo $_smarty_tpl->tpl_vars['m']->value['goods_name'];?>
" src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['zz'][0][0]->_callViewFunc(array('mod'=>'fileurl','source'=>$_smarty_tpl->tpl_vars['m']->value['imgurl_thumb'],'width'=>64,'type'=>0),$_smarty_tpl);?>
" width="64"></td>
                            <td style="">
                                <?php if ($_smarty_tpl->tpl_vars['m']->value['prev_buy_id']){?>
                                <label class="new"><i></i>已为您更新至<?php echo $_smarty_tpl->tpl_vars['m']->value['qishu'];?>
期</label>
                                <?php }?>
                                <?php if ($_smarty_tpl->tpl_vars['m']->value['type']==3){?>
                                <p><a href="<?php echo url(('/yunbuy/detail/').($_smarty_tpl->tpl_vars['m']->value['buy_id']));?>
" target="_blank"> <?php echo $_smarty_tpl->tpl_vars['m']->value['goods_name'];?>
</a></p>
                                <span class="color01"><?php echo $_smarty_tpl->tpl_vars['L']->value['unit_go_buy'];?>
商品</span>
                                <?php }else{ ?>
                                <p><a href="<?php echo url(('/yunbuy/detail/').($_smarty_tpl->tpl_vars['m']->value['buy_id']));?>
" target="_blank">(第<?php echo $_smarty_tpl->tpl_vars['m']->value['qishu'];?>
期) <?php echo $_smarty_tpl->tpl_vars['m']->value['goods_name'];?>
</a></p>
                                <p>总需<b class="color02"><?php echo $_smarty_tpl->tpl_vars['m']->value['need_num'];?>
</b>人次参与，还剩<?php echo $_smarty_tpl->tpl_vars['m']->value['end_num'];?>
人次</p>
                                <?php }?>
                            </td>
                            <td style="text-align: center;">
                                <?php if ($_smarty_tpl->tpl_vars['m']->value['type']==3){?>
                                --
                                <?php }elseif($_smarty_tpl->tpl_vars['m']->value['type']==1){?>
                                <?php echo price_format($_smarty_tpl->tpl_vars['m']->value['goods_price']);?>

                                <?php }else{ ?>
                                <?php echo $_smarty_tpl->tpl_vars['m']->value['goods_price'];?>
<?php echo $_smarty_tpl->tpl_vars['unit']->value;?>

                                <?php }?>
                            </td>
                            <td style="text-align: center;">
                                <?php if ($_smarty_tpl->tpl_vars['m']->value['type']==2){?>
                                <?php echo $_smarty_tpl->tpl_vars['m']->value['price'];?>
<?php echo $_smarty_tpl->tpl_vars['unit']->value;?>

                                <?php }else{ ?>
                                <?php echo price_format($_smarty_tpl->tpl_vars['m']->value['price']);?>

                                <?php }?>
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
                                <?php if ($_smarty_tpl->tpl_vars['m']->value['num_notbuy']){?><p class="txt-err">该期<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_price'];?>
活动已结束，<br>请先删除再进行结算</p>
                                <?php }elseif($_smarty_tpl->tpl_vars['m']->value['extData']['error']>0){?><p class="txt-err"><?php echo $_smarty_tpl->tpl_vars['m']->value['extData']['error_text'];?>
</p>
                                <?php }?>
                            </td>
                            
                            <td style="text-align: center;">
                                <?php if ($_smarty_tpl->tpl_vars['site_config']->value['open_multi']==1&&$_smarty_tpl->tpl_vars['m']->value['type']!=3){?>
                                <div class="w-number w-number-inline">
                                    <input class="w-qishu-input" value="<?php echo $_smarty_tpl->tpl_vars['m']->value['multi'];?>
" data-id="<?php echo $_smarty_tpl->tpl_vars['m']->value['id'];?>
" data-max="<?php echo $_smarty_tpl->tpl_vars['m']->value['max_multi'];?>
" <?php if ($_smarty_tpl->tpl_vars['site_config']->value['open_multi']!=1){?>disabled style="color:gray"<?php }?>>
                                    <a class="w-number-btn w-qishu-btn-plus" data-pro="plus" href="javascript:void(0);">+</a>
                                    <a class="w-number-btn w-qishu-btn-minus" data-pro="minus" href="javascript:void(0);">-</a>
                                </div>
                                <?php }?>
                            </td>
                            
                            <td style="text-align: center;">
                                <?php if ($_smarty_tpl->tpl_vars['m']->value['type']==2){?>
                                <em><span id="subtotal_<?php echo $_smarty_tpl->tpl_vars['m']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['m']->value['subtotal'];?>
</span><?php echo $_smarty_tpl->tpl_vars['unit']->value;?>
</em>
                                <?php }else{ ?>
                                <em>￥<span id="subtotal_<?php echo $_smarty_tpl->tpl_vars['m']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['m']->value['subtotal'];?>
</span></em>
                                <?php }?>
                            </td>
                            <td class="w-table-opt"><a data-pro="del" onclick="delCart('<?php echo $_smarty_tpl->tpl_vars['m']->value['id'];?>
',1)" class="w-button w-button-main" style="color:#fff;">删除</a></td>
                        </tr>
                        <?php }?>
                        <?php } ?>
                    </table>
                </div>
                <?php if ($_smarty_tpl->tpl_vars['is_cart_buy']->value&&!isset($_GET['free'])){?>
                <div style="clear: both;height: 30px;"></div>
                <?php }?>
                <?php }?>

                <?php if ($_smarty_tpl->tpl_vars['is_cart_buy']->value&&!isset($_GET['free'])){?>
                <?php echo $_smarty_tpl->getSubTemplate ("yunbuy/progress_cart_buy.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

                <div style="clear: both;height: 15px;"></div>

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
                                <label id="pro-view-6" class="w-checkbox"><input class="selectall" type="checkbox" checked></label>
                            </th>
                            <th style="text-align: center;">直购商品</th>
                            <th style="text-align: center;">名称</th>
                            <th style="text-align: center;">价值</th>
                            <th style="text-align: center;">市场价</th>
                            <th style="text-align: center;">数量</th>
                            <th style="text-align: center;"></th>
                            <th style="text-align: center;">小计</th>
                            <th class="w-table-opt" style="">操作</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <td colspan="9">
                                <div class="footer">
                                    <div class="total">
                                        <?php if (isset($_GET['free'])){?>
                                        总计：<strong><span id="total"><?php echo $_smarty_tpl->tpl_vars['cart_total']->value;?>
</span></strong> <?php echo $_smarty_tpl->tpl_vars['unit']->value;?>

                                        <?php }else{ ?>
                                        夺宝金额总计：<strong>￥<span id="total"><?php echo $_smarty_tpl->tpl_vars['cart_total']->value;?>
</span></strong>
                                        <?php }?>
                                    </div>
                                    <label id="pro-view-7" class="w-checkbox"><input class="selectall" type="checkbox" checked></label>
                                    <a class="delChecked" href="javascript:void(0);" style="font-weight: bold;">删除选中</a> </div>
                            </td>
                        </tr>
                        </tfoot>
                        <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['cart_goods']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>
                        <?php if ($_smarty_tpl->tpl_vars['m']->value['type']==3){?>
                        <tr>
                            <td class="w-table-chk" style=""><input value="<?php echo $_smarty_tpl->tpl_vars['m']->value['id'];?>
" name="id[]" type="checkbox" <?php if ($_smarty_tpl->tpl_vars['m']->value['notbuy']){?>disabled<?php }else{ ?>checked<?php }?>/></td>
                            <td style=""><img alt="<?php echo $_smarty_tpl->tpl_vars['m']->value['goods_name'];?>
" src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['zz'][0][0]->_callViewFunc(array('mod'=>'fileurl','source'=>$_smarty_tpl->tpl_vars['m']->value['imgurl_thumb'],'width'=>64,'type'=>0),$_smarty_tpl);?>
" width="64"></td>
                            <td style="">
                                <p><a href="<?php echo url(('/yunbuy/detail/').($_smarty_tpl->tpl_vars['m']->value['buy_id']));?>
" target="_blank"> <?php echo $_smarty_tpl->tpl_vars['m']->value['goods_name'];?>
</a></p>
                                <span class="color01"><?php echo $_smarty_tpl->tpl_vars['L']->value['unit_go_buy'];?>
商品</span>
                            </td>
                            <td style="text-align: center;">
                                <?php echo price_format($_smarty_tpl->tpl_vars['m']->value['price']);?>

                            </td>
                            <td style="text-align: center;">
                                <?php echo price_format($_smarty_tpl->tpl_vars['m']->value['goods_price']);?>

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
                                <?php if ($_smarty_tpl->tpl_vars['m']->value['num_notbuy']){?><p class="txt-err">该商品库存不足，无法购买</p><?php }?>
                            </td>
                            <td></td>
                            <td style="text-align: center;">
                                <em>￥<span id="subtotal_<?php echo $_smarty_tpl->tpl_vars['m']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['m']->value['subtotal'];?>
</span></em>
                            </td>
                            <td class="w-table-opt"><a data-pro="del" onclick="delCart('<?php echo $_smarty_tpl->tpl_vars['m']->value['id'];?>
',1)" class="w-button w-button-main" style="color:#fff;">删除</a></td>
                        </tr>
                        <?php }?>
                        <?php } ?>
                    </table>
                </div>
                <?php }?>

                <div class="m-cart-submit" data-pro="submit">
                    <a id="pro-view-1" class="w-button w-button-aside w-button-xl" href="<?php echo url();?>
"><span>返回首页</span></a>
                    <input type="hidden" name="Submit" value="1"/>
                    <?php if (isset($_GET['free'])){?><input type="hidden" name="free" value="1"/><?php }?>
                    <button class="w-button w-button-main w-button-xl <?php if ($_smarty_tpl->tpl_vars['not_buy']->value){?>w-button-disabled<?php }?>" onclick="return check_sumbit()" <?php if ($_smarty_tpl->tpl_vars['not_buy']->value){?>disabled<?php }?>><span>同意以下协议，提交订单</span></button>
                </div>
                <input type="hidden" name="address_id" value="<?php echo $_GET['address_id'];?>
"/>
            </form>
            <div class="m-helpcenter-detail-bd" style="height:auto;">
                <?php if (isset($_GET['free'])){?>
                <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['zz'][0][0]->_callViewFunc(array('mod'=>'block','mark'=>'server02'),$_smarty_tpl);?>

                <?php }else{ ?>
                <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['zz'][0][0]->_callViewFunc(array('mod'=>'block','mark'=>'server'),$_smarty_tpl);?>

                <?php }?>
            </div>

            <div class="m-cart-tuijian">
                <div class="w-hd">
                    <h3 class="w-hd-title">推荐<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_yun'];?>
</h3>
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
                            <div class="w-goods w-goods-briefFree">
                                <div class="w-goods-pic scrollLoadingDiv"><a href="<?php echo url(('/yunbuy/detail/').($_smarty_tpl->tpl_vars['m']->value['buy_id']));?>
" target="_blank" title="<?php echo $_smarty_tpl->tpl_vars['m']->value['title'];?>
"><img alt="<?php echo $_smarty_tpl->tpl_vars['m']->value['title'];?>
" class="scrollLoading" src="/style/images/pix.gif" data-url="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['zz'][0][0]->_callViewFunc(array('mod'=>'fileurl','source'=>$_smarty_tpl->tpl_vars['m']->value['imgurl_src'],'width'=>210,'height'=>130,'type'=>0),$_smarty_tpl);?>
"></a></div>
                                <p class="w-goods-title f-txtabb"><a href="<?php echo url(('/yunbuy/detail/').($_smarty_tpl->tpl_vars['m']->value['buy_id']));?>
" target="_blank" title="<?php echo $_smarty_tpl->tpl_vars['m']->value['title'];?>
">(第<?php echo $_smarty_tpl->tpl_vars['m']->value['qishu'];?>
期)<?php echo $_smarty_tpl->tpl_vars['m']->value['title'];?>
</a></p>
                                <p class="w-goods-price">总需：<?php echo $_smarty_tpl->tpl_vars['m']->value['need_num'];?>
 人次</p>
                                <p>参与 <b class="txt-gray"><?php echo $_smarty_tpl->tpl_vars['m']->value['buy_num'];?>
</b> 人次，</p>
                                <p>还剩 <b class="txt-blue"><?php echo $_smarty_tpl->tpl_vars['m']->value['end_num'];?>
</b> 人次</p>
                                <div class="w-goods-opr1"><a href="<?php echo url(('/yunbuy/detail/').($_smarty_tpl->tpl_vars['m']->value['buy_id']));?>
" style="" target="_blank">详情&gt; </a></div>
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
    function check_sumbit(){
        $.post("/welcome/checkYunLimit",{ ajax:1 },function(data){
            if(data.code == 1){
                if(data.msg){
                    layer.alert(data.msg,8,function(){
                        if(data.url){
                            location.href=data.url;
                        }
                    });
                }
                return false;
            } else if(data.code == 2){
                if(data.msg){
                    if( ! confirm(data.msg)){
                        return false;
                    }else{
                        $('#cartForm').submit();
                    }
                }
            } else if(data.code == 0){
                $('#cartForm').submit();
            }
        },'json');
        return false;
    }
    $(function(){
        //参与人次
        $(".w-number-btn-plus").click(function(){
            var id = $(this).parent().children('input.w-number-input').attr('data-id');
            var max = $(this).parent().children('input.w-number-input').attr('data-max');
            var qty = $(this).parent().children('input.w-number-input').val()*1;
            if(qty < max){
                $(this).parent().children('input.w-number-input').val(qty+1);
            }
            updatecart(id,$(this).parent().children('input.w-number-input').val(),'');
        });
        $(".w-number-btn-minus").click(function(){
            var id = $(this).parent().children('input.w-number-input').attr('data-id');
            var qty = $(this).parent().children('input.w-number-input').val()*1;
            if(qty>1){
                $(this).parent().children('input.w-number-input').val(qty-1);
            }
            updatecart(id,$(this).parent().children('input.w-number-input').val(),'');
        });
        $(".w-number-input").blur(function(){
            var id = $(this).attr('data-id');
            var max = $(this).attr('data-max')*1;
            if($(this).val()>max){
                $(this).val(max);
            }
            if($(this).val()<=0) $(this).val(1);
            updatecart(id,$(this).val(),'');
        });
        <?php if ($_smarty_tpl->tpl_vars['site_config']->value['open_multi']==1){?>
        //多期参与
        $(".w-qishu-btn-plus").click(function(){
            var id = $(this).parent().children('input.w-qishu-input').attr('data-id');
            var max = $(this).parent().children('input.w-qishu-input').attr('data-max');
            var multi = $(this).parent().children('input.w-qishu-input').val()*1;
            if(multi < max){
                $(this).parent().children('input.w-qishu-input').val(multi+1);
            }
            updatecart(id,'',$(this).parent().children('input.w-qishu-input').val());
        });
        $(".w-qishu-btn-minus").click(function(){
            var id = $(this).parent().children('input.w-qishu-input').attr('data-id');
            var multi = $(this).parent().children('input.w-qishu-input').val()*1;
            if(multi>1){
                $(this).parent().children('input.w-qishu-input').val(multi-1);
            }
            updatecart(id,'',$(this).parent().children('input.w-qishu-input').val());
        });
        $(".w-qishu-input").blur(function(){
            var id = $(this).attr('data-id');
            var max = $(this).attr('data-max')*1;
            if($(this).val()>max){
                $(this).val(max);
            }
            if($(this).val()<=0) $(this).val(1);
            updatecart(id,'',$(this).val());
        });
        <?php }?>
        function updatecart(id,qty,multi){
            var ids = '';
            var i = 0;
            $("input[name='id[]']").each(function(){
                if($(this).is(':checked')){
                    i++;
                    ids += i==$("input[name='id[]']:checked").length ? $(this).val() :$(this).val()+',';
                }
            });
            $.post('/yunbuy/updatecart',{ id:id,qty:qty,ids:ids,multi:multi,type:'<?php if (isset($_GET['free'])){?>2<?php }else{ ?>1<?php }?>' },function(data){
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
            $.getJSON('/yunbuy/total',{ ids:ids },function(data){
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
            $.post('/yunbuy/delcart/'+ids,{ ajax:1 },function(data){
                if(data){
                    location.reload();
                }
            });
        });
    });
</script>
<?php echo $_smarty_tpl->getSubTemplate ("footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>