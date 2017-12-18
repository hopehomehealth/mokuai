<?php /* Smarty version Smarty-3.1.13, created on 2016-05-31 17:42:01
         compiled from "D:\test1yyg3.lnest.com\webapps\www\views\cn\mobile\top.html" */ ?>
<?php /*%%SmartyHeaderCode:66535660fee550c217-26454862%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f5daa9de2e1f920f4baa7925d20d8acb535f14c2' => 
    array (
      0 => 'D:\\test1yyg3.lnest.com\\webapps\\www\\views\\cn\\mobile\\top.html',
      1 => 1464683377,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '66535660fee550c217-26454862',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5660fee5617794_32171887',
  'variables' => 
  array (
    'seo' => 0,
    'viewport' => 0,
    'wechat' => 0,
    'signPackage' => 0,
    'nav' => 0,
    'header' => 0,
    'row' => 0,
    'mod' => 0,
    'cartNum' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5660fee5617794_32171887')) {function content_5660fee5617794_32171887($_smarty_tpl) {?><!doctype html>
<html lang="zh-cn" xml:lang="zh-cn">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <title><?php echo $_smarty_tpl->tpl_vars['seo']->value['title'];?>
</title>
    <meta charset="utf-8">
    <meta name="keywords" content="<?php echo $_smarty_tpl->tpl_vars['seo']->value['keywords'];?>
" />
    <meta name="description" content="<?php echo $_smarty_tpl->tpl_vars['seo']->value['description'];?>
" />
    <meta name="viewport" content="width=device-width,initial-scale=1<?php if ($_smarty_tpl->tpl_vars['viewport']->value=='pc'){?>,user-scalable=yes,maximum-scale=3<?php }else{ ?>,maximum-scale=2,user-scalable=no<?php }?>">
    <link rel="stylesheet" href="/style/mobile/css/common.css">
    <script src="/style/jquery-1.8.3.min.js"></script>
    <script type="text/javascript" src="/style/layer/layer.min.js"></script>
    <script type="text/javascript" src="/style/common.js"></script>
    <?php if ($_smarty_tpl->tpl_vars['wechat']->value&&$_SESSION['mid']){?>
    <script type="text/javascript" src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
    <script type="text/javascript">
        //微信端所有页面带邀请者ID
        wx.config({
            debug: false,
            appId: '<?php echo $_smarty_tpl->tpl_vars['signPackage']->value['appId'];?>
',
            timestamp: '<?php echo $_smarty_tpl->tpl_vars['signPackage']->value['timestamp'];?>
',
            nonceStr: '<?php echo $_smarty_tpl->tpl_vars['signPackage']->value['nonceStr'];?>
',
            signature: '<?php echo $_smarty_tpl->tpl_vars['signPackage']->value['signature'];?>
',
            jsApiList: [
                //所有要调用的 API 都要加到这个列表中
                'checkJsApi',
                'onMenuShareTimeline',
                'onMenuShareAppMessage',
                'onMenuShareQQ'
            ]
        });

        <?php if ($_smarty_tpl->tpl_vars['nav']->value!='myivt'){?>
        var href = location.href;
        if(href.indexOf('?')>=0){ href += '&'; }
        else{ href += '?'; }
        href += 'iv=<?php echo $_SESSION['mid'];?>
';

        wx.ready(function () {
            //分享给朋友
            wx.onMenuShareAppMessage({
                link: href
            });
            //分享到朋友圈
            wx.onMenuShareTimeline({
                link: href
            });
            //分享到QQ
            wx.onMenuShareQQ({
                link: href
            });
        })
        <?php }?>
    </script>
    <?php }?>
</head>
<body>

<?php if ($_smarty_tpl->tpl_vars['header']->value=='header2'){?>
<header id="header2">
    <h1><?php if ($_smarty_tpl->tpl_vars['row']->value['head']){?><?php echo $_smarty_tpl->tpl_vars['row']->value['head'];?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['seo']->value['head'];?>
<?php }?></h1>
    <div class="back"><a class="ap-icon" href="<?php if ($_smarty_tpl->tpl_vars['mod']->value=='member'){?><?php echo url('/member');?>
<?php }else{ ?>javascript:history.back();<?php }?>"></a></div>
    <div class="menu">
        <!--<a class="icon-cart ap-icon" href="<?php echo url('/yunbuy/cart');?>
"><em class="cartNum"><?php echo $_smarty_tpl->tpl_vars['cartNum']->value;?>
</em></a>-->
        <a class="icon-home ap-icon" href="<?php echo url();?>
"></a>
    </div>
</header>
<?php }else{ ?>

<?php }?><?php }} ?>