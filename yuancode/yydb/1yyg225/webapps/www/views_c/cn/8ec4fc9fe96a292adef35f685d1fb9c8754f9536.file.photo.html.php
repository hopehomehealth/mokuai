<?php /* Smarty version Smarty-3.1.13, created on 2016-02-25 17:17:50
         compiled from "D:\test1yyg3.lnest.com\webapps\www\views\cn\member\photo.html" */ ?>
<?php /*%%SmartyHeaderCode:195956cec6be438418-13805729%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8ec4fc9fe96a292adef35f685d1fb9c8754f9536' => 
    array (
      0 => 'D:\\test1yyg3.lnest.com\\webapps\\www\\views\\cn\\member\\photo.html',
      1 => 1456367944,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '195956cec6be438418-13805729',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'member' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_56cec6be525708_30154957',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56cec6be525708_30154957')) {function content_56cec6be525708_30154957($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<link rel="stylesheet" href="<?php echo url('/style/css/member.css');?>
">
<?php echo $_smarty_tpl->getSubTemplate ("ur_here.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div id="container">
    <div class="fn-clear mt20 pb20">
        <?php echo $_smarty_tpl->getSubTemplate ("member/menu.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

        <div class="fn-right hy-r">
            <script type="text/javascript" src="<?php echo url('/style/fullavatar/fullAvatarEditor.js');?>
"></script>
            <script type="text/javascript" src="<?php echo url('/style/fullavatar/swfobject.js');?>
"></script>
            <div>
                <p id="swfContainer">
                    本组件需要安装Flash Player后才可使用，请从<a href="http://www.adobe.com/go/getflashplayer">这里</a>下载安装。
                </p>
            </div>
            <script type="text/javascript">
                swfobject.addDomLoadEvent(function () {
                    var swf = new fullAvatarEditor("swfContainer", {
                                id: 'swf',
                                upload_url: '/member/photo',
                                src_upload:1,
                                avatar_sizes:'160*160|80*80|30*30',
                                avatar_sizes_desc:'160*160|80*80|30*30',
                                src_url: '<?php echo $_smarty_tpl->tpl_vars['member']->value['photo'];?>
'
                            }, function (msg) {
                                switch(msg.code)
                                {
                                    case 1 : break;
                                    case 2 : break;
                                    case 3 :
                                        if(msg.type == 0)
                                        {
                                            alert("摄像头已准备就绪且用户已允许使用。");
                                        }
                                        else if(msg.type == 1)
                                        {
                                            alert("摄像头已准备就绪但用户未允许使用！");
                                        }
                                        else
                                        {
                                            alert("摄像头被占用！");
                                        }
                                        break;
                                    case 5 :
                                        if(msg.type == 0)
                                        {
                                            location.reload();
                                        }
                                        break;
                                }
                            }
                    );
                    document.getElementById("upload").onclick=function(){
                        swf.call("upload");
                    };
                });
            </script>
        </div>
    </div>
</div>
<?php echo $_smarty_tpl->getSubTemplate ("footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>