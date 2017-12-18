<?php /* Smarty version Smarty-3.1.13, created on 2016-12-10 02:06:50
         compiled from "/data/01/html/1yyg225/webapps/www/views/cn/business/index.html" */ ?>
<?php /*%%SmartyHeaderCode:672632681584af2ba7bf384-40502138%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '101a1da0fdac29bf799f911db01099c925cc6ead' => 
    array (
      0 => '/data/01/html/1yyg225/webapps/www/views/cn/business/index.html',
      1 => 1481178229,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '672632681584af2ba7bf384-40502138',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'data' => 0,
    'm' => 0,
    'L' => 0,
    'tagGG' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_584af2ba8968a9_91553837',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_584af2ba8968a9_91553837')) {function content_584af2ba8968a9_91553837($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/data/01/html/1yyg225/system/smarty/plugins/modifier.date_format.php';
?><?php echo $_smarty_tpl->getSubTemplate ("header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<link type="text/css" rel="stylesheet" href="/style/css_02/style.css" />
<link type="text/css" rel="stylesheet" href="/style/css/member.css" />
<link type="text/css" rel="stylesheet" href="/style/css_02/merchant.css" />
<div class="container menu-show">
    <?php echo $_smarty_tpl->getSubTemplate ("business/ur_here.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

    <?php echo $_smarty_tpl->getSubTemplate ("business/menu.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

    <div class="fn-right hy-r">
        <?php if ($_smarty_tpl->tpl_vars['data']->value['list']){?>
        <div class="shop-right">
            <h3>我的商品</h3>
            <a href="/business/yunbuy#m">更多</a>
        </div>
        <ul class="box-sizing shop-right1">
            <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['data']->value['list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>
            <li class="index1-img">
                <em><a href="<?php echo $_smarty_tpl->tpl_vars['m']->value['url'];?>
" target="_blank"><img src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['zz'][0][0]->_callViewFunc(array('mod'=>'fileurl','source'=>$_smarty_tpl->tpl_vars['m']->value['imgurl_src'],'width'=>160,'height'=>160,'type'=>0),$_smarty_tpl);?>
" /></a></em>
                <p class="banner-title"><a href="<?php echo $_smarty_tpl->tpl_vars['m']->value['url'];?>
" target="_blank">第<?php echo $_smarty_tpl->tpl_vars['m']->value['qishu'];?>
期 <?php echo $_smarty_tpl->tpl_vars['m']->value['title'];?>
</a></p>
                <p class="banner-money">总需：<?php echo $_smarty_tpl->tpl_vars['m']->value['need_num'];?>
 人次<?php if ($_smarty_tpl->tpl_vars['m']->value['price']>1){?><span class="zq_ico" style="float: right;"><?php echo num2char($_smarty_tpl->tpl_vars['m']->value['price']);?>
元<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_area'];?>
</span><?php }?></p>
                <div class="progressBar">
                    <p class="progressBar-wrap">
                        <span style="width:<?php echo $_smarty_tpl->tpl_vars['m']->value['buy_num']/$_smarty_tpl->tpl_vars['m']->value['need_num']*100;?>
%"></span>
                    </p>
                    <div class="progressBar-txt">
                        <div class="txt-l">
                            <p><b><?php echo $_smarty_tpl->tpl_vars['m']->value['buy_num'];?>
</b></p>
                            <p>已参与人次</p>
                        </div>
                        <div class="txt-r">
                            <p><b><?php echo $_smarty_tpl->tpl_vars['m']->value['end_num'];?>
</b></p>
                            <p>剩余人次</p>
                        </div>
                    </div>
                </div>
            </li>
            <?php } ?>
        </ul>
        <?php }?>
        <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['zz'][0][0]->_callViewFunc(array('mod'=>'content','var'=>'tagGG','module'=>'article','field'=>'id,title,url,createtime','catid'=>@constant('NOTE_ID'),'limit'=>5),$_smarty_tpl);?>

        <?php if ($_smarty_tpl->tpl_vars['tagGG']->value){?>
        <div class="shop-right">
            <h3>消息通知</h3>
            <a href="/content/index/<?php echo @constant('NOTE_ID');?>
" target="_blank">更多</a>
        </div>
        <ul class="gg-list fn-clear shop-bor">
            <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['tagGG']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>
            <li><a href="<?php echo url($_smarty_tpl->tpl_vars['m']->value['url']);?>
"><?php echo $_smarty_tpl->tpl_vars['m']->value['title'];?>
</a><span><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['m']->value['createtime'],'Y-m-d');?>
</span></li>
            <?php } ?>
        </ul>
        <?php }?>
    </div>
</div>
<div class="merchant"></div>
<?php echo $_smarty_tpl->getSubTemplate ("footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<script src="/style/css_02/common_02.js"></script><?php }} ?>