<?php /* Smarty version Smarty-3.1.13, created on 2015-12-02 17:12:05
         compiled from "E:\projects\web\lnest\1yyg225\webapps\www\views\cn\mobile\member\index.html" */ ?>
<?php /*%%SmartyHeaderCode:26532565eb5e5264194-96824198%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '626363fea3184cef754cccc6d7e780d2e710bdbc' => 
    array (
      0 => 'E:\\projects\\web\\lnest\\1yyg225\\webapps\\www\\views\\cn\\mobile\\member\\index.html',
      1 => 1446428973,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '26532565eb5e5264194-96824198',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'member' => 0,
    'data' => 0,
    'site_config' => 0,
    'is_signin' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_565eb5e53b7f67_50782900',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_565eb5e53b7f67_50782900')) {function content_565eb5e53b7f67_50782900($_smarty_tpl) {?><?php if (isset($_smarty_tpl->tpl_vars['header'])) {$_smarty_tpl->tpl_vars['header'] = clone $_smarty_tpl->tpl_vars['header'];
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
">
                    <img src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['zz'][0][0]->_callViewFunc(array('mod'=>'photo','source'=>$_smarty_tpl->tpl_vars['member']->value['photo'],'size'=>'80'),$_smarty_tpl);?>
" />
                </a>
            </div>
            <div class="u-data">
                <ul>
                    <li>可用保证金：<?php echo price_format($_smarty_tpl->tpl_vars['member']->value['user_money']);?>
</li>
                    <li>云购币：<?php echo $_smarty_tpl->tpl_vars['member']->value['db_points'];?>
</li>
                    <li>冻结保证金：<?php echo price_format($_smarty_tpl->tpl_vars['member']->value['frozen_money']);?>
</li>
                </ul>
                <a href="<?php echo url('/member/recchage');?>
">充值</a>
                <a class="b" href="<?php echo url('/member/withdraw');?>
">提现</a>
            </div>
        </div>
    </div>

    <div class="u-nav" id="free">
        <div class="free-m" style="display: none;">
            <div class="free-a"><a href="javascript:;" class="color01 btn-small" onclick="$('.free-c').fadeToggle()"><b>做任务赚拍币</b></a></div>
            <div class="free-c">
                <ul>
                    <li class="ui-clr" id="isPhoto">
                        <b>1.</b><?php if ($_smarty_tpl->tpl_vars['data']->value['memberOther']['isPhoto']!=1){?><a href="javascript:;" onclick="getPoints('isPhoto')" class="btn-small ui-right">领取</a><?php }else{ ?><i class="ui-right color03">已领取</i><?php }?>
                        <span><a href="<?php echo url('/member/photo');?>
" class="color02">“上传头像”</a>即可领取<?php echo $_smarty_tpl->tpl_vars['site_config']->value['isPhoto'];?>
拍币<span class="color03">（限领一次）</span>。</span>
                    </li>
                    <li class="ui-clr" id="isVoice">
                        <b>2.</b><?php if ($_smarty_tpl->tpl_vars['data']->value['memberOther']['isVoice']!=1){?><a href="javascript:;" onclick="getPoints('isVoice')" class="btn-small ui-right">领取</a><?php }else{ ?><i class="ui-right color03">已领取</i><?php }?>
                        <span><a href="<?php echo url('/member/verifyVoice');?>
" class="color02">“语音认证”</a>即可领取<?php echo $_smarty_tpl->tpl_vars['site_config']->value['isVoice'];?>
云购币抵用券<span class="color03">（限领一次 ）</span>。</span>
                    </li>
                    <li class="ui-clr" id="isIdcard">
                        <b>3.</b><?php if ($_smarty_tpl->tpl_vars['data']->value['memberOther']['isIdcard']!=1){?><a href="javascript:;" onclick="getPoints('isIdcard')" class="btn-small ui-right">领取</a><?php }else{ ?><i class="ui-right color03">已领取</i><?php }?>
                        <span><a href="<?php echo url('/member/verifyidcard');?>
" class="color02">“实名认证”</a>即可领取<?php echo $_smarty_tpl->tpl_vars['site_config']->value['isIdcard'];?>
云购币抵用券<span class="color03">（限领一次）</span>。</span>
                    </li>
                    <li class="ui-clr" id="isMail">
                        <b>4.</b><?php if ($_smarty_tpl->tpl_vars['data']->value['memberOther']['isMail']!=1){?><a href="javascript:;" onclick="getPoints('isMail')" class="btn-small ui-right">领取</a><?php }else{ ?><i class="ui-right color03">已领取</i><?php }?>
                        <span><a href="<?php echo url('/member/verifyEmail');?>
" class="color02">“邮箱认证”</a>即可领取<?php echo $_smarty_tpl->tpl_vars['site_config']->value['isMail'];?>
云购币抵用券<span class="color03">（限领一次）</span>。</span>
                    </li>
                    <li class="ui-clr">
                        <b>5.</b><a href="<?php echo url('/member/myivt');?>
" class="btn-small ui-right">立即邀请</a>
                        <span><a href="<?php echo url('/member/myivt');?>
" class="color02">“邀请好友”</a>每推荐1位好友注册，领5-25拍币，抢拍币捷径。</span>
                    </li>
                    <li class="ui-clr" id="isSign">
                        <b>6.</b><?php if ($_smarty_tpl->tpl_vars['is_signin']->value==0){?><a href="javascript:;" class="btn-small ui-right btn-sing">立即签到</a><?php }else{ ?><i class="ui-right color03">今日已签到</i><?php }?>
                        <span>每日签到免费得拍币，语音认证后第一次签到可获得20拍币（未语音认证仅前5天领取<?php echo $_smarty_tpl->tpl_vars['site_config']->value['signin_jl'];?>
拍币！<span class="color03">（每日限领一次）</span>。</span>
                    </li>
                    <li class="ui-clr" id="isDaren">
                        <b>7.</b><a href="javascript:;" onclick="getPoints('isDaren')" class="btn-small ui-right">领取</a>
                        <span>云购达人：参与人次（不含体验拍和免费云购商品）参与次数每超过50次后获<?php echo $_smarty_tpl->tpl_vars['site_config']->value['isDaren'];?>
拍币<span class="color03">（不限次数）</span>。</span>
                    </li>
                    <li class="ui-clr" id="isJpDaren" style="display: none;">
                        <b>8.</b><a href="javascript:;" onclick="getPoints('isJpDaren')" class="btn-small ui-right">领取</a>
                        <span>竞拍达人：参与竞拍商品数（不含体验拍和免费云购商品）每超过50次后获<?php echo $_smarty_tpl->tpl_vars['site_config']->value['isJpDaren'];?>
拍币<span class="color03">（不限次数）</span>。</span>
                    </li>
                </ul>
            </div>
        </div>
        <div class="n-user-bar" style="display: none;">
            <a class="n-bar" href="<?php echo url('/member/auction');?>
">竞拍记录<span class="bar-ext"><b class="ico-next"></b></span></a>
            <a class="n-bar" href="<?php echo url('/member/cod');?>
">中奖领取<span class="bar-ext"><b class="ico-next"></b></span></a>
        </div>
        <div class="n-user-bar">
            <a class="n-bar" href="<?php echo url('/member/db');?>
">云购记录<span class="bar-ext"><b class="ico-next"></b></span></a>
            <a class="n-bar" href="<?php echo url('/member/luck');?>
">中奖记录<span class="bar-ext"><b class="ico-next"></b></span></a>
        </div>
        <div class="n-user-bar">
            <a class="n-bar" href="<?php echo url('/member/order');?>
">订单管理<span class="bar-ext"><b class="ico-next"></b></span></a>
            <!--<a class="n-bar" href="<?php echo url(('/minfo?id=').(@constant('MID')));?>
#share">我的晒单<span class="bar-ext"><b class="ico-next"></b></span></a>-->
            <a class="n-bar" href="<?php echo url('/member/myivt');?>
">我的邀请<span class="bar-ext"><b class="ico-next"></b></span></a>
            <a class="n-bar" href="<?php echo url('/member/accountdetail');?>
">资金管理<span class="bar-ext"><b class="ico-next"></b></span></a>
            <a class="n-bar" href="<?php echo url('/member/safe');?>
">帐户安全<span class="bar-ext"><b class="ico-next"></b></span></a>
            <a class="n-bar" href="<?php echo url('/member/address');?>
">收货地址<span class="bar-ext"><b class="ico-next"></b></span></a>
            <a class="n-bar" href="<?php echo url('/member/info');?>
">个人信息<span class="bar-ext"><b class="ico-next"></b></span></a>
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
<?php echo $_smarty_tpl->getSubTemplate ("footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>