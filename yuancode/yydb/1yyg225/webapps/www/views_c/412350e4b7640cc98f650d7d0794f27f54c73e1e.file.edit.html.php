<?php /* Smarty version Smarty-3.1.13, created on 2016-12-20 14:27:22
         compiled from "/data/01/html/1yyg225/webapps/www/views/manage/posid/edit.html" */ ?>
<?php /*%%SmartyHeaderCode:13531472875858cf4a8a55b6-81617177%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '412350e4b7640cc98f650d7d0794f27f54c73e1e' => 
    array (
      0 => '/data/01/html/1yyg225/webapps/www/views/manage/posid/edit.html',
      1 => 1456367948,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13531472875858cf4a8a55b6-81617177',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'row' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5858cf4a9329d4_72832350',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5858cf4a9329d4_72832350')) {function content_5858cf4a9329d4_72832350($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('../public_btn.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="html-box">
    <form target="iframeNewsTarget" method="post" action="/manage/posid/edit">
    <input type="hidden" name="post[id]" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['id'];?>
" />

    <table class="table-list">
    <tbody>

        <tr>
            <td class="td-label"><label>推荐位名称：<span class="c-red">*</span></label></td>
            <td class="td-input">
                <input type="text" class="form-i w200" name="post[name]" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['name'];?>
" />
            </td>
        </tr>

        <tr class="tr-btn">
            <td class="td-label"></td>
            <td class="td-input">
                <button type="submit" name="Submit" class="uiBtn BtnGreen">提&nbsp;&nbsp;交</button>
            </td>
        </tr>

    </tbody>
    </table>

    </form>
</div><?php }} ?>