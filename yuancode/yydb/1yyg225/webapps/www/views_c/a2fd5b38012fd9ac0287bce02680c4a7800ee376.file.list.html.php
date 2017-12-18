<?php /* Smarty version Smarty-3.1.13, created on 2016-06-21 10:40:06
         compiled from "E:\projects\web\1yyg\1yyg225_0016\webapps\www\views\manage\content\list.html" */ ?>
<?php /*%%SmartyHeaderCode:3745768a906a162f9-72925715%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a2fd5b38012fd9ac0287bce02680c4a7800ee376' => 
    array (
      0 => 'E:\\projects\\web\\1yyg\\1yyg225_0016\\webapps\\www\\views\\manage\\content\\list.html',
      1 => 1456367946,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3745768a906a162f9-72925715',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'moduleinfo' => 0,
    'data' => 0,
    'listshow' => 0,
    'l' => 0,
    'fieldsinfo' => 0,
    'm' => 0,
    'key' => 0,
    's' => 0,
    'page' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5768a906b41ef4_38450377',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5768a906b41ef4_38450377')) {function content_5768a906b41ef4_38450377($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('../public_btn.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<div class="html-box">    <form class="cond-form clear" action="/manage/#!content/index/<?php echo $_smarty_tpl->tpl_vars['moduleinfo']->value['name'];?>
/" name="xform" onsubmit="return xForm.submit(this)" method="get">        <div class="f-unit">            <?php echo $_smarty_tpl->tpl_vars['data']->value['html_search'];?>
            <button type="submit" style="margin-left:10px; margin-top:1px" class="uiBtn BtnBlue">搜索</button>        </div>    </form>    <form name="formlist" target="iframeNewsTarget" method="post" action="">    <table class="list">        <thead>            <tr>                <th class="w40">排序</th>                <th class="w30">ID</th>                <?php  $_smarty_tpl->tpl_vars['l'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['l']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['listshow']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['l']->key => $_smarty_tpl->tpl_vars['l']->value){
$_smarty_tpl->tpl_vars['l']->_loop = true;
?>                <?php if ($_smarty_tpl->tpl_vars['fieldsinfo']->value[$_smarty_tpl->tpl_vars['l']->value]){?>                <th align="left"><?php echo $_smarty_tpl->tpl_vars['fieldsinfo']->value[$_smarty_tpl->tpl_vars['l']->value]['name'];?>
</th>                <?php }?>                <?php } ?>                <?php if ($_smarty_tpl->tpl_vars['fieldsinfo']->value['status']){?>                <th class="w80"><?php echo $_smarty_tpl->tpl_vars['fieldsinfo']->value['status']['name'];?>
</th>                <?php }?>                <?php if ($_smarty_tpl->tpl_vars['fieldsinfo']->value['hits']){?>                <th class="w40"><?php echo $_smarty_tpl->tpl_vars['fieldsinfo']->value['hits']['name'];?>
</th>                <?php }?>                <th class="w100">操作</th>            </tr>        </thead>        <tbody>            <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['data']->value['list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>            <tr>                <td align='center'><input type='text' class='form-i-s w30' name='listorders[<?php echo $_smarty_tpl->tpl_vars['m']->value['id'];?>
]' value='<?php echo $_smarty_tpl->tpl_vars['m']->value['listorder'];?>
' /></td>                <td class='id' align='center'><?php echo $_smarty_tpl->tpl_vars['m']->value['id'];?>
</td>                <?php  $_smarty_tpl->tpl_vars['l'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['l']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['listshow']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['l']->key => $_smarty_tpl->tpl_vars['l']->value){
$_smarty_tpl->tpl_vars['l']->_loop = true;
?>                <?php if ($_smarty_tpl->tpl_vars['fieldsinfo']->value[$_smarty_tpl->tpl_vars['l']->value]){?>                <td>                    <?php echo $_smarty_tpl->tpl_vars['m']->value[$_smarty_tpl->tpl_vars['l']->value];?>
                    <?php if ($_smarty_tpl->tpl_vars['m']->value['thumb'][0]['path']&&$_smarty_tpl->tpl_vars['l']->value=='title'){?><a href="javascript:;" onclick="com.xshow('<?php echo $_smarty_tpl->tpl_vars['m']->value['thumb'][0]['title'];?>
','<img src=\'<?php echo $_smarty_tpl->tpl_vars['m']->value['thumb'][0]['path'];?>
\' />',{ btnTrue:false,hideBtn:true })" class="iconfont c-green seePic" title="查看缩略图" onmousemove="main.seepic(this)">&#xe602;</a><?php }?>                </td>                <?php }?>                <?php } ?>                <?php if ($_smarty_tpl->tpl_vars['fieldsinfo']->value['status']){?>                <td align='center'>                    <?php  $_smarty_tpl->tpl_vars['s'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['s']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['data']->value['status']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['s']->key => $_smarty_tpl->tpl_vars['s']->value){
$_smarty_tpl->tpl_vars['s']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['s']->key;
?>                    <?php if ($_smarty_tpl->tpl_vars['m']->value['status']==$_smarty_tpl->tpl_vars['key']->value){?>                        <?php if ($_smarty_tpl->tpl_vars['data']->value['isstatus']==1){?>                        <a href="javascript:;" onclick="main.chang_status('<?php echo $_smarty_tpl->tpl_vars['m']->value['id'];?>
','<?php echo $_smarty_tpl->tpl_vars['moduleinfo']->value['name'];?>
')" class="<?php if ($_smarty_tpl->tpl_vars['key']->value!=0){?>c-green<?php }else{ ?>c-red<?php }?>" title="当前<?php echo $_smarty_tpl->tpl_vars['s']->value;?>
状态"><?php echo $_smarty_tpl->tpl_vars['s']->value;?>
</a>                        <?php }else{ ?>                        <span title="当前<?php echo $_smarty_tpl->tpl_vars['s']->value;?>
状态"><?php echo $_smarty_tpl->tpl_vars['s']->value;?>
</span>                        <?php }?>                    <?php }?>                    <?php } ?>                </td>                <?php }?>                <?php if ($_smarty_tpl->tpl_vars['fieldsinfo']->value['hits']){?>                <td align="center"><?php echo intval($_smarty_tpl->tpl_vars['m']->value['hits']);?>
</td>                <?php }?>                <td class='opera' align='center' nowrap>                    <a href='#!content/edit/<?php echo $_smarty_tpl->tpl_vars['moduleinfo']->value['name'];?>
?id=<?php echo $_smarty_tpl->tpl_vars['m']->value['id'];?>
&com=xshow|编辑内容' class='iconfont icon-a' title='编辑'>&#xe603;</a>                    <a href='javascript:;' onclick="main.confirm_del('content/del/<?php echo $_smarty_tpl->tpl_vars['moduleinfo']->value['name'];?>
','<?php echo $_smarty_tpl->tpl_vars['m']->value['id'];?>
')" class='iconfont icon-a' title='删除'>&#xe606;</a>                </td>            </tr>            <?php } ?>        </tbody>    </table>    <div class="foot-btn">        <div class="pager r"><?php echo $_smarty_tpl->tpl_vars['page']->value;?>
</div>        <button type="button" class="uiBtn BtnGreen" onclick="main.batch_order('formlist','order','<?php echo $_smarty_tpl->tpl_vars['moduleinfo']->value['name'];?>
')">更新排序</button>    </div>    </form></div><?php }} ?>