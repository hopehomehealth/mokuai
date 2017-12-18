<?php /* Smarty version Smarty-3.1.13, created on 2016-02-25 10:46:57
         compiled from "D:\test1yyg3.lnest.com\webapps\www\views\manage\member\message.html" */ ?>
<?php /*%%SmartyHeaderCode:2363856610d5f1dffc9-26526008%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '38aa21a138a82b0e6a52050e8a0fe2d71763c59a' => 
    array (
      0 => 'D:\\test1yyg3.lnest.com\\webapps\\www\\views\\manage\\member\\message.html',
      1 => 1456367946,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2363856610d5f1dffc9-26526008',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_56610d5f37f4f2_95050345',
  'variables' => 
  array (
    'list' => 0,
    'm' => 0,
    'page' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56610d5f37f4f2_95050345')) {function content_56610d5f37f4f2_95050345($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('../public_btn.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="html-box">
    <form class="cond-form clear" action="#!member/message" onsubmit="return xForm.submit(this)">
        <input type="hidden" value="" name="page" id="page">
        <div class="f-unit">
            <select name="k" id="k">
                <option value="content" <?php if ($_GET['k']=='content'){?>selected<?php }?>>留言内容</option>
            </select>
            <input id="q" class="form-i w160 sitem" name="q" value="<?php echo $_GET['q'];?>
" type="text">
            <label class="ui-label">发送者（系统 <input type="checkbox" name="sys" value="1" <?php if ($_GET['sys']==1){?>checked<?php }?> />）：</label>
            <input id="username" class="form-i w160 sitem" name="username" value="<?php echo $_GET['username'];?>
" type="text">
            <label class="ui-label">接收者（系统 <input type="checkbox" name="to_sys" value="1" <?php if ($_GET['to_sys']==1){?>checked<?php }?> />）：</label>
            <input id="to_username" class="form-i w160 sitem" name="to_username" value="<?php echo $_GET['to_username'];?>
" type="text">
            <button type="submit" style="margin-left:10px; margin-top:1px" class="uiBtn BtnBlue">搜索</button>
        </div>
    </form>

    <table class="list" style="width:100%">
        <thead>
        <tr>
            <th class="w40">ID</th>
            <th class="title">留言内容</th>
            <th class="w80">发送者</th>
            <th class="w80">接收者</th>
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
            <td><?php if ($_smarty_tpl->tpl_vars['m']->value['mid']){?><?php echo $_smarty_tpl->tpl_vars['m']->value['username'];?>
<?php }else{ ?><span class="c-orange">系统</span><?php }?></td>
            <td><?php if ($_smarty_tpl->tpl_vars['m']->value['to_mid']){?><?php echo $_smarty_tpl->tpl_vars['m']->value['to_username'];?>
<?php }else{ ?><span class="c-orange">系统</span><?php }?></td>
            <td><?php echo date('Y-m-d H:i',$_smarty_tpl->tpl_vars['m']->value['add_time']);?>
</td>
            <td>
                <?php if (!$_smarty_tpl->tpl_vars['m']->value['reply']){?><a href="#!member/message_reply/<?php echo $_smarty_tpl->tpl_vars['m']->value['id'];?>
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