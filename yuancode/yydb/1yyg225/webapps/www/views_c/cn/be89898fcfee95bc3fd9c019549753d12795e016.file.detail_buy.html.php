<?php /* Smarty version Smarty-3.1.13, created on 2016-03-03 13:43:46
         compiled from "D:\test1yyg3.lnest.com\webapps\www\views\cn\yunbuy\detail_buy.html" */ ?>
<?php /*%%SmartyHeaderCode:423756d7cf12dc4ed6-13475061%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'be89898fcfee95bc3fd9c019549753d12795e016' => 
    array (
      0 => 'D:\\test1yyg3.lnest.com\\webapps\\www\\views\\cn\\yunbuy\\detail_buy.html',
      1 => 1456976273,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '423756d7cf12dc4ed6-13475061',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'row' => 0,
    'm' => 0,
    'from' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_56d7cf130f2d67_66518692',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56d7cf130f2d67_66518692')) {function content_56d7cf130f2d67_66518692($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<link rel="stylesheet" href="<?php echo url('/style/css/yiyuanbao.css');?>
"><link rel="stylesheet" href="<?php echo url('/style/css/addcss.css');?>
"><script src="<?php echo url('/style/jquery.W3CI.js');?>
" type="text/javascript"></script><script src="<?php echo url('/style/jquery.ajaxContent.pack.js');?>
" type="text/javascript"></script><style type="text/css">    .m-detail .g-main{ width: 100%; }    .m-detail .g-main-m{ width: 720px; }    .m-detail-main-title h3{ text-indent: 0; }    .add-css .m-detail-main-ing{ padding-top: 10px; }    .m-detail-main-price{ margin-bottom: 10px; }</style><?php echo $_smarty_tpl->getSubTemplate ("ur_here.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<div class="g-body"><div class="m-detail"><div class="g-wrap g-body-hd f-clear add-css" style="overflow:visible;">    <div class="g-main">        <div class="g-main-l m-detail-show">            <div class="w-goods-picShow">                <div class="w-goods-picShow-large">                    <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['row']->value['pics']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['m']->index=-1;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['pics']['iteration']=0;
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
 $_smarty_tpl->tpl_vars['m']->index++;
 $_smarty_tpl->tpl_vars['m']->first = $_smarty_tpl->tpl_vars['m']->index === 0;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['pics']['first'] = $_smarty_tpl->tpl_vars['m']->first;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['pics']['iteration']++;
?>                    <div style="<?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['pics']['iteration']==1){?>display: block;<?php }else{ ?>display: none;<?php }?> width: 380px;height: 380px;" class="v">                    <img src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['zz'][0][0]->_callViewFunc(array('mod'=>'fileurl','source'=>$_smarty_tpl->tpl_vars['m']->value['imgurl_src'],'width'=>380,'height'=>380),$_smarty_tpl);?>
"<?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['pics']['first']){?> id="buy_img_<?php echo $_smarty_tpl->tpl_vars['row']->value['buy_id'];?>
"<?php }?> /><span></span>                    </div>                    <?php } ?>                </div>                <div class="w-goods-picShow-thumbnail">                    <ul class="w-goods-picShow-thumbnail-list">                        <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['row']->value['pics']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['m']->index=-1;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['pics']['iteration']=0;
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
 $_smarty_tpl->tpl_vars['m']->index++;
 $_smarty_tpl->tpl_vars['m']->first = $_smarty_tpl->tpl_vars['m']->index === 0;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['pics']['first'] = $_smarty_tpl->tpl_vars['m']->first;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['pics']['iteration']++;
?>                        <?php if ($_smarty_tpl->tpl_vars['m']->value['imgurl_src']){?>                        <li class="<?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['pics']['iteration']==1){?>selected<?php }?> v">                            <i class="ico ico-arrow ico-arrow-red ico-arrow-red-up"></i>                            <img src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['zz'][0][0]->_callViewFunc(array('mod'=>'fileurl','source'=>$_smarty_tpl->tpl_vars['m']->value['imgurl_src'],'width'=>64,'height'=>48,'type'=>1),$_smarty_tpl);?>
"><span></span>                        </li>                        <?php }?>                        <?php } ?>                    </ul>                </div>            </div>            <div class="w-shareTo">                <?php echo share();?>
            </div>        </div>        <script>jQuery(".w-goods-picShow").slide( { titCell:".w-goods-picShow-thumbnail-list  li",mainCell:".w-goods-picShow-large",titOnClassName:"selected" } );</script>        <div class="g-main-m m-detail-main">            <div class="m-detail-main-title">                <h3 title="<?php echo $_smarty_tpl->tpl_vars['row']->value['title'];?>
"><?php echo $_smarty_tpl->tpl_vars['row']->value['title'];?>
</h3>            </div>            <div class="w-goods-xxl m-detail-main-wrap m-detail-main-ing ">                <p class="m-detail-main-price">                    <span style="font-size: 12px;">价格：<span class="txt-main" style="color: black"><?php echo price_format($_smarty_tpl->tpl_vars['row']->value['custom_price']);?>
</span></span>                    <span style="font-size: 12px;"><?php if ($_smarty_tpl->tpl_vars['from']->value){?>&nbsp;&nbsp;商品来源 : <a href="<?php echo $_smarty_tpl->tpl_vars['from']->value[1];?>
" target="_blank" class="color04"><?php echo $_smarty_tpl->tpl_vars['from']->value[0];?>
</a> <i style="color: #999">（采购平台价格会有上下浮动）</i><?php }?></span>                </p>                <div class="m-detail-main-count">                    <span>购买数量：</span>                    <div class="m-detail-main-count-number">                        <div id="pro-view-2" class="w-number w-number-inline">                            <input class="w-number-input" id="qty_<?php echo $_smarty_tpl->tpl_vars['row']->value['buy_id'];?>
" data-max="<?php echo $_smarty_tpl->tpl_vars['row']->value['end_num'];?>
" style="color: black" value="1">                            <a class="w-number-btn w-number-btn-plus" data-pro="plus" href="javascript:void(0);">+</a>                            <a class="w-number-btn w-number-btn-minus" data-pro="minus" href="javascript:void(0);">-</a>                        </div>                    </div>                </div>                <div class="m-detail-main-buyGoods">                    <a id="quickBuy" class="w-button w-button-xl w-button-main" href="javascript:void(0)" onclick="addToCart(<?php echo $_smarty_tpl->tpl_vars['row']->value['buy_id'];?>
,'buy')" style="width: 105px">立即购买</a>                    <a id="addToCart" class="w-button w-button-xl" href="javascript:void(0)" onclick="addToCart('<?php echo $_smarty_tpl->tpl_vars['row']->value['buy_id'];?>
','',this)" style="width: 112px"><i class="ico ico-miniCart"></i>加入购物车</a>                </div>            </div>            <script type="text/javascript">                $(function(){                    $(function(){                        $('.w-number-a').bind('click',function(){                            $('.w-number-a').removeClass('hover');                            $(this).addClass('hover')                            $('.w-number-input').val($(this).attr('data-value'));                        })                    });                    $(".w-number-btn-plus").click(function(){                        var max = $(this).parent().children('input.w-number-input').attr('data-max');                        var qty = $(this).parent().children('input.w-number-input').val()*1;                        if(qty < max){                            $(this).parent().children('input.w-number-input').val(qty+1);                        }                    });                    $(".w-number-btn-minus").click(function(){                        var qty = $(this).parent().children('input.w-number-input').val()*1;                        if(qty>1){                            $(this).parent().children('input.w-number-input').val(qty-1);                        }                    });                    $(".w-number-input").blur(function(){                        var max = $(this).attr('data-max')*1;                        if($(this).val()>max){                            $(this).val(max);                        }                    });                });            </script>            <div class="m-detail-main-state">                <ul class="f-clear">                    <li><i class="ico ico-state ico-state-1"></i><a href="<?php echo url('/content/index/80');?>
" target="_blank">公平公正公开</a></li>                    <li><i class="ico ico-state ico-state-2"></i><a href="<?php echo url('/content/index/75');?>
" target="_blank">正品保证</a></li>                    <li><i class="ico ico-state ico-state-3"></i><a href="<?php echo url('/content/index/55');?>
" target="_blank">权益保障</a></li>                </ul>            </div>        </div>    </div></div><a name="tab"></a><div class="g-wrap g-body-bd f-clear"><div class="w-tabs w-tabs-main m-detail-mainTab"><div class="w-tabs-tab">    <div id="introTab" class="w-tabs-tab-item w-tabs-tab-item-selected">商品详情</div></div><div class="w-tabs-panel"><div id="resultPanel" class="w-tabs-panel-item" style="display: block;">    <div style="text-align: center">        <?php echo picurl(stripcslashes($_smarty_tpl->tpl_vars['row']->value['goods_body']));?>
    </div></div></div></div></div></div></div><script>jQuery(".m-detail-mainTab").slide( { titCell:".w-tabs-tab div",mainCell:".w-tabs-panel",titOnClassName:"w-tabs-tab-item-selected" } );</script><?php echo $_smarty_tpl->getSubTemplate ("footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>