<?php /* Smarty version Smarty-3.1.13, created on 2015-11-28 19:27:01
         compiled from "H:\projects\web\lnest02\1yyg\webapps\www\views\manage\yuncat\edit.html" */ ?>
<?php /*%%SmartyHeaderCode:987456598f850491c6-31261244%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5aa70ed5e8ff173c556aefc8a91c7fef0924a4f1' => 
    array (
      0 => 'H:\\projects\\web\\lnest02\\1yyg\\webapps\\www\\views\\manage\\yuncat\\edit.html',
      1 => 1433940650,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '987456598f850491c6-31261244',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'row' => 0,
    'select_categorys' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_56598f8511ff89_32451613',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56598f8511ff89_32451613')) {function content_56598f8511ff89_32451613($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('../public_btn.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<div class="html-box">    <form target="iframeNewsTarget" method="post" action="/manage/yuncat/edit" enctype="multipart/form-data">    <input type="hidden" name="post[id]" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['id'];?>
" />    <table class="table-list">    <tbody>        <tr>            <td class="td-label"><label>上级栏目：</label></td>            <td class="td-input">                <select name="post[parentid]">                    <option value="0">一级栏目</option>                    <?php echo $_smarty_tpl->tpl_vars['select_categorys']->value;?>
                </select>            </td>        </tr>        <tr>            <td class="td-label"><label>栏目名称：</label></td>            <td class="td-input">                <input type="text" class="form-i w160" name="post[catname]" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['catname'];?>
" />                <input type="text" class="form-i w160" name="post[catname_en]" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['catname_en'];?>
" />            </td>        </tr>        <tr class="h s0">            <td class="td-label"><label>外链地址：</label></td>            <td class="td-input">                <input type="text" class="form-i w300" name="post[url]" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['url'];?>
" />                <input type="hidden" id="type" name="post[type]" value="0" />            </td>        </tr>        <tr>            <td class="td-label"><label>栏目图片：</label></td>            <td class="td-input">                <?php echo $_smarty_tpl->tpl_vars['row']->value['html_thumb'];?>
            </td>        </tr>        <tr>            <td class="td-label"<label>导航显示：</label></td>            <td class="td-input">                <label><input type="radio" name="post[ismenu]" value="1"<?php if ($_smarty_tpl->tpl_vars['row']->value['ismenu']==1){?> checked<?php }?> /> 是</label>                <label><input type="radio" name="post[ismenu]" value="0"<?php if (!$_smarty_tpl->tpl_vars['row']->value['ismenu']){?> checked<?php }?> /> 否</label>            </td>        </tr>        <tr class="table-h3 s h0">            <td colspan="2">SEO设置</td>        </tr>        <tr class="s h0">            <td class="td-label"><label>SEO标题：</label></td>            <td class="td-input">                <input type="text" class="form-i w200" name="post[title]" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['title'];?>
" />            </td>        </tr>        <tr class="s h0">            <td class="td-label"><label>SEO关键词：</label></td>            <td class="td-input">                <input type="text" class="form-i w200" name="post[keywords]" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['keywords'];?>
" />            </td>        </tr>        <tr class="s h0">            <td class="td-label"><label>SEO描述：</label></td>            <td class="td-input">                <textarea name="post[description]"><?php echo $_smarty_tpl->tpl_vars['row']->value['description'];?>
</textarea>            </td>        </tr>        <tr class="tr-btn">            <td class="td-label"></td>            <td class="td-input">                <button type="submit" name="Submit" class="uiBtn BtnGreen">提&nbsp;&nbsp;交</button>                <button type="reset" class="uiBtn">重&nbsp;&nbsp;置</button>            </td>        </tr>    </tbody>    </table>    </form></div><script type="text/javascript">var template_list = "<?php echo $_smarty_tpl->tpl_vars['row']->value['template_list'];?>
";var template_show = "<?php echo $_smarty_tpl->tpl_vars['row']->value['template_show'];?>
";var list_type = <?php echo $_smarty_tpl->tpl_vars['row']->value['listtype'];?>
;$.loadJs('/admin/js/manage/category.js',function(){    category.chang_module($('#moduleid').val(),list_type);});</script><?php }} ?>