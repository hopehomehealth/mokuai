<?php /* Smarty version Smarty-3.1.13, created on 2017-04-07 19:48:42
         compiled from "/data/01/html/1yyg225/webapps/www/views/cn/newbie/home.html" */ ?>
<?php /*%%SmartyHeaderCode:192867761558e77c9a17c7a9-10212706%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '63dbacde8595cc0bfa98022d8e2be2f3af6c0d92' => 
    array (
      0 => '/data/01/html/1yyg225/webapps/www/views/cn/newbie/home.html',
      1 => 1491549514,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '192867761558e77c9a17c7a9-10212706',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_58e77c9a1c0548_87513962',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58e77c9a1c0548_87513962')) {function content_58e77c9a1c0548_87513962($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<!-- <?php echo $_smarty_tpl->getSubTemplate ("ur_here.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
 -->
<style type="text/css">
    .newbieBg{ margin:0 auto 20px; width: 1160px; height: 580px; background: url('/style/images/newbie/newbiebg.png') no-repeat; position: relative; }
    .newbieBg a{ display: block; position: absolute; width: 196px; height: 61px; }
    .newbieBg a.a1{ top: 343px; left: 266px; }
    .newbieBg a.a2{ top: 343px; left: 867px; }
    
    .item a{ position:absolute;z-index:999;top:85px;left:170px; font-size:20px; text-decoration:none; color: #fff; }
    .hidden{ display: none; }
    .item-logo{ position:relative; }
    .item .item-logo{ width:374px; height:160px; margin:-70px auto 0; }
    .item .item-logo-first{ margin-top:0; }
    .item .item-main{ width:90%;margin:0 auto 70px; text-align:center; } 
</style>
<div id="container">

    <!-- <div class="newbieBg">
        <a href="<?php echo url('/content/newbie/auction');?>
" class="a1"></a>
        <a href="<?php echo url('/content/newbie/yunbuy');?>
" class="a2"></a>
    </div> -->
    
    <div class="newB" style="width:1160px; margin:0 auto; background-color:#ddd;">
        <div class="item" >
            <div class="item-logo item-logo-first">
              <img src="/upload/images/newbie.png" style="position:absolute;z-index:99;">
              <a href="#0" style="">一元夺宝是啥</a>
            </div>
            <div class="item-main hidden">
              <img src="/upload/images/shenmeshiduobao.jpg">
            </div>
        </div>
        <div class="item" >
            <div class="item-logo">
              <img src="/upload/images/newbie1.png" style="position:absolute;z-index:98;">
              <a href="#1" style="">如何一元夺宝</a>
            </div>
            <div class="item-main hidden">
            </div>
        </div>
        <div class="item" >
            <div class="item-logo">
              <img src="/upload/images/newbie2.png" style="position:absolute;z-index:97;">
              <a href="#2" style="">网站币值说明</a>
            </div>
            <div class="item-main hidden">
            </div>
        </div>
        <div class="item" >
            <div class="item-logo">
              <img src="/upload/images/newbie3.png" style="position:absolute;z-index:96;">
              <a href="#3" style="">公平公正开奖</a>
            </div>
            <div class="item-main hidden">
            </div>
        </div>
      </div>

</div>
<script> 
      $(document).ready(function(){
        $(".item a").click(function(){
          $(this).parents(".item").siblings().children(".item-main").addClass("hidden");
          $(this).parent().siblings().toggleClass("hidden");
          
        })
      })
</script>
<?php echo $_smarty_tpl->getSubTemplate ("footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php }} ?>