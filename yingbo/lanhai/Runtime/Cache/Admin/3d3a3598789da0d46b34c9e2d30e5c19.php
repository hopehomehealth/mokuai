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
    .tuijian{border:1px solid orange;color:orange;}
    .technorati li{float:left;}
</style>
<div class="main-content">
    <div class="page-content">
        <div class="row">
            <div class="page-content box">
                <div class="box-title margin_bot_20">
                    <div class="span10">
                        <h3><i class="icon-magic"></i>蓝海名家</h3>
                    </div>
                    <div align="right">
                        <a href="<?php echo U('Famous/adduser');?>" class="btn btn-primary btn-sm"><i class="icon-plus"></i>添加人物</a>
                    </div>
                </div>
                <form class="form-horizontal" method="get" action="/index.php/Admin/Famous/showlist">
                  <div class="form-group">
                    <label class="control-label" style="width:auto;line-height:28px;padding-top:0">人物名： </label>        
                    <div class="controls pull-left">
                      <input type="text" class="input-medium" name="search" value="<?php echo ($_GET['serach']); ?>">
                      <button type="submit" class="btn btn-sm btn-primary">搜索</button>
                    </div>
                  </div>
                </form>
                <div class="breadcrumbs">
                    <ul>
                        <li class="active"> <a href="/index.php/Admin/Famous/showlist">名家讲坛</a> </li>
                        <li> <a href="/index.php/Admin/Famous/man">蓝海人物</a> </li>
                    </ul>
                </div>
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                    <tr>
                        <th width="25px"></th>
                        <th width="8%">姓名</th>
                        <th width="8%">图像</th>
                        <th width="8%">类型</th>
                        <th width="8%">省份</th>
                        <th width="8%">文章</th>
                        <th width="8%">关注</th>
                        <th width="8%">首页显示</th>
                        <th width="8%">推荐</th>
                        <th width="25%">操作</th>
                    </tr></thead>
                    <tbody>
                    <form action="/index.php/Admin/Posts/dorecycle" method="post" id="batches">
                    <?php if(is_array($famous)): foreach($famous as $key=>$info): ?><tr>
                        <td><input type="checkbox" name="f_id[]" value="<?php echo ($info["f_id"]); ?>"></td>
                        <td><?php echo ($info["f_name"]); ?></td>
                        <td><div style="width:50px;display:inline-block;height:50px;overflow:hidden"><img style="width:50px;border-radius:50%" src="<?php echo ($info["f_photo"]); ?>"></div></td>
                        <td>名家讲坛</td>
                        <td><?php echo ($info["f_province"]); ?></td>
                        <td><?php echo ($info["f_artnums"]); ?></td>
                        <td><?php echo ($info["f_fans"]); ?></td>
                        <td class="arttype">
                            <?php if($info["is_index"] == 1): ?><span class="green">是</span><?php endif; if($info["is_index"] == '0'): ?><span class="red">否</span><?php endif; ?>
                        </td>
                        <td class="arttype2">
                            <?php if($info["is_tuijian"] == 1): ?><span class="green">是</span><?php endif; if($info["is_tuijian"] == '0'): ?><span class="red">否</span><?php endif; ?>
                        </td>
                        <td>
                            <div class="visible-md visible-lg hidden-sm hidden-xs action-buttons">
                                <a class="green opart2" fid="<?php echo ($info["f_id"]); ?>" istuijian="<?php echo ($info["is_tuijian"]); ?>" href="javascript:void(0)"><?php if($info["is_tuijian"] == '0'): ?>设为推荐<?php else: ?> 取消推荐<?php endif; ?></a>
                                <a class="green opart" fid="<?php echo ($info["f_id"]); ?>" isindex="<?php echo ($info["is_index"]); ?>" href="javascript:void(0)"><?php if($info["is_index"] == '0'): ?>首页显示<?php else: ?> 取消显示<?php endif; ?></a>
                                <a href="/index.php/Admin/Famous/addslander/f_id/<?php echo ($info["f_id"]); ?>" class="green detail">&nbsp;发布文章</a>
                                <a href="/index.php/Admin/Famous/upduser/f_id/<?php echo ($info["f_id"]); ?>" class="green detail"> <i class="icon-pencil bigger-130"></i>&nbsp;编辑</a>
                                <a class="doremove" onclick="return false" href="/index.php/Admin/Famous/doremove/f_id/<?php echo ($info["f_id"]); ?>" style="color:red" class="red detail"> <i class="icon-remove bigger-130"></i>&nbsp;删除</a>
                            </div>
                        </td>
                    </tr><?php endforeach; endif; ?>
                    <tr>
                        <input type="hidden" name="optype" value="">
                        <td style="border-right:none"><input type="checkbox" name="all"></td><td style="text-align:left;border-left:none" colspan=9>全选&nbsp;&nbsp;&nbsp;&nbsp;<a class="batchestui" href="javascript:void(0)" optype="1">设为推荐</a>&nbsp;&nbsp;<a class="batchestui" href="javascript:void(0)" optype="0">取消推荐</a>&nbsp;&nbsp;<a class="batches" href="javascript:void(0)" optype="1">首页显示</a>&nbsp;&nbsp;<a class="batches" href="javascript:void(0)" optype="0">取消显示</a>&nbsp;&nbsp;<a class="batchesdel" href="javascript:void(0)">删除</a>&nbsp;&nbsp;(批量操作)</td>
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
        //批量删除操作
        $(".batchesdel").click(function(){
            if($("input[name='f_id[]']:checked").length >= 1){
                $("#batches").attr("action","/index.php/Admin/Famous/doremove");
                $("#batches").submit();
            }else{
                alert('请选择操作对象');
            }
        })
        //批量文章操作
        $(".batches").click(function(){
            var thisobj = $(this);
            if($("input[name='f_id[]']:checked").length >= 1){
                $("input[name='optype']").val(thisobj.attr('optype'));
                $("#batches").attr("action","/index.php/Admin/Famous/isindex");
                $("#batches").submit();
            }else{
                alert('请选择操作对象');
            }
        })
        //批量推荐操作
        $(".batchestui").click(function(){
            var thisobj = $(this);
            if($("input[name='f_id[]']:checked").length >= 1){
                $("input[name='optype']").val(thisobj.attr('optype'));
                $("#batches").attr("action","/index.php/Admin/Famous/istuijian");
                $("#batches").submit();
            }else{
                alert('请选择操作对象');
            }
        })
        //单个删除操作
        $(".doremove").click(function(){
            var thisobj = $(this);
            if(confirm('确定要删除吗')){
                $.get(thisobj.attr('href'),function(data){
                    if(data.error == 0){
                        thisobj.parent().parent().parent().remove();
                        alert('成功删除一条数据');
                    }
                })
            } 
        })
        //单个显示操作
        $(".opart").click(function(){
            var thisobj = $(this);
            var f_id = $(this).attr('fid');
            var is_index = $(this).attr('isindex');
            //var sorttype = $(this).attr('sorttype');
            $.get("/index.php/Admin/Famous/isindex",{'f_id':f_id,'is_index':is_index},function(data){
                if(data.error == 0){
                    if(data.type == 1){
                        //取消操作
                        thisobj.attr('isindex',1);
                        thisobj.text('取消显示');
                        thisobj.parent().parent().parent().children('.arttype').children('span').attr('class','').addClass('green').text('是');
                    }else if(data.type == 2){
                        thisobj.attr('isindex',0);
                        thisobj.text('首页显示');
                        thisobj.parent().parent().parent().children('.arttype').children('span').attr('class','').addClass('red').text('否');
                    }     
                }
            })
        })
        //单个推荐操作
        $(".opart2").click(function(){
            var thisobj = $(this);
            var f_id = $(this).attr('fid');
            var istuijian = $(this).attr('istuijian');
            //var sorttype = $(this).attr('sorttype');
            $.get("/index.php/Admin/Famous/istuijian",{'f_id':f_id,'is_tuijian':istuijian},function(data){
                if(data.error == 0){
                    if(data.type == 1){
                        //取消操作
                        thisobj.attr('istuijian',1);
                        thisobj.text('取消推荐');
                        thisobj.parent().parent().parent().children('.arttype2').children('span').attr('class','').addClass('green').text('是');
                    }else if(data.type == 2){
                        thisobj.attr('istuijian',0);
                        thisobj.text('设为推荐');
                        thisobj.parent().parent().parent().children('.arttype2').children('span').attr('class','').addClass('red').text('否');
                    }     
                }
            })
        })
        //全部选中取消选中操作
        $("input[name='all']").click(function(){
            var ischeck = $(this).prop('checked');
            if(ischeck){
                $("input[name='f_id[]']").prop('checked',true);
            }else{
                $("input[name='f_id[]']").prop('checked',false);
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