<?php /* Smarty version Smarty-3.1.13, created on 2015-12-02 17:26:05
         compiled from "E:\projects\web\lnest\1yyg225\webapps\www\views\manage\upload\media\image_list.html" */ ?>
<?php /*%%SmartyHeaderCode:16578565eb92d01a4e4-18064461%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4e1ff7f25ea54923aa2d3d715fcc91a50f57390c' => 
    array (
      0 => 'E:\\projects\\web\\lnest\\1yyg225\\webapps\\www\\views\\manage\\upload\\media\\image_list.html',
      1 => 1432607498,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16578565eb92d01a4e4-18064461',
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
  'unifunc' => 'content_565eb92d0415f3_31183633',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_565eb92d0415f3_31183633')) {function content_565eb92d0415f3_31183633($_smarty_tpl) {?><?php if (count($_smarty_tpl->tpl_vars['list']->value)){?><ul>    <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>    <li class="" onmouseover="[this].addClass('hover')" onmouseout="[this].removeClass('hover')">        <div class="media-item">            <a href="<?php echo $_smarty_tpl->tpl_vars['m']->value['imgurl_src'];?>
" target="_blank"><img src="<?php echo $_smarty_tpl->tpl_vars['m']->value['imgurl_thumb'];?>
" /></a>            <i class="checked iconfont">&#xe607;</i>            <a href="javascript:;" class="delIcon iconfont e3-upload-rmMediaImage-<?php echo $_smarty_tpl->tpl_vars['m']->value['id'];?>
">&#xe606;</a>        </div>        <div class="media-name"><?php echo $_smarty_tpl->tpl_vars['m']->value['name'];?>
</div>    </li>    <?php } ?></ul><div class="clear"></div><div>    <?php echo $_smarty_tpl->tpl_vars['page']->value;?>
</div><?php }else{ ?><div style="line-height:24px; text-align:center; padding:8px">该分类下暂无图片</div><?php }?><?php }} ?>