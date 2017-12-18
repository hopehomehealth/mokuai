<?php /* Smarty version Smarty-3.1.13, created on 2015-11-30 09:56:56
         compiled from "E:\projects\web\lnest\1yyg225\webapps\www\views\cn\member\info.html" */ ?>
<?php /*%%SmartyHeaderCode:25125565bace81b51e2-21074397%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '30b6978ebbacbb096f3b6db578b7bd02f9af4b1e' => 
    array (
      0 => 'E:\\projects\\web\\lnest\\1yyg225\\webapps\\www\\views\\cn\\member\\info.html',
      1 => 1448704043,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '25125565bace81b51e2-21074397',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'member' => 0,
    'site_config' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_565bace8236084_19332224',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_565bace8236084_19332224')) {function content_565bace8236084_19332224($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<link rel="stylesheet" href="<?php echo url('/style/css/member.css');?>
">
<?php echo $_smarty_tpl->getSubTemplate ("ur_here.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div id="container">
    <div class="fn-clear mt20 pb20">
        <?php echo $_smarty_tpl->getSubTemplate ("member/menu.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

        <div class="fn-right hy-r">
            <div class="fn-clear hy-tjxh">
                <div class="title">
                    <h2>个人信息</h2>
                </div>
                <form action="" target="iframeNews" method="post" id="submit_form">
                <div class="hy-box">
                    <div class="hy-yhk">
                        <div class="hy-ts1">
                            亲爱的 <strong class="color01"><?php echo $_smarty_tpl->tpl_vars['member']->value['username'];?>
</strong>
                            用户，请填写您的真实资料，有助于我们更好的为您服务。
                            <div class="prompt color04">完善以下资料即可获得80经验值，<?php echo $_smarty_tpl->tpl_vars['site_config']->value['site_name'];?>
不会以任何形式公开您的个人隐私，请放心填写！<s></s></div>
                        </div>

                        <table>
                            <tr>
                                <th>昵 称：</th>
                                <td>
                                    <input name="nickname" type="text" class="inpt-style2 w100" value="<?php echo $_smarty_tpl->tpl_vars['member']->value['nickname'];?>
" /><span class="color01">(填写呢称，只在前台显示，有利于帐户安全，还能增加好运哦)</span>
                                </td>
                            </tr>
                            <tr>
                                <th>出生日期：</th>
                                <td><input name="birthday" type="text" class="inpt-style2 w100" value="<?php echo $_smarty_tpl->tpl_vars['member']->value['birthday'];?>
" onclick="WdatePicker()"></td>
                            </tr>
                            <tr>
                                <th>性　别：</th>
                                <td>
                                    <input name="sex" type="radio" value="1" <?php if ($_smarty_tpl->tpl_vars['member']->value['sex']==1){?>checked<?php }?>/><label class="hy-xb">男</label>
                                    <input name="sex" type="radio" value="2" <?php if ($_smarty_tpl->tpl_vars['member']->value['sex']==2){?>checked<?php }?>/><label class="hy-xb">女</label>
                                </td>
                            </tr>
                            <tr>
                                <th>电子邮箱：</th>
                                <td>
                                    <input name="email" type="text" class="inpt-style2 w230" value="<?php echo $_smarty_tpl->tpl_vars['member']->value['email'];?>
" /><span class="color01">*</span>
                                </td>
                            </tr>
                            <tr>
                                <th>所在地区：</th>
                                <td><?php echo linkage('zone',$_smarty_tpl->tpl_vars['member']->value['zone']);?>
<td>
                            </tr>
                            <tr>
                                <th>留下一句：</th>
                                <td>
                                    <input name="intro" type="text" class="inpt-style2" value="<?php echo $_smarty_tpl->tpl_vars['member']->value['intro'];?>
" style="width: 350px;" /><a href="<?php echo ('/minfo?id=').($_smarty_tpl->tpl_vars['member']->value['mid']);?>
" class="color02">去我的空间看看</a>
                                    <p>【<a href="<?php echo url('/member/safe');?>
" class="color02">帐户安全</a>】<span style="color: #999">绑定手机号、邮箱免费获得拍币</span></p>
                                </td>
                            </tr>
                            <tr>
                                <th> &nbsp;</th>
                                <td class="">
                                    <input type="hidden" name="Submit" value="1">
                                    <input type="submit" value="确定修改" class="hy-btn2 fn-left" />
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
                </form>

                <div class="title title2">
                    <h2>修改登录密码</h2>
                </div>

                <div class="hy-box">
                    <form action="<?php echo url('/member/chpass');?>
" target="iframeNews" method="post">
                    <div class="hy-yhk">
                        <table>
                            <tr>
                                <th>原密码：</th>
                                <td>
                                    <input name="oldpass" type="password" class="inpt-style2 w180 " value="" />
                                <td>
                            </tr>
                            <tr>
                                <th>新密码：</th>
                                <td>
                                    <input name="pass1" type="password" class="inpt-style2 w180 " value="" />
                                <td>
                            </tr>
                            <tr>
                                <th>确认密码：</th>
                                <td>
                                    <input name="pass2" type="password" class="inpt-style2 w180" value="" />
                                <td>
                            </tr>
                            <tr>
                                <th> &nbsp;</th>
                                <td class="">
                                    <input name="Submit" type="submit" value="确定修改" class="hy-btn2 fn-left" />
                                </td>
                            </tr>
                        </table>
                    </div>
                    </form>
                </div>
            </div>
            <script type="text/javascript" src="/style/dp/WdatePicker.js"></script>
        </div>
     </div>
</div>
<?php echo $_smarty_tpl->getSubTemplate ("footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>