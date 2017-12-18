<?php /* Smarty version Smarty-3.1.13, created on 2015-12-01 20:49:39
         compiled from "E:\projects\web\lnest\1yyg225\webapps\www\views\cn\content\tiyan.html" */ ?>
<?php /*%%SmartyHeaderCode:7876565d95c3a80e64-58521634%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '25c3e9f512913349e75c71bbe65659db9bf569c4' => 
    array (
      0 => 'E:\\projects\\web\\lnest\\1yyg225\\webapps\\www\\views\\cn\\content\\tiyan.html',
      1 => 1448974177,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7876565d95c3a80e64-58521634',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_565d95c3c3e3c8_68577434',
  'variables' => 
  array (
    'tagAdw' => 0,
    'tagAds' => 0,
    'm' => 0,
    'tagGG' => 0,
    'data' => 0,
    'site_config' => 0,
    'key' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_565d95c3c3e3c8_68577434')) {function content_565d95c3c3e3c8_68577434($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_truncate')) include 'E:\\projects\\web\\lnest\\1yyg225\\system\\smarty\\plugins\\modifier.truncate.php';
?><?php echo $_smarty_tpl->getSubTemplate ("header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<script src="/style/lefttime.js"></script>
<link rel="stylesheet" href="<?php echo url('/style/css/boutique.css');?>
">
<link rel="stylesheet" href="<?php echo url('/style/css/yiyuanbao.css');?>
">
<style type="text/css">
    .fn-clear{ clear: both; }

    .tiyan-box{ margin-bottom: 40px;}
    .tright{ float: right; width: 250px; background: #F5F5F5; line-height: 1.8; color: #333; }
    .tright dt{ background: #1FB89A; height: 35px; line-height: 35px; padding: 0 0 0 15px; font-size: 16px; color: #fff; }
    .tright dd{ padding: 15px 18px; border-bottom:1px dashed #CBCBCB}
    .tright dd.last{ border-bottom: 0; }
    .tright dd h4{ font-size: 16px; color: #1FB89A; line-height: 1.2;}
    .tright dd h4 i{ font-size: 30px; font-weight: normal; font-style: italic }
    .tright dd .d0{ color: #999; }
    .tright dd .d1{ margin-top:5px; }
    .tright dd .d1 em{ font-style: italic; }
    .tleft{ float:left; width:879px;  }
    h3{ font-size: 18px; line-height: 40px; height: 40px; overflow: hidden; color: #000; font-weight: normal; }
    h3 a{ color: #000; }
    h3 a:hover{ color: #e54048; }
    h3 span{ float:right; font-size: 12px; line-height: 50px; }

    .jp-list{ width: 878px; border-top:2px solid #888 }
    .jp-list ul{ width: 879px;}
    .jp-list li{ padding: 10px 12px 10px 12px; }
    .jp-list li:hover{ padding: 9px 11px 9px 11px; }

    .hy-btn{ background:#1FB89A; height:22px; line-height: 22px; font-size:14px; color:#fff; cursor:pointer; border-radius:3px; border:1px solid #048E77; padding:0 10px; border-width: 0 1px 2px 0; }
    .hy-btn:hover{ color:#ff0;}

    .dl2{ border-top: 10px solid #fff; }
    .dl2 dd{ padding:0; }
    .act-bd { padding:0; height:auto; overflow:hidden; position:relative; background: #F5F5F5; }
    .act-bd li { height: 70px; padding:14px 10px 0 70px; border-bottom:1px dotted #ddd; position: relative; }
    .act-bd li.odd{ background: #F5F5F5; }
    .act-bd li img{ position: absolute; left: 10px; top:18px; border-radius: 50%; }
    .act-bd li a{ color: #00a0e9; }
    .act-bd li a:hover{ text-decoration: underline; }
    .act-bd li .p1{ font-size: 14px; height: 20px; overflow: hidden; }
    .act-bd li .p2{ height: 36px; line-height: 18px; overflow: hidden;}
    .act-bd li .p2 a{ color: #666; }

    .more{ text-align: center; font-size: 18px; }
    .more a{ color: #333;}
    .more a:hover{ color: #e54048;}
</style>

<div class="ggAuc">
    <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['zz'][0][0]->_callViewFunc(array('mod'=>'content','var'=>'tagAdw','module'=>'ad','id'=>13),$_smarty_tpl);?>

    <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['zz'][0][0]->_callViewFunc(array('mod'=>'fileurl','var'=>'tagAds','source'=>$_smarty_tpl->tpl_vars['tagAdw']->value['images'],'num'=>2),$_smarty_tpl);?>

    <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['tagAds']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>
    <div class="g-gg" style="height:<?php echo $_smarty_tpl->tpl_vars['tagAdw']->value['height'];?>
px;background:<?php echo $_smarty_tpl->tpl_vars['tagAdw']->value['bgcolor'];?>
 url('<?php echo $_smarty_tpl->tpl_vars['m']->value['path'];?>
') no-repeat center bottom"><span></span><?php if ($_smarty_tpl->tpl_vars['m']->value['title']){?><a href="<?php echo $_smarty_tpl->tpl_vars['m']->value['title'];?>
" target="_blank"></a><?php }?></div>
    <?php } ?>
    <div class="container" style="position:relative;margin-top:-180px;height:250px;">
        <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['zz'][0][0]->_callViewFunc(array('mod'=>'content','var'=>'tagGG','catid'=>61,'limit'=>1,'type'=>'row','field'=>'content'),$_smarty_tpl);?>

        <?php if ($_smarty_tpl->tpl_vars['tagGG']->value){?>
        <div class="txt txt_ty">
            <dl style="background: #ffdb0b;color:#000;">
                <dt style="color: #e53f47">竞拍体验公告</dt>
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
">恭喜<a href="<?php echo url(('/minfo?id=').($_smarty_tpl->tpl_vars['m']->value['bid_user']));?>
#aucCod" target="_blank"><span class="color01"><?php echo nickname($_smarty_tpl->tpl_vars['m']->value['username'],$_smarty_tpl->tpl_vars['m']->value['nickname']);?>
</span></a>会员<?php if ($_smarty_tpl->tpl_vars['m']->value['win']>0){?>在<?php echo $_smarty_tpl->tpl_vars['m']->value['win'];?>
%出价成交活动中<?php }?>以<span class="color01"><?php if ($_smarty_tpl->tpl_vars['m']->value['bid_price']>0){?><?php echo price_format($_smarty_tpl->tpl_vars['m']->value['bid_price']);?>
<?php }?><?php if ($_smarty_tpl->tpl_vars['m']->value['paib']>0){?> <?php echo $_smarty_tpl->tpl_vars['m']->value['paib'];?>
拍币<?php }?></span>获<?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['m']->value['title'],16);?>
</li>
                    <?php } ?>
                </ul>
            </div>
        </div>
        <?php echo $_smarty_tpl->getSubTemplate ("ur_here.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

    </div>
</div>

<div class="container tiyan-box fn-clear mt10">
    <div class="tleft">
        <h3><span><a href="<?php echo url('/auction/lists/tiyan');?>
">体验更多宝贝哦...</a></span><a href="<?php echo url('/auction/lists/tiyan');?>
"><?php echo $_smarty_tpl->tpl_vars['site_config']->value['site_name'];?>
体验区</a></h3>
        <div class="fn-clear jp-list mb20">
            <ul class="fn-clear" style="display:block">
                <?php  $_smarty_tpl->tpl_vars['auction'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['auction']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['data']->value['aucList']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['auction']->key => $_smarty_tpl->tpl_vars['auction']->value){
$_smarty_tpl->tpl_vars['auction']->_loop = true;
?>
                <?php echo $_smarty_tpl->getSubTemplate ("auction/lbi_auction.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

                <?php } ?>
                <?php if ($_smarty_tpl->tpl_vars['data']->value['aucListNo']<3&&$_smarty_tpl->tpl_vars['data']->value['aucListNo']>0){?>
                <?php $_smarty_tpl->tpl_vars['foo'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['foo']->step = 1;$_smarty_tpl->tpl_vars['foo']->total = (int)ceil(($_smarty_tpl->tpl_vars['foo']->step > 0 ? $_smarty_tpl->tpl_vars['data']->value['aucListNo']+1 - (1) : 1-($_smarty_tpl->tpl_vars['data']->value['aucListNo'])+1)/abs($_smarty_tpl->tpl_vars['foo']->step));
if ($_smarty_tpl->tpl_vars['foo']->total > 0){
for ($_smarty_tpl->tpl_vars['foo']->value = 1, $_smarty_tpl->tpl_vars['foo']->iteration = 1;$_smarty_tpl->tpl_vars['foo']->iteration <= $_smarty_tpl->tpl_vars['foo']->total;$_smarty_tpl->tpl_vars['foo']->value += $_smarty_tpl->tpl_vars['foo']->step, $_smarty_tpl->tpl_vars['foo']->iteration++){
$_smarty_tpl->tpl_vars['foo']->first = $_smarty_tpl->tpl_vars['foo']->iteration == 1;$_smarty_tpl->tpl_vars['foo']->last = $_smarty_tpl->tpl_vars['foo']->iteration == $_smarty_tpl->tpl_vars['foo']->total;?>
                <li class="blank"></li>
                <?php }} ?>
                <?php }?>
            </ul>
        </div>
        <div class="more" style="display: none"><a href="<?php echo url('/auction/lists/tiyan');?>
">体验更多精彩宝贝，搬回家.....</a></div>
    </div>
    <div class="tright">
        <dl>
            <dt>做任务，赚拍币</dt>
            <dd>
                <h4>任务<i>1</i>：语音认证</h4>

                <div class="d0">( 每个用户限领一次 )</div>
                <div class="d1">【任务奖励】<b>1</b> 夺宝币抵用券
                    <span id="isVoice">
                        <?php if ($_smarty_tpl->tpl_vars['data']->value['memberOther']['isVoice']!=1){?>
                        <a href="javascript:;" onclick="getPoints('isVoice')" class="hy-btn">领取</a>
                        <em class="color01" style="display:none;">已领取</em>
                        <?php }else{ ?> <em class="color01">已领取</em><?php }?>
                    </span>
                </div>
                <div class="d2">【任务说明】<a href="<?php echo url('/member/verifyVoice');?>
" class="color02">“语音认证”</a>后，即可领取。 </div>
            </dd>
            <dd>
                <h4>任务<i>2</i>：上传头像</h4>
                <div class="d0">( 每个用户限领一次 )</div>
                <div class="d1">【任务奖励】<b><?php echo $_smarty_tpl->tpl_vars['site_config']->value['isPhoto'];?>
</b> 拍币
                    <span id="isPhoto">
                        <?php if ($_smarty_tpl->tpl_vars['data']->value['memberOther']['isPhoto']!=1){?>
                        <a href="javascript:;" onclick="getPoints('isPhoto')" class="hy-btn">领取</a>
                        <em class="color01" style="display:none;">已领取</em>
                        <?php }else{ ?> <em class="color01">已领取</em><?php }?>
                    </span>
                </div>
                <div class="d2">【任务说明】<a href="<?php echo url('/member/photo');?>
" class="color02">“上传头像”</a>即可领取。</div>
            </dd>
            <dd>
                <h4>任务<i>3</i>：实名认证</h4>

                <div class="d0">( 每个用户限领一次 )</div>
                <div class="d1">【任务奖励】<b><?php echo $_smarty_tpl->tpl_vars['site_config']->value['isIdcard'];?>
</b> 夺宝币抵用券
                    <span id="isIdcard">
                        <?php if ($_smarty_tpl->tpl_vars['data']->value['memberOther']['isIdcard']!=1){?>
                        <a href="javascript:;" onclick="getPoints('isIdcard')" class="hy-btn">领取</a>
                        <em class="color01" style="display:none;">已领取</em>
                        <?php }else{ ?> <em class="color01">已领取</em><?php }?>
                    </span>
                </div>
                <div class="d2">【任务说明】<a href="<?php echo url('/member/verifyidcard');?>
" class="color02">“实名认证”</a>审核后，即可领取。 </div>
            </dd>
            <dd>
                <h4>任务<i>4</i>：邮箱认证</h4>

                <div class="d0">( 每个用户限领一次 )</div>
                <div class="d1">【任务奖励】<b><?php echo $_smarty_tpl->tpl_vars['site_config']->value['isMail'];?>
</b> 夺宝币抵用券
                    <span id="isMail">
                        <?php if ($_smarty_tpl->tpl_vars['data']->value['memberOther']['isMail']!=1){?>
                        <a href="javascript:;" onclick="getPoints('isMail')" class="hy-btn">领取</a>
                        <em class="color01" style="display:none;">已领取</em>
                        <?php }else{ ?> <em class="color01">已领取</em><?php }?>
                    </span>
                </div>
                <div class="d2">【任务说明】到<a href="<?php echo url('/member/safe');?>
" class="color02">“账户安全”</a>，点击认证邮箱通过后，即可领取。 </div>
            </dd>
            <dd>
                <h4>任务<i>5</i>：邀请赚拍币</h4>
                <div class="d2">
                    【任务说明】邀请第1位送5拍币，第2位送10拍币，第3位送15拍币，第4位送20拍币，第5位起送25拍币，推荐多多，领取多多。
                    <span>
                        <a href="<?php echo url('/member/myivt');?>
" class="hy-btn">立即邀请</a>
                    </span>
                </div>
            </dd>
            <dd>
                <h4>任务<i>6</i>：签到送拍币</h4>

                <div class="d0">( 每个用户每天限领一次 )</div>
                <div class="d1">【任务奖励】<b><?php echo $_smarty_tpl->tpl_vars['site_config']->value['signin_jl'];?>
</b> 拍币
                    <span id="isQd">
                        <?php if ($_smarty_tpl->tpl_vars['data']->value['is_signin']>0){?>
                        <em class="color01">今日已签到</em>
                        <?php }else{ ?>
                        <a href="<?php echo url('/member');?>
" class="hy-btn">立即签到</a>
                        <?php }?>
                    </span>
                </div>
                <div class="d2">【任务说明】每日签到免费得拍币，语音认证后第一次签到可获得20拍币（未语音认证仅前5天领取<?php echo $_smarty_tpl->tpl_vars['site_config']->value['signin_jl'];?>
拍币）！</div>
            </dd>
            <dd>
                <h4>任务<i>7</i>：夺宝达人</h4>

                <div class="d0">( 不限次数 )</div>
                <div class="d1">【任务奖励】<b><?php echo $_smarty_tpl->tpl_vars['site_config']->value['isDaren'];?>
</b> 拍币
                    <span id="isDaren">
                        <a href="javascript:;" onclick="getPoints('isDaren')" class="hy-btn">领取</a>
                    </span>
                </div>
                <div class="d2">【任务说明】参与人次（不含体验拍和免费夺宝商品）参与次数每超过50次后获50个拍币！</div>
            </dd>
            <dd>
                <h4>任务<i>8</i>：竞拍达人</h4>

                <div class="d0">( 不限次数 )</div>
                <div class="d1">【任务奖励】<b><?php echo $_smarty_tpl->tpl_vars['site_config']->value['isJpDaren'];?>
</b> 拍币
                    <span id="isJpDaren">
                        <a href="javascript:;" onclick="getPoints('isJpDaren')" class="hy-btn">领取</a>
                    </span>
                </div>
                <div class="d2">【任务说明】参与竞拍商品数（不含体验拍和免费夺宝商品）每超过50次后获50个拍币！</div>
            </dd>
        </dl>
        <dl class="dl2">
            <dt>最新参与记录</dt>
            <dd class="last">
                <div class="act-bd">
                    <ul>
                        <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['data']->value['newlog']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['m']->key;
?>
                        <li <?php if ($_smarty_tpl->tpl_vars['key']->value%2!=0){?>class="odd"<?php }?>>
                        <a href="<?php echo url(('/minfo?id=').($_smarty_tpl->tpl_vars['m']->value['bid_user']));?>
#auc" target="_blank"><img src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['zz'][0][0]->_callViewFunc(array('mod'=>'photo','source'=>$_smarty_tpl->tpl_vars['m']->value['photo'],'size'=>'80','nopic'=>'/upload/default.gif'),$_smarty_tpl);?>
" width="50" height="50" /></a>
                        <p class="p1"><a href="<?php echo url(('/minfo?id=').($_smarty_tpl->tpl_vars['m']->value['bid_user']));?>
#auc" class="color01" target="_blank"><?php echo nickname($_smarty_tpl->tpl_vars['m']->value['username'],$_smarty_tpl->tpl_vars['m']->value['nickname']);?>
</a></p>
                            <p class="p2"><a href="<?php echo url(('/auction/view/').($_smarty_tpl->tpl_vars['m']->value['act_id']));?>
" target="_blank" title="<?php echo $_smarty_tpl->tpl_vars['m']->value['title'];?>
"><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['m']->value['title'],40);?>
</a></p>
                        </li>
                        <?php } ?>
                    </ul>
                </div>
            </dd>
        </dl>
    </div>
    <div class="fn-clear"></div>

</div>
<?php echo $_smarty_tpl->getSubTemplate ("footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<script src="/style/jquery.SuperSlide.2.1.1.js"></script>
<script type="text/javascript">
    jQuery(".txtScroll-top").slide({ mainCell:".bd ul",autoPage:true,interTime:3000,effect:"top",autoPlay:true,vis:1 });
    jQuery(".act-bd").slide({ mainCell:"ul",autoPage:true,effect:"topLoop",autoPlay:true,vis:16,interTime:"2500",delayTime:"1000",opp:true });
  
    $('.jp-list li').bind('mouseover',function(){
        $(this).addClass('hover');
    }).bind('mouseout',function(){
        $(this).removeClass('hover');
    });

    function getPoints(type){
        $.post('/content/getPoints',{ type:type },function(data){
            if(data.msg){
                if(data.error == 0){
                    layer.msg(data.msg, 2, { type:1 });
                    $('#'+type+' a').hide();
                    $('#'+type+' em').css('display','');
                }else{
                    layer.tips(data.msg, '#'+type, { time:5 });
                }
            }
        },"json");
    }
</script>
<?php }} ?>