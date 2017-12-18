<?php /* Smarty version Smarty-3.1.13, created on 2016-12-10 13:27:48
         compiled from "/data/01/html/1yyg225/webapps/www/views/cn/business/info.html" */ ?>
<?php /*%%SmartyHeaderCode:1126842745584b925425d0c5-71824345%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '92919047c9f265f4044bf18a491757af4ba19a31' => 
    array (
      0 => '/data/01/html/1yyg225/webapps/www/views/cn/business/info.html',
      1 => 1467195634,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1126842745584b925425d0c5-71824345',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'business_row' => 0,
    'option' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_584b92542d9871_06685019',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_584b92542d9871_06685019')) {function content_584b92542d9871_06685019($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<link type="text/css" rel="stylesheet" href="/style/css_02/style.css" />
<link type="text/css" rel="stylesheet" href="/style/css/member.css" />
<link type="text/css" rel="stylesheet" href="/style/css_02/merchant.css" />
<div class="container menu-show">
    <?php echo $_smarty_tpl->getSubTemplate ("business/ur_here.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

    <?php echo $_smarty_tpl->getSubTemplate ("business/menu.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

    <div class="fn-right hy-r" id="m">
        <div class="shop-right">
            <h3>店铺设置</h3>
        </div>
        <div class="shop-bor shop-set">
            <form action="" method="post" target="iframeNews">
            <table width="100%" class="box-sizing" border="0">
                <tr>
                    <th width="100">店铺logo：</th>
                    <td colspan='3'>
                        <dl class="shop-set1">
                            <dt class="v"><img src="<?php echo default_pic($_smarty_tpl->tpl_vars['business_row']->value['bus_logo'],'store');?>
" id="bus_logo" /><span></span></dt>
                            <dd>
                                <?php $_smarty_tpl->createLocalArrayVariable('option', null, 0);
$_smarty_tpl->tpl_vars['option']->value['btn_title'] = '选择LOGO';?>
                                <?php echo upload_btn('bus_logo',150,150,1,'','',$_smarty_tpl->tpl_vars['option']->value);?>

                                <style type="text/css">
                                    .webuploader-pick{ background: none; padding: 0; color: #ff706a; text-decoration: underline; }
                                    .uploader-list{ display: none; }
                                </style>
                            </dd>
                        </dl>
                    </td>
                </tr>
                <tr>
                    <th width="100">店铺名称：</th>
                    <td width="330"><input type="text" name="name" value="<?php echo $_smarty_tpl->tpl_vars['business_row']->value['bus_name'];?>
" class="shop-set2" placeholder="必填" /></td>
                    <th width="100">经营范围：</th>
                    <td><input type="text" name="scope" value="<?php echo $_smarty_tpl->tpl_vars['business_row']->value['bus_scope'];?>
" class="shop-set2" placeholder="必填" /></td>
                </tr>
                <tr>
                    <th>实体名称：</th>
                    <td><input type="text" name="company" value="<?php echo $_smarty_tpl->tpl_vars['business_row']->value['bus_company'];?>
" class="shop-set2" placeholder="必填" /></td>
                    <th>实体类型：</th>
                    <td><input type="text" name="company_type" value="<?php echo $_smarty_tpl->tpl_vars['business_row']->value['bus_company_type'];?>
" class="shop-set2" placeholder="必填" /></td>
                </tr>
                <tr>
                    <th>客服电话：</th>
                    <td><input type="text" name="tel" value="<?php echo $_smarty_tpl->tpl_vars['business_row']->value['bus_tel'];?>
" class="shop-set2" placeholder="必填" /></td>
                    <th>所属地区：</th>
                    <td>
                        <?php ob_start();?><?php echo (($tmp = @$_smarty_tpl->tpl_vars['business_row']->value['bus_zone'])===null||$tmp==='' ? 1 : $tmp);?>
<?php $_tmp1=ob_get_clean();?><?php echo linkage('zone',$_tmp1);?>

                    </td>
                </tr>
                <tr>
                    <th>客服QQ号：</th>
                    <td><input type="text" name="qq" value="<?php echo $_smarty_tpl->tpl_vars['business_row']->value['bus_qq'];?>
" class="shop-set2" placeholder="选填" /></td>
                    <th>联系地址：</th>
                    <td><input type="text" name="address" value="<?php echo $_smarty_tpl->tpl_vars['business_row']->value['bus_address'];?>
" class="shop-set2" placeholder="必填" /></td>
                </tr>
                <tr>
                    <th>&nbsp;</th>
                    <td><input type="submit" name="submit" value="保存修改" class="shop-set3" /></td>
                    <th>&nbsp;</th>
                    <td>&nbsp;</td>
                </tr>
            </table>
            </form>
        </div>
    </div>
</div>
<div class="merchant"></div>
<?php echo $_smarty_tpl->getSubTemplate ("footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<script src="/style/css_02/common_02.js"></script><?php }} ?>