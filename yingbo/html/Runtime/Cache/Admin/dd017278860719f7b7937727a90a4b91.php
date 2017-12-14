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



        
<div class="main-content">
    <div class="page-content">
        <div class="row">
            <div class="page-content box">
                <div class="box-title margin_bot_20">
                    <div class="span10">
                        <h3><i class="icon-magic"></i>自定义菜单</h3>
                    </div>
                </div>
                <div class="margin_bot_20">
                    <a href="<?php echo U('Menu/tianjia');?>" class="btn btn-primary btn-sm"><i class="icon-plus"></i>新增菜单</a>
                    <a href="JavaScript:funCreate();" class="btn btn-success btn-sm">生产菜单</a>
                </div>
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                    <tr><th width="200px">菜单名称</th>
                        <th width="100px">关键字</th>
                        <th width="100px">显示</th>
                        <th width="100px">排序</th>
                        <th width="250px">Url</th>
                        <th width="150px">操作</th>
                    </tr></thead>
                    <tbody>
                    <?php if(is_array($info)): foreach($info as $key=>$v): ?><tr>
                            <td><?php echo ($v["title"]); ?></td>
                            <td><?php echo ($v["keyword"]); ?></td>
                            <td>
                                <?php if(($v["is_show"]) == "0"): ?>显示
                                    <?php else: ?>
                                    隐藏<?php endif; ?>
                            </td>
                            <td><?php echo ($v["sort"]); ?></td>
                            <td><?php echo ($v["url"]); ?></td>
                            <td>
                                <div class="visible-md visible-lg hidden-sm hidden-xs action-buttons">
                                    <a href="<?php echo U('tianjia',array('id'=>$v['id']));?>"> <i class="icon-pencil bigger-130"></i>&nbsp;添加 </a>
                                    <a class="green" href="<?php echo U('upd',array('id'=>$v['id']));?>"> <i class="icon-pencil bigger-130"></i>&nbsp;编辑 </a>
                                    <a class="red detail" onclick="del(<?php echo ($v["id"]); ?>)" href="javascript:;"> <i class="icon-trash bigger-130"></i>&nbsp;删除 </a>
                                </div>
                            </td>
                        </tr><?php endforeach; endif; ?>

                    </tbody>
                </table>
               
            </div>
        </div>
        <!--/.box-->
    </div>
    <!-- /.page-content -->
</div><!-- /.main-content -->
</div><!-- /.main-container-inner -->
</div><!-- /.main-container -->


  <script type="text/javascript">
      function  funCreate() {
          location.href= '/index.php/Admin/Menu/class_send';
      }

	  function del(id){
		$.get('/index.php/Admin/Menu/check','id='+id,function(msg){
			if(msg == 0){
				if(confirm("该菜单有子菜单确认删除吗？")){
					location.href = '/index.php/Admin/Menu/classDel/?id='+id+"&is_class=1";
				}else{
				
				}
			
			}else{
				if(confirm("确认删除该菜单？")){
					location.href = '/index.php/Admin/Menu/classDel/?id='+id+"&is_class=1";
				}else{
				
				}
			
			}
		})
	  }

//if(msg == 0){
			//	if(confirm("该分类有子分类确认删除吗？")){ 
			//		alert("yes"); 
			//	} 
			//	else{ 
					
			//		return; 
			//	}
			//}

  </script>

    </div><!-- /.main-container-inner -->
</div><!-- /.main-container -->
<script type="text/javascript" src='<?php echo (JS_URL); ?>jquery-1.7.2.min.js'></script>
<script type="text/javascript" src="<?php echo (JS_URL); ?>ace-extra.min.js"></script>
<script type="text/javascript" src="<?php echo (JS_URL); ?>bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo (JS_URL); ?>ace.min.js"></script>
<script type="text/javascript" src="<?php echo (JS_URL); ?>pulic.js"></script>
</body>
</html>