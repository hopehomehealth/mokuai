<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>蓝海长青后台管理系统</title>
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="<?php echo (CSS_URL); ?>bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="<?php echo (CSS_URL); ?>font-awesome.min.css" />
    <link rel="stylesheet" href="<?php echo (CSS_URL); ?>ace.min.css" />
    <link rel="stylesheet" href="<?php echo (CSS_URL); ?>page.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo (CSS_URL); ?>style.css">

</head>
<body>
<div class="navbar navbar-default">
    <div class="navbar-container">
        <div class="navbar-header pull-left">
            <a href="#" class="navbar-brand">
                <small>蓝海长青管理后台 </small>
            </a>
        </div><!-- /.navbar-header -->
        <div class="navbar-header pull-right">
            <ul class="nav ace-nav">
                <li >
                    <a data-toggle="dropdown" href="#" class="dropdown-toggle">
                        <i class="icon-user bigger-140"></i><?php echo (session('admin_name')); ?>
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
                    <a href="<?php echo U('Manager/logout');?>" target="_top"
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
                                <e><img src="<?php echo (IMG_URL); ?>tb.png" alt="" style="padding-left: 6px;padding-right: 6px;"/></e>
                                <span class="menu-text"><?php echo ($v["auth_name"]); ?></span>
                            </a>         
                        </li>
                    <?php elseif(($v["auth_a"] == '') AND ($v["auth_c"] == '')): ?>
                        <li>
                            <a class="dropdown-toggle">
                                <e><img src="<?php echo (IMG_URL); ?>tb.png" alt="" style="padding-left: 6px;padding-right: 6px;"/></e>
                                <span class="menu-text"><?php echo ($v["auth_name"]); ?> </span>
                                <b class="arrow icon-angle-down"></b>
                            </a>
                            <ul class="submenu">
                                <?php if(is_array($auth_infoB)): foreach($auth_infoB as $key=>$vv): if(($vv["auth_pid"]) == $v["auth_id"]): ?><li <?php if((CONTROLLER_NAME == $vv['auth_c']) AND (ACTION_NAME == $vv['auth_a'])): ?>class="active"<?php endif; ?>>
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
        
        

<script type="text/javascript" src='<?php echo (PLUGIN_URL); ?>ueditor/ueditor.config.js' ></script>
<script type="text/javascript" src='<?php echo (PLUGIN_URL); ?>ueditor/ueditor.all.min.js' ></script>
<script type="text/javascript" src='<?php echo (PLUGIN_URL); ?>ueditor/lang/zh-cn/zh-cn.js' ></script>

<div class="main-content">

    <div class="page-content">
        <div class="row">
            <div class="page-content box">
                <div class="box-title margin_bot_20">
                    <div class="span10">
                        <h3><i class="icon-magic"></i>法规政策修改</h3>
                    </div>
                </div>

                <form action="/index.php/Admin/Fagui/upd/news_id/805.html" method="post" class="form-horizontal" enctype="multipart/form-data">
                    <input type='hidden' id='extlanids' value='<?php echo ($extlanids); ?>' />
                    <input type='hidden' name='news_id' value='<?php echo ($info["news_id"]); ?>' />
<input type='hidden' name='lan_id' value='31' />
                    <div class="form-group">
                        <label class="control-label">标题 : </label>
                        <div class="controls pull-left">
                            <input type="text" class="input-large" name="news_title" value="<?php echo ($info["news_title"]); ?>">
                            <span class="help-inline red"> * </span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">作者 : </label>
                        <div class="controls pull-left">
                            <input type="text" class="input-large" name="author" value="<?php echo ($info["author"]); ?>">
                            <span class="help-inline red"> * </span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">关键字 : </label>
                        <div class="controls pull-left">
                            <input type="text" class="input-large" name="keyword" value="<?php echo ($info["keyword"]); ?>">
                            <span class="help-inline red"> * </span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">外部链接url : </label>
                        <div class="controls pull-left">
                            <input type="text" class="input-large" name="url" value="<?php echo ($info["url"]); ?>">
                            <span class="help-inline red"> * 注：必须以http://或https://开头  例如：http://www.hlnv.com</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">类别 : </label>
                        <div class="controls pull-left">
                            <select name='cat_id'>
                                <option value='0'>-请选择-</option>
                                <?php if(is_array($catinfo)): foreach($catinfo as $key=>$v): ?><option value="<?php echo ($v["cat_id"]); ?>"
                                    <?php if(($info["cat_id"]) == $v["cat_id"]): ?>selected='selected'<?php endif; ?>
                                    ><?php echo ($v["name"]); ?></option><?php endforeach; endif; ?>
                            </select>
                            <span class="help-inline red"> * </span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">是否展示 : </label>
                        <div class="controls pull-left">
                            <label>
                                <input type="radio" class="ace" name="is_show" value="0" <?php if($info["is_show"] == 0): ?>checked="checked"<?php endif; ?> >
                                <span class="lbl">是</span>
                            </label>
                            <label>
                                <input type="radio" class="ace" name="is_show" value="1"<?php if($info["is_show"] == 1): ?>checked="checked"<?php endif; ?> >
                                <span class="lbl">否</span>
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">是否推荐 : </label>
                        <div class="controls pull-left">
                            <label>
                                <input type="radio" class="ace" name="is_tui" value="0" <?php if($info["is_tui"] == 0): ?>checked="checked"<?php endif; ?> >
                                <span class="lbl">是</span>
                            </label>
                            <label>
                                <input type="radio" class="ace" name="is_tui" value="1"<?php if($info["is_tui"] == 1): ?>checked="checked"<?php endif; ?> >
                                <span class="lbl">否</span>
                            </label>
                        </div>
                    </div>
					 <div class="form-group">
            <label class="control-label">添加日期 : </label>
            <div class="controls pull-left">
                <input name="add_time" type="text" readonly value="<?php echo ($info["add_time"]); ?>" class="input-large" id="date"  />
                <span class="help-inline red" > * 点击框内选择日期</span>
            </div>
        </div>
         <script type="text/javascript" src="<?php echo (JS_URL); ?>date/laydate.js"></script>
         <script type="text/javascript">
    laydate({
            elem: '#date',
            istime: true,
            format: 'YYYY-MM-DD hh:mm:ss',
        });
</script>
                 
                    <div class="form-group">
                        <label class="control-label">描　　述 : </label>
                        <div class="controls pull-left">
                            <textarea class="input-large" style="margin: 0px; height: 115px; width: 530px;" name="description"><?php echo ($info["description"]); ?></textarea>
                        </div>
                    </div>
                  
                    <div class="form-group">
                        <label class="control-label">内容 : </label>
                        <div class="controls pull-left">
                           <span class="help-inline red"> *   图片宽度不大于720px</span>
                            <textarea rows="5" cols="30" id='content' name='content' style='width:850px;height:350px;'><?php echo ($info["content"]); ?></textarea>
                        </div>
                    </div>



                    <div>
                        <span class="help-inline red"> * 广告选择</span>
                        <div class="form-group">
                            <label class="control-label">顶部广告 : </label>
                            <div class="controls pull-left">
                                <select id='ding' name='ding'>
                                    <option value='0'>-请选择-</option>
                                    <?php if(is_array($dinginfo)): foreach($dinginfo as $key=>$v): ?><option value="<?php echo ($v["banner_id"]); ?>" <?php if(($info["ding"]) == $v["banner_id"]): ?>selected='selected'<?php endif; ?>><?php echo ($v["banner_title"]); ?></option><?php endforeach; endif; ?>
                                </select>
                                <span class="help-inline red"> * </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label">右下广告一 : </label>
                            <div class="controls pull-left">
                                <select id='youyi' name='youyi'>
                                    <option value='0'>-请选择-</option>
                                    <?php if(is_array($youyiinfo)): foreach($youyiinfo as $key=>$v): ?><option value="<?php echo ($v["banner_id"]); ?>" <?php if(($info["youyi"]) == $v["banner_id"]): ?>selected='selected'<?php endif; ?>><?php echo ($v["banner_title"]); ?></option><?php endforeach; endif; ?>
                                </select>
                                <span class="help-inline red"> * </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label">右下广告二 : </label>
                            <div class="controls pull-left">
                                <select id='youer' name='youer'>
                                    <option value='0'>-请选择-</option>
                                    <?php if(is_array($youerinfo)): foreach($youerinfo as $key=>$v): ?><option value="<?php echo ($v["banner_id"]); ?>" <?php if(($info["youer"]) == $v["banner_id"]): ?>selected='selected'<?php endif; ?>><?php echo ($v["banner_title"]); ?></option><?php endforeach; endif; ?>
                                </select>
                                <span class="help-inline red"> * </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label">右下广告三 : </label>
                            <div class="controls pull-left">
                                <select id='yousan' name='yousan'>
                                    <option value='0'>-请选择-</option>
                                    <?php if(is_array($yousaninfo)): foreach($yousaninfo as $key=>$v): ?><option value="<?php echo ($v["banner_id"]); ?>" <?php if(($info["yousan"]) == $v["banner_id"]): ?>selected='selected'<?php endif; ?>><?php echo ($v["banner_title"]); ?></option><?php endforeach; endif; ?>
                                </select>
                                <span class="help-inline red"> * </span>
                            </div>
                        </div>
                    </div>
                    <div>
                        <label class="control-label"></label>
                        <button id="bsubmit" type="submit"  class="btn btn-sm btn-primary">保存</button>
                    </div>
                </form>
            </div>
        </div>
        <!--/.box-->
    </div><!-- /.page-content -->
</div><!-- /.main-content -->

                    <script type="text/javascript">
                        var ue = UE.getEditor('content',{toolbars: [[
                      'fullscreen', 'source', '|', 'undo', 'redo', '|',
            'bold', 'italic', 'underline', 'fontborder', 'strikethrough', 'superscript', 'subscript', 'removeformat', 'formatmatch', 'pasteplain', '|', 'forecolor', 'backcolor', 'selectall', 'cleardoc', '|',
            'rowspacingtop', 'rowspacingbottom', 'lineheight', '|',
            'customstyle', 'paragraph', 'fontfamily', 'fontsize', '|',
            'directionalityltr', 'directionalityrtl', 'indent', '|',
            'justifyleft', 'justifycenter', 'justifyright', 'justifyjustify', '|', 'touppercase', 'tolowercase', '|',
            'link', 'unlink', '|', 'imagenone', 'imageleft', 'imageright', 'imagecenter', '|',
            'simpleupload', 'insertimage', 'emotion', 'scrawl', 'insertvideo', 'attachment', 'map', 'insertframe', 'pagebreak', '|',
            'horizontal', 'date', 'time', 'spechars', '|',
            'inserttable', 'deletetable', 'insertparagraphbeforetable', 'insertrow', 'deleterow', 'insertcol', 'deletecol', 'mergecells', 'mergeright', 'mergedown', 'splittocells', 'splittorows', 'splittocols', 'charts', '|',
            'print', 'preview', 'searchreplace', 'drafts'
                        ]]});
                    </script>







    </div><!-- /.main-container-inner -->
</div><!-- /.main-container -->


<script src='<?php echo (JS_URL); ?>jquery-2.1.3.min.js'></script>
<script type="text/javascript">
    $('.active').parent().parent().addClass("active open");
</script>
<script src="<?php echo (JS_URL); ?>ace-extra.min.js"></script>
<script src="<?php echo (JS_URL); ?>bootstrap.min.js"></script>
<script src="<?php echo (JS_URL); ?>ace.min.js"></script>
</body>
</html>