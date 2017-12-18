<?php /* Smarty version Smarty-3.1.13, created on 2015-12-01 19:12:32
         compiled from "E:\projects\web\lnest\1yyg225\webapps\www\views\manage\upload\image\upbox.html" */ ?>
<?php /*%%SmartyHeaderCode:11185565d80a09b7bf7-77339136%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7bc956e432340663d74cb63a2e08a97c202399bc' => 
    array (
      0 => 'E:\\projects\\web\\lnest\\1yyg225\\webapps\\www\\views\\manage\\upload\\image\\upbox.html',
      1 => 1418283576,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11185565d80a09b7bf7-77339136',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'gallery_tags' => 0,
    'm' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_565d80a09ee709_62672958',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_565d80a09ee709_62672958')) {function content_565d80a09ee709_62672958($_smarty_tpl) {?><div class="up-tag clear">
    <input type="hidden" id="tag_id" value="0" />
    <div class="up-btn" style="float:right">
        <a class="uiBtn" href="javascript:;">选择图片</a>
        <div class="swfbtn"><div id="swfbtn_2"></div></div>
    </div>
    <span>
        <i>选择分类：</i>
        <span id="subCateBox">
        <select id="gallery_tag">
            <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['gallery_tags']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>
            <option value="<?php echo $_smarty_tpl->tpl_vars['m']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['m']->value['name'];?>
</option>
            <?php } ?>
        </select>
        </span>
    </span>
</div>

<div class="ubox" id="status_box_2">
    <div class="g-up">
        <div class="mark-icon"></div>
        <div class="word">请先选择您要上传的产品图片！</div>
    </div>
</div>
<div class="check inblock"></div><?php }} ?>