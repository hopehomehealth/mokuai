/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50540
Source Host           : localhost:3306
Source Database       : hnj

Target Server Type    : MYSQL
Target Server Version : 50540
File Encoding         : 65001

Date: 2017-12-13 11:00:56
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `hnj_auth`
-- ----------------------------
DROP TABLE IF EXISTS `hnj_auth`;
CREATE TABLE `hnj_auth` (
  `auth_id` int(32) unsigned NOT NULL AUTO_INCREMENT COMMENT '权限id',
  `auth_name` varchar(255) NOT NULL COMMENT '权限名称',
  `auth_pid` int(32) unsigned NOT NULL COMMENT '上级id',
  `auth_c` varchar(255) NOT NULL COMMENT '控制器',
  `auth_a` varchar(255) NOT NULL COMMENT '方法',
  `auth_path` varchar(255) DEFAULT NULL COMMENT '路径',
  `auth_level` tinyint(4) DEFAULT NULL COMMENT '等级',
  `auth_sort` int(6) DEFAULT NULL COMMENT '排序',
  `is_menu` tinyint(2) unsigned DEFAULT '1' COMMENT '是否显示到左侧菜单',
  PRIMARY KEY (`auth_id`)
) ENGINE=MyISAM AUTO_INCREMENT=58 DEFAULT CHARSET=utf8 COMMENT='权限表';

-- ----------------------------
-- Records of hnj_auth
-- ----------------------------
INSERT INTO `hnj_auth` VALUES ('1', '首页', '0', 'Index', 'index', '1', '0', '0', '1');
INSERT INTO `hnj_auth` VALUES ('2', '管理员管理', '0', '', '', '2', '0', '1', '1');
INSERT INTO `hnj_auth` VALUES ('3', '管理员列表', '2', 'Member', 'members', '2-3', '1', '0', '1');
INSERT INTO `hnj_auth` VALUES ('4', '角色管理', '2', 'Member', 'roles', '2-4', '1', '1', '1');
INSERT INTO `hnj_auth` VALUES ('5', '权限管理', '2', 'Member', 'auths', '2-5', '1', '2', '1');
INSERT INTO `hnj_auth` VALUES ('6', '添加权限', '2', 'Member', 'add_auth', '2-6', '1', '3', '0');
INSERT INTO `hnj_auth` VALUES ('7', '删除权限', '2', 'Member', 'del_auth', '2-7', '1', '4', '0');
INSERT INTO `hnj_auth` VALUES ('8', '编辑权限', '2', 'Member', 'upd_auth', '2-8', '1', '5', '0');
INSERT INTO `hnj_auth` VALUES ('9', '添加管理员', '2', 'Member', 'tianjia', '2-9', '1', '6', '0');
INSERT INTO `hnj_auth` VALUES ('10', '编辑管理员', '2', 'Member', 'upd', '2-10', '1', '7', '0');
INSERT INTO `hnj_auth` VALUES ('11', '删除管理员', '2', 'Member', 'del', '2-11', '1', '8', '0');
INSERT INTO `hnj_auth` VALUES ('12', '添加角色', '2', 'Member', 'add_role', '2-12', '1', '9', '0');
INSERT INTO `hnj_auth` VALUES ('13', '编辑角色', '2', 'Member', 'upd_role', '2-13', '1', '10', '0');
INSERT INTO `hnj_auth` VALUES ('14', '删除角色', '2', 'Member', 'del_role', '2-14', '1', '11', '0');
INSERT INTO `hnj_auth` VALUES ('15', '会员管理', '0', '', '', '15', '0', '4', '1');
INSERT INTO `hnj_auth` VALUES ('16', '栏目管理', '0', '', '', '16', '0', '2', '1');
INSERT INTO `hnj_auth` VALUES ('17', '内容管理', '0', '', '', '17', '0', '3', '1');
INSERT INTO `hnj_auth` VALUES ('19', '应用客户', '0', '', '', '19', '0', '7', '1');
INSERT INTO `hnj_auth` VALUES ('20', '系统设置', '0', '', '', '20', '0', '8', '1');
INSERT INTO `hnj_auth` VALUES ('21', '基本设置', '20', 'Set', 'config', '20-21', '1', '0', '1');
INSERT INTO `hnj_auth` VALUES ('22', '文章列表', '17', 'News', 'showlist', '17-22', '1', '0', '1');
INSERT INTO `hnj_auth` VALUES ('37', '幻灯片管理', '0', '', '', '37', '0', '5', '1');
INSERT INTO `hnj_auth` VALUES ('24', '发布文章', '17', 'News', 'tianjia', '17-24', '1', '0', '0');
INSERT INTO `hnj_auth` VALUES ('25', '编辑文章', '17', 'News', 'upd', '17-25', '1', '0', '0');
INSERT INTO `hnj_auth` VALUES ('38', '幻灯片列表', '37', 'Slide', 'showlist', '37-38', '1', '0', '1');
INSERT INTO `hnj_auth` VALUES ('57', '删除案例', '53', 'Case', 'del_case', '53-57', '1', '3', '0');
INSERT INTO `hnj_auth` VALUES ('56', '编辑案例', '53', 'Case', 'upd_case', '53-56', '1', '2', '0');
INSERT INTO `hnj_auth` VALUES ('29', '栏目列表', '16', 'Category', 'showlist', '16-29', '1', '0', '1');
INSERT INTO `hnj_auth` VALUES ('30', '添加栏目', '16', 'Category', 'add', '16-30', '1', '1', '0');
INSERT INTO `hnj_auth` VALUES ('31', '修改栏目', '16', 'Category', 'upd', '16-31', '1', '2', '0');
INSERT INTO `hnj_auth` VALUES ('32', '删除栏目', '16', 'Category', 'del', '16-32', '1', '3', '0');
INSERT INTO `hnj_auth` VALUES ('33', '客户列表', '19', 'Link', 'showlist', '19-33', '1', '0', '1');
INSERT INTO `hnj_auth` VALUES ('34', '添加客户', '19', 'Link', 'add', '19-34', '1', '0', '0');
INSERT INTO `hnj_auth` VALUES ('35', '编辑客户', '19', 'Link', 'upd', '19-35', '1', '0', '0');
INSERT INTO `hnj_auth` VALUES ('36', '删除客户', '19', 'Link', 'del', '19-36', '1', '0', '0');
INSERT INTO `hnj_auth` VALUES ('55', '添加案例', '53', 'Case', 'add_case', '53-55', '1', '1', '0');
INSERT INTO `hnj_auth` VALUES ('54', '应用案例', '53', 'Case', 'cases', '53-54', '1', '0', '1');
INSERT INTO `hnj_auth` VALUES ('43', '会员列表', '15', 'User', 'showlist', '15-43', '1', '0', '1');
INSERT INTO `hnj_auth` VALUES ('44', '产品管理', '0', '', '', '44', '0', '7', '1');
INSERT INTO `hnj_auth` VALUES ('45', '产品列表', '44', 'Product', 'showlist', '44-45', '1', '0', '1');
INSERT INTO `hnj_auth` VALUES ('46', '添加产品', '44', 'Product', 'tianjia', '44-46', '1', '1', '0');
INSERT INTO `hnj_auth` VALUES ('47', '编辑产品', '44', 'Product', 'upd', '44-47', '1', '2', '0');
INSERT INTO `hnj_auth` VALUES ('48', '删除产品', '44', 'Product', 'del', '44-48', '1', '3', '0');
INSERT INTO `hnj_auth` VALUES ('49', '产品分类', '44', 'Product', 'typelist', '44-49', '1', '4', '1');
INSERT INTO `hnj_auth` VALUES ('50', '添加分类', '44', 'Product', 'add_type', '44-50', '1', '5', '0');
INSERT INTO `hnj_auth` VALUES ('51', '编辑分类', '44', 'Product', 'upd_type', '44-51', '1', '6', '0');
INSERT INTO `hnj_auth` VALUES ('52', '删除分类', '44', 'Product', 'del_type', '44-52', '1', '7', '0');
INSERT INTO `hnj_auth` VALUES ('53', '应用案例', '0', '', '', '53', '0', '7', '1');

-- ----------------------------
-- Table structure for `hnj_case`
-- ----------------------------
DROP TABLE IF EXISTS `hnj_case`;
CREATE TABLE `hnj_case` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(150) DEFAULT NULL COMMENT '名称',
  `picture` varchar(100) DEFAULT NULL COMMENT '图片',
  `href` varchar(100) DEFAULT NULL,
  `introduce` text COMMENT '介绍',
  `sort` int(11) DEFAULT '0' COMMENT '排序',
  `is_show` tinyint(2) unsigned DEFAULT '0' COMMENT '0隐藏1显示',
  `ctime` char(20) DEFAULT NULL COMMENT '添加时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of hnj_case
-- ----------------------------
INSERT INTO `hnj_case` VALUES ('1', '商业综合体-工业园区', '/Public/Upl/case/2017-08-10/598bdc2f4fca5.jpg', '', '建筑面积：720000 m2，主要使用功能：共27 栋高层住宅(25~33 层)配套的2 层商业、3 个大型地下停车车库及1 栋幼儿园。结构形式高层住宅采用钢筋混凝土剪力墙结构体系，地下车库、幼儿园采用钢筋混凝土框架结构体系。建筑面积：720000 m2，主要使用功能：共27 栋高层住宅(25~33 层)配套的2 层商业、3 个大型地下停车车库及1 栋幼儿园。结构形式高层住宅采用钢筋混凝土剪力墙结构体系，地下车库、幼儿园采用钢筋混凝土框架结构体系。建筑面积：720000 m2，主要使用功能：共27 栋高层住宅(25~33 层)配套的2 层商业、3 个大型地下停车车库及1 栋幼儿园。结构形式高层住宅采用钢筋混凝土剪力墙结构体系，地下车库、幼儿园采用钢筋混凝土框架结构体系。 ', '0', '1', '1502338094');
INSERT INTO `hnj_case` VALUES ('3', '商业综合体-园区车间', '/Public/Upl/case/2017-08-10/598bdc9d54be9.jpg', '', '建筑面积：720000 m2，主要使用功能：共27 栋高层住宅(25~33 层)配套的2 层商业、3 个大型地下停车车库及1 栋幼儿园。结构形式高层住宅采用钢筋混凝土剪力墙结构体系，地下车库、幼儿园采用钢筋混凝土框架结构体系。', '1', '1', '1502338204');
INSERT INTO `hnj_case` VALUES ('4', '科研应用-实验案例', '/Public/Upl/case/2017-08-10/598bdcc534d4a.jpg', '', '建筑面积：720000 m2，主要使用功能：共27 栋高层住宅(25~33 层)配套的2 层商业、3 个大型地下停车车库及1 栋幼儿园。结构形式高层住宅采用钢筋混凝土剪力墙结构体系，地下车库、幼儿园采用钢筋混凝土框架结构体系。', '2', '1', '1502338244');
INSERT INTO `hnj_case` VALUES ('5', '道路建设-桥梁应用', '/Public/Upl/case/2017-08-10/598bdcf362e2c.jpg', '', '建筑面积：720000 m2，主要使用功能：共27 栋高层住宅(25~33 层)配套的2 层商业、3 个大型地下停车车库及1 栋幼儿园。结构形式高层住宅采用钢筋混凝土剪力墙结构体系，地下车库、幼儿园采用钢筋混凝土框架结构体系。', '3', '1', '1502338290');
INSERT INTO `hnj_case` VALUES ('6', '商业综合体-体育设施', '/Public/Upl/case/2017-08-10/598bdd06e7f89.jpg', '', '建筑面积：720000 m2，主要使用功能：共27 栋高层住宅(25~33 层)配套的2 层商业、3 个大型地下停车车库及1 栋幼儿园。结构形式高层住宅采用钢筋混凝土剪力墙结构体系，地下车库、幼儿园采用钢筋混凝土框架结构体系。', '4', '1', '1502338309');
INSERT INTO `hnj_case` VALUES ('7', '缓粘结钢绞线', '/Public/Upl/case/2017-08-10/598bdd1f39817.jpg', '', '建筑面积：720000 m2，主要使用功能：共27 栋高层住宅(25~33 层)配套的2 层商业、3 个大型地下停车车库及1 栋幼儿园。结构形式高层住宅采用钢筋混凝土剪力墙结构体系，地下车库、幼儿园采用钢筋混凝土框架结构体系。', '5', '1', '1502338334');
INSERT INTO `hnj_case` VALUES ('8', '商业综合体-酒店工程', '/Public/Upl/case/2017-08-10/598bdd2f9b641.jpg', '', '建筑面积：720000 m2，主要使用功能：共27 栋高层住宅(25~33 层)配套的2 层商业、3 个大型地下停车车库及1 栋幼儿园。结构形式高层住宅采用钢筋混凝土剪力墙结构体系，地下车库、幼儿园采用钢筋混凝土框架结构体系。', '6', '1', '1502338350');
INSERT INTO `hnj_case` VALUES ('9', '商业综合体-酒店工程', '/Public/Upl/case/2017-08-10/598bf138d0b47.jpg', '', '建筑面积：720000 m2，主要使用功能：共27 栋高层住宅(25~33 层)配套的2 层商业、3 个大型地下停车车库及1 栋幼儿园。结构形式高层住宅采用钢筋混凝土剪力墙结构体系，地下车库、幼儿园采用钢筋混凝土框架结构体系。', '7', '1', '1502343479');
INSERT INTO `hnj_case` VALUES ('10', '商业综合体-工程设计', '/Public/Upl/case/2017-08-10/598bf14ec7007.jpg', '', '建筑面积：720000 m2，主要使用功能：共27 栋高层住宅(25~33 层)配套的2 层商业、3 个大型地下停车车库及1 栋幼儿园。结构形式高层住宅采用钢筋混凝土剪力墙结构体系，地下车库、幼儿园采用钢筋混凝土框架结构体系。', '8', '1', '1502343501');
INSERT INTO `hnj_case` VALUES ('11', '水利工程应用', '/Public/Upl/case/2017-08-10/598bf16399266.jpg', '', '建筑面积：720000 m2，主要使用功能：共27 栋高层住宅(25~33 层)配套的2 层商业、3 个大型地下停车车库及1 栋幼儿园。结构形式高层住宅采用钢筋混凝土剪力墙结构体系，地下车库、幼儿园采用钢筋混凝土框架结构体系。', '9', '1', '1502343522');

-- ----------------------------
-- Table structure for `hnj_category`
-- ----------------------------
DROP TABLE IF EXISTS `hnj_category`;
CREATE TABLE `hnj_category` (
  `cat_id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `cat_name` varchar(255) DEFAULT NULL COMMENT '栏目名',
  `pid` int(11) unsigned DEFAULT '0' COMMENT '上级id',
  `href` char(100) DEFAULT NULL COMMENT '链接',
  `sort` int(11) unsigned DEFAULT '0' COMMENT '排序',
  `is_show` tinyint(2) unsigned DEFAULT '0' COMMENT '0:否 1:是',
  `ctrl` char(50) DEFAULT NULL COMMENT '对应控制器',
  `action` char(50) DEFAULT NULL COMMENT '对应方法',
  `introduce` varchar(255) DEFAULT '' COMMENT '栏目介绍',
  PRIMARY KEY (`cat_id`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=utf8 COMMENT='栏目表';

-- ----------------------------
-- Records of hnj_category
-- ----------------------------
INSERT INTO `hnj_category` VALUES ('1', '技术前沿', '0', '', '0', '1', 'Technology', '', '通过缓粘结剂的固化实现预应力筋与混凝土之间从无粘结逐渐过渡到有粘结的一种预应力形式。是指在施工阶段预应力筋可伸缩自由变形、不与周围缓凝粘合剂产生粘结，而在施工完成后的预定时期内预应力筋通过固化的缓凝粘结剂与周围混凝土产生粘结作用，预应力筋与周围混凝土形成一体，共同工作，达到有粘效果。');
INSERT INTO `hnj_category` VALUES ('2', '技术概览', '1', 'http://www.zghnj.com/index.php/Home/Technology/overview/id/3', '0', '1', 'Technology', 'overview', '');
INSERT INTO `hnj_category` VALUES ('3', '学术园地', '1', 'http://www.zghnj.com/index.php/Home/Technology/academicForum', '1', '1', 'Technology', 'academicForum', '');
INSERT INTO `hnj_category` VALUES ('4', '大家讲堂', '1', 'http://www.zghnj.com/index.php/Home/Technology/lectureRoom', '2', '1', 'Technology', 'lectureRoom', '');
INSERT INTO `hnj_category` VALUES ('5', '新闻资讯', '0', '', '1', '1', 'News', null, '');
INSERT INTO `hnj_category` VALUES ('6', '行业新闻', '5', 'http://www.zghnj.com/index.php/Home/News/industries', '0', '1', 'News', 'industries', '');
INSERT INTO `hnj_category` VALUES ('7', '行业活动', '5', 'http://www.zghnj.com/index.php/Home/News/activities', '1', '1', 'News', 'activities', '');
INSERT INTO `hnj_category` VALUES ('8', '产业发展', '0', '', '2', '1', 'Develop', null, '历经15年的发展，新纶科技已构筑起以电子功能材料、新型复合材料、净洁室工程与超净产品为核心的三大主营业务方向，产品与服务涵盖光学薄膜、光学胶带（OCA）、双面胶带、高净化保护膜、功能胶带、高性能散热材料、锂电池包装材料、PBO超级纤维、高性能阻隔材料、洁净室净化工程、实验室系统工程、超净产品及清洗、精密模具与模切加工、医护产品。 服务领域：IT、消费类电子、新能源、石油精化、生物医药、食品、日化、汽车制造、航空航天等核心行业');
INSERT INTO `hnj_category` VALUES ('9', '产业概览', '8', ' http://www.zghnj.com/index.php/Home/Develop/overview', '0', '1', 'Develop', 'overview', '');
INSERT INTO `hnj_category` VALUES ('10', '工程材料与机具', '8', 'http://www.zghnj.com/index.php/Home/Develop/material', '1', '1', 'Develop', 'material', '');
INSERT INTO `hnj_category` VALUES ('11', '工程设计与施工', '8', 'http://www.zghnj.com/index.php/Home/Develop/designer', '2', '1', 'Develop', 'designer', '');
INSERT INTO `hnj_category` VALUES ('12', '产品检验检测', '8', 'http://www.zghnj.com/index.php/Home/Develop/check', '3', '1', 'Develop', 'check', '');
INSERT INTO `hnj_category` VALUES ('13', '产品与服务', '0', '', '3', '1', 'Exhibition', null, '');
INSERT INTO `hnj_category` VALUES ('14', '产品系列', '13', 'http://www.zghnj.com/index.php/Home/Exhibition/product', '0', '1', 'Exhibition', 'product', '');
INSERT INTO `hnj_category` VALUES ('16', '应用案例', '13', 'http://www.zghnj.com/index.php/Home/Exhibition/cases', '1', '1', 'Exhibition', 'cases', '');
INSERT INTO `hnj_category` VALUES ('17', '应用客户', '13', 'http://www.zghnj.com/index.php/Home/Exhibition/customer', '2', '1', 'Exhibition', 'customer', '');
INSERT INTO `hnj_category` VALUES ('18', '交流空间', '0', '', '4', '1', 'Communicate', null, '');
INSERT INTO `hnj_category` VALUES ('19', '常识解答', '18', 'http://www.zghnj.com/index.php/Home/Communicate/knowledge', '0', '1', 'Communicate', 'knowledge', '');
INSERT INTO `hnj_category` VALUES ('20', '会员专属', '18', 'http://www.zghnj.com/index.php/Home/Communicate/exclusive', '1', '1', 'Communicate', 'exclusive', '');
INSERT INTO `hnj_category` VALUES ('21', '网上商城', '0', '#', '5', '1', '', null, '');
INSERT INTO `hnj_category` VALUES ('23', '经典解析', '18', 'http://www.zghnj.com/index.php/Home/Communicate/analysis', '2', '1', 'Communicate', 'analysis', '');

-- ----------------------------
-- Table structure for `hnj_link`
-- ----------------------------
DROP TABLE IF EXISTS `hnj_link`;
CREATE TABLE `hnj_link` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(150) DEFAULT NULL COMMENT '名称',
  `picture` varchar(100) DEFAULT NULL COMMENT 'logo',
  `href` varchar(100) DEFAULT NULL COMMENT '链接',
  `sort` int(11) DEFAULT '0' COMMENT '排序',
  `is_show` tinyint(2) unsigned DEFAULT '0' COMMENT '0隐藏1显示',
  `ctime` char(20) DEFAULT '' COMMENT '添加时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of hnj_link
-- ----------------------------
INSERT INTO `hnj_link` VALUES ('2', '', '/Public/Upl/link/2017-08-08/59895631f1f0f.jpg', '', '0', '1', '1502172720');
INSERT INTO `hnj_link` VALUES ('3', '', '/Public/Upl/link/2017-08-08/598956470d79c.jpg', '', '0', '1', '1502172741');
INSERT INTO `hnj_link` VALUES ('4', '', '/Public/Upl/link/2017-08-08/5989565936fd3.jpg', '', '0', '1', '1502172760');
INSERT INTO `hnj_link` VALUES ('5', '', '/Public/Upl/link/2017-08-08/59895669bd40d.jpg', '', '0', '1', '1502172776');
INSERT INTO `hnj_link` VALUES ('6', '', '/Public/Upl/link/2017-08-08/598956792713d.jpg', '', '0', '1', '1502172792');
INSERT INTO `hnj_link` VALUES ('7', '', '/Public/Upl/link/2017-08-08/5989568c54fff.jpg', '', '0', '1', '1502172811');
INSERT INTO `hnj_link` VALUES ('8', '', '/Public/Upl/link/2017-08-08/598956a424428.jpg', '', '0', '1', '1502172834');
INSERT INTO `hnj_link` VALUES ('9', '', '/Public/Upl/link/2017-08-08/598956b45ddc1.jpg', '', '0', '1', '1502172851');
INSERT INTO `hnj_link` VALUES ('10', '', '/Public/Upl/link/2017-08-08/598956c2d18a5.jpg', '', '0', '1', '1502172865');
INSERT INTO `hnj_link` VALUES ('11', '', '/Public/Upl/link/2017-08-08/598956d3494b9.jpg', '', '0', '1', '1502172882');
INSERT INTO `hnj_link` VALUES ('12', '', '/Public/Upl/link/2017-08-08/598956e413161.jpg', '', '0', '1', '1502172898');
INSERT INTO `hnj_link` VALUES ('13', '', '/Public/Upl/link/2017-08-08/598956f340f3d.jpg', '', '0', '1', '1502172914');

-- ----------------------------
-- Table structure for `hnj_member`
-- ----------------------------
DROP TABLE IF EXISTS `hnj_member`;
CREATE TABLE `hnj_member` (
  `uid` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `ctime` int(10) unsigned NOT NULL COMMENT '时间',
  `role_id` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '角色id',
  `phone` varchar(32) DEFAULT NULL COMMENT '手机',
  PRIMARY KEY (`uid`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COMMENT='角色表';

-- ----------------------------
-- Records of hnj_member
-- ----------------------------
INSERT INTO `hnj_member` VALUES ('1', 'admin', 'e10adc3949ba59abbe56e057f20f883e', '1500973000', '1', '18317722781');
INSERT INTO `hnj_member` VALUES ('5', 'test', 'e10adc3949ba59abbe56e057f20f883e', '1501137637', '3', '2312');

-- ----------------------------
-- Table structure for `hnj_news`
-- ----------------------------
DROP TABLE IF EXISTS `hnj_news`;
CREATE TABLE `hnj_news` (
  `news_id` int(32) unsigned NOT NULL AUTO_INCREMENT COMMENT '文章id',
  `title` varchar(255) DEFAULT '' COMMENT '标题',
  `keyword` varchar(255) DEFAULT '' COMMENT '关键字',
  `author` varchar(32) DEFAULT NULL COMMENT '作者',
  `datetime` char(20) DEFAULT '' COMMENT '活动日期',
  `content` text COMMENT '文章内容',
  `add_time` int(11) DEFAULT NULL COMMENT '添加时间',
  `upd_time` int(11) DEFAULT NULL COMMENT '修改时间',
  `sort` int(32) DEFAULT NULL COMMENT '排序',
  `url` varchar(255) DEFAULT NULL COMMENT '外部连接地址',
  `pic` char(255) DEFAULT NULL COMMENT '新闻展示图片',
  `cat_id` int(32) unsigned NOT NULL DEFAULT '0' COMMENT '类别ID',
  `is_show` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0:显示,1;隐藏',
  `is_tui` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0:否,1;是',
  `auth` tinyint(2) unsigned DEFAULT '0' COMMENT '阅读权限0表示没有权限限制',
  `address` char(150) DEFAULT NULL COMMENT '活动地址',
  `endtime` char(20) DEFAULT '',
  PRIMARY KEY (`news_id`)
) ENGINE=MyISAM AUTO_INCREMENT=41 DEFAULT CHARSET=utf8 COMMENT='新闻表';

-- ----------------------------
-- Records of hnj_news
-- ----------------------------
INSERT INTO `hnj_news` VALUES ('1', '日方公布上月美菲撞船事故调查结果：责任可能在美方', '', '韦博雅', '', '<p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px; list-style: none; font-size: 14px; line-height: 26px; font-family: SimSun; color: rgb(43, 43, 43); white-space: normal; overflow: visible !important;\">【环球网报道 实习记者 韦博雅】新加坡《联合早报》26日引用日本媒体报道称，上月在日本静冈县附近海域美国海军神盾驱逐舰“菲茨杰拉德号”和菲律宾籍集装箱货轮相撞事故调查结果已出。日本海上保安厅对当事货轮的雷达记录等进行了分析后，结果显示，事发时负有避开冲撞义务的有可能是美方驱逐舰。</p><p style=\"margin: 23px auto 0px; padding: 0px; list-style: none; font-size: 14px; line-height: 26px; font-family: SimSun; color: rgb(43, 43, 43); white-space: normal; overflow: visible !important;\">　　分析结果显示，菲方货轮在事发时正在向东航行，而“菲茨杰拉德号”在货轮左前方，向西南方向航行，双方的航线交叉，存在相撞危险。</p><p style=\"margin: 23px auto 0px; padding: 0px; list-style: none; font-size: 14px; line-height: 26px; font-family: SimSun; color: rgb(43, 43, 43); white-space: normal; overflow: visible !important;\">　　根据日本《海上撞船事故防止法》的相关规定，当对方船只处于己方右手一侧时，己方负有采取避开冲撞措施的责任。因此，以上分析结果显示，负有避开冲撞义务的有可能是美军驱逐舰。</p><p><br/></p>', '1501063742', '1501151835', '0', 'http://world.huanqiu.com/exclusive/2017-07/11037618.html?from=bdwz', './Public/Upd/news/', '6', '0', '0', '0', null, '');
INSERT INTO `hnj_news` VALUES ('2', 'ds', '', 'd', '', '<p>ew</p>', '1501206176', '1501206176', '1', 'fd', './Public/Upd/news/', '6', '0', '0', '0', null, '');
INSERT INTO `hnj_news` VALUES ('4', '习近平明确下半年中国经济总基调：稳中求进不是无所作为', '', '', '', '<p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px; list-style: none; outline: none; border: 0px; line-height: 30px; width: 1000px; float: left; text-indent: 2em; word-break: break-all; color: rgb(51, 51, 51); font-family: 微软雅黑, Verdana, Geneva, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);\">参考消息网8月1日报道 美媒称，中国的智能手机用户已习惯使用微信给朋友们发信息、支付餐厅账单、打车、玩游戏并观看视频，这使他们对换一部新iPhone手机的需求减弱，也令苹果在中国市场的攻势威力大减。</p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px; list-style: none; outline: none; border: 0px; line-height: 30px; width: 1000px; float: left; text-indent: 2em; word-break: break-all; color: rgb(51, 51, 51); font-family: 微软雅黑, Verdana, Geneva, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);\">据美国《华尔街日报》7月31日刊登题为《苹果在中国最难对付的对手是微信》的文章称，王婷婷（音）是上海的一个销售助理，去年她扔掉了自己的iPhone 5，换成了华为P9 Plus，她没发现有多大区别：两部手机都能运行微信，这是她和数百万中国消费者最常使用的一款应用。24岁的王婷婷说，她一点都不怀念苹果。</p><p><br/></p>', '1502157914', '1502157914', '0', '', './Public/Upd/news/', '0', '0', '0', '0', null, '');
INSERT INTO `hnj_news` VALUES ('5', '新华社、中新社、重庆日报等十二', '', '', '', '<p>随着科技的日新月异，我们秉承创新、专业高质的质量方针。一直致力于产品的研发创新，在功能设计、能量数据、用料选择随着科技的日新月异，我们秉承创新、专业高质的质量方针。一直致力于产品的研发创新，在功能设计、能量数据、用料选择随着科技的日新月异，我们秉承创新、专业高质的质量方针。一直致力于产品的研发创新，在功能设计、能量数据、用料选择随着科技的日新月异，我们秉承创新、专业高质的质量方针。一直致力于产品的研发创新，在功能设计、能量数据、用料选择随着科技的日新月异，我们秉承创新、专业高质的质量方针。一直致力于产品的研发创新，在功能设计、能量数据、用料选择随着科技的日新月异，我们秉承创新、专业高质的质量方针。一直致力于产品的研发创新，在功能设计、能量数据、用料选择随着科技的日新月异，我们秉承创新、专业高质的质量方针。一直致力于产品的研发创新，在功能设计、能量数据、用料选择随着科技的日新月异，我们秉承创新、专业高质的质量方针。一直致力于产品的研发创新，在功能设计、能量数据、用料选择随着科技的日新月异，我们秉承创新、专业高质的质量方针。一直致力于产品的研发创新，在功能设计、能量数据、用料选择随着科技的日新月异，我们秉承创新、专业高质的质量方针。一直致力于产品的研发创新，在功能设计、能量数据、用料选择随着科技的日新月异，我们秉承创新、专业高质的质量方针。一直致力于产品的研发创新，在功能设计、能量数据、用料选择随着科技的日新月异，我们秉承创新、专业高质的质量方针。一直致力于产品的研发创新，在功能设计、能量数据、用料选择</p>', '1502161258', '1502161258', '0', '', './Public/Upd/news/2017-08-08/5989296aebe46.jpg', '6', '0', '0', '0', null, '');
INSERT INTO `hnj_news` VALUES ('6', '电池铝塑膜软包项目各项子协议', '', '', '', '<p>我司与凸版印刷株式会社、东洋制罐株式会社及株式会社T&amp;T Enertechno共同在深圳市华侨城洲际酒店举行了我司与凸版印刷株式会社、东洋制罐株式会社及株式会社T&amp;T Enertechno共同在深圳市华侨城洲际酒店举行了我司与凸版印刷株式会社、东洋制罐株式会社及株式会社T&amp;T Enertechno共同在深圳市华侨城洲际酒店举行了我司与凸版印刷株式会社、东洋制罐株式会社及株式会社T&amp;T Enertechno共同在深圳市华侨城洲际酒店举行了我司与凸版印刷株式会社、东洋制罐株式会社及株式会社T&amp;T Enertechno共同在深圳市华侨城洲际酒店举行了我司与凸版印刷株式会社、东洋制罐株式会社及株式会社T&amp;T Enertechno共同在深圳市华侨城洲际酒店举行了我司与凸版印刷株式会社、东洋制罐株式会社及株式会社T&amp;T Enertechno共同在深圳市华侨城洲际酒店举行了我司与凸版印刷株式会社、东洋制罐株式会社及株式会社T&amp;T Enertechno共同在深圳市华侨城洲际酒店举行了我司与凸版印刷株式会社、东洋制罐株式会社及株式会社T&amp;T Enertechno共同在深圳市华侨城洲际酒店举行了我司与凸版印刷株式会社、东洋制罐株式会社及株式会社T&amp;T Enertechno共同在深圳市华侨城洲际酒店举行了我司与凸版印刷株式会社、东洋制罐株式会社及株式会社T&amp;T Enertechno共同在深圳市华侨城洲际酒店举行了我司与凸版印刷株式会社、东洋制罐株式会社及株式会社T&amp;T Enertechno共同在深圳市华侨城洲际酒店举行了</p>', '1502161304', '1502161367', '0', '', './Public/Upd/news/2017-08-08/598929981ef85.jpg', '6', '0', '0', '0', null, '');
INSERT INTO `hnj_news` VALUES ('7', '科技扩大常州投资合作领域', '', '', '', '<p>阎立同时会见了随同来访的日本凸版印刷株式会社高层，并探讨了多方合作的可能性；常州市副市长张耀钢武进区主要领阎立同时会见了随同来访的日本凸版印刷株式会社高层，并探讨了多方合作的可能性；常州市副市长张耀钢武进区主要领阎立同时会见了随同来访的日本凸版印刷株式会社高层，并探讨了多方合作的可能性；常州市副市长张耀钢武进区主要领阎立同时会见了随同来访的日本凸版印刷株式会社高层，并探讨了多方合作的可能性；常州市副市长张耀钢武进区主要领阎立同时会见了随同来访的日本凸版印刷株式会社高层，并探讨了多方合作的可能性；常州市副市长张耀钢武进区主要领阎立同时会见了随同来访的日本凸版印刷株式会社高层，并探讨了多方合作的可能性；常州市副市长张耀钢武进区主要领阎立同时会见了随同来访的日本凸版印刷株式会社高层，并探讨了多方合作的可能性；常州市副市长张耀钢武进区主要领阎立同时会见了随同来访的日本凸版印刷株式会社高层，并探讨了多方合作的可能性；常州市副市长张耀钢武进区主要领阎立同时会见了随同来访的日本凸版印刷株式会社高层，并探讨了多方合作的可能性；常州市副市长张耀钢武进区主要领阎立同时会见了随同来访的日本凸版印刷株式会社高层，并探讨了多方合作的可能性；常州市副市长张耀钢武进区主要领阎立同时会见了随同来访的日本凸版印刷株式会社高层，并探讨了多方合作的可能性；常州市副市长张耀钢武进区主要领阎立同时会见了随同来访的日本凸版印刷株式会社高层，并探讨了多方合作的可能性；常州市副市长张耀钢武进区主要领阎立同时会见了随同来访的日本凸版印刷株式会社高层，并探讨了多方合作的可能性；常州市副市长张耀钢武进区主要领阎立同时会见了随同来访的日本凸版印刷株式会社高层，并探讨了多方合作的可能性；常州市副市长张耀钢武进区主要领阎立同时会见了随同来访的日本凸版印刷株式会社高层，并探讨了多方合作的可能性；常州市副市长张耀钢武进区主要领阎立同时会见了随同来访的日本凸版印刷株式会社高层，并探讨了多方合作的可能性；常州市副市长张耀钢武进区主要领阎立同时会见了随同来访的日本凸版印刷株式会社高层，并探讨了多方合作的可能性；常州市副市长张耀钢武进区主要领阎立同时会见了随同来访的日本凸版印刷株式会社高层，并探讨了多方合作的可能性；常州市副市长张耀钢武进区主要领阎立同时会见了随同来访的日本凸版印刷株式会社高层，并探讨了多方合作的可能性；常州市副市长张耀钢武进区主要领</p>', '1502161345', '1502161381', '0', '', './Public/Upd/news/2017-08-08/598929c1cae48.jpg', '6', '0', '0', '0', null, '');
INSERT INTO `hnj_news` VALUES ('8', '研究生联合培养基地签约仪式', '', '', '', '<p>此次双方的合作可谓强强联合、资源共享，公司作为防静电/洁净室行业的龙头企业，伴随着国内产业的转型与升级此次双方的合作可谓强强联合、资源共享，公司作为防静电/洁净室行业的龙头企业，伴随着国内产业的转型与升级此次双方的合作可谓强强联合、资源共享，公司作为防静电/洁净室行业的龙头企业，伴随着国内产业的转型与升级此次双方的合作可谓强强联合、资源共享，公司作为防静电/洁净室行业的龙头企业，伴随着国内产业的转型与升级此次双方的合作可谓强强联合、资源共享，公司作为防静电/洁净室行业的龙头企业，伴随着国内产业的转型与升级此次双方的合作可谓强强联合、资源共享，公司作为防静电/洁净室行业的龙头企业，伴随着国内产业的转型与升级此次双方的合作可谓强强联合、资源共享，公司作为防静电/洁净室行业的龙头企业，伴随着国内产业的转型与升级此次双方的合作可谓强强联合、资源共享，公司作为防静电/洁净室行业的龙头企业，伴随着国内产业的转型与升级此次双方的合作可谓强强联合、资源共享，公司作为防静电/洁净室行业的龙头企业，伴随着国内产业的转型与升级此次双方的合作可谓强强联合、资源共享，公司作为防静电/洁净室行业的龙头企业，伴随着国内产业的转型与升级此次双方的合作可谓强强联合、资源共享，公司作为防静电/洁净室行业的龙头企业，伴随着国内产业的转型与升级此次双方的合作可谓强强联合、资源共享，公司作为防静电/洁净室行业的龙头企业，伴随着国内产业的转型与升级</p>', '1502161452', '1502161452', '0', '', './Public/Upd/news/2017-08-08/59892a2c5b51b.jpg', '6', '0', '0', '0', null, '');
INSERT INTO `hnj_news` VALUES ('9', '图文解读混凝土修补技巧', '', '', '', '<p>建筑面积：720000 m2，主要使用功能：共27 栋高层住宅(25~33 层)配套的2 层商业、3 个大型地下停车车库及1 栋幼儿园。结构形式高层住宅采用钢筋混凝土剪力墙结构体系，地下车库、幼儿园采用钢筋混凝土框架结构体系。建筑面积：720000 m2，主要使用功能：共27 栋高层住宅(25~33 层)配套的2 层商业、3 个大型地下停车车库及1 栋幼儿园。结构形式高层住宅采用钢筋混凝土剪力墙结构体系，地下车库、幼儿园采用钢筋混凝土框架结构体系。建筑面积：720000 m2，主要使用功能：共27 栋高层住宅(25~33 层)配套的2 层商业、3 个大型地下停车车库及1 栋幼儿园。结构形式高层住宅采用钢筋混凝土剪力墙结构体系，地下车库、幼儿园采用钢筋混凝土框架结构体系。</p>', '1502164065', '1502164127', '0', '', './Public/Upd/news/2017-08-08/5989349fc7fcf.jpg', '3', '0', '0', '0', null, '');
INSERT INTO `hnj_news` VALUES ('10', '图文解读混凝土修补技巧', '', '', '', '<p>建筑面积：720000 m2，主要使用功能：共27 栋高层住宅(25~33 层)配套的2 层商业、3 个大型地下停车车库及1 栋幼儿园。结构形式高层住宅采用钢筋混凝土剪力墙结构体系，地下车库、幼儿园采用钢筋混凝土框架结构体系。建筑面积：720000 m2，主要使用功能：共27 栋高层住宅(25~33 层)配套的2 层商业、3 个大型地下停车车库及1 栋幼儿园。结构形式高层住宅采用钢筋混凝土剪力墙结构体系，地下车库、幼儿园采用钢筋混凝土框架结构体系。建筑面积：720000 m2，主要使用功能：共27 栋高层住宅(25~33 层)配套的2 层商业、3 个大型地下停车车库及1 栋幼儿园。结构形式高层住宅采用钢筋混凝土剪力墙结构体系，地下车库、幼儿园采用钢筋混凝土框架结构体系。</p>', '1502164081', '1502164147', '0', '', './Public/Upd/news/2017-08-08/598934b389c48.jpg', '3', '0', '0', '0', null, '');
INSERT INTO `hnj_news` VALUES ('11', '图文解读混凝土修补技巧', '', '', '', '<p>建筑面积：720000 m2，主要使用功能：共27 栋高层住宅(25~33 层)配套的2 层商业、3 个大型地下停车车库及1 栋幼儿园。结构形式高层住宅采用钢筋混凝土剪力墙结构体系，地下车库、幼儿园采用钢筋混凝土框架结构体系。建筑面积：720000 m2，主要使用功能：共27 栋高层住宅(25~33 层)配套的2 层商业、3 个大型地下停车车库及1 栋幼儿园。结构形式高层住宅采用钢筋混凝土剪力墙结构体系，地下车库、幼儿园采用钢筋混凝土框架结构体系。建筑面积：720000 m2，主要使用功能：共27 栋高层住宅(25~33 层)配套的2 层商业、3 个大型地下停车车库及1 栋幼儿园。结构形式高层住宅采用钢筋混凝土剪力墙结构体系，地下车库、幼儿园采用钢筋混凝土框架结构体系。</p>', '1502164098', '1502354208', '0', '', './Public/Upd/news/2017-08-08/598934c8e560a.jpg', '3', '0', '0', '0', null, '');
INSERT INTO `hnj_news` VALUES ('12', '展览会第十届国际触控显示暨应用（深圳）展览会', '', '', '2017-10-02', '', '1502354431', '1502354951', '0', null, './Public/Upd/news/2017-08-10/598c1bffdf714.jpg', '7', '0', '0', '0', '上海新国际展览中心', '');
INSERT INTO `hnj_news` VALUES ('13', 'SEMICON China 2017', '', '', '2017-11-01', '', '1502354511', '1502354511', '0', null, './Public/Upd/news/2017-08-10/598c1c4fbfd7c.jpg', '7', '0', '0', '0', '上海新国际展览中心', '');
INSERT INTO `hnj_news` VALUES ('14', '第53届（2017年春季）全国制药机械博览会暨', '', '', '2017-12-01', '', '1502354561', '1502354561', '0', null, './Public/Upd/news/2017-08-10/598c1c81964d6.jpg', '7', '0', '0', '0', '上海新国际展览中心', '');
INSERT INTO `hnj_news` VALUES ('15', '第53届（2017年春季）全国制药机械博览', '', '', '2017-12-31', '', '1502354604', '1502355333', '0', null, './Public/Upd/news/2017-08-10/598c1f850f143.jpg', '7', '0', '0', '0', '上海新国际展览中心', '');
INSERT INTO `hnj_news` VALUES ('16', '2017世界生化、分析仪器与实验室装备中国展', '', '', '2017-05-31', '<p>新华社北京7月25日电 中共中央政治局7月24日下午就推进军队规模结构和力量编成改革，重塑中国特色现代军事力量体系进行第四十二次集体学习。中共中央总书记习近平在主持学习时强调，深化国防和军队改革是一场攻坚战役，军队要全力以赴，全党全国要大力支持，坚持军地一盘棋，齐心协力完成跨军地改革任务，以实际行动支持国防和军队改革新华社北京7月25日电 中共中央政治局7月24日下午就推进军队规模结构和力量编成改革，重塑中国特色现代军事力量体系进行第四十二次集体学习。中共中央总书记习近平在主持学习时强调，深化国防和军队改革是一场攻坚战役，军队要全力以赴，全党全国要大力支持，坚持军地一盘棋，齐心协力完成跨军地改革任务，以实际行动支持国防和军队改革新华社北京7月25日电 中共中央政治局7月24日下午就推进军队规模结构和力量编成改革，重塑中国特色现代军事力量体系进行第四十二次集体学习。中共中央总书记习近平在主持学习时强调，深化国防和军队改革是一场攻坚战役，军队要全力以赴，全党全国要大力支持，坚持军地一盘棋，齐心协力完成跨军地改革任务，以实际行动支持国防和军队改革新华社北京7月25日电 中共中央政治局7月24日下午就推进军队规模结构和力量编成改革，重塑中国特色现代军事力量体系进行第四十二次集体学习。中共中央总书记习近平在主持学习时强调，深化国防和军队改革是一场攻坚战役，军队要全力以赴，全党全国要大力支持，坚持军地一盘棋，齐心协力完成跨军地改革任务，以实际行动支持国防和军队改革</p>', '1502356081', '1502356279', '0', null, './Public/Upd/news/2017-08-10/598c227168a17.jpg', '7', '0', '0', '0', '上海新国际展览中心', '2017-06-01');
INSERT INTO `hnj_news` VALUES ('17', '2017世界生化、分析仪器与实验室装备中国展2', '', '', '2017-03-31', '<p>新华社北京7月25日电 中共中央政治局7月24日下午就推进军队规模结构和力量编成改革，重塑中国特色现代军事力量体系进行第四十二次集体学习。中共中央总书记习近平在主持学习时强调，深化国防和军队改革是一场攻坚战役，军队要全力以赴，全党全国要大力支持，坚持军地一盘棋，齐心协力完成跨军地改革任务，以实际行动支持国防和军队改革新华社北京7月25日电 中共中央政治局7月24日下午就推进军队规模结构和力量编成改革，重塑中国特色现代军事力量体系进行第四十二次集体学习。中共中央总书记习近平在主持学习时强调，深化国防和军队改革是一场攻坚战役，军队要全力以赴，全党全国要大力支持，坚持军地一盘棋，齐心协力完成跨军地改革任务，以实际行动支持国防和军队改革新华社北京7月25日电 中共中央政治局7月24日下午就推进军队规模结构和力量编成改革，重塑中国特色现代军事力量体系进行第四十二次集体学习。中共中央总书记习近平在主持学习时强调，深化国防和军队改革是一场攻坚战役，军队要全力以赴，全党全国要大力支持，坚持军地一盘棋，齐心协力完成跨军地改革任务，以实际行动支持国防和军队改革新华社北京7月25日电 中共中央政治局7月24日下午就推进军队规模结构和力量编成改革，重塑中国特色现代军事力量体系进行第四十二次集体学习。中共中央总书记习近平在主持学习时强调，深化国防和军队改革是一场攻坚战役，军队要全力以赴，全党全国要大力支持，坚持军地一盘棋，齐心协力完成跨军地改革任务，以实际行动支持国防和军队改革</p>', '1502356175', '1502356267', '0', null, './Public/Upd/news/2017-08-10/598c22cfd9472.jpg', '7', '0', '0', '0', '上海新国际展览中心', '2017-04-05');
INSERT INTO `hnj_news` VALUES ('18', '2017世界生化、分析仪器与实验室装备中国展3', '', '', '2017-02-31', '<p>新华社北京7月25日电 中共中央政治局7月24日下午就推进军队规模结构和力量编成改革，重塑中国特色现代军事力量体系进行第四十二次集体学习。中共中央总书记习近平在主持学习时强调，深化国防和军队改革是一场攻坚战役，军队要全力以赴，全党全国要大力支持，坚持军地一盘棋，齐心协力完成跨军地改革任务，以实际行动支持国防和军队改革新华社北京7月25日电 中共中央政治局7月24日下午就推进军队规模结构和力量编成改革，重塑中国特色现代军事力量体系进行第四十二次集体学习。中共中央总书记习近平在主持学习时强调，深化国防和军队改革是一场攻坚战役，军队要全力以赴，全党全国要大力支持，坚持军地一盘棋，齐心协力完成跨军地改革任务，以实际行动支持国防和军队改革新华社北京7月25日电 中共中央政治局7月24日下午就推进军队规模结构和力量编成改革，重塑中国特色现代军事力量体系进行第四十二次集体学习。中共中央总书记习近平在主持学习时强调，深化国防和军队改革是一场攻坚战役，军队要全力以赴，全党全国要大力支持，坚持军地一盘棋，齐心协力完成跨军地改革任务，以实际行动支持国防和军队改革新华社北京7月25日电 中共中央政治局7月24日下午就推进军队规模结构和力量编成改革，重塑中国特色现代军事力量体系进行第四十二次集体学习。中共中央总书记习近平在主持学习时强调，深化国防和军队改革是一场攻坚战役，军队要全力以赴，全党全国要大力支持，坚持军地一盘棋，齐心协力完成跨军地改革任务，以实际行动支持国防和军队改革新华社北京7月25日电 中共中央政治局7月24日下午就推进军队规模结构和力量编成改革，重塑中国特色现代军事力量体系进行第四十二次集体学习。中共中央总书记习近平在主持学习时强调，深化国防和军队改革是一场攻坚战役，军队要全力以赴，全党全国要大力支持，坚持军地一盘棋，齐心协力完成跨军地改革任务，以实际行动支持国防和军队改革</p>', '1502356199', '1502356257', '0', null, './Public/Upd/news/2017-08-10/598c22e7a80cb.jpg', '7', '0', '0', '0', '上海新国际展览中心', '2017-03-21');
INSERT INTO `hnj_news` VALUES ('19', '2017世界生化、分析仪器与实验室装备中国展4', '', '', '2017-01-31', '<p>新华社北京7月25日电 中共中央政治局7月24日下午就推进军队规模结构和力量编成改革，重塑中国特色现代军事力量体系进行第四十二次集体学习。中共中央总书记习近平在主持学习时强调，深化国防和军队改革是一场攻坚战役，军队要全力以赴，全党全国要大力支持，坚持军地一盘棋，齐心协力完成跨军地改革任务，以实际行动支持国防和军队改革新华社北京7月25日电 中共中央政治局7月24日下午就推进军队规模结构和力量编成改革，重塑中国特色现代军事力量体系进行第四十二次集体学习。中共中央总书记习近平在主持学习时强调，深化国防和军队改革是一场攻坚战役，军队要全力以赴，全党全国要大力支持，坚持军地一盘棋，齐心协力完成跨军地改革任务，以实际行动支持国防和军队改革新华社北京7月25日电 中共中央政治局7月24日下午就推进军队规模结构和力量编成改革，重塑中国特色现代军事力量体系进行第四十二次集体学习。中共中央总书记习近平在主持学习时强调，深化国防和军队改革是一场攻坚战役，军队要全力以赴，全党全国要大力支持，坚持军地一盘棋，齐心协力完成跨军地改革任务，以实际行动支持国防和军队改革新华社北京7月25日电 中共中央政治局7月24日下午就推进军队规模结构和力量编成改革，重塑中国特色现代军事力量体系进行第四十二次集体学习。中共中央总书记习近平在主持学习时强调，深化国防和军队改革是一场攻坚战役，军队要全力以赴，全党全国要大力支持，坚持军地一盘棋，齐心协力完成跨军地改革任务，以实际行动支持国防和军队改革</p>', '1502356222', '1502356246', '0', null, './Public/Upd/news/2017-08-10/598c22fe56d2b.jpg', '7', '0', '0', '0', '上海新国际展览中心', '2017-05-31');
INSERT INTO `hnj_news` VALUES ('20', '拯救特殊的服务业，互联网诊所行吗？3', '', '韦博雅', '', '<p><span style=\"color: rgb(119, 119, 119); font-family: 微软雅黑, Verdana, Geneva, sans-serif; font-size: 14px; line-height: 24px; background-color: rgb(255, 255, 255);\">新华社北京7月25日电 中共中央政治局7月24日下午就推进军队规模结构和力量编成改革，重塑中国特色现代</span><span style=\"color: rgb(119, 119, 119); font-family: 微软雅黑, Verdana, Geneva, sans-serif; font-size: 14px; line-height: 24px; background-color: rgb(255, 255, 255);\">新华社北京7月25日电 中共中央政治局7月24日下午就推进军队规模结构和力量编成改革，重塑中国特色现代</span><span style=\"color: rgb(119, 119, 119); font-family: 微软雅黑, Verdana, Geneva, sans-serif; font-size: 14px; line-height: 24px; background-color: rgb(255, 255, 255);\">新华社北京7月25日电 中共中央政治局7月24日下午就推进军队规模结构和力量编成改革，重塑中国特色现代</span><span style=\"color: rgb(119, 119, 119); font-family: 微软雅黑, Verdana, Geneva, sans-serif; font-size: 14px; line-height: 24px; background-color: rgb(255, 255, 255);\">新华社北京7月25日电 中共中央政治局7月24日下午就推进军队规模结构和力量编成改革，重塑中国特色现代</span><span style=\"color: rgb(119, 119, 119); font-family: 微软雅黑, Verdana, Geneva, sans-serif; font-size: 14px; line-height: 24px; background-color: rgb(255, 255, 255);\">新华社北京7月25日电 中共中央政治局7月24日下午就推进军队规模结构和力量编成改革，重塑中国特色现代</span><span style=\"color: rgb(119, 119, 119); font-family: 微软雅黑, Verdana, Geneva, sans-serif; font-size: 14px; line-height: 24px; background-color: rgb(255, 255, 255);\">新华社北京7月25日电 中共中央政治局7月24日下午就推进军队规模结构和力量编成改革，重塑中国特色现代</span><span style=\"color: rgb(119, 119, 119); font-family: 微软雅黑, Verdana, Geneva, sans-serif; font-size: 14px; line-height: 24px; background-color: rgb(255, 255, 255);\">新华社北京7月25日电 中共中央政治局7月24日下午就推进军队规模结构和力量编成改革，重塑中国特色现代</span><span style=\"color: rgb(119, 119, 119); font-family: 微软雅黑, Verdana, Geneva, sans-serif; font-size: 14px; line-height: 24px; background-color: rgb(255, 255, 255);\">新华社北京7月25日电 中共中央政治局7月24日下午就推进军队规模结构和力量编成改革，重塑中国特色现代</span><span style=\"color: rgb(119, 119, 119); font-family: 微软雅黑, Verdana, Geneva, sans-serif; font-size: 14px; line-height: 24px; background-color: rgb(255, 255, 255);\">新华社北京7月25日电 中共中央政治局7月24日下午就推进军队规模结构和力量编成改革，重塑中国特色现代</span><span style=\"color: rgb(119, 119, 119); font-family: 微软雅黑, Verdana, Geneva, sans-serif; font-size: 14px; line-height: 24px; background-color: rgb(255, 255, 255);\">新华社北京7月25日电 中共中央政治局7月24日下午就推进军队规模结构和力量编成改革，重塑中国特色现代</span><span style=\"color: rgb(119, 119, 119); font-family: 微软雅黑, Verdana, Geneva, sans-serif; font-size: 14px; line-height: 24px; background-color: rgb(255, 255, 255);\">新华社北京7月25日电 中共中央政治局7月24日下午就推进军队规模结构和力量编成改革，重塑中国特色现代</span><span style=\"color: rgb(119, 119, 119); font-family: 微软雅黑, Verdana, Geneva, sans-serif; font-size: 14px; line-height: 24px; background-color: rgb(255, 255, 255);\">新华社北京7月25日电 中共中央政治局7月24日下午就推进军队规模结构和力量编成改革，重塑中国特色现代</span><span style=\"color: rgb(119, 119, 119); font-family: 微软雅黑, Verdana, Geneva, sans-serif; font-size: 14px; line-height: 24px; background-color: rgb(255, 255, 255);\">新华社北京7月25日电 中共中央政治局7月24日下午就推进军队规模结构和力量编成改革，重塑中国特色现代</span><span style=\"color: rgb(119, 119, 119); font-family: 微软雅黑, Verdana, Geneva, sans-serif; font-size: 14px; line-height: 24px; background-color: rgb(255, 255, 255);\">新华社北京7月25日电 中共中央政治局7月24日下午就推进军队规模结构和力量编成改革，重塑中国特色现代</span><span style=\"color: rgb(119, 119, 119); font-family: 微软雅黑, Verdana, Geneva, sans-serif; font-size: 14px; line-height: 24px; background-color: rgb(255, 255, 255);\">新华社北京7月25日电 中共中央政治局7月24日下午就推进军队规模结构和力量编成改革，重塑中国特色现代</span><span style=\"color: rgb(119, 119, 119); font-family: 微软雅黑, Verdana, Geneva, sans-serif; font-size: 14px; line-height: 24px; background-color: rgb(255, 255, 255);\">新华社北京7月25日电 中共中央政治局7月24日下午就推进军队规模结构和力量编成改革，重塑中国特色现代</span><span style=\"color: rgb(119, 119, 119); font-family: 微软雅黑, Verdana, Geneva, sans-serif; font-size: 14px; line-height: 24px; background-color: rgb(255, 255, 255);\">新华社北京7月25日电 中共中央政治局7月24日下午就推进军队规模结构和力量编成改革，重塑中国特色现代</span><span style=\"color: rgb(119, 119, 119); font-family: 微软雅黑, Verdana, Geneva, sans-serif; font-size: 14px; line-height: 24px; background-color: rgb(255, 255, 255);\">新华社北京7月25日电 中共中央政治局7月24日下午就推进军队规模结构和力量编成改革，重塑中国特色现代</span></p>', '1502430752', '1502432293', '0', null, './Public/Upd/news/', '3', '0', '0', '0', null, '');
INSERT INTO `hnj_news` VALUES ('21', '公司高度重视科技创新将科技创新纳入', '', '', '', '<p><span style=\"color: rgb(119, 119, 119); font-family: 微软雅黑, Verdana, Geneva, sans-serif; font-size: 14px; line-height: 24px; background-color: rgb(255, 255, 255);\">新华社北京7月25日电 中共中央政治局7月24日下午就推进军队规模结构和力量编成改革，重塑中国特色现代军事力量体系进行第四十二次集体学习。中共中央总书记习近平在主持学习时强调，深化国防和军队改革是一场攻坚战役，军队要全力以赴，全党全国要大力支持，坚持军地一盘棋，齐心协力完成跨军地改革任务，以实际行动支持国防和军队改革</span><span style=\"color: rgb(119, 119, 119); font-family: 微软雅黑, Verdana, Geneva, sans-serif; font-size: 14px; line-height: 24px; background-color: rgb(255, 255, 255);\">新华社北京7月25日电 中共中央政治局7月24日下午就推进军队规模结构和力量编成改革，重塑中国特色现代军事力量体系进行第四十二次集体学习。中共中央总书记习近平在主持学习时强调，深化国防和军队改革是一场攻坚战役，军队要全力以赴，全党全国要大力支持，坚持军地一盘棋，齐心协力完成跨军地改革任务，以实际行动支持国防和军队改革</span><span style=\"color: rgb(119, 119, 119); font-family: 微软雅黑, Verdana, Geneva, sans-serif; font-size: 14px; line-height: 24px; background-color: rgb(255, 255, 255);\">新华社北京7月25日电 中共中央政治局7月24日下午就推进军队规模结构和力量编成改革，重塑中国特色现代军事力量体系进行第四十二次集体学习。中共中央总书记习近平在主持学习时强调，深化国防和军队改革是一场攻坚战役，军队要全力以赴，全党全国要大力支持，坚持军地一盘棋，齐心协力完成跨军地改革任务，以实际行动支持国防和军队改革</span></p>', '1502431332', '1502431601', '0', null, './Public/Upd/news/2017-08-11/598d49718d76f.jpg', '4', '0', '0', '0', null, '');
INSERT INTO `hnj_news` VALUES ('22', '公司高度重视科技创新将科技创新纳入企业发展战略首位', '', '', '', '<p><span style=\"color: rgb(119, 119, 119); font-family: 微软雅黑, Verdana, Geneva, sans-serif; font-size: 14px; line-height: 24px; background-color: rgb(255, 255, 255);\">新华社北京7月25日电 中共中央政治局7月24日下午就推进军队规模结构和力量编成改革，重塑中国特色现代军事力量体系进行第四十二次集体学习。中共中央总书记习近平在主持学习时强调，深化国防和军队改革是一场攻坚战役，军队要全力以赴，全党全国要大力支持，坚持军地一盘棋，齐心协力完成跨军地改革任务，以实际行动支持国防和军队改革</span><span style=\"color: rgb(119, 119, 119); font-family: 微软雅黑, Verdana, Geneva, sans-serif; font-size: 14px; line-height: 24px; background-color: rgb(255, 255, 255);\">新华社北京7月25日电 中共中央政治局7月24日下午就推进军队规模结构和力量编成改革，重塑中国特色现代军事力量体系进行第四十二次集体学习。中共中央总书记习近平在主持学习时强调，深化国防和军队改革是一场攻坚战役，军队要全力以赴，全党全国要大力支持，坚持军地一盘棋，齐心协力完成跨军地改革任务，以实际行动支持国防和军队改革</span><span style=\"color: rgb(119, 119, 119); font-family: 微软雅黑, Verdana, Geneva, sans-serif; font-size: 14px; line-height: 24px; background-color: rgb(255, 255, 255);\">新华社北京7月25日电 中共中央政治局7月24日下午就推进军队规模结构和力量编成改革，重塑中国特色现代军事力量体系进行第四十二次集体学习。中共中央总书记习近平在主持学习时强调，深化国防和军队改革是一场攻坚战役，军队要全力以赴，全党全国要大力支持，坚持军地一盘棋，齐心协力完成跨军地改革任务，以实际行动支持国防和军队改革</span></p>', '1502431367', '1502431582', '0', null, './Public/Upd/news/2017-08-11/598d495e306ba.jpg', '4', '0', '0', '0', null, '');
INSERT INTO `hnj_news` VALUES ('23', '公司高度重视科技创新将科技创新纳入企业发展战略首位4', '', '', '', '<p><span style=\"color: rgb(119, 119, 119); font-family: 微软雅黑, Verdana, Geneva, sans-serif; font-size: 14px; line-height: 24px; background-color: rgb(255, 255, 255);\">新华社北京7月25日电 中共中央政治局7月24日下午就推进军队规模结构和力量编成改革，重塑中国特色现代军事力量体系进行第四十二次集体学习。中共中央总书记习近平在主持学习时强调，深化国防和军队改革是一场攻坚战役，军队要全力以赴，全党全国要大力支持，坚持军地一盘棋，齐心协力完成跨军地改革任务，以实际行动支持国防和军队改革</span><span style=\"color: rgb(119, 119, 119); font-family: 微软雅黑, Verdana, Geneva, sans-serif; font-size: 14px; line-height: 24px; background-color: rgb(255, 255, 255);\">新华社北京7月25日电 中共中央政治局7月24日下午就推进军队规模结构和力量编成改革，重塑中国特色现代军事力量体系进行第四十二次集体学习。中共中央总书记习近平在主持学习时强调，深化国防和军队改革是一场攻坚战役，军队要全力以赴，全党全国要大力支持，坚持军地一盘棋，齐心协力完成跨军地改革任务，以实际行动支持国防和军队改革</span><span style=\"color: rgb(119, 119, 119); font-family: 微软雅黑, Verdana, Geneva, sans-serif; font-size: 14px; line-height: 24px; background-color: rgb(255, 255, 255);\">新华社北京7月25日电 中共中央政治局7月24日下午就推进军队规模结构和力量编成改革，重塑中国特色现代军事力量体系进行第四十二次集体学习。中共中央总书记习近平在主持学习时强调，深化国防和军队改革是一场攻坚战役，军队要全力以赴，全党全国要大力支持，坚持军地一盘棋，齐心协力完成跨军地改革任务，以实际行动支持国防和军队改革</span></p>', '1502431392', '1502431557', '0', null, './Public/Upd/news/2017-08-11/598d49457faa7.jpg', '4', '0', '0', '0', null, '');
INSERT INTO `hnj_news` VALUES ('24', '公司高度重视科技创新将科技创新纳入企业发展战略首位3', '', '', '', '<p><span style=\"color: rgb(119, 119, 119); font-family: 微软雅黑, Verdana, Geneva, sans-serif; font-size: 14px; line-height: 24px; background-color: rgb(255, 255, 255);\">新华社北京7月25日电 中共中央政治局7月24日下午就推进军队规模结构和力量编成改革，重塑中国特色现代军事力量体系进行第四十二次集体学习。中共中央总书记习近平在主持学习时强调，深化国防和军队改革是一场攻坚战役，军队要全力以赴，全党全国要大力支持，坚持军地一盘棋，齐心协力完成跨军地改革任务，以实际行动支持国防和军队改革</span><span style=\"color: rgb(119, 119, 119); font-family: 微软雅黑, Verdana, Geneva, sans-serif; font-size: 14px; line-height: 24px; background-color: rgb(255, 255, 255);\">新华社北京7月25日电 中共中央政治局7月24日下午就推进军队规模结构和力量编成改革，重塑中国特色现代军事力量体系进行第四十二次集体学习。中共中央总书记习近平在主持学习时强调，深化国防和军队改革是一场攻坚战役，军队要全力以赴，全党全国要大力支持，坚持军地一盘棋，齐心协力完成跨军地改革任务，以实际行动支持国防和军队改革</span></p>', '1502431412', '1502431533', '0', null, './Public/Upd/news/2017-08-11/598d492d12700.jpg', '4', '0', '0', '0', null, '');
INSERT INTO `hnj_news` VALUES ('25', '公司高度重视科技创新将科技创新纳入企业发展战略首位2', '', '', '', '<p><span style=\"color: rgb(119, 119, 119); font-family: 微软雅黑, Verdana, Geneva, sans-serif; font-size: 14px; line-height: 24px; background-color: rgb(255, 255, 255);\">新华社北京7月25日电 中共中央政治局7月24日下午就推进军队规模结构和力量编成改革，重塑中国特色现代军事力量体系进行第四十二次集体学习。中共中央总书记习近平在主持学习时强调，深化国防和军队改革是一场攻坚战役，军队要全力以赴，全党全国要大力支持，坚持军地一盘棋，齐心协力完成跨军地改革任务，以实际行动支持国防和军队改革</span><span style=\"color: rgb(119, 119, 119); font-family: 微软雅黑, Verdana, Geneva, sans-serif; font-size: 14px; line-height: 24px; background-color: rgb(255, 255, 255);\">新华社北京7月25日电 中共中央政治局7月24日下午就推进军队规模结构和力量编成改革，重塑中国特色现代军事力量体系进行第四十二次集体学习。中共中央总书记习近平在主持学习时强调，深化国防和军队改革是一场攻坚战役，军队要全力以赴，全党全国要大力支持，坚持军地一盘棋，齐心协力完成跨军地改革任务，以实际行动支持国防和军队改革</span><span style=\"color: rgb(119, 119, 119); font-family: 微软雅黑, Verdana, Geneva, sans-serif; font-size: 14px; line-height: 24px; background-color: rgb(255, 255, 255);\">新华社北京7月25日电 中共中央政治局7月24日下午就推进军队规模结构和力量编成改革，重塑中国特色现代军事力量体系进行第四十二次集体学习。中共中央总书记习近平在主持学习时强调，深化国防和军队改革是一场攻坚战役，军队要全力以赴，全党全国要大力支持，坚持军地一盘棋，齐心协力完成跨军地改革任务，以实际行动支持国防和军队改革</span></p>', '1502431428', '1502431512', '0', null, './Public/Upd/news/2017-08-11/598d4918e5569.jpg', '4', '0', '0', '0', null, '');
INSERT INTO `hnj_news` VALUES ('26', '公司高度重视科技创新将科技创新纳入企业发展战略首位1', '', '', '', '<p><span style=\"color: rgb(119, 119, 119); font-family: 微软雅黑, Verdana, Geneva, sans-serif; font-size: 14px; line-height: 24px; background-color: rgb(255, 255, 255);\">新华社北京7月25日电 中共中央政治局7月24日下午就推进军队规模结构和力量编成改革，重塑中国特色现代军事力量体系进行第四十二次集体学习。中共中央总书记习近平在主持学习时强调，深化国防和军队改革是一场攻坚战役，军队要全力以赴，全党全国要大力支持，坚持军地一盘棋，齐心协力完成跨军地改革任务，以实际行动支持国防和军队改革</span><span style=\"color: rgb(119, 119, 119); font-family: 微软雅黑, Verdana, Geneva, sans-serif; font-size: 14px; line-height: 24px; background-color: rgb(255, 255, 255);\">新华社北京7月25日电 中共中央政治局7月24日下午就推进军队规模结构和力量编成改革，重塑中国特色现代军事力量体系进行第四十二次集体学习。中共中央总书记习近平在主持学习时强调，深化国防和军队改革是一场攻坚战役，军队要全力以赴，全党全国要大力支持，坚持军地一盘棋，齐心协力完成跨军地改革任务，以实际行动支持国防和军队改革</span><span style=\"color: rgb(119, 119, 119); font-family: 微软雅黑, Verdana, Geneva, sans-serif; font-size: 14px; line-height: 24px; background-color: rgb(255, 255, 255);\">新华社北京7月25日电 中共中央政治局7月24日下午就推进军队规模结构和力量编成改革，重塑中国特色现代军事力量体系进行第四十二次集体学习。中共中央总书记习近平在主持学习时强调，深化国防和军队改革是一场攻坚战役，军队要全力以赴，全党全国要大力支持，坚持军地一盘棋，齐心协力完成跨军地改革任务，以实际行动支持国防和军队改革</span><span style=\"color: rgb(119, 119, 119); font-family: 微软雅黑, Verdana, Geneva, sans-serif; font-size: 14px; line-height: 24px; background-color: rgb(255, 255, 255);\">新华社北京7月25日电 中共中央政治局7月24日下午就推进军队规模结构和力量编成改革，重塑中国特色现代军事力量体系进行第四十二次集体学习。中共中央总书记习近平在主持学习时强调，深化国防和军队改革是一场攻坚战役，军队要全力以赴，全党全国要大力支持，坚持军地一盘棋，齐心协力完成跨军地改革任务，以实际行动支持国防和军队改革</span><span style=\"color: rgb(119, 119, 119); font-family: 微软雅黑, Verdana, Geneva, sans-serif; font-size: 14px; line-height: 24px; background-color: rgb(255, 255, 255);\">新华社北京7月25日电 中共中央政治局7月24日下午就推进军队规模结构和力量编成改革，重塑中国特色现代军事力量体系进行第四十二次集体学习。中共中央总书记习近平在主持学习时强调，深化国防和军队改革是一场攻坚战役，军队要全力以赴，全党全国要大力支持，坚持军地一盘棋，齐心协力完成跨军地改革任务，以实际行动支持国防和军队改革</span></p>', '1502431443', '1502431491', '0', null, '', '4', '0', '0', '0', null, '');
INSERT INTO `hnj_news` VALUES ('27', '工业化建筑由哪个单位来进行评价？1', '', '', '', '<h3 style=\"margin: 0px; padding: 0px 0px 0px 22px; list-style: none; outline: none; border: 0px; width: 900px; font-size: 18px; display: inline-block; font-weight: normal; text-overflow: ellipsis; overflow: hidden; color: rgb(51, 51, 51); font-family: 微软雅黑, Verdana, Geneva, sans-serif; background-color: rgb(255, 255, 255);\">工业化建筑由哪个单位来进行评价？</h3><h3 style=\"margin: 0px; padding: 0px 0px 0px 22px; list-style: none; outline: none; border: 0px; width: 900px; font-size: 18px; display: inline-block; font-weight: normal; text-overflow: ellipsis; overflow: hidden; color: rgb(51, 51, 51); font-family: 微软雅黑, Verdana, Geneva, sans-serif; background-color: rgb(255, 255, 255);\">工业化建筑由哪个单位来进行评价？</h3><h3 style=\"margin: 0px; padding: 0px 0px 0px 22px; list-style: none; outline: none; border: 0px; width: 900px; font-size: 18px; display: inline-block; font-weight: normal; text-overflow: ellipsis; overflow: hidden; color: rgb(51, 51, 51); font-family: 微软雅黑, Verdana, Geneva, sans-serif; background-color: rgb(255, 255, 255);\">工业化建筑由哪个单位来进行评价？</h3><h3 style=\"margin: 0px; padding: 0px 0px 0px 22px; list-style: none; outline: none; border: 0px; width: 900px; font-size: 18px; display: inline-block; font-weight: normal; text-overflow: ellipsis; overflow: hidden; color: rgb(51, 51, 51); font-family: 微软雅黑, Verdana, Geneva, sans-serif; background-color: rgb(255, 255, 255);\">工业化建筑由哪个单位来进行评价？</h3><h3 style=\"margin: 0px; padding: 0px 0px 0px 22px; list-style: none; outline: none; border: 0px; width: 900px; font-size: 18px; display: inline-block; font-weight: normal; text-overflow: ellipsis; overflow: hidden; color: rgb(51, 51, 51); font-family: 微软雅黑, Verdana, Geneva, sans-serif; background-color: rgb(255, 255, 255);\">工业化建筑由哪个单位来进行评价？</h3><p><br/></p>', '1502434559', '1502434616', '0', null, './Public/Upd/news/', '19', '0', '0', '0', null, '');
INSERT INTO `hnj_news` VALUES ('28', '工业化建筑由哪个单位来进行评价？2', '', '', '', '<h3 style=\"margin: 0px; padding: 0px 0px 0px 22px; list-style: none; outline: none; border: 0px; width: 900px; font-size: 18px; display: inline-block; font-weight: normal; text-overflow: ellipsis; overflow: hidden; color: rgb(51, 51, 51); font-family: 微软雅黑, Verdana, Geneva, sans-serif; background-color: rgb(255, 255, 255);\">工业化建筑由哪个单位来进行评价？</h3><h3 style=\"margin: 0px; padding: 0px 0px 0px 22px; list-style: none; outline: none; border: 0px; width: 900px; font-size: 18px; display: inline-block; font-weight: normal; text-overflow: ellipsis; overflow: hidden; color: rgb(51, 51, 51); font-family: 微软雅黑, Verdana, Geneva, sans-serif; background-color: rgb(255, 255, 255);\">工业化建筑由哪个单位来进行评价？</h3><h3 style=\"margin: 0px; padding: 0px 0px 0px 22px; list-style: none; outline: none; border: 0px; width: 900px; font-size: 18px; display: inline-block; font-weight: normal; text-overflow: ellipsis; overflow: hidden; color: rgb(51, 51, 51); font-family: 微软雅黑, Verdana, Geneva, sans-serif; background-color: rgb(255, 255, 255);\">工业化建筑由哪个单位来进行评价？</h3><h3 style=\"margin: 0px; padding: 0px 0px 0px 22px; list-style: none; outline: none; border: 0px; width: 900px; font-size: 18px; display: inline-block; font-weight: normal; text-overflow: ellipsis; overflow: hidden; color: rgb(51, 51, 51); font-family: 微软雅黑, Verdana, Geneva, sans-serif; background-color: rgb(255, 255, 255);\">工业化建筑由哪个单位来进行评价？</h3><h3 style=\"margin: 0px; padding: 0px 0px 0px 22px; list-style: none; outline: none; border: 0px; width: 900px; font-size: 18px; display: inline-block; font-weight: normal; text-overflow: ellipsis; overflow: hidden; color: rgb(51, 51, 51); font-family: 微软雅黑, Verdana, Geneva, sans-serif; background-color: rgb(255, 255, 255);\">工业化建筑由哪个单位来进行评价？</h3><h3 style=\"margin: 0px; padding: 0px 0px 0px 22px; list-style: none; outline: none; border: 0px; width: 900px; font-size: 18px; display: inline-block; font-weight: normal; text-overflow: ellipsis; overflow: hidden; color: rgb(51, 51, 51); font-family: 微软雅黑, Verdana, Geneva, sans-serif; background-color: rgb(255, 255, 255);\">工业化建筑由哪个单位来进行评价？</h3><p><br/></p>', '1502434631', '1502434643', '0', null, './Public/Upd/news/', '19', '0', '0', '0', null, '');
INSERT INTO `hnj_news` VALUES ('29', '工业化建筑由哪个单位来进行评价？3', '', '', '', '<h3 style=\"margin: 0px; padding: 0px 0px 0px 22px; list-style: none; outline: none; border: 0px; width: 900px; font-size: 18px; display: inline-block; font-weight: normal; text-overflow: ellipsis; overflow: hidden; color: rgb(51, 51, 51); font-family: 微软雅黑, Verdana, Geneva, sans-serif; background-color: rgb(255, 255, 255);\">工业化建筑由哪个单位来进行评价？</h3><h3 style=\"margin: 0px; padding: 0px 0px 0px 22px; list-style: none; outline: none; border: 0px; width: 900px; font-size: 18px; display: inline-block; font-weight: normal; text-overflow: ellipsis; overflow: hidden; color: rgb(51, 51, 51); font-family: 微软雅黑, Verdana, Geneva, sans-serif; background-color: rgb(255, 255, 255);\">工业化建筑由哪个单位来进行评价？</h3><h3 style=\"margin: 0px; padding: 0px 0px 0px 22px; list-style: none; outline: none; border: 0px; width: 900px; font-size: 18px; display: inline-block; font-weight: normal; text-overflow: ellipsis; overflow: hidden; color: rgb(51, 51, 51); font-family: 微软雅黑, Verdana, Geneva, sans-serif; background-color: rgb(255, 255, 255);\">工业化建筑由哪个单位来进行评价？</h3><h3 style=\"margin: 0px; padding: 0px 0px 0px 22px; list-style: none; outline: none; border: 0px; width: 900px; font-size: 18px; display: inline-block; font-weight: normal; text-overflow: ellipsis; overflow: hidden; color: rgb(51, 51, 51); font-family: 微软雅黑, Verdana, Geneva, sans-serif; background-color: rgb(255, 255, 255);\">工业化建筑由哪个单位来进行评价？</h3><h3 style=\"margin: 0px; padding: 0px 0px 0px 22px; list-style: none; outline: none; border: 0px; width: 900px; font-size: 18px; display: inline-block; font-weight: normal; text-overflow: ellipsis; overflow: hidden; color: rgb(51, 51, 51); font-family: 微软雅黑, Verdana, Geneva, sans-serif; background-color: rgb(255, 255, 255);\">工业化建筑由哪个单位来进行评价？</h3><p><br/></p>', '1502434657', '1502434657', '0', null, './Public/Upd/news/', '19', '0', '0', '0', null, '');
INSERT INTO `hnj_news` VALUES ('30', '工业化建筑由哪个单位来进行评价？4', '', '', '', '<h3 style=\"margin: 0px; padding: 0px 0px 0px 22px; list-style: none; outline: none; border: 0px; width: 900px; font-size: 18px; display: inline-block; font-weight: normal; text-overflow: ellipsis; overflow: hidden; color: rgb(51, 51, 51); font-family: 微软雅黑, Verdana, Geneva, sans-serif; background-color: rgb(255, 255, 255);\">工业化建筑由哪个单位来进行评价？</h3><h3 style=\"margin: 0px; padding: 0px 0px 0px 22px; list-style: none; outline: none; border: 0px; width: 900px; font-size: 18px; display: inline-block; font-weight: normal; text-overflow: ellipsis; overflow: hidden; color: rgb(51, 51, 51); font-family: 微软雅黑, Verdana, Geneva, sans-serif; background-color: rgb(255, 255, 255);\">工业化建筑由哪个单位来进行评价？</h3><h3 style=\"margin: 0px; padding: 0px 0px 0px 22px; list-style: none; outline: none; border: 0px; width: 900px; font-size: 18px; display: inline-block; font-weight: normal; text-overflow: ellipsis; overflow: hidden; color: rgb(51, 51, 51); font-family: 微软雅黑, Verdana, Geneva, sans-serif; background-color: rgb(255, 255, 255);\">工业化建筑由哪个单位来进行评价？</h3><h3 style=\"margin: 0px; padding: 0px 0px 0px 22px; list-style: none; outline: none; border: 0px; width: 900px; font-size: 18px; display: inline-block; font-weight: normal; text-overflow: ellipsis; overflow: hidden; color: rgb(51, 51, 51); font-family: 微软雅黑, Verdana, Geneva, sans-serif; background-color: rgb(255, 255, 255);\">工业化建筑由哪个单位来进行评价？</h3><h3 style=\"margin: 0px; padding: 0px 0px 0px 22px; list-style: none; outline: none; border: 0px; width: 900px; font-size: 18px; display: inline-block; font-weight: normal; text-overflow: ellipsis; overflow: hidden; color: rgb(51, 51, 51); font-family: 微软雅黑, Verdana, Geneva, sans-serif; background-color: rgb(255, 255, 255);\">工业化建筑由哪个单位来进行评价？</h3><p><br/></p>', '1502434672', '1502434672', '0', null, './Public/Upd/news/', '19', '0', '0', '0', null, '');
INSERT INTO `hnj_news` VALUES ('31', '工业化建筑由哪个单位来进行评价？5', '', '', '', '<h3 style=\"margin: 0px; padding: 0px 0px 0px 22px; list-style: none; outline: none; border: 0px; width: 900px; font-size: 18px; display: inline-block; font-weight: normal; text-overflow: ellipsis; overflow: hidden; color: rgb(51, 51, 51); font-family: 微软雅黑, Verdana, Geneva, sans-serif; background-color: rgb(255, 255, 255);\">工业化建筑由哪个单位来进行评价？</h3><h3 style=\"margin: 0px; padding: 0px 0px 0px 22px; list-style: none; outline: none; border: 0px; width: 900px; font-size: 18px; display: inline-block; font-weight: normal; text-overflow: ellipsis; overflow: hidden; color: rgb(51, 51, 51); font-family: 微软雅黑, Verdana, Geneva, sans-serif; background-color: rgb(255, 255, 255);\">工业化建筑由哪个单位来进行评价？</h3><h3 style=\"margin: 0px; padding: 0px 0px 0px 22px; list-style: none; outline: none; border: 0px; width: 900px; font-size: 18px; display: inline-block; font-weight: normal; text-overflow: ellipsis; overflow: hidden; color: rgb(51, 51, 51); font-family: 微软雅黑, Verdana, Geneva, sans-serif; background-color: rgb(255, 255, 255);\">工业化建筑由哪个单位来进行评价？</h3><h3 style=\"margin: 0px; padding: 0px 0px 0px 22px; list-style: none; outline: none; border: 0px; width: 900px; font-size: 18px; display: inline-block; font-weight: normal; text-overflow: ellipsis; overflow: hidden; color: rgb(51, 51, 51); font-family: 微软雅黑, Verdana, Geneva, sans-serif; background-color: rgb(255, 255, 255);\">工业化建筑由哪个单位来进行评价？</h3><h3 style=\"margin: 0px; padding: 0px 0px 0px 22px; list-style: none; outline: none; border: 0px; width: 900px; font-size: 18px; display: inline-block; font-weight: normal; text-overflow: ellipsis; overflow: hidden; color: rgb(51, 51, 51); font-family: 微软雅黑, Verdana, Geneva, sans-serif; background-color: rgb(255, 255, 255);\">工业化建筑由哪个单位来进行评价？</h3><h3 style=\"margin: 0px; padding: 0px 0px 0px 22px; list-style: none; outline: none; border: 0px; width: 900px; font-size: 18px; display: inline-block; font-weight: normal; text-overflow: ellipsis; overflow: hidden; color: rgb(51, 51, 51); font-family: 微软雅黑, Verdana, Geneva, sans-serif; background-color: rgb(255, 255, 255);\">工业化建筑由哪个单位来进行评价？</h3><p><br/></p>', '1502434688', '1502434688', '0', null, './Public/Upd/news/', '19', '0', '0', '0', null, '');
INSERT INTO `hnj_news` VALUES ('32', '工业化建筑由哪个单位来进行评价？6', '', '', '', '<h3 style=\"margin: 0px; padding: 0px 0px 0px 22px; list-style: none; outline: none; border: 0px; width: 900px; font-size: 18px; display: inline-block; font-weight: normal; text-overflow: ellipsis; overflow: hidden; color: rgb(51, 51, 51); font-family: 微软雅黑, Verdana, Geneva, sans-serif; background-color: rgb(255, 255, 255);\">工业化建筑由哪个单位来进行评价？</h3><h3 style=\"margin: 0px; padding: 0px 0px 0px 22px; list-style: none; outline: none; border: 0px; width: 900px; font-size: 18px; display: inline-block; font-weight: normal; text-overflow: ellipsis; overflow: hidden; color: rgb(51, 51, 51); font-family: 微软雅黑, Verdana, Geneva, sans-serif; background-color: rgb(255, 255, 255);\">工业化建筑由哪个单位来进行评价？</h3><h3 style=\"margin: 0px; padding: 0px 0px 0px 22px; list-style: none; outline: none; border: 0px; width: 900px; font-size: 18px; display: inline-block; font-weight: normal; text-overflow: ellipsis; overflow: hidden; color: rgb(51, 51, 51); font-family: 微软雅黑, Verdana, Geneva, sans-serif; background-color: rgb(255, 255, 255);\">工业化建筑由哪个单位来进行评价？</h3><h3 style=\"margin: 0px; padding: 0px 0px 0px 22px; list-style: none; outline: none; border: 0px; width: 900px; font-size: 18px; display: inline-block; font-weight: normal; text-overflow: ellipsis; overflow: hidden; color: rgb(51, 51, 51); font-family: 微软雅黑, Verdana, Geneva, sans-serif; background-color: rgb(255, 255, 255);\">工业化建筑由哪个单位来进行评价？</h3><h3 style=\"margin: 0px; padding: 0px 0px 0px 22px; list-style: none; outline: none; border: 0px; width: 900px; font-size: 18px; display: inline-block; font-weight: normal; text-overflow: ellipsis; overflow: hidden; color: rgb(51, 51, 51); font-family: 微软雅黑, Verdana, Geneva, sans-serif; background-color: rgb(255, 255, 255);\">工业化建筑由哪个单位来进行评价？</h3><h3 style=\"margin: 0px; padding: 0px 0px 0px 22px; list-style: none; outline: none; border: 0px; width: 900px; font-size: 18px; display: inline-block; font-weight: normal; text-overflow: ellipsis; overflow: hidden; color: rgb(51, 51, 51); font-family: 微软雅黑, Verdana, Geneva, sans-serif; background-color: rgb(255, 255, 255);\">工业化建筑由哪个单位来进行评价？</h3><p><br/></p>', '1502434703', '1502434703', '0', null, './Public/Upd/news/', '19', '0', '0', '0', null, '');
INSERT INTO `hnj_news` VALUES ('33', '除99A坦克和歼20总师外，还有哪些军工专家入选院士候选名单？1', '', '', '', '<p>除99A坦克和歼20总师外，还有哪些军工专家入选院士候选名单？除99A坦克和歼20总师外，还有哪些军工专家入选院士候选名单？除99A坦克和歼20总师外，还有哪些军工专家入选院士候选名单？除99A坦克和歼20总师外，还有哪些军工专家入选院士候选名单？除99A坦克和歼20总师外，还有哪些军工专家入选院士候选名单？除99A坦克和歼20总师外，还有哪些军工专家入选院士候选名单？除99A坦克和歼20总师外，还有哪些军工专家入选院士候选名单？除99A坦克和歼20总师外，还有哪些军工专家入选院士候选名单？</p>', '1502434772', '1502434805', '0', null, './Public/Upd/news/', '20', '0', '0', '0', null, '');
INSERT INTO `hnj_news` VALUES ('34', '除99A坦克和歼20总师外，还有哪些军工专家入选院士候选名单？2', '', '', '', '<p>除99A坦克和歼20总师外，还有哪些军工专家入选院士候选名单？除99A坦克和歼20总师外，还有哪些军工专家入选院士候选名单？除99A坦克和歼20总师外，还有哪些军工专家入选院士候选名单？除99A坦克和歼20总师外，还有哪些军工专家入选院士候选名单？除99A坦克和歼20总师外，还有哪些军工专家入选院士候选名单？除99A坦克和歼20总师外，还有哪些军工专家入选院士候选名单？除99A坦克和歼20总师外，还有哪些军工专家入选院士候选名单？除99A坦克和歼20总师外，还有哪些军工专家入选院士候选名单？除99A坦克和歼20总师外，还有哪些军工专家入选院士候选名单？</p>', '1502434900', '1502434940', '0', null, './Public/Upd/news/', '20', '0', '0', '0', null, '');
INSERT INTO `hnj_news` VALUES ('35', '除99A坦克和歼20总师外，还有哪些军工专家入选院士候选名单？', '', '', '', '<p>除99A坦克和歼20总师外，还有哪些军工专家入选院士候选名单？除99A坦克和歼20总师外，还有哪些军工专家入选院士候选名单？除99A坦克和歼20总师外，还有哪些军工专家入选院士候选名单？除99A坦克和歼20总师外，还有哪些军工专家入选院士候选名单？除99A坦克和歼20总师外，还有哪些军工专家入选院士候选名单？除99A坦克和歼20总师外，还有哪些军工专家入选院士候选名单？除99A坦克和歼20总师外，还有哪些军工专家入选院士候选名单？除99A坦克和歼20总师外，还有哪些军工专家入选院士候选名单？除99A坦克和歼20总师外，还有哪些军工专家入选院士候选名单？除99A坦克和歼20总师外，还有哪些军工专家入选院士候选名单？</p>', '1502434957', '1502434957', '0', null, './Public/Upd/news/', '20', '0', '0', '0', null, '');
INSERT INTO `hnj_news` VALUES ('36', '除99A坦克和歼20总师外，还有哪些军工专家入选院士候选名单？4', '', '', '', '<p>除99A坦克和歼20总师外，还有哪些军工专家入选院士候选名单？除99A坦克和歼20总师外，还有哪些军工专家入选院士候选名单？除99A坦克和歼20总师外，还有哪些军工专家入选院士候选名单？除99A坦克和歼20总师外，还有哪些军工专家入选院士候选名单？除99A坦克和歼20总师外，还有哪些军工专家入选院士候选名单？除99A坦克和歼20总师外，还有哪些军工专家入选院士候选名单？除99A坦克和歼20总师外，还有哪些军工专家入选院士候选名单？除99A坦克和歼20总师外，还有哪些军工专家入选院士候选名单？除99A坦克和歼20总师外，还有哪些军工专家入选院士候选名单？除99A坦克和歼20总师外，还有哪些军工专家入选院士候选名单？除99A坦克和歼20总师外，还有哪些军工专家入选院士候选名单？除99A坦克和歼20总师外，还有哪些军工专家入选院士候选名单？除99A坦克和歼20总师外，还有哪些军工专家入选院士候选名单？除99A坦克和歼20总师外，还有哪些军工专家入选院士候选名单？除99A坦克和歼20总师外，还有哪些军工专家入选院士候选名单？除99A坦克和歼20总师外，还有哪些军工专家入选院士候选名单？除99A坦克和歼20总师外，还有哪些军工专家入选院士候选名单？除99A坦克和歼20总师外，还有哪些军工专家入选院士候选名单？除99A坦克和歼20总师外，还有哪些军工专家入选院士候选名单？除99A坦克和歼20总师外，还有哪些军工专家入选院士候选名单？除99A坦克和歼20总师外，还有哪些军工专家入选院士候选名单？除99A坦克和歼20总师外，还有哪些军工专家入选院士候选名单？除99A坦克和歼20总师外，还有哪些军工专家入选院士候选名单？</p>', '1502434976', '1502434976', '0', null, './Public/Upd/news/', '20', '0', '0', '0', null, '');
INSERT INTO `hnj_news` VALUES ('37', '除99A坦克和歼20总师外，还有哪些军工专家入选院士候选名单？5', '', '', '', '<p>除99A坦克和歼20总师外，还有哪些军工专家入选院士候选名单？除99A坦克和歼20总师外，还有哪些军工专家入选院士候选名单？除99A坦克和歼20总师外，还有哪些军工专家入选院士候选名单？除99A坦克和歼20总师外，还有哪些军工专家入选院士候选名单？除99A坦克和歼20总师外，还有哪些军工专家入选院士候选名单？除99A坦克和歼20总师外，还有哪些军工专家入选院士候选名单？除99A坦克和歼20总师外，还有哪些军工专家入选院士候选名单？除99A坦克和歼20总师外，还有哪些军工专家入选院士候选名单？除99A坦克和歼20总师外，还有哪些军工专家入选院士候选名单？除99A坦克和歼20总师外，还有哪些军工专家入选院士候选名单？除99A坦克和歼20总师外，还有哪些军工专家入选院士候选名单？除99A坦克和歼20总师外，还有哪些军工专家入选院士候选名单？除99A坦克和歼20总师外，还有哪些军工专家入选院士候选名单？除99A坦克和歼20总师外，还有哪些军工专家入选院士候选名单？除99A坦克和歼20总师外，还有哪些军工专家入选院士候选名单？除99A坦克和歼20总师外，还有哪些军工专家入选院士候选名单？除99A坦克和歼20总师外，还有哪些军工专家入选院士候选名单？除99A坦克和歼20总师外，还有哪些军工专家入选院士候选名单？除99A坦克和歼20总师外，还有哪些军工专家入选院士候选名单？除99A坦克和歼20总师外，还有哪些军工专家入选院士候选名单？除99A坦克和歼20总师外，还有哪些军工专家入选院士候选名单？除99A坦克和歼20总师外，还有哪些军工专家入选院士候选名单？</p>', '1502434995', '1502434995', '0', null, './Public/Upd/news/', '20', '0', '0', '0', null, '');
INSERT INTO `hnj_news` VALUES ('38', '缓粘结预应力钢绞线与周围混凝土咬合粘结', '', '', '', '<p><span style=\"color: rgb(119, 119, 119); font-family: 微软雅黑, Verdana, Geneva, sans-serif; line-height: 30px; background-color: rgb(245, 245, 245);\">通过缓粘结剂的固化实现预应力筋与混凝土之间从无粘结逐渐过渡到有粘结的一种预应力形式。是指在施工阶段预应力筋可伸缩自由变形、不与周围缓凝粘合剂产生粘结，而在施工完成后的预定时期内预应力筋通过固化的缓凝粘结剂与周围混凝土产生粘结作用，预应力筋与周围混凝土形成一体，共同工作，达到有粘效果。</span><span style=\"color: rgb(119, 119, 119); font-family: 微软雅黑, Verdana, Geneva, sans-serif; line-height: 30px; background-color: rgb(245, 245, 245);\">通过缓粘结剂的固化实现预应力筋与混凝土之间从无粘结逐渐过渡到有粘结的一种预应力形式。是指在施工阶段预应力筋可伸缩自由变形、不与周围缓凝粘合剂产生粘结，而在施工完成后的预定时期内预应力筋通过固化的缓凝粘结剂与周围混凝土产生粘结作用，预应力筋与周围混凝土形成一体，共同工作，达到有粘效果。</span><span style=\"color: rgb(119, 119, 119); font-family: 微软雅黑, Verdana, Geneva, sans-serif; line-height: 30px; background-color: rgb(245, 245, 245);\">通过缓粘结剂的固化实现预应力筋与混凝土之间从无粘结逐渐过渡到有粘结的一种预应力形式。是指在施工阶段预应力筋可伸缩自由变形、不与周围缓凝粘合剂产生粘结，而在施工完成后的预定时期内预应力筋通过固化的缓凝粘结剂与周围混凝土产生粘结作用，预应力筋与周围混凝土形成一体，共同工作，达到有粘效果。</span><span style=\"color: rgb(119, 119, 119); font-family: 微软雅黑, Verdana, Geneva, sans-serif; line-height: 30px; background-color: rgb(245, 245, 245);\">通过缓粘结剂的固化实现预应力筋与混凝土之间从无粘结逐渐过渡到有粘结的一种预应力形式。是指在施工阶段预应力筋可伸缩自由变形、不与周围缓凝粘合剂产生粘结，而在施工完成后的预定时期内预应力筋通过固化的缓凝粘结剂与周围混凝土产生粘结作用，预应力筋与周围混凝土形成一体，共同工作，达到有粘效果。</span></p>', '1502435073', '1502435188', '0', null, './Public/Upd/news/2017-08-11/598d57010d6d4.jpg', '23', '0', '0', '0', null, '');
INSERT INTO `hnj_news` VALUES ('39', '机场航站楼', '', '', '', '<p><span style=\"color: rgb(119, 119, 119); font-family: 微软雅黑, Verdana, Geneva, sans-serif; line-height: 30px; background-color: rgb(245, 245, 245);\">外包护套具有耐腐蚀特性。其主要起到在缓粘结预应力钢绞线制备、运输、施工过程中定型保护作用。外包护套肋高为关键参数。15.2规络缓粘结预应力钢绞线肋高不低于1.2mm，17.8规络缓粘结预应力钢绞线肋高不低于1.5mm，21.8规络缓粘结预应力钢绞线肋高不低1.8mm。肋高直接影响粘结锚固性能。[12] 外包护套外表要成肋状，其剥开后内表面亦必须</span><span style=\"color: rgb(119, 119, 119); font-family: 微软雅黑, Verdana, Geneva, sans-serif; line-height: 30px; background-color: rgb(245, 245, 245);\">外包护套具有耐腐蚀特性。其主要起到在缓粘结预应力钢绞线制备、运输、施工过程中定型保护作用。外包护套肋高为关键参数。15.2规络缓粘结预应力钢绞线肋高不低于1.2mm，17.8规络缓粘结预应力钢绞线肋高不低于1.5mm，21.8规络缓粘结预应力钢绞线肋高不低1.8mm。肋高直接影响粘结锚固性能。[12] 外包护套外表要成肋状，其剥开后内表面亦必须</span><span style=\"color: rgb(119, 119, 119); font-family: 微软雅黑, Verdana, Geneva, sans-serif; line-height: 30px; background-color: rgb(245, 245, 245);\">外包护套具有耐腐蚀特性。其主要起到在缓粘结预应力钢绞线制备、运输、施工过程中定型保护作用。外包护套肋高为关键参数。15.2规络缓粘结预应力钢绞线肋高不低于1.2mm，17.8规络缓粘结预应力钢绞线肋高不低于1.5mm，21.8规络缓粘结预应力钢绞线肋高不低1.8mm。肋高直接影响粘结锚固性能。[12] 外包护套外表要成肋状，其剥开后内表面亦必须</span></p>', '1502435106', '1502435171', '0', null, './Public/Upd/news/2017-08-11/598d5722e191d.jpg', '23', '0', '0', '0', null, '');
INSERT INTO `hnj_news` VALUES ('40', '市政桥梁', '', '', '', '<p><span style=\"color: rgb(119, 119, 119); font-family: 微软雅黑, Verdana, Geneva, sans-serif; line-height: 30px; background-color: rgb(245, 245, 245);\">缓凝粘合剂是缓粘结预应力钢绞线核心，其具有耐腐蚀、固化后强度高特点。固化后强度大于50Mpa。张拉适用期有60天、90天、120天、240天等多种规格，固化期有180天，270天，360天，720天等多种规格。张拉适用期和固化期依据工程特点可调。一般情况下，每个工程依据工期和所在地区温度特点对应一种缓凝粘合剂配方。工期不同，所在地区温度不</span><span style=\"color: rgb(119, 119, 119); font-family: 微软雅黑, Verdana, Geneva, sans-serif; line-height: 30px; background-color: rgb(245, 245, 245);\">缓凝粘合剂是缓粘结预应力钢绞线核心，其具有耐腐蚀、固化后强度高特点。固化后强度大于50Mpa。张拉适用期有60天、90天、120天、240天等多种规格，固化期有180天，270天，360天，720天等多种规格。张拉适用期和固化期依据工程特点可调。一般情况下，每个工程依据工期和所在地区温度特点对应一种缓凝粘合剂配方。工期不同，所在地区温度不</span><span style=\"color: rgb(119, 119, 119); font-family: 微软雅黑, Verdana, Geneva, sans-serif; line-height: 30px; background-color: rgb(245, 245, 245);\">缓凝粘合剂是缓粘结预应力钢绞线核心，其具有耐腐蚀、固化后强度高特点。固化后强度大于50Mpa。张拉适用期有60天、90天、120天、240天等多种规格，固化期有180天，270天，360天，720天等多种规格。张拉适用期和固化期依据工程特点可调。一般情况下，每个工程依据工期和所在地区温度特点对应一种缓凝粘合剂配方。工期不同，所在地区温度不</span><span style=\"color: rgb(119, 119, 119); font-family: 微软雅黑, Verdana, Geneva, sans-serif; line-height: 30px; background-color: rgb(245, 245, 245);\">缓凝粘合剂是缓粘结预应力钢绞线核心，其具有耐腐蚀、固化后强度高特点。固化后强度大于50Mpa。张拉适用期有60天、90天、120天、240天等多种规格，固化期有180天，270天，360天，720天等多种规格。张拉适用期和固化期依据工程特点可调。一般情况下，每个工程依据工期和所在地区温度特点对应一种缓凝粘合剂配方。工期不同，所在地区温度不</span></p>', '1502435145', '1503454724', '0', null, './Public/Upd/news/2017-08-11/598d574969037.jpg', '23', '0', '0', '1', '', '');

-- ----------------------------
-- Table structure for `hnj_product`
-- ----------------------------
DROP TABLE IF EXISTS `hnj_product`;
CREATE TABLE `hnj_product` (
  `pdt_id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '产品id',
  `type_id` int(11) unsigned DEFAULT '0',
  `pdt_name` varchar(150) DEFAULT NULL COMMENT '产品名称',
  `logo` char(100) DEFAULT NULL COMMENT '产品图片',
  `features` text COMMENT '产品特性',
  `introduce` text COMMENT '产品详情',
  `is_show` tinyint(2) unsigned DEFAULT '0' COMMENT '1显示0隐藏',
  `ctime` char(20) DEFAULT '' COMMENT '添加时间',
  PRIMARY KEY (`pdt_id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of hnj_product
-- ----------------------------
INSERT INTO `hnj_product` VALUES ('1', '4', '黑色双面遮光胶带', '/Public/Upl/product/2017-08-14/599140a14cea2.jpg', 'eJwtzE0KgkAAxfG7zLpFZQWNp2nZumUEJloaiRNEiOWikCSCPiQKS+gw9WbGVVdopLaP9/t3aIP2u7Sq92izRklhhPI5RhzibMI7wbkhtgQbffIp4gSZjfuW+6zYB8XwANvlRkL0Lq0prrUUf8ykm/KrWXL7xlfuOw/kdSJCSzwikQf/f738tynBMQOzROLJywXMEe4O0Vgp1RdpoBb1fxlmSTRFGhol0mDwPfEsU794Bf4R97lq8WVaRBucfb7I+Noh+uALjhyEUg==', '&lt;p&gt;&lt;span class=&quot;fs24 pb30 di-b&quot;&gt;产品概述：&lt;/span&gt;&lt;br/&gt;\r\n &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; 以PET黑膜为基材，涂以丙烯酸胶粘剂而成的双面胶带，具有卓越的遮光性和绝缘性，是固定 LCD 和背光模块元件的理想胶带产品。&lt;/p&gt;&lt;p&gt;&lt;span class=&quot;fs24 pb30 di-b pt30&quot;&gt;产品特点：&lt;/span&gt;&lt;br/&gt;\r\n &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp;　　 缓粘结预应力技术是预应力技术领域中的一个创新，避免了有粘结预应力技术施工复杂，灌浆质量难以保证的缺点，也吸取了无粘结预应力技术施工工艺流程少、进度快的优点。&lt;br/&gt;\r\n &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp;　　 1、缓粘结预应力筋的张拉端采用单孔夹片锚，固定端采用挤压锚。&lt;br/&gt;\r\n &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp;　　 2、预应力钢筋采用缓粘结预应力技术。施工过程中必须保证预应力筋的有效锚固，因此施工前必须严格审图，以防漏放预应力筋现象。&lt;br/&gt;\r\n &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp;　　 3、可以抵抗温度变化引起的温度应力，控制结构的温度收缩及表面裂缝。&lt;br/&gt;\r\n &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp;　　 4、施工简便、速度快。按设计要求铺设→浇筑砼→砼满足强度后张拉→锚固→封锚。无需预埋孔道、穿筋、灌浆等，简化施工工艺，加快施工进度。&lt;/p&gt;&lt;p&gt;&lt;span class=&quot;fs24 pb30 di-b pt30&quot;&gt;适用范围：&lt;/span&gt;&lt;br/&gt;\r\n &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp;　　 本工程所采用的缓粘结预应力技术主要应用于：体育场看台超长混凝土结构抗温差效应防裂缝、屋面钢结构支座所在的外环结构圆柱抗拔作用。&lt;br/&gt;\r\n &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp;　　 本工法适用于各类大型的、结构复杂及异型结构的体育场、会展中心、各种大型工厂等结构，满足其使用功能，施工方便进一步缩短工期。尤其可以解决各种复杂结构或异型结构的抗震要求，进而创造客观的经济效益及社会效益。&lt;/p&gt;', '1', '1502691379');
INSERT INTO `hnj_product` VALUES ('2', '4', '防水泡棉胶带', '/Public/Upl/product/2017-08-22/599b97737ff28.jpg', 'eJxFjsEOwUAURf+lawttSZh+jWXXliIZQXWqaGyMlh1pRWhTTUSVr/FmatVfMGjYvZvcc+5roRrq6KiqtZHaRFJOQtjeuDtg1gJmEzYOGPZhbufYASOG0VXEIvMkTUeyQJQGkp57ymPK1xgsr/Lu4SUPTnB0y55SqmF4ZivypDGLkiKzxQER5QcieAgNiHp/tSqQuiyQ8PJIp7Dxc7sPXiJmwDE52X1VcDchS8Wvv/kP3n0BJtl8UQ==', '&lt;p&gt;&lt;span class=&quot;fs24 pb30 di-b&quot;&gt;产品概述：&lt;/span&gt;&lt;br/&gt;\r\n &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; 以PET黑膜为基材，涂以丙烯酸胶粘剂而成的双面胶带，具有卓越的遮光性和绝缘性，是固定 LCD 和背光模块元件的理想胶带产品。&lt;/p&gt;&lt;p&gt;&lt;span class=&quot;fs24 pb30 di-b pt30&quot;&gt;产品特点：&lt;/span&gt;&lt;br/&gt;\r\n &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp;　　 缓粘结预应力技术是预应力技术领域中的一个创新，避免了有粘结预应力技术施工复杂，灌浆质量难以保证的缺点，也吸取了无粘结预应力技术施工工艺流程少、进度快的优点。&lt;br/&gt;\r\n &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp;　　 1、缓粘结预应力筋的张拉端采用单孔夹片锚，固定端采用挤压锚。&lt;br/&gt;\r\n &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp;　　 2、预应力钢筋采用缓粘结预应力技术。施工过程中必须保证预应力筋的有效锚固，因此施工前必须严格审图，以防漏放预应力筋现象。&lt;br/&gt;\r\n &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp;　　 3、可以抵抗温度变化引起的温度应力，控制结构的温度收缩及表面裂缝。&lt;br/&gt;\r\n &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp;　　 4、施工简便、速度快。按设计要求铺设→浇筑砼→砼满足强度后张拉→锚固→封锚。无需预埋孔道、穿筋、灌浆等，简化施工工艺，加快施工进度。&lt;/p&gt;&lt;p&gt;&lt;span class=&quot;fs24 pb30 di-b pt30&quot;&gt;适用范围：&lt;/span&gt;&lt;br/&gt;\r\n &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp;　　 本工程所采用的缓粘结预应力技术主要应用于：体育场看台超长混凝土结构抗温差效应防裂缝、屋面钢结构支座所在的外环结构圆柱抗拔作用。&lt;br/&gt;\r\n &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp;　　 本工法适用于各类大型的、结构复杂及异型结构的体育场、会展中心、各种大型工厂等结构，满足其使用功能，施工方便进一步缩短工期。尤其可以解决各种复杂结构或异型结构的抗震要求，进而创造客观的经济效益及社会效益。&lt;/p&gt;', '1', '1502332195');
INSERT INTO `hnj_product` VALUES ('3', '4', '黑色双面遮光胶带', '/Public/Upl/product/2017-08-14/5991404515abf.jpg', 'eJwtzE8KgkAchuG7zAkyK2o8TUvXLSOYRNOJpGk3SO4kiaA/IoopeJj6zYyrrtBIbT/e55vjEV7aeGAt8NjAqCORan1IIng4EN4hKCFxJdt8mh0kKVQePE9iz7oL79ZX8KggKbJsbGhuTjSvD4pmonB67pXiSN8NV8VWRq6sY9nwfz/s+xlGcKuAuTINVZ4DCyQ9Q+xrpf9lxvWi+xdxemJqYkwxUoTBPpRtf/U7R9bqC1gVcsE=', '&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp;　　 本工法适用于各类大型的、结构复杂及异型结构的体育场、会展中心、各种大型工厂等结构，满足其使用功能，施工方便进一步缩短工期。尤其可以解决各种复杂结构或异型结构的抗震要求，进而创造客观的经济效益及社会效益。&lt;/p&gt;', '1', '1502691379');
INSERT INTO `hnj_product` VALUES ('4', '4', '固定用双面胶带', '/Public/Upl/product/2017-08-14/599140e3c0d54.jpg', 'eJxLtDK2qs60MrAutrIwt1J62d7+fMqK57NanuyY+bx5/cvWHS+atz3fNONpZ9PT1u3P5nS+XD0DyH0+t+FxQyOQ/bSt9UXjLKD65507nzftfL+n5/nuPU8ndDxrWP6iee+TPTNebOt6v2e2knWmlSHQCkMLK6UXDROeN69FKOhcD5I1AsqaAGUDXEOezt/1bO6E5wvXPdk/98mu5U8nN0KsBqp8unQv0K6XDU1ARwJNAJtcCwBS8HVJ', '', '1', '1502691379');
INSERT INTO `hnj_product` VALUES ('5', '2', '黑色双面遮光胶带', '/Public/Upl/product/2017-08-14/599140a14cea2.jpg', 'eJwtzE0KgkAAxfG7zLpFZQWNp2nZumUEJloaiRNEiOWikCSCPiQKS+gw9WbGVVdopLaP9/t3aIP2u7Sq92izRklhhPI5RhzibMI7wbkhtgQbffIp4gSZjfuW+6zYB8XwANvlRkL0Lq0prrUUf8ykm/KrWXL7xlfuOw/kdSJCSzwikQf/f738tynBMQOzROLJywXMEe4O0Vgp1RdpoBb1fxlmSTRFGhol0mDwPfEsU794Bf4R97lq8WVaRBucfb7I+Noh+uALjhyEUg==', null, '1', '1502691379');
INSERT INTO `hnj_product` VALUES ('6', '2', '固定用双面胶带', '/Public/Upl/product/2017-08-14/599140a14cea2.jpg', '+TPTNebOt6v2e2knWmlSHQCkMLK6UXDROeN69FKOhcD5I1AsqaAGUDXEOezt/1bO6E5wvXPdk/98mu5U8nN0KsBqp8unQv0K6XDU1ARwJNAJtcCwBS8HVJ', null, '1', '1502691379');
INSERT INTO `hnj_product` VALUES ('7', '5', '黑色双面遮光胶带', '/Public/Upl/product/2017-08-14/599140e3c0d54.jpg', '+uALjhyEUg==', '&lt;/p&gt;', '1', '1502691379');
INSERT INTO `hnj_product` VALUES ('8', '5', '防水泡棉胶带', '/Public/Upl/product/2017-08-14/599140a14cea2.jpg', '+5roRrq6KiqtZHaRFJOQtjeuDtg1gJmEzYOGPZhbufYASOG0VXEIvMkTUeyQJQGkp57ymPK1xgsr/Lu4SUPTnB0y55SqmF4ZivypDGLkiKzxQER5QcieAgNiHp/tSqQuiyQ8PJIp7Dxc7sPXiJmwDE52X1VcDchS8Wvv/kP3n0BJtl8UQ==', '&lt;/p&gt;', '1', '1502332195');
INSERT INTO `hnj_product` VALUES ('9', '6', '黑色双面遮光胶带', '/Public/Upl/product/2017-08-14/599140a14cea2.jpg', '+xdxemJqYkwxUoTBPpRtf/U7R9bqC1gVcsE=', '&lt;/p&gt;', '1', '1502691379');
INSERT INTO `hnj_product` VALUES ('10', '6', '固定用双面胶带', '/Public/Upl/product/2017-08-10/598bc52493cf9.jpg', '+TPTNebOt6v2e2knWmlSHQCkMLK6UXDROeN69FKOhcD5I1AsqaAGUDXEOezt/1bO6E5wvXPdk/98mu5U8nN0KsBqp8unQv0K6XDU1ARwJNAJtcCwBS8HVJ', null, '1', '1502691379');

-- ----------------------------
-- Table structure for `hnj_product_photo`
-- ----------------------------
DROP TABLE IF EXISTS `hnj_product_photo`;
CREATE TABLE `hnj_product_photo` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `pdt_id` int(11) unsigned DEFAULT '0' COMMENT '产品id',
  `url` char(100) DEFAULT NULL COMMENT '图片地址',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of hnj_product_photo
-- ----------------------------
INSERT INTO `hnj_product_photo` VALUES ('12', '1', '/Public/Upl/product/2017-08-10/598bc335966b9.jpg');
INSERT INTO `hnj_product_photo` VALUES ('10', '1', '/Public/Upl/product/2017-08-10/598bc271eec0b.jpg');
INSERT INTO `hnj_product_photo` VALUES ('9', '1', '/Public/Upl/product/2017-08-10/598bc271ebd2b.jpg');
INSERT INTO `hnj_product_photo` VALUES ('13', '2', '/Public/Upl/product/2017-08-10/598bc60ab58ac.jpg');
INSERT INTO `hnj_product_photo` VALUES ('14', '2', '/Public/Upl/product/2017-08-10/598bc60ab7bd5.jpg');
INSERT INTO `hnj_product_photo` VALUES ('15', '1', '/Public/Upl/product/2017-08-10/598bd616a7dc5.jpg');

-- ----------------------------
-- Table structure for `hnj_role`
-- ----------------------------
DROP TABLE IF EXISTS `hnj_role`;
CREATE TABLE `hnj_role` (
  `role_id` smallint(6) unsigned NOT NULL AUTO_INCREMENT COMMENT '角色id',
  `role_name` varchar(20) NOT NULL COMMENT '角色名称',
  `role_auth_ids` varchar(255) DEFAULT NULL,
  `role_auth_ac` text,
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='角色表';

-- ----------------------------
-- Records of hnj_role
-- ----------------------------
INSERT INTO `hnj_role` VALUES ('1', '管理员', '1,2,3,4,5,6,7,8,9,10,11,12,13,14', 'Index-index,Member-members,Member-roles,Member-auths,Member-add_auth,Member-del_auth,Member-upd_auth,Member-tianjia,Member-upd,Member-del,Member-add_role,Member-upd_role,Member-del_role');
INSERT INTO `hnj_role` VALUES ('3', '操作员', '1,2,3,4,5,11', 'Index-index,Member-members,Member-roles,Member-auths,Member-del');

-- ----------------------------
-- Table structure for `hnj_set`
-- ----------------------------
DROP TABLE IF EXISTS `hnj_set`;
CREATE TABLE `hnj_set` (
  `id` int(32) unsigned NOT NULL AUTO_INCREMENT COMMENT '基本设置ID',
  `name` varchar(255) DEFAULT NULL COMMENT '系统名称',
  `logo` varchar(255) DEFAULT NULL COMMENT '网站logo',
  `records` varchar(255) DEFAULT NULL COMMENT '网站备案',
  `description` text COMMENT '网站描述',
  `keywords` varchar(255) DEFAULT NULL COMMENT '网站关键字',
  `linkman` char(50) DEFAULT NULL COMMENT '联系人',
  `linkphone` char(20) DEFAULT NULL COMMENT '联系电话',
  `address` varchar(255) DEFAULT NULL COMMENT '地址',
  `company` char(100) DEFAULT NULL COMMENT '公司',
  `protitle` char(50) DEFAULT '' COMMENT '协议名称',
  `protocol` text COMMENT '协议内容',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='基本设置表';

-- ----------------------------
-- Records of hnj_set
-- ----------------------------
INSERT INTO `hnj_set` VALUES ('1', '中国缓粘结', '/Public/Upl/logo/2017-08-11/598d76ac68e8f.jpg', '鲁ICP备09096283   |   Copyright©2015 中国缓粘结网 版权所有', '到底是 啥地方了开始 啊啊 按时 dsfdsf到底是 啥地方了开始 啊啊 按时 dsfdsf到底是 啥地方了开始 啊啊 按时 dsfdsf到底是 啥地方了开始 啊啊 按时 dsfdsf', '到底是 啥地方了开始 啊啊 按时 dsfdsf', '中国缓粘结', '010-45456456', '北京', '中国缓粘结', '', null);

-- ----------------------------
-- Table structure for `hnj_slide`
-- ----------------------------
DROP TABLE IF EXISTS `hnj_slide`;
CREATE TABLE `hnj_slide` (
  `ad_id` int(32) unsigned NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `cat_id` int(11) unsigned DEFAULT '0' COMMENT '栏目id',
  `title` varchar(255) DEFAULT NULL COMMENT '图片标题',
  `pic` varchar(255) DEFAULT '' COMMENT '图片',
  `picmobile` varchar(255) DEFAULT '' COMMENT '移动端图',
  `url` varchar(255) DEFAULT NULL COMMENT '链接',
  `sort` int(32) DEFAULT NULL COMMENT '排序',
  `description` text COMMENT '描述',
  `is_show` enum('0','1') DEFAULT '0' COMMENT '0:显示  1:隐藏',
  `add_time` int(11) DEFAULT NULL COMMENT '添加时间',
  `upd_time` int(11) DEFAULT NULL COMMENT '添加时间',
  `is_area` tinyint(2) DEFAULT NULL,
  PRIMARY KEY (`ad_id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COMMENT='幻灯片表';

-- ----------------------------
-- Records of hnj_slide
-- ----------------------------
INSERT INTO `hnj_slide` VALUES ('3', '0', '', './Public/Upd/banner/2017-08-07/5988289a81917.jpg', './Public/Upd/banner/2017-08-18/59969289804eb.jpg', '', '0', null, '0', '1502095514', '1503040137', null);
INSERT INTO `hnj_slide` VALUES ('4', '0', '', './Public/Upd/banner/2017-08-07/598828a642fcf.jpg', './Public/Upd/banner/2017-08-18/599692a784a20.jpg', '', '0', null, '0', '1502095526', '1503040167', null);
INSERT INTO `hnj_slide` VALUES ('5', '0', '', './Public/Upd/banner/2017-08-07/598828b1860a4.jpg', './Public/Upd/banner/2017-08-18/599692991da5f.jpg', '', '0', null, '0', '1502095537', '1503040153', null);
INSERT INTO `hnj_slide` VALUES ('6', '1', '', './Public/Upd/banner/2017-08-11/598d643f5d7bf.jpg', './Public/Upd/banner/2017-08-18/5996927431657.jpg', '', '0', null, '0', '1502438463', '1503040116', null);
INSERT INTO `hnj_slide` VALUES ('7', '8', '', './Public/Upd/banner/2017-08-11/598d6464ec965.jpg', './Public/Upd/banner/2017-08-18/5996926534d96.jpg', '', '0', null, '0', '1502438500', '1503040101', null);
INSERT INTO `hnj_slide` VALUES ('8', '13', '', './Public/Upd/banner/2017-08-11/598d649f2e3cf.jpg', './Public/Upd/banner/2017-08-18/599692559c25b.jpg', '', '0', null, '0', '1502438559', '1503040085', null);
INSERT INTO `hnj_slide` VALUES ('9', '5', '', './Public/Upd/banner/2017-08-11/598d64bad03ed.jpg', './Public/Upd/banner/2017-08-18/59969245e1ff0.jpg', '', '0', null, '0', '1502438586', '1503040069', null);
INSERT INTO `hnj_slide` VALUES ('10', '18', '', './Public/Upd/banner/2017-08-11/598d64d5afe7e.jpg', './Public/Upd/banner/2017-08-18/59969233b87b9.jpg', '', '0', null, '0', '1502438613', '1503040051', null);

-- ----------------------------
-- Table structure for `hnj_type`
-- ----------------------------
DROP TABLE IF EXISTS `hnj_type`;
CREATE TABLE `hnj_type` (
  `type_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键id',
  `type_name` varchar(32) NOT NULL COMMENT '类型名称',
  `sort` int(11) DEFAULT '0' COMMENT '排序',
  `is_show` enum('1','0') DEFAULT '0' COMMENT '0是,1否',
  PRIMARY KEY (`type_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COMMENT='新闻类型表';

-- ----------------------------
-- Records of hnj_type
-- ----------------------------
INSERT INTO `hnj_type` VALUES ('2', '光学交系列', '0', '0');
INSERT INTO `hnj_type` VALUES ('4', '双面胶系列', '0', '0');
INSERT INTO `hnj_type` VALUES ('5', '功能胶系列', '0', '0');
INSERT INTO `hnj_type` VALUES ('6', '光学薄膜系列', '0', '0');
INSERT INTO `hnj_type` VALUES ('7', '保护膜系列', '0', '0');

-- ----------------------------
-- Table structure for `hnj_user`
-- ----------------------------
DROP TABLE IF EXISTS `hnj_user`;
CREATE TABLE `hnj_user` (
  `userid` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` char(50) NOT NULL COMMENT '用户名',
  `password` char(50) NOT NULL COMMENT '密码',
  `userhead` char(100) NOT NULL DEFAULT '/Public/Admin/images/default.jpg' COMMENT '用户图像',
  `name` char(50) DEFAULT NULL COMMENT '姓名',
  `phone` char(20) DEFAULT NULL COMMENT '电话',
  `address` varchar(150) DEFAULT NULL COMMENT '地址',
  `sex` tinyint(2) unsigned DEFAULT '0' COMMENT '0女1男',
  `ctime` char(20) DEFAULT NULL COMMENT '注册时间',
  PRIMARY KEY (`userid`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of hnj_user
-- ----------------------------
INSERT INTO `hnj_user` VALUES ('1', 'smith', '202cb962ac59075b964b07152d234b70', '/Public/Admin/images/default.jpg', 'smith', '18317722781', '北京', '1', '1493456234');
INSERT INTO `hnj_user` VALUES ('2', 'eric', '202cb962ac59075b964b07152d234b70', '/Public/Admin/images/default.jpg', null, null, null, '0', null);
INSERT INTO `hnj_user` VALUES ('3', 'stven', '202cb962ac59075b964b07152d234b70', '/Public/Admin/images/default.jpg', null, null, null, '0', null);
INSERT INTO `hnj_user` VALUES ('4', 'sam', '202cb962ac59075b964b07152d234b70', '/Public/Admin/images/default.jpg', null, null, null, '0', null);
