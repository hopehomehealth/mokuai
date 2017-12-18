<?php /* Smarty version Smarty-3.1.13, created on 2016-02-25 17:05:19
         compiled from "D:\test1yyg3.lnest.com\webapps\www\views\cn\member\address.html" */ ?>
<?php /*%%SmartyHeaderCode:2389656cec3cf1cdb17-30041562%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '68fdac2a9d76c8c1f20a172669f665554937f9c7' => 
    array (
      0 => 'D:\\test1yyg3.lnest.com\\webapps\\www\\views\\cn\\member\\address.html',
      1 => 1456367944,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2389656cec3cf1cdb17-30041562',
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
  'unifunc' => 'content_56cec3cf3d5fd4_15626138',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56cec3cf3d5fd4_15626138')) {function content_56cec3cf3d5fd4_15626138($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<link rel="stylesheet" href="<?php echo url('/style/css/member.css');?>
">
<?php echo $_smarty_tpl->getSubTemplate ("ur_here.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div id="container">
    <div class="fn-clear mt20 pb20">
        <?php echo $_smarty_tpl->getSubTemplate ("member/menu.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

        <div class="fn-right hy-r">
        <div class="fn-clear hy-tjxh">
            <div class="title">
                <h2>收货地址</h2>
            </div>
            <div class="hy-box">
                <div class="hy-adddz">
                    <div class="adddz-t">
                        <strong><?php if ($_smarty_tpl->tpl_vars['row']->value['id']){?>编辑<?php }else{ ?>新增<?php }?>收货人信息</strong>
                        <span class="color01">(最多保存5个有效地址)</span>
                        <?php if ($_smarty_tpl->tpl_vars['row']->value['id']){?>
                        <a href="/member/address<?php if ($_GET['back']){?>?back=<?php echo $_GET['back'];?>
<?php }?>" class="color02">[新增]</a>
                        <?php }?>
                    </div>
                    <form action="" target="iframeNews" method="post" id="address_form">
                    <table>
                        <tr>
                            <th><span class="color01">*</span> 配送区域：</th>
                            <td><?php echo linkage('zone',$_smarty_tpl->tpl_vars['row']->value['zone']);?>
</td>
                        </tr>
                        <tr>
                            <th><span class="color01">*</span> <span class="label">详细地址</span>：</th>
                            <td>
                                <input name="address" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['address'];?>
" datatype="*" type="text" class="inpt-style2 w420">
                            </td>
                        </tr>
                        <tr>
                            <th><span class="color01">*</span><span class="label">收货人姓名</span>：</th>
                            <td>
                                <input name="name" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['name'];?>
" datatype="*2-6" type="text" class="inpt-style2 ">
                            </td>
                        </tr>
                        <tr>
                            <th><span class="color01">*</span><span class="label">手机/电话</span>：</th>
                            <td>
                                <input name="mobile" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['row']->value['mobile'])===null||$tmp==='' ? $_smarty_tpl->tpl_vars['member']->value['mobile'] : $tmp);?>
" type="text" class="inpt-style2 ">
                            </td>
                        </tr>
                        <tr>
                            <th>邮政编码：</th>
                            <td><input  name="zip" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['zip'];?>
" datatype="n" ignore="ignore" type="text" class="inpt-style2 "></td>
                        </tr>
                        <tr>
                            <th>设为默认:</th>
                            <td><input type="checkbox" name="is_default" value="1" <?php if ($_smarty_tpl->tpl_vars['row']->value['is_default']){?>checked<?php }?>></td>
                        </tr>
                        <tr>
                            <th></th>
                            <td>
                                <input type="hidden" name="back" value="<?php echo $_GET['back'];?>
" />
                                <input name="Submit" type="submit" value="<?php if ($_GET['back']){?>配送到此地址<?php }else{ ?>保 存<?php }?>" class="hy-btn2" />
                                <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['id'];?>
">
                            </td>
                        </tr>
                    </table>
                    </form>
                </div>

                <div class="mt15 hy-table">
                    <table>
                        <tr>
                            <th style="width:125px;">收货人</th>
                            <th style="width:165px;">区域</th>
                            <th>详细地址</th>
                            <th style="width:95px;">  邮编</th>
                            <th style="width:120px;">电话/手机</th>
                            <th style="width:50px;">默认</th>
                            <th style="width:60px;">操作</th>
                        </tr>
                        <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['address']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>
                        <tr>
                            <td><?php echo $_smarty_tpl->tpl_vars['m']->value['name'];?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['m']->value['area'];?>
</td>
                            <td style="word-break : break-all;"><?php echo $_smarty_tpl->tpl_vars['m']->value['address'];?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['m']->value['zip'];?>
</td>
                            <td><?php echo (($tmp = @$_smarty_tpl->tpl_vars['m']->value['mobile'])===null||$tmp==='' ? $_smarty_tpl->tpl_vars['member']->value['mobile'] : $tmp);?>
</td>
                            <td><?php if ($_smarty_tpl->tpl_vars['m']->value['is_default']){?><span class="color01">默认</span><?php }?></td>
                            <td class="hy-rza">
                                <a href="<?php echo url(('/member/address/').($_smarty_tpl->tpl_vars['m']->value['id']));?>
<?php if ($_GET['back']){?>?back=<?php echo $_GET['back'];?>
<?php }?>">编辑</a>
                                <a href="javascript:zz_confirm('您是否确认删除收货地址?','<?php echo url(('/member/address_del/').($_smarty_tpl->tpl_vars['m']->value['id']));?>
<?php if ($_GET['back']){?>?back=<?php echo $_GET['back'];?>
<?php }?>');">删除</a>
                            </td>
                        </tr>
                        <?php } ?>
                    </table>
                </div>
            </div>

        </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="/style/Validform_min.js"></script>
<script type="text/javascript">
    $(function(){
        $("#address_form").Validform({
            tiptype:3,
            showAllError:true,
            label:".label",
            datatype:{
                "phone":function(gets,obj,curform,regxp){
                    var reg1=regxp["m"],
                            reg2=/[\d]{7}/,
                            mobile=curform.find(".mobile");

                    if(reg1.test(mobile.val())){return true;}
                    if(reg2.test(gets)){return true;}

                    return false;
                }
            }
        });
    });
</script>

<?php echo $_smarty_tpl->getSubTemplate ("footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>