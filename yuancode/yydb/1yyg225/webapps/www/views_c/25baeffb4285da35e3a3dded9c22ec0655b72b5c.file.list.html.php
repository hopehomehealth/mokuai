<?php /* Smarty version Smarty-3.1.13, created on 2016-07-11 15:46:52
         compiled from "E:\projects\web\1yyg\1yyg225_full\webapps\www\views\manage\goods\list.html" */ ?>
<?php /*%%SmartyHeaderCode:23548576a40490c0ba5-20237959%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '25baeffb4285da35e3a3dded9c22ec0655b72b5c' => 
    array (
      0 => 'E:\\projects\\web\\1yyg\\1yyg225_full\\webapps\\www\\views\\manage\\goods\\list.html',
      1 => 1467707470,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '23548576a40490c0ba5-20237959',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_576a4049175f24_38549933',
  'variables' => 
  array (
    'k' => 0,
    'business_power' => 0,
    'q' => 0,
    'select_categorys' => 0,
    'select_brands' => 0,
    'is_sale' => 0,
    'publish' => 0,
    'list' => 0,
    'm' => 0,
    'page' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_576a4049175f24_38549933')) {function content_576a4049175f24_38549933($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('../public_btn.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="html-box">

<form class="cond-form clear" action="#!goods/index" onsubmit="return xForm.submit(this)">
    <div class="f-unit">
        <select name="k" id="k">
            <option value="g.name" <?php if ($_smarty_tpl->tpl_vars['k']->value=='g.name'){?>selected<?php }?>>商品名称</option>
            <?php if ($_smarty_tpl->tpl_vars['business_power']->value){?>
            <option value="b.bus_name" <?php if ($_smarty_tpl->tpl_vars['k']->value=='b.bus_name'){?>selected<?php }?>>商家名称</option>
            <?php }?>
            <option value="g.id" <?php if ($_smarty_tpl->tpl_vars['k']->value=='g.id'){?>selected<?php }?>>ID</option>
        </select>
        <input id="q" class="form-i w160 sitem" name="q" value="<?php echo $_smarty_tpl->tpl_vars['q']->value;?>
" type="text">
        <select name="cid"><option value="">商品分类</option> <?php echo $_smarty_tpl->tpl_vars['select_categorys']->value;?>
</select>
        <select name="bid"><option value="">商品品牌</option> <?php echo $_smarty_tpl->tpl_vars['select_brands']->value;?>
</select>
        <select name="is_sale">
            <option value="">上架状态</option>
            <option value="99" <?php if ($_smarty_tpl->tpl_vars['is_sale']->value==99){?> selected<?php }?>>未审核</option>
            <option value="1" <?php if ($_smarty_tpl->tpl_vars['is_sale']->value==1){?> selected<?php }?>>已审核</option>
        </select>
        <select name="publish">
            <option value="">发布来源</option>
            <option value="1" <?php if ($_smarty_tpl->tpl_vars['publish']->value==1){?> selected<?php }?>>后台发布</option>
            <option value="2" <?php if ($_smarty_tpl->tpl_vars['publish']->value==2){?> selected<?php }?>>商家发布</option>
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
        <td class="title">
            <div class="oBlk"><?php echo $_smarty_tpl->tpl_vars['m']->value['name'];?>
</div>
            <?php if ($_smarty_tpl->tpl_vars['m']->value['bus_name']){?>
            <p><span style="color:#f00" class="">商家：<?php echo $_smarty_tpl->tpl_vars['m']->value['bus_name'];?>
</span></p>
            <?php }?>
        </td>
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
','goods','is_sale')" class="c-green" title="当前已审核状态">已审核</a>
            <?php }else{ ?>
            <a href="javascript:;" onclick="main.chang_status('<?php echo $_smarty_tpl->tpl_vars['m']->value['id'];?>
','goods','is_sale')" class="c-red" title="当前未审核状态">未审核</a>
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