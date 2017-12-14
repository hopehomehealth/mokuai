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
        
        <script src='<?php echo (JS_URL); ?>jquery-2.1.3.min.js'></script>
<div class="main-content">

    <div class="page-content">
        <div class="row">
            <div class="page-content box">
                <div class="box-title margin_bot_20">
                    <div class="span10">
                        <a href="<?php echo U('showlist');?>"><h3><i class="icon-magic"></i>栏目页广告列表</h3></a>
                    </div>
                    <div class="margin_bot_20" align="right">
                        <a href="<?php echo U('Banner/tianjia');?>" class="btn btn-primary btn-sm"><i class="icon-plus"></i>广告添加</a>
                    </div>
                </div>

                <table class="table table-striped table-bordered table-hover">
                    <thead>
                    <tr><th width="5px"><div align="center"></div></th>
                       <th width="5px"><div align="center">id</div></th>
                        <th width="40px"><div align="center">名称</div></th>
                        <th width="35px"><div align="center">图片</div></th>
                        <th width="35px"><div align="center">所属栏目</div></th>
                        <th width="35px"><div align="center">展示位置</div></th>
                        <th width="150px"><div align="center">链接地址</div></th>
                        <th width="30px"><div align="center">是否展示</div></th>
                        <th width="35px"><div align="center">添加时间</div></th>
                        <th width="35px"><div align="center">修改时间</div></th>
                        <th width="30px"><div align="center">操作</div></th>
                    </tr></thead>

                    <tbody>
                    <form action="" method="post" id="batches">
                    <?php if(is_array($info)): foreach($info as $k=>$v): ?><tr>
                            <td><div align="center"><input type="checkbox" name="banner_id[]" value="<?php echo ($v["banner_id"]); ?>"></div></td>
                            <td><div align="center"><?php echo ($v["banner_id"]); ?></div></td>
                            <td><div align="center"><?php echo ($v["banner_title"]); ?></div></td>
                            <td><div align="center"><img src="<?php echo (SITE_URL); echo ($v["pic"]); ?>"  width='70' height='50'/></div></td>
                            <td><div align="center"><a href=""><?php echo ($v["lan_title"]); ?></a> </div></td>
                            <?php if($v["is_area"] == 0): ?><td><div align="center">顶部</div> </td>
                            <?php elseif($v["is_area"] == 1): ?>
                                <td><div align="center">中部</div> </td>
                                <?php elseif($v["is_area"] == 2): ?>
                                <td><div align="center">底部</div> </td>
                                <?php elseif($v["is_area"] == 3): ?>
                                <td><div align="center">右下一</div> </td>
                                <?php elseif($v["is_area"] == 4): ?>
                                <td><div align="center">右下二</div> </td>
                                <?php elseif($v["is_area"] == 5): ?>
                                <td><div align="center">右下三</div> </td><?php endif; ?>
                            <td><div align="center"><?php echo ($v["url"]); ?></div></td>
                            <?php if($v["is_show"] == 0): ?><td><div align="center"><i class="icon-ok bigger-130 green"></i></div> </td>
                                <?php else: ?>
                                <td><div align="center"><i class="icon-remove bigger-130 red"></i></div> </td><?php endif; ?>
                            <td><div align="center"><?php echo (date('Y-m-d H:i:s',$v["add_time"])); ?></div></td>
                            <td><div align="center"><?php echo (date('Y-m-d H:i:s',$v["upd_time"])); ?></div></td>
                            <td> <div align="center">
                                <div class="visible-md visible-lg hidden-sm hidden-xs action-buttons">
                                    <a class="green" href="<?php echo U('upd',array('banner_id'=>$v['banner_id'],'p'=>$p));?>"> <i class="icon-pencil bigger-130"></i>&nbsp;编辑 </a>

                                </div>
                            </div>
                            </td>
                        </tr><?php endforeach; endif; ?>

                    <tr>

                        <td style="border-right:none"><input type="checkbox" name="all"></td>
                        <td style="text-align:left;border-left:none" colspan=10>全选&nbsp;&nbsp;&nbsp;<a id="zhanshi" href="javascript:void(0)">展示</a>&nbsp;&nbsp;&nbsp;<a id="yincang" href="javascript:void(0)" sorttype="2">隐藏</a>&nbsp;&nbsp;&nbsp;<a id="shanchu" class="red detail" href="javascript:void(0)"> <i class="icon-trash bigger-130"></i>&nbsp;删除</a>&nbsp;&nbsp;&nbsp;</td>
                    </tr>
                    </form>
                    </tbody>
                </table>
               							<style type="text/css">
    .technorati li{float:left;}
</style>
                <div class="technorati"><?php echo ($page); ?></div>
            </div>
        </div>
        <!--/.box-->
    </div><!-- /.page-content -->
</div><!-- /.main-content -->
<script type="text/javascript">
    $(function() {
        //批量展示操作
        $("#zhanshi").click(function () {
            if ($("input[name='banner_id[]']:checked").length >= 1) {
                $("#batches").attr('action', "/index.php/Admin/Banner/zhanshi");
                $("#batches").submit();
            } else {
                alert('请选择操作对象');
            }
        })

        //批量隐藏操作
        $("#yincang").click(function () {
            if ($("input[name='banner_id[]']:checked").length >= 1) {
                $("#batches").attr('action', "/index.php/Admin/Banner/yincang");
                $("#batches").submit();
            } else {
                alert('请选择操作对象');
            }
        })
        //批量删除操作
        $("#shanchu").click(function () {
            if ($("input[name='banner_id[]']:checked").length >= 1) {
                if (confirm('你确定要永久删除吗')) {
                    $("#batches").attr('action', "/index.php/Admin/Banner/del");
                    $("#batches").submit();
                }
            } else {
                alert('请选择操作对象');
            }
        })
        //全部选中取消选中操作
        $("input[name='all']").click(function () {
            var ischeck = $(this).prop('checked');

            if (ischeck) {
                $("input[name='banner_id[]']").prop('checked', true);
            } else {
                $("input[name='banner_id[]']").prop('checked', false);
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