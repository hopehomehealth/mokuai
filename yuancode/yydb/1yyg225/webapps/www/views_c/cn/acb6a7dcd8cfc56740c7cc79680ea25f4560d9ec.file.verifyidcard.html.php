<?php /* Smarty version Smarty-3.1.13, created on 2016-02-25 17:07:23
         compiled from "D:\test1yyg3.lnest.com\webapps\www\views\cn\member\verifyidcard.html" */ ?>
<?php /*%%SmartyHeaderCode:796566103473bd375-42739666%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'acb6a7dcd8cfc56740c7cc79680ea25f4560d9ec' => 
    array (
      0 => 'D:\\test1yyg3.lnest.com\\webapps\\www\\views\\cn\\member\\verifyidcard.html',
      1 => 1456367944,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '796566103473bd375-42739666',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_56610347553f80_34492418',
  'variables' => 
  array (
    'L' => 0,
    'site_config' => 0,
    'verify' => 0,
    'idcard' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56610347553f80_34492418')) {function content_56610347553f80_34492418($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<link rel="stylesheet" href="<?php echo url('/style/css/member.css');?>
">
<?php echo $_smarty_tpl->getSubTemplate ("ur_here.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div id="container">
    <div class="fn-clear mt20 pb20">
        <?php echo $_smarty_tpl->getSubTemplate ("member/menu.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

        <div class="fn-right hy-r">

            <div class="fn-clear hy-tjxh">
                <div class="title">
                    <h2>安全信息</h2>
                </div>
                <div class="hy-box">
                    <div class="hy-yhk">
                        <p class="hy-ts1">实名认证有利于提升账号的安全性和信任级别，请使用真实的身份证进行实名认证，<strong class="color01">经验证身份证姓名和证号不符，有人为处理的，将扣十元<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_baozheng'];?>
，</strong>感谢您对<?php echo $_smarty_tpl->tpl_vars['site_config']->value['site_name'];?>
的支持！</p>
                        <?php if ($_smarty_tpl->tpl_vars['verify']->value&&$_smarty_tpl->tpl_vars['verify']->value['status']!=3){?>
                        <?php if ($_smarty_tpl->tpl_vars['verify']->value['status']==1){?><h2 class="color01">您提交的认证身份证，我们正在审核中请耐心等待！</h2><?php }?>
                        <table>
                            <tr>
                                <th>姓名：</th>
                                <td><?php echo $_smarty_tpl->tpl_vars['verify']->value['realname'];?>
</td>
                            </tr>
                            <tr>
                                <th>身份证号：</th>
                                <td>
                                    <?php echo $_smarty_tpl->tpl_vars['verify']->value['card'];?>

                                </td>
                            </tr>
                            <tr>
                                <th>身份证正面照：</th>
                                <td><img src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['zz'][0][0]->_callViewFunc(array('mod'=>'fileurl','source'=>$_smarty_tpl->tpl_vars['verify']->value['card_image'],'width'=>320,'height'=>200,'type'=>1,'dir'=>'idcard'),$_smarty_tpl);?>
" id="idcard"/></td>
                            </tr>
                            <tr>
                                <th>身份证反面照：</th>
                                <td><img src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['zz'][0][0]->_callViewFunc(array('mod'=>'fileurl','source'=>$_smarty_tpl->tpl_vars['verify']->value['card_image2'],'width'=>320,'height'=>200,'type'=>1,'dir'=>'idcard'),$_smarty_tpl);?>
" id="idcard2"/></td>
                            </tr>
                            <tr>
                                <th> &nbsp;</th>
                                <td class="">
                                    <input type="button" value="返回" class="hy-btn2" onclick="window.history.go(-1)" />
                                </td>
                            </tr>
                        </table>
                        <?php }else{ ?>
                        <?php if ($_smarty_tpl->tpl_vars['verify']->value['remark']){?><h2 class="color01">未通过审核，请重新提交认证(拒绝理由-<?php echo $_smarty_tpl->tpl_vars['verify']->value['remark'];?>
)！</h2><?php }?>
                        <form action="" target="iframeNews" method="post" id="submit_form">
                        <table>
                            <tr>
                                <th>姓名：</th>
                                <td><input name="realname" type="text" class="inpt-style2" /> <label id="Label1"> (请填写您身份证上的名字)</label></td>
                            </tr>
                            <tr>
                                <th>身份证号：</th>
                                <td>
                                    <input name="card" type="text" class="inpt-style2 w230" /> <label id="Label1"> (请填写真实的身份证号码，身份证号码是18位)</label>
                                </td>
                            </tr>
                            <tr>
                                <th>身份证正面照：</th>
                                <td>
                                    <div class="fn-clear mt10">
                                        <img src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['zz'][0][0]->_callViewFunc(array('mod'=>'fileurl','source'=>$_smarty_tpl->tpl_vars['idcard']->value,'type'=>1,'nopic'=>'/upload/idcard.jpg','dir'=>'idcard'),$_smarty_tpl);?>
" width="350"  id="idcard"/>
                                    </div>
                                    <?php echo upload_btn('idcard',500,500);?>
<label id="Label1">(请确保身份证全部信息清晰)</label>
                                </td>
                            </tr>
                            <tr>
                                <th>身份证反面照：</th>
                                <td>
                                    <div class="fn-clear mt10">
                                        <img src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['zz'][0][0]->_callViewFunc(array('mod'=>'fileurl','source'=>$_smarty_tpl->tpl_vars['idcard']->value,'type'=>1,'nopic'=>'/upload/idcard2.jpg','dir'=>'idcard'),$_smarty_tpl);?>
" width="350"  id="idcard2"/>
                                    </div>
                                    <?php echo upload_btn('idcard2',500,500);?>
<label id="Label1">(请确保身份证背面全部信息清晰)</label>
                                    <div class="color01">如果身份证实名认证，审核不通过。再次审核，将被要求提供手持身份证正反面照。</div>
                                </td>
                            </tr>
                            <?php if ($_smarty_tpl->tpl_vars['site_config']->value['sms_open']==1&&statusTpl('sms_idcard')){?>
                            <tr>
                               <th>短信验证码</th>
                               <td><input type="text" name="sms_code" value=""><input type="button" value="获取短信验证码" onclick="getSmsVerify('sms_idcard')" id="btnSms" /></td>
                            </tr>
                            <?php }?>
                            <tr>
                                <th> &nbsp;</th>
                                <td class="">
                                    <input type="hidden" name="Submit" value="1">
                                    <input type="submit" value="确定" class="hy-btn2 fn-left" />
                                    <input type="button" value="返回" class="hy-btn2" onclick="window.history.go(-1)" />
                                </td>
                            </tr>
                        </table>
                        </form>
                        <?php }?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php echo $_smarty_tpl->getSubTemplate ("footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>