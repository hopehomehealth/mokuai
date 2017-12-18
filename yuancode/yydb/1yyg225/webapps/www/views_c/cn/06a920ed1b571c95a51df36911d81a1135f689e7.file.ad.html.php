<?php /* Smarty version Smarty-3.1.13, created on 2016-12-10 13:27:58
         compiled from "/data/01/html/1yyg225/webapps/www/views/cn/business/ad.html" */ ?>
<?php /*%%SmartyHeaderCode:919730640584b925e825938-09840216%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '06a920ed1b571c95a51df36911d81a1135f689e7' => 
    array (
      0 => '/data/01/html/1yyg225/webapps/www/views/cn/business/ad.html',
      1 => 1467707472,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '919730640584b925e825938-09840216',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'ads' => 0,
    'option' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_584b925e884582_57307772',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_584b925e884582_57307772')) {function content_584b925e884582_57307772($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<link type="text/css" rel="stylesheet" href="/style/css_02/style.css" />
<link type="text/css" rel="stylesheet" href="/style/css/member.css" />
<link type="text/css" rel="stylesheet" href="/style/css_02/merchant.css" />
<div class="container menu-show">
    <?php echo $_smarty_tpl->getSubTemplate ("business/ur_here.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

    <?php echo $_smarty_tpl->getSubTemplate ("business/menu.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

    <div class="fn-right hy-r" id="m">
        <div class="shop-right">
            <h3>店铺广告图</h3>
        </div>
        <div class="shop-bor shop-set">
            <form action="" method="post" target="iframeNews">
            <table width="100%" class="box-sizing" border="0">
                <tr>
                    <th width="150">店铺首页广告图：</th>
                    <td>
                        <p style="color: #f00">
                            温馨提示：广告图最佳尺寸为 宽905像素 高400像素
                        </p>
                        <ul class="shop-set5">
                            <li>
                                <em class="v"><img src="<?php echo default_pic($_smarty_tpl->tpl_vars['ads']->value[0]['path'],'ad');?>
" id="ad0" /><span></span></em>
                                <?php $_smarty_tpl->createLocalArrayVariable('option', null, 0);
$_smarty_tpl->tpl_vars['option']->value['btn_title'] = ' ';?>
                                <?php echo upload_btn('ad0',905,400,1,'','',$_smarty_tpl->tpl_vars['option']->value);?>

                            </li>
                            <li>
                                <em class="v"><img src="<?php echo default_pic($_smarty_tpl->tpl_vars['ads']->value[1]['path'],'ad');?>
" id="ad1" /><span></span></em>
                                <?php $_smarty_tpl->createLocalArrayVariable('option', null, 0);
$_smarty_tpl->tpl_vars['option']->value['btn_title'] = ' ';?>
                                <?php echo upload_btn('ad1',905,400,1,'','',$_smarty_tpl->tpl_vars['option']->value);?>

                            </li>
                            <li>
                                <em class="v"><img src="<?php echo default_pic($_smarty_tpl->tpl_vars['ads']->value[2]['path'],'ad');?>
" id="ad2" /><span></span></em>
                                <?php $_smarty_tpl->createLocalArrayVariable('option', null, 0);
$_smarty_tpl->tpl_vars['option']->value['btn_title'] = ' ';?>
                                <?php echo upload_btn('ad2',905,400,1,'','',$_smarty_tpl->tpl_vars['option']->value);?>

                            </li>
                            <li>
                                <em class="v"><img src="<?php echo default_pic($_smarty_tpl->tpl_vars['ads']->value[3]['path'],'ad');?>
" id="ad3" /><span></span></em>
                                <?php $_smarty_tpl->createLocalArrayVariable('option', null, 0);
$_smarty_tpl->tpl_vars['option']->value['btn_title'] = ' ';?>
                                <?php echo upload_btn('ad3',905,400,1,'','',$_smarty_tpl->tpl_vars['option']->value);?>

                            </li>
                        </ul>
                        <style type="text/css">
                            .wu-example{ position: absolute; width: 238px; height: 140px; top: 0; left: 0; z-index: 100 }
                            .webuploader-pick{ width: 238px; height: 140px; overflow: hidden; padding: 0; margin: 0; background: none; }
                        </style>
                    </td>
                </tr>
                <tr>
                    <th>&nbsp;</th>
                    <td><input type="submit" name="submit" value="保存" class="shop-set3"></td>
                </tr>
            </table>
            </form>
        </div>
    </div>
</div>
<div class="merchant"></div>
<?php echo $_smarty_tpl->getSubTemplate ("footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<script src="/style/css_02/common_02.js"></script><?php }} ?>