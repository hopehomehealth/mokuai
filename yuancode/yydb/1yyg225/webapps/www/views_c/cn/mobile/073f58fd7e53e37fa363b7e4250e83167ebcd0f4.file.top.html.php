<?php /* Smarty version Smarty-3.1.13, created on 2016-06-22 15:49:17
         compiled from "E:\projects\web\1yyg\1yyg225_full\webapps\www\views\cn\mobile\top.html" */ ?>
<?php /*%%SmartyHeaderCode:7912576a42fd83b227-05027555%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '073f58fd7e53e37fa363b7e4250e83167ebcd0f4' => 
    array (
      0 => 'E:\\projects\\web\\1yyg\\1yyg225_full\\webapps\\www\\views\\cn\\mobile\\top.html',
      1 => 1466233889,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7912576a42fd83b227-05027555',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'seo' => 0,
    'viewport' => 0,
    'wechat' => 0,
    'wx_config_false' => 0,
    'signPackage' => 0,
    'nav' => 0,
    'header' => 0,
    'row' => 0,
    'cartNum' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_576a42fd8b96b0_02461448',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_576a42fd8b96b0_02461448')) {function content_576a42fd8b96b0_02461448($_smarty_tpl) {?><!doctype html>
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
    <link rel="stylesheet" href="/style/mobile/css/font/iconfont.css">
    <script src="/style/jquery-1.8.3.min.js"></script>
    <script type="text/javascript" src="/style/layer/layer.min.js"></script>
    <script type="text/javascript" src="/style/common.js"></script>
    <?php if ($_smarty_tpl->tpl_vars['wechat']->value&&$_SESSION['mid']){?>
    <?php if (!$_smarty_tpl->tpl_vars['wx_config_false']->value){?>
    <script type="text/javascript" src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
    <script type="text/javascript">
        $(function(){
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

            var title = $("title").eq(0).html();
            var desc = $("meta[name='description']").eq(0).attr('content');
            var pic = $('img').eq(0).attr('src');

            wx.ready(function () {
                //分享给朋友
                wx.onMenuShareAppMessage({
                    title: title,
                    desc: desc,
                    link: href,
                    imgUrl: pic
                });
                //分享到朋友圈
                wx.onMenuShareTimeline({
                    title: title,
                    link: href,
                    imgUrl: pic
                });
                //分享到QQ
                wx.onMenuShareQQ({
                    title: title,
                    desc: desc,
                    link: href,
                    imgUrl: pic
                });
            })
            <?php }?>
        })
    </script>
    <?php }?>
    <?php }?>
</head>
<body>

<?php if ($_smarty_tpl->tpl_vars['header']->value=='header2'){?>
<header id="header2">
    <h1><?php if ($_smarty_tpl->tpl_vars['row']->value['head']){?><?php echo $_smarty_tpl->tpl_vars['row']->value['head'];?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['seo']->value['head'];?>
<?php }?></h1>
    <div class="back"><a class="ap-icon" href="javascript:history.back();"></a></div>
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