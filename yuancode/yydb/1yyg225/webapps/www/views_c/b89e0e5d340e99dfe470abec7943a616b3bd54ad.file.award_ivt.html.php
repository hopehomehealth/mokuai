<?php /* Smarty version Smarty-3.1.13, created on 2017-01-12 15:27:39
         compiled from "/data/01/html/1yyg225/webapps/www/views/manage/member/award_ivt.html" */ ?>
<?php /*%%SmartyHeaderCode:19389207265849057f4c2422-05681223%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b89e0e5d340e99dfe470abec7943a616b3bd54ad' => 
    array (
      0 => '/data/01/html/1yyg225/webapps/www/views/manage/member/award_ivt.html',
      1 => 1484103638,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19389207265849057f4c2422-05681223',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5849057f57dbf8_73384175',
  'variables' => 
  array (
    'page_total' => 0,
    'q' => 0,
    'status' => 0,
    'list' => 0,
    'm' => 0,
    'page' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5849057f57dbf8_73384175')) {function content_5849057f57dbf8_73384175($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('../public_btn.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<h3 class="info-tag">奖励列表(共<?php echo $_smarty_tpl->tpl_vars['page_total']->value;?>
个)<span></span></h3>

<div class="html-box">

    <form class="cond-form clear" action="#!member/award_ivt" id="searchForm" method="get">
        <input type="hidden" value="" name="page" id="page">
        <div class="f-unit">
            <select name="k" id="k">
                <option value="mid" <?php if ($_GET['k']=='mid'){?>selected<?php }?>>会员ID</option>
            </select>
            <input id="q" class="form-i w160 sitem" name="q" value="<?php echo $_smarty_tpl->tpl_vars['q']->value;?>
" type="text">
            <label class="ui-label w60">邀请人数：</label>
            <div class="l">
                <select name="num">
                    <option value="">请选择</option>
                    <option value="1" <?php if ($_smarty_tpl->tpl_vars['status']->value=='1'){?>selected<?php }?>>1</option>
                    <option value="3" <?php if ($_smarty_tpl->tpl_vars['status']->value=='3'){?>selected<?php }?>>3</option>
                    <option value="5" <?php if ($_smarty_tpl->tpl_vars['status']->value=='5'){?>selected<?php }?>>5</option>
                </select>
            </div>
            <label class="ui-label">状态：</label>
            <div class="l">
                <select name="status">
                    <option value="">请选择</option>
                    <option value="1" <?php if ($_smarty_tpl->tpl_vars['status']->value=='1'){?>selected<?php }?>>待处理</option>
                    <option value="2" <?php if ($_smarty_tpl->tpl_vars['status']->value=='2'){?>selected<?php }?>>已处理</option>
                </select>
            </div>
            <button type="submit" style="margin-left:10px; margin-top:1px" class="uiBtn BtnBlue e2-member-searchlog-1">搜索</button>
        </div>
    </form>

    <table class="list" style="width:100%">
        <tr>
            <th class="oid w40">ID</th>
            <th class="">会员名</th>
            <th class="w80">邀请人数</th>
            <th class="w150">领取时间</th>
            <th class="w80">状态</th>
            <th>操作</th>
        </tr>
        <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>
        <tr class="opera">
            <td class="oid"><?php echo $_smarty_tpl->tpl_vars['m']->value['id'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['m']->value['username'];?>
<span class="c-gray"> (<?php echo $_smarty_tpl->tpl_vars['m']->value['mid'];?>
)</span></td>
            <td><?php echo $_smarty_tpl->tpl_vars['m']->value['num'];?>
</td>
            <td><?php echo date('Y-m-d H:i',$_smarty_tpl->tpl_vars['m']->value['addtime']);?>
</td>
            <td><?php if ($_smarty_tpl->tpl_vars['m']->value['status']==1){?>待处理<?php }else{ ?>已处理<?php }?></td>
            <td><a href="#!member/award_ivt_edit/<?php echo $_smarty_tpl->tpl_vars['m']->value['id'];?>
?com=xshow|认证身份证">处理</a> </td>
        </tr>
        <?php } ?>
    </table>
    <?php echo $_smarty_tpl->tpl_vars['page']->value;?>


</div>

<script src="/js/manage/member.js"></script>

<script>
    $.loadJs('/admin/js/manage/member.js',function(){
    });
    var menus = $('#page_container a'), i;
    for(i = 0;i < menus.length;i++){
        menus[i].onclick = function() {
            var page = this.rel;
            member.search(page);
        }
    }
</script>
<?php }} ?>