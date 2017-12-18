<?php /* Smarty version Smarty-3.1.13, created on 2016-12-19 16:28:06
         compiled from "/data/01/html/1yyg225/webapps/www/views/cn/mobile/member/info.html" */ ?>
<?php /*%%SmartyHeaderCode:35847656358579a16eb2ae3-33670005%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8eb36bee9d2d7e748b6e0332ab3f7d0e852e0474' => 
    array (
      0 => '/data/01/html/1yyg225/webapps/www/views/cn/mobile/member/info.html',
      1 => 1456367944,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '35847656358579a16eb2ae3-33670005',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'member' => 0,
    'site_config' => 0,
    'wechat' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_58579a17030dc5_92241391',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58579a17030dc5_92241391')) {function content_58579a17030dc5_92241391($_smarty_tpl) {?><?php if (isset($_smarty_tpl->tpl_vars['header'])) {$_smarty_tpl->tpl_vars['header'] = clone $_smarty_tpl->tpl_vars['header'];
$_smarty_tpl->tpl_vars['header']->value = 'header2'; $_smarty_tpl->tpl_vars['header']->nocache = null; $_smarty_tpl->tpl_vars['header']->scope = 0;
} else $_smarty_tpl->tpl_vars['header'] = new Smarty_variable('header2', null, 0);?>
<?php echo $_smarty_tpl->getSubTemplate ("top.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<link rel="stylesheet" href="/style/mobile/css/member.css">
<div id="content" class="container main">
    <div class="tab-m-a">
        <ul class="ui-clr">
            <li class="ta">基本信息</li>
            <li class="ta last">修改密码</li>
        </ul>
    </div>

    <div class="tab-m-c" style="display: none;">
        <div class="tips-m">
            亲爱的 <span class="color01"><?php echo $_smarty_tpl->tpl_vars['member']->value['username'];?>
</span><br>
            请填写您的真实资料，有助于我们更好的为您服务。
            <div class="prompt">完善以下资料即可获得80经验值，<?php echo $_smarty_tpl->tpl_vars['site_config']->value['site_name'];?>
不会以任何形式公开您的个人隐私，请放心填写！</div>
        </div>

        <div class="form-m">
            <form action="" target="iframeNews" method="post" id="submit_form">
            <div class="item ui-clr">
                <dl>
                    <dt class="color03">昵 称：</dt>
                    <dd>
                        <input type="text" class="input-m" name="nickname" value="<?php echo $_smarty_tpl->tpl_vars['member']->value['nickname'];?>
" />
                    </dd>
                </dl>
            </div>
            <div class="item ui-clr">
                <dl>
                    <dt class="color03">出生日期：</dt>
                    <dd><input type="text" class="input-m" name="birthday" value="<?php echo $_smarty_tpl->tpl_vars['member']->value['birthday'];?>
" /></dd>
                </dl>
            </div>
            <div class="item ui-clr">
                <dl>
                    <dt class="color03">性　别：</dt>
                    <dd>
                        <label><input name="sex" type="radio" value="1" <?php if ($_smarty_tpl->tpl_vars['member']->value['sex']==1){?>checked<?php }?>/> 男</label>
                        <label><input name="sex" type="radio" value="2" <?php if ($_smarty_tpl->tpl_vars['member']->value['sex']==2){?>checked<?php }?>/> 女</label>
                    </dd>
                </dl>
            </div>
            <div class="item ui-clr">
                <dl>
                    <dt class="color03">电子邮箱：</dt>
                    <dd><input type="text" class="input-m" name="email" value="<?php echo $_smarty_tpl->tpl_vars['member']->value['email'];?>
" /></dd>
                </dl>
            </div>
            <div class="item ui-clr">
                <dl>
                    <dt class="color03">手 机：</dt>
                    <dd style="padding-top:2px;"><?php echo $_smarty_tpl->tpl_vars['member']->value['mobile'];?>
</dd>
                </dl>
            </div>
            <div class="item ui-clr">
                <dl>
                    <dt class="color03">所在地区：</dt>
                    <dd><?php echo linkage('zone',$_smarty_tpl->tpl_vars['member']->value['zone']);?>
</dd>
                </dl>
            </div>
            <div class="item ui-clr">
                <dl>
                    <dt class="color03">留下一句：</dt>
                    <dd>
                        <input name="intro" type="text" class="input-m" value="<?php echo $_smarty_tpl->tpl_vars['member']->value['intro'];?>
" />
                        <div class="tip-m" style="line-height: 1.8; font-size: 14px;">
                            <a href="<?php echo ('/minfo?id=').($_smarty_tpl->tpl_vars['member']->value['mid']);?>
" class="color02">去个人空间看看</a>
                        </div>
                    </dd>
                </dl>
            </div>
            <input class="btn" name="Submit" type="submit" value="确认修改">
            </form>
        </div>
    </div>

    <div class="tab-m-c" style="display: none;">
        <div class="form-m">
            <form action="<?php echo url('/member/chpass');?>
" target="iframeNews" method="post">
                <div class="item ui-clr">
                    <?php if ($_smarty_tpl->tpl_vars['wechat']->value!=1){?>
                    <dl>
                        <dt class="color03">原密码：</dt>
                        <dd>
                            <input type="password" class="input-m" name="oldpass" value="" />
                        </dd>
                    </dl>
                    <?php }?>
                </div>
                <div class="item ui-clr">
                    <dl>
                        <dt class="color03">新密码：</dt>
                        <dd>
                            <input type="password" class="input-m" name="pass1" value="" />
                        </dd>
                    </dl>
                </div>
                <div class="item ui-clr">
                    <dl>
                        <dt class="color03">确认密码：</dt>
                        <dd>
                            <input type="password" class="input-m" name="pass2" value="" />
                        </dd>
                    </dl>
                </div>
                <input class="btn" name="Submit" type="submit" value="确认修改">
            </form>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(function(){
        tabs('#content','.tab-m-a li','.tab-m-c','on','click');
        if(location.hash=='#pass'){
            $('.tab-m-a li').eq(1).click();
        }
    })
</script>
<?php echo $_smarty_tpl->getSubTemplate ("footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>