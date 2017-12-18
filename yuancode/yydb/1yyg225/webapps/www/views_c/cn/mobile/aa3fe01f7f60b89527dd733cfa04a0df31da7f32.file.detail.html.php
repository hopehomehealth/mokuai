<?php /* Smarty version Smarty-3.1.13, created on 2015-12-02 15:34:07
         compiled from "E:\projects\web\lnest\1yyg225\webapps\www\views\cn\mobile\yunbuy\detail.html" */ ?>
<?php /*%%SmartyHeaderCode:29953565e9eef91a286-33862430%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'aa3fe01f7f60b89527dd733cfa04a0df31da7f32' => 
    array (
      0 => 'E:\\projects\\web\\lnest\\1yyg225\\webapps\\www\\views\\cn\\mobile\\yunbuy\\detail.html',
      1 => 1446429343,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '29953565e9eef91a286-33862430',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'row' => 0,
    'luck_member' => 0,
    'member_join' => 0,
    'm' => 0,
    'k' => 0,
    'join_arr' => 0,
    'v' => 0,
    'new_buy' => 0,
    'prev_buy' => 0,
    'end_time' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_565e9eefb64216_04962034',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_565e9eefb64216_04962034')) {function content_565e9eefb64216_04962034($_smarty_tpl) {?><?php if (isset($_smarty_tpl->tpl_vars['header'])) {$_smarty_tpl->tpl_vars['header'] = clone $_smarty_tpl->tpl_vars['header'];
$_smarty_tpl->tpl_vars['header']->value = 'header2'; $_smarty_tpl->tpl_vars['header']->nocache = null; $_smarty_tpl->tpl_vars['header']->scope = 0;
} else $_smarty_tpl->tpl_vars['header'] = new Smarty_variable('header2', null, 0);?>
<?php echo $_smarty_tpl->getSubTemplate ("top.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div id="content" class="container detail">
    <?php if ($_smarty_tpl->tpl_vars['row']->value['wait_time']==0){?>
    <?php }elseif($_smarty_tpl->tpl_vars['row']->value['luck_code']){?>
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
                    <div class="g-snav-lst">揭晓时间<br><dd class="gray9"><span><?php echo microtime_format($_smarty_tpl->tpl_vars['row']->value['wait_time'],'Y-m-d H:i:s.x','<br>');?>
</span></dd></div>
                    <div class="g-snav-lst">云购时间<br><dd class="gray9"><span><?php echo microtime_format($_smarty_tpl->tpl_vars['row']->value['last_dbtime'],'Y-m-d H:i:s.x','<br>');?>
</span></dd></div>
                </div>
            </div>
            <p><a href="<?php echo url((('/yunbuy/detail/').($_smarty_tpl->tpl_vars['row']->value['buy_id'])).('/luck'));?>
" class="fr">查看计算结果</a>幸运云购码：<b class="orange"><?php echo $_smarty_tpl->tpl_vars['row']->value['luck_code'];?>
</b></p>
        </div>
    </div>
    <?php }else{ ?>
    <link rel="stylesheet" href="/style/mobile/css/goods.css">
    <div style="clear:both;height:1px;width:100%;"></div>
    <div id="divLotteryTime" class="pProcess clearfix">
        <div class="pCountdown">
            <div class="g-snav">
                <div class="g-s g-s-1"><div class="g-snav-lst">揭晓<br>倒计时<s></s></div></div>
                <div class="g-s"><div class="g-snav-lst"><b id="liMinute">00</b><em>分</em></div></div>
                <div class="g-s"><div class="g-snav-lst"><b id="liSecond">00</b><em>秒</em></div></div>
                <div class="g-s"><div class="g-snav-lst"><b id="liMilliSecond">00</b><em>毫秒</em></div></div>
            </div>
        </div>
    </div>
    <?php }?>

    <div class="slider" id="single-item">
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

    <div class="info">
        <p class="title">(第<?php echo $_smarty_tpl->tpl_vars['row']->value['qishu'];?>
期) <?php echo $_smarty_tpl->tpl_vars['row']->value['title'];?>
</p>
        <p class="price">
            <?php if ($_smarty_tpl->tpl_vars['row']->value['end_num']>0){?>
            <span style="float:right">总需<?php echo $_smarty_tpl->tpl_vars['row']->value['need_num'];?>
人次</span>
            <?php }?>
            价值：<b class="color01"><?php echo intval($_smarty_tpl->tpl_vars['row']->value['goods_price']);?>
</b>元
        </p>
        <?php if ($_smarty_tpl->tpl_vars['row']->value['end_num']>0){?>
        <div class="progressBar">
            <p class="wrap-bar">
                <span class="bar" style="width:<?php echo $_smarty_tpl->tpl_vars['row']->value['jindu'];?>
%"></span>
            </p>
            <div class="txt ui-clr">
                <span class="ui-left"><?php echo $_smarty_tpl->tpl_vars['row']->value['buy_num'];?>
人已参与</span>
                <span class="ui-right">剩余<?php echo $_smarty_tpl->tpl_vars['row']->value['end_num'];?>
人次</span>
            </div>
            <div class="bottom">
                参与人次：
                <div class="number" style="margin-right: 5px;">
                    <input class="num-input" type="text" id="qty_<?php echo $_smarty_tpl->tpl_vars['row']->value['buy_id'];?>
" data-max="<?php echo $_smarty_tpl->tpl_vars['row']->value['end_num'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['max_mun'];?>
" />
                    <a class="num-btn btn-plus" id="qty_plus" href="javascript:void(0);">+</a>
                    <a class="num-btn btn-minus" id="qty_minus" href="javascript:void(0);">-</a>
                </div>
                <span style="color: #EB3D60">获得机率 <font id="w-number-point">100</font>%</span>
                <script type="text/javascript">
                    var need_num = <?php echo $_smarty_tpl->tpl_vars['row']->value['need_num'];?>
;
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
                        getWinPoint($(this).val(),need_num);
                    }
                </script>
            </div>
            <div class="bottom button-box ui-clr">
                <?php if ($_smarty_tpl->tpl_vars['row']->value['type']==1){?>
                <span class="btn-db"><a href="javascript:void(0)" onclick="addToCart('<?php echo $_smarty_tpl->tpl_vars['row']->value['buy_id'];?>
','buy')">立即云购</a></span>
                <span class="btn-db btn-cart"><a href="javascript:void(0)" onclick="addToCart('<?php echo $_smarty_tpl->tpl_vars['row']->value['buy_id'];?>
','',this)">加入购物车</a></span>
                <?php }else{ ?>
                <span class="btn-db btn-db-free"><a href="javascript:void(0)" onclick="addToCart('<?php echo $_smarty_tpl->tpl_vars['row']->value['buy_id'];?>
','free')">免费云购</a></span>
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
        <p><?php if ($_smarty_tpl->tpl_vars['row']->value['luck_code']){?>中奖者<?php }else{ ?>您<?php }?>本期总共参与了<b class="color01"><?php echo count($_smarty_tpl->tpl_vars['member_join']->value);?>
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
        <p class="detail-userCodes-blank">您还没有参与本次云购哦！</p>
        <?php }?>
    </div>
    <?php }elseif($_smarty_tpl->tpl_vars['row']->value['luck_code']){?>
    <div class="detail-userCodes" style="padding:10px">
        <div class="pClosed">本云购已揭晓</div>
        <div class="pOngoing">
            <em>第 <?php echo $_smarty_tpl->tpl_vars['new_buy']->value['qishu'];?>
 期 进行中…</em>
            <a class="fr" href="<?php echo url(('/yunbuy/detail/').($_smarty_tpl->tpl_vars['new_buy']->value['buy_id']));?>
">查看详情</a>
        </div>
    </div>
    <?php }?>

    <ul class="yunbuy_other">
        <a href="<?php echo url((('/yunbuy/detail/').($_smarty_tpl->tpl_vars['row']->value['buy_id'])).('/join'));?>
"><b></b>所有云购记录</a>
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
                <dd style="display: none;">总共参与：<em class="orange arial"><?php echo $_smarty_tpl->tpl_vars['prev_buy']->value['qty'];?>
</em>人次</dd>
                <dd>幸运云购码：<em class="orange arial"><?php echo $_smarty_tpl->tpl_vars['prev_buy']->value['luck_code'];?>
</em></dd>
                <dd>揭晓时间：<?php echo microtime_format($_smarty_tpl->tpl_vars['prev_buy']->value['wait_time'],'Y-m-d H:i:s.x');?>
</dd>
                <dd>云购时间：<?php echo microtime_format($_smarty_tpl->tpl_vars['prev_buy']->value['last_dbtime'],'Y-m-d H:i:s.x');?>
</dd>
            </li>
        </ul>
    </div>
    <?php }?>
</div>

<?php echo $_smarty_tpl->getSubTemplate ("footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<script src="/style/mobile/js/slick.min.js"></script>
<script src="/style/mobile/js/jquery-pageload.js"></script>
<script src="/style/mobile/js/jquery.more.js"></script>
<script type="text/javascript">
    $(function(){
        $('#single-item').slick({
            autoplay: true,
            arrows: false,
            dots: true
        });
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
    function show_date_time(endTime,obj) {
        if(!this.endTime) { this.endTime=endTime;this.obj=obj; }
        rTimeout = window.setTimeout("show_date_time()",30);
        timeold = this.endTime-(new Date().getTime());

        if(timeold <= 0) {
            $("#liMinute").html('00');
            $("#liSecond").html('00');
            $("#liMilliSecond").html('00');
            if(lottery==0){ //#
                rTimeout = window.clearTimeout(rTimeout);
                $('#divLotteryTimer').html("<span class='jx_ing'>开奖计算中...</span>");

                setTimeout(function(){
                    lottery = 1;
                    location.reload();
                }, 5000);
            }
            return false;
        }
        sectimeold=timeold/1000
        secondsold=Math.floor(sectimeold);
        msPerDay=24*60*60*1000
        e_daysold=timeold/msPerDay
        daysold=Math.floor(e_daysold); 				//天
        e_hrsold=(e_daysold-daysold)*24;
        hrsold=Math.floor(e_hrsold); 				//时
        e_minsold=(e_hrsold-hrsold)*60;
        //分
        minsold=Math.floor((e_hrsold-hrsold)*60);
        minsold = (minsold<10?'0'+minsold:minsold);
        //秒
        e_seconds = (e_minsold-minsold)*60;
        seconds=Math.floor((e_minsold-minsold)*60);
        seconds = (seconds<10?'0'+seconds:seconds);
        //毫秒
        ms = parseInt((e_seconds-seconds)*100);

        $("#liMinute").html(minsold);
        $("#liSecond").html(seconds);
        $("#liMilliSecond").html(ms);
    }
    $(document).ready(function(){
        diff_time = '<?php echo $_smarty_tpl->tpl_vars['end_time']->value;?>
';
        $.get('/yunbuy/getLeftTime/<?php echo $_smarty_tpl->tpl_vars['row']->value['buy_id'];?>
/2','',function(data){
            diff_time = data;
        });
        show_date_time((new Date().getTime())+(parseInt(diff_time))*1000,null);
    } );
</script>
<?php }?>
<?php }} ?>