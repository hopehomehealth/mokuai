<?php /* Smarty version Smarty-3.1.13, created on 2015-12-01 16:32:18
         compiled from "F:\WWW\1yyg225\webapps\www\views\manage\menus\edit.html" */ ?>
<?php /*%%SmartyHeaderCode:30444565d5b12e087b4-29638811%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ba75f3f44ed00427e7947c4b4783f638942a8a32' => 
    array (
      0 => 'F:\\WWW\\1yyg225\\webapps\\www\\views\\manage\\menus\\edit.html',
      1 => 1435213185,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '30444565d5b12e087b4-29638811',
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
  'unifunc' => 'content_565d5b12e8e2e8_28050285',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_565d5b12e8e2e8_28050285')) {function content_565d5b12e8e2e8_28050285($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('../public_btn.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<div class="html-box">    <form target="iframeNewsTarget" method="post" action="/manage/menus/edit">    <input type="hidden" name="post[id]" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['id'];?>
" />    <table class="table-list">    <tbody>        <tr>            <td class="td-label"><label>上级：</label></td>            <td class="td-input">                <select name="post[parentid]">                    <option value="0">一级菜单</option>                    <?php echo $_smarty_tpl->tpl_vars['select_categorys']->value;?>
                </select>            </td>        </tr>        <tr>            <td class="td-label"><label>名称：<span class="c-red">*</span></label></td>            <td class="td-input">                <input type="text" class="form-i w200" name="post[name]" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['name'];?>
" />            </td>        </tr>        <tr>            <td class="td-label"><label>模块：<span class="c-red">*</span></label></td>            <td class="td-input">                <input type="text" class="form-i w200" name="post[mod]" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['mod'];?>
" />            </td>        </tr>        <tr>            <td class="td-label"><label>方法：</label></td>            <td class="td-input">                <input type="text" class="form-i w200" name="post[action]" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['action'];?>
" />            </td>        </tr>        <tr>            <td class="td-label"><label>参数：</label></td>            <td class="td-input">                <input type="text" class="form-i w200" name="post[param]" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['param'];?>
" />            </td>        </tr>        <tr>            <td class="td-label"><label>图标：</label></td>            <td class="td-input">                <input type="text" class="form-i w200" name="post[icon]" value="" />                <span class="iconfont">&nbsp;<?php echo $_smarty_tpl->tpl_vars['row']->value['icon'];?>
</span>            </td>        </tr>        <tr>            <td class="td-label"><label>类型：</label></td>            <td class="td-input">                <select name="post[type]">                    <option value="1"<?php if ($_smarty_tpl->tpl_vars['row']->value['type']==1){?> selected<?php }?>>菜单</option>                    <option value="2"<?php if ($_smarty_tpl->tpl_vars['row']->value['type']==2||!$_smarty_tpl->tpl_vars['row']->value['type']){?> selected<?php }?>>操作</option>                </select>            </td>        </tr>        <tr class="tr-btn">            <td class="td-label"></td>            <td class="td-input">                <button type="submit" name="Submit" class="uiBtn BtnGreen">提&nbsp;&nbsp;交</button>                <button type="reset" class="uiBtn">重&nbsp;&nbsp;置</button>            </td>        </tr>    </tbody>    </table>    </form></div><?php }} ?>