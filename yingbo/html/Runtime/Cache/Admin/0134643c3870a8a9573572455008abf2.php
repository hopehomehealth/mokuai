<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>乐护后台管理系统</title>
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="<?php echo (CSS_URL); ?>bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="<?php echo (CSS_URL); ?>font-awesome.min.css" />
    <link rel="stylesheet" href="<?php echo (CSS_URL); ?>ace.min.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo (CSS_URL); ?>style.css">
    <link rel="stylesheet" type="text/css" href="<?php echo (CSS_URL); ?>page.css">
    <link rel="stylesheet" type="text/css" href="<?php echo (CSS_URL); ?>calendar.css">
    <link rel="stylesheet" type="text/css" href="<?php echo (CSS_URL); ?>hzw-city-picker.css">
    <link rel="stylesheet" type="text/css" href="<?php echo (CSS_URL); ?>jedate.css">

    <script type="text/javascript" src='<?php echo (JS_URL); ?>jquery-1.7.2.min.js'></script>
    <script type="text/javascript" src="<?php echo (JS_URL); ?>city-data.js"></script>
    <script type="text/javascript" src="<?php echo (JS_URL); ?>hzw-city-picker.min.js"></script>
    <script type="text/javascript" src="<?php echo (JS_URL); ?>calendar.js"></script>
</head>
<body>
<div class="navbar navbar-default">
    <div class="navbar-container">
        <div class="navbar-header pull-left">
            <a href="#" class="navbar-brand">
                <small>乐护后台管理系统 </small>
            </a>
        </div><!-- /.navbar-header -->
        <div class="navbar-header pull-right">
            <ul class="nav ace-nav">
                <li >
                    <a href="#">
                        <i class="icon-user bigger-140"></i><?php echo (session('admin_name')); ?>
                    </a>
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
        <?php if(is_array($auth_infoA)): foreach($auth_infoA as $key=>$v): if(($v["auth_c"] == '') AND ($v["auth_a"] == '')): ?><li <?php if((CONTROLLER_NAME == '') AND (ACTION_NAME == '')): ?>class="open"<?php endif; ?>>
                <a class="dropdown-toggle">
                    <i class="icon-folder-open"></i>
                    <span class="menu-text"><?php echo ($v["auth_name"]); ?> </span>
                    <b class="arrow icon-angle-down"></b>
                </a>
                <ul class="submenu">
                    <?php if(is_array($auth_infoB)): foreach($auth_infoB as $key=>$vv): if(($vv["auth_pid"]) == $v["auth_id"]): ?><li <?php if((CONTROLLER_NAME == $vv['auth_c']) AND (ACTION_NAME == $vv['auth_a'])): ?>class="active open"<?php endif; ?>>
                            <a href="/index.php/Admin/<?php echo ($vv["auth_c"]); ?>/<?php echo ($vv["auth_a"]); ?>">
                                <i class="icon-double-angle-right"></i> <?php echo ($vv["auth_name"]); ?>
                            </a>
                            </li><?php endif; endforeach; endif; ?>
                </ul>
                </li>
                <?php elseif(($v["auth_a"] != '') AND ($v["auth_c"] != '')): ?>


                <li <?php if((CONTROLLER_NAME == $v['auth_c']) AND (ACTION_NAME == $v['auth_a'])): ?>class="active"<?php endif; ?>>
                <a href="/index.php/Admin/<?php echo ($v["auth_c"]); ?>/<?php echo ($v["auth_a"]); ?>" class="dropdown-toggle">
                    <i class="icon-folder-open"></i>
                    <span class="menu-text"><?php echo ($v["auth_name"]); ?> </span>
                </a>
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



        <script type="text/javascript" src='<?php echo (JS_URL); ?>jquery-1.7.2.min.js'></script>
<script type="text/javascript" src='<?php echo (JS_URL); ?>uploadPreview.js'></script>
<div class="main-content">
    <div class="breadcrumbs">
        <ul>
            <li > <a href="/index.php/Admin/Ad/tianjia">添加图片 </a> </li>

        </ul>
        <!-- .breadcrumb -->
    </div>

    <div class="page-content">
        <div class="row">
            <div class="page-content box">
                <form action="/index.php/Admin/Ad/tianjia" method="post" enctype='multipart/form-data' class="form-horizontal">
                    <div class="form-group">
                        <label class="control-label" align="right">标题 : </label>
                        <div class="controls pull-left">
                            <input type="text" class="input-large" name="title">
                            <span class="help-inline red"> * </span>
                        </div>
                    </div>


<script type='text/javascript'>
    function show_col1(){
        var col_id = $('#main_col0').val();
        if(col_id==0){
            $('#ext_col1 option:gt(0)').remove();
            $('#ext_col2 option:gt(0)').remove();
        }else{
            $.ajax({
                url:"/index.php/Admin/Column/getColByPid",
                data:{'col_id':col_id},
                dataType:'json',
                type:'get',
                success:function(msg){
                    var s = "";
                    $.each(msg,function(){
                        s += "<option value='"+this.col_id+"'>--/"+this.name+"</option>";
                    });
                    $('#ext_col1 option:gt(0)').remove();
                    $('#ext_col2 option:gt(0)').remove();
                    $('#ext_col1').append(s);
                }
            });
        }
    }

    function show_col2(){
        var col_id = $('#ext_col1').val();
        if(col_id==0){
            $('#ext_col2 option:gt(0)').remove();
        }else{
            $.ajax({
                url:"/index.php/Admin/Column/getColByPid",
                data:{'col_id':col_id},
                dataType:'json',
                type:'get',
                success:function(msg){
                    var s = "";
                    $.each(msg,function(){
                        s += "<option value='"+this.col_id+"'>--/--/"+this.name+"</option>";
                    });
                    $('#ext_col2 option:gt(0)').remove();
                    $('#ext_col2').append(s);
                }
            });
        }
    }
</script>             
<div class="form-group">
    <label class="control-label" align="right">主栏目 : </label>
    <div align="left" class="controls pull-left">
        <select id='main_col0' name='col_id' onchange='show_col1()'>
            <option value='0'>-请选择-</option>
            <?php if(is_array($colinfoA)): foreach($colinfoA as $key=>$v): ?><option value="<?php echo ($v["col_id"]); ?>"><?php echo ($v["name"]); ?></option><?php endforeach; endif; ?>
        </select>
    </div>
</div>
<div class="form-group">
    <label class="control-label" align="right">扩展栏目 : </label>
    <div align="left" class="controls pull-left">
        <select id='ext_col1' name='col_id1' onchange='show_col2()'>
            <option value="0">-请选择-</option></select>
        <select id='ext_col2' name='col_id2'>
            <option value="0">-请选择-</option></select>
    </div>
</div>
                    <div class="form-group">
                        <label class="control-label" align="right"> 广告图片 : </label>
                        <div class="controls pull-left">
                            <input type="file" class="input-large" id="pic" name="pic" >
                            <div id="pic_div"><img id='pic_img' width='160' height='100'></div>
                        </div>
                    </div>
                    <script type='text/javascript'>
                        $(function(){
                            new uploadPreview({ UpBtn: "pic", DivShow: "pic_div", ImgShow: "pic_img" });
                        });
                    </script>
                    <div class="form-group">
                        <label class="control-label" align="right">链接地址 : </label>
                        <div class="controls pull-left">
                            <input type="text" class="input-large" name="url">
                            <span class="help-inline red"> * </span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">是否显示 : </label>
                        <div class="controls pull-left">
                            <label>
                                <input type="radio" class="ace" name="is_show" value='0' checked="checked">
                                <span class="lbl">是</span>
                            </label>
                            <label>
                                <input type="radio" class="ace" name="is_show" value='1'>
                                <span class="lbl">否</span>
                            </label>
                        </div>
                    </div>
                    <div class="form-actions">
                        <input id="bsubmit" type="submit"  class="btn btn-sm btn-primary" value="保存"/>
                    </div>
                </form>
            </div>
        </div>
        <!--/.box-->
    </div><!-- /.page-content -->
</div><!-- /.main-content -->




    </div><!-- /.main-container-inner -->
</div><!-- /.main-container -->
<script type="text/javascript" src='<?php echo (JS_URL); ?>jquery-1.7.2.min.js'></script>
<script type="text/javascript" src="<?php echo (JS_URL); ?>ace-extra.min.js"></script>
<script type="text/javascript" src="<?php echo (JS_URL); ?>bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo (JS_URL); ?>ace.min.js"></script>
<script type="text/javascript" src="<?php echo (JS_URL); ?>pulic.js"></script>
</body>
</html>