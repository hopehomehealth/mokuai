<?php

/**
 * Class module_model
 */
class module_model extends Lowxp_Model{

    private $baseTable = '###_module';

    function __construct(){}

    //获取所有模型
    function select(){
        $array = $this->db->select("SELECT * FROM ".$this->baseTable." ORDER BY listorder,id");
        $array = $this->db->lJoin($array,'menus','id,name','type','id','menus_');

        $list = array();
        foreach($array as $v){
            $list[$v['id']] = $v;
        }
        return $list;
    }

    //保存数据
    function save($post){

        $id = isset($post['id']) ? (int) $post['id'] : 0;

        $oldrow = array();
        if($id) $oldrow = $this->db->get("select * from ".$this->baseTable." where id=".$id);

        #表单处理
        $tablename = $post['name'];
        if(empty($post['title'])){ return array('code'=>10001, 'message'=>'请输入模型名称!'); }
        if($id){
            if(isset($post['name'])) unset($post['name']);
        }else{
            if(empty($post['name'])){ return array('code'=>10001, 'message'=>'请输入模型表名!'); }
            if($this->base->validate($post['name'],'english') == false){ return array('code'=>10001, 'message'=>'模型表名只能是英文字母!'); }
            $post['name'] = trim(strtolower($post['name']));
        }

        #初始值
        if(!$id) $post['status'] = 1;
        if(empty($post['listfields'])){ $post['listfields'] = '*'; }

        #重复处理
        $where = $post['id'] ? ' and id!='.$post['id'] : '';
        $res = $this->db->select("select * from ".$this->baseTable." where title='".$post['title']."'".$where);
        if($res){ return array('code'=>10003, 'message'=>'模型名称已经存在，请更换!'); }
        $res = $this->db->select("select * from ".$this->baseTable." where name='".$post['name']."'".$where);
        if($res){ return array('code'=>10003, 'message'=>'模型表名已经存在，请更换!'); }
        if(isset($post['name']) && $post['name'] && $this->db->table_exists($post['name'])){
            return array('code'=>10003, 'message'=>'数据表已经存在，请更换!');
        }

        #保存
        if($id){
            #更新后台菜单
            $this->db->update('menus',
                array('parentid'=>$post['type']),
                array('module'=>$oldrow['name'],'parentid'=>$oldrow['type'])
            );
        }
        $where = $post['id'] ? array('id'=>(int) $post['id']) : '';
        $res_save = $this->db->save($this->baseTable,$post,'',$where);

        #添加模型表 与 模型字段表数据
        if(!$id && $res_save){
            $moduleid = $this->db->insert_id();
            $emptyfield = isset($_POST['emptyfield']) ? (int) $_POST['emptyfield'] : 0;
            $fieldTable = $this->db->pre_table('module_field');

            #添加空表字段
            if($emptyfield == 1){

                #创建模型内容表
                $res = $this->db->query("CREATE TABLE `".$this->db->pre_table($post['name'])."` (
                  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
                  `status` tinyint(1) unsigned NOT NULL DEFAULT '0',
                  `userid` int(8) unsigned NOT NULL DEFAULT '0',
                  `username` varchar(40) NOT NULL DEFAULT '',
                  `url` varchar(60) NOT NULL DEFAULT '',
                  `listorder` int(10) unsigned NOT NULL DEFAULT '0',
                  `createtime` int(11) unsigned NOT NULL DEFAULT '0',
                  `updatetime` int(11) unsigned NOT NULL DEFAULT '0',
                  `lang` tinyint(2) unsigned NOT NULL DEFAULT '0',
                  PRIMARY KEY (`id`)
                ) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8");

                if(empty($res)){ return array('code'=>10002, 'message'=>'创建模型内容表失败!'); } //创建失败

                #插入字段表
                $res = NULL;
                $postFields = array(
                    array('moduleid'=>$moduleid,'field'=>'createtime','name'=>'发布时间','tips'=>'','required'=>'1','minlength'=>'0','maxlength'=>'0','pattern'=>'','errormsg'=>'','class'=>'','type'=>'datetime','setup'=>'','ispost'=>'0','unpostgroup'=>'0','listorder'=>'96','status'=>'1','issystem'=>'1'),
                    array('moduleid'=>$moduleid,'field'=>'status','name'=>'状态','tips'=>'','required'=>'0','minlength'=>'0','maxlength'=>'0','pattern'=>'','errormsg'=>'','class'=>'','type'=>'radio','setup'=>json_encode(array('options'=>'已审核|1\r\n未审核|0','fieldtype'=>'tinyint','numbertype'=>'1','labelwidth'=>'75','default'=>'1')),'ispost'=>'0','unpostgroup'=>'0','listorder'=>'100','status'=>'1','issystem'=>'1'),
                );
                foreach($postFields as $v){
                    $v['setup'] = str_replace('\\\\r\\\\n','\r\n',$v['setup']);
                    $res = $this->db->save('module_field',$v,'');
                }
                if(empty($res)){ return array('code'=>10002, 'message'=>'创建表字段失败!'); } //插入失败

            }

            #添加普通文章表字段
            else{

                #创建模型内容表
                $res = $this->db->query("CREATE TABLE `".$this->db->pre_table($post['name'])."` (
                  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
                  `catid` smallint(5) unsigned NOT NULL DEFAULT '0',
                  `userid` int(8) unsigned NOT NULL DEFAULT '0',
                  `username` varchar(40) NOT NULL DEFAULT '',
                  `title` varchar(120) NOT NULL DEFAULT '',
                  `title_style` varchar(40) NOT NULL DEFAULT '',
                  `thumb` varchar(255) NOT NULL DEFAULT '',
                  `keywords` varchar(120) NOT NULL DEFAULT '',
                  `description` mediumtext NOT NULL,
                  `content` mediumtext NOT NULL,
                  `url` varchar(60) NOT NULL DEFAULT '',
                  `template` varchar(40) NOT NULL DEFAULT '',
                  `posid` varchar(40) NOT NULL DEFAULT '',
                  `status` tinyint(1) unsigned NOT NULL DEFAULT '0',
                  `listorder` int(10) unsigned NOT NULL DEFAULT '0',
                  `hits` int(11) unsigned NOT NULL DEFAULT '0',
                  `createtime` int(11) unsigned NOT NULL DEFAULT '0',
                  `updatetime` int(11) unsigned NOT NULL DEFAULT '0',
                  `lang` tinyint(2) unsigned NOT NULL DEFAULT '0',
                  PRIMARY KEY (`id`),
                  KEY `status` (`id`,`status`,`listorder`),
                  KEY `catid` (`id`,`catid`,`status`),
                  KEY `listorder` (`id`,`catid`,`status`,`listorder`)
                ) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8");

                if(empty($res)){ return array('code'=>10002, 'message'=>'创建模型内容表失败!'); } //创建失败

                #插入字段表
                $res = NULL;
                $postFields = array(
                    array('moduleid'=>$moduleid,'field'=>'catid', 'name'=>'栏目', 'tips'=>'', 'required'=>'1', 'minlength'=>'1', 'maxlength'=>'6', 'pattern'=>'', 'errormsg'=>'必须选择一个栏目', 'class'=>'', 'type'=>'catid', 'setup'=>'','ispost'=>'1','unpostgroup'=>'','listorder'=>'0','status'=>'1','issystem'=>'1'),
                    array('moduleid'=>$moduleid,'field'=>'title', 'name'=>'标题', 'tips'=>'', 'required'=>'1', 'minlength'=>'1', 'maxlength'=>'80', 'pattern'=>'', 'errormsg'=>'标题必填3-80个字', 'class'=>'', 'type'=>'title', 'setup'=>json_encode(array('thumb'=>'1','style'=>'1','size'=>'')),'ispost'=>'1','unpostgroup'=>'0','listorder'=>'0','status'=>'1','issystem'=>'1'),
                    array('moduleid'=>$moduleid,'field'=>'keywords', 'name'=>'SEO关键词', 'tips'=>'', 'required'=>'0', 'minlength'=>'0', 'maxlength'=>'80', 'pattern'=>'', 'errormsg'=>'', 'class'=>'', 'type'=>'text', 'setup'=>json_encode(array('size'=>'','default'=>'','ispassword'=>'0','fieldtype'=>'varchar')),'ispost'=>'1','unpostgroup'=>'0','listorder'=>'97','status'=>'1','issystem'=>'1'),
                    array('moduleid'=>$moduleid,'field'=>'description', 'name'=>'SEO描述', 'tips'=>'', 'required'=>'0', 'minlength'=>'0', 'maxlength'=>'0', 'pattern'=>'', 'errormsg'=>'', 'class'=>'', 'type'=>'textarea', 'setup'=>json_encode(array('fieldtype'=>'mediumtext','width'=>'','height'=>'','default'=>'')),'ispost'=>'1','unpostgroup'=>'0','listorder'=>'98','status'=>'1','issystem'=>'1'),
                    array('moduleid'=>$moduleid,'field'=>'content', 'name'=>'内容', 'tips'=>'', 'required'=>'0', 'minlength'=>'0', 'maxlength'=>'0', 'pattern'=>'', 'errormsg'=>'', 'class'=>'', 'type'=>'editor', 'setup'=>json_encode(array ('toolbar'=>'basic','default'=>'','height'=>'','showpage'=>'1','enablekeylink'=>'0','replacenum'=>'','enablesaveimage'=>'0','flashupload'=>'1','alowuploadexts'=>'')),'ispost'=>'1','unpostgroup'=>'0','listorder'=>'0','status'=>'1','issystem'=>'1'),
                    //array('moduleid'=>$moduleid,'field'=>'recommend', 'name'=>'允许评论', 'tips'=>'', 'required'=>'0', 'minlength'=>'0', 'maxlength'=>'1', 'pattern'=>'', 'errormsg'=>'', 'class'=>'', 'type'=>'radio', 'setup'=>'array (\n  \'options\' => \'允许评论|1\r\n不允许评论|0\',\n  \'fieldtype\' => \'tinyint\',\n  \'numbertype\' => \'1\',\n  \'labelwidth\' => \'\',\n  \'default\' => \'\',\n)','ispost'=>'1','unpostgroup'=>'0','listorder'=>'93','status'=>'0','issystem'=>'0'),
                    //array('moduleid'=>$moduleid,'field'=>'readpoint', 'name'=>'阅读收费', 'tips'=>'', 'required'=>'0', 'minlength'=>'0', 'maxlength'=>'5', 'pattern'=>'', 'errormsg'=>'', 'class'=>'', 'type'=>'number', 'setup'=>'array (\n  \'size\' => \'5\',\n  \'numbertype\' => \'1\',\n  \'decimaldigits\' => \'0\',\n  \'default\' => \'0\',\n)','ispost'=>'1','unpostgroup'=>'0','listorder'=>'93','status'=>'0','issystem'=>'0'),
                    array('moduleid'=>$moduleid,'field'=>'hits', 'name'=>'点击次数', 'tips'=>'', 'required'=>'0', 'minlength'=>'0', 'maxlength'=>'8', 'pattern'=>'', 'errormsg'=>'', 'class'=>'', 'type'=>'number', 'setup'=>json_encode(array('size'=>'60','numbertype'=>'1','decimaldigits'=>'0','default'=>'0')),'ispost'=>'1','unpostgroup'=>'0','listorder'=>'95','status'=>'1','issystem'=>'1'),
                    //array('moduleid'=>$moduleid,'field'=>'readgroup', 'name'=>'访问权限', 'tips'=>'', 'required'=>'0', 'minlength'=>'0', 'maxlength'=>'0', 'pattern'=>'', 'errormsg'=>'', 'class'=>'', 'type'=>'groupid', 'setup'=>'array (\n  \'inputtype\' => \'checkbox\',\n  \'fieldtype\' => \'tinyint\',\n  \'labelwidth\' => \'85\',\n  \'default\' => \'\',\n)','ispost'=>'1','unpostgroup'=>'0','listorder'=>'96','status'=>'0','issystem'=>'1'),
                    array('moduleid'=>$moduleid,'field'=>'posid', 'name'=>'推荐位', 'tips'=>'', 'required'=>'0', 'minlength'=>'0', 'maxlength'=>'0', 'pattern'=>'', 'errormsg'=>'', 'class'=>'', 'type'=>'posid', 'setup'=>'','ispost'=>'1','unpostgroup'=>'0','listorder'=>'94','status'=>'1','issystem'=>'1'),
                    array('moduleid'=>$moduleid,'field'=>'createtime', 'name'=>'发布时间', 'tips'=>'', 'required'=>'0', 'minlength'=>'0', 'maxlength'=>'0', 'pattern'=>'', 'errormsg'=>'', 'class'=>'', 'type'=>'datetime', 'setup'=>'','ispost'=>'1','unpostgroup'=>'0','listorder'=>'96','status'=>'1','issystem'=>'1'),
                    array('moduleid'=>$moduleid,'field'=>'template','name'=>'模板','tips'=>'','required'=>'0','minlength'=>'0','maxlength'=>'0','pattern'=>'','errormsg'=>'','class'=>'','type'=>'template','setup'=>'','ispost'=>'0','unpostgroup'=>'0','listorder'=>'99','status'=>'1','issystem'=>'1'),
                    array('moduleid'=>$moduleid,'field'=>'status','name'=>'状态','tips'=>'','required'=>'0','minlength'=>'0','maxlength'=>'0','pattern'=>'','errormsg'=>'','class'=>'','type'=>'radio','setup'=>json_encode(array('options'=>'已审核|1\r\n未审核|0','fieldtype'=>'tinyint','numbertype'=>'1','labelwidth'=>'75','default'=>'1')),'ispost'=>'0','unpostgroup'=>'0','listorder'=>'100','status'=>'1','issystem'=>'1'),
                );
                foreach($postFields as $v){
                    $v['setup'] = str_replace('\\\\r\\\\n','\r\n',$v['setup']);
                    $res = $this->db->save('module_field',$v,'');
                }
                if(empty($res)){ return array('code'=>10002, 'message'=>'插件表字段失败!'); } //插入失败

            }

            #插入到后台管理
            if($moduleid){
                $data = array();
                $data['parentid'] = $post['type'];
                $data['name'] = $post['title'];
                $data['status'] = $post['status'];
                $data['type'] = 1;
                $data['icon'] = '&#xe601;';
                $data['mod'] = 'content';
                $data['action'] = 'index';
                $data['param'] = $post['name'];
                $data['module'] = $post['name'];
                $this->db->insert('menus',$data);
                $pmenusid = $this->db->insert_id();

                $data = array();
                $data['parentid'] = $pmenusid;
                $data['name'] = '添加/编辑内容';
                $data['status'] = $post['status'];
                $data['type'] = 2;
                $data['mod'] = 'content';
                $data['action'] = 'edit';
                $data['param'] = $post['name'];
                $data['module'] = $post['name'];
                $this->db->insert('menus',$data);
            }
        }

        if(empty($res_save)){ return array('code'=>10002, 'message'=>'数据操作失败!'); } //未知错误
        if($post['id']){
            admin_log('编辑内容模型：'.$tablename);
            return array('code'=>0, 'type'=>'update', 'message'=>'更新成功');
        }
        else{
            admin_log('添加内容模型：'.$tablename);
            return array('code'=>0, 'type'=>'insert', 'message'=>'添加成功');
        }

    }

}