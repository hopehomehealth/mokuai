<?php /* Smarty version Smarty-3.1.13, created on 2015-12-01 18:58:09
         compiled from "E:\projects\web\lnest\1yyg225\webapps\www\views\manage\home.html" */ ?>
<?php /*%%SmartyHeaderCode:31527565d7d41ddce68-90209647%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ce79e3e5aa626206ed0b9c0f9a4b275b602ac14b' => 
    array (
      0 => 'E:\\projects\\web\\lnest\\1yyg225\\webapps\\www\\views\\manage\\home.html',
      1 => 1445566234,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '31527565d7d41ddce68-90209647',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'favicon' => 0,
    'subMenu' => 0,
    'menus' => 0,
    'k' => 0,
    'subkey' => 0,
    'm' => 0,
    'n' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_565d7d41edad20_97275556',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_565d7d41edad20_97275556')) {function content_565d7d41edad20_97275556($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><html xmlns="http://www.w3.org/1999/xhtml"><head>    <meta charset="UTF-8">    <title>一元云购后台管理</title>    <?php echo $_smarty_tpl->tpl_vars['favicon']->value;?>
    <link rel="stylesheet" href="/admin/css/mcom.css?a=1" type="text/css" />    <link rel="stylesheet" href="/admin/css/skin<?php echo @constant('SKIN');?>
.css?a=1" type="text/css" />    <script src="/admin/js/g.js"></script>    <script src="/admin/js/main.js?a=2"></script>    <script type="text/javascript">        var initialize_link = 'category/index',_version='?v=1.2';        var $box,items=['fontname','fontsize','|','forecolor','hilitecolor','bold','italic','underline','removeformat','|','justifyleft','justifycenter','justifyright','insertorderedlist','insertunorderedlist','|','image','link','|','code','source'];        var subMenus=<?php echo $_smarty_tpl->tpl_vars['subMenu']->value;?>
;        loads.push(function(){            $box=G('content-box');            $.loadJs('/admin/js/dp/WdatePicker.js');        });    </script></head><body onkeydown="if(event.keyCode==116){ $hash.reload();return false; }"><?php echo $_smarty_tpl->getSubTemplate ("manage/public_head.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<div class="side-nav" id="ext-menu">    <?php  $_smarty_tpl->tpl_vars['menu'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['menu']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['menus']->value[0]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['menu']->key => $_smarty_tpl->tpl_vars['menu']->value){
$_smarty_tpl->tpl_vars['menu']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['menu']->key;
?>    <?php if (isset($_smarty_tpl->tpl_vars['menus']->value[$_smarty_tpl->tpl_vars['k']->value])){?>    <div class="fn-menu e1-main-sidemenu">        <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_smarty_tpl->tpl_vars['subkey'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['menus']->value[$_smarty_tpl->tpl_vars['k']->value]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
 $_smarty_tpl->tpl_vars['subkey']->value = $_smarty_tpl->tpl_vars['m']->key;
?>        <div class="fn-li">            <?php if (isset($_smarty_tpl->tpl_vars['menus']->value[$_smarty_tpl->tpl_vars['subkey']->value])){?>            <a rel="<?php echo $_smarty_tpl->tpl_vars['m']->value['id'];?>
" href="javascript:;" class="has-childs">                <?php if (!empty($_smarty_tpl->tpl_vars['m']->value['icon'])){?><i class="iconfont"><?php echo $_smarty_tpl->tpl_vars['m']->value['icon'];?>
</i><?php }?><span><?php echo $_smarty_tpl->tpl_vars['m']->value['name'];?>
</span>                <em class="iconfont">&#xe60a;</em>            </a>            <?php }else{ ?>            <a rel="<?php echo $_smarty_tpl->tpl_vars['m']->value['id'];?>
" href="#!<?php echo $_smarty_tpl->tpl_vars['m']->value['mod'];?>
<?php if ($_smarty_tpl->tpl_vars['m']->value['action']){?>/<?php echo $_smarty_tpl->tpl_vars['m']->value['action'];?>
<?php }?><?php if ($_smarty_tpl->tpl_vars['m']->value['param']){?>/<?php echo $_smarty_tpl->tpl_vars['m']->value['param'];?>
<?php }?>">                <?php if (!empty($_smarty_tpl->tpl_vars['m']->value['icon'])){?><i class="iconfont"><?php echo $_smarty_tpl->tpl_vars['m']->value['icon'];?>
</i><?php }?><span><?php echo $_smarty_tpl->tpl_vars['m']->value['name'];?>
</span>            </a>            <?php }?>        </div>        <?php if (isset($_smarty_tpl->tpl_vars['menus']->value[$_smarty_tpl->tpl_vars['subkey']->value])){?>        <div class="sub-menu">            <div class="sub-ul">                <?php  $_smarty_tpl->tpl_vars['n'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['n']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['menus']->value[$_smarty_tpl->tpl_vars['subkey']->value]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['n']->key => $_smarty_tpl->tpl_vars['n']->value){
$_smarty_tpl->tpl_vars['n']->_loop = true;
?>                <div class="sub-li">                    <a rel="<?php echo $_smarty_tpl->tpl_vars['n']->value['id'];?>
" href="#!<?php echo $_smarty_tpl->tpl_vars['n']->value['mod'];?>
<?php if ($_smarty_tpl->tpl_vars['n']->value['action']){?>/<?php echo $_smarty_tpl->tpl_vars['n']->value['action'];?>
<?php }?><?php if ($_smarty_tpl->tpl_vars['n']->value['param']){?>/<?php echo $_smarty_tpl->tpl_vars['n']->value['param'];?>
<?php }?>">                        <span><?php echo $_smarty_tpl->tpl_vars['n']->value['name'];?>
</span>                    </a>                </div>                <?php } ?>            </div>        </div>        <?php }?>        <?php } ?>    </div>    <?php }?>    <?php } ?></div><!--左导航栏End--><div id="main">    <div id="content-box"></div></div><div id="foot">    <div>        <span class="ui-skins">            <a href="" class="ui-skin-1 e2-main-setskin-1"></a>            <a href="" class="ui-skin-2 e2-main-setskin-2"></a>            <a href="" class="ui-skin-3 e2-main-setskin-3"></a>            <a href="" class="ui-skin-4 e2-main-setskin-4"></a>        </span>        <span><a href="/" target="_blank">一元云购</a>后台系统</span>    </div></div><iframe name="iframeNewsTarget" style="display: none;"></iframe><?php echo $_smarty_tpl->getSubTemplate ("manage/cron.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
</body></html><?php }} ?>