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
        
        <style type="text/css">
    .technorati li{float:left;}
</style>
<div class="main-content">
    <div class="page-content">
        <div class="row">
            <div class="page-content box">
                <div class="box-title margin_bot_20">
                    <div class="span10">
                        <h3><i class="icon-magic"></i>评论列表</h3>
                    </div>
                </div>
                <form class="form-horizontal" method="get" action="/index.php/Admin/Famous/comments/sland_id/<?php echo ($_GET['sland_id']); ?>">
                  <div class="form-group">
                    <label class="control-label" style="width:auto;line-height:28px;padding-top:0">评论人： </label>        
                    <div class="controls pull-left">
                      <input type="text" class="input-medium" name="search" value="<?php echo ($_GET['serach']); ?>">
                      <button type="submit" class="btn btn-sm btn-primary">搜索</button>
                    </div>
                  </div>
                </form>
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                    <tr><th width="5%">序号</th>
                        <th width="8%">文章标题</th>
                        <th width="8%">评论人</th>
                        <th width="100px">图像</th>
                        <th width="20%">评论内容</th>
                        <th width="8%">评论时间</th>
                        <th width="5%">显示</th>
                        <th width="8%">操作</th>
                    </tr></thead>
                    <tbody>
                    <?php if(is_array($comments)): foreach($comments as $key=>$info): ?><tr>
                        <td><?php echo ($No1++); ?></td>
                        <td><?php echo ($info["title"]); ?></td>
                        <td><?php echo ($info["username"]); ?></td>
                        <td><div style="display:inline-block;width:50px;height:50px;overflow:hidden"><img style="width:50px" src="<?php echo ($info["userhead"]); ?>"></div></td>
                        <td><?php echo ($info["content"]); ?></td>
                        <td><?php echo (date("Y-m-d H:i",$info["add_time"])); ?></td>
                        <td class="display-status">
                        <?php if($info["display"] == '1'): ?><i class="icon-ok bigger-130 green"></i>
                        <?php else: ?>
                            <i class="icon-remove bigger-130 red"></i><?php endif; ?>
                        </td>
                        <td>
                            <div class="visible-md visible-lg hidden-sm hidden-xs action-buttons">
                                <a href="javascript:void(0)" class="display" comid="<?php echo ($info["com_id"]); ?>" isdisplay="<?php echo ($info["display"]); ?>" class="green"><?php if($info["display"] == '1'): ?>隐藏<?php else: ?>显示<?php endif; ?> </a>
                                
                                <a href="/index.php/Admin/Famous/del/com_id/<?php echo ($info["com_id"]); ?>" class="red detail" onclick="return confirm('确定要删除吗')"> <i class="icon-remove bigger-130"></i>&nbsp;删除 </a>
                            </div>
                        </td>
                    </tr><?php endforeach; endif; ?>
                    </tbody>
                </table>
                <div class="technorati"><?php echo ($page); ?></div>
            </div>
        </div>
        <!--/.box-->
    </div>
    <!-- /.page-content -->
</div><!-- /.main-content -->
<script src='<?php echo (JS_URL); ?>jquery-2.1.3.min.js'></script>
<script type="text/javascript">
$(function(){
    $(".display").click(function(){
        var thisobj = $(this);
        var display = $(this).attr('isdisplay');
        var comid = $(this).attr('comid');
        $.post("/index.php/Admin/Famous/isdisplay",{'display':display,'com_id':comid},function(data){
            if(data == 'success'){
                if(display == 1){
                    thisobj.text('显示');
                    thisobj.attr('isdisplay',0);
                    thisobj.parent().parent().parent().children('.display-status').children('i').attr('class','').addClass("icon-remove bigger-130 red");
                }
                if(display == 0){
                    thisobj.text('隐藏');
                    thisobj.attr('isdisplay',1);
                    thisobj.parent().parent().parent().children('.display-status').children('i').attr('class','').addClass("icon-ok bigger-130 green");
                }
            }
        })
    })
})
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