<?php /* Smarty version Smarty-3.1.13, created on 2016-02-26 17:58:13
         compiled from "D:\test1yyg3.lnest.com\webapps\www\views\cn\member\message.html" */ ?>
<?php /*%%SmartyHeaderCode:659956d021b580cdc6-31338482%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bcc2d9f8d57e4637cb2b595e3ea7c62f9fa9c4d8' => 
    array (
      0 => 'D:\\test1yyg3.lnest.com\\webapps\\www\\views\\cn\\member\\message.html',
      1 => 1456367944,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '659956d021b580cdc6-31338482',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'list' => 0,
    'm' => 0,
    'row' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_56d021b5a09be0_06162037',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56d021b5a09be0_06162037')) {function content_56d021b5a09be0_06162037($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<link rel="stylesheet" href="<?php echo url('/style/css/member.css');?>
">
<?php echo $_smarty_tpl->getSubTemplate ("ur_here.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div id="container">
    <div class="fn-clear mt20 pb20">
        <?php echo $_smarty_tpl->getSubTemplate ("member/menu.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

        <div class="fn-right hy-r">

            <div class="fn-clear hy-tjxh">
                <div class="title">
                    <h2>站内信</h2>
                </div>
                <div class="hy-box">
                    <div class="mt15 hy-table">
                        <table>
                            <tr>
                                <th style="width:66px;">ID</th>
                                <th>留言信息</th>
                                <th style="width:110px">发送时间</th>
                                <th style="width:140px">发送者</th>
                                <th style="width:140px">接收者</th>
                                <th>操作</th>
                            </tr>
                            <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>
                            <tr>
                                <td><?php echo $_smarty_tpl->tpl_vars['m']->value['id'];?>
</td>
                                <td style="text-align:left;">
                                    <?php echo $_smarty_tpl->tpl_vars['m']->value['content'];?>

                                    <?php if ($_smarty_tpl->tpl_vars['m']->value['reply']){?>
                                    <br/>
                                    <span class="color01">[回复]</span>
                                    <?php echo $_smarty_tpl->tpl_vars['m']->value['reply']['content'];?>

                                    <span class="color03"><?php echo date('Y-m-d H:i:s',$_smarty_tpl->tpl_vars['m']->value['reply']['add_time']);?>
</span>
                                    <?php }?>
                                </td>
                                <td><span class="color03"><?php echo date('Y-m-d H:i:s',$_smarty_tpl->tpl_vars['m']->value['add_time']);?>
</span></td>
                                <td><?php if ($_smarty_tpl->tpl_vars['m']->value['mid']){?><a href="<?php echo ('/minfo?id=').($_smarty_tpl->tpl_vars['m']->value['mid']);?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['m']->value['username'];?>
</a><?php }else{ ?>管理员<?php }?></td>
                                <td><?php if ($_smarty_tpl->tpl_vars['m']->value['to_mid']){?><a href="<?php echo ('/minfo?id=').($_smarty_tpl->tpl_vars['m']->value['to_mid']);?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['m']->value['to_username'];?>
</a><?php }else{ ?>管理员<?php }?></td>
                                <td class="hy-rza">
                                    <?php if ($_smarty_tpl->tpl_vars['m']->value['is_reply']){?><a href="<?php echo url('/member/message/');?>
?id=<?php echo $_smarty_tpl->tpl_vars['m']->value['id'];?>
">回复</a><?php }?>
                                    <a href="javascript:zz_confirm('您确认要删除该留言?','<?php echo url('/member/message_del/');?>
<?php echo $_smarty_tpl->tpl_vars['m']->value['id'];?>
');" title="删除" class="f6">删除</a>
                                </td>
                            </tr>
                            <?php } ?>
                        </table>
                        <div class="foot-btn">
                            <?php echo $_smarty_tpl->getSubTemplate ("public_page.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

                        </div>
                    </div>
                </div>

                <div class="title title2">
                    <h2>发送站内信</h2>
                </div>
                <form action="" method="post" id="msgform" target="iframeNews">
                    <?php if ($_smarty_tpl->tpl_vars['row']->value){?><input type="hidden" name="parent_id" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['id'];?>
"/><?php }?>
                    <div class="hy-box">
                        <div class="hy-yhk">
                            <table>
                                <?php if ($_smarty_tpl->tpl_vars['row']->value['id']){?>
                                <tr>
                                    <th>回复：</th>
                                    <td><?php echo nl2br(stripcslashes($_smarty_tpl->tpl_vars['row']->value['content']));?>
</td>
                                </tr>
                                <?php }?>
                                <tr>
                                    <th>收件人：</th>
                                    <td>
                                        <?php if ($_smarty_tpl->tpl_vars['row']->value['mid']){?>
                                        <a href="<?php echo ('/minfo?id=').($_smarty_tpl->tpl_vars['row']->value['mid']);?>
" target="_blank"><?php echo nickname($_smarty_tpl->tpl_vars['row']->value['username'],$_smarty_tpl->tpl_vars['row']->value['nickname']);?>
</a>
                                        <input name="to_mid" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['mid'];?>
" />
                                        <?php }else{ ?>
                                        网站管理员
                                        <?php }?>
                                    <td>
                                </tr>
                                <tr>
                                    <th>内容：</th>
                                    <td>
                                        <textarea name="content" cols="20" rows="2" class="hy-lynr"></textarea>
                                    <td>
                                </tr>
                                <tr>
                                    <th> &nbsp;</th>
                                    <td class="">
                                        <input name="Submit" type="submit" value="提交" class="hy-btn2 fn-left" />
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php echo $_smarty_tpl->getSubTemplate ("footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>