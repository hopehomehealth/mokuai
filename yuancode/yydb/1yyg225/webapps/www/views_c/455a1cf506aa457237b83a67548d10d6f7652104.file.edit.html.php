<?php /* Smarty version Smarty-3.1.13, created on 2016-12-05 16:06:41
         compiled from "/data/01/html/1yyg225/webapps/www/views/manage/module/edit.html" */ ?>
<?php /*%%SmartyHeaderCode:90230269558452011731e73-09575456%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '455a1cf506aa457237b83a67548d10d6f7652104' => 
    array (
      0 => '/data/01/html/1yyg225/webapps/www/views/manage/module/edit.html',
      1 => 1456367948,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '90230269558452011731e73-09575456',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'row' => 0,
    'menusOneList' => 0,
    'v' => 0,
    'id' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_58452011994a09_95734760',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58452011994a09_95734760')) {function content_58452011994a09_95734760($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('../public_btn.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="html-box">
    <form target="iframeNewsTarget" method="post" action="/manage/module/edit">
    <input type="hidden" name="post[id]" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['id'];?>
" />

    <table class="table-list">
    <tbody>

        <tr>
            <td class="td-label"><label>模型名称：</label></td>
            <td class="td-input">
                <input type="text" class="form-i w200" name="post[title]" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['title'];?>
" />
            </td>
        </tr>

        <tr>
            <td class="td-label"><label>模型表名：</label></td>
            <td class="td-input">
                <input type="text" class="form-i w200" name="post[name]" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['name'];?>
" <?php if ($_smarty_tpl->tpl_vars['row']->value['id']){?> onfocus="blur()" readonly style="background:#eee;color:#999;"<?php }?> />
            </td>
        </tr>

        <tr>
            <td class="td-label"><label>模型简介：</label></td>
            <td class="td-input">
                <textarea name="post[description]"><?php echo $_smarty_tpl->tpl_vars['row']->value['description'];?>
</textarea>
            </td>
        </tr>

        <tr>
            <td class="td-label"><label>所属模块：</label></td>
            <td class="td-input">
                <select name="post[type]">
                    <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['menusOneList']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>
                    <option value="<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
"<?php if ($_smarty_tpl->tpl_vars['v']->value['id']==$_smarty_tpl->tpl_vars['row']->value['type']){?> selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['v']->value['name'];?>
</option>
                    <?php } ?>
                </select>
            </td>
        </tr>

        <?php if (!$_smarty_tpl->tpl_vars['id']->value){?>
        <tr>
            <td class="td-label"><label>表字段：</label></td>
            <td class="td-input">
                <label><input type="radio" name="emptyfield" value="1" /> 空表字段</label>
                <label><input type="radio" name="emptyfield" value="0" checked /> 普通文章表字段</label>

            </td>
        </tr>
        <?php }?>

        <tr class="table-h3">
            <td colspan="2">后台配置</td>
        </tr>

        <tr>
            <td class="td-label"><label>列表检索字段：</label></td>
            <td class="td-input">
                <input type="text" class="form-i w300" name="post[listsearch]" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['listsearch'];?>
" />
                <span class="form-tip"> 默认：title,catid,posid,status</span>
            </td>
        </tr>

        <tr>
            <td class="td-label"><label>列表显示字段：</label></td>
            <td class="td-input">
                <input type="text" class="form-i w300" name="post[listshow]" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['listshow'];?>
" />
                <span class="form-tip"> 默认：title</span>
            </td>
        </tr>

        <tr>
            <td class="td-label"><label>列表排序：</label></td>
            <td class="td-input">
                <input type="text" class="form-i w300" name="post[htorder]" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['htorder'];?>
" />
                <span class="form-tip"> 默认：listorder DESC,id DESC</span>
            </td>
        </tr>

        <tr class="table-h3">
            <td colspan="2">前台配置</td>
        </tr>

        <tr>
            <td class="td-label"><label>列表调用字段：</label></td>
            <td class="td-input">
                <input type="text" class="form-i w300" name="post[listfields]" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['listfields'];?>
" />
                <span class="form-tip"> 例：id,title,url,catid</span>
            </td>
        </tr>

        <tr>
            <td class="td-label"><label>列表搜索：</label></td>
            <td class="td-input">
                <label><input type="radio" name="post[issearch]" value="1"<?php if ($_smarty_tpl->tpl_vars['row']->value['issearch']==1){?> checked<?php }?> /> 是</label>
                <label><input type="radio" name="post[issearch]" value="0"<?php if ($_smarty_tpl->tpl_vars['row']->value['issearch']!=1){?> checked<?php }?> /> 否</label>
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