<?php /* Smarty version Smarty-3.1.13, created on 2017-01-26 09:42:10
         compiled from "/data/01/html/1yyg225/webapps/www/views/cn/business/yunbuy_add.html" */ ?>
<?php /*%%SmartyHeaderCode:1870134554584af2cb6f37b9-97960205%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4a129fc242e320a99bd2369d9e18dce41b4377f7' => 
    array (
      0 => '/data/01/html/1yyg225/webapps/www/views/cn/business/yunbuy_add.html',
      1 => 1484103638,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1870134554584af2cb6f37b9-97960205',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_584af2cb80d7f7_04758125',
  'variables' => 
  array (
    'row' => 0,
    'bus_limit' => 0,
    'site_config' => 0,
    'L' => 0,
    'yunInfo' => 0,
    'goods' => 0,
    'yuncat' => 0,
    'm' => 0,
    'brand' => 0,
    'option' => 0,
    'config_other' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_584af2cb80d7f7_04758125')) {function content_584af2cb80d7f7_04758125($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<link type="text/css" rel="stylesheet" href="/style/css_02/style.css" />
<link type="text/css" rel="stylesheet" href="/style/css/member.css" />
<link type="text/css" rel="stylesheet" href="/style/css_02/merchant.css" />
<style type="text/css">
    .h2{ font-weight: bold !important; color: #f60; font-size: 16px !important; font-style: italic }
    .shop-set table tr th{ text-align: left; white-space: nowrap; vertical-align: top }
    .tip{ color: #aaa; }
</style>
<div class="container menu-show">
    <?php echo $_smarty_tpl->getSubTemplate ("business/ur_here.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

    <?php echo $_smarty_tpl->getSubTemplate ("business/menu.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

    <div class="fn-right hy-r" id="m">
        <div class="shop-right">
            <h3>发布商品</h3>
            <a href="/business/yunbuy<?php if ($_smarty_tpl->tpl_vars['row']->value['gobuy']==1){?>_gobuy<?php }?>#m" class="shop-right2">商品管理</a>
        </div>
        <div class="shop-bor shop-set">
            <form action="" method="post" target="iframeNews">
                <input type="hidden" name="buy_id" value="" />
                <table width="100%" class="box-sizing" border="0">
                    <tr>
                        <td colspan="1" class="h2">商品信息</td>
                        <td style="line-height:1.8;padding:0 10px;">
                            <p style="color: #f00">
                                温馨提示：请不要发布违禁商品或恶意发布商品，一经发现将取消您的商家功能！<br>
                                发布上限：<?php echo $_smarty_tpl->tpl_vars['bus_limit']->value;?>
（可发布的商品数量上限，包含所有审核中与已下架的商品）<br>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <th>商品类型：</th>
                        <td>
                            <select class="shop-select" onchange="location.href=this.value">
                                <?php if ($_smarty_tpl->tpl_vars['site_config']->value['index_skin']!=2){?>
                                <option value="/business/yunbuy_edit?m<?php if ($_GET['id']){?>&id=<?php echo $_GET['id'];?>
<?php }?>#m" <?php if ($_smarty_tpl->tpl_vars['row']->value['gobuy']==0){?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['L']->value['unit_yun'];?>
商品</option>
                                <?php }?>
                                <option value="/business/yunbuy_edit/gobuy?m<?php if ($_GET['id']){?>&id=<?php echo $_GET['id'];?>
<?php }?>#m" <?php if ($_smarty_tpl->tpl_vars['row']->value['gobuy']==1){?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['L']->value['unit_go_buy'];?>
商品</option>
                            </select>
                            <span style="color: #f00">请先选择商品类型！</span>
                        </td>
                    </tr>
                    <tr>
                        <th width="80">商品名称：</th>
                        <td><input type="text" name="title" value="<?php echo $_smarty_tpl->tpl_vars['yunInfo']->value['title'];?>
" class="shop-set2" placeholder="必填" /></td>
                    </tr>
                    <tr>
                        <th width="80">副标题：</th>
                        <td><input type="text" name="sub_title" value="<?php echo $_smarty_tpl->tpl_vars['yunInfo']->value['goods_subtit'];?>
" class="shop-set2" placeholder="选填" /></td>
                    </tr>
                    <tr>
                        <th width="80">商品价值：</th>
                        <td><input type="text" name="true_price" value="<?php echo $_smarty_tpl->tpl_vars['goods']->value['price'];?>
" class="shop-set2" placeholder="选填（商品的实际价值）" /></td>
                    </tr>
                    <tr>
                        <th>商品分类：</th>
                        <td>
                            <select name="cid" class="shop-select">
                                <option value="0">请选择</option>
                                <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['yuncat']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>
                                <?php if ($_smarty_tpl->tpl_vars['m']->value['ismenu']==1&&$_smarty_tpl->tpl_vars['m']->value['parentid']==0){?>
                                <option value="<?php echo $_smarty_tpl->tpl_vars['m']->value['id'];?>
" <?php if ($_smarty_tpl->tpl_vars['yunInfo']->value['cid']==$_smarty_tpl->tpl_vars['m']->value['id']){?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['m']->value['catname'];?>
</option>
                                <?php }?>
                                <?php } ?>
                            </select>
                        </td>
                    </tr>
                    <?php if (!$_smarty_tpl->tpl_vars['goods']->value['id']){?>
                    <tr>
                        <th>商品品牌：</th>
                        <td>
                            <select name="bid" id="bid" class="shop-select">
                                <option value="0">请选择</option>
                                <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['brand']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>
                                <option value="<?php echo $_smarty_tpl->tpl_vars['m']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['m']->value['catname'];?>
</option>
                                <?php } ?>
                            </select>
                            <input type="text" name="brand_name" id="brand_name" class="shop-set2" style="width:22%;display: none;" />
                            <label><input type="checkbox" name="add_brand" value="1" onclick="select_addbrand($(this))" /> 其它品牌</label>
                        </td>
                    </tr>
                    <tr>
                        <th>商品图片：</th>
                        <td>
                            <div class="bus_goods_file">
                                <span class="tip">文件格式：gif jpg jpeg png 文件大小：1MB以内</span>
                                <?php $_smarty_tpl->createLocalArrayVariable('option', null, 0);
$_smarty_tpl->tpl_vars['option']->value['btn_title'] = '选择商品图片';?>
                                <?php echo upload_btn('goods','','',5,'','1',$_smarty_tpl->tpl_vars['option']->value);?>

                            </div>
                            <style type="text/css">
                                .bus_goods_file{ position: relative; }
                                .bus_goods_file span.tip{ position: absolute; left: 120px; top: 9px; }
                                /*.webuploader-pick{ border-radius: 5px; }*/
                                .uploader-list{ line-height: 1.5; padding-top:10px; }
                                .uploader-list b{ font-weight: normal; }
                            </style>
                        </td>
                    </tr>
                    <tr>
                        <th>商品详情：</th>
                        <td>
                            <?php echo $_smarty_tpl->tpl_vars['row']->value['html_content'];?>

                        </td>
                    </tr>
                    <tr>
                        <th>下单备注：</th>
                        <td>
                            <textarea name="tips" rows="5" class="shop-textarea" placeholder="选填，示例：请选择商品颜色（白、黑）："></textarea>
                        </td>
                    </tr>
                    <?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['row']->value['gobuy']==1){?>
                    <tr>
                        <td colspan="2" class="h2">直购参数</td>
                    </tr>
                    <tr>
                        <th>购买价格：</th>
                        <td>
                            <input type="text" name="custom_price" id="goods_price" value="" class="shop-set2" placeholder="" onblur="bus_rebate()" />
                            <p style="color: #f00">平台抽佣：<span id="bus_rebate">￥0</span> （购买价格=实际价值+平台抽佣+商家利润）</p>
                        </td>
                    </tr>
                    <tr>
                        <th>市场价格：</th>
                        <td>
                            <input type="text" name="goods_price" value="" class="shop-set2" placeholder="" />
                        </td>
                    </tr>
                    <tr>
                        <th>库存：</th>
                        <td>
                            <input type="text" name="need_num" value="999" class="shop-set2" placeholder="" />
                        </td>
                    </tr>

                    <?php }else{ ?>
                    <tr>
                        <td colspan="2" class="h2">云购参数</td>
                    </tr>
                    <tr>
                        <th>商品总需：</th>
                        <td>
                            <input type="text" name="goods_price" id="goods_price" value="" class="shop-set2" placeholder="<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_db_points'];?>
" onblur="bus_rebate()" />
                            <p style="color:#f00;line-height: 1.5;padding-top:10px;">
                                平台抽佣：<span id="bus_rebate">￥0</span> （商品总需=实际价值+平台抽佣+商家利润）<br />
                                所有商品总需建议不要超过5000元；<br />
                                超过5000元，房车类商品，需要取得相关资质和许可
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <th>单次价格：</th>
                        <td>
                            <select name="price" id="price" class="shop-select">
                                <option value="1">1</option>
                                <option value="5">5</option>
                                <option value="10">10</option>
                                <option value="100">100</option>
                            </select>
                            <p class="tip"><?php echo $_smarty_tpl->tpl_vars['L']->value['unit_db_points'];?>
/每人次（总需人次=商品总需/单次价格）</p>
                        </td>
                    </tr>
                    <tr>
                        <th>最大期数：</th>
                        <td>
                            <input type="text" name="max_qishu" value="500" class="shop-set2" placeholder="" />
                            <p class="tip">必填（不得超过500期）</p>
                        </td>
                    </tr>
                    <tr>
                        <th>限购人次：</th>
                        <td>
                            <input type="text" name="limit" value="0" class="shop-set2" placeholder="" />
                            <p class="tip">选填（单个会员限购人次，默认不限制）</p>
                        </td>
                    </tr>
                    <?php }?>
                    <tr>
                        <th>&nbsp;</th>
                        <td>
                            <input type="submit" name="submit" value="发布该商品" class="shop-set3" />
                            <p style="color: #f00">重要提示：发布前请仔细检查，审核后不可再更新！</p>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</div>
<div class="merchant"></div>
<?php echo $_smarty_tpl->getSubTemplate ("footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<script src="/style/css_02/common_02.js"></script>
<script type="text/javascript">
    function bus_rebate(){
        var bus_rebate = parseFloat('<?php echo (($tmp = @$_smarty_tpl->tpl_vars['config_other']->value['bus_rebate'])===null||$tmp==='' ? '' : $tmp);?>
');
        var goods_price = $('#goods_price').val();
        $('#bus_rebate').html('￥'+(bus_rebate*goods_price/100).toFixed(2));
    }
    function select_addbrand(obj){
        if(obj.is(':checked')){
            $('#bid').hide();
            $('#brand_name').show();
        }else{
            $('#brand_name').hide();
            $('#bid').show();
        }
    }
</script><?php }} ?>