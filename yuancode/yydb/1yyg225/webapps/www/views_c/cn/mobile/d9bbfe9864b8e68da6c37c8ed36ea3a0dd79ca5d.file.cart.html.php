<?php /* Smarty version Smarty-3.1.13, created on 2017-01-12 16:09:04
         compiled from "/data/01/html/1yyg225/webapps/www/views/cn/mobile/yunbuy/cart.html" */ ?>
<?php /*%%SmartyHeaderCode:14350558415850f3ecd47600-62904512%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd9bbfe9864b8e68da6c37c8ed36ea3a0dd79ca5d' => 
    array (
      0 => '/data/01/html/1yyg225/webapps/www/views/cn/mobile/yunbuy/cart.html',
      1 => 1484103638,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '14350558415850f3ecd47600-62904512',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5850f3ece36642_51917600',
  'variables' => 
  array (
    'cart_goods' => 0,
    'm' => 0,
    'L' => 0,
    'site_config' => 0,
    'cart_total' => 0,
    'unit' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5850f3ece36642_51917600')) {function content_5850f3ece36642_51917600($_smarty_tpl) {?><?php if (isset($_smarty_tpl->tpl_vars['header'])) {$_smarty_tpl->tpl_vars['header'] = clone $_smarty_tpl->tpl_vars['header'];
$_smarty_tpl->tpl_vars['header']->value = 'header2'; $_smarty_tpl->tpl_vars['header']->nocache = null; $_smarty_tpl->tpl_vars['header']->scope = 0;
} else $_smarty_tpl->tpl_vars['header'] = new Smarty_variable('header2', null, 0);?>
<?php echo $_smarty_tpl->getSubTemplate ("top.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<form action="<?php echo url('/yunbuy/checkout');?>
" id="cartForm" method="post">
<div id="content" class="container main">
    <div class="cart-list">
        <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['cart_goods']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>
        <div class="item">
            <div class="pic"><a href="<?php echo url(('/yunbuy/detail/').($_smarty_tpl->tpl_vars['m']->value['buy_id']));?>
"><img alt="(第<?php echo $_smarty_tpl->tpl_vars['m']->value['qishu'];?>
期) <?php echo $_smarty_tpl->tpl_vars['m']->value['goods_name'];?>
" src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['zz'][0][0]->_callViewFunc(array('mod'=>'fileurl','source'=>$_smarty_tpl->tpl_vars['m']->value['imgurl_thumb'],'width'=>64,'type'=>0),$_smarty_tpl);?>
" width="64" /></a></div>
            <div class="info">
                <div class="title to">
                    <input value="<?php echo $_smarty_tpl->tpl_vars['m']->value['id'];?>
" name="id[]" type="checkbox" <?php if ($_smarty_tpl->tpl_vars['m']->value['notbuy']){?>disabled<?php }else{ ?>checked<?php }?>/>
                    <?php if ($_smarty_tpl->tpl_vars['m']->value['type']==3){?>
                    <span class="color">【<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_go_buy'];?>
】</span>
                    <?php }?>
                    <a href="<?php echo url(('/yunbuy/detail/').($_smarty_tpl->tpl_vars['m']->value['buy_id']));?>
"><?php if ($_smarty_tpl->tpl_vars['m']->value['type']!=3){?>(第<?php echo $_smarty_tpl->tpl_vars['m']->value['qishu'];?>
期)<?php }?> <?php echo $_smarty_tpl->tpl_vars['m']->value['goods_name'];?>
</a>
                </div>
                <?php if ($_smarty_tpl->tpl_vars['m']->value['type']==3){?>
                <p>价格：<?php echo price_format($_smarty_tpl->tpl_vars['m']->value['price']);?>
，市场价：<del><?php echo price_format($_smarty_tpl->tpl_vars['m']->value['goods_price']);?>
</del></p>
                <?php }else{ ?>
                <p>总需 <?php echo $_smarty_tpl->tpl_vars['m']->value['need_num'];?>
 人次，剩余 <em><?php echo $_smarty_tpl->tpl_vars['m']->value['end_num'];?>
</em> 人次</p>
                <?php }?>
                <div class="bottom">
                    <?php if ($_smarty_tpl->tpl_vars['m']->value['type']==3){?>购买数量：
                    <?php }else{ ?>参与人次：<?php }?>
                    <div class="number">
                        <input class="num-input" type="text" data-id="<?php echo $_smarty_tpl->tpl_vars['m']->value['id'];?>
" data-max="<?php echo $_smarty_tpl->tpl_vars['m']->value['end_num'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['m']->value['qty'];?>
" />
                        <a class="num-btn btn-plus" data-pro="plus" href="javascript:void(0);">+</a>
                        <a class="num-btn btn-minus" data-pro="minus" href="javascript:void(0);">-</a>
                    </div>
                </div>
                <?php if ($_smarty_tpl->tpl_vars['site_config']->value['open_multi']==1&&$_smarty_tpl->tpl_vars['m']->value['type']!=3){?>
                <div class="bottom">
                    参与多期：
                    <div class="number">
                        <input class="qishu-input" type="text" data-id="<?php echo $_smarty_tpl->tpl_vars['m']->value['id'];?>
" data-max="<?php echo $_smarty_tpl->tpl_vars['m']->value['max_multi'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['m']->value['multi'];?>
" <?php if ($_smarty_tpl->tpl_vars['site_config']->value['open_multi']!=1){?>disabled<?php }?>/>
                        <a class="num-btn btn-qishu-plus" data-pro="plus" href="javascript:void(0);" <?php if ($_smarty_tpl->tpl_vars['site_config']->value['open_multi']!=1){?>style="background-color:#DEDEDE; "<?php }?>>+</a>
                        <a class="num-btn btn-qishu-minus" data-pro="minus" href="javascript:void(0);" <?php if ($_smarty_tpl->tpl_vars['site_config']->value['open_multi']!=1){?>style="background-color:#DEDEDE; "<?php }?>>-</a>
                    </div>
                </div>
                <?php }?>
                <a class="del" href="javascript:;" onclick="delCart('<?php echo $_smarty_tpl->tpl_vars['m']->value['id'];?>
',1)"><i class="ap-icon icon-del"></i></a>

                <?php if ($_smarty_tpl->tpl_vars['m']->value['num_notbuy']){?><p class="color01">该期商品活动已结束，<br>请先删除再进行结算</p>
                <?php }elseif($_smarty_tpl->tpl_vars['m']->value['extData']['error']>0){?><p class="color01"><?php echo $_smarty_tpl->tpl_vars['m']->value['extData']['error_text'];?>
</p>
                <?php }?>
            </div>
        </div>
        <?php }
if (!$_smarty_tpl->tpl_vars['m']->_loop) {
?>
        <div class="empty">您的清单里还没有任何商品，<a class="color02" href="<?php echo url('/yunbuy');?>
">马上去逛逛~</a></div>
        <?php } ?>
    </div>
</div>

<footer class="foot-view">
    <div class="text">
        <?php if (isset($_GET['free'])){?>
        共参与<?php echo count($_smarty_tpl->tpl_vars['cart_goods']->value);?>
件产品，总计：<em class="color"><i id="total"><?php echo $_smarty_tpl->tpl_vars['cart_total']->value;?>
</i> <?php echo $_smarty_tpl->tpl_vars['unit']->value;?>
</em>
        <?php }else{ ?>
        共参与<?php echo count($_smarty_tpl->tpl_vars['cart_goods']->value);?>
件产品，总计：<em class="color">￥<i id="total"><?php echo $_smarty_tpl->tpl_vars['cart_total']->value;?>
</i></em>
        <?php }?>
    </div>
    <div class="btn">
        <?php if (isset($_GET['free'])){?><input type="hidden" name="free" value="1"/><?php }?>
        <input type="hidden" name="Submit" value="1"/>
        <button class="ap-button w-button-xl" onclick="return check_sumbit()">提交</button>
    </div>
</footer>
<input type="hidden" name="address_id" value="<?php echo $_GET['address_id'];?>
"/>
</form>


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
        //参与人数
        $(".btn-plus").click(function(){
            var id = $(this).parent().children('input.num-input').attr('data-id');
            var max = $(this).parent().children('input.num-input').attr('data-max');
            var qty = $(this).parent().children('input.num-input').val()*1;
            if(qty < max){
                $(this).parent().children('input.num-input').val(qty+1);
            }
            updatecart(id,$(this).parent().children('input.num-input').val(),'');
        });
        $(".btn-minus").click(function(){
            var id = $(this).parent().children('input.num-input').attr('data-id');
            var qty = $(this).parent().children('input.num-input').val()*1;
            if(qty>1){
                $(this).parent().children('input.num-input').val(qty-1);
            }
            updatecart(id,$(this).parent().children('input.num-input').val(),'');
        });
        $("input.num-input").blur(function(){
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
        $(".btn-qishu-plus").click(function(){
            var id = $(this).parent().children('input.qishu-input').attr('data-id');
            var max = $(this).parent().children('input.qishu-input').attr('data-max');
            var multi = $(this).parent().children('input.qishu-input').val()*1;
            if(multi < max){
                $(this).parent().children('input.qishu-input').val(multi+1);
            }
            updatecart(id,'',$(this).parent().children('input.qishu-input').val());
        });
        $(".btn-qishu-minus").click(function(){
            var id = $(this).parent().children('input.qishu-input').attr('data-id');
            var multi = $(this).parent().children('input.qishu-input').val()*1;
            if(multi>1){
                $(this).parent().children('input.qishu-input').val(multi-1);
            }
            updatecart(id,'',$(this).parent().children('input.qishu-input').val());
        });
        $(".qishu-input").blur(function(){
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
                $('#total').html(data.total);
            },'json');
        }
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
    });
</script>
</body>
</html>
<?php }} ?>