<?php /* Smarty version Smarty-3.1.13, created on 2016-02-25 17:18:53
         compiled from "D:\test1yyg3.lnest.com\webapps\www\views\manage\linkage\edit.html" */ ?>
<?php /*%%SmartyHeaderCode:1483356cec6fdc3b4f5-61589459%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e605480f17dd6dfd9cf62403823d196a65b10425' => 
    array (
      0 => 'D:\\test1yyg3.lnest.com\\webapps\\www\\views\\manage\\linkage\\edit.html',
      1 => 1456367947,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1483356cec6fdc3b4f5-61589459',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'row' => 0,
    'data' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_56cec6fdd58db7_85352924',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56cec6fdd58db7_85352924')) {function content_56cec6fdd58db7_85352924($_smarty_tpl) {?><div class="html-box">
    <form target="iframeNewsTarget" method="post" action="/manage/linkage/edit">
    <input type="hidden" name="post[id]" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['id'];?>
" />

    <table class="table-list">
    <tbody>

        <tr>
            <td class="td-label"><label>上级菜单：</label></td>
            <td class="td-input">
                <div id="select_linkage"></div>
            </td>
        </tr>

        <tr>
            <td class="td-label"><label>菜单名称：</label></td>
            <td class="td-input">
                <?php if ($_smarty_tpl->tpl_vars['row']->value['id']){?>
                <input type="text" class="form-i w200" name="post[name]" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['name'];?>
" />
                <?php }else{ ?>
                <textarea name="post[name]" style="height:90px;"></textarea>
                <div class="form-tip">批量添加菜单，一行代表一个（添加一级联动时，默认只添加一行）</div>
                <?php }?>
            </td>
        </tr>

        <tr id="markTR">
            <td class="td-label"><label>菜单标识：</label></td>
            <td class="td-input">
                <input type="text" class="form-i w200" name="post[mark]" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['mark'];?>
" />
            </td>
        </tr>

        <tr class="seoTR">
            <td class="td-label"><label>菜单描述：</label></td>
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
$.loadJs('/admin/js/manage/linkage.js',function(){
    linkage.chang_parent("<?php echo $_smarty_tpl->tpl_vars['data']->value['parentid'];?>
",0);
});
</script><?php }} ?>