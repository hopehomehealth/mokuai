<?php /* Smarty version Smarty-3.1.13, created on 2016-12-05 16:03:54
         compiled from "/data/01/html/1yyg225/webapps/www/views/cn/content/share.html" */ ?>
<?php /*%%SmartyHeaderCode:107944583758451f6a5a5f73-52713964%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '443fe24aaaf260c1a33f351a2fdf0b9ca748e43b' => 
    array (
      0 => '/data/01/html/1yyg225/webapps/www/views/cn/content/share.html',
      1 => 1456367946,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '107944583758451f6a5a5f73-52713964',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'tagAdw' => 0,
    'tagAds' => 0,
    'm' => 0,
    'data' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_58451f6aa5efa6_57020115',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58451f6aa5efa6_57020115')) {function content_58451f6aa5efa6_57020115($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<link rel="stylesheet" href="<?php echo url('/style/css/yiyuanbao.css');?>
">
<style type="text/css">
    .shareM{ float: left; line-height: 36px; font-size: 14px; color: #999; }
    .shareM b{ font-size: 16px; }
    .shareA{ float: right; }
    .shareA a{ float: right; margin-left: 15px; }
    .shareA a.a{ display: block; height: 34px; font-size: 16px; background: #fff; border: 1px solid #fe685c; border-radius: 18px; padding: 0 20px; line-height: 36px; color: #fe685c; text-align: center; font-weight: bold; }
    .shareA a.on{ background: #fe685c; color: #fff; }
</style>
<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['zz'][0][0]->_callViewFunc(array('mod'=>'content','var'=>'tagAdw','module'=>'ad','id'=>7),$_smarty_tpl);?>

<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['zz'][0][0]->_callViewFunc(array('mod'=>'fileurl','var'=>'tagAds','source'=>$_smarty_tpl->tpl_vars['tagAdw']->value['images'],'num'=>2),$_smarty_tpl);?>

<?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['tagAds']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>
<div class="g-gg" style="height:<?php echo $_smarty_tpl->tpl_vars['tagAdw']->value['height'];?>
px;background:<?php echo $_smarty_tpl->tpl_vars['tagAdw']->value['bgcolor'];?>
 url('<?php echo $_smarty_tpl->tpl_vars['m']->value['path'];?>
') no-repeat center bottom"><span></span></div>
<?php } ?>

<div id="stage">
    <div class="container fn-clear" style="padding-top:20px;">
        <div class="shareA">
            <a href="<?php echo url('/member/order');?>
"><img src="/style/images/shareB.png" /></a>
            <a href="/content/share/1?rec=yes" class="a<?php if ($_GET['rec']=='yes'){?> on<?php }?>">精华</a>
            <a href="/content/share/1?rec=no" class="a<?php if ($_GET['rec']=='no'){?> on<?php }?>">普通</a>
            <a href="/content/share" class="a<?php if (!$_GET['rec']){?> on<?php }?>">所有</a>
        </div>
        <div class="shareM">
            共<b class="color01"><?php echo $_smarty_tpl->tpl_vars['data']->value['count'];?>
</b>个幸运获得者晒单
        </div>
    </div>
    <div class="m-shareList g-wrap fn-clear transitions-enabled infinite-scroll" id="wall"></div>
    <div id="loadmore" style="display:none;">
        <a href="/content/share_ajax/<?php echo (($tmp = @$_GET['rec'])===null||$tmp==='' ? 'all' : $tmp);?>
/2">加载更多</a>
    </div>
</div>
<?php echo $_smarty_tpl->getSubTemplate ("footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<script type="text/javascript">
    var _url = '/content/share_ajax/<?php echo (($tmp = @$_GET['rec'])===null||$tmp==='' ? "all" : $tmp);?>
/1';
</script>
<link type="text/css" rel="stylesheet" href="<?php echo url('/style/gk/css/style.css');?>
" />
<script type="text/javascript" src="<?php echo url('/style/gk/js/jquery.masonry.min.js');?>
"></script>
<script type="text/javascript" src="<?php echo url('/style/gk/js/jquery.infinitescroll.min.js');?>
"></script>
<script type="text/javascript" src="<?php echo url('/style/gk/js/share.js');?>
"></script><?php }} ?>