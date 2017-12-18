<?php /* Smarty version Smarty-3.1.13, created on 2016-06-22 15:42:52
         compiled from "E:\projects\web\1yyg\1yyg225_full\webapps\www\views\manage\mobilecat\edit.html" */ ?>
<?php /*%%SmartyHeaderCode:28581576a417c221c89-40927057%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1384254fb3ac2e4743f9ab6ce8899c3f302c7645' => 
    array (
      0 => 'E:\\projects\\web\\1yyg\\1yyg225_full\\webapps\\www\\views\\manage\\mobilecat\\edit.html',
      1 => 1466563984,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '28581576a417c221c89-40927057',
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
  'unifunc' => 'content_576a417c29b8b4_53189906',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_576a417c29b8b4_53189906')) {function content_576a417c29b8b4_53189906($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('../public_btn.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<div class="html-box">    <form target="iframeNewsTarget" method="post" action="/manage/mobilecat/edit" enctype="multipart/form-data">    <input type="hidden" name="post[id]" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['id'];?>
" />    <table class="table-list">    <tbody>        <tr style="display:none;">            <td class="td-label"><label>上级栏目：</label></td>            <td class="td-input">                <select name="post[parentid]">                    <option value="0">一级栏目</option>                    <?php echo $_smarty_tpl->tpl_vars['select_categorys']->value;?>
                </select>            </td>        </tr>        <tr>            <td class="td-label"><label>栏目名称：</label></td>            <td class="td-input">                <input type="text" class="form-i w160" name="post[catname]" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['catname'];?>
" />                <input type="text" class="form-i w160" name="post[catname_en]" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['catname_en'];?>
" />            </td>        </tr>        <tr class="h s0">            <td class="td-label"><label>链接地址：</label></td>            <td class="td-input">                <input type="text" class="form-i w300" name="post[url]" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['url'];?>
" />                <input type="hidden" id="type" name="post[type]" value="1" />            </td>        </tr>        <tr>            <td class="td-label"><label>栏目图标：</label></td>            <td class="td-input">                <?php echo $_smarty_tpl->tpl_vars['row']->value['html_thumb'];?>
            </td>        </tr>        <tr>            <td class="td-label"><label>导航显示：</label></td>            <td class="td-input">                <label><input type="radio" name="post[ismenu]" value="1"<?php if ($_smarty_tpl->tpl_vars['row']->value['ismenu']==1){?> checked<?php }?> /> 是</label>                <label><input type="radio" name="post[ismenu]" value="0"<?php if (!$_smarty_tpl->tpl_vars['row']->value['ismenu']){?> checked<?php }?> /> 否</label>            </td>        </tr>        <tr class="tr-btn">            <td class="td-label"></td>            <td class="td-input">                <button type="submit" name="Submit" class="uiBtn BtnGreen">提&nbsp;&nbsp;交</button>                <button type="reset" class="uiBtn">重&nbsp;&nbsp;置</button>            </td>        </tr>        <tr>            <td class="td-label"><label>温馨提示：</label></td>            <td class="td-input">                <div class="form-tip">                    以下栏目对应链接设置，有默认图标：<br>                    一元区：/yunbuy?zq=1<br>                    十元区：/yunbuy?zq=10<br>                    百元区：/yunbuy?zq=100<br>                    直购区：/yunbuy?zq=buy<br>                    限购区：/yunbuy?zq=limit<br>                    免费区：/yunbuy?type=2<br>                    大转盘：/plate<br>                    晒单：/content/share<br>                    邀请：/member/myivt<br>                    竞拍：/auction/lists<br>                </div>            </td>        </tr>    </tbody>    </table>    </form></div><script type="text/javascript">var template_list = "<?php echo $_smarty_tpl->tpl_vars['row']->value['template_list'];?>
";var template_show = "<?php echo $_smarty_tpl->tpl_vars['row']->value['template_show'];?>
";var list_type = <?php echo $_smarty_tpl->tpl_vars['row']->value['listtype'];?>
;$.loadJs('/admin/js/manage/category.js',function(){    category.chang_module($('#moduleid').val(),list_type);});</script><?php }} ?>