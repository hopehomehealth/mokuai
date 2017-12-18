<?php /* Smarty version Smarty-3.1.13, created on 2016-02-25 10:48:19
         compiled from "D:\test1yyg3.lnest.com\webapps\www\views\manage\goods\list.html" */ ?>
<?php /*%%SmartyHeaderCode:110905660f882152b69-10131440%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '58314189c7fadc7f7da0a097e6b059c9b87a5c3e' => 
    array (
      0 => 'D:\\test1yyg3.lnest.com\\webapps\\www\\views\\manage\\goods\\list.html',
      1 => 1456367947,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '110905660f882152b69-10131440',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5660f8822cee76_84888028',
  'variables' => 
  array (
    'k' => 0,
    'q' => 0,
    'select_categorys' => 0,
    'select_brands' => 0,
    'list' => 0,
    'm' => 0,
    'page' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5660f8822cee76_84888028')) {function content_5660f8822cee76_84888028($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('../public_btn.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="html-box">

<form class="cond-form clear" action="#!goods/index" onsubmit="return xForm.submit(this)">
    <div class="f-unit">
        <select name="k" id="k">
            <option value="name" <?php if ($_smarty_tpl->tpl_vars['k']->value=='name'){?>selected<?php }?>>商品名称</option>
            <option value="id" <?php if ($_smarty_tpl->tpl_vars['k']->value=='id'){?>selected<?php }?>>ID</option>
        </select>
        <input id="q" class="form-i w160 sitem" name="q" value="<?php echo $_smarty_tpl->tpl_vars['q']->value;?>
" type="text">
        <select name="cid"><option value="">商品分类</option> <?php echo $_smarty_tpl->tpl_vars['select_categorys']->value;?>
</select>
        <select name="bid"><option value="">商品品牌</option> <?php echo $_smarty_tpl->tpl_vars['select_brands']->value;?>
</select>
        <button type="submit" style="margin-left:10px; margin-top:1px" class="uiBtn BtnBlue">搜索</button>
    </div>
</form>

<table class="list">
    <thead>
    <tr>
        <th class="w30">排序</th>
        <th class="w30">ID</th>
        <th colspan="2" class="title">商品</th>
        <th>原价</th>
        <th>已售</th>
        <th class="title">分类</th>
        <th class="title">品牌</th>
        <th>创建时间</th>
        <th>上架</th>
        <th class="w100">操作</th>
    </tr>
    </thead>

    <tbody>
    <?php if ($_smarty_tpl->tpl_vars['list']->value){?>
    <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>
    <tr>
        <td align='center'><input type='text' class='form-i-s w30' name='listorders[<?php echo $_smarty_tpl->tpl_vars['m']->value['id'];?>
]' value='<?php echo $_smarty_tpl->tpl_vars['m']->value['listorder'];?>
' /></td>
        <td align='center'><?php echo $_smarty_tpl->tpl_vars['m']->value['id'];?>
</td>
        <td><img src="<?php echo $_smarty_tpl->tpl_vars['m']->value['thumb'];?>
" width="60"></td>
        <td class="title"><div class="oBlk"><?php echo $_smarty_tpl->tpl_vars['m']->value['name'];?>
</div></td>
        <td align='center'><b style="color:#f60"><?php echo $_smarty_tpl->tpl_vars['m']->value['price'];?>
￥</b></td>
        <td align='center'><?php echo $_smarty_tpl->tpl_vars['m']->value['sell'];?>
</td>
        <td class="title"><?php echo $_smarty_tpl->tpl_vars['m']->value['catestr'];?>
</td>
        <td class="title"><?php echo $_smarty_tpl->tpl_vars['m']->value['brand'];?>
</td>
        <td align='center'><?php echo date('Y-m-d',$_smarty_tpl->tpl_vars['m']->value['c_time']);?>
</td>

        <td align='center'>
            <?php if ($_smarty_tpl->tpl_vars['m']->value['is_sale']==1){?>
            <a href="javascript:;" onclick="main.chang_status('<?php echo $_smarty_tpl->tpl_vars['m']->value['id'];?>
','goods','is_sale')" class="c-green" title="当前上架状态">上架</a>
            <?php }else{ ?>
            <a href="javascript:;" onclick="main.chang_status('<?php echo $_smarty_tpl->tpl_vars['m']->value['id'];?>
','goods','is_sale')" class="c-red" title="当前下架状态">下架</a>
            <?php }?>
            </td>
        <td class="opera" align='center' nowrap>
            <a href='#!goods/edit/<?php echo $_smarty_tpl->tpl_vars['m']->value['id'];?>
' class='iconfont icon-a' title='编辑'>&#xe603;</a>
            <a href='javascript:;' onclick="main.confirm_del('goods/del','<?php echo $_smarty_tpl->tpl_vars['m']->value['id'];?>
')" class='iconfont icon-a' title='删除'>&#xe606;</a>
        </td>
    </tr>
    <?php } ?>
    <?php }?>
    </tbody>
</table>
<div class="foot-btn">
    <div class="pager r"><?php echo $_smarty_tpl->tpl_vars['page']->value;?>
</div>
    <button type="button" class="uiBtn BtnGreen" onclick="main.batch_order('formlist','order','goods')">更新排序</button>
</div>
</div><?php }} ?>