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
                        <h3><i class="icon-magic"></i>文章列表</h3>
                    </div>
                </div>
                <form class="form-horizontal" method="get" action="/index.php/Admin/Article/showlist">
                  <div class="form-group">
                    <label class="control-label" style="width:auto;line-height:28px;padding-top:0">关键字： </label>        
                    <div class="controls pull-left">
                      <input type="text" class="input-medium" name="search" value="<?php echo ($_GET['serach']); ?>" placeholder="文章名/作者">
                      <button type="submit" class="btn btn-sm btn-primary">搜索</button>
                    </div>
                  </div>
                </form>
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                    <tr>
                        <th width="5%"></th>
                        <th width="15%">文章标题</th>
                        <th width="8%">类型</th>
                        <th width="8%">作者</th>
                        <th width="8%">发表日期</th>
                        <th width="5%">评论</th>
                        <th width="5%">浏览</th>
                        <th width="5%">状态</th>
                        <th width="10%">操作</th>
                    </tr></thead>
                    <tbody>
                    <form action="/index.php/Admin/Posts/dorecycle" method="post" id="batches">
                    <?php if(is_array($articles)): foreach($articles as $key=>$info): ?><tr>
                        <td><input type="checkbox" name="art_id[]" value="<?php echo ($info["art_id"]); ?>"></td>
                        <td><?php echo ($info["title"]); ?></td>
                        <td><?php echo ((isset($info["class_name"]) && ($info["class_name"] !== ""))?($info["class_name"]):"未分类"); ?></td>
                        <td><?php echo ($info["username"]); ?></td>
                        <td><?php echo (date("Y-m-d H:i:s",$info["add_time"])); ?></td>
                        <td><?php echo ($info["comments"]); ?></td>
                        <td><?php echo ($info["views"]); ?></td>
                        <td class="arttype">
                            <?php if($info["is_hot"] == 1): ?><span class="putong tuijian">推荐</span><?php endif; if($info["is_hot"] == '0'): ?><span class="putong">普通</span><?php endif; ?>
                        </td>
                        <td>
                            <div class="visible-md visible-lg hidden-sm hidden-xs action-buttons">
                                <a class="opart" artid="<?php echo ($info["art_id"]); ?>" ishot="<?php echo ($info["is_hot"]); ?>" href="javascript:void(0)"><?php if($info["is_hot"] == '0'): ?>设为推荐<?php else: ?> 设为普通<?php endif; ?></a>
                                <a class="doremove" onclick="return false" href="/index.php/Admin/Article/doremove/art_id/<?php echo ($info["art_id"]); ?>" style="color:red" class="red detail"> <i class="icon-remove bigger-130"></i>&nbsp;删除</a>
                            </div>
                        </td>
                    </tr><?php endforeach; endif; ?>
                    <tr>
                        <input type="hidden" name="optype" value="">
                        <td style="border-right:none"><input type="checkbox" name="all"></td><td style="text-align:left;border-left:none" colspan=8>全选&nbsp;&nbsp;&nbsp;&nbsp;<a class="batches" href="javascript:void(0)" optype="1">设为推荐</a>&nbsp;&nbsp;<a class="batches" href="javascript:void(0)" optype="0">设为普通</a>&nbsp;&nbsp;<a class="batchesdel" href="javascript:void(0)">删除</a>&nbsp;&nbsp;(批量操作)</td>
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
            if($("input[name='art_id[]']:checked").length >= 1){
                $("#batches").attr("action","/index.php/Admin/Article/doremove");
                $("#batches").submit();
            }else{
                alert('请选择操作对象');
            }
        })
        //批量文章操作
        $(".batches").click(function(){
            var thisobj = $(this);
            if($("input[name='art_id[]']:checked").length >= 1){
                $("input[name='optype']").val(thisobj.attr('optype'));
                $("#batches").attr("action","/index.php/Admin/Article/sort");
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
        //单个文章操作
        $(".opart").click(function(){
            var thisobj = $(this);
            var art_id = $(this).attr('artid');
            var is_hot = $(this).attr('ishot');
            //var sorttype = $(this).attr('sorttype');
            $.get("/index.php/Admin/Article/sort",{'art_id':art_id,'is_hot':is_hot},function(data){
                if(data.error == 0){
                    if(data.type == 1){
                        //取消操作
                        thisobj.attr('ishot',1);
                        thisobj.text('设为普通');
                        thisobj.parent().parent().parent().children('.arttype').children('span').attr('class','').addClass('putong tuijian').text('推荐');
                    }else if(data.type == 2){
                        thisobj.attr('ishot',0);
                        thisobj.text('设为推荐');
                        thisobj.parent().parent().parent().children('.arttype').children('span').attr('class','').addClass('putong').text('普通');
                    }     
                }
            })
        })
        //全部选中取消选中操作
        $("input[name='all']").click(function(){
            var ischeck = $(this).prop('checked');
            if(ischeck){
                $("input[name='art_id[]']").prop('checked',true);
            }else{
                $("input[name='art_id[]']").prop('checked',false);
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