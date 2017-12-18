<?php /* Smarty version Smarty-3.1.13, created on 2015-12-03 10:33:13
         compiled from "F:\WWW\1yyg225\webapps\www\views\cn\mobile\member\address.html" */ ?>
<?php /*%%SmartyHeaderCode:2926565fa9e9a99f84-24923644%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '40db1c5153e7737989042126c3290360beae9da6' => 
    array (
      0 => 'F:\\WWW\\1yyg225\\webapps\\www\\views\\cn\\mobile\\member\\address.html',
      1 => 1423667208,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2926565fa9e9a99f84-24923644',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'row' => 0,
    'member' => 0,
    'address' => 0,
    'm' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_565fa9e9bad562_17568051',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_565fa9e9bad562_17568051')) {function content_565fa9e9bad562_17568051($_smarty_tpl) {?><?php if (isset($_smarty_tpl->tpl_vars['header'])) {$_smarty_tpl->tpl_vars['header'] = clone $_smarty_tpl->tpl_vars['header'];
$_smarty_tpl->tpl_vars['header']->value = 'header2'; $_smarty_tpl->tpl_vars['header']->nocache = null; $_smarty_tpl->tpl_vars['header']->scope = 0;
} else $_smarty_tpl->tpl_vars['header'] = new Smarty_variable('header2', null, 0);?>
<?php echo $_smarty_tpl->getSubTemplate ("top.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<link rel="stylesheet" href="/style/mobile/css/member.css">
<div id="content" class="container main">
    <div class="tips-m">
        <?php if ($_smarty_tpl->tpl_vars['row']->value['id']){?>编辑<?php }else{ ?>新增<?php }?>收货人信息 <span class="color01">(最多保存5个有效地址)</span>
        <?php if ($_smarty_tpl->tpl_vars['row']->value['id']){?>
        <a href="/member/address<?php if ($_GET['back']){?>?back=<?php echo $_GET['back'];?>
<?php }?>" class="color02">[新增]</a>
        <?php }?>
    </div>

    <div class="form-m">
        <form action="" target="iframeNews" method="post" id="submit_form">
            <div class="item ui-clr">
                <dl>
                    <dt class="color03"><span class="color01">*</span> 配送区域：</dt>
                    <dd>
                        <?php echo linkage('zone',$_smarty_tpl->tpl_vars['row']->value['zone']);?>

                    </dd>
                </dl>
            </div>
            <div class="item ui-clr">
                <dl>
                    <dt class="color03"><span class="color01">*</span> 详细地址：</dt>
                    <dd>
                        <input name="address" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['address'];?>
" datatype="*" type="text" class="input-m">
                    </dd>
                </dl>
            </div>
            <div class="item ui-clr">
                <dl>
                    <dt class="color03"><span class="color01">*</span> 收货人姓名：</dt>
                    <dd>
                        <input name="name" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['name'];?>
" datatype="*2-6" type="text" class="input-m">
                    </dd>
                </dl>
            </div>
            <div class="item ui-clr">
                <dl>
                    <dt class="color03"><span class="color01">*</span> 手机/电话：</dt>
                    <dd>
                        <input name="mobile" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['row']->value['mobile'])===null||$tmp==='' ? $_smarty_tpl->tpl_vars['member']->value['mobile'] : $tmp);?>
" datatype="*2-6" type="text" class="input-m">
                    </dd>
                </dl>
            </div>
            <div class="item ui-clr">
                <dl>
                    <dt class="color03">邮政编码：</dt>
                    <dd>
                        <input  name="zip" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['zip'];?>
" datatype="n" ignore="ignore" type="text" class="input-m">
                    </dd>
                </dl>
            </div>
            <div class="item ui-clr">
                <dl>
                    <dt class="color03">设为默认：</dt>
                    <dd>
                        <input type="checkbox" name="is_default" value="1" <?php if ($_smarty_tpl->tpl_vars['row']->value['is_default']){?>checked<?php }?>>
                    </dd>
                </dl>
            </div>
            <input type="hidden" name="back" value="<?php echo $_GET['back'];?>
" />
            <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['id'];?>
">
            <input name="Submit" type="submit" value="<?php if ($_GET['back']){?>配送到此地址<?php }else{ ?>保 存<?php }?>" class="btn" />
        </form>
    </div>

    <div class="list01 list-address">
        <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['address']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>
        <dl class="item">
            <dt><b>有效地址一</b></dt>
            <dd>
                <table cellpadding="0" cellspacing="0">
                    <tr>
                        <th>收货人</th>
                        <td>
                            <?php echo $_smarty_tpl->tpl_vars['m']->value['name'];?>

                        </td>
                    </tr>
                    <tr>
                        <th>手机/电话</th>
                        <td>
                            <?php echo (($tmp = @$_smarty_tpl->tpl_vars['m']->value['mobile'])===null||$tmp==='' ? $_smarty_tpl->tpl_vars['member']->value['mobile'] : $tmp);?>

                        </td>
                    </tr>
                    <tr>
                        <th>收货地址</th>
                        <td>
                            <?php echo $_smarty_tpl->tpl_vars['m']->value['area'];?>

                            <?php echo $_smarty_tpl->tpl_vars['m']->value['address'];?>

                        </td>
                    </tr>
                    <tr>
                        <th>邮编</th>
                        <td>
                            <?php echo $_smarty_tpl->tpl_vars['m']->value['zip'];?>

                        </td>
                    </tr>
                    <tr>
                        <th>操作</th>
                        <td>
                            <a href="<?php echo url(('/member/address/').($_smarty_tpl->tpl_vars['m']->value['id']));?>
<?php if ($_GET['back']){?>?back=<?php echo $_GET['back'];?>
<?php }?>" class="color02">编辑</a>&nbsp;&nbsp;
                            <a href="javascript:zz_confirm('您是否确认删除收货地址?','<?php echo url(('/member/address_del/').($_smarty_tpl->tpl_vars['m']->value['id']));?>
<?php if ($_GET['back']){?>?back=<?php echo $_GET['back'];?>
<?php }?>');" class="color02">删除</a>
                        </td>
                    </tr>
                </table>
            </dd>
        </dl>
        <?php } ?>
    </div>
</div>
<?php echo $_smarty_tpl->getSubTemplate ("footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>