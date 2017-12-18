<?php /* Smarty version Smarty-3.1.13, created on 2015-12-01 19:24:02
         compiled from "E:\projects\web\lnest\1yyg225\webapps\www\views\cn\yunbuy\ajax_join.html" */ ?>
<?php /*%%SmartyHeaderCode:18058565d8352f245e2-80768058%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e22d4b6049ef5d47938d83458831781115829553' => 
    array (
      0 => 'E:\\projects\\web\\lnest\\1yyg225\\webapps\\www\\views\\cn\\yunbuy\\ajax_join.html',
      1 => 1421242590,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18058565d8352f245e2-80768058',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'list' => 0,
    'k' => 0,
    'row' => 0,
    'm' => 0,
    'code' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_565d83530cc815_54777680',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_565d83530cc815_54777680')) {function content_565d83530cc815_54777680($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['list']->value){?>
<div class="content" style="">
    <div class="m-detail-recordList-start"><i class="ico ico-clock"></i></div>
    <?php  $_smarty_tpl->tpl_vars['row'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['row']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['row']->key => $_smarty_tpl->tpl_vars['row']->value){
$_smarty_tpl->tpl_vars['row']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['row']->key;
?>
    <div class="m-detail-recordList-timeSeperate"><?php echo $_smarty_tpl->tpl_vars['k']->value;?>
<i class="ico ico-recordDot ico-recordDot-solid"></i></div>
    <ul class="m-detail-recordList m-detail-recordList-0">
        <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['row']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>
        <li class="f-clear"><span class="time"><?php echo microtime_format($_smarty_tpl->tpl_vars['m']->value['db_time'],'H:i:s.x');?>
</span><i class="ico ico-recordDot ico-recordDot-hollow"></i><div class="m-detail-recordList-userInfo">
            <div class="inner">
                <?php if ($_smarty_tpl->tpl_vars['m']->value['luck_code']){?><div class="luck_icon"></div><?php }?>
                <p><span class="avatar">
					<img height="20"  src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['zz'][0][0]->_callViewFunc(array('mod'=>'photo','source'=>$_smarty_tpl->tpl_vars['m']->value['photo'],'size'=>30),$_smarty_tpl);?>
" width="20"></span><a href="<?php echo url(('/minfo?id=').($_smarty_tpl->tpl_vars['m']->value['mid']));?>
" target="_blank" title="<?php echo $_smarty_tpl->tpl_vars['m']->value['username'];?>
(ID:<?php echo sprintf('1%06d',$_smarty_tpl->tpl_vars['m']->value['mid']);?>
)" class="color02"><?php echo nickname($_smarty_tpl->tpl_vars['m']->value['username'],$_smarty_tpl->tpl_vars['m']->value['nickname']);?>
</a>
                    (<?php echo cityIp($_smarty_tpl->tpl_vars['m']->value['ip']);?>
 IP：<?php echo $_smarty_tpl->tpl_vars['m']->value['ip'];?>
) 参与了<b class="times txt-red"><?php echo $_smarty_tpl->tpl_vars['m']->value['qty'];?>
人次</b>
                    <a class="w-button w-button-simple btn-checkCodes" data-func="code" data-rid="1027" href="javascript:void(0)" style="display: none;">所有夺宝号码<i class="ico ico-arrow-gray ico-arrow-gray-down"></i></a>
                </p>
                <a class="btn-close" href="javascript:void(0)" style="display: none;">x</a>
                <p class="codes" style="display: none;"><?php  $_smarty_tpl->tpl_vars['code'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['code']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['m']->value['yun_code']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['code']->key => $_smarty_tpl->tpl_vars['code']->value){
$_smarty_tpl->tpl_vars['code']->_loop = true;
?><b <?php if ($_smarty_tpl->tpl_vars['code']->value==$_smarty_tpl->tpl_vars['m']->value['luck_code']){?>style="color:#E54048; font-weight:bold;"<?php }?>><?php echo $_smarty_tpl->tpl_vars['code']->value;?>
</b><?php } ?></p>
            </div>
        </div>
        </li>
        <?php } ?>
     </ul>
    <?php } ?>
</div>
  <?php echo $_smarty_tpl->getSubTemplate ("ajax_page.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<script type="text/javascript">
    $(document).ready(function(){
        $(".m-detail-recordList li .w-button-simple").each(function(i){
            $(this).click(function(){
                $(this).parents("li").addClass("m-detail-recordList-userInfo-detail").siblings().removeClass("m-detail-recordList-userInfo-detail");
            });
        });
        $(".btn-close").click(function(){
            $(this).parents("li").removeClass("m-detail-recordList-userInfo-detail");
        });
        $('#recordPanel').find('.demo').ajaxContent({
            event:'click', //mouseover
            loaderType:"img",
            loadingMsg:"/style/images/transparent.gif",
            target:'#recordPanel'
        });
        $('#recordPanel').find('*[nc_type="sform"]').ajaxContent({
            event:'change', //mouseover
            loaderType:"img",
            loadingMsg:"/style/images/transparent.gif",
            target:'#recordPanel'
        });
    });
</script>

<?php }else{ ?>
<div class="empty">
    <p class="status-empty">
        <i class="littleU littleU-cry"></i>&nbsp;&nbsp;暂时还没有参与记录</p>
</div>
<?php }?>

<?php }} ?>