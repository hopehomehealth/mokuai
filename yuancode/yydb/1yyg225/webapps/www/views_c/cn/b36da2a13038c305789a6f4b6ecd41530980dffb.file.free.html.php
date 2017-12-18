<?php /* Smarty version Smarty-3.1.13, created on 2016-12-07 08:09:38
         compiled from "/data/01/html/1yyg225/webapps/www/views/cn/yunbuy/free.html" */ ?>
<?php /*%%SmartyHeaderCode:172588851858475342ee6482-02317391%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b36da2a13038c305789a6f4b6ecd41530980dffb' => 
    array (
      0 => '/data/01/html/1yyg225/webapps/www/views/cn/yunbuy/free.html',
      1 => 1456367946,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '172588851858475342ee6482-02317391',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'list' => 0,
    'm' => 0,
    'L' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5847534308dd44_65966351',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5847534308dd44_65966351')) {function content_5847534308dd44_65966351($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<link rel="stylesheet" href="<?php echo url('/style/css/yiyuanbao.css');?>
">
<?php echo $_smarty_tpl->getSubTemplate ("ur_here.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="g-body">
<div class="g-wrap g-body-bd f-clear">
    <div class="m-freelist-mod m-freelist-allGoods">
        <div class="m-freelist-mod-bd">
        <ul class="w-goodsList f-clear">
                <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>
                <li class="w-goodsList-item ">
                    <div class="w-goods w-goods-ing">
                        <div class="w-goods-pic">
                        <a href="<?php echo url(('/yunbuy/detail/').($_smarty_tpl->tpl_vars['m']->value['buy_id']));?>
" target="_blank" title="<?php echo $_smarty_tpl->tpl_vars['m']->value['title'];?>
"><img alt="<?php echo $_smarty_tpl->tpl_vars['m']->value['title'];?>
" class="" src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['zz'][0][0]->_callViewFunc(array('mod'=>'fileurl','source'=>$_smarty_tpl->tpl_vars['m']->value['imgurl_src'],'width'=>200,'height'=>150,'type'=>0),$_smarty_tpl);?>
" style=""></a></div>
                        <p class="w-goods-title f-txtabb"><a href="<?php echo url(('/yunbuy/detail/').($_smarty_tpl->tpl_vars['m']->value['buy_id']));?>
" target="_blank" title="(第<?php echo $_smarty_tpl->tpl_vars['m']->value['qishu'];?>
期)<?php echo $_smarty_tpl->tpl_vars['m']->value['title'];?>
">(<b>第<?php echo $_smarty_tpl->tpl_vars['m']->value['qishu'];?>
期</b>)<?php echo $_smarty_tpl->tpl_vars['m']->value['title'];?>
</a></p>
                        <p class="w-goods-price">总需：<?php echo $_smarty_tpl->tpl_vars['m']->value['need_num'];?>
 赠币 </p>
                        <div class="w-progressBar" title="<?php echo $_smarty_tpl->tpl_vars['m']->value['jindu'];?>
%">
                            <p class="w-progressBar-wrap"><span class="w-progressBar-bar" style="width: <?php echo $_smarty_tpl->tpl_vars['m']->value['jindu'];?>
%;"></span></p>
                            <ul class="w-progressBar-txt f-clear">
                                <li class="w-progressBar-txt-l">
                                    <p><b><?php echo $_smarty_tpl->tpl_vars['m']->value['buy_num'];?>
</b></p>
                                    <p>已参与人次</p>
                                </li>
                                <li class="w-progressBar-txt-r">
                                    <p><b><?php echo $_smarty_tpl->tpl_vars['m']->value['end_num'];?>
</b></p>
                                    <p>剩余人次</p>
                                </li>
                            </ul>
                        </div>
                        <p class="w-goods-progressHint"><b class="txt-blue"><?php echo $_smarty_tpl->tpl_vars['m']->value['join_num'];?>
</b>人次已参与，赶快去参加吧！剩余<b class="txt-red"><?php echo $_smarty_tpl->tpl_vars['m']->value['end_num'];?>
</b>人次</p>
                        <div class="w-goods-opr"><a class="w-button w-button-green w-button-l" href="<?php echo url(('/yunbuy/detail/').($_smarty_tpl->tpl_vars['m']->value['buy_id']));?>
" style="width: 96px;" target="_blank"><?php echo $_smarty_tpl->tpl_vars['L']->value['unit_yun_button'];?>
</a> </div>
                    </div>
                </li>
                <?php } ?>
        </ul>
        </div>
        <div class="m-list-pager">
            <?php echo $_smarty_tpl->getSubTemplate ("public_page.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

        </div>
    </div>
</div>
</div><div class="clear mb20">
</div>
<?php echo $_smarty_tpl->getSubTemplate ("footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>