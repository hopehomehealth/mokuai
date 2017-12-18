<?php /* Smarty version Smarty-3.1.13, created on 2016-12-10 02:04:37
         compiled from "/data/01/html/1yyg225/webapps/www/views/manage/business/edit.html" */ ?>
<?php /*%%SmartyHeaderCode:1575570608584af235eb2e40-62808174%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'dc82b1e1673547fcbff99cca1cd0c75d40a5e448' => 
    array (
      0 => '/data/01/html/1yyg225/webapps/www/views/manage/business/edit.html',
      1 => 1467709608,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1575570608584af235eb2e40-62808174',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'row' => 0,
    'area' => 0,
    'bus_status' => 0,
    'm' => 0,
    'key' => 0,
    'bus_limit' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_584af23601dd25_30460778',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_584af23601dd25_30460778')) {function content_584af23601dd25_30460778($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('../public_btn.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="html-box">
    <form target="iframeNewsTarget" method="post" action="/manage/business/edit" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['id'];?>
" />
        <table class="table-list">
            <tbody>
            <tr>
                <td class="td-label"><label>会员名：</label></td>
                <td class="td-input">
                    <?php echo $_smarty_tpl->tpl_vars['row']->value['username'];?>
（ID:<?php echo $_smarty_tpl->tpl_vars['row']->value['mid'];?>
）
                </td>
            </tr>
            <tr>
                <td class="td-label"><label>店铺名称：</label><span class="c-red"> *</span></td>
                <td class="td-input">
                    <input type="text" name="post[bus_name]" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['bus_name'];?>
" class="form-i w300" />
                </td>
            </tr>
            <tr>
                <td class="td-label"><label>实体名称：</label></td>
                <td class="td-input">
                    <input type="text" name="post[bus_company]" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['bus_company'];?>
" class="form-i w300" />
                </td>
            </tr>
            <tr>
                <td class="td-label"><label>实体类型：</label></td>
                <td class="td-input">
                    <input type="text" name="post[bus_company_type]" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['bus_company_type'];?>
" class="form-i w300" />
                </td>
            </tr>
            <tr>
                <td class="td-label"><label>经营范围：</label></td>
                <td class="td-input">
                    <input type="text" name="post[bus_scope]" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['bus_scope'];?>
" class="form-i w300" />
                </td>
            </tr>
            <tr>
                <td class="td-label"><label>客服电话：</label></td>
                <td class="td-input">
                    <input type="text" name="post[bus_tel]" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['bus_tel'];?>
" class="form-i w300" />
                </td>
            </tr>
            <tr>
                <td class="td-label"><label>客服QQ：</label></td>
                <td class="td-input">
                    <input type="text" name="post[bus_qq]" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['bus_qq'];?>
" class="form-i w300" />
                </td>
            </tr>
            <tr>
                <td class="td-label"><label>所属区域：</label></td>
                <td class="td-input"><div id="select_linkage"><?php echo $_smarty_tpl->tpl_vars['area']->value;?>
</div></td>
            </tr>
            <tr>
                <td class="td-label"><label>联系地址：</label></td>
                <td class="td-input"><input type="text" name="post[bus_address]" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['bus_address'];?>
" class="form-i w300"></td>
            </tr>
            <tr>
                <td class="td-label"><label>商家状态：</label></td>
                <td class="td-input">
                    <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['bus_status']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['m']->key;
?>
                    <label style="color: <?php echo $_smarty_tpl->tpl_vars['m']->value['color'];?>
"><input type="radio" name="post[bus_status]" value="<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
" <?php if ($_smarty_tpl->tpl_vars['row']->value['bus_status']==$_smarty_tpl->tpl_vars['key']->value){?>checked<?php }?>> <?php echo $_smarty_tpl->tpl_vars['m']->value['name'];?>
</label>
                    <?php } ?>
                </td>
            </tr>
            <tr>
                <td class="td-label"><label>备注：</label></td>
                <td class="td-input">
                    <textarea name="post[bus_why]" style="width: 300px;"><?php echo $_smarty_tpl->tpl_vars['row']->value['bus_why'];?>
</textarea>
                    <div class="form-tip" style="line-height: 1.6;padding-top: 5px;"    >
                        未审核通过时，此内容为未审核原因，前台会员可见；<br>其它状态做备注使用，仅后台可见
                    </div>
                </td>
            </tr>
            <tr>
                <td class="td-label"><label>申请次数：</label></td>
                <td class="td-input"><input type="text" name="post[bus_times]" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['bus_times'];?>
" class="form-i w100"></td>
            </tr>
            <tr>
                <td class="td-label"><label>商品上限：</label></td>
                <td class="td-input">
                    <input type="text" name="post[bus_limit]" value="<?php if ($_smarty_tpl->tpl_vars['row']->value['bus_limit']>0||$_smarty_tpl->tpl_vars['row']->value['bus_limit']<0){?><?php echo $_smarty_tpl->tpl_vars['row']->value['bus_limit'];?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['bus_limit']->value;?>
<?php }?>" class="form-i w100">
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
    $.loadJs('/admin/js/manage/linkage.js',function(){
    });
</script>
<?php }} ?>