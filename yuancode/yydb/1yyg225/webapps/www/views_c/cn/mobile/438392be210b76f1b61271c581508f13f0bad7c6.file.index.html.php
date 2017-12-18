<?php /* Smarty version Smarty-3.1.13, created on 2016-06-01 15:05:42
         compiled from "D:\test1yyg3.lnest.com\webapps\www\views\cn\mobile\member\index.html" */ ?>
<?php /*%%SmartyHeaderCode:2288356ceaaab40da35-32515167%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '438392be210b76f1b61271c581508f13f0bad7c6' => 
    array (
      0 => 'D:\\test1yyg3.lnest.com\\webapps\\www\\views\\cn\\mobile\\member\\index.html',
      1 => 1464681019,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2288356ceaaab40da35-32515167',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_56ceaaab71fd58_71577842',
  'variables' => 
  array (
    'member' => 0,
    'L' => 0,
    'bonus_count' => 0,
    'site_config' => 0,
    'is_signin' => 0,
    'data' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56ceaaab71fd58_71577842')) {function content_56ceaaab71fd58_71577842($_smarty_tpl) {?><?php if (isset($_smarty_tpl->tpl_vars['header'])) {$_smarty_tpl->tpl_vars['header'] = clone $_smarty_tpl->tpl_vars['header'];
$_smarty_tpl->tpl_vars['header']->value = 'header2'; $_smarty_tpl->tpl_vars['header']->nocache = null; $_smarty_tpl->tpl_vars['header']->scope = 0;
} else $_smarty_tpl->tpl_vars['header'] = new Smarty_variable('header2', null, 0);?>
<?php echo $_smarty_tpl->getSubTemplate ("top.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<link rel="stylesheet" href="/style/mobile/css/member.css">
<div id="content" class="container main">
    <div class="user-summary">
        <div class="name color04"><?php if ($_smarty_tpl->tpl_vars['member']->value['nickname']){?><?php echo $_smarty_tpl->tpl_vars['member']->value['nickname'];?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['member']->value['username'];?>
<?php }?></div>
        <div class="info ui-clr">
            <div class="pic ui-left">
                <a href="<?php echo url('/member/photo');?>
"><img src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['zz'][0][0]->_callViewFunc(array('mod'=>'photo','source'=>$_smarty_tpl->tpl_vars['member']->value['photo'],'size'=>'80'),$_smarty_tpl);?>
" /></a>
            </div>
            <div class="u-data">
                <ul>
                    <li>余额：<?php echo price_format($_smarty_tpl->tpl_vars['member']->value['user_money']);?>
</li>
                    <li><?php echo $_smarty_tpl->tpl_vars['L']->value['unit_db_points'];?>
：<?php echo $_smarty_tpl->tpl_vars['member']->value['db_points'];?>
</li>
                    <li><?php echo $_smarty_tpl->tpl_vars['L']->value['unit_pay_points'];?>
：<?php echo $_smarty_tpl->tpl_vars['member']->value['pay_points'];?>
</li>
                    <li><?php echo $_smarty_tpl->tpl_vars['L']->value['unit_bonus'];?>
：<?php echo $_smarty_tpl->tpl_vars['bonus_count']->value['money'];?>
</li>
                </ul>
				<?php if ($_smarty_tpl->tpl_vars['site_config']->value['apply_jufu']!=1){?>
                <a href="<?php echo url('/member/recchage');?>
">充值</a>
                <?php if (@constant('IsAuction')){?>
                <a href="<?php echo url('/member/withdraw');?>
">提现</a>
                <?php }?>
				<a href="<?php echo url('/member/change_db');?>
">兑换<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_db_points'];?>
</a>
				<?php }?>
                <a class="singer_r_img <?php if ($_smarty_tpl->tpl_vars['is_signin']->value){?>current<?php }?>" href="javascript:;">
                <span id="sing_for_number"></span>
				</a>
            </div>
        </div>
    </div>

    <div class="u-nav" id="free">
        <div class="free-m">
            <div class="free-a"><a href="javascript:;" class="color01 btn-small" onclick="$('.free-c').fadeToggle()"><b>做任务赚<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_pay_points'];?>
</b></a></div>
            <div class="free-c">
                <ul>
                    <li class="ui-clr" id="isPhoto">
                        <b>1.</b><?php if ($_smarty_tpl->tpl_vars['data']->value['memberOther']['isPhoto']!=1){?><a href="javascript:;" onclick="getPoints('isPhoto')" class="btn-small ui-right">领取</a><?php }else{ ?><i class="ui-right color03">已领取</i><?php }?>
                        <span><a href="<?php echo url('/member/photo');?>
" class="color02">“上传头像”</a>即可领取<?php echo $_smarty_tpl->tpl_vars['site_config']->value['isPhoto'];?>
<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_pay_points'];?>
<span class="color03">（限领一次）</span>。</span>
                    </li>
                    <li class="ui-clr" id="isIdcard">
                        <b>2.</b><?php if ($_smarty_tpl->tpl_vars['data']->value['memberOther']['isIdcard']!=1){?><a href="javascript:;" onclick="getPoints('isIdcard')" class="btn-small ui-right">领取</a><?php }else{ ?><i class="ui-right color03">已领取</i><?php }?>
                        <span><a href="<?php echo url('/member/verifyidcard');?>
" class="color02">“实名认证”</a>即可领取<?php echo $_smarty_tpl->tpl_vars['site_config']->value['isIdcard'];?>
<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_db_points'];?>
<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_bonus'];?>
<span class="color03">（限领一次）</span>。</span>
                    </li>
                    <li class="ui-clr" id="isMail">
                        <b>3.</b><?php if ($_smarty_tpl->tpl_vars['data']->value['memberOther']['isMail']!=1){?><a href="javascript:;" onclick="getPoints('isMail')" class="btn-small ui-right">领取</a><?php }else{ ?><i class="ui-right color03">已领取</i><?php }?>
                        <span><a href="<?php echo url('/member/verifyEmail');?>
" class="color02">“邮箱认证”</a>即可领取<?php echo $_smarty_tpl->tpl_vars['site_config']->value['isMail'];?>
<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_db_points'];?>
<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_bonus'];?>
<span class="color03">（限领一次）</span>。</span>
                    </li>
                    <li class="ui-clr">
                        <b>4.</b><a href="<?php echo url('/member/myivt');?>
" class="btn-small ui-right">立即邀请</a>
                        <span><a href="<?php echo url('/member/myivt');?>
" class="color02">“邀请好友”</a>每推荐1位好友注册，领<?php echo $_smarty_tpl->tpl_vars['site_config']->value['ivt1'];?>
<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_pay_points'];?>
。</span>
                    </li>
                    <li class="ui-clr" id="isSign">
                        <b>5.</b><?php if ($_smarty_tpl->tpl_vars['is_signin']->value==0){?><a href="javascript:;" class="btn-small ui-right btn-sing">立即签到</a><?php }else{ ?><i class="ui-right color03">今日已签到</i><?php }?>
                        <span>每日签到免费得<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_pay_points'];?>
，语音认证后第一次签到可获得20<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_pay_points'];?>
！<span class="color03">（每日限领一次）</span>。</span>
                    </li>
                    <li class="ui-clr" id="isDaren">
                        <b>6.</b><a href="javascript:;" onclick="getPoints('isDaren')" class="btn-small ui-right">领取</a>
                        <span><?php echo $_smarty_tpl->tpl_vars['L']->value['unit_yun'];?>
达人：参与人次（不含体验拍和免费<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_yun'];?>
商品）参与次数每超过50次后获<?php echo $_smarty_tpl->tpl_vars['site_config']->value['isDaren'];?>
<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_pay_points'];?>
<span class="color03">（不限次数）</span>。</span>
                    </li>
                    <li class="ui-clr" id="isJpDaren" style="display: none;">
                        <b>7.</b><a href="javascript:;" onclick="getPoints('isJpDaren')" class="btn-small ui-right">领取</a>
                        <span><?php echo $_smarty_tpl->tpl_vars['L']->value['unit_pay'];?>
达人：参与<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_pay'];?>
商品数（不含体验拍和免费<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_yun'];?>
商品）每超过50次后获<?php echo $_smarty_tpl->tpl_vars['site_config']->value['isJpDaren'];?>
<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_pay_points'];?>
<span class="color03">（不限次数）</span>。</span>
                    </li>
                </ul>
            </div>
        </div>
        <div class="n-user-bar">
            <a class="n-bar" href="<?php echo url('/member/db');?>
"><?php echo $_smarty_tpl->tpl_vars['L']->value['unit_yun'];?>
记录<span class="bar-ext"><b class="ico-next"></b></span></a>
            <a class="n-bar" href="<?php echo url('/member/luck');?>
"><?php echo $_smarty_tpl->tpl_vars['L']->value['unit_winning'];?>
记录<span class="bar-ext"><b class="ico-next"></b></span></a>
        </div>
        <?php if (@constant('IsAuction')){?>
        <div class="n-user-bar">
            <a class="n-bar" href="<?php echo url('/member/auction');?>
"><?php echo $_smarty_tpl->tpl_vars['L']->value['unit_pay'];?>
记录<span class="bar-ext"><b class="ico-next"></b></span></a>
            <a class="n-bar" href="<?php echo url('/member/cod');?>
"><?php echo $_smarty_tpl->tpl_vars['L']->value['unit_winning'];?>
领取<span class="bar-ext"><b class="ico-next"></b></span></a>
        </div>
        <?php }?>
        <div class="n-user-bar">
            <a class="n-bar" href="<?php echo url('/member/order');?>
">订单管理<span class="bar-ext"><b class="ico-next"></b></span></a>
            <a class="n-bar" href="<?php echo url('/member/accountdetail');?>
">资金管理<span class="bar-ext"><b class="ico-next"></b></span></a>
            <a class="n-bar" href="<?php echo url('/member/safe');?>
">帐户安全<span class="bar-ext"><b class="ico-next"></b></span></a>
            <a class="n-bar" href="<?php echo url('/member/address');?>
">收货地址<span class="bar-ext"><b class="ico-next"></b></span></a>
            <a class="n-bar" href="<?php echo url('/member/info');?>
">个人信息<span class="bar-ext"><b class="ico-next"></b></span></a>
            <a class="n-bar" href="<?php echo url('/member/message');?>
">站内信<span class="bar-ext"><b class="ico-next"></b></span></a>
        </div>
        <div class="n-user-bar">
            <a class="n-bar" href="<?php echo url('/member/myivt');?>
">我的邀请<span class="bar-ext"><b class="ico-next"></b></span></a>
            <a class="n-bar" href="<?php echo url('/member/commission');?>
">佣金明细<span class="bar-ext"><b class="ico-next"></b></span></a>
        </div>
        <div class="n-user-bar">
            <a class="n-bar exit" href="<?php echo url('/member/doexit');?>
">退出登录</a>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(function(){
        if(location.hash=='#free'){
            $('.free-c').show();
        }

        $(".btn-sing").click(function(){
            $.post('/member/ajax_signin',{},function(data){
                if(data.error==1){
                    var params = ' ';
                    if(data.url){
                        params = function(){
                            location.href=data.url;
                        };
                    }
                    layer.alert(data.msg,8,params);
                }else{
                    layer.alert(data.msg,1,function(){ location.reload(); });
                }
            },'json');
        });
    });
    function getPoints(type){
        $.post('/content/getPoints',{ type:type },function(data){
            if(data.msg){
                if(data.error == 0){
                    layer.msg(data.msg, 2, { type:1 });
                    $('#'+type).hide();
                }else{
                    layer.tips(data.msg, '#'+type+' span', { time:3 });
                }
            }
        },"json");
    }
</script>
<script type="text/javascript">
    /*签到模块日期捕捉：*/
    function week(){
        var objDate= new Date();
        var week = objDate.getDay();
        switch(week)
        {
            case 0:
                week="周日签到";
                break;
            case 1:
                week="周一签到";
                break;
            case 2:
                week="周二签到";
                break;
            case 3:
                week="周三签到";
                break;
            case 4:
                week="周四签到";
                break;
            case 5:
                week="周五签到";
                break;
            case 6:
                week="周六签到";
                break;
        }
        $("#sing_for_number").html( week );
    }

    $(function(){
        week();

        <?php if ($_smarty_tpl->tpl_vars['bonus_count']->value['count_dis']>0){?>
        $("#layerTip-bonus").each(function(){
            layer.tips('您有<?php echo $_smarty_tpl->tpl_vars['bonus_count']->value['count_dis'];?>
<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_bonus_unit'];?>
<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_bonus'];?>
快过期', $(this), { time:0 });
        });
        <?php }?>

        $(".singer_r_img,.btn-sing").click(function(){
            $.post('/member/ajax_signin',{},function(data){
                if(data.error==1){
                    var params = ' ';
                    if(data.url){
                        params = function(){
                            location.href=data.url;
                        };
                    }
                    layer.alert(data.msg,8,params);
                }else{
                    $(".singer_r_img").addClass("current");
                    layer.alert(data.msg,1,function(){ location.reload(); });
                }
            },'json');
        });

    });
</script>
<?php echo $_smarty_tpl->getSubTemplate ("footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>