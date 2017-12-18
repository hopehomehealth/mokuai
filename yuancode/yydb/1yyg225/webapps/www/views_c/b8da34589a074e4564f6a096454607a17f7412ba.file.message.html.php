<?php /* Smarty version Smarty-3.1.13, created on 2017-01-12 15:27:40
         compiled from "/data/01/html/1yyg225/webapps/www/views/manage/member/message.html" */ ?>
<?php /*%%SmartyHeaderCode:4627669085849057dc8c094-60493099%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b8da34589a074e4564f6a096454607a17f7412ba' => 
    array (
      0 => '/data/01/html/1yyg225/webapps/www/views/manage/member/message.html',
      1 => 1484103638,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4627669085849057dc8c094-60493099',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5849057dd00e97_00316732',
  'variables' => 
  array (
    'k' => 0,
    'q' => 0,
    'user' => 0,
    'sys' => 0,
    'username' => 0,
    'to_user' => 0,
    'to_sys' => 0,
    'to_username' => 0,
    'list' => 0,
    'm' => 0,
    'page' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5849057dd00e97_00316732')) {function content_5849057dd00e97_00316732($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('../public_btn.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="html-box">
    <form class="cond-form clear" action="#!member/message" onsubmit="return xForm.submit(this)">
        <input type="hidden" value="" name="page" id="page">
        <div class="f-unit">
            <select name="k" id="k">
                <option value="content" <?php if ($_smarty_tpl->tpl_vars['k']->value=='content'){?>selected<?php }?>>留言内容</option>
                <!--<option value="ids" <?php if ($_smarty_tpl->tpl_vars['k']->value=='ids'){?>selected<?php }?>>流程ID</option>-->
            </select>
            <input id="q" class="form-i w160 sitem" name="q" value="<?php echo $_smarty_tpl->tpl_vars['q']->value;?>
" type="text">

            <label class="ui-label">发送者（</label>
            <select name="user">
                <option value="username"<?php if ($_smarty_tpl->tpl_vars['user']->value=='username'){?> selected<?php }?>>会员名</option>
                <option value="mid"<?php if ($_smarty_tpl->tpl_vars['user']->value=='mid'){?> selected<?php }?>>会员ID</option>
            </select>
            <label class="ui-label">
                系统 <input type="checkbox" name="sys" value="1" <?php if ($_smarty_tpl->tpl_vars['sys']->value==1){?>checked<?php }?> />）：
            </label>
            <input id="username" class="form-i w160 sitem" name="username" value="<?php echo $_smarty_tpl->tpl_vars['username']->value;?>
" type="text">

            <label class="ui-label">接收者（</label>
            <select name="to_user">
                <option value="to_username"<?php if ($_smarty_tpl->tpl_vars['to_user']->value=='username'){?> selected<?php }?>>会员名</option>
                <option value="to_mid"<?php if ($_smarty_tpl->tpl_vars['to_user']->value=='mid'){?> selected<?php }?>>会员ID</option>
            </select>
            <label class="ui-label">
                系统 <input type="checkbox" name="to_sys" value="1" <?php if ($_smarty_tpl->tpl_vars['to_sys']->value==1){?>checked<?php }?> />）：
            </label>
            <input id="to_username" class="form-i w160 sitem" name="to_username" value="<?php echo $_smarty_tpl->tpl_vars['to_username']->value;?>
" type="text">

            <button type="submit" style="margin-left:10px; margin-top:1px" class="uiBtn BtnBlue">搜索</button>
        </div>
    </form>

    <table class="list" style="width:100%">
        <thead>
        <tr>
            <th class="w40">ID</th>
            <th class="title">留言内容</th>
            <th class="">发送者</th>
            <th class="">接收者</th>
            <th class="w300">发送时间</th>
            <th class="w80">操作</th>
        </tr>
        </thead>
        <tbody>
        <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>
        <tr class="opera">
            <td><?php echo $_smarty_tpl->tpl_vars['m']->value['id'];?>
</td>
            <td class="title">
                <div><?php echo $_smarty_tpl->tpl_vars['m']->value['content'];?>
</div>
                <?php if ($_smarty_tpl->tpl_vars['m']->value['reply']){?>
                [回复]<?php echo $_smarty_tpl->tpl_vars['m']->value['reply']['content'];?>
(<?php echo date('Y-m-d H:i:s',$_smarty_tpl->tpl_vars['m']->value['reply']['add_time']);?>
)(<span class="c-orange"><?php echo $_smarty_tpl->tpl_vars['m']->value['id'];?>
</span>)
                <?php }?>
            </td>
            <td><?php if ($_smarty_tpl->tpl_vars['m']->value['mid']){?><?php if ($_smarty_tpl->tpl_vars['m']->value['type']==1){?><span class="c-orange"><?php }?><?php echo $_smarty_tpl->tpl_vars['m']->value['username'];?>
<?php if ($_smarty_tpl->tpl_vars['m']->value['type']==1){?></span><?php }?> <span class="c-gray">(<?php echo $_smarty_tpl->tpl_vars['m']->value['mid'];?>
)</span><?php }else{ ?><span class="c-orange">系统</span><?php }?></td>
            <td><?php if ($_smarty_tpl->tpl_vars['m']->value['to_mid']){?><?php echo $_smarty_tpl->tpl_vars['m']->value['to_username'];?>
 <span class="c-gray">(<?php echo $_smarty_tpl->tpl_vars['m']->value['to_mid'];?>
)</span><?php }else{ ?><span class="c-orange">系统</span><?php }?></td>
            <td><?php echo date('Y-m-d H:i',$_smarty_tpl->tpl_vars['m']->value['add_time']);?>
</td>
            <td>
                <?php if (!$_smarty_tpl->tpl_vars['m']->value['reply']&&$_smarty_tpl->tpl_vars['m']->value['mid']&&!$_smarty_tpl->tpl_vars['m']->value['to_mid']){?><a href="#!member/message_reply/<?php echo $_smarty_tpl->tpl_vars['m']->value['id'];?>
&com=xshow|回复">回复</a><?php }?>
                <a href='javascript:;' onclick="main.confirm_del('member/del_msg','<?php echo $_smarty_tpl->tpl_vars['m']->value['id'];?>
')" class='iconfont icon-a' title='删除'>&#xe606;</a>
            </td>
        </tr>
        <?php } ?>
        </tbody>
    </table>
    <?php echo $_smarty_tpl->tpl_vars['page']->value;?>


</div><?php }} ?>