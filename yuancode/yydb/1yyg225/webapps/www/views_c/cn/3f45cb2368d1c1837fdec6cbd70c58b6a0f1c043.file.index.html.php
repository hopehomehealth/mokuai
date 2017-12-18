<?php /* Smarty version Smarty-3.1.13, created on 2016-12-19 13:08:29
         compiled from "/data/01/html/1yyg225/webapps/www/views/cn/store/index.html" */ ?>
<?php /*%%SmartyHeaderCode:172083988558576b4da8cc88-93779138%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3f45cb2368d1c1837fdec6cbd70c58b6a0f1c043' => 
    array (
      0 => '/data/01/html/1yyg225/webapps/www/views/cn/store/index.html',
      1 => 1481177860,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '172083988558576b4da8cc88-93779138',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'business_row' => 0,
    'm' => 0,
    'data' => 0,
    'mid' => 0,
    'L' => 0,
    'site_config' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_58576b4dbcd696_22111738',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58576b4dbcd696_22111738')) {function content_58576b4dbcd696_22111738($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<link type="text/css" rel="stylesheet" href="/style/css_02/style.css" />
<link type="text/css" rel="stylesheet" href="/style/css_02/merchant.css" />
<div class="container menu-show">
    <div class="merchant-left">
        <?php if ($_smarty_tpl->tpl_vars['business_row']->value['bus_ads_array']){?>
        <div class="merchant-pd merchant-banner">
            <div class="bd">
                <ul>
                    <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['business_row']->value['bus_ads_array']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>
                    <li><a href="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['m']->value['title'])===null||$tmp==='' ? 'javascript:;' : $tmp);?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['m']->value['path'];?>
" /></a></li>
                    <?php } ?>
                </ul>
            </div>
            <div class="hd">
                <ul></ul>
            </div>
        </div>
        <?php }?>
        <div class="merchant-pd" id="m">
            <?php if ($_smarty_tpl->tpl_vars['data']->value['list_yunbuy']){?>
            <div class="merchant-top">
                <a href="/store/yunbuy/<?php echo $_smarty_tpl->tpl_vars['mid']->value;?>
">查看更多</a>
                <strong><?php echo $_smarty_tpl->tpl_vars['L']->value['unit_yun'];?>
商品</strong>
            </div>
            <ul class="ten box-sizing">
                <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['data']->value['list_yunbuy']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>
                <li class="index1-img">
                    <div class="ten1">
                        <em class="scrollLoadingDiv"><a href="<?php echo url(('/yunbuy/detail/').($_smarty_tpl->tpl_vars['m']->value['buy_id']));?>
" target="_blank" title="<?php echo $_smarty_tpl->tpl_vars['m']->value['title'];?>
"><img alt="<?php echo $_smarty_tpl->tpl_vars['m']->value['title'];?>
" class="scrollLoading" src="/style/images/pix.gif" data-url="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['zz'][0][0]->_callViewFunc(array('mod'=>'fileurl','source'=>$_smarty_tpl->tpl_vars['m']->value['imgurl_src'],'height'=>200,'type'=>0),$_smarty_tpl);?>
" id="buy_img_<?php echo $_smarty_tpl->tpl_vars['m']->value['buy_id'];?>
" /></a></em>
                        <p class="banner-title"><a href="<?php echo url(('/yunbuy/detail/').($_smarty_tpl->tpl_vars['m']->value['buy_id']));?>
" target="_blank" title="<?php echo $_smarty_tpl->tpl_vars['m']->value['title'];?>
"><span class="color01">(第<?php echo $_smarty_tpl->tpl_vars['m']->value['qishu'];?>
期)</span> <?php echo $_smarty_tpl->tpl_vars['m']->value['title'];?>
</a></p>
                        <p class="banner-money">总需：<?php echo $_smarty_tpl->tpl_vars['m']->value['need_num'];?>
 人次</p>
                        <div class="progressBar">
                            <p class="progressBar-wrap">
                                <span style="width:<?php echo $_smarty_tpl->tpl_vars['m']->value['jindu'];?>
%"></span>
                            </p>
                            <div class="progressBar-txt">
                                <div class="txt-l">
                                    <p><b><?php echo $_smarty_tpl->tpl_vars['m']->value['buy_num'];?>
</b></p>
                                    <p>已参与人次</p>
                                </div>
                                <div class="txt-r">
                                    <p><b><?php echo $_smarty_tpl->tpl_vars['m']->value['end_num'];?>
</b></p>
                                    <p>剩余人次</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ten2">
                        <span>我要参与：</span>
                        <div class="ten2-1">
                            <input type="button" value="-" class="ten-jian ten-i w-number-btn-minus" />
                            <input type="text" class="ten-text w-number-input" id="qty_<?php echo $_smarty_tpl->tpl_vars['m']->value['buy_id'];?>
" data-max="<?php echo $_smarty_tpl->tpl_vars['m']->value['end_num'];?>
" value="<?php echo intval($_smarty_tpl->tpl_vars['site_config']->value['qty']);?>
" />
                            <input type="button" value="+" class="ten-jian ten-i w-number-btn-plus" />
                        </div>
                        <span>人次</span>
                        <p>
                            <?php if ($_smarty_tpl->tpl_vars['m']->value['type']==2){?>
                            <a href="javascript:;" onclick="addToCart('<?php echo $_smarty_tpl->tpl_vars['m']->value['buy_id'];?>
','free');" class="ten-a ten-free">免费<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_yun'];?>
</a>
                            <?php }else{ ?>
                            <a href="javascript:;" onclick="addToCart('<?php echo $_smarty_tpl->tpl_vars['m']->value['buy_id'];?>
','buy');" class="ten-a"><?php echo $_smarty_tpl->tpl_vars['L']->value['unit_yun_button'];?>
</a>
                            <a href="javascript:;" onclick="addToCart('<?php echo $_smarty_tpl->tpl_vars['m']->value['buy_id'];?>
','',this)" class="ten-a1">加入购物车</a>
                            <?php }?>
                        </p>
                    </div>
                </li>
                <?php } ?>
            </ul>
            <?php }?>
            <?php if ($_smarty_tpl->tpl_vars['data']->value['list_gobuy']){?>
            <div class="merchant-top">
                <a href="/store/gobuy/<?php echo $_smarty_tpl->tpl_vars['mid']->value;?>
">查看更多</a>
                <strong><?php echo $_smarty_tpl->tpl_vars['L']->value['unit_go_buy'];?>
商品</strong>
            </div>
            <ul class="ten box-sizing">
                <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['data']->value['list_gobuy']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>
                <li style="height: auto">
                    <div class="ten1 index1-img">
                        <em class="scrollLoadingDiv"><a href="<?php echo url(('/yunbuy/detail/').($_smarty_tpl->tpl_vars['m']->value['buy_id']));?>
" target="_blank" title="<?php echo $_smarty_tpl->tpl_vars['m']->value['title'];?>
"><img alt="<?php echo $_smarty_tpl->tpl_vars['m']->value['title'];?>
" class="scrollLoading" src="/style/images/pix.gif" data-url="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['zz'][0][0]->_callViewFunc(array('mod'=>'fileurl','source'=>$_smarty_tpl->tpl_vars['m']->value['imgurl_src'],'width'=>150,'height'=>150,'type'=>0),$_smarty_tpl);?>
" id="buy_img_<?php echo $_smarty_tpl->tpl_vars['m']->value['buy_id'];?>
" /></a></em>
                        <p class="banner-title"><a href="<?php echo url(('/yunbuy/detail/').($_smarty_tpl->tpl_vars['m']->value['buy_id']));?>
" target="_blank" title="<?php echo $_smarty_tpl->tpl_vars['m']->value['title'];?>
"><?php echo $_smarty_tpl->tpl_vars['m']->value['title'];?>
</a></p>
                        <p class="banner-money">价格：<b style="color: #f60"><?php echo price_format($_smarty_tpl->tpl_vars['m']->value['custom_price']);?>
</b></p>
                    </div>
                    <div class="ten2">
                        <p>
                            <a href="javascript:;" onclick="addToCart('<?php echo $_smarty_tpl->tpl_vars['m']->value['buy_id'];?>
','buy');" class="ten-a">立即购买</a>
                            <a href="javascript:;" onclick="addToCart('<?php echo $_smarty_tpl->tpl_vars['m']->value['buy_id'];?>
','',this)" class="ten-a1">加入购物车</a>
                        </p>
                    </div>
                </li>
                <?php } ?>
            </ul>
            <?php }?>
        </div>
        
        <script type="text/javascript">
            $(function(){
                $(".w-number-btn-plus").click(function(){
                    var max = $(this).parent().children('input.w-number-input').attr('data-max');
                    var qty = $(this).parent().children('input.w-number-input').val()*1;
                    if(qty < max){
                        $(this).parent().children('input.w-number-input').val(qty+1);
                    }
                });
                $(".w-number-btn-minus").click(function(){
                    var qty = $(this).parent().children('input.w-number-input').val()*1;
                    if(qty>1){
                        $(this).parent().children('input.w-number-input').val(qty-1);
                    }
                });
                $(".w-number-input").blur(function(){
                    var max = $(this).attr('data-max')*1;
                    if($(this).val()>max){
                        $(this).val(max);
                    }
                });
            });
        </script>
        
    </div>
    <?php echo $_smarty_tpl->getSubTemplate ("store/info.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

</div>
<div class="merchant"></div>
<?php echo $_smarty_tpl->getSubTemplate ("footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<script src="/style/jquery.SuperSlide.2.1.1.js"></script>
<script src="/style/css_02/common_02.js"></script>
<script type="text/javascript">
    $(".merchant-banner").slide({ titCell:".hd ul",mainCell:".bd ul",autoPage:true,effect:"fold",autoPlay:true,interTime:5000 });
</script>
<?php }} ?>