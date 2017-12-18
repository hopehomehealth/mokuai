<?php /* Smarty version Smarty-3.1.13, created on 2017-01-11 11:12:53
         compiled from "/data/01/html/1yyg225/webapps/www/views/cn/mobile/yunbuy/detail.html" */ ?>
<?php /*%%SmartyHeaderCode:550510435584cbdaf2a8205-38592847%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7e612ea82878449801184cbabd2d8a3750fc0367' => 
    array (
      0 => '/data/01/html/1yyg225/webapps/www/views/cn/mobile/yunbuy/detail.html',
      1 => 1484103638,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '550510435584cbdaf2a8205-38592847',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_584cbdaf4a5d38_01585820',
  'variables' => 
  array (
    'row' => 0,
    'luck_member' => 0,
    'member_join' => 0,
    'L' => 0,
    'm' => 0,
    'k' => 0,
    'row_buy' => 0,
    'join_arr' => 0,
    'v' => 0,
    'new_buy' => 0,
    'prev_buy' => 0,
    'site_config' => 0,
    'end_time' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_584cbdaf4a5d38_01585820')) {function content_584cbdaf4a5d38_01585820($_smarty_tpl) {?><?php if (isset($_smarty_tpl->tpl_vars['header'])) {$_smarty_tpl->tpl_vars['header'] = clone $_smarty_tpl->tpl_vars['header'];
$_smarty_tpl->tpl_vars['header']->value = 'header2'; $_smarty_tpl->tpl_vars['header']->nocache = null; $_smarty_tpl->tpl_vars['header']->scope = 0;
} else $_smarty_tpl->tpl_vars['header'] = new Smarty_variable('header2', null, 0);?>
<?php echo $_smarty_tpl->getSubTemplate ("top.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<link rel="stylesheet" href="/style/mobile/css/goods.css">
<div id="content" class="container detail">
    <?php if ($_smarty_tpl->tpl_vars['row']->value['wait_time']==0){?>
    <?php }elseif($_smarty_tpl->tpl_vars['row']->value['luck_code']){?>
    <?php }else{ ?>
    <div style="clear:both;height:1px;width:100%;"></div>
    <div id="divLotteryTime" class="pProcess clearfix"<?php if ($_smarty_tpl->tpl_vars['row']->value['luck_code']||$_smarty_tpl->tpl_vars['row']->value['wait_time']){?> style="margin-bottom:0;"<?php }?>>
        <span class='jx_ing' id="jx_load">倒计时加载中...</span>
        <div class="pCountdown" id="jx_clock" style="display: none;">
            <div class="g-snav">
                <div class="g-s g-s-1"><div class="g-snav-lst">揭晓<br>倒计时<s></s></div></div>
                <div class="g-s"><div class="g-snav-lst"><b id="liMinute">00</b><em>分</em></div></div>
                <div class="g-s"><div class="g-snav-lst"><b id="liSecond">00</b><em>秒</em></div></div>
                <div class="g-s"><div class="g-snav-lst"><b id="liMilliSecond">00</b><em>毫秒</em></div></div>
            </div>
        </div>
    </div>
    <?php }?>

    <?php if ($_smarty_tpl->tpl_vars['row']->value['luck_code']||$_smarty_tpl->tpl_vars['row']->value['wait_time']){?>
    <link rel="stylesheet" href="/style/mobile/css/goods.css">
    <div style="clear:both;height:1px;width:100%;"></div>
    <div class="pProcess">
        <div class="pResults">
            <div class="pResultsL" onclick="location.href='<?php echo ('/minfo?id=').($_smarty_tpl->tpl_vars['luck_member']->value['mid']);?>
#dbCod'">
                <a>
                    <img src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['zz'][0][0]->_callViewFunc(array('mod'=>'photo','source'=>$_smarty_tpl->tpl_vars['luck_member']->value['photo']),$_smarty_tpl);?>
" />
                    <span><?php echo nickname($_smarty_tpl->tpl_vars['luck_member']->value['username'],$_smarty_tpl->tpl_vars['luck_member']->value['nickname']);?>
</span>
                </a>
                <s></s>
            </div>
            <div class="pResultsR">
                <div class="g-snav">
                    <div class="g-snav-lst g1">参与<br><dd><b class="orange"><?php echo count($_smarty_tpl->tpl_vars['member_join']->value);?>
</b><br>人次</dd></div>
                    <div class="g-snav-lst">揭晓时间<br><dd class="gray9"><span><?php if ($_smarty_tpl->tpl_vars['row']->value['end_time']){?><?php echo microtime_format($_smarty_tpl->tpl_vars['row']->value['end_time'],'Y-m-d H:i:s.x','<br>');?>
<?php }else{ ?>？<?php }?></span></dd></div>
                    <div class="g-snav-lst"><?php echo $_smarty_tpl->tpl_vars['L']->value['unit_yun'];?>
时间<br><dd class="gray9"><span><?php if ($_smarty_tpl->tpl_vars['luck_member']->value['db_time']){?><?php echo microtime_format($_smarty_tpl->tpl_vars['luck_member']->value['db_time'],'Y-m-d H:i:s.x','<br>');?>
<?php }else{ ?>？<?php }?></span></dd></div>
                </div>
            </div>
            <p><a href="<?php echo url((('/yunbuy/detail/').($_smarty_tpl->tpl_vars['row']->value['buy_id'])).('/luck'));?>
" class="fr">查看计算结果</a>幸运云购码：<b class="orange"><?php if ($_smarty_tpl->tpl_vars['row']->value['luck_code']){?><?php echo $_smarty_tpl->tpl_vars['row']->value['luck_code'];?>
<?php }else{ ?>？<?php }?></b></p>
        </div>
    </div>
    <?php }?>

    <div class="slider" id="single-item" style="position: relative">
        <div class="bd">
            <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['row']->value['pics']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['m']->key;
?>
            <?php if ($_smarty_tpl->tpl_vars['m']->value['imgurl_src']){?>
            <div><img src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['zz'][0][0]->_callViewFunc(array('mod'=>'fileurl','source'=>$_smarty_tpl->tpl_vars['m']->value['imgurl_src'],'width'=>410,'height'=>380),$_smarty_tpl);?>
" <?php if ($_smarty_tpl->tpl_vars['k']->value==0){?>id="buy_img_<?php echo $_smarty_tpl->tpl_vars['row']->value['buy_id'];?>
"<?php }?> /></div>
            <?php }?>
            <?php } ?>
        </div>
        <ul class="slick-dots">
            <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['row']->value['pics']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['m']->key;
?>
            <?php if ($_smarty_tpl->tpl_vars['m']->value['imgurl_src']){?>
            <li><button type="button"></button></li>
            <?php }?>
            <?php } ?>
        </ul>
    </div>
    <p class="title"><?php echo $_smarty_tpl->tpl_vars['row']->value['title'];?>
<span style="color:red;" title="<?php echo $_smarty_tpl->tpl_vars['row']->value['goods_subtit'];?>
"><?php echo $_smarty_tpl->tpl_vars['row']->value['goods_subtit'];?>
<?php if ($_smarty_tpl->tpl_vars['row']->value['start_time']>@constant('RUN_TIME')){?> <?php echo date('m-d H:i:s',$_smarty_tpl->tpl_vars['row']->value['start_time']);?>
开始<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_yun'];?>
<?php }?></span><?php if ($_smarty_tpl->tpl_vars['row']->value['price']>1){?><span class="zq_ico" style="margin-left: 10px;"><?php echo num2char($_smarty_tpl->tpl_vars['row']->value['price']);?>
元<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_area'];?>
</span><?php }?></p>

    <?php if ($_smarty_tpl->tpl_vars['row_buy']->value){?>
    <div class="info info_1" style="border-bottom: 0;padding-bottom: 15px;">
        <p class="title">全价购买 <span>&nbsp;&nbsp;无需等待，直接获得商品！</span></p>
        <p class="price"><b class="color01"><?php echo price_format($_smarty_tpl->tpl_vars['row_buy']->value['custom_price']);?>
</b></p>
        <div class="bottom button-box ui-clr">
            <?php if ($_smarty_tpl->tpl_vars['row_buy']->value['need_num']>0){?>
            <span class="btn-db btn-db-buy"><a href="javascript:void(0)" onclick="addToCart('<?php echo $_smarty_tpl->tpl_vars['row_buy']->value['buy_id'];?>
','buy_buy')">直接购买</a></span>
            <?php }else{ ?>
            <span class="btn-db btn-db-disable"><a href="javascript:void(0)">已抢光</a></span>
            <em style="color: #db3652;line-height: 37px">&nbsp;&nbsp;库存不足，立即<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_yun'];?>
</em>
            <?php }?>
        </div>
    </div>
    <?php }?>

    <div class="info <?php if ($_smarty_tpl->tpl_vars['row_buy']->value){?>info_2<?php }?>">
        <?php if ($_smarty_tpl->tpl_vars['row']->value['type']!=2){?>
        <p class="title"><?php echo $_smarty_tpl->tpl_vars['L']->value['unit_yun_one'];?>
 <span>&nbsp;&nbsp;只需要<?php echo intval($_smarty_tpl->tpl_vars['row']->value['price']);?>
元就有机会获得商品！</span></p>
        <?php }?>
        <p class="price">
            <?php if ($_smarty_tpl->tpl_vars['row']->value['end_num']>0){?>
            <span style="float:right">总需<?php if ($_smarty_tpl->tpl_vars['row']->value['is_off']){?>0<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['row']->value['need_num'];?>
<?php }?>人次</span>
            <?php }?>
            <?php if ($_smarty_tpl->tpl_vars['row']->value['type']==2){?>
            <p class="title"><?php echo $_smarty_tpl->tpl_vars['L']->value['unit_yun_one'];?>
 <span>&nbsp;&nbsp;只需要<?php echo intval($_smarty_tpl->tpl_vars['row']->value['price']);?>
元就有机会获得商品！</span></p>
            <?php }else{ ?>
            总需：<b class="color01"><?php if ($_smarty_tpl->tpl_vars['row']->value['is_off']){?>0<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['row']->value['need_num'];?>
<?php }?></b>人次
            <?php }?>
        </p>
        <?php if ($_smarty_tpl->tpl_vars['row']->value['end_num']>0){?>
        <div class="progressBar">
            <p class="wrap-bar">
                <span class="bar" style="width:<?php if ($_smarty_tpl->tpl_vars['row']->value['is_off']){?>0<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['row']->value['jindu'];?>
<?php }?>%"></span>
            </p>
            <div class="txt ui-clr">
                <span class="ui-left"><?php if ($_smarty_tpl->tpl_vars['row']->value['is_off']){?>0<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['row']->value['buy_num'];?>
<?php }?>人已参与</span>
                <span class="ui-right">剩余<?php if ($_smarty_tpl->tpl_vars['row']->value['is_off']){?>0<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['row']->value['end_num'];?>
<?php }?>人次</span>
            </div>
            <div class="bottom">
                参与人次：
                <div class="number" style="margin-right: 50px;">
                    <input class="num-input" type="text" id="qty_<?php echo $_smarty_tpl->tpl_vars['row']->value['buy_id'];?>
" data-max="<?php echo $_smarty_tpl->tpl_vars['row']->value['end_num'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['max_mun'];?>
" />
                    <a class="num-btn btn-plus" id="qty_plus" href="javascript:void(0);">+</a>
                    <a class="num-btn btn-minus" id="qty_minus" href="javascript:void(0);">-</a>
                    <a class="num-btn btn-last" href="javascript:void(0);" onclick="buyNum('<?php echo $_smarty_tpl->tpl_vars['row']->value['end_num'];?>
')">包尾</a>
                </div>
                <span style="color: #EB3D60">获得机率 <font id="w-number-point">100</font>%</span>
                <script type="text/javascript">
                    var need_num = <?php echo $_smarty_tpl->tpl_vars['row']->value['need_num'];?>
;

                    function buyNum(num){
                        $('.num-input').val(num);
                    }
                    function add(){
                        var div=$(".num-input");
                        var num=div.val();
                        num=parseInt(num);
                        num+=1;
                        if(num>div.attr('data-max')) return false;
                        div.val(num);
                        getWinPoint(num,need_num);
                    }
                    function reduce(){
                        var div=$(".num-input");
                        var num=div.val();
                        num=parseInt(num);
                        num-=1;
                        if(num<1) return false;
                        div.val(num);
                        getWinPoint(num,need_num);
                    }
                    function getWinPoint($num,$need_num){
                        $('#w-number-point').html(($num/$need_num*100).toFixed(3));
                    };
                    window.onload=function(e){
                        //鼠标按钮时刻，抬起时刻
                        var firstTime,lastTime;
                        //定义计时器(判断2s后)
                        var time1,time2;
                        //周期性计时器;
                        var flag=false;
                        document.getElementById("qty_plus").onmousedown=function(e){
                            firstTime=new Date().getTime();
                            var time1=setTimeout(function(){
                                flag=true;
                                clearTimeout(time1);
                            },100);
                            time2=setInterval(function(){
                                if(flag==true){
                                    add();
                                }
                            },100);
                        }
                        document.getElementById("qty_minus").onmousedown=function(e){
                            firstTime=new Date().getTime();
                            var time1=setTimeout(function(){
                                flag=true;
                                clearTimeout(time1);
                            },100);
                            time2=setInterval(function(){
                                if(flag==true){
                                    reduce();
                                }
                            },100);
                        }
                        document.onmouseup=function(e){
                            lastTime=new Date().getTime();
                            var someTime=lastTime-firstTime;
                            someTime=someTime/1000;
                            if(someTime<2){
                                if(e.target.id=="qty_plus"){
                                    add();flag=false;clearInterval(time2);
                                }else if(e.target.id=="qty_minus"){
                                    reduce();flag=false;clearInterval(time2);
                                }
                            }else{
                                flag=false;
                                clearTimeout(time2);
                            }
                        }
                        $(".num-input").blur(function(){
                            var max = $(this).attr('data-max')*1;
                            if($(this).val()>max){
                                $(this).val(max);
                            }
                            getWinPoint($(this).val(),need_num);
                        });
                        getWinPoint($(".num-input").val(),need_num);
                    }
                </script>
            </div>
            <div class="bottom button-box ui-clr">
                <?php if ($_smarty_tpl->tpl_vars['row']->value['is_off']){?>
                <span class="btn-db btn-db-disable"><a href="javascript:void(0)">商品已下架</a></span>
                <em style="color: #db3652;line-height: 37px">&nbsp;&nbsp;参与金额，已退还！</em>
                <?php }elseif($_smarty_tpl->tpl_vars['row']->value['type']==1){?>
                <span class="btn-db"><a href="javascript:void(0)" onclick="addToCart('<?php echo $_smarty_tpl->tpl_vars['row']->value['buy_id'];?>
','buy')"><?php echo $_smarty_tpl->tpl_vars['L']->value['unit_yun_button'];?>
</a></span>
                <span class="btn-db btn-cart"><a href="javascript:void(0)" onclick="addToCart('<?php echo $_smarty_tpl->tpl_vars['row']->value['buy_id'];?>
','',this)">加入购物车</a></span>
                <?php }else{ ?>
                <span class="btn-db btn-db-free"><a href="javascript:void(0)" onclick="addToCart('<?php echo $_smarty_tpl->tpl_vars['row']->value['buy_id'];?>
','free')">免费<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_yun'];?>
</a></span>
                <?php }?>
            </div>
        </div>
        <?php }?>
    </div>

    <?php if ($_smarty_tpl->tpl_vars['row']->value['end_num']>0){?>
    <div class="detail-userCodes">
        <?php if (!$_SESSION['mid']){?>
        <p>
            看不到？是不是没登录或是没注册？
            <a href="<?php echo url('/member/login');?>
?back=<?php echo (('/yunbuy/detail/').($_smarty_tpl->tpl_vars['row']->value['buy_id']));?>
" class="color02">登录</a>
            <a href="<?php echo url('/member/regist');?>
?back=<?php echo (('/yunbuy/detail/').($_smarty_tpl->tpl_vars['row']->value['buy_id']));?>
" class="color02">注册</a>
        </p>
        <?php }elseif($_smarty_tpl->tpl_vars['member_join']->value){?>
        <p><?php if ($_smarty_tpl->tpl_vars['row']->value['luck_code']){?><?php echo $_smarty_tpl->tpl_vars['L']->value['unit_winning'];?>
者<?php }else{ ?>您<?php }?>本期总共参与了<b class="color01"><?php echo count($_smarty_tpl->tpl_vars['member_join']->value);?>
</b>人次</p>
        <p class="codes">
            <?php if ($_smarty_tpl->tpl_vars['row']->value['luck_code']){?>TA<?php }else{ ?>您<?php }?>的号码:
            <span class="m-detail-code">
            <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['member_join']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['member_join']['iteration']=0;
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['member_join']['iteration']++;
?>
            <?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['member_join']['iteration']<9){?>
            <?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['member_join']['iteration']<8){?><b><?php echo $_smarty_tpl->tpl_vars['m']->value;?>
</b><?php }else{ ?>……<?php }?>
            <?php }?>
            <?php } ?>
            </span>
            <?php if (count($_smarty_tpl->tpl_vars['member_join']->value)>8){?>
            <a class="m-detail-codes-btn color02" href="javascript:void(0)">展开所有&gt;&gt;</a>

            <?php if (count($_smarty_tpl->tpl_vars['member_join']->value)>8){?>
            <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['join_arr']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>
            <span class="m-detail-codes" style="display:none;">
                <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['m']->value['code']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>
                <b <?php if ($_smarty_tpl->tpl_vars['v']->value==$_smarty_tpl->tpl_vars['row']->value['luck_code']){?>class="color01"<?php }?>><?php echo $_smarty_tpl->tpl_vars['v']->value;?>
</b>
                <?php } ?>
            </span>
            <a class="m-detail-codes-btn-hide color02" style="display: none;" href="javascript:void(0)">收起号码&gt;&gt;</a>
            <?php } ?>

            <?php }?>
            <?php }?>
        </p>
        <?php }else{ ?>
        <p class="detail-userCodes-blank">您还没有参与本次<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_yun'];?>
哦！</p>
        <?php }?>
    </div>
    <?php }elseif($_smarty_tpl->tpl_vars['row']->value['luck_code']){?>
    <div class="detail-userCodes" style="padding:10px">
        <div class="pClosed">本<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_yun'];?>
已揭晓</div>
        <?php if ($_smarty_tpl->tpl_vars['new_buy']->value['buy_id']>$_smarty_tpl->tpl_vars['row']->value['buy_id']){?>
        <div class="pOngoing">
            <em>第 <?php echo $_smarty_tpl->tpl_vars['new_buy']->value['qishu'];?>
 期 进行中…</em>
            <a class="fr" href="<?php echo url(('/yunbuy/detail/').($_smarty_tpl->tpl_vars['new_buy']->value['buy_id']));?>
">查看详情</a>
        </div>
        <?php }?>
    </div>
    <?php }?>

    <ul class="yunbuy_other">
        <a href="<?php echo url((('/yunbuy/detail/').($_smarty_tpl->tpl_vars['row']->value['buy_id'])).('/join'));?>
"><b></b>所有<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_yun'];?>
记录</a>
        <a href="<?php echo url((('/yunbuy/detail/').($_smarty_tpl->tpl_vars['row']->value['buy_id'])).('/info'));?>
"><b></b>商品图文详情<label>（建议WIFI下使用）</label></a>
        <a href="<?php echo url((('/yunbuy/detail/').($_smarty_tpl->tpl_vars['row']->value['buy_id'])).('/share'));?>
"><b></b>幸运者晒单</a>
        <?php if ($_smarty_tpl->tpl_vars['row']->value['qishu']>1){?>
        <a href="<?php echo url((('/yunbuy/detail/').($_smarty_tpl->tpl_vars['row']->value['buy_id'])).('/win'));?>
"><b></b>往期揭晓</a>
        <?php }?>
    </ul>

    <?php if ($_smarty_tpl->tpl_vars['prev_buy']->value['member_id']){?>
    <div class="joinAndGet">
        <ul id="prevPeriod" class="m-round">
            <li class="fl"><s></s><img src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['zz'][0][0]->_callViewFunc(array('mod'=>'photo','source'=>$_smarty_tpl->tpl_vars['prev_buy']->value['photo']),$_smarty_tpl);?>
" /></li>
            <li class="fr"><b class="z-arrow"></b></li>
            <li class="getInfo">
                <dd><em class="blue"><?php echo nickname($_smarty_tpl->tpl_vars['prev_buy']->value['member_name'],$_smarty_tpl->tpl_vars['prev_buy']->value['nickname']);?>
</em> (<?php echo cityIp($_smarty_tpl->tpl_vars['prev_buy']->value['ip']);?>
) </dd>
                <dd>幸运<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_yun'];?>
码：<em class="orange arial"><?php echo $_smarty_tpl->tpl_vars['prev_buy']->value['luck_code'];?>
</em></dd>
                <dd>揭晓时间：<?php echo microtime_format($_smarty_tpl->tpl_vars['prev_buy']->value['wait_time'],'Y-m-d H:i:s.x');?>
</dd>
                <dd><?php echo $_smarty_tpl->tpl_vars['L']->value['unit_yun'];?>
时间：<?php echo microtime_format($_smarty_tpl->tpl_vars['prev_buy']->value['db_time'],'Y-m-d H:i:s.x');?>
</dd>
            </li>
        </ul>
    </div>
    <?php }?>
</div>

<?php echo $_smarty_tpl->getSubTemplate ("footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<script src="/style/TouchSlide.1.1.js"></script>
<script src="/style/mobile/js/jquery-pageload.js"></script>
<script src="/style/mobile/js/jquery.more.js"></script>
<script type="text/javascript">
    $(function(){
        TouchSlide({ slideCell:"#single-item", mainCell:".bd", titCell:".slick-dots li", titOnClassName:"slick-active" });
        tabs(".tab", ".tab-nav li", ".tab-item", "on", "click");

        $('.m-detail-codes-btn').bind('click',function(){
            $(this).hide();
            $('.m-detail-code').hide();
            $('.m-detail-codes').show();
            $('.m-detail-codes-btn-hide').show();
        })
        $('.m-detail-codes-btn-hide').bind('click',function(){
            $(this).hide();
            $('.m-detail-codes').hide();
            $('.m-detail-code').show();
            $('.m-detail-codes-btn').show();
        })
    });

    var isLoad = {
        "join" : false,
        "win"  : false,
        "share": false
    };

    function mLoad(type){
        if(isLoad[type]==false){
            if(type == 'share'){
                $('.shareList').more({
                    'address': '/content/share_ajax/all?goods_id=<?php echo $_smarty_tpl->tpl_vars['row']->value['goods_id'];?>
&type=db',
                    'amount' : 10
                })
            }else{
                $('#'+type).pageload({
                    url: '/yunbuy/ajax_'+type,
                    param: 'id=<?php echo $_smarty_tpl->tpl_vars['row']->value['buy_id'];?>
',
                    trigger: '.getMore_'+type
                });
            }
            isLoad[type] = true;
        }
    }
</script>

<?php if ($_smarty_tpl->tpl_vars['row']->value['wait_time']!=0&&$_smarty_tpl->tpl_vars['row']->value['luck_code']=='0'){?>
<script type="text/javascript">
    var lottery = 0;
    var Secondms_jx = 60*1000;
    var minutems_jx = 1000;
    var wait_time = 0;
    var buy_id = 0;

    function show_date_time(diff,obj) {
        if(diff <= 0) {
            $("#liMinute").html('00');
            $("#liSecond").html('00');
            $("#liMilliSecond").html('00');
            if(lottery==0){ //#
                <?php if ($_smarty_tpl->tpl_vars['site_config']->value['is_ssc']){?>
                lottery = 1;
                $.getJSON('/welcome/lottery/<?php echo $_smarty_tpl->tpl_vars['row']->value['qihao'];?>
' ,function(result) { window.location.reload(); } );
                <?php }else{ ?>
                rTimeout = window.clearTimeout(rTimeout);
                $('#divLotteryTime').html("<span class='jx_ing'>开奖计算中...</span>");

                setTimeout(function(){
                    lottery = 1;
                    window.location.reload();
                }, 5000);
                <?php }?>
            }
            return false;
        }

        DifferSecond   = Math.floor(diff / Secondms_jx);
        diff -= DifferSecond * Secondms_jx;
        DifferMinute   = Math.floor(diff / minutems_jx);
        diff -= DifferMinute * minutems_jx;

        if(DifferSecond.toString().length < 2) DifferSecond = '0'+DifferSecond;
        if(DifferMinute.toString().length < 2) DifferMinute = '0'+DifferMinute;

        wait_time=wait_time-1000;
        $("#liMinute").html(DifferSecond);
        $("#liSecond").html(DifferMinute);

        if($("#jx_load").is(':visible')){
            $("#jx_load").hide();
            $('#jx_clock').show();
        }
    }
    $(document).ready(function(){
    	buy_id  = parseInt("<?php echo $_smarty_tpl->tpl_vars['row']->value['buy_id'];?>
");
        window.setInterval(function(){ $.get('/yunbuy/getLeftTime/'+buy_id,'',function(data){
        	wait_time = data;
        	
        	rTimeout = how_date_time(wait_time, null);
    	}); },60*1000);
        wait_time = parseInt("<?php echo $_smarty_tpl->tpl_vars['end_time']->value;?>
");
        rTimeout = window.setInterval(function(){ show_date_time(wait_time, null); }, 1000);

        //毫秒单独计时
        var h = 100;
        timeID_h_jx = window.setInterval(function(){
            if(h<=0) h = 100;
            h = parseInt(h)-1;
            if(h.toString().length < 1) h = '00';
            if(h.toString().length == 1) h = '0'+h;
            if(h.toString().length > 2) h = '99';

            $("#liMilliSecond").html(h);
        }, 10);
    } );
</script>
<?php }?>
<?php }} ?>