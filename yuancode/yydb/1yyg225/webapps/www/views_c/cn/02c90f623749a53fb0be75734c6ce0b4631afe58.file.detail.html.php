<?php /* Smarty version Smarty-3.1.13, created on 2017-02-14 16:30:38
         compiled from "/data/01/html/1yyg225/webapps/www/views/cn/yunbuy/detail.html" */ ?>
<?php /*%%SmartyHeaderCode:15817568715848f5e15f7689-74530172%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '02c90f623749a53fb0be75734c6ce0b4631afe58' => 
    array (
      0 => '/data/01/html/1yyg225/webapps/www/views/cn/yunbuy/detail.html',
      1 => 1487059786,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15817568715848f5e15f7689-74530172',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5848f5e1a93595_19313700',
  'variables' => 
  array (
    'row' => 0,
    'ext_info' => 0,
    'm' => 0,
    'prev_buy' => 0,
    'L' => 0,
    'row_buy' => 0,
    'site_config' => 0,
    'end_time' => 0,
    'luck_code' => 0,
    'luck_member' => 0,
    'new_db' => 0,
    'member_join' => 0,
    'new_buy' => 0,
    'site_join' => 0,
    'join_arr' => 0,
    'v' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5848f5e1a93595_19313700')) {function content_5848f5e1a93595_19313700($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_truncate')) include '/data/01/html/1yyg225/system/smarty/plugins/modifier.truncate.php';
?><?php echo $_smarty_tpl->getSubTemplate ("header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<link rel="stylesheet" href="<?php echo url('/style/css/yiyuanbao.css');?>
"><?php if ($_smarty_tpl->tpl_vars['row']->value['wait_time']==0){?><link rel="stylesheet" href="<?php echo url('/style/css/addcss.css');?>
"><?php }?><script src="<?php echo url('/style/jquery.W3CI.js');?>
" type="text/javascript"></script><script src="<?php echo url('/style/moment.min.js');?>
" type="text/javascript"></script><script src="<?php echo url('/style/jquery.ajaxContent.pack.js');?>
" type="text/javascript"></script><?php echo $_smarty_tpl->getSubTemplate ("ur_here.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<div class="g-body"><div class="m-detail"><div class="g-wrap g-body-hd f-clear add-css" style="overflow:visible;position:relative;">    <div class="qishu_box" id="qishuBox"></div>    <div class="qishu_list" id="qishuList"></div>    <input type="hidden" id="MAXQI" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['qishu'];?>
" />    <script type="text/javascript">        $(function(){            var D = {                buy_id: "<?php echo $_smarty_tpl->tpl_vars['row']->value['buy_id'];?>
",                sid   : "<?php echo $_smarty_tpl->tpl_vars['row']->value['sid'];?>
",                qishu : "<?php echo $_smarty_tpl->tpl_vars['row']->value['qishu'];?>
",                type  : 0            };            $.post("/yunbuy/getQishuList",D,function(data){                //$("#qishuBox").html(data.html);   var qihao = moment.unix(<?php echo $_smarty_tpl->tpl_vars['row']->value['add_time'];?>
).format("YYYYMMDD"); $("#qishuBox").html("<div class='fn-clear yhp-wq'><ul><li class='dq'><a href='javascript:;'>"+ qihao +"</a></li></ul></div>");             $('#MAXQI').val(data.max);                $('#qishuBox .li_more_1,#qishuBox .li_more').bind('click',function(){                    D.type = 1;                    $('#qishuList').stop().slideDown(200);                    if( ! $('#qishuList').html()){                        $.get("/yunbuy/getQishuList",D,function(data){                            $("#qishuList").html(data);                            call_qishu_list()                        });                    }                });            },'json');        });        //飞入某一期        function fly_qishu(){            var qishu_max = $('#MAXQI').val();            var qishu = $('#HOWQI').val();            if(parseInt(qishu)>0 && parseInt(qishu)<=parseInt(qishu_max)){                var D = {                    qishu : qishu,                    sid : "<?php echo $_smarty_tpl->tpl_vars['row']->value['sid'];?>
"                };                $.get("/yunbuy/getBuyid",D,function(data){                    location.href='/yunbuy/detail/'+data.buy_id;                },'json');            }else{                console.log('2');                $('#HOWQI').val('');            }        }        //加载后使用        function call_qishu_list(){            $('#qishuList .a_close').bind('click',function(){                $('#qishuList').stop().slideUp(200);            })            $("#HOWQI").keydown(function (e) {                if (e.which == 13) {                    fly_qishu();                }            });        }    </script><div class="g-main"><div class="g-main-l m-detail-show">    <div class="w-goods-picShow">        <?php if ($_smarty_tpl->tpl_vars['row']->value['type']==2){?><img class="zbzq" src="/style/images/daz.png" height="55" width="47"/><?php }?>        <?php if ($_smarty_tpl->tpl_vars['ext_info']->value['member']==-1){?>        <img class="sale_db" src="/style/images/member_db.png"/>        <?php }elseif($_smarty_tpl->tpl_vars['ext_info']->value['notjoin']==1){?>        <img class="sale_db" src="/style/images/nxdb.png"/>        <?php }elseif($_smarty_tpl->tpl_vars['ext_info']->value['buynum']>0||$_smarty_tpl->tpl_vars['ext_info']->value['usernum']>0){?>        <img class="sale_db" src="/style/images/sale_db.png" />        <?php }?>        <div class="w-goods-picShow-large">            <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['row']->value['pics']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['m']->index=-1;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['pics']['iteration']=0;
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
 $_smarty_tpl->tpl_vars['m']->index++;
 $_smarty_tpl->tpl_vars['m']->first = $_smarty_tpl->tpl_vars['m']->index === 0;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['pics']['first'] = $_smarty_tpl->tpl_vars['m']->first;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['pics']['iteration']++;
?>            <div style="<?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['pics']['iteration']==1){?>display: block;<?php }else{ ?>display: none;<?php }?> width: 380px;height: 380px;" class="v">                <img src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['zz'][0][0]->_callViewFunc(array('mod'=>'fileurl','source'=>$_smarty_tpl->tpl_vars['m']->value['imgurl_src'],'width'=>380,'height'=>380),$_smarty_tpl);?>
"<?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['pics']['first']){?> id="buy_img_<?php echo $_smarty_tpl->tpl_vars['row']->value['buy_id'];?>
"<?php }?> /><span></span>            </div>            <?php } ?>        </div>        <div class="w-goods-picShow-thumbnail">            <ul class="w-goods-picShow-thumbnail-list">                <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['row']->value['pics']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['m']->index=-1;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['pics']['iteration']=0;
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
 $_smarty_tpl->tpl_vars['m']->index++;
 $_smarty_tpl->tpl_vars['m']->first = $_smarty_tpl->tpl_vars['m']->index === 0;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['pics']['first'] = $_smarty_tpl->tpl_vars['m']->first;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['pics']['iteration']++;
?>                <?php if ($_smarty_tpl->tpl_vars['m']->value['imgurl_src']){?>                <li class="<?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['pics']['iteration']==1){?>selected<?php }?> v">                    <i class="ico ico-arrow ico-arrow-red ico-arrow-red-up"></i>                    <img src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['zz'][0][0]->_callViewFunc(array('mod'=>'fileurl','source'=>$_smarty_tpl->tpl_vars['m']->value['imgurl_src'],'width'=>64,'height'=>48,'type'=>1),$_smarty_tpl);?>
"><span></span>                </li>                <?php }?>                <?php } ?>            </ul>        </div>    </div>    <div class="w-shareTo">        <?php echo share();?>
    </div>    <?php if ($_smarty_tpl->tpl_vars['row']->value['wait_time']==0){?>    <div class="add-sqdz">        <h2>上期获得者</h2>        <dl>            <dt>                <a href="<?php echo url(('/minfo?id=').($_smarty_tpl->tpl_vars['prev_buy']->value['member_id']));?>
" target="_blank"><img src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['zz'][0][0]->_callViewFunc(array('mod'=>'photo','source'=>$_smarty_tpl->tpl_vars['prev_buy']->value['photo']),$_smarty_tpl);?>
" alt="" /></a>            </dt>            <?php if ($_smarty_tpl->tpl_vars['prev_buy']->value['member_id']){?>            <dd>                <p>恭喜<span style="font-size:12px;"><a href="<?php echo url(('/minfo?id=').($_smarty_tpl->tpl_vars['prev_buy']->value['member_id']));?>
" target="_blank"><?php echo nickname($_smarty_tpl->tpl_vars['prev_buy']->value['member_name'],$_smarty_tpl->tpl_vars['prev_buy']->value['nickname']);?>
</a> (<?php echo cityIp($_smarty_tpl->tpl_vars['prev_buy']->value['ip']);?>
)</span>获得了本商品</p>                <p>揭晓时间：<?php echo microtime_format($_smarty_tpl->tpl_vars['prev_buy']->value['end_time'],'Y-m-d H:i:s.x');?>
</p>                <p><?php echo $_smarty_tpl->tpl_vars['L']->value['unit_yun'];?>
时间：<?php echo microtime_format($_smarty_tpl->tpl_vars['prev_buy']->value['last_dbtime'],'Y-m-d H:i:s.x');?>
</p>                <p>幸运<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_yun'];?>
码：<strong class="add-color1"><?php echo $_smarty_tpl->tpl_vars['prev_buy']->value['luck_code'];?>
</strong></p>            </dd>            <?php }else{ ?>            <dd>                暂时没有<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_winning'];?>
者            </dd>            <?php }?>        </dl>    </div>    <?php }?></div><script>jQuery(".w-goods-picShow").slide( { titCell:".w-goods-picShow-thumbnail-list  li",mainCell:".w-goods-picShow-large",titOnClassName:"selected" } );</script><div class="g-main-m m-detail-main"><div class="m-detail-main-title">    <h3 title="<?php echo $_smarty_tpl->tpl_vars['row']->value['title'];?>
"><?php echo $_smarty_tpl->tpl_vars['row']->value['title'];?>
<span style="color:red;" title="<?php echo $_smarty_tpl->tpl_vars['row']->value['goods_subtit'];?>
"><?php echo $_smarty_tpl->tpl_vars['row']->value['goods_subtit'];?>
<?php if ($_smarty_tpl->tpl_vars['row']->value['start_time']>@constant('RUN_TIME')){?> <?php echo date('m-d H:i:s',$_smarty_tpl->tpl_vars['row']->value['start_time']);?>
开始<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_yun'];?>
<?php }?></span><?php if ($_smarty_tpl->tpl_vars['row']->value['price']>1){?> <span class="zq_ico" style="font-size: 16px;"><?php echo num2char($_smarty_tpl->tpl_vars['row']->value['price']);?>
元<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_area'];?>
</span><?php }?></h3>    <?php if ($_smarty_tpl->tpl_vars['ext_info']->value['buynum']>0||$_smarty_tpl->tpl_vars['ext_info']->value['usernum']>0||$_smarty_tpl->tpl_vars['ext_info']->value['notjoin']||$_smarty_tpl->tpl_vars['ext_info']->value['member']==-1){?>    <div style="padding:5px 0 0;">        <?php if ($_smarty_tpl->tpl_vars['ext_info']->value['usernum']>0){?>        <p><?php echo $_smarty_tpl->tpl_vars['L']->value['unit_yun'];?>
要求：本特惠商品需您最少推荐注册<?php echo $_smarty_tpl->tpl_vars['ext_info']->value['usernum'];?>
人<?php if ($_smarty_tpl->tpl_vars['ext_info']->value['isreal']){?><span class="color01">(需实名认证)</span><?php }?>【<a href="<?php echo url('/member/myivt');?>
" target="_blank">呼朋唤友来注册</a>】</p>        <?php }?>        <?php if ($_smarty_tpl->tpl_vars['ext_info']->value['buynum']>0){?>        <p>公平<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_yun'];?>
：本特惠商品此时间最多可参与<?php echo $_smarty_tpl->tpl_vars['ext_info']->value['buynum'];?>
人次</p>        <?php }?>        <?php if ($_smarty_tpl->tpl_vars['ext_info']->value['member']==-1){?>        <p>新手<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_yun'];?>
：7天内注册新会员才能参与此商品<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_yun'];?>
</p>        <?php }?>        <?php if ($_smarty_tpl->tpl_vars['ext_info']->value['notjoin']){?>        <p>逆袭<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_yun'];?>
：从未<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_yun'];?>
成功的用户可参与</p>        <?php }?>    </div>    <?php }?></div><?php if ($_smarty_tpl->tpl_vars['row']->value['wait_time']==0){?><div class="w-goods-xxl m-detail-main-wrap m-detail-main-ing">    <?php if ($_smarty_tpl->tpl_vars['row_buy']->value){?>    <div class="m-detail-buy">        <p class="m-detail-main-price">            <span style="color: black;font-size: 18px;background: url('/style/images/icon_two.png') no-repeat 0 2px;padding-left: 70px;">全价购买</span>            <span style="color: #999;font-size: 14px;">&nbsp;&nbsp;无需等待，直接购买获得该商品</span>        </p>        <p class="m-detail-main-price">            <span>促销价&nbsp;&nbsp;</span>            <b style="font-size: 18px;color: #db3652"><?php echo price_format($_smarty_tpl->tpl_vars['row_buy']->value['custom_price']);?>
</b>        </p>        <div class="m-detail-main-buyGoods">            <?php if ($_smarty_tpl->tpl_vars['row_buy']->value['need_num']>0){?>            <a class="w-button w-button-xl w-button-buy" href="javascript:void(0)" onclick="addToCart(<?php echo $_smarty_tpl->tpl_vars['row_buy']->value['buy_id'];?>
,'buy_buy')">直接购买</a>            <a class="w-button w-button-xl w-button-buy-cart" href="javascript:void(0)" onclick="addToCart('<?php echo $_smarty_tpl->tpl_vars['row_buy']->value['buy_id'];?>
','',this)"><i class="ico ico-miniCart"></i>加入清单</a>            <?php }else{ ?>            <a class="w-button w-button-xl w-button-disabled" href="javascript:void(0)">已抢光</a>            <span style="color: #db3652;font-size: 14px;">&nbsp;&nbsp;直接购买暂时货存不足，立即去<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_yun'];?>
</span>            <?php }?>        </div>    </div>    <?php }?>    <p class="m-detail-main-price">        <span style="color: black;font-size: 18px;<?php if ($_smarty_tpl->tpl_vars['row_buy']->value){?>background: url('/style/images/icon_two.png') no-repeat 0 -29px;padding-left: 70px;<?php }?>"><?php echo $_smarty_tpl->tpl_vars['L']->value['unit_yun_one'];?>
&nbsp;&nbsp;</span>        <span style="color: #999;font-size: 14px;">&nbsp;&nbsp;达到总需，取1人获得该商品</span>        <?php if ($_smarty_tpl->tpl_vars['row']->value['start_time']>@constant('RUN_TIME')){?>        <script src="<?php echo url('/style/lefttime.js');?>
"></script>        <span style="margin-left: 15px; color: red;"><i id="leftTime<?php echo $_smarty_tpl->tpl_vars['row']->value['buy_id'];?>
">请稍等, 正在载入中...</i>后开始</span>        <script type="text/javascript">            onload_leftTime('<?php echo $_smarty_tpl->tpl_vars['row']->value['buy_id'];?>
',"<?php echo $_smarty_tpl->tpl_vars['row']->value['start_time']-@constant('RUN_TIME');?>
","1");        </script>        <?php }?>    </p>    <div class="w-progressBar" title="<?php echo $_smarty_tpl->tpl_vars['row']->value['jindu'];?>
%">        <p class="w-progressBar-wrap">            <span class="w-progressBar-bar" style="width: <?php if ($_smarty_tpl->tpl_vars['row']->value['is_off']){?>0<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['row']->value['jindu'];?>
<?php }?>%;"></span>        </p>        <ul class="w-progressBar-txt f-clear">            <li class="w-progressBar-txt-l">                <p><b class="color02"><?php if ($_smarty_tpl->tpl_vars['row']->value['is_off']){?>0<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['row']->value['buy_num'];?>
<?php }?></b></p>                <p>已参与人次</p>            </li>            <li class="w-progressBar-txt-l" style="width:30%; text-align: center;">                <p><b><?php if ($_smarty_tpl->tpl_vars['row']->value['is_off']){?>0<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['row']->value['need_num'];?>
<?php }?></b></p>                <p>总需人次</p>            </li>            <li class="w-progressBar-txt-r">                <p><b class="color04"><?php if ($_smarty_tpl->tpl_vars['row']->value['is_off']){?>0<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['row']->value['end_num'];?>
<?php }?></b></p>                <p>剩余人次</p>            </li>        </ul>    </div>    <p class="m-detail-main-progress">        <b style="color: #2db06e"><?php if ($_smarty_tpl->tpl_vars['row']->value['is_off']){?>0<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['row']->value['buy_num'];?>
<?php }?></b>人次已参与，赶快去参加吧！剩余<b class="txt-red"><?php if ($_smarty_tpl->tpl_vars['row']->value['is_off']){?>0<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['row']->value['end_num'];?>
<?php }?></b>人次</p>    <div class="m-detail-main-count">        <span>参与人次：</span>        <div class="m-detail-main-count-number">            <div id="pro-view-2" class="w-number w-number-inline">                <input class="w-number-input" id="qty_<?php echo $_smarty_tpl->tpl_vars['row']->value['buy_id'];?>
"  data-max="<?php echo $_smarty_tpl->tpl_vars['row']->value['end_num'];?>
" style="color: black" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['max_mun'];?>
">                <a class="w-number-btn w-number-btn-plus" data-pro="plus" href="javascript:void(0);">+</a>                <a class="w-number-btn w-number-btn-minus" data-pro="minus" href="javascript:void(0);">-</a>            </div>        </div>        <span class="m-detail-main-buyHint" style="display: none;"><i class="ico ico-arrow ico-arrow-grayBubbleArr"></i><b>加大参与人次，<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_yun'];?>
在望！</b></span>        <?php if ($_smarty_tpl->tpl_vars['row']->value['end_num']>=10){?><label><a class="w-number-a" data-value="10">10</a></label><?php }?>        <?php if ($_smarty_tpl->tpl_vars['row']->value['end_num']>=50){?><label><a class="w-number-a" data-value="50">50</a></label><?php }?>        <?php if ($_smarty_tpl->tpl_vars['row']->value['end_num']>=100){?><label><a class="w-number-a" data-value="100">100</a></label><?php }?>        <?php if ($_smarty_tpl->tpl_vars['row']->value['end_num']>=200){?><label><a class="w-number-a" data-value="200">200</a></label><?php }?>        <label><a class="w-number-a" data-value="<?php echo $_smarty_tpl->tpl_vars['row']->value['end_num'];?>
">扫尾</a></label>    </div>    <div class="m-detail-main-buyGoods">        <?php if ($_smarty_tpl->tpl_vars['row']->value['is_off']){?>        <a class="w-button w-button-xl w-button-disabled" href="javascript:void(0)">商品已下架</a>        <span style="color: #db3652;font-size: 14px;">&nbsp;&nbsp;该商品参与金额，已全部退还至会员帐户</span>        <?php }elseif($_smarty_tpl->tpl_vars['row']->value['type']==1){?>        <a id="quickBuy" class="w-button w-button-xl w-button-main" href="javascript:void(0)" onclick="addToCart('<?php echo $_smarty_tpl->tpl_vars['row']->value['buy_id'];?>
','buy')" style="width: 105px"><?php echo $_smarty_tpl->tpl_vars['L']->value['unit_yun_button'];?>
</a>        <a id="addToCart" class="w-button w-button-xl" href="javascript:void(0)" onclick="addToCart('<?php echo $_smarty_tpl->tpl_vars['row']->value['buy_id'];?>
','',this)" style="width: 112px"><i class="ico ico-miniCart"></i>加入购物车</a>        <?php }else{ ?>        <a id="quickBuy"  style=" background-color:#3db667  !important"class="w-button w-button-xl w-button-main" href="javascript:void(0)"  onclick="addToCart('<?php echo $_smarty_tpl->tpl_vars['row']->value['buy_id'];?>
','free')" style="width: 125px">免费<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_yun'];?>
</a>        <a href="/content/index/78" target="_blank" class="color01">什么是<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_pay_points'];?>
？</a>        <?php }?>    </div></div><script type="text/javascript">    var need_num = <?php echo $_smarty_tpl->tpl_vars['row']->value['need_num'];?>
;    $(function(){        $(function(){            $('.w-number-a').bind('click',function(){                $('.w-number-a').removeClass('hover');                $(this).addClass('hover')                $('.w-number-input').val($(this).attr('data-value'));                getWinPoint($(this).attr('data-value'),need_num);            })        });        $(".w-number-btn-plus").click(function(){            var max = $(this).parent().children('input.w-number-input').attr('data-max');            var qty = $(this).parent().children('input.w-number-input').val()*1;            if(qty < max){                $(this).parent().children('input.w-number-input').val(qty+1);                getWinPoint(qty+1,need_num);            }        });        $(".w-number-btn-minus").click(function(){            var qty = $(this).parent().children('input.w-number-input').val()*1;            if(qty>1){                $(this).parent().children('input.w-number-input').val(qty-1);                getWinPoint(qty-1,need_num);            }        });        $(".w-number-input").blur(function(){            var max = $(this).attr('data-max')*1;            if($(this).val()>max){                $(this).val(max);            }            getWinPoint($(this).val(),need_num);        });    });    function getWinPoint($num,$need_num){        layer.tips('获得机率'+($num/$need_num*100).toFixed(3)+'%', $('.w-number-input'), { time:2 });    }</script><?php }elseif($_smarty_tpl->tpl_vars['row']->value['luck_code']=='0'){?><div class="m-detail-main-wrap m-detail-main-will">    <h3>揭晓倒计时</h3>    <a class="resultBtn m-detail-main-will-waitingHint" href="javascript:void(0)"><span style="opacity: 100; color: #fff;">计算公式见页面下方</span></a>    <div class="m-detail-main-will-countdown" id="divLotteryTimer">        <span class='jx_ing' id="jx_load">倒计时加载中...</span>        <ul class="Announced_FrameClockMar Announced_FrameCode" id="jx_clock" style="display: none;">            <li id="liMinute1" class="Code_0">0<b></b></li>            <li id="liMinute2" class="Code_0">0<b></b></li>            <li id="liMinute3" class="Code_0" style="display: none;">0<b></b></li>            <li class="Code_Point"><b></b></li>            <li id="liSecond1" class="Code_0">0<b></b></li>            <li id="liSecond2" class="Code_0">0<b></b></li>            <li class="Code_Point"><b></b></li>            <li id="liMilliSecond1" class="Code_0">0<b></b></li>            <li id="last" class="Code_0">0<b></b></li>        </ul>    </div>    <div class="m-detail-main-will-content">        <h6>幸运号码计算公式</h6>        <p class="formula">10000001+(最近100条<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_yun'];?>
时间求和<?php if ($_smarty_tpl->tpl_vars['site_config']->value['is_ssc']){?>+下期“老时时彩”<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_kaijiang'];?>
号码<?php }?>)%总需人次</p>        <p class="result"><b>= 幸运号码</b></p>        <?php if ($_smarty_tpl->tpl_vars['site_config']->value['is_ssc']){?><span class="waitingTxt">“老时时彩”早上10点开始第一轮<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_kaijiang'];?>
哦~！<a href="http://cp.360.cn/ssccq/" target="_blank">查看&gt;&gt;</a><br>如果24小时后还是没有<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_kaijiang'];?>
，默认时时彩结果为00000计算结果</span><?php }?>    </div></div><script type="text/javascript">    var lottery = 0;    var Secondms_jx = 60*1000;    var minutems_jx = 1000;    var wait_time = 0;    var buy_id = 0;    function show_date_time(diff,obj) {        if(diff <= 0) {            $("#liMinute1").attr("class","Code_0");            $("#liMinute2").attr("class","Code_0");            $("#liMinute3").attr("class","Code_0");            $("#liSecond1").attr("class","Code_0");            $("#liSecond2").attr("class","Code_0");            if(lottery==0){                <?php if ($_smarty_tpl->tpl_vars['site_config']->value['is_ssc']){?>                lottery = 1;                $.getJSON('/welcome/lottery/<?php echo $_smarty_tpl->tpl_vars['row']->value['qihao'];?>
' ,function(result) { window.location.reload(); } );                <?php }else{ ?>                rTimeout = window.clearTimeout(rTimeout);                $('#divLotteryTimer').html("<span class='jx_ing'><?php echo $_smarty_tpl->tpl_vars['L']->value['unit_kaijiang'];?>
计算中...</span>");                setTimeout(function(){                    lottery = 1;                    window.location.reload();                }, 5000);                <?php }?>            }            return false;        }        DifferSecond   = Math.floor(diff / Secondms_jx);        diff -= DifferSecond * Secondms_jx;        DifferMinute   = Math.floor(diff / minutems_jx);        diff -= DifferMinute * minutems_jx;        if(DifferSecond.toString().length < 2) DifferSecond = '0'+DifferSecond;        if(DifferMinute.toString().length < 2) DifferMinute = '0'+DifferMinute;        DifferSecond_1 = DifferSecond.toString().substr(0,1);        DifferSecond_2 = DifferSecond.toString().substr(1,1);        DifferSecond_3 = DifferSecond.toString().substr(2,1);        DifferMinute_1 = DifferMinute.toString().substr(0,1);        DifferMinute_2 = DifferMinute.toString().substr(1,10);        wait_time=wait_time-1000;        $("#liMinute1").attr("class","Code_"+DifferSecond_1);        $("#liMinute2").attr("class","Code_"+DifferSecond_2);        $("#liMinute3").attr("class","Code_"+DifferSecond_3);        $("#liSecond1").attr("class","Code_"+DifferMinute_1);        $("#liSecond2").attr("class","Code_"+DifferMinute_2);        if($("#jx_load").is(':visible')){            $("#jx_load").hide();            $('#jx_clock').show();        }        if(DifferSecond.toString().length >= 3){            $('#divLotteryTimer').addClass('timer_three');        }else{            $('#divLotteryTimer').removeClass('timer_three');        }        //this.obj.innerHTML=daysold+"天"+(hrsold<10?'0'+hrsold:hrsold)+"小时"+(minsold<10?'0'+minsold:minsold)+"分"+(seconds<10?'0'+seconds:seconds)+"秒."+ms;    }    $(function() {    	buy_id  = parseInt("<?php echo $_smarty_tpl->tpl_vars['row']->value['buy_id'];?>
");        window.setInterval(function(){ $.get('/yunbuy/getLeftTime/'+buy_id,'',function(data){        	wait_time = data;        	        	rTimeout = how_date_time(wait_time, null);    	}); },60*1000);        wait_time = parseInt("<?php echo $_smarty_tpl->tpl_vars['end_time']->value;?>
");        rTimeout = window.setInterval(function(){ show_date_time(wait_time, null); }, 1000);        //毫秒单独计时        var h = 100;        timeID_h_jx = window.setInterval(function(){            if(h<=0) h = 100;            h = parseInt(h)-1;            if(h.toString().length < 1) h = '00';            if(h.toString().length == 1) h = '0'+h;            if(h.toString().length > 2) h = '99';            var h_1 = h.toString().substr(0,1);            var h_2 = h.toString().substr(1,1);            $("#liMilliSecond1").attr("class","Code_"+h_1);            $("#last").attr("class","Code_"+h_2);        }, 10);    } );</script><?php }else{ ?><div class="jiexiao">    <div class="m-detail-main-end-luckyCode">        <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['luck_code']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>        <b class="num num-<?php echo $_smarty_tpl->tpl_vars['m']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['m']->value;?>
</b>        <?php } ?>    </div>    <dl class="zjxx">        <dt><img src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['zz'][0][0]->_callViewFunc(array('mod'=>'photo','source'=>$_smarty_tpl->tpl_vars['luck_member']->value['photo']),$_smarty_tpl);?>
" height="105" width="105"/></dt>        <dd>            恭喜<span style="font-size:12px;"><a href="<?php echo ('/minfo?id=').($_smarty_tpl->tpl_vars['luck_member']->value['mid']);?>
#dbCod"><i><?php echo nickname($_smarty_tpl->tpl_vars['luck_member']->value['username'],$_smarty_tpl->tpl_vars['luck_member']->value['nickname']);?>
</i></a>(<?php echo cityIp($_smarty_tpl->tpl_vars['luck_member']->value['ip']);?>
)</span>获得了本<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_price'];?>
<br/>            用户ID：<em><?php echo sprintf('1%06d',$_smarty_tpl->tpl_vars['luck_member']->value['mid']);?>
 (ID为用户唯一不变标识)</em><br/>            揭晓时间：<?php echo microtime_format($_smarty_tpl->tpl_vars['row']->value['end_time'],'Y-m-d H:i:s.x');?>
<br/>            <?php echo $_smarty_tpl->tpl_vars['L']->value['unit_yun'];?>
时间：<?php echo microtime_format($_smarty_tpl->tpl_vars['luck_member']->value['db_time'],'Y-m-d H:i:s.x');?>
<br/>            <div class="ckjg"><a class="ckjsjg" href="<?php echo url(('/yunbuy/detail/').($_smarty_tpl->tpl_vars['row']->value['buy_id']));?>
#introTab">查看计算结果</a>    <a class="kscy"  id="view_join" href="<?php echo url(('/yunbuy/detail/').($_smarty_tpl->tpl_vars['row']->value['buy_id']));?>
#recordTab"> 看看谁参加了</a></div>        </dd>    </dl></div><?php }?><?php if ($_smarty_tpl->tpl_vars['row']->value['luck_code']=='0'){?><?php if ($_smarty_tpl->tpl_vars['row']->value['wait_time']==''){?><div class="m-detail-main-state">    <ul class="f-clear">        <li><i class="ico ico-state ico-state-1"></i><a href="<?php echo url('/content/index/55');?>
" target="_blank">公平公正公开</a></li>        <li><i class="ico ico-state ico-state-2"></i><a href="<?php echo url('/content/index/75');?>
" target="_blank">正品保证</a></li>        <li><i class="ico ico-state ico-state-3"></i><a href="<?php echo url('/content/index/55');?>
" target="_blank">权益保障</a></li>    </ul></div><?php if (!$_smarty_tpl->tpl_vars['row_buy']->value){?><div class="fn-clear add-tab">    <ul class="add-tab-tt fn-clear">        <li class="dq">最新<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_yun'];?>
记录</li>        <li>我的<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_yun'];?>
记录</li>        <li class="f60">什么是1元<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_yun'];?>
？</li>    </ul>    <div class="add-tab-box">        <div class="add-nr01">            <?php if ($_smarty_tpl->tpl_vars['new_db']->value){?>            <ul class="add-ygjl fn-clear">                <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['new_db']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>                <li>                    <a href="<?php echo url(('/minfo?id=').($_smarty_tpl->tpl_vars['m']->value['mid']));?>
"><img src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['zz'][0][0]->_callViewFunc(array('mod'=>'photo','source'=>$_smarty_tpl->tpl_vars['m']->value['photo'],'size'=>30),$_smarty_tpl);?>
" alt="" /></a>                    <a href="<?php echo url(('/minfo?id=').($_smarty_tpl->tpl_vars['m']->value['mid']));?>
" class="color02"><?php echo nickname($_smarty_tpl->tpl_vars['m']->value['username'],$_smarty_tpl->tpl_vars['m']->value['nickname']);?>
</a> (<?php echo cityIp($_smarty_tpl->tpl_vars['m']->value['ip']);?>
) <?php echo formatTime($_smarty_tpl->tpl_vars['m']->value['add_time']);?>
 <?php echo $_smarty_tpl->tpl_vars['L']->value['unit_yun'];?>
了<strong class="color01"><?php echo $_smarty_tpl->tpl_vars['m']->value['qty'];?>
</strong>人次</li>                <?php } ?>            </ul>            <div class="add-tab-a"><a href="#recordTab" id="view_join">查看更多</a></div>            <?php }else{ ?>            <div class="empty">                <p class="status-empty">                    <i class="littleU littleU-cry"></i>&nbsp;&nbsp;暂时还没有参与记录</p>            </div>            <?php }?>        </div>        <div class="add-nr01" style="display: none">            <?php if (!$_SESSION['mid']){?>            <div class="add-dl">                <p>看不到？是不是没登录或是没注册？ 登录后看看</p>                <a href="<?php echo url('/member/login');?>
?back=<?php echo (('/yunbuy/detail/').($_smarty_tpl->tpl_vars['row']->value['buy_id']));?>
" class="add-dla">登录</a> <a href="<?php echo url('/member/regist');?>
?back=<?php echo (('/yunbuy/detail/').($_smarty_tpl->tpl_vars['row']->value['buy_id']));?>
" class="add-zca">注册</a>            </div>            <?php }else{ ?>            <div class="m-detail-main-winner-codes" style="margin: 0px; padding: 0px; background: #fff; border:0px;">                <?php if ($_smarty_tpl->tpl_vars['member_join']->value){?>                <table cellpadding="0" cellspacing="0">                    <tbody>                    <tr>                        <td colspan="2" style="padding: 15px 0;"><p style="margin-bottom:5px;color:#3c3c3c"><?php if ($_smarty_tpl->tpl_vars['row']->value['luck_code']){?><?php echo $_smarty_tpl->tpl_vars['L']->value['unit_winning'];?>
者<?php }else{ ?>您<?php }?>本期总共参与了<b class="txt-red"><?php echo count($_smarty_tpl->tpl_vars['member_join']->value);?>
</b>人次</p></td>                    </tr>                    <tr>                        <th style="line-height: 3em;"><?php if ($_smarty_tpl->tpl_vars['row']->value['luck_code']){?>TA<?php }else{ ?>您<?php }?>的号码:</th>                        <td class="m-detail-main-codes-list" style="line-height: 3em;">                            <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['member_join']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['member_join']['iteration']=0;
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['member_join']['iteration']++;
?>                            <?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['member_join']['iteration']<11){?>                            <?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['member_join']['iteration']<10){?><span><?php echo $_smarty_tpl->tpl_vars['m']->value;?>
</span><?php }else{ ?>……<?php }?>                            <?php }?>                            <?php } ?>                            <?php if (count($_smarty_tpl->tpl_vars['member_join']->value)>9){?>                            <p><a class="m-detail-main-codes-viewWinnerCodesBtn" href="javascript:void(0)"><?php if ($_smarty_tpl->tpl_vars['row']->value['luck_code']){?>TA<?php }else{ ?>您<?php }?>的所有号码&gt;&gt;</a></p>                            <?php }?>                        </td>                    </tr>                    </tbody>                </table>                <?php }else{ ?>                <div class="empty">                    <p class="status-empty">                        <i class="littleU littleU-cry"></i>&nbsp;&nbsp;您还没有参与本次<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_yun'];?>
哦</p>                </div>                <?php }?>            </div>            <?php }?>        </div>        <div class="add-nr01" style="display: none">            <div class="add-txt1">                <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['zz'][0][0]->_callViewFunc(array('mod'=>'block','mark'=>'aboutdb'),$_smarty_tpl);?>
                <a href="/content/index/71" target="_blank" class="add-color1">查看详情>></a>            </div>        </div>    </div></div><script type="text/javascript">    $(function(){        //选项卡鼠标滑过事件        $('.add-tab-tt  li').hover(function(){            TabSelect(".add-tab-tt  li", ".add-tab-box .add-nr01", "dq", $(this))        });        $('.add-tab-tt li').eq(0).trigger("click");        function TabSelect(tab,con,addClass,obj){            var $_self = obj;            var $_nav = $(tab);            $_nav.removeClass(addClass),                    $_self.addClass(addClass);            var $_index = $_nav.index($_self);            var $_con = $(con);            $_con.hide(),                    $_con.eq($_index).show();        }    });</script><?php }?><?php }else{ ?><?php if (!$_SESSION['mid']){?><div class="m-detail-main-codes">    <div class="deco"></div>    <p style="padding-top: 30px; text-align: center">        <a class="btn-login" href="<?php echo url('/member/login');?>
?back=<?php echo (('/yunbuy/detail/').($_smarty_tpl->tpl_vars['row']->value['buy_id']));?>
"><b style="color: #3399ff;">请登录</b></a>，查看你的<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_yun'];?>
号码！    </p></div><?php }else{ ?><div class="m-detail-main-winner-codes">    <?php if ($_smarty_tpl->tpl_vars['member_join']->value){?>    <table cellpadding="0" cellspacing="0">        <tbody>        <tr>            <td colspan="2"><p style="margin-bottom:5px;color:#3c3c3c"><?php if ($_smarty_tpl->tpl_vars['row']->value['luck_code']){?><?php echo $_smarty_tpl->tpl_vars['L']->value['unit_winning'];?>
者<?php }else{ ?>您<?php }?>本期总共参与了<b class="txt-red"><?php echo count($_smarty_tpl->tpl_vars['member_join']->value);?>
</b>人次</p></td>        </tr>        <tr>            <th><?php if ($_smarty_tpl->tpl_vars['row']->value['luck_code']){?>TA<?php }else{ ?>您<?php }?>的号码:</th>            <td class="m-detail-main-codes-list">                <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['member_join']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['member_join']['iteration']=0;
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['member_join']['iteration']++;
?>                <?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['member_join']['iteration']<11){?>                <?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['member_join']['iteration']<10){?><span><?php echo $_smarty_tpl->tpl_vars['m']->value;?>
</span><?php }else{ ?>……<?php }?>                <?php }?>                <?php } ?>                <?php if (count($_smarty_tpl->tpl_vars['member_join']->value)>9){?>                <p><a class="m-detail-main-codes-viewWinnerCodesBtn" href="javascript:void(0)"><?php if ($_smarty_tpl->tpl_vars['row']->value['luck_code']){?>TA<?php }else{ ?>您<?php }?>的所有号码&gt;&gt;</a></p>                <?php }?>            </td>        </tr>        </tbody>    </table>    <?php }else{ ?>    <p style="padding-top:30px; text-align:center; word-wrap:break-word;">您还没有参与本次<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_yun'];?>
哦</p>    <?php }?></div><?php }?><?php }?><?php }else{ ?><div class="m-detail-main-winner-codes">    <?php if ($_smarty_tpl->tpl_vars['member_join']->value){?>    <table cellpadding="0" cellspacing="0">        <tbody>        <tr>            <td colspan="2"><p style="margin-bottom:5px;color:#3c3c3c"><?php if ($_smarty_tpl->tpl_vars['row']->value['luck_code']){?><?php echo $_smarty_tpl->tpl_vars['L']->value['unit_winning'];?>
者<?php }else{ ?>您<?php }?>本期总共参与了<b class="txt-red"><?php echo count($_smarty_tpl->tpl_vars['member_join']->value);?>
</b>人次</p></td>        </tr>        <tr>            <th><?php if ($_smarty_tpl->tpl_vars['row']->value['luck_code']){?>TA<?php }else{ ?>您<?php }?>的号码:</th>            <td class="m-detail-main-codes-list">                <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['member_join']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['member_join']['iteration']=0;
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['member_join']['iteration']++;
?>                <?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['member_join']['iteration']<11){?>                <?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['member_join']['iteration']<10){?><span><?php echo $_smarty_tpl->tpl_vars['m']->value;?>
</span><?php }else{ ?>……<?php }?>                <?php }?>                <?php } ?>                <?php if (count($_smarty_tpl->tpl_vars['member_join']->value)>9){?>                <p><a class="m-detail-main-codes-viewWinnerCodesBtn" href="javascript:void(0)"><?php if ($_smarty_tpl->tpl_vars['row']->value['luck_code']){?>TA<?php }else{ ?>您<?php }?>的所有号码&gt;&gt;</a></p>                <?php }?>            </td>        </tr>        </tbody>    </table>    <?php }?></div><?php }?></div><?php if ($_smarty_tpl->tpl_vars['row']->value['luck_code']||$_smarty_tpl->tpl_vars['row']->value['wait_time']){?><link rel="stylesheet" href="<?php echo url('/style/css/addcss.css');?>
"><div class="clear"></div><div style="width:870px;">    <div class="m-detail-main-rule">        <ul class="txt">            <li>                <span class="title">计算公式</span>                <div class="formula">                    <div class="box red-box"><b class="txt-red"><?php if ($_smarty_tpl->tpl_vars['row']->value['luck_code']){?><?php echo $_smarty_tpl->tpl_vars['row']->value['luck_code'];?>
<?php }else{ ?>？<?php }?></b><br><b class="txt-red" style="font-size:12px">本期幸运号码</b></div><div class="operator">=(</div><div class="box gray-box"><b class="txt-red"><?php echo $_smarty_tpl->tpl_vars['row']->value['time_total'];?>
</b><br>100个时间求和                    <div class="more-box">                        <i class="ico ico-arrow ico-arrow-yellow"></i>                        <div class="yellow-box"><?php echo $_smarty_tpl->tpl_vars['L']->value['unit_price'];?>
的最后一个号码分配完毕，公示该分配时间点前本站全部<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_price'];?>
的<span class="txt-red">最后100个参与时间</span>，并求和。</div>                    </div>                </div>                    <?php if ($_smarty_tpl->tpl_vars['site_config']->value['is_ssc']){?>                    <div class="operator" title="相加">+</div>                    <div class="box gray-box">                        <b class="txt-red"><?php if ($_smarty_tpl->tpl_vars['row']->value['luck_code']){?><?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['row']->value['kjjg']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?><?php echo $_smarty_tpl->tpl_vars['m']->value;?>
<?php } ?><?php }else{ ?>？<?php }?></b><br>“老时时彩”<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_kaijiang'];?>
号码                        <div class="more-box">                            <i class="ico ico-arrow ico-arrow-yellow"></i>                            <div class="yellow-box f-breakword">                                <?php if ($_smarty_tpl->tpl_vars['row']->value['kjjg_str']==0){?>                                无法获取下一期<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_kaijiang'];?>
结果，默认<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_kaijiang'];?>
结果为00000                                <?php }else{ ?>                                取最近一期“老时时彩” (第<span class="txt-red"><?php echo $_smarty_tpl->tpl_vars['row']->value['qihao'];?>
</span>期) <?php echo $_smarty_tpl->tpl_vars['L']->value['unit_kaijiang'];?>
结果。 <a href="http://caipiao.163.com/award/ssc/<?php echo microtime_format($_smarty_tpl->tpl_vars['row']->value['wait_time'],'Ymd');?>
.html" target="_blank"><?php echo $_smarty_tpl->tpl_vars['L']->value['unit_kaijiang'];?>
查询</a>                                <?php }?>                            </div>                        </div>                    </div>                    <?php }?>                    <div class="operator" title="取余">)%</div><div class="box"><b class="txt-red"><?php echo $_smarty_tpl->tpl_vars['row']->value['need_num'];?>
</b><br>该<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_price'];?>
总需人次</div><div class="operator" title="相加">+</div><div class="box"><b class="txt-red">10000001</b><br>原始数</div>                </div>            </li>        </ul>    </div></div><script type="text/javascript">    $(function(){        $('.gray-box').hover(function(){            $(this).addClass("box-hover yellow-box");        },function(){            $(this).removeClass("box-hover yellow-box");        });    });</script><?php }?></div><div class="g-side">    <div class="m-detail-period">        <?php if ($_smarty_tpl->tpl_vars['new_buy']->value['buy_id']==$_smarty_tpl->tpl_vars['row']->value['buy_id']){?>        <?php if ($_smarty_tpl->tpl_vars['prev_buy']->value['member_id']){?>        <div class="m-detail-period-title"><h4>上一期获得者</h4></div>        <div class="m-detail-period-title-ft"></div>        <div class="m-detail-period-main" style="padding-bottom: 0px;">            <div class="m-detail-period-main-wrap">                <div class="m-detail-period-newest">                    <div style="padding: 10px;">                        <div style="text-align: center; padding-bottom: 5px;"><a href="<?php echo url(('/minfo?id=').($_smarty_tpl->tpl_vars['prev_buy']->value['member_id']));?>
" target="_blank"><img width="150" height="150" src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['zz'][0][0]->_callViewFunc(array('mod'=>'photo','source'=>$_smarty_tpl->tpl_vars['prev_buy']->value['photo']),$_smarty_tpl);?>
" alt="" /></a></div>                        <div>                            <p>恭喜<span style="font-size:12px;"><a style="color: #E54048;" href="<?php echo url(('/minfo?id=').($_smarty_tpl->tpl_vars['prev_buy']->value['member_id']));?>
" target="_blank"><?php echo nickname($_smarty_tpl->tpl_vars['prev_buy']->value['member_name'],$_smarty_tpl->tpl_vars['prev_buy']->value['nickname']);?>
</a>(<?php echo smarty_modifier_truncate(cityIp($_smarty_tpl->tpl_vars['prev_buy']->value['ip']),5,'');?>
)</span></p>                            <p>揭晓时间：<?php echo microtime_format($_smarty_tpl->tpl_vars['prev_buy']->value['wait_time'],'Y-m-d H:i:s.x');?>
</p>                            <p><?php echo $_smarty_tpl->tpl_vars['L']->value['unit_yun'];?>
时间：<?php echo microtime_format($_smarty_tpl->tpl_vars['prev_buy']->value['last_dbtime'],'Y-m-d H:i:s.x');?>
</p>                            <p>幸运<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_yun'];?>
码：<strong class="add-color1"><?php echo $_smarty_tpl->tpl_vars['prev_buy']->value['luck_code'];?>
</strong></p>                        </div>                    </div>                </div>            </div>        </div>        <?php }else{ ?>        <img src="/style/images/xye.png" width="255" />        <?php }?>        <?php }else{ ?>        <div class="m-detail-period-title"><h4><?php echo $_smarty_tpl->tpl_vars['L']->value['unit_kaijiang'];?>
信息</h4></div>        <div class="m-detail-period-title-ft"></div>        <div class="m-detail-period-main" style="padding-bottom: 0px;">            <div class="m-detail-period-main-wrap">                <div class="m-detail-period-newest">                    <h6>最新一期</h6>                    <div class="w-goods w-goods-ing m-detail-period-ing">                        <div class="w-goods-pic" style="text-align: center; height: 120px;"><a href="<?php echo url(('/yunbuy/detail/').($_smarty_tpl->tpl_vars['new_buy']->value['buy_id']));?>
" title="<?php echo $_smarty_tpl->tpl_vars['new_buy']->value['goods_name'];?>
" target="_blank"><img src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['zz'][0][0]->_callViewFunc(array('mod'=>'fileurl','source'=>$_smarty_tpl->tpl_vars['new_buy']->value['imgurl_src'],'width'=>129,'height'=>120,'type'=>0),$_smarty_tpl);?>
"></a></div>                        <div class="w-progressBar" title="<?php echo $_smarty_tpl->tpl_vars['new_buy']->value['jindu'];?>
%">                            <p class="w-progressBar-wrap"><span class="w-progressBar-bar" style="width:<?php echo $_smarty_tpl->tpl_vars['new_buy']->value['jindu'];?>
%;"></span></p>                            <ul class="w-progressBar-txt f-clear">                                <li class="w-progressBar-txt-l" style="width: 50%;"><p><b><?php echo $_smarty_tpl->tpl_vars['new_buy']->value['buy_num'];?>
</b> 已参与人次</p></li>                                <li class="w-progressBar-txt-r" style="width: 50%;"><p><b><?php echo $_smarty_tpl->tpl_vars['new_buy']->value['end_num'];?>
</b> 剩余人次</p></li>                            </ul>                        </div>                        <div class="w-goods-opr">                            <a class="w-button w-button-main w-button-l" href="<?php echo url(('/yunbuy/detail/').($_smarty_tpl->tpl_vars['new_buy']->value['buy_id']));?>
" style="width:96px;" target="_blank"><?php echo $_smarty_tpl->tpl_vars['L']->value['unit_yun_button'];?>
</a>                        </div>                    </div>                </div>            </div>        </div>        <?php }?>        <div class="m-detail-period-main" id="qishu"></div>    </div></div></div><a name="tab"></a><div class="g-wrap g-body-bd f-clear">    <div class="w-tabs w-tabs-main m-detail-mainTab">        <div class="w-tabs-tab">            <div id="introTab" class="w-tabs-tab-item w-tabs-tab-item-selected"><?php if ($_smarty_tpl->tpl_vars['row']->value['luck_code']||$_smarty_tpl->tpl_vars['row']->value['wait_time']){?>计算结果<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['L']->value['unit_price'];?>
详情<?php }?></div>            <div id="recordTab" class="w-tabs-tab-item">所有参与记录</div>            <div id="shareTab" class="w-tabs-tab-item">晒单</div>        </div>        <div class="w-tabs-panel">            <div id="resultPanel" class="w-tabs-panel-item" style="display: block;">                <?php if ($_smarty_tpl->tpl_vars['row']->value['luck_code']||$_smarty_tpl->tpl_vars['row']->value['wait_time']){?>                <div class="m-detail-mainTab-calcRule">                    <h4><i class="ico ico-text"></i><br>幸运号码<br>计算规则</h4>                    <div class="ruleWrap">                        <?php if (!$_smarty_tpl->tpl_vars['site_config']->value['is_ssc']){?>                        <ol class="ruleList">                            <li><span class="index">1</span>商品的最后一个号码分配完毕后，将公示该分配时间点前本站全部<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_price'];?>
的最后100个参与时间；</li>                            <li><span class="index">2</span>将这100个时间的数值进行求和（得出数值A）（每个时间按时、分、秒、毫秒的顺序组合，如20:15:25.362则为201525362）；</li>                            <li><span class="index">3</span>（数值A）除以该商品总需人次得到的余数<i class="ico ico-questionMark" data-func="remainder" style="margin-top: -3px;"></i>                                + 原始数&nbsp;10000001，得到最终幸运号码，拥有该幸运号码者，直接获得该商品。</li>                            <li class="txt-red" style="display: none;">注：最后一个号码分配时间距离“老时时彩”最近下一期<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_kaijiang'];?>
大于24小时或无法读取老时时彩下一期<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_kaijiang'];?>
结果时，默认“老时时彩”<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_kaijiang'];?>
结果为00000。<a href="http://chart.cp.360.cn/kaijiang/ssccq" target="_blank">了解更多“老时时彩”信息</a></li>                        </ol>                        <?php }else{ ?>                        <ol class="ruleList">                            <li><span class="index">1</span><?php echo $_smarty_tpl->tpl_vars['L']->value['unit_price'];?>
的最后一个号码分配完毕后，将公示该分配时间点前本站全部<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_price'];?>
的最后100个参与时间；</li>                            <li><span class="index">2</span>将这100个时间的数值进行求和（得出数值A）（每个时间按时、分、秒、毫秒的顺序组合，如20:15:25.362则为201525362）；</li>                            <li><span class="index">3</span>为保证公平公正公开，系统还会等待一小段时间，取最近下一期中国福利彩票“老时时彩”的<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_kaijiang'];?>
结果（一个五位数值B）；</li>                            <li><span class="index">4</span>（数值A+数值B）除以该<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_price'];?>
总需人次得到的余数<i class="ico ico-questionMark" data-func="remainder" style="margin-top: -3px;"></i>                                + 原始数&nbsp;10000001，得到最终幸运号码，拥有该幸运号码者，直接获得该<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_price'];?>
。</li>                            <li class="txt-red">注：最后一个号码分配时间距离“老时时彩”最近下一期<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_kaijiang'];?>
大于24小时或无法读取老时时彩下一期<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_kaijiang'];?>
结果时，默认“老时时彩”<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_kaijiang'];?>
结果为00000。<a href="http://chart.cp.360.cn/kaijiang/ssccq" target="_blank">了解更多“老时时彩”信息</a></li>                        </ol>                        <?php }?>                    </div>                </div>                <table cellpadding="0" cellspacing="0" class="m-detail-mainTab-resultList">                    <thead>                    <tr>                        <th class="time" colspan="2"><?php echo $_smarty_tpl->tpl_vars['L']->value['unit_yun'];?>
时间</th>                        <th>会员帐号</th>                        <th><?php echo $_smarty_tpl->tpl_vars['L']->value['unit_price'];?>
名称</th>                        <th width="70">参与人次</th>                    </tr>                    </thead>                    <tr class="startRow">                        <td colspan="5">截止该<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_price'];?>
最后<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_yun'];?>
时间【<?php echo microtime_format($_smarty_tpl->tpl_vars['row']->value['last_dbtime'],'Y-m-d H:i:s.x');?>
】最后100条全站参与记录                        </td>                    </tr>                    <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['site_join']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['site_join']['iteration']=0;
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['site_join']['iteration']++;
?>                    <?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['site_join']['iteration']<101){?>                    <tr class="calcRow">                        <td class="day"><?php echo microtime_format($_smarty_tpl->tpl_vars['m']->value['db_time'],'Y-m-d');?>
</td>                        <td class="time"><?php echo microtime_format($_smarty_tpl->tpl_vars['m']->value['db_time'],'H:i:s.x');?>
<i class="ico ico-arrow-transfer"></i><b class="txt-red"><?php echo $_smarty_tpl->tpl_vars['m']->value['timenum'];?>
</b></td>                        <td class="user"><div class="f-txtabb"><a href="<?php echo url(('/minfo?id=').($_smarty_tpl->tpl_vars['m']->value['mid']));?>
" target="_blank" title=""><?php echo nickname($_smarty_tpl->tpl_vars['m']->value['username'],$_smarty_tpl->tpl_vars['m']->value['nickname']);?>
</a></div></td>                        <td class="gname"><a href="<?php echo url(('/yunbuy/detail/').($_smarty_tpl->tpl_vars['m']->value['buy_id']));?>
" target="_blank">(第<?php echo $_smarty_tpl->tpl_vars['m']->value['qishu'];?>
期) <?php echo $_smarty_tpl->tpl_vars['m']->value['goods_name'];?>
</a></td><td><?php echo $_smarty_tpl->tpl_vars['m']->value['qty'];?>
人次</td>                    </tr>                    <?php }?>                    <?php } ?>                    <tr class="resultRow">                        <td colspan="5">                            <h4>计算结果<a name="calcResult"></a></h4>                            <?php if (!$_smarty_tpl->tpl_vars['site_config']->value['is_ssc']){?>                            <ol>                                <li><span class="index">1、</span>求和：<?php echo $_smarty_tpl->tpl_vars['row']->value['time_total'];?>
                                    (上面100条参与记录的时间取值相加)</li>                                <li style="display: none;"><span class="index">2、</span>第 <?php echo $_smarty_tpl->tpl_vars['row']->value['qihao'];?>
期 “老时时彩”<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_kaijiang'];?>
号码：<?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['row']->value['kjjg']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?><b class="ball"><?php echo $_smarty_tpl->tpl_vars['m']->value;?>
</b><?php } ?><a href="http://caipiao.163.com/award/ssc/<?php echo microtime_format($_smarty_tpl->tpl_vars['row']->value['wait_time'],'Ymd');?>
.html" style="margin-left: 10px; color: #FFE000; font-family: simsun;" target="_blank"><?php echo $_smarty_tpl->tpl_vars['L']->value['unit_kaijiang'];?>
查询&gt;&gt;</a></li>                                <li>                                    <span class="index">2、</span>求余：<?php echo $_smarty_tpl->tpl_vars['row']->value['time_total'];?>
                                    % <?php echo $_smarty_tpl->tpl_vars['row']->value['need_num'];?>
 (商品所需人次) = <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['row']->value['residue']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?><b class="square"><?php echo $_smarty_tpl->tpl_vars['m']->value;?>
</b><?php } ?>(余数)                                    <i class="ico ico-questionMark" data-func="remainder"></i>                                </li>                                <li><span class="index">3、</span>                                    <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['row']->value['residue']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?><b class="square"><?php echo $_smarty_tpl->tpl_vars['m']->value;?>
</b><?php } ?>                                    (余数) + 10000001 =  <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['luck_code']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?><b class="square"><?php echo $_smarty_tpl->tpl_vars['m']->value;?>
</b><?php } ?>)                                </li>                            </ol>                            <?php }else{ ?>                            <ol>                                <li><span class="index">1、</span>求和：<?php echo $_smarty_tpl->tpl_vars['row']->value['time_total'];?>
                                    (上面100条参与记录的时间取值相加)</li>                                <li><span class="index">2、</span>第 <?php echo $_smarty_tpl->tpl_vars['row']->value['qihao'];?>
期 “老时时彩”<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_kaijiang'];?>
号码：<?php if ($_smarty_tpl->tpl_vars['row']->value['kjjg']){?><?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['row']->value['kjjg']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?><b class="ball"><?php echo $_smarty_tpl->tpl_vars['m']->value;?>
</b><?php } ?><?php }else{ ?><b class="ball">？</b><?php }?><a href="http://caipiao.163.com/award/ssc/<?php echo microtime_format($_smarty_tpl->tpl_vars['row']->value['wait_time'],'Ymd');?>
.html" style="margin-left: 10px; color: #FFE000; font-family: simsun;" target="_blank"><?php echo $_smarty_tpl->tpl_vars['L']->value['unit_kaijiang'];?>
查询&gt;&gt;</a></li>                                <li>                                    <span class="index">3、</span>求余：(<?php echo $_smarty_tpl->tpl_vars['row']->value['time_total'];?>
 + <?php if ($_smarty_tpl->tpl_vars['row']->value['kjjg']){?><?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['row']->value['kjjg']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?><b class="ball"><?php echo $_smarty_tpl->tpl_vars['m']->value;?>
</b><?php } ?><?php }else{ ?><b class="ball">？</b><?php }?>)                                    % <?php echo $_smarty_tpl->tpl_vars['row']->value['need_num'];?>
 (<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_price'];?>
所需人次) = <?php if ($_smarty_tpl->tpl_vars['row']->value['residue']){?><?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['row']->value['residue']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?><b class="square"><?php echo $_smarty_tpl->tpl_vars['m']->value;?>
</b><?php } ?><?php }else{ ?><b class="square">？</b><?php }?>(余数)                                    <i class="ico ico-questionMark" data-func="remainder"></i>                                </li>                                <li><span class="index">4、</span>                                    <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['row']->value['residue']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?><b class="square"><?php echo $_smarty_tpl->tpl_vars['m']->value;?>
</b><?php } ?>                                    (余数) + 10000001 =  <?php if ($_smarty_tpl->tpl_vars['row']->value['luck_code']){?><?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['luck_code']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?><b class="square"><?php echo $_smarty_tpl->tpl_vars['m']->value;?>
</b><?php } ?><?php }else{ ?><b class="square">？</b><?php }?>)                                </li>                            </ol>                            <?php }?>                            <span class="resultCode">幸运号码：<?php if ($_smarty_tpl->tpl_vars['row']->value['luck_code']){?><?php echo $_smarty_tpl->tpl_vars['row']->value['luck_code'];?>
<?php }else{ ?>？<?php }?></span>                        </td>                    </tr>                    <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['site_join']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['site_join']['iteration']=0;
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['site_join']['iteration']++;
?>                    <?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['site_join']['iteration']>100){?>                    <tr class="calcRow">                        <td class="day"><?php echo microtime_format($_smarty_tpl->tpl_vars['m']->value['db_time'],'Y-m-d');?>
</td>                        <td class="time"><?php echo microtime_format($_smarty_tpl->tpl_vars['m']->value['db_time'],'H:i:s.x');?>
<i class="ico ico-arrow-transfer"></i><b class="txt-red"><?php echo $_smarty_tpl->tpl_vars['m']->value['timenum'];?>
</b></td>                        <td class="user"><div class="f-txtabb"><a href="<?php echo url(('/minfo?id=').($_smarty_tpl->tpl_vars['m']->value['mid']));?>
" target="_blank" title=""><?php echo nickname($_smarty_tpl->tpl_vars['m']->value['username'],$_smarty_tpl->tpl_vars['m']->value['nickname']);?>
</a></div></td>                        <td class="gname"><a href="<?php echo url(('/yunbuy/detail/').($_smarty_tpl->tpl_vars['m']->value['buy_id']));?>
" target="_blank">(第<?php echo $_smarty_tpl->tpl_vars['m']->value['qishu'];?>
期) <?php echo $_smarty_tpl->tpl_vars['m']->value['goods_name'];?>
</a></td><td><?php echo $_smarty_tpl->tpl_vars['m']->value['qty'];?>
人次</td>                    </tr>                    <?php }?>                    <?php } ?>                </table>                <?php }else{ ?>                <div style="text-align: center">                    <?php echo picurl(stripcslashes($_smarty_tpl->tpl_vars['row']->value['goods_body']));?>
                </div>                <?php if ($_smarty_tpl->tpl_vars['row']->value['goods_price']>=5000){?><p class="special" style="display: none">重要说明：<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_price'];?>
获得者拥有 <?php echo $_smarty_tpl->tpl_vars['row']->value['title'];?>
  10年免费使用权</p><?php }?>                <?php }?>            </div>            <div id="recordPanel" class="w-tabs-panel-item m-detail-mainTab-record" style="display: none;"></div>            <div id="sharePanel" class="w-tabs-panel-item m-detail-mainTab-share" style="display: none;"></div>        </div>    </div></div></div></div><script>jQuery(".m-detail-mainTab").slide( { titCell:".w-tabs-tab div",mainCell:".w-tabs-panel",titOnClassName:"w-tabs-tab-item-selected" } );</script><script type="text/javascript">    $(function(){        $('#periodSelect').change(function(){            location.href=$(this).val();        });        $("#qishu").load('/yunbuy/ajax_qishu?id=<?php echo $_smarty_tpl->tpl_vars['row']->value['buy_id'];?>
');        $("#recordPanel").load('/yunbuy/ajax_join?id=<?php echo $_smarty_tpl->tpl_vars['row']->value['buy_id'];?>
');        $("#sharePanel").load('/yunbuy/ajax_share?id=<?php echo $_smarty_tpl->tpl_vars['row']->value['buy_id'];?>
');        $(".period_Open").click(function(){            if($('.yhp-wq').css('height')=='32px'){                $('.yhp-wq').css('height','auto');                $(this).children('a').html("<< 收起");            }else{                $('.yhp-wq').css('height','32px');                $(this).children('a').html("展开>>");            }        });        $("#view_join").click(function(){            $(".w-tabs-tab-item").removeClass("w-tabs-tab-item-selected");            $("#recordTab").addClass("w-tabs-tab-item-selected");            $(".w-tabs-panel-item").hide();            $("#recordPanel").show();        });    });</script><?php if (count($_smarty_tpl->tpl_vars['member_join']->value)>9){?><div id="pro-view-15" class="w-mask" style="display: none;"><iframe style="position:absolute;top:0;left:0;z-index:-1;filter:Alpha(Opacity=0);width:100%;height:100%" scrolling="no" frameborder="0"></iframe></div><div id="pro-view-8" class="w-msgbox m-detail-codesDetail" style="z-index: 99999; display: none;">    <a data-pro="close" href="javascript:void(0);" class="w-msgbox-close">×</a>    <div class="w-msgbox-hd" data-pro="header"></div>    <div class="w-msgbox-bd" data-pro="entry">        <div class="m-detail-codesDetail-bd"><h3><?php if ($_smarty_tpl->tpl_vars['row']->value['luck_code']){?><?php echo $_smarty_tpl->tpl_vars['L']->value['unit_price'];?>
获得者<?php }else{ ?>您<?php }?>本期总共参与了<span class="txt-red"><?php echo count($_smarty_tpl->tpl_vars['member_join']->value);?>
</span>人次</h3>            <div class="m-detail-codesDetail-wrap">                <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['join_arr']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>                <dl class="m-detail-codesDetail-list f-clear">                    <dt><?php echo microtime_format($_smarty_tpl->tpl_vars['m']->value['db_time'],'Y-m-d H:i:s.x');?>
</dt>                    <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['m']->value['code']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>                    <dd <?php if ($_smarty_tpl->tpl_vars['v']->value==$_smarty_tpl->tpl_vars['row']->value['luck_code']){?>class="txt-red selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['v']->value;?>
</dd>                    <?php } ?>                </dl>                <?php } ?>            </div>        </div>    </div></div><script type="text/javascript">    $(function(){        $('.w-msgbox-close').click(function(){            $('#pro-view-8,#pro-view-15').hide();        });        $('.m-detail-main-codes-viewWinnerCodesBtn').click(function(){            var wnd = $(window), doc = $(document);            var left = doc.scrollLeft();            var top = doc.scrollTop();            left += (wnd.width() - $(".w-msgbox").width())/2;            top = (wnd.height() - $(".w-msgbox").height())/2;            $('.w-msgbox').css("top",top);            $('.w-msgbox').css("left",left);            $('#pro-view-8,#pro-view-15').show();        })    });</script><?php }?><?php echo $_smarty_tpl->getSubTemplate ("footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php }} ?>