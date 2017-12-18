<?php /* Smarty version Smarty-3.1.13, created on 2016-02-25 10:43:07
         compiled from "D:\test1yyg3.lnest.com\webapps\www\views\manage\share\list.html" */ ?>
<?php /*%%SmartyHeaderCode:72805660fe793532c1-01621499%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bb3dbac31cf7f912ed9be150b7bf6346e77830ae' => 
    array (
      0 => 'D:\\test1yyg3.lnest.com\\webapps\\www\\views\\manage\\share\\list.html',
      1 => 1456367946,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '72805660fe793532c1-01621499',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5660fe79611bd1_56181880',
  'variables' => 
  array (
    'list' => 0,
    'm' => 0,
    'common' => 0,
    'L' => 0,
    'page' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5660fe79611bd1_56181880')) {function content_5660fe79611bd1_56181880($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'D:\\test1yyg3.lnest.com\\system\\smarty\\plugins\\modifier.date_format.php';
?><?php echo $_smarty_tpl->getSubTemplate ('../public_btn.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<div class="html-box">    <form class="cond-form clear" action="#!share/index" onsubmit="return xForm.submit(this)">        <div class="f-unit">            <select name="k" id="k">                <option value="title"<?php if ($_GET['k']=='title'){?> selected<?php }?>>标题</option>                <option value="content"<?php if ($_GET['k']=='content'){?> selected<?php }?>>内容</option>                <option value="username"<?php if ($_GET['k']=='username'){?> selected<?php }?>>会员</option>                <option value="obj_name"<?php if ($_GET['k']=='obj_name'){?> selected<?php }?>>晒单商品</option>            </select>            <input id="q" class="form-i w160 sitem" name="q" value="<?php echo $_GET['q'];?>
" type="text">            <select name="is_show">                <option value="">-是否显示-</option>                <option value="1"<?php if ($_GET['is_show']=='1'){?> selected<?php }?>>显示</option>                <option value="99"<?php if ($_GET['is_show']=='99'){?> selected<?php }?>>隐藏</option>            </select>            <select name="sort">                <option value="addtime"<?php if ($_GET['sort']=='addtime'){?> selected<?php }?>>发布时间</option>                <option value="listorder"<?php if ($_GET['sort']=='listorder'){?> selected<?php }?>>排序</option>                <option value="is_rec"<?php if ($_GET['sort']=='is_rec'){?> selected<?php }?>>精华</option>            </select>            <select name="order">                <option value="desc"<?php if ($_GET['order']=='desc'){?> selected<?php }?>>降序</option>                <option value="asc"<?php if ($_GET['order']=='asc'){?> selected<?php }?>>升序</option>            </select>            <button type="submit" style="margin-left:10px; margin-top:1px" class="uiBtn BtnBlue">搜索</button>        </div>    </form>    <form name="formlist" target="iframeNewsTarget" method="post" action="">    <table class="list">        <thead>            <tr>                <th class="w40">排序</th>                <th class="w30">ID</th>                <th class="w60">缩略图</th>                <th class="w200">晒单商品</th>                <th>标题/内容</th>                <th class="w50">是否显示</th>                <th class="w50">设为精华</th>                <th class="w80">操作</th>            </tr>        </thead>        <tbody>            <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>            <tr>                <td align='center'><input type='text' class='form-i-s w30' name='listorders[<?php echo $_smarty_tpl->tpl_vars['m']->value['id'];?>
]' value='<?php echo $_smarty_tpl->tpl_vars['m']->value['listorder'];?>
' /></td>                <td class='id' align='center'><?php echo $_smarty_tpl->tpl_vars['m']->value['id'];?>
</td>                <td><a href="/minfo?id=<?php echo $_smarty_tpl->tpl_vars['m']->value['mid'];?>
#share#vid=<?php echo $_smarty_tpl->tpl_vars['m']->value['id'];?>
" target="_blank"><img src="<?php echo $_smarty_tpl->tpl_vars['m']->value['thumb'];?>
" width="60" /></a></td>                <td><a href="<?php echo $_smarty_tpl->tpl_vars['m']->value['url'];?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['m']->value['obj_name'];?>
</a></td>                <td>                    <span><?php echo $_smarty_tpl->tpl_vars['m']->value['title'];?>
</span>                    <a href="/minfo?id=<?php echo $_smarty_tpl->tpl_vars['m']->value['mid'];?>
" target="_blank" class="c-orange">(<?php echo $_smarty_tpl->tpl_vars['m']->value['username'];?>
)</a><br/>                    <span class="c-gray"><?php echo $_smarty_tpl->tpl_vars['m']->value['content'];?>
</span><br/>                    <i class="c-disable"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['m']->value['addtime'],'Y-m-d H:i:s');?>
</i>                </td>                <td align='center'>                    <?php if ($_smarty_tpl->tpl_vars['m']->value['is_show']==1){?>                    <a href="javascript:;" onclick="main.chang_status('<?php echo $_smarty_tpl->tpl_vars['m']->value['id'];?>
','share','is_show','id')" class="c-green" title="点击隐藏">显示</a>                    <?php }else{ ?>                    <a href="javascript:;" onclick="main.chang_status('<?php echo $_smarty_tpl->tpl_vars['m']->value['id'];?>
','share','is_show','id')" class="c-red" title="点击显示">隐藏</a>                    <?php }?>                </td>                <td align='center'>                    <?php if ($_smarty_tpl->tpl_vars['m']->value['is_rec']){?>                    <a href='javascript:;' class='c-green' onclick='if(confirm("确定设为普通吗？")) share.is_rec("<?php echo $_smarty_tpl->tpl_vars['m']->value['id'];?>
",0)' title='点击设为普通'>精华</a>                    <?php }else{ ?>                    <a href='javascript:;' class='c-red' onclick='if(confirm("确定设为精华吗（此操作将赠送会员<?php echo $_smarty_tpl->tpl_vars['common']->value['rec_share_db'];?>
个<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_db_points'];?>
）？")) share.is_rec("<?php echo $_smarty_tpl->tpl_vars['m']->value['id'];?>
",1)' title='点击设为精华'>普通</a>                    <?php }?>                </td>                <td class='opera' align='center' nowrap>                    <a href='#!share/edit/?id=<?php echo $_smarty_tpl->tpl_vars['m']->value['id'];?>
' class='iconfont icon-a' title='编辑' target="_blank">&#xe603;</a>                    <a href='javascript:;' onclick="main.confirm_del('share/del','<?php echo $_smarty_tpl->tpl_vars['m']->value['id'];?>
')" class='iconfont icon-a' title='删除'>&#xe606;</a>                </td>            </tr>            <?php } ?>        </tbody>    </table>    <div class="foot-btn">        <div class="pager r"><?php echo $_smarty_tpl->tpl_vars['page']->value;?>
</div>        <button type="button" class="uiBtn BtnGreen" onclick="main.batch_order('formlist','order','share','','id')">更新排序</button>    </div>    </form></div><script type="text/javascript">    $.loadJs('/admin/js/manage/share.js',function(){ });</script><?php }} ?>