<?php /* Smarty version Smarty-3.1.13, created on 2016-12-11 20:55:40
         compiled from "/data/01/html/1yyg225/webapps/www/views/manage/upload/media/file_list.html" */ ?>
<?php /*%%SmartyHeaderCode:1353439742584d4cccce4577-29415725%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '821b111d96b0ef2880ac95c4f83b157deddf17f1' => 
    array (
      0 => '/data/01/html/1yyg225/webapps/www/views/manage/upload/media/file_list.html',
      1 => 1456367946,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1353439742584d4cccce4577-29415725',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'list' => 0,
    'm' => 0,
    'page' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_584d4cccd26146_12426359',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_584d4cccd26146_12426359')) {function content_584d4cccd26146_12426359($_smarty_tpl) {?><?php if (count($_smarty_tpl->tpl_vars['list']->value)){?><ul>    <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>    <li class="" onmouseover="[this].addClass('hover')" onmouseout="[this].removeClass('hover')">        <div class="media-item">            <a href="javascript:;" class="delIcon iconfont e3-upload-rmMediaFile-<?php echo $_smarty_tpl->tpl_vars['m']->value['id'];?>
">&#xe606;</a>            <i class="checked iconfont">&#xe607;</i>            <i class="bigicon iconfont file<?php echo $_smarty_tpl->tpl_vars['m']->value['ext'];?>
"></i>        </div>        <div class="media-name"><?php echo $_smarty_tpl->tpl_vars['m']->value['name'];?>
</div>        <div class="file_ext"><?php echo $_smarty_tpl->tpl_vars['m']->value['ext'];?>
</div>    </li>    <?php } ?></ul><div class="clear"></div><div><?php echo $_smarty_tpl->tpl_vars['page']->value;?>
</div><?php }else{ ?><div style="line-height:24px; text-align:center; padding:8px">暂未上传任何文件</div><?php }?><?php }} ?>