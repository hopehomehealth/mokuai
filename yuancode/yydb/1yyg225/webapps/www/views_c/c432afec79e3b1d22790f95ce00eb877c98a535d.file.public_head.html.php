<?php /* Smarty version Smarty-3.1.13, created on 2016-06-21 10:35:09
         compiled from "E:\projects\web\1yyg\1yyg225_0016\webapps\www\views\manage\public_head.html" */ ?>
<?php /*%%SmartyHeaderCode:134175768a7dde0db70-49294530%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c432afec79e3b1d22790f95ce00eb877c98a535d' => 
    array (
      0 => 'E:\\projects\\web\\1yyg\\1yyg225_0016\\webapps\\www\\views\\manage\\public_head.html',
      1 => 1456367946,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '134175768a7dde0db70-49294530',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'common' => 0,
    'menus' => 0,
    'm' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5768a7dde39df6_83190561',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5768a7dde39df6_83190561')) {function content_5768a7dde39df6_83190561($_smarty_tpl) {?><div id="img-overlay"></div><div id="img-uploader" class="xwin d1-com-move" style="display: block; visibility: visible; top:123px; left: 269px;"></div><div id="rTip"><div class="l"></div><div class="c"></div><div class="r"></div></div><div id="overlay"><!--覆盖层--></div><div class="win d1-com-move" id="win">    <div class="win-box">        <a class="sprite close e2-com-xhide" href="" hidefocus="true"></a>        <div class="e-drag"></div>        <div class="xHtml"></div>        <div class="check inblock"><a class="uiBtnbtn-cancel e2-com-xhide" href="javascript:;">取&nbsp;消</a> <a class="uiBtn btn-true btnFocus" href="javascript:;">确&nbsp;认</a></div>    </div>    <div class="oe"><i class="xl rep-y"></i><i class="xr rep-y"></i><i class="xt rep-x"></i><i class="xb rep-x"></i><i class="tl sprite"></i><i class="tr sprite"></i><i class="bl sprite"></i><i class="br sprite"></i></div></div><!--弹出层--><div id="head">    <div id="tips">载入中,请稍等...</div>    <div class="top-bar clear" style="display:none"></div>    <div class="welcome">        <a href="/" class="c-gray" target="_blank"><?php echo $_smarty_tpl->tpl_vars['common']->value['site_name'];?>
</a>    </div>    <div class="menu e1-main-topmenu" id="top-menu">        <?php if (isset($_smarty_tpl->tpl_vars['menus']->value)){?>        <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['menus']->value[0]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>        <a href="javascript:;">            <span><?php echo $_smarty_tpl->tpl_vars['m']->value['name'];?>
</span>        </a>        <?php } ?>        <?php }?>    </div>    <div class="user-info">        <span class="user_head"></span>        <span class="sel-role item-link">            您好，<span id="curr-role"><?php echo @constant('USER');?>
</span>            <div class="role-div e2-mv2-chrole" style="display:none"><b class="z0">◆</b><b class="z1">◆</b>                <label role-id="id"><em>Area</em><span>Role</span></label>            </div>        </span> <i>|</i>        <a href="/manage#!admin/edit?id=<?php echo $_SESSION['uid'];?>
&com=xshow|编辑管理员（<?php echo @constant('USER');?>
）" class="item-link">修改密码</a> <i>|</i>        <a href="javascript:;" class="item-link" onclick="main.clearCaches()">清除缓存</a> <i>|</i>        <a href="/manage/login/destroy" class="item-link">退出</a>    </div></div><!--主导航End--><?php }} ?>