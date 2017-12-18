<?php /* Smarty version Smarty-3.1.13, created on 2015-11-28 19:19:29
         compiled from "H:\projects\web\lnest02\1yyg\webapps\www\views\cn\yunbuy\success.html" */ ?>
<?php /*%%SmartyHeaderCode:3179156598dc175f5d7-37894556%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'dbc38a5ccd4e77e43c39c07f5b5f233a9432771d' => 
    array (
      0 => 'H:\\projects\\web\\lnest02\\1yyg\\webapps\\www\\views\\cn\\yunbuy\\success.html',
      1 => 1448704123,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3179156598dc175f5d7-37894556',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'order' => 0,
    'site_config' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_56598dc180e286_73561437',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56598dc180e286_73561437')) {function content_56598dc180e286_73561437($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<link rel="stylesheet" href="<?php echo url('/style/css/yiyuanbao.css');?>
">
<style type="text/css">
    .g-body{ border:1px solid #ccc; width: 1150px; margin:20px auto 0; padding: 60px 0 70px; }
    #progress{ float: none; margin:0 auto; display: block; }
    .pay_success{ width: 1000px; min-height:300px; margin:30px auto 0; background: #f6f6f6 url('/style/images/yes.gif') 50px center no-repeat; }
    .pay_success h2{ font-size: 50px;}
    .pay_success .txt{ padding: 70px 0 70px 320px; }
    .pay_success .p1{ font-weight: bold; font-size: 30px; }
    .pay_success .p2{ font-size: 18px; }
    .share_box{ width: 360px; margin: 10px 0 0; padding:10px;background:#ececec;
        -moz-border-radius: 10px;
        -webkit-border-radius: 10px;
        border-radius:10px; }
</style>
<div class="g-body blue">
    <div class="m-header">
        <div class="g-wrap">
            <?php if (isset($_smarty_tpl->tpl_vars["progress"])) {$_smarty_tpl->tpl_vars["progress"] = clone $_smarty_tpl->tpl_vars["progress"];
$_smarty_tpl->tpl_vars["progress"]->value = "3"; $_smarty_tpl->tpl_vars["progress"]->nocache = null; $_smarty_tpl->tpl_vars["progress"]->scope = 0;
} else $_smarty_tpl->tpl_vars["progress"] = new Smarty_variable("3", null, 0);?>
            <?php echo $_smarty_tpl->getSubTemplate ("yunbuy/progress_cart.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

        </div>
    </div>
    <div class="clear"></div>
    <dl class="pay_success">
        <div class="txt">
            <h2 class="color01">恭喜您，支付成功！</h2>
            <p class="p1">请等待系统为您揭晓！</p>
            <p class="p2">您现在可以<a href="<?php echo url('/member/db');?>
" class="color01">查看夺宝记录</a>或<a href="<?php echo url('/yunbuy');?>
" class="color01">继续夺宝</a></p>
            <?php if ($_smarty_tpl->tpl_vars['order']->value['sharecode']){?>
            <div class="share_box">
                您的分享码：<b class="color01" style="font-size: 24px;"><?php echo $_smarty_tpl->tpl_vars['order']->value['sharecode'];?>
</b>
                <div class="bdsharebuttonbox"><a href="#" class="bds_more" data-cmd="more"></a><a title="分享到QQ空间" href="#" class="bds_qzone" data-cmd="qzone"></a><a title="分享到新浪微博" href="#" class="bds_tsina" data-cmd="tsina"></a><a title="分享到腾讯微博" href="#" class="bds_tqq" data-cmd="tqq"></a><a title="分享到人人网" href="#" class="bds_renren" data-cmd="renren"></a><a title="分享到微信" href="#" class="bds_weixin" data-cmd="weixin"></a></div>
                <script>window._bd_share_config= { "common": { "bdSnsKey": { } ,"bdText":"#225<?php echo $_smarty_tpl->tpl_vars['site_config']->value['site_name'];?>
# 分享码 <?php echo $_smarty_tpl->tpl_vars['order']->value['sharecode'];?>
使用即可免费夺宝哦！","bdUrl":"<?php echo url();?>
","bdMini":"2","bdPic":"<?php echo url();?>
/style/images/hd2.png","bdStyle":"0","bdSize":"16" } ,"share": { } };with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];</script>
                <b style="font-size: 14px;">分享给您的<b class="color01"><?php echo $_smarty_tpl->tpl_vars['site_config']->value['allow_time'];?>
</b>个小伙伴使用,每次您都将获得<b class="color01"><?php echo $_smarty_tpl->tpl_vars['site_config']->value['order_back'];?>
</b>元返利！</b>
            </div>
            <?php }?>
        </div>
    </dl>
</div>
<?php echo $_smarty_tpl->getSubTemplate ("footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>