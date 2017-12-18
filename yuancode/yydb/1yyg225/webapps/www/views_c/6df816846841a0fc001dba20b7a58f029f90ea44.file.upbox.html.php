<?php /* Smarty version Smarty-3.1.13, created on 2016-02-25 16:28:48
         compiled from "D:\test1yyg3.lnest.com\webapps\www\views\manage\upload\image\upbox.html" */ ?>
<?php /*%%SmartyHeaderCode:601456cebb40967530-84832428%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6df816846841a0fc001dba20b7a58f029f90ea44' => 
    array (
      0 => 'D:\\test1yyg3.lnest.com\\webapps\\www\\views\\manage\\upload\\image\\upbox.html',
      1 => 1456367945,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '601456cebb40967530-84832428',
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
  'unifunc' => 'content_56cebb40a12966_95247643',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56cebb40a12966_95247643')) {function content_56cebb40a12966_95247643($_smarty_tpl) {?><div class="up-tag clear">    <input type="hidden" id="tag_id" value="0" />    <div class="up-btn" style="float:right">        <a class="uiBtn" href="javascript:;">选择图片</a>        <div class="swfbtn"><div id="swfbtn_2"></div></div>    </div>    <span>        <i>选择分类：</i>        <span id="subCateBox">        <select id="gallery_tag">            <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['gallery_tags']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>            <option value="<?php echo $_smarty_tpl->tpl_vars['m']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['m']->value['name'];?>
</option>            <?php } ?>        </select>        </span>    </span></div><div class="ubox" id="status_box_2">    <div class="g-up">        <div class="mark-icon"></div>        <div class="word">请先选择您要上传的产品图片！</div>    </div></div><div class="check inblock"></div><?php }} ?>