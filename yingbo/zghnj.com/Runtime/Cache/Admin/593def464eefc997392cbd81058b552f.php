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
                        <h3><i class="icon-cogs"></i>基本设置</h3>
                    </div>
                </div>
                <div style="margin-top:15px">
                    <form action="/index.php/Admin/Set/config" method="post" enctype="multipart/form-data" class="form-horizontal">
                        <div class="form-group">
                            <label class="control-label">网站名 : </label>
                            <div class="controls pull-left" style="padding-top:3px">
                                <input type="text" name="name" value="<?php echo ($set["name"]); ?>" class="input-large">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label">网站备案 : </label>
                            <div class="controls pull-left" style="padding-top:3px">
                                <input type="text" name="records" value="<?php echo ($set["records"]); ?>" class="input-large" style="width:400px">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label">网站关键词 : </label>
                            <div class="controls pull-left" style="padding-top:3px">
                                <input type="text" name="keywords" value="<?php echo ($set["keywords"]); ?>" class="input-large" style="width:400px">
                                <span class="help-inline red"> 多个关键字请用逗号或空格分开 </span> </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label">网站描述 : </label>
                            <div class="controls pull-left" style="padding-top:3px">
                                <textarea name="description" style="width:400px;height:100px"><?php echo ($set["description"]); ?></textarea>
                                <span class="help-inline red"> 请输入50~100字的描述 </span> </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label">公司名称 : </label>
                            <div class="controls pull-left" style="padding-top:3px">
                                <input type="text" name="company" value="<?php echo ($set["company"]); ?>" class="input-large">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label">地址 : </label>
                            <div class="controls pull-left" style="padding-top:3px">
                                <input type="text" name="address" value="<?php echo ($set["address"]); ?>" class="input-large">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label">联系人 : </label>
                            <div class="controls pull-left" style="padding-top:3px">
                                <input type="text" name="linkman" value="<?php echo ($set["linkman"]); ?>" class="input-large">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label">联系电话 : </label>
                            <div class="controls pull-left" style="padding-top:3px">
                                <input type="text" name="linkphone" value="<?php echo ($set["linkphone"]); ?>" class="input-large">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label">用户使用协议 : </label>
                            <div class="controls pull-left">
                                <textarea rows="5" cols="30" id='protocol' name='protocol' style='width:850px;height:350px;'><?php echo ($set["protocol"]); ?></textarea>
                            </div>
                        </div>


                        <script type="text/javascript">
                            var ue = UE.getEditor('protocol',{toolbars: [[
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
                        <div class="form-group">
                            <label class="control-label">网站二维码 : </label>
                            <div class="controls pull-left" style="padding-top:3px">
                                <input type="file" class="input-large" id="logo" name="logo" >
                                <div id="pic_div"><img id='pic_img' src='<?php echo (SITE_URL); echo ($set["logo"]); ?>' onerror="this.src='<?php echo (IMG_URL); ?>imgerror.png'"></div>
                            </div>
                        </div>
                        <script type='text/javascript'>
                            $(function(){
                                new uploadPreview({ UpBtn: "logo", DivShow: "pic_div", ImgShow: "pic_img" });
                            });
                        </script>
                        <!-- <div class="form-group">
                            <label class="control-label">平台描述 : </label>
                            <div class="controls pull-left" style="padding-top:3px">
                                <textarea class="input-large" name="description" style="margin: 0px; height: 115px; width: 530px;"><?php echo ($set["description"]); ?></textarea>
                                <span class="help-inline"> 请输入不超过 20 字符. </span> </div>
                        </div> -->
                        <div>
                            <label class="control-label"> </label>
                            <input type="hidden" name="setid" value="<?php echo ($set["id"]); ?>">
                            <button id="bsubmit1" type="submit"  class="btn btn-sm btn-primary">保存</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!--/.box-->
    </div><!-- /.page-content -->
</div><!-- /.main-content -->

<script type="text/javascript">
    $(function(){
        $(".breadcrumbs ul li").click(function(){
            $(this).addClass("active").siblings().removeClass('active');
            $("form").eq($(this).index()).css("display","block").siblings().css("display","none");
        })
        $("#addbtn").click(function(){
            $(".option:last").after("<span class='option' style='float:left;margin-bottom:5px'><input type='text' name='pct_checkout[]' value='' class='input-small'><i class='icon-remove red' onClick='$(this).parent().remove()'></i></span>");
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