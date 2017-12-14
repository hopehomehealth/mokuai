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


    <script type="text/javascript" src='<?php echo (JS_URL); ?>jquery-2.1.3.min.js'></script>
    <script type="text/javascript" src="<?php echo (JS_URL); ?>city-data.js"></script>
    <script type="text/javascript" src="<?php echo (JS_URL); ?>hzw-city-picker.min.js"></script>
    <script type="text/javascript" src="<?php echo (JS_URL); ?>jedate.js"></script>
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
        <?php if(is_array($auth_infoA)): foreach($auth_infoA as $key=>$v): if(($v["auth_c"] != '') AND ($v["auth_a"] != '')): ?><li <?php if((CONTROLLER_NAME == $v['auth_c']) AND (ACTION_NAME == $v['auth_a'])): ?>class="active"<?php endif; ?>>
                <a href="/index.php/Admin/<?php echo ($v["auth_c"]); ?>/<?php echo ($v["auth_a"]); ?>">
                    <i class="icon-folder-open"></i>
                    <span class="menu-text"><?php echo ($v["auth_name"]); ?> </span>
                </a>
                </li>



                <?php elseif(($v["auth_a"] == '') AND ($v["auth_c"] == '')): ?>
                <li>
                <a class="dropdown-toggle">
                    <i class="icon-folder-open"></i>
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



        
<div class="main-content">

    <div class="page-content">
        <div class="row">
            <div class="page-content box">
                <div class="box-title margin_bot_20">
                    <div class="span10">
                        <h3><i class="icon-cogs"></i>商品列表</h3>
                        <div class="pull-right"><a class="btn btn-success btn-sm" href="/index.php/Admin/Product/tianjia">添加商品</a></div>
                    </div>
                </div>
                <form class="form-horizontal"  action="<?php echo U('Admin/Product/showlist');?>" method="post">
                    <div class="form-group">
                        <label class="control-label" style="width:80px;">商品名称 : </label>
                        <div class="controls pull-left">
                            <input type="text" class="input-medium" name="search">
                            <button type="submit" class="btn btn-sm btn-primary">搜索</button>
                        </div>
                    </div>
                </form>
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                    <tr><th width="35px"><div align="center">商品ID</div> </th>
                        <th width="70px"><div align="center">商品图片</div></th>
                        <!--<th width="70px"><div align="center">二维码图片</div></th>-->
                        <th width="100px"><div align="center">中文名称</div></th>
                        <th width="100px"><div align="center">英文名称</div></th>
                        <th width="60px"><div align="center">商品价格</div></th>
                        <th width="50px"><div align="center">是否上架</div></th>
                        <th width="70px"><div align="center">所属分类</div></th>
                        <th width="100px"><div align="center">添加时间</div></th>
                        <th width="50px"><div align="center">优惠政策</div></th>
                        <th width="100px"><div align="center">操作</div></th>
                    </tr></thead>
                    <tbody>
                    <?php if(is_array($info)): foreach($info as $k=>$v): ?><tr>
                            <td><div align="center"><?php echo ($v["pro_id"]); ?></div></td>
                            <td><div align="center"><img src="<?php echo (SITE_URL); echo ($v["pic"]); ?>"  width='50' height='50'/></div></td>
                            <!--<td><div align="center"><img src="<?php echo (SITE_URL); echo (substr($v["img"],2)); ?>"  width='50' height='50'/></div></td>-->
                            <td><div align="center"><?php echo ($v["china"]); ?></div></td>
                            <td><div align="center"><?php echo ($v["english"]); ?></div></td>
                            <td><div align="center"><?php echo ($v["price"]); ?></div></td>
                            <?php if($v["is_on"] == 0): ?><td><div align="center"><i class="icon-ok bigger-130 green"></i></div> </td>
                            <?php else: ?>
                            <td><div align="center"><i class="icon-remove bigger-130 red"></i></div> </td><?php endif; ?>
                            <td><div align="center"><?php echo ($v["name"]); ?></div></td>
                            <td><div align="center"><?php echo (date('Y-m-d H:i:s',$v["input_time"])); ?></div></td>
                            <td><div align="center"><?php echo ($v["discount"]); ?></div></td>
                            <td>
                                <div class="visible-md visible-lg hidden-sm hidden-xs action-buttons" align="center">
                                    <a class="green" href="<?php echo U('upd',array('pro_id'=>$v['pro_id']));?>"> <i class="icon-pencil bigger-130"></i>&nbsp;编辑 </a>
                                    <a class="red detail" href="<?php echo U('del',array('pro_id'=>$v['pro_id']));?>"> <i class="icon-trash bigger-130"></i>&nbsp;删除 </a>
                                </div>
                            </td>
                        </tr><?php endforeach; endif; ?>
                    </tbody>
                </table>
                 <div class="green-black"><?php echo ($page); ?></div>
            </div>
        </div>
        <!--/.box-->
    </div><!-- /.page-content -->
</div><!-- /.main-content -->


    </div><!-- /.main-container-inner -->
</div><!-- /.main-container -->
<script type="text/javascript" src='<?php echo (JS_URL); ?>jquery-1.7.2.min.js'></script>
<script type="text/javascript">
        $('.active').parent().parent().addClass("active open");
</script>
<script type="text/javascript" src="<?php echo (JS_URL); ?>ace-extra.min.js"></script>
<script type="text/javascript" src="<?php echo (JS_URL); ?>bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo (JS_URL); ?>ace.min.js"></script>
<script type="text/javascript" src="<?php echo (JS_URL); ?>pulic.js"></script>
</body>
</html>