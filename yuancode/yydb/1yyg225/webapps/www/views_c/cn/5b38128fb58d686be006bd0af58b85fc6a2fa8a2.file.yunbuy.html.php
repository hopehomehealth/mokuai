<?php /* Smarty version Smarty-3.1.13, created on 2016-12-10 02:07:01
         compiled from "/data/01/html/1yyg225/webapps/www/views/cn/business/yunbuy.html" */ ?>
<?php /*%%SmartyHeaderCode:1360450961584af2c5316c43-27763369%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5b38128fb58d686be006bd0af58b85fc6a2fa8a2' => 
    array (
      0 => '/data/01/html/1yyg225/webapps/www/views/cn/business/yunbuy.html',
      1 => 1481177860,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1360450961584af2c5316c43-27763369',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'L' => 0,
    'data' => 0,
    'm' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_584af2c5466c11_84520094',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_584af2c5466c11_84520094')) {function content_584af2c5466c11_84520094($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<link type="text/css" rel="stylesheet" href="/style/css_02/style.css" />
<link type="text/css" rel="stylesheet" href="/style/css/member.css" />
<link type="text/css" rel="stylesheet" href="/style/css_02/merchant.css" />
<div class="container menu-show">
    <?php echo $_smarty_tpl->getSubTemplate ("business/ur_here.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

    <?php echo $_smarty_tpl->getSubTemplate ("business/menu.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

    <div class="fn-right hy-r" id="m">
        <div class="shop-right">
            <h3>商品管理</h3>
            <a href="/business/yunbuy_edit#m" class="shop-right2">发布商品</a>
        </div>
        <div class="shop-bor">
            <ul class="shop-ul">
                <li<?php if ($_GET['status']==0){?> class="hover"<?php }?>><a href="?status=0#m">已上架</a></li>
                <li<?php if ($_GET['status']==1){?> class="hover"<?php }?>><a href="?status=1#m">审核中</a></li>
                <li<?php if ($_GET['status']==2){?> class="hover"<?php }?>><a href="?status=2#m">已下架</a></li>
            </ul>
            <div class="shop-manage box-sizing" style="padding-top:13px;">
                <div class="shop-search shop-set" style="padding: 0;height: 50px;">
                    <select id="typeY" class="shop-select" onchange="location.href=this.value">
                        <option value="/business/yunbuy?status=<?php echo $_GET['status'];?>
#m" selected><?php echo $_smarty_tpl->tpl_vars['L']->value['unit_yun'];?>
商品</option>
                        <option value="/business/yunbuy_gobuy?status=<?php echo $_GET['status'];?>
#m"><?php echo $_smarty_tpl->tpl_vars['L']->value['unit_go_buy'];?>
商品</option>
                    </select>
                    <select id="statusY" class="shop-select" onchange="search_yunbuy()">
                        <option value="">-<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_yun'];?>
状态-</option>
                        <option value="1" <?php if ($_GET['statusY']==1){?>selected<?php }?>>进行中</option>
                        <option value="2" <?php if ($_GET['statusY']==2){?>selected<?php }?>>待揭晓</option>
                        <option value="3" <?php if ($_GET['statusY']==3){?>selected<?php }?>>已开奖</option>
                        <option value="4" <?php if ($_GET['statusY']==4){?>selected<?php }?>>已满期</option>
                    </select>
                </div>
                <table width="100%">
                    <tr class="shop-manage1">
                        <th width="" nowrap class="shop-manage2">商品名称</th>
                        <th width="160" nowrap>类别</th>
                        <th width="260" nowrap>参与人次</th>
                        <th nowrap>状态</th>
                    </tr>
                    <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['data']->value['list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>
                    <tr>
                        <td class="shop-manage2">
                            <em><a href="<?php echo $_smarty_tpl->tpl_vars['m']->value['url'];?>
" target="_blank"><img src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['zz'][0][0]->_callViewFunc(array('mod'=>'fileurl','source'=>$_smarty_tpl->tpl_vars['m']->value['imgurl_src'],'width'=>66,'height'=>66,'type'=>1),$_smarty_tpl);?>
"></a></em>
                            <p style="line-height: 1.8;">
                                <a href="<?php echo $_smarty_tpl->tpl_vars['m']->value['url'];?>
" target="_blank">第<?php echo $_smarty_tpl->tpl_vars['m']->value['qishu'];?>
期 <?php echo $_smarty_tpl->tpl_vars['m']->value['title'];?>
</a><br>
                                <span style="color:red"> 商家价格：<?php echo price_format($_smarty_tpl->tpl_vars['m']->value['bus_money']);?>
</span><br />
                                <a href="/business/yunbuy_edit/gobuy?id=<?php echo $_smarty_tpl->tpl_vars['m']->value['buy_id'];?>
" class="btn_a">发布<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_go_buy'];?>
商品</a>
                            </p>
                        </td>
                        <td><?php echo num2char($_smarty_tpl->tpl_vars['m']->value['price']);?>
元区</td>
                        <td>
                            <div class="progressBar">
                                <p class="progressBar-wrap">
                                    <span style="width:<?php echo $_smarty_tpl->tpl_vars['m']->value['buy_num']/$_smarty_tpl->tpl_vars['m']->value['need_num']*100;?>
%"></span>
                                </p>
                                <div class="progressBar-txt">
                                    <div class="txt-l">
                                        <p><b><?php echo $_smarty_tpl->tpl_vars['m']->value['buy_num'];?>
</b></p>
                                        <p>已参与人次</p>
                                    </div>
                                    <div class="txt-c" style="padding-left: 5px;">
                                        <p class="color03"><?php echo $_smarty_tpl->tpl_vars['m']->value['need_num'];?>
</p>
                                        <p>总需人数</p>
                                    </div>
                                    <div class="txt-r">
                                        <p><b><?php echo $_smarty_tpl->tpl_vars['m']->value['end_num'];?>
</b></p>
                                        <p>剩余人次</p>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td nowrap>
                            <?php if ($_smarty_tpl->tpl_vars['m']->value['is_show']==1&&!$_smarty_tpl->tpl_vars['m']->value['is_off']){?>
                            已上架
                            <?php }elseif($_smarty_tpl->tpl_vars['m']->value['is_show']==0&&!$_smarty_tpl->tpl_vars['m']->value['is_off']){?>
                            审核中
                            <?php }elseif($_smarty_tpl->tpl_vars['m']->value['is_off']==1){?>
                            已下架
                            <?php }?>
                        </td>
                    </tr>
                    <?php }
if (!$_smarty_tpl->tpl_vars['m']->_loop) {
?>
                    <tr>
                        <td colspan="10">
                            没有找到数据！
                        </td>
                    </tr>
                    <?php } ?>
                </table>
            </div>
            <?php echo $_smarty_tpl->getSubTemplate ("public_page.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

        </div>
    </div>
</div>
<div class="merchant"></div>
<?php echo $_smarty_tpl->getSubTemplate ("footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<script src="/style/css_02/common_02.js"></script>
<script type="text/javascript">
    //搜索
    function search_yunbuy(){
        var statusY = $('#statusY').val();
        location.href = location.pathname+'?status=<?php echo $_GET['status'];?>
&statusY='+statusY+'#m';
    }
</script><?php }} ?>