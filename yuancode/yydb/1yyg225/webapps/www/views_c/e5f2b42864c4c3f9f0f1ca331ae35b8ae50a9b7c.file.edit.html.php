<?php /* Smarty version Smarty-3.1.13, created on 2015-12-01 20:44:04
         compiled from "E:\projects\web\lnest\1yyg225\webapps\www\views\manage\category\edit.html" */ ?>
<?php /*%%SmartyHeaderCode:29194565d9614a68062-91446571%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e5f2b42864c4c3f9f0f1ca331ae35b8ae50a9b7c' => 
    array (
      0 => 'E:\\projects\\web\\lnest\\1yyg225\\webapps\\www\\views\\manage\\category\\edit.html',
      1 => 1418283576,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '29194565d9614a68062-91446571',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'row' => 0,
    'module_list' => 0,
    'select_categorys' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_565d9614af0c09_92431757',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_565d9614af0c09_92431757')) {function content_565d9614af0c09_92431757($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('../public_btn.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="html-box">
    <form target="iframeNewsTarget" method="post" action="/manage/category/edit" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['id'];?>
" />

    <table class="table-list">
    <tbody>

        <tr>
            <td class="td-label"><label>所属模型：</label></td>
            <td class="td-input">
                <?php echo $_smarty_tpl->tpl_vars['module_list']->value;?>

            </td>
        </tr>

        <tr>
            <td class="td-label"><label>上级栏目：</label></td>
            <td class="td-input">
                <select name="post[parentid]">
                    <option value="0">一级栏目</option>
                    <?php echo $_smarty_tpl->tpl_vars['select_categorys']->value;?>

                </select>
            </td>
        </tr>

        <tr>
            <td class="td-label"><label>栏目名称：</label></td>
            <td class="td-input">
                <?php if ($_smarty_tpl->tpl_vars['row']->value['id']){?>
                <input type="text" class="form-i w200" name="post[catname]" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['catname'];?>
" />
                <?php }else{ ?>
                <textarea name="post[catname]" style="height:90px;"></textarea>
                <div class="form-tip">批量添加栏目，一行代表一个</div>
                <?php }?>
            </td>
        </tr>

        <tr class="h s0">
            <td class="td-label"><label>外链地址：</label></td>
            <td class="td-input">
                <input type="text" class="form-i w300" name="post[url]" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['url'];?>
" />
                <input type="hidden" id="type" name="post[type]" value="0" />
            </td>
        </tr>

        <tr>
            <td class="td-label"><label>栏目图片：</label></td>
            <td class="td-input">
                <?php echo $_smarty_tpl->tpl_vars['row']->value['html_thumb'];?>

            </td>
        </tr>

        <?php if ($_smarty_tpl->tpl_vars['row']->value['id']){?>
        <tr class="table-h3 s h0">
            <td colspan="2">
                <label><input type="checkbox" name="chage_all" value="1" /> 将以下设置应用到所有子级栏目</label>
                <label>（<input type="checkbox" name="chage_all_mod" value="1" /> 包含所属模型）</label>
            </td>
        </tr>
        <?php }?>

        <tr class="s h0 h1">
            <td class="td-label"><label>分页条数：</label></td>
            <td class="td-input">
                <input type="text" class="form-i w30" name="post[pagesize]" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['pagesize'];?>
" />
                <span class="form-tip">为空或为0时，默认为系统设置的值</span>
            </td>
        </tr>

        <tr class="s h0">
            <td class="td-label"><label>列表页模板：</label></td>
            <td class="td-input">
                <div id="template_list" style="float: left;margin-right:5px;"></div>
                <label id="listtype0"><input type="radio" class="listtype" name="post[listtype]" value="0"<?php if (!$_smarty_tpl->tpl_vars['row']->value['listtype']){?> checked<?php }?> onclick="category.templatetype(0)" /> 列表页 </label>
                <label id="listtype1"><input type="radio" class="listtype" name="post[listtype]" value="1"<?php if ($_smarty_tpl->tpl_vars['row']->value['listtype']==1){?> checked<?php }?> onclick="category.templatetype(1)" /> 封面页 </label>
                <label id="listtype2"><input type="radio" class="listtype" name="post[listtype]" value="2"<?php if ($_smarty_tpl->tpl_vars['row']->value['listtype']==2){?> checked<?php }?> onclick="category.templatetype(2)" /> 表单页 </label>
            </td>
        </tr>

        <tr class="s h0 h1">
            <td class="td-label"><label>详情页模板：</label></td>
            <td class="td-input">
                <div id="template_show"></div>
            </td>
        </tr>

        <tr>
            <td class="td-label"><label>导航显示：</label></td>
            <td class="td-input">
                <label><input type="radio" name="post[ismenu]" value="1"<?php if ($_smarty_tpl->tpl_vars['row']->value['ismenu']==1){?> checked<?php }?> /> 是</label>
                <label><input type="radio" name="post[ismenu]" value="0"<?php if (!$_smarty_tpl->tpl_vars['row']->value['ismenu']){?> checked<?php }?> /> 否</label>
            </td>
        </tr>

        <tr class="table-h3 s h0">
            <td colspan="2">SEO设置</td>
        </tr>

        <tr class="s h0">
            <td class="td-label"><label>SEO标题：</label></td>
            <td class="td-input">
                <input type="text" class="form-i w200" name="post[title]" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['title'];?>
" />
            </td>
        </tr>

        <tr class="s h0">
            <td class="td-label"><label>SEO关键词：</label></td>
            <td class="td-input">
                <input type="text" class="form-i w200" name="post[keywords]" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['keywords'];?>
" />
            </td>
        </tr>

        <tr class="s h0">
            <td class="td-label"><label>SEO描述：</label></td>
            <td class="td-input">
                <textarea name="post[description]"><?php echo $_smarty_tpl->tpl_vars['row']->value['description'];?>
</textarea>
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

<script type="text/javascript">
var template_list = "<?php echo $_smarty_tpl->tpl_vars['row']->value['template_list'];?>
";
var template_show = "<?php echo $_smarty_tpl->tpl_vars['row']->value['template_show'];?>
";
var list_type = <?php echo $_smarty_tpl->tpl_vars['row']->value['listtype'];?>
;

$.loadJs('/admin/js/manage/category.js',function(){
    category.chang_module($('#moduleid').val(),list_type);
});
</script><?php }} ?>