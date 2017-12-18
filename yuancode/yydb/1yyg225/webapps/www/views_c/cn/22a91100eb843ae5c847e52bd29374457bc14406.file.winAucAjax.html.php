<?php /* Smarty version Smarty-3.1.13, created on 2015-11-28 17:39:10
         compiled from "H:\projects\web\lnest02\1yyg\webapps\www\views\cn\content\winAucAjax.html" */ ?>
<?php /*%%SmartyHeaderCode:29905659763e152143-64472258%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '22a91100eb843ae5c847e52bd29374457bc14406' => 
    array (
      0 => 'H:\\projects\\web\\lnest02\\1yyg\\webapps\\www\\views\\cn\\content\\winAucAjax.html',
      1 => 1423473844,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '29905659763e152143-64472258',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'data' => 0,
    'list' => 0,
    'm' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5659763e283819_00553851',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5659763e283819_00553851')) {function content_5659763e283819_00553851($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_truncate')) include 'H:\\projects\\web\\lnest02\\1yyg\\system\\smarty\\plugins\\modifier.truncate.php';
?><div class="win-list">
    <div class="winCount">
        截至目前共揭晓竞拍商品<b class="color01"><?php echo $_smarty_tpl->tpl_vars['data']->value['count'];?>
</b>个
    </div>
    <ul class="fn-clear">
        <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>
        <li class="item">
            <div class="itemc">
                <div class="itemL scrollLoadingDiv"><a href="<?php echo ('/auction/view/').($_smarty_tpl->tpl_vars['m']->value['act_id']);?>
" title="<?php echo $_smarty_tpl->tpl_vars['m']->value['title'];?>
" target="_blank"><img class="scrollLoading" src="/style/images/pix.gif" data-url="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['zz'][0][0]->_callViewFunc(array('mod'=>'fileurl','source'=>$_smarty_tpl->tpl_vars['m']->value['imgurl_src'],'width'=>150,'type'=>0),$_smarty_tpl);?>
" width="150" /></a></div>
                <div class="itemR">
                    <div class="user-info">
                        <div class="photo"><a href="<?php echo url(('/minfo?id=').($_smarty_tpl->tpl_vars['m']->value['bid_user']));?>
#aucCod" title="<?php echo nickname($_smarty_tpl->tpl_vars['m']->value['username'],$_smarty_tpl->tpl_vars['m']->value['nickname']);?>
" target="_blank"><img class="scrollLoading scrollLoadingDiv" src="/style/images/pix.gif" data-url="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['zz'][0][0]->_callViewFunc(array('mod'=>'photo','source'=>$_smarty_tpl->tpl_vars['m']->value['photo'],'size'=>'80','nopic'=>'/upload/default.gif'),$_smarty_tpl);?>
" width="60" height="60" /></a></div>
                        <div class="txt">
                            <p class="p1">获得者：<a href="<?php echo url(('/minfo?id=').($_smarty_tpl->tpl_vars['m']->value['bid_user']));?>
#aucCod" target="_blank" class="color02" title="<?php echo nickname($_smarty_tpl->tpl_vars['m']->value['username'],$_smarty_tpl->tpl_vars['m']->value['nickname']);?>
"><?php echo nickname($_smarty_tpl->tpl_vars['m']->value['username'],$_smarty_tpl->tpl_vars['m']->value['nickname']);?>
</a></p>
                            <p>来自：<?php echo cityIp($_smarty_tpl->tpl_vars['m']->value['ip']);?>
</p>
                            <p>中奖出价：<span class="color01"><?php if ($_smarty_tpl->tpl_vars['m']->value['bid_price']>0){?><?php echo price_format($_smarty_tpl->tpl_vars['m']->value['bid_price']);?>
 <?php }?><?php if ($_smarty_tpl->tpl_vars['m']->value['paib']>0){?><?php echo $_smarty_tpl->tpl_vars['m']->value['paib'];?>
拍币<?php }?></span></p>
                            <p>中奖时间：<span class="color01"><?php echo formatTime($_smarty_tpl->tpl_vars['m']->value['cod_time']);?>
</span></p>
                        </div>
                    </div>
                    <div class="pro-info">
                        <p class="tit"><a href="#" title="<?php echo $_smarty_tpl->tpl_vars['m']->value['title'];?>
"><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['m']->value['title'],26);?>
</a></p>
                        <p>商品价值：<?php echo price_format($_smarty_tpl->tpl_vars['m']->value['price']);?>
</p>
                        <p>中奖概率：<?php echo $_smarty_tpl->tpl_vars['m']->value['win'];?>
%</p>
                        <p class="button"><span><a href="<?php echo ('/auction/view/').($_smarty_tpl->tpl_vars['m']->value['act_id']);?>
" target="_blank">查看详情</a></span></p>
                    </div>
                </div>
            </div>
        </li>
        <?php }
if (!$_smarty_tpl->tpl_vars['m']->_loop) {
?>
        <li class="empty">暂无最新夺宝记录！</li>
        <?php } ?>
    </ul>
</div>

<?php echo $_smarty_tpl->getSubTemplate ("ajax_page.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<script type="text/javascript">
    $(document).ready(function(){
        $('#load_auc').find('.demo').ajaxContent({
            event:'click', //mouseover
            loaderType:"text",
            loadingMsg:"<span class='loading'>拼命加载中...</span>",
            target:'#load_auc',
            success:function(){
                scrollLoading();
            }
        }).bind('click',function(){
            $('html').animate({ scrollTop: '0' }, 500);
        });
    });
</script><?php }} ?>