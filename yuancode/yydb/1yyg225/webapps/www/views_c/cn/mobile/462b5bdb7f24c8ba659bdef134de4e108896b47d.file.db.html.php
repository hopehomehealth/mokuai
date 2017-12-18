<?php /* Smarty version Smarty-3.1.13, created on 2015-12-02 15:29:46
         compiled from "E:\projects\web\lnest\1yyg225\webapps\www\views\cn\mobile\member\db.html" */ ?>
<?php /*%%SmartyHeaderCode:21961565e9dea0c5816-02444497%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '462b5bdb7f24c8ba659bdef134de4e108896b47d' => 
    array (
      0 => 'E:\\projects\\web\\lnest\\1yyg225\\webapps\\www\\views\\cn\\mobile\\member\\db.html',
      1 => 1433792324,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '21961565e9dea0c5816-02444497',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'total' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_565e9dea1bb9c1_41404760',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_565e9dea1bb9c1_41404760')) {function content_565e9dea1bb9c1_41404760($_smarty_tpl) {?><?php if (isset($_smarty_tpl->tpl_vars['header'])) {$_smarty_tpl->tpl_vars['header'] = clone $_smarty_tpl->tpl_vars['header'];
$_smarty_tpl->tpl_vars['header']->value = 'header2'; $_smarty_tpl->tpl_vars['header']->nocache = null; $_smarty_tpl->tpl_vars['header']->scope = 0;
} else $_smarty_tpl->tpl_vars['header'] = new Smarty_variable('header2', null, 0);?>
<?php echo $_smarty_tpl->getSubTemplate ("top.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<link rel="stylesheet" href="/style/mobile/css/member.css">
<div id="content" class="container main">
    <div class="tab-m-a" style="padding:15px 40px;border-bottom-width:1px;">
        <ul class="ui-clr">
            <li class="<?php if (!isset($_GET['order'])){?>on<?php }?>"><a href="<?php echo url('/member/db');?>
">参与成功</a></li>
            <li class="<?php if (isset($_GET['order'])){?>on<?php }?> last"><a href="<?php echo url('/member/db?order');?>
">未付款</a></li>
        </ul>
    </div>

    <?php if (!isset($_GET['order'])){?>
    <div class="tips-m" style="padding:10px;text-align: center;color:#333;">
        即将揭晓商品<a href="<?php echo url('/member/db');?>
?type=1" class="color01"><b>（<?php echo $_smarty_tpl->tpl_vars['total']->value['wait'];?>
）</b></a>
        进行中的商品<a href="<?php echo url('/member/db');?>
?type=2" class="color01"><b class="color01">（<?php echo $_smarty_tpl->tpl_vars['total']->value['ing'];?>
）</b></a>
        已揭晓商品<a href="<?php echo url('/member/db');?>
?type=3" class="color01"><b class="color01">（<?php echo $_smarty_tpl->tpl_vars['total']->value['end'];?>
）</b></a>
    </div>
    <?php }?>

    <ul class="tab-cell tab-cell-5 ui-clr">
        <li<?php if ($_GET['time']==''){?> class="on"<?php }?>><a href="<?php echo url('/member/db');?>
<?php if (isset($_GET['order'])){?>?order<?php }?>">全部</a></li>
        <li<?php if ($_GET['time']==1){?> class="on"<?php }?>><a href="<?php echo url('/member/db');?>
?time=1<?php if (isset($_GET['order'])){?>&order<?php }?>">今天</a></li>
        <li<?php if ($_GET['time']==2){?> class="on"<?php }?>><a href="<?php echo url('/member/db');?>
?time=2<?php if (isset($_GET['order'])){?>&order<?php }?>">本周</a></li>
        <li<?php if ($_GET['time']==3){?> class="on"<?php }?>><a href="<?php echo url('/member/db');?>
?time=3<?php if (isset($_GET['order'])){?>&order<?php }?>">本月</a></li>
        <li class="last <?php if ($_GET['time']==4){?> on<?php }?>"><a href="<?php echo url('/member/db');?>
?time=4<?php if (isset($_GET['order'])){?>&order<?php }?>">最近三月</a></li>
    </ul>

    <div class="list01 list-db">
        <dl class="item ui-clr"></dl>
    </div>
    <div class="loading getMore" style="background: #fff;"></div>
</div>
<script src="/style/mobile/js/jquery.more.js"></script>
<script type="text/javascript">
    $(function(){
        $('.list-db').more({
            'address': '/member/db?1<?php if (isset($_GET['order'])){?>&order<?php }?><?php if ($_GET['time']){?>&time=<?php echo $_GET['time'];?>
<?php }?><?php if ($_GET['type']){?>&type=<?php echo $_GET['type'];?>
<?php }?>',
            'amount' : 10
        })
    });
</script>
<?php echo $_smarty_tpl->getSubTemplate ("footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>