<?php /* Smarty version Smarty-3.1.13, created on 2016-05-13 16:48:20
         compiled from "D:\test1yyg3.lnest.com\webapps\www\views\cn\disk\index.html" */ ?>
<?php /*%%SmartyHeaderCode:376356cea306bc1d37-97008076%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f41ddb01a08a41d9a02d98be05728920b45ac9a4' => 
    array (
      0 => 'D:\\test1yyg3.lnest.com\\webapps\\www\\views\\cn\\disk\\index.html',
      1 => 1463031112,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '376356cea306bc1d37-97008076',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_56cea306d90961_65827612',
  'variables' => 
  array (
    'seo' => 0,
    'foldernum' => 0,
    'spacedata' => 0,
    'filenum' => 0,
    'userdata' => 0,
    'lastlogin' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56cea306d90961_65827612')) {function content_56cea306d90961_65827612($_smarty_tpl) {?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<title><?php echo $_smarty_tpl->tpl_vars['seo']->value['title'];?>
-个人中心</title>
<meta name="keywords" content="<?php echo $_smarty_tpl->tpl_vars['seo']->value['keywords'];?>
" />
<meta name="description" content="<?php echo $_smarty_tpl->tpl_vars['seo']->value['description'];?>
" />
<link type="text/css" href="/style/css/xz_wp.css" rel="stylesheet">
</head>

<body>
<?php echo $_smarty_tpl->getSubTemplate ("disk/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="gr_dom">
  <?php echo $_smarty_tpl->getSubTemplate ("disk/left.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

  <div class="right">
    <table cellpadding="0" cellspacing="0" width="100%">
      <tr><td colspan="2" class="td1"><h3>个人中心</h3></td></tr>
      <tr><td colspan="2"><strong class="stn">提示:</strong><i> 个人中心代表您在使用该网站网盘时的权限，当前网盘统计，创建文件(夹)数等</i></td></tr>
      <tr><td class="td2" width="50%"><h3>我的统计：</h3></td><td class="td2" width="50%"><h3>我的权限：</h3></td></tr>
      <tr><td width="50%">文件夹：<?php echo $_smarty_tpl->tpl_vars['foldernum']->value;?>
</td><td width="50%">存储空间：<?php echo $_smarty_tpl->tpl_vars['spacedata']->value;?>
</td></tr>
      
      <tr><td width="50%">共有文件：<?php echo $_smarty_tpl->tpl_vars['filenum']->value;?>
</td><td width="50%">上传文件大小：<?php echo $_smarty_tpl->tpl_vars['userdata']->value;?>
</td></tr>
      <tr><td width="50%">最后登录：<?php echo date('Y-m-d H:i:s',$_smarty_tpl->tpl_vars['lastlogin']->value);?>
</td></tr>
    </table>
  </div>
</div>
</body>
</html>
<?php }} ?>