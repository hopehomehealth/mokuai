<?php /* Smarty version Smarty-3.1.13, created on 2017-01-11 11:07:09
         compiled from "/data/01/html/1yyg225/webapps/www/views/cn/mobile/top.html" */ ?>
<?php /*%%SmartyHeaderCode:57367229958451d2b53e7a2-84545014%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8d5daba46e562f163d2603d6685e20da171be41f' => 
    array (
      0 => '/data/01/html/1yyg225/webapps/www/views/cn/mobile/top.html',
      1 => 1484103638,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '57367229958451d2b53e7a2-84545014',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_58451d2b5890a4_56021158',
  'variables' => 
  array (
    'site_config' => 0,
    'seo' => 0,
    'viewport' => 0,
    'wechat' => 0,
    'wx_config_false' => 0,
    'signPackage' => 0,
    'header' => 0,
    'row' => 0,
    'cartNum' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58451d2b5890a4_56021158')) {function content_58451d2b5890a4_56021158($_smarty_tpl) {?><!doctype html>
<html lang="zh-cn" xml:lang="zh-cn">
<head>
    <?php echo $_smarty_tpl->tpl_vars['site_config']->value['qq_admins'];?>

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
    <script type="text/javascript" src="<?php echo getUrl('http');?>
://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
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