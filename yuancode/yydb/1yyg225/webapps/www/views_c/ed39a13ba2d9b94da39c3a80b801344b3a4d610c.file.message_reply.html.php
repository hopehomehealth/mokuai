<?php /* Smarty version Smarty-3.1.13, created on 2016-02-25 16:43:45
         compiled from "D:\test1yyg3.lnest.com\webapps\www\views\manage\member\message_reply.html" */ ?>
<?php /*%%SmartyHeaderCode:609356cebec1a6de47-89908947%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ed39a13ba2d9b94da39c3a80b801344b3a4d610c' => 
    array (
      0 => 'D:\\test1yyg3.lnest.com\\webapps\\www\\views\\manage\\member\\message_reply.html',
      1 => 1456367946,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '609356cebec1a6de47-89908947',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'row' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_56cebec1b33d50_63384528',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56cebec1b33d50_63384528')) {function content_56cebec1b33d50_63384528($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('../public_btn.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="html-box">
    <form target="iframeNewsTarget" method="post" action="/manage/member/message_reply/<?php echo $_smarty_tpl->tpl_vars['row']->value['id'];?>
" enctype="multipart/form-data">
        <table class="table-list">
            <tbody>
            <tr>
                <td class="td-label"><label>内容：</label></td>
                <td class="td-input"> <?php echo $_smarty_tpl->tpl_vars['row']->value['content'];?>
</td>
            </tr>
            <tr>
                <td class="td-label"><label>收件人：</label></td>
                <td class="td-input"><?php echo $_smarty_tpl->tpl_vars['row']->value['username'];?>
</td>
            </tr>
            <tr>
                <td class="td-label"><label>回复：</label></td>
                <td class="td-input">
                    <textarea name="post[content]"></textarea>
                </td>
            </tr>
            <tr class="tr-btn">
                <td class="td-label"></td>
                <td class="td-input">
                    <button type="submit" name="Submit" class="uiBtn BtnGreen">提&nbsp;&nbsp;交</button>
                    <button type="reset" class="uiBtn">重&nbsp;&nbsp;置</button>
                </td>
            </tr>
            </tbody>
        </table>
    </form>
</div><?php }} ?>