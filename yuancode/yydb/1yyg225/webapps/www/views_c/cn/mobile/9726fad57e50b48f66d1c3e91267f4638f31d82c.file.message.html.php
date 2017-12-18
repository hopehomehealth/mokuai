<?php /* Smarty version Smarty-3.1.13, created on 2016-05-24 14:16:31
         compiled from "D:\test1yyg3.lnest.com\webapps\www\views\cn\mobile\member\message.html" */ ?>
<?php /*%%SmartyHeaderCode:5055743f1bfe8b252-97242654%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9726fad57e50b48f66d1c3e91267f4638f31d82c' => 
    array (
      0 => 'D:\\test1yyg3.lnest.com\\webapps\\www\\views\\cn\\mobile\\member\\message.html',
      1 => 1456367943,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '5055743f1bfe8b252-97242654',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'row' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5743f1c003d095_95406066',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5743f1c003d095_95406066')) {function content_5743f1c003d095_95406066($_smarty_tpl) {?><?php if (isset($_smarty_tpl->tpl_vars['header'])) {$_smarty_tpl->tpl_vars['header'] = clone $_smarty_tpl->tpl_vars['header'];
$_smarty_tpl->tpl_vars['header']->value = 'header2'; $_smarty_tpl->tpl_vars['header']->nocache = null; $_smarty_tpl->tpl_vars['header']->scope = 0;
} else $_smarty_tpl->tpl_vars['header'] = new Smarty_variable('header2', null, 0);?>
<?php echo $_smarty_tpl->getSubTemplate ("top.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<link rel="stylesheet" href="/style/mobile/css/member.css">
<div id="content" class="container main">
    <form action="" method="post" id="msgform" target="iframeNews">
    <div class="form-m">
        <?php if ($_smarty_tpl->tpl_vars['row']->value){?><input type="hidden" name="parent_id" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['id'];?>
"/><?php }?>
        <?php if ($_smarty_tpl->tpl_vars['row']->value['id']){?>
        <div class="item ui-clr">
            <dl>
                <dt class="color03">回复：</dt>
                <dd>
                    <?php echo nl2br(stripcslashes($_smarty_tpl->tpl_vars['row']->value['content']));?>

                </dd>
            </dl>
        </div>
        <?php }?>
        <div class="item ui-clr">
            <dl>
                <dt class="color03">收件人：</dt>
                <dd>
                    <?php if ($_smarty_tpl->tpl_vars['row']->value['mid']){?>
                    <a href="<?php echo ('/minfo?id=').($_smarty_tpl->tpl_vars['row']->value['mid']);?>
" target="_blank"><?php echo nickname($_smarty_tpl->tpl_vars['row']->value['username'],$_smarty_tpl->tpl_vars['row']->value['nickname']);?>
</a>
                    <input name="to_mid" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['mid'];?>
" />
                    <?php }else{ ?>
                    网站管理员
                    <?php }?>
                </dd>
            </dl>
        </div>
        <div class="item ui-clr">
            <dl>
                <dt class="color03">发送内容：</dt>
                <dd>
                    <textarea name="content" class="input-m" style="padding:5px;width:95%;height:80px;"></textarea>
                </dd>
            </dl>
        </div>
        <input name="Submit" type="submit" value="提 交" class="btn" />
    </div>

    <div class="list01 list-address">
        <dl class="item ui-clr"></dl>
    </div>
    <div class="loading getMore"></div>
    </form>
</div>
<script src="/style/mobile/js/jquery.more.js"></script>
<script type="text/javascript">
    $(function(){
        $('.list-address').more({
            'address': '/member/message',
            'amount' : 10
        })
    });
</script>
<?php echo $_smarty_tpl->getSubTemplate ("footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>