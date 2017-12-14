<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>中国缓粘结网管理后台</title>
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="<?php echo (CSS_URL); ?>bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="<?php echo (CSS_URL); ?>font-awesome.min.css" />
    <link rel="stylesheet" href="<?php echo (CSS_URL); ?>ace.min.css" />
    <link rel="stylesheet" href="<?php echo (CSS_URL); ?>page.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo (CSS_URL); ?>style.css">
    <script type="text/javascript" src='<?php echo (JS_URL); ?>jquery-1.7.2.min.js'></script>
    <style>
    .shuaixuanbtn{border-radius: 0!important;color: #858585;background-color: #fff;border: 1px solid #d5d5d5;padding: 5px 4px;line-height: 1.2;font-size: 14px;height:33px;font-family: inherit;-webkit-box-shadow: none!important;box-shadow: none!important;display:block;float:left;}
    </style>
</head>
<body>
<div class="navbar navbar-default">
    <div class="navbar-container">
        <div class="navbar-header pull-left">
            <a href="#" class="navbar-brand">
                <small>中国缓粘结网管理后台 </small>
            </a>
        </div><!-- /.navbar-header -->
        <div class="navbar-header pull-right">
            <ul class="nav ace-nav">
                <li >
                    <a data-toggle="dropdown" href="#" class="dropdown-toggle">
                        <i class="icon-user bigger-140"></i><?php echo ((isset($_SESSION['member']['info']['username']) && ($_SESSION['member']['info']['username'] !== ""))?($_SESSION['member']['info']['username']):"未登录"); ?>
                    </a>
                    <!--<ul class="user-menu pull-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">-->
                        <!--<li>-->
                            <!--<a href="">-->
                                <!--<i class="icon-edit"></i>-->
                                <!--修改密码-->
                            <!--</a>-->
                        <!--</li>-->
                    <!--</ul>-->
                </li>
                <li >
                    <a href="<?php echo U('Member/logout');?>" target="_top"
                       onclick="if(confirm('确认要退出系统么？')==false){return false;}">
                        <i class="icon-off bigger-130"></i>退出
                    </a>
                </li>
            </ul><!-- /.ace-nav -->
        </div><!-- /.navbar-header -->
    </div><!-- /.navbar-container-->
</div><!-- /.navbar-->
<div class="main-container">
    <div class="main-container-inner">
        <div class="sidebar" id="sidebar">
            <ul class="nav nav-list">



                <?php if(is_array($auth_infoA)): foreach($auth_infoA as $key=>$v): if(($v["auth_c"] != '') AND ($v["auth_a"] != '')): ?><li <?php if((CONTROLLER_NAME == $v['auth_c']) AND (ACTION_NAME == $v['auth_a'])): ?>class="active"<?php endif; ?>>

                            <a href="/index.php/Admin/<?php echo ($v["auth_c"]); ?>/<?php echo ($v["auth_a"]); ?>">
                                <i class="icon-folder-close"></i>
                                <span class="menu-text"><?php echo ($v["auth_name"]); ?></span>
                            </a>
                        </li>
                    <?php elseif(($v["auth_a"] == '') AND ($v["auth_c"] == '')): ?>
                        <li>
                            <a class="dropdown-toggle">
                                <i class="icon-folder-close"></i>
                                <span class="menu-text"><?php echo ($v["auth_name"]); ?> </span>
                                <b class="arrow icon-angle-down"></b>
                            </a>
                            <ul class="submenu">
                                <?php if(is_array($auth_infoB)): foreach($auth_infoB as $key=>$vv): if(($vv["auth_pid"]) == $v["auth_id"]): ?><li <?php if(CONTROLLER_NAME == $vv['auth_c']): if(ACTION_NAME == $vv['auth_a']): ?>class="subli active"<?php else: ?>class="subli"<?php endif; endif; ?>>
                                            <a href="/index.php/Admin/<?php echo ($vv["auth_c"]); ?>/<?php echo ($vv["auth_a"]); ?>">
                                                <i class="icon-double-angle-right"></i> <?php echo ($vv["auth_name"]); ?>
                                            </a>
                                        </li><?php endif; endforeach; endif; ?>
                            </ul>
                         </li><?php endif; endforeach; endif; ?>

            </ul>
            <!-- /.nav-list -->

            <div class="sidebar-collapse" id="sidebar-collapse">
                <i class="icon-double-angle-left" data-icon1="icon-double-angle-left" data-icon2="icon-double-angle-right"></i>
            </div>
            <script type="text/javascript">
                try{ace.settings.check('sidebar' , 'collapsed')}catch(e){}
            </script>
        </div>
        
        <script type="text/javascript" src='<?php echo (JS_URL); ?>jquery-2.1.3.min.js'></script>
<script type="text/javascript" src='<?php echo (JS_URL); ?>uploadPreview.js'></script>
<script type="text/javascript" src='<?php echo (PLUGIN_URL); ?>ueditor/ueditor.config.js' ></script>
<script type="text/javascript" src='<?php echo (PLUGIN_URL); ?>ueditor/ueditor.all.min.js' ></script>
<script type="text/javascript" src='<?php echo (PLUGIN_URL); ?>ueditor/lang/zh-cn/zh-cn.js' ></script>
<div class="main-content">
    <div class="page-content">
        <div class="row">
            <div class="page-content box">
                <div class="box-title margin_bot_20">
                    <div class="span10">
                        <h3><i class="icon-magic"></i>添加产品</h3>
                        <div class="pull-right"><button id="bsubmit" type="submit"  class="btn btn-sm btn-primary">保存产品</button></div>
                    </div>
                </div>
                <div class="breadcrumbs" style="border-left:1px solid #ccc">
                    <ul>
                        <li class="active"> <a href="#">基本信息 </a></li>

                        <li> <a href="#">产品特性 </a></li>

                        <li> <a href="#">产品描述 </a></li>

                        <li> <a href="#">产品相册 </a></li>

                        <!-- <li> <a href="#">旅游联票号 </a></li> -->
                    </ul>
                    <!-- .breadcrumb -->
                </div>
                <div>
                    <form action="/index.php/Admin/Product/tianjia" method="post" enctype="multipart/form-data" class="form-horizontal" id="form">
                        <div class="formblock">
                            <div class="form-group">
                                <label class="control-label">产品名称 : </label>
                                <div class="controls pull-left" style="padding-top:3px">
                                    <input type="text" name="pdt_name" value="<?php echo ($set["pdt_name"]); ?>" class="input-large">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label">产品分类 : </label>
                                <div class="controls pull-left">
                                    <select class="input-medium" name="type_id">
                                        <option value='0'>请选择分类</option>
                                        <?php if(is_array($typelist)): foreach($typelist as $key=>$v): ?><option value='<?php echo ($v["type_id"]); ?>' style="color:black"><?php echo ($v["type_name"]); ?></option><?php endforeach; endif; ?>
                                    </select>
                                    <span class="help-inline red"> * </span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label">产品图片 : </label>
                                <div class="controls pull-left" style="position:relative;width:100px;height:100px;text-align:center;overflow:hidden;margin-top:5px">
                                    <input style="width:100%;height:100%;position:absolute;right:0;top:0;opacity:0;" type="file" class="input-large" id="logo" name="logo" >
                                    <div id="pic_div" style="background:url('<?php echo (IMG_URL); ?>selectpic.png') center 12px no-repeat;"><img id='pic_img' src='' width='100' height='100'></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label">是否显示 : </label>
                                <div class="controls pull-left" style="padding-top:6px">
                                    <label>
                                        <input type="radio" class="ace" name="is_show" checked="checked" value="1">
                                        <span class="lbl">是</span>
                                    </label>
                                    <label>
                                        <input type="radio" class="ace" name="is_show" value="0">
                                        <span class="lbl">否</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="formblock" style="display:none">
                            <div class="form-group">
                                <label class="control-label">产品特性1 : </label>
                                <div class="controls pull-left" style="padding-top:3px">
                                    <input type="text" name="features[]" value="<?php echo ($set["features"]); ?>" class="input-large">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label">产品特性2 : </label>
                                <div class="controls pull-left" style="padding-top:3px">
                                    <input type="text" name="features[]" value="<?php echo ($set["features"]); ?>" class="input-large">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label">产品特性3 : </label>
                                <div class="controls pull-left" style="padding-top:3px">
                                    <input type="text" name="features[]" value="<?php echo ($set["features"]); ?>" class="input-large">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label">产品特性4 : </label>
                                <div class="controls pull-left" style="padding-top:3px">
                                    <input type="text" name="features[]" value="<?php echo ($set["features"]); ?>" class="input-large">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label">产品特性5 : </label>
                                <div class="controls pull-left" style="padding-top:3px">
                                    <input type="text" name="features[]" value="<?php echo ($set["features"]); ?>" class="input-large">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label">产品特性6 : </label>
                                <div class="controls pull-left" style="padding-top:3px">
                                    <input type="text" name="features[]" value="<?php echo ($set["features"]); ?>" class="input-large">
                                </div>
                            </div>
                        </div>
                        <div class="formblock" style="display:none">
                            <div class="form-group">
                                <div class="controls pull-left" style="padding-top:10px">
                                    <textarea rows="5" cols="30" id='introduce' name='introduce' style='width:850px;height:350px;'></textarea>
                                </div>
                            </div>
                            <script type="text/javascript">
                                var ue = UE.getEditor('introduce',{toolbars: [[
                                            'fullscreen', 'source', '|', 'undo', 'redo', '|',
                                    'bold', 'italic', 'underline', 'fontborder', 'strikethrough', 'superscript', 'subscript', 'removeformat', 'formatmatch', 'pasteplain', '|', 'forecolor', 'backcolor', 'selectall', 'cleardoc', '|',
                                    'rowspacingtop', 'rowspacingbottom', 'lineheight', '|',
                                    'customstyle', 'paragraph', 'fontfamily', 'fontsize', '|',
                                    'directionalityltr', 'directionalityrtl', 'indent', '|',
                                    'justifyleft', 'justifycenter', 'justifyright', 'justifyjustify', '|', 'touppercase', 'tolowercase', '|',
                                    'link', 'unlink', '|', 'imagenone', 'imageleft', 'imageright', 'imagecenter', '|',
                                    'simpleupload', 'insertimage','insertvideo', 'insertframe',  'attachment', 'map', 'pagebreak', '|',
                                    'horizontal', 'date', 'time', 'spechars', '|',
                                    'inserttable', 'deletetable', 'insertparagraphbeforetable', 'insertrow', 'deleterow', 'insertcol', 'deletecol', 'mergecells', 'mergeright', 'mergedown', 'splittocells', 'splittorows', 'splittocols', 'charts', '|',
                                     'preview', 'searchreplace', 'drafts'
                                ]]});
                            </script>
                        </div>
                        <div class="formblock" style="display:none">
                            <div class="controls pull-left" style="position:relative;width:100px;height:100px;text-align:center;overflow:hidden;margin-right:5px">
                                <input style="width:100%;height:100%;position:absolute;right:0;top:0;opacity:0;" type="file" class="input-large" id="picture0" name="url[]" >
                                <div id="pic_div0" style="background:url('<?php echo (IMG_URL); ?>selectpic.png') center 12px no-repeat;"><img width="100" height="100" id='pic_img0' src=''">
                                </div>
                            </div>
                            <div class="controls pull-left" onclick="addinput(this)">
                                <div><img id='pic_img' src='<?php echo (IMG_URL); ?>plus.png'></div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!--/.box-->
    </div><!-- /.page-content -->
</div><!-- /.main-content -->
<script type="text/javascript">
    var counter = 0;
    function removeinput(_this){
        $(_this).parent().remove();
    }
    function addinput(_this){
        counter++;
        $(_this).before('<div class="controls pull-left" style="position:relative;width:100px;height:100px;text-align:center;overflow:hidden;margin-right:5px"><input style="width:100%;height:100%;position:absolute;right:0;top;0;opacity:0;" type="file" class="input-large" id="picture'+counter+'" name="url[]" ><span style="position:absolute;right:0;top;0;color:red;text-align:center;width:20px;height:20px;line-height:20px;border:1px solid #ccc;cursor:pointer" onclick="removeinput(this)">X</span><div id="pic_div'+counter+'" style="background:url(\'/Public/Admin/images/selectpic.png\') center 12px no-repeat;"><img width="100" height="100" id="pic_img'+counter+'" src=""></div></div>');
        new uploadPreview({ UpBtn: "picture"+counter, DivShow: "pic_div"+counter, ImgShow: "pic_img"+counter });
    }
    $(function(){
        new uploadPreview({ UpBtn: "logo", DivShow: "pic_div", ImgShow: "pic_img" });
        new uploadPreview({ UpBtn: "picture0", DivShow: "pic_div0", ImgShow: "pic_img0" });
        $(".breadcrumbs ul li").click(function(){
            $(this).addClass("active").siblings().removeClass('active');
            $(".formblock").eq($(this).index()).css("display","block").siblings().css("display","none");
        })
        $("#bsubmit").click(function(){
            $("#form").submit();
        })
    })
</script>


    </div><!-- /.main-container-inner -->
</div><!-- /.main-container -->


<script src='<?php echo (JS_URL); ?>jquery-2.1.3.min.js'></script>
<script type="text/javascript">
    $('.subli').parent().parent().addClass("active open");
</script>
<script src="<?php echo (JS_URL); ?>ace-extra.min.js"></script>
<script src="<?php echo (JS_URL); ?>bootstrap.min.js"></script>
<script src="<?php echo (JS_URL); ?>ace.min.js"></script>
</body>
</html>