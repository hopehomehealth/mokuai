<?php /* Smarty version Smarty-3.1.13, created on 2016-02-25 10:57:17
         compiled from "D:\test1yyg3.lnest.com\webapps\www\views\manage\goods\edit.html" */ ?>
<?php /*%%SmartyHeaderCode:155415660f8a1efc267-56040999%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bca6526d544907fa1d35df8feea336f4308f0028' => 
    array (
      0 => 'D:\\test1yyg3.lnest.com\\webapps\\www\\views\\manage\\goods\\edit.html',
      1 => 1456367947,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '155415660f8a1efc267-56040999',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5660f8a21a4616_35323500',
  'variables' => 
  array (
    'product' => 0,
    'select_categorys' => 0,
    'select_brands' => 0,
    'common' => 0,
    'spec_list' => 0,
    'm' => 0,
    'n' => 0,
    'goodsItem' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5660f8a21a4616_35323500')) {function content_5660f8a21a4616_35323500($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('../public_btn.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<style type="text/css">
.stocks table{width:100%}
.spec-item{width:140px; display:inline-block}
.spec-item *{display:inline-block; vertical-align:middle}
.spec-item span{width:100px}
</style>
<div class="html-box">
    <form target="iframeNewsTarget" enctype="multipart/form-data" method="post" action="/manage/goods/submit" id="goods-form">
        <input name="id" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['product']->value['id'];?>
" />
        <input type="hidden" id="x_cate" value="<?php echo $_smarty_tpl->tpl_vars['product']->value['cate'];?>
">
        <input type="hidden" id="x_subcate" value="<?php echo $_smarty_tpl->tpl_vars['product']->value['subcate'];?>
">

        <table class="table-list">
        <tbody>
            <tr>
                <td class="td-label"><label>商品名称：<span class="c-red">*</span></label></td>
                <td class="td-input">
                    <input class="form-i w360" type="text" name="name" value="<?php echo $_smarty_tpl->tpl_vars['product']->value['name'];?>
" />
                </td>
            </tr>

            <tr>
                <td class="td-label"><label>商品分类：<span class="c-red">*</span></label></td>
                <td class="td-input">
                    <select name="cid"><?php echo $_smarty_tpl->tpl_vars['select_categorys']->value;?>
</select>
                </td>
            </tr>

            <tr>
                <td class="td-label"><label>商品品牌：</label></td>
                <td class="td-input">
                    <select name="bid"><option value="">请选择</option><?php echo $_smarty_tpl->tpl_vars['select_brands']->value;?>
</select>
                </td>
            </tr>

            <tr>
                <td class="td-label"><label>商品来源：</label></td>
                <td class="td-input">
                    <input class="form-i w360" type="text" name="desc" value="<?php echo $_smarty_tpl->tpl_vars['product']->value['desc'];?>
" />
                    <div class="form-tip">格式示例：京东采购|http://www.jd.com</div>
                </td>
            </tr>

            <tr>
                <td class="td-label"><label>原价：</label></td>
                <td class="td-input">
                    <input type="text" class="form-i w140" name="price" value="<?php echo $_smarty_tpl->tpl_vars['product']->value['price'];?>
" placeholder="0.00" />
                </td>
            </tr>

            <?php if ($_smarty_tpl->tpl_vars['common']->value['a_money']){?>
            <tr>
                <td class="td-label"><label>折现价：</label></td>
                <td class="td-input">
                    <input type="text" class="form-i w140" name="real_price" value="<?php echo $_smarty_tpl->tpl_vars['product']->value['real_price'];?>
" placeholder="0" />
                    <div class="form-tip">0表示不支持折现</div>
                </td>
            </tr>
            <?php }?>

            <tr>
                <td class="td-label"><label>缩略图：</label></td>
                <td class="td-input">
                    <?php echo $_smarty_tpl->tpl_vars['product']->value['html_thumb'];?>

                    <span class="form-tip">
                        <!--建议：最佳尺寸268*195-->
                    </span>
                </td>
            </tr>

            <tr>
                <td class="td-label"><label>展示图集：</label></td>
                <td class="td-input">
                    <?php echo $_smarty_tpl->tpl_vars['product']->value['html_goods_thumb'];?>

                    <span class="form-tip">建议：为放大镜效果更好的展示，最佳宽度>=800，高度随意</span>
                </td>
            </tr>

            <tr>
                <td class="td-label"><label>商品详情：</label></td>
                <td class="td-input" colspan="2">
                    <?php echo $_smarty_tpl->tpl_vars['product']->value['html_content'];?>

                </td>
            </tr>

            <tr style="display: none;">
                <td class="td-label"><label>商品规格：</label></td>
                <td class="td-input">
                    <div class="goods-spec" id="sp-box">
                        <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['spec_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>
                        <div class="f-unit spec-unit" sp_id="<?php echo $_smarty_tpl->tpl_vars['m']->value['id'];?>
" sp_name="<?php echo $_smarty_tpl->tpl_vars['m']->value['name'];?>
">
                            <label class="ui-label w60"><?php echo $_smarty_tpl->tpl_vars['m']->value['name'];?>
：</label>
                            <div class="rule-box">
                                <?php  $_smarty_tpl->tpl_vars['n'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['n']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['m']->value['values']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['n']->key => $_smarty_tpl->tpl_vars['n']->value){
$_smarty_tpl->tpl_vars['n']->_loop = true;
?>
                                <label class="spec-item">
                                    <?php if (isset($_smarty_tpl->tpl_vars['product']->value['sp_val'][$_smarty_tpl->tpl_vars['m']->value['id']][$_smarty_tpl->tpl_vars['n']->value['id']])){?>
                                    <input class="spec-ckbox e1-goods-setSpecVal-<?php echo $_smarty_tpl->tpl_vars['n']->value['id'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['product']->value['sp_val'][$_smarty_tpl->tpl_vars['m']->value['id']][$_smarty_tpl->tpl_vars['n']->value['id']];?>
" type="checkbox" name="sp_val[<?php echo $_smarty_tpl->tpl_vars['m']->value['id'];?>
][<?php echo $_smarty_tpl->tpl_vars['n']->value['id'];?>
]" spitem_id="<?php echo $_smarty_tpl->tpl_vars['n']->value['id'];?>
" checked>
                                    <span><input value="<?php echo $_smarty_tpl->tpl_vars['product']->value['sp_val'][$_smarty_tpl->tpl_vars['m']->value['id']][$_smarty_tpl->tpl_vars['n']->value['id']];?>
" class="spec-val form-i BtnSm w110" onblur="goods.chSepcValue(this)"></span>
                                    <?php }else{ ?>
                                    <input class="spec-ckbox e1-goods-setSpecVal-<?php echo $_smarty_tpl->tpl_vars['n']->value['id'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['n']->value['value'];?>
" type="checkbox" name="sp_val[<?php echo $_smarty_tpl->tpl_vars['m']->value['id'];?>
][<?php echo $_smarty_tpl->tpl_vars['n']->value['id'];?>
]" spitem_id="<?php echo $_smarty_tpl->tpl_vars['n']->value['id'];?>
">
                                    <span><?php echo $_smarty_tpl->tpl_vars['n']->value['value'];?>
</span>
                                    <?php }?>
                                </label>
                                <?php } ?>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </td>
            </tr>

            <tr class="table-h3">
                <td colspan="2">其它信息</td>
            </tr>

            <tr>
                <td class="td-label"><label>是否上架：</label></td>
                <td class="td-input">
                    <label><input type="radio" name="is_sale" value="1" <?php if ($_smarty_tpl->tpl_vars['product']->value['is_sale']==1){?>checked<?php }?>/>是</label>
                    <label><input type="radio" name="is_sale" value="0" <?php if ($_smarty_tpl->tpl_vars['product']->value['is_sale']==0){?>checked<?php }?>/>否</label>
                </td>
            </tr>

            <tr>
                <td class="td-label"><label>关键词：</label></td>
                <td class="td-input">
                    <input type="text" class="form-i w200" name="words" value="<?php echo $_smarty_tpl->tpl_vars['product']->value['words'];?>
" />
                    <div class="form-tip">多个关键词用|分隔</div>
                </td>
            </tr>

            <tr>
                <td class="td-label"><label>下单备注：</label></td>
                <td class="td-input">
                    <textarea name="tips"><?php echo $_smarty_tpl->tpl_vars['product']->value['tips'];?>
</textarea>
                    <div class="form-tip">下单时，提示会员需要填写的信息</div>
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

$.loadJs('/admin/js/manage/product.js',function(){
$.loadJs('/admin/js/manage/goods.js',function(){
$.loadJs('/admin/js/upload.js',function(){
    //goods.spData = '';
    <?php if (isset($_smarty_tpl->tpl_vars['goodsItem']->value)){?>
        goods.stuffSpecs(<?php echo $_smarty_tpl->tpl_vars['goodsItem']->value;?>
);
    <?php }?>
    //gallery.initUploader();
});
});
});
</script>
</div>

<?php }} ?>