<?php /* Smarty version Smarty-3.1.13, created on 2016-02-28 13:01:16
         compiled from "D:\test1yyg3.lnest.com\webapps\www\views\manage\field\type.html" */ ?>
<?php /*%%SmartyHeaderCode:1135056d27f1cea2696-46869683%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e30681d8c338962fc8cea6690a171197a35fb95c' => 
    array (
      0 => 'D:\\test1yyg3.lnest.com\\webapps\\www\\views\\manage\\field\\type.html',
      1 => 1456367946,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1135056d27f1cea2696-46869683',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'type' => 0,
    'setup' => 0,
    'nofield' => 0,
    'select_linkage' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_56d27f1d46fc72_12469416',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56d27f1d46fc72_12469416')) {function content_56d27f1d46fc72_12469416($_smarty_tpl) {?><table class="table-list">
<tbody>
    <?php if ($_smarty_tpl->tpl_vars['type']->value=='catid'){?>

    <?php }elseif($_smarty_tpl->tpl_vars['type']->value=='title'){?>
    <tr>
        <td class="td-label">是否使用标题图片</td>
        <td class="td-input">
            <label><input type="radio" name="setup[thumb]" value="1"<?php if ($_smarty_tpl->tpl_vars['setup']->value['thumb']==1){?> checked<?php }?> /> 是</label>&nbsp;
            <label><input type="radio" name="setup[thumb]" value="0"<?php if (!$_smarty_tpl->tpl_vars['setup']->value['thumb']){?> checked<?php }?> /> 否</label>
        </td>
    </tr>
    <tr>
        <td class="td-label">标题图片按钮文本</td>
        <td class="td-input">
            <input type="text" class="form-i" size="15" name="setup[btntext]" value="<?php echo $_smarty_tpl->tpl_vars['setup']->value['btntext'];?>
" />
            <span class="form-tip">默认：上传缩略图</span>
        </td>
    </tr>
    <tr style="display: none;">
        <td class="td-label">是否使用标题样式</td>
        <td class="td-input">
            <label><input type="radio" name="setup[style]" value="1"<?php if ($_smarty_tpl->tpl_vars['setup']->value['style']==1){?> checked<?php }?> /> 是</label>&nbsp;
            <label><input type="radio" name="setup[style]" value="0"<?php if (!$_smarty_tpl->tpl_vars['setup']->value['style']){?> checked<?php }?> /> 否</label>
        </td>
    </tr>
    <tr>
        <td class="td-label">文本框长度</td>
        <td class="td-input"><input type="text" class="form-i" size="5" name="setup[size]" value="<?php echo $_smarty_tpl->tpl_vars['setup']->value['size'];?>
" /></td>
    </tr>

    <?php }elseif($_smarty_tpl->tpl_vars['type']->value=='typeid'){?>

    <?php }elseif($_smarty_tpl->tpl_vars['type']->value=='text'){?>
    <tr>
        <td class="td-label"><label>文本框长度：</label></td>
        <td class="td-input">
            <input type="text" class="form-i w200" name="setup[size]" value="<?php echo $_smarty_tpl->tpl_vars['setup']->value['size'];?>
" />
        </td>
    </tr>

    <tr>
        <td class="td-label"><label>默认值：</label></td>
        <td class="td-input">
            <input type="text" class="form-i w200" name="setup[default]" value="<?php echo $_smarty_tpl->tpl_vars['setup']->value['default'];?>
" />
        </td>
    </tr>

    <tr>
        <td class="td-label"><label>是否为密码框：</label></td>
        <td class="td-input">
            <label><input type="radio" name="setup[ispassword]" value="1"<?php if ($_smarty_tpl->tpl_vars['setup']->value['ispassword']==1){?> checked<?php }?> /> 是 </label>
            <label><input type="radio" name="setup[ispassword]" value="0"<?php if (!$_smarty_tpl->tpl_vars['setup']->value['ispassword']){?> checked<?php }?> /> 否 </label>
        </td>
    </tr>

    <?php }elseif($_smarty_tpl->tpl_vars['type']->value=='textarea'){?>
    <tr <?php if ($_smarty_tpl->tpl_vars['nofield']->value){?>style="display:none"<?php }?>>
        <td class="td-label">字段类型</td>
        <td class="td-input">
            <select name="setup[fieldtype]">
                <option value="text"<?php if ($_smarty_tpl->tpl_vars['setup']->value['fieldtype']=='text'){?> selected<?php }?>>TEXT</option>
                <option value="mediumtext"<?php if ($_smarty_tpl->tpl_vars['setup']->value['fieldtype']=='mediumtext'){?> selected<?php }?>>MEDIUMTEXT</option>
            </select>
        </td>
    </tr>
    <tr>
        <td class="td-label">文本域宽度</td>
        <td class="td-input"><input type="text" class="form-i" size="5" name="setup[width]" value="<?php echo $_smarty_tpl->tpl_vars['setup']->value['width'];?>
" /> <span class="form-tip">px</span></td>
    </tr>
    <tr>
        <td class="td-label">文本域高度</td>
        <td class="td-input"><input type="text" class="form-i" size="5" name="setup[height]" value="<?php echo $_smarty_tpl->tpl_vars['setup']->value['height'];?>
" /> <span class="form-tip">px</span></td>
    </tr>
    <tr>
        <td class="td-label">默认值</td>
        <td class="td-input"><textarea name="setup[default]" rows="3" cols="40"><?php echo $_smarty_tpl->tpl_vars['setup']->value['default'];?>
</textarea></td>
    </tr>

    <?php }elseif($_smarty_tpl->tpl_vars['type']->value=='editor'){?>
    <tr>
        <td class="td-label">编辑器类型：</td>
        <td class="td-input">
            <select name="setup[edittype]">
                <option value="kindeditor"<?php if ($_smarty_tpl->tpl_vars['setup']->value['edittype']=='kindeditor'){?> selected<?php }?>>kindeditor</option>
            </select>
        </td>
    </tr>

    <tr>
        <td class="td-label">编辑器样式：</td>
        <td class="td-input">
            <label><input type="radio" name="setup[toolbar]" value="basic"<?php if ($_smarty_tpl->tpl_vars['setup']->value['toolbar']=='basic'){?> checked<?php }?>> 简洁型</label>
            <label><input type="radio" name="setup[toolbar]" value="full"<?php if ($_smarty_tpl->tpl_vars['setup']->value['toolbar']=='full'){?> checked<?php }?>> 标准型</label>
        </td>
    </tr>
    <tr>
        <td class="td-label">默认值：</td>
        <td class="td-input"><textarea name="setup[default]" rows="3" cols="40" id="default"><?php echo $_smarty_tpl->tpl_vars['setup']->value['default'];?>
</textarea></td>
    </tr>
    <tr>
        <td class="td-label">编辑器默认高度：</td>
        <td class="td-input"><input type="text" name="setup[height]" value="<?php echo $_smarty_tpl->tpl_vars['setup']->value['height'];?>
" size="4" class="form-i" ></td>
    </tr>

    <?php }elseif($_smarty_tpl->tpl_vars['type']->value=='select'){?>
    <tr>
        <td class="td-label" style="vertical-align: middle">选项列表:<br>例: <font color="red">选项名称|值</font></td>
        <td class="td-input"><textarea name="setup[options]" rows="5" cols="40"><?php echo $_smarty_tpl->tpl_vars['setup']->value['options'];?>
</textarea></td>
    </tr>
    <tr>
        <td class="td-label">选项类型</td>
        <td class="td-input">
            <label><input type="radio" name="setup[multiple]" value="1"<?php if ($_smarty_tpl->tpl_vars['setup']->value['multiple']==1){?> checked<?php }?>> 多选列表框</label>
            <label><input type="radio" name="setup[multiple]" value="0"<?php if (!$_smarty_tpl->tpl_vars['setup']->value['multiple']){?> checked<?php }?>> 下拉框</label>
        </td>
    </tr>
    <tr <?php if ($_smarty_tpl->tpl_vars['nofield']->value){?>style="display:none"<?php }?>>
        <td class="td-label">字段类型</td>
        <td class="td-input">
            <select name="setup[fieldtype]" onchange="javascript:numbertype(this.value);" class="l">
                <option value="varchar"<?php if ($_smarty_tpl->tpl_vars['setup']->value['fieldtype']=='varchar'){?> selected<?php }?>>字符 VARCHAR</option>
                <option value="tinyint"<?php if ($_smarty_tpl->tpl_vars['setup']->value['fieldtype']=='tinyint'){?> selected<?php }?>>整数 TINYINT(3)</option>
                <option value="smallint"<?php if ($_smarty_tpl->tpl_vars['setup']->value['fieldtype']=='smallint'){?> selected<?php }?>>整数 SMALLINT(5)</option>
                <option value="mediumint"<?php if ($_smarty_tpl->tpl_vars['setup']->value['fieldtype']=='mediumint'){?> selected<?php }?>>整数 MEDIUMINT(8)</option>
                <option value="int"<?php if ($_smarty_tpl->tpl_vars['setup']->value['fieldtype']=='int'){?> selected<?php }?>>整数 INT(10)</option>
            </select>
            <span class="form-tip l" id="numbertype" style="display: none;"><input type="checkbox" id="" name="setup[numbertype]" value="1" checked /> 不包括负数</span>
        </td>
    </tr>
    <tr>
        <td class="td-label">可见选项的数目</td>
        <td class="td-input"><input type="text" class="form-i" size="5" name="setup[size]" value="<?php echo $_smarty_tpl->tpl_vars['setup']->value['size'];?>
" /></td>
    </tr>
    <tr>
        <td class="td-label">默认值</td>
        <td class="td-input"><input type="text" class="form-i" size="5"  name="setup[default]" value="<?php echo $_smarty_tpl->tpl_vars['setup']->value['default'];?>
" /></td>
    </tr>

    <?php }elseif($_smarty_tpl->tpl_vars['type']->value=='radio'){?>
    <tr>
        <td class="td-label" style="vertical-align: middle">选项列表:<br>例: <font color="red">选项名称|值</font></td>
        <td class="td-input"><textarea name="setup[options]" rows="5" cols="40"><?php echo $_smarty_tpl->tpl_vars['setup']->value['options'];?>
</textarea></td>
    </tr>
    <tr <?php if ($_smarty_tpl->tpl_vars['nofield']->value){?>style="display:none"<?php }?>>
        <td class="td-label">字段类型</td>
        <td class="td-input">
            <select name="setup[fieldtype]" onchange="javascript:numbertype(this.value);" class="l">
                <option value="varchar"<?php if ($_smarty_tpl->tpl_vars['setup']->value['fieldtype']=='varchar'){?> selected<?php }?>>字符 VARCHAR</option>
                <option value="tinyint"<?php if ($_smarty_tpl->tpl_vars['setup']->value['fieldtype']=='tinyint'){?> selected<?php }?>>整数 TINYINT(3)</option>
                <option value="smallint"<?php if ($_smarty_tpl->tpl_vars['setup']->value['fieldtype']=='smallint'){?> selected<?php }?>>整数 SMALLINT(5)</option>
                <option value="mediumint"<?php if ($_smarty_tpl->tpl_vars['setup']->value['fieldtype']=='mediumint'){?> selected<?php }?>>整数 MEDIUMINT(8)</option>
                <option value="int"<?php if ($_smarty_tpl->tpl_vars['setup']->value['fieldtype']=='int'){?> selected<?php }?>>整数 INT(10)</option>
            </select>
            <span class="form-tip l" id="numbertype" style="display: none;"><input type="checkbox" id="" name="setup[numbertype]" value="1" checked /> 不包括负数</span>
        </td>
    </tr>
    <tr>
        <td class="td-label">宽度</td>
        <td class="td-input"><input type="text" class="form-i" size="10"  name="setup[labelwidth]" value="<?php echo $_smarty_tpl->tpl_vars['setup']->value['labelwidth'];?>
" /></td>
    </tr>
    <tr>
        <td class="td-label">默认值</td>
        <td class="td-input"><input type="text" class="form-i" size="5"  name="setup[default]" value="<?php echo $_smarty_tpl->tpl_vars['setup']->value['default'];?>
" /></td>
    </tr>

    <?php }elseif($_smarty_tpl->tpl_vars['type']->value=='checkbox'){?>
    <tr>
        <td class="td-label" style="vertical-align: middle">选项列表:<br>例: <font color="red">选项名称|值</font></td>
        <td class="td-input"><textarea name="setup[options]" rows="5" cols="40"><?php echo $_smarty_tpl->tpl_vars['setup']->value['options'];?>
</textarea></td>
    </tr>
    <tr <?php if ($_smarty_tpl->tpl_vars['nofield']->value){?>style="display:none"<?php }?>>
        <td class="td-label">字段类型</td>
        <td class="td-input">
            <select name="setup[fieldtype]" onchange="javascript:numbertype(this.value);" class="l">
                <option value="varchar"<?php if ($_smarty_tpl->tpl_vars['setup']->value['fieldtype']=='varchar'){?> selected<?php }?>>字符 VARCHAR</option>
                <option value="tinyint"<?php if ($_smarty_tpl->tpl_vars['setup']->value['fieldtype']=='tinyint'){?> selected<?php }?>>整数 TINYINT(3)</option>
                <option value="smallint"<?php if ($_smarty_tpl->tpl_vars['setup']->value['fieldtype']=='smallint'){?> selected<?php }?>>整数 SMALLINT(5)</option>
                <option value="mediumint"<?php if ($_smarty_tpl->tpl_vars['setup']->value['fieldtype']=='mediumint'){?> selected<?php }?>>整数 MEDIUMINT(8)</option>
                <option value="int"<?php if ($_smarty_tpl->tpl_vars['setup']->value['fieldtype']=='int'){?> selected<?php }?>>整数 INT(10)</option>
            </select>
            <span class="form-tip l" id="numbertype" style="display: none;"><input type="checkbox" id="" name="setup[numbertype]" value="1" checked /> 不包括负数</span>
        </td>
    </tr>
    <tr>
        <td class="td-label">宽度</td>
        <td class="td-input"> <input type="text" class="form-i" size="10"  name="setup[labelwidth]" value="<?php echo $_smarty_tpl->tpl_vars['setup']->value['labelwidth'];?>
" /></td>
    </tr>
    <tr>
        <td class="td-label">默认值</td>
        <td class="td-input"><input type="text" class="form-i" size="5"  name="setup[default]" value="<?php echo $_smarty_tpl->tpl_vars['setup']->value['default'];?>
" /></td>
    </tr>

    <?php }elseif($_smarty_tpl->tpl_vars['type']->value=='image'){?>
    <tr>
        <td class="td-label">文本框长度</td>
        <td class="td-input"><input type="text" name="setup[size]" value="<?php echo $_smarty_tpl->tpl_vars['setup']->value['size'];?>
" size="10" class="form-i" /></td>
    </tr>
    <tr>
        <td class="td-label">默认值</td>
        <td class="td-input"><input type="text" name="setup[default]" value="<?php echo $_smarty_tpl->tpl_vars['setup']->value['default'];?>
" size="40" class="form-i" /></td>
    </tr>
    <tr>
        <td class="td-label">允许上传的文件大小</td>
        <td class="td-input"><input type="text" name="setup[upload_maxsize]" value="<?php echo $_smarty_tpl->tpl_vars['setup']->value['upload_maxsize'];?>
" size="5" class="form-i" />MB </td>
    </tr>
    <tr>
        <td class="td-label">允许上传的文件类型</td>
        <td class="td-input"><input type="text" name="setup[upload_allowext]" value="<?php if ($_smarty_tpl->tpl_vars['setup']->value['upload_allowext']){?><?php echo $_smarty_tpl->tpl_vars['setup']->value['upload_allowext'];?>
<?php }else{ ?>*.gif;*.jpg;*.jpeg;*.png<?php }?>" size="40" class="form-i" /></td>
    </tr>
    <tr>
        <td class="td-label">是否添加水印</td>
        <td class="td-input">
            <label><input type="radio" name="setup[watermark]" value="1"<?php if ($_smarty_tpl->tpl_vars['setup']->value['watermark']==1){?> checked<?php }?>> 是</label>
            <label><input type="radio" name="setup[watermark]" value="0"<?php if (!$_smarty_tpl->tpl_vars['setup']->value['watermark']){?> checked<?php }?>> 否</label>
        </td>
    </tr>
    <tr>
        <td class="td-label">是否从已上传中选择</td>
        <td class="td-input">
            <label><input type="radio" name="setup[more]" value="1"<?php if ($_smarty_tpl->tpl_vars['setup']->value['more']==1){?> checked<?php }?>> 是</label>
            <label><input type="radio" name="setup[more]" value="0"<?php if (!$_smarty_tpl->tpl_vars['setup']->value['more']){?> checked<?php }?>> 否</label>
        </td>
    </tr>

    <?php }elseif($_smarty_tpl->tpl_vars['type']->value=='images'){?>
    <tr>
        <td class="td-label">最多允许上传几张图片</td>
        <td class="td-input"><input type="text" name="setup[upload_maxnum]" value="<?php echo $_smarty_tpl->tpl_vars['setup']->value['upload_maxnum'];?>
" size="5" class="form-i" /></td>
    </tr>
    <tr>
        <td class="td-label">允许上传的文件大小</td>
        <td class="td-input"><input type="text" name="setup[upload_maxsize]" value="<?php echo $_smarty_tpl->tpl_vars['setup']->value['upload_maxsize'];?>
" size="5" class="form-i" />MB </td>
    </tr>
    <tr>
        <td class="td-label">允许上传的文件类型</td>
        <td class="td-input"><input type="text" name="setup[upload_allowext]" value="<?php if ($_smarty_tpl->tpl_vars['setup']->value['upload_allowext']){?><?php echo $_smarty_tpl->tpl_vars['setup']->value['upload_allowext'];?>
<?php }else{ ?>*.gif;*.jpg;*.jpeg;*.png<?php }?>" size="40" class="form-i" /></td>
    </tr>
    <tr style="display: none">
        <td class="td-label">是否添加水印</td>
        <td class="td-input">
            <label><input type="radio" name="setup[watermark]" value="1"<?php if ($_smarty_tpl->tpl_vars['setup']->value['watermark']==1){?> checked<?php }?>> 是</label>
            <label><input type="radio" name="setup[watermark]" value="0"<?php if (!$_smarty_tpl->tpl_vars['setup']->value['watermark']){?> checked<?php }?>> 否</label>
        </td>
    </tr>
    <tr style="display: none">
        <td class="td-label">是否从已上传中选择</td>
        <td class="td-input">
            <label><input type="radio" name="setup[more]" value="1"<?php if ($_smarty_tpl->tpl_vars['setup']->value['more']==1){?> checked<?php }?>> 是</label>
            <label><input type="radio" name="setup[more]" value="0"<?php if (!$_smarty_tpl->tpl_vars['setup']->value['more']){?> checked<?php }?>> 否</label>
        </td>
    </tr>

    <?php }elseif($_smarty_tpl->tpl_vars['type']->value=='file'){?>
    <tr>
        <td class="td-label">文本框长度</td>
        <td class="td-input"><input type="text" name="setup[size]" value="<?php echo $_smarty_tpl->tpl_vars['setup']->value['size'];?>
" size="10" class="form-i" /></td>
    </tr>
    <tr>
        <td class="td-label">默认值</td>
        <td class="td-input"><input type="text" name="setup[default]" value="<?php echo $_smarty_tpl->tpl_vars['setup']->value['default'];?>
" size="40" class="form-i" /></td>
    </tr>
    <tr>
        <td class="td-label">允许上传的文件大小</td>
        <td class="td-input"><input type="text" name="setup[upload_maxsize]" value="<?php echo $_smarty_tpl->tpl_vars['setup']->value['upload_maxsize'];?>
" size="5" class="form-i" />MB </td>
    </tr>
    <tr>
        <td class="td-label">允许上传的文件类型</td>
        <td class="td-input"><input type="text" name="setup[upload_allowext]" value="<?php if ($_smarty_tpl->tpl_vars['setup']->value['upload_allowext']){?><?php echo $_smarty_tpl->tpl_vars['setup']->value['upload_allowext'];?>
<?php }else{ ?>*.zip;*.pdf;*.7gz;*.doc;*.docx;*.xls;*.ppt;*.xlsx<?php }?>" size="40" class="form-i" /></td>
    </tr>
    <tr>
        <td class="td-label">是否从已上传中选择</td>
        <td class="td-input">
            <label><input type="radio" name="setup[more]" value="1"<?php if ($_smarty_tpl->tpl_vars['setup']->value['more']==1){?> checked<?php }?>> 是</label>
            <label><input type="radio" name="setup[more]" value="0"<?php if (!$_smarty_tpl->tpl_vars['setup']->value['more']){?> checked<?php }?>> 否</label>
        </td>
    </tr>

    <?php }elseif($_smarty_tpl->tpl_vars['type']->value=='files'){?>
    <tr>
        <td class="td-label">最多允许上传几个文件</td>
        <td class="td-input"><input type="text" name="setup[upload_maxnum]" value="<?php echo $_smarty_tpl->tpl_vars['setup']->value['upload_maxnum'];?>
" size="5" class="form-i" /></td>
    </tr>
    <tr>
        <td class="td-label">允许上传的文件大小</td>
        <td class="td-input"><input type="text" name="setup[upload_maxsize]" value="<?php echo $_smarty_tpl->tpl_vars['setup']->value['upload_maxsize'];?>
" size="5" class="form-i" />MB </td>
    </tr>
    <tr>
        <td class="td-label">允许上传的文件类型</td>
        <td class="td-input"><input type="text" name="setup[upload_allowext]" value="<?php if ($_smarty_tpl->tpl_vars['setup']->value['upload_allowext']){?><?php echo $_smarty_tpl->tpl_vars['setup']->value['upload_allowext'];?>
<?php }else{ ?>*.zip;*.pdf;*.7gz;*.doc;*.docx;*.xls;*.ppt;*.xlsx<?php }?>" size="40" class="form-i" /></td>
    </tr>
    <tr style="display: none">
        <td class="td-label">是否从已上传中选择</td>
        <td class="td-input">
            <label><input type="radio" name="setup[more]" value="1"<?php if ($_smarty_tpl->tpl_vars['setup']->value['more']==1){?> checked<?php }?>> 是</label>
            <label><input type="radio" name="setup[more]" value="0"<?php if (!$_smarty_tpl->tpl_vars['setup']->value['more']){?> checked<?php }?>> 否</label>
        </td>
    </tr>

    <?php }elseif($_smarty_tpl->tpl_vars['type']->value=='number'){?>
    <tr>
        <td class="td-label">文本框长度</td>
        <td class="td-input"><input type="text" class="form-i" size="5" name="setup[size]" value="<?php echo $_smarty_tpl->tpl_vars['setup']->value['size'];?>
" /></td>
    </tr>
    <tr>
        <td class="td-label">是否包括负数：</td>
        <td class="td-input"><input type="checkbox" name="setup[numbertype]" value="1"<?php if ($_smarty_tpl->tpl_vars['setup']->value['numbertype']){?> checked<?php }?> />不包括负数</td>
    </tr>
    <tr>
        <td class="td-label">小数位数：</td>
        <td class="td-input">
            <select name="setup[decimaldigits]">
                <option value="0"<?php if ($_smarty_tpl->tpl_vars['setup']->value['decimaldigits']==0){?> selected<?php }?>>0</option>
                <option value="1"<?php if ($_smarty_tpl->tpl_vars['setup']->value['decimaldigits']==1){?> selected<?php }?>>1</option>
                <option value="2"<?php if ($_smarty_tpl->tpl_vars['setup']->value['decimaldigits']==2){?> selected<?php }?>>2</option>
                <option value="3"<?php if ($_smarty_tpl->tpl_vars['setup']->value['decimaldigits']==3){?> selected<?php }?>>3</option>
                <option value="4"<?php if ($_smarty_tpl->tpl_vars['setup']->value['decimaldigits']==4){?> selected<?php }?>>4</option>
                <option value="5"<?php if ($_smarty_tpl->tpl_vars['setup']->value['decimaldigits']==5){?> selected<?php }?>>5</option>
            </select>
        </td>
    </tr>
    <tr>
        <td class="td-label">默认值</td>
        <td class="td-input"><input type="text" name="setup[default]" value="<?php echo $_smarty_tpl->tpl_vars['setup']->value['default'];?>
" size="40" class="form-i" /></td>
    </tr>

    <?php }elseif($_smarty_tpl->tpl_vars['type']->value=='datetime'){?>

    <?php }elseif($_smarty_tpl->tpl_vars['type']->value=='posid'){?>

    <?php }elseif($_smarty_tpl->tpl_vars['type']->value=='groupid'){?>
    <tr>
        <td class="td-label">选项类型</td>
        <td class="td-input">
            <label><input type="radio" name="setup[inputtype]" value="checkbox"<?php if ($_smarty_tpl->tpl_vars['setup']->value['inputtype']=='checkbox'){?> checked<?php }?>> 复选框</label>
            <label><input type="radio" name="setup[inputtype]" value="select"<?php if ($_smarty_tpl->tpl_vars['setup']->value['inputtype']=='select'){?> checked<?php }?>> 下拉列表框</label>
            <label><input type="radio" name="setup[inputtype]" value="radio"<?php if ($_smarty_tpl->tpl_vars['setup']->value['inputtype']=='radio'){?> checked<?php }?>> 单选框</label>
        </td>
    </tr>
    <tr <?php if ($_smarty_tpl->tpl_vars['nofield']->value){?>style="display:none"<?php }?>>
        <td class="td-label">字段类型</td>
        <td class="td-input">
            <select name="setup[fieldtype]" onchange="javascript:numbertype(this.value);" class="l">
                <option value="varchar"<?php if ($_smarty_tpl->tpl_vars['setup']->value['fieldtype']=='varchar'){?> selected<?php }?>>字符 VARCHAR</option>
                <option value="tinyint"<?php if ($_smarty_tpl->tpl_vars['setup']->value['fieldtype']=='tinyint'){?> selected<?php }?>>整数 TINYINT(3)</option>
            </select>
            <span class="form-tip l" id="numbertype" style="display: none;"><input type="checkbox" id="" name="setup[numbertype]" value="1" checked /> 不包括负数</span>
        </td>
    </tr>
    <tr>
        <td class="td-label">复选框或单选框时宽度</td>
        <td class="td-input"><input type="text" class="form-i" size="10"  name="setup[labelwidth]" value="<?php echo $_smarty_tpl->tpl_vars['setup']->value['labelwidth'];?>
" /></td>
    </tr>
    <tr>
        <td class="td-label">默认值</td>
        <td class="td-input"><input type="text" class="form-i" size="5"  name="setup[default]" value="<?php echo $_smarty_tpl->tpl_vars['setup']->value['default'];?>
" /></td>
    </tr>

    <?php }elseif($_smarty_tpl->tpl_vars['type']->value=='linkage'){?>
    <tr>
        <td class="td-label">关联菜单</td>
        <td class="td-input">
            <?php echo $_smarty_tpl->tpl_vars['select_linkage']->value;?>

        </td>
    </tr>

    <?php }elseif($_smarty_tpl->tpl_vars['type']->value=='template'){?>

    <?php }elseif($_smarty_tpl->tpl_vars['type']->value=='verify'){?>
    <tr>
        <td class="td-label">文本框长度</td>
        <td class="td-input"><input type="text" class="form-i" size="5" name="setup[size]" value="<?php echo $_smarty_tpl->tpl_vars['setup']->value['size'];?>
" /></td>
    </tr>

    <?php }?>

</tbody>
</table>

<script>
    function numbertype(fieldtype){
        if(fieldtype=='varchar'){
            $('#numbertype').hide();
        }else{
            $('#numbertype').show();
        }
    }
    <?php if (!empty($_smarty_tpl->tpl_vars['setup']->value['fieldtype'])&&$_smarty_tpl->tpl_vars['setup']->value['fieldtype']!='varchar'){?>
        $('#numbertype').show();
    <?php }?>
</script><?php }} ?>