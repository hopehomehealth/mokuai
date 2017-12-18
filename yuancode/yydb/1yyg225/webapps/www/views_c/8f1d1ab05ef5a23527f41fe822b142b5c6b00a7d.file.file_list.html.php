<?php /* Smarty version Smarty-3.1.13, created on 2016-02-25 10:49:57
         compiled from "D:\test1yyg3.lnest.com\webapps\www\views\manage\upload\media\file_list.html" */ ?>
<?php /*%%SmartyHeaderCode:1076456613ff5a7f121-36921187%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8f1d1ab05ef5a23527f41fe822b142b5c6b00a7d' => 
    array (
      0 => 'D:\\test1yyg3.lnest.com\\webapps\\www\\views\\manage\\upload\\media\\file_list.html',
      1 => 1456367945,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1076456613ff5a7f121-36921187',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_56613ff5b5ff50_82951361',
  'variables' => 
  array (
    'list' => 0,
    'm' => 0,
    'page' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56613ff5b5ff50_82951361')) {function content_56613ff5b5ff50_82951361($_smarty_tpl) {?><?php if (count($_smarty_tpl->tpl_vars['list']->value)){?><ul>    <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>    <li class="" onmouseover="[this].addClass('hover')" onmouseout="[this].removeClass('hover')">        <div class="media-item">            <a href="javascript:;" class="delIcon iconfont e3-upload-rmMediaFile-<?php echo $_smarty_tpl->tpl_vars['m']->value['id'];?>
">&#xe606;</a>            <i class="checked iconfont">&#xe607;</i>            <i class="bigicon iconfont file<?php echo $_smarty_tpl->tpl_vars['m']->value['ext'];?>
"></i>        </div>        <div class="media-name"><?php echo $_smarty_tpl->tpl_vars['m']->value['name'];?>
</div>        <div class="file_ext"><?php echo $_smarty_tpl->tpl_vars['m']->value['ext'];?>
</div>    </li>    <?php } ?></ul><div class="clear"></div><div><?php echo $_smarty_tpl->tpl_vars['page']->value;?>
</div><?php }else{ ?><div style="line-height:24px; text-align:center; padding:8px">暂未上传任何文件</div><?php }?><?php }} ?>