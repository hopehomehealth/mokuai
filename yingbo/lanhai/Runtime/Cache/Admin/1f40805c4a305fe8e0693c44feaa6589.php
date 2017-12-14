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
    .putong{display:inline-block;border:1px solid gray;color:gray;padding:1px;border-radius:2px}
    .zhiding{border:1px solid #53f753;color:#53f753;}
    .jiajing{border:1px solid orange;color:orange;}
    .xintie{border:1px solid red;color:red;}
    .technorati li{float:left;}
</style>
<div class="main-content">
    <div class="page-content">
        <div class="row">
            <div class="page-content box">
                <div class="box-title margin_bot_20">
                    <div class="span10">
                        <h3><i class="icon-magic"></i>帖子管理</h3>
                    </div>
                </div>
                <form class="form-horizontal" method="get" action="/index.php/Admin/Posts/showlist">
                  <div class="form-group">
                    <label class="control-label"  style="padding-top:0; margin-right:10px;">
                        <select class="input-medium" name="board_id" style="outline:none;height:34px">
                                <option value='0'>-请选择板块-</option>
                                <?php if(is_array($boards)): foreach($boards as $key=>$bd): if($bd["pid"] == 0): ?><option style="font-weight:bold;color:#ccc" disabled="disabled" value='<?php echo ($bd["board_id"]); ?>'><?php echo ($bd["board_title"]); ?></option>
                                    <?php else: ?>
                                        <option style="color:#333;" value='<?php echo ($bd["board_id"]); ?>'><?php echo ($bd["board_title"]); ?></option><?php endif; endforeach; endif; ?>
                        </select>
                    </label>
                    <div class="controls pull-left">
                      <button type="submit" class="btn btn-sm btn-primary">搜索</button>
                    </div>
                  </div>
                </form>
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                    <tr>
                        <th width="3%"></th>
                        <th width="10%">帖子名称</th>
                        <th width="10%">版块</th>
                        <th width="10%">发帖人</th>
                        <th width="5%">回复</th>
                        <th width="5%">浏览</th>
                        <th width="10%">发帖日期</th>
                        <th width="5%">状态</th>
                        <th width="20%">操作</th>
                    </tr></thead>
                    <tbody>
                    <form action="/index.php/Admin/Posts/dorecycle" method="post" id="batches">
                    <?php if(is_array($posts)): foreach($posts as $key=>$post): ?><tr>
                        <td><input type="checkbox" name="post_id[]" value="<?php echo ($post["post_id"]); ?>"></td>
                        <td><?php echo ($post["topic"]); ?></td>
                        <td><?php echo ($post["board_title"]); ?></td>
                        <td><?php echo ($post["username"]); ?></td>
                        <td><?php echo ($post["replys"]); ?></td>
                        <td><?php echo ($post["views"]); ?></td>
                        <td><?php echo (date("Y-m-d H:i:s",$post["ctime"])); ?></td>
                        <td class="posttype">
                            <?php if($post["sort"] == '3'): ?><span class="putong zhiding">置顶</span><?php endif; if($post["sort"] == '2'): ?><span class="putong jiajing">精华</span><?php endif; if($post["sort"] == 1): ?><span class="putong xintie">新帖</span><?php endif; if($post["sort"] == '0'): ?><span class="putong">普通</span><?php endif; ?>
                        </td>
                        <td style="text-align:right">
                            <div class="visible-md visible-lg hidden-sm hidden-xs action-buttons">
                                <a class="oppost" postid="<?php echo ($post["post_id"]); ?>" sort="<?php echo ($post["sort"]); ?>" sorttype="3" href="javascript:void(0)"><?php if($post["sort"] != '3'): ?>置顶<?php else: ?> 取消置顶<?php endif; ?></a>
                                <a class="oppost" postid="<?php echo ($post["post_id"]); ?>" sort="<?php echo ($post["sort"]); ?>" sorttype="2" href="javascript:void(0)"><?php if($post["sort"] != '2'): ?>加精<?php else: ?> 取消加精<?php endif; ?></a>
                                <a class="oppost" postid="<?php echo ($post["post_id"]); ?>" sort="<?php echo ($post["sort"]); ?>" sorttype="1" href="javascript:void(0)"><?php if($post["sort"] != '1'): ?>新帖<?php else: ?> 取消新帖<?php endif; ?></a>
                                <a class="dorecycle" onclick="return false" href="/index.php/Admin/Posts/dorecycle/post_id/<?php echo ($post["post_id"]); ?>" class="red detail"> <i class="icon-trash bigger-130"></i>&nbsp;回收站</a>
                            </div>
                        </td>
                    </tr><?php endforeach; endif; ?>
                    <tr>
                        <input type="hidden" name="sorttype" value="">
                        <input type="hidden" name="p" value="<?php echo ($_GET['p']); ?>">
                        <td style="border-right:none"><input type="checkbox" name="all"></td><td style="text-align:left;border-left:none" colspan=8>全选&nbsp;&nbsp;<a class="batches" href="javascript:void(0)" sorttype="3">置顶</a>&nbsp;&nbsp;<a class="batches" href="javascript:void(0)" sorttype="2">加精</a>&nbsp;&nbsp;<a class="batches" href="javascript:void(0)" sorttype="1">新帖</a>&nbsp;&nbsp;<a class="batches" href="javascript:void(0)" sorttype="0">普通</a>&nbsp;&nbsp;<a class="batchesdel" href="javascript:void(0)" class="red detail"> <i class="icon-trash bigger-130"></i>&nbsp;回收站</a>&nbsp;&nbsp;(批量操作)</td>
                    </tr>
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
                        //取消操作
                        thisobj.attr('sort',0).siblings('.oppost').each(function(){
                            $(this).attr('sort',0);
                        })
                        thisobj.text(thisobj.text().replace('取消',''));
                        thisobj.parent().parent().parent().children('.posttype').children('span').attr('class','').addClass('putong').text('普通');
                    }else if(data.type == 2){
                        thisobj.attr('sort',sorttype).siblings('.oppost').each(function(){
                            $(this).attr('sort',sorttype);
                            $(this).text($(this).text().replace('取消',''));
                        })  
                        thisobj.text(' 取消'+thisobj.text().replace(/^\s+/g,''));
                        if(sorttype == 1){
                            thisobj.parent().parent().parent().children('.posttype').children('span').attr('class','').addClass('putong xintie').text('新帖');
                        }else if(sorttype == 2){
                            thisobj.parent().parent().parent().children('.posttype').children('span').attr('class','').addClass('putong jiajing').text('加精');
                        }else if(sorttype == 3){
                            thisobj.parent().parent().parent().children('.posttype').children('span').attr('class','').addClass('putong zhiding').text('置顶');
                        }
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