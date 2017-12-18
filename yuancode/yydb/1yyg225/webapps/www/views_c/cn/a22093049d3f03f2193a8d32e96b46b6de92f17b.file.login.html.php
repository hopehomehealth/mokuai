<?php /* Smarty version Smarty-3.1.13, created on 2016-05-12 14:32:59
         compiled from "D:\test1yyg3.lnest.com\webapps\www\views\cn\disk\login.html" */ ?>
<?php /*%%SmartyHeaderCode:686556cea2dadf7ad3-14709278%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a22093049d3f03f2193a8d32e96b46b6de92f17b' => 
    array (
      0 => 'D:\\test1yyg3.lnest.com\\webapps\\www\\views\\cn\\disk\\login.html',
      1 => 1463031112,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '686556cea2dadf7ad3-14709278',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_56cea2daf28a60_33129802',
  'variables' => 
  array (
    'seo' => 0,
    'L' => 0,
    'tagAdw' => 0,
    'tagAds' => 0,
    'm' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56cea2daf28a60_33129802')) {function content_56cea2daf28a60_33129802($_smarty_tpl) {?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<title><?php echo $_smarty_tpl->tpl_vars['seo']->value['title'];?>
</title>
<meta name="keywords" content="<?php echo $_smarty_tpl->tpl_vars['seo']->value['keywords'];?>
" />
<meta name="description" content="<?php echo $_smarty_tpl->tpl_vars['seo']->value['description'];?>
" />
<meta name="Author" content="技术支持：港湾有巢 www.lnest.com" />
<link type="text/css" href="/style/css/xz_wp.css" rel="stylesheet">
<script type="text/javascript" src="/style/jquery-1.8.3.min.js"></script>
<script type="text/javascript" src="/style/jquery.SuperSlide.2.1.1.js"></script>
</head>

<body>
<div class="header">
  <div class="w1110">
    <div class="left"><a href="/disk/index"><img src="/images/xz_logo.png"></a></div>
    <div class="right"><p><a href="/">首页</a>|<a href="/disk/login">登录</a>|<a href="/disk/index">我的网盘</a></p></div>
  </div>
</div>
<!--登录-->
<div class="xz_dl">
  <div class="w1110">
    <div class="xz_dl_form">
      <form action="/member/act_login" target="iframeNews" id="login_form" method="post">
        <h3>您好，欢迎使用<small><?php echo $_smarty_tpl->tpl_vars['L']->value['unit_yun'];?>
网盘</small>！</h3>
        <p><input name="username" type="text" placeholder="用户名/手机号"></p>
        <p><input name="password"  type="password" placeholder="请输入密码"></p>
        
        <p>
        <input type="hidden" name="back_url" value="/disk/index">
        <input type="submit" value="">
        </p>
      </form>
    </div>
  </div>
</div>
<!--登录 end-->
<!--banner-->
<div class="banner">
  <div id="slideBox" class="slideBox">  
   <div class="bd">
     <ul>
       <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['zz'][0][0]->_callViewFunc(array('mod'=>'content','var'=>'tagAdw','module'=>'ad','id'=>17),$_smarty_tpl);?>

       <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['zz'][0][0]->_callViewFunc(array('mod'=>'fileurl','var'=>'tagAds','source'=>$_smarty_tpl->tpl_vars['tagAdw']->value['images'],'num'=>6),$_smarty_tpl);?>

       <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['tagAds']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>
       <li style="background:url(<?php echo $_smarty_tpl->tpl_vars['m']->value['path'];?>
) no-repeat center top;"><a href="<?php echo $_smarty_tpl->tpl_vars['m']->value['title'];?>
"<?php if ($_smarty_tpl->tpl_vars['m']->value['isblank']){?> target="_blank"<?php }?>></a></li>
       <?php } ?>
     </ul>
   </div>
   <div class="hd">
     <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['zz'][0][0]->_callViewFunc(array('mod'=>'content','var'=>'tagAdw','module'=>'ad','id'=>17),$_smarty_tpl);?>

     <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['zz'][0][0]->_callViewFunc(array('mod'=>'fileurl','var'=>'tagAds','source'=>$_smarty_tpl->tpl_vars['tagAdw']->value['images'],'num'=>6),$_smarty_tpl);?>

     <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['tagAds']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>
     <span><a></a></span>
     <?php } ?>
   </div>    
  </div>
</div>
<!--banner-->
<!--foot-->
<div class="foot">
  <div class="w1110">
    <div class="left"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['zz'][0][0]->_callViewFunc(array('mod'=>'block','mark'=>'footer'),$_smarty_tpl);?>
</div>
    <div class="right" style="display:none;"><a href="http://www.lnest.com" target="_blank">厦门紫竹数码科技有限公司</a></div>
  </div>
</div>
<!---->

<script>
  jQuery(".banner .slideBox").slide({
	  titCell:".hd span a",
	  mainCell:".bd ul",
	  effect:"fold",
	  autoPlay:true,
	  delayTime:1600,
	  interTime:5000
  });
   <!--图片轮播-->
 jQuery(".picScroll-left").slide({titCell:".hd ul",mainCell:".bd ul",autoPage:true,effect:"left",autoPlay:true,vis:4,trigger:"click"});
</script>

</body>
</html>
<?php }} ?>