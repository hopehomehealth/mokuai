<?php /* Smarty version Smarty-3.1.13, created on 2016-02-25 14:45:51
         compiled from "D:\test1yyg3.lnest.com\webapps\www\views\cn\disk\folder.html" */ ?>
<?php /*%%SmartyHeaderCode:11056cea31fc16d06-43217663%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd80d1648ecc60e3c963c1ffb3555fe832fa6cd61' => 
    array (
      0 => 'D:\\test1yyg3.lnest.com\\webapps\\www\\views\\cn\\disk\\folder.html',
      1 => 1456367942,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11056cea31fc16d06-43217663',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'list' => 0,
    'm' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_56cea31fdc89f2_16896995',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56cea31fdc89f2_16896995')) {function content_56cea31fdc89f2_16896995($_smarty_tpl) {?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>文件夹管理</title>
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

      <tr><td colspan="4"><p class="list">当前位置：<a href="/disk/index" class="a1">我的网盘</a>>文件夹管理</p></td></tr>
      <tr>
      <td class="td2"><h4>文件夹名</h4></td>
      <td class="td2"><h4></h4></td>
      <td class="td2"><h4>创建时间</h4></td>
      <td class="td2"><p class="p1"><i>操作</i></p></td>
      </tr>
      <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>
      <tr>
      <td><label><input type="checkbox"><?php echo $_smarty_tpl->tpl_vars['m']->value['title'];?>
</label></td>
      <td></td>
      <td><?php echo date('Y-m-d H:i:s',$_smarty_tpl->tpl_vars['m']->value['addtime']);?>
</td>
      <td class="xz_cz">
      <p class="p1">
      <a value="<?php echo $_smarty_tpl->tpl_vars['m']->value['id'];?>
" class="a4 editfolder"></a>
      <a class="a5" href="/disk/delfolder/?id=<?php echo $_smarty_tpl->tpl_vars['m']->value['id'];?>
"></a>
      </p>
      </td>
      </tr>
      <?php } ?>
      <tr>
        <td class="td3" colspan="3" >
          <label style="display:none;"><input type="checkbox">全选/反选</label>
          <select style="display:none;"><option>请选择</option><option>请选择1</option><option>请选择2</option></select>
          <label class="ra1" style="display:none;"><input type="radio" name="tdt">批量删除</label>
          <input style="display:none;" type="button" value="." class="xz_but">
        </td>
        <td class="td3" ><?php echo $_smarty_tpl->getSubTemplate ("public_page.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
</td></tr>
    </table>
    
    </div>
  </div>
</div>
<?php echo $_smarty_tpl->getSubTemplate ("disk/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<script>
 $(function(){
  var $rai = $(".gr_dom .right table .td3 .ra1");
  $(".xz_ny tr:odd td:not(:first)").css("background-color","#fff4f5");
  $rai.click(function(){
	$(this).css("background","url(/images/xz_a11.png) no-repeat left center")  ;
	$(this).siblings(".ra1").css("background","url(/images/xz_a10.png) no-repeat left center")  ;
	  }); 
  /*弹窗*/
  $(".xz_but").click(function(){
	$(".xz_xjBox").show(); 
	  });
  var $a_close = $(".xz_sc_top .a2");
  $a_close.click(function(){
	$(".xz_xjBox").hide(); 
	  });
  var $i_close = $(".xz_sc_list ul li i");
  $i_close.click(function(){
	$(this).parent().hide();
	  });
  $("#folder_button").click(function(){
	  $(".xz_xjBox").show();
  }) 
	  
	 })
</script>
</body>
</html>


<?php }} ?>