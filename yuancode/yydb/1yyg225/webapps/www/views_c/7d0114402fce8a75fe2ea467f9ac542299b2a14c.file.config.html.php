<?php /* Smarty version Smarty-3.1.13, created on 2015-12-03 16:23:54
         compiled from "F:\WWW\1yyg225\webapps\www\views\manage\setting\config.html" */ ?>
<?php /*%%SmartyHeaderCode:3232565ffc1ac8cba0-93792004%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7d0114402fce8a75fe2ea467f9ac542299b2a14c' => 
    array (
      0 => 'F:\\WWW\\1yyg225\\webapps\\www\\views\\manage\\setting\\config.html',
      1 => 1418283576,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3232565ffc1ac8cba0-93792004',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'btnNo' => 0,
    'field_type' => 0,
    'btnMenu' => 0,
    'k' => 0,
    'm' => 0,
    'formInfo' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_565ffc1ae54570_56433865',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_565ffc1ae54570_56433865')) {function content_565ffc1ae54570_56433865($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('../public_btn.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="html-box">

    <form target="iframeNewsTarget" method="post" action="/manage/setting/index/<?php echo $_smarty_tpl->tpl_vars['btnNo']->value;?>
">

    <table class="table-list">
    <tbody>

        
        <?php if ($_smarty_tpl->tpl_vars['btnNo']->value=='add'){?>
        <tr>
            <td class="td-label"><label>字段类型：</label></td>
            <td class="td-input">
                <?php echo $_smarty_tpl->tpl_vars['field_type']->value;?>

            </td>
        </tr>

        <tr>
            <td class="td-label"><label>选择分组：</label></td>
            <td class="td-input">
                <select name="post[group]">
                    <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['btnMenu']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['m']->key;
?>
                    <?php if ($_smarty_tpl->tpl_vars['k']->value!='add'){?>
                    <option value="<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['m']->value['name'];?>
</option>
                    <?php }?>
                    <?php } ?>
                </select>
            </td>
        </tr>

        <tr>
            <td class="td-label"><label>变量介绍：</label></td>
            <td class="td-input">
                <input type="text" class="form-i w200" name="post[title]" value="" />
            </td>
        </tr>

        <tr>
            <td class="td-label"><label>变量名：</label></td>
            <td class="td-input">
                <input type="text" class="form-i w200" name="post[varname]" value="" />
            </td>
        </tr>

        <tr>
            <td class="td-label"><label>注释说明：</label></td>
            <td class="td-input">
                <textarea name="post[tip]"></textarea>
            </td>
        </tr>

        <tr>
            <td class="td-label" style="vertical-align:middle"><label>字段相关：</label></td>
            <td>
                <div id="field_step"></div>
            </td>
        </tr>

        <?php }else{ ?>
        <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['formInfo']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>
        <tr>
            <td class="td-label"><label><?php echo $_smarty_tpl->tpl_vars['m']->value['title'];?>
：</label></td>
            <td class="td-input">
                <?php echo $_smarty_tpl->tpl_vars['m']->value['html'];?>

                <?php if ($_smarty_tpl->tpl_vars['m']->value['user']&&@constant('GID')==-1){?><a href='javascript:;' onclick="main.confirm_del('setting/del','<?php echo $_smarty_tpl->tpl_vars['m']->value['field'];?>
')" class='iconfont icon-a' title='删除'>&#xe606;</a><?php }?>
                <span class="form-tip"><?php echo $_smarty_tpl->tpl_vars['m']->value['field'];?>
</span>
                <?php if ($_smarty_tpl->tpl_vars['m']->value['tip']){?><div class="form-tip"><?php echo $_smarty_tpl->tpl_vars['m']->value['tip'];?>
</div><?php }?>
            </td>
        </tr>
        <?php } ?>

        <?php if ($_smarty_tpl->tpl_vars['btnNo']->value=='mail'){?>
        <tr>
            <td class="td-label"><label>测试邮箱：</label></td>
            <td class="td-input">
                <input type="text" id="mailto" class="form-i w200" />
                <button class="uiBtn BtnBlue" onclick="setting.testMail()">发送测试邮件</button>
                <div class="form-tip">请保存后再测试邮件</div>
                
                <script type="text/javascript">
                    $.loadJs('/admin/js/manage/setting.js',function(){ });
                </script>
                
            </td>
        </tr>
        <?php }?>

        <?php }?>

        <tr class="tr-btn">
            <td class="td-label"></td>
            <td class="td-input">
                <button type="submit" name="<?php if ($_smarty_tpl->tpl_vars['btnNo']->value=='add'){?>SubmitAdd<?php }else{ ?>Submit<?php }?>" class="uiBtn BtnGreen">提&nbsp;&nbsp;交</button>
                <button type="reset" class="uiBtn">重&nbsp;&nbsp;置</button>
            </td>
        </tr>

    </tbody>
    </table>

    </form>
</div>

<?php if ($_smarty_tpl->tpl_vars['btnNo']->value=='add'){?>

<script type="text/javascript">
    $.loadJs('/admin/js/manage/field.js',function(){
        field.chang_field("text",'',true);
    });
</script>

<?php }?>

<?php }} ?>