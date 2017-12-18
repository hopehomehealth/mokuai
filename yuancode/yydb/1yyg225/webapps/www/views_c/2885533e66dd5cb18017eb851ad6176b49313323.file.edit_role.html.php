<?php /* Smarty version Smarty-3.1.13, created on 2016-02-25 15:16:40
         compiled from "D:\test1yyg3.lnest.com\webapps\www\views\manage\admin\edit_role.html" */ ?>
<?php /*%%SmartyHeaderCode:167725660fc0d820a78-15460799%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2885533e66dd5cb18017eb851ad6176b49313323' => 
    array (
      0 => 'D:\\test1yyg3.lnest.com\\webapps\\www\\views\\manage\\admin\\edit_role.html',
      1 => 1456367947,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '167725660fc0d820a78-15460799',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5660fc0d8e8c82_76390393',
  'variables' => 
  array (
    'row' => 0,
    'select_category' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5660fc0d8e8c82_76390393')) {function content_5660fc0d8e8c82_76390393($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('../public_btn.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="html-box">
    <form target="iframeNewsTarget" method="post" action="/manage/admin/edit_role">
    <input type="hidden" name="post[id]" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['id'];?>
" />

    <table class="table-list">
    <tbody>

        <tr>
            <td class="td-label"><label>角色名称：<span class="c-red">*</span></label></td>
            <td class="td-input">
                <input type="text" class="form-i w200" name="post[name]" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['name'];?>
" />
            </td>
        </tr>

        <tr>
            <td class="td-label"><label>角色描述：</label></td>
            <td class="td-input">
                <textarea name="post[desc]"><?php echo $_smarty_tpl->tpl_vars['row']->value['desc'];?>
</textarea>
            </td>
        </tr>

        <tr>
            <td class="td-label"><label>分配权限：</label></td>
            <td class="td-input">
                <div>
                    <button type="button" class="uiBtn BtnBlue" onclick="main.allchecked('post[menu_list][]');">全选</button>
                    <button type="button" class="uiBtn" onclick="main.unchecked('post[menu_list][]');">反选</button>
                </div>
                <?php echo $_smarty_tpl->tpl_vars['select_category']->value;?>

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