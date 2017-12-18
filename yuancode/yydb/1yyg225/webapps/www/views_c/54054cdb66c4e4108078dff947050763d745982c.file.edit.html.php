<?php /* Smarty version Smarty-3.1.13, created on 2016-12-05 16:15:20
         compiled from "/data/01/html/1yyg225/webapps/www/views/manage/brand/edit.html" */ ?>
<?php /*%%SmartyHeaderCode:79555902558452218843dd8-56831781%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '54054cdb66c4e4108078dff947050763d745982c' => 
    array (
      0 => '/data/01/html/1yyg225/webapps/www/views/manage/brand/edit.html',
      1 => 1456367946,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '79555902558452218843dd8-56831781',
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
  'unifunc' => 'content_58452218899de9_80610518',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58452218899de9_80610518')) {function content_58452218899de9_80610518($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('../public_btn.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<div class="html-box">    <form target="iframeNewsTarget" method="post" action="/manage/brand/edit" enctype="multipart/form-data">    <input type="hidden" name="post[id]" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['id'];?>
" />    <table class="table-list">    <tbody>        <tr style="display: none;">            <td class="td-label"><label>上级品牌：</label></td>            <td class="td-input">                <select name="post[parentid]">                    <option value="0">一级品牌</option>                    <?php echo $_smarty_tpl->tpl_vars['select_categorys']->value;?>
                </select>            </td>        </tr>        <tr>            <td class="td-label"><label>品牌名称：</label></td>            <td class="td-input">                <?php if ($_smarty_tpl->tpl_vars['row']->value['id']){?>                <input type="text" class="form-i w200" name="post[catname]" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['catname'];?>
" />                <?php }else{ ?>                <textarea name="post[catname]" style="height:90px;"></textarea>                <div class="form-tip">批量添加品牌，一行代表一个</div>                <?php }?>            </td>        </tr>        <tr style="display: none">            <td class="td-label"><label>品牌图片：</label></td>            <td class="td-input">                <?php echo $_smarty_tpl->tpl_vars['row']->value['html_thumb'];?>
            </td>        </tr>        <tr style="display: none">            <td class="td-label"><label>显示：</label></td>            <td class="td-input">                <label><input type="radio" name="post[ismenu]" value="1"<?php if ($_smarty_tpl->tpl_vars['row']->value['ismenu']==1){?> checked<?php }?> /> 是</label>                <label><input type="radio" name="post[ismenu]" value="0"<?php if (!$_smarty_tpl->tpl_vars['row']->value['ismenu']){?> checked<?php }?> /> 否</label>            </td>        </tr>        <tr class="tr-btn">            <td class="td-label"></td>            <td class="td-input">                <button type="submit" name="Submit" class="uiBtn BtnGreen">提&nbsp;&nbsp;交</button>                <button type="reset" class="uiBtn">重&nbsp;&nbsp;置</button>            </td>        </tr>    </tbody>    </table>    </form></div><script type="text/javascript">var template_list = "<?php echo $_smarty_tpl->tpl_vars['row']->value['template_list'];?>
";var template_show = "<?php echo $_smarty_tpl->tpl_vars['row']->value['template_show'];?>
";var list_type = <?php echo $_smarty_tpl->tpl_vars['row']->value['listtype'];?>
;$.loadJs('/admin/js/manage/category.js',function(){    category.chang_module($('#moduleid').val(),list_type);});</script><?php }} ?>