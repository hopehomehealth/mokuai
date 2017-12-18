<?php /* Smarty version Smarty-3.1.13, created on 2015-12-03 10:47:20
         compiled from "F:\WWW\1yyg225\webapps\www\views\cn\mobile\yunbuy\cart.html" */ ?>
<?php /*%%SmartyHeaderCode:31526565fad3855d5a2-89374782%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f32fc6f6b3afbd236e63af8345d3dce4bc7fa65d' => 
    array (
      0 => 'F:\\WWW\\1yyg225\\webapps\\www\\views\\cn\\mobile\\yunbuy\\cart.html',
      1 => 1446429313,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '31526565fad3855d5a2-89374782',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'cart_goods' => 0,
    'm' => 0,
    'cart_total' => 0,
    'unit' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_565fad3867f740_05388418',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_565fad3867f740_05388418')) {function content_565fad3867f740_05388418($_smarty_tpl) {?><?php if (isset($_smarty_tpl->tpl_vars['header'])) {$_smarty_tpl->tpl_vars['header'] = clone $_smarty_tpl->tpl_vars['header'];
$_smarty_tpl->tpl_vars['header']->value = 'header2'; $_smarty_tpl->tpl_vars['header']->nocache = null; $_smarty_tpl->tpl_vars['header']->scope = 0;
} else $_smarty_tpl->tpl_vars['header'] = new Smarty_variable('header2', null, 0);?>
<?php echo $_smarty_tpl->getSubTemplate ("top.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<form action="<?php echo url('/yunbuy/checkout');?>
" method="post">
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
                <div class="title to"><input value="<?php echo $_smarty_tpl->tpl_vars['m']->value['id'];?>
" name="id[]" type="checkbox" <?php if ($_smarty_tpl->tpl_vars['m']->value['notbuy']){?>disabled<?php }else{ ?>checked<?php }?>/> <a href="<?php echo url(('/yunbuy/detail/').($_smarty_tpl->tpl_vars['m']->value['buy_id']));?>
">(第<?php echo $_smarty_tpl->tpl_vars['m']->value['qishu'];?>
期) <?php echo $_smarty_tpl->tpl_vars['m']->value['goods_name'];?>
</a></div>
                <p>总需 <?php echo $_smarty_tpl->tpl_vars['m']->value['need_num'];?>
 人次，剩余 <em><?php echo $_smarty_tpl->tpl_vars['m']->value['end_num'];?>
</em> 人次</p>
                <div class="bottom">
                    参与人次：
                    <div class="number">
                        <input class="num-input" type="text" data-id="<?php echo $_smarty_tpl->tpl_vars['m']->value['id'];?>
" data-max="<?php echo $_smarty_tpl->tpl_vars['m']->value['end_num'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['m']->value['qty'];?>
" />
                        <a class="num-btn btn-plus" data-pro="plus" href="javascript:void(0);">+</a>
                        <a class="num-btn btn-minus" data-pro="minus" href="javascript:void(0);">-</a>
                    </div>
                </div>
                <a class="del" href="javascript:;" onclick="delCart('<?php echo $_smarty_tpl->tpl_vars['m']->value['id'];?>
',1)"><i class="ap-icon icon-del"></i></a>

                <?php if ($_smarty_tpl->tpl_vars['m']->value['num_notbuy']){?><p class="color01">该期商品活动已结束，<br>请先删除再进行结算</p>
                <?php }elseif($_smarty_tpl->tpl_vars['m']->value['extData']['error']==1){?><p class="color01">该期云购限制最大参与<?php echo $_smarty_tpl->tpl_vars['m']->value['extData']['buynum'];?>
人次</p>
                <?php }elseif($_smarty_tpl->tpl_vars['m']->value['extData']['error']==2){?><p class="color01">参与该期云购需推荐<?php echo $_smarty_tpl->tpl_vars['m']->value['extData']['usernum'];?>
人次,您未满足要求</p>
                <?php }elseif($_smarty_tpl->tpl_vars['m']->value['extData']['error']==3){?><p class="color01"><?php echo $_smarty_tpl->tpl_vars['m']->value['extData']['error_text'];?>
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
        共参与<?php echo count($_smarty_tpl->tpl_vars['cart_goods']->value);?>
件产品，总计：<em class="color"><i id="total"><?php echo $_smarty_tpl->tpl_vars['cart_total']->value;?>
</i> <?php echo $_smarty_tpl->tpl_vars['unit']->value;?>
</em>
    </div>
    <div class="btn">
        <?php if (isset($_GET['free'])){?><input type="hidden" name="free" value="1"/><?php }?>
        <input type="hidden" name="Submit" value="1"/>
        <button class="ap-button w-button-xl" type="submit">提交</button>
    </div>
</footer>
</form>


<script type="text/javascript">
    $(function(){
        $(".btn-plus").click(function(){
            var id = $(this).parent().children('input.num-input').attr('data-id');
            var max = $(this).parent().children('input.num-input').attr('data-max');
            var qty = $(this).parent().children('input.num-input').val()*1;
            if(qty < max){
                $(this).parent().children('input.num-input').val(qty+1);
            }
            updatecart(id,$(this).parent().children('input.num-input').val());
        });
        $(".btn-minus").click(function(){
            var id = $(this).parent().children('input.num-input').attr('data-id');
            var qty = $(this).parent().children('input.num-input').val()*1;
            if(qty>1){
                $(this).parent().children('input.num-input').val(qty-1);
            }
            updatecart(id,$(this).parent().children('input.num-input').val());
        });
        $("input.num-input").blur(function(){
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
            $.getJSON('/yunbuy/total',{ids:ids},function(data){
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