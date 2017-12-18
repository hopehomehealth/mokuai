<?php /* Smarty version Smarty-3.1.13, created on 2015-12-02 10:43:54
         compiled from "E:\projects\web\lnest\1yyg225\webapps\www\views\cn\member\index.html" */ ?>
<?php /*%%SmartyHeaderCode:20283565e5aeaea83e4-52104265%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8ef89eccc02be72c54e664b1fa2d25969f0e955d' => 
    array (
      0 => 'E:\\projects\\web\\lnest\\1yyg225\\webapps\\www\\views\\cn\\member\\index.html',
      1 => 1448849737,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20283565e5aeaea83e4-52104265',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'data' => 0,
    'site_config' => 0,
    'is_signin' => 0,
    'tagGG' => 0,
    'm' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_565e5aeb16d8e7_62309614',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_565e5aeb16d8e7_62309614')) {function content_565e5aeb16d8e7_62309614($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'E:\\projects\\web\\lnest\\1yyg225\\system\\smarty\\plugins\\modifier.date_format.php';
?><?php echo $_smarty_tpl->getSubTemplate ("header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<script src="/style/lefttime.js"></script>
<link rel="stylesheet" href="<?php echo url('/style/css/member.css');?>
">
<?php echo $_smarty_tpl->getSubTemplate ("ur_here.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div id="container">
<div class="fn-clear mt20 pb20">
    <?php echo $_smarty_tpl->getSubTemplate ("member/menu.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

    <div class="fn-right hy-r">

        <div class="fn-clear">
            <?php if ($_smarty_tpl->tpl_vars['data']->value['count_auc']>0||$_smarty_tpl->tpl_vars['data']->value['count_cod']>0||$_smarty_tpl->tpl_vars['data']->value['count_codDb']>0){?>
            <div class="hy-tips mb10">
                <ul>
                    <?php if ($_smarty_tpl->tpl_vars['data']->value['count_auc']>0){?>
                    <li>您有<?php echo $_smarty_tpl->tpl_vars['data']->value['count_auc'];?>
条竞拍最高价获得记录未购买，<a href="<?php echo url('/member/auction?status=2');?>
">点击去购买</a>！</li>
                    <?php }?>

                    <?php if ($_smarty_tpl->tpl_vars['data']->value['count_cod']>0){?>
                    <li>您有<?php echo $_smarty_tpl->tpl_vars['data']->value['count_cod'];?>
条竞拍中奖记录未领取，<a href="<?php echo url('/member/cod');?>
">点击去领取</a>！</li>
                    <?php }?>

                    <?php if ($_smarty_tpl->tpl_vars['data']->value['count_codDb']>0){?>
                    <li>您有<?php echo $_smarty_tpl->tpl_vars['data']->value['count_codDb'];?>
条夺宝中奖记录未领取，<a href="<?php echo url('/member/luck');?>
">点击去领取</a>！</li>
                    <?php }?>
                </ul>
            </div>
            <?php }?>

            <div class="hy-gg" id="free">
                <div class="title">
                    <h2>做任务，赚拍币</h2>
                </div>
                <ul class="pb-list fn-clear">
                    <?php if ($_smarty_tpl->tpl_vars['data']->value['memberOther']['isVoice']!=1){?>
                    <li id="isVoice"><a href="javascript:;" onclick="getPoints('isVoice')" class="btn btn-green">领取</a><span><a href="<?php echo url('/member/verifyVoice');?>
" class="color01">“语音认证获得特权”</a>即可获得<?php echo $_smarty_tpl->tpl_vars['site_config']->value['isVoice'];?>
<a>夺宝币抵用券</a>！<span class="color03">（每个用户限领一次 ）</span>。</span></li>
                    <?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['data']->value['memberOther']['isPhoto']!=1){?>
                    <li id="isPhoto"><a href="javascript:;" onclick="getPoints('isPhoto')" class="btn btn-green">领取</a><span><a href="<?php echo url('/member/photo');?>
" class="color02">“上传头像”</a>即可领取<?php echo $_smarty_tpl->tpl_vars['site_config']->value['isPhoto'];?>
<a href="/content/index/78" target="_blank" class="layerTip" _title="拍币用途">拍币</a><span class="color03">（每个用户限领一次）</span>。</span></li>
                    <?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['data']->value['memberOther']['isIdcard']!=1){?>
                    <li id="isIdcard"><a href="javascript:;" onclick="getPoints('isIdcard')" class="btn btn-green">领取</a><span><a href="<?php echo url('/member/verifyidcard');?>
" class="color02">“实名认证”</a>即可领取<?php echo $_smarty_tpl->tpl_vars['site_config']->value['isIdcard'];?>
<a>夺宝币抵用券</a><span class="color03">（每个用户限领一次）</span>。</span></li>
                    <?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['data']->value['memberOther']['isMail']!=1){?>
                    <li id="isMail"><a href="javascript:;" onclick="getPoints('isMail')" class="btn btn-green">领取</a><span><a href="<?php echo url('/member/verifyEmail');?>
" class="color02">“邮箱认证”</a>即可领取<?php echo $_smarty_tpl->tpl_vars['site_config']->value['isMail'];?>
<a>夺宝币抵用券</a><span class="color03">（每个用户限领一次）</span>。</span></li>
                    <?php }?>
                    <li><a href="<?php echo url('/member/myivt');?>
" class="btn btn-green">立即邀请</a><span><a href="<?php echo url('/member/myivt');?>
" class="color02">“邀请好友”</a>每推荐1位好友注册，领5-25拍币，抢拍币捷径。<a href="/content/index/78" target="_blank" class="layerTip" _title="拍币用途">拍币</a><span class="color03"></span>。</span></li>
                    <?php if ($_smarty_tpl->tpl_vars['is_signin']->value==0){?>
                    <li id="isSign"><a class="btn btn-green btn-sing">立即签到</a><span>每日签到：即可获取5<a href="/content/index/78" target="_blank" class="layerTip" _title="拍币用途">拍币</a>，语音认证后第一次签到可获得20拍币（未语音认证仅前5天领取<?php echo $_smarty_tpl->tpl_vars['site_config']->value['signin_jl'];?>
拍币！ <span class="color03">（每日一次）</span>。</span></li>
                    <?php }?>
                    <li id="isDaren"><a href="javascript:;" onclick="getPoints('isDaren')" class="btn btn-green">领取</a><span>夺宝达人：参与人次（不含体验拍和免费夺宝商品）参与次数每超过50次后获<?php echo $_smarty_tpl->tpl_vars['site_config']->value['isDaren'];?>
个<a href="/content/index/78" target="_blank" class="layerTip" _title="拍币用途">拍币</a>！<span class="color03">（不限次数）</span>。</span></li>
                    <!--<li id="isJpDaren"><a href="javascript:;" onclick="getPoints('isJpDaren')" class="btn btn-green">领取</a><span>竞拍达人：参与竞拍商品数（不含体验拍和免费夺宝商品）每超过50次后获<?php echo $_smarty_tpl->tpl_vars['site_config']->value['isJpDaren'];?>
个<a href="/content/index/78" target="_blank" class="layerTip" _title="拍币用途">拍币</a>！<span class="color03">（不限次数 ）</span>。</span></li>-->
                </ul>
            </div>
        </div>

        <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['zz'][0][0]->_callViewFunc(array('mod'=>'content','var'=>'tagGG','module'=>'article','field'=>'id,title,url,createtime','catid'=>@constant('NOTE_ID'),'limit'=>5),$_smarty_tpl);?>

        <?php if ($_smarty_tpl->tpl_vars['tagGG']->value){?>
        <div class="hy-gg hy-noborder">
            <div class="title">
                <h2>公告信息</h2>
            </div>
            <ul class="gg-list fn-clear">
                <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['tagGG']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>
                <li><a href="<?php echo url($_smarty_tpl->tpl_vars['m']->value['url']);?>
" style="color:#e54048"><?php echo $_smarty_tpl->tpl_vars['m']->value['title'];?>
</a><span style="color: #999"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['m']->value['createtime'],'Y-m-d');?>
</span></li>
                <?php } ?>
            </ul>
        </div>
        <?php }?>

        <?php if (count($_smarty_tpl->tpl_vars['data']->value['mydb'])>3){?>
        <div class="fn-clear hy-tjxh hy-noborder">
            <div class="title">
                <h2>我的夺宝</h2>
            </div>
            <div class="cqhxh-lsit">
                <ul>
                    <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['data']->value['mydb']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>
                    <li>
                        <div class="w-goods">
                            <div class="w-goods-pic">
                                <?php if ($_smarty_tpl->tpl_vars['m']->value['type']==2){?><img class="zjf" height="55" src="/style/images/daz.png" width="47" /><?php }?>
                                <a href="<?php echo url(('/yunbuy/detail/').($_smarty_tpl->tpl_vars['m']->value['buy_id']));?>
" target="_blank" title="<?php echo $_smarty_tpl->tpl_vars['m']->value['title'];?>
"><img alt="<?php echo $_smarty_tpl->tpl_vars['m']->value['title'];?>
" src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['zz'][0][0]->_callViewFunc(array('mod'=>'fileurl','source'=>$_smarty_tpl->tpl_vars['m']->value['imgurl_src'],'width'=>205,'height'=>127,'type'=>0),$_smarty_tpl);?>
"></a>
                            </div>
                            <p class="w-goods-title">
                                <a href="<?php echo url(('/yunbuy/detail/').($_smarty_tpl->tpl_vars['m']->value['buy_id']));?>
" target="_blank" title="<?php echo $_smarty_tpl->tpl_vars['m']->value['title'];?>
">(第<?php echo $_smarty_tpl->tpl_vars['m']->value['qishu'];?>
期) <?php echo $_smarty_tpl->tpl_vars['m']->value['goods_name'];?>
</a></p>
                            <p class="w-goods-price">价值：<?php echo $_smarty_tpl->tpl_vars['m']->value['buy']['goods_price'];?>
 <?php if ($_smarty_tpl->tpl_vars['m']->value['type']==1){?>人次<?php }else{ ?>拍币<?php }?> </p>
                            <p>总需：<b class="color01"><?php echo $_smarty_tpl->tpl_vars['m']->value['buy']['need_num'];?>
</b> <?php if ($_smarty_tpl->tpl_vars['m']->value['type']==1){?>人次<?php }else{ ?>拍币<?php }?>，</p>
                            <p>还剩：<b class="color01"><?php echo $_smarty_tpl->tpl_vars['m']->value['buy']['end_num'];?>
</b> <?php if ($_smarty_tpl->tpl_vars['m']->value['type']==1){?>人次<?php }else{ ?>拍币<?php }?></p>
                            <div class="w-goods-opr1"><a href="<?php echo url(('/yunbuy/detail/').($_smarty_tpl->tpl_vars['m']->value['buy_id']));?>
" style="" target="_blank">详情&gt; </a></div>
                        </div>
                    </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
        <?php }?>

        <?php if (count($_smarty_tpl->tpl_vars['data']->value['my'])>3){?>
        <div class="fn-clear hy-tjxh hy-noborder">
            <div class="title">
                <h2>我的竞拍</h2>
            </div>
            <div class="cqhxh-lsit">
                <ul>
                    <?php  $_smarty_tpl->tpl_vars['auction'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['auction']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['data']->value['my']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['auction']->key => $_smarty_tpl->tpl_vars['auction']->value){
$_smarty_tpl->tpl_vars['auction']->_loop = true;
?>
                    <?php echo $_smarty_tpl->getSubTemplate ("auction/lbi_auction.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

                    <?php } ?>
                </ul>
            </div>
        </div>
        <?php }?>

        <?php if ($_smarty_tpl->tpl_vars['data']->value['love']){?>
        <div class="fn-clear hy-tjxh hy-noborder">
            <div class="title">
                <h2>猜你喜欢</h2>
            </div>
            <div class="cqhxh-lsit">
                <ul>
                    <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['data']->value['love']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>
                    <li>
                        <div class="w-goods">
                            <div class="w-goods-pic">
                                <?php if ($_smarty_tpl->tpl_vars['m']->value['type']==2){?><img class="zjf" height="55" src="/style/images/daz.png" width="47" /><?php }?>
                                <a href="<?php echo url(('/yunbuy/detail/').($_smarty_tpl->tpl_vars['m']->value['buy_id']));?>
" target="_blank" title="<?php echo $_smarty_tpl->tpl_vars['m']->value['title'];?>
"><img alt="<?php echo $_smarty_tpl->tpl_vars['m']->value['title'];?>
" src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['zz'][0][0]->_callViewFunc(array('mod'=>'fileurl','source'=>$_smarty_tpl->tpl_vars['m']->value['imgurl_src'],'width'=>205,'height'=>127,'type'=>0),$_smarty_tpl);?>
"></a>
                            </div>
                            <p class="w-goods-title">
                                <a href="<?php echo url(('/yunbuy/detail/').($_smarty_tpl->tpl_vars['m']->value['buy_id']));?>
" target="_blank" title="<?php echo $_smarty_tpl->tpl_vars['m']->value['title'];?>
">(第<?php echo $_smarty_tpl->tpl_vars['m']->value['qishu'];?>
期) <?php echo $_smarty_tpl->tpl_vars['m']->value['goods_name'];?>
</a></p>
                            <p class="w-goods-price">价值：<?php echo $_smarty_tpl->tpl_vars['m']->value['buy']['goods_price'];?>
 <?php if ($_smarty_tpl->tpl_vars['m']->value['type']==1){?>人次<?php }else{ ?>拍币<?php }?> </p>
                            <p>总需：<b class="color01"><?php echo $_smarty_tpl->tpl_vars['m']->value['buy']['need_num'];?>
</b> <?php if ($_smarty_tpl->tpl_vars['m']->value['type']==1){?>人次<?php }else{ ?>拍币<?php }?>，</p>
                            <p>还剩：<b class="color01"><?php echo $_smarty_tpl->tpl_vars['m']->value['buy']['end_num'];?>
</b> <?php if ($_smarty_tpl->tpl_vars['m']->value['type']==1){?>人次<?php }else{ ?>拍币<?php }?></p>
                            <div class="w-goods-opr1"><a href="<?php echo url(('/yunbuy/detail/').($_smarty_tpl->tpl_vars['m']->value['buy_id']));?>
" style="" target="_blank">详情&gt; </a></div>
                        </div>
                    </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
        <?php }?>

    </div>
</div>
</div>

<script type="text/javascript">
    $(function(){
        welcome_time();
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

<?php echo $_smarty_tpl->getSubTemplate ("footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>