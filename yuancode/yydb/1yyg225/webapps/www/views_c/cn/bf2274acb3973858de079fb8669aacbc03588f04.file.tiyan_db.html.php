<?php /* Smarty version Smarty-3.1.13, created on 2016-12-07 08:06:42
         compiled from "/data/01/html/1yyg225/webapps/www/views/cn/content/tiyan_db.html" */ ?>
<?php /*%%SmartyHeaderCode:12350111258475292470791-33798680%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bf2274acb3973858de079fb8669aacbc03588f04' => 
    array (
      0 => '/data/01/html/1yyg225/webapps/www/views/cn/content/tiyan_db.html',
      1 => 1456367946,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12350111258475292470791-33798680',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'tagAdw' => 0,
    'tagAds' => 0,
    'm' => 0,
    'tagGG' => 0,
    'data' => 0,
    'L' => 0,
    'yunListNo' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_584752925f57d0_19635612',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_584752925f57d0_19635612')) {function content_584752925f57d0_19635612($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_truncate')) include '/data/01/html/1yyg225/system/smarty/plugins/modifier.truncate.php';
?><?php echo $_smarty_tpl->getSubTemplate ("header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<script src="/style/lefttime.js"></script>
<link rel="stylesheet" href="<?php echo url('/style/css/boutique.css');?>
">
<link rel="stylesheet" href="<?php echo url('/style/css/yiyuanbao.css');?>
">
<style type="text/css">
    .fn-clear{ clear: both; }
    .tiyan-box{ margin-bottom: 40px;}
    h3{ font-size: 18px; line-height: 40px; height: 40px; overflow: hidden; color: #000; font-weight: normal; }
    h3 a{ color: #000; }
    h3 a:hover{ color: #e54048; }
    h3 span{ float:right; font-size: 12px; line-height: 50px; }

    .m-list-goodsList .m-list-mod-bd{ padding-top:0; width:1160px; }
    .w-quickBuyList{ width: 100%; border-left:1px solid #ddd; border-top:2px solid #888; }
    .w-quickBuyList-item{ margin-right:0; margin-bottom: 0; height: 375px; width:289px; margin-left:-1px;margin-top:-1px; }
    .m-list-goodsList .w-goods-opr-buy{ margin-top: 0}

    .hy-btn{ background:#1FB89A; height:22px; line-height: 22px; font-size:14px; color:#fff; cursor:pointer; border-radius:3px; border:1px solid #048E77; padding:0 10px; border-width: 0 1px 2px 0; }
    .hy-btn:hover{ color:#ff0;}
</style>

<div class="ggAuc11">
    <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['zz'][0][0]->_callViewFunc(array('mod'=>'content','var'=>'tagAdw','module'=>'ad','id'=>9),$_smarty_tpl);?>

    <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['zz'][0][0]->_callViewFunc(array('mod'=>'fileurl','var'=>'tagAds','source'=>$_smarty_tpl->tpl_vars['tagAdw']->value['images'],'num'=>2),$_smarty_tpl);?>

    <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['tagAds']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>
    <div class="g-gg" style="height:<?php echo $_smarty_tpl->tpl_vars['tagAdw']->value['height'];?>
px;background:<?php echo $_smarty_tpl->tpl_vars['tagAdw']->value['bgcolor'];?>
 url('<?php echo $_smarty_tpl->tpl_vars['m']->value['path'];?>
') no-repeat center bottom"><span></span></div>
    <?php } ?>
    <!--<div class="container" style="position:relative;margin-top:-180px;height:250px;">
        <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['zz'][0][0]->_callViewFunc(array('mod'=>'content','var'=>'tagGG','catid'=>61,'limit'=>1,'type'=>'row','field'=>'content'),$_smarty_tpl);?>

        <?php if ($_smarty_tpl->tpl_vars['tagGG']->value){?>
        <div class="txt txt_ty">
            <dl style="background: #ffdb0b;color:#000;">
                <dt style="color: #e53f47">体验区公告</dt>
                <dd>
                    <?php echo stripcslashes($_smarty_tpl->tpl_vars['tagGG']->value['content']);?>

                </dd>
            </dl>
        </div>
        <?php }?>
        <div class="txtScroll-top" style="color: #666">
            <h4>幸运一族：</h4>
            <div class="bd">
                <ul>
                    <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['data']->value['log']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>
                    <li title="恭喜<?php echo $_smarty_tpl->tpl_vars['m']->value['username'];?>
会员<?php if ($_smarty_tpl->tpl_vars['m']->value['win']>0){?>在<?php echo $_smarty_tpl->tpl_vars['m']->value['win'];?>
%出价成交活动中<?php }?>以<?php echo price_format($_smarty_tpl->tpl_vars['m']->value['bid_price']);?>
获<?php echo $_smarty_tpl->tpl_vars['m']->value['title'];?>
">恭喜<a><span class="color01"><?php echo nickname($_smarty_tpl->tpl_vars['m']->value['username'],$_smarty_tpl->tpl_vars['m']->value['nickname']);?>
</span></a>会员<?php if ($_smarty_tpl->tpl_vars['m']->value['win']>0){?>在<?php echo $_smarty_tpl->tpl_vars['m']->value['win'];?>
%出价成交活动中<?php }?>以<span><?php echo price_format($_smarty_tpl->tpl_vars['m']->value['bid_price']);?>
</span>获<?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['m']->value['title'],16);?>
</li>
                    <?php } ?>
                </ul>
            </div>
        </div>
        <?php echo $_smarty_tpl->getSubTemplate ("ur_here.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

    </div>-->
</div>

<div class="container tiyan-box fn-clear mt10">

    <h3><span><a href="<?php echo url('/yunbuy/free');?>
">体验更多宝贝哦...</a></span><a href="<?php echo url('/yunbuy/free');?>
">不花钱<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_yun'];?>
体验区</a>（<a href="<?php echo url('/member');?>
" target="_blank">使用<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_pay_points'];?>
<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_yun'];?>
</a>，<a href="<?php echo url('/member/myivt');?>
" target="_blank">邀请送<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_pay_points'];?>
</a>）</h3>
    <div class="m-list-mod m-list-goodsList">
        <div class="m-list-mod-bd">
            <ul class="w-quickBuyList f-clear">
                <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['data']->value['yunList']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>
                <li class="w-quickBuyList-item">
                    <?php if ($_smarty_tpl->tpl_vars['m']->value['member']==-1){?>
                    <img class="sale_db" src="/style/images/member_db.png" style="right: 5px; top:5px;" />
                    <?php }elseif($_smarty_tpl->tpl_vars['m']->value['notjoin']==1){?>
                    <img class="sale_db" src="/style/images/nxdb.png" style="right: 5px; top:5px;" />
                    <?php }elseif($_smarty_tpl->tpl_vars['m']->value['buynum']>0||$_smarty_tpl->tpl_vars['m']->value['usernum']>0){?>
                    <img class="sale_db" src="/style/images/sale_db.png" style="right: 5px; top:5px;" />
                    <?php }?>

                    <div class="w-goods w-goods-l w-goods-ing">
                        <div class="w-goods-pic v scrollLoadingDiv">
                            <a href="<?php echo url(('/yunbuy/detail/').($_smarty_tpl->tpl_vars['m']->value['buy_id']));?>
" target="_blank" title="<?php echo $_smarty_tpl->tpl_vars['m']->value['title'];?>
">
                                <img alt="<?php echo $_smarty_tpl->tpl_vars['m']->value['title'];?>
" class="scrollLoading" src="/style/images/pix.gif" data-url="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['zz'][0][0]->_callViewFunc(array('mod'=>'fileurl','source'=>$_smarty_tpl->tpl_vars['m']->value['imgurl_src'],'width'=>250,'height'=>150),$_smarty_tpl);?>
" style="">
                            </a>
                            <span></span>
                        </div>
                        <p class="w-goods-title f-txtabb">
                            <a href="<?php echo url(('/yunbuy/detail/').($_smarty_tpl->tpl_vars['m']->value['buy_id']));?>
" target="_blank" title="<?php echo $_smarty_tpl->tpl_vars['m']->value['title'];?>
"><span class="color01">(第<?php echo $_smarty_tpl->tpl_vars['m']->value['qishu'];?>
期)</span> <?php echo $_smarty_tpl->tpl_vars['m']->value['title'];?>
</a></p>
                        <p class="w-goods-price">总需：<?php echo $_smarty_tpl->tpl_vars['m']->value['need_num'];?>
 人次</p>
                        <div class="w-progressBar" title="<?php echo $_smarty_tpl->tpl_vars['m']->value['jindu'];?>
%">
                            <p class="w-progressBar-wrap"><span class="w-progressBar-bar" style="width: <?php echo $_smarty_tpl->tpl_vars['m']->value['jindu'];?>
%;"></span></p>
                            <ul class="w-progressBar-txt f-clear">
                                <li class="w-progressBar-txt-l">
                                    <p><b><?php echo $_smarty_tpl->tpl_vars['m']->value['buy_num'];?>
</b></p>
                                    <p>已免费参与人次</p>
                                </li>
                                <li class="w-progressBar-txt-r">
                                    <p><b><?php echo $_smarty_tpl->tpl_vars['m']->value['end_num'];?>
</b></p>
                                    <p>剩余人次</p>
                                </li>
                            </ul>
                        </div>
                        <div class="w-goods-opr">
                            <a class="w-button w-button-green w-button-l" href="<?php echo url(('/yunbuy/detail/').($_smarty_tpl->tpl_vars['m']->value['buy_id']));?>
" style="width: 90px;"><?php echo $_smarty_tpl->tpl_vars['L']->value['unit_yun_button'];?>
</a>
                        </div>
                    </div>
                </li>
                <?php } ?>
                <?php if ($_smarty_tpl->tpl_vars['yunListNo']->value<4&&$_smarty_tpl->tpl_vars['yunListNo']->value>0){?>
                <?php $_smarty_tpl->tpl_vars['foo'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['foo']->step = 1;$_smarty_tpl->tpl_vars['foo']->total = (int)ceil(($_smarty_tpl->tpl_vars['foo']->step > 0 ? $_smarty_tpl->tpl_vars['yunListNo']->value+1 - (1) : 1-($_smarty_tpl->tpl_vars['yunListNo']->value)+1)/abs($_smarty_tpl->tpl_vars['foo']->step));
if ($_smarty_tpl->tpl_vars['foo']->total > 0){
for ($_smarty_tpl->tpl_vars['foo']->value = 1, $_smarty_tpl->tpl_vars['foo']->iteration = 1;$_smarty_tpl->tpl_vars['foo']->iteration <= $_smarty_tpl->tpl_vars['foo']->total;$_smarty_tpl->tpl_vars['foo']->value += $_smarty_tpl->tpl_vars['foo']->step, $_smarty_tpl->tpl_vars['foo']->iteration++){
$_smarty_tpl->tpl_vars['foo']->first = $_smarty_tpl->tpl_vars['foo']->iteration == 1;$_smarty_tpl->tpl_vars['foo']->last = $_smarty_tpl->tpl_vars['foo']->iteration == $_smarty_tpl->tpl_vars['foo']->total;?>
                <li class="w-quickBuyList-item blank"></li>
                <?php }} ?>
                <?php }?>
            </ul>
        </div>
    </div>

</div>
<?php echo $_smarty_tpl->getSubTemplate ("footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<script type="text/javascript">
    $('.w-quickBuyList-item').bind('mouseover',function(){
        $(this).addClass('hover');
    }).bind('mouseout',function(){
        $(this).removeClass('hover');
    });

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
<?php }} ?>