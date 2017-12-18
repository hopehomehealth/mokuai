<?php /* Smarty version Smarty-3.1.13, created on 2017-01-11 20:27:53
         compiled from "/data/01/html/1yyg225/webapps/www/views/manage/wxmedia/appmsg/appmsg_tpl.html" */ ?>
<?php /*%%SmartyHeaderCode:47877671587624c92e8058-21319777%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'da3062a8afbb2e3006d03575de7fdbccb2b7d69f' => 
    array (
      0 => '/data/01/html/1yyg225/webapps/www/views/manage/wxmedia/appmsg/appmsg_tpl.html',
      1 => 1456367948,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '47877671587624c92e8058-21319777',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'list' => 0,
    'k' => 0,
    'm' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_587624c93f2666_92319553',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_587624c93f2666_92319553')) {function content_587624c93f2666_92319553($_smarty_tpl) {?><?php if (count($_smarty_tpl->tpl_vars['list']->value)==1){?>

<div class="media_preview_area">
    <div class="media_preview">
        <div class="preview-box">
            <!--主图文-->
            <div class="xmsg">
                <h4 class="mtitle"><a href="javascript:;" target="_blank"><?php echo $_smarty_tpl->tpl_vars['list']->value[0]['title'];?>
</a></h4>

                <div class="msg-cover edit-area">
                    <div class="msg-thumb-wrp has-thumb">
                        <img class="msg-thumb" src="<?php echo $_smarty_tpl->tpl_vars['list']->value[0]['imgurl_src'];?>
">
                        <i class="msg-thumb-default">封面图片</i>
                    </div>
                </div>

                <div class="msg-desc"><?php echo $_smarty_tpl->tpl_vars['list']->value[0]['desc'];?>
</div>
            </div>
            <!--主图文End-->
        </div>
    </div>
</div>

<?php }elseif(count($_smarty_tpl->tpl_vars['list']->value)>1){?>
<div class="media_preview_area">
    <div class="media-multi">
        <div class="preview-box">
            <!--主图文-->
            <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['m']->key;
?>
            <?php if ($_smarty_tpl->tpl_vars['k']->value==0){?>
            <div class="msg-top">
                <div class="msg-info">
                    <div class="msg-date"></div>
                </div>
                <div class="msg-cover edit-area">
                    <div class="msg-thumb-wrp has-thumb">
                        <img class="msg-thumb" src="<?php echo $_smarty_tpl->tpl_vars['m']->value['imgurl_src'];?>
">
                        <i class="msg-thumb-default">封面图片</i>
                        <h4 class="msg-title">
                            <a href="javascript:;" target="_blank"><?php echo $_smarty_tpl->tpl_vars['m']->value['title'];?>
</a>
                        </h4>
                    </div>
                </div>
            </div>
            <?php }else{ ?>
            <div class="msg-item has-thumb"><img class="msg-thumb" src="<?php echo $_smarty_tpl->tpl_vars['m']->value['imgurl_src'];?>
">
                <h4 class="msg-title">
                    <a href="javascript:void(0);" target="_blank"><?php echo $_smarty_tpl->tpl_vars['m']->value['title'];?>
</a>
                </h4>
            </div>
            <?php }?>
            <?php } ?>
        </div>
    </div>
</div>
<?php }?>
<div class="clear"></div><?php }} ?>