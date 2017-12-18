<?php /* Smarty version Smarty-3.1.13, created on 2016-02-25 14:58:07
         compiled from "D:\test1yyg3.lnest.com\webapps\www\views\manage\block\edit.html" */ ?>
<?php /*%%SmartyHeaderCode:2792156cea5ff71c349-64556922%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '45eefdb167ce56f33b138924d3f1de3c69d47427' => 
    array (
      0 => 'D:\\test1yyg3.lnest.com\\webapps\\www\\views\\manage\\block\\edit.html',
      1 => 1456367947,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2792156cea5ff71c349-64556922',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'row' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_56cea5ff7d71e6_42069692',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56cea5ff7d71e6_42069692')) {function content_56cea5ff7d71e6_42069692($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('../public_btn.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="html-box">
    <form target="iframeNewsTarget" method="post" action="/manage/block/edit">
    <input type="hidden" name="post[id]" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['id'];?>
" />

    <table class="table-list">
    <tbody>

        <tr>
            <td class="td-label"><label>碎片名称：<span class="c-red">*</span></label></td>
            <td class="td-input">
                <input type="text" class="form-i w200" name="post[name]" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['name'];?>
" />
            </td>
        </tr>

        <tr>
            <td class="td-label"><label>碎片标识：<span class="c-red">*</span></label></td>
            <td class="td-input">
                <input type="text" class="form-i w200" name="post[mark]" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['mark'];?>
" />
            </td>
        </tr>

        <tr>
            <td class="td-label"><label>碎片内容：<span class="c-red">*</span></label></td>
            <td class="td-input">
                <?php echo $_smarty_tpl->tpl_vars['row']->value['html_content'];?>

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
</div>

<?php }} ?>