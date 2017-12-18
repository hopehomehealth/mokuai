<?php /* Smarty version Smarty-3.1.13, created on 2017-01-11 20:00:39
         compiled from "/data/01/html/1yyg225/webapps/www/views/manage/wxreply/smartreply/list.html" */ ?>
<?php /*%%SmartyHeaderCode:29924234258761e6788d195-49978651%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '08f3aa1f38218dd44167c509a3533d01749b80c6' => 
    array (
      0 => '/data/01/html/1yyg225/webapps/www/views/manage/wxreply/smartreply/list.html',
      1 => 1456367948,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '29924234258761e6788d195-49978651',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'rules' => 0,
    'm' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_58761e678fe020_26208621',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58761e678fe020_26208621')) {function content_58761e678fe020_26208621($_smarty_tpl) {?><h3 class="info-tag media-cate">
    <a class="uiBtn BtnGreen r" href="#!wxreply/smartreply/add" style="color:#fff; font-size:12px">添加规则</a>
    <a class="tab-btn" href="#!wxreply/subscribe">被关注自动回复<b class="z1">◆</b><b class="z0">◆</b></a>
    <a class="tab-btn" href="#!wxreply/autoreply">消息自动回复<b class="z1">◆</b><b class="z0">◆</b></a>
    <a class="tab-btn on" href="#!wxreply/smartreply">关键词自动回复<b class="z1">◆</b><b class="z0">◆</b></a>
    <span></span>
</h3>


<style type="text/css">

</style>

<div class="html-box">

    <table class="list" style="width:100%">
        <thead>
        <tr>
            <th class="w120">规则</th>
            <th>关键词</th>
            <th>回复</th>
            <th class="w140">操作</th>
        </tr>
        </thead>
        <tbody>
    <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['rules']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>
        <tr>
            <td><?php echo $_smarty_tpl->tpl_vars['m']->value['name'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['m']->value['keywords'];?>
</td>
            <td>
                <?php echo $_smarty_tpl->tpl_vars['m']->value['msg_count']['text'];?>
条文字,
                <?php if (!empty($_smarty_tpl->tpl_vars['m']->value['msg_count']['wheel'])){?>
                <?php echo $_smarty_tpl->tpl_vars['m']->value['msg_count']['image'];?>
条图片,
                <?php }?>
                <?php echo $_smarty_tpl->tpl_vars['m']->value['msg_count']['news'];?>
条图文
                <?php if (!empty($_smarty_tpl->tpl_vars['m']->value['msg_count']['wheel'])){?>
                ,<?php echo $_smarty_tpl->tpl_vars['m']->value['msg_count']['wheel'];?>
条大转盘
                <?php }?>
            </td>
            <td class="opera">
                <a href="#!wxreply/smartreply/edit/<?php echo $_smarty_tpl->tpl_vars['m']->value['id'];?>
" class="uiBtn"><i class="iconfont">&#xe603;</i></a>
                <a href="javascript:;" class="uiBtn e2-wxreply-delRule-<?php echo $_smarty_tpl->tpl_vars['m']->value['id'];?>
"><i class="iconfont">&#xe606;</i></a>
            </td>
        </tr>


    <?php } ?>
        </tbody>
    </table>

    <div style="height:80px"></div>
</div>
<script type="text/javascript">
    $.loadJs('/admin/js/manage/wxreply.js',function(){
    $.loadJs('/admin/js/manage/wxmenu.js',function(){
    });
    });
</script>

<?php }} ?>