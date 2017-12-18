<?php /* Smarty version Smarty-3.1.13, created on 2016-12-08 14:07:52
         compiled from "/data/01/html/1yyg225/webapps/www/views/manage/yuncat/edit.html" */ ?>
<?php /*%%SmartyHeaderCode:4277238775848f8b8761f11-60726012%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '82530d15ad16c5352249f5101b4754fb84122947' => 
    array (
      0 => '/data/01/html/1yyg225/webapps/www/views/manage/yuncat/edit.html',
      1 => 1468926724,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4277238775848f8b8761f11-60726012',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'row' => 0,
    'select_categorys' => 0,
    'iconfontYC' => 0,
    'k' => 0,
    'm' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5848f8b885ca17_92652870',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5848f8b885ca17_92652870')) {function content_5848f8b885ca17_92652870($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('../public_btn.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<link type="text/css" rel="stylesheet" href="/style/theme_01/fontYC/iconfontYC.css"><style type="text/css">    .font-box{ width: 380px; }    .font-box li{ float: left; }    .font-box li label{ float: left; font-size: 20px; color: #000; text-align: center; width: 35px; height: 35px; line-height: 35px; border: 1px solid #ccc; margin: 0 2px 2px 0; cursor: pointer; }    .font-box li label input{ display: none; }    .font-box li.hover label, .font-box li:hover label{ border-color: red; color: red; }</style><div class="html-box">    <form target="iframeNewsTarget" method="post" action="/manage/yuncat/edit" enctype="multipart/form-data">    <input type="hidden" name="post[id]" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['id'];?>
" />    <table class="table-list">    <tbody>        <tr>            <td class="td-label"><label>上级栏目：</label></td>            <td class="td-input">                <select name="post[parentid]">                    <option value="0">一级栏目</option>                    <?php echo $_smarty_tpl->tpl_vars['select_categorys']->value;?>
                </select>            </td>        </tr>        <tr>            <td class="td-label"><label>栏目名称：</label></td>            <td class="td-input">                <input type="text" class="form-i w160" name="post[catname]" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['catname'];?>
" />                <input type="text" class="form-i w160" name="post[catname_en]" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['catname_en'];?>
" />            </td>        </tr>        <tr class="h s0">            <td class="td-label"><label>外链地址：</label></td>            <td class="td-input">                <input type="text" class="form-i w300" name="post[url]" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['url'];?>
" />                <input type="hidden" id="type" name="post[type]" value="0" />            </td>        </tr>        <tr>            <td class="td-label"><label>栏目图片：</label></td>            <td class="td-input">                <?php echo $_smarty_tpl->tpl_vars['row']->value['html_thumb'];?>
            </td>        </tr>        <tr>            <td class="td-label"><label>选择图标：</label></td>            <td class="td-input">                <ul class="font-box">                    <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['iconfontYC']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['m']->key;
?>                    <li<?php if ($_smarty_tpl->tpl_vars['k']->value==$_smarty_tpl->tpl_vars['row']->value['iconfont']){?> class="hover"<?php }?> onclick="category.changeIcon(this)" title="<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
"><label><input type="radio" name="post[iconfont]" value="<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
"<?php if ($_smarty_tpl->tpl_vars['k']->value==$_smarty_tpl->tpl_vars['row']->value['iconfont']){?> checked<?php }?> /> <i class="iconfontYC"><?php echo $_smarty_tpl->tpl_vars['m']->value;?>
</i></label></li>                    <?php } ?>                </ul>            </td>        </tr>        <tr>            <td class="td-label"<label>导航显示：</label></td>            <td class="td-input">                <label><input type="radio" name="post[ismenu]" value="1"<?php if ($_smarty_tpl->tpl_vars['row']->value['ismenu']==1){?> checked<?php }?> /> 是</label>                <label><input type="radio" name="post[ismenu]" value="0"<?php if (!$_smarty_tpl->tpl_vars['row']->value['ismenu']){?> checked<?php }?> /> 否</label>            </td>        </tr>        <tr class="table-h3 s h0">            <td colspan="2">SEO设置</td>        </tr>        <tr class="s h0">            <td class="td-label"><label>SEO标题：</label></td>            <td class="td-input">                <input type="text" class="form-i w200" name="post[title]" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['title'];?>
" />            </td>        </tr>        <tr class="s h0">            <td class="td-label"><label>SEO关键词：</label></td>            <td class="td-input">                <input type="text" class="form-i w200" name="post[keywords]" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['keywords'];?>
" />            </td>        </tr>        <tr class="s h0">            <td class="td-label"><label>SEO描述：</label></td>            <td class="td-input">                <textarea name="post[description]"><?php echo $_smarty_tpl->tpl_vars['row']->value['description'];?>
</textarea>            </td>        </tr>        <tr class="tr-btn">            <td class="td-label"></td>            <td class="td-input">                <button type="submit" name="Submit" class="uiBtn BtnGreen">提&nbsp;&nbsp;交</button>                <button type="reset" class="uiBtn">重&nbsp;&nbsp;置</button>            </td>        </tr>    </tbody>    </table>    </form></div><script type="text/javascript">$.loadJs('/admin/js/manage/category.js',function(){    //category.chang_module($('#moduleid').val(),list_type);});</script><?php }} ?>