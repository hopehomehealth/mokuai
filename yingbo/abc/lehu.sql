/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50540
Source Host           : localhost:3306
Source Database       : lehu

Target Server Type    : MYSQL
Target Server Version : 50540
File Encoding         : 65001

Date: 2017-12-13 11:01:01
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `lh_about`
-- ----------------------------
DROP TABLE IF EXISTS `lh_about`;
CREATE TABLE `lh_about` (
  `about_id` int(32) unsigned NOT NULL AUTO_INCREMENT COMMENT '����id',
  `title` varchar(255) DEFAULT '' COMMENT '����',
  `content` text COMMENT '��������',
  `input_time` int(11) DEFAULT NULL COMMENT '���ʱ��',
  PRIMARY KEY (`about_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='�����ֻ���';

-- ----------------------------
-- Records of lh_about
-- ----------------------------
INSERT INTO `lh_about` VALUES ('1', '', '<p style=\"white-space: normal; text-indent: 2em; line-height: 2em;\"><span style=\"font-size: 16px; font-family: ΢', '1468725253');
INSERT INTO `lh_about` VALUES ('2', '', '<p><span style=\"font-family: ΢', '1468122162');

-- ----------------------------
-- Table structure for `lh_ad`
-- ----------------------------
DROP TABLE IF EXISTS `lh_ad`;
CREATE TABLE `lh_ad` (
  `ad_id` int(32) unsigned NOT NULL AUTO_INCREMENT COMMENT '���ͼƬID',
  `title` varchar(255) DEFAULT NULL COMMENT '���ͼƬ����',
  `pic` varchar(255) DEFAULT '' COMMENT '���ͼƬ',
  `url` char(100) DEFAULT NULL COMMENT '�������',
  `col_id` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '���������Ŀ',
  `is_show` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0:��ʾ  1:����',
  `input_time` int(11) DEFAULT NULL COMMENT '��ӹ��ʱ��',
  PRIMARY KEY (`ad_id`)
) ENGINE=MyISAM AUTO_INCREMENT=37 DEFAULT CHARSET=utf8 COMMENT='����';

-- ----------------------------
-- Records of lh_ad
-- ----------------------------
INSERT INTO `lh_ad` VALUES ('1', '', './Public/Upl/ad/2016-07-08/577f0a9a4e7b2.jpg', 'http://www.weishe.com/index.php/Home/News/news_list/news_id/4', '0', '0', '1468200634');
INSERT INTO `lh_ad` VALUES ('2', '', './Public/Upl/ad/2016-07-08/577f0aa9c01f4.jpg', 'www.baidu.com', '19', '0', '1467943593');
INSERT INTO `lh_ad` VALUES ('5', '', './Public/Upl/ad/2016-07-10/5781af51a22de.jpg', 'http://player.youku.com', '19', '0', '1468116817');
INSERT INTO `lh_ad` VALUES ('4', '', './Public/Upl/ad/2016-07-08/577f0ea438e68.jpg', 'www.baidu.com', '20', '0', '1467944612');
INSERT INTO `lh_ad` VALUES ('32', '', './Public/Upl/ad/2016-07-15/57887ad2c7574.jpg', 'http://lehu.ew9t.cn/index.php/Home/Medical/med_list/medical_id/5', '28', '0', '1468562130');
INSERT INTO `lh_ad` VALUES ('30', '', './Public/Upl/ad/2016-07-15/57887a87c7574.jpg', 'http://lehu.ew9t.cn/index.php/Home/News/news_list/news_id/4', '27', '0', '1468562055');
INSERT INTO `lh_ad` VALUES ('31', '', './Public/Upl/ad/2016-07-15/57887a9b32915.jpg', 'http://lehu.ew9t.cn/index.php/Home/News/news_list/news_id/4', '27', '0', '1468562075');
INSERT INTO `lh_ad` VALUES ('20', '', './Public/Upl/ad/2016-07-11/5782f75e425ad.jpg', 'http://lehu.ew9t.cn/index.php/Home/News/news_list/news_id/4', '0', '0', '1468560681');
INSERT INTO `lh_ad` VALUES ('18', 'ҽѧ֪ʶ', './Public/Upl/ad/2016-07-10/5781fe4f3e321.jpg', 'www.baidu.com', '22', '0', '1468137039');
INSERT INTO `lh_ad` VALUES ('19', '', './Public/Upl/ad/2016-07-11/5782f6eb61230.jpg', 'http://www.weishe.com/index.php/Home/News/news_list/news_id/4', '19', '0', '1468200683');
INSERT INTO `lh_ad` VALUES ('29', '', './Public/Upl/ad/2016-07-15/57887a7641d39.jpg', 'http://lehu.ew9t.cn/index.php/Home/News/news_list/news_id/4', '27', '0', '1468562038');
INSERT INTO `lh_ad` VALUES ('28', '', './Public/Upl/ad/2016-07-15/57887a61089b2.jpg', 'http://lehu.ew9t.cn/index.php/Home/News/news_list/news_id/4', '27', '0', '1468562017');
INSERT INTO `lh_ad` VALUES ('33', '', './Public/Upl/ad/2016-07-15/57887ae63a327.jpg', 'http://lehu.ew9t.cn/index.php/Home/Medical/med_list/medical_id/5', '28', '0', '1468562150');
INSERT INTO `lh_ad` VALUES ('34', '', './Public/Upl/ad/2016-07-15/57887af754e66.jpg', 'http://lehu.ew9t.cn/index.php/Home/Medical/med_list/medical_id/5', '28', '0', '1468562167');
INSERT INTO `lh_ad` VALUES ('35', '', './Public/Upl/ad/2016-07-15/57887c2f4974b.jpg', 'http://lehu.ew9t.cn/index.php/Home/News/news_list/news_id/17', '0', '0', '1468571064');
INSERT INTO `lh_ad` VALUES ('36', '', './Public/Upl/ad/2016-07-15/57889de645a42.jpg', 'http://lehu.ew9t.cn/index.php/Home/News/news_list/news_id/17', '29', '0', '1468571110');

-- ----------------------------
-- Table structure for `lh_ad_column`
-- ----------------------------
DROP TABLE IF EXISTS `lh_ad_column`;
CREATE TABLE `lh_ad_column` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT '����',
  `ad_id` mediumint(8) unsigned NOT NULL COMMENT '���id',
  `col_id` mediumint(8) unsigned NOT NULL COMMENT '��ĿID',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COMMENT='���-��Ŀ������';

-- ----------------------------
-- Records of lh_ad_column
-- ----------------------------
INSERT INTO `lh_ad_column` VALUES ('7', '3', '19');
INSERT INTO `lh_ad_column` VALUES ('8', '17', '3');
INSERT INTO `lh_ad_column` VALUES ('9', '17', '27');

-- ----------------------------
-- Table structure for `lh_area`
-- ----------------------------
DROP TABLE IF EXISTS `lh_area`;
CREATE TABLE `lh_area` (
  `id` int(32) unsigned NOT NULL AUTO_INCREMENT COMMENT '����ID',
  `parentid` int(32) unsigned DEFAULT NULL COMMENT '��ID',
  `name` varchar(255) DEFAULT NULL COMMENT '��������',
  `class` varchar(255) DEFAULT NULL COMMENT '��������',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='������';

-- ----------------------------
-- Records of lh_area
-- ----------------------------
INSERT INTO `lh_area` VALUES ('1', null, '', null);
INSERT INTO `lh_area` VALUES ('2', null, '', null);
INSERT INTO `lh_area` VALUES ('3', null, '', null);
INSERT INTO `lh_area` VALUES ('4', null, '', null);

-- ----------------------------
-- Table structure for `lh_auth`
-- ----------------------------
DROP TABLE IF EXISTS `lh_auth`;
CREATE TABLE `lh_auth` (
  `auth_id` smallint(6) unsigned NOT NULL AUTO_INCREMENT COMMENT '����id',
  `auth_name` varchar(20) NOT NULL COMMENT 'Ȩ������',
  `auth_pid` smallint(6) unsigned NOT NULL COMMENT '��id',
  `auth_c` varchar(32) NOT NULL DEFAULT '' COMMENT '������',
  `auth_a` varchar(32) NOT NULL DEFAULT '' COMMENT '��������',
  `auth_path` varchar(32) NOT NULL DEFAULT '' COMMENT 'ȫ·��',
  `auth_level` tinyint(4) NOT NULL DEFAULT '0' COMMENT 'Ȩ�޵ȼ�����0��ʼ����',
  PRIMARY KEY (`auth_id`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8 COMMENT='Ȩ�ޱ�';

-- ----------------------------
-- Records of lh_auth
-- ----------------------------
INSERT INTO `lh_auth` VALUES ('1', '', '0', 'Index', 'index', '1', '0');
INSERT INTO `lh_auth` VALUES ('2', '', '0', '', '', '2', '0');
INSERT INTO `lh_auth` VALUES ('3', '', '2', 'News', 'showlist', '2-3', '1');
INSERT INTO `lh_auth` VALUES ('4', '', '2', 'News', 'tianjia', '2-4', '1');
INSERT INTO `lh_auth` VALUES ('5', '', '2', 'About', 'about', '2-5', '1');
INSERT INTO `lh_auth` VALUES ('6', '', '0', '', '', '6', '0');
INSERT INTO `lh_auth` VALUES ('7', '', '6', 'Service', 'showlist', '6-7', '1');
INSERT INTO `lh_auth` VALUES ('8', '', '6', 'Example', 'showlist', '6-8', '1');
INSERT INTO `lh_auth` VALUES ('9', '', '0', '', '', '9', '0');
INSERT INTO `lh_auth` VALUES ('10', '', '9', 'TeamAssess', 'showlist', '9-10', '1');
INSERT INTO `lh_auth` VALUES ('11', '', '9', 'TeamNurse', 'showlist', '9-11', '1');
INSERT INTO `lh_auth` VALUES ('12', '', '9', 'TeamHealth', 'showlist', '9-12', '1');
INSERT INTO `lh_auth` VALUES ('13', 'ר', '9', 'TeamExpert', 'showlist', '9-13', '1');
INSERT INTO `lh_auth` VALUES ('14', '', '9', 'TeamManage', 'showlist', '9-14', '1');
INSERT INTO `lh_auth` VALUES ('15', '', '0', 'Column', 'showlist', '15', '0');
INSERT INTO `lh_auth` VALUES ('16', '', '0', 'Single', 'showlist', '16', '0');
INSERT INTO `lh_auth` VALUES ('17', '', '0', 'Train', 'showlist', '17', '0');
INSERT INTO `lh_auth` VALUES ('18', 'ҽѧ֪ʶ', '0', 'Medical', 'showlist', '18', '0');
INSERT INTO `lh_auth` VALUES ('19', '', '0', '', '', '19', '0');
INSERT INTO `lh_auth` VALUES ('20', 'ͼƬ', '19', 'Ad', 'showlist', '19-20', '1');
INSERT INTO `lh_auth` VALUES ('21', '', '19', 'Trailer', 'showlist', '19-21', '1');
INSERT INTO `lh_auth` VALUES ('22', '', '0', '', '', '22', '0');
INSERT INTO `lh_auth` VALUES ('23', '', '22', 'Product', 'showlist', '22-23', '1');
INSERT INTO `lh_auth` VALUES ('24', '', '22', 'Productclass', 'showlist', '22-24', '1');
INSERT INTO `lh_auth` VALUES ('25', '', '0', 'Order', 'index', '25', '0');
INSERT INTO `lh_auth` VALUES ('26', '', '0', '', '', '26', '0');
INSERT INTO `lh_auth` VALUES ('27', '', '26', 'Manager', 'showlist', '26-27', '1');
INSERT INTO `lh_auth` VALUES ('28', '', '26', 'Role', 'showlist', '26-28', '1');
INSERT INTO `lh_auth` VALUES ('29', 'Ȩ', '26', 'Auth', 'showlist', '26-29', '1');
INSERT INTO `lh_auth` VALUES ('30', '', '0', 'Patient', 'index', '30', '0');
INSERT INTO `lh_auth` VALUES ('31', '', '0', 'Assess', 'index', '31', '0');
INSERT INTO `lh_auth` VALUES ('32', '', '0', 'Nurse', 'index', '32', '0');
INSERT INTO `lh_auth` VALUES ('33', '', '0', '', '', '33', '0');
INSERT INTO `lh_auth` VALUES ('35', '', '33', 'Schedule', 'nurse', '33-35', '1');
INSERT INTO `lh_auth` VALUES ('36', '', '33', 'Schedule', 'assess', '33-36', '1');
INSERT INTO `lh_auth` VALUES ('37', 'ԤԼ', '0', 'Yuyue', 'index', '37', '0');
INSERT INTO `lh_auth` VALUES ('38', '', '0', 'Report', 'index', '38', '0');
INSERT INTO `lh_auth` VALUES ('39', '', '0', 'Comment', 'index', '39', '0');
INSERT INTO `lh_auth` VALUES ('40', '', '0', 'Postal', 'index', '40', '0');
INSERT INTO `lh_auth` VALUES ('41', '', '0', 'Finance', 'index', '41', '0');
INSERT INTO `lh_auth` VALUES ('42', 'ƽ̨', '0', '', '', '42', '0');
INSERT INTO `lh_auth` VALUES ('43', '', '42', 'Basic', 'baseSet', '42-43', '1');
INSERT INTO `lh_auth` VALUES ('44', 'ϵͳ', '42', 'Basic', 'sysSet', '42-44', '1');
INSERT INTO `lh_auth` VALUES ('46', '֧', '42', 'Pay', 'showlist', '42-46', '1');
INSERT INTO `lh_auth` VALUES ('47', '', '0', 'Contact', 'showlist', '47', '0');
INSERT INTO `lh_auth` VALUES ('48', '', '0', 'Link', 'showlist', '48', '0');
INSERT INTO `lh_auth` VALUES ('49', '', '0', 'Set', 'showlist', '49', '0');
INSERT INTO `lh_auth` VALUES ('50', '', '0', 'Menu', 'showlist', '50', '0');

-- ----------------------------
-- Table structure for `lh_basic`
-- ----------------------------
DROP TABLE IF EXISTS `lh_basic`;
CREATE TABLE `lh_basic` (
  `id` int(32) unsigned NOT NULL AUTO_INCREMENT COMMENT '��������ID',
  `name` varchar(255) DEFAULT NULL COMMENT 'ϵͳ����',
  `weixin` char(50) DEFAULT NULL COMMENT '΢�ź�',
  `logo` varchar(255) DEFAULT NULL COMMENT 'LOGO',
  `description` varchar(255) DEFAULT NULL COMMENT 'ϵͳ����',
  `appid` varchar(255) DEFAULT NULL COMMENT 'AppID',
  `appsecret` varchar(255) DEFAULT NULL COMMENT 'AppSecret',
  `apid` varchar(255) DEFAULT NULL COMMENT 'ԭʼID',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='�������ñ�';

-- ----------------------------
-- Records of lh_basic
-- ----------------------------
INSERT INTO `lh_basic` VALUES ('1', '1', '1', 'Upl/logo/2016-06-24/576cfb1e3d70d.png', '1', '', '', '');

-- ----------------------------
-- Table structure for `lh_column`
-- ----------------------------
DROP TABLE IF EXISTS `lh_column`;
CREATE TABLE `lh_column` (
  `col_id` int(32) unsigned NOT NULL AUTO_INCREMENT COMMENT '��Ŀid',
  `name` varchar(32) DEFAULT NULL COMMENT '��Ŀ����',
  `pid` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '��Ŀ�ϼ�ID',
  `path` varchar(32) DEFAULT '' COMMENT '��Ŀȫ·��',
  `level` tinyint(4) NOT NULL DEFAULT '0' COMMENT '��Ŀ�ȼ�',
  `description` varchar(255) DEFAULT NULL COMMENT '��Ŀ����',
  `keywords` varchar(255) DEFAULT NULL COMMENT '��Ŀ�ؼ���',
  `status` int(5) DEFAULT '0' COMMENT '��Ŀ״̬:0:��ʾ,1:����',
  `input_time` int(32) DEFAULT NULL COMMENT '������Ŀʱ��',
  `update_time` int(32) DEFAULT NULL COMMENT '�޸���Ŀʱ��',
  PRIMARY KEY (`col_id`),
  KEY `path` (`path`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8 COMMENT='��Ŀ��';

-- ----------------------------
-- Records of lh_column
-- ----------------------------
INSERT INTO `lh_column` VALUES ('1', '', '0', '1', '0', '', '', '0', '1467941811', '1467977322');
INSERT INTO `lh_column` VALUES ('2', '', '0', '2', '0', '', '', '0', '1467941833', '1467941833');
INSERT INTO `lh_column` VALUES ('3', '', '1', '1-3', '1', '', '', '0', '1467941879', '1467941879');
INSERT INTO `lh_column` VALUES ('4', '', '1', '1-4', '1', '', '', '0', '1467941947', '1467941947');
INSERT INTO `lh_column` VALUES ('5', '', '4', '1-4-5', '2', '', '', '0', '1467941973', '1467941973');
INSERT INTO `lh_column` VALUES ('6', '', '4', '1-4-6', '2', '', '', '0', '1467941994', '1467941994');
INSERT INTO `lh_column` VALUES ('7', '', '4', '1-4-7', '2', '', '', '0', '1467942012', '1467942012');
INSERT INTO `lh_column` VALUES ('8', '', '4', '1-4-8', '2', '', '', '0', '1467942029', '1467942029');
INSERT INTO `lh_column` VALUES ('9', '', '1', '1-9', '1', '', '', '0', '1467942052', '1467942052');
INSERT INTO `lh_column` VALUES ('10', '', '1', '1-10', '1', '', '', '0', '1467942076', '1467942076');
INSERT INTO `lh_column` VALUES ('11', 'ҽѧ֪ʶ', '1', '1-11', '1', 'ҽѧ֪ʶҽѧ֪ʶҽѧ֪ʶ', 'ҽѧ֪ʶҽѧ֪ʶ', '0', '1467942103', '1467942103');
INSERT INTO `lh_column` VALUES ('12', '', '1', '1-12', '1', '', '', '0', '1467942130', '1467942130');
INSERT INTO `lh_column` VALUES ('13', '', '1', '1-13', '1', '', '', '0', '1467942216', '1467942216');
INSERT INTO `lh_column` VALUES ('14', '', '13', '1-13-14', '2', '', '', '0', '1467942272', '1467942272');
INSERT INTO `lh_column` VALUES ('15', 'ר', '13', '1-13-15', '2', 'ר', 'ר', '0', '1467942303', '1467942303');
INSERT INTO `lh_column` VALUES ('16', '', '13', '1-13-16', '2', '', '', '0', '1467942370', '1467942370');
INSERT INTO `lh_column` VALUES ('17', '', '13', '1-13-17', '2', '', '', '0', '1467942414', '1467942414');
INSERT INTO `lh_column` VALUES ('18', '', '1', '1-18', '1', '', '', '0', '1467942435', '1467942435');
INSERT INTO `lh_column` VALUES ('19', '', '2', '2-19', '1', '', '', '0', '1467942510', '1467942510');
INSERT INTO `lh_column` VALUES ('20', '', '19', '2-19-20', '2', '', '', '0', '1467942533', '1467942533');
INSERT INTO `lh_column` VALUES ('21', '', '19', '2-19-21', '2', '', '', '0', '1467942597', '1467942597');
INSERT INTO `lh_column` VALUES ('22', 'ҽѧ֪ʶ', '19', '2-19-22', '2', 'ҽѧ֪ʶҽѧ֪ʶҽѧ֪ʶ', 'ҽѧ֪ʶҽѧ֪ʶ', '0', '1467942628', '1467942628');
INSERT INTO `lh_column` VALUES ('23', '', '19', '2-19-23', '2', '', '', '0', '1467942644', '1467942644');
INSERT INTO `lh_column` VALUES ('24', '', '19', '2-19-24', '2', '', '', '0', '1467943356', '1467943356');
INSERT INTO `lh_column` VALUES ('25', 'ѡ', '19', '2-19-25', '2', 'ѡ', 'ѡ', '0', '1467943375', '1467943375');
INSERT INTO `lh_column` VALUES ('26', '', '19', '2-19-26', '2', '', '', '0', '1467943430', '1467943430');
INSERT INTO `lh_column` VALUES ('27', '', '3', '1-3-27', '2', '', '', '0', '1468117304', '1468117304');
INSERT INTO `lh_column` VALUES ('28', '', '3', '1-3-28', '2', '', '', '0', '1468117350', '1468117350');
INSERT INTO `lh_column` VALUES ('29', '', '1', '1-29', '1', '', '', '0', '1468118571', '1468118571');

-- ----------------------------
-- Table structure for `lh_contact`
-- ----------------------------
DROP TABLE IF EXISTS `lh_contact`;
CREATE TABLE `lh_contact` (
  `contact_id` int(32) unsigned NOT NULL AUTO_INCREMENT COMMENT '����ID',
  `name` varchar(255) DEFAULT NULL COMMENT '����������',
  `sex` enum('0','1') DEFAULT '0' COMMENT '�Ա�:0:�� 1:Ů',
  `iphone` varchar(32) DEFAULT NULL COMMENT '�ֻ�',
  `address` text COMMENT '��ַ',
  `content` text COMMENT '��������',
  `visit` enum('0','1','2','3') DEFAULT '0' COMMENT '�ط�ʱ��:0:��ʱ 1:�ϰ�ʱ�� 2:�°�ʱ�� 3:��ĩ',
  `input_time` int(11) DEFAULT NULL COMMENT '����ʱ��',
  PRIMARY KEY (`contact_id`)
) ENGINE=MyISAM AUTO_INCREMENT=186 DEFAULT CHARSET=utf8 COMMENT='�������Ա�';

-- ----------------------------
-- Records of lh_contact
-- ----------------------------
INSERT INTO `lh_contact` VALUES ('185', '', '0', '13294887255', '', '', '0', '1468815346');
INSERT INTO `lh_contact` VALUES ('184', '', '0', '13294887255', '', '', '0', '1468813617');
INSERT INTO `lh_contact` VALUES ('182', '', '0', '', '', '', '0', '1468813176');
INSERT INTO `lh_contact` VALUES ('183', '', '0', '', '', '', '0', '1468813606');
INSERT INTO `lh_contact` VALUES ('181', '', '0', '13294887255', '', '', '0', '1468813056');
INSERT INTO `lh_contact` VALUES ('180', '', '0', '13294887255', '', '', '0', '1468812891');
INSERT INTO `lh_contact` VALUES ('179', '', '0', '', '', '', '0', '1468812882');
INSERT INTO `lh_contact` VALUES ('178', '', '0', '', '', '', '0', '1468812877');
INSERT INTO `lh_contact` VALUES ('177', '', '0', '', '', '', '0', '1468812817');
INSERT INTO `lh_contact` VALUES ('176', '', '1', '13294887255', '', '', '1', '1468812739');
INSERT INTO `lh_contact` VALUES ('175', '', '0', '13294887255', '', '', '0', '1468812725');
INSERT INTO `lh_contact` VALUES ('174', '', '0', '', '', '', '0', '1468812702');
INSERT INTO `lh_contact` VALUES ('173', '', '0', '', '', '', '0', '1468812698');

-- ----------------------------
-- Table structure for `lh_edition`
-- ----------------------------
DROP TABLE IF EXISTS `lh_edition`;
CREATE TABLE `lh_edition` (
  `id` int(32) unsigned NOT NULL AUTO_INCREMENT COMMENT 'ϵͳID',
  `title` varchar(255) DEFAULT NULL COMMENT '��վ����',
  `keyword` varchar(255) DEFAULT NULL COMMENT '�ؼ���',
  `description` varchar(255) DEFAULT NULL COMMENT '����',
  `area` varchar(255) DEFAULT NULL COMMENT '��ϵ��ַ',
  `iphone` char(100) DEFAULT NULL COMMENT '��ϵ�绰',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='ϵͳ���ñ�';

-- ----------------------------
-- Records of lh_edition
-- ----------------------------

-- ----------------------------
-- Table structure for `lh_example`
-- ----------------------------
DROP TABLE IF EXISTS `lh_example`;
CREATE TABLE `lh_example` (
  `example_id` int(32) unsigned NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `name` varchar(255) DEFAULT NULL COMMENT '����',
  `pic` varchar(255) DEFAULT '' COMMENT 'ͼ��',
  `content` text COMMENT '����',
  `input_time` int(11) DEFAULT NULL COMMENT '���ʱ��',
  PRIMARY KEY (`example_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COMMENT='��������';

-- ----------------------------
-- Records of lh_example
-- ----------------------------
INSERT INTO `lh_example` VALUES ('1', '', './Public/Upl/Case/2016-07-08/577f58eb8943c.jpg', '<p style=\"white-space: normal;\">', '1467963627');
INSERT INTO `lh_example` VALUES ('2', '', './Public/Upl/Case/2016-07-08/577f591b0a724.jpg', '<p style=\"white-space: normal;\">', '1467963675');
INSERT INTO `lh_example` VALUES ('3', '', './Public/Upl/Case/2016-07-08/577f598580351.jpg', '<p style=\"white-space: normal;\">', '1467963781');
INSERT INTO `lh_example` VALUES ('4', '', './Public/Upl/Case/2016-07-08/577f5c56db677.jpg', '<p style=\"white-space: normal;\">', '1467964502');
INSERT INTO `lh_example` VALUES ('5', '', './Public/Upl/Case/2016-07-08/577f5caf32a1f.jpg', '<p style=\"white-space: normal;\">', '1467964591');
INSERT INTO `lh_example` VALUES ('6', '', './Public/Upl/Case/2016-07-08/577f5cde76db8.jpg', '<p style=\"white-space: normal;\">', '1467964638');
INSERT INTO `lh_example` VALUES ('7', '', './Public/Upl/Case/2016-07-08/577f5d4a9a94a.jpg', '<p style=\"text-align: start; white-space: normal;\">', '1467966726');
INSERT INTO `lh_example` VALUES ('8', 'ҽ', './Public/Upl/Case/2016-07-15/57883f9b9d611.jpg', '<p>', '1468546971');
INSERT INTO `lh_example` VALUES ('9', '', './Public/Upl/Case/2016-07-15/57887e22ed7ce.jpg', '<p>', '1468562978');

-- ----------------------------
-- Table structure for `lh_link`
-- ----------------------------
DROP TABLE IF EXISTS `lh_link`;
CREATE TABLE `lh_link` (
  `link_id` int(32) unsigned NOT NULL AUTO_INCREMENT COMMENT '��������ID',
  `name` varchar(255) DEFAULT '' COMMENT '����',
  `url` char(100) DEFAULT NULL COMMENT '·��',
  `pic` varchar(255) DEFAULT '' COMMENT 'ͼ��',
  `description` varchar(255) DEFAULT '' COMMENT '����',
  PRIMARY KEY (`link_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COMMENT='�������ӱ�';

-- ----------------------------
-- Records of lh_link
-- ----------------------------
INSERT INTO `lh_link` VALUES ('1', '', 'www.fh21.com.cn', './Public/Upl/link/2016-07-14/57876c673413a.jpg', '');
INSERT INTO `lh_link` VALUES ('2', 'ҽѧ', 'www.med66.com', './Public/Upl/link/2016-07-14/57876c80bd7b8.jpg', '');
INSERT INTO `lh_link` VALUES ('3', '', 'www.bjwch.cn', './Public/Upl/link/2016-07-14/57876c9a0aad3.jpg', '');
INSERT INTO `lh_link` VALUES ('4', '', 'www.bjzhongyi.com', './Public/Upl/link/2016-07-14/57876cb1de8aa.jpg', '');
INSERT INTO `lh_link` VALUES ('5', '', 'www.bddyyy.com.cn', './Public/Upl/link/2016-07-14/57876cce35b16.jpg', '');
INSERT INTO `lh_link` VALUES ('6', '', 'www.99.com.cn', './Public/Upl/link/2016-07-14/57876ceb483e5.jpg', '');

-- ----------------------------
-- Table structure for `lh_manager`
-- ----------------------------
DROP TABLE IF EXISTS `lh_manager`;
CREATE TABLE `lh_manager` (
  `mg_id` int(11) NOT NULL AUTO_INCREMENT,
  `mg_name` varchar(32) NOT NULL,
  `mg_pwd` varchar(32) NOT NULL,
  `mg_time` int(10) unsigned NOT NULL COMMENT 'ʱ��',
  `role_id` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '��ɫid',
  `iphone` varchar(32) DEFAULT NULL COMMENT '�ֻ�',
  PRIMARY KEY (`mg_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='����Ա��';

-- ----------------------------
-- Records of lh_manager
-- ----------------------------
INSERT INTO `lh_manager` VALUES ('1', 'sysadmin', 'admin', '1468401765', '1', '13723179828');
INSERT INTO `lh_manager` VALUES ('2', 'admin2', 'admin2', '1468403145', '2', '123456789');
INSERT INTO `lh_manager` VALUES ('3', 'admin22', 'e10adc3949ba59abbe56e057f20f883e', '1468834874', '2', '13294887255');

-- ----------------------------
-- Table structure for `lh_medical`
-- ----------------------------
DROP TABLE IF EXISTS `lh_medical`;
CREATE TABLE `lh_medical` (
  `medical_id` int(32) unsigned NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `title` varchar(255) DEFAULT NULL COMMENT '����',
  `pic` char(255) DEFAULT '' COMMENT '����ͼƬ',
  `content` text COMMENT '��������',
  `input_time` int(11) DEFAULT NULL COMMENT '���ʱ��',
  `is_show` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0:��ʾ  1:����',
  `col_id` smallint(5) unsigned DEFAULT '0' COMMENT 'ҽѧ֪ʶ������Ŀ',
  PRIMARY KEY (`medical_id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COMMENT='ҽѧ֪ʶ��';

-- ----------------------------
-- Records of lh_medical
-- ----------------------------
INSERT INTO `lh_medical` VALUES ('19', '', './Public/Upl/Medical/2016-07-19/578d8dc5d78a9.jpg', '<p>', '1468894661', '0', '0');
INSERT INTO `lh_medical` VALUES ('20', '', './Public/Upl/Medical/2016-07-19/578d8e9eb9061.jpg', '<p>', '1468894878', '0', '0');

-- ----------------------------
-- Table structure for `lh_medical_column`
-- ----------------------------
DROP TABLE IF EXISTS `lh_medical_column`;
CREATE TABLE `lh_medical_column` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT '����',
  `meidical_id` mediumint(8) unsigned NOT NULL COMMENT 'ҽѧ֪ʶid',
  `col_id` mediumint(8) unsigned NOT NULL COMMENT '��ĿID',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='ҽѧ֪ʶ-��Ŀ������';

-- ----------------------------
-- Records of lh_medical_column
-- ----------------------------
INSERT INTO `lh_medical_column` VALUES ('1', '0', '11');
INSERT INTO `lh_medical_column` VALUES ('2', '0', '30');

-- ----------------------------
-- Table structure for `lh_menu`
-- ----------------------------
DROP TABLE IF EXISTS `lh_menu`;
CREATE TABLE `lh_menu` (
  `id` int(32) unsigned NOT NULL AUTO_INCREMENT COMMENT '����ID',
  `pid` int(11) DEFAULT NULL COMMENT '�ϼ�ID',
  `title` varchar(20) DEFAULT NULL COMMENT '�˵���',
  `keyword` varchar(20) DEFAULT NULL COMMENT '�ؼ���',
  `is_show` int(1) DEFAULT NULL COMMENT '�Ƿ���ʾ 0��ʾ 1����ʾ',
  `sort` int(11) DEFAULT NULL COMMENT '����',
  `url` varchar(255) DEFAULT NULL COMMENT '��ַ',
  `token` varchar(60) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'token',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='�Զ���˵���';

-- ----------------------------
-- Records of lh_menu
-- ----------------------------
INSERT INTO `lh_menu` VALUES ('1', null, '', '', '0', '0', 'http://lehu.ew9t.cn/index.php/Mobile/Index/index', null);
INSERT INTO `lh_menu` VALUES ('2', null, '', '', '0', '0', 'http://lehu.ew9t.cn/index.php/Mobile/Index/index', null);
INSERT INTO `lh_menu` VALUES ('3', null, 'Ӫ', 'Ӫ', '0', '0', 'http://lehu.ew9t.cn/index.php/Mobile/Index/index', null);
INSERT INTO `lh_menu` VALUES ('4', null, '', '', '0', '0', 'http://lehu.ew9t.cn/index.php/Mobile/Index/index', null);

-- ----------------------------
-- Table structure for `lh_news`
-- ----------------------------
DROP TABLE IF EXISTS `lh_news`;
CREATE TABLE `lh_news` (
  `news_id` int(32) unsigned NOT NULL AUTO_INCREMENT COMMENT '����id',
  `title` varchar(255) DEFAULT '' COMMENT '����',
  `keyword` varchar(255) DEFAULT '' COMMENT '�ؼ���',
  `description` varchar(255) DEFAULT '' COMMENT '����',
  `content` text COMMENT '��������',
  `input_time` int(11) DEFAULT NULL COMMENT '���ʱ��',
  `update_time` int(11) DEFAULT NULL COMMENT '�޸�ʱ��',
  `url` varchar(255) DEFAULT NULL COMMENT 'url·��',
  `pic` char(255) DEFAULT NULL COMMENT '�����б�չʾͼƬ',
  `col_id` int(32) unsigned NOT NULL DEFAULT '0' COMMENT '��ĿID',
  PRIMARY KEY (`news_id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COMMENT='���ű�';

-- ----------------------------
-- Records of lh_news
-- ----------------------------
INSERT INTO `lh_news` VALUES ('1', '', '', '', '<p style=\"white-space: normal;\">', '1467956756', '1468131843', '', './Public/Upl/news/2016-07-10/5781ea0376c4f.jpg', '0');
INSERT INTO `lh_news` VALUES ('2', '', '', '', '<p style=\"white-space: normal;\"><span style=\"font-family: ΢', '1467956820', '1468131858', '', './Public/Upl/news/2016-07-10/5781ea122e1be.jpg', '0');
INSERT INTO `lh_news` VALUES ('3', '', '', '', '<p style=\"white-space: normal;\">', '1467956932', '1468131870', '', './Public/Upl/news/2016-07-10/5781ea1eabed2.jpg', '0');
INSERT INTO `lh_news` VALUES ('4', '', '', '', '<p style=\"white-space: normal;\">', '1467957644', '1468131897', '', './Public/Upl/news/2016-07-10/5781ea39e5ab5.jpg', '0');
INSERT INTO `lh_news` VALUES ('5', '', '', '', '<p style=\"white-space: normal;\">', '1467957702', '1468131908', '', './Public/Upl/news/2016-07-10/5781ea448625d.jpg', '0');
INSERT INTO `lh_news` VALUES ('6', '', '', 'ͬ', '<p style=\"white-space: normal;\">', '1467958233', '1468131923', '', './Public/Upl/news/2016-07-10/5781ea53dec8b.jpg', '0');
INSERT INTO `lh_news` VALUES ('7', '', '', '', '<p style=\"white-space: normal;\">', '1467958278', '1468131935', '', './Public/Upl/news/2016-07-10/5781ea5f88982.jpg', '0');
INSERT INTO `lh_news` VALUES ('8', '', '', '', '<p style=\"white-space: normal;\">', '1467959415', '1468131947', '', './Public/Upl/news/2016-07-10/5781ea6b72e4a.jpg', '0');
INSERT INTO `lh_news` VALUES ('9', '', '', '', '<p style=\"white-space: normal;\">', '1467959461', '1468131957', '', './Public/Upl/news/2016-07-10/5781ea7558ec8.jpg', '0');
INSERT INTO `lh_news` VALUES ('10', '', '', '', '<p style=\"white-space: normal;\">', '1467959531', '1468131966', '', './Public/Upl/news/2016-07-10/5781ea7e43877.jpg', '0');
INSERT INTO `lh_news` VALUES ('11', '', '', '', '<p style=\"white-space: normal;\"><span style=\"color: rgb(68, 68, 68); font-size: 14px; font-family: ΢', '1467959582', '1468131977', '', './Public/Upl/news/2016-07-10/5781ea893a0d5.jpg', '0');
INSERT INTO `lh_news` VALUES ('12', '', '', '', '<p style=\"white-space: normal;\"><span style=\"font-family: ΢', '1467959619', '1468131994', '', './Public/Upl/news/2016-07-10/5781ea9acb461.jpg', '0');
INSERT INTO `lh_news` VALUES ('13', '', '', '', '<p style=\"white-space: normal;\"><strong>', '1467959675', '1468132006', '', './Public/Upl/news/2016-07-10/5781eaa60bf8a.jpg', '0');
INSERT INTO `lh_news` VALUES ('14', '', '', '', '<p style=\"white-space: normal;\"><span style=\"color: rgb(68, 68, 68); font-size: 14px; font-family: ΢', '1467959712', '1468132021', '', './Public/Upl/news/2016-07-10/5781eab5de376.jpg', '0');
INSERT INTO `lh_news` VALUES ('15', '', '', '', '<p style=\"white-space: normal;\"><span style=\"font-family: ΢', '1467959748', '1468132029', '', './Public/Upl/news/2016-07-10/5781eabdc0cc8.jpg', '0');
INSERT INTO `lh_news` VALUES ('17', '', '', 'ռ', '<p style=\"WHITE-SPACE: normal\">', '1468566432', '1468567512', '', './Public/Upl/news/2016-07-15/57888e9b17dd6.jpg', '0');

-- ----------------------------
-- Table structure for `lh_pay`
-- ----------------------------
DROP TABLE IF EXISTS `lh_pay`;
CREATE TABLE `lh_pay` (
  `id` int(32) unsigned NOT NULL AUTO_INCREMENT COMMENT '֧����ʽID',
  `name` varchar(255) DEFAULT NULL COMMENT '֧����ʽ���ƣ�΢�ţ����п����ٶ�Ǯ����֧����---�ȣ�',
  `paykg` enum('0','1') NOT NULL DEFAULT '0' COMMENT '֧����ʽ����',
  `appid` varchar(255) DEFAULT NULL COMMENT '���ں���ݵ�Ψһ��ʶ',
  `paysignkey` varchar(255) DEFAULT NULL COMMENT '���ں�֧�����������ڼ��ܵ���ԿKey',
  `appsecret` varchar(255) DEFAULT NULL COMMENT '���ں�֧�����������ڼ��ܵ���ԿKey',
  `partnerid` varchar(255) DEFAULT NULL COMMENT '���ں�֧�����������ڼ��ܵ���ԿKey',
  `type` char(15) CHARACTER SET utf8mb4 DEFAULT NULL COMMENT '֧�����ͣ�Ӣ�ģ�',
  `user` varchar(255) DEFAULT NULL COMMENT '�˺�(֧������',
  `pid` int(255) unsigned DEFAULT NULL COMMENT 'PID(֧����)',
  `key` varchar(255) DEFAULT NULL COMMENT 'KEY(֧����)',
  `bpaysignkey` varchar(255) DEFAULT NULL COMMENT '�ٶ�Ǯ��AppSecret',
  `bpartnerid` varchar(255) DEFAULT NULL COMMENT '�ٶ�Ǯ��PartnerId ',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='֧����ʽ��';

-- ----------------------------
-- Records of lh_pay
-- ----------------------------
INSERT INTO `lh_pay` VALUES ('1', '΢', '1', 'wx8feeae09185108a5', '30z2tnnjefdaecvxtpyhd25nn4ihyfvd', 'eebb5185c1b72d508f0d3376e183b0dc', '1268042901', 'wxpay', '', '0', '', '', '0');
INSERT INTO `lh_pay` VALUES ('2', '', '1', '', '', '', '0', 'baidu', '', '0', '', 'xHDP5kZk4g8RMPwamYyGX5KysDRpzxy6', '1000013118');

-- ----------------------------
-- Table structure for `lh_product`
-- ----------------------------
DROP TABLE IF EXISTS `lh_product`;
CREATE TABLE `lh_product` (
  `pro_id` int(32) unsigned NOT NULL AUTO_INCREMENT COMMENT '��ƷID',
  `pro_name` varchar(255) DEFAULT NULL COMMENT '��Ʒ����',
  `price` decimal(10,2) unsigned DEFAULT '0.00' COMMENT '��Ʒ�۸�',
  `thumb` varchar(255) DEFAULT NULL COMMENT '��ƷͼƬ',
  `discount` varchar(255) DEFAULT NULL COMMENT '�Ż�����',
  `cat_id` int(32) DEFAULT NULL COMMENT '��Ʒ����id',
  `introduce` text COMMENT '��Ʒ����',
  `remarks` varchar(255) DEFAULT NULL COMMENT '��ע',
  `is_on` enum('0','1') DEFAULT '0' COMMENT '�Ƿ��ϼ�:0�ϼ�1�¼�',
  PRIMARY KEY (`pro_id`)
) ENGINE=MyISAM AUTO_INCREMENT=39 DEFAULT CHARSET=utf8 COMMENT='��Ʒ��';

-- ----------------------------
-- Records of lh_product
-- ----------------------------
INSERT INTO `lh_product` VALUES ('1', '', '0.01', 'Upl/product/2016-07-11/5783156ae3720.jpg', '', '7', '', '', '0');
INSERT INTO `lh_product` VALUES ('2', '', '100.00', 'Upl/product/2016-07-11/578315a8f2f63.jpg', '', '7', '', '', '0');
INSERT INTO `lh_product` VALUES ('3', '', '200.00', 'Upl/product/2016-07-11/57831604e7f6e.jpg', '', '7', '', '', '0');
INSERT INTO `lh_product` VALUES ('4', '', '150.00', 'Upl/product/2016-07-11/5783162a9e84c.jpg', '', '7', '', '', '0');
INSERT INTO `lh_product` VALUES ('5', '', '100.00', 'Upl/product/2016-07-11/57831659e936f.jpg', '', '7', '', '', '0');
INSERT INTO `lh_product` VALUES ('6', '', '100.00', 'Upl/product/2016-07-11/578316f2c378f.jpg', '', '8', '', '', '0');
INSERT INTO `lh_product` VALUES ('7', '', '100.00', 'Upl/product/2016-07-11/5783172f7a7c5.jpg', '', '8', '', '', '0');
INSERT INTO `lh_product` VALUES ('8', '', '150.00', 'Upl/product/2016-07-11/578317860ce05.jpg', '', '8', '', '', '0');
INSERT INTO `lh_product` VALUES ('9', '', '200.00', 'Upl/product/2016-07-11/578317c15a553.jpg', '', '8', '', '', '0');
INSERT INTO `lh_product` VALUES ('10', '', '200.00', 'Upl/product/2016-07-11/578317ef24a3e.jpg', '', '9', '', '', '0');
INSERT INTO `lh_product` VALUES ('11', '', '100.00', 'Upl/product/2016-07-11/5783184149404.jpg', '', '9', '', '', '0');
INSERT INTO `lh_product` VALUES ('12', '', '150.00', 'Upl/product/2016-07-11/5783186b9e174.jpg', '', '9', '', '', '0');
INSERT INTO `lh_product` VALUES ('13', '', '200.00', 'Upl/product/2016-07-11/5783189d591e6.jpg', '', '9', '', '', '0');
INSERT INTO `lh_product` VALUES ('14', '', '150.00', 'Upl/product/2016-07-11/578318c601ce8.jpg', '', '10', '', '', '0');
INSERT INTO `lh_product` VALUES ('15', '', '150.00', 'Upl/product/2016-07-11/578318d775bc2.jpg', '', '10', '', '', '0');
INSERT INTO `lh_product` VALUES ('16', '', '200.00', 'Upl/product/2016-07-11/578319017d1bb.jpg', '', '10', '', '', '0');
INSERT INTO `lh_product` VALUES ('17', '', '200.00', 'Upl/product/2016-07-11/5783193957f57.jpg', '', '10', '', '21', '0');
INSERT INTO `lh_product` VALUES ('18', '', '200.00', 'Upl/product/2016-07-17/578af9c7d6998.jpg', '', '12', 'Ѫѹ', '', '0');
INSERT INTO `lh_product` VALUES ('19', 'רҵ', '150.00', 'Upl/product/2016-07-17/578af9ff6428a.jpg', '', '12', 'רҵ', '', '0');
INSERT INTO `lh_product` VALUES ('20', '', '150.00', 'Upl/product/2016-07-17/578afa23cef86.jpg', '', '12', '', '', '0');
INSERT INTO `lh_product` VALUES ('21', '', '800.00', 'Upl/product/2016-07-17/578afa57b8150.jpg', '', '13', '', '', '0');
INSERT INTO `lh_product` VALUES ('22', '', '1000.00', 'Upl/product/2016-07-17/578afa749d611.jpg', '', '12', '', '', '0');
INSERT INTO `lh_product` VALUES ('23', '', '600.00', 'Upl/product/2016-07-17/578afa9095bff.jpg', '', '13', '', '', '0');
INSERT INTO `lh_product` VALUES ('24', '', '2500.00', 'Upl/product/2016-07-17/578afab4a131a.jpg', '', '13', '', '', '0');
INSERT INTO `lh_product` VALUES ('25', '', '1500.00', 'Upl/product/2016-07-17/578afad1bbe59.jpg', '', '13', '', '', '0');
INSERT INTO `lh_product` VALUES ('26', '', '3000.00', 'Upl/product/2016-07-17/578afae86bc9c.jpg', '', '13', '', '', '0');
INSERT INTO `lh_product` VALUES ('27', '', '3050.00', 'Upl/product/2016-07-17/578afb069d611.jpg', '', '13', '', '', '0');
INSERT INTO `lh_product` VALUES ('28', '', '6000.00', 'Upl/product/2016-07-17/578afb24b8150.jpg', '', '13', '', '', '0');
INSERT INTO `lh_product` VALUES ('29', '', '2000.00', 'Upl/product/2016-07-17/578afb3ecef86.jpg', '', '13', '', '', '0');
INSERT INTO `lh_product` VALUES ('30', '', '300.00', 'Upl/product/2016-07-17/578afb644d454.jpg', '', '14', '', '', '0');
INSERT INTO `lh_product` VALUES ('31', '', '500.00', 'Upl/product/2016-07-17/578afb865115d.jpg', '', '14', '', '', '0');
INSERT INTO `lh_product` VALUES ('32', '', '200.00', 'Upl/product/2016-07-17/578afbb6c7574.jpg', '', '14', '', '', '0');
INSERT INTO `lh_product` VALUES ('33', '', '150.00', 'Upl/product/2016-07-17/578afbdb54e66.jpg', '', '14', '', '', '0');
INSERT INTO `lh_product` VALUES ('34', 'Ժ', '600.00', 'Upl/product/2016-07-17/578afbfeed7ce.jpg', '', '15', 'Ժ', '', '0');
INSERT INTO `lh_product` VALUES ('35', '', '100.00', 'Upl/product/2016-07-17/578afc1dc386b.jpg', '', '16', '', '', '0');
INSERT INTO `lh_product` VALUES ('36', '', '100.00', 'Upl/product/2016-07-17/578afc34736ae.jpg', '', '16', '', '', '0');
INSERT INTO `lh_product` VALUES ('37', '', '150.00', 'Upl/product/2016-07-17/578afc4bf14d7.jpg', '', '16', '', '', '0');
INSERT INTO `lh_product` VALUES ('38', '', '150.00', 'Upl/product/2016-07-17/578afc6f736ae.jpg', '', '16', '', '', '0');

-- ----------------------------
-- Table structure for `lh_productclass`
-- ----------------------------
DROP TABLE IF EXISTS `lh_productclass`;
CREATE TABLE `lh_productclass` (
  `cat_id` int(32) unsigned NOT NULL AUTO_INCREMENT COMMENT '��Ʒ����ID',
  `name` varchar(255) DEFAULT NULL COMMENT '��������',
  `pid` int(32) unsigned DEFAULT '0' COMMENT '��ID',
  `description` varchar(255) DEFAULT NULL COMMENT '��Ʒ��������',
  `path` varchar(50) NOT NULL DEFAULT '' COMMENT 'ȫ·��',
  `level` tinyint(4) DEFAULT '0' COMMENT '�ȼ�',
  PRIMARY KEY (`cat_id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COMMENT='��Ʒ�����';

-- ----------------------------
-- Records of lh_productclass
-- ----------------------------
INSERT INTO `lh_productclass` VALUES ('15', 'Ժ', '0', '', '15', '0');
INSERT INTO `lh_productclass` VALUES ('14', 'Ժ', '0', '', '14', '0');
INSERT INTO `lh_productclass` VALUES ('13', 'Ժ', '0', '', '13', '0');
INSERT INTO `lh_productclass` VALUES ('12', 'Ժ', '0', '', '12', '0');
INSERT INTO `lh_productclass` VALUES ('16', '', '0', '', '16', '0');

-- ----------------------------
-- Table structure for `lh_productclass_cat`
-- ----------------------------
DROP TABLE IF EXISTS `lh_productclass_cat`;
CREATE TABLE `lh_productclass_cat` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT '����',
  `pro_id` mediumint(8) unsigned NOT NULL COMMENT '��Ʒid',
  `cat_id` mediumint(8) unsigned NOT NULL COMMENT '����id',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='��Ʒ-���������';

-- ----------------------------
-- Records of lh_productclass_cat
-- ----------------------------

-- ----------------------------
-- Table structure for `lh_role`
-- ----------------------------
DROP TABLE IF EXISTS `lh_role`;
CREATE TABLE `lh_role` (
  `role_id` smallint(6) unsigned NOT NULL AUTO_INCREMENT COMMENT '��ɫid',
  `role_name` varchar(20) NOT NULL COMMENT '��ɫ����',
  `role_auth_ids` varchar(255) NOT NULL DEFAULT '' COMMENT 'Ȩ��ids',
  `role_auth_ac` text COMMENT '������-����',
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='��ɫ��';

-- ----------------------------
-- Records of lh_role
-- ----------------------------
INSERT INTO `lh_role` VALUES ('1', '', '1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,35,36,37,38,39,40,41,42,43,44,46,47,48,50', 'Index-index,News-showlist,News-tianjia,About-about,Service-showlist,Example-showlist,TeamAssess-showlist,TeamNurse-showlist,TeamHealth-showlist,TeamExpert-showlist,TeamManage-showlist,Column-showlist,Single-showlist,Train-showlist,Medical-showlist,Ad-showlist,Trailer-showlist,Product-showlist,Productclass-showlist,Order-index,Manager-showlist,Role-showlist,Auth-showlist,Patient-index,Assess-index,Nurse-index,Schedule-nurse,Schedule-assess,Yuyue-index,Report-index,Comment-index,Postal-index,Finance-index,Basic-baseSet,Basic-sysSet,Pay-showlist,Contact-showlist,Link-showlist,Menu-showlist');
INSERT INTO `lh_role` VALUES ('2', '', '1,31,32,33,35,36,37,38,39,47', 'Index-index,Assess-index,Nurse-index,Schedule-nurse,Schedule-assess,Yuyue-index,Report-index,Comment-index,Contact-showlist');
INSERT INTO `lh_role` VALUES ('3', '', '31', 'Assess-index');

-- ----------------------------
-- Table structure for `lh_service`
-- ----------------------------
DROP TABLE IF EXISTS `lh_service`;
CREATE TABLE `lh_service` (
  `service_id` int(32) unsigned NOT NULL AUTO_INCREMENT COMMENT '����ID',
  `china` varchar(60) DEFAULT NULL COMMENT '���ı���',
  `english` varchar(60) DEFAULT NULL COMMENT 'Ӣ�ı���',
  `pic` char(255) DEFAULT '' COMMENT '����ͼƬ',
  `img` char(255) DEFAULT '' COMMENT '��ά��ͼƬ',
  `input_time` int(11) DEFAULT NULL COMMENT '���ʱ��',
  PRIMARY KEY (`service_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COMMENT='�����';

-- ----------------------------
-- Records of lh_service
-- ----------------------------
INSERT INTO `lh_service` VALUES ('1', '', 'Health assessment', './Public/Upl/Service/2016-07-10/5781c50952200.jpg', './Public/Upl/Service/2016-07-10/5781c50953589.png', '1468820458');
INSERT INTO `lh_service` VALUES ('2', 'רҵ', 'Post Discharging Nursing Care', './Public/Upl/Service/2016-07-10/5781c521eec57.jpg', './Public/Upl/Service/2016-07-10/5781c52206d6a.png', '1468820479');
INSERT INTO `lh_service` VALUES ('3', '', 'On-Site Rehab Exercises', './Public/Upl/Service/2016-07-10/5781c53c8d603.jpg', './Public/Upl/Service/2016-07-10/5781c53c8e5a3.png', '1468820501');
INSERT INTO `lh_service` VALUES ('4', 'Զ', 'Remote Consultation', './Public/Upl/Service/2016-07-10/5781c55b77b86.jpg', './Public/Upl/Service/2016-07-10/5781c55b78f0f.png', '1468122459');
INSERT INTO `lh_service` VALUES ('5', '', 'Create health file', './Public/Upl/Service/2016-07-10/5781c57512e06.jpg', './Public/Upl/Service/2016-07-10/5781c57514577.png', '1468820549');
INSERT INTO `lh_service` VALUES ('6', '', ' Health assessment', './Public/Upl/Service/2016-07-10/5781c5bc2e851.jpg', './Public/Upl/Service/2016-07-10/5781c5bc2fbda.png', '1468820570');
INSERT INTO `lh_service` VALUES ('7', '', 'Health assessment', './Public/Upl/Service/2016-07-10/5781c5fa4cfde.jpg', './Public/Upl/Service/2016-07-10/5781c5fa4e366.png', '1468820591');
INSERT INTO `lh_service` VALUES ('8', 'Ժ', 'Post Discharging Nursing Care', './Public/Upl/Service/2016-07-10/5781c62fb23fb.jpg', './Public/Upl/Service/2016-07-10/5781c62fb3783.png', '1468820623');
INSERT INTO `lh_service` VALUES ('9', '', 'OTHER SERVICES', './Public/Upl/Service/2016-07-10/5781c67b196d9.jpg', './Public/Upl/Service/2016-07-10/5781c67b1a679.png', '1468122747');

-- ----------------------------
-- Table structure for `lh_set`
-- ----------------------------
DROP TABLE IF EXISTS `lh_set`;
CREATE TABLE `lh_set` (
  `set_id` int(32) unsigned NOT NULL AUTO_INCREMENT COMMENT 'ϵͳID',
  `title` varchar(255) DEFAULT '' COMMENT '��վ����',
  `keyword` varchar(255) DEFAULT '' COMMENT '�ؼ���',
  `description` varchar(255) DEFAULT '' COMMENT '����',
  `area` varchar(255) DEFAULT '' COMMENT '��ϵ��ַ',
  `iphone` varchar(20) DEFAULT '' COMMENT '��ϵ�绰',
  PRIMARY KEY (`set_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='ϵͳ���ñ�';

-- ----------------------------
-- Records of lh_set
-- ----------------------------

-- ----------------------------
-- Table structure for `lh_single`
-- ----------------------------
DROP TABLE IF EXISTS `lh_single`;
CREATE TABLE `lh_single` (
  `single_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT COMMENT '��ҳ��ID',
  `name` char(30) DEFAULT NULL COMMENT '��ҳ������',
  `description` char(100) DEFAULT NULL COMMENT '����',
  `status` tinyint(2) unsigned DEFAULT '1' COMMENT '״̬:0:���� 1:δ����',
  `input_time` int(11) DEFAULT NULL COMMENT '����ʱ��',
  PRIMARY KEY (`single_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='��ҳ���';

-- ----------------------------
-- Records of lh_single
-- ----------------------------
INSERT INTO `lh_single` VALUES ('1', '', '', '0', '1468568661');

-- ----------------------------
-- Table structure for `lh_team_assess`
-- ----------------------------
DROP TABLE IF EXISTS `lh_team_assess`;
CREATE TABLE `lh_team_assess` (
  `team_id` int(32) unsigned NOT NULL AUTO_INCREMENT COMMENT 'ͼƬID',
  `title` varchar(255) DEFAULT NULL COMMENT 'ͼƬ����',
  `pic` varchar(255) DEFAULT '' COMMENT 'ͼƬ·��',
  `input_time` int(11) DEFAULT NULL COMMENT '���ͼƬʱ��',
  `description` varchar(88) NOT NULL,
  PRIMARY KEY (`team_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COMMENT='����ʦ�Ŷ�����';

-- ----------------------------
-- Records of lh_team_assess
-- ----------------------------
INSERT INTO `lh_team_assess` VALUES ('1', '', './Public/Upl/Team/assess/2016-07-14/57876a0e0a32c.jpg', '1468569317', '');
INSERT INTO `lh_team_assess` VALUES ('2', '', './Public/Upl/Team/assess/2016-07-14/57876a3a82409.jpg', '1468573501', '');
INSERT INTO `lh_team_assess` VALUES ('3', '', './Public/Upl/Team/assess/2016-07-14/57876a4e61255.jpg', '1468573507', '');
INSERT INTO `lh_team_assess` VALUES ('4', '', './Public/Upl/Team/assess/2016-07-14/57876adf75a59.jpg', '1468573520', '');
INSERT INTO `lh_team_assess` VALUES ('5', '', './Public/Upl/Team/assess/2016-07-14/57876aec8fa6c.jpg', '1468573536', '');
INSERT INTO `lh_team_assess` VALUES ('6', '', './Public/Upl/Team/assess/2016-07-14/57876af6637a1.jpg', '1468573542', '');
INSERT INTO `lh_team_assess` VALUES ('7', '', './Public/Upl/Team/assess/2016-07-15/578894a23e030.jpg', '1468573548', '');
INSERT INTO `lh_team_assess` VALUES ('8', '', './Public/Upl/Team/assess/2016-07-15/578894c182ad2.jpg', '1468573554', '');

-- ----------------------------
-- Table structure for `lh_team_expert`
-- ----------------------------
DROP TABLE IF EXISTS `lh_team_expert`;
CREATE TABLE `lh_team_expert` (
  `team_id` int(32) unsigned NOT NULL AUTO_INCREMENT COMMENT 'ͼƬID',
  `title` varchar(255) DEFAULT NULL COMMENT 'ͼƬ����',
  `pic` varchar(255) DEFAULT '' COMMENT 'ͼƬ·��',
  `input_time` int(11) DEFAULT NULL COMMENT '���ͼƬʱ��',
  `description` varchar(88) NOT NULL,
  PRIMARY KEY (`team_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COMMENT='ר�ҹ����Ŷ�����';

-- ----------------------------
-- Records of lh_team_expert
-- ----------------------------
INSERT INTO `lh_team_expert` VALUES ('1', 'ר', './Public/Upl/Team/expert/2016-07-14/57876bafb124b.jpg', '1468573745', '');
INSERT INTO `lh_team_expert` VALUES ('2', 'ר', './Public/Upl/Team/expert/2016-07-14/57876bbe81a13.jpg', '1468573750', '');
INSERT INTO `lh_team_expert` VALUES ('3', 'ר', './Public/Upl/Team/expert/2016-07-14/57876bc8ddfa4.jpg', '1468573755', '0');
INSERT INTO `lh_team_expert` VALUES ('4', 'ר', './Public/Upl/Team/expert/2016-07-14/57876bd1d4dd3.jpg', '1468573762', '');
INSERT INTO `lh_team_expert` VALUES ('5', 'ר', './Public/Upl/Team/expert/2016-07-14/57876bda54a60.jpg', '1468573767', '');
INSERT INTO `lh_team_expert` VALUES ('6', 'ר', './Public/Upl/Team/expert/2016-07-14/57876be59495c.jpg', '1468573773', '');
INSERT INTO `lh_team_expert` VALUES ('7', 'ר', './Public/Upl/Team/expert/2016-07-15/5788a8613a327.jpg', '1468573793', '');
INSERT INTO `lh_team_expert` VALUES ('8', 'ר', './Public/Upl/Team/expert/2016-07-15/5788a8eeb4447.jpg', '1468573934', '');
INSERT INTO `lh_team_expert` VALUES ('9', 'ר', './Public/Upl/Team/expert/2016-07-15/5788a8f832915.jpg', '1468573944', '');

-- ----------------------------
-- Table structure for `lh_team_health`
-- ----------------------------
DROP TABLE IF EXISTS `lh_team_health`;
CREATE TABLE `lh_team_health` (
  `team_id` int(32) unsigned NOT NULL AUTO_INCREMENT COMMENT 'ͼƬID',
  `title` varchar(255) DEFAULT NULL COMMENT 'ͼƬ����',
  `pic` varchar(255) DEFAULT '' COMMENT 'ͼƬ·��',
  `input_time` int(11) DEFAULT NULL COMMENT '���ͼƬʱ��',
  `description` varchar(88) NOT NULL,
  PRIMARY KEY (`team_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COMMENT='�������������Ŷ�����';

-- ----------------------------
-- Records of lh_team_health
-- ----------------------------
INSERT INTO `lh_team_health` VALUES ('1', '', './Public/Upl/Team/health/2016-07-14/57876b6002571.jpg', '1468573674', '');
INSERT INTO `lh_team_health` VALUES ('2', '', './Public/Upl/Team/health/2016-07-14/57876b6c3645b.jpg', '1468573679', '');
INSERT INTO `lh_team_health` VALUES ('3', '', './Public/Upl/Team/health/2016-07-14/57876b7ae0c4f.jpg', '1468573684', '');
INSERT INTO `lh_team_health` VALUES ('4', '', './Public/Upl/Team/health/2016-07-14/57876b850974d.jpg', '1468573689', '');
INSERT INTO `lh_team_health` VALUES ('5', '', './Public/Upl/Team/health/2016-07-14/57876b8db24ff.jpg', '1468573694', '');
INSERT INTO `lh_team_health` VALUES ('6', '', './Public/Upl/Team/health/2016-07-14/57876b9d2ed31.jpg', '1468573700', '');
INSERT INTO `lh_team_health` VALUES ('7', '', './Public/Upl/Team/health/2016-07-15/5788a811271fa.jpg', '1468573713', '');

-- ----------------------------
-- Table structure for `lh_team_manage`
-- ----------------------------
DROP TABLE IF EXISTS `lh_team_manage`;
CREATE TABLE `lh_team_manage` (
  `team_id` int(32) unsigned NOT NULL AUTO_INCREMENT COMMENT 'ͼƬID',
  `title` varchar(255) DEFAULT NULL COMMENT 'ͼƬ����',
  `pic` varchar(255) DEFAULT '' COMMENT 'ͼƬ·��',
  `input_time` int(11) DEFAULT NULL COMMENT '���ͼƬʱ��',
  `description` varchar(88) NOT NULL,
  PRIMARY KEY (`team_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COMMENT='�����Ŷ�����';

-- ----------------------------
-- Records of lh_team_manage
-- ----------------------------
INSERT INTO `lh_team_manage` VALUES ('1', '', './Public/Upl/Team/manage/2016-07-14/57876bf5a5dfa.jpg', '1468573986', '');
INSERT INTO `lh_team_manage` VALUES ('2', '', './Public/Upl/Team/manage/2016-07-14/57876c0260835.jpg', '1468573991', '');
INSERT INTO `lh_team_manage` VALUES ('3', '', './Public/Upl/Team/manage/2016-07-14/57876c0caddf1.jpg', '1468573997', '');
INSERT INTO `lh_team_manage` VALUES ('4', '', './Public/Upl/Team/manage/2016-07-14/57876c198fb06.jpg', '1468574009', '');
INSERT INTO `lh_team_manage` VALUES ('5', '', './Public/Upl/Team/manage/2016-07-14/57876c22e3e28.jpg', '1468574018', '');
INSERT INTO `lh_team_manage` VALUES ('6', '', './Public/Upl/Team/manage/2016-07-14/57876c2e346aa.jpg', '1468574024', '');
INSERT INTO `lh_team_manage` VALUES ('7', '', './Public/Upl/Team/manage/2016-07-15/5788a952cef86.jpg', '1468574034', '');
INSERT INTO `lh_team_manage` VALUES ('8', '', './Public/Upl/Team/manage/2016-07-15/5788a95ecef86.jpg', '1468574046', '');
INSERT INTO `lh_team_manage` VALUES ('9', '', './Public/Upl/Team/manage/2016-07-15/5788a99ad6998.jpg', '1468574106', '');

-- ----------------------------
-- Table structure for `lh_team_nurse`
-- ----------------------------
DROP TABLE IF EXISTS `lh_team_nurse`;
CREATE TABLE `lh_team_nurse` (
  `team_id` int(32) unsigned NOT NULL AUTO_INCREMENT COMMENT 'ͼƬID',
  `title` varchar(255) DEFAULT NULL COMMENT 'ͼƬ����',
  `pic` varchar(255) DEFAULT '' COMMENT 'ͼƬ·��',
  `input_time` int(11) DEFAULT NULL COMMENT '���ͼƬʱ��',
  `description` varchar(88) NOT NULL,
  PRIMARY KEY (`team_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COMMENT='����ʦ�Ŷ�����';

-- ----------------------------
-- Records of lh_team_nurse
-- ----------------------------
INSERT INTO `lh_team_nurse` VALUES ('1', '', './Public/Upl/Team/nurse/2016-07-14/57876b0c56462.jpg', '1468573586', '');
INSERT INTO `lh_team_nurse` VALUES ('2', '', './Public/Upl/Team/nurse/2016-07-14/57876b1d16d68.jpg', '1468573592', '');
INSERT INTO `lh_team_nurse` VALUES ('3', '', './Public/Upl/Team/nurse/2016-07-14/57876b274ba42.jpg', '1468573598', '');
INSERT INTO `lh_team_nurse` VALUES ('4', '', './Public/Upl/Team/nurse/2016-07-14/57876b32e4588.jpg', '1468573604', '');
INSERT INTO `lh_team_nurse` VALUES ('5', '', './Public/Upl/Team/nurse/2016-07-14/57876b3d9224f.jpg', '1468573612', '');
INSERT INTO `lh_team_nurse` VALUES ('6', '', './Public/Upl/Team/nurse/2016-07-14/57876b46add9d.jpg', '1468573619', '');
INSERT INTO `lh_team_nurse` VALUES ('7', '', './Public/Upl/Team/nurse/2016-07-15/5788a7c46bc9c.jpg', '1468573636', '');

-- ----------------------------
-- Table structure for `lh_trailer`
-- ----------------------------
DROP TABLE IF EXISTS `lh_trailer`;
CREATE TABLE `lh_trailer` (
  `trailer_id` int(32) unsigned NOT NULL AUTO_INCREMENT COMMENT '����Ƭid',
  `title` varchar(255) DEFAULT '' COMMENT '����',
  `pic` varchar(255) DEFAULT '' COMMENT '��ƵչʾͼƬ',
  `url` varchar(255) DEFAULT '' COMMENT '���ӵ�ַ',
  `input_time` int(11) DEFAULT NULL COMMENT '���ʱ��',
  PRIMARY KEY (`trailer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COMMENT='����Ƭ��';

-- ----------------------------
-- Records of lh_trailer
-- ----------------------------
INSERT INTO `lh_trailer` VALUES ('1', 'ҽ', './Public/Upl/Trailer/2016-07-08/577f683e14919.jpg', 'http://player.youku.com/player.php/sid/XMTI1MzAxNjAwNA==/v.swf', '1467967550');
INSERT INTO `lh_trailer` VALUES ('2', 'ҽ', './Public/Upl/Trailer/2016-07-08/577f71d1718b4.jpg', 'http://player.youku.com/player.php/sid/XNDg0NTg3NDA4/v.swf', '1467970001');
INSERT INTO `lh_trailer` VALUES ('3', '', './Public/Upl/Trailer/2016-07-08/577f71e57ae83.jpg', 'http://player.youku.com/player.php/sid/XMTU5ODQxNjc2OA==/v.swf', '1467970021');
INSERT INTO `lh_trailer` VALUES ('4', 'ҽ', './Public/Upl/Trailer/2016-07-08/577f71ee43e4c.jpg', 'http://player.youku.com/player.php/sid/XNDMyODczMTE2/v.swf', '1467970030');
INSERT INTO `lh_trailer` VALUES ('5', 'ҽ', './Public/Upl/Trailer/2016-07-08/577f68cea692e.jpg', 'http://player.youku.com/player.php/sid/XNTI1NzI3NTQ0/v.swf', '1467967694');
INSERT INTO `lh_trailer` VALUES ('6', 'ҽ', './Public/Upl/Trailer/2016-07-08/577f68fd1a33b.jpg', 'http://player.youku.com/player.php/sid/XMjk3NzI2MjIw/v.swf', '1467967741');
INSERT INTO `lh_trailer` VALUES ('7', '', './Public/Upl/Trailer/2016-07-08/577f6922a5bd5.jpg', 'http://player.youku.com/player.php/sid/XMTM3Mjc2MDQwMA==/v.swf', '1467967778');
INSERT INTO `lh_trailer` VALUES ('8', '', './Public/Upl/Trailer/2016-07-08/577f693bbbcef.jpg', 'http://player.youku.com/player.php/sid/XMTU3Mzc1MTQ4NA==/v.swf', '1467967803');
INSERT INTO `lh_trailer` VALUES ('9', '', './Public/Upl/Trailer/2016-07-08/577f69535b39f.jpg', 'http://player.youku.com/player.php/sid/XNjk2MzQzMzYw/v.swf', '1467967827');

-- ----------------------------
-- Table structure for `lh_train`
-- ----------------------------
DROP TABLE IF EXISTS `lh_train`;
CREATE TABLE `lh_train` (
  `train_id` int(32) unsigned NOT NULL AUTO_INCREMENT COMMENT '��ѵID',
  `china` varchar(255) DEFAULT NULL COMMENT '���ı���',
  `english` varchar(255) DEFAULT NULL COMMENT 'Ӣ�ı���',
  `pic` char(255) DEFAULT '' COMMENT '����ͼƬ',
  `content` text COMMENT '��������',
  `input_time` int(11) DEFAULT NULL COMMENT '���ʱ��',
  PRIMARY KEY (`train_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COMMENT='��ѵ��';

-- ----------------------------
-- Records of lh_train
-- ----------------------------
INSERT INTO `lh_train` VALUES ('1', '', 'Health assessment', './Public/Upl/Train/2016-07-10/5781c777f15e0.jpg', '<p style=\"white-space: normal;\">', '1468122999');
INSERT INTO `lh_train` VALUES ('2', '', 'On-Site Rehab Exercises', './Public/Upl/Train/2016-07-10/5781c7a37ba7f.jpg', '<p style=\"white-space: normal;\">', '1468123043');
INSERT INTO `lh_train` VALUES ('3', '', 'Remote Consultation', './Public/Upl/Train/2016-07-10/5781c7bf4c385.jpg', '<p style=\"white-space: normal;\">', '1468123071');
INSERT INTO `lh_train` VALUES ('4', '', 'Create health file', './Public/Upl/Train/2016-07-10/5781c7e1ccf2b.jpg', '<p style=\"white-space: normal;\">', '1468123105');
INSERT INTO `lh_train` VALUES ('5', 'Ժ', 'Post Discharging Nursing Care', './Public/Upl/Train/2016-07-10/5781c7fc75bfe.jpg', '<p style=\"white-space: normal;\">', '1468123132');
INSERT INTO `lh_train` VALUES ('6', '', 'Post Discharging Nursing Care', './Public/Upl/Train/2016-07-10/5781c820938f8.jpg', '<p style=\"white-space: normal;\">', '1468123168');
INSERT INTO `lh_train` VALUES ('7', '', 'Health assessment', './Public/Upl/Train/2016-07-10/5781c85d003e8.jpg', '<p style=\"white-space: normal;\">', '1468123228');
INSERT INTO `lh_train` VALUES ('8', '', 'Remote Consultation', './Public/Upl/Train/2016-07-10/5781c87ef01e2.jpg', '<p style=\"white-space: normal;\">', '1468578651');
INSERT INTO `lh_train` VALUES ('9', '', 'Create health file', './Public/Upl/Train/2016-07-10/5781c89692b1a.jpg', '<p style=\"white-space: normal;\">', '1468123286');

-- ----------------------------
-- Table structure for `lh_user`
-- ----------------------------
DROP TABLE IF EXISTS `lh_user`;
CREATE TABLE `lh_user` (
  `userid` int(32) unsigned NOT NULL AUTO_INCREMENT COMMENT '�û�ID',
  `user` varchar(255) DEFAULT NULL COMMENT '�û���',
  `password` varchar(255) DEFAULT NULL COMMENT '�û�����',
  `nikename` varchar(255) DEFAULT NULL COMMENT '΢��ͷ��',
  `userhead` varchar(255) NOT NULL COMMENT '�û�΢��ͷ��',
  `openid` varchar(255) NOT NULL COMMENT 'openid',
  `shenfen` tinyint(1) NOT NULL COMMENT '�û�������������û� 1Ϊ�û���2Ϊ����ʦ��3Ϊ��ʿ��',
  `status` enum('0','1','2') DEFAULT '0' COMMENT '��֤״̬��ֻ�Ի�ʿ������ʦ��Ч��0���ᣬ1δ��֤��2����֤��',
  `iphone` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COMMENT='�û���';

-- ----------------------------
-- Records of lh_user
-- ----------------------------
INSERT INTO `lh_user` VALUES ('1', '', 'b166b6e2a7aeff010f8374858d187fe0', '', '', '', '2', '1', '123456');
INSERT INTO `lh_user` VALUES ('2', '', 'b166b6e2a7aeff010f8374858d187fe0', '', '', '', '1', '0', '1234567');
INSERT INTO `lh_user` VALUES ('3', '', 'b166b6e2a7aeff010f8374858d187fe0', '', '', '', '3', '1', '12345678');
INSERT INTO `lh_user` VALUES ('4', '', 'b166b6e2a7aeff010f8374858d187fe0', '', '', '', '2', '0', '123456789');
INSERT INTO `lh_user` VALUES ('6', '李根明', 'b166b6e2a7aeff010f8374858d187fe0', null, '', '', '2', '0', '321654987');

-- ----------------------------
-- Table structure for `lh_user_assess`
-- ----------------------------
DROP TABLE IF EXISTS `lh_user_assess`;
CREATE TABLE `lh_user_assess` (
  `userid` int(32) unsigned NOT NULL DEFAULT '0' COMMENT '����ʦID',
  `username` varchar(255) DEFAULT NULL COMMENT '����',
  `age` int(32) unsigned DEFAULT '0' COMMENT '����',
  `sex` tinyint(2) unsigned DEFAULT '1' COMMENT '�Ա�',
  `photo` varchar(255) DEFAULT NULL COMMENT '��Ƭ',
  `number` int(32) unsigned DEFAULT NULL COMMENT '���֤��',
  `area` varchar(255) DEFAULT NULL COMMENT '��ַ',
  `city` char(100) DEFAULT NULL COMMENT '���ڵ���',
  `iphone` varchar(255) DEFAULT NULL COMMENT '��ϵ�绰',
  `school` varchar(255) DEFAULT NULL COMMENT '��ҵԺУ',
  `company` varchar(255) DEFAULT NULL COMMENT '��λ',
  `money` decimal(10,2) unsigned DEFAULT '0.00' COMMENT '���',
  `credit` int(32) unsigned DEFAULT '0' COMMENT '�������ã����Ǽ��õģ�',
  `inputtime` int(11) unsigned DEFAULT NULL COMMENT '�˺Ŵ���ʱ��',
  `status` enum('1','0') DEFAULT '0' COMMENT '��֤״̬',
  PRIMARY KEY (`userid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='����ʦ��';

-- ----------------------------
-- Records of lh_user_assess
-- ----------------------------
INSERT INTO `lh_user_assess` VALUES ('1', '', '0', '0', 'Upl/userimg/2016-07-08/577f5e8fa48de.jpg', '0', '', '', '123456', '', '', '0.00', '1', null, '0');
INSERT INTO `lh_user_assess` VALUES ('2', '', '0', '1', null, null, '', '2', '1234567', '', '', '0.00', '2', null, '0');
INSERT INTO `lh_user_assess` VALUES ('3', '', '0', '1', null, '0', '', '3', '12345678', '', '', '0.00', '3', null, '0');
INSERT INTO `lh_user_assess` VALUES ('4', '', '0', '1', null, null, '', '4', '123456789', '', '', '0.00', '4', null, '0');
INSERT INTO `lh_user_assess` VALUES ('6', '李根明', '0', '1', null, null, null, null, '321654987', null, null, '0.00', '0', '1468986472', '0');

-- ----------------------------
-- Table structure for `lh_user_bank`
-- ----------------------------
DROP TABLE IF EXISTS `lh_user_bank`;
CREATE TABLE `lh_user_bank` (
  `id` int(32) unsigned NOT NULL AUTO_INCREMENT COMMENT '������п�ID',
  `userid` int(32) unsigned DEFAULT NULL COMMENT '�û�id',
  `username` varchar(255) DEFAULT NULL COMMENT '��������',
  `cardno` int(32) unsigned DEFAULT NULL COMMENT '���п���',
  `inputtime` int(11) unsigned DEFAULT NULL COMMENT '���ʱ��',
  `status` tinyint(2) unsigned DEFAULT '0' COMMENT '״̬��0, 1,Ĭ���˺ţ�',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of lh_user_bank
-- ----------------------------

-- ----------------------------
-- Table structure for `lh_user_comment`
-- ----------------------------
DROP TABLE IF EXISTS `lh_user_comment`;
CREATE TABLE `lh_user_comment` (
  `id` int(32) unsigned NOT NULL AUTO_INCREMENT COMMENT '����ID',
  `orderid` int(32) unsigned DEFAULT NULL COMMENT '������',
  `muserid` int(10) unsigned DEFAULT NULL COMMENT '����û������ߣ�ID',
  `suserid` int(10) unsigned DEFAULT NULL COMMENT '�����۵��û�����ʿ��������ID',
  `star` tinyint(1) unsigned DEFAULT NULL COMMENT '�Ǽ������Ǻ���...��',
  `comment` varchar(255) DEFAULT NULL COMMENT '��������',
  `inputtime` int(11) unsigned DEFAULT NULL COMMENT '����ʱ�䣨��������ʱ�䣩',
  `status` tinyint(1) unsigned DEFAULT NULL COMMENT '״̬��0����ʾ��1��ʾ��',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='���۱�';

-- ----------------------------
-- Records of lh_user_comment
-- ----------------------------

-- ----------------------------
-- Table structure for `lh_user_logs`
-- ----------------------------
DROP TABLE IF EXISTS `lh_user_logs`;
CREATE TABLE `lh_user_logs` (
  `id` int(10) NOT NULL,
  `userid` int(10) NOT NULL,
  `inputtime` datetime DEFAULT NULL COMMENT '��½ʱ��',
  `ip` varchar(15) DEFAULT NULL COMMENT '��½IP',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='�û���¼��';

-- ----------------------------
-- Records of lh_user_logs
-- ----------------------------

-- ----------------------------
-- Table structure for `lh_user_nurse`
-- ----------------------------
DROP TABLE IF EXISTS `lh_user_nurse`;
CREATE TABLE `lh_user_nurse` (
  `userid` int(32) unsigned NOT NULL DEFAULT '0' COMMENT '��ʿID',
  `username` varchar(12) DEFAULT NULL COMMENT '����',
  `sex` tinyint(2) unsigned DEFAULT '0' COMMENT '�Ա�',
  `age` int(32) unsigned DEFAULT '0' COMMENT '����',
  `photo` varchar(255) DEFAULT NULL COMMENT '��Ƭ',
  `number` int(32) unsigned DEFAULT NULL COMMENT '���֤��',
  `origin` varchar(255) DEFAULT NULL COMMENT '����',
  `iphone` varchar(255) DEFAULT NULL COMMENT '�ֻ�',
  `type` varchar(255) DEFAULT NULL COMMENT 'ְλ����',
  `school` varchar(255) DEFAULT NULL COMMENT '��ҵԺУ',
  `company` varchar(255) DEFAULT NULL COMMENT '������λ',
  `money` decimal(10,2) unsigned DEFAULT '0.00' COMMENT '���',
  `city` char(100) DEFAULT NULL COMMENT '��������',
  `area` varchar(255) DEFAULT NULL COMMENT '��ϸ��ס��ַ',
  `certificate` int(32) unsigned DEFAULT NULL COMMENT '֤����',
  `level` int(32) unsigned DEFAULT '0' COMMENT '��ʿ����',
  `standing` int(32) unsigned NOT NULL COMMENT '��ʿ����',
  `grade` int(32) unsigned DEFAULT NULL COMMENT 'ְ�Ƽ���',
  `experience` varchar(255) DEFAULT NULL COMMENT '��������',
  `credit` int(32) unsigned DEFAULT '0' COMMENT '��ʿ���ã����Ǽ��õģ�',
  `inputtime` int(11) unsigned DEFAULT NULL COMMENT '��ʿ����ʱ��',
  `departments` varchar(255) DEFAULT NULL,
  `status` enum('1','0') DEFAULT '0' COMMENT '��֤״̬',
  PRIMARY KEY (`userid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='��ʿ��';

-- ----------------------------
-- Records of lh_user_nurse
-- ----------------------------
INSERT INTO `lh_user_nurse` VALUES ('1', '', '0', '0', null, null, null, null, '', 'ɽ', 'ɽ', '0.00', null, null, null, '0', '0', null, '', '0', null, '', '1');
INSERT INTO `lh_user_nurse` VALUES ('2', '', '0', '0', null, null, null, null, '', '', '', '0.00', null, null, null, '0', '0', null, '', '0', null, '', '0');
INSERT INTO `lh_user_nurse` VALUES ('3', '', '0', '0', null, null, null, '123456', '', '', '', '0.00', '', '', null, '0', '0', null, '', '0', null, '', '0');

-- ----------------------------
-- Table structure for `lh_user_order`
-- ----------------------------
DROP TABLE IF EXISTS `lh_user_order`;
CREATE TABLE `lh_user_order` (
  `orderid` int(32) unsigned NOT NULL AUTO_INCREMENT COMMENT '����ID',
  `ordernumber` char(20) DEFAULT NULL COMMENT '������ˮ��',
  `userid` int(32) unsigned DEFAULT NULL COMMENT '����ID',
  `auserid` int(32) unsigned DEFAULT NULL COMMENT '����ʦID',
  `inputtime` char(20) DEFAULT NULL COMMENT '��������ʱ��',
  `pingtime` char(20) DEFAULT NULL COMMENT '�����ӵ�ʱ��',
  `pingctime` char(20) DEFAULT NULL COMMENT '��������ʱ��',
  `pingwtime` char(20) DEFAULT NULL COMMENT '�������ʱ��',
  `casexl` varchar(255) DEFAULT NULL COMMENT '������¼',
  `evaluate` text COMMENT '��������',
  `psum` decimal(10,2) unsigned DEFAULT '0.00' COMMENT '���������շѽ��',
  `if_pay` enum('0','1') DEFAULT '0' COMMENT '������������Ƿ�֧��',
  `shopid` int(32) DEFAULT NULL COMMENT '��ƷID������ҩƷ��ID/����ID��',
  `ssum` decimal(10,2) unsigned DEFAULT '0.00' COMMENT '����ҩƷ�ķ���',
  `if_say` enum('0','1') DEFAULT '0' COMMENT '�Ƿ�֧����Ʒ�ķ���',
  `status` enum('0','1','2') DEFAULT '0' COMMENT '����״̬',
  `number` int(32) DEFAULT NULL COMMENT '����',
  PRIMARY KEY (`orderid`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COMMENT='������';

-- ----------------------------
-- Records of lh_user_order
-- ----------------------------
INSERT INTO `lh_user_order` VALUES ('1', '2016071210048569', '2', '1', '1468301421', null, '1468321186', '1468321186', '', '', '0.00', '0', null, '0.00', '0', '2', '1');
INSERT INTO `lh_user_order` VALUES ('2', '2016071210048570', '2', null, '1468301421', null, null, null, null, null, '0.00', '0', '1', '200.00', '0', '1', '2');
INSERT INTO `lh_user_order` VALUES ('3', '2016071452975399', '2', null, '1468465540', null, null, null, null, null, '0.00', '0', '1', '0.01', '0', '0', '1');
INSERT INTO `lh_user_order` VALUES ('20', '2016072097101101', '2', null, '1468994650', null, null, null, null, null, '0.00', '0', null, '0.00', '0', '0', null);

-- ----------------------------
-- Table structure for `lh_user_patient`
-- ----------------------------
DROP TABLE IF EXISTS `lh_user_patient`;
CREATE TABLE `lh_user_patient` (
  `userid` int(32) unsigned NOT NULL DEFAULT '0' COMMENT '����ID',
  `username` varchar(255) DEFAULT NULL COMMENT '����',
  `sex` enum('0','1') DEFAULT '0' COMMENT '�Ա�',
  `age` int(32) unsigned DEFAULT '0' COMMENT '����',
  `area` varchar(255) DEFAULT NULL COMMENT '��ַ',
  `city` char(100) DEFAULT NULL COMMENT '���ڵ���',
  `iphone` varchar(255) DEFAULT NULL COMMENT '��ϵ��ʽ',
  `relationship` varchar(255) DEFAULT NULL COMMENT '���߹�ϵ',
  `level` int(32) unsigned DEFAULT '0' COMMENT '�û�����0��ͨ�û� 1 vip��',
  `money` decimal(10,2) unsigned DEFAULT '0.00' COMMENT '���',
  `photo` varchar(255) DEFAULT NULL COMMENT '�û�ͷ��',
  `inputtime` int(32) unsigned DEFAULT NULL COMMENT '����ʱ��',
  PRIMARY KEY (`userid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='���߱�';

-- ----------------------------
-- Records of lh_user_patient
-- ----------------------------
INSERT INTO `lh_user_patient` VALUES ('2', '', '0', '1', '', '', '1234567', '', '0', '1999.76', null, null);

-- ----------------------------
-- Table structure for `lh_user_pay`
-- ----------------------------
DROP TABLE IF EXISTS `lh_user_pay`;
CREATE TABLE `lh_user_pay` (
  `id` int(32) unsigned NOT NULL AUTO_INCREMENT COMMENT '����ID',
  `orderid` int(32) unsigned DEFAULT NULL COMMENT '������',
  `puserid` int(32) unsigned DEFAULT NULL COMMENT '�˿/֧����',
  `suserid` int(32) unsigned DEFAULT NULL COMMENT '�տ',
  `balance` decimal(10,2) unsigned DEFAULT '0.00' COMMENT '֧��/�˿���',
  `money` decimal(10,2) unsigned DEFAULT '0.00' COMMENT '���',
  `inputtime` int(11) unsigned DEFAULT NULL COMMENT '֧��ʱ��/�˿�ʱ��',
  `status` enum('0','1') NOT NULL DEFAULT '0' COMMENT '״̬���ɹ� ʧ�� �����У�',
  `type` enum('0','1') NOT NULL DEFAULT '0' COMMENT '���ͣ�0֧��/1�˿',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='�û�֧����';

-- ----------------------------
-- Records of lh_user_pay
-- ----------------------------

-- ----------------------------
-- Table structure for `lh_user_postal`
-- ----------------------------
DROP TABLE IF EXISTS `lh_user_postal`;
CREATE TABLE `lh_user_postal` (
  `id` int(32) unsigned NOT NULL AUTO_INCREMENT COMMENT '����ID',
  `order` int(32) unsigned DEFAULT NULL COMMENT '������ˮ��',
  `userid` int(32) DEFAULT NULL,
  `balance` decimal(10,2) unsigned DEFAULT '0.00' COMMENT '���ֽ��',
  `inputtime` int(11) unsigned DEFAULT NULL COMMENT '���ֶ�������ʱ��',
  `updatetime` int(11) unsigned DEFAULT NULL COMMENT '���ֳɹ�ʱ��',
  `status` tinyint(2) unsigned DEFAULT '0' COMMENT '״̬',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='���ֱ�';

-- ----------------------------
-- Records of lh_user_postal
-- ----------------------------

-- ----------------------------
-- Table structure for `lh_user_pproval`
-- ----------------------------
DROP TABLE IF EXISTS `lh_user_pproval`;
CREATE TABLE `lh_user_pproval` (
  `id` int(32) unsigned NOT NULL AUTO_INCREMENT COMMENT '��֤ID',
  `userid` int(32) unsigned DEFAULT NULL COMMENT '�û�ID',
  `username` varchar(255) DEFAULT NULL COMMENT '��ʵ����',
  `inputtime` int(11) unsigned DEFAULT NULL COMMENT '��֤ʱ��',
  `recognise` varchar(255) DEFAULT NULL COMMENT '��֤֤�飨����֤����֤�飬����...��',
  `status` tinyint(2) unsigned DEFAULT '0' COMMENT '״̬��0δ��֤1��֤��',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of lh_user_pproval
-- ----------------------------

-- ----------------------------
-- Table structure for `lh_user_schedule`
-- ----------------------------
DROP TABLE IF EXISTS `lh_user_schedule`;
CREATE TABLE `lh_user_schedule` (
  `id` int(32) unsigned NOT NULL AUTO_INCREMENT COMMENT '�ճ�ID',
  `userid` int(32) unsigned DEFAULT NULL COMMENT '�û�ID����ʿ,������',
  `month` char(10) DEFAULT '' COMMENT '�·�',
  `day` char(10) DEFAULT '' COMMENT '��',
  `ampm` enum('1','0') DEFAULT '0' COMMENT '����/����',
  `inputtime` int(11) unsigned DEFAULT NULL COMMENT '���ʱ��',
  `status` enum('1','0') DEFAULT '0' COMMENT '״̬���Ƿ���ԤԼ��',
  `year` char(10) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of lh_user_schedule
-- ----------------------------
INSERT INTO `lh_user_schedule` VALUES ('1', '1', '7', '2', '1', null, '1', '2016');
INSERT INTO `lh_user_schedule` VALUES ('3', '1', '8', '11', '0', null, '1', '2016');
INSERT INTO `lh_user_schedule` VALUES ('4', '1', '8', '12', '1', null, '1', '2016');
INSERT INTO `lh_user_schedule` VALUES ('6', '1', '7', '25', null, null, '1', '2016');
INSERT INTO `lh_user_schedule` VALUES ('7', '1', '7', '26', null, null, '1', '2016');
INSERT INTO `lh_user_schedule` VALUES ('8', '3', '7', '13', '0', null, '0', '2016');
INSERT INTO `lh_user_schedule` VALUES ('9', '3', '7', '14', '0', null, '1', '2016');
INSERT INTO `lh_user_schedule` VALUES ('10', '3', '7', '15', '0', null, '1', '2016');
INSERT INTO `lh_user_schedule` VALUES ('11', '3', '7', '21', '0', null, '0', '2016');
INSERT INTO `lh_user_schedule` VALUES ('12', '3', '7', '22', '0', null, '0', '2016');

-- ----------------------------
-- Table structure for `lh_user_suborder`
-- ----------------------------
DROP TABLE IF EXISTS `lh_user_suborder`;
CREATE TABLE `lh_user_suborder` (
  `orderid` int(32) unsigned NOT NULL AUTO_INCREMENT COMMENT '�Ӷ���ID',
  `ordernumber` char(20) DEFAULT NULL COMMENT '������ˮ��',
  `userid` int(32) DEFAULT NULL COMMENT '����id',
  `parent_id` int(32) DEFAULT NULL COMMENT '������id',
  `nurseid` int(32) unsigned DEFAULT NULL COMMENT '��ʿID',
  `inputtime` char(20) DEFAULT NULL COMMENT '��������ʱ��',
  `hutime` char(20) DEFAULT NULL COMMENT '��ʿ�ӵ�ʱ��',
  `huctime` char(20) DEFAULT NULL COMMENT '��ʿ����ʱ��',
  `huwtime` char(20) DEFAULT NULL COMMENT '��ʿ�������ʱ��',
  `nsum` decimal(10,2) unsigned DEFAULT '0.00' COMMENT '��ʿ�������',
  `if_nay` enum('0','1') DEFAULT '0' COMMENT '�Ƿ�֧����ʿ����',
  `status` enum('0','1','2') DEFAULT '0' COMMENT '����״̬',
  `is_com` enum('1','0') DEFAULT '0',
  PRIMARY KEY (`orderid`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=utf8 COMMENT='�Ӷ�����';

-- ----------------------------
-- Records of lh_user_suborder
-- ----------------------------
INSERT INTO `lh_user_suborder` VALUES ('1', '5423564657756', '2', '2', '3', '1468301421', null, null, null, '100.00', '0', '1', '0');
INSERT INTO `lh_user_suborder` VALUES ('2', '3454645676756', '2', '2', '3', '1468301421', null, null, null, '100.00', '0', '1', '0');
INSERT INTO `lh_user_suborder` VALUES ('6', '2016071448495310_1', null, '5', null, '1468485008', null, null, null, '150.00', '0', '0', '0');
INSERT INTO `lh_user_suborder` VALUES ('5', '2016071452975399_1', null, '3', null, '1468465540', null, null, null, '150.00', '0', '0', '0');
INSERT INTO `lh_user_suborder` VALUES ('7', '2016071448495310_2', null, '5', null, '1468485008', null, null, null, '150.00', '0', '0', '0');
INSERT INTO `lh_user_suborder` VALUES ('8', '2016071410010149_1', null, '6', null, '1468485053', null, null, null, '150.00', '0', '0', '0');
INSERT INTO `lh_user_suborder` VALUES ('9', '2016071449509850_1', null, '7', null, '1468485361', null, null, null, '150.00', '0', '0', '0');
INSERT INTO `lh_user_suborder` VALUES ('10', '2016071552525755_1', null, '8', null, '1468566484', null, null, null, '150.00', '0', '0', '0');
INSERT INTO `lh_user_suborder` VALUES ('11', '2016071548985252_1', null, '9', null, '1468566544', null, null, null, '150.00', '0', '0', '0');
INSERT INTO `lh_user_suborder` VALUES ('12', '2016071548985252_2', null, '9', null, '1468566544', null, null, null, '150.00', '0', '0', '0');
INSERT INTO `lh_user_suborder` VALUES ('13', '2016071549995156_1', null, '10', null, '1468566561', null, null, null, '150.00', '0', '0', '0');
INSERT INTO `lh_user_suborder` VALUES ('14', '2016071549995156_2', null, '10', null, '1468566561', null, null, null, '150.00', '0', '0', '0');
INSERT INTO `lh_user_suborder` VALUES ('15', '2016071557509710_1', null, '11', null, '1468568361', null, null, null, '150.00', '0', '0', '0');
INSERT INTO `lh_user_suborder` VALUES ('16', '2016071599575398_1', null, '12', null, '1468568412', null, null, null, '150.00', '0', '0', '0');
INSERT INTO `lh_user_suborder` VALUES ('17', '2016071553484810_1', null, '13', null, '1468568837', null, null, null, '150.00', '0', '0', '0');
INSERT INTO `lh_user_suborder` VALUES ('18', '2016071557975610_1', null, '14', null, '1468569129', null, null, null, '150.00', '0', '0', '0');
INSERT INTO `lh_user_suborder` VALUES ('19', '2016071510055515_1', null, '15', null, '1468570557', null, null, null, '150.00', '0', '0', '0');
INSERT INTO `lh_user_suborder` VALUES ('20', '2016071550494851_1', null, '16', null, '1468570834', null, null, null, '150.00', '0', '0', '0');
INSERT INTO `lh_user_suborder` VALUES ('21', '2016071597521005_1', null, '17', null, '1468571258', null, null, null, '150.00', '0', '0', '0');
INSERT INTO `lh_user_suborder` VALUES ('22', '2016071552499897_1', null, '18', null, '1468571332', null, null, null, '150.00', '0', '0', '0');
INSERT INTO `lh_user_suborder` VALUES ('23', '2016071599535210_1', null, '19', null, '1468571340', null, null, null, '150.00', '0', '0', '0');

-- ----------------------------
-- Table structure for `lh_user_yuyue`
-- ----------------------------
DROP TABLE IF EXISTS `lh_user_yuyue`;
CREATE TABLE `lh_user_yuyue` (
  `id` int(32) unsigned NOT NULL AUTO_INCREMENT COMMENT 'ԤԼID',
  `userid` int(32) unsigned DEFAULT NULL COMMENT '�û�ID',
  `name` varchar(255) DEFAULT NULL COMMENT '����',
  `iphone` varchar(255) DEFAULT NULL COMMENT '�绰',
  `status` enum('0','1','2') DEFAULT '0' COMMENT '�Ƿ���ԤԼ',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of lh_user_yuyue
-- ----------------------------
