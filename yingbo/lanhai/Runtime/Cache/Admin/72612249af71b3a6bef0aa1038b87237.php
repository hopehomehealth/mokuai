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
                        <h3><i class="icon-magic"></i>回复管理</h3>
                    </div>
                </div>
                <form class="form-horizontal" method="get" action="/index.php/Admin/Reply/showlist">
                  <div class="form-group">
                    <label class="control-label" style="width:auto;line-height:28px;padding-top:0">帖子名： </label>        
                    <div class="controls pull-left">
                      <input type="text" class="input-medium" name="search" value="<?php echo ($_GET['serach']); ?>">
                      <button type="submit" class="btn btn-sm btn-primary">搜索</button>
                    </div>
                  </div>
                </form>
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                    <tr>
                        <th width="5%">编号</th>
                        <th width="10%">帖子名称</th>
                        <th width="8%">版块</th>
                        <th width="8%">发帖人</th>
                        <th width="100px">图像</th>
                        <th width="5%">回复</th>
                        <th width="10%">发帖日期</th>
                        <th width="10%">操作</th>
                    </tr></thead>
                    <tbody>
                    <form action="/index.php/Admin/Posts/dorecycle" method="post" id="batches">
                    <?php if(is_array($posts)): foreach($posts as $key=>$post): ?><tr>
                        <td><?php echo ($No1++); ?></td>
                        <td><?php echo ($post["topic"]); ?></td>
                        <td><?php echo ($post["board_title"]); ?></td>
                        <td><?php echo ($post["username"]); ?></td>
                        <td><div style="display:inline-block;width:50px;height:50px;overflow:hidden"><img style="width:50px" src="<?php echo ($post["userhead"]); ?>"></div></td>
                        <td><?php echo ($post["replys"]); ?></td>
                        <td><?php echo (date("Y-m-d H:i:s",$post["ctime"])); ?></td>
                        <td>
                            <div class="visible-md visible-lg hidden-sm hidden-xs action-buttons">
                                <a class="oppost" postid="<?php echo ($post["post_id"]); ?>" sort="<?php echo ($post["sort"]); ?>" sorttype="3" href="/index.php/Admin/Reply/reply/post_id/<?php echo ($post["post_id"]); ?>">查看全部回复</a>
                            </div>
                        </td>
                    </tr><?php endforeach; endif; ?>
                    </form>
                    </tbody>
                </table>
                <div class="technorati"><?php echo ($page); ?></div>
            </div>
        </div>
        <!--/.box-->
    </div><!-- /.page-content -->
</div><!-- /.main-content -->
<script src='<?php echo (JS_URL); ?>jquery-2.1.3.min.js'></script>
<script type="text/javascript">
    $(function(){
        //批量放入回收站操作
        $(".batchesdel").click(function(){
            if($("input[name='post_id[]']:checked").length >= 1){
                $("#batches").attr("action","/index.php/Admin/Posts/dorecycle");
                $("#batches").submit();
            }else{
                alert('请选择操作对象');
            }
        })
        //批量帖子操作
        $(".batches").click(function(){
            var thisobj = $(this);
            if($("input[name='post_id[]']:checked").length >= 1){
                $("input[name='sorttype']").val(thisobj.attr('sorttype'));
                $("#batches").attr("action","/index.php/Admin/Posts/sort");
                $("#batches").submit();
            }else{
                alert('请选择操作对象');
            }
        })
        //单个放入回收站操作
        $(".dorecycle").click(function(){
            var thisobj = $(this);
            $.get($(this).attr('href'),function(data){
                if(data.error == 0){
                    thisobj.parent().parent().parent().remove();
                    alert('已成功放入回收站');
                }
            })
        })
        //单个帖子操作
        $(".oppost").click(function(){
            var thisobj = $(this);
            var post_id = $(this).attr('postid');
            var sort = $(this).attr('sort');
            var sorttype = $(this).attr('sorttype');
            $.get("/index.php/Admin/Posts/sort",{'post_id':post_id,'sort':sort,'sorttype':sorttype},function(data){
                if(data.error == 0){
                    if(data.type == 1){
                        thisobj.attr('sort',0).siblings('.oppost').each(function(){
                            $(this).attr('sort',0);
                        })
                        thisobj.text(thisobj.text().replace('取消',''));
                    }else if(data.type == 2){
                        thisobj.text(thisobj.text().replace('取消',''));
                        thisobj.attr('sort',sorttype).siblings('.oppost').each(function(){
                            $(this).attr('sort',sorttype);
                            $(this).text($(this).text().replace('取消',''));
                        })   
                        thisobj.text(' 取消'+thisobj.text().replace(/^\s+/g,''));
                    }     
                }
            })
        })
        //全部选中取消选中操作
        $("input[name='all']").click(function(){
            var ischeck = $(this).prop('checked');
            if(ischeck){
                $("input[name='post_id[]']").prop('checked',true);
            }else{
                $("input[name='post_id[]']").prop('checked',false);
            }
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