<?php /* Smarty version Smarty-3.1.13, created on 2016-02-25 14:45:38
         compiled from "D:\test1yyg3.lnest.com\webapps\www\views\cn\disk\menu.html" */ ?>
<?php /*%%SmartyHeaderCode:1720756cea312caf097-52084467%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0970957f70a9a63332585826fda7d1d2ae97feaa' => 
    array (
      0 => 'D:\\test1yyg3.lnest.com\\webapps\\www\\views\\cn\\disk\\menu.html',
      1 => 1456367942,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1720756cea312caf097-52084467',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'folderid' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_56cea312ce7422_42098156',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56cea312ce7422_42098156')) {function content_56cea312ce7422_42098156($_smarty_tpl) {?><tr>
	<td colspan="3" class="td1">
	  <p>
      <a id="reload"><img src="/images/xz_a4.png"></a>
      <a id="folder_button" class="a1"><img src="/images/xz_a5.png"></a>
      <a href="/disk/folder"><img src="/images/xz_a6.png"></a>
      <a id="upload_button"><img src="/images/xz_a7.png"></a>
      <a href="/member/change_db#m" target="_blank"><img src="/images/xz_a8.png"></a>
      </p>
    </td>
    <td class="td1">
      <?php if ($_smarty_tpl->tpl_vars['folderid']->value){?>
      <form action="/disk/lists" method="GET">
      <input type="text" name="title" placeholder="文件名称">
      <input type="submit" name="search" value=" ">
      </form>
      <?php }else{ ?>
      <form action="/disk/folder" method="GET">
      <input type="text" name="title" placeholder="文件夹称">
      <input type="submit" name="search" value=" ">
      </form>
      <?php }?>
	</td>
</tr>
<script>
$("#reload").click(function(){
	window.location.reload(); 
})
</script><?php }} ?>