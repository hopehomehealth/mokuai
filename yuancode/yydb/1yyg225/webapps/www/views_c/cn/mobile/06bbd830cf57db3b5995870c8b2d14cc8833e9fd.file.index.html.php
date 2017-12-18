<?php /* Smarty version Smarty-3.1.13, created on 2017-01-11 11:14:40
         compiled from "/data/01/html/1yyg225/webapps/www/views/cn/mobile/member/index.html" */ ?>
<?php /*%%SmartyHeaderCode:1699370562584cbe142a6211-23453830%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '06bbd830cf57db3b5995870c8b2d14cc8833e9fd' => 
    array (
      0 => '/data/01/html/1yyg225/webapps/www/views/cn/mobile/member/index.html',
      1 => 1484103638,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1699370562584cbe142a6211-23453830',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_584cbe143c9e00_47486386',
  'variables' => 
  array (
    'member' => 0,
    'L' => 0,
    'bonus_count' => 0,
    'site_config' => 0,
    'data' => 0,
    'is_signin' => 0,
    'business_power' => 0,
    'business_row' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_584cbe143c9e00_47486386')) {function content_584cbe143c9e00_47486386($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("top.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<link rel="stylesheet" href="/style/mobile/css_02/font/iconfont.css">
<link rel="stylesheet" href="/style/mobile/css/bootstrap.css">
<link rel="stylesheet" href="/style/mobile/css_02/style.css">
<link rel="stylesheet" href="/style/mobile/css_02/center.css">
<link rel="stylesheet" href="/style/mobile/css/member.css">
<div class="center">
    <div class="center-top main-pd">
        <span>
            <a href="javascript:;" class="singer_r_img"><i class="iconfont icon-qiandao"></i></a>
            <a href="/member/info"><i class="iconfont icon-shezhi"></i></a>
            <a href="/member/message"><i class="iconfont icon-xiaoxi"></i></a>
        </span>
    </div>
    <dl class="center-top1 main-pd">
        <dt><a href="/member/photo"><img src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['zz'][0][0]->_callViewFunc(array('mod'=>'photo','source'=>$_smarty_tpl->tpl_vars['member']->value['photo'],'size'=>'80'),$_smarty_tpl);?>
" /></a></dt>
        <dd>
            <p class="center-top2">
                <label>
                    <span style="width: 100%"><?php if ($_smarty_tpl->tpl_vars['member']->value['nickname']){?><?php echo $_smarty_tpl->tpl_vars['member']->value['nickname'];?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['member']->value['username'];?>
<?php }?>（<?php echo (($tmp = @$_smarty_tpl->tpl_vars['member']->value['rank_name'])===null||$tmp==='' ? '普通会员' : $tmp);?>
）</span>
                    <span>经验：<?php echo $_smarty_tpl->tpl_vars['member']->value['rank_points'];?>
</span>
                    <span><?php echo $_smarty_tpl->tpl_vars['L']->value['unit_pay_points'];?>
：<?php echo $_smarty_tpl->tpl_vars['member']->value['pay_points'];?>
</span>
                    <span><?php echo $_smarty_tpl->tpl_vars['L']->value['unit_db_points'];?>
：<?php echo $_smarty_tpl->tpl_vars['member']->value['db_points'];?>
</span>
                    <span id="layerTip-bonus"><?php echo $_smarty_tpl->tpl_vars['L']->value['unit_bonus'];?>
：<?php echo $_smarty_tpl->tpl_vars['bonus_count']->value['money'];?>
</span>
                </label>
            </p>
            <p class="center-top3">
                <span>余额：<font><?php echo price_format($_smarty_tpl->tpl_vars['member']->value['user_money']);?>
</font></span>
            </p>
        </dd>
    </dl>
</div>

<p class="center-top3" style="padding:10px 10px 0;">
    <?php if ($_smarty_tpl->tpl_vars['site_config']->value['apply_jufu']!=1){?>
    <a href="<?php echo url('/member/recchage');?>
" style="margin-right: 5px;">充值</a>
    <?php }?>
    <a href="/member/change_db" style="margin-right:5px;">兑换<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_db_points'];?>
</a>
    <a href="javascript:;" onclick="$('.free-c').fadeToggle()" style="margin-right:5px;">做任务赚币</a>
    <br class="clear" />
</p>
<?php if ($_smarty_tpl->tpl_vars['data']->value['isfree']){?>
<div class="free-m">
    <div class="free-c">
        <ul>
            <?php if ($_smarty_tpl->tpl_vars['site_config']->value['isPhoto']>0&&$_smarty_tpl->tpl_vars['data']->value['memberOther']['isPhoto']!=1){?>
            <li class="ui-clr" id="isPhoto">
                <b>1.</b><?php if ($_smarty_tpl->tpl_vars['data']->value['memberOther']['isPhoto']!=1){?><a href="javascript:;" onclick="getPoints('isPhoto')" class="btn-small ui-right">领取</a><?php }else{ ?><i class="ui-right color03">已领取</i><?php }?>
                <span><a href="<?php echo url('/member/photo');?>
" class="color02">“上传头像”</a>即可领取<?php echo $_smarty_tpl->tpl_vars['site_config']->value['isPhoto'];?>
<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_pay_points'];?>
<span class="color03">（限领一次）</span>。</span>
            </li>
            <?php }?>
            <?php if ($_smarty_tpl->tpl_vars['site_config']->value['isIdcard']>0&&$_smarty_tpl->tpl_vars['data']->value['memberOther']['isIdcard']!=1){?>
            <li class="ui-clr" id="isIdcard">
                <b>2.</b><?php if ($_smarty_tpl->tpl_vars['data']->value['memberOther']['isIdcard']!=1){?><a href="javascript:;" onclick="getPoints('isIdcard')" class="btn-small ui-right">领取</a><?php }else{ ?><i class="ui-right color03">已领取</i><?php }?>
                <span><a href="<?php echo url('/member/verifyidcard');?>
" class="color02">“实名认证”</a>即可领取<?php echo $_smarty_tpl->tpl_vars['site_config']->value['isIdcard'];?>
<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_db_points'];?>
<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_bonus'];?>
<span class="color03">（限领一次）</span>。</span>
            </li>
            <?php }?>
            <?php if ($_smarty_tpl->tpl_vars['site_config']->value['isMail']>0&&$_smarty_tpl->tpl_vars['data']->value['memberOther']['isMail']!=1){?>
            <li class="ui-clr" id="isMail">
                <b>3.</b><?php if ($_smarty_tpl->tpl_vars['data']->value['memberOther']['isMail']!=1){?><a href="javascript:;" onclick="getPoints('isMail')" class="btn-small ui-right">领取</a><?php }else{ ?><i class="ui-right color03">已领取</i><?php }?>
                <span><a href="<?php echo url('/member/verifyEmail');?>
" class="color02">“邮箱认证”</a>即可领取<?php echo $_smarty_tpl->tpl_vars['site_config']->value['isMail'];?>
<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_db_points'];?>
<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_bonus'];?>
<span class="color03">（限领一次）</span>。</span>
            </li>
            <?php }?>
            <?php if ($_smarty_tpl->tpl_vars['site_config']->value['apply_jufu']!=1){?>
            <?php if ($_smarty_tpl->tpl_vars['site_config']->value['ivt1']>0){?>
            <li class="ui-clr">
                <b>4.</b><a href="<?php echo url('/member/myivt');?>
" class="btn-small ui-right">立即邀请</a>
                <span><a href="<?php echo url('/member/myivt');?>
" class="color02">“邀请好友”</a>每推荐1位好友注册，领<?php echo $_smarty_tpl->tpl_vars['site_config']->value['ivt1'];?>
<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_pay_points'];?>
。</span>
            </li>
            <?php }?>
            <?php }?>
            <?php if ($_smarty_tpl->tpl_vars['site_config']->value['signin_jl']>0&&$_smarty_tpl->tpl_vars['is_signin']->value==0){?>
            <li class="ui-clr" id="isSign">
                <b>5.</b><?php if ($_smarty_tpl->tpl_vars['is_signin']->value==0){?><a href="javascript:;" class="btn-small ui-right btn-sing">立即签到</a><?php }else{ ?><i class="ui-right color03">今日已签到</i><?php }?>
                <span>每日签到免费得<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_pay_points'];?>
，语音认证后第一次签到可获得20<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_pay_points'];?>
！<span class="color03">（每日限领一次）</span>。</span>
            </li>
            <?php }?>
            <?php if ($_smarty_tpl->tpl_vars['site_config']->value['isDaren']>0){?>
            <li class="ui-clr" id="isDaren">
                <b>6.</b><a href="javascript:;" onclick="getPoints('isDaren')" class="btn-small ui-right">领取</a>
                <span><?php echo $_smarty_tpl->tpl_vars['L']->value['unit_yun'];?>
达人：参与人次（不含体验拍和免费<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_yun'];?>
商品）参与次数每超过50次后获<?php echo $_smarty_tpl->tpl_vars['site_config']->value['isDaren'];?>
<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_pay_points'];?>
<span class="color03">（不限次数）</span>。</span>
            </li>
            <?php }?>
            <!--<li class="ui-clr" id="isJpDaren" style="display: none;">
                <b>7.</b><a href="javascript:;" onclick="getPoints('isJpDaren')" class="btn-small ui-right">领取</a>
                <span><?php echo $_smarty_tpl->tpl_vars['L']->value['unit_pay'];?>
达人：参与<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_pay'];?>
商品数（不含体验拍和免费<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_yun'];?>
商品）每超过50次后获<?php echo $_smarty_tpl->tpl_vars['site_config']->value['isJpDaren'];?>
<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_pay_points'];?>
<span class="color03">（不限次数）</span>。</span>
            </li>-->
        </ul>
    </div>
</div>
<?php }?>
<?php if ($_smarty_tpl->tpl_vars['site_config']->value['index_skin']==2){?><?php }else{ ?>
<div class="center-1">
    <div class="center-2 main-pd">
        <a href="/member/db?type=2">
            <i class="iconfont icon-xiangyou"></i>
            <p>正在进行</p>
        </a>
        <a href="/member/db?type=3">
            <i class="iconfont icon-zuixinjiexiao1"></i>
            <p>已揭晓</p>
        </a>
        <a href="/member/db?type=4">
            <i class="iconfont icon-fenqigouwu"></i>
            <p>多期参与</p>
        </a>
    </div>
    <div class="center-3">
        <a href="<?php echo url('/member/db');?>
">
            <i class="iconfont icon-jiantou right"></i>
            <p><i class="iconfont icon-jilu-copy" style="color: #4eca89;"></i><?php echo $_smarty_tpl->tpl_vars['L']->value['unit_yun'];?>
记录</p>
        </a>
        <a href="<?php echo url('/member/luck');?>
">
            <i class="iconfont icon-jiantou right"></i>
            <p><i class="iconfont icon-jiangbei" style="color: #a2de2e;"></i><?php echo $_smarty_tpl->tpl_vars['L']->value['unit_winning'];?>
记录</p>
        </a>
    </div>
</div>
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['business_power']->value==1){?>
<?php if ($_smarty_tpl->tpl_vars['business_row']->value['bus_status']>9){?>
<div class="center-3 center-4">
    <a href="/store/index/<?php echo @constant('MID');?>
">
        <i class="iconfont icon-jiantou right"></i>
        <p><i class="iconfont icon-zhuye" style="color: #ffaa45;"></i>我的店铺</p>
    </a>
</div>
<?php }?>
<?php }?>

<div class="center-3 center-4">
    <a href="<?php echo url('/member/order');?>
">
        <i class="iconfont icon-jiantou right"></i>
        <p><i class="iconfont icon-order" style="color: #ffaa45;"></i>订单管理</p>
    </a>
    <?php if ($_smarty_tpl->tpl_vars['site_config']->value['apply_jufu']!=1){?>
    <a href="<?php echo url('/member/accountdetail');?>
">
        <i class="iconfont icon-jiantou right"></i>
        <p><i class="iconfont icon-zijinzhanghu" style="color: #fc7075;"></i>资金管理</p>
    </a>
    <?php }?>
    <a href="<?php echo url('/member/bonus');?>
">
        <i class="iconfont icon-jiantou right"></i>
        <p><i class="iconfont icon-zijinzhanghu" style="color: #fc7075;"></i>我的<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_bonus'];?>
</p>
    </a>
    <a href="<?php echo url('/member/safe');?>
">
        <i class="iconfont icon-jiantou right"></i>
        <p><i class="iconfont icon-anquan" style="color: #ffc239;"></i>账户安全</p>
    </a>
    <a href="<?php echo url('/member/address');?>
">
        <i class="iconfont icon-jiantou right"></i>
        <p><i class="iconfont icon-dizhi" style="color: #45e6b7;"></i>收货地址</p>
    </a>
    <a href="<?php echo url('/member/info');?>
">
        <i class="iconfont icon-jiantou right"></i>
        <p><i class="iconfont icon-gerenxinxi" style="color: #6b9cff;"></i>个人信息</p>
    </a>
    <a href="<?php echo url('/member/message');?>
">
        <i class="iconfont icon-jiantou right"></i>
        <p><i class="iconfont icon-youxiang" style="color: #f60;"></i>站内信</p>
    </a>
</div>
<div class="center-3 center-4">
	<?php if ($_smarty_tpl->tpl_vars['site_config']->value['apply_jufu']!=1){?>
    <a href="<?php echo url('/member/myivt');?>
">
        <i class="iconfont icon-jiantou right"></i>
        <p><i class="iconfont icon-yaoqing" style="color: #fc70a5;"></i>我的邀请</p>
    </a>
    <a href="<?php echo url('/member/commission');?>
">
        <i class="iconfont icon-jiantou right"></i>
        <p><i class="iconfont icon-zijinzhanghu" style="color: #fc7075;"></i>佣金明细</p>
    </a>
	<?php }?>
</div>
<div class="center-3 center-4" style="margin-bottom: 0">
    <a href="<?php echo url('/member/doexit');?>
">
        <i class="iconfont icon-jiantou right"></i>
        <p><i class="iconfont icon-01huiyuanzhongxin" style="color: #999;"></i>退出登录</p>
    </a>
</div>
<?php echo $_smarty_tpl->getSubTemplate ("footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<script type="text/javascript">
    $(function(){
        if(location.hash=='#free'){
            $('.free-c').show();
        }

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

<script type="text/javascript">
    $(function(){
        if(location.hash=='#free'){
            $('#free').css('border','2px solid #e54048');
        }
    });

    function getPoints(type){
        $.post('/content/getPoints',{ type:type },function(data){
            if(data.msg){
                if(data.error == 0){
                    layer.msg(data.msg, 2, { type:1 });
                    if(type!='isJpDaren' || type!='isDaren'){
                        $('#'+type).hide();
                    }
                }else{
                    layer.tips(data.msg, '#'+type+' span', { time:3 });
                }
            }
        },"json");
    }
</script>

<?php }} ?>