<?php /* Smarty version Smarty-3.1.13, created on 2016-05-04 10:59:32
         compiled from "D:\test1yyg3.lnest.com\webapps\www\views\cn\html\apps.html" */ ?>
<?php /*%%SmartyHeaderCode:5803572871ef1e8483-74119720%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1e63943cafcfdbc8cf4c4b3c347b68a099c3ee29' => 
    array (
      0 => 'D:\\test1yyg3.lnest.com\\webapps\\www\\views\\cn\\html\\apps.html',
      1 => 1462330719,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '5803572871ef1e8483-74119720',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_572871ef2625a9_77465070',
  'variables' => 
  array (
    'ios_url' => 0,
    'and_url' => 0,
    'qrcode' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_572871ef2625a9_77465070')) {function content_572871ef2625a9_77465070($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ("ur_here.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<style type="text/css">
	html{ width:100%; height:100%; }
	body{ font-size:14px; font-family:"微软雅黑",Arial; color:#0c0c0c; line-height:1.8;  min-width:1160px; }
	input,textarea{ font-family:"微软雅黑" }
	*{ margin:0; padding:0; border:0; }
	article,aside,dialog,footer,header,section,footer,nav,figure,menu{ display:block }
	ol,ul,li{ list-style-image:none;list-style-position:outside;list-style-type:none; }
	.left{ float:left; }
	.right{ float:right; }
	.clear{ clear:both; height:0px; width:0; margin:0; padding:0; border:none; overflow:hidden; }
	a{ text-decoration:none; cursor:pointer; color:#686868 }
	a:hover{ color:#ed5058 !important }
	.zindex1{ z-index:1000 }
	h2{ font-size:30px; }
	h3{ font-size:18px; }
	h4{ font-size:14px; }
	h5{ font-size:12px; }
	.f14{ font-size:14px; }
	.f16{ font-size:16px; }
	
	
	/**************top**************/
	.logo{ box-shadow: 0 0 10px rgba(0,0,0,0.2);position: relative;z-index: 10; background:#fff; }
	.logo dl{ clear: both;overflow: hidden; padding: 15px 0; margin: 0 auto;width: 1160px }
	.logo dl dt{ float: left;height: 50px; }
	.logo dl dt img{ height: 100%; }
	.logo dl dd{ float: right; line-height: 50px; }
	.logo dl dd a{ background: url(/style/images/loaddown_1.png) no-repeat 0 center; padding-left: 25px; display: inline-block; overflow: hidden;float:left; }
	
	.banner{ clear: both;overflow: hidden; height:844px; position: relative;z-index: 1; min-width: 1160px; }
	.banner1{ position: relative;z-index: 2; width: 1160px;height: 678px; margin: 0 auto; }
	.banner a{ position: absolute;right:86px; width:170px; z-index:4; }
	.banner img{ width: 100%; }
	.banner a.banner-1{ top: 385px; }
	.banner a.banner-2{ top: 460px; }
	.banner p{ position:absolute; z-index:3;overflow:hidden }
	.banner .mobile{ left:213px;top:219px;width:252px; height:452px }
	.banner .text{ top:156px;left:615px;width:500px; height:180px }
	.banner .text img{ width:auto; max-width:500px }
	.banner .weixin{ top:355px;left:625px;width:200px; height:200px }
</style>

<div class="banner" style="background: url(/style/images/loaddown-banner.jpg) no-repeat center 0;">
    <div class="banner1">
        <a href="<?php echo $_smarty_tpl->tpl_vars['ios_url']->value;?>
" class="banner-1"><img src="/style/images/loaddown_2.png"></a>    
        <a href="<?php echo $_smarty_tpl->tpl_vars['and_url']->value;?>
" class="banner-2"><img src="/style/images/loaddown_3.png"></a>
        <p class="mobile"><img src="/style/images/loaddown-1.png"></p>
        <p class="text"><img src="/style/images/loaddown-2.png"></p>
        <p class="weixin"><img src="<?php echo $_smarty_tpl->tpl_vars['qrcode']->value;?>
"></p>
    </div>
</div>
<?php echo $_smarty_tpl->getSubTemplate ("footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>