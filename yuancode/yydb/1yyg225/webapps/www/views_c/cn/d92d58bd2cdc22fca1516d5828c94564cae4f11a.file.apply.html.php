<?php /* Smarty version Smarty-3.1.13, created on 2016-12-10 02:03:19
         compiled from "/data/01/html/1yyg225/webapps/www/views/cn/business/apply.html" */ ?>
<?php /*%%SmartyHeaderCode:88670810584af1e78948e9-56647221%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd92d58bd2cdc22fca1516d5828c94564cae4f11a' => 
    array (
      0 => '/data/01/html/1yyg225/webapps/www/views/cn/business/apply.html',
      1 => 1467195634,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '88670810584af1e78948e9-56647221',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'business_row' => 0,
    'bus_time_max' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_584af1e7a3c308_08345216',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_584af1e7a3c308_08345216')) {function content_584af1e7a3c308_08345216($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<link type="text/css" rel="stylesheet" href="/style/css_02/style.css" />
<link type="text/css" rel="stylesheet" href="/style/css/member.css" />
<link type="text/css" rel="stylesheet" href="/style/css_02/merchant.css" />
<div class="container menu-show" style="padding-top:30px;">
    <div class="shop-right">
        <h3>商家入驻申请</h3>
    </div>
    <div class="shop-bor shop-set">
        <form action="" method="post" target="iframeNews">
        <table width="100%" class="box-sizing" border="0">
            <tr>
                <th></th>
                <td colspan="3" style="line-height: 1.8;">
                    <?php if (!empty($_smarty_tpl->tpl_vars['business_row']->value)&&$_smarty_tpl->tpl_vars['business_row']->value['bus_status']==-1){?>
                    <span style="color: #f60">温馨提示：入驻申请未通过，您还有<?php echo $_smarty_tpl->tpl_vars['bus_time_max']->value-$_smarty_tpl->tpl_vars['business_row']->value['bus_times'];?>
次申请机会！<br>未通过原因：<?php echo (($tmp = @$_smarty_tpl->tpl_vars['business_row']->value['bus_why'])===null||$tmp==='' ? '-' : $tmp);?>
</span>
                    <?php }elseif(!empty($_smarty_tpl->tpl_vars['business_row']->value)&&$_smarty_tpl->tpl_vars['business_row']->value['bus_status']==0){?>
                    <span style="color: #f60">温馨提示：入驻申请审核中，请耐心等待！您可以继续完善申请资料！</span>
                    <?php }else{ ?>
                    <span style="color: #000">温馨提示：认真填写以下资料，请务必真实！</span>
                    <?php }?>
                </td>
            </tr>
            <tr>
                <th width="120">店铺名称：</th>
                <td width="350"><input type="text" name="name" value="<?php echo $_smarty_tpl->tpl_vars['business_row']->value['bus_name'];?>
" class="shop-set2" placeholder="必填" /></td>
                <th width="120">经营范围：</th>
                <td><input type="text" name="scope" value="<?php echo $_smarty_tpl->tpl_vars['business_row']->value['bus_scope'];?>
" class="shop-set2" placeholder="必填" /></td>
            </tr>
            <tr>
                <th width="120">实体名称：</th>
                <td width="350"><input type="text" name="company" value="<?php echo $_smarty_tpl->tpl_vars['business_row']->value['bus_company'];?>
" class="shop-set2" placeholder="必填" /></td>
                <th width="120">实体类型：</th>
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
                <th>客服QQ：</th>
                <td><input type="text" name="qq" value="<?php echo $_smarty_tpl->tpl_vars['business_row']->value['bus_qq'];?>
" class="shop-set2" placeholder="选填" /></td>
                <th>联系地址：</th>
                <td><input type="text" name="address" value="<?php echo $_smarty_tpl->tpl_vars['business_row']->value['bus_address'];?>
" class="shop-set2" placeholder="必填" /></td>
            </tr>
            <tr>
                <th>&nbsp;</th>
                <td colspan="3">
                    <input type="submit" name="submit" value="提交入驻申请" class="shop-set3">
                    <label><input type="checkbox" name="agree" checked /> 阅读并同意《<a href="javascript:;" id="Agree">商家入驻协议</a>》</label>
                </td>
            </tr>
        </table>
        </form>
    </div>
</div>
<div class="merchant"></div>
<div class="layer_agree"><div class="con"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['zz'][0][0]->_callViewFunc(array('mod'=>'block','mark'=>'business_agree'),$_smarty_tpl);?>
</div></div>
<?php echo $_smarty_tpl->getSubTemplate ("footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<script src="/style/css_02/common_02.js"></script>
<script type="text/javascript">
    $('#Agree').bind('click',function(){
        $.layer({
            type: 1,
            shade: [0.5, '#000'],
            shadeClose: true,
            fix: true,
            area: ['auto', 'auto'],
            title: false,
            border: [0],
            page: { dom: '.layer_agree' }
        });
    })
</script><?php }} ?>