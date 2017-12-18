<?php /* Smarty version Smarty-3.1.13, created on 2016-02-25 14:45:38
         compiled from "D:\test1yyg3.lnest.com\webapps\www\views\cn\disk\lists.html" */ ?>
<?php /*%%SmartyHeaderCode:1029456cea3128f9e81-70380006%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b2a5a1fb4490a36b7d0c57934ee179b9881c3265' => 
    array (
      0 => 'D:\\test1yyg3.lnest.com\\webapps\\www\\views\\cn\\disk\\lists.html',
      1 => 1456367942,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1029456cea3128f9e81-70380006',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'foldername' => 0,
    'list' => 0,
    'm' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_56cea312b61ed5_25726073',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56cea312b61ed5_25726073')) {function content_56cea312b61ed5_25726073($_smarty_tpl) {?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>内页</title>
<link type="text/css" href="/style/css/xz_wp.css" rel="stylesheet">
<script type="text/javascript" src="/style/jquery-1.8.3.min.js"></script>
</head>

<body>
<?php echo $_smarty_tpl->getSubTemplate ("disk/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="gr_dom">
  <?php echo $_smarty_tpl->getSubTemplate ("disk/left.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

  <div class="right">
    <div class="xz_ny">
      <table cellpadding="0" cellspacing="0" width="100%">
      <?php echo $_smarty_tpl->getSubTemplate ("disk/menu.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

      <tr><td colspan="4"><p class="list">当前位置：<a href="/disk/index" class="a1">我的网盘</a>><a class="a2 on"><?php echo $_smarty_tpl->tpl_vars['foldername']->value;?>
</a></p></td></tr>
      <tr><td class="td2"><h4>文件名</h4></td><td class="td2"><h4>文件大小</h4></td><td class="td2"><h4>上传时间</h4></td><td class="td2"><p class="p1"><i>操作</i></p></td></tr>
      <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>
      <tr>
      <td><label><input type="checkbox"><?php echo $_smarty_tpl->tpl_vars['m']->value['title'];?>
</label></td>
      <td><?php echo $_smarty_tpl->tpl_vars['m']->value['size'];?>
</td>
      <td><?php echo date('Y-m-d H:i:s',$_smarty_tpl->tpl_vars['m']->value['addtime']);?>
</td>
      <td class="xz_cz">
      <p class="p1">
      <a class="a3" href="/uploadfile/<?php echo $_smarty_tpl->tpl_vars['m']->value['foldername'];?>
/<?php echo $_smarty_tpl->tpl_vars['m']->value['name'];?>
"></a>
      <a value="<?php echo $_smarty_tpl->tpl_vars['m']->value['id'];?>
" class="a4 editfile"></a>
      <a href="/disk/delfile/?id=<?php echo $_smarty_tpl->tpl_vars['m']->value['id'];?>
" class="a5"></a>
      </p></td>
      </tr>
      <?php } ?>
      <tr>
        <td class="td3" colspan="3">
          <label style="display:none;"><input type="checkbox">全选/反选</label>
          <select style="display:none;"><option>请选择</option><option>请选择1</option><option>请选择2</option></select>
          <label class="ra1" style="display:none;"><input type="radio" name="tdt">批量删除</label>
          <input style="display:none;" type="button" value="." class="xz_but">
        </td>
        <td class="td3"><?php echo $_smarty_tpl->getSubTemplate ("public_page.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
</td>
      </tr>
    </table>
    
    </div>
  </div>
</div>
<?php echo $_smarty_tpl->getSubTemplate ("disk/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

</body>
</html><?php }} ?>