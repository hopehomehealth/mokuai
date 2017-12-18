<?php /* Smarty version Smarty-3.1.13, created on 2016-05-11 10:19:53
         compiled from "D:\test1yyg3.lnest.com\webapps\www\views\cn\mobile\member\photo.html" */ ?>
<?php /*%%SmartyHeaderCode:1074256cececa2d4961-51947113%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8177d19aa68b21812c95ce4a95a43374181ca5d4' => 
    array (
      0 => 'D:\\test1yyg3.lnest.com\\webapps\\www\\views\\cn\\mobile\\member\\photo.html',
      1 => 1462933153,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1074256cececa2d4961-51947113',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_56cececa3e07f1_26047515',
  'variables' => 
  array (
    'member' => 0,
    'option' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56cececa3e07f1_26047515')) {function content_56cececa3e07f1_26047515($_smarty_tpl) {?><?php if (isset($_smarty_tpl->tpl_vars['header'])) {$_smarty_tpl->tpl_vars['header'] = clone $_smarty_tpl->tpl_vars['header'];
$_smarty_tpl->tpl_vars['header']->value = 'header2'; $_smarty_tpl->tpl_vars['header']->nocache = null; $_smarty_tpl->tpl_vars['header']->scope = 0;
} else $_smarty_tpl->tpl_vars['header'] = new Smarty_variable('header2', null, 0);?>
<?php echo $_smarty_tpl->getSubTemplate ("top.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<link rel="stylesheet" href="/style/mobile/css/member.css">
<style type="text/css">
    .container{ background: #fff; }
    .button-box{ padding: 10px 0 35px; }
    .btn-db a{ background: #E54048; }
    .webuploader-pick{ padding: 0 10px !important; margin:0 5px !important; display: block !important; font-size: 1.6rem !important; border-radius: 8px; }
    .btns{ display: block !important; }
    .btn-db button { display: block; margin: 0 5px; height: 35px; line-height: 35px; width: 95%; text-align: center; background: #e54048; font-size: 1.6rem; border: 0; border-radius: 8px; color: #fff; }
    .uploader-list{ padding-left: 10px; }
    /*图片层*/
    #photo_box{ margin-top: 10px; text-align: center; position: relative; }
    #photo_box dd{ height: 160px; overflow: hidden; }
    #photo{  }
    #photo_left{ position: absolute; top: 0; height: 160px; background-color:rgba(0,0,0,0.5); }
    #photo_center{ position: absolute; top: 0; border: 1px dotted #ccc; width: 158px; height: 158px; background-color:rgba(0,0,0,0.0); }
    #photo_right{ position: absolute; top: 0; height: 160px; background-color:rgba(0,0,0,0.5); }
</style>
<script type="text/javascript">
    var photo = 1;
    $(function(){
        var cw = $('#photo_box dd').width();
        var ch = $('#photo_box dd').height();
        var w = $('#photo').width();
        var h = $('#photo').height();
        $('#photo_center').css({
            left: (cw-w)/2+(w-160)/2
        })
        $('#photo_left').css({
            width: (cw-160)/2+1,
            left: 0
        });
        $('#photo_right').css({
            width: (cw-160)/2,
            left: (cw-160)/2+160
        });
        loadPhoto();
    })
    function loadPhoto(){
        var theImage = new Image();
        theImage.src = $('#photo').attr('src');

        var w = theImage.width;
        var h = theImage.height;
        if(w>h){
            $('#photo').css({
                width: 'auto',
                height: 160
            });
        }
        else if(h>w){
            h = h/w*160;
            $('#photo').css({
                width: 160,
                height: h
            }).css('margin-top','-'+(h-160)/2+'px');
        }
    }
</script>
<div id="content" class="container main">
    <div class="tips-m">
        <ul>
            <li>
                <dl class="prompt">
                    <dt style="font-weight: bold;">
                        <p>将自动剪裁出160*160尺寸的头像；</p>
                        <p>上传的图片大小请限制在2M以内。</p>
                    </dt>
                </dl>
            </li>
        </ul>
    </div>
    <dl id="photo_box">
        <dt id="photo_left"></dt>
        <dt id="photo_center"></dt>
        <dt id="photo_right"></dt>
        <dd><img src="<?php if ($_smarty_tpl->tpl_vars['member']->value['photo']){?><?php echo $_smarty_tpl->tpl_vars['member']->value['photo'];?>
<?php }else{ ?>/upload/photo.png<?php }?>" id="photo" alt="" /></dd>
    </dl>
    <form action="/member/photo" target="iframeNews" method="post">
    <div class="button-box ui-clr">
        <span class="btn-db">
            <?php $_smarty_tpl->createLocalArrayVariable('option', null, 0);
$_smarty_tpl->tpl_vars['option']->value['btn_title'] = '选择图片';?>
            <?php echo upload_btn('photo',0,0,1,'','',$_smarty_tpl->tpl_vars['option']->value);?>

        </span>
        <span class="btn-db">
            <button type="submit" name="Submit">上传图片</button>
        </span>
    </div>
    </form>
</div>
<?php echo $_smarty_tpl->getSubTemplate ("footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>