/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50547
Source Host           : localhost:3306
Source Database       : 1yyg225_full

Target Server Type    : MYSQL
Target Server Version : 50547
File Encoding         : 65001

Date: 2016-08-23 19:18:40
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `zz_account_log`
-- ----------------------------
DROP TABLE IF EXISTS `zz_account_log`;
CREATE TABLE `zz_account_log` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT '日志ID',
  `mid` int(10) NOT NULL COMMENT '会员ID',
  `username` varchar(60) NOT NULL DEFAULT '' COMMENT '用户名',
  `pay_points` int(10) NOT NULL DEFAULT '0' COMMENT '支付积分',
  `rank_points` int(10) NOT NULL DEFAULT '0' COMMENT '等级积分',
  `db_points` int(10) DEFAULT '0' COMMENT '夺宝币',
  `user_money` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '可用金额',
  `frozen_money` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '冻结金额',
  `give_money` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '充值赠送',
  `stage` varchar(10) NOT NULL COMMENT '操作阶段',
  `desc` varchar(255) NOT NULL,
  `logtime` int(10) NOT NULL COMMENT '操作时间',
  `pay_points_total` int(10) DEFAULT NULL,
  `rank_points_total` int(10) DEFAULT NULL,
  `db_points_total` int(10) DEFAULT NULL,
  `user_money_total` decimal(10,2) DEFAULT NULL,
  `frozen_money_total` decimal(10,2) DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT '0.00' COMMENT '第三方支付金额',
  PRIMARY KEY (`id`),
  KEY `id` (`id`) USING BTREE,
  KEY `mid` (`mid`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=14448 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of zz_account_log
-- ----------------------------

-- ----------------------------
-- Table structure for `zz_ad`
-- ----------------------------
DROP TABLE IF EXISTS `zz_ad`;
CREATE TABLE `zz_ad` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `userid` int(8) unsigned NOT NULL DEFAULT '0',
  `username` varchar(40) NOT NULL DEFAULT '',
  `url` varchar(60) NOT NULL DEFAULT '',
  `listorder` int(10) unsigned NOT NULL DEFAULT '0',
  `createtime` int(11) unsigned NOT NULL DEFAULT '0',
  `updatetime` int(11) unsigned NOT NULL DEFAULT '0',
  `lang` tinyint(2) unsigned NOT NULL DEFAULT '0',
  `title` varchar(255) NOT NULL DEFAULT '',
  `title_style` varchar(40) NOT NULL DEFAULT '',
  `thumb` varchar(255) NOT NULL DEFAULT '',
  `width` text NOT NULL,
  `height` text NOT NULL,
  `images` mediumtext NOT NULL,
  `bgcolor` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of zz_ad
-- ----------------------------
INSERT INTO zz_ad VALUES ('5', '1', '1', 'lnest_admin', '/content/show//5', '0', '1416900305', '1446443274', '1', '【体验区列表页】导航下广告位', '', '[]', '', '180', '[{\"path\":\"\\/upload\\/images\\/gallery\\/0\\/4\\/5_src.jpg\",\"title\":\"141_src\"}]', '#ffffff');
INSERT INTO zz_ad VALUES ('1', '1', '2', 'admin', '/content/show//1', '0', '1405576486', '1458985752', '1', '【首页】主导航下焦点图', '', '[]', '710', '350', '[{\"path\":\"\\/upload\\/images\\/gallery\\/1\\/a\\/47_src.png\",\"title\":\"#\"},{\"path\":\"\\/upload\\/images\\/gallery\\/1\\/9\\/46_src.png\",\"title\":\"#\"},{\"path\":\"\\/upload\\/images\\/gallery\\/1\\/a\\/47_src.png\",\"title\":\"1591_src\"},{\"path\":\"\\/upload\\/images\\/gallery\\/1\\/9\\/46_src.png\",\"title\":\"1142_src\"}]', '');
INSERT INTO zz_ad VALUES ('7', '1', '1', 'lnest_admin', '/content/show//7', '0', '1417483084', '1446443230', '1', '【晒单专区】导航下横幅广告位', '', '[]', '', '200', '[{\"path\":\"\\/upload\\/images\\/gallery\\/0\\/2\\/3_src.jpg\",\"title\":\"690_src\"}]', '');
INSERT INTO zz_ad VALUES ('8', '1', '1', 'lnest_admin', '/content/show//8', '0', '1417675668', '1449378219', '1', '【一元夺宝】封面导航下横幅广告位', '', '[]', '', '205', '[{\"path\":\"\\/upload\\/images\\/gallery\\/0\\/1\\/2_src.jpg\",\"title\":\"691_src\"}]', '#2cda99');
INSERT INTO zz_ad VALUES ('9', '1', '1', 'lnest_admin', '/content/show//9', '0', '1431938148', '1446443122', '1', '【免费挖宝】导航下广告位', '', '[]', '', '200', '[{\"path\":\"\\/upload\\/images\\/gallery\\/0\\/1\\/2_src.jpg\",\"title\":\"691_src\"}]', '');
INSERT INTO zz_ad VALUES ('10', '1', '2', 'admin', '/content/show//10', '0', '1450660037', '1466476814', '1', '【微信】主导航下焦点图', '', '[]', '740', '300', '[{\"path\":\"\\/upload\\/images\\/gallery\\/1\\/a\\/47_src.png\",\"title\":\"\"}]', '');
INSERT INTO zz_ad VALUES ('11', '1', '1', 'lnest_admin', '/content/show//11', '0', '1448973421', '1466476818', '1', '【卡券列表页】导航下广告位', '', '[]', '', '180', '[]', '#29c49f');
INSERT INTO zz_ad VALUES ('12', '1', '1', 'lnest_admin', '/content/show//12', '0', '1448973552', '1466476822', '1', '【精品拍列表页】导航下广告位 ', '', '[]', '', '180', '[]', '#fef840');
INSERT INTO zz_ad VALUES ('13', '1', '1', 'lnest_admin', '/content/show//13', '0', '1448973627', '1466476827', '1', '【体验区】导航下横幅广告位', '', '[]', '', '180', '[]', '#ff8830');
INSERT INTO zz_ad VALUES ('14', '1', '1', 'lnest_admin', '/content/show//14', '0', '1449815702', '1464315372', '1', '【通用】页面顶部广告', '', '[{\"path\":\"\\/upload\\/images\\/gallery\\/5\\/p\\/206_src.png\",\"title\":\"baidu.com\"}]', '', '200', '[{\"path\":\"\\/upload\\/images\\/gallery\\/5\\/p\\/206_src.png\",\"title\":\"\\/member\\/regist\"}]', '');
INSERT INTO zz_ad VALUES ('17', '1', '1', 'lnest_admin', '/content/show//17', '0', '1456119362', '0', '1', '【网盘登录】主导航下焦点图', '', '[]', '1639', '550', '[{\"path\":\"\\/upload\\/images\\/gallery\\/5\\/j\\/200_src.jpg\",\"title\":\"banner\"},{\"path\":\"\\/upload\\/images\\/gallery\\/5\\/j\\/200_src.jpg\",\"title\":\"banner\"},{\"path\":\"\\/upload\\/images\\/gallery\\/5\\/j\\/200_src.jpg\",\"title\":\"banner\"}]', '');

-- ----------------------------
-- Table structure for `zz_app`
-- ----------------------------
DROP TABLE IF EXISTS `zz_app`;
CREATE TABLE `zz_app` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(60) DEFAULT NULL,
  `app` varchar(60) DEFAULT NULL COMMENT 'APP名称',
  `secretkey` varchar(60) DEFAULT NULL COMMENT '密钥',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of zz_app
-- ----------------------------
INSERT INTO zz_app VALUES ('1', '云购', 'yunbuy', '0fd1ff545d0df8cc9e464370c5b2eddd');

-- ----------------------------
-- Table structure for `zz_article`
-- ----------------------------
DROP TABLE IF EXISTS `zz_article`;
CREATE TABLE `zz_article` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `catid` smallint(5) unsigned NOT NULL DEFAULT '0',
  `userid` int(8) unsigned NOT NULL DEFAULT '0',
  `username` varchar(40) NOT NULL DEFAULT '',
  `title` varchar(255) NOT NULL DEFAULT '',
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
  `publish` text NOT NULL,
  `link` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `status` (`id`,`status`,`listorder`),
  KEY `catid` (`id`,`catid`,`status`),
  KEY `listorder` (`id`,`catid`,`status`,`listorder`)
) ENGINE=MyISAM AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of zz_article
-- ----------------------------

-- ----------------------------
-- Table structure for `zz_auction_log`
-- ----------------------------
DROP TABLE IF EXISTS `zz_auction_log`;
CREATE TABLE `zz_auction_log` (
  `log_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `act_id` mediumint(8) unsigned NOT NULL,
  `bid_user` mediumint(8) unsigned NOT NULL,
  `bid_price` decimal(10,2) unsigned NOT NULL,
  `bid_time` decimal(20,3) unsigned NOT NULL,
  `first` int(5) DEFAULT '1' COMMENT '第几次出价',
  `cod` varchar(10) DEFAULT NULL COMMENT '中奖随机码',
  `cod_true` varchar(10) NOT NULL DEFAULT '' COMMENT '当期中奖号',
  `status` int(1) DEFAULT '0' COMMENT '0默认状态 -1未中奖 1已中奖 2已领奖',
  `cod_time` decimal(20,0) DEFAULT NULL COMMENT '中奖时间',
  `frozen` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0未解冻',
  `win` decimal(5,2) NOT NULL,
  `is_show` tinyint(1) NOT NULL DEFAULT '1',
  `ip` varchar(50) DEFAULT NULL,
  `fdis` tinyint(1) NOT NULL DEFAULT '0' COMMENT '1永不失效',
  PRIMARY KEY (`log_id`,`cod_true`),
  KEY `act_id` (`act_id`),
  KEY `idx_bid_user` (`bid_user`),
  KEY `idx_status` (`status`),
  KEY `idx_first` (`first`),
  KEY `idx_id_u_t` (`act_id`,`bid_user`,`bid_time`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of zz_auction_log
-- ----------------------------

-- ----------------------------
-- Table structure for `zz_award_ivt`
-- ----------------------------
DROP TABLE IF EXISTS `zz_award_ivt`;
CREATE TABLE `zz_award_ivt` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mid` int(11) NOT NULL,
  `username` varchar(60) NOT NULL,
  `ivt_mid` int(11) NOT NULL COMMENT '被邀请者ID',
  `num` smallint(6) NOT NULL DEFAULT '0' COMMENT '领取所需邀请人数',
  `status` smallint(3) NOT NULL DEFAULT '1' COMMENT '状态:1处理中2：处理完成',
  `remark` varchar(255) NOT NULL COMMENT '备注',
  `addtime` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of zz_award_ivt
-- ----------------------------

-- ----------------------------
-- Table structure for `zz_block`
-- ----------------------------
DROP TABLE IF EXISTS `zz_block`;
CREATE TABLE `zz_block` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `mark` char(30) NOT NULL DEFAULT '',
  `name` varchar(30) NOT NULL DEFAULT '',
  `lang` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `content` text,
  `listorder` int(10) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `pos` (`mark`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of zz_block
-- ----------------------------
INSERT INTO zz_block VALUES ('12', 'agree', '【注册】用户服务协议', '1', '<h4 style=\"text-align:center;\" class=\"color01\">\r\n	<span style=\"font-size:18px;\">用户服务协议</span><br />\r\n</h4>\r\n<h4 style=\"text-align:justify;\">\r\n	一、用户注册\r\n</h4>\r\n<p style=\"text-align:justify;\">\r\n	1、用户注册是指用户登录爱我拍，按要求填写相关信息并确认同意本服务协议的过程。\r\n</p>\r\n<p style=\"text-align:justify;\">\r\n	2、爱我拍用户必须是具有完全民事行为能力的自然人，或者是具有合法经营资格的实体组织。无民事行为能力人、限制民事行为能力人以及无经营或特定经营资格的组织不得注册为爱我拍用户或超过其民事权利或行为能力范围与爱我拍进行交易，如与爱我拍进行交易的，则服务协议自始无效，爱我拍有权立即停止与该用户的交易、注销该用户账户，并有权要求其承担相应法律责任。\r\n</p>\r\n<h4 style=\"text-align:justify;\">\r\n	二、用户的帐号，密码和安全性\r\n</h4>\r\n<p style=\"text-align:justify;\">\r\n	用户一旦注册成功，成为本站的合法用户。用户将对用户名和密码安全负全部责任。此外，每个用户都要对以其用户名进行的所有活动和事件负全责。用户若发现任何非法使用用户帐号或存在安全漏洞的情况，请立即通告本站。\r\n</p>\r\n<h4 style=\"text-align:justify;\">\r\n	三、爱我拍原则\r\n</h4>\r\n<p style=\"text-align:justify;\">\r\n	平等原则：用户和爱我拍在交易过程中具有同等的法律地位。\r\n</p>\r\n<p style=\"text-align:justify;\">\r\n	自由原则：用户享有自愿向爱我拍参与商品竞拍、一元夺宝的权利，任何人不得非法干预。\r\n</p>\r\n<p style=\"text-align:justify;\">\r\n	公平原则：用户和爱我拍行使权利、履行义务应当遵循公平原则。\r\n</p>\r\n<p style=\"text-align:justify;\">\r\n	诚实信用原则：用户和爱我拍行使权利、履行义务应当遵循诚实信用原则。\r\n</p>\r\n<p style=\"text-align:justify;\">\r\n	履行义务原则：用户向爱我拍参与商品竞拍、一元夺宝时，用户和爱我拍皆有有义务根据本服务协议的约定完成该等交易（法律或本协议禁止的交易除外）\r\n</p>\r\n<p style=\"text-align:justify;\">\r\n	四、用户的权利和义务\r\n</p>\r\n<p style=\"text-align:justify;\">\r\n	1、用户有权拥有其在爱我拍的用户名及密码，并用该用户名和密码登录爱我拍参与商品竞拍和一元夺宝。用户不得以任何形式转让或授权他人使用自己的爱我拍用户名和密码。\r\n</p>\r\n<p style=\"text-align:justify;\">\r\n	2、用户有权根据本协议的规定以及爱我拍网站上发布的相关规则在爱我拍上查询商品信息、发表使用体验、参与商品讨论、邀请关注好友、上传商品图片、参加爱我拍的有关活动，以及享受爱我拍提供的其它信息服务。\r\n</p>\r\n<p style=\"text-align:justify;\">\r\n	3、用户有义务在注册时提供自己的真实资料，并保证诸如电子邮件地址、联系电话、联系地址、邮政编码等内容的有效性及真实性，保证爱我拍可以通过上述联系方式与用户本人进行联系。同时，用户也有义务在相关资料发生变更时及时更新有关注册资料。用户保证不以他人资料在爱我拍进行注册和参与商品分享购买。\r\n</p>\r\n<p style=\"text-align:justify;\">\r\n	4、用户应当保证在爱我拍参与商品竞拍、一元夺宝时，遵守诚实信用原则，不扰乱网上交易的正常秩序。\r\n</p>\r\n<p style=\"text-align:justify;\">\r\n	5、用户在成为爱我拍的会员后，可按爱我拍的拍币规则、夺宝币规则，获得相应的拍币和夺宝币。累积的拍币、夺宝币可用于拍币商城、一元夺宝区进行相应的商品兑换。拍币规则、夺宝币规则连同与该规则相关的条款和条件，构成用户与爱我拍之间的完整协议。接受本协议，即表明接受拍币规则、夺宝币规则中的条款和条件。\r\n</p>\r\n<p style=\"text-align:justify;\">\r\n	6、用户享有言论自由权利，但用户不得在爱我拍发表包含以下内容的言论：\r\n</p>\r\n<p style=\"text-align:justify;\">\r\n	1)&nbsp;反对宪法所确定的基本原则，煽动、抗拒、破坏宪法和法律、行政法规实施的；\r\n</p>\r\n<p style=\"text-align:justify;\">\r\n	2)&nbsp;煽动颠覆国家政权，推翻社会主义制度，煽动、分裂国家，破坏国家统一的；\r\n</p>\r\n<p style=\"text-align:justify;\">\r\n	3)&nbsp;损害国家荣誉和利益的；\r\n</p>\r\n<p style=\"text-align:justify;\">\r\n	4)&nbsp;煽动民族仇恨、民族歧视，破坏民族团结的；\r\n</p>\r\n<p style=\"text-align:justify;\">\r\n	5)&nbsp;任何包含对种族、性别、宗教、地域内容等歧视的；\r\n</p>\r\n<p style=\"text-align:justify;\">\r\n	6)&nbsp;捏造或者歪曲事实，散布谣言，扰乱社会秩序的；\r\n</p>\r\n<p style=\"text-align:justify;\">\r\n	7)&nbsp;宣扬封建迷信、邪教、淫秽、色情、赌博、暴力、凶杀、恐怖、教唆犯罪的；\r\n</p>\r\n<p style=\"text-align:justify;\">\r\n	8)&nbsp;公然侮辱他人或者捏造事实诽谤他人的，或者进行其他恶意攻击的；\r\n</p>\r\n<p style=\"text-align:justify;\">\r\n	9)&nbsp;损害国家机关信誉的；\r\n</p>\r\n<p style=\"text-align:justify;\">\r\n	10)&nbsp;其他违反宪法和法律行政法规的。\r\n</p>\r\n<p style=\"text-align:justify;\">\r\n	7、用户在发表使用体验、讨论图片等，除遵守本条款外，还应遵守该讨论区的相关规定。\r\n</p>\r\n<p style=\"text-align:justify;\">\r\n	8、未经爱我拍同意，禁止用户在网站发布任何形式的广告。\r\n</p>\r\n<h4 style=\"text-align:justify;\">\r\n	五、爱我拍的权利和义务\r\n</h4>\r\n<p style=\"text-align:justify;\">\r\n	1、爱我拍有义务在现有技术上维护整个网上交易平台的正常运行，并努力提升和改进技术，使用户网上交易活动得以顺利进行；\r\n</p>\r\n<p style=\"text-align:justify;\">\r\n	2、对用户在注册和使用爱我拍网上交易平台中所遇到的与交易或注册有关的问题及反映的情况，爱我拍应及时作出回复；\r\n</p>\r\n<p style=\"text-align:justify;\">\r\n	3、对于用户在爱我拍网站上作出下列行为的，爱我拍有权作出删除相关信息、终止提供服务等处理，而无须征得用户的同意：\r\n</p>\r\n<p style=\"text-align:justify;\">\r\n	1)&nbsp;爱我拍有权对用户的注册信息及购买行为进行查阅，发现注册信息或购买行为中存在任何问题的，有权向用户发出询问及要求改正的通知或者作出删除等处理；\r\n</p>\r\n<p style=\"text-align:justify;\">\r\n	2)&nbsp;用户违反本协议规定或有违反法律法规和地方规章的行为的，爱我拍有权停止传输并删除其信息，禁止用户发言，注销用户账户并按照相关法律规定向相关主管部门进行披露。\r\n</p>\r\n<p style=\"text-align:justify;\">\r\n	3)&nbsp;对于用户在爱我拍进行的下列行为，爱我拍有权对用户采取删除其信息、禁止用户发言、注销用户账户等限制性措施：包括发布或以电子邮件或以其他方式传送存在恶意、虚假和侵犯他人人身财产权利内容的信息，进行与分享购物无关或不是以分享购物为目的的活动，恶意注册、签到、评论等方式试图扰乱正常购物秩序，将有关干扰、破坏或限制任何计算机软件、硬件或通讯设备功能的软件病毒或其他计算机代码、档案和程序之资料，加以上载、发布、发送电子邮件或以其他方式传送，干扰或破坏爱我拍网站和服务或与爱我拍网站和服务相连的服务器和网络，或发布其他违反公共利益或可能严重损害爱我拍和其它用户合法利益的信息。\r\n</p>\r\n<p style=\"text-align:justify;\">\r\n	4、用户在此免费授予爱我拍永久性的独家使用权(并有权对该权利进行再授权)，使爱我拍有权在全球范围内(全部或部分地)使用、复制、修订、改写、发布、翻译和展示用户公示于爱我拍网站的各类信息，或制作其派生作品，和或以现在已知或日后开发的任何形式、媒体或技术，将上述信息纳入其它作品内。\r\n</p>\r\n<p style=\"text-align:justify;\">\r\n	5、对于爱我拍网络平台已上架商品，爱我拍有权根据市场变动修改商品价格，而无需提前通知客户。\r\n</p>\r\n<p style=\"text-align:justify;\">\r\n	6、爱我拍分享购物模式，秉着双方自愿原则，分享购物存在风险，爱我拍不对商品竞拍、一元夺宝区所抽取的“幸运编号”结果承担责任，望所有用户谨慎参与。\r\n</p>\r\n<p style=\"text-align:justify;\">\r\n	7、爱我拍一元夺宝区，120天未达到“总需参与人次”的商品，用户可通过客服申请退款，所退款项将在3个工作日内，退还至用户爱我拍账户中。\r\n</p>', '0');
INSERT INTO zz_block VALUES ('3', 'footer', '【公用】页底内容', '1', 'Copyright &copy; 2001-2014 XXX 版权所有 xxx.net All Right Reserved<br />\r\n<p>\r\n	津ICP备130020xx号-x <a href=\"/?tpl=mobile\">触屏版</a>&nbsp;<span style=\"line-height:1.5;\">&nbsp;</span> \r\n</p>', '0');
INSERT INTO zz_block VALUES ('9', 'server', '【购物车】服务协议-一元夺宝', '1', '<h4 style=\"text-align:left;\">\r\n</h4>\r\n<h4 style=\"text-align:left;text-indent:21pt;\">\r\n	<span style=\"font-size:14px;font-family:\'Microsoft YaHei\';\">一</span><span style=\"font-size:14px;font-family:\'Microsoft YaHei\';\">、配送及费用</span><span style=\"font-size:10.5pt;font-family:\'sans serif\';\"></span> \r\n</h4>\r\n<p class=\"p15\" style=\"text-align:left;text-indent:21pt;\">\r\n	<span style=\"font-size:14px;font-family:\'Microsoft YaHei\';\">爱我拍将会把产品送到您所指定的送货地址。全国免费配送（港澳台地区除外）。</span> \r\n</p>\r\n<p class=\"p15\" style=\"text-align:left;text-indent:21pt;\">\r\n	<span style=\"font-size:14px;font-family:\'Microsoft YaHei\';\">请清楚准确地填写您的真实姓名、送货地址及联系方式。因如下情况造成配送延迟或无法配送等，本站将不承担责任：</span><span style=\"font-size:10.5pt;font-family:\'sans serif\';\"></span> \r\n</p>\r\n<p class=\"p15\" style=\"text-align:left;text-indent:21pt;\">\r\n	<span style=\"font-size:14px;font-family:\'Microsoft YaHei\';\">1、客户提供错误信息和不详细的地址；</span><span style=\"font-size:10.5pt;font-family:\'sans serif\';\"></span> \r\n</p>\r\n<p class=\"p15\" style=\"text-align:left;text-indent:21pt;\">\r\n	<span style=\"font-size:14px;font-family:\'Microsoft YaHei\';\">2、货物送达无人签收，由此造成的重复配送所产生的费用及相关的后果。</span><span style=\"font-size:10.5pt;font-family:\'sans serif\';\"></span> \r\n</p>\r\n<p class=\"p15\" style=\"text-align:left;text-indent:21pt;\">\r\n	<span style=\"font-size:14px;font-family:\'Microsoft YaHei\';\">3、不可抗力，例如：自然灾害、交通戒严、突发战争等。</span><span style=\"font-size:10.5pt;font-family:\'sans serif\';\"></span> \r\n</p>\r\n<h4 style=\"text-align:left;text-indent:21pt;\">\r\n	<span style=\"font-size:14px;font-family:\'Microsoft YaHei\';\">二</span><span style=\"font-size:14px;font-family:\'Microsoft YaHei\';\">、商品缺货规则</span><span style=\"font-size:10.5pt;font-family:\'sans serif\';\"></span> \r\n</h4>\r\n<p class=\"p15\" style=\"text-align:left;text-indent:21pt;\">\r\n	<span style=\"font-size:14px;font-family:\'Microsoft YaHei\';\">由于市场变化及各种以合理商业努力难以控制的因素的影响，爱我拍网无法承诺用户所获得的商品都会有货；用户获得的商品或服务如果发生缺货，协议双方均无权取消该交易，爱我拍网将通过有效方式通知用户进行换货，用户可选择换购本商城同等价位的商品（一件或多件），或选择补差价换购高价位商品。</span><span style=\"font-size:10.5pt;font-family:\'sans serif\';\"></span> \r\n</p>\r\n<p class=\"p15\" style=\"text-align:left;text-indent:21pt;\">\r\n	<span style=\"font-size:14px;font-family:\'Microsoft YaHei\';\">爱我拍网可对即将上市的商品或服务进行预售登记，爱我拍网会在商品或者服务正式上市之后尽最大努力在最快时间内给商品获得者安排发货，预售登记并不做交易处理，不构成要约。</span> \r\n</p>\r\n<p class=\"p15\" style=\"text-align:left;text-indent:21pt;\">\r\n	<span style=\"font-size:14px;font-family:\'Microsoft YaHei\';\"> </span> \r\n</p>\r\n<h4 style=\"text-indent:21.0000pt;text-align:justify;vertical-align:;\">\r\n	<span style=\"color:#333333;font-size:14px;font-family:\'Microsoft YaHei\';\">三、责任限制</span> \r\n</h4>\r\n<p class=\"p15\" style=\"text-align:left;text-indent:21pt;\">\r\n	<span style=\"font-size:14px;font-family:\'Microsoft YaHei\';\"> </span> \r\n</p>\r\n<div>\r\n	<span style=\"font-family:\'Microsoft YaHei\';font-size:14px;\">&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</span><span style=\"font-family:\'Microsoft YaHei\';font-size:14px;\">1、用户理解并同意，在使用爱我拍网服务的过程中，可能会遇到不可抗力等风险因素使爱我拍网服务发生中断。不可抗力是指不能预见、不能克服并不能避免且对一方或双方造成重大影响的客观事件，包括但不限于自然灾害如洪水、地震、瘟疫流行和风暴等以及社会事件如战争、动乱、政府行为等。出现上述情况时，爱我拍网将努力在第一时间与相关单位配合，及时进行修复，但是由此给用户造成的损失，爱我拍网将在法律允许的范围内免责。</span><br />\r\n<span style=\"font-family:\'Microsoft YaHei\';font-size:14px;\"> &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;2、用户理解并同意，爱我拍网不能随时预见和防范法律、技术以及其他不可控的风险，对以下情形之一导致的服务中断或受阻，爱我拍网不承担责任：</span><br />\r\n<span style=\"font-family:\'Microsoft YaHei\';font-size:14px;\"> &nbsp; &nbsp;&nbsp;（1）大规模病毒、木马或其他恶意程序、黑客攻击的破坏；</span><br />\r\n<span style=\"font-family:\'Microsoft YaHei\';font-size:14px;\"> &nbsp; &nbsp;&nbsp;（2）用户或爱我拍网的电脑软件、系统、硬件和通信线路出现故障；</span><br />\r\n<span style=\"font-family:\'Microsoft YaHei\';font-size:14px;\"> &nbsp; &nbsp; （3）用户操作不当；</span><br />\r\n<span style=\"font-family:\'Microsoft YaHei\';font-size:14px;\"> &nbsp; &nbsp;&nbsp;（4）用户通过非爱我拍网授权的方式使用服务；</span><br />\r\n<span style=\"font-family:\'Microsoft YaHei\';font-size:14px;\"> &nbsp; &nbsp;&nbsp;（5）政府管制等原因可能导致的服务中断、数据丢失以及其他的损失和风险。</span><br />\r\n<span style=\"font-family:\'Microsoft YaHei\';font-size:14px;\"> &nbsp; &nbsp;&nbsp;（6）其他爱我拍网无法控制或合理预见的情形。</span><br />\r\n<span style=\"font-family:\'Microsoft YaHei\';font-size:14px;\"> &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;3、在法律法规所允许的限度内，因使用爱我拍服务而引起的任何损害或经济损失，爱我拍承担的全部责任均不超过用户所购买的与该索赔有关的商品价格。这些责任限制条款将在法律所允许的最大限度内适用，并在用户资格被撤销或终止后仍继续有效。&nbsp;</span> \r\n</div>\r\n<br />\r\n<p>\r\n	<br />\r\n</p>\r\n<div style=\"text-align:left;\">\r\n	<span style=\"font-family:\'Microsoft YaHei\';font-size:14px;background-color:#E53333;\"></span> \r\n</div>', '0');
INSERT INTO zz_block VALUES ('11', 'aboutdb', '【夺宝详细页】一元夺宝是什么', '1', '<p>\r\n	<br />\r\n</p>\r\n<p style=\"text-indent:21.0000pt;text-align:justify;vertical-align:;background:#FFFFFF;\">\r\n	<span style=\"font-size:10.5pt;font-family:微软雅黑;\">一元夺宝，就是指</span><span style=\"font-size:10.5pt;font-family:微软雅黑;\">会员每</span><span style=\"font-size:10.5pt;font-family:微软雅黑;\">花费1元购买</span><span style=\"font-size:10.5pt;font-family:微软雅黑;\">爱我拍网</span><span style=\"font-size:10.5pt;font-family:微软雅黑;\">盘空间</span><span style=\"font-size:10.5pt;font-family:微软雅黑;\">1兆</span><span style=\"font-size:10.5pt;font-family:微软雅黑;\">，</span><span style=\"font-size:10.5pt;font-family:微软雅黑;\">即可获赠</span><span style=\"font-size:10.5pt;font-family:微软雅黑;\">1个夺宝币，</span><span style=\"font-size:10.5pt;font-family:微软雅黑;\">就有机会获得一件</span><span style=\"font-size:10.5pt;font-family:微软雅黑;\">商品</span><span style=\"font-size:10.5pt;font-family:微软雅黑;\">。</span><span style=\"font-size:10.5pt;font-family:微软雅黑;\">每件商品被平分成若干“等份”，每份</span><span style=\"font-size:10.5pt;font-family:微软雅黑;\">1元即1个夺宝币，同时获得对应一个号码。当一件商品所有等份即相应号码被分配完成后，</span><span style=\"font-size:10.5pt;font-family:微软雅黑;\">根据预先制定的规则计算出一个幸运号码，持有该号码的</span><span style=\"font-size:10.5pt;font-family:微软雅黑;\">会员</span><span style=\"font-size:10.5pt;font-family:微软雅黑;\">，直接获得该</span><span style=\"font-size:10.5pt;font-family:微软雅黑;\">商品</span><span style=\"font-size:10.5pt;font-family:微软雅黑;\">。</span> \r\n</p>', '0');
INSERT INTO zz_block VALUES ('13', 'footer_mobile', '【手机版】【公用】页底内容', '1', '&copy;2014-2015 <a href=\"http://www.225.net\">爱我拍</a> 版权所有<br />\r\n闽B2-20050063号-5', '0');
INSERT INTO zz_block VALUES ('14', 'server02', '【购物车】服务协议-免费夺宝', '1', '<h4 style=\\\"text-align:left;text-indent:21pt;margin-top:0pt;margin-bottom:0pt;\\\">\r\n	<span style=\\\"letter-spacing:0pt;font-size:14px;font-family:\\\'Microsoft YaHei\\\';\\\">一</span><span style=\\\"letter-spacing:0pt;font-size:14px;font-family:\\\'Microsoft YaHei\\\';\\\">、配送及费用</span><span style=\\\"letter-spacing:0pt;font-size:10.5pt;font-family:\\\'sans serif\\\';\\\"></span> \r\n</h4>\r\n<p class=\\\"p15\\\" style=\\\"text-align:left;text-indent:21pt;margin-top:0pt;margin-bottom:0pt;\\\">\r\n	<span style=\\\"letter-spacing:0pt;font-size:14px;font-family:\\\'Microsoft YaHei\\\';\\\">爱我拍将会把产品送到您所指定的送货地址。全国免费配送（港澳台地区除外）。</span> \r\n</p>\r\n<p class=\\\"p15\\\" style=\\\"text-align:left;text-indent:21pt;margin-top:0pt;margin-bottom:0pt;\\\">\r\n	<span style=\\\"letter-spacing:0pt;font-size:14px;font-family:\\\'Microsoft YaHei\\\';\\\">请清楚准确地填写您的真实姓名、送货地址及联系方式。因如下情况造成配送延迟或无法配送等，本站将不承担责任：</span><span style=\\\"letter-spacing:0pt;font-size:10.5pt;font-family:\\\'sans serif\\\';\\\"></span> \r\n</p>\r\n<p class=\\\"p15\\\" style=\\\"text-align:left;text-indent:21pt;margin-top:0pt;margin-bottom:0pt;\\\">\r\n	<span style=\\\"letter-spacing:0pt;font-size:14px;font-family:\\\'Microsoft YaHei\\\';\\\">1、客户提供错误信息和不详细的地址；</span><span style=\\\"letter-spacing:0pt;font-size:10.5pt;font-family:\\\'sans serif\\\';\\\"></span> \r\n</p>\r\n<p class=\\\"p15\\\" style=\\\"text-align:left;text-indent:21pt;margin-top:0pt;margin-bottom:0pt;\\\">\r\n	<span style=\\\"letter-spacing:0pt;font-size:14px;font-family:\\\'Microsoft YaHei\\\';\\\">2、货物送达无人签收，由此造成的重复配送所产生的费用及相关的后果。</span><span style=\\\"letter-spacing:0pt;font-size:10.5pt;font-family:\\\'sans serif\\\';\\\"></span> \r\n</p>\r\n<p class=\\\"p15\\\" style=\\\"text-align:left;text-indent:21pt;margin-top:0pt;margin-bottom:0pt;\\\">\r\n	<span style=\\\"letter-spacing:0pt;font-size:14px;font-family:\\\'Microsoft YaHei\\\';\\\">3、不可抗力，例如：自然灾害、交通戒严、突发战争等。</span><span style=\\\"letter-spacing:0pt;font-size:10.5pt;font-family:\\\'sans serif\\\';\\\"></span> \r\n</p>\r\n<h4 style=\\\"text-align:left;text-indent:21pt;margin-top:0pt;margin-bottom:0pt;\\\">\r\n	<span style=\\\"letter-spacing:0pt;font-size:14px;font-family:\\\'Microsoft YaHei\\\';\\\">二</span><span style=\\\"letter-spacing:0pt;font-size:14px;font-family:\\\'Microsoft YaHei\\\';\\\">、商品缺货规则</span><span style=\\\"letter-spacing:0pt;font-size:10.5pt;font-family:\\\'sans serif\\\';\\\"></span> \r\n</h4>\r\n<p class=\\\"p15\\\" style=\\\"text-align:left;text-indent:21pt;margin-top:0pt;margin-bottom:0pt;\\\">\r\n	<span style=\\\"letter-spacing:0pt;font-size:14px;font-family:\\\'Microsoft YaHei\\\';\\\">由\r\n于市场变化及各种以合理商业努力难以控制的因素的影响，爱我拍网无法承诺用户所获得的商品都会有货；用户获得的商品或服务如果发生缺货，协议双方均无权取\r\n消该交易，爱我拍网将通过有效方式通知用户进行换货，用户可选择换购本商城同等价位的商品（一件或多件），或选择补差价换购高价位商品。</span><span style=\\\"letter-spacing:0pt;font-size:10.5pt;font-family:\\\'sans serif\\\';\\\"></span> \r\n</p>\r\n<p class=\\\"p15\\\" style=\\\"text-align:left;text-indent:21pt;margin-top:0pt;margin-bottom:0pt;\\\">\r\n	<span style=\\\"letter-spacing:0pt;font-size:14px;font-family:\\\'Microsoft YaHei\\\';\\\">爱我拍网可对即将上市的商品或服务进行预售登记，爱我拍网会在商品或者服务正式上市之后尽最大努力在最快时间内给商品获得者安排发货，预售登记并不做交易处理，不构成要约。</span> \r\n</p>\r\n<p class=\\\"p15\\\" style=\\\"text-align:left;text-indent:21pt;margin-top:0pt;margin-bottom:0pt;\\\">\r\n	<span style=\\\"letter-spacing:0pt;font-size:14px;font-family:\\\'Microsoft YaHei\\\';\\\"> </span> \r\n</p>\r\n<h4 style=\\\"text-indent:21.0000pt;margin-top:0pt;margin-bottom:0pt;padding:0pt 0pt 0pt 0pt;text-autospace:ideograph-other;text-align:justify;line-height:22.0000pt;vertical-align:;\\\">\r\n	<span style=\\\"color:#333333;letter-spacing:0pt;font-size:14px;font-family:\\\'Microsoft YaHei\\\';\\\">三、责任限制</span> \r\n</h4>\r\n<p class=\\\"p15\\\" style=\\\"text-align:left;text-indent:21pt;margin-top:0pt;margin-bottom:0pt;\\\">\r\n	<span style=\\\"letter-spacing:0pt;font-size:14px;font-family:\\\'Microsoft YaHei\\\';\\\"> </span> \r\n</p>\r\n<div>\r\n	<span style=\\\"font-family:\\\'Microsoft YaHei\\\';font-size:14px;\\\">&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</span><span style=\\\"font-family:\\\'Microsoft YaHei\\\';font-size:14px;\\\">1、\r\n用户理解并同意，在使用爱我拍网服务的过程中，可能会遇到不可抗力等风险因素使爱我拍网服务发生中断。不可抗力是指不能预见、不能克服并不能避免且对一方\r\n或双方造成重大影响的客观事件，包括但不限于自然灾害如洪水、地震、瘟疫流行和风暴等以及社会事件如战争、动乱、政府行为等。出现上述情况时，爱我拍网将\r\n努力在第一时间与相关单位配合，及时进行修复，但是由此给用户造成的损失，爱我拍网将在法律允许的范围内免责。</span><br />\r\n<span style=\\\"font-family:\\\'Microsoft YaHei\\\';font-size:14px;\\\"> &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;2、用户理解并同意，爱我拍网不能随时预见和防范法律、技术以及其他不可控的风险，对以下情形之一导致的服务中断或受阻，爱我拍网不承担责任：</span><br />\r\n<span style=\\\"font-family:\\\'Microsoft YaHei\\\';font-size:14px;\\\"> &nbsp; &nbsp;&nbsp;（1）大规模病毒、木马或其他恶意程序、黑客攻击的破坏；</span><br />\r\n<span style=\\\"font-family:\\\'Microsoft YaHei\\\';font-size:14px;\\\"> &nbsp; &nbsp;&nbsp;（2）用户或爱我拍网的电脑软件、系统、硬件和通信线路出现故障；</span><br />\r\n<span style=\\\"font-family:\\\'Microsoft YaHei\\\';font-size:14px;\\\"> &nbsp; &nbsp; （3）用户操作不当；</span><br />\r\n<span style=\\\"font-family:\\\'Microsoft YaHei\\\';font-size:14px;\\\"> &nbsp; &nbsp;&nbsp;（4）用户通过非爱我拍网授权的方式使用服务；</span><br />\r\n<span style=\\\"font-family:\\\'Microsoft YaHei\\\';font-size:14px;\\\"> &nbsp; &nbsp;&nbsp;（5）政府管制等原因可能导致的服务中断、数据丢失以及其他的损失和风险。</span><br />\r\n<span style=\\\"font-family:\\\'Microsoft YaHei\\\';font-size:14px;\\\"> &nbsp; &nbsp;&nbsp;（6）其他爱我拍网无法控制或合理预见的情形。</span><br />\r\n<span style=\\\"font-family:\\\'Microsoft YaHei\\\';font-size:14px;\\\"> &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;3、在法律法规所允许的限度内，因使用爱我拍服务而引起的任何损害或经济损失，爱我拍承担的全部责任均不超过用户所购买的与该索赔有关的商品价格。这些责任限制条款将在法律所允许的最大限度内适用，并在用户资格被撤销或终止后仍继续有效。&nbsp;</span> \r\n</div>\r\n<br />\r\n<p>\r\n	<br />\r\n</p>\r\n<div style=\\\"text-align:left;\\\">\r\n	<span style=\\\"font-family:\\\'Microsoft YaHei\\\';font-size:14px;background-color:#E53333;\\\"></span> \r\n</div>', '0');
INSERT INTO zz_block VALUES ('16', 'business_agree', '商家入驻协议', '1', '商家入驻协议', '0');

-- ----------------------------
-- Table structure for `zz_bonus`
-- ----------------------------
DROP TABLE IF EXISTS `zz_bonus`;
CREATE TABLE `zz_bonus` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `money` decimal(10,0) NOT NULL DEFAULT '0',
  `money_type` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0夺宝币 1余额',
  `send_type` tinyint(1) NOT NULL DEFAULT '0' COMMENT '1免费夺宝中奖赠送',
  `use_day` int(5) DEFAULT '0' COMMENT '使用天数 0不限制',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of zz_bonus
-- ----------------------------
INSERT INTO zz_bonus VALUES ('1', '1夺宝币抵用券', '1', '0', '1', '7');
INSERT INTO zz_bonus VALUES ('2', '5夺宝币抵用券', '5', '0', '0', '30');
INSERT INTO zz_bonus VALUES ('10', '100夺宝币抵用券', '100', '0', '0', '1');
INSERT INTO zz_bonus VALUES ('11', '满减抵用券', '1', '0', '0', '0');

-- ----------------------------
-- Table structure for `zz_brand`
-- ----------------------------
DROP TABLE IF EXISTS `zz_brand`;
CREATE TABLE `zz_brand` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT '编号',
  `catname` varchar(255) NOT NULL COMMENT '分类名称',
  `parentid` int(10) NOT NULL DEFAULT '0' COMMENT '父级ID',
  `arrparentid` text NOT NULL COMMENT '父类ID组',
  `arrchildid` text NOT NULL COMMENT '子类ID组',
  `child` tinyint(1) NOT NULL COMMENT '是否有子级',
  `keywords` varchar(120) NOT NULL COMMENT '页面关键字',
  `description` int(255) NOT NULL COMMENT '页面描述',
  `listorder` smallint(5) NOT NULL DEFAULT '0' COMMENT '排序',
  `thumb` varchar(255) NOT NULL COMMENT '缩略图',
  `url` varchar(255) NOT NULL COMMENT 'URL',
  `ismenu` smallint(3) NOT NULL DEFAULT '0' COMMENT '是否导航',
  `mid` int(11) DEFAULT '0' COMMENT '商户会员ID',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=57 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of zz_brand
-- ----------------------------

-- ----------------------------
-- Table structure for `zz_business`
-- ----------------------------
DROP TABLE IF EXISTS `zz_business`;
CREATE TABLE `zz_business` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `mid` int(11) NOT NULL DEFAULT '0' COMMENT '会员ID',
  `bus_name` varchar(200) NOT NULL COMMENT '商家名称',
  `bus_company` varchar(200) DEFAULT NULL COMMENT '公司名称',
  `bus_company_type` varchar(255) DEFAULT NULL COMMENT '实体类型',
  `bus_qq` varchar(20) DEFAULT NULL COMMENT '客服QQ',
  `bus_address` varchar(200) DEFAULT NULL COMMENT '公司地址',
  `bus_zone` int(10) DEFAULT '0' COMMENT '区域ID',
  `bus_area` varchar(100) DEFAULT NULL COMMENT '区域',
  `bus_status` tinyint(2) DEFAULT '0' COMMENT '-1审核未通过 0审核中 10审核成功 20店铺关闭',
  `bus_times` tinyint(2) DEFAULT '0' COMMENT '申请入驻次数',
  `time_apply` int(11) DEFAULT NULL COMMENT '申请时间',
  `time_open` int(11) DEFAULT NULL COMMENT '开店时间',
  `bus_why` text COMMENT '备注',
  `bus_logo` varchar(255) DEFAULT NULL COMMENT '店铺LOGO',
  `bus_intro` text COMMENT '商家介绍',
  `bus_ads` text COMMENT '广告图',
  `bus_scope` varchar(255) DEFAULT NULL COMMENT '经营范围',
  `bus_tel` varchar(20) DEFAULT NULL COMMENT '客服电话',
  `bus_limit` int(8) DEFAULT '0' COMMENT '默认商品发布上限',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of zz_business
-- ----------------------------

-- ----------------------------
-- Table structure for `zz_cart`
-- ----------------------------
DROP TABLE IF EXISTS `zz_cart`;
CREATE TABLE `zz_cart` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `mid` int(11) unsigned NOT NULL DEFAULT '0',
  `goods_id` int(11) unsigned NOT NULL DEFAULT '0',
  `goods_name` varchar(250) NOT NULL DEFAULT '',
  `market_price` decimal(12,2) unsigned NOT NULL DEFAULT '0.00',
  `goods_price` decimal(12,2) NOT NULL DEFAULT '0.00',
  `goods_number` smallint(5) unsigned NOT NULL DEFAULT '0',
  `is_real` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `cart_type` tinyint(2) unsigned NOT NULL DEFAULT '0',
  `extension_id` int(11) NOT NULL DEFAULT '0',
  `addtime` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=55 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of zz_cart
-- ----------------------------

-- ----------------------------
-- Table structure for `zz_category`
-- ----------------------------
DROP TABLE IF EXISTS `zz_category`;
CREATE TABLE `zz_category` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `catname` varchar(30) NOT NULL DEFAULT '',
  `catdir` varchar(30) DEFAULT NULL,
  `parentdir` varchar(50) DEFAULT NULL,
  `parentid` smallint(5) unsigned NOT NULL DEFAULT '0',
  `moduleid` tinyint(2) unsigned NOT NULL DEFAULT '0',
  `module` char(24) DEFAULT NULL,
  `arrparentid` text,
  `arrchildid` text,
  `type` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `title` varchar(150) DEFAULT NULL,
  `keywords` varchar(100) DEFAULT '',
  `description` varchar(255) DEFAULT NULL,
  `listorder` smallint(5) unsigned NOT NULL DEFAULT '0',
  `ishtml` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `ismenu` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `hits` int(10) unsigned NOT NULL DEFAULT '0',
  `thumb` varchar(255) DEFAULT NULL,
  `child` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `url` varchar(150) DEFAULT NULL,
  `template_list` varchar(20) DEFAULT NULL,
  `template_show` varchar(20) DEFAULT NULL,
  `pagesize` tinyint(2) unsigned NOT NULL DEFAULT '0',
  `readgroup` varchar(100) NOT NULL DEFAULT '0',
  `listtype` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `lang` tinyint(2) unsigned NOT NULL DEFAULT '0',
  `urlruleid` tinyint(2) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `parentid` (`parentid`),
  KEY `listorder` (`listorder`)
) ENGINE=MyISAM AUTO_INCREMENT=90 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of zz_category
-- ----------------------------
INSERT INTO zz_category VALUES ('1', '关于我们', '', '', '0', '0', '', '0', '1,2,3,77,80', '1', '', '', '', '0', '0', '1', '0', '', '1', '/content/index/2', '', '', '0', '', '0', '1', '0');
INSERT INTO zz_category VALUES ('2', '公司简介', '', '', '1', '1', 'page', '0,1', '2', '0', '', '', '', '5', '0', '1', '0', '', '0', '/content/index/2', 'index', '', '0', '', '1', '1', '0');
INSERT INTO zz_category VALUES ('41', '服务保障', '', '', '7', '0', '', '0,7', '41,53,54,55,75', '1', '', '', '', '1', '0', '0', '0', '', '1', '/content/index/53', '', '', '10', '', '0', '1', '0');
INSERT INTO zz_category VALUES ('4', '网站公告', '', '', '0', '2', 'article', '0', '4,58,59,60,61,76', '0', '', '', '', '5', '0', '1', '0', '', '1', '/content/index/4', '', '', '10', '', '0', '1', '0');
INSERT INTO zz_category VALUES ('44', '竞拍规则', '', '', '38', '1', 'page', '0,7,38', '44', '0', '', '', '', '3', '0', '1', '0', '', '0', '/content/index/44', '', '', '10', '', '1', '1', '0');
INSERT INTO zz_category VALUES ('40', '物流配送', '', '', '7', '0', '', '0,7', '40,72,52,73,74', '1', '', '', '', '2', '0', '1', '0', '', '1', '/content/index/52', '', '', '10', '', '0', '1', '0');
INSERT INTO zz_category VALUES ('39', '交易攻略', '', '', '7', '0', '', '0,7', '39,47,48,49', '1', '', '', '', '3', '0', '1', '0', '', '1', '/content/index/47', '', '', '10', '', '1', '1', '0');
INSERT INTO zz_category VALUES ('43', '会员经验值', '', '', '38', '1', 'page', '0,7,38', '43', '0', '', '', '', '4', '0', '1', '0', '', '0', '/content/index/43', '', '', '10', '', '1', '1', '0');
INSERT INTO zz_category VALUES ('38', '新手指南', '', '', '7', '0', '', '0,7', '38,44,43,42,79,78,71', '1', '', '', '', '4', '0', '1', '0', '', '1', '/content/index/42', '', '', '10', '', '0', '1', '0');
INSERT INTO zz_category VALUES ('3', '加入我们', '', '', '1', '1', 'page', '0,1', '3', '0', '', '', '', '4', '0', '1', '0', '', '0', '/content/index/3', 'index', '', '0', '', '1', '1', '0');
INSERT INTO zz_category VALUES ('7', '帮助中心', '', '', '0', '2', 'article', '0', '7,41,53,54,55,75,40,72,52,73,74,39,47,48,49,38,44,43,42,79,78,71,86,88', '0', '', '', '', '0', '0', '1', '0', '', '1', '/content/index/7', 'list', '', '12', '', '0', '1', '0');
INSERT INTO zz_category VALUES ('42', '服务协议', '', '', '38', '1', 'page', '0,7,38', '42', '0', '', '', '', '5', '0', '0', '0', '', '0', '/content/index/42', '', '', '10', '', '1', '1', '0');
INSERT INTO zz_category VALUES ('79', '什么是竞拍', null, null, '38', '1', 'page', '0,7,38', '79', '0', '', '', '', '0', '0', '1', '0', '', '0', '/content/index/79', '', '', '10', '0', '1', '1', '0');
INSERT INTO zz_category VALUES ('72', '商品验收与签收', null, null, '40', '1', 'page', '0,7,40', '72', '0', '', '', '', '0', '0', '1', '0', '', '0', '/content/index/72', '', '', '10', '0', '1', '1', '0');
INSERT INTO zz_category VALUES ('47', '竞拍常见问题', '', '', '39', '1', 'page', '0,7,39', '47', '0', '', '', '', '0', '0', '1', '0', '', '0', '/content/index/47', '', '', '10', '', '1', '1', '0');
INSERT INTO zz_category VALUES ('48', '各频道上线时间', '', '', '39', '1', 'page', '0,7,39', '48', '0', '', '', '', '0', '0', '1', '0', '', '0', '/content/index/48', '', '', '10', '', '1', '1', '0');
INSERT INTO zz_category VALUES ('49', '一元夺宝常见问题', '', '', '39', '1', 'page', '0,7,39', '49', '0', '', '', '', '0', '0', '1', '0', '', '0', '/content/index/49', '', '', '10', '', '1', '1', '0');
INSERT INTO zz_category VALUES ('77', '联系我们', null, null, '1', '1', 'page', '0,1', '77', '0', '', '', '', '0', '0', '1', '0', '', '0', '/content/index/77', '', '', '10', '0', '1', '1', '0');
INSERT INTO zz_category VALUES ('78', '币值说明', null, null, '38', '1', 'page', '0,7,38', '78', '0', '', '', '', '0', '0', '1', '0', '', '0', '/content/index/78', '', '', '10', '0', '1', '1', '0');
INSERT INTO zz_category VALUES ('52', '物流配送及退换货', '', '', '40', '1', 'page', '0,7,40', '52', '0', '', '', '', '0', '0', '1', '0', '', '0', '/content/index/52', '', '', '10', '', '1', '1', '0');
INSERT INTO zz_category VALUES ('53', '投诉与建议', '', '', '41', '1', 'page', '0,7,41', '53', '0', '', '', '', '0', '0', '0', '0', '', '0', '/content/index/53', '', '', '10', '', '1', '1', '0');
INSERT INTO zz_category VALUES ('54', '安全支付', '', '', '41', '1', 'page', '0,7,41', '54', '0', '', '', '', '0', '0', '1', '0', '', '0', '/content/index/54', '', '', '10', '', '1', '1', '0');
INSERT INTO zz_category VALUES ('55', '保障体系', '', '', '41', '1', 'page', '0,7,41', '55', '0', '', '', '', '0', '0', '1', '0', '', '0', '/content/index/55', '', '', '10', '', '1', '1', '0');
INSERT INTO zz_category VALUES ('56', '活动推荐', '', '', '0', '2', 'article', '0', '56', '0', '', '', '', '0', '0', '1', '0', '', '0', '/content/index/56', 'list_news', 'show_news', '10', '', '0', '1', '0');
INSERT INTO zz_category VALUES ('58', '网站公告', '', '', '4', '2', 'article', '0,4', '58', '0', '', '', '', '0', '0', '0', '0', '', '0', '/content/index/58', '', 'show', '10', '', '0', '1', '0');
INSERT INTO zz_category VALUES ('59', '卡券竞拍公告', '', '', '4', '2', 'article', '0,4', '59', '0', '', '', '', '0', '0', '1', '0', '', '0', '/content/index/59', '', '', '10', '', '0', '1', '0');
INSERT INTO zz_category VALUES ('60', '精品竞拍公告', '', '', '4', '2', 'article', '0,4', '60', '0', '', '', '', '0', '0', '1', '0', '', '0', '/content/index/60', '', '', '10', '', '0', '1', '0');
INSERT INTO zz_category VALUES ('61', '竞拍体验公告', '', '', '4', '2', 'article', '0,4', '61', '0', '', '', '', '0', '0', '1', '0', '', '0', '/content/index/61', '', '', '10', '', '0', '1', '0');
INSERT INTO zz_category VALUES ('62', '在线留言', '', '', '0', '4', 'gbook', '0', '62', '0', '', '', '', '0', '0', '1', '0', '', '0', '/content/index/62', '', '', '10', '', '0', '1', '0');
INSERT INTO zz_category VALUES ('64', '中奖规则', null, null, '0', '1', 'page', '0', '64', '0', '', '', '', '0', '0', '1', '0', '', '0', '/content/index/64', 'index_spec', '', '10', '0', '1', '1', '0');
INSERT INTO zz_category VALUES ('65', '云购资讯', null, null, '0', '2', 'article', '0', '65,67,68', '0', '', '', '', '0', '0', '1', '0', '', '1', '/content/index/65', 'list_news', '', '10', '0', '0', '1', '0');
INSERT INTO zz_category VALUES ('67', '竞拍资讯', null, null, '65', '2', 'article', '0,65', '67', '0', '', '', '', '0', '0', '1', '0', '', '0', '/content/index/67', 'list_news', '', '10', '0', '0', '1', '0');
INSERT INTO zz_category VALUES ('68', '夺宝资讯', null, null, '65', '2', 'article', '0,65', '68', '0', '', '', '', '0', '0', '1', '0', '', '0', '/content/index/68', 'list_news', '', '10', '0', '0', '1', '0');
INSERT INTO zz_category VALUES ('69', '一元夺宝新手学堂', null, null, '0', '1', 'page', '0', '69', '0', '', '', '', '0', '0', '1', '0', '', '0', '/content/index/69', '', '', '10', '0', '1', '1', '0');
INSERT INTO zz_category VALUES ('71', '一元夺宝规则', null, null, '38', '1', 'page', '0,7,38', '71', '0', '', '', '', '0', '0', '1', '0', '', '0', '/content/index/71', '', '', '10', '0', '1', '1', '0');
INSERT INTO zz_category VALUES ('73', '退换货政策', null, null, '40', '1', 'page', '0,7,40', '73', '0', '', '', '', '0', '0', '1', '0', '', '0', '/content/index/73', '', '', '10', '0', '1', '1', '0');
INSERT INTO zz_category VALUES ('74', '发货时间', null, null, '40', '1', 'page', '0,7,40', '74', '0', '', '', '', '0', '0', '1', '0', '', '0', '/content/index/74', '', '', '10', '0', '1', '1', '0');
INSERT INTO zz_category VALUES ('75', '正品保障', null, null, '41', '1', 'page', '0,7,41', '75', '0', '', '', '', '0', '0', '1', '0', '', '0', '/content/index/75', '', '', '10', '0', '1', '1', '0');
INSERT INTO zz_category VALUES ('76', '会员中心公告', null, null, '4', '2', 'article', '0,4', '76', '0', '', '', '', '0', '0', '1', '0', '', '0', '/content/index/76', '', '', '10', '0', '0', '1', '0');
INSERT INTO zz_category VALUES ('80', '官方交流群', null, null, '1', '1', 'page', '0,1', '80', '0', '', '', '', '0', '0', '1', '0', '', '0', '/content/index/80', 'index_spec', '', '10', '0', '1', '1', '0');
INSERT INTO zz_category VALUES ('86', '新手测试', null, null, '7', '1', 'page', '0,7', '86,88', '0', '', '', '', '0', '0', '1', '0', '', '1', '/content/index/86', 'index_spec', '', '10', '0', '1', '1', '0');
INSERT INTO zz_category VALUES ('88', '测试', null, null, '86', '1', 'page', '0,7,86', '88', '0', '', '', '', '0', '0', '1', '0', '', '0', '/content/index/88', 'index', '', '10', '0', '1', '1', '0');
INSERT INTO zz_category VALUES ('89', '测试栏目', null, null, '0', '1', 'page', '0', '89', '0', '', '', '', '0', '0', '1', '0', '', '0', '/content/index/89', 'index_spec', '', '10', '0', '1', '1', '0');

-- ----------------------------
-- Table structure for `zz_cod`
-- ----------------------------
DROP TABLE IF EXISTS `zz_cod`;
CREATE TABLE `zz_cod` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `cod` varchar(20) DEFAULT NULL COMMENT '开奖号',
  `addtime` int(10) DEFAULT NULL COMMENT '开奖日期',
  `nexttime` int(10) DEFAULT NULL COMMENT '下期开奖时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of zz_cod
-- ----------------------------

-- ----------------------------
-- Table structure for `zz_comment`
-- ----------------------------
DROP TABLE IF EXISTS `zz_comment`;
CREATE TABLE `zz_comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `oid` int(11) NOT NULL DEFAULT '0' COMMENT '评论对象ID',
  `module` varchar(30) CHARACTER SET utf8 NOT NULL COMMENT '模型表',
  `parent_id` int(11) NOT NULL DEFAULT '0' COMMENT '父ID',
  `mid` int(11) NOT NULL,
  `username` varchar(60) NOT NULL,
  `content` text CHARACTER SET utf8 NOT NULL COMMENT '评论内容',
  `addtime` int(10) NOT NULL COMMENT '评论时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of zz_comment
-- ----------------------------

-- ----------------------------
-- Table structure for `zz_commission`
-- ----------------------------
DROP TABLE IF EXISTS `zz_commission`;
CREATE TABLE `zz_commission` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mid` int(11) NOT NULL COMMENT '会员ID',
  `username` varchar(60) NOT NULL DEFAULT '' COMMENT '会员名',
  `ivt_mid` int(11) NOT NULL COMMENT '被邀请者ID',
  `ivt_username` varchar(60) NOT NULL COMMENT '被邀请用户名',
  `order_id` int(11) NOT NULL DEFAULT '0' COMMENT '订单ID',
  `total` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '订单金额',
  `commission` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '佣金',
  `desc` varchar(255) NOT NULL COMMENT '描述',
  `addtime` int(10) NOT NULL COMMENT '添加时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of zz_commission
-- ----------------------------

-- ----------------------------
-- Table structure for `zz_config`
-- ----------------------------
DROP TABLE IF EXISTS `zz_config`;
CREATE TABLE `zz_config` (
  `varname` varchar(20) NOT NULL DEFAULT '' COMMENT '参数名',
  `title` varchar(100) NOT NULL DEFAULT '' COMMENT '配置名称',
  `group` varchar(20) NOT NULL DEFAULT 'index' COMMENT '分组',
  `value` text NOT NULL COMMENT '参数值',
  `tip` varchar(255) DEFAULT NULL COMMENT '提示信息',
  `form_type` varchar(100) DEFAULT 'text' COMMENT '表单类型',
  `user` tinyint(1) DEFAULT '0' COMMENT '是否为自定义参数',
  `lang` tinyint(2) unsigned NOT NULL DEFAULT '0' COMMENT '多语言',
  `step` text,
  `listorder` int(11) DEFAULT '0',
  KEY `varname` (`varname`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of zz_config
-- ----------------------------
INSERT INTO zz_config VALUES ('site_name', '网站名称', 'index', '云购商城', '请最多输入5个汉字', null, null, '1', null, null);
INSERT INTO zz_config VALUES ('seo_title', 'SEO标题', 'index', '云购商城', null, null, null, '1', null, null);
INSERT INTO zz_config VALUES ('seo_keywords', 'SEO关键词', 'index', '', null, null, null, '1', null, null);
INSERT INTO zz_config VALUES ('seo_description', 'SEO简介', 'index', '', null, 'textarea', null, '1', null, null);
INSERT INTO zz_config VALUES ('cloudurl2', '云存储地址2', 'index', '', '', 'text', '1', '2', '{\"size\":\"\",\"default\":\"\",\"ispassword\":\"0\"}', '16');
INSERT INTO zz_config VALUES ('mail_type', '邮件发送模式', 'mail', '1', '', 'radio', null, '0', '{\"options\":\"SMTP \\u51fd\\u6570\\u53d1\\u9001|1\\r\\nMail \\u6a21\\u5757\\u53d1\\u9001|2\"}', '1');
INSERT INTO zz_config VALUES ('mail_server', '邮件服务器', 'mail', 'smtp.163.com', '', 'text', null, '0', '', '3');
INSERT INTO zz_config VALUES ('cloudurl', '云存储地址', 'index', '', '', 'text', '1', '2', '{\"size\":\"\",\"default\":\"\",\"ispassword\":\"0\"}', '15');
INSERT INTO zz_config VALUES ('cloudsave', '文件云存储', 'index', '0', '', 'select', '1', '2', '{\"options\":\"\\u5f00\\u542f|1\\r\\n\\u5173\\u95ed|0\",\"multiple\":\"0\",\"fieldtype\":\"varchar\",\"numbertype\":\"1\",\"size\":\"\",\"default\":\"0\"}', '14');
INSERT INTO zz_config VALUES ('mail_port', '服务器端口', 'mail', '25', '', 'text', null, '0', '', '3');
INSERT INTO zz_config VALUES ('mail_send', '发件人地址	', 'mail', '', '<a href=\"javascript:;\" onclick=\"main.openmail(document.getElementById(\'mail_send\').value);\">点击进入邮箱</a>', 'text', null, '0', '', '4');
INSERT INTO zz_config VALUES ('mail_user', '验证用户名', 'mail', '', '', 'text', null, '0', '', '6');
INSERT INTO zz_config VALUES ('mail_password', '验证密码', 'mail', '', '', 'text', null, '0', '{\"size\":\"\",\"default\":\"\",\"ispassword\":\"1\"}', '7');
INSERT INTO zz_config VALUES ('page_listrows', '后台列表分页数', 'system', '10', null, null, null, '0', '{\"size\":\"60\",\"default\":\"\",\"ispassword\":\"0\"}', '2');
INSERT INTO zz_config VALUES ('verify_admin', '后台登陆验证码', 'system', '0', '', 'select', null, '0', '{\"options\":\"\\u5f00\\u542f|1\\r\\n\\u5173\\u95ed|0\"}', '3');
INSERT INTO zz_config VALUES ('searchwords', '热门搜索', 'index', '苹果6 苹果电脑', '', 'text', '1', '1', '{\"size\":\"\",\"default\":\"\",\"ispassword\":\"0\"}', '13');
INSERT INTO zz_config VALUES ('weibo_appid', '微博应用标识', 'oauth', '', '', 'text', '1', '1', '{\"size\":\"\",\"default\":\"\",\"ispassword\":\"0\"}', '7');
INSERT INTO zz_config VALUES ('weibo_appkey', '微博应用密钥', 'oauth', '', '', 'text', '1', '1', '{\"size\":\"\",\"default\":\"\",\"ispassword\":\"0\"}', '8');
INSERT INTO zz_config VALUES ('share_db', '发布晒单奖励夺宝币', 'index', '1', '', 'text', '1', '1', '{\"size\":\"\",\"default\":\"1\",\"ispassword\":\"0\"}', '22');
INSERT INTO zz_config VALUES ('rec_share_db', '精华晒单奖励夺宝币', 'index', '5', '', 'text', '1', '1', '{\"size\":\"\",\"default\":\"5\",\"ispassword\":\"0\"}', '23');
INSERT INTO zz_config VALUES ('withdraw_fee', '提现手续费', 'index', '0.5%|一个工作日\r\n0.3%|三个工作日\r\n0|一周内', '含%时以百分比计算否则以固定值收取，格式：手续费|天数', 'textarea', '1', '1', '{\"fieldtype\":\"text\",\"width\":\"\",\"height\":\"\",\"default\":\"\"}', '12');
INSERT INTO zz_config VALUES ('allow_time', '分享码使用次数', 'index', '0', '分享码允许使用次数(每次被使用均有返利)', 'text', '1', '1', '{\"size\":\"\",\"default\":\"\",\"ispassword\":\"0\"}', '11');
INSERT INTO zz_config VALUES ('work', '工作时间', 'index', '周一到周日 8:00-18:00', '', 'textarea', '1', '1', '{\"fieldtype\":\"text\",\"width\":\"\",\"height\":\"\",\"default\":\"\"}', '6');
INSERT INTO zz_config VALUES ('logCount', '参与人数', '', '0', '', 'text', '1', '1', '{\"size\":\"\",\"default\":\"\",\"ispassword\":\"0\"}', '14');
INSERT INTO zz_config VALUES ('qq_appid', 'QQ应用标识', 'oauth', '', '', 'text', '1', '1', '{\"size\":\"\",\"default\":\"\",\"ispassword\":\"0\"}', '3');
INSERT INTO zz_config VALUES ('qq_appkey', 'QQ应用密钥', 'oauth', '', '', 'text', '1', '1', '{\"size\":\"\",\"default\":\"\",\"ispassword\":\"0\"}', '4');
INSERT INTO zz_config VALUES ('weibo_login', '微博登录', 'oauth', '1', '', 'select', '1', '1', '{\"options\":\"\\u5f00\\u542f|1\\r\\n\\u5173\\u95ed|0\",\"multiple\":\"0\",\"fieldtype\":\"varchar\",\"numbertype\":\"1\",\"size\":\"\",\"default\":\"0\"}', '5');
INSERT INTO zz_config VALUES ('tel', '服务电话', 'index', '400-0901-xxx', '', 'text', '1', '1', '{\"size\":\"\",\"default\":\"\",\"ispassword\":\"0\"}', '2');
INSERT INTO zz_config VALUES ('sms_tel', '商家手机号码', 'sms', '', '', 'text', null, '1', '{\"size\":\"\",\"default\":\"\",\"ispassword\":\"0\"}', '5');
INSERT INTO zz_config VALUES ('page_size', '前台列表分页数', 'system', '10', '', 'text', '0', '2', '{\"size\":\"60\",\"default\":\"\",\"ispassword\":\"0\"}', '1');
INSERT INTO zz_config VALUES ('page_size', '前台列表分页数', 'system', '15', '', 'text', '0', '1', '{\"size\":\"60\",\"default\":\"10\",\"ispassword\":\"0\"}', '1');
INSERT INTO zz_config VALUES ('email', '邮箱', 'index', 'xxx@xxx.net', '', 'text', '1', '1', '{\"size\":\"\",\"default\":\"\",\"ispassword\":\"0\"}', '3');
INSERT INTO zz_config VALUES ('address', '地址', 'index', '厦门软件园', '', 'text', '1', '1', '{\"size\":\"\",\"default\":\"\",\"ispassword\":\"0\"}', '4');
INSERT INTO zz_config VALUES ('manageip', '后台白名单', 'system', '', '后台允许登录的IP地址，#后为注释', 'textarea', '1', '1', '{\"fieldtype\":\"text\",\"width\":\"\",\"height\":\"180\",\"default\":\"\"}', '4');
INSERT INTO zz_config VALUES ('app_logo', 'APPLOGO', 'index', '[{\"path\":\"\\/upload\\/images\\/gallery\\/5\\/e\\/195_src.png\",\"title\":\"\"}]', '', 'images', '1', '1', '{\"upload_maxnum\":\"1\",\"upload_maxsize\":\"\",\"upload_allowext\":\"*.gif;*.jpg;*.jpeg;*.png\",\"watermark\":\"0\",\"more\":\"0\"}', '34');
INSERT INTO zz_config VALUES ('mail_auth', 'AUTH LOGIN验证', 'mail', '0', '', 'radio', null, '0', '{\"options\":\"\\u5426|0\\r\\n\\u662f|1\",\"fieldtype\":\"tinyint\",\"numbertype\":\"1\",\"labelwidth\":\"\",\"default\":\"0\"}', '5');
INSERT INTO zz_config VALUES ('qq_login', 'QQ登录', 'oauth', '1', '', 'select', '1', '1', '{\"options\":\"\\u5f00\\u542f|1\\r\\n\\u5173\\u95ed|0\",\"multiple\":\"0\",\"fieldtype\":\"varchar\",\"numbertype\":\"1\",\"size\":\"\",\"default\":\"0\"}', '1');
INSERT INTO zz_config VALUES ('sms_mod', '发送模式', 'sms', '0', '调试模式将不下发短信，短信日志请查看应用目录www/log/下的日志文件《sms_log_互亿无线短信平台帐号.log》', 'radio', null, '1', '{\"options\":\"\\u6b63\\u5e38\\u53d1\\u9001|0\\r\\n\\u8c03\\u8bd5\\u6a21\\u5f0f|1\",\"fieldtype\":\"tinyint\",\"numbertype\":\"1\",\"labelwidth\":\"\",\"default\":\"0\"}', '3');
INSERT INTO zz_config VALUES ('mail_open', '邮件发送总开关', 'mail', '1', '', 'select', null, '0', '{\"options\":\"\\u5173\\u95ed|0\\r\\n\\u5f00\\u542f|1\",\"multiple\":\"0\",\"fieldtype\":\"tinyint\",\"numbertype\":\"1\",\"size\":\"\",\"default\":\"0\"}', '0');
INSERT INTO zz_config VALUES ('sms_open', '短信发送总开关', 'sms', '1', '', 'select', null, '0', '{\"options\":\"\\u5173\\u95ed|0\\r\\n\\u5f00\\u542f|1\",\"multiple\":\"0\",\"fieldtype\":\"tinyint\",\"numbertype\":\"1\",\"size\":\"\",\"default\":\"0\"}', '1');
INSERT INTO zz_config VALUES ('sms_type', '短信平台', 'sms', '1', '推荐接口 申请短信接口账号，请点击这里（<a href=\"http://www.ihuyi.com/product.php?c=JAqqM\" target=\"_blank\">互亿短信</a>）</br>云通讯调用其它接口中语音验证码的三个帐号，切换到云通讯后需要到短信模板按提示重新编辑模板', 'radio', null, '0', '{\"options\":\"\\u4e0a\\u6d77\\u4e92\\u4ebf|1\\r\\n\\u4e91\\u901a\\u8baf|2\",\"fieldtype\":\"tinyint\",\"numbertype\":\"1\",\"labelwidth\":\"\",\"default\":\"1\"}', '2');
INSERT INTO zz_config VALUES ('sms_username', '平台帐号', 'sms', '', '', 'text', null, '1', '{\"size\":\"\",\"default\":\"\",\"ispassword\":\"0\"}', '3');
INSERT INTO zz_config VALUES ('sms_password', '平台密码', 'sms', '', '', 'text', null, '1', '{\"size\":\"\",\"default\":\"\",\"ispassword\":\"1\"}', '4');
INSERT INTO zz_config VALUES ('order_share', '分享码价值', 'index', '1', '用户第一次下单时，获得分享码价值', 'text', '1', '2', '{\"size\":\"\",\"default\":\"\",\"ispassword\":\"0\"}', '7');
INSERT INTO zz_config VALUES ('order_back', '分享码返现', 'index', '0', '分享码被使用时返现给所属用户', 'text', '1', '2', '{\"size\":\"\",\"default\":\"\",\"ispassword\":\"0\"}', '8');
INSERT INTO zz_config VALUES ('ivt1', '邀请注册一', 'index', '5', '邀请1人注册奖励拍币', 'text', '1', '1', '{\"size\":\"\",\"default\":\"\",\"ispassword\":\"0\"}', '17');
INSERT INTO zz_config VALUES ('ivt3', '邀请注册二', 'index', '0', '邀请注册3人获得夺宝币', 'text', '1', '1', '{\"size\":\"\",\"default\":\"\",\"ispassword\":\"0\"}', '18');
INSERT INTO zz_config VALUES ('ivtreg_db', '邀请注册夺宝提成', 'index', '0', '如：5,3 表示二级、三级分别得5,3个点的分销提成，以此类推', 'text', '1', '1', '{\"size\":\"\",\"default\":\"\",\"ispassword\":\"0\"}', '19');
INSERT INTO zz_config VALUES ('ivtreg_auction', '邀请注册竞拍提成', 'index', '0', '邀请注册会员参与竞拍提成', 'text', '1', '1', '{\"size\":\"\",\"default\":\"\",\"ispassword\":\"0\"}', '20');
INSERT INTO zz_config VALUES ('withdraw_commission', '佣金提现最低限额', 'index', '100', '佣金达到该额度时放可申请提现', 'text', '1', '1', '{\"size\":\"\",\"default\":\"\",\"ispassword\":\"0\"}', '21');
INSERT INTO zz_config VALUES ('withdraw_discount', '兑换夺宝币优惠', 'index', '50|1\r\n100|2\r\n200|3', '换多少送多少 格式:兑换额度|赠送', 'textarea', '1', '1', '{\"fieldtype\":\"text\",\"width\":\"\",\"height\":\"\",\"default\":\"50|10\\r\\n100|20\\r\\n200|50\"}', '25');
INSERT INTO zz_config VALUES ('signin_jl', '签到奖励', 'index', '5', '', 'text', '1', '1', '{\"size\":\"\",\"default\":\"5\",\"ispassword\":\"0\"}', '26');
INSERT INTO zz_config VALUES ('change_db_limit', '兑换夺宝币赠送抵用券限制', 'index', '1000', '每日兑换夺宝币最多可以送出的抵用券面值总量', 'text', '1', '1', '{\"size\":\"\",\"default\":\"\",\"ispassword\":\"0\"}', '28');
INSERT INTO zz_config VALUES ('ivt_award_num', '邀请奖励限制', 'index', '0', '邀请人数到30位起需实名认证或充值才能领取奖励', 'text', '1', '1', '{\"size\":\"\",\"default\":\"\",\"ispassword\":\"0\"}', '27');
INSERT INTO zz_config VALUES ('isPhoto', '赚拍币【上传头像】', 'money', '2', '', 'text', '1', '1', '{\"size\":\"\",\"default\":\"\",\"ispassword\":\"0\"}', '1');
INSERT INTO zz_config VALUES ('isVoice', '赚拍币【语音认证】', 'money', '1', '', 'text', '1', '1', '{\"size\":\"\",\"default\":\"\",\"ispassword\":\"0\"}', '2');
INSERT INTO zz_config VALUES ('isIdcard', '赚拍币【实名认证】', 'money', '1', '', 'text', '1', '1', '{\"size\":\"\",\"default\":\"\",\"ispassword\":\"0\"}', '3');
INSERT INTO zz_config VALUES ('isMail', '赚拍币【邮箱认证】', 'money', '1', '', 'text', '1', '1', '{\"size\":\"\",\"default\":\"\",\"ispassword\":\"0\"}', '4');
INSERT INTO zz_config VALUES ('isDaren', '赚拍币【夺宝达人】', 'money', '50', '', 'text', '1', '1', '{\"size\":\"\",\"default\":\"\",\"ispassword\":\"0\"}', '5');
INSERT INTO zz_config VALUES ('isJpDaren', '赚拍币【竞拍达人】', 'money', '50', '', 'text', '1', '1', '{\"size\":\"\",\"default\":\"\",\"ispassword\":\"0\"}', '6');
INSERT INTO zz_config VALUES ('voice_open', '语音验证码', 'iface', '0', '接口网址：http://www.yuntongxun.com/solution/smsAndLandingCall?kw=BPyzm', 'select', '1', '1', '{\"options\":\"\\u5f00\\u542f|1\\r\\n\\u7981\\u7528|0\",\"multiple\":\"0\",\"fieldtype\":\"tinyint\",\"numbertype\":\"1\",\"size\":\"\",\"default\":\"1\"}', '1');
INSERT INTO zz_config VALUES ('voice_sid', 'ACCOUNT SID', 'iface', '', '语音验证码SID', 'text', '1', '1', '{\"size\":\"\",\"default\":\"\",\"ispassword\":\"0\"}', '2');
INSERT INTO zz_config VALUES ('voice_token', 'AUTH TOKEN', 'iface', '', '语音验证码TOKEN', 'text', '1', '1', '{\"size\":\"\",\"default\":\"\",\"ispassword\":\"0\"}', '3');
INSERT INTO zz_config VALUES ('is_ssc', '开奖结果计算', 'index', '1', '云购开奖公式是否包含时时彩', 'radio', '1', '1', '{\"options\":\"\\u65e0|0\\r\\n\\u542b\\u65f6\\u65f6\\u5f69\\u5f00\\u5956|1\",\"fieldtype\":\"varchar\",\"numbertype\":\"1\",\"labelwidth\":\"\",\"default\":\"0\"}', '29');
INSERT INTO zz_config VALUES ('logo', '网站LOGO', 'index', '[{\"path\":\"\\/upload\\/images\\/gallery\\/5\\/q\\/207_src.png\",\"title\":\"\"}]', '', 'images', '1', '1', '{\"upload_maxnum\":\"\",\"upload_maxsize\":\"\",\"upload_allowext\":\"*.gif;*.jpg;*.jpeg;*.png\",\"watermark\":\"0\",\"more\":\"0\"}', null);
INSERT INTO zz_config VALUES ('mobile_logo', '手机版LOGO', 'index', '[{\"path\":\"\\/upload\\/images\\/gallery\\/5\\/o\\/205_src.png\",\"title\":\"\"}]', '', 'images', '1', '1', '{\"upload_maxnum\":\"\",\"upload_maxsize\":\"\",\"upload_allowext\":\"*.gif;*.jpg;*.jpeg;*.png\",\"watermark\":\"0\",\"more\":\"0\"}', null);
INSERT INTO zz_config VALUES ('wx_appid', '微信公众号AppID', 'oauth', '', '公众号必须为通过认证后的服务号或企业号才可进行配置,在开发者中心内查看', 'text', '1', '1', '{\"size\":\"\",\"default\":\"\",\"ispassword\":\"0\"}', '10');
INSERT INTO zz_config VALUES ('wx_appsecret', '微信公众号AppSecret', 'oauth', '', '', 'text', '1', '1', '{\"size\":\"\",\"default\":\"\",\"ispassword\":\"0\"}', '11');
INSERT INTO zz_config VALUES ('wx_login', '微信授权登录', 'oauth', '1', '', 'select', '1', '1', '{\"options\":\"\\u5f00\\u542f|1\\r\\n\\u5173\\u95ed|0\",\"multiple\":\"0\",\"fieldtype\":\"varchar\",\"numbertype\":\"1\",\"size\":\"\",\"default\":\"0\"}', '9');
INSERT INTO zz_config VALUES ('need_idcard', '领奖认证', 'index', '0', '领奖是否需要实名认证', 'select', '1', '1', '{\"options\":\"\\u662f|1\\r\\n\\u5426|0\",\"multiple\":\"0\",\"fieldtype\":\"varchar\",\"numbertype\":\"1\",\"size\":\"\",\"default\":\"0\"}', '30');
INSERT INTO zz_config VALUES ('weixin_logo', 'PC端底部微信二维码', 'index', '[{\"path\":\"\\/upload\\/images\\/gallery\\/5\\/i\\/199_src.png\",\"title\":\"\"}]', '', 'images', '1', '1', '{\"upload_maxnum\":\"\",\"upload_maxsize\":\"\",\"upload_allowext\":\"*.gif;*.jpg;*.jpeg;*.png\",\"watermark\":\"0\",\"more\":\"0\"}', '31');
INSERT INTO zz_config VALUES ('unit_yun', '云购', 'words', '夺宝', '', 'text', '1', '1', '{\"size\":\"\",\"default\":\"\",\"ispassword\":\"0\"}', '1');
INSERT INTO zz_config VALUES ('qq_admins', 'QQ验证', 'oauth', '', '将QQ验证代码填入此处，请不要随意添加内容', 'textarea', '1', '1', '{\"fieldtype\":\"text\",\"width\":\"\",\"height\":\"40\",\"default\":\"\"}', '4');
INSERT INTO zz_config VALUES ('unit_yun_one', '一元云购', 'words', '一元夺宝', '', 'text', '1', '1', '{\"size\":\"\",\"default\":\"\",\"ispassword\":\"0\"}', '2');
INSERT INTO zz_config VALUES ('wxpc_login', '微信扫码登录', 'oauth', '1', '', 'select', '1', '1', '{\"options\":\"\\u5f00\\u542f|1\\r\\n\\u5173\\u95ed|0\",\"multiple\":\"0\",\"fieldtype\":\"varchar\",\"numbertype\":\"1\",\"size\":\"\",\"default\":\"0\"}', '32');
INSERT INTO zz_config VALUES ('wxpc_appid', '微信扫码AppID', 'oauth', '', '', 'text', '1', '1', '{\"size\":\"\",\"default\":\"\",\"ispassword\":\"0\"}', '33');
INSERT INTO zz_config VALUES ('wxpc_appsecret', '微信扫码AppSecret', 'oauth', '', '', 'text', '1', '1', '{\"size\":\"\",\"default\":\"\",\"ispassword\":\"0\"}', '34');
INSERT INTO zz_config VALUES ('share_text', '会员分享内容', 'index', '#一元云购#我花1块钱买了个肾6，不害怕查私房钱的，快去看看吧！', '', 'textarea', '1', '1', '{\"fieldtype\":\"text\",\"width\":\"\",\"height\":\"\",\"default\":\"\"}', '32');
INSERT INTO zz_config VALUES ('voice_appid', 'APPID', 'iface', '', '', 'text', '1', '1', '{\"size\":\"\",\"default\":\"\",\"ispassword\":\"0\"}', '4');
INSERT INTO zz_config VALUES ('open_multi', '开启多期参与', 'index', '1', '', 'select', '1', '1', '{\"options\":\"\\u5f00\\u542f|1\\r\\n\\u5173\\u95ed|0\",\"multiple\":\"0\",\"fieldtype\":\"varchar\",\"numbertype\":\"1\",\"size\":\"\",\"default\":\"1\"}', '33');
INSERT INTO zz_config VALUES ('unit_yun_button', '立即云购', 'words', '立即夺宝', '', 'text', '1', '1', '{\"size\":\"\",\"default\":\"\",\"ispassword\":\"0\"}', '3');
INSERT INTO zz_config VALUES ('unit_bonus', '抵用券', 'words', '抵用券', '', 'text', '1', '1', '{\"size\":\"\",\"default\":\"\",\"ispassword\":\"0\"}', '5');
INSERT INTO zz_config VALUES ('unit_pay_points', '拍币', 'words', '拍币', '', 'text', '1', '1', '{\"size\":\"\",\"default\":\"\",\"ispassword\":\"0\"}', '7');
INSERT INTO zz_config VALUES ('unit_db_points', '云购币', 'words', '夺宝币', '', 'text', '1', '1', '{\"size\":\"\",\"default\":\"\",\"ispassword\":\"0\"}', '6');
INSERT INTO zz_config VALUES ('withdraw_status', '提现设置', 'index', '0', '提现开关设置（包括余额提现以及佣金提现）', 'select', '1', '1', '{\"options\":\"\\u5f00\\u542f|1\\r\\n\\u5173\\u95ed|0\"}', '54');
INSERT INTO zz_config VALUES ('unit_baozheng', '保证金', 'words', '保证金', '', 'text', '1', '1', '{\"size\":\"\",\"default\":\"\",\"ispassword\":\"0\"}', '8');
INSERT INTO zz_config VALUES ('unit_winning', '中奖', 'words', '中奖', '', 'text', '1', '1', '{\"size\":\"\",\"default\":\"\",\"ispassword\":\"0\"}', '9');
INSERT INTO zz_config VALUES ('unit_price', '奖品', 'words', '奖品', '', 'text', '1', '1', '{\"size\":\"\",\"default\":\"\",\"ispassword\":\"0\"}', '10');
INSERT INTO zz_config VALUES ('unit_gift', '注册有礼', 'words', '注册有礼', '', 'text', '1', '1', '{\"size\":\"\",\"default\":\"\",\"ispassword\":\"0\"}', '11');
INSERT INTO zz_config VALUES ('gift_db_points', '注册送夺宝币', 'index', '0', '注册送夺宝币', 'text', '1', '1', '{\"size\":\"\",\"default\":\"\",\"ispassword\":\"0\"}', '35');
INSERT INTO zz_config VALUES ('gift_money', '注册送积分', 'index', '0', '注册送拍币积分', 'text', '1', '1', '{\"size\":\"\",\"default\":\"\",\"ispassword\":\"0\"}', '36');
INSERT INTO zz_config VALUES ('gift_bonus', '注册送抵用券', 'index', '0', '注册送抵用券', 'text', '1', '1', '{\"size\":\"\",\"default\":\"\",\"ispassword\":\"0\"}', '37');
INSERT INTO zz_config VALUES ('status_site', '站点状态', 'index', '0', '', 'select', '1', '1', '{\"options\":\"\\u5f00\\u542f|0\\r\\n\\u5173\\u95ed|1\",\"multiple\":\"0\",\"fieldtype\":\"tinyint\",\"numbertype\":\"1\",\"size\":\"\",\"default\":\"0\"}', '38');
INSERT INTO zz_config VALUES ('status_tip', '站点关闭提示', 'index', '网站升级中，马上回来...', '', 'textarea', '1', '1', '{\"fieldtype\":\"text\",\"width\":\"\",\"height\":\"\",\"default\":\"\\u7f51\\u7ad9\\u5347\\u7ea7\\u4e2d\\uff0c\\u9a6c\\u4e0a\\u56de\\u6765...\"}', '39');
INSERT INTO zz_config VALUES ('apply_jufu', '聚宝付申请', 'index', '0', '聚宝付申请需要关闭一些操作，例如充值、提现', 'select', '1', '1', '{\"options\":\"\\u5f00\\u542f|1\\r\\n\\u5173\\u95ed|0\"}', '51');
INSERT INTO zz_config VALUES ('qqKey', 'APPQQ登录KEY', 'oauth', '', '', 'text', '1', '1', '{\"size\":\"\",\"default\":\"\",\"ispassword\":\"0\"}', '35');
INSERT INTO zz_config VALUES ('wxKey', 'APP微信登录', 'oauth', '', '', 'text', '1', '1', '{\"size\":\"\",\"default\":\"\",\"ispassword\":\"0\"}', '36');
INSERT INTO zz_config VALUES ('regip', '登录注册黑名单', 'system', '', '这些IP将禁止登录和注册，一行一个IP，#后为注释', 'textarea', '1', '1', '{\"fieldtype\":\"text\",\"width\":\"\",\"height\":\"180\",\"default\":\"\"}', '5');
INSERT INTO zz_config VALUES ('qty', '默认购买人次', 'index', '10', '', 'text', '1', '1', '{\"size\":\"\",\"default\":\"10\",\"ispassword\":\"0\"}', '41');
INSERT INTO zz_config VALUES ('full_cut', '满减', 'index', '10|1', '满多少抵多少 格式:下单额度|抵用券额度', 'text', '1', '1', '{\"size\":\"\",\"default\":\"10\",\"ispassword\":\"0\"}', '42');
INSERT INTO zz_config VALUES ('recchage_discount', '充值优惠', 'index', '10|1rn50|10rn100|20rn200|50rn500|150', '充多少送多少 格式:充值额度|赠送', 'textarea', '1', '1', '{\"fieldtype\":\"text\",\"width\":\"\",\"height\":\"\",\"default\":\"10|1rn50|10rn100|20rn200|50rn500|150\"}', '26');
INSERT INTO zz_config VALUES ('ios_url', 'IOS链接地址', 'index', '', 'IOS链接地址', 'text', '1', '1', '{\"size\":\"\",\"default\":\"\",\"ispassword\":\"0\"}', '45');
INSERT INTO zz_config VALUES ('and_url', '安卓链接地址', 'index', '', '安卓链接地址', 'text', '1', '1', '{\"size\":\"\",\"default\":\"\",\"ispassword\":\"0\"}', '45');
INSERT INTO zz_config VALUES ('zhigou_lv', '直购送拍币', 'index', '0.1', '直购区购买送拍币（小于1的两位小数，如0.1)', 'text', '1', '1', '{\"size\":\"\",\"default\":\"0.1\",\"ispassword\":\"0\"}', '46');
INSERT INTO zz_config VALUES ('gjj_js', '公益金基数', 'index', '-100', '公益金基数（可为负数）', 'text', '1', '1', '{\"size\":\"\",\"default\":\"-100\",\"ispassword\":\"0\"}', '47');
INSERT INTO zz_config VALUES ('gjj_bl', '公益金百分比', 'index', '20', '公益金百分比（%）', 'text', '1', '1', '{\"size\":\"\",\"default\":\"20\",\"ispassword\":\"0\"}', '48');
INSERT INTO zz_config VALUES ('sign_img', '信任网站图标', 'index', '', '网页底部信任网站图标', 'textarea', '1', '1', '{\"fieldtype\":\"text\",\"width\":\"\",\"height\":\"\",\"default\":\"\"}', '49');
INSERT INTO zz_config VALUES ('gjj_status', '公益金开关', 'index', '0', '公益金开关控制', 'select', '0', '0', '{\"options\":\"\\u5f00\\u542f|1\\r\\n\\u5173\\u95ed|0\"}', '47');
INSERT INTO zz_config VALUES ('pay_discount_status', '线上支付送网盘', 'index', '1', '在线支付送网盘', 'select', '1', '1', '{\"options\":\"\\u5f00\\u542f|1\\r\\n\\u5173\\u95ed|0\"}', '52');
INSERT INTO zz_config VALUES ('pay_discount', '在线支付送网盘', 'index', '1', '可以为小数（两位），按照比例设置例如1代表购买花1元送1M网盘', 'text', '1', '1', '{\"size\":\"\",\"default\":\"-100\",\"ispassword\":\"0\"}', '53');
INSERT INTO zz_config VALUES ('qq', '客服QQ', 'index', '', 'theme_01新模板可用', 'text', '1', '1', '{\"size\":\"\",\"default\":\"\",\"ispassword\":\"0\"}', '54');
INSERT INTO zz_config VALUES ('disk_status', '网盘设置', 'index', '0', '网盘开关设置', 'select', '1', '1', '{\"options\":\"\\u662f|1\\r\\n\\u5426|0\",\"multiple\":\"0\",\"fieldtype\":\"varchar\",\"numbertype\":\"1\",\"size\":\"\",\"default\":\"0\"}', '53');
INSERT INTO zz_config VALUES ('managesms', '后台短信验证', 'sms', '0', '后台登陆页面是否开启短信验证码（很重要！），<br>每个管理员需要单独设置手机号后，短信验证码登录才有效。', 'select', '1', '1', '{\"options\":\"\\u5f00\\u542f|1\\r\\n\\u5173\\u95ed|0\",\"multiple\":\"0\",\"fieldtype\":\"tinyint\",\"numbertype\":\"1\",\"size\":\"\",\"default\":\"0\"}', '6');
INSERT INTO zz_config VALUES ('m_domain', '后台管理域名', 'system', '', '设置后管理后台只能从该域名访问(请确保域名可访问)', 'text', '1', '1', '{\"size\":\"\",\"default\":\"\",\"ispassword\":\"0\"}', '56');
INSERT INTO zz_config VALUES ('cnnz', '站点统计代码', 'index', '', '第三方站点统计代码粘贴到此处', 'textarea', '1', '1', '{\"fieldtype\":\"text\",\"width\":\"\",\"height\":\"\",\"default\":\"\"}', '56');

-- ----------------------------
-- Table structure for `zz_config_other`
-- ----------------------------
DROP TABLE IF EXISTS `zz_config_other`;
CREATE TABLE `zz_config_other` (
  `varname` varchar(20) NOT NULL DEFAULT '' COMMENT '参数名',
  `value` text NOT NULL COMMENT '参数值',
  `lang` tinyint(2) unsigned NOT NULL DEFAULT '0' COMMENT '多语言',
  KEY `varname` (`varname`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of zz_config_other
-- ----------------------------
INSERT INTO zz_config_other VALUES ('plate_db_points', '50', '0');
INSERT INTO zz_config_other VALUES ('plate_get_points_2', '20', '0');
INSERT INTO zz_config_other VALUES ('plate_points_1', '1', '0');
INSERT INTO zz_config_other VALUES ('plate_get_type_1', '1', '0');
INSERT INTO zz_config_other VALUES ('plate_get_points_1', '50', '0');
INSERT INTO zz_config_other VALUES ('plate_pay_points', '20', '0');
INSERT INTO zz_config_other VALUES ('plate_get_type_2', '1', '0');
INSERT INTO zz_config_other VALUES ('plate_points_2', '2', '0');
INSERT INTO zz_config_other VALUES ('plate_get_points_3', '20', '0');
INSERT INTO zz_config_other VALUES ('plate_get_type_3', '2', '0');
INSERT INTO zz_config_other VALUES ('plate_points_3', '3', '0');
INSERT INTO zz_config_other VALUES ('plate_get_points_4', '10', '0');
INSERT INTO zz_config_other VALUES ('plate_get_type_4', '2', '0');
INSERT INTO zz_config_other VALUES ('plate_points_4', '4', '0');
INSERT INTO zz_config_other VALUES ('plate_get_points_5', '5', '0');
INSERT INTO zz_config_other VALUES ('plate_get_type_5', '2', '0');
INSERT INTO zz_config_other VALUES ('plate_points_5', '10', '0');
INSERT INTO zz_config_other VALUES ('plate_points_0', '100', '0');
INSERT INTO zz_config_other VALUES ('plate_start_time', '2016-05-11 13:30:53', '0');
INSERT INTO zz_config_other VALUES ('plate_end_time', '2020-05-12 13:30:57', '0');

-- ----------------------------
-- Table structure for `zz_diskfile`
-- ----------------------------
DROP TABLE IF EXISTS `zz_diskfile`;
CREATE TABLE `zz_diskfile` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `title` varchar(80) NOT NULL,
  `userid` int(8) unsigned NOT NULL,
  `folderid` int(8) unsigned NOT NULL,
  `addtime` int(10) unsigned NOT NULL,
  `size` int(20) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of zz_diskfile
-- ----------------------------
INSERT INTO zz_diskfile VALUES ('1', '1455961448667.jpg', '11.jpg', '95', '1', '1455961448', '11010');
INSERT INTO zz_diskfile VALUES ('2', '1455961950459.jpg', '0ff41bd5ad6eddc49c86893b3bdbb6fd53663388.jpg', '4', '3', '1455961950', '14499');
INSERT INTO zz_diskfile VALUES ('5', '1455962450608.png', 'QQ图片20160220180115.png', '196', '6', '1455962450', '139025');
INSERT INTO zz_diskfile VALUES ('6', '1456120181838.png', 'QQ图片20151118172131.png', '139', '7', '1456120181', '39882');
INSERT INTO zz_diskfile VALUES ('7', '1456127440748.zip', 'alipayescow.zip', '95', '1', '1456127440', '4975854');
INSERT INTO zz_diskfile VALUES ('8', '1456285937347.zip', '66', '139', '9', '1456285937', '1525803');
INSERT INTO zz_diskfile VALUES ('9', '1456385817411.docx', '董源简历.docx', '139', '7', '1456385817', '36297');
INSERT INTO zz_diskfile VALUES ('10', '1457600429997.txt', 'HELLO WORLD', '3557', '12', '1457600429', '0');
INSERT INTO zz_diskfile VALUES ('11', '1457611393637.txt', '新建 文本文档.txt', '3557', '13', '1457611393', '0');
INSERT INTO zz_diskfile VALUES ('12', '1457611989318.txt', '新建 文本文档.txt', '3557', '13', '1457611989', '0');
INSERT INTO zz_diskfile VALUES ('13', '1457612069612.txt', '新建 文本文档 (3).txt', '3557', '13', '1457612069', '0');
INSERT INTO zz_diskfile VALUES ('14', '14576120693557491.txt', '新建 文本文档.txt', '3557', '13', '1457612069', '0');
INSERT INTO zz_diskfile VALUES ('15', '14576120693557904.txt', '新建 文本文档.txt', '3557', '13', '1457612069', '0');
INSERT INTO zz_diskfile VALUES ('16', '1458906653311.jpeg', 'top.jpeg', '3571', '35', '1458906653', '21677');

-- ----------------------------
-- Table structure for `zz_express`
-- ----------------------------
DROP TABLE IF EXISTS `zz_express`;
CREATE TABLE `zz_express` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(30) DEFAULT NULL,
  `pinyin` varchar(100) DEFAULT NULL,
  `listorder` int(10) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of zz_express
-- ----------------------------

-- ----------------------------
-- Table structure for `zz_files`
-- ----------------------------
DROP TABLE IF EXISTS `zz_files`;
CREATE TABLE `zz_files` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `data_id` int(11) DEFAULT NULL,
  `name` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fileurl` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ext` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '扩展名',
  `cate` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `size` int(11) DEFAULT NULL,
  `c_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of zz_files
-- ----------------------------

-- ----------------------------
-- Table structure for `zz_folder`
-- ----------------------------
DROP TABLE IF EXISTS `zz_folder`;
CREATE TABLE `zz_folder` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(45) NOT NULL,
  `parentid` int(8) unsigned NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `userid` int(8) unsigned NOT NULL,
  `addtime` int(10) unsigned NOT NULL,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=36 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of zz_folder
-- ----------------------------
INSERT INTO zz_folder VALUES ('1', '默认文件夹', '0', '', '95', '1455961448', '145596144895858');
INSERT INTO zz_folder VALUES ('2', 'TEST', '0', '文件', '4', '1455961907', '14559619074274');
INSERT INTO zz_folder VALUES ('3', '默认文件夹', '0', '', '4', '1455961950', '14559619504641');
INSERT INTO zz_folder VALUES ('4', '默认文件夹', '0', '', '1', '1455962073', '14559620731698');
INSERT INTO zz_folder VALUES ('5', '港湾有巢', '0', '港湾有巢', '196', '1455962398', '1455962398196722');
INSERT INTO zz_folder VALUES ('6', '默认文件夹', '0', '', '196', '1455962450', '145596245019658');
INSERT INTO zz_folder VALUES ('7', '默认文件夹', '0', '', '139', '1456120143', '1456120143139276');
INSERT INTO zz_folder VALUES ('8', '1', '0', '', '139', '1456120156', '1456120156139873');
INSERT INTO zz_folder VALUES ('9', '111', '0', '1111', '139', '1456285548', '1456285548139705');
INSERT INTO zz_folder VALUES ('10', '222', '0', '', '139', '1456385722', '145638572213986');
INSERT INTO zz_folder VALUES ('11', '默认文件夹', '0', '', '8', '1456896964', '14568969648729');
INSERT INTO zz_folder VALUES ('12', '32132', '0', '43234234', '3557', '1457427825', '14574278253557276');
INSERT INTO zz_folder VALUES ('13', '默认文件夹', '0', '', '3557', '1457427858', '14574278583557670');
INSERT INTO zz_folder VALUES ('15', '我的海购', '0', '3123', '3557', '1457602824', '14576028243557926');
INSERT INTO zz_folder VALUES ('16', '我的相册', '0', '3213123', '3557', '1457603142', '14576031423557939');
INSERT INTO zz_folder VALUES ('17', '我的空间', '0', '', '3557', '1457603637', '14576036373557484');
INSERT INTO zz_folder VALUES ('18', '1', '0', '', '3557', '1457609528', '14576095283557690');
INSERT INTO zz_folder VALUES ('34', '3123123', '0', '', '3557', '1457611631', '14576116313557164');
INSERT INTO zz_folder VALUES ('20', '3', '0', '', '3557', '1457609537', '14576095373557492');
INSERT INTO zz_folder VALUES ('21', '5', '0', '', '3557', '1457609541', '14576095413557251');
INSERT INTO zz_folder VALUES ('22', '6', '0', '', '3557', '1457609545', '14576095453557665');
INSERT INTO zz_folder VALUES ('23', '77', '0', '', '3557', '1457609551', '14576095513557816');
INSERT INTO zz_folder VALUES ('24', '8', '0', '', '3557', '1457609555', '14576095553557983');
INSERT INTO zz_folder VALUES ('25', '432', '0', '', '3557', '1457609559', '14576095593557268');
INSERT INTO zz_folder VALUES ('26', '423423', '0', '', '3557', '1457609565', '14576095653557330');
INSERT INTO zz_folder VALUES ('27', '223424', '0', '', '3557', '1457609572', '14576095723557708');
INSERT INTO zz_folder VALUES ('28', '你老师', '0', '', '3557', '1457609582', '14576095823557346');
INSERT INTO zz_folder VALUES ('29', '1你他', '0', '', '3557', '1457609600', '14576096003557709');
INSERT INTO zz_folder VALUES ('30', '阿阿阿', '0', '', '3557', '1457609613', '14576096133557110');
INSERT INTO zz_folder VALUES ('31', '312312312312', '0', '', '3557', '1457609620', '14576096203557367');
INSERT INTO zz_folder VALUES ('32', '321312', '0', '', '3557', '1457611296', '145761129635574');
INSERT INTO zz_folder VALUES ('33', '他他啊', '0', '', '3557', '1457611320', '14576113203557195');
INSERT INTO zz_folder VALUES ('35', '测试', '0', '', '3571', '1458906599', '14589065993571238');

-- ----------------------------
-- Table structure for `zz_gallery_images`
-- ----------------------------
DROP TABLE IF EXISTS `zz_gallery_images`;
CREATE TABLE `zz_gallery_images` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `tag_id` int(11) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=208 DEFAULT CHARSET=utf8 ROW_FORMAT=FIXED;

-- ----------------------------
-- Records of zz_gallery_images
-- ----------------------------
INSERT INTO zz_gallery_images VALUES ('2', '1');
INSERT INTO zz_gallery_images VALUES ('3', '1');
INSERT INTO zz_gallery_images VALUES ('4', '1');
INSERT INTO zz_gallery_images VALUES ('5', '1');
INSERT INTO zz_gallery_images VALUES ('205', '1');
INSERT INTO zz_gallery_images VALUES ('46', '1');
INSERT INTO zz_gallery_images VALUES ('47', '1');
INSERT INTO zz_gallery_images VALUES ('48', '1');
INSERT INTO zz_gallery_images VALUES ('73', '1');
INSERT INTO zz_gallery_images VALUES ('61', '4');
INSERT INTO zz_gallery_images VALUES ('70', '1');
INSERT INTO zz_gallery_images VALUES ('59', '5');
INSERT INTO zz_gallery_images VALUES ('60', '5');
INSERT INTO zz_gallery_images VALUES ('66', '1');
INSERT INTO zz_gallery_images VALUES ('72', '1');
INSERT INTO zz_gallery_images VALUES ('69', '1');
INSERT INTO zz_gallery_images VALUES ('74', '1');
INSERT INTO zz_gallery_images VALUES ('76', '1');
INSERT INTO zz_gallery_images VALUES ('78', '1');
INSERT INTO zz_gallery_images VALUES ('79', '0');
INSERT INTO zz_gallery_images VALUES ('80', '0');
INSERT INTO zz_gallery_images VALUES ('81', '0');
INSERT INTO zz_gallery_images VALUES ('82', '1');
INSERT INTO zz_gallery_images VALUES ('83', '1');
INSERT INTO zz_gallery_images VALUES ('84', '1');
INSERT INTO zz_gallery_images VALUES ('85', '1');
INSERT INTO zz_gallery_images VALUES ('86', '1');
INSERT INTO zz_gallery_images VALUES ('87', '0');
INSERT INTO zz_gallery_images VALUES ('88', '1');
INSERT INTO zz_gallery_images VALUES ('89', '1');
INSERT INTO zz_gallery_images VALUES ('90', '0');
INSERT INTO zz_gallery_images VALUES ('91', '0');
INSERT INTO zz_gallery_images VALUES ('92', '1');
INSERT INTO zz_gallery_images VALUES ('93', '1');
INSERT INTO zz_gallery_images VALUES ('94', '1');
INSERT INTO zz_gallery_images VALUES ('109', '1');
INSERT INTO zz_gallery_images VALUES ('113', '1');
INSERT INTO zz_gallery_images VALUES ('114', '1');
INSERT INTO zz_gallery_images VALUES ('115', '1');
INSERT INTO zz_gallery_images VALUES ('135', '1');
INSERT INTO zz_gallery_images VALUES ('140', '1');
INSERT INTO zz_gallery_images VALUES ('144', '1');
INSERT INTO zz_gallery_images VALUES ('162', '4');
INSERT INTO zz_gallery_images VALUES ('164', '1');
INSERT INTO zz_gallery_images VALUES ('195', '1');
INSERT INTO zz_gallery_images VALUES ('200', '1');
INSERT INTO zz_gallery_images VALUES ('199', '1');
INSERT INTO zz_gallery_images VALUES ('202', '1');
INSERT INTO zz_gallery_images VALUES ('206', '1');
INSERT INTO zz_gallery_images VALUES ('207', '1');

-- ----------------------------
-- Table structure for `zz_gallery_tag`
-- ----------------------------
DROP TABLE IF EXISTS `zz_gallery_tag`;
CREATE TABLE `zz_gallery_tag` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `type` enum('image','file') DEFAULT 'image',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of zz_gallery_tag
-- ----------------------------
INSERT INTO zz_gallery_tag VALUES ('1', '默认分类', 'image');
INSERT INTO zz_gallery_tag VALUES ('2', '商品封面', 'image');
INSERT INTO zz_gallery_tag VALUES ('3', '默认分类', 'file');
INSERT INTO zz_gallery_tag VALUES ('4', '商品推荐位', 'image');
INSERT INTO zz_gallery_tag VALUES ('5', '挖宝分类', 'image');

-- ----------------------------
-- Table structure for `zz_gbook`
-- ----------------------------
DROP TABLE IF EXISTS `zz_gbook`;
CREATE TABLE `zz_gbook` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `status` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `userid` int(8) unsigned NOT NULL DEFAULT '0',
  `username` varchar(40) NOT NULL DEFAULT '',
  `url` varchar(60) NOT NULL DEFAULT '',
  `listorder` int(10) unsigned NOT NULL DEFAULT '0',
  `createtime` int(11) unsigned NOT NULL DEFAULT '0',
  `updatetime` int(11) unsigned NOT NULL DEFAULT '0',
  `lang` tinyint(2) unsigned NOT NULL DEFAULT '0',
  `title` varchar(255) NOT NULL DEFAULT '',
  `title_style` varchar(40) NOT NULL DEFAULT '',
  `thumb` varchar(255) NOT NULL DEFAULT '',
  `content` varchar(200) NOT NULL,
  `email` varchar(50) NOT NULL,
  `name` varchar(20) NOT NULL,
  `ip` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of zz_gbook
-- ----------------------------

-- ----------------------------
-- Table structure for `zz_goods`
-- ----------------------------
DROP TABLE IF EXISTS `zz_goods`;
CREATE TABLE `zz_goods` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(80) DEFAULT NULL COMMENT '名称',
  `desc` varchar(280) DEFAULT NULL,
  `content` text,
  `params` text COMMENT '商品参数',
  `cover` int(11) DEFAULT NULL COMMENT '封面图ID',
  `pics` varchar(80) DEFAULT NULL COMMENT '图片列表',
  `price` decimal(20,2) DEFAULT NULL,
  `real_price` double(20,2) DEFAULT NULL,
  `stock` int(11) DEFAULT NULL COMMENT '库存',
  `cid` int(10) DEFAULT NULL COMMENT '分类ID',
  `bid` int(10) DEFAULT '0',
  `sp_val` varchar(2000) DEFAULT NULL COMMENT '尺寸规格',
  `is_sale` tinyint(2) DEFAULT '1' COMMENT '1上架,0下架',
  `status` tinyint(2) DEFAULT '0' COMMENT '-1删除,0正常',
  `sell` int(11) DEFAULT '0' COMMENT '已售数量',
  `u_time` int(11) DEFAULT NULL,
  `c_time` int(11) DEFAULT NULL,
  `listorder` smallint(5) NOT NULL DEFAULT '0',
  `tips` varchar(255) DEFAULT '',
  `words` varchar(100) DEFAULT NULL,
  `thumb` text,
  `thumbs` text,
  `mid` int(11) DEFAULT '0' COMMENT '商户会员ID',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=54 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of zz_goods
-- ----------------------------

-- ----------------------------
-- Table structure for `zz_goods_activity`
-- ----------------------------
DROP TABLE IF EXISTS `zz_goods_activity`;
CREATE TABLE `zz_goods_activity` (
  `act_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `act_desc` text NOT NULL,
  `act_type` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '活动类型 0竞拍',
  `goods_id` mediumint(8) unsigned NOT NULL,
  `product_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `goods_name` varchar(255) NOT NULL,
  `start_time` int(10) unsigned NOT NULL,
  `end_time` int(10) unsigned NOT NULL,
  `is_finished` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '0默认 1已结束未处理 2已处理',
  `ext_info` text NOT NULL,
  `deposit` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '保证金',
  `type` tinyint(1) NOT NULL DEFAULT '0' COMMENT '竞拍模式 0中奖模式 1竞拍+中奖模式',
  `keywords` varchar(120) NOT NULL DEFAULT '',
  `description` mediumtext NOT NULL,
  `cat_type` varchar(30) NOT NULL DEFAULT '',
  `posid` tinyint(2) NOT NULL DEFAULT '0',
  `listorder` mediumint(8) NOT NULL DEFAULT '0',
  `logs` longtext NOT NULL,
  `thumb` varchar(100) DEFAULT NULL,
  `qishu` int(11) DEFAULT '1' COMMENT '期数',
  `is_show` tinyint(1) DEFAULT '1',
  `bid_user_count` int(11) NOT NULL DEFAULT '0',
  `bid_count` int(11) NOT NULL DEFAULT '0',
  `bid_last_id` bigint(20) NOT NULL DEFAULT '0',
  PRIMARY KEY (`act_id`),
  KEY `act_name` (`title`,`act_type`,`goods_id`),
  KEY `act_id` (`act_id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of zz_goods_activity
-- ----------------------------

-- ----------------------------
-- Table structure for `zz_goods_cat`
-- ----------------------------
DROP TABLE IF EXISTS `zz_goods_cat`;
CREATE TABLE `zz_goods_cat` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT '编号',
  `catname` varchar(255) NOT NULL COMMENT '分类名称',
  `parentid` int(10) NOT NULL DEFAULT '0' COMMENT '父级ID',
  `arrparentid` text NOT NULL COMMENT '父类ID组',
  `arrchildid` text NOT NULL COMMENT '子类ID组',
  `child` tinyint(1) NOT NULL COMMENT '是否有子级',
  `keywords` varchar(120) NOT NULL COMMENT '页面关键字',
  `description` int(255) NOT NULL COMMENT '页面描述',
  `listorder` smallint(5) NOT NULL DEFAULT '0' COMMENT '排序',
  `thumb` varchar(255) NOT NULL COMMENT '缩略图',
  `url` varchar(255) NOT NULL COMMENT 'URL',
  `ismenu` smallint(3) NOT NULL DEFAULT '0' COMMENT '是否导航',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of zz_goods_cat
-- ----------------------------
INSERT INTO zz_goods_cat VALUES ('1', '电脑办公', '0', '0', '1,4,5,6,7,19', '1', '', '0', '0', '[{\"path\":\"\\/upload\\/images\\/gallery\\/5\\/n\\/204_src.jpg\",\"title\":\"621_temp-231-377-2\"}]', '/cat/index/1', '1');
INSERT INTO zz_goods_cat VALUES ('2', '手机数码', '0', '0', '2,8,9,10', '1', '', '0', '0', '[{\"path\":\"\\/upload\\/images\\/gallery\\/5\\/n\\/204_src.jpg\",\"title\":\"621_temp-231-377-2\"}]', '/cat/index/2', '1');
INSERT INTO zz_goods_cat VALUES ('3', '实物卡券', '0', '0', '3,11,12,13,14,15', '1', '', '0', '0', '', '/cat/index/3', '1');
INSERT INTO zz_goods_cat VALUES ('4', '电脑', '1', '0,1', '4', '0', '', '0', '0', '', '/cat/index/4', '1');
INSERT INTO zz_goods_cat VALUES ('5', '电脑配件', '1', '0,1', '5', '0', '', '0', '0', '', '/cat/index/5', '1');
INSERT INTO zz_goods_cat VALUES ('6', '外设产品', '1', '0,1', '6', '0', '', '0', '0', '', '/cat/index/6', '1');
INSERT INTO zz_goods_cat VALUES ('7', '网络产品', '1', '0,1', '7', '0', '', '0', '0', '', '/cat/index/7', '1');
INSERT INTO zz_goods_cat VALUES ('8', '手机', '2', '0,2', '8', '0', '', '0', '0', '[{\"path\":\"\\/upload\\/images\\/gallery\\/5\\/n\\/204_src.jpg\",\"title\":\"621_temp-231-377-2\"}]', '/cat/index/8', '1');
INSERT INTO zz_goods_cat VALUES ('9', '数码影音', '2', '0,2', '9', '0', '', '0', '0', '', '/cat/index/9', '1');
INSERT INTO zz_goods_cat VALUES ('10', '时尚影音', '2', '0,2', '10', '0', '', '0', '0', '', '/cat/index/10', '1');
INSERT INTO zz_goods_cat VALUES ('11', '加油卡', '3', '0,3', '11', '0', '', '0', '0', '', '/cat/index/11', '1');
INSERT INTO zz_goods_cat VALUES ('12', '商家卡', '3', '0,3', '12', '0', '', '0', '0', '', '/cat/index/12', '1');
INSERT INTO zz_goods_cat VALUES ('13', '电话卡', '3', '0,3', '13', '0', '', '0', '0', '', '/cat/index/13', '1');
INSERT INTO zz_goods_cat VALUES ('14', '商家券', '3', '0,3', '14', '0', '', '0', '0', '', '/cat/index/14', '1');
INSERT INTO zz_goods_cat VALUES ('15', '购物卡', '3', '0,3', '15', '0', '', '0', '0', '', '/cat/index/15', '1');
INSERT INTO zz_goods_cat VALUES ('16', '其它', '0', '0', '16', '0', '', '0', '0', '', '/cat/index/16', '1');
INSERT INTO zz_goods_cat VALUES ('18', '家用电器', '0', '0', '18', '0', '', '0', '0', '[{\"path\":\"\\/upload\\/images\\/gallery\\/3\\/r\\/136_src.jpg\",\"title\":\"vshop211979371-1443962170181-f7081-s1_\\u526f\\u672c\"}]', '/cat/index/18', '1');
INSERT INTO zz_goods_cat VALUES ('19', '单反', '1', '0,1', '19', '0', '', '0', '0', '', '/cat/index/19', '1');
INSERT INTO zz_goods_cat VALUES ('24', '穿越火线', '23', '0,23', '24', '0', '', '0', '0', '', '/cat/index/24', '1');
INSERT INTO zz_goods_cat VALUES ('23', '游戏装备', '0', '0', '23,24,25,26', '1', '', '0', '0', '', '/cat/index/23', '1');
INSERT INTO zz_goods_cat VALUES ('25', 'QQ飞车', '23', '0,23', '25', '0', '', '0', '0', '', '/cat/index/25', '1');
INSERT INTO zz_goods_cat VALUES ('26', '英雄联盟', '23', '0,23', '26', '0', '', '0', '0', '', '/cat/index/26', '1');
INSERT INTO zz_goods_cat VALUES ('33', '珠宝玉器', '0', '0', '33', '0', '', '0', '0', '', '/cat/index/33', '1');

-- ----------------------------
-- Table structure for `zz_goods_item`
-- ----------------------------
DROP TABLE IF EXISTS `zz_goods_item`;
CREATE TABLE `zz_goods_item` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `goods_id` int(11) DEFAULT NULL,
  `goods_name` varchar(200) DEFAULT NULL,
  `spec` varchar(100) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `stock` int(11) DEFAULT '0',
  `serial` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of zz_goods_item
-- ----------------------------

-- ----------------------------
-- Table structure for `zz_goods_order`
-- ----------------------------
DROP TABLE IF EXISTS `zz_goods_order`;
CREATE TABLE `zz_goods_order` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `mid` int(11) DEFAULT NULL COMMENT '会员ID',
  `note` varchar(300) DEFAULT NULL COMMENT '用户备注',
  `status` tinyint(4) DEFAULT '1' COMMENT '订单状态,1已下单等待付款,2已付款等待发货,3已发货填入物流单号,4已签收完成交易,5交易取消',
  `order_price` decimal(10,2) DEFAULT NULL COMMENT '实际购买的价格',
  `pay_time` int(10) DEFAULT '0' COMMENT '付款时间',
  `express` varchar(40) DEFAULT NULL COMMENT '物流类型',
  `express_num` varchar(64) DEFAULT NULL COMMENT '订单号',
  `express_send_time` int(11) DEFAULT NULL,
  `order_sn` varchar(30) DEFAULT NULL,
  `is_evaluate` tinyint(2) DEFAULT '0' COMMENT '是否已评论,状态为4时有效',
  `credit` int(11) DEFAULT '0' COMMENT '本次订单可赠积分',
  `c_time` int(11) DEFAULT NULL COMMENT '创建订单时间',
  `extension_code` varchar(100) DEFAULT NULL,
  `extension_id` int(11) DEFAULT NULL,
  `integral` int(10) DEFAULT '0' COMMENT '拍币',
  `surplus` decimal(10,2) DEFAULT '0.00' COMMENT '余额',
  `amount` decimal(10,2) DEFAULT '0.00' COMMENT '未支付金额',
  `pay_fee` decimal(10,2) DEFAULT NULL COMMENT '第三方支付金额',
  `pay_id` tinyint(5) DEFAULT '0' COMMENT '支付方式ID',
  `pay_name` varchar(200) DEFAULT NULL COMMENT '支付方式名',
  `deposit` decimal(10,0) DEFAULT '0' COMMENT '使用冻结款',
  `deliver` varchar(500) DEFAULT NULL COMMENT '收获地址',
  `mobile` varchar(100) DEFAULT NULL,
  `area` varchar(200) DEFAULT NULL COMMENT '区域',
  `name` varchar(200) DEFAULT NULL COMMENT '收货 人',
  `is_share` smallint(3) DEFAULT '0' COMMENT '是否晒单',
  `money_paid` decimal(10,2) DEFAULT NULL COMMENT '第三方支付金额',
  `oldprice` decimal(10,2) DEFAULT NULL COMMENT '采购价',
  `fow` varchar(100) DEFAULT NULL COMMENT '采购来源',
  `fono` varchar(200) DEFAULT NULL COMMENT '采购订单号',
  `fou` text COMMENT '采购站点标识',
  `ismoney` tinyint(1) NOT NULL DEFAULT '0' COMMENT '1账务已确认',
  `add_bonus_id` int(11) NOT NULL DEFAULT '0' COMMENT '赠送的抵用券ID',
  `bus_mid` int(11) DEFAULT '0' COMMENT '商家会员ID',
  `bus_money_is` tinyint(1) DEFAULT '0' COMMENT '1已分润',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=52 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of zz_goods_order
-- ----------------------------

-- ----------------------------
-- Table structure for `zz_goods_order_item`
-- ----------------------------
DROP TABLE IF EXISTS `zz_goods_order_item`;
CREATE TABLE `zz_goods_order_item` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `mid` int(11) DEFAULT NULL,
  `order_id` int(11) DEFAULT NULL COMMENT '订单id',
  `good_id` int(11) DEFAULT NULL,
  `goods_name` varchar(255) DEFAULT NULL,
  `rule` varchar(255) DEFAULT NULL COMMENT '产品规格',
  `spec` varchar(200) DEFAULT NULL,
  `buy_num` int(11) DEFAULT NULL COMMENT '购买数量',
  `sell_price` decimal(10,2) DEFAULT NULL COMMENT '卖出单价',
  `note` varchar(280) DEFAULT NULL,
  `from` enum('group','cheap','normal','sale') DEFAULT NULL COMMENT '一般,团折,超级特惠,沃销',
  `from_id` int(11) DEFAULT NULL COMMENT 'normal时为0,对应团折ID,特惠ID,沃销对应goods_promo_sale_status中的ID',
  `c_time` int(10) DEFAULT NULL,
  `goods_info` text COMMENT '备注',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=52 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of zz_goods_order_item
-- ----------------------------

-- ----------------------------
-- Table structure for `zz_goods_order_log`
-- ----------------------------
DROP TABLE IF EXISTS `zz_goods_order_log`;
CREATE TABLE `zz_goods_order_log` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` int(11) DEFAULT NULL,
  `status` tinyint(2) DEFAULT NULL COMMENT '订单状态',
  `state` varchar(20) DEFAULT NULL,
  `from_state` varchar(20) DEFAULT NULL,
  `state_info` varchar(30) DEFAULT NULL,
  `cancel_type` tinyint(2) DEFAULT '0' COMMENT '取消订单类型',
  `c_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=70 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of zz_goods_order_log
-- ----------------------------

-- ----------------------------
-- Table structure for `zz_goods_spec`
-- ----------------------------
DROP TABLE IF EXISTS `zz_goods_spec`;
CREATE TABLE `zz_goods_spec` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(30) DEFAULT NULL,
  `type` tinyint(2) DEFAULT '0' COMMENT '类型,0文字,1图片,2颜色',
  `c_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of zz_goods_spec
-- ----------------------------

-- ----------------------------
-- Table structure for `zz_goods_spec_item`
-- ----------------------------
DROP TABLE IF EXISTS `zz_goods_spec_item`;
CREATE TABLE `zz_goods_spec_item` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `spec_id` int(11) DEFAULT NULL,
  `value` varchar(60) DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of zz_goods_spec_item
-- ----------------------------

-- ----------------------------
-- Table structure for `zz_images`
-- ----------------------------
DROP TABLE IF EXISTS `zz_images`;
CREATE TABLE `zz_images` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `data_id` int(10) DEFAULT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `imgurl` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '路径',
  `cate` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `imgspace` int(10) DEFAULT NULL COMMENT '文件尺寸',
  `size` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '图片长宽',
  `c_time` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=180 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of zz_images
-- ----------------------------
INSERT INTO zz_images VALUES ('2', '2', '691_src', '0/1/2_src.jpg', 'gallery', '44885', '2000x200', '1446443118');
INSERT INTO zz_images VALUES ('3', '3', '690_src', '0/2/3_src.jpg', 'gallery', '85054', '2000x200', '1446443226');
INSERT INTO zz_images VALUES ('4', '4', '689_src', '0/3/4_src.jpg', 'gallery', '70360', '2000x200', '1446443251');
INSERT INTO zz_images VALUES ('5', '5', '141_src', '0/4/5_src.jpg', 'gallery', '106415', '1920x180', '1446443270');
INSERT INTO zz_images VALUES ('177', '205', '196_src', '5/o/205_src.png', 'gallery', '7240', '180x77', '1464082396');
INSERT INTO zz_images VALUES ('46', '46', '1142_src', '1/9/46_src.png', 'gallery', '153657', '710x350', '1448972799');
INSERT INTO zz_images VALUES ('47', '47', '1591_src', '1/a/47_src.png', 'gallery', '333006', '710x350', '1448972802');
INSERT INTO zz_images VALUES ('48', '48', '141_src', '1/b/48_src.jpg', 'gallery', '106415', '1920x180', '1448973468');
INSERT INTO zz_images VALUES ('68', '93', 'wx225', '2/k/93_src.png', 'gallery', '663', '280x280', '1449802782');
INSERT INTO zz_images VALUES ('69', '94', 'top3', '2/l/94_src.png', 'gallery', '129334', '1905x90', '1449815718');
INSERT INTO zz_images VALUES ('84', '109', 'logo', '3/0/109_src.png', 'gallery', '8033', '168x74', '1450248816');
INSERT INTO zz_images VALUES ('88', '113', '2', '3/4/113_src.png', 'gallery', '1517', '129x42', '1450341630');
INSERT INTO zz_images VALUES ('89', '114', '1', '3/5/114_src.png', 'gallery', '3324', '121x39', '1450341648');
INSERT INTO zz_images VALUES ('90', '115', '109_src', '3/6/115_src.png', 'gallery', '7818', '168x74', '1450427914');
INSERT INTO zz_images VALUES ('114', '140', '5d6034a85edf8db1ec0d3d6e0a23dd54564e749c', '3/v/140_src.jpg', 'gallery', '17705', '400x225', '1451288472');
INSERT INTO zz_images VALUES ('118', '144', 'top_src', '3/z/144_src.png', 'gallery', '129334', '1905x90', '1452240944');
INSERT INTO zz_images VALUES ('167', '195', 'logo', '5/e/195_src.png', 'gallery', '4775', '121x55', '1454405656');
INSERT INTO zz_images VALUES ('172', '200', 'banner', '5/j/200_src.jpg', 'gallery', '180784', '1920x550', '1456119379');
INSERT INTO zz_images VALUES ('171', '199', 'liantu', '5/i/199_src.png', 'gallery', '17775', '300x300', '1455763643');
INSERT INTO zz_images VALUES ('174', '202', '7D7B40E0-0D10-43AC-8763-8A296502185B', '5/l/202_src.png', 'gallery', '15136', '128x116', '1457747090');
INSERT INTO zz_images VALUES ('178', '206', '144_src', '5/p/206_src.png', 'gallery', '133035', '1905x90', '1464315333');
INSERT INTO zz_images VALUES ('179', '207', '109_src', '5/q/207_src.png', 'gallery', '5948', '168x74', '1464315407');

-- ----------------------------
-- Table structure for `zz_images_thumb`
-- ----------------------------
DROP TABLE IF EXISTS `zz_images_thumb`;
CREATE TABLE `zz_images_thumb` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `image_type` varchar(30) DEFAULT NULL COMMENT '图片类型',
  `rule` varchar(600) DEFAULT NULL,
  `note` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of zz_images_thumb
-- ----------------------------
INSERT INTO zz_images_thumb VALUES ('5', 'news_cover', '{\"thumb\":{\"width\":200,\"height\":200}}', '新闻封面图');
INSERT INTO zz_images_thumb VALUES ('6', 'product_cover', '{\"thumb\":{\"width\":200,\"height\":200}}', '产品封面图');
INSERT INTO zz_images_thumb VALUES ('7', 'gallery', '{\"thumb\":{\"width\":140,\"height\":140},\"middle\":{\"width\":640,\"height\":0}}', '');
INSERT INTO zz_images_thumb VALUES ('9', 'category', null, '栏目封面图');
INSERT INTO zz_images_thumb VALUES ('10', 'files', null, '文件');

-- ----------------------------
-- Table structure for `zz_lang`
-- ----------------------------
DROP TABLE IF EXISTS `zz_lang`;
CREATE TABLE `zz_lang` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '语言名',
  `mark` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '语言标识',
  `listorder` int(10) DEFAULT '0',
  `status` tinyint(1) DEFAULT '1' COMMENT '状态',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='语言管理';

-- ----------------------------
-- Records of zz_lang
-- ----------------------------
INSERT INTO zz_lang VALUES ('1', '中文', 'cn', '1', '1');

-- ----------------------------
-- Table structure for `zz_linkage`
-- ----------------------------
DROP TABLE IF EXISTS `zz_linkage`;
CREATE TABLE `zz_linkage` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `parentid` smallint(5) unsigned NOT NULL DEFAULT '0',
  `name` varchar(50) NOT NULL DEFAULT '',
  `arrparentid` text NOT NULL,
  `arrchildid` text NOT NULL,
  `child` tinyint(1) NOT NULL DEFAULT '0',
  `description` varchar(255) NOT NULL,
  `listorder` int(10) NOT NULL DEFAULT '0',
  `lang` tinyint(2) NOT NULL DEFAULT '0',
  `mark` varchar(30) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `parent_id` (`parentid`)
) ENGINE=MyISAM AUTO_INCREMENT=3410 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of zz_linkage
-- ----------------------------
INSERT INTO zz_linkage VALUES ('1', '0', '地区', '0', '1,2,500,501,502,503,504,505,506,507,508,509,510,511,512,513,514,515,516,517,3,36,398,399,400,401,402,403,404,405,406,407,408,37,409,410,411,412,413,414,415,38,416,417,418,419,420,39,421,422,423,424,40,425,426,427,428,429,430,431,432,41,433,434,435,436,437,438,439,440,441,442,443,444,42,445,446,447,448,43,449,450,451,452,453,454,44,455,456,457,458,459,460,461,45,462,463,464,465,466,467,468,46,469,470,471,472,47,473,474,475,476,477,48,478,479,480,481,49,482,483,484,485,486,487,488,50,489,490,491,492,493,494,495,51,496,497,498,499,3401,3402,3403,3404,3405,3406,3407,3408,4,53,518,519,520,521,522,523,524,525,526,527,528,529,530,54,531,532,533,534,535,536,537,55,538,539,540,541,542,543,544,545,546,547,56,548,549,550,551,552,553,554,555,556,57,557,558,559,560,561,58,562,563,564,565,566,567,568,569,570,571,572,573,574,59,575,576,577,578,579,580,581,582,583,584,585,586,60,587,588,589,590,591,592,61,593,594,595,596,597,598,599,600,601,602,603,5,62,604,605,606,607,608,609,610,611,63,612,613,614,615,616,64,617,618,619,620,621,622,623,624,65,625,626,627,628,629,630,631,632,66,633,67,634,635,68,636,637,638,639,640,641,642,69,643,644,645,646,647,648,649,650,70,651,652,653,654,655,656,657,658,659,71,660,661,662,663,664,665,666,72,667,668,669,670,671,672,673,674,73,675,676,677,678,679,680,681,74,682,683,684,685,75,686,687,688,689,690,691,6,76,692,693,694,695,696,697,698,699,700,701,702,703,704,77,705,706,707,708,709,710,78,711,712,713,79,714,715,716,717,718,719,720,721,722,723,724,725,726,727,728,729,730,731,732,733,734,735,736,737,738,739,740,741,742,743,744,745,80,746,747,748,749,750,81,751,752,753,754,755,756,82,757,758,759,760,761,762,83,763,764,765,766,767,768,769,84,770,771,772,773,774,85,775,776,777,778,779,780,86,781,782,783,784,785,786,787,788,87,789,790,791,792,793,794,795,796,88,797,798,799,800,801,802,803,89,804,805,806,807,90,808,809,810,811,812,813,814,815,816,817,818,91,819,820,821,822,92,823,824,825,826,827,93,828,829,830,831,832,833,834,835,836,94,837,838,839,840,841,842,843,95,844,845,846,847,848,849,96,850,851,852,7,97,853,854,855,856,857,858,859,860,861,862,863,864,98,865,866,867,868,869,870,871,872,873,874,875,876,877,878,879,880,881,99,882,883,884,885,886,887,888,889,890,891,892,893,100,894,895,896,897,101,898,899,900,901,902,903,904,102,905,906,907,908,103,909,910,911,912,913,104,914,915,916,917,918,919,920,921,922,923,924,105,925,926,927,928,106,929,930,931,932,933,934,107,935,936,937,938,939,940,941,942,943,944,108,945,946,947,948,109,949,950,951,952,953,954,955,110,956,957,958,959,960,961,8,111,962,963,964,965,966,967,968,969,970,971,972,973,112,974,975,976,977,978,979,113,980,981,982,983,984,985,986,987,114,988,989,990,991,115,992,993,994,995,996,997,998,999,1000,1001,1002,1003,1004,1005,1006,1007,116,1008,1009,1010,1011,1012,1013,1014,1015,1016,1017,1018,1019,117,1020,1021,1022,1023,1024,1025,1026,1027,118,1028,1029,1030,1031,1032,1033,1034,1035,1036,1037,119,1038,1039,1040,1041,1042,1043,1044,1045,1046,1047,1048,1049,1050,1051,1052,1053,9,120,1054,1055,1056,1057,121,122,123,124,125,126,127,128,129,130,131,132,133,134,135,136,137,1058,1059,1060,1061,1062,1063,1064,1065,1066,1067,1068,1069,1070,1071,1072,1073,1074,1075,1076,1077,10,138,1078,1079,1080,1081,1082,1083,1084,1085,1086,1087,1088,1089,1090,1091,1092,1093,1094,1095,1096,1097,1098,1099,1100,1101,139,1102,1103,1104,1105,1106,1107,1108,1109,1110,1111,1112,1113,1114,1115,1116,1117,1118,1119,1120,1121,1122,1123,1124,1125,1126,140,1127,1128,1129,1130,1131,1132,1133,1134,1135,1136,1137,1138,1139,1140,1141,1142,141,1143,1144,1145,1146,1147,1148,1149,1150,1151,1152,1153,142,1154,1155,1156,1157,1158,1159,1160,1161,1162,1163,1164,1165,1166,1167,1168,1169,1170,1171,1172,143,1173,1174,1175,1176,1177,1178,1179,1180,1181,1182,1183,144,1184,1185,1186,1187,1188,1189,1190,1191,1192,1193,145,1194,1195,1196,1197,1198,1199,1200,146,1201,1202,1203,1204,1205,1206,1207,1208,1209,1210,1211,1212,1213,1214,147,1215,1216,1217,1218,1219,1220,1221,1222,1223,1224,1225,1226,1227,1228,1229,1230,1231,1232,1233,148,1234,1235,1236,1237,1238,1239,1240,1241,1242,1243,1244,1245,1246,1247,1248,1249,1250,11,149,1251,1252,1253,1254,1255,1256,1257,1258,1259,1260,1261,1262,1263,1264,1265,1266,1267,150,1268,1269,1270,1271,1272,1273,1274,1275,1276,1277,1278,1279,1280,1281,1282,151,1283,1284,1285,1286,1287,1288,1289,1290,1291,1292,152,1293,1294,1295,1296,1297,1298,1299,1300,1301,153,1302,1303,1304,1305,1306,154,1307,155,1308,1309,1310,1311,1312,1313,1314,1315,1316,1317,156,1318,1319,1320,1321,1322,1323,1324,1325,1326,1327,1328,1329,1330,157,1331,1332,1333,1334,1335,1336,1337,1338,1339,1340,158,1341,1342,1343,1344,1345,1346,159,1347,1348,1349,1350,1351,1352,1353,1354,1355,160,1356,1357,1358,1359,1360,1361,1362,1363,1364,1365,1366,1367,161,1368,1369,1370,1371,1372,1373,1374,1375,1376,1377,162,1378,1379,1380,1381,1382,1383,163,1384,1385,1386,1387,1388,1389,1390,1391,1392,1393,164,1394,1395,1396,1397,1398,1399,1400,1401,1402,1403,165,1404,1405,1406,1407,1408,166,1409,1410,1411,1412,1413,1414,12,167,1415,1416,1417,1418,1419,1420,1421,1422,1423,1424,1425,1426,1427,1428,1429,1430,1431,1432,1433,1434,168,1435,1436,1437,1438,1439,1440,1441,1442,1443,169,1444,1445,1446,170,1447,1448,1449,1450,1451,1452,1453,1454,171,1455,1456,1457,1458,1459,1460,172,1461,1462,1463,1464,1465,1466,1467,1468,173,1469,1470,1471,1472,1473,1474,1475,1476,1477,1478,174,1479,1480,1481,1482,1483,1484,1485,1486,1487,1488,175,1489,1490,1491,1492,176,1493,1494,1495,1496,1497,1498,1499,1500,1501,1502,1503,1504,1505,1506,1507,1508,177,1509,1510,1511,1512,1513,1514,1515,1516,178,1517,1518,1519,1520,1521,1522,1523,1524,1525,1526,179,1527,1528,1529,1530,1531,1532,1533,1534,1535,1536,1537,1538,1539,1540,1541,1542,1543,13,180,1544,1545,1546,1547,1548,1549,1550,1551,1552,1553,1554,1555,1556,1557,181,1558,182,1559,1560,1561,183,1562,1563,1564,1565,1566,1567,1568,1569,1570,1571,184,1572,1573,1574,1575,1576,1577,185,1578,1579,1580,1581,1582,186,1583,1584,1585,1586,1587,1588,1589,1590,187,1591,188,1592,189,1593,1594,1595,1596,1597,1598,1599,1600,190,1601,1602,191,1603,192,1604,1605,1606,1607,1608,1609,193,1610,1611,1612,1613,1614,1615,1616,1617,1618,194,1619,1620,1621,1622,1623,1624,1625,195,1626,1627,1628,1629,1630,1631,1632,1633,1634,1635,1636,1637,1638,196,1639,1640,1641,1642,1643,1644,1645,1646,14,197,1647,1648,1649,1650,1651,1652,1653,1654,1655,1656,198,1657,1658,1659,1660,199,1661,1662,1663,1664,1665,1666,1667,1668,1669,200,1670,1671,1672,1673,1674,1675,1676,1677,1678,1679,1680,201,1681,1682,1683,1684,1685,1686,1687,1688,1689,1690,1691,1692,202,1693,1694,1695,1696,1697,1698,1699,1700,1701,1702,1703,1704,203,1705,1706,1707,1708,1709,204,1710,1711,1712,1713,1714,1715,1716,1717,1718,1719,1720,1721,205,1722,1723,1724,1725,1726,206,1727,1728,1729,1730,1731,1732,1733,1734,207,1735,1736,1737,1738,1739,1740,208,1741,1742,1743,1744,1745,1746,1747,1748,1749,1750,1751,209,1752,1753,1754,1755,1756,1757,1758,1759,1760,210,1761,1762,1763,1764,1765,1766,1767,1768,1769,15,211,1770,1771,1772,1773,1774,1775,1776,1777,1778,1779,1780,1781,1782,1783,212,1784,1785,1786,1787,1788,1789,1790,1791,1792,213,1793,1794,1795,1796,1797,214,1798,1799,1800,1801,1802,1803,215,1804,1805,1806,1807,216,1808,1809,1810,1811,1812,1813,217,1814,1815,1816,1817,1818,218,1819,1820,1821,1822,1823,1824,1825,219,1826,1827,1828,1829,1830,1831,1832,1833,16,220,1834,1835,1836,1837,1838,1839,1840,1841,1842,1843,1844,1845,1846,221,1847,1848,1849,1850,1851,1852,1853,1854,1855,1856,1857,1858,1859,1860,1861,1862,1863,1864,1865,1866,1867,1868,1869,222,1870,1871,1872,1873,1874,1875,1876,1877,1878,223,1879,1880,1881,1882,1883,1884,1885,1886,224,1887,1888,1889,1890,1891,1892,1893,1894,225,1895,1896,1897,1898,1899,1900,1901,226,1902,1903,1904,1905,1906,1907,1908,1909,1910,227,1911,1912,1913,1914,1915,1916,228,1917,1918,1919,1920,1921,1922,229,1923,1924,1925,1926,1927,1928,1929,1930,1931,1932,1933,230,1934,1935,1936,1937,1938,1939,1940,1941,1942,1943,1944,231,1945,1946,1947,1948,1949,1950,1951,232,1952,1953,1954,1955,1956,1957,17,233,1958,1959,1960,1961,1962,1963,1964,1965,1966,1967,1968,1969,234,1970,1971,1972,1973,1974,1975,1976,1977,1978,1979,1980,235,1981,1982,1983,1984,1985,1986,1987,1988,1989,1990,1991,1992,1993,1994,1995,1996,1997,1998,236,1999,2000,2001,2002,2003,2004,2005,2006,2007,2008,2009,2010,2011,237,2012,2013,2014,2015,238,2016,2017,2018,2019,2020,2021,2022,2023,2024,2025,2026,2027,239,2028,2029,2030,2031,2032,240,2033,2034,2035,2036,2037,2038,2039,2040,2041,2042,2043,2044,241,2045,2046,242,2047,2048,2049,2050,2051,2052,2053,2054,2055,2056,243,2057,2058,2059,18,244,2060,2061,2062,2063,2064,2065,2066,2067,2068,2069,2070,2071,2072,2073,245,2074,2075,2076,2077,2078,2079,2080,2081,2082,2083,2084,246,2085,2086,2087,2088,2089,2090,2091,247,2092,2093,2094,2095,2096,2097,248,2098,2099,2100,2101,2102,2103,2104,249,2105,2106,2107,2108,2109,2110,250,2111,2112,2113,2114,2115,2116,2117,251,2118,2119,2120,2121,2122,2123,2124,252,2125,2126,2127,2128,2129,2130,253,2131,2132,2133,2134,2135,2136,2137,254,2138,2139,2140,2141,2142,2143,2144,255,2145,2146,2147,2148,256,2149,2150,2151,2152,2153,2154,2155,257,2156,2157,2158,2159,2160,2161,19,258,2162,2163,2164,2165,2166,2167,2168,2169,2170,259,2171,2172,2173,260,2174,2175,2176,2177,2178,2179,2180,261,2181,2182,2183,2184,2185,2186,2187,2188,2189,262,2190,2191,2192,2193,2194,2195,2196,2197,2198,2199,2200,2201,263,2202,2203,2204,2205,2206,2207,2208,2209,264,2210,2211,2212,2213,2214,2215,2216,2217,2218,2219,2220,2221,2222,265,2223,2224,2225,2226,2227,2228,2229,2230,266,2231,2232,2233,267,2234,2235,2236,2237,2238,2239,2240,2241,2242,2243,2244,268,2245,2246,2247,2248,2249,2250,2251,2252,2253,2254,2255,2256,269,2257,2258,2259,2260,2261,2262,20,270,2263,2264,2265,2266,2267,2268,271,2269,2270,2271,2272,2273,2274,272,2275,2276,2277,2278,2279,273,2280,2281,2282,2283,2284,2285,274,2286,2287,2288,21,275,2289,2290,2291,2292,2293,2294,2295,276,2296,2297,2298,2299,2300,2301,277,2302,2303,2304,2305,278,2306,2307,2308,2309,2310,2311,279,2312,2313,2314,2315,2316,280,2317,2318,2319,2320,2321,281,2322,2323,2324,2325,282,2326,2327,2328,2329,2330,2331,22,283,2332,2333,2334,2335,2336,2337,2338,2339,2340,2341,284,2342,2343,2344,2345,2346,2347,2348,2349,2350,2351,2352,2353,285,2354,2355,2356,2357,2358,2359,2360,286,2361,2362,2363,2364,2365,2366,2367,2368,2369,2370,2371,287,2372,2373,2374,2375,2376,288,2377,2378,2379,2380,2381,2382,2383,2384,2385,289,2386,2387,2388,2389,2390,2391,2392,2393,2394,2395,2396,2397,290,2398,2399,291,2400,2401,2402,2403,2404,2405,2406,2407,292,2408,2409,2410,2411,2412,2413,2414,2415,2416,2417,2418,2419,293,2420,2421,2422,2423,294,2424,2425,2426,2427,2428,2429,295,2430,2431,2432,2433,296,2434,2435,2436,2437,2438,2439,2440,2441,2442,2443,2444,2445,297,2446,2447,2448,2449,2450,2451,2452,2453,2454,2455,2456,2457,2458,298,2459,2460,2461,2462,2463,2464,299,2465,2466,2467,2468,2469,2470,2471,2472,23,300,2473,2474,2475,2476,2477,2478,2479,2480,2481,2482,2483,2484,2485,301,2486,2487,2488,2489,2490,2491,2492,2493,2494,2495,2496,2497,2498,302,2499,2500,2501,2502,2503,2504,2505,2506,2507,2508,2509,303,2510,2511,2512,2513,2514,2515,304,2516,2517,2518,2519,2520,2521,2522,2523,2524,2525,2526,305,2527,2528,2529,2530,2531,2532,2533,2534,2535,2536,2537,2538,2539,2540,2541,2542,2543,306,2544,2545,2546,2547,2548,2549,2550,2551,2552,2553,2554,2555,2556,2557,307,2558,2559,2560,2561,2562,2563,308,2564,2565,2566,2567,2568,2569,2570,2571,2572,2573,2574,2575,2576,2577,309,2578,2579,2580,2581,2582,310,2583,2584,2585,2586,2587,2588,2589,2590,2591,2592,2593,2594,2595,24,311,2596,2597,2598,2599,2600,2601,2602,2603,2604,2605,2606,2607,2608,312,2609,2610,2611,2612,2613,2614,2615,2616,2617,2618,313,2619,2620,2621,2622,2623,2624,2625,2626,2627,2628,2629,2630,314,2631,2632,2633,2634,2635,2636,2637,2638,2639,2640,2641,315,2642,2643,2644,2645,2646,2647,2648,316,2649,2650,2651,2652,317,2653,2654,2655,2656,2657,2658,2659,2660,2661,2662,2663,318,2664,2665,2666,2667,2668,2669,2670,2671,2672,2673,2674,2675,2676,2677,319,2678,2679,2680,2681,2682,2683,2684,2685,2686,2687,2688,2689,2690,320,2691,2692,2693,2694,2695,2696,2697,2698,2699,2700,2701,2702,25,2703,2704,2705,2706,2707,2708,2709,2710,2711,2712,2713,2714,2715,2716,2717,2718,2719,2720,2721,26,322,2722,2723,2724,2725,2726,2727,2728,2729,2730,2731,2732,2733,2734,2735,2736,2737,2738,2739,2740,2741,2742,2743,2744,2745,2746,2747,2748,2749,2750,2751,2752,323,2753,2754,2755,2756,2757,2758,2759,2760,2761,324,2762,2763,2764,2765,2766,2767,2768,2769,2770,2771,2772,2773,2774,325,2775,2776,2777,2778,326,2779,2780,2781,2782,2783,2784,2785,327,2786,2787,2788,2789,2790,2791,328,2792,2793,2794,2795,2796,2797,2798,2799,2800,2801,2802,2803,2804,2805,2806,2807,2808,2809,329,2810,2811,2812,2813,2814,330,2815,2816,2817,2818,2819,2820,2821,331,2822,2823,2824,2825,2826,2827,2828,2829,332,2830,2831,2832,2833,2834,2835,2836,2837,2838,2839,2840,2841,2842,2843,2844,2845,2846,333,2847,2848,2849,2850,2851,2852,334,2853,2854,2855,2856,2857,2858,2859,2860,2861,335,2862,2863,2864,2865,2866,336,2867,2868,2869,2870,2871,337,2872,2873,2874,2875,2876,338,2877,2878,2879,2880,2881,2882,2883,2884,339,2885,2886,2887,2888,2889,2890,2891,2892,2893,2894,340,2895,2896,2897,2898,341,2899,2900,2901,2902,2903,2904,342,2905,2906,2907,2908,2909,2910,2911,27,2912,2913,2914,2915,2916,2917,2918,2919,2920,2921,2922,2923,2924,2925,2926,2927,2928,2929,2930,28,344,2931,2932,2933,2934,2935,2936,2937,2938,345,2939,2940,2941,2942,2943,2944,2945,346,2946,2947,2948,2949,2950,2951,2952,2953,2954,2955,2956,347,2957,2958,2959,2960,2961,2962,2963,348,2964,2965,2966,2967,2968,2969,2970,2971,2972,2973,349,2974,2975,2976,2977,2978,2979,2980,2981,2982,2983,2984,2985,2986,2987,2988,2989,2990,2991,350,2992,2993,2994,2995,2996,2997,2998,2999,3000,3001,3002,3003,29,351,3004,3005,3006,3007,3008,3009,3010,3011,352,3012,3013,3014,3015,3016,3017,3018,3019,3020,353,3021,354,3022,3023,3024,3025,3026,3027,3028,3029,3030,355,3031,3032,3033,356,3034,3035,3036,3037,3038,3039,3040,3041,357,3042,3043,3044,358,3045,3046,3047,3048,3049,3050,3051,3052,359,3053,3054,3055,3056,3057,3058,3059,3060,3061,3062,3063,3064,360,3065,361,3066,3067,3068,3069,362,3070,363,3071,364,3072,3073,3074,365,3075,366,3076,3077,3078,3079,3080,3081,3082,3083,3084,3085,3086,3087,3088,3089,3090,3091,3092,3093,3094,3095,3096,3097,3098,3099,30,367,3100,3101,3102,3103,3104,3105,3106,3107,3108,3109,3110,3111,3112,3113,368,3114,3115,3116,3117,369,3118,3119,3120,3121,3122,3123,3124,3125,3126,3127,370,3128,3129,3130,3131,3132,371,3133,3134,3135,3136,3137,372,3138,3139,3140,3141,3142,3143,3144,3145,3146,3147,373,3148,3149,3150,3151,3152,3153,3154,3155,3156,3157,3158,3159,374,3160,3161,3162,3163,3164,375,3165,3166,3167,376,3168,3169,3170,3171,3172,3173,3174,3175,3176,3177,3178,3179,3180,377,3181,3182,3183,3184,3185,3186,3187,3188,378,3189,3190,3191,3192,3193,3194,3195,3196,3197,379,3198,3199,3200,3201,3202,3203,3204,3205,380,3206,3207,3208,381,3209,3210,3211,3212,3213,3214,3215,3216,3217,382,3218,3219,3220,3221,3222,3223,3224,3225,3226,3227,3228,31,383,3229,3230,3231,3232,3233,3234,3235,3236,3237,3238,3239,3240,3241,3242,384,3243,3244,3245,3246,3247,385,3248,3249,3250,3251,3252,3253,3254,386,3255,3256,3257,3258,3259,3260,3261,3262,3263,3264,3265,3266,3267,3268,3269,387,3270,3271,3272,3273,3274,3275,3276,3277,3278,388,3279,3280,3281,3282,3283,3284,3285,3286,3287,3288,3289,389,3290,3291,3292,3293,3294,3295,390,3296,3297,3298,3299,3300,3301,3302,3303,3304,391,3305,3306,3307,3308,3309,3310,3311,3312,3313,3314,3315,392,3316,3317,3318,3319,393,3320,3321,3322,3323,3324,32,3325,3326,3327,3328,3329,3330,3331,3332,3333,3334,3335,3336,3337,3338,3339,3340,3341,3342,3343,3344,3345,3346,3347,3348,3349,3350,3351,3352,3353,3354,3355,3356,3357,3358,3359,3360,3361,3362,3363,3364,33,3365,3366,3367,3368,3369,3370,3371,3372,3373,3374,3375,3376,3377,3378,3379,3380,3381,3382,34,35,3384,3385,3386,3387,3388,3389,3390,3391,3392,3393,3394,3395,3396,3397,3398,3399,3400,3409', '1', '', '0', '1', 'area');
INSERT INTO zz_linkage VALUES ('2', '1', '北京', '0,1', '2,500,501,502,503,504,505,506,507,508,509,510,511,512,513,514,515,516,517', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3', '1', '安徽', '0,1', '3,36,398,399,400,401,402,403,404,405,406,407,408,37,409,410,411,412,413,414,415,38,416,417,418,419,420,39,421,422,423,424,40,425,426,427,428,429,430,431,432,41,433,434,435,436,437,438,439,440,441,442,443,444,42,445,446,447,448,43,449,450,451,452,453,454,44,455,456,457,458,459,460,461,45,462,463,464,465,466,467,468,46,469,470,471,472,47,473,474,475,476,477,48,478,479,480,481,49,482,483,484,485,486,487,488,50,489,490,491,492,493,494,495,51,496,497,498,499,3401,3402,3403,3404,3405,3406,3407,3408', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('4', '1', '福建', '0,1', '4,53,518,519,520,521,522,523,524,525,526,527,528,529,530,54,531,532,533,534,535,536,537,55,538,539,540,541,542,543,544,545,546,547,56,548,549,550,551,552,553,554,555,556,57,557,558,559,560,561,58,562,563,564,565,566,567,568,569,570,571,572,573,574,59,575,576,577,578,579,580,581,582,583,584,585,586,60,587,588,589,590,591,592,61,593,594,595,596,597,598,599,600,601,602,603', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('5', '1', '甘肃', '0,1', '5,62,604,605,606,607,608,609,610,611,63,612,613,614,615,616,64,617,618,619,620,621,622,623,624,65,625,626,627,628,629,630,631,632,66,633,67,634,635,68,636,637,638,639,640,641,642,69,643,644,645,646,647,648,649,650,70,651,652,653,654,655,656,657,658,659,71,660,661,662,663,664,665,666,72,667,668,669,670,671,672,673,674,73,675,676,677,678,679,680,681,74,682,683,684,685,75,686,687,688,689,690,691', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('6', '1', '广东', '0,1', '6,76,692,693,694,695,696,697,698,699,700,701,702,703,704,77,705,706,707,708,709,710,78,711,712,713,79,714,715,716,717,718,719,720,721,722,723,724,725,726,727,728,729,730,731,732,733,734,735,736,737,738,739,740,741,742,743,744,745,80,746,747,748,749,750,81,751,752,753,754,755,756,82,757,758,759,760,761,762,83,763,764,765,766,767,768,769,84,770,771,772,773,774,85,775,776,777,778,779,780,86,781,782,783,784,785,786,787,788,87,789,790,791,792,793,794,795,796,88,797,798,799,800,801,802,803,89,804,805,806,807,90,808,809,810,811,812,813,814,815,816,817,818,91,819,820,821,822,92,823,824,825,826,827,93,828,829,830,831,832,833,834,835,836,94,837,838,839,840,841,842,843,95,844,845,846,847,848,849,96,850,851,852', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('7', '1', '广西', '0,1', '7,97,853,854,855,856,857,858,859,860,861,862,863,864,98,865,866,867,868,869,870,871,872,873,874,875,876,877,878,879,880,881,99,882,883,884,885,886,887,888,889,890,891,892,893,100,894,895,896,897,101,898,899,900,901,902,903,904,102,905,906,907,908,103,909,910,911,912,913,104,914,915,916,917,918,919,920,921,922,923,924,105,925,926,927,928,106,929,930,931,932,933,934,107,935,936,937,938,939,940,941,942,943,944,108,945,946,947,948,109,949,950,951,952,953,954,955,110,956,957,958,959,960,961', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('8', '1', '贵州', '0,1', '8,111,962,963,964,965,966,967,968,969,970,971,972,973,112,974,975,976,977,978,979,113,980,981,982,983,984,985,986,987,114,988,989,990,991,115,992,993,994,995,996,997,998,999,1000,1001,1002,1003,1004,1005,1006,1007,116,1008,1009,1010,1011,1012,1013,1014,1015,1016,1017,1018,1019,117,1020,1021,1022,1023,1024,1025,1026,1027,118,1028,1029,1030,1031,1032,1033,1034,1035,1036,1037,119,1038,1039,1040,1041,1042,1043,1044,1045,1046,1047,1048,1049,1050,1051,1052,1053', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('9', '1', '海南', '0,1', '9,120,1054,1055,1056,1057,121,122,123,124,125,126,127,128,129,130,131,132,133,134,135,136,137,1058,1059,1060,1061,1062,1063,1064,1065,1066,1067,1068,1069,1070,1071,1072,1073,1074,1075,1076,1077', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('10', '1', '河北', '0,1', '10,138,1078,1079,1080,1081,1082,1083,1084,1085,1086,1087,1088,1089,1090,1091,1092,1093,1094,1095,1096,1097,1098,1099,1100,1101,139,1102,1103,1104,1105,1106,1107,1108,1109,1110,1111,1112,1113,1114,1115,1116,1117,1118,1119,1120,1121,1122,1123,1124,1125,1126,140,1127,1128,1129,1130,1131,1132,1133,1134,1135,1136,1137,1138,1139,1140,1141,1142,141,1143,1144,1145,1146,1147,1148,1149,1150,1151,1152,1153,142,1154,1155,1156,1157,1158,1159,1160,1161,1162,1163,1164,1165,1166,1167,1168,1169,1170,1171,1172,143,1173,1174,1175,1176,1177,1178,1179,1180,1181,1182,1183,144,1184,1185,1186,1187,1188,1189,1190,1191,1192,1193,145,1194,1195,1196,1197,1198,1199,1200,146,1201,1202,1203,1204,1205,1206,1207,1208,1209,1210,1211,1212,1213,1214,147,1215,1216,1217,1218,1219,1220,1221,1222,1223,1224,1225,1226,1227,1228,1229,1230,1231,1232,1233,148,1234,1235,1236,1237,1238,1239,1240,1241,1242,1243,1244,1245,1246,1247,1248,1249,1250', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('11', '1', '河南', '0,1', '11,149,1251,1252,1253,1254,1255,1256,1257,1258,1259,1260,1261,1262,1263,1264,1265,1266,1267,150,1268,1269,1270,1271,1272,1273,1274,1275,1276,1277,1278,1279,1280,1281,1282,151,1283,1284,1285,1286,1287,1288,1289,1290,1291,1292,152,1293,1294,1295,1296,1297,1298,1299,1300,1301,153,1302,1303,1304,1305,1306,154,1307,155,1308,1309,1310,1311,1312,1313,1314,1315,1316,1317,156,1318,1319,1320,1321,1322,1323,1324,1325,1326,1327,1328,1329,1330,157,1331,1332,1333,1334,1335,1336,1337,1338,1339,1340,158,1341,1342,1343,1344,1345,1346,159,1347,1348,1349,1350,1351,1352,1353,1354,1355,160,1356,1357,1358,1359,1360,1361,1362,1363,1364,1365,1366,1367,161,1368,1369,1370,1371,1372,1373,1374,1375,1376,1377,162,1378,1379,1380,1381,1382,1383,163,1384,1385,1386,1387,1388,1389,1390,1391,1392,1393,164,1394,1395,1396,1397,1398,1399,1400,1401,1402,1403,165,1404,1405,1406,1407,1408,166,1409,1410,1411,1412,1413,1414', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('12', '1', '黑龙江', '0,1', '12,167,1415,1416,1417,1418,1419,1420,1421,1422,1423,1424,1425,1426,1427,1428,1429,1430,1431,1432,1433,1434,168,1435,1436,1437,1438,1439,1440,1441,1442,1443,169,1444,1445,1446,170,1447,1448,1449,1450,1451,1452,1453,1454,171,1455,1456,1457,1458,1459,1460,172,1461,1462,1463,1464,1465,1466,1467,1468,173,1469,1470,1471,1472,1473,1474,1475,1476,1477,1478,174,1479,1480,1481,1482,1483,1484,1485,1486,1487,1488,175,1489,1490,1491,1492,176,1493,1494,1495,1496,1497,1498,1499,1500,1501,1502,1503,1504,1505,1506,1507,1508,177,1509,1510,1511,1512,1513,1514,1515,1516,178,1517,1518,1519,1520,1521,1522,1523,1524,1525,1526,179,1527,1528,1529,1530,1531,1532,1533,1534,1535,1536,1537,1538,1539,1540,1541,1542,1543', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('13', '1', '湖北', '0,1', '13,180,1544,1545,1546,1547,1548,1549,1550,1551,1552,1553,1554,1555,1556,1557,181,1558,182,1559,1560,1561,183,1562,1563,1564,1565,1566,1567,1568,1569,1570,1571,184,1572,1573,1574,1575,1576,1577,185,1578,1579,1580,1581,1582,186,1583,1584,1585,1586,1587,1588,1589,1590,187,1591,188,1592,189,1593,1594,1595,1596,1597,1598,1599,1600,190,1601,1602,191,1603,192,1604,1605,1606,1607,1608,1609,193,1610,1611,1612,1613,1614,1615,1616,1617,1618,194,1619,1620,1621,1622,1623,1624,1625,195,1626,1627,1628,1629,1630,1631,1632,1633,1634,1635,1636,1637,1638,196,1639,1640,1641,1642,1643,1644,1645,1646', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('14', '1', '湖南', '0,1', '14,197,1647,1648,1649,1650,1651,1652,1653,1654,1655,1656,198,1657,1658,1659,1660,199,1661,1662,1663,1664,1665,1666,1667,1668,1669,200,1670,1671,1672,1673,1674,1675,1676,1677,1678,1679,1680,201,1681,1682,1683,1684,1685,1686,1687,1688,1689,1690,1691,1692,202,1693,1694,1695,1696,1697,1698,1699,1700,1701,1702,1703,1704,203,1705,1706,1707,1708,1709,204,1710,1711,1712,1713,1714,1715,1716,1717,1718,1719,1720,1721,205,1722,1723,1724,1725,1726,206,1727,1728,1729,1730,1731,1732,1733,1734,207,1735,1736,1737,1738,1739,1740,208,1741,1742,1743,1744,1745,1746,1747,1748,1749,1750,1751,209,1752,1753,1754,1755,1756,1757,1758,1759,1760,210,1761,1762,1763,1764,1765,1766,1767,1768,1769', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('15', '1', '吉林', '0,1', '15,211,1770,1771,1772,1773,1774,1775,1776,1777,1778,1779,1780,1781,1782,1783,212,1784,1785,1786,1787,1788,1789,1790,1791,1792,213,1793,1794,1795,1796,1797,214,1798,1799,1800,1801,1802,1803,215,1804,1805,1806,1807,216,1808,1809,1810,1811,1812,1813,217,1814,1815,1816,1817,1818,218,1819,1820,1821,1822,1823,1824,1825,219,1826,1827,1828,1829,1830,1831,1832,1833', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('16', '1', '江苏', '0,1', '16,220,1834,1835,1836,1837,1838,1839,1840,1841,1842,1843,1844,1845,1846,221,1847,1848,1849,1850,1851,1852,1853,1854,1855,1856,1857,1858,1859,1860,1861,1862,1863,1864,1865,1866,1867,1868,1869,222,1870,1871,1872,1873,1874,1875,1876,1877,1878,223,1879,1880,1881,1882,1883,1884,1885,1886,224,1887,1888,1889,1890,1891,1892,1893,1894,225,1895,1896,1897,1898,1899,1900,1901,226,1902,1903,1904,1905,1906,1907,1908,1909,1910,227,1911,1912,1913,1914,1915,1916,228,1917,1918,1919,1920,1921,1922,229,1923,1924,1925,1926,1927,1928,1929,1930,1931,1932,1933,230,1934,1935,1936,1937,1938,1939,1940,1941,1942,1943,1944,231,1945,1946,1947,1948,1949,1950,1951,232,1952,1953,1954,1955,1956,1957', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('17', '1', '江西', '0,1', '17,233,1958,1959,1960,1961,1962,1963,1964,1965,1966,1967,1968,1969,234,1970,1971,1972,1973,1974,1975,1976,1977,1978,1979,1980,235,1981,1982,1983,1984,1985,1986,1987,1988,1989,1990,1991,1992,1993,1994,1995,1996,1997,1998,236,1999,2000,2001,2002,2003,2004,2005,2006,2007,2008,2009,2010,2011,237,2012,2013,2014,2015,238,2016,2017,2018,2019,2020,2021,2022,2023,2024,2025,2026,2027,239,2028,2029,2030,2031,2032,240,2033,2034,2035,2036,2037,2038,2039,2040,2041,2042,2043,2044,241,2045,2046,242,2047,2048,2049,2050,2051,2052,2053,2054,2055,2056,243,2057,2058,2059', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('18', '1', '辽宁', '0,1', '18,244,2060,2061,2062,2063,2064,2065,2066,2067,2068,2069,2070,2071,2072,2073,245,2074,2075,2076,2077,2078,2079,2080,2081,2082,2083,2084,246,2085,2086,2087,2088,2089,2090,2091,247,2092,2093,2094,2095,2096,2097,248,2098,2099,2100,2101,2102,2103,2104,249,2105,2106,2107,2108,2109,2110,250,2111,2112,2113,2114,2115,2116,2117,251,2118,2119,2120,2121,2122,2123,2124,252,2125,2126,2127,2128,2129,2130,253,2131,2132,2133,2134,2135,2136,2137,254,2138,2139,2140,2141,2142,2143,2144,255,2145,2146,2147,2148,256,2149,2150,2151,2152,2153,2154,2155,257,2156,2157,2158,2159,2160,2161', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('19', '1', '内蒙古', '0,1', '19,258,2162,2163,2164,2165,2166,2167,2168,2169,2170,259,2171,2172,2173,260,2174,2175,2176,2177,2178,2179,2180,261,2181,2182,2183,2184,2185,2186,2187,2188,2189,262,2190,2191,2192,2193,2194,2195,2196,2197,2198,2199,2200,2201,263,2202,2203,2204,2205,2206,2207,2208,2209,264,2210,2211,2212,2213,2214,2215,2216,2217,2218,2219,2220,2221,2222,265,2223,2224,2225,2226,2227,2228,2229,2230,266,2231,2232,2233,267,2234,2235,2236,2237,2238,2239,2240,2241,2242,2243,2244,268,2245,2246,2247,2248,2249,2250,2251,2252,2253,2254,2255,2256,269,2257,2258,2259,2260,2261,2262', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('20', '1', '宁夏', '0,1', '20,270,2263,2264,2265,2266,2267,2268,271,2269,2270,2271,2272,2273,2274,272,2275,2276,2277,2278,2279,273,2280,2281,2282,2283,2284,2285,274,2286,2287,2288', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('21', '1', '青海', '0,1', '21,275,2289,2290,2291,2292,2293,2294,2295,276,2296,2297,2298,2299,2300,2301,277,2302,2303,2304,2305,278,2306,2307,2308,2309,2310,2311,279,2312,2313,2314,2315,2316,280,2317,2318,2319,2320,2321,281,2322,2323,2324,2325,282,2326,2327,2328,2329,2330,2331', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('22', '1', '山东', '0,1', '22,283,2332,2333,2334,2335,2336,2337,2338,2339,2340,2341,284,2342,2343,2344,2345,2346,2347,2348,2349,2350,2351,2352,2353,285,2354,2355,2356,2357,2358,2359,2360,286,2361,2362,2363,2364,2365,2366,2367,2368,2369,2370,2371,287,2372,2373,2374,2375,2376,288,2377,2378,2379,2380,2381,2382,2383,2384,2385,289,2386,2387,2388,2389,2390,2391,2392,2393,2394,2395,2396,2397,290,2398,2399,291,2400,2401,2402,2403,2404,2405,2406,2407,292,2408,2409,2410,2411,2412,2413,2414,2415,2416,2417,2418,2419,293,2420,2421,2422,2423,294,2424,2425,2426,2427,2428,2429,295,2430,2431,2432,2433,296,2434,2435,2436,2437,2438,2439,2440,2441,2442,2443,2444,2445,297,2446,2447,2448,2449,2450,2451,2452,2453,2454,2455,2456,2457,2458,298,2459,2460,2461,2462,2463,2464,299,2465,2466,2467,2468,2469,2470,2471,2472', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('23', '1', '山西', '0,1', '23,300,2473,2474,2475,2476,2477,2478,2479,2480,2481,2482,2483,2484,2485,301,2486,2487,2488,2489,2490,2491,2492,2493,2494,2495,2496,2497,2498,302,2499,2500,2501,2502,2503,2504,2505,2506,2507,2508,2509,303,2510,2511,2512,2513,2514,2515,304,2516,2517,2518,2519,2520,2521,2522,2523,2524,2525,2526,305,2527,2528,2529,2530,2531,2532,2533,2534,2535,2536,2537,2538,2539,2540,2541,2542,2543,306,2544,2545,2546,2547,2548,2549,2550,2551,2552,2553,2554,2555,2556,2557,307,2558,2559,2560,2561,2562,2563,308,2564,2565,2566,2567,2568,2569,2570,2571,2572,2573,2574,2575,2576,2577,309,2578,2579,2580,2581,2582,310,2583,2584,2585,2586,2587,2588,2589,2590,2591,2592,2593,2594,2595', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('24', '1', '陕西', '0,1', '24,311,2596,2597,2598,2599,2600,2601,2602,2603,2604,2605,2606,2607,2608,312,2609,2610,2611,2612,2613,2614,2615,2616,2617,2618,313,2619,2620,2621,2622,2623,2624,2625,2626,2627,2628,2629,2630,314,2631,2632,2633,2634,2635,2636,2637,2638,2639,2640,2641,315,2642,2643,2644,2645,2646,2647,2648,316,2649,2650,2651,2652,317,2653,2654,2655,2656,2657,2658,2659,2660,2661,2662,2663,318,2664,2665,2666,2667,2668,2669,2670,2671,2672,2673,2674,2675,2676,2677,319,2678,2679,2680,2681,2682,2683,2684,2685,2686,2687,2688,2689,2690,320,2691,2692,2693,2694,2695,2696,2697,2698,2699,2700,2701,2702', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('25', '1', '上海', '0,1', '25,2703,2704,2705,2706,2707,2708,2709,2710,2711,2712,2713,2714,2715,2716,2717,2718,2719,2720,2721', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('26', '1', '四川', '0,1', '26,322,2722,2723,2724,2725,2726,2727,2728,2729,2730,2731,2732,2733,2734,2735,2736,2737,2738,2739,2740,2741,2742,2743,2744,2745,2746,2747,2748,2749,2750,2751,2752,323,2753,2754,2755,2756,2757,2758,2759,2760,2761,324,2762,2763,2764,2765,2766,2767,2768,2769,2770,2771,2772,2773,2774,325,2775,2776,2777,2778,326,2779,2780,2781,2782,2783,2784,2785,327,2786,2787,2788,2789,2790,2791,328,2792,2793,2794,2795,2796,2797,2798,2799,2800,2801,2802,2803,2804,2805,2806,2807,2808,2809,329,2810,2811,2812,2813,2814,330,2815,2816,2817,2818,2819,2820,2821,331,2822,2823,2824,2825,2826,2827,2828,2829,332,2830,2831,2832,2833,2834,2835,2836,2837,2838,2839,2840,2841,2842,2843,2844,2845,2846,333,2847,2848,2849,2850,2851,2852,334,2853,2854,2855,2856,2857,2858,2859,2860,2861,335,2862,2863,2864,2865,2866,336,2867,2868,2869,2870,2871,337,2872,2873,2874,2875,2876,338,2877,2878,2879,2880,2881,2882,2883,2884,339,2885,2886,2887,2888,2889,2890,2891,2892,2893,2894,340,2895,2896,2897,2898,341,2899,2900,2901,2902,2903,2904,342,2905,2906,2907,2908,2909,2910,2911', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('27', '1', '天津', '0,1', '27,2912,2913,2914,2915,2916,2917,2918,2919,2920,2921,2922,2923,2924,2925,2926,2927,2928,2929,2930', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('28', '1', '西藏', '0,1', '28,344,2931,2932,2933,2934,2935,2936,2937,2938,345,2939,2940,2941,2942,2943,2944,2945,346,2946,2947,2948,2949,2950,2951,2952,2953,2954,2955,2956,347,2957,2958,2959,2960,2961,2962,2963,348,2964,2965,2966,2967,2968,2969,2970,2971,2972,2973,349,2974,2975,2976,2977,2978,2979,2980,2981,2982,2983,2984,2985,2986,2987,2988,2989,2990,2991,350,2992,2993,2994,2995,2996,2997,2998,2999,3000,3001,3002,3003', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('29', '1', '新疆', '0,1', '29,351,3004,3005,3006,3007,3008,3009,3010,3011,352,3012,3013,3014,3015,3016,3017,3018,3019,3020,353,3021,354,3022,3023,3024,3025,3026,3027,3028,3029,3030,355,3031,3032,3033,356,3034,3035,3036,3037,3038,3039,3040,3041,357,3042,3043,3044,358,3045,3046,3047,3048,3049,3050,3051,3052,359,3053,3054,3055,3056,3057,3058,3059,3060,3061,3062,3063,3064,360,3065,361,3066,3067,3068,3069,362,3070,363,3071,364,3072,3073,3074,365,3075,366,3076,3077,3078,3079,3080,3081,3082,3083,3084,3085,3086,3087,3088,3089,3090,3091,3092,3093,3094,3095,3096,3097,3098,3099', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('30', '1', '云南', '0,1', '30,367,3100,3101,3102,3103,3104,3105,3106,3107,3108,3109,3110,3111,3112,3113,368,3114,3115,3116,3117,369,3118,3119,3120,3121,3122,3123,3124,3125,3126,3127,370,3128,3129,3130,3131,3132,371,3133,3134,3135,3136,3137,372,3138,3139,3140,3141,3142,3143,3144,3145,3146,3147,373,3148,3149,3150,3151,3152,3153,3154,3155,3156,3157,3158,3159,374,3160,3161,3162,3163,3164,375,3165,3166,3167,376,3168,3169,3170,3171,3172,3173,3174,3175,3176,3177,3178,3179,3180,377,3181,3182,3183,3184,3185,3186,3187,3188,378,3189,3190,3191,3192,3193,3194,3195,3196,3197,379,3198,3199,3200,3201,3202,3203,3204,3205,380,3206,3207,3208,381,3209,3210,3211,3212,3213,3214,3215,3216,3217,382,3218,3219,3220,3221,3222,3223,3224,3225,3226,3227,3228', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('31', '1', '浙江', '0,1', '31,383,3229,3230,3231,3232,3233,3234,3235,3236,3237,3238,3239,3240,3241,3242,384,3243,3244,3245,3246,3247,385,3248,3249,3250,3251,3252,3253,3254,386,3255,3256,3257,3258,3259,3260,3261,3262,3263,3264,3265,3266,3267,3268,3269,387,3270,3271,3272,3273,3274,3275,3276,3277,3278,388,3279,3280,3281,3282,3283,3284,3285,3286,3287,3288,3289,389,3290,3291,3292,3293,3294,3295,390,3296,3297,3298,3299,3300,3301,3302,3303,3304,391,3305,3306,3307,3308,3309,3310,3311,3312,3313,3314,3315,392,3316,3317,3318,3319,393,3320,3321,3322,3323,3324', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('32', '1', '重庆', '0,1', '32,3325,3326,3327,3328,3329,3330,3331,3332,3333,3334,3335,3336,3337,3338,3339,3340,3341,3342,3343,3344,3345,3346,3347,3348,3349,3350,3351,3352,3353,3354,3355,3356,3357,3358,3359,3360,3361,3362,3363,3364', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('33', '1', '香港', '0,1', '33,3365,3366,3367,3368,3369,3370,3371,3372,3373,3374,3375,3376,3377,3378,3379,3380,3381,3382', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('34', '1', '澳门', '0,1', '34', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('35', '1', '台湾', '0,1', '35,3384,3385,3386,3387,3388,3389,3390,3391,3392,3393,3394,3395,3396,3397,3398,3399,3400', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('36', '3', '安庆', '0,1,3', '36,398,399,400,401,402,403,404,405,406,407,408', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('37', '3', '蚌埠', '0,1,3', '37,409,410,411,412,413,414,415', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('38', '3', '巢湖', '0,1,3', '38,416,417,418,419,420', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('39', '3', '池州', '0,1,3', '39,421,422,423,424', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('40', '3', '滁州', '0,1,3', '40,425,426,427,428,429,430,431,432', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('41', '3', '阜阳', '0,1,3', '41,433,434,435,436,437,438,439,440,441,442,443,444', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('42', '3', '淮北', '0,1,3', '42,445,446,447,448', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('43', '3', '淮南', '0,1,3', '43,449,450,451,452,453,454', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('44', '3', '黄山', '0,1,3', '44,455,456,457,458,459,460,461', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('45', '3', '六安', '0,1,3', '45,462,463,464,465,466,467,468', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('46', '3', '马鞍山', '0,1,3', '46,469,470,471,472', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('47', '3', '宿州', '0,1,3', '47,473,474,475,476,477', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('48', '3', '铜陵', '0,1,3', '48,478,479,480,481', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('49', '3', '芜湖', '0,1,3', '49,482,483,484,485,486,487,488', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('50', '3', '宣城', '0,1,3', '50,489,490,491,492,493,494,495', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('51', '3', '亳州', '0,1,3', '51,496,497,498,499', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('53', '4', '福州', '0,1,4', '53,518,519,520,521,522,523,524,525,526,527,528,529,530', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('54', '4', '龙岩', '0,1,4', '54,531,532,533,534,535,536,537', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('55', '4', '南平', '0,1,4', '55,538,539,540,541,542,543,544,545,546,547', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('56', '4', '宁德', '0,1,4', '56,548,549,550,551,552,553,554,555,556', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('57', '4', '莆田', '0,1,4', '57,557,558,559,560,561', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('58', '4', '泉州', '0,1,4', '58,562,563,564,565,566,567,568,569,570,571,572,573,574', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('59', '4', '三明', '0,1,4', '59,575,576,577,578,579,580,581,582,583,584,585,586', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('60', '4', '厦门', '0,1,4', '60,587,588,589,590,591,592', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('61', '4', '漳州', '0,1,4', '61,593,594,595,596,597,598,599,600,601,602,603', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('62', '5', '兰州', '0,1,5', '62,604,605,606,607,608,609,610,611', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('63', '5', '白银', '0,1,5', '63,612,613,614,615,616', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('64', '5', '定西', '0,1,5', '64,617,618,619,620,621,622,623,624', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('65', '5', '甘南', '0,1,5', '65,625,626,627,628,629,630,631,632', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('66', '5', '嘉峪关', '0,1,5', '66,633', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('67', '5', '金昌', '0,1,5', '67,634,635', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('68', '5', '酒泉', '0,1,5', '68,636,637,638,639,640,641,642', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('69', '5', '临夏', '0,1,5', '69,643,644,645,646,647,648,649,650', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('70', '5', '陇南', '0,1,5', '70,651,652,653,654,655,656,657,658,659', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('71', '5', '平凉', '0,1,5', '71,660,661,662,663,664,665,666', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('72', '5', '庆阳', '0,1,5', '72,667,668,669,670,671,672,673,674', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('73', '5', '天水', '0,1,5', '73,675,676,677,678,679,680,681', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('74', '5', '武威', '0,1,5', '74,682,683,684,685', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('75', '5', '张掖', '0,1,5', '75,686,687,688,689,690,691', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('76', '6', '广州', '0,1,6', '76,692,693,694,695,696,697,698,699,700,701,702,703,704', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('77', '6', '深圳', '0,1,6', '77,705,706,707,708,709,710', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('78', '6', '潮州', '0,1,6', '78,711,712,713', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('79', '6', '东莞', '0,1,6', '79,714,715,716,717,718,719,720,721,722,723,724,725,726,727,728,729,730,731,732,733,734,735,736,737,738,739,740,741,742,743,744,745', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('80', '6', '佛山', '0,1,6', '80,746,747,748,749,750', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('81', '6', '河源', '0,1,6', '81,751,752,753,754,755,756', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('82', '6', '惠州', '0,1,6', '82,757,758,759,760,761,762', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('83', '6', '江门', '0,1,6', '83,763,764,765,766,767,768,769', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('84', '6', '揭阳', '0,1,6', '84,770,771,772,773,774', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('85', '6', '茂名', '0,1,6', '85,775,776,777,778,779,780', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('86', '6', '梅州', '0,1,6', '86,781,782,783,784,785,786,787,788', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('87', '6', '清远', '0,1,6', '87,789,790,791,792,793,794,795,796', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('88', '6', '汕头', '0,1,6', '88,797,798,799,800,801,802,803', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('89', '6', '汕尾', '0,1,6', '89,804,805,806,807', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('90', '6', '韶关', '0,1,6', '90,808,809,810,811,812,813,814,815,816,817,818', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('91', '6', '阳江', '0,1,6', '91,819,820,821,822', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('92', '6', '云浮', '0,1,6', '92,823,824,825,826,827', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('93', '6', '湛江', '0,1,6', '93,828,829,830,831,832,833,834,835,836', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('94', '6', '肇庆', '0,1,6', '94,837,838,839,840,841,842,843', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('95', '6', '中山', '0,1,6', '95,844,845,846,847,848,849', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('96', '6', '珠海', '0,1,6', '96,850,851,852', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('97', '7', '南宁', '0,1,7', '97,853,854,855,856,857,858,859,860,861,862,863,864', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('98', '7', '桂林', '0,1,7', '98,865,866,867,868,869,870,871,872,873,874,875,876,877,878,879,880,881', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('99', '7', '百色', '0,1,7', '99,882,883,884,885,886,887,888,889,890,891,892,893', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('100', '7', '北海', '0,1,7', '100,894,895,896,897', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('101', '7', '崇左', '0,1,7', '101,898,899,900,901,902,903,904', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('102', '7', '防城港', '0,1,7', '102,905,906,907,908', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('103', '7', '贵港', '0,1,7', '103,909,910,911,912,913', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('104', '7', '河池', '0,1,7', '104,914,915,916,917,918,919,920,921,922,923,924', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('105', '7', '贺州', '0,1,7', '105,925,926,927,928', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('106', '7', '来宾', '0,1,7', '106,929,930,931,932,933,934', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('107', '7', '柳州', '0,1,7', '107,935,936,937,938,939,940,941,942,943,944', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('108', '7', '钦州', '0,1,7', '108,945,946,947,948', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('109', '7', '梧州', '0,1,7', '109,949,950,951,952,953,954,955', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('110', '7', '玉林', '0,1,7', '110,956,957,958,959,960,961', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('111', '8', '贵阳', '0,1,8', '111,962,963,964,965,966,967,968,969,970,971,972,973', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('112', '8', '安顺', '0,1,8', '112,974,975,976,977,978,979', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('113', '8', '毕节', '0,1,8', '113,980,981,982,983,984,985,986,987', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('114', '8', '六盘水', '0,1,8', '114,988,989,990,991', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('115', '8', '黔东南', '0,1,8', '115,992,993,994,995,996,997,998,999,1000,1001,1002,1003,1004,1005,1006,1007', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('116', '8', '黔南', '0,1,8', '116,1008,1009,1010,1011,1012,1013,1014,1015,1016,1017,1018,1019', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('117', '8', '黔西南', '0,1,8', '117,1020,1021,1022,1023,1024,1025,1026,1027', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('118', '8', '铜仁', '0,1,8', '118,1028,1029,1030,1031,1032,1033,1034,1035,1036,1037', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('119', '8', '遵义', '0,1,8', '119,1038,1039,1040,1041,1042,1043,1044,1045,1046,1047,1048,1049,1050,1051,1052,1053', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('120', '9', '海口', '0,1,9', '120,1054,1055,1056,1057', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('121', '9', '三亚', '0,1,9', '121', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('122', '9', '白沙', '0,1,9', '122', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('123', '9', '保亭', '0,1,9', '123', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('124', '9', '昌江', '0,1,9', '124', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('125', '9', '澄迈县', '0,1,9', '125', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('126', '9', '定安县', '0,1,9', '126', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('127', '9', '东方', '0,1,9', '127', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('128', '9', '乐东', '0,1,9', '128', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('129', '9', '临高县', '0,1,9', '129', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('130', '9', '陵水', '0,1,9', '130', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('131', '9', '琼海', '0,1,9', '131', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('132', '9', '琼中', '0,1,9', '132', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('133', '9', '屯昌县', '0,1,9', '133', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('134', '9', '万宁', '0,1,9', '134', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('135', '9', '文昌', '0,1,9', '135', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('136', '9', '五指山', '0,1,9', '136', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('137', '9', '儋州', '0,1,9', '137,1058,1059,1060,1061,1062,1063,1064,1065,1066,1067,1068,1069,1070,1071,1072,1073,1074,1075,1076,1077', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('138', '10', '石家庄', '0,1,10', '138,1078,1079,1080,1081,1082,1083,1084,1085,1086,1087,1088,1089,1090,1091,1092,1093,1094,1095,1096,1097,1098,1099,1100,1101', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('139', '10', '保定', '0,1,10', '139,1102,1103,1104,1105,1106,1107,1108,1109,1110,1111,1112,1113,1114,1115,1116,1117,1118,1119,1120,1121,1122,1123,1124,1125,1126', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('140', '10', '沧州', '0,1,10', '140,1127,1128,1129,1130,1131,1132,1133,1134,1135,1136,1137,1138,1139,1140,1141,1142', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('141', '10', '承德', '0,1,10', '141,1143,1144,1145,1146,1147,1148,1149,1150,1151,1152,1153', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('142', '10', '邯郸', '0,1,10', '142,1154,1155,1156,1157,1158,1159,1160,1161,1162,1163,1164,1165,1166,1167,1168,1169,1170,1171,1172', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('143', '10', '衡水', '0,1,10', '143,1173,1174,1175,1176,1177,1178,1179,1180,1181,1182,1183', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('144', '10', '廊坊', '0,1,10', '144,1184,1185,1186,1187,1188,1189,1190,1191,1192,1193', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('145', '10', '秦皇岛', '0,1,10', '145,1194,1195,1196,1197,1198,1199,1200', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('146', '10', '唐山', '0,1,10', '146,1201,1202,1203,1204,1205,1206,1207,1208,1209,1210,1211,1212,1213,1214', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('147', '10', '邢台', '0,1,10', '147,1215,1216,1217,1218,1219,1220,1221,1222,1223,1224,1225,1226,1227,1228,1229,1230,1231,1232,1233', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('148', '10', '张家口', '0,1,10', '148,1234,1235,1236,1237,1238,1239,1240,1241,1242,1243,1244,1245,1246,1247,1248,1249,1250', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('149', '11', '郑州', '0,1,11', '149,1251,1252,1253,1254,1255,1256,1257,1258,1259,1260,1261,1262,1263,1264,1265,1266,1267', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('150', '11', '洛阳', '0,1,11', '150,1268,1269,1270,1271,1272,1273,1274,1275,1276,1277,1278,1279,1280,1281,1282', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('151', '11', '开封', '0,1,11', '151,1283,1284,1285,1286,1287,1288,1289,1290,1291,1292', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('152', '11', '安阳', '0,1,11', '152,1293,1294,1295,1296,1297,1298,1299,1300,1301', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('153', '11', '鹤壁', '0,1,11', '153,1302,1303,1304,1305,1306', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('154', '11', '济源', '0,1,11', '154,1307', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('155', '11', '焦作', '0,1,11', '155,1308,1309,1310,1311,1312,1313,1314,1315,1316,1317', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('156', '11', '南阳', '0,1,11', '156,1318,1319,1320,1321,1322,1323,1324,1325,1326,1327,1328,1329,1330', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('157', '11', '平顶山', '0,1,11', '157,1331,1332,1333,1334,1335,1336,1337,1338,1339,1340', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('158', '11', '三门峡', '0,1,11', '158,1341,1342,1343,1344,1345,1346', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('159', '11', '商丘', '0,1,11', '159,1347,1348,1349,1350,1351,1352,1353,1354,1355', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('160', '11', '新乡', '0,1,11', '160,1356,1357,1358,1359,1360,1361,1362,1363,1364,1365,1366,1367', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('161', '11', '信阳', '0,1,11', '161,1368,1369,1370,1371,1372,1373,1374,1375,1376,1377', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('162', '11', '许昌', '0,1,11', '162,1378,1379,1380,1381,1382,1383', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('163', '11', '周口', '0,1,11', '163,1384,1385,1386,1387,1388,1389,1390,1391,1392,1393', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('164', '11', '驻马店', '0,1,11', '164,1394,1395,1396,1397,1398,1399,1400,1401,1402,1403', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('165', '11', '漯河', '0,1,11', '165,1404,1405,1406,1407,1408', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('166', '11', '濮阳', '0,1,11', '166,1409,1410,1411,1412,1413,1414', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('167', '12', '哈尔滨', '0,1,12', '167,1415,1416,1417,1418,1419,1420,1421,1422,1423,1424,1425,1426,1427,1428,1429,1430,1431,1432,1433,1434', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('168', '12', '大庆', '0,1,12', '168,1435,1436,1437,1438,1439,1440,1441,1442,1443', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('169', '12', '大兴安岭', '0,1,12', '169,1444,1445,1446', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('170', '12', '鹤岗', '0,1,12', '170,1447,1448,1449,1450,1451,1452,1453,1454', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('171', '12', '黑河', '0,1,12', '171,1455,1456,1457,1458,1459,1460', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('172', '12', '鸡西', '0,1,12', '172,1461,1462,1463,1464,1465,1466,1467,1468', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('173', '12', '佳木斯', '0,1,12', '173,1469,1470,1471,1472,1473,1474,1475,1476,1477,1478', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('174', '12', '牡丹江', '0,1,12', '174,1479,1480,1481,1482,1483,1484,1485,1486,1487,1488', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('175', '12', '七台河', '0,1,12', '175,1489,1490,1491,1492', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('176', '12', '齐齐哈尔', '0,1,12', '176,1493,1494,1495,1496,1497,1498,1499,1500,1501,1502,1503,1504,1505,1506,1507,1508', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('177', '12', '双鸭山', '0,1,12', '177,1509,1510,1511,1512,1513,1514,1515,1516', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('178', '12', '绥化', '0,1,12', '178,1517,1518,1519,1520,1521,1522,1523,1524,1525,1526', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('179', '12', '伊春', '0,1,12', '179,1527,1528,1529,1530,1531,1532,1533,1534,1535,1536,1537,1538,1539,1540,1541,1542,1543', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('180', '13', '武汉', '0,1,13', '180,1544,1545,1546,1547,1548,1549,1550,1551,1552,1553,1554,1555,1556,1557', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('181', '13', '仙桃', '0,1,13', '181,1558', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('182', '13', '鄂州', '0,1,13', '182,1559,1560,1561', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('183', '13', '黄冈', '0,1,13', '183,1562,1563,1564,1565,1566,1567,1568,1569,1570,1571', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('184', '13', '黄石', '0,1,13', '184,1572,1573,1574,1575,1576,1577', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('185', '13', '荆门', '0,1,13', '185,1578,1579,1580,1581,1582', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('186', '13', '荆州', '0,1,13', '186,1583,1584,1585,1586,1587,1588,1589,1590', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('187', '13', '潜江', '0,1,13', '187,1591', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('188', '13', '神农架林区', '0,1,13', '188,1592', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('189', '13', '十堰', '0,1,13', '189,1593,1594,1595,1596,1597,1598,1599,1600', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('190', '13', '随州', '0,1,13', '190,1601,1602', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('191', '13', '天门', '0,1,13', '191,1603', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('192', '13', '咸宁', '0,1,13', '192,1604,1605,1606,1607,1608,1609', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('193', '13', '襄樊', '0,1,13', '193,1610,1611,1612,1613,1614,1615,1616,1617,1618', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('194', '13', '孝感', '0,1,13', '194,1619,1620,1621,1622,1623,1624,1625', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('195', '13', '宜昌', '0,1,13', '195,1626,1627,1628,1629,1630,1631,1632,1633,1634,1635,1636,1637,1638', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('196', '13', '恩施', '0,1,13', '196,1639,1640,1641,1642,1643,1644,1645,1646', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('197', '14', '长沙', '0,1,14', '197,1647,1648,1649,1650,1651,1652,1653,1654,1655,1656', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('198', '14', '张家界', '0,1,14', '198,1657,1658,1659,1660', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('199', '14', '常德', '0,1,14', '199,1661,1662,1663,1664,1665,1666,1667,1668,1669', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('200', '14', '郴州', '0,1,14', '200,1670,1671,1672,1673,1674,1675,1676,1677,1678,1679,1680', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('201', '14', '衡阳', '0,1,14', '201,1681,1682,1683,1684,1685,1686,1687,1688,1689,1690,1691,1692', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('202', '14', '怀化', '0,1,14', '202,1693,1694,1695,1696,1697,1698,1699,1700,1701,1702,1703,1704', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('203', '14', '娄底', '0,1,14', '203,1705,1706,1707,1708,1709', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('204', '14', '邵阳', '0,1,14', '204,1710,1711,1712,1713,1714,1715,1716,1717,1718,1719,1720,1721', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('205', '14', '湘潭', '0,1,14', '205,1722,1723,1724,1725,1726', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('206', '14', '湘西', '0,1,14', '206,1727,1728,1729,1730,1731,1732,1733,1734', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('207', '14', '益阳', '0,1,14', '207,1735,1736,1737,1738,1739,1740', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('208', '14', '永州', '0,1,14', '208,1741,1742,1743,1744,1745,1746,1747,1748,1749,1750,1751', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('209', '14', '岳阳', '0,1,14', '209,1752,1753,1754,1755,1756,1757,1758,1759,1760', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('210', '14', '株洲', '0,1,14', '210,1761,1762,1763,1764,1765,1766,1767,1768,1769', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('211', '15', '长春', '0,1,15', '211,1770,1771,1772,1773,1774,1775,1776,1777,1778,1779,1780,1781,1782,1783', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('212', '15', '吉林', '0,1,15', '212,1784,1785,1786,1787,1788,1789,1790,1791,1792', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('213', '15', '白城', '0,1,15', '213,1793,1794,1795,1796,1797', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('214', '15', '白山', '0,1,15', '214,1798,1799,1800,1801,1802,1803', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('215', '15', '辽源', '0,1,15', '215,1804,1805,1806,1807', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('216', '15', '四平', '0,1,15', '216,1808,1809,1810,1811,1812,1813', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('217', '15', '松原', '0,1,15', '217,1814,1815,1816,1817,1818', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('218', '15', '通化', '0,1,15', '218,1819,1820,1821,1822,1823,1824,1825', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('219', '15', '延边', '0,1,15', '219,1826,1827,1828,1829,1830,1831,1832,1833', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('220', '16', '南京', '0,1,16', '220,1834,1835,1836,1837,1838,1839,1840,1841,1842,1843,1844,1845,1846', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('221', '16', '苏州', '0,1,16', '221,1847,1848,1849,1850,1851,1852,1853,1854,1855,1856,1857,1858,1859,1860,1861,1862,1863,1864,1865,1866,1867,1868,1869', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('222', '16', '无锡', '0,1,16', '222,1870,1871,1872,1873,1874,1875,1876,1877,1878', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('223', '16', '常州', '0,1,16', '223,1879,1880,1881,1882,1883,1884,1885,1886', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('224', '16', '淮安', '0,1,16', '224,1887,1888,1889,1890,1891,1892,1893,1894', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('225', '16', '连云港', '0,1,16', '225,1895,1896,1897,1898,1899,1900,1901', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('226', '16', '南通', '0,1,16', '226,1902,1903,1904,1905,1906,1907,1908,1909,1910', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('227', '16', '宿迁', '0,1,16', '227,1911,1912,1913,1914,1915,1916', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('228', '16', '泰州', '0,1,16', '228,1917,1918,1919,1920,1921,1922', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('229', '16', '徐州', '0,1,16', '229,1923,1924,1925,1926,1927,1928,1929,1930,1931,1932,1933', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('230', '16', '盐城', '0,1,16', '230,1934,1935,1936,1937,1938,1939,1940,1941,1942,1943,1944', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('231', '16', '扬州', '0,1,16', '231,1945,1946,1947,1948,1949,1950,1951', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('232', '16', '镇江', '0,1,16', '232,1952,1953,1954,1955,1956,1957', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('233', '17', '南昌', '0,1,17', '233,1958,1959,1960,1961,1962,1963,1964,1965,1966,1967,1968,1969', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('234', '17', '抚州', '0,1,17', '234,1970,1971,1972,1973,1974,1975,1976,1977,1978,1979,1980', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('235', '17', '赣州', '0,1,17', '235,1981,1982,1983,1984,1985,1986,1987,1988,1989,1990,1991,1992,1993,1994,1995,1996,1997,1998', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('236', '17', '吉安', '0,1,17', '236,1999,2000,2001,2002,2003,2004,2005,2006,2007,2008,2009,2010,2011', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('237', '17', '景德镇', '0,1,17', '237,2012,2013,2014,2015', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('238', '17', '九江', '0,1,17', '238,2016,2017,2018,2019,2020,2021,2022,2023,2024,2025,2026,2027', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('239', '17', '萍乡', '0,1,17', '239,2028,2029,2030,2031,2032', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('240', '17', '上饶', '0,1,17', '240,2033,2034,2035,2036,2037,2038,2039,2040,2041,2042,2043,2044', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('241', '17', '新余', '0,1,17', '241,2045,2046', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('242', '17', '宜春', '0,1,17', '242,2047,2048,2049,2050,2051,2052,2053,2054,2055,2056', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('243', '17', '鹰潭', '0,1,17', '243,2057,2058,2059', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('244', '18', '沈阳', '0,1,18', '244,2060,2061,2062,2063,2064,2065,2066,2067,2068,2069,2070,2071,2072,2073', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('245', '18', '大连', '0,1,18', '245,2074,2075,2076,2077,2078,2079,2080,2081,2082,2083,2084', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('246', '18', '鞍山', '0,1,18', '246,2085,2086,2087,2088,2089,2090,2091', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('247', '18', '本溪', '0,1,18', '247,2092,2093,2094,2095,2096,2097', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('248', '18', '朝阳', '0,1,18', '248,2098,2099,2100,2101,2102,2103,2104', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('249', '18', '丹东', '0,1,18', '249,2105,2106,2107,2108,2109,2110', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('250', '18', '抚顺', '0,1,18', '250,2111,2112,2113,2114,2115,2116,2117', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('251', '18', '阜新', '0,1,18', '251,2118,2119,2120,2121,2122,2123,2124', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('252', '18', '葫芦岛', '0,1,18', '252,2125,2126,2127,2128,2129,2130', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('253', '18', '锦州', '0,1,18', '253,2131,2132,2133,2134,2135,2136,2137', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('254', '18', '辽阳', '0,1,18', '254,2138,2139,2140,2141,2142,2143,2144', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('255', '18', '盘锦', '0,1,18', '255,2145,2146,2147,2148', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('256', '18', '铁岭', '0,1,18', '256,2149,2150,2151,2152,2153,2154,2155', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('257', '18', '营口', '0,1,18', '257,2156,2157,2158,2159,2160,2161', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('258', '19', '呼和浩特', '0,1,19', '258,2162,2163,2164,2165,2166,2167,2168,2169,2170', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('259', '19', '阿拉善盟', '0,1,19', '259,2171,2172,2173', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('260', '19', '巴彦淖尔盟', '0,1,19', '260,2174,2175,2176,2177,2178,2179,2180', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('261', '19', '包头', '0,1,19', '261,2181,2182,2183,2184,2185,2186,2187,2188,2189', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('262', '19', '赤峰', '0,1,19', '262,2190,2191,2192,2193,2194,2195,2196,2197,2198,2199,2200,2201', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('263', '19', '鄂尔多斯', '0,1,19', '263,2202,2203,2204,2205,2206,2207,2208,2209', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('264', '19', '呼伦贝尔', '0,1,19', '264,2210,2211,2212,2213,2214,2215,2216,2217,2218,2219,2220,2221,2222', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('265', '19', '通辽', '0,1,19', '265,2223,2224,2225,2226,2227,2228,2229,2230', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('266', '19', '乌海', '0,1,19', '266,2231,2232,2233', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('267', '19', '乌兰察布市', '0,1,19', '267,2234,2235,2236,2237,2238,2239,2240,2241,2242,2243,2244', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('268', '19', '锡林郭勒盟', '0,1,19', '268,2245,2246,2247,2248,2249,2250,2251,2252,2253,2254,2255,2256', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('269', '19', '兴安盟', '0,1,19', '269,2257,2258,2259,2260,2261,2262', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('270', '20', '银川', '0,1,20', '270,2263,2264,2265,2266,2267,2268', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('271', '20', '固原', '0,1,20', '271,2269,2270,2271,2272,2273,2274', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('272', '20', '石嘴山', '0,1,20', '272,2275,2276,2277,2278,2279', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('273', '20', '吴忠', '0,1,20', '273,2280,2281,2282,2283,2284,2285', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('274', '20', '中卫', '0,1,20', '274,2286,2287,2288', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('275', '21', '西宁', '0,1,21', '275,2289,2290,2291,2292,2293,2294,2295', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('276', '21', '果洛', '0,1,21', '276,2296,2297,2298,2299,2300,2301', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('277', '21', '海北', '0,1,21', '277,2302,2303,2304,2305', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('278', '21', '海东', '0,1,21', '278,2306,2307,2308,2309,2310,2311', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('279', '21', '海南', '0,1,21', '279,2312,2313,2314,2315,2316', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('280', '21', '海西', '0,1,21', '280,2317,2318,2319,2320,2321', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('281', '21', '黄南', '0,1,21', '281,2322,2323,2324,2325', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('282', '21', '玉树', '0,1,21', '282,2326,2327,2328,2329,2330,2331', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('283', '22', '济南', '0,1,22', '283,2332,2333,2334,2335,2336,2337,2338,2339,2340,2341', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('284', '22', '青岛', '0,1,22', '284,2342,2343,2344,2345,2346,2347,2348,2349,2350,2351,2352,2353', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('285', '22', '滨州', '0,1,22', '285,2354,2355,2356,2357,2358,2359,2360', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('286', '22', '德州', '0,1,22', '286,2361,2362,2363,2364,2365,2366,2367,2368,2369,2370,2371', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('287', '22', '东营', '0,1,22', '287,2372,2373,2374,2375,2376', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('288', '22', '菏泽', '0,1,22', '288,2377,2378,2379,2380,2381,2382,2383,2384,2385', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('289', '22', '济宁', '0,1,22', '289,2386,2387,2388,2389,2390,2391,2392,2393,2394,2395,2396,2397', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('290', '22', '莱芜', '0,1,22', '290,2398,2399', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('291', '22', '聊城', '0,1,22', '291,2400,2401,2402,2403,2404,2405,2406,2407', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('292', '22', '临沂', '0,1,22', '292,2408,2409,2410,2411,2412,2413,2414,2415,2416,2417,2418,2419', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('293', '22', '日照', '0,1,22', '293,2420,2421,2422,2423', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('294', '22', '泰安', '0,1,22', '294,2424,2425,2426,2427,2428,2429', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('295', '22', '威海', '0,1,22', '295,2430,2431,2432,2433', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('296', '22', '潍坊', '0,1,22', '296,2434,2435,2436,2437,2438,2439,2440,2441,2442,2443,2444,2445', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('297', '22', '烟台', '0,1,22', '297,2446,2447,2448,2449,2450,2451,2452,2453,2454,2455,2456,2457,2458', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('298', '22', '枣庄', '0,1,22', '298,2459,2460,2461,2462,2463,2464', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('299', '22', '淄博', '0,1,22', '299,2465,2466,2467,2468,2469,2470,2471,2472', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('300', '23', '太原', '0,1,23', '300,2473,2474,2475,2476,2477,2478,2479,2480,2481,2482,2483,2484,2485', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('301', '23', '长治', '0,1,23', '301,2486,2487,2488,2489,2490,2491,2492,2493,2494,2495,2496,2497,2498', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('302', '23', '大同', '0,1,23', '302,2499,2500,2501,2502,2503,2504,2505,2506,2507,2508,2509', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('303', '23', '晋城', '0,1,23', '303,2510,2511,2512,2513,2514,2515', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('304', '23', '晋中', '0,1,23', '304,2516,2517,2518,2519,2520,2521,2522,2523,2524,2525,2526', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('305', '23', '临汾', '0,1,23', '305,2527,2528,2529,2530,2531,2532,2533,2534,2535,2536,2537,2538,2539,2540,2541,2542,2543', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('306', '23', '吕梁', '0,1,23', '306,2544,2545,2546,2547,2548,2549,2550,2551,2552,2553,2554,2555,2556,2557', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('307', '23', '朔州', '0,1,23', '307,2558,2559,2560,2561,2562,2563', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('308', '23', '忻州', '0,1,23', '308,2564,2565,2566,2567,2568,2569,2570,2571,2572,2573,2574,2575,2576,2577', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('309', '23', '阳泉', '0,1,23', '309,2578,2579,2580,2581,2582', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('310', '23', '运城', '0,1,23', '310,2583,2584,2585,2586,2587,2588,2589,2590,2591,2592,2593,2594,2595', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('311', '24', '西安', '0,1,24', '311,2596,2597,2598,2599,2600,2601,2602,2603,2604,2605,2606,2607,2608', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('312', '24', '安康', '0,1,24', '312,2609,2610,2611,2612,2613,2614,2615,2616,2617,2618', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('313', '24', '宝鸡', '0,1,24', '313,2619,2620,2621,2622,2623,2624,2625,2626,2627,2628,2629,2630', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('314', '24', '汉中', '0,1,24', '314,2631,2632,2633,2634,2635,2636,2637,2638,2639,2640,2641', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('315', '24', '商洛', '0,1,24', '315,2642,2643,2644,2645,2646,2647,2648', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('316', '24', '铜川', '0,1,24', '316,2649,2650,2651,2652', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('317', '24', '渭南', '0,1,24', '317,2653,2654,2655,2656,2657,2658,2659,2660,2661,2662,2663', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('318', '24', '咸阳', '0,1,24', '318,2664,2665,2666,2667,2668,2669,2670,2671,2672,2673,2674,2675,2676,2677', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('319', '24', '延安', '0,1,24', '319,2678,2679,2680,2681,2682,2683,2684,2685,2686,2687,2688,2689,2690', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('320', '24', '榆林', '0,1,24', '320,2691,2692,2693,2694,2695,2696,2697,2698,2699,2700,2701,2702', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('322', '26', '成都', '0,1,26', '322,2722,2723,2724,2725,2726,2727,2728,2729,2730,2731,2732,2733,2734,2735,2736,2737,2738,2739,2740,2741,2742,2743,2744,2745,2746,2747,2748,2749,2750,2751,2752', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('323', '26', '绵阳', '0,1,26', '323,2753,2754,2755,2756,2757,2758,2759,2760,2761', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('324', '26', '阿坝', '0,1,26', '324,2762,2763,2764,2765,2766,2767,2768,2769,2770,2771,2772,2773,2774', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('325', '26', '巴中', '0,1,26', '325,2775,2776,2777,2778', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('326', '26', '达州', '0,1,26', '326,2779,2780,2781,2782,2783,2784,2785', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('327', '26', '德阳', '0,1,26', '327,2786,2787,2788,2789,2790,2791', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('328', '26', '甘孜', '0,1,26', '328,2792,2793,2794,2795,2796,2797,2798,2799,2800,2801,2802,2803,2804,2805,2806,2807,2808,2809', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('329', '26', '广安', '0,1,26', '329,2810,2811,2812,2813,2814', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('330', '26', '广元', '0,1,26', '330,2815,2816,2817,2818,2819,2820,2821', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('331', '26', '乐山', '0,1,26', '331,2822,2823,2824,2825,2826,2827,2828,2829', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('332', '26', '凉山', '0,1,26', '332,2830,2831,2832,2833,2834,2835,2836,2837,2838,2839,2840,2841,2842,2843,2844,2845,2846', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('333', '26', '眉山', '0,1,26', '333,2847,2848,2849,2850,2851,2852', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('334', '26', '南充', '0,1,26', '334,2853,2854,2855,2856,2857,2858,2859,2860,2861', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('335', '26', '内江', '0,1,26', '335,2862,2863,2864,2865,2866', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('336', '26', '攀枝花', '0,1,26', '336,2867,2868,2869,2870,2871', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('337', '26', '遂宁', '0,1,26', '337,2872,2873,2874,2875,2876', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('338', '26', '雅安', '0,1,26', '338,2877,2878,2879,2880,2881,2882,2883,2884', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('339', '26', '宜宾', '0,1,26', '339,2885,2886,2887,2888,2889,2890,2891,2892,2893,2894', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('340', '26', '资阳', '0,1,26', '340,2895,2896,2897,2898', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('341', '26', '自贡', '0,1,26', '341,2899,2900,2901,2902,2903,2904', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('342', '26', '泸州', '0,1,26', '342,2905,2906,2907,2908,2909,2910,2911', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('344', '28', '拉萨', '0,1,28', '344,2931,2932,2933,2934,2935,2936,2937,2938', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('345', '28', '阿里', '0,1,28', '345,2939,2940,2941,2942,2943,2944,2945', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('346', '28', '昌都', '0,1,28', '346,2946,2947,2948,2949,2950,2951,2952,2953,2954,2955,2956', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('347', '28', '林芝', '0,1,28', '347,2957,2958,2959,2960,2961,2962,2963', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('348', '28', '那曲', '0,1,28', '348,2964,2965,2966,2967,2968,2969,2970,2971,2972,2973', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('349', '28', '日喀则', '0,1,28', '349,2974,2975,2976,2977,2978,2979,2980,2981,2982,2983,2984,2985,2986,2987,2988,2989,2990,2991', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('350', '28', '山南', '0,1,28', '350,2992,2993,2994,2995,2996,2997,2998,2999,3000,3001,3002,3003', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('351', '29', '乌鲁木齐', '0,1,29', '351,3004,3005,3006,3007,3008,3009,3010,3011', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('352', '29', '阿克苏', '0,1,29', '352,3012,3013,3014,3015,3016,3017,3018,3019,3020', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('353', '29', '阿拉尔', '0,1,29', '353,3021', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('354', '29', '巴音郭楞', '0,1,29', '354,3022,3023,3024,3025,3026,3027,3028,3029,3030', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('355', '29', '博尔塔拉', '0,1,29', '355,3031,3032,3033', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('356', '29', '昌吉', '0,1,29', '356,3034,3035,3036,3037,3038,3039,3040,3041', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('357', '29', '哈密', '0,1,29', '357,3042,3043,3044', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('358', '29', '和田', '0,1,29', '358,3045,3046,3047,3048,3049,3050,3051,3052', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('359', '29', '喀什', '0,1,29', '359,3053,3054,3055,3056,3057,3058,3059,3060,3061,3062,3063,3064', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('360', '29', '克拉玛依', '0,1,29', '360,3065', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('361', '29', '克孜勒苏', '0,1,29', '361,3066,3067,3068,3069', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('362', '29', '石河子', '0,1,29', '362,3070', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('363', '29', '图木舒克', '0,1,29', '363,3071', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('364', '29', '吐鲁番', '0,1,29', '364,3072,3073,3074', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('365', '29', '五家渠', '0,1,29', '365,3075', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('366', '29', '伊犁', '0,1,29', '366,3076,3077,3078,3079,3080,3081,3082,3083,3084,3085,3086,3087,3088,3089,3090,3091,3092,3093,3094,3095,3096,3097,3098,3099', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('367', '30', '昆明', '0,1,30', '367,3100,3101,3102,3103,3104,3105,3106,3107,3108,3109,3110,3111,3112,3113', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('368', '30', '怒江', '0,1,30', '368,3114,3115,3116,3117', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('369', '30', '普洱', '0,1,30', '369,3118,3119,3120,3121,3122,3123,3124,3125,3126,3127', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('370', '30', '丽江', '0,1,30', '370,3128,3129,3130,3131,3132', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('371', '30', '保山', '0,1,30', '371,3133,3134,3135,3136,3137', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('372', '30', '楚雄', '0,1,30', '372,3138,3139,3140,3141,3142,3143,3144,3145,3146,3147', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('373', '30', '大理', '0,1,30', '373,3148,3149,3150,3151,3152,3153,3154,3155,3156,3157,3158,3159', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('374', '30', '德宏', '0,1,30', '374,3160,3161,3162,3163,3164', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('375', '30', '迪庆', '0,1,30', '375,3165,3166,3167', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('376', '30', '红河', '0,1,30', '376,3168,3169,3170,3171,3172,3173,3174,3175,3176,3177,3178,3179,3180', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('377', '30', '临沧', '0,1,30', '377,3181,3182,3183,3184,3185,3186,3187,3188', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('378', '30', '曲靖', '0,1,30', '378,3189,3190,3191,3192,3193,3194,3195,3196,3197', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('379', '30', '文山', '0,1,30', '379,3198,3199,3200,3201,3202,3203,3204,3205', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('380', '30', '西双版纳', '0,1,30', '380,3206,3207,3208', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('381', '30', '玉溪', '0,1,30', '381,3209,3210,3211,3212,3213,3214,3215,3216,3217', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('382', '30', '昭通', '0,1,30', '382,3218,3219,3220,3221,3222,3223,3224,3225,3226,3227,3228', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('383', '31', '杭州', '0,1,31', '383,3229,3230,3231,3232,3233,3234,3235,3236,3237,3238,3239,3240,3241,3242', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('384', '31', '湖州', '0,1,31', '384,3243,3244,3245,3246,3247', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('385', '31', '嘉兴', '0,1,31', '385,3248,3249,3250,3251,3252,3253,3254', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('386', '31', '金华', '0,1,31', '386,3255,3256,3257,3258,3259,3260,3261,3262,3263,3264,3265,3266,3267,3268,3269', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('387', '31', '丽水', '0,1,31', '387,3270,3271,3272,3273,3274,3275,3276,3277,3278', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('388', '31', '宁波', '0,1,31', '388,3279,3280,3281,3282,3283,3284,3285,3286,3287,3288,3289', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('389', '31', '绍兴', '0,1,31', '389,3290,3291,3292,3293,3294,3295', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('390', '31', '台州', '0,1,31', '390,3296,3297,3298,3299,3300,3301,3302,3303,3304', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('391', '31', '温州', '0,1,31', '391,3305,3306,3307,3308,3309,3310,3311,3312,3313,3314,3315', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('392', '31', '舟山', '0,1,31', '392,3316,3317,3318,3319', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('393', '31', '衢州', '0,1,31', '393,3320,3321,3322,3323,3324', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('398', '36', '迎江区', '0,1,3,36', '398', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('399', '36', '大观区', '0,1,3,36', '399', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('400', '36', '宜秀区', '0,1,3,36', '400', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('401', '36', '桐城市', '0,1,3,36', '401', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('402', '36', '怀宁县', '0,1,3,36', '402', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('403', '36', '枞阳县', '0,1,3,36', '403', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('404', '36', '潜山县', '0,1,3,36', '404', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('405', '36', '太湖县', '0,1,3,36', '405', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('406', '36', '宿松县', '0,1,3,36', '406', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('407', '36', '望江县', '0,1,3,36', '407', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('408', '36', '岳西县', '0,1,3,36', '408', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('409', '37', '中市区', '0,1,3,37', '409', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('410', '37', '东市区', '0,1,3,37', '410', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('411', '37', '西市区', '0,1,3,37', '411', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('412', '37', '郊区', '0,1,3,37', '412', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('413', '37', '怀远县', '0,1,3,37', '413', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('414', '37', '五河县', '0,1,3,37', '414', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('415', '37', '固镇县', '0,1,3,37', '415', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('416', '38', '居巢区', '0,1,3,38', '416', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('417', '38', '庐江县', '0,1,3,38', '417', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('418', '38', '无为县', '0,1,3,38', '418', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('419', '38', '含山县', '0,1,3,38', '419', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('420', '38', '和县', '0,1,3,38', '420', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('421', '39', '贵池区', '0,1,3,39', '421', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('422', '39', '东至县', '0,1,3,39', '422', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('423', '39', '石台县', '0,1,3,39', '423', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('424', '39', '青阳县', '0,1,3,39', '424', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('425', '40', '琅琊区', '0,1,3,40', '425', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('426', '40', '南谯区', '0,1,3,40', '426', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('427', '40', '天长市', '0,1,3,40', '427', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('428', '40', '明光市', '0,1,3,40', '428', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('429', '40', '来安县', '0,1,3,40', '429', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('430', '40', '全椒县', '0,1,3,40', '430', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('431', '40', '定远县', '0,1,3,40', '431', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('432', '40', '凤阳县', '0,1,3,40', '432', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('433', '41', '蚌山区', '0,1,3,41', '433', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('434', '41', '龙子湖区', '0,1,3,41', '434', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('435', '41', '禹会区', '0,1,3,41', '435', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('436', '41', '淮上区', '0,1,3,41', '436', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('437', '41', '颍州区', '0,1,3,41', '437', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('438', '41', '颍东区', '0,1,3,41', '438', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('439', '41', '颍泉区', '0,1,3,41', '439', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('440', '41', '界首市', '0,1,3,41', '440', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('441', '41', '临泉县', '0,1,3,41', '441', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('442', '41', '太和县', '0,1,3,41', '442', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('443', '41', '阜南县', '0,1,3,41', '443', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('444', '41', '颖上县', '0,1,3,41', '444', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('445', '42', '相山区', '0,1,3,42', '445', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('446', '42', '杜集区', '0,1,3,42', '446', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('447', '42', '烈山区', '0,1,3,42', '447', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('448', '42', '濉溪县', '0,1,3,42', '448', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('449', '43', '田家庵区', '0,1,3,43', '449', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('450', '43', '大通区', '0,1,3,43', '450', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('451', '43', '谢家集区', '0,1,3,43', '451', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('452', '43', '八公山区', '0,1,3,43', '452', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('453', '43', '潘集区', '0,1,3,43', '453', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('454', '43', '凤台县', '0,1,3,43', '454', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('455', '44', '屯溪区', '0,1,3,44', '455', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('456', '44', '黄山区', '0,1,3,44', '456', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('457', '44', '徽州区', '0,1,3,44', '457', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('458', '44', '歙县', '0,1,3,44', '458', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('459', '44', '休宁县', '0,1,3,44', '459', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('460', '44', '黟县', '0,1,3,44', '460', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('461', '44', '祁门县', '0,1,3,44', '461', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('462', '45', '金安区', '0,1,3,45', '462', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('463', '45', '裕安区', '0,1,3,45', '463', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('464', '45', '寿县', '0,1,3,45', '464', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('465', '45', '霍邱县', '0,1,3,45', '465', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('466', '45', '舒城县', '0,1,3,45', '466', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('467', '45', '金寨县', '0,1,3,45', '467', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('468', '45', '霍山县', '0,1,3,45', '468', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('469', '46', '雨山区', '0,1,3,46', '469', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('470', '46', '花山区', '0,1,3,46', '470', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('471', '46', '金家庄区', '0,1,3,46', '471', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('472', '46', '当涂县', '0,1,3,46', '472', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('473', '47', '埇桥区', '0,1,3,47', '473', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('474', '47', '砀山县', '0,1,3,47', '474', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('475', '47', '萧县', '0,1,3,47', '475', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('476', '47', '灵璧县', '0,1,3,47', '476', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('477', '47', '泗县', '0,1,3,47', '477', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('478', '48', '铜官山区', '0,1,3,48', '478', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('479', '48', '狮子山区', '0,1,3,48', '479', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('480', '48', '郊区', '0,1,3,48', '480', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('481', '48', '铜陵县', '0,1,3,48', '481', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('482', '49', '镜湖区', '0,1,3,49', '482', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('483', '49', '弋江区', '0,1,3,49', '483', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('484', '49', '鸠江区', '0,1,3,49', '484', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('485', '49', '三山区', '0,1,3,49', '485', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('486', '49', '芜湖县', '0,1,3,49', '486', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('487', '49', '繁昌县', '0,1,3,49', '487', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('488', '49', '南陵县', '0,1,3,49', '488', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('489', '50', '宣州区', '0,1,3,50', '489', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('490', '50', '宁国市', '0,1,3,50', '490', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('491', '50', '郎溪县', '0,1,3,50', '491', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('492', '50', '广德县', '0,1,3,50', '492', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('493', '50', '泾县', '0,1,3,50', '493', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('494', '50', '绩溪县', '0,1,3,50', '494', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('495', '50', '旌德县', '0,1,3,50', '495', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('496', '51', '涡阳县', '0,1,3,51', '496', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('497', '51', '蒙城县', '0,1,3,51', '497', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('498', '51', '利辛县', '0,1,3,51', '498', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('499', '51', '谯城区', '0,1,3,51', '499', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('500', '2', '东城区', '0,1,2', '500', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('501', '2', '西城区', '0,1,2', '501', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('502', '2', '海淀区', '0,1,2', '502', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('503', '2', '朝阳区', '0,1,2', '503', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('504', '2', '崇文区', '0,1,2', '504', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('505', '2', '宣武区', '0,1,2', '505', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('506', '2', '丰台区', '0,1,2', '506', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('507', '2', '石景山区', '0,1,2', '507', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('508', '2', '房山区', '0,1,2', '508', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('509', '2', '门头沟区', '0,1,2', '509', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('510', '2', '通州区', '0,1,2', '510', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('511', '2', '顺义区', '0,1,2', '511', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('512', '2', '昌平区', '0,1,2', '512', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('513', '2', '怀柔区', '0,1,2', '513', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('514', '2', '平谷区', '0,1,2', '514', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('515', '2', '大兴区', '0,1,2', '515', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('516', '2', '密云县', '0,1,2', '516', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('517', '2', '延庆县', '0,1,2', '517', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('518', '53', '鼓楼区', '0,1,4,53', '518', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('519', '53', '台江区', '0,1,4,53', '519', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('520', '53', '仓山区', '0,1,4,53', '520', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('521', '53', '马尾区', '0,1,4,53', '521', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('522', '53', '晋安区', '0,1,4,53', '522', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('523', '53', '福清市', '0,1,4,53', '523', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('524', '53', '长乐市', '0,1,4,53', '524', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('525', '53', '闽侯县', '0,1,4,53', '525', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('526', '53', '连江县', '0,1,4,53', '526', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('527', '53', '罗源县', '0,1,4,53', '527', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('528', '53', '闽清县', '0,1,4,53', '528', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('529', '53', '永泰县', '0,1,4,53', '529', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('530', '53', '平潭县', '0,1,4,53', '530', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('531', '54', '新罗区', '0,1,4,54', '531', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('532', '54', '漳平市', '0,1,4,54', '532', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('533', '54', '长汀县', '0,1,4,54', '533', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('534', '54', '永定县', '0,1,4,54', '534', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('535', '54', '上杭县', '0,1,4,54', '535', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('536', '54', '武平县', '0,1,4,54', '536', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('537', '54', '连城县', '0,1,4,54', '537', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('538', '55', '延平区', '0,1,4,55', '538', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('539', '55', '邵武市', '0,1,4,55', '539', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('540', '55', '武夷山市', '0,1,4,55', '540', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('541', '55', '建瓯市', '0,1,4,55', '541', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('542', '55', '建阳市', '0,1,4,55', '542', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('543', '55', '顺昌县', '0,1,4,55', '543', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('544', '55', '浦城县', '0,1,4,55', '544', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('545', '55', '光泽县', '0,1,4,55', '545', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('546', '55', '松溪县', '0,1,4,55', '546', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('547', '55', '政和县', '0,1,4,55', '547', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('548', '56', '蕉城区', '0,1,4,56', '548', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('549', '56', '福安市', '0,1,4,56', '549', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('550', '56', '福鼎市', '0,1,4,56', '550', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('551', '56', '霞浦县', '0,1,4,56', '551', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('552', '56', '古田县', '0,1,4,56', '552', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('553', '56', '屏南县', '0,1,4,56', '553', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('554', '56', '寿宁县', '0,1,4,56', '554', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('555', '56', '周宁县', '0,1,4,56', '555', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('556', '56', '柘荣县', '0,1,4,56', '556', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('557', '57', '城厢区', '0,1,4,57', '557', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('558', '57', '涵江区', '0,1,4,57', '558', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('559', '57', '荔城区', '0,1,4,57', '559', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('560', '57', '秀屿区', '0,1,4,57', '560', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('561', '57', '仙游县', '0,1,4,57', '561', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('562', '58', '鲤城区', '0,1,4,58', '562', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('563', '58', '丰泽区', '0,1,4,58', '563', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('564', '58', '洛江区', '0,1,4,58', '564', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('565', '58', '清濛开发区', '0,1,4,58', '565', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('566', '58', '泉港区', '0,1,4,58', '566', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('567', '58', '石狮市', '0,1,4,58', '567', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('568', '58', '晋江市', '0,1,4,58', '568', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('569', '58', '南安市', '0,1,4,58', '569', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('570', '58', '惠安县', '0,1,4,58', '570', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('571', '58', '安溪县', '0,1,4,58', '571', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('572', '58', '永春县', '0,1,4,58', '572', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('573', '58', '德化县', '0,1,4,58', '573', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('574', '58', '金门县', '0,1,4,58', '574', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('575', '59', '梅列区', '0,1,4,59', '575', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('576', '59', '三元区', '0,1,4,59', '576', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('577', '59', '永安市', '0,1,4,59', '577', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('578', '59', '明溪县', '0,1,4,59', '578', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('579', '59', '清流县', '0,1,4,59', '579', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('580', '59', '宁化县', '0,1,4,59', '580', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('581', '59', '大田县', '0,1,4,59', '581', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('582', '59', '尤溪县', '0,1,4,59', '582', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('583', '59', '沙县', '0,1,4,59', '583', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('584', '59', '将乐县', '0,1,4,59', '584', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('585', '59', '泰宁县', '0,1,4,59', '585', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('586', '59', '建宁县', '0,1,4,59', '586', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('587', '60', '思明区', '0,1,4,60', '587', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('588', '60', '海沧区', '0,1,4,60', '588', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('589', '60', '湖里区', '0,1,4,60', '589', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('590', '60', '集美区', '0,1,4,60', '590', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('591', '60', '同安区', '0,1,4,60', '591', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('592', '60', '翔安区', '0,1,4,60', '592', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('593', '61', '芗城区', '0,1,4,61', '593', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('594', '61', '龙文区', '0,1,4,61', '594', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('595', '61', '龙海市', '0,1,4,61', '595', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('596', '61', '云霄县', '0,1,4,61', '596', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('597', '61', '漳浦县', '0,1,4,61', '597', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('598', '61', '诏安县', '0,1,4,61', '598', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('599', '61', '长泰县', '0,1,4,61', '599', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('600', '61', '东山县', '0,1,4,61', '600', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('601', '61', '南靖县', '0,1,4,61', '601', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('602', '61', '平和县', '0,1,4,61', '602', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('603', '61', '华安县', '0,1,4,61', '603', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('604', '62', '皋兰县', '0,1,5,62', '604', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('605', '62', '城关区', '0,1,5,62', '605', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('606', '62', '七里河区', '0,1,5,62', '606', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('607', '62', '西固区', '0,1,5,62', '607', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('608', '62', '安宁区', '0,1,5,62', '608', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('609', '62', '红古区', '0,1,5,62', '609', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('610', '62', '永登县', '0,1,5,62', '610', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('611', '62', '榆中县', '0,1,5,62', '611', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('612', '63', '白银区', '0,1,5,63', '612', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('613', '63', '平川区', '0,1,5,63', '613', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('614', '63', '会宁县', '0,1,5,63', '614', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('615', '63', '景泰县', '0,1,5,63', '615', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('616', '63', '靖远县', '0,1,5,63', '616', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('617', '64', '临洮县', '0,1,5,64', '617', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('618', '64', '陇西县', '0,1,5,64', '618', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('619', '64', '通渭县', '0,1,5,64', '619', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('620', '64', '渭源县', '0,1,5,64', '620', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('621', '64', '漳县', '0,1,5,64', '621', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('622', '64', '岷县', '0,1,5,64', '622', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('623', '64', '安定区', '0,1,5,64', '623', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('624', '64', '安定区', '0,1,5,64', '624', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('625', '65', '合作市', '0,1,5,65', '625', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('626', '65', '临潭县', '0,1,5,65', '626', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('627', '65', '卓尼县', '0,1,5,65', '627', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('628', '65', '舟曲县', '0,1,5,65', '628', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('629', '65', '迭部县', '0,1,5,65', '629', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('630', '65', '玛曲县', '0,1,5,65', '630', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('631', '65', '碌曲县', '0,1,5,65', '631', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('632', '65', '夏河县', '0,1,5,65', '632', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('633', '66', '嘉峪关市', '0,1,5,66', '633', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('634', '67', '金川区', '0,1,5,67', '634', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('635', '67', '永昌县', '0,1,5,67', '635', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('636', '68', '肃州区', '0,1,5,68', '636', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('637', '68', '玉门市', '0,1,5,68', '637', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('638', '68', '敦煌市', '0,1,5,68', '638', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('639', '68', '金塔县', '0,1,5,68', '639', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('640', '68', '瓜州县', '0,1,5,68', '640', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('641', '68', '肃北', '0,1,5,68', '641', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('642', '68', '阿克塞', '0,1,5,68', '642', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('643', '69', '临夏市', '0,1,5,69', '643', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('644', '69', '临夏县', '0,1,5,69', '644', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('645', '69', '康乐县', '0,1,5,69', '645', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('646', '69', '永靖县', '0,1,5,69', '646', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('647', '69', '广河县', '0,1,5,69', '647', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('648', '69', '和政县', '0,1,5,69', '648', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('649', '69', '东乡族自治县', '0,1,5,69', '649', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('650', '69', '积石山', '0,1,5,69', '650', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('651', '70', '成县', '0,1,5,70', '651', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('652', '70', '徽县', '0,1,5,70', '652', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('653', '70', '康县', '0,1,5,70', '653', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('654', '70', '礼县', '0,1,5,70', '654', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('655', '70', '两当县', '0,1,5,70', '655', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('656', '70', '文县', '0,1,5,70', '656', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('657', '70', '西和县', '0,1,5,70', '657', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('658', '70', '宕昌县', '0,1,5,70', '658', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('659', '70', '武都区', '0,1,5,70', '659', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('660', '71', '崇信县', '0,1,5,71', '660', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('661', '71', '华亭县', '0,1,5,71', '661', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('662', '71', '静宁县', '0,1,5,71', '662', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('663', '71', '灵台县', '0,1,5,71', '663', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('664', '71', '崆峒区', '0,1,5,71', '664', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('665', '71', '庄浪县', '0,1,5,71', '665', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('666', '71', '泾川县', '0,1,5,71', '666', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('667', '72', '合水县', '0,1,5,72', '667', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('668', '72', '华池县', '0,1,5,72', '668', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('669', '72', '环县', '0,1,5,72', '669', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('670', '72', '宁县', '0,1,5,72', '670', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('671', '72', '庆城县', '0,1,5,72', '671', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('672', '72', '西峰区', '0,1,5,72', '672', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('673', '72', '镇原县', '0,1,5,72', '673', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('674', '72', '正宁县', '0,1,5,72', '674', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('675', '73', '甘谷县', '0,1,5,73', '675', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('676', '73', '秦安县', '0,1,5,73', '676', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('677', '73', '清水县', '0,1,5,73', '677', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('678', '73', '秦州区', '0,1,5,73', '678', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('679', '73', '麦积区', '0,1,5,73', '679', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('680', '73', '武山县', '0,1,5,73', '680', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('681', '73', '张家川', '0,1,5,73', '681', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('682', '74', '古浪县', '0,1,5,74', '682', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('683', '74', '民勤县', '0,1,5,74', '683', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('684', '74', '天祝', '0,1,5,74', '684', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('685', '74', '凉州区', '0,1,5,74', '685', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('686', '75', '高台县', '0,1,5,75', '686', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('687', '75', '临泽县', '0,1,5,75', '687', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('688', '75', '民乐县', '0,1,5,75', '688', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('689', '75', '山丹县', '0,1,5,75', '689', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('690', '75', '肃南', '0,1,5,75', '690', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('691', '75', '甘州区', '0,1,5,75', '691', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('692', '76', '从化市', '0,1,6,76', '692', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('693', '76', '天河区', '0,1,6,76', '693', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('694', '76', '东山区', '0,1,6,76', '694', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('695', '76', '白云区', '0,1,6,76', '695', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('696', '76', '海珠区', '0,1,6,76', '696', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('697', '76', '荔湾区', '0,1,6,76', '697', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('698', '76', '越秀区', '0,1,6,76', '698', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('699', '76', '黄埔区', '0,1,6,76', '699', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('700', '76', '番禺区', '0,1,6,76', '700', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('701', '76', '花都区', '0,1,6,76', '701', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('702', '76', '增城区', '0,1,6,76', '702', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('703', '76', '从化区', '0,1,6,76', '703', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('704', '76', '市郊', '0,1,6,76', '704', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('705', '77', '福田区', '0,1,6,77', '705', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('706', '77', '罗湖区', '0,1,6,77', '706', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('707', '77', '南山区', '0,1,6,77', '707', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('708', '77', '宝安区', '0,1,6,77', '708', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('709', '77', '龙岗区', '0,1,6,77', '709', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('710', '77', '盐田区', '0,1,6,77', '710', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('711', '78', '湘桥区', '0,1,6,78', '711', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('712', '78', '潮安县', '0,1,6,78', '712', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('713', '78', '饶平县', '0,1,6,78', '713', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('714', '79', '南城区', '0,1,6,79', '714', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('715', '79', '东城区', '0,1,6,79', '715', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('716', '79', '万江区', '0,1,6,79', '716', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('717', '79', '莞城区', '0,1,6,79', '717', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('718', '79', '石龙镇', '0,1,6,79', '718', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('719', '79', '虎门镇', '0,1,6,79', '719', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('720', '79', '麻涌镇', '0,1,6,79', '720', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('721', '79', '道滘镇', '0,1,6,79', '721', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('722', '79', '石碣镇', '0,1,6,79', '722', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('723', '79', '沙田镇', '0,1,6,79', '723', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('724', '79', '望牛墩镇', '0,1,6,79', '724', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('725', '79', '洪梅镇', '0,1,6,79', '725', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('726', '79', '茶山镇', '0,1,6,79', '726', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('727', '79', '寮步镇', '0,1,6,79', '727', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('728', '79', '大岭山镇', '0,1,6,79', '728', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('729', '79', '大朗镇', '0,1,6,79', '729', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('730', '79', '黄江镇', '0,1,6,79', '730', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('731', '79', '樟木头', '0,1,6,79', '731', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('732', '79', '凤岗镇', '0,1,6,79', '732', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('733', '79', '塘厦镇', '0,1,6,79', '733', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('734', '79', '谢岗镇', '0,1,6,79', '734', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('735', '79', '厚街镇', '0,1,6,79', '735', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('736', '79', '清溪镇', '0,1,6,79', '736', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('737', '79', '常平镇', '0,1,6,79', '737', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('738', '79', '桥头镇', '0,1,6,79', '738', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('739', '79', '横沥镇', '0,1,6,79', '739', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('740', '79', '东坑镇', '0,1,6,79', '740', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('741', '79', '企石镇', '0,1,6,79', '741', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('742', '79', '石排镇', '0,1,6,79', '742', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('743', '79', '长安镇', '0,1,6,79', '743', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('744', '79', '中堂镇', '0,1,6,79', '744', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('745', '79', '高埗镇', '0,1,6,79', '745', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('746', '80', '禅城区', '0,1,6,80', '746', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('747', '80', '南海区', '0,1,6,80', '747', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('748', '80', '顺德区', '0,1,6,80', '748', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('749', '80', '三水区', '0,1,6,80', '749', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('750', '80', '高明区', '0,1,6,80', '750', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('751', '81', '东源县', '0,1,6,81', '751', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('752', '81', '和平县', '0,1,6,81', '752', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('753', '81', '源城区', '0,1,6,81', '753', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('754', '81', '连平县', '0,1,6,81', '754', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('755', '81', '龙川县', '0,1,6,81', '755', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('756', '81', '紫金县', '0,1,6,81', '756', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('757', '82', '惠阳区', '0,1,6,82', '757', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('758', '82', '惠城区', '0,1,6,82', '758', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('759', '82', '大亚湾', '0,1,6,82', '759', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('760', '82', '博罗县', '0,1,6,82', '760', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('761', '82', '惠东县', '0,1,6,82', '761', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('762', '82', '龙门县', '0,1,6,82', '762', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('763', '83', '江海区', '0,1,6,83', '763', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('764', '83', '蓬江区', '0,1,6,83', '764', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('765', '83', '新会区', '0,1,6,83', '765', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('766', '83', '台山市', '0,1,6,83', '766', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('767', '83', '开平市', '0,1,6,83', '767', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('768', '83', '鹤山市', '0,1,6,83', '768', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('769', '83', '恩平市', '0,1,6,83', '769', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('770', '84', '榕城区', '0,1,6,84', '770', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('771', '84', '普宁市', '0,1,6,84', '771', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('772', '84', '揭东县', '0,1,6,84', '772', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('773', '84', '揭西县', '0,1,6,84', '773', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('774', '84', '惠来县', '0,1,6,84', '774', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('775', '85', '茂南区', '0,1,6,85', '775', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('776', '85', '茂港区', '0,1,6,85', '776', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('777', '85', '高州市', '0,1,6,85', '777', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('778', '85', '化州市', '0,1,6,85', '778', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('779', '85', '信宜市', '0,1,6,85', '779', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('780', '85', '电白县', '0,1,6,85', '780', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('781', '86', '梅县', '0,1,6,86', '781', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('782', '86', '梅江区', '0,1,6,86', '782', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('783', '86', '兴宁市', '0,1,6,86', '783', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('784', '86', '大埔县', '0,1,6,86', '784', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('785', '86', '丰顺县', '0,1,6,86', '785', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('786', '86', '五华县', '0,1,6,86', '786', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('787', '86', '平远县', '0,1,6,86', '787', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('788', '86', '蕉岭县', '0,1,6,86', '788', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('789', '87', '清城区', '0,1,6,87', '789', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('790', '87', '英德市', '0,1,6,87', '790', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('791', '87', '连州市', '0,1,6,87', '791', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('792', '87', '佛冈县', '0,1,6,87', '792', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('793', '87', '阳山县', '0,1,6,87', '793', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('794', '87', '清新县', '0,1,6,87', '794', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('795', '87', '连山', '0,1,6,87', '795', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('796', '87', '连南', '0,1,6,87', '796', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('797', '88', '南澳县', '0,1,6,88', '797', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('798', '88', '潮阳区', '0,1,6,88', '798', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('799', '88', '澄海区', '0,1,6,88', '799', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('800', '88', '龙湖区', '0,1,6,88', '800', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('801', '88', '金平区', '0,1,6,88', '801', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('802', '88', '濠江区', '0,1,6,88', '802', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('803', '88', '潮南区', '0,1,6,88', '803', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('804', '89', '城区', '0,1,6,89', '804', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('805', '89', '陆丰市', '0,1,6,89', '805', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('806', '89', '海丰县', '0,1,6,89', '806', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('807', '89', '陆河县', '0,1,6,89', '807', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('808', '90', '曲江县', '0,1,6,90', '808', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('809', '90', '浈江区', '0,1,6,90', '809', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('810', '90', '武江区', '0,1,6,90', '810', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('811', '90', '曲江区', '0,1,6,90', '811', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('812', '90', '乐昌市', '0,1,6,90', '812', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('813', '90', '南雄市', '0,1,6,90', '813', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('814', '90', '始兴县', '0,1,6,90', '814', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('815', '90', '仁化县', '0,1,6,90', '815', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('816', '90', '翁源县', '0,1,6,90', '816', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('817', '90', '新丰县', '0,1,6,90', '817', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('818', '90', '乳源', '0,1,6,90', '818', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('819', '91', '江城区', '0,1,6,91', '819', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('820', '91', '阳春市', '0,1,6,91', '820', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('821', '91', '阳西县', '0,1,6,91', '821', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('822', '91', '阳东县', '0,1,6,91', '822', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('823', '92', '云城区', '0,1,6,92', '823', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('824', '92', '罗定市', '0,1,6,92', '824', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('825', '92', '新兴县', '0,1,6,92', '825', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('826', '92', '郁南县', '0,1,6,92', '826', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('827', '92', '云安县', '0,1,6,92', '827', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('828', '93', '赤坎区', '0,1,6,93', '828', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('829', '93', '霞山区', '0,1,6,93', '829', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('830', '93', '坡头区', '0,1,6,93', '830', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('831', '93', '麻章区', '0,1,6,93', '831', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('832', '93', '廉江市', '0,1,6,93', '832', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('833', '93', '雷州市', '0,1,6,93', '833', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('834', '93', '吴川市', '0,1,6,93', '834', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('835', '93', '遂溪县', '0,1,6,93', '835', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('836', '93', '徐闻县', '0,1,6,93', '836', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('837', '94', '肇庆市', '0,1,6,94', '837', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('838', '94', '高要市', '0,1,6,94', '838', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('839', '94', '四会市', '0,1,6,94', '839', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('840', '94', '广宁县', '0,1,6,94', '840', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('841', '94', '怀集县', '0,1,6,94', '841', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('842', '94', '封开县', '0,1,6,94', '842', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('843', '94', '德庆县', '0,1,6,94', '843', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('844', '95', '石岐街道', '0,1,6,95', '844', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('845', '95', '东区街道', '0,1,6,95', '845', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('846', '95', '西区街道', '0,1,6,95', '846', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('847', '95', '环城街道', '0,1,6,95', '847', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('848', '95', '中山港街道', '0,1,6,95', '848', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('849', '95', '五桂山街道', '0,1,6,95', '849', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('850', '96', '香洲区', '0,1,6,96', '850', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('851', '96', '斗门区', '0,1,6,96', '851', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('852', '96', '金湾区', '0,1,6,96', '852', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('853', '97', '邕宁区', '0,1,7,97', '853', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('854', '97', '青秀区', '0,1,7,97', '854', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('855', '97', '兴宁区', '0,1,7,97', '855', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('856', '97', '良庆区', '0,1,7,97', '856', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('857', '97', '西乡塘区', '0,1,7,97', '857', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('858', '97', '江南区', '0,1,7,97', '858', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('859', '97', '武鸣县', '0,1,7,97', '859', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('860', '97', '隆安县', '0,1,7,97', '860', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('861', '97', '马山县', '0,1,7,97', '861', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('862', '97', '上林县', '0,1,7,97', '862', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('863', '97', '宾阳县', '0,1,7,97', '863', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('864', '97', '横县', '0,1,7,97', '864', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('865', '98', '秀峰区', '0,1,7,98', '865', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('866', '98', '叠彩区', '0,1,7,98', '866', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('867', '98', '象山区', '0,1,7,98', '867', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('868', '98', '七星区', '0,1,7,98', '868', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('869', '98', '雁山区', '0,1,7,98', '869', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('870', '98', '阳朔县', '0,1,7,98', '870', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('871', '98', '临桂县', '0,1,7,98', '871', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('872', '98', '灵川县', '0,1,7,98', '872', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('873', '98', '全州县', '0,1,7,98', '873', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('874', '98', '平乐县', '0,1,7,98', '874', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('875', '98', '兴安县', '0,1,7,98', '875', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('876', '98', '灌阳县', '0,1,7,98', '876', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('877', '98', '荔浦县', '0,1,7,98', '877', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('878', '98', '资源县', '0,1,7,98', '878', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('879', '98', '永福县', '0,1,7,98', '879', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('880', '98', '龙胜', '0,1,7,98', '880', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('881', '98', '恭城', '0,1,7,98', '881', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('882', '99', '右江区', '0,1,7,99', '882', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('883', '99', '凌云县', '0,1,7,99', '883', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('884', '99', '平果县', '0,1,7,99', '884', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('885', '99', '西林县', '0,1,7,99', '885', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('886', '99', '乐业县', '0,1,7,99', '886', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('887', '99', '德保县', '0,1,7,99', '887', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('888', '99', '田林县', '0,1,7,99', '888', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('889', '99', '田阳县', '0,1,7,99', '889', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('890', '99', '靖西县', '0,1,7,99', '890', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('891', '99', '田东县', '0,1,7,99', '891', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('892', '99', '那坡县', '0,1,7,99', '892', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('893', '99', '隆林', '0,1,7,99', '893', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('894', '100', '海城区', '0,1,7,100', '894', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('895', '100', '银海区', '0,1,7,100', '895', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('896', '100', '铁山港区', '0,1,7,100', '896', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('897', '100', '合浦县', '0,1,7,100', '897', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('898', '101', '江州区', '0,1,7,101', '898', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('899', '101', '凭祥市', '0,1,7,101', '899', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('900', '101', '宁明县', '0,1,7,101', '900', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('901', '101', '扶绥县', '0,1,7,101', '901', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('902', '101', '龙州县', '0,1,7,101', '902', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('903', '101', '大新县', '0,1,7,101', '903', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('904', '101', '天等县', '0,1,7,101', '904', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('905', '102', '港口区', '0,1,7,102', '905', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('906', '102', '防城区', '0,1,7,102', '906', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('907', '102', '东兴市', '0,1,7,102', '907', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('908', '102', '上思县', '0,1,7,102', '908', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('909', '103', '港北区', '0,1,7,103', '909', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('910', '103', '港南区', '0,1,7,103', '910', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('911', '103', '覃塘区', '0,1,7,103', '911', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('912', '103', '桂平市', '0,1,7,103', '912', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('913', '103', '平南县', '0,1,7,103', '913', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('914', '104', '金城江区', '0,1,7,104', '914', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('915', '104', '宜州市', '0,1,7,104', '915', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('916', '104', '天峨县', '0,1,7,104', '916', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('917', '104', '凤山县', '0,1,7,104', '917', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('918', '104', '南丹县', '0,1,7,104', '918', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('919', '104', '东兰县', '0,1,7,104', '919', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('920', '104', '都安', '0,1,7,104', '920', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('921', '104', '罗城', '0,1,7,104', '921', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('922', '104', '巴马', '0,1,7,104', '922', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('923', '104', '环江', '0,1,7,104', '923', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('924', '104', '大化', '0,1,7,104', '924', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('925', '105', '八步区', '0,1,7,105', '925', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('926', '105', '钟山县', '0,1,7,105', '926', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('927', '105', '昭平县', '0,1,7,105', '927', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('928', '105', '富川', '0,1,7,105', '928', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('929', '106', '兴宾区', '0,1,7,106', '929', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('930', '106', '合山市', '0,1,7,106', '930', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('931', '106', '象州县', '0,1,7,106', '931', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('932', '106', '武宣县', '0,1,7,106', '932', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('933', '106', '忻城县', '0,1,7,106', '933', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('934', '106', '金秀', '0,1,7,106', '934', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('935', '107', '城中区', '0,1,7,107', '935', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('936', '107', '鱼峰区', '0,1,7,107', '936', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('937', '107', '柳北区', '0,1,7,107', '937', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('938', '107', '柳南区', '0,1,7,107', '938', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('939', '107', '柳江县', '0,1,7,107', '939', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('940', '107', '柳城县', '0,1,7,107', '940', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('941', '107', '鹿寨县', '0,1,7,107', '941', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('942', '107', '融安县', '0,1,7,107', '942', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('943', '107', '融水', '0,1,7,107', '943', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('944', '107', '三江', '0,1,7,107', '944', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('945', '108', '钦南区', '0,1,7,108', '945', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('946', '108', '钦北区', '0,1,7,108', '946', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('947', '108', '灵山县', '0,1,7,108', '947', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('948', '108', '浦北县', '0,1,7,108', '948', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('949', '109', '万秀区', '0,1,7,109', '949', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('950', '109', '蝶山区', '0,1,7,109', '950', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('951', '109', '长洲区', '0,1,7,109', '951', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('952', '109', '岑溪市', '0,1,7,109', '952', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('953', '109', '苍梧县', '0,1,7,109', '953', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('954', '109', '藤县', '0,1,7,109', '954', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('955', '109', '蒙山县', '0,1,7,109', '955', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('956', '110', '玉州区', '0,1,7,110', '956', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('957', '110', '北流市', '0,1,7,110', '957', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('958', '110', '容县', '0,1,7,110', '958', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('959', '110', '陆川县', '0,1,7,110', '959', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('960', '110', '博白县', '0,1,7,110', '960', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('961', '110', '兴业县', '0,1,7,110', '961', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('962', '111', '南明区', '0,1,8,111', '962', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('963', '111', '云岩区', '0,1,8,111', '963', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('964', '111', '花溪区', '0,1,8,111', '964', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('965', '111', '乌当区', '0,1,8,111', '965', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('966', '111', '白云区', '0,1,8,111', '966', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('967', '111', '小河区', '0,1,8,111', '967', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('968', '111', '金阳新区', '0,1,8,111', '968', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('969', '111', '新天园区', '0,1,8,111', '969', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('970', '111', '清镇市', '0,1,8,111', '970', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('971', '111', '开阳县', '0,1,8,111', '971', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('972', '111', '修文县', '0,1,8,111', '972', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('973', '111', '息烽县', '0,1,8,111', '973', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('974', '112', '西秀区', '0,1,8,112', '974', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('975', '112', '关岭', '0,1,8,112', '975', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('976', '112', '镇宁', '0,1,8,112', '976', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('977', '112', '紫云', '0,1,8,112', '977', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('978', '112', '平坝县', '0,1,8,112', '978', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('979', '112', '普定县', '0,1,8,112', '979', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('980', '113', '毕节市', '0,1,8,113', '980', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('981', '113', '大方县', '0,1,8,113', '981', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('982', '113', '黔西县', '0,1,8,113', '982', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('983', '113', '金沙县', '0,1,8,113', '983', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('984', '113', '织金县', '0,1,8,113', '984', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('985', '113', '纳雍县', '0,1,8,113', '985', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('986', '113', '赫章县', '0,1,8,113', '986', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('987', '113', '威宁', '0,1,8,113', '987', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('988', '114', '钟山区', '0,1,8,114', '988', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('989', '114', '六枝特区', '0,1,8,114', '989', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('990', '114', '水城县', '0,1,8,114', '990', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('991', '114', '盘县', '0,1,8,114', '991', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('992', '115', '凯里市', '0,1,8,115', '992', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('993', '115', '黄平县', '0,1,8,115', '993', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('994', '115', '施秉县', '0,1,8,115', '994', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('995', '115', '三穗县', '0,1,8,115', '995', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('996', '115', '镇远县', '0,1,8,115', '996', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('997', '115', '岑巩县', '0,1,8,115', '997', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('998', '115', '天柱县', '0,1,8,115', '998', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('999', '115', '锦屏县', '0,1,8,115', '999', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1000', '115', '剑河县', '0,1,8,115', '1000', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1001', '115', '台江县', '0,1,8,115', '1001', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1002', '115', '黎平县', '0,1,8,115', '1002', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1003', '115', '榕江县', '0,1,8,115', '1003', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1004', '115', '从江县', '0,1,8,115', '1004', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1005', '115', '雷山县', '0,1,8,115', '1005', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1006', '115', '麻江县', '0,1,8,115', '1006', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1007', '115', '丹寨县', '0,1,8,115', '1007', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1008', '116', '都匀市', '0,1,8,116', '1008', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1009', '116', '福泉市', '0,1,8,116', '1009', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1010', '116', '荔波县', '0,1,8,116', '1010', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1011', '116', '贵定县', '0,1,8,116', '1011', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1012', '116', '瓮安县', '0,1,8,116', '1012', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1013', '116', '独山县', '0,1,8,116', '1013', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1014', '116', '平塘县', '0,1,8,116', '1014', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1015', '116', '罗甸县', '0,1,8,116', '1015', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1016', '116', '长顺县', '0,1,8,116', '1016', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1017', '116', '龙里县', '0,1,8,116', '1017', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1018', '116', '惠水县', '0,1,8,116', '1018', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1019', '116', '三都', '0,1,8,116', '1019', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1020', '117', '兴义市', '0,1,8,117', '1020', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1021', '117', '兴仁县', '0,1,8,117', '1021', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1022', '117', '普安县', '0,1,8,117', '1022', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1023', '117', '晴隆县', '0,1,8,117', '1023', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1024', '117', '贞丰县', '0,1,8,117', '1024', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1025', '117', '望谟县', '0,1,8,117', '1025', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1026', '117', '册亨县', '0,1,8,117', '1026', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1027', '117', '安龙县', '0,1,8,117', '1027', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1028', '118', '铜仁市', '0,1,8,118', '1028', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1029', '118', '江口县', '0,1,8,118', '1029', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1030', '118', '石阡县', '0,1,8,118', '1030', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1031', '118', '思南县', '0,1,8,118', '1031', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1032', '118', '德江县', '0,1,8,118', '1032', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1033', '118', '玉屏', '0,1,8,118', '1033', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1034', '118', '印江', '0,1,8,118', '1034', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1035', '118', '沿河', '0,1,8,118', '1035', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1036', '118', '松桃', '0,1,8,118', '1036', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1037', '118', '万山特区', '0,1,8,118', '1037', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1038', '119', '红花岗区', '0,1,8,119', '1038', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1039', '119', '务川县', '0,1,8,119', '1039', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1040', '119', '道真县', '0,1,8,119', '1040', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1041', '119', '汇川区', '0,1,8,119', '1041', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1042', '119', '赤水市', '0,1,8,119', '1042', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1043', '119', '仁怀市', '0,1,8,119', '1043', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1044', '119', '遵义县', '0,1,8,119', '1044', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1045', '119', '桐梓县', '0,1,8,119', '1045', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1046', '119', '绥阳县', '0,1,8,119', '1046', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1047', '119', '正安县', '0,1,8,119', '1047', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1048', '119', '凤冈县', '0,1,8,119', '1048', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1049', '119', '湄潭县', '0,1,8,119', '1049', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1050', '119', '余庆县', '0,1,8,119', '1050', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1051', '119', '习水县', '0,1,8,119', '1051', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1052', '119', '道真', '0,1,8,119', '1052', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1053', '119', '务川', '0,1,8,119', '1053', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1054', '120', '秀英区', '0,1,9,120', '1054', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1055', '120', '龙华区', '0,1,9,120', '1055', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1056', '120', '琼山区', '0,1,9,120', '1056', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1057', '120', '美兰区', '0,1,9,120', '1057', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1058', '137', '市区', '0,1,9,137', '1058', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1059', '137', '洋浦开发区', '0,1,9,137', '1059', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1060', '137', '那大镇', '0,1,9,137', '1060', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1061', '137', '王五镇', '0,1,9,137', '1061', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1062', '137', '雅星镇', '0,1,9,137', '1062', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1063', '137', '大成镇', '0,1,9,137', '1063', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1064', '137', '中和镇', '0,1,9,137', '1064', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1065', '137', '峨蔓镇', '0,1,9,137', '1065', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1066', '137', '南丰镇', '0,1,9,137', '1066', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1067', '137', '白马井镇', '0,1,9,137', '1067', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1068', '137', '兰洋镇', '0,1,9,137', '1068', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1069', '137', '和庆镇', '0,1,9,137', '1069', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1070', '137', '海头镇', '0,1,9,137', '1070', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1071', '137', '排浦镇', '0,1,9,137', '1071', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1072', '137', '东成镇', '0,1,9,137', '1072', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1073', '137', '光村镇', '0,1,9,137', '1073', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1074', '137', '木棠镇', '0,1,9,137', '1074', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1075', '137', '新州镇', '0,1,9,137', '1075', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1076', '137', '三都镇', '0,1,9,137', '1076', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1077', '137', '其他', '0,1,9,137', '1077', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1078', '138', '长安区', '0,1,10,138', '1078', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1079', '138', '桥东区', '0,1,10,138', '1079', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1080', '138', '桥西区', '0,1,10,138', '1080', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1081', '138', '新华区', '0,1,10,138', '1081', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1082', '138', '裕华区', '0,1,10,138', '1082', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1083', '138', '井陉矿区', '0,1,10,138', '1083', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1084', '138', '高新区', '0,1,10,138', '1084', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1085', '138', '辛集市', '0,1,10,138', '1085', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1086', '138', '藁城市', '0,1,10,138', '1086', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1087', '138', '晋州市', '0,1,10,138', '1087', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1088', '138', '新乐市', '0,1,10,138', '1088', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1089', '138', '鹿泉市', '0,1,10,138', '1089', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1090', '138', '井陉县', '0,1,10,138', '1090', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1091', '138', '正定县', '0,1,10,138', '1091', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1092', '138', '栾城县', '0,1,10,138', '1092', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1093', '138', '行唐县', '0,1,10,138', '1093', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1094', '138', '灵寿县', '0,1,10,138', '1094', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1095', '138', '高邑县', '0,1,10,138', '1095', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1096', '138', '深泽县', '0,1,10,138', '1096', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1097', '138', '赞皇县', '0,1,10,138', '1097', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1098', '138', '无极县', '0,1,10,138', '1098', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1099', '138', '平山县', '0,1,10,138', '1099', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1100', '138', '元氏县', '0,1,10,138', '1100', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1101', '138', '赵县', '0,1,10,138', '1101', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1102', '139', '新市区', '0,1,10,139', '1102', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1103', '139', '南市区', '0,1,10,139', '1103', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1104', '139', '北市区', '0,1,10,139', '1104', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1105', '139', '涿州市', '0,1,10,139', '1105', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1106', '139', '定州市', '0,1,10,139', '1106', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1107', '139', '安国市', '0,1,10,139', '1107', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1108', '139', '高碑店市', '0,1,10,139', '1108', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1109', '139', '满城县', '0,1,10,139', '1109', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1110', '139', '清苑县', '0,1,10,139', '1110', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1111', '139', '涞水县', '0,1,10,139', '1111', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1112', '139', '阜平县', '0,1,10,139', '1112', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1113', '139', '徐水县', '0,1,10,139', '1113', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1114', '139', '定兴县', '0,1,10,139', '1114', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1115', '139', '唐县', '0,1,10,139', '1115', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1116', '139', '高阳县', '0,1,10,139', '1116', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1117', '139', '容城县', '0,1,10,139', '1117', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1118', '139', '涞源县', '0,1,10,139', '1118', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1119', '139', '望都县', '0,1,10,139', '1119', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1120', '139', '安新县', '0,1,10,139', '1120', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1121', '139', '易县', '0,1,10,139', '1121', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1122', '139', '曲阳县', '0,1,10,139', '1122', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1123', '139', '蠡县', '0,1,10,139', '1123', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1124', '139', '顺平县', '0,1,10,139', '1124', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1125', '139', '博野县', '0,1,10,139', '1125', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1126', '139', '雄县', '0,1,10,139', '1126', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1127', '140', '运河区', '0,1,10,140', '1127', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1128', '140', '新华区', '0,1,10,140', '1128', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1129', '140', '泊头市', '0,1,10,140', '1129', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1130', '140', '任丘市', '0,1,10,140', '1130', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1131', '140', '黄骅市', '0,1,10,140', '1131', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1132', '140', '河间市', '0,1,10,140', '1132', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1133', '140', '沧县', '0,1,10,140', '1133', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1134', '140', '青县', '0,1,10,140', '1134', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1135', '140', '东光县', '0,1,10,140', '1135', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1136', '140', '海兴县', '0,1,10,140', '1136', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1137', '140', '盐山县', '0,1,10,140', '1137', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1138', '140', '肃宁县', '0,1,10,140', '1138', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1139', '140', '南皮县', '0,1,10,140', '1139', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1140', '140', '吴桥县', '0,1,10,140', '1140', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1141', '140', '献县', '0,1,10,140', '1141', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1142', '140', '孟村', '0,1,10,140', '1142', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1143', '141', '双桥区', '0,1,10,141', '1143', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1144', '141', '双滦区', '0,1,10,141', '1144', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1145', '141', '鹰手营子矿区', '0,1,10,141', '1145', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1146', '141', '承德县', '0,1,10,141', '1146', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1147', '141', '兴隆县', '0,1,10,141', '1147', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1148', '141', '平泉县', '0,1,10,141', '1148', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1149', '141', '滦平县', '0,1,10,141', '1149', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1150', '141', '隆化县', '0,1,10,141', '1150', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1151', '141', '丰宁', '0,1,10,141', '1151', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1152', '141', '宽城', '0,1,10,141', '1152', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1153', '141', '围场', '0,1,10,141', '1153', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1154', '142', '从台区', '0,1,10,142', '1154', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1155', '142', '复兴区', '0,1,10,142', '1155', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1156', '142', '邯山区', '0,1,10,142', '1156', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1157', '142', '峰峰矿区', '0,1,10,142', '1157', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1158', '142', '武安市', '0,1,10,142', '1158', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1159', '142', '邯郸县', '0,1,10,142', '1159', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1160', '142', '临漳县', '0,1,10,142', '1160', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1161', '142', '成安县', '0,1,10,142', '1161', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1162', '142', '大名县', '0,1,10,142', '1162', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1163', '142', '涉县', '0,1,10,142', '1163', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1164', '142', '磁县', '0,1,10,142', '1164', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1165', '142', '肥乡县', '0,1,10,142', '1165', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1166', '142', '永年县', '0,1,10,142', '1166', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1167', '142', '邱县', '0,1,10,142', '1167', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1168', '142', '鸡泽县', '0,1,10,142', '1168', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1169', '142', '广平县', '0,1,10,142', '1169', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1170', '142', '馆陶县', '0,1,10,142', '1170', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1171', '142', '魏县', '0,1,10,142', '1171', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1172', '142', '曲周县', '0,1,10,142', '1172', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1173', '143', '桃城区', '0,1,10,143', '1173', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1174', '143', '冀州市', '0,1,10,143', '1174', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1175', '143', '深州市', '0,1,10,143', '1175', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1176', '143', '枣强县', '0,1,10,143', '1176', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1177', '143', '武邑县', '0,1,10,143', '1177', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1178', '143', '武强县', '0,1,10,143', '1178', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1179', '143', '饶阳县', '0,1,10,143', '1179', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1180', '143', '安平县', '0,1,10,143', '1180', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1181', '143', '故城县', '0,1,10,143', '1181', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1182', '143', '景县', '0,1,10,143', '1182', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1183', '143', '阜城县', '0,1,10,143', '1183', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1184', '144', '安次区', '0,1,10,144', '1184', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1185', '144', '广阳区', '0,1,10,144', '1185', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1186', '144', '霸州市', '0,1,10,144', '1186', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1187', '144', '三河市', '0,1,10,144', '1187', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1188', '144', '固安县', '0,1,10,144', '1188', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1189', '144', '永清县', '0,1,10,144', '1189', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1190', '144', '香河县', '0,1,10,144', '1190', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1191', '144', '大城县', '0,1,10,144', '1191', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1192', '144', '文安县', '0,1,10,144', '1192', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1193', '144', '大厂', '0,1,10,144', '1193', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1194', '145', '海港区', '0,1,10,145', '1194', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1195', '145', '山海关区', '0,1,10,145', '1195', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1196', '145', '北戴河区', '0,1,10,145', '1196', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1197', '145', '昌黎县', '0,1,10,145', '1197', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1198', '145', '抚宁县', '0,1,10,145', '1198', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1199', '145', '卢龙县', '0,1,10,145', '1199', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1200', '145', '青龙', '0,1,10,145', '1200', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1201', '146', '路北区', '0,1,10,146', '1201', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1202', '146', '路南区', '0,1,10,146', '1202', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1203', '146', '古冶区', '0,1,10,146', '1203', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1204', '146', '开平区', '0,1,10,146', '1204', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1205', '146', '丰南区', '0,1,10,146', '1205', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1206', '146', '丰润区', '0,1,10,146', '1206', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1207', '146', '遵化市', '0,1,10,146', '1207', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1208', '146', '迁安市', '0,1,10,146', '1208', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1209', '146', '滦县', '0,1,10,146', '1209', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1210', '146', '滦南县', '0,1,10,146', '1210', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1211', '146', '乐亭县', '0,1,10,146', '1211', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1212', '146', '迁西县', '0,1,10,146', '1212', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1213', '146', '玉田县', '0,1,10,146', '1213', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1214', '146', '唐海县', '0,1,10,146', '1214', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1215', '147', '桥东区', '0,1,10,147', '1215', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1216', '147', '桥西区', '0,1,10,147', '1216', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1217', '147', '南宫市', '0,1,10,147', '1217', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1218', '147', '沙河市', '0,1,10,147', '1218', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1219', '147', '邢台县', '0,1,10,147', '1219', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1220', '147', '临城县', '0,1,10,147', '1220', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1221', '147', '内丘县', '0,1,10,147', '1221', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1222', '147', '柏乡县', '0,1,10,147', '1222', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1223', '147', '隆尧县', '0,1,10,147', '1223', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1224', '147', '任县', '0,1,10,147', '1224', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1225', '147', '南和县', '0,1,10,147', '1225', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1226', '147', '宁晋县', '0,1,10,147', '1226', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1227', '147', '巨鹿县', '0,1,10,147', '1227', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1228', '147', '新河县', '0,1,10,147', '1228', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1229', '147', '广宗县', '0,1,10,147', '1229', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1230', '147', '平乡县', '0,1,10,147', '1230', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1231', '147', '威县', '0,1,10,147', '1231', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1232', '147', '清河县', '0,1,10,147', '1232', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1233', '147', '临西县', '0,1,10,147', '1233', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1234', '148', '桥西区', '0,1,10,148', '1234', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1235', '148', '桥东区', '0,1,10,148', '1235', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1236', '148', '宣化区', '0,1,10,148', '1236', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1237', '148', '下花园区', '0,1,10,148', '1237', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1238', '148', '宣化县', '0,1,10,148', '1238', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1239', '148', '张北县', '0,1,10,148', '1239', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1240', '148', '康保县', '0,1,10,148', '1240', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1241', '148', '沽源县', '0,1,10,148', '1241', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1242', '148', '尚义县', '0,1,10,148', '1242', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1243', '148', '蔚县', '0,1,10,148', '1243', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1244', '148', '阳原县', '0,1,10,148', '1244', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1245', '148', '怀安县', '0,1,10,148', '1245', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1246', '148', '万全县', '0,1,10,148', '1246', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1247', '148', '怀来县', '0,1,10,148', '1247', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1248', '148', '涿鹿县', '0,1,10,148', '1248', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1249', '148', '赤城县', '0,1,10,148', '1249', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1250', '148', '崇礼县', '0,1,10,148', '1250', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1251', '149', '金水区', '0,1,11,149', '1251', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1252', '149', '邙山区', '0,1,11,149', '1252', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1253', '149', '二七区', '0,1,11,149', '1253', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1254', '149', '管城区', '0,1,11,149', '1254', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1255', '149', '中原区', '0,1,11,149', '1255', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1256', '149', '上街区', '0,1,11,149', '1256', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1257', '149', '惠济区', '0,1,11,149', '1257', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1258', '149', '郑东新区', '0,1,11,149', '1258', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1259', '149', '经济技术开发区', '0,1,11,149', '1259', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1260', '149', '高新开发区', '0,1,11,149', '1260', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1261', '149', '出口加工区', '0,1,11,149', '1261', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1262', '149', '巩义市', '0,1,11,149', '1262', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1263', '149', '荥阳市', '0,1,11,149', '1263', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1264', '149', '新密市', '0,1,11,149', '1264', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1265', '149', '新郑市', '0,1,11,149', '1265', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1266', '149', '登封市', '0,1,11,149', '1266', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1267', '149', '中牟县', '0,1,11,149', '1267', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1268', '150', '西工区', '0,1,11,150', '1268', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1269', '150', '老城区', '0,1,11,150', '1269', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1270', '150', '涧西区', '0,1,11,150', '1270', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1271', '150', '瀍河回族区', '0,1,11,150', '1271', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1272', '150', '洛龙区', '0,1,11,150', '1272', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1273', '150', '吉利区', '0,1,11,150', '1273', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1274', '150', '偃师市', '0,1,11,150', '1274', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1275', '150', '孟津县', '0,1,11,150', '1275', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1276', '150', '新安县', '0,1,11,150', '1276', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1277', '150', '栾川县', '0,1,11,150', '1277', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1278', '150', '嵩县', '0,1,11,150', '1278', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1279', '150', '汝阳县', '0,1,11,150', '1279', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1280', '150', '宜阳县', '0,1,11,150', '1280', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1281', '150', '洛宁县', '0,1,11,150', '1281', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1282', '150', '伊川县', '0,1,11,150', '1282', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1283', '151', '鼓楼区', '0,1,11,151', '1283', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1284', '151', '龙亭区', '0,1,11,151', '1284', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1285', '151', '顺河回族区', '0,1,11,151', '1285', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1286', '151', '金明区', '0,1,11,151', '1286', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1287', '151', '禹王台区', '0,1,11,151', '1287', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1288', '151', '杞县', '0,1,11,151', '1288', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1289', '151', '通许县', '0,1,11,151', '1289', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1290', '151', '尉氏县', '0,1,11,151', '1290', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1291', '151', '开封县', '0,1,11,151', '1291', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1292', '151', '兰考县', '0,1,11,151', '1292', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1293', '152', '北关区', '0,1,11,152', '1293', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1294', '152', '文峰区', '0,1,11,152', '1294', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1295', '152', '殷都区', '0,1,11,152', '1295', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1296', '152', '龙安区', '0,1,11,152', '1296', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1297', '152', '林州市', '0,1,11,152', '1297', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1298', '152', '安阳县', '0,1,11,152', '1298', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1299', '152', '汤阴县', '0,1,11,152', '1299', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1300', '152', '滑县', '0,1,11,152', '1300', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1301', '152', '内黄县', '0,1,11,152', '1301', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1302', '153', '淇滨区', '0,1,11,153', '1302', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1303', '153', '山城区', '0,1,11,153', '1303', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1304', '153', '鹤山区', '0,1,11,153', '1304', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1305', '153', '浚县', '0,1,11,153', '1305', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1306', '153', '淇县', '0,1,11,153', '1306', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1307', '154', '济源市', '0,1,11,154', '1307', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1308', '155', '解放区', '0,1,11,155', '1308', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1309', '155', '中站区', '0,1,11,155', '1309', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1310', '155', '马村区', '0,1,11,155', '1310', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1311', '155', '山阳区', '0,1,11,155', '1311', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1312', '155', '沁阳市', '0,1,11,155', '1312', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1313', '155', '孟州市', '0,1,11,155', '1313', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1314', '155', '修武县', '0,1,11,155', '1314', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1315', '155', '博爱县', '0,1,11,155', '1315', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1316', '155', '武陟县', '0,1,11,155', '1316', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1317', '155', '温县', '0,1,11,155', '1317', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1318', '156', '卧龙区', '0,1,11,156', '1318', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1319', '156', '宛城区', '0,1,11,156', '1319', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1320', '156', '邓州市', '0,1,11,156', '1320', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1321', '156', '南召县', '0,1,11,156', '1321', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1322', '156', '方城县', '0,1,11,156', '1322', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1323', '156', '西峡县', '0,1,11,156', '1323', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1324', '156', '镇平县', '0,1,11,156', '1324', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1325', '156', '内乡县', '0,1,11,156', '1325', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1326', '156', '淅川县', '0,1,11,156', '1326', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1327', '156', '社旗县', '0,1,11,156', '1327', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1328', '156', '唐河县', '0,1,11,156', '1328', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1329', '156', '新野县', '0,1,11,156', '1329', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1330', '156', '桐柏县', '0,1,11,156', '1330', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1331', '157', '新华区', '0,1,11,157', '1331', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1332', '157', '卫东区', '0,1,11,157', '1332', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1333', '157', '湛河区', '0,1,11,157', '1333', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1334', '157', '石龙区', '0,1,11,157', '1334', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1335', '157', '舞钢市', '0,1,11,157', '1335', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1336', '157', '汝州市', '0,1,11,157', '1336', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1337', '157', '宝丰县', '0,1,11,157', '1337', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1338', '157', '叶县', '0,1,11,157', '1338', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1339', '157', '鲁山县', '0,1,11,157', '1339', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1340', '157', '郏县', '0,1,11,157', '1340', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1341', '158', '湖滨区', '0,1,11,158', '1341', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1342', '158', '义马市', '0,1,11,158', '1342', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1343', '158', '灵宝市', '0,1,11,158', '1343', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1344', '158', '渑池县', '0,1,11,158', '1344', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1345', '158', '陕县', '0,1,11,158', '1345', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1346', '158', '卢氏县', '0,1,11,158', '1346', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1347', '159', '梁园区', '0,1,11,159', '1347', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1348', '159', '睢阳区', '0,1,11,159', '1348', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1349', '159', '永城市', '0,1,11,159', '1349', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1350', '159', '民权县', '0,1,11,159', '1350', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1351', '159', '睢县', '0,1,11,159', '1351', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1352', '159', '宁陵县', '0,1,11,159', '1352', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1353', '159', '虞城县', '0,1,11,159', '1353', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1354', '159', '柘城县', '0,1,11,159', '1354', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1355', '159', '夏邑县', '0,1,11,159', '1355', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1356', '160', '卫滨区', '0,1,11,160', '1356', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1357', '160', '红旗区', '0,1,11,160', '1357', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1358', '160', '凤泉区', '0,1,11,160', '1358', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1359', '160', '牧野区', '0,1,11,160', '1359', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1360', '160', '卫辉市', '0,1,11,160', '1360', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1361', '160', '辉县市', '0,1,11,160', '1361', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1362', '160', '新乡县', '0,1,11,160', '1362', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1363', '160', '获嘉县', '0,1,11,160', '1363', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1364', '160', '原阳县', '0,1,11,160', '1364', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1365', '160', '延津县', '0,1,11,160', '1365', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1366', '160', '封丘县', '0,1,11,160', '1366', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1367', '160', '长垣县', '0,1,11,160', '1367', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1368', '161', '浉河区', '0,1,11,161', '1368', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1369', '161', '平桥区', '0,1,11,161', '1369', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1370', '161', '罗山县', '0,1,11,161', '1370', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1371', '161', '光山县', '0,1,11,161', '1371', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1372', '161', '新县', '0,1,11,161', '1372', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1373', '161', '商城县', '0,1,11,161', '1373', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1374', '161', '固始县', '0,1,11,161', '1374', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1375', '161', '潢川县', '0,1,11,161', '1375', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1376', '161', '淮滨县', '0,1,11,161', '1376', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1377', '161', '息县', '0,1,11,161', '1377', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1378', '162', '魏都区', '0,1,11,162', '1378', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1379', '162', '禹州市', '0,1,11,162', '1379', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1380', '162', '长葛市', '0,1,11,162', '1380', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1381', '162', '许昌县', '0,1,11,162', '1381', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1382', '162', '鄢陵县', '0,1,11,162', '1382', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1383', '162', '襄城县', '0,1,11,162', '1383', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1384', '163', '川汇区', '0,1,11,163', '1384', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1385', '163', '项城市', '0,1,11,163', '1385', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1386', '163', '扶沟县', '0,1,11,163', '1386', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1387', '163', '西华县', '0,1,11,163', '1387', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1388', '163', '商水县', '0,1,11,163', '1388', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1389', '163', '沈丘县', '0,1,11,163', '1389', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1390', '163', '郸城县', '0,1,11,163', '1390', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1391', '163', '淮阳县', '0,1,11,163', '1391', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1392', '163', '太康县', '0,1,11,163', '1392', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1393', '163', '鹿邑县', '0,1,11,163', '1393', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1394', '164', '驿城区', '0,1,11,164', '1394', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1395', '164', '西平县', '0,1,11,164', '1395', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1396', '164', '上蔡县', '0,1,11,164', '1396', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1397', '164', '平舆县', '0,1,11,164', '1397', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1398', '164', '正阳县', '0,1,11,164', '1398', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1399', '164', '确山县', '0,1,11,164', '1399', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1400', '164', '泌阳县', '0,1,11,164', '1400', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1401', '164', '汝南县', '0,1,11,164', '1401', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1402', '164', '遂平县', '0,1,11,164', '1402', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1403', '164', '新蔡县', '0,1,11,164', '1403', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1404', '165', '郾城区', '0,1,11,165', '1404', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1405', '165', '源汇区', '0,1,11,165', '1405', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1406', '165', '召陵区', '0,1,11,165', '1406', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1407', '165', '舞阳县', '0,1,11,165', '1407', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1408', '165', '临颍县', '0,1,11,165', '1408', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1409', '166', '华龙区', '0,1,11,166', '1409', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1410', '166', '清丰县', '0,1,11,166', '1410', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1411', '166', '南乐县', '0,1,11,166', '1411', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1412', '166', '范县', '0,1,11,166', '1412', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1413', '166', '台前县', '0,1,11,166', '1413', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1414', '166', '濮阳县', '0,1,11,166', '1414', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1415', '167', '道里区', '0,1,12,167', '1415', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1416', '167', '南岗区', '0,1,12,167', '1416', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1417', '167', '动力区', '0,1,12,167', '1417', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1418', '167', '平房区', '0,1,12,167', '1418', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1419', '167', '香坊区', '0,1,12,167', '1419', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1420', '167', '太平区', '0,1,12,167', '1420', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1421', '167', '道外区', '0,1,12,167', '1421', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1422', '167', '阿城区', '0,1,12,167', '1422', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1423', '167', '呼兰区', '0,1,12,167', '1423', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1424', '167', '松北区', '0,1,12,167', '1424', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1425', '167', '尚志市', '0,1,12,167', '1425', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1426', '167', '双城市', '0,1,12,167', '1426', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1427', '167', '五常市', '0,1,12,167', '1427', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1428', '167', '方正县', '0,1,12,167', '1428', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1429', '167', '宾县', '0,1,12,167', '1429', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1430', '167', '依兰县', '0,1,12,167', '1430', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1431', '167', '巴彦县', '0,1,12,167', '1431', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1432', '167', '通河县', '0,1,12,167', '1432', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1433', '167', '木兰县', '0,1,12,167', '1433', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1434', '167', '延寿县', '0,1,12,167', '1434', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1435', '168', '萨尔图区', '0,1,12,168', '1435', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1436', '168', '红岗区', '0,1,12,168', '1436', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1437', '168', '龙凤区', '0,1,12,168', '1437', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1438', '168', '让胡路区', '0,1,12,168', '1438', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1439', '168', '大同区', '0,1,12,168', '1439', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1440', '168', '肇州县', '0,1,12,168', '1440', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1441', '168', '肇源县', '0,1,12,168', '1441', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1442', '168', '林甸县', '0,1,12,168', '1442', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1443', '168', '杜尔伯特', '0,1,12,168', '1443', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1444', '169', '呼玛县', '0,1,12,169', '1444', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1445', '169', '漠河县', '0,1,12,169', '1445', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1446', '169', '塔河县', '0,1,12,169', '1446', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1447', '170', '兴山区', '0,1,12,170', '1447', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1448', '170', '工农区', '0,1,12,170', '1448', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1449', '170', '南山区', '0,1,12,170', '1449', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1450', '170', '兴安区', '0,1,12,170', '1450', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1451', '170', '向阳区', '0,1,12,170', '1451', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1452', '170', '东山区', '0,1,12,170', '1452', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1453', '170', '萝北县', '0,1,12,170', '1453', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1454', '170', '绥滨县', '0,1,12,170', '1454', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1455', '171', '爱辉区', '0,1,12,171', '1455', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1456', '171', '五大连池市', '0,1,12,171', '1456', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1457', '171', '北安市', '0,1,12,171', '1457', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1458', '171', '嫩江县', '0,1,12,171', '1458', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1459', '171', '逊克县', '0,1,12,171', '1459', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1460', '171', '孙吴县', '0,1,12,171', '1460', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1461', '172', '鸡冠区', '0,1,12,172', '1461', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1462', '172', '恒山区', '0,1,12,172', '1462', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1463', '172', '城子河区', '0,1,12,172', '1463', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1464', '172', '滴道区', '0,1,12,172', '1464', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1465', '172', '梨树区', '0,1,12,172', '1465', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1466', '172', '虎林市', '0,1,12,172', '1466', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1467', '172', '密山市', '0,1,12,172', '1467', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1468', '172', '鸡东县', '0,1,12,172', '1468', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1469', '173', '前进区', '0,1,12,173', '1469', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1470', '173', '郊区', '0,1,12,173', '1470', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1471', '173', '向阳区', '0,1,12,173', '1471', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1472', '173', '东风区', '0,1,12,173', '1472', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1473', '173', '同江市', '0,1,12,173', '1473', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1474', '173', '富锦市', '0,1,12,173', '1474', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1475', '173', '桦南县', '0,1,12,173', '1475', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1476', '173', '桦川县', '0,1,12,173', '1476', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1477', '173', '汤原县', '0,1,12,173', '1477', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1478', '173', '抚远县', '0,1,12,173', '1478', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1479', '174', '爱民区', '0,1,12,174', '1479', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1480', '174', '东安区', '0,1,12,174', '1480', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1481', '174', '阳明区', '0,1,12,174', '1481', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1482', '174', '西安区', '0,1,12,174', '1482', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1483', '174', '绥芬河市', '0,1,12,174', '1483', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1484', '174', '海林市', '0,1,12,174', '1484', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1485', '174', '宁安市', '0,1,12,174', '1485', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1486', '174', '穆棱市', '0,1,12,174', '1486', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1487', '174', '东宁县', '0,1,12,174', '1487', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1488', '174', '林口县', '0,1,12,174', '1488', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1489', '175', '桃山区', '0,1,12,175', '1489', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1490', '175', '新兴区', '0,1,12,175', '1490', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1491', '175', '茄子河区', '0,1,12,175', '1491', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1492', '175', '勃利县', '0,1,12,175', '1492', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1493', '176', '龙沙区', '0,1,12,176', '1493', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1494', '176', '昂昂溪区', '0,1,12,176', '1494', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1495', '176', '铁峰区', '0,1,12,176', '1495', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1496', '176', '建华区', '0,1,12,176', '1496', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1497', '176', '富拉尔基区', '0,1,12,176', '1497', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1498', '176', '碾子山区', '0,1,12,176', '1498', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1499', '176', '梅里斯达斡尔区', '0,1,12,176', '1499', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1500', '176', '讷河市', '0,1,12,176', '1500', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1501', '176', '龙江县', '0,1,12,176', '1501', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1502', '176', '依安县', '0,1,12,176', '1502', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1503', '176', '泰来县', '0,1,12,176', '1503', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1504', '176', '甘南县', '0,1,12,176', '1504', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1505', '176', '富裕县', '0,1,12,176', '1505', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1506', '176', '克山县', '0,1,12,176', '1506', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1507', '176', '克东县', '0,1,12,176', '1507', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1508', '176', '拜泉县', '0,1,12,176', '1508', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1509', '177', '尖山区', '0,1,12,177', '1509', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1510', '177', '岭东区', '0,1,12,177', '1510', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1511', '177', '四方台区', '0,1,12,177', '1511', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1512', '177', '宝山区', '0,1,12,177', '1512', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1513', '177', '集贤县', '0,1,12,177', '1513', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1514', '177', '友谊县', '0,1,12,177', '1514', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1515', '177', '宝清县', '0,1,12,177', '1515', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1516', '177', '饶河县', '0,1,12,177', '1516', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1517', '178', '北林区', '0,1,12,178', '1517', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1518', '178', '安达市', '0,1,12,178', '1518', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1519', '178', '肇东市', '0,1,12,178', '1519', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1520', '178', '海伦市', '0,1,12,178', '1520', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1521', '178', '望奎县', '0,1,12,178', '1521', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1522', '178', '兰西县', '0,1,12,178', '1522', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1523', '178', '青冈县', '0,1,12,178', '1523', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1524', '178', '庆安县', '0,1,12,178', '1524', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1525', '178', '明水县', '0,1,12,178', '1525', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1526', '178', '绥棱县', '0,1,12,178', '1526', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1527', '179', '伊春区', '0,1,12,179', '1527', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1528', '179', '带岭区', '0,1,12,179', '1528', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1529', '179', '南岔区', '0,1,12,179', '1529', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1530', '179', '金山屯区', '0,1,12,179', '1530', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1531', '179', '西林区', '0,1,12,179', '1531', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1532', '179', '美溪区', '0,1,12,179', '1532', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1533', '179', '乌马河区', '0,1,12,179', '1533', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1534', '179', '翠峦区', '0,1,12,179', '1534', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1535', '179', '友好区', '0,1,12,179', '1535', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1536', '179', '上甘岭区', '0,1,12,179', '1536', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1537', '179', '五营区', '0,1,12,179', '1537', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1538', '179', '红星区', '0,1,12,179', '1538', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1539', '179', '新青区', '0,1,12,179', '1539', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1540', '179', '汤旺河区', '0,1,12,179', '1540', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1541', '179', '乌伊岭区', '0,1,12,179', '1541', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1542', '179', '铁力市', '0,1,12,179', '1542', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1543', '179', '嘉荫县', '0,1,12,179', '1543', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1544', '180', '江岸区', '0,1,13,180', '1544', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1545', '180', '武昌区', '0,1,13,180', '1545', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1546', '180', '江汉区', '0,1,13,180', '1546', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1547', '180', '硚口区', '0,1,13,180', '1547', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1548', '180', '汉阳区', '0,1,13,180', '1548', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1549', '180', '青山区', '0,1,13,180', '1549', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1550', '180', '洪山区', '0,1,13,180', '1550', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1551', '180', '东西湖区', '0,1,13,180', '1551', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1552', '180', '汉南区', '0,1,13,180', '1552', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1553', '180', '蔡甸区', '0,1,13,180', '1553', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1554', '180', '江夏区', '0,1,13,180', '1554', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1555', '180', '黄陂区', '0,1,13,180', '1555', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1556', '180', '新洲区', '0,1,13,180', '1556', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1557', '180', '经济开发区', '0,1,13,180', '1557', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1558', '181', '仙桃市', '0,1,13,181', '1558', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1559', '182', '鄂城区', '0,1,13,182', '1559', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1560', '182', '华容区', '0,1,13,182', '1560', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1561', '182', '梁子湖区', '0,1,13,182', '1561', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1562', '183', '黄州区', '0,1,13,183', '1562', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1563', '183', '麻城市', '0,1,13,183', '1563', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1564', '183', '武穴市', '0,1,13,183', '1564', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1565', '183', '团风县', '0,1,13,183', '1565', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1566', '183', '红安县', '0,1,13,183', '1566', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1567', '183', '罗田县', '0,1,13,183', '1567', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1568', '183', '英山县', '0,1,13,183', '1568', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1569', '183', '浠水县', '0,1,13,183', '1569', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1570', '183', '蕲春县', '0,1,13,183', '1570', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1571', '183', '黄梅县', '0,1,13,183', '1571', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1572', '184', '黄石港区', '0,1,13,184', '1572', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1573', '184', '西塞山区', '0,1,13,184', '1573', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1574', '184', '下陆区', '0,1,13,184', '1574', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1575', '184', '铁山区', '0,1,13,184', '1575', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1576', '184', '大冶市', '0,1,13,184', '1576', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1577', '184', '阳新县', '0,1,13,184', '1577', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1578', '185', '东宝区', '0,1,13,185', '1578', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1579', '185', '掇刀区', '0,1,13,185', '1579', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1580', '185', '钟祥市', '0,1,13,185', '1580', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1581', '185', '京山县', '0,1,13,185', '1581', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1582', '185', '沙洋县', '0,1,13,185', '1582', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1583', '186', '沙市区', '0,1,13,186', '1583', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1584', '186', '荆州区', '0,1,13,186', '1584', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1585', '186', '石首市', '0,1,13,186', '1585', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1586', '186', '洪湖市', '0,1,13,186', '1586', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1587', '186', '松滋市', '0,1,13,186', '1587', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1588', '186', '公安县', '0,1,13,186', '1588', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1589', '186', '监利县', '0,1,13,186', '1589', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1590', '186', '江陵县', '0,1,13,186', '1590', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1591', '187', '潜江市', '0,1,13,187', '1591', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1592', '188', '神农架林区', '0,1,13,188', '1592', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1593', '189', '张湾区', '0,1,13,189', '1593', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1594', '189', '茅箭区', '0,1,13,189', '1594', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1595', '189', '丹江口市', '0,1,13,189', '1595', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1596', '189', '郧县', '0,1,13,189', '1596', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1597', '189', '郧西县', '0,1,13,189', '1597', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1598', '189', '竹山县', '0,1,13,189', '1598', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1599', '189', '竹溪县', '0,1,13,189', '1599', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1600', '189', '房县', '0,1,13,189', '1600', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1601', '190', '曾都区', '0,1,13,190', '1601', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1602', '190', '广水市', '0,1,13,190', '1602', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1603', '191', '天门市', '0,1,13,191', '1603', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1604', '192', '咸安区', '0,1,13,192', '1604', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1605', '192', '赤壁市', '0,1,13,192', '1605', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1606', '192', '嘉鱼县', '0,1,13,192', '1606', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1607', '192', '通城县', '0,1,13,192', '1607', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1608', '192', '崇阳县', '0,1,13,192', '1608', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1609', '192', '通山县', '0,1,13,192', '1609', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1610', '193', '襄城区', '0,1,13,193', '1610', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1611', '193', '樊城区', '0,1,13,193', '1611', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1612', '193', '襄阳区', '0,1,13,193', '1612', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1613', '193', '老河口市', '0,1,13,193', '1613', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1614', '193', '枣阳市', '0,1,13,193', '1614', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1615', '193', '宜城市', '0,1,13,193', '1615', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1616', '193', '南漳县', '0,1,13,193', '1616', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1617', '193', '谷城县', '0,1,13,193', '1617', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1618', '193', '保康县', '0,1,13,193', '1618', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1619', '194', '孝南区', '0,1,13,194', '1619', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1620', '194', '应城市', '0,1,13,194', '1620', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1621', '194', '安陆市', '0,1,13,194', '1621', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1622', '194', '汉川市', '0,1,13,194', '1622', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1623', '194', '孝昌县', '0,1,13,194', '1623', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1624', '194', '大悟县', '0,1,13,194', '1624', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1625', '194', '云梦县', '0,1,13,194', '1625', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1626', '195', '长阳', '0,1,13,195', '1626', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1627', '195', '五峰', '0,1,13,195', '1627', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1628', '195', '西陵区', '0,1,13,195', '1628', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1629', '195', '伍家岗区', '0,1,13,195', '1629', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1630', '195', '点军区', '0,1,13,195', '1630', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1631', '195', '猇亭区', '0,1,13,195', '1631', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1632', '195', '夷陵区', '0,1,13,195', '1632', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1633', '195', '宜都市', '0,1,13,195', '1633', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1634', '195', '当阳市', '0,1,13,195', '1634', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1635', '195', '枝江市', '0,1,13,195', '1635', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1636', '195', '远安县', '0,1,13,195', '1636', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1637', '195', '兴山县', '0,1,13,195', '1637', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1638', '195', '秭归县', '0,1,13,195', '1638', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1639', '196', '恩施市', '0,1,13,196', '1639', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1640', '196', '利川市', '0,1,13,196', '1640', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1641', '196', '建始县', '0,1,13,196', '1641', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1642', '196', '巴东县', '0,1,13,196', '1642', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1643', '196', '宣恩县', '0,1,13,196', '1643', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1644', '196', '咸丰县', '0,1,13,196', '1644', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1645', '196', '来凤县', '0,1,13,196', '1645', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1646', '196', '鹤峰县', '0,1,13,196', '1646', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1647', '197', '岳麓区', '0,1,14,197', '1647', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1648', '197', '芙蓉区', '0,1,14,197', '1648', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1649', '197', '天心区', '0,1,14,197', '1649', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1650', '197', '开福区', '0,1,14,197', '1650', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1651', '197', '雨花区', '0,1,14,197', '1651', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1652', '197', '开发区', '0,1,14,197', '1652', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1653', '197', '浏阳市', '0,1,14,197', '1653', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1654', '197', '长沙县', '0,1,14,197', '1654', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1655', '197', '望城县', '0,1,14,197', '1655', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1656', '197', '宁乡县', '0,1,14,197', '1656', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1657', '198', '永定区', '0,1,14,198', '1657', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1658', '198', '武陵源区', '0,1,14,198', '1658', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1659', '198', '慈利县', '0,1,14,198', '1659', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1660', '198', '桑植县', '0,1,14,198', '1660', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1661', '199', '武陵区', '0,1,14,199', '1661', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1662', '199', '鼎城区', '0,1,14,199', '1662', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1663', '199', '津市市', '0,1,14,199', '1663', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1664', '199', '安乡县', '0,1,14,199', '1664', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1665', '199', '汉寿县', '0,1,14,199', '1665', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1666', '199', '澧县', '0,1,14,199', '1666', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1667', '199', '临澧县', '0,1,14,199', '1667', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1668', '199', '桃源县', '0,1,14,199', '1668', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1669', '199', '石门县', '0,1,14,199', '1669', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1670', '200', '北湖区', '0,1,14,200', '1670', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1671', '200', '苏仙区', '0,1,14,200', '1671', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1672', '200', '资兴市', '0,1,14,200', '1672', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1673', '200', '桂阳县', '0,1,14,200', '1673', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1674', '200', '宜章县', '0,1,14,200', '1674', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1675', '200', '永兴县', '0,1,14,200', '1675', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1676', '200', '嘉禾县', '0,1,14,200', '1676', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1677', '200', '临武县', '0,1,14,200', '1677', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1678', '200', '汝城县', '0,1,14,200', '1678', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1679', '200', '桂东县', '0,1,14,200', '1679', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1680', '200', '安仁县', '0,1,14,200', '1680', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1681', '201', '雁峰区', '0,1,14,201', '1681', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1682', '201', '珠晖区', '0,1,14,201', '1682', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1683', '201', '石鼓区', '0,1,14,201', '1683', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1684', '201', '蒸湘区', '0,1,14,201', '1684', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1685', '201', '南岳区', '0,1,14,201', '1685', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1686', '201', '耒阳市', '0,1,14,201', '1686', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1687', '201', '常宁市', '0,1,14,201', '1687', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1688', '201', '衡阳县', '0,1,14,201', '1688', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1689', '201', '衡南县', '0,1,14,201', '1689', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1690', '201', '衡山县', '0,1,14,201', '1690', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1691', '201', '衡东县', '0,1,14,201', '1691', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1692', '201', '祁东县', '0,1,14,201', '1692', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1693', '202', '鹤城区', '0,1,14,202', '1693', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1694', '202', '靖州', '0,1,14,202', '1694', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1695', '202', '麻阳', '0,1,14,202', '1695', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1696', '202', '通道', '0,1,14,202', '1696', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1697', '202', '新晃', '0,1,14,202', '1697', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1698', '202', '芷江', '0,1,14,202', '1698', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1699', '202', '沅陵县', '0,1,14,202', '1699', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1700', '202', '辰溪县', '0,1,14,202', '1700', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1701', '202', '溆浦县', '0,1,14,202', '1701', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1702', '202', '中方县', '0,1,14,202', '1702', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1703', '202', '会同县', '0,1,14,202', '1703', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1704', '202', '洪江市', '0,1,14,202', '1704', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1705', '203', '娄星区', '0,1,14,203', '1705', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1706', '203', '冷水江市', '0,1,14,203', '1706', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1707', '203', '涟源市', '0,1,14,203', '1707', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1708', '203', '双峰县', '0,1,14,203', '1708', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1709', '203', '新化县', '0,1,14,203', '1709', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1710', '204', '城步', '0,1,14,204', '1710', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1711', '204', '双清区', '0,1,14,204', '1711', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1712', '204', '大祥区', '0,1,14,204', '1712', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1713', '204', '北塔区', '0,1,14,204', '1713', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1714', '204', '武冈市', '0,1,14,204', '1714', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1715', '204', '邵东县', '0,1,14,204', '1715', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1716', '204', '新邵县', '0,1,14,204', '1716', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1717', '204', '邵阳县', '0,1,14,204', '1717', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1718', '204', '隆回县', '0,1,14,204', '1718', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1719', '204', '洞口县', '0,1,14,204', '1719', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1720', '204', '绥宁县', '0,1,14,204', '1720', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1721', '204', '新宁县', '0,1,14,204', '1721', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1722', '205', '岳塘区', '0,1,14,205', '1722', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1723', '205', '雨湖区', '0,1,14,205', '1723', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1724', '205', '湘乡市', '0,1,14,205', '1724', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1725', '205', '韶山市', '0,1,14,205', '1725', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1726', '205', '湘潭县', '0,1,14,205', '1726', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1727', '206', '吉首市', '0,1,14,206', '1727', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1728', '206', '泸溪县', '0,1,14,206', '1728', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1729', '206', '凤凰县', '0,1,14,206', '1729', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1730', '206', '花垣县', '0,1,14,206', '1730', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1731', '206', '保靖县', '0,1,14,206', '1731', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1732', '206', '古丈县', '0,1,14,206', '1732', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1733', '206', '永顺县', '0,1,14,206', '1733', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1734', '206', '龙山县', '0,1,14,206', '1734', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1735', '207', '赫山区', '0,1,14,207', '1735', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1736', '207', '资阳区', '0,1,14,207', '1736', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1737', '207', '沅江市', '0,1,14,207', '1737', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1738', '207', '南县', '0,1,14,207', '1738', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1739', '207', '桃江县', '0,1,14,207', '1739', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1740', '207', '安化县', '0,1,14,207', '1740', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1741', '208', '江华', '0,1,14,208', '1741', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1742', '208', '冷水滩区', '0,1,14,208', '1742', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1743', '208', '零陵区', '0,1,14,208', '1743', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1744', '208', '祁阳县', '0,1,14,208', '1744', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1745', '208', '东安县', '0,1,14,208', '1745', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1746', '208', '双牌县', '0,1,14,208', '1746', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1747', '208', '道县', '0,1,14,208', '1747', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1748', '208', '江永县', '0,1,14,208', '1748', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1749', '208', '宁远县', '0,1,14,208', '1749', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1750', '208', '蓝山县', '0,1,14,208', '1750', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1751', '208', '新田县', '0,1,14,208', '1751', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1752', '209', '岳阳楼区', '0,1,14,209', '1752', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1753', '209', '君山区', '0,1,14,209', '1753', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1754', '209', '云溪区', '0,1,14,209', '1754', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1755', '209', '汨罗市', '0,1,14,209', '1755', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1756', '209', '临湘市', '0,1,14,209', '1756', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1757', '209', '岳阳县', '0,1,14,209', '1757', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1758', '209', '华容县', '0,1,14,209', '1758', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1759', '209', '湘阴县', '0,1,14,209', '1759', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1760', '209', '平江县', '0,1,14,209', '1760', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1761', '210', '天元区', '0,1,14,210', '1761', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1762', '210', '荷塘区', '0,1,14,210', '1762', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1763', '210', '芦淞区', '0,1,14,210', '1763', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1764', '210', '石峰区', '0,1,14,210', '1764', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1765', '210', '醴陵市', '0,1,14,210', '1765', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1766', '210', '株洲县', '0,1,14,210', '1766', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1767', '210', '攸县', '0,1,14,210', '1767', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1768', '210', '茶陵县', '0,1,14,210', '1768', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1769', '210', '炎陵县', '0,1,14,210', '1769', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1770', '211', '朝阳区', '0,1,15,211', '1770', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1771', '211', '宽城区', '0,1,15,211', '1771', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1772', '211', '二道区', '0,1,15,211', '1772', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1773', '211', '南关区', '0,1,15,211', '1773', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1774', '211', '绿园区', '0,1,15,211', '1774', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1775', '211', '双阳区', '0,1,15,211', '1775', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1776', '211', '净月潭开发区', '0,1,15,211', '1776', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1777', '211', '高新技术开发区', '0,1,15,211', '1777', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1778', '211', '经济技术开发区', '0,1,15,211', '1778', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1779', '211', '汽车产业开发区', '0,1,15,211', '1779', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1780', '211', '德惠市', '0,1,15,211', '1780', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1781', '211', '九台市', '0,1,15,211', '1781', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1782', '211', '榆树市', '0,1,15,211', '1782', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1783', '211', '农安县', '0,1,15,211', '1783', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1784', '212', '船营区', '0,1,15,212', '1784', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1785', '212', '昌邑区', '0,1,15,212', '1785', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1786', '212', '龙潭区', '0,1,15,212', '1786', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1787', '212', '丰满区', '0,1,15,212', '1787', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1788', '212', '蛟河市', '0,1,15,212', '1788', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1789', '212', '桦甸市', '0,1,15,212', '1789', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1790', '212', '舒兰市', '0,1,15,212', '1790', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1791', '212', '磐石市', '0,1,15,212', '1791', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1792', '212', '永吉县', '0,1,15,212', '1792', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1793', '213', '洮北区', '0,1,15,213', '1793', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1794', '213', '洮南市', '0,1,15,213', '1794', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1795', '213', '大安市', '0,1,15,213', '1795', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1796', '213', '镇赉县', '0,1,15,213', '1796', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1797', '213', '通榆县', '0,1,15,213', '1797', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1798', '214', '江源区', '0,1,15,214', '1798', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1799', '214', '八道江区', '0,1,15,214', '1799', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1800', '214', '长白', '0,1,15,214', '1800', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1801', '214', '临江市', '0,1,15,214', '1801', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1802', '214', '抚松县', '0,1,15,214', '1802', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1803', '214', '靖宇县', '0,1,15,214', '1803', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1804', '215', '龙山区', '0,1,15,215', '1804', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1805', '215', '西安区', '0,1,15,215', '1805', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1806', '215', '东丰县', '0,1,15,215', '1806', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1807', '215', '东辽县', '0,1,15,215', '1807', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1808', '216', '铁西区', '0,1,15,216', '1808', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1809', '216', '铁东区', '0,1,15,216', '1809', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1810', '216', '伊通', '0,1,15,216', '1810', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1811', '216', '公主岭市', '0,1,15,216', '1811', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1812', '216', '双辽市', '0,1,15,216', '1812', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1813', '216', '梨树县', '0,1,15,216', '1813', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1814', '217', '前郭尔罗斯', '0,1,15,217', '1814', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1815', '217', '宁江区', '0,1,15,217', '1815', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1816', '217', '长岭县', '0,1,15,217', '1816', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1817', '217', '乾安县', '0,1,15,217', '1817', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1818', '217', '扶余县', '0,1,15,217', '1818', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1819', '218', '东昌区', '0,1,15,218', '1819', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1820', '218', '二道江区', '0,1,15,218', '1820', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1821', '218', '梅河口市', '0,1,15,218', '1821', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1822', '218', '集安市', '0,1,15,218', '1822', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1823', '218', '通化县', '0,1,15,218', '1823', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1824', '218', '辉南县', '0,1,15,218', '1824', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1825', '218', '柳河县', '0,1,15,218', '1825', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1826', '219', '延吉市', '0,1,15,219', '1826', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1827', '219', '图们市', '0,1,15,219', '1827', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1828', '219', '敦化市', '0,1,15,219', '1828', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1829', '219', '珲春市', '0,1,15,219', '1829', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1830', '219', '龙井市', '0,1,15,219', '1830', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1831', '219', '和龙市', '0,1,15,219', '1831', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1832', '219', '安图县', '0,1,15,219', '1832', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1833', '219', '汪清县', '0,1,15,219', '1833', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1834', '220', '玄武区', '0,1,16,220', '1834', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1835', '220', '鼓楼区', '0,1,16,220', '1835', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1836', '220', '白下区', '0,1,16,220', '1836', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1837', '220', '建邺区', '0,1,16,220', '1837', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1838', '220', '秦淮区', '0,1,16,220', '1838', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1839', '220', '雨花台区', '0,1,16,220', '1839', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1840', '220', '下关区', '0,1,16,220', '1840', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1841', '220', '栖霞区', '0,1,16,220', '1841', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1842', '220', '浦口区', '0,1,16,220', '1842', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1843', '220', '江宁区', '0,1,16,220', '1843', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1844', '220', '六合区', '0,1,16,220', '1844', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1845', '220', '溧水县', '0,1,16,220', '1845', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1846', '220', '高淳县', '0,1,16,220', '1846', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1847', '221', '沧浪区', '0,1,16,221', '1847', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1848', '221', '金阊区', '0,1,16,221', '1848', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1849', '221', '平江区', '0,1,16,221', '1849', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1850', '221', '虎丘区', '0,1,16,221', '1850', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1851', '221', '吴中区', '0,1,16,221', '1851', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1852', '221', '相城区', '0,1,16,221', '1852', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1853', '221', '园区', '0,1,16,221', '1853', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1854', '221', '新区', '0,1,16,221', '1854', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1855', '221', '常熟市', '0,1,16,221', '1855', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1856', '221', '张家港市', '0,1,16,221', '1856', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1857', '221', '玉山镇', '0,1,16,221', '1857', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1858', '221', '巴城镇', '0,1,16,221', '1858', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1859', '221', '周市镇', '0,1,16,221', '1859', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1860', '221', '陆家镇', '0,1,16,221', '1860', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1861', '221', '花桥镇', '0,1,16,221', '1861', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1862', '221', '淀山湖镇', '0,1,16,221', '1862', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1863', '221', '张浦镇', '0,1,16,221', '1863', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1864', '221', '周庄镇', '0,1,16,221', '1864', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1865', '221', '千灯镇', '0,1,16,221', '1865', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1866', '221', '锦溪镇', '0,1,16,221', '1866', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1867', '221', '开发区', '0,1,16,221', '1867', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1868', '221', '吴江市', '0,1,16,221', '1868', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1869', '221', '太仓市', '0,1,16,221', '1869', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1870', '222', '崇安区', '0,1,16,222', '1870', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1871', '222', '北塘区', '0,1,16,222', '1871', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1872', '222', '南长区', '0,1,16,222', '1872', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1873', '222', '锡山区', '0,1,16,222', '1873', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1874', '222', '惠山区', '0,1,16,222', '1874', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1875', '222', '滨湖区', '0,1,16,222', '1875', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1876', '222', '新区', '0,1,16,222', '1876', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1877', '222', '江阴市', '0,1,16,222', '1877', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1878', '222', '宜兴市', '0,1,16,222', '1878', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1879', '223', '天宁区', '0,1,16,223', '1879', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1880', '223', '钟楼区', '0,1,16,223', '1880', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1881', '223', '戚墅堰区', '0,1,16,223', '1881', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1882', '223', '郊区', '0,1,16,223', '1882', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1883', '223', '新北区', '0,1,16,223', '1883', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1884', '223', '武进区', '0,1,16,223', '1884', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1885', '223', '溧阳市', '0,1,16,223', '1885', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1886', '223', '金坛市', '0,1,16,223', '1886', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1887', '224', '清河区', '0,1,16,224', '1887', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1888', '224', '清浦区', '0,1,16,224', '1888', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1889', '224', '楚州区', '0,1,16,224', '1889', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1890', '224', '淮阴区', '0,1,16,224', '1890', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1891', '224', '涟水县', '0,1,16,224', '1891', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1892', '224', '洪泽县', '0,1,16,224', '1892', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1893', '224', '盱眙县', '0,1,16,224', '1893', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1894', '224', '金湖县', '0,1,16,224', '1894', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1895', '225', '新浦区', '0,1,16,225', '1895', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1896', '225', '连云区', '0,1,16,225', '1896', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1897', '225', '海州区', '0,1,16,225', '1897', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1898', '225', '赣榆县', '0,1,16,225', '1898', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1899', '225', '东海县', '0,1,16,225', '1899', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1900', '225', '灌云县', '0,1,16,225', '1900', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1901', '225', '灌南县', '0,1,16,225', '1901', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1902', '226', '崇川区', '0,1,16,226', '1902', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1903', '226', '港闸区', '0,1,16,226', '1903', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1904', '226', '经济开发区', '0,1,16,226', '1904', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1905', '226', '启东市', '0,1,16,226', '1905', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1906', '226', '如皋市', '0,1,16,226', '1906', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1907', '226', '通州市', '0,1,16,226', '1907', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1908', '226', '海门市', '0,1,16,226', '1908', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1909', '226', '海安县', '0,1,16,226', '1909', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1910', '226', '如东县', '0,1,16,226', '1910', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1911', '227', '宿城区', '0,1,16,227', '1911', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1912', '227', '宿豫区', '0,1,16,227', '1912', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1913', '227', '宿豫县', '0,1,16,227', '1913', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1914', '227', '沭阳县', '0,1,16,227', '1914', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1915', '227', '泗阳县', '0,1,16,227', '1915', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1916', '227', '泗洪县', '0,1,16,227', '1916', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1917', '228', '海陵区', '0,1,16,228', '1917', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1918', '228', '高港区', '0,1,16,228', '1918', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1919', '228', '兴化市', '0,1,16,228', '1919', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1920', '228', '靖江市', '0,1,16,228', '1920', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1921', '228', '泰兴市', '0,1,16,228', '1921', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1922', '228', '姜堰市', '0,1,16,228', '1922', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1923', '229', '云龙区', '0,1,16,229', '1923', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1924', '229', '鼓楼区', '0,1,16,229', '1924', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1925', '229', '九里区', '0,1,16,229', '1925', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1926', '229', '贾汪区', '0,1,16,229', '1926', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1927', '229', '泉山区', '0,1,16,229', '1927', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1928', '229', '新沂市', '0,1,16,229', '1928', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1929', '229', '邳州市', '0,1,16,229', '1929', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1930', '229', '丰县', '0,1,16,229', '1930', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1931', '229', '沛县', '0,1,16,229', '1931', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1932', '229', '铜山县', '0,1,16,229', '1932', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1933', '229', '睢宁县', '0,1,16,229', '1933', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1934', '230', '城区', '0,1,16,230', '1934', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1935', '230', '亭湖区', '0,1,16,230', '1935', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1936', '230', '盐都区', '0,1,16,230', '1936', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1937', '230', '盐都县', '0,1,16,230', '1937', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1938', '230', '东台市', '0,1,16,230', '1938', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1939', '230', '大丰市', '0,1,16,230', '1939', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1940', '230', '响水县', '0,1,16,230', '1940', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1941', '230', '滨海县', '0,1,16,230', '1941', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1942', '230', '阜宁县', '0,1,16,230', '1942', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1943', '230', '射阳县', '0,1,16,230', '1943', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1944', '230', '建湖县', '0,1,16,230', '1944', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1945', '231', '广陵区', '0,1,16,231', '1945', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1946', '231', '维扬区', '0,1,16,231', '1946', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1947', '231', '邗江区', '0,1,16,231', '1947', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1948', '231', '仪征市', '0,1,16,231', '1948', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1949', '231', '高邮市', '0,1,16,231', '1949', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1950', '231', '江都市', '0,1,16,231', '1950', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1951', '231', '宝应县', '0,1,16,231', '1951', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1952', '232', '京口区', '0,1,16,232', '1952', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1953', '232', '润州区', '0,1,16,232', '1953', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1954', '232', '丹徒区', '0,1,16,232', '1954', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1955', '232', '丹阳市', '0,1,16,232', '1955', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1956', '232', '扬中市', '0,1,16,232', '1956', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1957', '232', '句容市', '0,1,16,232', '1957', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1958', '233', '东湖区', '0,1,17,233', '1958', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1959', '233', '西湖区', '0,1,17,233', '1959', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1960', '233', '青云谱区', '0,1,17,233', '1960', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1961', '233', '湾里区', '0,1,17,233', '1961', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1962', '233', '青山湖区', '0,1,17,233', '1962', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1963', '233', '红谷滩新区', '0,1,17,233', '1963', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1964', '233', '昌北区', '0,1,17,233', '1964', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1965', '233', '高新区', '0,1,17,233', '1965', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1966', '233', '南昌县', '0,1,17,233', '1966', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1967', '233', '新建县', '0,1,17,233', '1967', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1968', '233', '安义县', '0,1,17,233', '1968', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1969', '233', '进贤县', '0,1,17,233', '1969', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1970', '234', '临川区', '0,1,17,234', '1970', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1971', '234', '南城县', '0,1,17,234', '1971', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1972', '234', '黎川县', '0,1,17,234', '1972', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1973', '234', '南丰县', '0,1,17,234', '1973', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1974', '234', '崇仁县', '0,1,17,234', '1974', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1975', '234', '乐安县', '0,1,17,234', '1975', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1976', '234', '宜黄县', '0,1,17,234', '1976', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1977', '234', '金溪县', '0,1,17,234', '1977', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1978', '234', '资溪县', '0,1,17,234', '1978', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1979', '234', '东乡县', '0,1,17,234', '1979', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1980', '234', '广昌县', '0,1,17,234', '1980', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1981', '235', '章贡区', '0,1,17,235', '1981', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1982', '235', '于都县', '0,1,17,235', '1982', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1983', '235', '瑞金市', '0,1,17,235', '1983', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1984', '235', '南康市', '0,1,17,235', '1984', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1985', '235', '赣县', '0,1,17,235', '1985', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1986', '235', '信丰县', '0,1,17,235', '1986', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1987', '235', '大余县', '0,1,17,235', '1987', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1988', '235', '上犹县', '0,1,17,235', '1988', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1989', '235', '崇义县', '0,1,17,235', '1989', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1990', '235', '安远县', '0,1,17,235', '1990', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1991', '235', '龙南县', '0,1,17,235', '1991', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1992', '235', '定南县', '0,1,17,235', '1992', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1993', '235', '全南县', '0,1,17,235', '1993', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1994', '235', '宁都县', '0,1,17,235', '1994', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1995', '235', '兴国县', '0,1,17,235', '1995', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1996', '235', '会昌县', '0,1,17,235', '1996', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1997', '235', '寻乌县', '0,1,17,235', '1997', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1998', '235', '石城县', '0,1,17,235', '1998', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('1999', '236', '安福县', '0,1,17,236', '1999', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2000', '236', '吉州区', '0,1,17,236', '2000', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2001', '236', '青原区', '0,1,17,236', '2001', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2002', '236', '井冈山市', '0,1,17,236', '2002', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2003', '236', '吉安县', '0,1,17,236', '2003', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2004', '236', '吉水县', '0,1,17,236', '2004', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2005', '236', '峡江县', '0,1,17,236', '2005', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2006', '236', '新干县', '0,1,17,236', '2006', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2007', '236', '永丰县', '0,1,17,236', '2007', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2008', '236', '泰和县', '0,1,17,236', '2008', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2009', '236', '遂川县', '0,1,17,236', '2009', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2010', '236', '万安县', '0,1,17,236', '2010', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2011', '236', '永新县', '0,1,17,236', '2011', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2012', '237', '珠山区', '0,1,17,237', '2012', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2013', '237', '昌江区', '0,1,17,237', '2013', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2014', '237', '乐平市', '0,1,17,237', '2014', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2015', '237', '浮梁县', '0,1,17,237', '2015', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2016', '238', '浔阳区', '0,1,17,238', '2016', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2017', '238', '庐山区', '0,1,17,238', '2017', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2018', '238', '瑞昌市', '0,1,17,238', '2018', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2019', '238', '九江县', '0,1,17,238', '2019', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2020', '238', '武宁县', '0,1,17,238', '2020', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2021', '238', '修水县', '0,1,17,238', '2021', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2022', '238', '永修县', '0,1,17,238', '2022', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2023', '238', '德安县', '0,1,17,238', '2023', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2024', '238', '星子县', '0,1,17,238', '2024', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2025', '238', '都昌县', '0,1,17,238', '2025', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2026', '238', '湖口县', '0,1,17,238', '2026', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2027', '238', '彭泽县', '0,1,17,238', '2027', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2028', '239', '安源区', '0,1,17,239', '2028', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2029', '239', '湘东区', '0,1,17,239', '2029', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2030', '239', '莲花县', '0,1,17,239', '2030', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2031', '239', '芦溪县', '0,1,17,239', '2031', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2032', '239', '上栗县', '0,1,17,239', '2032', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2033', '240', '信州区', '0,1,17,240', '2033', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2034', '240', '德兴市', '0,1,17,240', '2034', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2035', '240', '上饶县', '0,1,17,240', '2035', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2036', '240', '广丰县', '0,1,17,240', '2036', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2037', '240', '玉山县', '0,1,17,240', '2037', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2038', '240', '铅山县', '0,1,17,240', '2038', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2039', '240', '横峰县', '0,1,17,240', '2039', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2040', '240', '弋阳县', '0,1,17,240', '2040', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2041', '240', '余干县', '0,1,17,240', '2041', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2042', '240', '波阳县', '0,1,17,240', '2042', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2043', '240', '万年县', '0,1,17,240', '2043', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2044', '240', '婺源县', '0,1,17,240', '2044', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2045', '241', '渝水区', '0,1,17,241', '2045', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2046', '241', '分宜县', '0,1,17,241', '2046', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2047', '242', '袁州区', '0,1,17,242', '2047', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2048', '242', '丰城市', '0,1,17,242', '2048', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2049', '242', '樟树市', '0,1,17,242', '2049', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2050', '242', '高安市', '0,1,17,242', '2050', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2051', '242', '奉新县', '0,1,17,242', '2051', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2052', '242', '万载县', '0,1,17,242', '2052', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2053', '242', '上高县', '0,1,17,242', '2053', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2054', '242', '宜丰县', '0,1,17,242', '2054', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2055', '242', '靖安县', '0,1,17,242', '2055', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2056', '242', '铜鼓县', '0,1,17,242', '2056', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2057', '243', '月湖区', '0,1,17,243', '2057', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2058', '243', '贵溪市', '0,1,17,243', '2058', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2059', '243', '余江县', '0,1,17,243', '2059', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2060', '244', '沈河区', '0,1,18,244', '2060', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2061', '244', '皇姑区', '0,1,18,244', '2061', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2062', '244', '和平区', '0,1,18,244', '2062', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2063', '244', '大东区', '0,1,18,244', '2063', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2064', '244', '铁西区', '0,1,18,244', '2064', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2065', '244', '苏家屯区', '0,1,18,244', '2065', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2066', '244', '东陵区', '0,1,18,244', '2066', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2067', '244', '沈北新区', '0,1,18,244', '2067', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2068', '244', '于洪区', '0,1,18,244', '2068', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2069', '244', '浑南新区', '0,1,18,244', '2069', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2070', '244', '新民市', '0,1,18,244', '2070', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2071', '244', '辽中县', '0,1,18,244', '2071', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2072', '244', '康平县', '0,1,18,244', '2072', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2073', '244', '法库县', '0,1,18,244', '2073', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2074', '245', '西岗区', '0,1,18,245', '2074', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2075', '245', '中山区', '0,1,18,245', '2075', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2076', '245', '沙河口区', '0,1,18,245', '2076', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2077', '245', '甘井子区', '0,1,18,245', '2077', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2078', '245', '旅顺口区', '0,1,18,245', '2078', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2079', '245', '金州区', '0,1,18,245', '2079', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2080', '245', '开发区', '0,1,18,245', '2080', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2081', '245', '瓦房店市', '0,1,18,245', '2081', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2082', '245', '普兰店市', '0,1,18,245', '2082', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2083', '245', '庄河市', '0,1,18,245', '2083', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2084', '245', '长海县', '0,1,18,245', '2084', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2085', '246', '铁东区', '0,1,18,246', '2085', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2086', '246', '铁西区', '0,1,18,246', '2086', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2087', '246', '立山区', '0,1,18,246', '2087', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2088', '246', '千山区', '0,1,18,246', '2088', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2089', '246', '岫岩', '0,1,18,246', '2089', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2090', '246', '海城市', '0,1,18,246', '2090', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2091', '246', '台安县', '0,1,18,246', '2091', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2092', '247', '本溪', '0,1,18,247', '2092', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2093', '247', '平山区', '0,1,18,247', '2093', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2094', '247', '明山区', '0,1,18,247', '2094', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2095', '247', '溪湖区', '0,1,18,247', '2095', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2096', '247', '南芬区', '0,1,18,247', '2096', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2097', '247', '桓仁', '0,1,18,247', '2097', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2098', '248', '双塔区', '0,1,18,248', '2098', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2099', '248', '龙城区', '0,1,18,248', '2099', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2100', '248', '喀喇沁左翼蒙古族自治县', '0,1,18,248', '2100', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2101', '248', '北票市', '0,1,18,248', '2101', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2102', '248', '凌源市', '0,1,18,248', '2102', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2103', '248', '朝阳县', '0,1,18,248', '2103', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2104', '248', '建平县', '0,1,18,248', '2104', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2105', '249', '振兴区', '0,1,18,249', '2105', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2106', '249', '元宝区', '0,1,18,249', '2106', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2107', '249', '振安区', '0,1,18,249', '2107', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2108', '249', '宽甸', '0,1,18,249', '2108', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2109', '249', '东港市', '0,1,18,249', '2109', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2110', '249', '凤城市', '0,1,18,249', '2110', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2111', '250', '顺城区', '0,1,18,250', '2111', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2112', '250', '新抚区', '0,1,18,250', '2112', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2113', '250', '东洲区', '0,1,18,250', '2113', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2114', '250', '望花区', '0,1,18,250', '2114', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2115', '250', '清原', '0,1,18,250', '2115', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2116', '250', '新宾', '0,1,18,250', '2116', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2117', '250', '抚顺县', '0,1,18,250', '2117', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2118', '251', '阜新', '0,1,18,251', '2118', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2119', '251', '海州区', '0,1,18,251', '2119', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2120', '251', '新邱区', '0,1,18,251', '2120', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2121', '251', '太平区', '0,1,18,251', '2121', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2122', '251', '清河门区', '0,1,18,251', '2122', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2123', '251', '细河区', '0,1,18,251', '2123', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2124', '251', '彰武县', '0,1,18,251', '2124', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2125', '252', '龙港区', '0,1,18,252', '2125', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2126', '252', '南票区', '0,1,18,252', '2126', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2127', '252', '连山区', '0,1,18,252', '2127', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2128', '252', '兴城市', '0,1,18,252', '2128', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2129', '252', '绥中县', '0,1,18,252', '2129', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2130', '252', '建昌县', '0,1,18,252', '2130', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2131', '253', '太和区', '0,1,18,253', '2131', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2132', '253', '古塔区', '0,1,18,253', '2132', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2133', '253', '凌河区', '0,1,18,253', '2133', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2134', '253', '凌海市', '0,1,18,253', '2134', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2135', '253', '北镇市', '0,1,18,253', '2135', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2136', '253', '黑山县', '0,1,18,253', '2136', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2137', '253', '义县', '0,1,18,253', '2137', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2138', '254', '白塔区', '0,1,18,254', '2138', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2139', '254', '文圣区', '0,1,18,254', '2139', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2140', '254', '宏伟区', '0,1,18,254', '2140', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2141', '254', '太子河区', '0,1,18,254', '2141', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2142', '254', '弓长岭区', '0,1,18,254', '2142', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2143', '254', '灯塔市', '0,1,18,254', '2143', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2144', '254', '辽阳县', '0,1,18,254', '2144', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2145', '255', '双台子区', '0,1,18,255', '2145', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2146', '255', '兴隆台区', '0,1,18,255', '2146', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2147', '255', '大洼县', '0,1,18,255', '2147', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2148', '255', '盘山县', '0,1,18,255', '2148', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2149', '256', '银州区', '0,1,18,256', '2149', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2150', '256', '清河区', '0,1,18,256', '2150', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2151', '256', '调兵山市', '0,1,18,256', '2151', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2152', '256', '开原市', '0,1,18,256', '2152', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2153', '256', '铁岭县', '0,1,18,256', '2153', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2154', '256', '西丰县', '0,1,18,256', '2154', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2155', '256', '昌图县', '0,1,18,256', '2155', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2156', '257', '站前区', '0,1,18,257', '2156', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2157', '257', '西市区', '0,1,18,257', '2157', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2158', '257', '鲅鱼圈区', '0,1,18,257', '2158', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2159', '257', '老边区', '0,1,18,257', '2159', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2160', '257', '盖州市', '0,1,18,257', '2160', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2161', '257', '大石桥市', '0,1,18,257', '2161', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2162', '258', '回民区', '0,1,19,258', '2162', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2163', '258', '玉泉区', '0,1,19,258', '2163', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2164', '258', '新城区', '0,1,19,258', '2164', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2165', '258', '赛罕区', '0,1,19,258', '2165', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2166', '258', '清水河县', '0,1,19,258', '2166', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2167', '258', '土默特左旗', '0,1,19,258', '2167', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2168', '258', '托克托县', '0,1,19,258', '2168', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2169', '258', '和林格尔县', '0,1,19,258', '2169', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2170', '258', '武川县', '0,1,19,258', '2170', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2171', '259', '阿拉善左旗', '0,1,19,259', '2171', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2172', '259', '阿拉善右旗', '0,1,19,259', '2172', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2173', '259', '额济纳旗', '0,1,19,259', '2173', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2174', '260', '临河区', '0,1,19,260', '2174', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2175', '260', '五原县', '0,1,19,260', '2175', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2176', '260', '磴口县', '0,1,19,260', '2176', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2177', '260', '乌拉特前旗', '0,1,19,260', '2177', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2178', '260', '乌拉特中旗', '0,1,19,260', '2178', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2179', '260', '乌拉特后旗', '0,1,19,260', '2179', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2180', '260', '杭锦后旗', '0,1,19,260', '2180', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2181', '261', '昆都仑区', '0,1,19,261', '2181', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2182', '261', '青山区', '0,1,19,261', '2182', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2183', '261', '东河区', '0,1,19,261', '2183', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2184', '261', '九原区', '0,1,19,261', '2184', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2185', '261', '石拐区', '0,1,19,261', '2185', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2186', '261', '白云矿区', '0,1,19,261', '2186', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2187', '261', '土默特右旗', '0,1,19,261', '2187', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2188', '261', '固阳县', '0,1,19,261', '2188', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2189', '261', '达尔罕茂明安联合旗', '0,1,19,261', '2189', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2190', '262', '红山区', '0,1,19,262', '2190', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2191', '262', '元宝山区', '0,1,19,262', '2191', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2192', '262', '松山区', '0,1,19,262', '2192', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2193', '262', '阿鲁科尔沁旗', '0,1,19,262', '2193', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2194', '262', '巴林左旗', '0,1,19,262', '2194', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2195', '262', '巴林右旗', '0,1,19,262', '2195', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2196', '262', '林西县', '0,1,19,262', '2196', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2197', '262', '克什克腾旗', '0,1,19,262', '2197', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2198', '262', '翁牛特旗', '0,1,19,262', '2198', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2199', '262', '喀喇沁旗', '0,1,19,262', '2199', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2200', '262', '宁城县', '0,1,19,262', '2200', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2201', '262', '敖汉旗', '0,1,19,262', '2201', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2202', '263', '东胜区', '0,1,19,263', '2202', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2203', '263', '达拉特旗', '0,1,19,263', '2203', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2204', '263', '准格尔旗', '0,1,19,263', '2204', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2205', '263', '鄂托克前旗', '0,1,19,263', '2205', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2206', '263', '鄂托克旗', '0,1,19,263', '2206', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2207', '263', '杭锦旗', '0,1,19,263', '2207', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2208', '263', '乌审旗', '0,1,19,263', '2208', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2209', '263', '伊金霍洛旗', '0,1,19,263', '2209', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2210', '264', '海拉尔区', '0,1,19,264', '2210', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2211', '264', '莫力达瓦', '0,1,19,264', '2211', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2212', '264', '满洲里市', '0,1,19,264', '2212', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2213', '264', '牙克石市', '0,1,19,264', '2213', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2214', '264', '扎兰屯市', '0,1,19,264', '2214', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2215', '264', '额尔古纳市', '0,1,19,264', '2215', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2216', '264', '根河市', '0,1,19,264', '2216', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2217', '264', '阿荣旗', '0,1,19,264', '2217', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2218', '264', '鄂伦春自治旗', '0,1,19,264', '2218', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2219', '264', '鄂温克族自治旗', '0,1,19,264', '2219', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2220', '264', '陈巴尔虎旗', '0,1,19,264', '2220', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2221', '264', '新巴尔虎左旗', '0,1,19,264', '2221', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2222', '264', '新巴尔虎右旗', '0,1,19,264', '2222', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2223', '265', '科尔沁区', '0,1,19,265', '2223', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2224', '265', '霍林郭勒市', '0,1,19,265', '2224', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2225', '265', '科尔沁左翼中旗', '0,1,19,265', '2225', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2226', '265', '科尔沁左翼后旗', '0,1,19,265', '2226', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2227', '265', '开鲁县', '0,1,19,265', '2227', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2228', '265', '库伦旗', '0,1,19,265', '2228', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2229', '265', '奈曼旗', '0,1,19,265', '2229', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2230', '265', '扎鲁特旗', '0,1,19,265', '2230', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2231', '266', '海勃湾区', '0,1,19,266', '2231', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2232', '266', '乌达区', '0,1,19,266', '2232', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2233', '266', '海南区', '0,1,19,266', '2233', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2234', '267', '化德县', '0,1,19,267', '2234', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2235', '267', '集宁区', '0,1,19,267', '2235', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2236', '267', '丰镇市', '0,1,19,267', '2236', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2237', '267', '卓资县', '0,1,19,267', '2237', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2238', '267', '商都县', '0,1,19,267', '2238', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2239', '267', '兴和县', '0,1,19,267', '2239', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2240', '267', '凉城县', '0,1,19,267', '2240', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2241', '267', '察哈尔右翼前旗', '0,1,19,267', '2241', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2242', '267', '察哈尔右翼中旗', '0,1,19,267', '2242', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2243', '267', '察哈尔右翼后旗', '0,1,19,267', '2243', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2244', '267', '四子王旗', '0,1,19,267', '2244', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2245', '268', '二连浩特市', '0,1,19,268', '2245', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2246', '268', '锡林浩特市', '0,1,19,268', '2246', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2247', '268', '阿巴嘎旗', '0,1,19,268', '2247', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2248', '268', '苏尼特左旗', '0,1,19,268', '2248', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2249', '268', '苏尼特右旗', '0,1,19,268', '2249', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2250', '268', '东乌珠穆沁旗', '0,1,19,268', '2250', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2251', '268', '西乌珠穆沁旗', '0,1,19,268', '2251', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2252', '268', '太仆寺旗', '0,1,19,268', '2252', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2253', '268', '镶黄旗', '0,1,19,268', '2253', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2254', '268', '正镶白旗', '0,1,19,268', '2254', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2255', '268', '正蓝旗', '0,1,19,268', '2255', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2256', '268', '多伦县', '0,1,19,268', '2256', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2257', '269', '乌兰浩特市', '0,1,19,269', '2257', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2258', '269', '阿尔山市', '0,1,19,269', '2258', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2259', '269', '科尔沁右翼前旗', '0,1,19,269', '2259', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2260', '269', '科尔沁右翼中旗', '0,1,19,269', '2260', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2261', '269', '扎赉特旗', '0,1,19,269', '2261', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2262', '269', '突泉县', '0,1,19,269', '2262', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2263', '270', '西夏区', '0,1,20,270', '2263', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2264', '270', '金凤区', '0,1,20,270', '2264', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2265', '270', '兴庆区', '0,1,20,270', '2265', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2266', '270', '灵武市', '0,1,20,270', '2266', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2267', '270', '永宁县', '0,1,20,270', '2267', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2268', '270', '贺兰县', '0,1,20,270', '2268', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2269', '271', '原州区', '0,1,20,271', '2269', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2270', '271', '海原县', '0,1,20,271', '2270', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2271', '271', '西吉县', '0,1,20,271', '2271', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2272', '271', '隆德县', '0,1,20,271', '2272', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2273', '271', '泾源县', '0,1,20,271', '2273', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2274', '271', '彭阳县', '0,1,20,271', '2274', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2275', '272', '惠农县', '0,1,20,272', '2275', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2276', '272', '大武口区', '0,1,20,272', '2276', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2277', '272', '惠农区', '0,1,20,272', '2277', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2278', '272', '陶乐县', '0,1,20,272', '2278', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2279', '272', '平罗县', '0,1,20,272', '2279', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2280', '273', '利通区', '0,1,20,273', '2280', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2281', '273', '中卫县', '0,1,20,273', '2281', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2282', '273', '青铜峡市', '0,1,20,273', '2282', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2283', '273', '中宁县', '0,1,20,273', '2283', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2284', '273', '盐池县', '0,1,20,273', '2284', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2285', '273', '同心县', '0,1,20,273', '2285', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2286', '274', '沙坡头区', '0,1,20,274', '2286', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2287', '274', '海原县', '0,1,20,274', '2287', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2288', '274', '中宁县', '0,1,20,274', '2288', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2289', '275', '城中区', '0,1,21,275', '2289', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2290', '275', '城东区', '0,1,21,275', '2290', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2291', '275', '城西区', '0,1,21,275', '2291', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2292', '275', '城北区', '0,1,21,275', '2292', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2293', '275', '湟中县', '0,1,21,275', '2293', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2294', '275', '湟源县', '0,1,21,275', '2294', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2295', '275', '大通', '0,1,21,275', '2295', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2296', '276', '玛沁县', '0,1,21,276', '2296', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2297', '276', '班玛县', '0,1,21,276', '2297', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2298', '276', '甘德县', '0,1,21,276', '2298', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2299', '276', '达日县', '0,1,21,276', '2299', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2300', '276', '久治县', '0,1,21,276', '2300', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2301', '276', '玛多县', '0,1,21,276', '2301', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2302', '277', '海晏县', '0,1,21,277', '2302', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2303', '277', '祁连县', '0,1,21,277', '2303', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2304', '277', '刚察县', '0,1,21,277', '2304', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2305', '277', '门源', '0,1,21,277', '2305', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2306', '278', '平安县', '0,1,21,278', '2306', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2307', '278', '乐都县', '0,1,21,278', '2307', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2308', '278', '民和', '0,1,21,278', '2308', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2309', '278', '互助', '0,1,21,278', '2309', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2310', '278', '化隆', '0,1,21,278', '2310', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2311', '278', '循化', '0,1,21,278', '2311', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2312', '279', '共和县', '0,1,21,279', '2312', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2313', '279', '同德县', '0,1,21,279', '2313', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2314', '279', '贵德县', '0,1,21,279', '2314', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2315', '279', '兴海县', '0,1,21,279', '2315', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2316', '279', '贵南县', '0,1,21,279', '2316', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2317', '280', '德令哈市', '0,1,21,280', '2317', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2318', '280', '格尔木市', '0,1,21,280', '2318', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2319', '280', '乌兰县', '0,1,21,280', '2319', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2320', '280', '都兰县', '0,1,21,280', '2320', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2321', '280', '天峻县', '0,1,21,280', '2321', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2322', '281', '同仁县', '0,1,21,281', '2322', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2323', '281', '尖扎县', '0,1,21,281', '2323', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2324', '281', '泽库县', '0,1,21,281', '2324', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2325', '281', '河南蒙古族自治县', '0,1,21,281', '2325', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2326', '282', '玉树县', '0,1,21,282', '2326', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2327', '282', '杂多县', '0,1,21,282', '2327', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2328', '282', '称多县', '0,1,21,282', '2328', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2329', '282', '治多县', '0,1,21,282', '2329', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2330', '282', '囊谦县', '0,1,21,282', '2330', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2331', '282', '曲麻莱县', '0,1,21,282', '2331', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2332', '283', '市中区', '0,1,22,283', '2332', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2333', '283', '历下区', '0,1,22,283', '2333', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2334', '283', '天桥区', '0,1,22,283', '2334', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2335', '283', '槐荫区', '0,1,22,283', '2335', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2336', '283', '历城区', '0,1,22,283', '2336', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2337', '283', '长清区', '0,1,22,283', '2337', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2338', '283', '章丘市', '0,1,22,283', '2338', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2339', '283', '平阴县', '0,1,22,283', '2339', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2340', '283', '济阳县', '0,1,22,283', '2340', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2341', '283', '商河县', '0,1,22,283', '2341', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2342', '284', '市南区', '0,1,22,284', '2342', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2343', '284', '市北区', '0,1,22,284', '2343', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2344', '284', '城阳区', '0,1,22,284', '2344', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2345', '284', '四方区', '0,1,22,284', '2345', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2346', '284', '李沧区', '0,1,22,284', '2346', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2347', '284', '黄岛区', '0,1,22,284', '2347', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2348', '284', '崂山区', '0,1,22,284', '2348', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2349', '284', '胶州市', '0,1,22,284', '2349', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2350', '284', '即墨市', '0,1,22,284', '2350', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2351', '284', '平度市', '0,1,22,284', '2351', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2352', '284', '胶南市', '0,1,22,284', '2352', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2353', '284', '莱西市', '0,1,22,284', '2353', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2354', '285', '滨城区', '0,1,22,285', '2354', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2355', '285', '惠民县', '0,1,22,285', '2355', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2356', '285', '阳信县', '0,1,22,285', '2356', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2357', '285', '无棣县', '0,1,22,285', '2357', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2358', '285', '沾化县', '0,1,22,285', '2358', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2359', '285', '博兴县', '0,1,22,285', '2359', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2360', '285', '邹平县', '0,1,22,285', '2360', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2361', '286', '德城区', '0,1,22,286', '2361', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2362', '286', '陵县', '0,1,22,286', '2362', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2363', '286', '乐陵市', '0,1,22,286', '2363', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2364', '286', '禹城市', '0,1,22,286', '2364', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2365', '286', '宁津县', '0,1,22,286', '2365', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2366', '286', '庆云县', '0,1,22,286', '2366', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2367', '286', '临邑县', '0,1,22,286', '2367', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2368', '286', '齐河县', '0,1,22,286', '2368', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2369', '286', '平原县', '0,1,22,286', '2369', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2370', '286', '夏津县', '0,1,22,286', '2370', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2371', '286', '武城县', '0,1,22,286', '2371', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2372', '287', '东营区', '0,1,22,287', '2372', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2373', '287', '河口区', '0,1,22,287', '2373', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2374', '287', '垦利县', '0,1,22,287', '2374', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2375', '287', '利津县', '0,1,22,287', '2375', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2376', '287', '广饶县', '0,1,22,287', '2376', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2377', '288', '牡丹区', '0,1,22,288', '2377', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2378', '288', '曹县', '0,1,22,288', '2378', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2379', '288', '单县', '0,1,22,288', '2379', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2380', '288', '成武县', '0,1,22,288', '2380', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2381', '288', '巨野县', '0,1,22,288', '2381', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2382', '288', '郓城县', '0,1,22,288', '2382', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2383', '288', '鄄城县', '0,1,22,288', '2383', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2384', '288', '定陶县', '0,1,22,288', '2384', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2385', '288', '东明县', '0,1,22,288', '2385', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2386', '289', '市中区', '0,1,22,289', '2386', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2387', '289', '任城区', '0,1,22,289', '2387', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2388', '289', '曲阜市', '0,1,22,289', '2388', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2389', '289', '兖州市', '0,1,22,289', '2389', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2390', '289', '邹城市', '0,1,22,289', '2390', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2391', '289', '微山县', '0,1,22,289', '2391', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2392', '289', '鱼台县', '0,1,22,289', '2392', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2393', '289', '金乡县', '0,1,22,289', '2393', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2394', '289', '嘉祥县', '0,1,22,289', '2394', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2395', '289', '汶上县', '0,1,22,289', '2395', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2396', '289', '泗水县', '0,1,22,289', '2396', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2397', '289', '梁山县', '0,1,22,289', '2397', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2398', '290', '莱城区', '0,1,22,290', '2398', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2399', '290', '钢城区', '0,1,22,290', '2399', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2400', '291', '东昌府区', '0,1,22,291', '2400', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2401', '291', '临清市', '0,1,22,291', '2401', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2402', '291', '阳谷县', '0,1,22,291', '2402', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2403', '291', '莘县', '0,1,22,291', '2403', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2404', '291', '茌平县', '0,1,22,291', '2404', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2405', '291', '东阿县', '0,1,22,291', '2405', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2406', '291', '冠县', '0,1,22,291', '2406', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2407', '291', '高唐县', '0,1,22,291', '2407', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2408', '292', '兰山区', '0,1,22,292', '2408', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2409', '292', '罗庄区', '0,1,22,292', '2409', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2410', '292', '河东区', '0,1,22,292', '2410', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2411', '292', '沂南县', '0,1,22,292', '2411', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2412', '292', '郯城县', '0,1,22,292', '2412', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2413', '292', '沂水县', '0,1,22,292', '2413', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2414', '292', '苍山县', '0,1,22,292', '2414', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2415', '292', '费县', '0,1,22,292', '2415', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2416', '292', '平邑县', '0,1,22,292', '2416', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2417', '292', '莒南县', '0,1,22,292', '2417', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2418', '292', '蒙阴县', '0,1,22,292', '2418', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2419', '292', '临沭县', '0,1,22,292', '2419', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2420', '293', '东港区', '0,1,22,293', '2420', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2421', '293', '岚山区', '0,1,22,293', '2421', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2422', '293', '五莲县', '0,1,22,293', '2422', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2423', '293', '莒县', '0,1,22,293', '2423', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2424', '294', '泰山区', '0,1,22,294', '2424', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2425', '294', '岱岳区', '0,1,22,294', '2425', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2426', '294', '新泰市', '0,1,22,294', '2426', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2427', '294', '肥城市', '0,1,22,294', '2427', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2428', '294', '宁阳县', '0,1,22,294', '2428', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2429', '294', '东平县', '0,1,22,294', '2429', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2430', '295', '荣成市', '0,1,22,295', '2430', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2431', '295', '乳山市', '0,1,22,295', '2431', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2432', '295', '环翠区', '0,1,22,295', '2432', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2433', '295', '文登市', '0,1,22,295', '2433', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2434', '296', '潍城区', '0,1,22,296', '2434', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2435', '296', '寒亭区', '0,1,22,296', '2435', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2436', '296', '坊子区', '0,1,22,296', '2436', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2437', '296', '奎文区', '0,1,22,296', '2437', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2438', '296', '青州市', '0,1,22,296', '2438', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2439', '296', '诸城市', '0,1,22,296', '2439', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2440', '296', '寿光市', '0,1,22,296', '2440', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2441', '296', '安丘市', '0,1,22,296', '2441', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2442', '296', '高密市', '0,1,22,296', '2442', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2443', '296', '昌邑市', '0,1,22,296', '2443', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2444', '296', '临朐县', '0,1,22,296', '2444', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2445', '296', '昌乐县', '0,1,22,296', '2445', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2446', '297', '芝罘区', '0,1,22,297', '2446', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2447', '297', '福山区', '0,1,22,297', '2447', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2448', '297', '牟平区', '0,1,22,297', '2448', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2449', '297', '莱山区', '0,1,22,297', '2449', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2450', '297', '开发区', '0,1,22,297', '2450', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2451', '297', '龙口市', '0,1,22,297', '2451', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2452', '297', '莱阳市', '0,1,22,297', '2452', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2453', '297', '莱州市', '0,1,22,297', '2453', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2454', '297', '蓬莱市', '0,1,22,297', '2454', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2455', '297', '招远市', '0,1,22,297', '2455', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2456', '297', '栖霞市', '0,1,22,297', '2456', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2457', '297', '海阳市', '0,1,22,297', '2457', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2458', '297', '长岛县', '0,1,22,297', '2458', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2459', '298', '市中区', '0,1,22,298', '2459', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2460', '298', '山亭区', '0,1,22,298', '2460', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2461', '298', '峄城区', '0,1,22,298', '2461', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2462', '298', '台儿庄区', '0,1,22,298', '2462', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2463', '298', '薛城区', '0,1,22,298', '2463', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2464', '298', '滕州市', '0,1,22,298', '2464', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2465', '299', '张店区', '0,1,22,299', '2465', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2466', '299', '临淄区', '0,1,22,299', '2466', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2467', '299', '淄川区', '0,1,22,299', '2467', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2468', '299', '博山区', '0,1,22,299', '2468', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2469', '299', '周村区', '0,1,22,299', '2469', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2470', '299', '桓台县', '0,1,22,299', '2470', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2471', '299', '高青县', '0,1,22,299', '2471', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2472', '299', '沂源县', '0,1,22,299', '2472', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2473', '300', '杏花岭区', '0,1,23,300', '2473', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2474', '300', '小店区', '0,1,23,300', '2474', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2475', '300', '迎泽区', '0,1,23,300', '2475', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2476', '300', '尖草坪区', '0,1,23,300', '2476', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2477', '300', '万柏林区', '0,1,23,300', '2477', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2478', '300', '晋源区', '0,1,23,300', '2478', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2479', '300', '高新开发区', '0,1,23,300', '2479', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2480', '300', '民营经济开发区', '0,1,23,300', '2480', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2481', '300', '经济技术开发区', '0,1,23,300', '2481', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2482', '300', '清徐县', '0,1,23,300', '2482', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2483', '300', '阳曲县', '0,1,23,300', '2483', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2484', '300', '娄烦县', '0,1,23,300', '2484', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2485', '300', '古交市', '0,1,23,300', '2485', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2486', '301', '城区', '0,1,23,301', '2486', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2487', '301', '郊区', '0,1,23,301', '2487', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2488', '301', '沁县', '0,1,23,301', '2488', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2489', '301', '潞城市', '0,1,23,301', '2489', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2490', '301', '长治县', '0,1,23,301', '2490', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2491', '301', '襄垣县', '0,1,23,301', '2491', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2492', '301', '屯留县', '0,1,23,301', '2492', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2493', '301', '平顺县', '0,1,23,301', '2493', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2494', '301', '黎城县', '0,1,23,301', '2494', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2495', '301', '壶关县', '0,1,23,301', '2495', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2496', '301', '长子县', '0,1,23,301', '2496', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2497', '301', '武乡县', '0,1,23,301', '2497', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2498', '301', '沁源县', '0,1,23,301', '2498', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2499', '302', '城区', '0,1,23,302', '2499', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2500', '302', '矿区', '0,1,23,302', '2500', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2501', '302', '南郊区', '0,1,23,302', '2501', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2502', '302', '新荣区', '0,1,23,302', '2502', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2503', '302', '阳高县', '0,1,23,302', '2503', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2504', '302', '天镇县', '0,1,23,302', '2504', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2505', '302', '广灵县', '0,1,23,302', '2505', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2506', '302', '灵丘县', '0,1,23,302', '2506', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2507', '302', '浑源县', '0,1,23,302', '2507', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2508', '302', '左云县', '0,1,23,302', '2508', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2509', '302', '大同县', '0,1,23,302', '2509', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2510', '303', '城区', '0,1,23,303', '2510', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2511', '303', '高平市', '0,1,23,303', '2511', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2512', '303', '沁水县', '0,1,23,303', '2512', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2513', '303', '阳城县', '0,1,23,303', '2513', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2514', '303', '陵川县', '0,1,23,303', '2514', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2515', '303', '泽州县', '0,1,23,303', '2515', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2516', '304', '榆次区', '0,1,23,304', '2516', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2517', '304', '介休市', '0,1,23,304', '2517', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2518', '304', '榆社县', '0,1,23,304', '2518', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2519', '304', '左权县', '0,1,23,304', '2519', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2520', '304', '和顺县', '0,1,23,304', '2520', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2521', '304', '昔阳县', '0,1,23,304', '2521', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2522', '304', '寿阳县', '0,1,23,304', '2522', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2523', '304', '太谷县', '0,1,23,304', '2523', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2524', '304', '祁县', '0,1,23,304', '2524', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2525', '304', '平遥县', '0,1,23,304', '2525', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2526', '304', '灵石县', '0,1,23,304', '2526', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2527', '305', '尧都区', '0,1,23,305', '2527', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2528', '305', '侯马市', '0,1,23,305', '2528', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2529', '305', '霍州市', '0,1,23,305', '2529', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2530', '305', '曲沃县', '0,1,23,305', '2530', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2531', '305', '翼城县', '0,1,23,305', '2531', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2532', '305', '襄汾县', '0,1,23,305', '2532', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2533', '305', '洪洞县', '0,1,23,305', '2533', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2534', '305', '吉县', '0,1,23,305', '2534', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2535', '305', '安泽县', '0,1,23,305', '2535', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2536', '305', '浮山县', '0,1,23,305', '2536', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2537', '305', '古县', '0,1,23,305', '2537', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2538', '305', '乡宁县', '0,1,23,305', '2538', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2539', '305', '大宁县', '0,1,23,305', '2539', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2540', '305', '隰县', '0,1,23,305', '2540', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2541', '305', '永和县', '0,1,23,305', '2541', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2542', '305', '蒲县', '0,1,23,305', '2542', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2543', '305', '汾西县', '0,1,23,305', '2543', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2544', '306', '离石市', '0,1,23,306', '2544', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2545', '306', '离石区', '0,1,23,306', '2545', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2546', '306', '孝义市', '0,1,23,306', '2546', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2547', '306', '汾阳市', '0,1,23,306', '2547', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2548', '306', '文水县', '0,1,23,306', '2548', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2549', '306', '交城县', '0,1,23,306', '2549', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2550', '306', '兴县', '0,1,23,306', '2550', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2551', '306', '临县', '0,1,23,306', '2551', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2552', '306', '柳林县', '0,1,23,306', '2552', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2553', '306', '石楼县', '0,1,23,306', '2553', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2554', '306', '岚县', '0,1,23,306', '2554', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2555', '306', '方山县', '0,1,23,306', '2555', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2556', '306', '中阳县', '0,1,23,306', '2556', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2557', '306', '交口县', '0,1,23,306', '2557', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2558', '307', '朔城区', '0,1,23,307', '2558', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2559', '307', '平鲁区', '0,1,23,307', '2559', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2560', '307', '山阴县', '0,1,23,307', '2560', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2561', '307', '应县', '0,1,23,307', '2561', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2562', '307', '右玉县', '0,1,23,307', '2562', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2563', '307', '怀仁县', '0,1,23,307', '2563', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2564', '308', '忻府区', '0,1,23,308', '2564', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2565', '308', '原平市', '0,1,23,308', '2565', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2566', '308', '定襄县', '0,1,23,308', '2566', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2567', '308', '五台县', '0,1,23,308', '2567', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2568', '308', '代县', '0,1,23,308', '2568', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2569', '308', '繁峙县', '0,1,23,308', '2569', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2570', '308', '宁武县', '0,1,23,308', '2570', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2571', '308', '静乐县', '0,1,23,308', '2571', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2572', '308', '神池县', '0,1,23,308', '2572', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2573', '308', '五寨县', '0,1,23,308', '2573', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2574', '308', '岢岚县', '0,1,23,308', '2574', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2575', '308', '河曲县', '0,1,23,308', '2575', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2576', '308', '保德县', '0,1,23,308', '2576', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2577', '308', '偏关县', '0,1,23,308', '2577', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2578', '309', '城区', '0,1,23,309', '2578', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2579', '309', '矿区', '0,1,23,309', '2579', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2580', '309', '郊区', '0,1,23,309', '2580', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2581', '309', '平定县', '0,1,23,309', '2581', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2582', '309', '盂县', '0,1,23,309', '2582', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2583', '310', '盐湖区', '0,1,23,310', '2583', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2584', '310', '永济市', '0,1,23,310', '2584', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2585', '310', '河津市', '0,1,23,310', '2585', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2586', '310', '临猗县', '0,1,23,310', '2586', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2587', '310', '万荣县', '0,1,23,310', '2587', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2588', '310', '闻喜县', '0,1,23,310', '2588', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2589', '310', '稷山县', '0,1,23,310', '2589', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2590', '310', '新绛县', '0,1,23,310', '2590', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2591', '310', '绛县', '0,1,23,310', '2591', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2592', '310', '垣曲县', '0,1,23,310', '2592', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2593', '310', '夏县', '0,1,23,310', '2593', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2594', '310', '平陆县', '0,1,23,310', '2594', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2595', '310', '芮城县', '0,1,23,310', '2595', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2596', '311', '莲湖区', '0,1,24,311', '2596', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2597', '311', '新城区', '0,1,24,311', '2597', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2598', '311', '碑林区', '0,1,24,311', '2598', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2599', '311', '雁塔区', '0,1,24,311', '2599', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2600', '311', '灞桥区', '0,1,24,311', '2600', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2601', '311', '未央区', '0,1,24,311', '2601', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2602', '311', '阎良区', '0,1,24,311', '2602', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2603', '311', '临潼区', '0,1,24,311', '2603', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2604', '311', '长安区', '0,1,24,311', '2604', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2605', '311', '蓝田县', '0,1,24,311', '2605', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2606', '311', '周至县', '0,1,24,311', '2606', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2607', '311', '户县', '0,1,24,311', '2607', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2608', '311', '高陵县', '0,1,24,311', '2608', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2609', '312', '汉滨区', '0,1,24,312', '2609', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2610', '312', '汉阴县', '0,1,24,312', '2610', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2611', '312', '石泉县', '0,1,24,312', '2611', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2612', '312', '宁陕县', '0,1,24,312', '2612', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2613', '312', '紫阳县', '0,1,24,312', '2613', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2614', '312', '岚皋县', '0,1,24,312', '2614', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2615', '312', '平利县', '0,1,24,312', '2615', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2616', '312', '镇坪县', '0,1,24,312', '2616', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2617', '312', '旬阳县', '0,1,24,312', '2617', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2618', '312', '白河县', '0,1,24,312', '2618', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2619', '313', '陈仓区', '0,1,24,313', '2619', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2620', '313', '渭滨区', '0,1,24,313', '2620', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2621', '313', '金台区', '0,1,24,313', '2621', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2622', '313', '凤翔县', '0,1,24,313', '2622', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2623', '313', '岐山县', '0,1,24,313', '2623', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2624', '313', '扶风县', '0,1,24,313', '2624', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2625', '313', '眉县', '0,1,24,313', '2625', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2626', '313', '陇县', '0,1,24,313', '2626', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2627', '313', '千阳县', '0,1,24,313', '2627', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2628', '313', '麟游县', '0,1,24,313', '2628', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2629', '313', '凤县', '0,1,24,313', '2629', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2630', '313', '太白县', '0,1,24,313', '2630', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2631', '314', '汉台区', '0,1,24,314', '2631', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2632', '314', '南郑县', '0,1,24,314', '2632', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2633', '314', '城固县', '0,1,24,314', '2633', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2634', '314', '洋县', '0,1,24,314', '2634', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2635', '314', '西乡县', '0,1,24,314', '2635', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2636', '314', '勉县', '0,1,24,314', '2636', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2637', '314', '宁强县', '0,1,24,314', '2637', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2638', '314', '略阳县', '0,1,24,314', '2638', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2639', '314', '镇巴县', '0,1,24,314', '2639', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2640', '314', '留坝县', '0,1,24,314', '2640', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2641', '314', '佛坪县', '0,1,24,314', '2641', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2642', '315', '商州区', '0,1,24,315', '2642', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2643', '315', '洛南县', '0,1,24,315', '2643', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2644', '315', '丹凤县', '0,1,24,315', '2644', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2645', '315', '商南县', '0,1,24,315', '2645', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2646', '315', '山阳县', '0,1,24,315', '2646', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2647', '315', '镇安县', '0,1,24,315', '2647', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2648', '315', '柞水县', '0,1,24,315', '2648', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2649', '316', '耀州区', '0,1,24,316', '2649', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2650', '316', '王益区', '0,1,24,316', '2650', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2651', '316', '印台区', '0,1,24,316', '2651', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2652', '316', '宜君县', '0,1,24,316', '2652', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2653', '317', '临渭区', '0,1,24,317', '2653', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2654', '317', '韩城市', '0,1,24,317', '2654', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2655', '317', '华阴市', '0,1,24,317', '2655', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2656', '317', '华县', '0,1,24,317', '2656', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2657', '317', '潼关县', '0,1,24,317', '2657', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2658', '317', '大荔县', '0,1,24,317', '2658', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2659', '317', '合阳县', '0,1,24,317', '2659', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2660', '317', '澄城县', '0,1,24,317', '2660', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2661', '317', '蒲城县', '0,1,24,317', '2661', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2662', '317', '白水县', '0,1,24,317', '2662', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2663', '317', '富平县', '0,1,24,317', '2663', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2664', '318', '秦都区', '0,1,24,318', '2664', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2665', '318', '渭城区', '0,1,24,318', '2665', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2666', '318', '杨陵区', '0,1,24,318', '2666', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2667', '318', '兴平市', '0,1,24,318', '2667', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2668', '318', '三原县', '0,1,24,318', '2668', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2669', '318', '泾阳县', '0,1,24,318', '2669', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2670', '318', '乾县', '0,1,24,318', '2670', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2671', '318', '礼泉县', '0,1,24,318', '2671', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2672', '318', '永寿县', '0,1,24,318', '2672', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2673', '318', '彬县', '0,1,24,318', '2673', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2674', '318', '长武县', '0,1,24,318', '2674', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2675', '318', '旬邑县', '0,1,24,318', '2675', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2676', '318', '淳化县', '0,1,24,318', '2676', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2677', '318', '武功县', '0,1,24,318', '2677', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2678', '319', '吴起县', '0,1,24,319', '2678', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2679', '319', '宝塔区', '0,1,24,319', '2679', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2680', '319', '延长县', '0,1,24,319', '2680', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2681', '319', '延川县', '0,1,24,319', '2681', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2682', '319', '子长县', '0,1,24,319', '2682', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2683', '319', '安塞县', '0,1,24,319', '2683', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2684', '319', '志丹县', '0,1,24,319', '2684', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2685', '319', '甘泉县', '0,1,24,319', '2685', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2686', '319', '富县', '0,1,24,319', '2686', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2687', '319', '洛川县', '0,1,24,319', '2687', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2688', '319', '宜川县', '0,1,24,319', '2688', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2689', '319', '黄龙县', '0,1,24,319', '2689', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2690', '319', '黄陵县', '0,1,24,319', '2690', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2691', '320', '榆阳区', '0,1,24,320', '2691', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2692', '320', '神木县', '0,1,24,320', '2692', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2693', '320', '府谷县', '0,1,24,320', '2693', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2694', '320', '横山县', '0,1,24,320', '2694', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2695', '320', '靖边县', '0,1,24,320', '2695', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2696', '320', '定边县', '0,1,24,320', '2696', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2697', '320', '绥德县', '0,1,24,320', '2697', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2698', '320', '米脂县', '0,1,24,320', '2698', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2699', '320', '佳县', '0,1,24,320', '2699', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2700', '320', '吴堡县', '0,1,24,320', '2700', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2701', '320', '清涧县', '0,1,24,320', '2701', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2702', '320', '子洲县', '0,1,24,320', '2702', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2703', '25', '长宁区', '0,1,25', '2703', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2704', '25', '闸北区', '0,1,25', '2704', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2705', '25', '闵行区', '0,1,25', '2705', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2706', '25', '徐汇区', '0,1,25', '2706', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2707', '25', '浦东新区', '0,1,25', '2707', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2708', '25', '杨浦区', '0,1,25', '2708', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2709', '25', '普陀区', '0,1,25', '2709', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2710', '25', '静安区', '0,1,25', '2710', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2711', '25', '卢湾区', '0,1,25', '2711', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2712', '25', '虹口区', '0,1,25', '2712', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2713', '25', '黄浦区', '0,1,25', '2713', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2714', '25', '南汇区', '0,1,25', '2714', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2715', '25', '松江区', '0,1,25', '2715', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2716', '25', '嘉定区', '0,1,25', '2716', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2717', '25', '宝山区', '0,1,25', '2717', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2718', '25', '青浦区', '0,1,25', '2718', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2719', '25', '金山区', '0,1,25', '2719', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2720', '25', '奉贤区', '0,1,25', '2720', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2721', '25', '崇明县', '0,1,25', '2721', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2722', '322', '青羊区', '0,1,26,322', '2722', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2723', '322', '锦江区', '0,1,26,322', '2723', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2724', '322', '金牛区', '0,1,26,322', '2724', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2725', '322', '武侯区', '0,1,26,322', '2725', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2726', '322', '成华区', '0,1,26,322', '2726', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2727', '322', '龙泉驿区', '0,1,26,322', '2727', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2728', '322', '青白江区', '0,1,26,322', '2728', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2729', '322', '新都区', '0,1,26,322', '2729', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2730', '322', '温江区', '0,1,26,322', '2730', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2731', '322', '高新区', '0,1,26,322', '2731', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2732', '322', '高新西区', '0,1,26,322', '2732', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2733', '322', '都江堰市', '0,1,26,322', '2733', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2734', '322', '彭州市', '0,1,26,322', '2734', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2735', '322', '邛崃市', '0,1,26,322', '2735', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2736', '322', '崇州市', '0,1,26,322', '2736', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2737', '322', '金堂县', '0,1,26,322', '2737', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2738', '322', '双流县', '0,1,26,322', '2738', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2739', '322', '郫县', '0,1,26,322', '2739', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2740', '322', '大邑县', '0,1,26,322', '2740', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2741', '322', '蒲江县', '0,1,26,322', '2741', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2742', '322', '新津县', '0,1,26,322', '2742', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2743', '322', '都江堰市', '0,1,26,322', '2743', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2744', '322', '彭州市', '0,1,26,322', '2744', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2745', '322', '邛崃市', '0,1,26,322', '2745', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2746', '322', '崇州市', '0,1,26,322', '2746', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2747', '322', '金堂县', '0,1,26,322', '2747', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2748', '322', '双流县', '0,1,26,322', '2748', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2749', '322', '郫县', '0,1,26,322', '2749', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2750', '322', '大邑县', '0,1,26,322', '2750', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2751', '322', '蒲江县', '0,1,26,322', '2751', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2752', '322', '新津县', '0,1,26,322', '2752', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2753', '323', '涪城区', '0,1,26,323', '2753', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2754', '323', '游仙区', '0,1,26,323', '2754', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2755', '323', '江油市', '0,1,26,323', '2755', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2756', '323', '盐亭县', '0,1,26,323', '2756', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2757', '323', '三台县', '0,1,26,323', '2757', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2758', '323', '平武县', '0,1,26,323', '2758', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2759', '323', '安县', '0,1,26,323', '2759', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2760', '323', '梓潼县', '0,1,26,323', '2760', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2761', '323', '北川县', '0,1,26,323', '2761', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2762', '324', '马尔康县', '0,1,26,324', '2762', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2763', '324', '汶川县', '0,1,26,324', '2763', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2764', '324', '理县', '0,1,26,324', '2764', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2765', '324', '茂县', '0,1,26,324', '2765', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2766', '324', '松潘县', '0,1,26,324', '2766', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2767', '324', '九寨沟县', '0,1,26,324', '2767', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2768', '324', '金川县', '0,1,26,324', '2768', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2769', '324', '小金县', '0,1,26,324', '2769', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2770', '324', '黑水县', '0,1,26,324', '2770', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2771', '324', '壤塘县', '0,1,26,324', '2771', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2772', '324', '阿坝县', '0,1,26,324', '2772', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2773', '324', '若尔盖县', '0,1,26,324', '2773', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2774', '324', '红原县', '0,1,26,324', '2774', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2775', '325', '巴州区', '0,1,26,325', '2775', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2776', '325', '通江县', '0,1,26,325', '2776', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2777', '325', '南江县', '0,1,26,325', '2777', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2778', '325', '平昌县', '0,1,26,325', '2778', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2779', '326', '通川区', '0,1,26,326', '2779', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2780', '326', '万源市', '0,1,26,326', '2780', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2781', '326', '达县', '0,1,26,326', '2781', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2782', '326', '宣汉县', '0,1,26,326', '2782', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2783', '326', '开江县', '0,1,26,326', '2783', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2784', '326', '大竹县', '0,1,26,326', '2784', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2785', '326', '渠县', '0,1,26,326', '2785', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2786', '327', '旌阳区', '0,1,26,327', '2786', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2787', '327', '广汉市', '0,1,26,327', '2787', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2788', '327', '什邡市', '0,1,26,327', '2788', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2789', '327', '绵竹市', '0,1,26,327', '2789', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2790', '327', '罗江县', '0,1,26,327', '2790', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2791', '327', '中江县', '0,1,26,327', '2791', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2792', '328', '康定县', '0,1,26,328', '2792', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2793', '328', '丹巴县', '0,1,26,328', '2793', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2794', '328', '泸定县', '0,1,26,328', '2794', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2795', '328', '炉霍县', '0,1,26,328', '2795', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2796', '328', '九龙县', '0,1,26,328', '2796', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2797', '328', '甘孜县', '0,1,26,328', '2797', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2798', '328', '雅江县', '0,1,26,328', '2798', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2799', '328', '新龙县', '0,1,26,328', '2799', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2800', '328', '道孚县', '0,1,26,328', '2800', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2801', '328', '白玉县', '0,1,26,328', '2801', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2802', '328', '理塘县', '0,1,26,328', '2802', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2803', '328', '德格县', '0,1,26,328', '2803', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2804', '328', '乡城县', '0,1,26,328', '2804', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2805', '328', '石渠县', '0,1,26,328', '2805', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2806', '328', '稻城县', '0,1,26,328', '2806', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2807', '328', '色达县', '0,1,26,328', '2807', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2808', '328', '巴塘县', '0,1,26,328', '2808', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2809', '328', '得荣县', '0,1,26,328', '2809', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2810', '329', '广安区', '0,1,26,329', '2810', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2811', '329', '华蓥市', '0,1,26,329', '2811', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2812', '329', '岳池县', '0,1,26,329', '2812', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2813', '329', '武胜县', '0,1,26,329', '2813', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2814', '329', '邻水县', '0,1,26,329', '2814', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2815', '330', '利州区', '0,1,26,330', '2815', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2816', '330', '元坝区', '0,1,26,330', '2816', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2817', '330', '朝天区', '0,1,26,330', '2817', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2818', '330', '旺苍县', '0,1,26,330', '2818', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2819', '330', '青川县', '0,1,26,330', '2819', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2820', '330', '剑阁县', '0,1,26,330', '2820', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2821', '330', '苍溪县', '0,1,26,330', '2821', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2822', '331', '峨眉山市', '0,1,26,331', '2822', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2823', '331', '乐山市', '0,1,26,331', '2823', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2824', '331', '犍为县', '0,1,26,331', '2824', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2825', '331', '井研县', '0,1,26,331', '2825', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2826', '331', '夹江县', '0,1,26,331', '2826', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2827', '331', '沐川县', '0,1,26,331', '2827', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2828', '331', '峨边', '0,1,26,331', '2828', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2829', '331', '马边', '0,1,26,331', '2829', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2830', '332', '西昌市', '0,1,26,332', '2830', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2831', '332', '盐源县', '0,1,26,332', '2831', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2832', '332', '德昌县', '0,1,26,332', '2832', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2833', '332', '会理县', '0,1,26,332', '2833', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2834', '332', '会东县', '0,1,26,332', '2834', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2835', '332', '宁南县', '0,1,26,332', '2835', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2836', '332', '普格县', '0,1,26,332', '2836', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2837', '332', '布拖县', '0,1,26,332', '2837', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2838', '332', '金阳县', '0,1,26,332', '2838', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2839', '332', '昭觉县', '0,1,26,332', '2839', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2840', '332', '喜德县', '0,1,26,332', '2840', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2841', '332', '冕宁县', '0,1,26,332', '2841', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2842', '332', '越西县', '0,1,26,332', '2842', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2843', '332', '甘洛县', '0,1,26,332', '2843', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2844', '332', '美姑县', '0,1,26,332', '2844', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2845', '332', '雷波县', '0,1,26,332', '2845', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2846', '332', '木里', '0,1,26,332', '2846', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2847', '333', '东坡区', '0,1,26,333', '2847', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2848', '333', '仁寿县', '0,1,26,333', '2848', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2849', '333', '彭山县', '0,1,26,333', '2849', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2850', '333', '洪雅县', '0,1,26,333', '2850', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2851', '333', '丹棱县', '0,1,26,333', '2851', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2852', '333', '青神县', '0,1,26,333', '2852', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2853', '334', '阆中市', '0,1,26,334', '2853', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2854', '334', '南部县', '0,1,26,334', '2854', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2855', '334', '营山县', '0,1,26,334', '2855', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2856', '334', '蓬安县', '0,1,26,334', '2856', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2857', '334', '仪陇县', '0,1,26,334', '2857', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2858', '334', '顺庆区', '0,1,26,334', '2858', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2859', '334', '高坪区', '0,1,26,334', '2859', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2860', '334', '嘉陵区', '0,1,26,334', '2860', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2861', '334', '西充县', '0,1,26,334', '2861', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2862', '335', '市中区', '0,1,26,335', '2862', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2863', '335', '东兴区', '0,1,26,335', '2863', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2864', '335', '威远县', '0,1,26,335', '2864', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2865', '335', '资中县', '0,1,26,335', '2865', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2866', '335', '隆昌县', '0,1,26,335', '2866', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2867', '336', '东  区', '0,1,26,336', '2867', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2868', '336', '西  区', '0,1,26,336', '2868', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2869', '336', '仁和区', '0,1,26,336', '2869', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2870', '336', '米易县', '0,1,26,336', '2870', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2871', '336', '盐边县', '0,1,26,336', '2871', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2872', '337', '船山区', '0,1,26,337', '2872', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2873', '337', '安居区', '0,1,26,337', '2873', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2874', '337', '蓬溪县', '0,1,26,337', '2874', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2875', '337', '射洪县', '0,1,26,337', '2875', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2876', '337', '大英县', '0,1,26,337', '2876', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2877', '338', '雨城区', '0,1,26,338', '2877', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2878', '338', '名山县', '0,1,26,338', '2878', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2879', '338', '荥经县', '0,1,26,338', '2879', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2880', '338', '汉源县', '0,1,26,338', '2880', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2881', '338', '石棉县', '0,1,26,338', '2881', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2882', '338', '天全县', '0,1,26,338', '2882', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2883', '338', '芦山县', '0,1,26,338', '2883', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2884', '338', '宝兴县', '0,1,26,338', '2884', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2885', '339', '翠屏区', '0,1,26,339', '2885', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2886', '339', '宜宾县', '0,1,26,339', '2886', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2887', '339', '南溪县', '0,1,26,339', '2887', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2888', '339', '江安县', '0,1,26,339', '2888', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2889', '339', '长宁县', '0,1,26,339', '2889', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2890', '339', '高县', '0,1,26,339', '2890', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2891', '339', '珙县', '0,1,26,339', '2891', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2892', '339', '筠连县', '0,1,26,339', '2892', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2893', '339', '兴文县', '0,1,26,339', '2893', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2894', '339', '屏山县', '0,1,26,339', '2894', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2895', '340', '雁江区', '0,1,26,340', '2895', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2896', '340', '简阳市', '0,1,26,340', '2896', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2897', '340', '安岳县', '0,1,26,340', '2897', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2898', '340', '乐至县', '0,1,26,340', '2898', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2899', '341', '大安区', '0,1,26,341', '2899', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2900', '341', '自流井区', '0,1,26,341', '2900', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2901', '341', '贡井区', '0,1,26,341', '2901', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2902', '341', '沿滩区', '0,1,26,341', '2902', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2903', '341', '荣县', '0,1,26,341', '2903', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2904', '341', '富顺县', '0,1,26,341', '2904', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2905', '342', '江阳区', '0,1,26,342', '2905', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2906', '342', '纳溪区', '0,1,26,342', '2906', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2907', '342', '龙马潭区', '0,1,26,342', '2907', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2908', '342', '泸县', '0,1,26,342', '2908', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2909', '342', '合江县', '0,1,26,342', '2909', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2910', '342', '叙永县', '0,1,26,342', '2910', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2911', '342', '古蔺县', '0,1,26,342', '2911', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2912', '27', '和平区', '0,1,27', '2912', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2913', '27', '河西区', '0,1,27', '2913', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2914', '27', '南开区', '0,1,27', '2914', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2915', '27', '河北区', '0,1,27', '2915', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2916', '27', '河东区', '0,1,27', '2916', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2917', '27', '红桥区', '0,1,27', '2917', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2918', '27', '东丽区', '0,1,27', '2918', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2919', '27', '津南区', '0,1,27', '2919', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2920', '27', '西青区', '0,1,27', '2920', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2921', '27', '北辰区', '0,1,27', '2921', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2922', '27', '塘沽区', '0,1,27', '2922', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2923', '27', '汉沽区', '0,1,27', '2923', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2924', '27', '大港区', '0,1,27', '2924', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2925', '27', '武清区', '0,1,27', '2925', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2926', '27', '宝坻区', '0,1,27', '2926', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2927', '27', '经济开发区', '0,1,27', '2927', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2928', '27', '宁河县', '0,1,27', '2928', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2929', '27', '静海县', '0,1,27', '2929', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2930', '27', '蓟县', '0,1,27', '2930', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2931', '344', '城关区', '0,1,28,344', '2931', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2932', '344', '林周县', '0,1,28,344', '2932', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2933', '344', '当雄县', '0,1,28,344', '2933', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2934', '344', '尼木县', '0,1,28,344', '2934', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2935', '344', '曲水县', '0,1,28,344', '2935', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2936', '344', '堆龙德庆县', '0,1,28,344', '2936', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2937', '344', '达孜县', '0,1,28,344', '2937', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2938', '344', '墨竹工卡县', '0,1,28,344', '2938', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2939', '345', '噶尔县', '0,1,28,345', '2939', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2940', '345', '普兰县', '0,1,28,345', '2940', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2941', '345', '札达县', '0,1,28,345', '2941', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2942', '345', '日土县', '0,1,28,345', '2942', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2943', '345', '革吉县', '0,1,28,345', '2943', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2944', '345', '改则县', '0,1,28,345', '2944', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2945', '345', '措勤县', '0,1,28,345', '2945', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2946', '346', '昌都县', '0,1,28,346', '2946', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2947', '346', '江达县', '0,1,28,346', '2947', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2948', '346', '贡觉县', '0,1,28,346', '2948', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2949', '346', '类乌齐县', '0,1,28,346', '2949', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2950', '346', '丁青县', '0,1,28,346', '2950', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2951', '346', '察雅县', '0,1,28,346', '2951', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2952', '346', '八宿县', '0,1,28,346', '2952', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2953', '346', '左贡县', '0,1,28,346', '2953', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2954', '346', '芒康县', '0,1,28,346', '2954', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2955', '346', '洛隆县', '0,1,28,346', '2955', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2956', '346', '边坝县', '0,1,28,346', '2956', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2957', '347', '林芝县', '0,1,28,347', '2957', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2958', '347', '工布江达县', '0,1,28,347', '2958', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2959', '347', '米林县', '0,1,28,347', '2959', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2960', '347', '墨脱县', '0,1,28,347', '2960', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2961', '347', '波密县', '0,1,28,347', '2961', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2962', '347', '察隅县', '0,1,28,347', '2962', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2963', '347', '朗县', '0,1,28,347', '2963', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2964', '348', '那曲县', '0,1,28,348', '2964', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2965', '348', '嘉黎县', '0,1,28,348', '2965', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2966', '348', '比如县', '0,1,28,348', '2966', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2967', '348', '聂荣县', '0,1,28,348', '2967', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2968', '348', '安多县', '0,1,28,348', '2968', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2969', '348', '申扎县', '0,1,28,348', '2969', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2970', '348', '索县', '0,1,28,348', '2970', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2971', '348', '班戈县', '0,1,28,348', '2971', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2972', '348', '巴青县', '0,1,28,348', '2972', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2973', '348', '尼玛县', '0,1,28,348', '2973', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2974', '349', '日喀则市', '0,1,28,349', '2974', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2975', '349', '南木林县', '0,1,28,349', '2975', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2976', '349', '江孜县', '0,1,28,349', '2976', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2977', '349', '定日县', '0,1,28,349', '2977', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2978', '349', '萨迦县', '0,1,28,349', '2978', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2979', '349', '拉孜县', '0,1,28,349', '2979', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2980', '349', '昂仁县', '0,1,28,349', '2980', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2981', '349', '谢通门县', '0,1,28,349', '2981', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2982', '349', '白朗县', '0,1,28,349', '2982', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2983', '349', '仁布县', '0,1,28,349', '2983', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2984', '349', '康马县', '0,1,28,349', '2984', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2985', '349', '定结县', '0,1,28,349', '2985', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2986', '349', '仲巴县', '0,1,28,349', '2986', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2987', '349', '亚东县', '0,1,28,349', '2987', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2988', '349', '吉隆县', '0,1,28,349', '2988', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2989', '349', '聂拉木县', '0,1,28,349', '2989', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2990', '349', '萨嘎县', '0,1,28,349', '2990', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2991', '349', '岗巴县', '0,1,28,349', '2991', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2992', '350', '乃东县', '0,1,28,350', '2992', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2993', '350', '扎囊县', '0,1,28,350', '2993', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2994', '350', '贡嘎县', '0,1,28,350', '2994', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2995', '350', '桑日县', '0,1,28,350', '2995', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2996', '350', '琼结县', '0,1,28,350', '2996', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2997', '350', '曲松县', '0,1,28,350', '2997', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2998', '350', '措美县', '0,1,28,350', '2998', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('2999', '350', '洛扎县', '0,1,28,350', '2999', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3000', '350', '加查县', '0,1,28,350', '3000', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3001', '350', '隆子县', '0,1,28,350', '3001', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3002', '350', '错那县', '0,1,28,350', '3002', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3003', '350', '浪卡子县', '0,1,28,350', '3003', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3004', '351', '天山区', '0,1,29,351', '3004', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3005', '351', '沙依巴克区', '0,1,29,351', '3005', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3006', '351', '新市区', '0,1,29,351', '3006', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3007', '351', '水磨沟区', '0,1,29,351', '3007', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3008', '351', '头屯河区', '0,1,29,351', '3008', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3009', '351', '达坂城区', '0,1,29,351', '3009', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3010', '351', '米东区', '0,1,29,351', '3010', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3011', '351', '乌鲁木齐县', '0,1,29,351', '3011', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3012', '352', '阿克苏市', '0,1,29,352', '3012', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3013', '352', '温宿县', '0,1,29,352', '3013', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3014', '352', '库车县', '0,1,29,352', '3014', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3015', '352', '沙雅县', '0,1,29,352', '3015', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3016', '352', '新和县', '0,1,29,352', '3016', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3017', '352', '拜城县', '0,1,29,352', '3017', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3018', '352', '乌什县', '0,1,29,352', '3018', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3019', '352', '阿瓦提县', '0,1,29,352', '3019', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3020', '352', '柯坪县', '0,1,29,352', '3020', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3021', '353', '阿拉尔市', '0,1,29,353', '3021', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3022', '354', '库尔勒市', '0,1,29,354', '3022', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3023', '354', '轮台县', '0,1,29,354', '3023', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3024', '354', '尉犁县', '0,1,29,354', '3024', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3025', '354', '若羌县', '0,1,29,354', '3025', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3026', '354', '且末县', '0,1,29,354', '3026', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3027', '354', '焉耆', '0,1,29,354', '3027', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3028', '354', '和静县', '0,1,29,354', '3028', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3029', '354', '和硕县', '0,1,29,354', '3029', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3030', '354', '博湖县', '0,1,29,354', '3030', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3031', '355', '博乐市', '0,1,29,355', '3031', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3032', '355', '精河县', '0,1,29,355', '3032', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3033', '355', '温泉县', '0,1,29,355', '3033', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3034', '356', '呼图壁县', '0,1,29,356', '3034', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3035', '356', '米泉市', '0,1,29,356', '3035', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3036', '356', '昌吉市', '0,1,29,356', '3036', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3037', '356', '阜康市', '0,1,29,356', '3037', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3038', '356', '玛纳斯县', '0,1,29,356', '3038', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3039', '356', '奇台县', '0,1,29,356', '3039', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3040', '356', '吉木萨尔县', '0,1,29,356', '3040', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3041', '356', '木垒', '0,1,29,356', '3041', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3042', '357', '哈密市', '0,1,29,357', '3042', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3043', '357', '伊吾县', '0,1,29,357', '3043', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3044', '357', '巴里坤', '0,1,29,357', '3044', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3045', '358', '和田市', '0,1,29,358', '3045', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3046', '358', '和田县', '0,1,29,358', '3046', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3047', '358', '墨玉县', '0,1,29,358', '3047', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3048', '358', '皮山县', '0,1,29,358', '3048', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3049', '358', '洛浦县', '0,1,29,358', '3049', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3050', '358', '策勒县', '0,1,29,358', '3050', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3051', '358', '于田县', '0,1,29,358', '3051', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3052', '358', '民丰县', '0,1,29,358', '3052', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3053', '359', '喀什市', '0,1,29,359', '3053', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3054', '359', '疏附县', '0,1,29,359', '3054', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3055', '359', '疏勒县', '0,1,29,359', '3055', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3056', '359', '英吉沙县', '0,1,29,359', '3056', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3057', '359', '泽普县', '0,1,29,359', '3057', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3058', '359', '莎车县', '0,1,29,359', '3058', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3059', '359', '叶城县', '0,1,29,359', '3059', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3060', '359', '麦盖提县', '0,1,29,359', '3060', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3061', '359', '岳普湖县', '0,1,29,359', '3061', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3062', '359', '伽师县', '0,1,29,359', '3062', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3063', '359', '巴楚县', '0,1,29,359', '3063', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3064', '359', '塔什库尔干', '0,1,29,359', '3064', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3065', '360', '克拉玛依市', '0,1,29,360', '3065', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3066', '361', '阿图什市', '0,1,29,361', '3066', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3067', '361', '阿克陶县', '0,1,29,361', '3067', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3068', '361', '阿合奇县', '0,1,29,361', '3068', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3069', '361', '乌恰县', '0,1,29,361', '3069', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3070', '362', '石河子市', '0,1,29,362', '3070', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3071', '363', '图木舒克市', '0,1,29,363', '3071', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3072', '364', '吐鲁番市', '0,1,29,364', '3072', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3073', '364', '鄯善县', '0,1,29,364', '3073', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3074', '364', '托克逊县', '0,1,29,364', '3074', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3075', '365', '五家渠市', '0,1,29,365', '3075', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3076', '366', '阿勒泰市', '0,1,29,366', '3076', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3077', '366', '布克赛尔', '0,1,29,366', '3077', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3078', '366', '伊宁市', '0,1,29,366', '3078', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3079', '366', '布尔津县', '0,1,29,366', '3079', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3080', '366', '奎屯市', '0,1,29,366', '3080', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3081', '366', '乌苏市', '0,1,29,366', '3081', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3082', '366', '额敏县', '0,1,29,366', '3082', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3083', '366', '富蕴县', '0,1,29,366', '3083', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3084', '366', '伊宁县', '0,1,29,366', '3084', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3085', '366', '福海县', '0,1,29,366', '3085', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3086', '366', '霍城县', '0,1,29,366', '3086', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3087', '366', '沙湾县', '0,1,29,366', '3087', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3088', '366', '巩留县', '0,1,29,366', '3088', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3089', '366', '哈巴河县', '0,1,29,366', '3089', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3090', '366', '托里县', '0,1,29,366', '3090', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3091', '366', '青河县', '0,1,29,366', '3091', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3092', '366', '新源县', '0,1,29,366', '3092', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3093', '366', '裕民县', '0,1,29,366', '3093', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3094', '366', '和布克赛尔', '0,1,29,366', '3094', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3095', '366', '吉木乃县', '0,1,29,366', '3095', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3096', '366', '昭苏县', '0,1,29,366', '3096', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3097', '366', '特克斯县', '0,1,29,366', '3097', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3098', '366', '尼勒克县', '0,1,29,366', '3098', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3099', '366', '察布查尔', '0,1,29,366', '3099', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3100', '367', '盘龙区', '0,1,30,367', '3100', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3101', '367', '五华区', '0,1,30,367', '3101', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3102', '367', '官渡区', '0,1,30,367', '3102', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3103', '367', '西山区', '0,1,30,367', '3103', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3104', '367', '东川区', '0,1,30,367', '3104', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3105', '367', '安宁市', '0,1,30,367', '3105', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3106', '367', '呈贡县', '0,1,30,367', '3106', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3107', '367', '晋宁县', '0,1,30,367', '3107', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3108', '367', '富民县', '0,1,30,367', '3108', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3109', '367', '宜良县', '0,1,30,367', '3109', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3110', '367', '嵩明县', '0,1,30,367', '3110', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3111', '367', '石林县', '0,1,30,367', '3111', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3112', '367', '禄劝', '0,1,30,367', '3112', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3113', '367', '寻甸', '0,1,30,367', '3113', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3114', '368', '兰坪', '0,1,30,368', '3114', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3115', '368', '泸水县', '0,1,30,368', '3115', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3116', '368', '福贡县', '0,1,30,368', '3116', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3117', '368', '贡山', '0,1,30,368', '3117', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3118', '369', '宁洱', '0,1,30,369', '3118', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3119', '369', '思茅区', '0,1,30,369', '3119', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3120', '369', '墨江', '0,1,30,369', '3120', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3121', '369', '景东', '0,1,30,369', '3121', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3122', '369', '景谷', '0,1,30,369', '3122', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3123', '369', '镇沅', '0,1,30,369', '3123', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3124', '369', '江城', '0,1,30,369', '3124', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3125', '369', '孟连', '0,1,30,369', '3125', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3126', '369', '澜沧', '0,1,30,369', '3126', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3127', '369', '西盟', '0,1,30,369', '3127', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3128', '370', '古城区', '0,1,30,370', '3128', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3129', '370', '宁蒗', '0,1,30,370', '3129', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3130', '370', '玉龙', '0,1,30,370', '3130', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3131', '370', '永胜县', '0,1,30,370', '3131', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3132', '370', '华坪县', '0,1,30,370', '3132', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3133', '371', '隆阳区', '0,1,30,371', '3133', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3134', '371', '施甸县', '0,1,30,371', '3134', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3135', '371', '腾冲县', '0,1,30,371', '3135', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3136', '371', '龙陵县', '0,1,30,371', '3136', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3137', '371', '昌宁县', '0,1,30,371', '3137', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3138', '372', '楚雄市', '0,1,30,372', '3138', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3139', '372', '双柏县', '0,1,30,372', '3139', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3140', '372', '牟定县', '0,1,30,372', '3140', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3141', '372', '南华县', '0,1,30,372', '3141', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3142', '372', '姚安县', '0,1,30,372', '3142', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3143', '372', '大姚县', '0,1,30,372', '3143', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3144', '372', '永仁县', '0,1,30,372', '3144', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3145', '372', '元谋县', '0,1,30,372', '3145', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3146', '372', '武定县', '0,1,30,372', '3146', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3147', '372', '禄丰县', '0,1,30,372', '3147', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3148', '373', '大理市', '0,1,30,373', '3148', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3149', '373', '祥云县', '0,1,30,373', '3149', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3150', '373', '宾川县', '0,1,30,373', '3150', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3151', '373', '弥渡县', '0,1,30,373', '3151', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3152', '373', '永平县', '0,1,30,373', '3152', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3153', '373', '云龙县', '0,1,30,373', '3153', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3154', '373', '洱源县', '0,1,30,373', '3154', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3155', '373', '剑川县', '0,1,30,373', '3155', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3156', '373', '鹤庆县', '0,1,30,373', '3156', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3157', '373', '漾濞', '0,1,30,373', '3157', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3158', '373', '南涧', '0,1,30,373', '3158', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3159', '373', '巍山', '0,1,30,373', '3159', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3160', '374', '潞西市', '0,1,30,374', '3160', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3161', '374', '瑞丽市', '0,1,30,374', '3161', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3162', '374', '梁河县', '0,1,30,374', '3162', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3163', '374', '盈江县', '0,1,30,374', '3163', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3164', '374', '陇川县', '0,1,30,374', '3164', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3165', '375', '香格里拉县', '0,1,30,375', '3165', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3166', '375', '德钦县', '0,1,30,375', '3166', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3167', '375', '维西', '0,1,30,375', '3167', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3168', '376', '泸西县', '0,1,30,376', '3168', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3169', '376', '蒙自县', '0,1,30,376', '3169', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3170', '376', '个旧市', '0,1,30,376', '3170', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3171', '376', '开远市', '0,1,30,376', '3171', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3172', '376', '绿春县', '0,1,30,376', '3172', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3173', '376', '建水县', '0,1,30,376', '3173', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3174', '376', '石屏县', '0,1,30,376', '3174', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3175', '376', '弥勒县', '0,1,30,376', '3175', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3176', '376', '元阳县', '0,1,30,376', '3176', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3177', '376', '红河县', '0,1,30,376', '3177', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3178', '376', '金平', '0,1,30,376', '3178', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3179', '376', '河口', '0,1,30,376', '3179', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3180', '376', '屏边', '0,1,30,376', '3180', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3181', '377', '临翔区', '0,1,30,377', '3181', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3182', '377', '凤庆县', '0,1,30,377', '3182', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3183', '377', '云县', '0,1,30,377', '3183', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3184', '377', '永德县', '0,1,30,377', '3184', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3185', '377', '镇康县', '0,1,30,377', '3185', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3186', '377', '双江', '0,1,30,377', '3186', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3187', '377', '耿马', '0,1,30,377', '3187', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3188', '377', '沧源', '0,1,30,377', '3188', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3189', '378', '麒麟区', '0,1,30,378', '3189', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3190', '378', '宣威市', '0,1,30,378', '3190', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3191', '378', '马龙县', '0,1,30,378', '3191', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3192', '378', '陆良县', '0,1,30,378', '3192', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3193', '378', '师宗县', '0,1,30,378', '3193', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3194', '378', '罗平县', '0,1,30,378', '3194', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3195', '378', '富源县', '0,1,30,378', '3195', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3196', '378', '会泽县', '0,1,30,378', '3196', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3197', '378', '沾益县', '0,1,30,378', '3197', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3198', '379', '文山县', '0,1,30,379', '3198', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3199', '379', '砚山县', '0,1,30,379', '3199', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3200', '379', '西畴县', '0,1,30,379', '3200', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3201', '379', '麻栗坡县', '0,1,30,379', '3201', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3202', '379', '马关县', '0,1,30,379', '3202', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3203', '379', '丘北县', '0,1,30,379', '3203', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3204', '379', '广南县', '0,1,30,379', '3204', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3205', '379', '富宁县', '0,1,30,379', '3205', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3206', '380', '景洪市', '0,1,30,380', '3206', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3207', '380', '勐海县', '0,1,30,380', '3207', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3208', '380', '勐腊县', '0,1,30,380', '3208', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3209', '381', '红塔区', '0,1,30,381', '3209', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3210', '381', '江川县', '0,1,30,381', '3210', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3211', '381', '澄江县', '0,1,30,381', '3211', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3212', '381', '通海县', '0,1,30,381', '3212', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3213', '381', '华宁县', '0,1,30,381', '3213', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3214', '381', '易门县', '0,1,30,381', '3214', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3215', '381', '峨山', '0,1,30,381', '3215', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3216', '381', '新平', '0,1,30,381', '3216', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3217', '381', '元江', '0,1,30,381', '3217', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3218', '382', '昭阳区', '0,1,30,382', '3218', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3219', '382', '鲁甸县', '0,1,30,382', '3219', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3220', '382', '巧家县', '0,1,30,382', '3220', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3221', '382', '盐津县', '0,1,30,382', '3221', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3222', '382', '大关县', '0,1,30,382', '3222', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3223', '382', '永善县', '0,1,30,382', '3223', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3224', '382', '绥江县', '0,1,30,382', '3224', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3225', '382', '镇雄县', '0,1,30,382', '3225', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3226', '382', '彝良县', '0,1,30,382', '3226', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3227', '382', '威信县', '0,1,30,382', '3227', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3228', '382', '水富县', '0,1,30,382', '3228', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3229', '383', '西湖区', '0,1,31,383', '3229', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3230', '383', '上城区', '0,1,31,383', '3230', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3231', '383', '下城区', '0,1,31,383', '3231', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3232', '383', '拱墅区', '0,1,31,383', '3232', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3233', '383', '滨江区', '0,1,31,383', '3233', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3234', '383', '江干区', '0,1,31,383', '3234', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3235', '383', '萧山区', '0,1,31,383', '3235', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3236', '383', '余杭区', '0,1,31,383', '3236', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3237', '383', '市郊', '0,1,31,383', '3237', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3238', '383', '建德市', '0,1,31,383', '3238', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3239', '383', '富阳市', '0,1,31,383', '3239', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3240', '383', '临安市', '0,1,31,383', '3240', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3241', '383', '桐庐县', '0,1,31,383', '3241', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3242', '383', '淳安县', '0,1,31,383', '3242', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3243', '384', '吴兴区', '0,1,31,384', '3243', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3244', '384', '南浔区', '0,1,31,384', '3244', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3245', '384', '德清县', '0,1,31,384', '3245', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3246', '384', '长兴县', '0,1,31,384', '3246', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3247', '384', '安吉县', '0,1,31,384', '3247', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3248', '385', '南湖区', '0,1,31,385', '3248', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3249', '385', '秀洲区', '0,1,31,385', '3249', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3250', '385', '海宁市', '0,1,31,385', '3250', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3251', '385', '嘉善县', '0,1,31,385', '3251', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3252', '385', '平湖市', '0,1,31,385', '3252', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3253', '385', '桐乡市', '0,1,31,385', '3253', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3254', '385', '海盐县', '0,1,31,385', '3254', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3255', '386', '婺城区', '0,1,31,386', '3255', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3256', '386', '金东区', '0,1,31,386', '3256', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3257', '386', '兰溪市', '0,1,31,386', '3257', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3258', '386', '市区', '0,1,31,386', '3258', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3259', '386', '佛堂镇', '0,1,31,386', '3259', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3260', '386', '上溪镇', '0,1,31,386', '3260', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3261', '386', '义亭镇', '0,1,31,386', '3261', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3262', '386', '大陈镇', '0,1,31,386', '3262', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3263', '386', '苏溪镇', '0,1,31,386', '3263', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3264', '386', '赤岸镇', '0,1,31,386', '3264', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3265', '386', '东阳市', '0,1,31,386', '3265', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3266', '386', '永康市', '0,1,31,386', '3266', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3267', '386', '武义县', '0,1,31,386', '3267', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3268', '386', '浦江县', '0,1,31,386', '3268', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3269', '386', '磐安县', '0,1,31,386', '3269', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3270', '387', '莲都区', '0,1,31,387', '3270', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3271', '387', '龙泉市', '0,1,31,387', '3271', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3272', '387', '青田县', '0,1,31,387', '3272', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3273', '387', '缙云县', '0,1,31,387', '3273', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3274', '387', '遂昌县', '0,1,31,387', '3274', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3275', '387', '松阳县', '0,1,31,387', '3275', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3276', '387', '云和县', '0,1,31,387', '3276', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3277', '387', '庆元县', '0,1,31,387', '3277', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3278', '387', '景宁', '0,1,31,387', '3278', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3279', '388', '海曙区', '0,1,31,388', '3279', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3280', '388', '江东区', '0,1,31,388', '3280', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3281', '388', '江北区', '0,1,31,388', '3281', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3282', '388', '镇海区', '0,1,31,388', '3282', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3283', '388', '北仑区', '0,1,31,388', '3283', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3284', '388', '鄞州区', '0,1,31,388', '3284', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3285', '388', '余姚市', '0,1,31,388', '3285', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3286', '388', '慈溪市', '0,1,31,388', '3286', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3287', '388', '奉化市', '0,1,31,388', '3287', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3288', '388', '象山县', '0,1,31,388', '3288', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3289', '388', '宁海县', '0,1,31,388', '3289', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3290', '389', '越城区', '0,1,31,389', '3290', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3291', '389', '上虞市', '0,1,31,389', '3291', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3292', '389', '嵊州市', '0,1,31,389', '3292', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3293', '389', '绍兴县', '0,1,31,389', '3293', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3294', '389', '新昌县', '0,1,31,389', '3294', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3295', '389', '诸暨市', '0,1,31,389', '3295', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3296', '390', '椒江区', '0,1,31,390', '3296', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3297', '390', '黄岩区', '0,1,31,390', '3297', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3298', '390', '路桥区', '0,1,31,390', '3298', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3299', '390', '温岭市', '0,1,31,390', '3299', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3300', '390', '临海市', '0,1,31,390', '3300', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3301', '390', '玉环县', '0,1,31,390', '3301', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3302', '390', '三门县', '0,1,31,390', '3302', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3303', '390', '天台县', '0,1,31,390', '3303', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3304', '390', '仙居县', '0,1,31,390', '3304', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3305', '391', '鹿城区', '0,1,31,391', '3305', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3306', '391', '龙湾区', '0,1,31,391', '3306', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3307', '391', '瓯海区', '0,1,31,391', '3307', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3308', '391', '瑞安市', '0,1,31,391', '3308', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3309', '391', '乐清市', '0,1,31,391', '3309', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3310', '391', '洞头县', '0,1,31,391', '3310', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3311', '391', '永嘉县', '0,1,31,391', '3311', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3312', '391', '平阳县', '0,1,31,391', '3312', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3313', '391', '苍南县', '0,1,31,391', '3313', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3314', '391', '文成县', '0,1,31,391', '3314', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3315', '391', '泰顺县', '0,1,31,391', '3315', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3316', '392', '定海区', '0,1,31,392', '3316', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3317', '392', '普陀区', '0,1,31,392', '3317', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3318', '392', '岱山县', '0,1,31,392', '3318', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3319', '392', '嵊泗县', '0,1,31,392', '3319', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3320', '393', '衢州市', '0,1,31,393', '3320', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3321', '393', '江山市', '0,1,31,393', '3321', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3322', '393', '常山县', '0,1,31,393', '3322', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3323', '393', '开化县', '0,1,31,393', '3323', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3324', '393', '龙游县', '0,1,31,393', '3324', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3325', '32', '合川区', '0,1,32', '3325', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3326', '32', '江津区', '0,1,32', '3326', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3327', '32', '南川区', '0,1,32', '3327', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3328', '32', '永川区', '0,1,32', '3328', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3329', '32', '南岸区', '0,1,32', '3329', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3330', '32', '渝北区', '0,1,32', '3330', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3331', '32', '万盛区', '0,1,32', '3331', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3332', '32', '大渡口区', '0,1,32', '3332', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3333', '32', '万州区', '0,1,32', '3333', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3334', '32', '北碚区', '0,1,32', '3334', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3335', '32', '沙坪坝区', '0,1,32', '3335', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3336', '32', '巴南区', '0,1,32', '3336', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3337', '32', '涪陵区', '0,1,32', '3337', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3338', '32', '江北区', '0,1,32', '3338', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3339', '32', '九龙坡区', '0,1,32', '3339', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3340', '32', '渝中区', '0,1,32', '3340', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3341', '32', '黔江开发区', '0,1,32', '3341', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3342', '32', '长寿区', '0,1,32', '3342', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3343', '32', '双桥区', '0,1,32', '3343', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3344', '32', '綦江县', '0,1,32', '3344', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3345', '32', '潼南县', '0,1,32', '3345', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3346', '32', '铜梁县', '0,1,32', '3346', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3347', '32', '大足县', '0,1,32', '3347', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3348', '32', '荣昌县', '0,1,32', '3348', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3349', '32', '璧山县', '0,1,32', '3349', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3350', '32', '垫江县', '0,1,32', '3350', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3351', '32', '武隆县', '0,1,32', '3351', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3352', '32', '丰都县', '0,1,32', '3352', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3353', '32', '城口县', '0,1,32', '3353', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3354', '32', '梁平县', '0,1,32', '3354', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3355', '32', '开县', '0,1,32', '3355', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3356', '32', '巫溪县', '0,1,32', '3356', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3357', '32', '巫山县', '0,1,32', '3357', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3358', '32', '奉节县', '0,1,32', '3358', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3359', '32', '云阳县', '0,1,32', '3359', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3360', '32', '忠县', '0,1,32', '3360', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3361', '32', '石柱', '0,1,32', '3361', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3362', '32', '彭水', '0,1,32', '3362', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3363', '32', '酉阳', '0,1,32', '3363', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3364', '32', '秀山', '0,1,32', '3364', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3365', '33', '沙田区', '0,1,33', '3365', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3366', '33', '东区', '0,1,33', '3366', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3367', '33', '观塘区', '0,1,33', '3367', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3368', '33', '黄大仙区', '0,1,33', '3368', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3369', '33', '九龙城区', '0,1,33', '3369', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3370', '33', '屯门区', '0,1,33', '3370', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3371', '33', '葵青区', '0,1,33', '3371', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3372', '33', '元朗区', '0,1,33', '3372', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3373', '33', '深水埗区', '0,1,33', '3373', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3374', '33', '西贡区', '0,1,33', '3374', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3375', '33', '大埔区', '0,1,33', '3375', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3376', '33', '湾仔区', '0,1,33', '3376', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3377', '33', '油尖旺区', '0,1,33', '3377', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3378', '33', '北区', '0,1,33', '3378', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3379', '33', '南区', '0,1,33', '3379', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3380', '33', '荃湾区', '0,1,33', '3380', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3381', '33', '中西区', '0,1,33', '3381', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3382', '33', '离岛区', '0,1,33', '3382', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3384', '35', '台北', '0,1,35', '3384', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3385', '35', '高雄', '0,1,35', '3385', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3386', '35', '基隆', '0,1,35', '3386', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3387', '35', '台中', '0,1,35', '3387', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3388', '35', '台南', '0,1,35', '3388', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3389', '35', '新竹', '0,1,35', '3389', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3390', '35', '嘉义', '0,1,35', '3390', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3391', '35', '宜兰县', '0,1,35', '3391', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3392', '35', '桃园县', '0,1,35', '3392', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3393', '35', '苗栗县', '0,1,35', '3393', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3394', '35', '彰化县', '0,1,35', '3394', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3395', '35', '南投县', '0,1,35', '3395', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3396', '35', '云林县', '0,1,35', '3396', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3397', '35', '屏东县', '0,1,35', '3397', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3398', '35', '台东县', '0,1,35', '3398', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3399', '35', '花莲县', '0,1,35', '3399', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3400', '35', '澎湖县', '0,1,35', '3400', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3401', '3', '合肥', '0,1,3', '3401,3402,3403,3404,3405,3406,3407,3408', '1', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3402', '3401', '庐阳区', '0,1,3,3401', '3402', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3403', '3401', '瑶海区', '0,1,3,3401', '3403', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3404', '3401', '蜀山区', '0,1,3,3401', '3404', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3405', '3401', '包河区', '0,1,3,3401', '3405', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3406', '3401', '长丰县', '0,1,3,3401', '3406', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3407', '3401', '肥东县', '0,1,3,3401', '3407', '0', '', '0', '1', '');
INSERT INTO zz_linkage VALUES ('3408', '3401', '肥西县', '0,1,3,3401', '3408', '0', '', '0', '1', '');

-- ----------------------------
-- Table structure for `zz_links`
-- ----------------------------
DROP TABLE IF EXISTS `zz_links`;
CREATE TABLE `zz_links` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `userid` int(8) unsigned NOT NULL DEFAULT '0',
  `username` varchar(40) NOT NULL DEFAULT '',
  `url` varchar(60) NOT NULL DEFAULT '',
  `listorder` int(10) unsigned NOT NULL DEFAULT '0',
  `createtime` int(11) unsigned NOT NULL DEFAULT '0',
  `updatetime` int(11) unsigned NOT NULL DEFAULT '0',
  `lang` tinyint(2) unsigned NOT NULL DEFAULT '0',
  `linktype` varchar(255) NOT NULL DEFAULT '1',
  `title` varchar(255) NOT NULL DEFAULT '',
  `title_style` varchar(40) NOT NULL DEFAULT '',
  `thumb` varchar(100) NOT NULL DEFAULT '',
  `siteurl` text NOT NULL,
  `intro` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of zz_links
-- ----------------------------

-- ----------------------------
-- Table structure for `zz_lottery`
-- ----------------------------
DROP TABLE IF EXISTS `zz_lottery`;
CREATE TABLE `zz_lottery` (
  `qihao` int(11) NOT NULL AUTO_INCREMENT COMMENT '开奖期号',
  `code` varchar(6) NOT NULL COMMENT '开奖结果',
  `add_time` int(10) NOT NULL COMMENT '开奖时间',
  PRIMARY KEY (`qihao`)
) ENGINE=MyISAM AUTO_INCREMENT=160526053 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of zz_lottery
-- ----------------------------
INSERT INTO zz_lottery VALUES ('160323071', '30335', '1466476490');
INSERT INTO zz_lottery VALUES ('160323069', '33121', '1466476490');
INSERT INTO zz_lottery VALUES ('160323070', '47507', '1466476490');

-- ----------------------------
-- Table structure for `zz_mail`
-- ----------------------------
DROP TABLE IF EXISTS `zz_mail`;
CREATE TABLE `zz_mail` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(20) DEFAULT NULL COMMENT '帐号',
  `content` text,
  `send_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of zz_mail
-- ----------------------------

-- ----------------------------
-- Table structure for `zz_member`
-- ----------------------------
DROP TABLE IF EXISTS `zz_member`;
CREATE TABLE `zz_member` (
  `mid` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(60) DEFAULT NULL,
  `password` varchar(64) DEFAULT NULL,
  `pay_password` varchar(64) DEFAULT NULL COMMENT '支付密码',
  `photo` varchar(255) DEFAULT NULL COMMENT '头像',
  `ivt_id` int(11) NOT NULL DEFAULT '0' COMMENT '邀请人',
  `salt` char(6) DEFAULT NULL,
  `nickname` varchar(30) DEFAULT NULL COMMENT '昵称',
  `realname` varchar(20) DEFAULT NULL COMMENT '真实姓名',
  `idcard` varchar(60) DEFAULT NULL,
  `rank_id` smallint(3) NOT NULL DEFAULT '0',
  `email` varchar(100) DEFAULT NULL COMMENT '邮箱',
  `verify_email` tinyint(2) DEFAULT '0',
  `zone` varchar(100) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `sex` tinyint(2) DEFAULT '1' COMMENT '1男,2女',
  `mobile` varchar(20) DEFAULT NULL,
  `verify_mobile` tinyint(1) DEFAULT '0',
  `rank_points` int(10) NOT NULL DEFAULT '0' COMMENT '等级积分',
  `pay_points` int(10) NOT NULL DEFAULT '0' COMMENT '支付积分',
  `db_points` int(10) DEFAULT '0' COMMENT '夺宝币',
  `commission` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '佣金余额',
  `deduct_commission` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '扣除佣金',
  `user_money` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '可用余额',
  `frozen_money` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '冻结金额',
  `back_money` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '解冻金额',
  `status` smallint(3) NOT NULL DEFAULT '1' COMMENT '1正常,0关闭',
  `auth` varchar(64) DEFAULT NULL COMMENT '授权码',
  `auth_time` int(11) DEFAULT NULL COMMENT '授权时间',
  `ip` char(15) DEFAULT NULL COMMENT '注册IP',
  `lastip` char(15) NOT NULL COMMENT '上次登陆IP',
  `login_time` smallint(6) DEFAULT '0' COMMENT '登录次数',
  `login` int(11) DEFAULT NULL COMMENT '当前登陆时间',
  `is_voice` smallint(3) DEFAULT '0' COMMENT '是否语音验证',
  `is_perfect` smallint(3) NOT NULL DEFAULT '0' COMMENT '是否完善资料',
  `lastlogin` int(11) unsigned DEFAULT NULL,
  `oauth_login` varchar(255) NOT NULL COMMENT '授权登录',
  `c_time` int(10) DEFAULT NULL,
  `is_robots` smallint(3) NOT NULL DEFAULT '0',
  `intro` varchar(50) DEFAULT NULL,
  `ivt_count` int(8) NOT NULL DEFAULT '0',
  `pay_money` decimal(10,2) DEFAULT '0.00',
  `free` tinyint(1) NOT NULL DEFAULT '1' COMMENT '是否可以免费赚拍币',
  `openid` varchar(36) NOT NULL,
  `unionid` varchar(36) NOT NULL,
  `subscribe_time` int(10) NOT NULL,
  `spacedata` int(20) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`mid`)
) ENGINE=MyISAM AUTO_INCREMENT=3577 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of zz_member
-- ----------------------------

-- ----------------------------
-- Table structure for `zz_member_account`
-- ----------------------------
DROP TABLE IF EXISTS `zz_member_account`;
CREATE TABLE `zz_member_account` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `mid` int(10) NOT NULL COMMENT '会员ID',
  `username` varchar(255) NOT NULL COMMENT '会员',
  `admin_id` int(10) NOT NULL DEFAULT '0' COMMENT '管理员ID',
  `admin_user` varchar(255) NOT NULL DEFAULT '' COMMENT '管理员名称',
  `amount` decimal(10,2) NOT NULL COMMENT '充值金额',
  `fee` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '手续费',
  `add_time` int(10) NOT NULL COMMENT '操作时间',
  `pay_id` int(10) NOT NULL DEFAULT '0' COMMENT '支付ID',
  `pay_name` varchar(60) NOT NULL DEFAULT '' COMMENT '支付名称',
  `pay_code` varchar(60) NOT NULL DEFAULT '' COMMENT '支付代码',
  `pay_time` int(10) NOT NULL DEFAULT '0' COMMENT '支付时间',
  `user_note` text COMMENT '用户备注',
  `admin_note` text COMMENT '管理员备注',
  `type` tinyint(1) NOT NULL COMMENT '类型:1充值2提现',
  `status` tinyint(1) NOT NULL COMMENT '支付状态:1待付款2已完成3已取消',
  `gotime` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=118 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of zz_member_account
-- ----------------------------

-- ----------------------------
-- Table structure for `zz_member_address`
-- ----------------------------
DROP TABLE IF EXISTS `zz_member_address`;
CREATE TABLE `zz_member_address` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mid` int(11) NOT NULL,
  `username` varchar(12) NOT NULL,
  `name` varchar(12) NOT NULL COMMENT '收件人',
  `mobile` varchar(20) NOT NULL COMMENT '手机号',
  `zone` int(11) NOT NULL COMMENT '区域ID',
  `area` varchar(60) NOT NULL COMMENT '区域',
  `address` varchar(60) NOT NULL COMMENT '详细地址',
  `zip` varchar(10) NOT NULL COMMENT '邮编',
  `is_default` tinyint(3) NOT NULL DEFAULT '0' COMMENT '默认地址',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of zz_member_address
-- ----------------------------

-- ----------------------------
-- Table structure for `zz_member_bankcard`
-- ----------------------------
DROP TABLE IF EXISTS `zz_member_bankcard`;
CREATE TABLE `zz_member_bankcard` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(60) NOT NULL,
  `mid` int(11) NOT NULL,
  `username` varchar(60) NOT NULL,
  `bankname` varchar(60) NOT NULL,
  `bankcard` varchar(255) NOT NULL,
  `bankaddress` varchar(255) NOT NULL,
  `is_default` tinyint(3) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of zz_member_bankcard
-- ----------------------------

-- ----------------------------
-- Table structure for `zz_member_bonus`
-- ----------------------------
DROP TABLE IF EXISTS `zz_member_bonus`;
CREATE TABLE `zz_member_bonus` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `bonus_id` int(11) NOT NULL DEFAULT '0' COMMENT '抵用券ID',
  `bonus_sn` bigint(20) NOT NULL DEFAULT '0' COMMENT '抵用券条码',
  `money` decimal(10,0) NOT NULL DEFAULT '0',
  `money_type` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0夺宝币 1余额',
  `start_time` int(11) NOT NULL DEFAULT '0' COMMENT '添加时间',
  `end_time` int(11) NOT NULL DEFAULT '0' COMMENT '有效期',
  `mid` int(11) NOT NULL DEFAULT '0' COMMENT '所属会员ID',
  `used_time` int(11) NOT NULL DEFAULT '0' COMMENT '消费时间',
  `order_id` bigint(20) NOT NULL DEFAULT '0' COMMENT '消费的订单ID',
  `desc` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1135 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of zz_member_bonus
-- ----------------------------

-- ----------------------------
-- Table structure for `zz_member_fri`
-- ----------------------------
DROP TABLE IF EXISTS `zz_member_fri`;
CREATE TABLE `zz_member_fri` (
  `mid1` int(11) NOT NULL DEFAULT '0' COMMENT '被访问者',
  `mid2` int(11) NOT NULL DEFAULT '0' COMMENT '来访者',
  `c_time` int(11) NOT NULL DEFAULT '0' COMMENT '关注时间',
  KEY `mid1` (`mid1`) USING BTREE,
  KEY `mid2` (`mid2`),
  KEY `mid1_mid2` (`mid1`,`mid2`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of zz_member_fri
-- ----------------------------

-- ----------------------------
-- Table structure for `zz_member_login_log`
-- ----------------------------
DROP TABLE IF EXISTS `zz_member_login_log`;
CREATE TABLE `zz_member_login_log` (
  `sesskey` char(32) NOT NULL,
  `mid` int(11) NOT NULL DEFAULT '0',
  `adminid` int(11) NOT NULL DEFAULT '0',
  `ip` char(15) NOT NULL,
  `c_time` int(10) NOT NULL,
  PRIMARY KEY (`sesskey`),
  KEY `sesskey` (`sesskey`),
  KEY `mid` (`mid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of zz_member_login_log
-- ----------------------------
INSERT INTO zz_member_login_log VALUES ('nujdq97gq7bfq13m9vt8ots7k4', '0', '0', '127.0.0.1', '1469176572');
INSERT INTO zz_member_login_log VALUES ('ejpd1o169s594lpasp8m6eau73', '0', '0', '127.0.0.1', '1468803406');

-- ----------------------------
-- Table structure for `zz_member_other`
-- ----------------------------
DROP TABLE IF EXISTS `zz_member_other`;
CREATE TABLE `zz_member_other` (
  `mid` int(11) unsigned NOT NULL,
  `isMob` tinyint(1) NOT NULL DEFAULT '0' COMMENT '绑定手机是否领取',
  `isMail` tinyint(1) NOT NULL DEFAULT '0' COMMENT '邮箱认证是否领取',
  `isDaren` int(8) unsigned NOT NULL DEFAULT '0' COMMENT '夺宝达人是否领取',
  `isStep` tinyint(1) NOT NULL DEFAULT '0' COMMENT '安装并登陆爱我拍夺宝和竟拍是否领取',
  `isJpDaren` int(8) unsigned NOT NULL DEFAULT '0' COMMENT '竞拍达人是否领取',
  `isPhoto` tinyint(1) NOT NULL DEFAULT '0' COMMENT '上传图像是否领取',
  `isVoice` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否语音认证',
  `isIdcard` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否实名认证',
  KEY `mid` (`mid`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of zz_member_other
-- ----------------------------

-- ----------------------------
-- Table structure for `zz_member_rank`
-- ----------------------------
DROP TABLE IF EXISTS `zz_member_rank`;
CREATE TABLE `zz_member_rank` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `rank_name` varchar(30) NOT NULL DEFAULT '',
  `min_points` int(10) unsigned NOT NULL DEFAULT '0',
  `max_points` int(10) unsigned NOT NULL DEFAULT '0',
  `thumb` varchar(255) NOT NULL DEFAULT '',
  `special` tinyint(1) DEFAULT '0',
  `allow_time` int(8) NOT NULL DEFAULT '0' COMMENT '分享次数',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of zz_member_rank
-- ----------------------------
INSERT INTO zz_member_rank VALUES ('1', '屌丝', '0', '5000', '', '0', '10');
INSERT INTO zz_member_rank VALUES ('2', ' 资深屌丝 ', '5000', '10000', '', '0', '0');
INSERT INTO zz_member_rank VALUES ('5', ' 达人 ', '10000', '20000', '', '0', '0');
INSERT INTO zz_member_rank VALUES ('6', ' 土豪 ', '20000', '500000', '', '0', '0');
INSERT INTO zz_member_rank VALUES ('7', ' 大客户 ', '500000', '1000000', '', '0', '0');
INSERT INTO zz_member_rank VALUES ('8', ' 超级大客户 ', '1000000', '1000000000', '', '0', '0');
INSERT INTO zz_member_rank VALUES ('10', '测试', '1000', '10000', '', '0', '0');

-- ----------------------------
-- Table structure for `zz_member_visit`
-- ----------------------------
DROP TABLE IF EXISTS `zz_member_visit`;
CREATE TABLE `zz_member_visit` (
  `mid1` int(11) NOT NULL DEFAULT '0' COMMENT '被访问者',
  `mid2` int(11) NOT NULL DEFAULT '0' COMMENT '来访者',
  `lasttime` int(11) NOT NULL DEFAULT '0' COMMENT '最后访问时间',
  `num` int(11) NOT NULL DEFAULT '0' COMMENT '刷新次数',
  KEY `mid1_mid2` (`mid1`,`mid2`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of zz_member_visit
-- ----------------------------

-- ----------------------------
-- Table structure for `zz_menus`
-- ----------------------------
DROP TABLE IF EXISTS `zz_menus`;
CREATE TABLE `zz_menus` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(30) DEFAULT NULL,
  `parentid` smallint(5) DEFAULT NULL,
  `mod` varchar(30) DEFAULT NULL,
  `action` varchar(30) DEFAULT NULL,
  `param` varchar(100) DEFAULT NULL,
  `icon` varchar(10) DEFAULT NULL,
  `listorder` int(11) DEFAULT '0',
  `type` tinyint(2) DEFAULT '1' COMMENT '1:用于显示,2用于处理子菜单关系',
  `status` tinyint(1) DEFAULT '1',
  `issystem` tinyint(1) DEFAULT '0',
  `module` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=171 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of zz_menus
-- ----------------------------
INSERT INTO zz_menus VALUES ('1', '系统', '0', 'setting', 'index', '', '', '0', '1', '1', '1', null);
INSERT INTO zz_menus VALUES ('2', '站点配置', '1', 'setting', 'index', '', '&#xe634;', '0', '1', '1', null, null);
INSERT INTO zz_menus VALUES ('3', '文章', '0', 'website', 'index', '', '&#xe631;', '3', '1', '1', '1', null);
INSERT INTO zz_menus VALUES ('121', '添加/编辑一元夺宝', '120', 'yunbuy', 'edit', '', '', '0', '2', '1', '0', null);
INSERT INTO zz_menus VALUES ('77', '文章碎片', '89', 'block', 'index', '', '&#xe619;', '1', '1', '1', '0', null);
INSERT INTO zz_menus VALUES ('78', '添加/编辑碎片', '77', 'block', 'edit', '', '', '0', '2', '1', '0', null);
INSERT INTO zz_menus VALUES ('79', '自定义导航', '89', 'content', 'index', 'nav', '&#xe601;', '1', '1', '1', '0', 'nav');
INSERT INTO zz_menus VALUES ('15', '添加/编辑菜单', '18', 'menus', 'edit', '', null, '1', '2', '1', null, null);
INSERT INTO zz_menus VALUES ('31', '栏目管理', '3', 'category', 'index', '', '&#xe631;', '0', '1', '1', '0', null);
INSERT INTO zz_menus VALUES ('17', '扩展', '0', 'extend', 'extend', '', null, '6', '1', '1', '1', null);
INSERT INTO zz_menus VALUES ('18', '后台菜单', '1', 'menus', 'index', '', '&#xe631;', '1', '1', '1', null, null);
INSERT INTO zz_menus VALUES ('27', '模型管理', '3', 'module', 'index', '', '&#xe62d;', '2', '1', '1', null, null);
INSERT INTO zz_menus VALUES ('22', '修改密码', '2', 'setting', 'chpass', '', '', '0', '2', '1', null, null);
INSERT INTO zz_menus VALUES ('157', '删除内容', '65', 'content', 'del', 'article', '', '0', '2', '1', '0', null);
INSERT INTO zz_menus VALUES ('28', '添加/编辑模型', '27', 'module', 'edit', '', '', '1', '2', '1', null, null);
INSERT INTO zz_menus VALUES ('29', '字段管理', '27', 'field', 'index', '', '', '2', '2', '1', '0', null);
INSERT INTO zz_menus VALUES ('30', '添加/编辑字段', '27', 'field', 'edit', '', '', '3', '2', '1', '0', null);
INSERT INTO zz_menus VALUES ('32', '添加/编辑栏目', '31', 'category', 'edit', '', '', '0', '2', '1', '0', null);
INSERT INTO zz_menus VALUES ('70', '添加/编辑内容', '69', 'content', 'edit', 'gbook', null, '0', '2', '1', '0', 'gbook');
INSERT INTO zz_menus VALUES ('71', '修改内容', '31', 'content', 'edit', 'page', '', '0', '2', '1', '0', null);
INSERT INTO zz_menus VALUES ('47', '推荐位', '89', 'posid', 'index', '', '&#xe632;', '3', '1', '0', '0', null);
INSERT INTO zz_menus VALUES ('48', '添加/编辑推荐位', '47', 'posid', 'edit', '', '', '0', '2', '1', '0', null);
INSERT INTO zz_menus VALUES ('65', '文章模型', '3', 'content', 'index', 'article', '&#xe601;', '0', '1', '1', '0', 'article');
INSERT INTO zz_menus VALUES ('66', '添加/编辑内容', '65', 'content', 'edit', 'article', null, '0', '2', '1', '0', 'article');
INSERT INTO zz_menus VALUES ('98', '商品管理', '97', 'goods', 'index', '', '&#xe63c;', '0', '1', '1', '0', null);
INSERT INTO zz_menus VALUES ('97', '商城', '0', 'mall', 'index', '', '', '1', '1', '1', '1', null);
INSERT INTO zz_menus VALUES ('69', '在线留言', '3', 'content', 'index', 'gbook', '&#xe601;', '0', '1', '1', '0', 'gbook');
INSERT INTO zz_menus VALUES ('72', '友情链接', '89', 'content', 'index', 'links', '&#xe646;', '0', '1', '1', '0', 'links');
INSERT INTO zz_menus VALUES ('73', '添加/编辑内容', '72', 'content', 'edit', 'links', null, '0', '2', '1', '0', 'links');
INSERT INTO zz_menus VALUES ('74', '广告模型', '89', 'content', 'index', 'ad', '&#xe601;', '2', '1', '1', '0', 'ad');
INSERT INTO zz_menus VALUES ('75', '添加/编辑内容', '74', 'content', 'edit', 'ad', null, '0', '2', '1', '0', 'ad');
INSERT INTO zz_menus VALUES ('76', '分配权限', '2', 'setting', 'node', '1', '', '0', '2', '1', '0', null);
INSERT INTO zz_menus VALUES ('81', '媒体库', '17', 'upload', 'media', '', '&#xe602;', '1000', '1', '1', '0', null);
INSERT INTO zz_menus VALUES ('87', '联动菜单', '89', 'linkage', 'index', '', '&#xe631;', '4', '1', '1', '0', null);
INSERT INTO zz_menus VALUES ('88', '添加/编辑联动菜单', '87', 'linkage', 'edit', '', '', '0', '2', '1', '0', null);
INSERT INTO zz_menus VALUES ('89', '模块', '0', 'content', 'index', '', '', '5', '1', '1', '1', null);
INSERT INTO zz_menus VALUES ('90', '微信', '0', 'wechat', '', '', '&#xe615;', '7', '1', '1', '1', null);
INSERT INTO zz_menus VALUES ('91', '菜单设置', '90', 'wxmenu', 'index', '', '&#xe605;', '0', '1', '1', '1', null);
INSERT INTO zz_menus VALUES ('92', '素材管理', '90', 'wxmedia', '', '', '&#xe605;', '0', '1', '1', '1', null);
INSERT INTO zz_menus VALUES ('93', '自动回复', '90', 'wxreply', '', '', '&#xe605;', '0', '1', '1', '1', null);
INSERT INTO zz_menus VALUES ('95', '会员', '0', 'member', '', '', '', '2', '1', '1', '1', null);
INSERT INTO zz_menus VALUES ('96', '会员管理', '95', 'member', 'index', '', '&#xe621;', '0', '1', '1', '0', null);
INSERT INTO zz_menus VALUES ('99', '账户明细', '96', 'member', 'account_log', '', '', '0', '2', '1', '0', null);
INSERT INTO zz_menus VALUES ('100', '添加商品', '98', 'goods', 'add', '', '', '0', '2', '1', '0', null);
INSERT INTO zz_menus VALUES ('102', '编辑商品', '98', 'goods', 'edit', '', '', '0', '2', '1', '0', null);
INSERT INTO zz_menus VALUES ('106', '订单管理', '97', 'order', 'index', '', '&#xe647;', '10', '1', '1', '0', null);
INSERT INTO zz_menus VALUES ('107', '订单详情', '106', 'order', 'detail', '', '', '0', '2', '1', '0', null);
INSERT INTO zz_menus VALUES ('116', '充值提现', '95', 'member', 'member_account', '', '&#xe605;', '2', '1', '1', '0', null);
INSERT INTO zz_menus VALUES ('120', '云购管理', '97', 'yunbuy', 'index', '', '&#xe605;', '5', '1', '1', '0', null);
INSERT INTO zz_menus VALUES ('123', '支付方式', '1', 'payment', 'index', '', '&#xe614;', '2', '1', '1', '0', null);
INSERT INTO zz_menus VALUES ('124', '添加/编辑', '116', 'member', 'member_account_edit', '', '', '0', '2', '1', '0', null);
INSERT INTO zz_menus VALUES ('125', '管理员列表', '1', 'admin', 'index', '', '&#xe614;', '4', '1', '1', '0', null);
INSERT INTO zz_menus VALUES ('126', '管理员角色', '1', 'admin', 'role', '', '&#xe614;', '5', '1', '1', '0', null);
INSERT INTO zz_menus VALUES ('127', '日志管理', '1', 'log', 'index', '', '&#xe614;', '6', '1', '1', '0', null);
INSERT INTO zz_menus VALUES ('128', '添加/编辑', '125', 'admin', 'edit', '', '', '0', '2', '1', '0', null);
INSERT INTO zz_menus VALUES ('129', '添加/编辑', '126', 'admin', 'edit_role', '', '', '0', '2', '1', '0', null);
INSERT INTO zz_menus VALUES ('130', '短信验证码日志', '127', 'log', 'sms', '', '', '0', '2', '1', '0', null);
INSERT INTO zz_menus VALUES ('158', '快递公司', '1', 'express', 'index', '', '&#xe614;', '2', '1', '1', '0', null);
INSERT INTO zz_menus VALUES ('132', '邮箱短信模板', '1', 'templates', 'index', '', '&#xe614;', '3', '1', '1', '0', null);
INSERT INTO zz_menus VALUES ('133', '控制面板', '1', 'timing', 'index', '', '&#xe641;', '-1', '1', '1', '0', null);
INSERT INTO zz_menus VALUES ('134', '竞拍开奖', '133', 'timing', 'cod', '', '', '0', '2', '1', '0', null);
INSERT INTO zz_menus VALUES ('135', '竞拍今日开奖', '133', 'timing', 'editCod', '', '', '0', '2', '1', '0', null);
INSERT INTO zz_menus VALUES ('136', '云购分类', '97', 'yuncat', 'index', '', '&#xe605;', '6', '1', '1', '0', null);
INSERT INTO zz_menus VALUES ('137', '云购订单', '97', 'yunbuy', 'order', '', '&#xe605;', '7', '1', '1', '0', null);
INSERT INTO zz_menus VALUES ('138', '晒单管理', '97', 'share', 'index', '', '&#xe605;', '8', '1', '1', '0', null);
INSERT INTO zz_menus VALUES ('139', '实名认证', '95', 'member', 'verify_idcard', '', '&#xe63f;', '1', '1', '1', '0', null);
INSERT INTO zz_menus VALUES ('140', '会员留言', '95', 'member', 'message', '', '&#xe645;', '4', '1', '1', '0', null);
INSERT INTO zz_menus VALUES ('141', '账户明细', '95', 'member', 'account_log', '', '&#xe605;', '5', '1', '1', '0', null);
INSERT INTO zz_menus VALUES ('145', '会员等级', '95', 'member_rank', 'index', '', '&#xe640;', '3', '1', '1', '0', null);
INSERT INTO zz_menus VALUES ('146', '邀请奖励', '95', 'member', 'award_ivt', '', '&#xe605;', '6', '1', '1', '0', null);
INSERT INTO zz_menus VALUES ('147', '佣金明细', '95', 'member', 'commission', '', '&#xe605;', '7', '1', '1', '0', null);
INSERT INTO zz_menus VALUES ('169', '大转盘', '17', 'plate', 'config', '', '&#xe605;', '0', '1', '1', '0', null);
INSERT INTO zz_menus VALUES ('149', '佣金提现', '95', 'member', 'withdraw_commission', '', '&#xe605;', '8', '1', '1', '0', null);
INSERT INTO zz_menus VALUES ('167', '移动端分类', '97', 'mobilecat', 'index', '', '', '6', '1', '1', '0', null);
INSERT INTO zz_menus VALUES ('153', '商品品牌', '97', 'brand', 'index', '', '&#xe605;', '1', '1', '1', '0', null);
INSERT INTO zz_menus VALUES ('155', '抵用券', '95', 'bonus', 'index', '', '&#xe65a;', '10', '1', '1', '0', null);
INSERT INTO zz_menus VALUES ('156', '发送队列 ', '132', 'templates', 'send', '', '', '0', '2', '1', '0', null);
INSERT INTO zz_menus VALUES ('160', '商品分类', '97', 'goodscat', 'index', '', '&#xe605;', '2', '1', '1', '0', null);
INSERT INTO zz_menus VALUES ('161', '竞拍管理', '97', 'auction', 'index', '', '&#xe605;', '3', '1', '1', '0', null);
INSERT INTO zz_menus VALUES ('170', '多媒体分类', '17', 'gallery_tag', 'index', '', '&#xe631;', '0', '1', '1', '0', '');

-- ----------------------------
-- Table structure for `zz_mobilecat`
-- ----------------------------
DROP TABLE IF EXISTS `zz_mobilecat`;
CREATE TABLE `zz_mobilecat` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT '编号',
  `catname` varchar(255) NOT NULL COMMENT '分类名称',
  `parentid` int(10) NOT NULL DEFAULT '0' COMMENT '父级ID',
  `arrparentid` text NOT NULL COMMENT '父类ID组',
  `arrchildid` text NOT NULL COMMENT '子类ID组',
  `child` tinyint(1) NOT NULL COMMENT '是否有子级',
  `title` varchar(60) NOT NULL COMMENT '页面标题',
  `keywords` varchar(120) NOT NULL COMMENT '页面关键字',
  `description` int(255) NOT NULL COMMENT '页面描述',
  `listorder` smallint(5) NOT NULL DEFAULT '0' COMMENT '排序',
  `thumb` varchar(255) NOT NULL COMMENT '缩略图',
  `url` varchar(255) NOT NULL COMMENT 'URL',
  `ismenu` smallint(3) NOT NULL DEFAULT '0' COMMENT '是否导航',
  `catname_en` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of zz_mobilecat
-- ----------------------------
INSERT INTO zz_mobilecat VALUES ('1', '一元区', '0', '0', '1', '0', '', '', '0', '0', '', '/yunbuy?zq=1', '1', '');
INSERT INTO zz_mobilecat VALUES ('2', '十元区', '0', '0', '2', '0', '', '', '0', '0', '', '/yunbuy?zq=10', '1', '');
INSERT INTO zz_mobilecat VALUES ('3', '百元区', '0', '0', '3', '0', '', '', '0', '0', '', '/yunbuy?zq=100', '1', '');
INSERT INTO zz_mobilecat VALUES ('4', '免费区', '0', '0', '4', '0', '', '', '0', '0', '', 'http://baidu.com', '0', '');
INSERT INTO zz_mobilecat VALUES ('6', '免费区', '0', '0', '6', '0', '', '', '0', '0', '', '/yunbuy?type=2', '1', '');
INSERT INTO zz_mobilecat VALUES ('5', '限购区', '0', '0', '5', '0', '', '', '0', '0', '', '/yunbuy?zq=limit', '1', '');
INSERT INTO zz_mobilecat VALUES ('7', '直购区', '0', '0', '7', '0', '', '', '0', '0', '', '/yunbuy?zq=buy', '1', '');
INSERT INTO zz_mobilecat VALUES ('8', '晒单', '0', '0', '8', '0', '', '', '0', '0', '', '/content/share', '1', '');
INSERT INTO zz_mobilecat VALUES ('9', '大转盘', '0', '0', '9', '0', '', '', '0', '0', '', '/plate', '1', '');

-- ----------------------------
-- Table structure for `zz_module`
-- ----------------------------
DROP TABLE IF EXISTS `zz_module`;
CREATE TABLE `zz_module` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL DEFAULT '',
  `name` varchar(50) NOT NULL DEFAULT '',
  `description` varchar(200) NOT NULL DEFAULT '',
  `type` tinyint(2) unsigned NOT NULL DEFAULT '0',
  `issystem` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `issearch` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `listsearch` varchar(255) NOT NULL,
  `listshow` varchar(255) NOT NULL,
  `listfields` varchar(255) NOT NULL DEFAULT '',
  `htorder` varchar(255) DEFAULT NULL,
  `setup` mediumtext NOT NULL,
  `listorder` smallint(3) unsigned NOT NULL DEFAULT '0',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of zz_module
-- ----------------------------
INSERT INTO zz_module VALUES ('1', '单页模型', 'page', '单页模型', '3', '1', '1', '', '', '*', null, '', '1', '1');
INSERT INTO zz_module VALUES ('2', '文章模型', 'article', '文章模型', '3', '1', '1', '', 'title', '*', '', '', '0', '1');
INSERT INTO zz_module VALUES ('6', '广告模型', 'ad', '广告位和广告模型', '89', '1', '0', '', 'title,images,width,height', '*', 'listorder,id', '', '2', '1');
INSERT INTO zz_module VALUES ('4', '在线留言', 'gbook', '留言表单', '3', '0', '1', 'name,email,sex,content,status', 'name,email,content,createtime,ip', '*', '', '', '0', '1');
INSERT INTO zz_module VALUES ('5', '友情链接', 'links', '扩展模型', '17', '0', '1', 'title', 'title,siteurl', '*', 'listorder,id', '', '2', '1');
INSERT INTO zz_module VALUES ('7', '自定义导航', 'nav', '自定义导航模型', '89', '1', '1', 'title,catid,posid,type,status', 'title,linkurl', '*', 'listorder,id', '', '3', '1');
INSERT INTO zz_module VALUES ('8', '商品推荐位', 'rec', '', '97', '1', '1', '', 'title,recid', '*', '', '', '8', '1');

-- ----------------------------
-- Table structure for `zz_module_field`
-- ----------------------------
DROP TABLE IF EXISTS `zz_module_field`;
CREATE TABLE `zz_module_field` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `moduleid` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `field` varchar(20) NOT NULL DEFAULT '',
  `name` varchar(30) NOT NULL DEFAULT '',
  `tips` varchar(150) NOT NULL DEFAULT '',
  `required` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `minlength` int(10) unsigned NOT NULL DEFAULT '0',
  `maxlength` int(10) unsigned NOT NULL DEFAULT '0',
  `pattern` varchar(255) NOT NULL DEFAULT '',
  `errormsg` varchar(255) NOT NULL DEFAULT '',
  `class` varchar(20) NOT NULL DEFAULT '',
  `type` varchar(20) NOT NULL DEFAULT '',
  `setup` mediumtext NOT NULL,
  `ispost` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `unpostgroup` varchar(60) NOT NULL DEFAULT '',
  `listorder` int(10) unsigned NOT NULL DEFAULT '0',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `issystem` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=70 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of zz_module_field
-- ----------------------------
INSERT INTO zz_module_field VALUES ('14', '2', 'posid', '推荐位', '', '0', '0', '0', '', '', '', 'posid', '', '1', '0', '94', '1', '1');
INSERT INTO zz_module_field VALUES ('1', '1', 'createtime', '发布时间', '', '1', '0', '0', '', '', '', 'datetime', '', '0', '0', '96', '1', '1');
INSERT INTO zz_module_field VALUES ('8', '2', 'catid', '栏目', '', '1', '1', '6', '', '必须选择一个栏目', '', 'catid', '', '1', '', '0', '1', '1');
INSERT INTO zz_module_field VALUES ('37', '5', 'intro', '简介', '', '0', '0', '0', '', '', '', 'textarea', '{\"fieldtype\":\"text\",\"width\":\"\",\"height\":\"\",\"default\":\"\"}', '0', '', '0', '1', '0');
INSERT INTO zz_module_field VALUES ('2', '1', 'status', '状态', '', '0', '0', '0', '', '', '', 'radio', '{\"options\":\"\\u5df2\\u5ba1\\u6838|1\\r\\n\\u672a\\u5ba1\\u6838|0\",\"fieldtype\":\"tinyint\",\"numbertype\":\"1\",\"labelwidth\":\"75\",\"default\":\"1\"}', '0', '0', '100', '1', '1');
INSERT INTO zz_module_field VALUES ('45', '6', 'images', '广告图片', '', '0', '0', '0', '', '', '', 'images', '{\"upload_maxnum\":\"10\",\"upload_maxsize\":\"\",\"upload_allowext\":\"*.gif;*.jpg;*.jpeg;*.png\",\"watermark\":\"0\",\"more\":\"0\"}', '0', '', '1', '1', '0');
INSERT INTO zz_module_field VALUES ('46', '7', 'createtime', '发布时间', '', '1', '0', '0', '', '', '', 'datetime', '', '0', '0', '100', '1', '1');
INSERT INTO zz_module_field VALUES ('9', '2', 'title', '标题', '', '1', '1', '80', '', '标题必填3-80个字', '', 'title', '{\"thumb\":\"1\",\"btntext\":\"\",\"style\":\"1\",\"size\":\"\"}', '1', '0', '0', '1', '1');
INSERT INTO zz_module_field VALUES ('53', '2', 'publish', '来源', '', '0', '0', '0', '', '', '', 'text', '{\"size\":\"\",\"default\":\"\",\"ispassword\":\"0\"}', '0', '', '0', '1', '0');
INSERT INTO zz_module_field VALUES ('15', '2', 'createtime', '发布时间', '', '0', '0', '0', '', '', '', 'datetime', '', '1', '0', '96', '1', '1');
INSERT INTO zz_module_field VALUES ('42', '6', 'title', '广告位名称', '', '1', '0', '0', '', '', '', 'title', '{\"thumb\":\"1\",\"btntext\":\"\\u5e7f\\u544a\\u4f4d\\u622a\\u56fe\",\"style\":\"0\",\"size\":\"\"}', '0', '', '0', '1', '0');
INSERT INTO zz_module_field VALUES ('16', '2', 'template', '模板', '', '0', '0', '0', '', '', '', 'template', '', '0', '0', '99', '1', '1');
INSERT INTO zz_module_field VALUES ('39', '4', 'content', '内容', '', '1', '0', '0', '', '', '', 'textarea', '{\"fieldtype\":\"text\",\"width\":\"\",\"height\":\"\",\"default\":\"\"}', '0', '', '10', '1', '0');
INSERT INTO zz_module_field VALUES ('13', '2', 'hits', '点击次数', '', '0', '0', '8', '', '', '', 'number', '{\"size\":\"60\",\"numbertype\":\"1\",\"decimaldigits\":\"0\",\"default\":\"0\"}', '1', '0', '95', '1', '1');
INSERT INTO zz_module_field VALUES ('44', '6', 'height', '广告位高度', '广告位高度请输入数字类型', '0', '0', '0', 'digits', '', '', 'text', '{\"size\":\"\",\"default\":\"\",\"ispassword\":\"0\"}', '0', '', '0', '1', '0');
INSERT INTO zz_module_field VALUES ('17', '2', 'status', '状态', '', '0', '0', '0', '', '', '', 'radio', '{\"options\":\"\\u5f00\\u542f|1\\r\\n\\u5173\\u95ed|0\",\"fieldtype\":\"tinyint\",\"numbertype\":\"1\",\"labelwidth\":\"75\",\"default\":\"1\"}', '0', '0', '100', '1', '1');
INSERT INTO zz_module_field VALUES ('10', '2', 'keywords', 'SEO关键词', '', '0', '0', '80', '', '', '', 'text', '{\"size\":\"\",\"default\":\"\",\"ispassword\":\"0\",\"fieldtype\":\"varchar\"}', '1', '0', '97', '1', '1');
INSERT INTO zz_module_field VALUES ('12', '2', 'content', '内容', '', '0', '0', '0', '', '', '', 'editor', '{\"edittype\":\"kindeditor\",\"toolbar\":\"full\",\"default\":\"\",\"height\":\"\"}', '1', '0', '0', '1', '1');
INSERT INTO zz_module_field VALUES ('57', '4', 'email', '邮箱', '', '1', '0', '0', '', '', '', 'text', '{\"size\":\"\",\"default\":\"\",\"ispassword\":\"0\"}', '0', '', '4', '1', '0');
INSERT INTO zz_module_field VALUES ('4', '1', 'content', '内容', '', '0', '0', '0', '', '', '', 'editor', '{\"edittype\":\"kindeditor\",\"toolbar\":\"basic\",\"default\":\"\",\"height\":\"\"}', '0', '', '0', '1', '1');
INSERT INTO zz_module_field VALUES ('34', '5', 'title', '链接名称', '', '1', '0', '0', '', '', '', 'title', '{\"thumb\":\"1\",\"style\":\"0\",\"size\":\"\"}', '0', '', '0', '1', '0');
INSERT INTO zz_module_field VALUES ('11', '2', 'description', 'SEO描述', '', '0', '0', '0', '', '', '', 'textarea', '{\"fieldtype\":\"mediumtext\",\"width\":\"\",\"height\":\"\",\"default\":\"\"}', '1', '0', '98', '1', '1');
INSERT INTO zz_module_field VALUES ('28', '4', 'createtime', '发布时间', '', '0', '0', '0', '', '', '', 'datetime', '', '0', '0', '96', '1', '1');
INSERT INTO zz_module_field VALUES ('35', '5', 'siteurl', '链接地址', '', '0', '0', '0', 'url', '', '', 'text', '{\"size\":\"\",\"default\":\"http:\\/\\/\",\"ispassword\":\"0\"}', '0', '', '0', '1', '0');
INSERT INTO zz_module_field VALUES ('50', '7', 'linkurl', '链接地址', '', '0', '0', '0', '', '', '', 'text', '{\"size\":\"\",\"default\":\"\",\"ispassword\":\"0\"}', '0', '', '0', '1', '0');
INSERT INTO zz_module_field VALUES ('62', '4', 'ip', 'ip', '', '0', '0', '0', '', '', '', 'text', '{\"size\":\"\",\"default\":\"\",\"ispassword\":\"0\"}', '0', '', '0', '1', '0');
INSERT INTO zz_module_field VALUES ('49', '7', 'title', '导航名称', '', '1', '0', '0', '', '', '', 'title', '{\"thumb\":\"0\",\"btntext\":\"\",\"style\":\"0\",\"size\":\"300\"}', '0', '', '0', '1', '0');
INSERT INTO zz_module_field VALUES ('47', '7', 'status', '状态', '', '0', '0', '0', '', '', '', 'radio', '{\"options\":\"\\u663e\\u793a|1\\r\\n\\u9690\\u85cf|0\",\"fieldtype\":\"tinyint\",\"numbertype\":\"1\",\"labelwidth\":\"\",\"default\":\"1\"}', '0', '0', '96', '1', '1');
INSERT INTO zz_module_field VALUES ('31', '5', 'createtime', '发布时间', '', '1', '0', '0', '', '', '', 'datetime', '', '0', '0', '96', '1', '1');
INSERT INTO zz_module_field VALUES ('51', '7', 'isblank', '新窗口', '', '0', '0', '0', '', '', '', 'radio', '{\"options\":\"\\u662f|1\\r\\n\\u5426|0\",\"fieldtype\":\"varchar\",\"numbertype\":\"1\",\"labelwidth\":\"\",\"default\":\"0\"}', '0', '', '0', '1', '0');
INSERT INTO zz_module_field VALUES ('3', '1', 'title', '标题', '', '1', '0', '0', '', '', '', 'title', '{\"thumb\":\"0\",\"style\":\"0\",\"size\":\"\"}', '0', '', '0', '1', '1');
INSERT INTO zz_module_field VALUES ('7', '1', 'hits', '点击次数', '', '0', '0', '0', '', '', '', 'number', '{\"size\":\"60\",\"numbertype\":\"1\",\"decimaldigits\":\"0\",\"default\":\"0\"}', '0', '', '95', '1', '1');
INSERT INTO zz_module_field VALUES ('40', '6', 'createtime', '发布时间', '', '1', '0', '0', '', '', '', 'datetime', '', '0', '0', '96', '1', '1');
INSERT INTO zz_module_field VALUES ('59', '4', 'name', '姓名', '', '1', '0', '0', '', '', '', 'text', '{\"size\":\"\",\"default\":\"\",\"ispassword\":\"0\"}', '0', '', '0', '1', '0');
INSERT INTO zz_module_field VALUES ('48', '7', 'type', '显示位置', '', '1', '0', '0', '', '', '', 'radio', '{\"options\":\"\\u9876\\u90e8|1\\r\\n\\u5e95\\u90e8|2\\r\\n\\u4e3b\\u5bfc\\u822a|3\\r\\n\\u5de6\\u5bfc\\u822a|4\",\"fieldtype\":\"varchar\",\"numbertype\":\"1\",\"labelwidth\":\"\",\"default\":\"1\"}', '0', '', '0', '1', '0');
INSERT INTO zz_module_field VALUES ('33', '5', 'linktype', '链接类型', '', '1', '0', '0', '', '', '', 'radio', '{\"options\":\"\\u5e95\\u90e8\\u6587\\u5b57\\u94fe\\u63a5|1\\r\\n\\u5e95\\u90e8\\u56fe\\u7247\\u94fe\\u63a5|2\",\"fieldtype\":\"varchar\",\"numbertype\":\"1\",\"labelwidth\":\"\",\"default\":\"1\"}', '0', '', '0', '1', '0');
INSERT INTO zz_module_field VALUES ('41', '6', 'status', '状态', '', '0', '0', '0', '', '', '', 'radio', '{\"options\":\"\\u5df2\\u5ba1\\u6838|1\\r\\n\\u672a\\u5ba1\\u6838|0\",\"fieldtype\":\"tinyint\",\"numbertype\":\"1\",\"labelwidth\":\"75\",\"default\":\"1\"}', '0', '0', '100', '1', '1');
INSERT INTO zz_module_field VALUES ('29', '4', 'status', '状态', '', '0', '0', '0', '', '', '', 'radio', '{\"options\":\"\\u5df2\\u5ba1\\u6838|1\\r\\n\\u672a\\u5ba1\\u6838|0\\r\\n\",\"fieldtype\":\"tinyint\",\"numbertype\":\"1\",\"labelwidth\":\"75\",\"default\":\"0\"}', '0', '0', '100', '1', '1');
INSERT INTO zz_module_field VALUES ('43', '6', 'width', '广告位宽度', '广告位宽度请输入数字类型', '0', '0', '0', 'digits', '', '', 'text', '{\"size\":\"\",\"default\":\"\",\"ispassword\":\"0\"}', '0', '', '0', '1', '0');
INSERT INTO zz_module_field VALUES ('32', '5', 'status', '状态', '', '0', '0', '0', '', '', '', 'radio', '{\"options\":\"\\u5df2\\u5ba1\\u6838|1\\r\\n\\u672a\\u5ba1\\u6838|0\",\"fieldtype\":\"tinyint\",\"numbertype\":\"1\",\"labelwidth\":\"75\",\"default\":\"1\"}', '0', '0', '100', '1', '1');
INSERT INTO zz_module_field VALUES ('60', '2', 'link', '外部链接', '', '0', '0', '0', '', '', '', 'text', '{\"size\":\"\",\"default\":\"\",\"ispassword\":\"0\"}', '0', '', '0', '1', '0');
INSERT INTO zz_module_field VALUES ('61', '7', 'rec', 'hot', '', '0', '0', '0', '', '', '', 'radio', '{\"options\":\"\\u662f|1\\r\\n\\u5426|0\",\"fieldtype\":\"tinyint\",\"numbertype\":\"1\",\"labelwidth\":\"\",\"default\":\"0\"}', '0', '', '0', '1', '0');
INSERT INTO zz_module_field VALUES ('63', '6', 'bgcolor', '背景颜色', '', '0', '0', '0', '', '', '', 'text', '{\"size\":\"\",\"default\":\"\",\"ispassword\":\"0\"}', '0', '', '0', '1', '0');
INSERT INTO zz_module_field VALUES ('64', '8', 'createtime', '发布时间', '', '1', '0', '0', '', '', '', 'datetime', '', '0', '0', '96', '1', '1');
INSERT INTO zz_module_field VALUES ('65', '8', 'status', '状态', '', '0', '0', '0', '', '', '', 'radio', '{\"options\":\"\\u5df2\\u5ba1\\u6838|1\\r\\n\\u672a\\u5ba1\\u6838|0\",\"fieldtype\":\"tinyint\",\"numbertype\":\"1\",\"labelwidth\":\"75\",\"default\":\"1\"}', '0', '0', '100', '1', '1');
INSERT INTO zz_module_field VALUES ('66', '8', 'title', '标题', '', '0', '0', '0', '', '', '', 'text', '{\"size\":\"\",\"default\":\"\",\"ispassword\":\"0\"}', '0', '', '0', '1', '0');
INSERT INTO zz_module_field VALUES ('67', '8', 'thumb', '图片', '', '0', '0', '0', '', '', '', 'images', '{\"upload_maxnum\":\"\",\"upload_maxsize\":\"\",\"upload_allowext\":\"*.gif;*.jpg;*.jpeg;*.png\",\"watermark\":\"0\",\"more\":\"0\"}', '0', '', '0', '1', '0');
INSERT INTO zz_module_field VALUES ('68', '8', 'type', '推荐位', '', '1', '0', '0', '', '', '', 'select', '{\"options\":\"\\u9996\\u9875\\u7126\\u70b9\\u56fe\\u53f3\\u4fa7\\u593a\\u5b9d\\u63a8\\u8350\\u4f4d|1\\r\\n\\u9996\\u9875\\u7126\\u70b9\\u56fe\\u4e0b\\u65b9\\u7ade\\u62cd\\u63a8\\u8350\\u4f4d|2\",\"multiple\":\"0\",\"fieldtype\":\"varchar\",\"numbertype\":\"1\",\"size\":\"\",\"default\":\"\"}', '0', '', '0', '1', '0');
INSERT INTO zz_module_field VALUES ('69', '8', 'recid', '推荐内容ID', '', '1', '0', '0', 'number', '', '', 'text', '{\"size\":\"\",\"default\":\"\",\"ispassword\":\"0\"}', '0', '', '0', '1', '0');

-- ----------------------------
-- Table structure for `zz_msg`
-- ----------------------------
DROP TABLE IF EXISTS `zz_msg`;
CREATE TABLE `zz_msg` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) DEFAULT NULL,
  `mid` int(11) DEFAULT '0',
  `username` varchar(60) DEFAULT NULL,
  `to_mid` int(11) DEFAULT NULL,
  `to_username` varchar(60) DEFAULT NULL,
  `title` varchar(60) DEFAULT NULL,
  `content` varchar(255) DEFAULT NULL,
  `status` tinyint(3) DEFAULT '0' COMMENT '状态:0未读1已读',
  `add_time` int(10) DEFAULT NULL,
  `type` tinyint(3) DEFAULT '0' COMMENT '类型0:会员留言1:管理员留言',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of zz_msg
-- ----------------------------

-- ----------------------------
-- Table structure for `zz_m_user`
-- ----------------------------
DROP TABLE IF EXISTS `zz_m_user`;
CREATE TABLE `zz_m_user` (
  `uid` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(30) DEFAULT NULL,
  `password` varchar(64) DEFAULT NULL,
  `lastlogin` int(11) DEFAULT NULL,
  `salt` char(6) DEFAULT NULL,
  `group_id` int(11) DEFAULT '1',
  `ip` varchar(15) DEFAULT NULL,
  `u_time` int(11) DEFAULT NULL,
  `c_time` int(11) DEFAULT NULL,
  `desc` text,
  `visitor` tinyint(1) DEFAULT '0' COMMENT '1 访客',
  `tel` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=MyISAM AUTO_INCREMENT=53 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of zz_m_user
-- ----------------------------
INSERT INTO zz_m_user VALUES ('52', 'admin', '59b792ac39f91783efc1be276ca4205b', null, '613666', '1', null, null, null, '系统管理员', '0', '');

-- ----------------------------
-- Table structure for `zz_m_user_group`
-- ----------------------------
DROP TABLE IF EXISTS `zz_m_user_group`;
CREATE TABLE `zz_m_user_group` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `desc` text,
  `menu_list` varchar(300) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '权限菜单',
  `listorder` smallint(3) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of zz_m_user_group
-- ----------------------------
INSERT INTO zz_m_user_group VALUES ('1', '系统', '整站管理，拥有最高权限', '1,133,134,135,2,22,76,18,15,123,158,132,156,125,128,126,129,127,130,97,98,100,102,153,160,161,120,121,136,167,137,138,106,107,95,96,99,139,116,124,145,140,141,146,147,149,155,3,31,32,71,65,66,157,69,70,27,28,29,30,89,72,73,77,78,79,74,75,47,48,87,88,17,169,81,90,91,92,93', '1');
INSERT INTO zz_m_user_group VALUES ('6', '访客', '客户访客（无添加/更新/删除权限）', '1,133,134,135,2,76,18,15,123,158,132,156,127,130,97,98,100,102,153,160,161,120,121,136,137,138,106,107,95,96,99,139,116,124,145,140,141,146,147,149,155,3,31,32,71,65,66,157,69,70,27,28,29,30,89,72,73,77,78,79,74,75,47,48,87,88,17,169,81,90,91,92,93', '2');
INSERT INTO zz_m_user_group VALUES ('10', '商务', '拥有所有（除管理员与角色权限）权限', '1,133,134,135,2,22,76,18,15,123,158,132,156,125,128,126,129,127,130,97,98,100,102,153,160,161,120,121,136,137,138,106,107,95,96,99,139,116,124,145,140,141,146,147,149,155,3,31,32,71,65,66,157,69,70,27,28,29,30,89,72,73,77,78,79,74,75,47,48,87,88,17,169,81,90,91,92,93', '3');
INSERT INTO zz_m_user_group VALUES ('11', '技术', '拥有所有（除管理员与角色权限）权限', '1,133,134,135,2,22,76,18,15,123,158,132,156,125,128,126,129,127,130,97,98,100,102,153,160,161,120,121,136,167,137,138,106,107,95,96,99,139,116,124,145,140,141,146,147,149,155,3,31,32,71,65,66,157,69,70,27,28,29,30,89,72,73,77,78,79,74,75,47,48,87,88,17,169,81,90,91,92,93', '4');

-- ----------------------------
-- Table structure for `zz_m_user_log`
-- ----------------------------
DROP TABLE IF EXISTS `zz_m_user_log`;
CREATE TABLE `zz_m_user_log` (
  `log_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `log_time` int(10) unsigned NOT NULL DEFAULT '0',
  `user_id` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `log_info` varchar(255) NOT NULL DEFAULT '',
  `ip_address` varchar(15) NOT NULL DEFAULT '',
  PRIMARY KEY (`log_id`),
  KEY `log_time` (`log_time`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5126 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of zz_m_user_log
-- ----------------------------
INSERT INTO zz_m_user_log VALUES ('5098', '1464920012', '46', '一键清理数据', '127.0.0.1');
INSERT INTO zz_m_user_log VALUES ('5099', '1466476814', '52', '编辑广告模型：【微信】主导航下焦点图', '127.0.0.1');
INSERT INTO zz_m_user_log VALUES ('5100', '1466476818', '52', '编辑广告模型：【卡券列表页】导航下广告位', '127.0.0.1');
INSERT INTO zz_m_user_log VALUES ('5101', '1466476822', '52', '编辑广告模型：【精品拍列表页】导航下广告位 ', '127.0.0.1');
INSERT INTO zz_m_user_log VALUES ('5102', '1466476827', '52', '编辑广告模型：【体验区】导航下横幅广告位', '127.0.0.1');
INSERT INTO zz_m_user_log VALUES ('5103', '1466580802', '46', '更新站点配置', '127.0.0.1');
INSERT INTO zz_m_user_log VALUES ('5104', '1466581448', '46', '编辑云购手机分类：一元区', '127.0.0.1');
INSERT INTO zz_m_user_log VALUES ('5105', '1466581460', '46', '编辑云购手机分类：十元区', '127.0.0.1');
INSERT INTO zz_m_user_log VALUES ('5106', '1466581473', '46', '编辑云购手机分类：百元区', '127.0.0.1');
INSERT INTO zz_m_user_log VALUES ('5107', '1466581542', '46', '编辑云购手机分类：百元区', '127.0.0.1');
INSERT INTO zz_m_user_log VALUES ('5108', '1466581560', '46', '添加云购手机分类：限购区', '127.0.0.1');
INSERT INTO zz_m_user_log VALUES ('5109', '1466581568', '46', '编辑云购手机分类：限购区', '127.0.0.1');
INSERT INTO zz_m_user_log VALUES ('5110', '1466581571', '46', '编辑云购手机分类：限购区', '127.0.0.1');
INSERT INTO zz_m_user_log VALUES ('5111', '1466581580', '46', '编辑云购手机分类：限购区', '127.0.0.1');
INSERT INTO zz_m_user_log VALUES ('5112', '1466581586', '46', '编辑云购手机分类：限购区', '127.0.0.1');
INSERT INTO zz_m_user_log VALUES ('5113', '1466581590', '46', '编辑云购手机分类：一元区', '127.0.0.1');
INSERT INTO zz_m_user_log VALUES ('5114', '1466581593', '46', '编辑云购手机分类：十元区', '127.0.0.1');
INSERT INTO zz_m_user_log VALUES ('5115', '1466581596', '46', '编辑云购手机分类：百元区', '127.0.0.1');
INSERT INTO zz_m_user_log VALUES ('5116', '1466581613', '46', '添加云购手机分类：免费区', '127.0.0.1');
INSERT INTO zz_m_user_log VALUES ('5117', '1466581624', '46', '添加云购手机分类：直购区', '127.0.0.1');
INSERT INTO zz_m_user_log VALUES ('5118', '1466581648', '46', '添加云购手机分类：晒单', '127.0.0.1');
INSERT INTO zz_m_user_log VALUES ('5119', '1466581657', '46', '添加云购手机分类：大转盘', '127.0.0.1');
INSERT INTO zz_m_user_log VALUES ('5120', '1467710063', '52', '更新站点配置', '127.0.0.1');
INSERT INTO zz_m_user_log VALUES ('5121', '1468222659', '52', '编辑单页模型：退换货政策', '127.0.0.1');
INSERT INTO zz_m_user_log VALUES ('5122', '1468223142', '52', '更新站点配置', '127.0.0.1');
INSERT INTO zz_m_user_log VALUES ('5123', '1468223209', '52', '更新站点配置', '127.0.0.1');
INSERT INTO zz_m_user_log VALUES ('5124', '1469176691', '52', '编辑管理员：admin', '127.0.0.1');
INSERT INTO zz_m_user_log VALUES ('5125', '1469176694', '52', '编辑管理员：admin', '127.0.0.1');

-- ----------------------------
-- Table structure for `zz_nav`
-- ----------------------------
DROP TABLE IF EXISTS `zz_nav`;
CREATE TABLE `zz_nav` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `userid` int(8) unsigned NOT NULL DEFAULT '0',
  `username` varchar(40) NOT NULL DEFAULT '',
  `url` varchar(60) NOT NULL DEFAULT '',
  `listorder` int(10) unsigned NOT NULL DEFAULT '0',
  `createtime` int(11) unsigned NOT NULL DEFAULT '0',
  `updatetime` int(11) unsigned NOT NULL DEFAULT '0',
  `lang` tinyint(2) unsigned NOT NULL DEFAULT '0',
  `type` varchar(255) NOT NULL DEFAULT '1',
  `title` varchar(255) NOT NULL DEFAULT '',
  `title_style` varchar(40) NOT NULL DEFAULT '',
  `thumb` varchar(255) NOT NULL DEFAULT '',
  `linkurl` text NOT NULL,
  `isblank` varchar(255) NOT NULL DEFAULT '0',
  `rec` tinyint(3) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=51 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of zz_nav
-- ----------------------------
INSERT INTO zz_nav VALUES ('1', '1', '1', 'lnest_admin', '/content/show//1', '1', '1405073435', '1418052347', '1', '2', '关于我们', '', '', '/content/index/2', '0', '0');
INSERT INTO zz_nav VALUES ('2', '0', '1', 'lnest_admin', '/content/show//2', '2', '1405303686', '1417049890', '1', '2', '加入我们', '', '', '/content/index/3', '0', '0');
INSERT INTO zz_nav VALUES ('3', '1', '1', 'lnest_admin', '/content/show//3', '3', '1405303698', '1418646047', '1', '2', '服务协议', '', '', '/content/index/42', '0', '0');
INSERT INTO zz_nav VALUES ('5', '1', '1', 'lnest_admin', '/content/show//5', '5', '1405303836', '1447486111', '1', '2', '一元云购规则', '', '', '/content/index/71', '0', '0');
INSERT INTO zz_nav VALUES ('6', '1', '1', 'lnest_admin', '/content/show//6', '6', '1405303845', '1418645074', '1', '2', '联系我们', '', '', '/content/index/77', '0', '0');
INSERT INTO zz_nav VALUES ('8', '1', '1', 'lnest_admin', '/content/show//8', '1', '1450341752', '1450485547', '1', '2', '首页', '', '', '/', '1', '0');
INSERT INTO zz_nav VALUES ('11', '1', '1', 'lnest_admin', '/content/show//11', '2', '1416465678', '1458008125', '1', '3', '一元购', '', '', '/yunbuy', '0', '0');
INSERT INTO zz_nav VALUES ('13', '1', '1', 'lnest_admin', '/content/show//13', '6', '1416465991', '1458008131', '1', '3', '免费购', '', '', '/content/tiyan/db', '0', '0');
INSERT INTO zz_nav VALUES ('30', '1', '1', 'lnest_admin', '/content/show//30', '1', '1431486891', '1451551901', '1', '3', '首页', '', '', '/', '0', '0');
INSERT INTO zz_nav VALUES ('41', '1', '2', 'admin', '/content/show//41', '10', '1450836978', '0', '1', '3', '最新揭晓', '', '', '/content/win', '0', '0');
INSERT INTO zz_nav VALUES ('20', '1', '1', 'lnest_admin', '/content/show//20', '1', '1416999155', '1418644894', '1', '1', '联系客服', '', '', '/content/index/77', '0', '0');
INSERT INTO zz_nav VALUES ('46', '1', '45', 'whl15377993193', '/content/show//46', '9', '1458183952', '0', '1', '3', '邀请', '', '', '/member/myivt', '0', '0');
INSERT INTO zz_nav VALUES ('22', '1', '1', 'lnest_admin', '/content/show//22', '8', '1417051849', '1450837033', '1', '3', '晒单', '', '', '/content/share', '0', '0');
INSERT INTO zz_nav VALUES ('28', '1', '1', 'lnest_admin', '/content/show//28', '2', '1420704500', '1450352665', '1', '2', '最新揭晓', '', '', '/content/win', '0', '0');
INSERT INTO zz_nav VALUES ('24', '1', '1', 'lnest_admin', '/content/show//24', '12', '1417051870', '1432287408', '1', '1', '官方交流群', '', '', '/content/index/80', '0', '0');
INSERT INTO zz_nav VALUES ('31', '1', '1', 'lnest_admin', '/content/show//31', '4', '1448973225', '1450425525', '1', '2', '卡券竞拍', '', '', '/auction/lists/kaquan', '0', '0');
INSERT INTO zz_nav VALUES ('48', '1', '43', 'tim', '/content/show//48', '7', '1458728106', '1458728959', '1', '3', '竞拍', '', '', '/auction/lists', '0', '0');
INSERT INTO zz_nav VALUES ('45', '1', '1', 'lnest_admin', '/content/show//45', '5', '1458008053', '1458008117', '1', '3', '直购区', '', '', '/yunbuy?zq=buy', '0', '0');
INSERT INTO zz_nav VALUES ('42', '1', '2', 'admin', '/content/show//42', '3', '1451879699', '1451890693', '1', '3', '十元区', '', '', '/yunbuy?zq=10', '0', '0');
INSERT INTO zz_nav VALUES ('35', '1', '2', 'admin', '/content/show//35', '4', '1449196570', '1458008111', '1', '3', '限购区', '', '', '/yunbuy?zq=limit', '0', '0');
INSERT INTO zz_nav VALUES ('44', '1', '23', 'tim', '/content/show//44', '3', '1453365953', '1463104919', '1', '3', '百元区', '', '', '/yunbuy?zq=100', '0', '0');
INSERT INTO zz_nav VALUES ('40', '0', '2', 'admin', '/content/show//40', '0', '1450520400', '1451540533', '1', '4', '一元夺宝', '', '', 'yunbuy', '0', '0');
INSERT INTO zz_nav VALUES ('36', '1', '2', 'admin', '/content/show//36', '4', '1450352698', '0', '1', '2', '购物车', '', '', '', '0', '0');
INSERT INTO zz_nav VALUES ('37', '1', '2', 'admin', '/content/show//37', '5', '1450352759', '0', '1', '2', '我的云购', '', '', '', '0', '0');
INSERT INTO zz_nav VALUES ('50', '1', '46', 'suhafe', '/content/show//50', '11', '1463104860', '1463121438', '1', '3', '大转盘', '', '', '/plate', '0', '1');

-- ----------------------------
-- Table structure for `zz_oauth_wx`
-- ----------------------------
DROP TABLE IF EXISTS `zz_oauth_wx`;
CREATE TABLE `zz_oauth_wx` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `appid` varchar(18) COLLATE utf8_unicode_ci DEFAULT '',
  `appsecret` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `apiurl` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `access_token` varchar(180) COLLATE utf8_unicode_ci DEFAULT NULL,
  `expires_in` int(10) DEFAULT '0' COMMENT 'access_token过期时间',
  `refresh_token` varchar(180) COLLATE utf8_unicode_ci DEFAULT NULL,
  `refresh_time` int(10) DEFAULT '0' COMMENT '刷新access_token的时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of zz_oauth_wx
-- ----------------------------
INSERT INTO zz_oauth_wx VALUES ('1', '1231231231231', '231231231', 'https://api.weixin.qq.com/cgi-bin/', 'ZkY_I813MR7LaG0XaygFXmw_-KMit3in-c0kA1uu2IKQWVagCsJOhhOur-pjZG9xilcWzBLov-gNzV7p2tA7alqXXcgjLIpZox4n2pKGjc8830JzeyPjwHc0B2UOvdcAQYDgABAXFK', '7200', null, '1458906375');

-- ----------------------------
-- Table structure for `zz_page`
-- ----------------------------
DROP TABLE IF EXISTS `zz_page`;
CREATE TABLE `zz_page` (
  `id` int(11) unsigned NOT NULL,
  `status` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `userid` int(8) unsigned NOT NULL DEFAULT '0',
  `username` varchar(40) NOT NULL DEFAULT '',
  `url` varchar(60) NOT NULL DEFAULT '',
  `listorder` int(10) unsigned NOT NULL DEFAULT '0',
  `createtime` int(11) unsigned NOT NULL DEFAULT '0',
  `updatetime` int(11) unsigned NOT NULL DEFAULT '0',
  `lang` tinyint(2) unsigned NOT NULL DEFAULT '0',
  `title` varchar(255) NOT NULL DEFAULT '',
  `title_style` varchar(40) NOT NULL DEFAULT '',
  `thumb` varchar(255) NOT NULL DEFAULT '',
  `content` text NOT NULL,
  `hits` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of zz_page
-- ----------------------------
INSERT INTO zz_page VALUES ('1', '1', '2', 'admin', '', '0', '1405472290', '1405472293', '1', '关于我们', '', '', 'asdfasdf', '0');
INSERT INTO zz_page VALUES ('2', '1', '2', 'admin', '/content/show//2', '0', '1405409998', '1464260909', '1', '公司简介', '', '', '欢迎你来，拍你所想，拍你所爱。<br />\r\n有钱可以任性，没钱也可以矫情。<br />\r\n都说上帝有三个苹果，一个诱惑了夏娃，一个砸醒了牛顿，一个让乔布斯咬了一口。<br />\r\n<br />\r\n欲望、知识、激情，三个苹果为我们人类开启了通向未知世界的门，改变了我们每个人看世界的方式。在接过下一个苹果的时候，我们期待去探索一个未知而充满诱惑的世界。<br />\r\n<br />\r\n进入二十一世纪，互联网科技的飞速发展，改变了人类的生活方式。交友聊天、浏览新闻、收发邮件，网络游戏、网络购物、互联网让生活变得一键可达。随着互联网电子商务浪潮的到来，传统的利润分配模式将被改写，消费者与商家的关系也将被重新定义，一个消费经济的分账时代已经来临。<br />\r\n<br />\r\nXXX紧跟时代的步伐，及时洞悉时代变迁，推出1元夺宝这种新型在线电子购物模式，每件商品您只需投入1元钱购买XXX网盘空间1兆，即可获赠1个“夺宝币”，同时获得相应一个号码，每件商品可多次参与，参与次数越多，获得商品机率越大；当然，您也可以一次购买多兆XXX网盘空间，获赠多个“夺宝币”，获得多个号码；每件商品设有所需参与人数下限，只要参与人数达标，系统即会随机抽出一位幸运者，由这位幸运者获得这件商品。<br />\r\n<br />\r\n玩得就是心情，玩得就是开心。为进一步满足消费者的竞拍购物乐趣，同时XXX还推出在线竞拍，以刺激的竞拍为核心，将娱乐互动寓于网购中，让参与者通过对商品进行竞拍，从而获得廉价购买到优质商品的权利。其实竞拍是比团购更省钱的购物模式，如果说团购是普惠制，那竞拍就是集惠制。我们都知道团购是很多用户集中购买某一商品，从而以更低的打折价格获得，因此它考虑的是所有成员的普及受惠，势必到每位用户的打折范围是有限的。而竞拍则是把所有打折范围集中在参与用户的部分人群中，比例通常是1—20%，从而让参与用户能获得更低的折扣范围和更大的省钱空间，同时还引入第三方上证指数为计算依据，公平公正公开的产生中签用户。可见竟拍是比团购更省钱更好玩的娱乐购物方式，不仅购物有惊喜，而且省钱还能赚钱。竞拍没有成功，没有任何损失，竞拍结束，又可提现回自己账户。竟拍充分体现互联网思维与信息流动所产生的价值，即免费性。<br />\r\n<br />\r\n众筹梦想，您每一个微小的梦想，在<span>XXX</span>网上，我们都会鼎力相帮，从1开始，实力和运气幸福流转。<br />\r\n<br />\r\nXXX，把下一个苹果留给那些有实力有福气又不期而遇的人。有时不能说男生太娘们，只能说姑娘你太爷们了！购物容易，剁手不易，一块硬币，且购且珍惜。<span>XXX</span>，等你拍。<br />', '1910');
INSERT INTO zz_page VALUES ('3', '1', '2', 'admin', '/content/show//3', '0', '1404956034', '1418821313', '1', '加入我们', '', '', '<p>\r\n	<strong>招聘职位：PHP 程序工程师</strong> \r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n任职要求：<br />\r\n1.1年以上持续php网站编程工作经验，条件优秀者可适当放宽；<br />\r\n2.具有优秀的团队合作和沟通协作能力，积极上进，理解能力和接受能力好；<br />\r\n3.优秀的编程思路，良好的代码风格；<br />\r\n4.熟悉MySQL，可以有针对性地实施数据库和查询优化<br />\r\n5.熟练掌握PHP，熟悉主流开发框架；<br />\r\n6.待遇:<span style=\"white-space:nowrap;\">8-10K+项目奖金+期权+弹性工作制</span><br />\r\n<p>\r\n	本岗位，非常欢迎有\"开发\"能力优秀的同事加入。\r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	<span style=\"font-family:宋体;line-height:23px;white-space:normal;background-color:#FFFFFF;\"><strong>招聘职位：</strong><strong>美工设计师</strong><br />\r\n</span> \r\n</p>\r\n<p>\r\n	<span style=\"font-family:宋体;line-height:23px;white-space:normal;background-color:#FFFFFF;\"><br />\r\n</span> \r\n</p>\r\n职位要求：<br />\r\n1、美术类、广告设计类或计算机类专业；<br />\r\n2、有网页设计经验；<br />\r\n3、具有美术设计功底，有较强的色彩搭配能力及审美观念，能够独立承担企业网站界面及平面的设计； <br />\r\n4、对DW、PS等网页制作软件能良好运用；<br />\r\n5、具有个人独特的设计风格及设计理念；<br />\r\n6、有网页设计，网页美工，网站设计从业经验者优先。<br />\r\n<p>\r\n	7、有作品\r\n</p>\r\n<p>\r\n	<span style=\"white-space:normal;\">8、待遇:<span style=\"white-space:normal;\"><span style=\"white-space:nowrap;\">7-10K</span><br />\r\n</span></span> \r\n</p>\r\n<div style=\"white-space:nowrap;\">\r\n	<br />\r\n</div>\r\n<p>\r\n	<span style=\"font-family:宋体;line-height:23px;white-space:normal;background-color:#FFFFFF;\"><strong>招聘职位：</strong><strong>App开发工程师</strong><br />\r\n</span> \r\n</p>\r\n<p>\r\n	<span style=\"font-family:宋体;line-height:23px;white-space:normal;background-color:#FFFFFF;\"><br />\r\n</span> \r\n</p>\r\n职位要求：<br />\r\n1.负责android终端产品的开发和预研工作；<br />\r\n2.负责软件问题的快速分析和修复；<br />\r\n3.根据项目任务计划独立按时完成软件高质量编码和测试工作；<br />\r\n任职要求：<br />\r\n1.2年以上，熟悉android平台开发平台经验，至少一个独立开发案例经验，熟悉android架构；<br />\r\n2.了解异动网络特点及相关协议，有手机终端软件设计和架构能力；<br />\r\n3.JAVA基础扎实，精通常用数据结构与算法；<br />\r\n4.熟悉 Android SDK， 熟悉 Android 系统下 UI、网络通信、进程管理、权限设置等机制；<br />\r\n5.有较强的自我驱动能力，能主动寻求不断优化，追求卓越，有过成熟的移动终端产品开发者优先；\r\n<p>\r\n	<span style=\"white-space:normal;\">8、<span style=\"white-space:normal;\">待遇:</span>8-10K+项目奖金+期权+弹性工作制<span style=\"white-space:normal;\"><span style=\"white-space:nowrap;\"></span><br />\r\n</span></span> \r\n</p>\r\n<div style=\"white-space:nowrap;\">\r\n	<br />\r\n</div>', '1359');
INSERT INTO zz_page VALUES ('11', '1', '2', 'admin', '', '0', '1404271493', '1404271496', '1', '网站地图', '', '', '网站地图', '0');
INSERT INTO zz_page VALUES ('18', '1', '1', 'lnest_admin', '', '0', '1404956243', '1404956243', '1', '红枣类', '', '', '', '0');
INSERT INTO zz_page VALUES ('19', '1', '1', 'lnest_admin', '', '0', '1404956243', '1404956243', '1', '其它类', '', '', '', '0');
INSERT INTO zz_page VALUES ('20', '1', '1', 'lnest_admin', '', '0', '1404956261', '1404956261', '1', '红飞健康枣系列', '', '', '', '0');
INSERT INTO zz_page VALUES ('21', '1', '1', 'lnest_admin', '', '0', '1404956261', '1404956261', '1', '雪域圣果系列', '', '', '', '0');
INSERT INTO zz_page VALUES ('22', '1', '1', 'lnest_admin', '', '0', '1404956261', '1404956261', '1', '枣博士系列', '', '', '', '0');
INSERT INTO zz_page VALUES ('23', '1', '1', 'lnest_admin', '', '0', '1404956261', '1404956261', '1', '礼盒系列', '', '', '', '0');
INSERT INTO zz_page VALUES ('24', '1', '1', 'lnest_admin', '', '0', '1404956261', '1404956261', '1', '枣片系列', '', '', '', '0');
INSERT INTO zz_page VALUES ('25', '1', '1', 'lnest_admin', '', '0', '1404956261', '1404956261', '1', '枣干系列', '', '', '', '0');
INSERT INTO zz_page VALUES ('26', '1', '1', 'lnest_admin', '', '0', '1404956261', '1404956261', '1', '蜜饯系列', '', '', '', '0');
INSERT INTO zz_page VALUES ('27', '1', '1', 'lnest_admin', '', '0', '1404956281', '1404956281', '1', '红飞健康枣系列', '', '', '', '0');
INSERT INTO zz_page VALUES ('28', '1', '1', 'lnest_admin', '', '0', '1404956281', '1404956281', '1', '雪域圣果系列', '', '', '', '0');
INSERT INTO zz_page VALUES ('64', '1', '1', 'lnest_admin', '/content/show//64', '0', '1416906326', '1417161585', '1', '中奖规则', '', '', '<p>\r\n	中奖规则<span style=\"background:#FFFFFF;color:#444444;text-transform:none;letter-spacing:0pt;font-family:&quot;宋体&quot;;font-size:9pt;font-style:normal;font-weight:bold;mso-spacerun:&quot;yes&quot;;mso-shading:#FFFFFF;\">拍卖原则</span><span style=\"font-family:&quot;宋体&quot;;font-size:9pt;font-weight:bold;mso-spacerun:&quot;yes&quot;;\"><o:p></o:p></span> \r\n</p>\r\n<p class=\"p18\" style=\"margin:0pt 15pt 15pt;padding:0pt;line-height:22.5pt;\">\r\n	<span class=\"15\" style=\"background:#FFFFFF;color:#444444;text-transform:none;letter-spacing:0pt;font-family:&quot;Arial&quot;;font-size:10.5pt;font-style:normal;font-weight:bold;mso-spacerun:&quot;yes&quot;;mso-shading:#FFFFFF;\">第一条：</span><span style=\"background:#FFFFFF;color:#444444;text-transform:none;letter-spacing:0pt;font-family:&quot;Arial&quot;;font-size:10.5pt;font-style:normal;font-weight:normal;mso-spacerun:&quot;yes&quot;;mso-shading:#FFFFFF;\">拍卖规则是为保障网络拍卖顺利有序进行而设置的，保护买家、卖家的合法权益，每个会员都应遵守拍卖规则。</span><span style=\"font-family:&quot;Times New Roman&quot;;font-size:10.5pt;mso-spacerun:&quot;yes&quot;;\"><o:p></o:p></span> \r\n</p>\r\n<p class=\"p18\" style=\"margin:0pt 15pt 15pt;padding:0pt;line-height:22.5pt;\">\r\n	<span class=\"15\" style=\"background:#FFFFFF;color:#444444;text-transform:none;letter-spacing:0pt;font-family:&quot;Arial&quot;;font-size:10.5pt;font-style:normal;font-weight:bold;mso-spacerun:&quot;yes&quot;;mso-shading:#FFFFFF;\">第二条：</span><span style=\"background:#FFFFFF;color:#444444;text-transform:none;letter-spacing:0pt;font-family:&quot;Arial&quot;;font-size:10.5pt;font-style:normal;font-weight:normal;mso-spacerun:&quot;yes&quot;;mso-shading:#FFFFFF;\">拍卖本着公平交易，公正对待的原则，买家与买家平等，买家与卖家平等。</span><span style=\"font-family:&quot;Times New Roman&quot;;font-size:10.5pt;mso-spacerun:&quot;yes&quot;;\"><o:p></o:p></span> \r\n</p>\r\n<h3 style=\"margin:0pt 15pt 15pt;padding:0pt;line-height:22.5pt;\">\r\n	<span style=\"background:#FFFFFF;color:#444444;text-transform:none;letter-spacing:0pt;font-family:&quot;宋体&quot;;font-size:9pt;font-style:normal;font-weight:bold;mso-spacerun:&quot;yes&quot;;mso-shading:#FFFFFF;\">拍卖规则</span><span style=\"font-family:&quot;宋体&quot;;font-size:9pt;font-weight:bold;mso-spacerun:&quot;yes&quot;;\"><o:p></o:p></span> \r\n</h3>\r\n<p class=\"p18\" style=\"margin:0pt 15pt 15pt;padding:0pt;line-height:22.5pt;\">\r\n	<span class=\"15\" style=\"background:#FFFFFF;color:#444444;text-transform:none;letter-spacing:0pt;font-family:&quot;Arial&quot;;font-size:10.5pt;font-style:normal;font-weight:bold;mso-spacerun:&quot;yes&quot;;mso-shading:#FFFFFF;\">第一条：</span><span style=\"background:#FFFFFF;color:#444444;text-transform:none;letter-spacing:0pt;font-family:&quot;Arial&quot;;font-size:10.5pt;font-style:normal;font-weight:normal;mso-spacerun:&quot;yes&quot;;mso-shading:#FFFFFF;\">拍卖分为</span><span style=\"background:#FFFFFF;color:#444444;text-transform:none;letter-spacing:0pt;font-family:&quot;宋体&quot;;font-size:10.5pt;font-style:normal;font-weight:normal;mso-spacerun:&quot;yes&quot;;mso-shading:#FFFFFF;\">正在热拍</span><span style=\"background:#FFFFFF;color:#444444;text-transform:none;letter-spacing:0pt;font-family:&quot;Arial&quot;;font-size:10.5pt;font-style:normal;font-weight:normal;mso-spacerun:&quot;yes&quot;;mso-shading:#FFFFFF;\">、</span><span style=\"background:#FFFFFF;color:#444444;text-transform:none;letter-spacing:0pt;font-family:&quot;宋体&quot;;font-size:10.5pt;font-style:normal;font-weight:normal;mso-spacerun:&quot;yes&quot;;mso-shading:#FFFFFF;\">下期预告</span><span style=\"background:#FFFFFF;color:#444444;text-transform:none;letter-spacing:0pt;font-family:&quot;Arial&quot;;font-size:10.5pt;font-style:normal;font-weight:normal;mso-spacerun:&quot;yes&quot;;mso-shading:#FFFFFF;\">、</span><span style=\"background:#FFFFFF;color:#444444;text-transform:none;letter-spacing:0pt;font-family:&quot;宋体&quot;;font-size:10.5pt;font-style:normal;font-weight:normal;mso-spacerun:&quot;yes&quot;;mso-shading:#FFFFFF;\">历史成交</span><span style=\"background:#FFFFFF;color:#444444;text-transform:none;letter-spacing:0pt;font-family:&quot;Arial&quot;;font-size:10.5pt;font-style:normal;font-weight:normal;mso-spacerun:&quot;yes&quot;;mso-shading:#FFFFFF;\">三类，会员只能在已经开始的拍卖中进行竞拍。</span><span style=\"font-family:&quot;Times New Roman&quot;;font-size:10.5pt;mso-spacerun:&quot;yes&quot;;\"><o:p></o:p></span> \r\n</p>\r\n<p class=\"p18\" style=\"margin:0pt 15pt 15pt;padding:0pt;line-height:22.5pt;\">\r\n	<span class=\"15\" style=\"background:#FFFFFF;color:#444444;text-transform:none;letter-spacing:0pt;font-family:&quot;Arial&quot;;font-size:10.5pt;font-style:normal;font-weight:bold;mso-spacerun:&quot;yes&quot;;mso-shading:#FFFFFF;\">第二条：</span><span style=\"background:#FFFFFF;color:#444444;text-transform:none;letter-spacing:0pt;font-family:&quot;Arial&quot;;font-size:10.5pt;font-style:normal;font-weight:normal;mso-spacerun:&quot;yes&quot;;mso-shading:#FFFFFF;\">每一个拍卖商品都设置拍卖时间，拍卖开始，可以参与拍卖，拍卖时间结束，则拍卖结束。</span><span style=\"font-family:&quot;Times New Roman&quot;;font-size:10.5pt;mso-spacerun:&quot;yes&quot;;\"><o:p></o:p></span> \r\n</p>\r\n<p class=\"p18\" style=\"margin:0pt 15pt 15pt;padding:0pt;line-height:22.5pt;\">\r\n	<span class=\"15\" style=\"background:#FFFFFF;color:#444444;text-transform:none;letter-spacing:0pt;font-family:&quot;Arial&quot;;font-size:10.5pt;font-style:normal;font-weight:bold;mso-spacerun:&quot;yes&quot;;mso-shading:#FFFFFF;\">第三条：</span><span style=\"background:#FFFFFF;color:#444444;text-transform:none;letter-spacing:0pt;font-family:&quot;Arial&quot;;font-size:10.5pt;font-style:normal;font-weight:normal;mso-spacerun:&quot;yes&quot;;mso-shading:#FFFFFF;\">参与竞拍时需要参缴保证金，参与竞拍出价时确保账户中有足够的保证金支付。</span><span style=\"font-family:&quot;Times New Roman&quot;;font-size:10.5pt;mso-spacerun:&quot;yes&quot;;\"><o:p></o:p></span> \r\n</p>\r\n<p class=\"p18\" style=\"margin:0pt 15pt 15pt;padding:0pt;line-height:22.5pt;\">\r\n	<span class=\"15\" style=\"background:#FFFFFF;color:#444444;text-transform:none;letter-spacing:0pt;font-family:&quot;Arial&quot;;font-size:10.5pt;font-style:normal;font-weight:bold;mso-spacerun:&quot;yes&quot;;mso-shading:#FFFFFF;\">第四条：</span><span style=\"background:#FFFFFF;color:#444444;text-transform:none;letter-spacing:0pt;font-family:&quot;Arial&quot;;font-size:10.5pt;font-style:normal;font-weight:normal;mso-spacerun:&quot;yes&quot;;mso-shading:#FFFFFF;\">每个竞拍都设有竞拍币限制，竞拍者在竞拍过程中使用的竞拍币数量不能超过该竞拍币限制。</span><span style=\"font-family:&quot;Times New Roman&quot;;font-size:10.5pt;mso-spacerun:&quot;yes&quot;;\"><o:p></o:p></span> \r\n</p>\r\n<p class=\"p18\" style=\"margin:0pt 15pt 15pt;padding:0pt;line-height:22.5pt;\">\r\n	<span class=\"15\" style=\"background:#FFFFFF;color:#444444;text-transform:none;letter-spacing:0pt;font-family:&quot;Arial&quot;;font-size:10.5pt;font-style:normal;font-weight:bold;mso-spacerun:&quot;yes&quot;;mso-shading:#FFFFFF;\">第五条：</span><span style=\"background:#FFFFFF;color:#444444;text-transform:none;letter-spacing:0pt;font-family:&quot;Arial&quot;;font-size:10.5pt;font-style:normal;font-weight:normal;mso-spacerun:&quot;yes&quot;;mso-shading:#FFFFFF;\">会员参与商品竞拍，保证金转为冻结状态，竞拍结束后，竞拍失败者冻结保证金将在<span style=\"font-family:Arial;\">1</span><span style=\"font-family:宋体;\">个工作日内解冻，竞拍成功者冻结保证金转为商品支付款。由于卖家的原因或者非买家造成的未付款，买家申诉取消交易成功，系统将会返还保证金。</span></span><span style=\"font-family:&quot;Times New Roman&quot;;font-size:10.5pt;mso-spacerun:&quot;yes&quot;;\"><o:p></o:p></span> \r\n</p>\r\n<p class=\"p18\" style=\"margin:0pt 15pt 15pt;padding:0pt;line-height:22.5pt;\">\r\n	<span class=\"15\" style=\"background:#FFFFFF;color:#444444;text-transform:none;letter-spacing:0pt;font-family:&quot;Arial&quot;;font-size:10.5pt;font-style:normal;font-weight:bold;mso-spacerun:&quot;yes&quot;;mso-shading:#FFFFFF;\">第六条：</span><span style=\"background:#FFFFFF;color:#444444;text-transform:none;letter-spacing:0pt;font-family:&quot;Arial&quot;;font-size:10.5pt;font-style:normal;font-weight:normal;mso-spacerun:&quot;yes&quot;;mso-shading:#FFFFFF;\">每一款商品设有起步价、加价幅度，起步价和加价幅度由商家自行设置。</span><span style=\"font-family:&quot;Times New Roman&quot;;font-size:10.5pt;mso-spacerun:&quot;yes&quot;;\"><o:p></o:p></span> \r\n</p>\r\n<p class=\"p18\" style=\"margin:0pt 15pt 15pt;padding:0pt;line-height:22.5pt;\">\r\n	<span class=\"15\" style=\"background:#FFFFFF;color:#444444;text-transform:none;letter-spacing:0pt;font-family:&quot;Arial&quot;;font-size:10.5pt;font-style:normal;font-weight:bold;mso-spacerun:&quot;yes&quot;;mso-shading:#FFFFFF;\">第七条：</span><span style=\"background:#FFFFFF;color:#444444;text-transform:none;letter-spacing:0pt;font-family:&quot;Arial&quot;;font-size:10.5pt;font-style:normal;font-weight:normal;mso-spacerun:&quot;yes&quot;;mso-shading:#FFFFFF;\">出价是在当前的最高的出价的基础上加价，如一款手机的起步价是<span style=\"font-family:Arial;\">10</span><span style=\"font-family:宋体;\">元，加价是</span><span style=\"font-family:Arial;\">10</span><span style=\"font-family:宋体;\">元，第一位出价，则它的购买价格是</span><span style=\"font-family:Arial;\">20</span><span style=\"font-family:宋体;\">元，第二位加价，应大于</span><span style=\"font-family:Arial;\">20</span><span style=\"font-family:宋体;\">元。</span></span><span style=\"font-family:&quot;Times New Roman&quot;;font-size:10.5pt;mso-spacerun:&quot;yes&quot;;\"><o:p></o:p></span> \r\n</p>\r\n<p class=\"p18\" style=\"margin:0pt 15pt 15pt;padding:0pt;line-height:22.5pt;\">\r\n	<span class=\"15\" style=\"background:#FFFFFF;color:#444444;text-transform:none;letter-spacing:0pt;font-family:&quot;Arial&quot;;font-size:10.5pt;font-style:normal;font-weight:bold;mso-spacerun:&quot;yes&quot;;mso-shading:#FFFFFF;\">第八条：</span><span style=\"background:#FFFFFF;color:#444444;text-transform:none;letter-spacing:0pt;font-family:&quot;Arial&quot;;font-size:10.5pt;font-style:normal;font-weight:normal;mso-spacerun:&quot;yes&quot;;mso-shading:#FFFFFF;\">出价时需要填写资金密码，会员应保管好自己的资金密码。</span><span style=\"font-family:&quot;Times New Roman&quot;;font-size:10.5pt;mso-spacerun:&quot;yes&quot;;\"><o:p></o:p></span> \r\n</p>\r\n<p class=\"p18\" style=\"margin:0pt 15pt 15pt;padding:0pt;line-height:22.5pt;\">\r\n	<span class=\"15\" style=\"background:#FFFFFF;color:#444444;text-transform:none;letter-spacing:0pt;font-family:&quot;Arial&quot;;font-size:10.5pt;font-style:normal;font-weight:bold;mso-spacerun:&quot;yes&quot;;mso-shading:#FFFFFF;\">第九条：</span><span style=\"background:#FFFFFF;color:#444444;text-transform:none;letter-spacing:0pt;font-family:&quot;Arial&quot;;font-size:10.5pt;font-style:normal;font-weight:normal;mso-spacerun:&quot;yes&quot;;mso-shading:#FFFFFF;\">在竞拍过程中，只要竞拍没有结束，可以选择多次出价。</span><span style=\"font-family:&quot;Times New Roman&quot;;font-size:10.5pt;mso-spacerun:&quot;yes&quot;;\"><o:p></o:p></span> \r\n</p>\r\n<p class=\"p18\" style=\"margin:0pt 15pt 15pt;padding:0pt;line-height:22.5pt;\">\r\n	<span class=\"15\" style=\"background:#FFFFFF;color:#444444;text-transform:none;letter-spacing:0pt;font-family:&quot;Arial&quot;;font-size:10.5pt;font-style:normal;font-weight:bold;mso-spacerun:&quot;yes&quot;;mso-shading:#FFFFFF;\">第十条：</span><span style=\"background:#FFFFFF;color:#444444;text-transform:none;letter-spacing:0pt;font-family:&quot;Arial&quot;;font-size:10.5pt;font-style:normal;font-weight:normal;mso-spacerun:&quot;yes&quot;;mso-shading:#FFFFFF;\">竞拍成功的名额以竞拍获胜数为主，为<span style=\"font-family:Arial;\">n</span><span style=\"font-family:宋体;\">个，</span><span style=\"font-family:Arial;\">n</span><span style=\"font-family:宋体;\">大于等于</span><span style=\"font-family:Arial;\">1</span><span style=\"font-family:宋体;\">。如设置的竞拍获胜数为</span><span style=\"font-family:Arial;\">10</span><span style=\"font-family:宋体;\">个，参与的竞拍获者是</span><span style=\"font-family:Arial;\">20</span><span style=\"font-family:宋体;\">个，则取前</span><span style=\"font-family:Arial;\">10</span><span style=\"font-family:宋体;\">个出价最高的竞拍者。</span></span><span style=\"font-family:&quot;Times New Roman&quot;;font-size:10.5pt;mso-spacerun:&quot;yes&quot;;\"><o:p></o:p></span> \r\n</p>\r\n<p class=\"p18\" style=\"margin:0pt 15pt 15pt;padding:0pt;line-height:22.5pt;\">\r\n	<span class=\"15\" style=\"background:#FFFFFF;color:#444444;text-transform:none;letter-spacing:0pt;font-family:&quot;Arial&quot;;font-size:10.5pt;font-style:normal;font-weight:bold;mso-spacerun:&quot;yes&quot;;mso-shading:#FFFFFF;\">第十一条：</span><span style=\"background:#FFFFFF;color:#444444;text-transform:none;letter-spacing:0pt;font-family:&quot;Arial&quot;;font-size:10.5pt;font-style:normal;font-weight:normal;mso-spacerun:&quot;yes&quot;;mso-shading:#FFFFFF;\">出现相同的最高出价者时，则都竞拍成功。如果人数大于竞拍获胜数，则以出价时间判断，先出价的获胜。</span><span style=\"font-family:&quot;Times New Roman&quot;;font-size:10.5pt;mso-spacerun:&quot;yes&quot;;\"><o:p></o:p></span> \r\n</p>\r\n<p class=\"p18\" style=\"margin:0pt 15pt 15pt;padding:0pt;line-height:22.5pt;\">\r\n	<span class=\"15\" style=\"background:#FFFFFF;color:#444444;text-transform:none;letter-spacing:0pt;font-family:&quot;Arial&quot;;font-size:10.5pt;font-style:normal;font-weight:bold;mso-spacerun:&quot;yes&quot;;mso-shading:#FFFFFF;\">第十二条：</span><span style=\"background:#FFFFFF;color:#444444;text-transform:none;letter-spacing:0pt;font-family:&quot;Arial&quot;;font-size:10.5pt;font-style:normal;font-weight:normal;mso-spacerun:&quot;yes&quot;;mso-shading:#FFFFFF;\">如果参与竞拍的人数少于竞拍获胜数，则所有的人都竞拍成功。</span><span style=\"font-family:&quot;Times New Roman&quot;;font-size:10.5pt;mso-spacerun:&quot;yes&quot;;\"><o:p></o:p></span> \r\n</p>\r\n<p class=\"p18\" style=\"margin:0pt 15pt 15pt;padding:0pt;line-height:22.5pt;\">\r\n	<span class=\"15\" style=\"background:#FFFFFF;color:#444444;text-transform:none;letter-spacing:0pt;font-family:&quot;Arial&quot;;font-size:10.5pt;font-style:normal;font-weight:bold;mso-spacerun:&quot;yes&quot;;mso-shading:#FFFFFF;\">第十三条：</span><span style=\"background:#FFFFFF;color:#444444;text-transform:none;letter-spacing:0pt;font-family:&quot;Arial&quot;;font-size:10.5pt;font-style:normal;font-weight:normal;mso-spacerun:&quot;yes&quot;;mso-shading:#FFFFFF;\">最低成交价是指等于或者大于设定的成交价。</span><span style=\"font-family:&quot;Times New Roman&quot;;font-size:10.5pt;mso-spacerun:&quot;yes&quot;;\"><o:p></o:p></span> \r\n</p>\r\n<p class=\"p18\" style=\"margin:0pt 15pt 15pt;padding:0pt;line-height:22.5pt;\">\r\n	<span class=\"15\" style=\"background:#FFFFFF;color:#444444;text-transform:none;letter-spacing:0pt;font-family:&quot;Arial&quot;;font-size:10.5pt;font-style:normal;font-weight:bold;mso-spacerun:&quot;yes&quot;;mso-shading:#FFFFFF;\">第十四条：</span><span style=\"background:#FFFFFF;color:#444444;text-transform:none;letter-spacing:0pt;font-family:&quot;Arial&quot;;font-size:10.5pt;font-style:normal;font-weight:normal;mso-spacerun:&quot;yes&quot;;mso-shading:#FFFFFF;\">设置最低成交价的商品，在最低成交价的前提下，参考竞拍获胜数。例如：某商品的最低成交价是<span style=\"font-family:Arial;\">1000</span><span style=\"font-family:宋体;\">，竞拍获胜数是</span><span style=\"font-family:Arial;\">3</span><span style=\"font-family:宋体;\">，有</span><span style=\"font-family:Arial;\">5</span><span style=\"font-family:宋体;\">人竞拍，其中</span><span style=\"font-family:Arial;\">3</span><span style=\"font-family:宋体;\">人超过</span><span style=\"font-family:Arial;\">1000</span><span style=\"font-family:宋体;\">，那么</span><span style=\"font-family:Arial;\">3</span><span style=\"font-family:宋体;\">人均成功竞拍；如果，有</span><span style=\"font-family:Arial;\">2</span><span style=\"font-family:宋体;\">人超过</span><span style=\"font-family:Arial;\">1000</span><span style=\"font-family:宋体;\">，其他三人出价低于</span><span style=\"font-family:Arial;\">1000</span><span style=\"font-family:宋体;\">，那么出价超过</span><span style=\"font-family:Arial;\">1000</span><span style=\"font-family:宋体;\">的两人获胜。最低成交价不对外显示。</span></span><span style=\"font-family:&quot;Times New Roman&quot;;font-size:10.5pt;mso-spacerun:&quot;yes&quot;;\"><o:p></o:p></span> \r\n</p>', '104');
INSERT INTO zz_page VALUES ('43', '1', '2', 'admin', '/content/show//43', '4', '1417082827', '1464261230', '1', '会员经验值', '', '', '<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	<span style=\"font-weight:bold;font-size:10.5000pt;font-family:\'宋体\';\">1、</span><span style=\"font-weight:bold;font-size:10.5000pt;font-family:\'宋体\';\">等级明细</span><span style=\"color:#555555;font-size:10.5pt;font-family:微软雅黑;\"></span> \r\n</p>\r\n<table style=\"width:415pt;padding:0pt;\">\r\n	<tbody>\r\n		<tr>\r\n			<td width=\"90\" valign=\"center\" style=\"border:0.7500pt solid #BBBBBB;background:#F3F3F3;\">\r\n				<p style=\"text-align:center;\">\r\n					<span style=\"color:#666666;font-weight:bold;font-size:9pt;font-family:宋体;\">等级</span><span style=\"font-size:10.5000pt;font-family:\'Times New Roman\';\"></span> \r\n				</p>\r\n			</td>\r\n			<td width=\"102\" valign=\"center\" style=\"border:0.7500pt solid #BBBBBB;background:#F3F3F3;\">\r\n				<p style=\"text-align:center;\">\r\n					<span style=\"color:#666666;font-weight:bold;font-size:9pt;font-family:宋体;\">等级名称</span><span style=\"font-size:10.5000pt;font-family:\'Times New Roman\';\"></span> \r\n				</p>\r\n			</td>\r\n			<td width=\"90\" valign=\"center\" style=\"border:0.7500pt solid #BBBBBB;background:#F3F3F3;\">\r\n				<p style=\"text-align:center;\">\r\n					<span style=\"color:#666666;font-weight:bold;font-size:9pt;font-family:宋体;\">身份标识</span><span style=\"font-size:10.5000pt;font-family:\'Times New Roman\';\"></span> \r\n				</p>\r\n			</td>\r\n			<td width=\"117\" valign=\"center\" style=\"border:0.7500pt solid #BBBBBB;background:#F3F3F3;\">\r\n				<p style=\"text-align:center;\">\r\n					<span style=\"color:#666666;font-weight:bold;font-size:9pt;font-family:宋体;\">所需经验值</span><span style=\"font-size:10.5000pt;font-family:\'Times New Roman\';\"></span> \r\n				</p>\r\n			</td>\r\n			<td width=\"153\" valign=\"center\" style=\"border:0.7500pt solid #BBBBBB;background:#F3F3F3;\">\r\n				<p style=\"text-align:center;\">\r\n					<span style=\"color:#666666;font-weight:bold;font-size:9pt;font-family:宋体;\">备注</span><span style=\"font-size:10.5000pt;font-family:\'Times New Roman\';\"></span> \r\n				</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"90\" valign=\"center\" style=\"border:0.7500pt solid #BBBBBB;background:#FFFFFF;\">\r\n				<p style=\"text-align:center;\">\r\n					<span style=\"color:#666666;font-size:9pt;font-family:宋体;\">一级</span><span style=\"font-size:10.5000pt;font-family:\'Times New Roman\';\"></span> \r\n				</p>\r\n			</td>\r\n			<td width=\"102\" valign=\"center\" style=\"border:0.7500pt solid #BBBBBB;background:#FFFFFF;\">\r\n				<p style=\"text-align:center;\">\r\n					<span style=\"color:#666666;font-size:9pt;font-family:宋体;\">屌丝</span><span style=\"font-size:10.5000pt;font-family:\'宋体\';\"></span> \r\n				</p>\r\n			</td>\r\n			<td width=\"90\" valign=\"center\" style=\"border:0.7500pt solid #BBBBBB;background:#FFFFFF;\">\r\n				<p style=\"text-align:center;\">\r\n					<span style=\"color:#666666;font-size:9pt;font-family:\'Times New Roman\';\">&nbsp;</span><span style=\"font-size:10.5000pt;font-family:\'Times New Roman\';\"></span> \r\n				</p>\r\n			</td>\r\n			<td width=\"117\" valign=\"center\" style=\"border:0.7500pt solid #BBBBBB;background:#FFFFFF;\">\r\n				<p style=\"text-align:center;\">\r\n					<span style=\"color:#666666;font-size:9pt;font-family:宋体;\">＜</span><span style=\"color:#666666;font-size:9pt;font-family:宋体;\">5000</span><span style=\"font-size:10.5000pt;font-family:\'Times New Roman\';\"></span> \r\n				</p>\r\n			</td>\r\n			<td width=\"153\" valign=\"center\" style=\"border:0.7500pt solid #BBBBBB;background:#FFFFFF;\">\r\n				<p style=\"text-align:center;\">\r\n					<span style=\"color:#666666;font-size:9pt;font-family:宋体;\">&nbsp;</span><span style=\"font-size:10.5000pt;font-family:\'Times New Roman\';\"></span> \r\n				</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"90\" valign=\"center\" style=\"border:0.7500pt solid #BBBBBB;background:#FFFFFF;\">\r\n				<p style=\"text-align:center;\">\r\n					<span style=\"color:#666666;font-size:9pt;font-family:宋体;\">二级</span><span style=\"font-size:10.5000pt;font-family:\'Times New Roman\';\"></span> \r\n				</p>\r\n			</td>\r\n			<td width=\"102\" valign=\"center\" style=\"border:0.7500pt solid #BBBBBB;background:#FFFFFF;\">\r\n				<p style=\"text-align:center;\">\r\n					<span style=\"color:#666666;font-size:9pt;font-family:宋体;\">资深屌丝</span><span style=\"font-size:10.5000pt;font-family:\'宋体\';\"></span> \r\n				</p>\r\n			</td>\r\n			<td width=\"90\" valign=\"center\" style=\"border:0.7500pt solid #BBBBBB;background:#FFFFFF;\">\r\n				<p style=\"text-align:center;\">\r\n					<span style=\"color:#666666;font-size:9pt;font-family:\'Times New Roman\';\">&nbsp;</span><span style=\"font-size:10.5000pt;font-family:\'Times New Roman\';\"></span> \r\n				</p>\r\n			</td>\r\n			<td width=\"117\" valign=\"center\" style=\"border:0.7500pt solid #BBBBBB;background:#FFFFFF;\">\r\n				<p style=\"text-align:center;\">\r\n					<span style=\"color:#666666;font-size:9pt;font-family:宋体;\">5000</span><span style=\"font-size:10.5000pt;font-family:\'宋体\';\"></span> \r\n				</p>\r\n			</td>\r\n			<td width=\"153\" valign=\"center\" style=\"border:0.7500pt solid #BBBBBB;background:#FFFFFF;\">\r\n				<p style=\"text-align:center;\">\r\n					<span style=\"color:#666666;font-size:9pt;font-family:宋体;\">&nbsp;</span><span style=\"font-size:10.5000pt;font-family:\'Times New Roman\';\"></span> \r\n				</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"90\" valign=\"center\" style=\"border:0.7500pt solid #BBBBBB;background:#FFFFFF;\">\r\n				<p style=\"text-align:center;\">\r\n					<span style=\"color:#666666;font-size:9pt;font-family:宋体;\">三级</span><span style=\"font-size:10.5000pt;font-family:\'Times New Roman\';\"></span> \r\n				</p>\r\n			</td>\r\n			<td width=\"102\" valign=\"center\" style=\"border:0.7500pt solid #BBBBBB;background:#FFFFFF;\">\r\n				<p style=\"text-align:center;\">\r\n					<span style=\"color:#666666;font-size:9pt;font-family:宋体;\">达人</span><span style=\"font-size:10.5000pt;font-family:\'宋体\';\"></span> \r\n				</p>\r\n			</td>\r\n			<td width=\"90\" valign=\"center\" style=\"border:0.7500pt solid #BBBBBB;background:#FFFFFF;\">\r\n				<p style=\"text-align:center;\">\r\n					<span style=\"color:#666666;font-size:9pt;font-family:\'Times New Roman\';\">&nbsp;</span><span style=\"font-size:10.5000pt;font-family:\'Times New Roman\';\"></span> \r\n				</p>\r\n			</td>\r\n			<td width=\"117\" valign=\"center\" style=\"border:0.7500pt solid #BBBBBB;background:#FFFFFF;\">\r\n				<p style=\"text-align:center;\">\r\n					<span style=\"color:#666666;font-size:9pt;font-family:宋体;\">10000</span><span style=\"font-size:10.5000pt;font-family:\'宋体\';\"></span> \r\n				</p>\r\n			</td>\r\n			<td width=\"153\" valign=\"center\" style=\"border:0.7500pt solid #BBBBBB;background:#FFFFFF;\">\r\n				<p style=\"text-align:center;\">\r\n					<span style=\"color:#666666;font-size:9pt;font-family:宋体;\">&nbsp;</span><span style=\"font-size:10.5000pt;font-family:\'Times New Roman\';\"></span> \r\n				</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"90\" valign=\"center\" style=\"border:0.7500pt solid #BBBBBB;background:#FFFFFF;\">\r\n				<p style=\"text-align:center;\">\r\n					<span style=\"color:#666666;font-size:9pt;font-family:宋体;\">四级</span><span style=\"font-size:10.5000pt;font-family:\'Times New Roman\';\"></span> \r\n				</p>\r\n			</td>\r\n			<td width=\"102\" valign=\"center\" style=\"border:0.7500pt solid #BBBBBB;background:#FFFFFF;\">\r\n				<p style=\"text-align:center;\">\r\n					<span style=\"color:#666666;font-size:9pt;font-family:宋体;\">土豪</span><span style=\"font-size:10.5000pt;font-family:\'宋体\';\"></span> \r\n				</p>\r\n			</td>\r\n			<td width=\"90\" valign=\"center\" style=\"border:0.7500pt solid #BBBBBB;background:#FFFFFF;\">\r\n				<p style=\"text-align:center;\">\r\n					<span style=\"color:#666666;font-size:9pt;font-family:\'Times New Roman\';\">&nbsp;</span><span style=\"font-size:10.5000pt;font-family:\'Times New Roman\';\"></span> \r\n				</p>\r\n			</td>\r\n			<td width=\"117\" valign=\"center\" style=\"border:0.7500pt solid #BBBBBB;background:#FFFFFF;\">\r\n				<p style=\"text-align:center;\">\r\n					<span style=\"color:#666666;font-size:9pt;font-family:宋体;\">20000</span><span style=\"font-size:10.5000pt;font-family:\'宋体\';\"></span> \r\n				</p>\r\n			</td>\r\n			<td width=\"153\" valign=\"center\" style=\"border:0.7500pt solid #BBBBBB;background:#FFFFFF;\">\r\n				<p style=\"text-align:center;\">\r\n					<span style=\"color:#666666;font-size:9pt;font-family:宋体;\">&nbsp;</span><span style=\"font-size:10.5000pt;font-family:\'Times New Roman\';\"></span> \r\n				</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"90\" valign=\"center\" style=\"border:0.7500pt solid #BBBBBB;background:#FFFFFF;\">\r\n				<p style=\"text-align:center;\">\r\n					<span style=\"color:#666666;font-size:9pt;font-family:宋体;\">五级</span><span style=\"font-size:10.5000pt;font-family:\'Times New Roman\';\"></span> \r\n				</p>\r\n			</td>\r\n			<td width=\"102\" valign=\"center\" style=\"border:0.7500pt solid #BBBBBB;background:#FFFFFF;\">\r\n				<p style=\"text-align:center;\">\r\n					<span style=\"color:#666666;font-size:9pt;font-family:宋体;\">大客户</span><span style=\"font-size:10.5000pt;font-family:\'宋体\';\"></span> \r\n				</p>\r\n			</td>\r\n			<td width=\"90\" valign=\"center\" style=\"border:0.7500pt solid #BBBBBB;background:#FFFFFF;\">\r\n				<p style=\"text-align:center;\">\r\n					<span style=\"color:#666666;font-size:9pt;font-family:\'Times New Roman\';\">&nbsp;</span><span style=\"font-size:10.5000pt;font-family:\'Times New Roman\';\"></span> \r\n				</p>\r\n			</td>\r\n			<td width=\"117\" valign=\"center\" style=\"border:0.7500pt solid #BBBBBB;background:#FFFFFF;\">\r\n				<p style=\"text-align:center;\">\r\n					<span style=\"color:#666666;font-size:9pt;font-family:宋体;\">500000</span><span style=\"font-size:10.5000pt;font-family:\'Times New Roman\';\"></span> \r\n				</p>\r\n			</td>\r\n			<td width=\"153\" valign=\"center\" style=\"border:0.7500pt solid #BBBBBB;background:#FFFFFF;\">\r\n				<p style=\"text-align:center;\">\r\n					<span style=\"color:#666666;font-size:9pt;font-family:宋体;\">&nbsp;</span><span style=\"font-size:10.5000pt;font-family:\'Times New Roman\';\"></span> \r\n				</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"90\" valign=\"center\" style=\"border:0.7500pt solid #BBBBBB;background:#FFFFFF;\">\r\n				<p style=\"text-align:center;\">\r\n					<span style=\"color:#666666;font-size:9pt;font-family:宋体;\">六级</span><span style=\"font-size:10.5000pt;font-family:\'Times New Roman\';\"></span> \r\n				</p>\r\n			</td>\r\n			<td width=\"102\" valign=\"center\" style=\"border:0.7500pt solid #BBBBBB;background:#FFFFFF;\">\r\n				<p style=\"text-align:center;\">\r\n					<span style=\"color:#666666;font-size:9pt;font-family:宋体;\">超级大客户</span><span style=\"font-size:10.5000pt;font-family:\'宋体\';\"></span> \r\n				</p>\r\n			</td>\r\n			<td width=\"90\" valign=\"center\" style=\"border:0.7500pt solid #BBBBBB;background:#FFFFFF;\">\r\n				<p style=\"text-align:center;\">\r\n					<span style=\"color:#666666;font-size:9pt;font-family:\'Times New Roman\';\">&nbsp;</span><span style=\"font-size:10.5000pt;font-family:\'Times New Roman\';\"></span> \r\n				</p>\r\n			</td>\r\n			<td width=\"117\" valign=\"center\" style=\"border:0.7500pt solid #BBBBBB;background:#FFFFFF;\">\r\n				<p style=\"text-align:center;\">\r\n					<span style=\"color:#666666;font-size:9pt;font-family:宋体;\">1000000</span><span style=\"font-size:10.5000pt;font-family:\'Times New Roman\';\"></span> \r\n				</p>\r\n			</td>\r\n			<td width=\"153\" valign=\"center\" style=\"border:0.7500pt solid #BBBBBB;background:#FFFFFF;\">\r\n				<p style=\"text-align:center;\">\r\n					<span style=\"color:#666666;font-size:9pt;font-family:宋体;\">&nbsp;</span><span style=\"font-size:10.5000pt;font-family:\'Times New Roman\';\"></span> \r\n				</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n<p>\r\n	<span style=\"font-size:10.5000pt;font-family:\'Times New Roman\';\">&nbsp;</span> \r\n</p>\r\n<h2 style=\"text-align:justify;vertical-align:;\">\r\n	<span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">2、</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">怎么计算会员经验值？</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\"></span> \r\n</h2>\r\n<p style=\"text-align:justify;vertical-align:;\">\r\n	<span style=\"font-weight:bold;font-size:10.5000pt;font-family:\'微软雅黑\';\">A</span><span style=\"font-weight:bold;font-size:10.5pt;font-family:微软雅黑;\">夺宝、竞拍</span><span style=\"font-weight:bold;font-size:10.5pt;font-family:微软雅黑;\">经验值计算规则</span><span style=\"font-weight:bold;font-size:10.5pt;font-family:微软雅黑;\"></span> \r\n</p>\r\n<p style=\"text-align:justify;vertical-align:;\">\r\n	<span style=\"font-weight:bold;font-size:10.5pt;font-family:微软雅黑;\">1元夺宝区域：</span><span style=\"font-size:10.5pt;font-family:微软雅黑;\">每参加一人次夺宝，即可获得1个经验值</span><span style=\"font-size:10.5pt;font-family:微软雅黑;\"></span> \r\n</p>\r\n<p style=\"text-align:justify;vertical-align:;\">\r\n	<span style=\"font-weight:bold;font-size:10.5pt;font-family:微软雅黑;\">竞拍区域：</span><span style=\"font-weight:bold;font-size:10.5pt;font-family:微软雅黑;\"></span> \r\n</p>\r\n<p style=\"text-align:justify;vertical-align:;\">\r\n	<span style=\"font-weight:bold;font-size:10.5pt;font-family:微软雅黑;\">竞拍模式：&nbsp;</span><span style=\"font-size:10.5pt;font-family:微软雅黑;\">每竞拍一次获得1个经验值，竞拍中标者可以获得以商品最终竞拍价格除以1000取余数（四舍五入）经验值。</span><span style=\"font-size:10.5pt;font-family:微软雅黑;\"></span> \r\n</p>\r\n<p style=\"text-align:justify;vertical-align:;\">\r\n	<span style=\"font-weight:bold;font-size:10.5pt;font-family:微软雅黑;\">竞拍中奖模式：</span><span style=\"font-size:10.5pt;font-family:微软雅黑;\">任意商品首次出价，即可获得1个经验值，竞拍中奖者可以获得以商品首次出价除以1000取余数（四舍五入）经验值。</span><span style=\"font-size:10.5pt;font-family:微软雅黑;\"></span> \r\n</p>\r\n<p style=\"text-align:justify;vertical-align:;\">\r\n	<span style=\"font-weight:bold;font-size:10.5pt;font-family:微软雅黑;\">B注册经验值计算规则：</span><span style=\"font-size:10.5pt;font-family:微软雅黑;\">注册XXX</span><span style=\"font-size:10.5pt;font-family:微软雅黑;\">www.xxx.net成为会员，并完善个人资料，可获得</span><span style=\"font-size:10.5pt;font-family:微软雅黑;\">80个经验值</span><span style=\"font-size:10.5pt;font-family:微软雅黑;\"></span> \r\n</p>\r\n<p style=\"text-align:justify;vertical-align:;\">\r\n	<span style=\"font-weight:bold;font-size:10.5pt;font-family:微软雅黑;\">C</span><span style=\"font-weight:bold;font-size:10.5pt;font-family:微软雅黑;\">登录经验值计算规则：</span><span style=\"font-size:10.5pt;font-family:微软雅黑;\">在</span><span style=\"font-size:10.5pt;font-family:微软雅黑;\">XXXwww.xxx.net</span><span style=\"font-size:10.5pt;font-family:微软雅黑;\">首页登录，可得</span><span style=\"font-size:10.5pt;font-family:微软雅黑;\">5</span><span style=\"font-size:10.5pt;font-family:微软雅黑;\">个经验值，每天最多赠予1次。</span><span style=\"font-size:10.5pt;font-family:微软雅黑;\"></span> \r\n</p>\r\n<p style=\"text-align:justify;vertical-align:;\">\r\n	<span style=\"font-weight:bold;font-size:10.5pt;font-family:微软雅黑;\">D</span><span style=\"font-weight:bold;font-size:10.5pt;font-family:微软雅黑;\">附加经验值计算规则：</span><span style=\"font-size:10.5pt;font-family:微软雅黑;\">每月</span><span style=\"font-size:10.5pt;font-family:微软雅黑;\">竞拍、夺宝</span><span style=\"font-size:10.5pt;font-family:微软雅黑;\">天数大于等于</span><span style=\"font-size:10.5pt;font-family:微软雅黑;\">10</span><span style=\"font-size:10.5pt;font-family:微软雅黑;\">天，可额外获得</span><span style=\"font-size:10.5pt;font-family:微软雅黑;\">20</span><span style=\"font-size:10.5pt;font-family:微软雅黑;\">个经验值。</span><span style=\"font-size:10.5pt;font-family:微软雅黑;\"></span> \r\n</p>\r\n<p style=\"text-align:justify;vertical-align:;\">\r\n	<span style=\"font-weight:bold;font-size:10.5pt;font-family:微软雅黑;\">E</span><span style=\"font-weight:bold;font-size:10.5pt;font-family:微软雅黑;\">晒单</span><span style=\"font-weight:bold;font-size:10.5pt;font-family:微软雅黑;\">经验值计算规则：</span><span style=\"font-size:10.5pt;font-family:微软雅黑;\">主动</span><span style=\"font-size:10.5pt;font-family:微软雅黑;\">晒单一次</span><span style=\"font-size:10.5pt;font-family:微软雅黑;\">，</span><span style=\"font-size:10.5pt;font-family:微软雅黑;\">除了可以免费获得</span><span style=\"font-size:10.5pt;font-family:微软雅黑;\">1—5个多宝币外（具体看一元夺宝规则），还</span><span style=\"font-size:10.5pt;font-family:微软雅黑;\">可获得</span><span style=\"font-size:10.5pt;font-family:微软雅黑;\">10—</span><span style=\"font-size:10.5pt;font-family:微软雅黑;\">5</span><span style=\"font-size:10.5pt;font-family:微软雅黑;\">0</span><span style=\"font-size:10.5pt;font-family:微软雅黑;\">个经验值。</span><span style=\"font-size:10.5pt;font-family:微软雅黑;\"></span> \r\n</p>\r\n<p style=\"text-align:justify;vertical-align:;\">\r\n	<span style=\"font-weight:bold;font-size:10.5pt;font-family:微软雅黑;\">3、获得经验值的好处：</span><span style=\"font-size:10.5pt;font-family:微软雅黑;background-color:#FFFFFF;\">&nbsp;</span><span style=\"font-size:10.5pt;font-family:微软雅黑;\"></span> \r\n</p>\r\n<p style=\"text-align:justify;vertical-align:;background:#FFFFFF;\">\r\n	<span style=\"font-size:10.5pt;font-family:微软雅黑;\">经验值，</span><span style=\"font-size:10.5pt;font-family:微软雅黑;\">大家可以说是又可爱又可“恨”，</span><span style=\"font-size:10.5pt;font-family:微软雅黑;\">可爱的是高人一</span><span style=\"font-size:10.5pt;font-family:微软雅黑;\">筹的经验值可以使您更有机会享受</span><span style=\"font-size:10.5pt;font-family:微软雅黑;\">XXX</span><span style=\"font-size:10.5pt;font-family:微软雅黑;\">推出的各种福利；</span><span style=\"font-size:10.5pt;font-family:微软雅黑;\">可“恨”</span><span style=\"font-size:10.5pt;font-family:微软雅黑;\">的是经验值的获取需要长期努力的坚持，</span><span style=\"font-size:10.5pt;font-family:微软雅黑;\">决不会一蹴而就。</span><span style=\"font-size:10.5pt;font-family:微软雅黑;\">这可爱又可恨的经验值，有什么用处呢？</span><span style=\"font-size:10.5pt;font-family:微软雅黑;\"></span> \r\n</p>\r\n<p style=\"text-align:justify;vertical-align:;background:#FFFFFF;\">\r\n	<span style=\"font-size:10.5pt;font-family:微软雅黑;\">1、XXX针对相应等级会员，会不定期举行等级会员1元夺宝、竞拍活动专场。等级越高，中奖率越大，其参与等级会员专场的1元夺宝、竞拍商品，价值也会越高。</span><span style=\"font-size:10.5pt;font-family:微软雅黑;\"></span> \r\n</p>\r\n<p style=\"text-align:justify;vertical-align:;\">\r\n	<span style=\"font-size:10.5pt;font-family:微软雅黑;\">2、等级越高，享有越多的优先权，比如优先参与XXX推出的促销活动，优先问题咨询，事情处理、优先发货、退货、换货等权利。</span><span style=\"color:#666666;font-weight:bold;font-size:10.5pt;font-family:微软雅黑;\"></span> \r\n</p>\r\n<p>\r\n	<br />\r\n</p>', '1639');
INSERT INTO zz_page VALUES ('44', '1', '2', 'admin', '/content/show//44', '3', '1417082862', '1419924387', '1', '竞拍规则', '', '', '<strong> \r\n<h3 style=\"margin-left:15.0000pt;text-align:justify;vertical-align:;\">\r\n</h3>\r\n<h3 style=\"margin-left:15.0000pt;text-align:justify;vertical-align:;\">\r\n	<span style=\"color:#333333;font-size:16px;font-family:\'Microsoft YaHei\';background-color:#FFFFFF;\">一、竞拍</span><span style=\"color:#333333;font-size:16px;font-family:\'Microsoft YaHei\';background-color:#FFFFFF;\">原则</span><span style=\"font-size:10.5pt;font-family:微软雅黑;\"></span> \r\n</h3>\r\n<p style=\"margin-left:15.0000pt;text-align:justify;vertical-align:;\">\r\n	<span style=\"color:#333333;font-size:16px;font-family:\'Microsoft YaHei\';background-color:#FFFFFF;\">第一条：</span><span style=\"color:#333333;font-size:16px;font-family:\'Microsoft YaHei\';background-color:#FFFFFF;\">竞拍</span><span style=\"color:#333333;font-size:16px;font-family:\'Microsoft YaHei\';background-color:#FFFFFF;\">规则是为保障网络</span><span style=\"color:#333333;font-size:16px;font-family:\'Microsoft YaHei\';background-color:#FFFFFF;\">竞拍</span><span style=\"color:#333333;font-size:16px;font-family:\'Microsoft YaHei\';background-color:#FFFFFF;\">顺利有序进行而设置的，保护买家、卖家的合法权益，每个会员都应遵守</span><span style=\"color:#333333;font-size:16px;font-family:\'Microsoft YaHei\';background-color:#FFFFFF;\">竞拍</span><span style=\"color:#333333;font-size:16px;font-family:\'Microsoft YaHei\';background-color:#FFFFFF;\">规则。</span><span style=\"font-size:10.5000pt;font-family:\'微软雅黑\';\"></span> \r\n</p>\r\n<p style=\"margin-left:15.0000pt;text-align:justify;vertical-align:;\">\r\n	<span style=\"color:#333333;font-size:16px;font-family:\'Microsoft YaHei\';background-color:#FFFFFF;\">第二条：</span><span style=\"color:#333333;font-size:16px;font-family:\'Microsoft YaHei\';background-color:#FFFFFF;\">竞拍</span><span style=\"color:#333333;font-size:16px;font-family:\'Microsoft YaHei\';background-color:#FFFFFF;\">本着公平交易，公正对待的原则，买家与</span><span style=\"color:#333333;font-size:16px;font-family:\'Microsoft YaHei\';background-color:#FFFFFF;\">买家</span><span style=\"color:#333333;font-size:16px;font-family:\'Microsoft YaHei\';background-color:#FFFFFF;\">平等，买家与卖家平等。</span> \r\n</p>\r\n<h3 style=\"margin-left:15.0000pt;text-align:justify;vertical-align:;\">\r\n	<span style=\"color:#333333;font-size:16px;font-family:\'Microsoft YaHei\';background-color:#FFFFFF;\">二、竞拍</span><span style=\"color:#333333;font-size:16px;font-family:\'Microsoft YaHei\';background-color:#FFFFFF;\">规则</span><span style=\"font-size:10.5pt;font-family:微软雅黑;\"></span> \r\n</h3>\r\n<p style=\"margin-left:15.0000pt;text-align:justify;vertical-align:;\">\r\n	<span style=\"color:#333333;font-size:16px;font-family:\'Microsoft YaHei\';background-color:#FFFFFF;\">第一条：</span><span style=\"color:#333333;font-size:16px;font-family:\'Microsoft YaHei\';background-color:#FFFFFF;\">竞拍</span><span style=\"color:#333333;font-size:16px;font-family:\'Microsoft YaHei\';background-color:#FFFFFF;\">分为</span><span style=\"color:#333333;font-size:16px;font-family:\'Microsoft YaHei\';background-color:#FFFFFF;\">正在热拍</span><span style=\"color:#333333;font-size:16px;font-family:\'Microsoft YaHei\';background-color:#FFFFFF;\">、</span><span style=\"color:#333333;font-size:16px;font-family:\'Microsoft YaHei\';background-color:#FFFFFF;\">下期预告</span><span style=\"color:#333333;font-size:16px;font-family:\'Microsoft YaHei\';background-color:#FFFFFF;\">、</span><span style=\"color:#333333;font-size:16px;font-family:\'Microsoft YaHei\';background-color:#FFFFFF;\">历史成交</span><span style=\"color:#333333;font-size:16px;font-family:\'Microsoft YaHei\';background-color:#FFFFFF;\">三类，会员只能在已经开始的</span><span style=\"color:#333333;font-size:16px;font-family:\'Microsoft YaHei\';background-color:#FFFFFF;\">竞拍</span><span style=\"color:#333333;font-size:16px;font-family:\'Microsoft YaHei\';background-color:#FFFFFF;\">中进行竞拍。</span><span style=\"font-size:10.5000pt;font-family:\'微软雅黑\';\"></span> \r\n</p>\r\n<p style=\"margin-left:15.0000pt;text-align:justify;vertical-align:;\">\r\n	<span style=\"color:#333333;font-size:16px;font-family:\'Microsoft YaHei\';background-color:#FFFFFF;\">第二条：</span><span style=\"color:#333333;font-size:16px;font-family:\'Microsoft YaHei\';background-color:#FFFFFF;\">每一个</span><span style=\"color:#333333;font-size:16px;font-family:\'Microsoft YaHei\';background-color:#FFFFFF;\">竞拍</span><span style=\"color:#333333;font-size:16px;font-family:\'Microsoft YaHei\';background-color:#FFFFFF;\">商品都设置</span><span style=\"color:#333333;font-size:16px;font-family:\'Microsoft YaHei\';background-color:#FFFFFF;\">竞拍</span><span style=\"color:#333333;font-size:16px;font-family:\'Microsoft YaHei\';background-color:#FFFFFF;\">时间，</span><span style=\"color:#333333;font-size:16px;font-family:\'Microsoft YaHei\';background-color:#FFFFFF;\">竞拍</span><span style=\"color:#333333;font-size:16px;font-family:\'Microsoft YaHei\';background-color:#FFFFFF;\">开始，可以参与</span><span style=\"color:#333333;font-size:16px;font-family:\'Microsoft YaHei\';background-color:#FFFFFF;\">竞拍</span><span style=\"color:#333333;font-size:16px;font-family:\'Microsoft YaHei\';background-color:#FFFFFF;\">，</span><span style=\"color:#333333;font-size:16px;font-family:\'Microsoft YaHei\';background-color:#FFFFFF;\">竞拍</span><span style=\"color:#333333;font-size:16px;font-family:\'Microsoft YaHei\';background-color:#FFFFFF;\">时间结束，则</span><span style=\"color:#333333;font-size:16px;font-family:\'Microsoft YaHei\';background-color:#FFFFFF;\">竞拍</span><span style=\"color:#333333;font-size:16px;font-family:\'Microsoft YaHei\';background-color:#FFFFFF;\">结束。</span><span style=\"font-size:10.5000pt;font-family:\'微软雅黑\';\"></span> \r\n</p>\r\n<p style=\"margin-left:15.0000pt;text-align:justify;vertical-align:;\">\r\n	<span style=\"color:#333333;font-size:16px;font-family:\'Microsoft YaHei\';background-color:#FFFFFF;\">第三条：</span><span style=\"color:#333333;font-size:16px;font-family:\'Microsoft YaHei\';background-color:#FFFFFF;\">参与竞拍时需要参缴保证金，参与竞拍出价时确保账户中有足够的保证金支付</span><span style=\"color:#333333;font-size:16px;font-family:\'Microsoft YaHei\';background-color:#FFFFFF;\">。</span><span style=\"font-size:10.5000pt;font-family:\'微软雅黑\';\"></span> \r\n</p>\r\n<p style=\"margin-left:15.0000pt;text-align:justify;vertical-align:;\">\r\n	<span style=\"font-size:16px;font-family:\'Microsoft YaHei\';background-color:#FFFFFF;color:#333333;\">第四条：</span><span style=\"font-size:16px;font-family:\'Microsoft YaHei\';background-color:#FFFFFF;color:#333333;\">每个</span><span style=\"font-size:16px;font-family:\'Microsoft YaHei\';background-color:#FFFFFF;color:#333333;\">竞拍</span><span style=\"font-size:16px;font-family:\'Microsoft YaHei\';background-color:#FFFFFF;color:#333333;\">商品支付</span><span style=\"font-size:16px;font-family:\'Microsoft YaHei\';background-color:#FFFFFF;color:#333333;\">都设有拍币限制，</span><span style=\"font-size:16px;font-family:\'Microsoft YaHei\';background-color:#FFFFFF;color:#333333;\">在支付竞拍商品时，</span><span style=\"font-size:16px;font-family:\'Microsoft YaHei\';background-color:#FFFFFF;color:#333333;\">拍币数量不能超过该拍币限制。</span><span style=\"font-size:10.5pt;font-family:微软雅黑;\"></span> \r\n</p>\r\n<p style=\"margin-left:15.0000pt;text-align:justify;vertical-align:;\">\r\n	<span style=\"font-size:16px;font-family:\'Microsoft YaHei\';background-color:#FFFFFF;color:#333333;\">第五条：</span><span style=\"font-size:16px;font-family:\'Microsoft YaHei\';background-color:#FFFFFF;color:#333333;\">会员参与商品竞拍，保证金转为冻结状态，竞拍结束后，竞拍失败者冻结保证金将在1个工作日内解冻，竞拍成功者</span><span style=\"font-size:16px;font-family:\'Microsoft YaHei\';background-color:#FFFFFF;color:#333333;\">，</span><span style=\"color:#333333;font-size:16px;font-family:\'Microsoft YaHei\';background-color:#FFFFFF;\">保证金将不会解冻，直接转为商品支付款</span><span style=\"color:#333333;font-size:16px;font-family:\'Microsoft YaHei\';background-color:#FFFFFF;\">。</span><span style=\"font-size:16px;font-family:\'Microsoft YaHei\';background-color:#FFFFFF;color:#333333;\">由于卖家的原因或者非买家造成的未付款，买家申诉取消交易成功，系统将会返还保证金。</span><span style=\"font-size:10.5pt;font-family:微软雅黑;\"></span> \r\n</p>\r\n<p style=\"margin-left:15.0000pt;text-align:justify;vertical-align:;\">\r\n	<span style=\"color:#333333;font-size:16px;font-family:\'Microsoft YaHei\';background-color:#FFFFFF;\">第六条：</span><span style=\"color:#333333;font-size:16px;font-family:\'Microsoft YaHei\';background-color:#FFFFFF;\">每一款商品设有起步价、加价幅度，起步价和加价幅度由商家自行设置。</span><span style=\"font-size:10.5000pt;font-family:\'微软雅黑\';\"></span> \r\n</p>\r\n<p style=\"margin-left:15.0000pt;text-align:justify;vertical-align:;\">\r\n	<span style=\"font-size:16px;font-family:\'Microsoft YaHei\';background-color:#FFFFFF;color:#333333;\">第七条：</span><span style=\"font-size:16px;font-family:\'Microsoft YaHei\';background-color:#FFFFFF;color:#333333;\">出价是在当前的最高的出价的基础上加价，如一款手机的起步价是10元，加价是10元，第一位出价，则它的购买价格是20元，第二位加价，应</span><span style=\"font-size:16px;font-family:\'Microsoft YaHei\';background-color:#FFFFFF;color:#333333;\">是</span><span style=\"font-size:16px;font-family:\'Microsoft YaHei\';background-color:#FFFFFF;color:#333333;\">20</span><span style=\"font-size:16px;font-family:\'Microsoft YaHei\';background-color:#FFFFFF;color:#333333;\">加</span><span style=\"font-size:16px;font-family:\'Microsoft YaHei\';background-color:#FFFFFF;color:#333333;\">10,</span><span style=\"font-size:16px;font-family:\'Microsoft YaHei\';background-color:#FFFFFF;color:#333333;\">则它的购买价格是</span><span style=\"font-size:16px;font-family:\'Microsoft YaHei\';background-color:#FFFFFF;color:#333333;\">30元，以此类推。</span><span style=\"font-size:10.5pt;font-family:微软雅黑;\"></span> \r\n</p>\r\n<p style=\"margin-left:15.0000pt;text-align:justify;vertical-align:;\">\r\n	<span style=\"color:#333333;font-size:16px;font-family:\'Microsoft YaHei\';background-color:#FFFFFF;\">第八条：</span><span style=\"color:#333333;font-size:16px;font-family:\'Microsoft YaHei\';background-color:#FFFFFF;\">出价时需要填写资金密码，会员应保管好自己的资金密码。</span><span style=\"font-size:10.5000pt;font-family:\'微软雅黑\';\"></span> \r\n</p>\r\n<p style=\"margin-left:15.0000pt;text-align:justify;vertical-align:;\">\r\n	<span style=\"font-size:16px;font-family:\'Microsoft YaHei\';background-color:#FFFFFF;color:#333333;\">第九条：</span><span style=\"font-size:16px;font-family:\'Microsoft YaHei\';background-color:#FFFFFF;color:#333333;\">商品在竞拍模式下，</span><span style=\"font-size:16px;font-family:\'Microsoft YaHei\';background-color:#FFFFFF;color:#333333;\">只要竞拍没有结束，</span><span style=\"font-size:16px;font-family:\'Microsoft YaHei\';background-color:#FFFFFF;color:#333333;\">在竞拍过程中，</span><span style=\"font-size:16px;font-family:\'Microsoft YaHei\';background-color:#FFFFFF;color:#333333;\">可以选择多次出价。</span><span style=\"font-size:16px;font-family:\'Microsoft YaHei\';background-color:#FFFFFF;color:#333333;\">如果</span><span style=\"font-size:16px;font-family:\'Microsoft YaHei\';background-color:#FFFFFF;color:#333333;\">商品是在竞拍中奖模式下，只能出一次价，不能多次出价。</span><span style=\"font-size:10.5pt;font-family:微软雅黑;background-color:#FFFFFF;\"></span> \r\n</p>\r\n<p style=\"margin-left:15.0000pt;text-align:justify;vertical-align:;\">\r\n	<span style=\"font-size:16px;font-family:\'Microsoft YaHei\';color:#333333;\">第十条：</span><span style=\"font-size:16px;font-family:\'Microsoft YaHei\';color:#333333;\">首次出价10%中奖是指在竞拍中奖模式下，</span><span style=\"font-size:16px;font-family:\'Microsoft YaHei\';color:#333333;\">对任意一个商品首次出价，</span><span style=\"font-size:16px;font-family:\'Microsoft YaHei\';color:#333333;\">系统将随机发送一组六位数字的随机码到您绑定的手机上，随机码的个位若与上证指数收盘个位数字相同，您可以按你首次出价的价格获得商品。</span><span style=\"font-size:10.5pt;font-family:微软雅黑;\"></span> \r\n</p>\r\n<p style=\"margin-left:15.0000pt;text-align:justify;vertical-align:;\">\r\n	<span style=\"color:#333333;font-size:16px;font-family:\'Microsoft YaHei\';background-color:#FFFFFF;\">第十一条：中奖者交易规则</span><span style=\"color:#444444;font-size:10.5pt;font-family:微软雅黑;background-color:#FFFFFF;\"></span> \r\n</p>\r\n<p style=\"margin-left:15.0000pt;text-align:justify;vertical-align:;\">\r\n	<span style=\"color:#333333;font-size:16px;font-family:\'Microsoft YaHei\';background-color:#FFFFFF;\">1、</span><span style=\"color:#333333;font-size:16px;font-family:\'Microsoft YaHei\';background-color:#FFFFFF;\">中奖者可以选择购买商品，也可以选择放弃购买，放弃购买不会扣保证金。</span><span style=\"color:#444444;font-size:10.5pt;font-family:微软雅黑;background-color:#FFFFFF;\"></span> \r\n</p>\r\n<p style=\"margin-left:15.0000pt;text-align:justify;vertical-align:;\">\r\n	<span style=\"color:#333333;font-size:16px;font-family:\'Microsoft YaHei\';background-color:#FFFFFF;\">2、</span><span style=\"color:#333333;font-size:16px;font-family:\'Microsoft YaHei\';background-color:#FFFFFF;\">中奖者需要在一周内购买，以中奖日期为准，在第七天的16:00为领取有最后期限，逾期取消购买资格。例：2013.1.1中奖，则需要在2013.1.8&nbsp;16:00之前购买。</span>\r\n</p>\r\n<p style=\"margin-left:15.0000pt;text-align:justify;vertical-align:;\">\r\n	<span style=\"color:#333333;font-size:16px;font-family:\'Microsoft YaHei\';background-color:#FFFFFF;\">3、</span><span style=\"color:#333333;font-size:16px;font-family:\'Microsoft YaHei\';background-color:#FFFFFF;\">中奖者购买商品时，需要登录账号，进入活动领取，点击购买即可。</span><span style=\"color:#444444;font-size:10.5pt;font-family:微软雅黑;background-color:#FFFFFF;\"></span> \r\n</p>\r\n<p style=\"margin-left:15.0000pt;text-align:justify;vertical-align:;\">\r\n	<span style=\"color:#333333;font-size:16px;font-family:\'Microsoft YaHei\';background-color:#FFFFFF;\">4、</span><span style=\"color:#333333;font-size:16px;font-family:\'Microsoft YaHei\';background-color:#FFFFFF;\">在竞拍未结束时，保证金未解冻，中奖者购买商品，需要另外支付商品款。</span> \r\n</p>\r\n</strong>', '2836');
INSERT INTO zz_page VALUES ('42', '1', '2', 'admin', '/content/show//42', '5', '1417153825', '1464261424', '1', '服务协议', '', '', '<span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; XXX</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">(www.</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">xxx.net</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">)，作为为用户提供全新、有趣购物模式的互联网公司，</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">XXX</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">通过在线网站为</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">用户</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">提供各项相关服务。当使用</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">XXX</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">的各项具体服务时，</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">您</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">和</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">XXX</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">都将受到本服务协议所产生的制约，</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">XXX</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">会不断推出新的服务，因此所有服务都将受此服务条款的制约。请</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">您</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">在注册前务必认真阅读此服务协议的内容并确认，如有任何疑问，应向</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">XXX</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">咨询。一旦</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">您</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">确认本服务协议后，本服务协议即在用户和</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">XXX</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">之间产生法律效力。</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">您</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">在注册过程中点击“同意以下条款提交注册信息”按钮即表示您完全接受本协议中的全部条款。随后按照页面给予的提示完成全部的注册步骤。</span><span style=\"color:#333333;font-size:10.5000pt;font-family:\'微软雅黑\';\"></span> <span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <br />\r\n<p style=\"text-indent:21.0000pt;text-align:justify;vertical-align:;\">\r\n	<span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">XXX</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">将可能不定期的修改本服务协议的有关条款，并保留在必要时对此协议中的所有条款进行随时修改的权利。一旦协议内容有所修改，</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">XXX</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">将会在网站重要页面或社区的醒目位置第一时间给予通知。如果</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">您</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">继续使用</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">XXX</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">的服务，则视为</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">您</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">受协议的改动内容。如果不同意本站对协议内容所做的修改，</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">XXX</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">会及时取消</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">您</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">的服务使用权限。本站保留随时修改或中断服务而不需告知用户的权利。本站行使修改或中断服务的权利，不需对用户或第三方负责。</span><span style=\"color:#333333;font-size:10.5000pt;font-family:\'微软雅黑\';\"></span> \r\n</p>\r\n<h4 style=\"text-indent:21.0000pt;text-align:justify;vertical-align:;\">\r\n	<span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">一、用户注册</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\"></span> \r\n</h4>\r\n<p style=\"text-indent:21.0000pt;text-align:justify;vertical-align:;\">\r\n	<span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">1、用户注册是指用户登录</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">XXX</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">，按要求填写相关信息并确认同意本服务协议的过程。</span><span style=\"color:#333333;font-size:10.5000pt;font-family:\'微软雅黑\';\"></span> \r\n</p>\r\n<p style=\"text-indent:21.0000pt;text-align:justify;vertical-align:;\">\r\n	<span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">2、</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">XXX</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">用户必须是具有完全民事行为能力的自然人，或者是具有合法经营资格的实体组织。无民事行为能力人、限制民事行为能力人以及无经营或特定经营资格的组织不得注册为</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">XXX</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">用户或超过其民事权利或行为能力范围与</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">XXX</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">进行交易，如与</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">XXX</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">进行交易的，则服务协议自始无效，</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">XXX</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">有权立即停止与该用户的交易、注销该用户账户，并有权要求其承担相应法律责任。</span><span style=\"color:#333333;font-size:10.5000pt;font-family:\'微软雅黑\';\"></span> \r\n</p>\r\n<h4 style=\"text-indent:21.0000pt;text-align:justify;vertical-align:;\">\r\n	<span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">二、用户的帐号，密码和安全性</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\"></span> \r\n</h4>\r\n<p style=\"text-indent:21.0000pt;text-align:justify;vertical-align:;\">\r\n	<span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">用户一旦注册成功，成为本站的合法用户。用户将对用户名和密码安全负全部责任。此外，每个用户都要对以其用户名进行的所有活动和事件负全责。用户若发现任何非法使用用户帐号或存在安全漏洞的情况，请立即通告本站。</span><span style=\"color:#333333;font-size:10.5000pt;font-family:\'微软雅黑\';\"></span> \r\n</p>\r\n<h4 style=\"text-indent:21.0000pt;text-align:justify;vertical-align:;\">\r\n	<span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">三、</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">XXX</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">原则</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\"></span> \r\n</h4>\r\n<p style=\"text-indent:21.0000pt;text-align:justify;vertical-align:;\">\r\n	<span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">平等原则：用户和</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">XXX</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">在交易过程中具有同等的法律地位。</span><span style=\"color:#333333;font-size:10.5000pt;font-family:\'微软雅黑\';\"></span> \r\n</p>\r\n<p style=\"text-indent:21.0000pt;text-align:justify;vertical-align:;\">\r\n	<span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">自由原则：用户享有自愿向</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">XXX</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">参与</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">商品竞拍、一元夺宝</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">的权利，任何人不得非法干预。</span><span style=\"color:#333333;font-size:10.5000pt;font-family:\'微软雅黑\';\"></span> \r\n</p>\r\n<p style=\"text-indent:21.0000pt;text-align:justify;vertical-align:;\">\r\n	<span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">公平原则：用户和</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">XXX</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">行使权利、履行义务应当遵循公平原则。</span><span style=\"color:#333333;font-size:10.5000pt;font-family:\'微软雅黑\';\"></span> \r\n</p>\r\n<p style=\"text-indent:21.0000pt;text-align:justify;vertical-align:;\">\r\n	<span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">诚实信用原则：用户和</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">XXX</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">行使权利、履行义务应当遵循诚实信用原则。</span><span style=\"color:#333333;font-size:10.5000pt;font-family:\'微软雅黑\';\"></span> \r\n</p>\r\n<p style=\"text-indent:21.0000pt;text-align:justify;vertical-align:;\">\r\n	<span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">履行义务原则：用户向</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">XXX</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">参与</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">商品竞拍、一元夺宝</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">时，用户和</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">XXX</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">皆有有义务根据本服务协议的约定完成该等交易（法律或本协议禁止的交易除外）</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\"></span> \r\n</p>\r\n<p style=\"text-indent:21.0000pt;text-align:justify;vertical-align:;\">\r\n	<span style=\"color:#333333;font-weight:bold;font-size:10.5pt;font-family:微软雅黑;\">四、用户的权利和义务</span><span style=\"color:#333333;font-weight:bold;font-size:10.5000pt;font-family:\'微软雅黑\';\"></span> \r\n</p>\r\n<p style=\"text-indent:21.0000pt;text-align:justify;vertical-align:;\">\r\n	<span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">1、用户有权拥有其在</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">XXX</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">的用户名及密码，并用该用户名和密码登录</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">XXX</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">参与商品</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">竞拍和一元夺宝</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">。用户不得以任何形式转让或授权他人使用自己的</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">XXX</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">用户名</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">和密码</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">。</span><span style=\"color:#333333;font-size:10.5000pt;font-family:\'微软雅黑\';\"></span> \r\n</p>\r\n<p style=\"text-indent:21.0000pt;text-align:justify;vertical-align:;\">\r\n	<span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">2、用户有权根据本协议的规定以及</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">XXX</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">网站上发布的相关规则在</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">XXX</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">上查询商品信息、发表使用体验、参与商品讨论、邀请关注好友、上传商品图片、参加</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">XXX</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">的有关活动，以及享受</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">XXX</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">提供的其它信息服务</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">。</span><span style=\"color:#333333;font-size:10.5000pt;font-family:\'微软雅黑\';\"></span> \r\n</p>\r\n<p style=\"text-indent:21.0000pt;text-align:justify;vertical-align:;\">\r\n	<span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">3、用户有义务在注册时提供自己的真实资料，并保证诸如电子邮件地址、联系电话、联系地址、邮政编码等内容的有效性及真实性，保证</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">XXX</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">可以通过上述联系方式与用户本人进行联系。同时，用户也有义务在相关资料发生变更时及时更新有关注册资料。用户保证不以他人资料在</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">XXX</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">进行注册和参与商品分享购买。</span><span style=\"color:#333333;font-size:10.5000pt;font-family:\'微软雅黑\';\"></span> \r\n</p>\r\n<p style=\"text-indent:21.0000pt;text-align:justify;vertical-align:;\">\r\n	<span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">4、用户应当保证在</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">XXX</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">参与商品</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">竞拍、一元夺宝</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">时</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">，</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">遵守诚实信用原则，不扰乱网上交易的正常秩序。</span><span style=\"color:#333333;font-size:10.5000pt;font-family:\'微软雅黑\';\"></span> \r\n</p>\r\n<p style=\"text-indent:21.0000pt;text-align:justify;vertical-align:;\">\r\n	<span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">5、用户在成为</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">XXX</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">的会员后，可按</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">XXX</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">的</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">拍币</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">规则</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">、夺宝币规则，</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">获得</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">相应的拍币和夺宝币</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">。累积</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">的拍币、夺宝币</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">可用于</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">拍币</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">商城</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">、一元夺宝区进行相应的</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">商品兑换。</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">拍币</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">规则</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">、夺宝币规则</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">连同与该规则相关的条款和条件，构成用户与</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">XXX</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">之间的完整协议。接受本协议，即表明接受</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">拍币</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">规则</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">、夺宝币规则</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">中的条款和条件。</span><span style=\"color:#333333;font-size:10.5000pt;font-family:\'微软雅黑\';\"></span> \r\n</p>\r\n<p style=\"text-indent:21.0000pt;text-align:justify;vertical-align:;\">\r\n	<span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">6、用户享有言论自由权利</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">，但</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">用户不得在</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">XXX</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">发表包含以下内容的言论：</span><span style=\"color:#333333;font-size:10.5000pt;font-family:\'微软雅黑\';\"></span> \r\n</p>\r\n<p style=\"text-indent:21.0000pt;text-align:justify;vertical-align:;\">\r\n	<span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">1)&nbsp;反对宪法所确定的基本原则，煽动、抗拒、破坏宪法和法律、行政法规实施的；</span><span style=\"color:#333333;font-size:10.5000pt;font-family:\'微软雅黑\';\"></span> \r\n</p>\r\n<p style=\"text-indent:21.0000pt;text-align:justify;vertical-align:;\">\r\n	<span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">2)&nbsp;煽动颠覆国家政权，推翻社会主义制度，煽动、分裂国家，破坏国家统一的；</span><span style=\"color:#333333;font-size:10.5000pt;font-family:\'微软雅黑\';\"></span> \r\n</p>\r\n<p style=\"text-indent:21.0000pt;text-align:justify;vertical-align:;\">\r\n	<span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">3)&nbsp;损害国家荣誉和利益的；</span><span style=\"color:#333333;font-size:10.5000pt;font-family:\'微软雅黑\';\"></span> \r\n</p>\r\n<p style=\"text-indent:21.0000pt;text-align:justify;vertical-align:;\">\r\n	<span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">4)&nbsp;煽动民族仇恨、民族歧视，破坏民族团结的；</span><span style=\"color:#333333;font-size:10.5000pt;font-family:\'微软雅黑\';\"></span> \r\n</p>\r\n<p style=\"text-indent:21.0000pt;text-align:justify;vertical-align:;\">\r\n	<span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">5)&nbsp;任何包含对种族、性别、宗教、地域内容等歧视的；</span><span style=\"color:#333333;font-size:10.5000pt;font-family:\'微软雅黑\';\"></span> \r\n</p>\r\n<p style=\"text-indent:21.0000pt;text-align:justify;vertical-align:;\">\r\n	<span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">6)&nbsp;捏造或者歪曲事实，散布谣言，扰乱社会秩序的；</span><span style=\"color:#333333;font-size:10.5000pt;font-family:\'微软雅黑\';\"></span> \r\n</p>\r\n<p style=\"text-indent:21.0000pt;text-align:justify;vertical-align:;\">\r\n	<span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">7)&nbsp;宣扬封建迷信、邪教、淫秽、色情、赌博、暴力、凶杀、恐怖、教唆犯罪的；</span><span style=\"color:#333333;font-size:10.5000pt;font-family:\'微软雅黑\';\"></span> \r\n</p>\r\n<p style=\"text-indent:21.0000pt;text-align:justify;vertical-align:;\">\r\n	<span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">8)&nbsp;公然侮辱他人或者捏造事实诽谤他人的，或者进行其他恶意攻击的；</span><span style=\"color:#333333;font-size:10.5000pt;font-family:\'微软雅黑\';\"></span> \r\n</p>\r\n<p style=\"text-indent:21.0000pt;text-align:justify;vertical-align:;\">\r\n	<span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">9)&nbsp;损害国家机关信誉的；</span><span style=\"color:#333333;font-size:10.5000pt;font-family:\'微软雅黑\';\"></span> \r\n</p>\r\n<p style=\"text-indent:21.0000pt;text-align:justify;vertical-align:;\">\r\n	<span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">10)&nbsp;其他违反宪法和法律行政法规的。</span><span style=\"color:#333333;font-size:10.5000pt;font-family:\'微软雅黑\';\"></span> \r\n</p>\r\n<p style=\"text-indent:21.0000pt;text-align:justify;vertical-align:;\">\r\n	<span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">7、用户在发表使用体验、讨论图片等，除遵守本条款外，还应遵守该讨论区的相关规定。</span><span style=\"color:#333333;font-size:10.5000pt;font-family:\'微软雅黑\';\"></span> \r\n</p>\r\n<p style=\"text-indent:21.0000pt;text-align:justify;vertical-align:;\">\r\n	<span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">8、未经</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">XXX</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">同意，禁止用户在网站发布任何形式的广告。</span><span style=\"color:#333333;font-size:10.5000pt;font-family:\'微软雅黑\';\"></span> \r\n</p>\r\n<h4 style=\"text-indent:21.0000pt;text-align:justify;vertical-align:;\">\r\n	<span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">五、</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">XXX</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">的权利和义务</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\"></span> \r\n</h4>\r\n<p style=\"text-indent:21.0000pt;text-align:justify;vertical-align:;\">\r\n	<span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">1、</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">XXX</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">有义务在现有技术上维护整个网上交易平台的正常运行，并努力提升和改进技术，使用户网上交易活动得以顺利进行；</span><span style=\"color:#333333;font-size:10.5000pt;font-family:\'微软雅黑\';\"></span> \r\n</p>\r\n<p style=\"text-indent:21.0000pt;text-align:justify;vertical-align:;\">\r\n	<span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">2、对用户在注册和使用</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">XXX</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">网上交易平台中所遇到的与交易或注册有关的问题及反映的情况，</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">XXX</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">应及时作出回复；</span><span style=\"color:#333333;font-size:10.5000pt;font-family:\'微软雅黑\';\"></span> \r\n</p>\r\n<p style=\"text-indent:21.0000pt;text-align:justify;vertical-align:;\">\r\n	<span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">3、对于用户在</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">XXX</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">网站上作出下列行为的，</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">XXX</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">有权作出删除相关信息、终止提供服务等处理，而无须征得用户的同意：</span><span style=\"color:#333333;font-size:10.5000pt;font-family:\'微软雅黑\';\"></span> \r\n</p>\r\n<p style=\"text-indent:21.0000pt;text-align:justify;vertical-align:;\">\r\n	<span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">1)&nbsp;</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">XXX</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">有权对用户的注册信息及购买行为进行查阅，发现注册信息或购买行为中存在任何问题的，有权向用户发出询问及要求改正的通知或者作出删除等处理；</span><span style=\"color:#333333;font-size:10.5000pt;font-family:\'微软雅黑\';\"></span> \r\n</p>\r\n<p style=\"text-indent:21.0000pt;text-align:justify;vertical-align:;\">\r\n	<span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">2)&nbsp;用户违反本协议规定或有违反法律法规和地方规章的行为的，</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">XXX</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">有权停止传输并删除其信息，禁止用户发言，注销用户账户并按照相关法律规定向相关主管部门进行披露。</span><span style=\"color:#333333;font-size:10.5000pt;font-family:\'微软雅黑\';\"></span> \r\n</p>\r\n<p style=\"text-indent:21.0000pt;text-align:justify;vertical-align:;\">\r\n	<span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">3)&nbsp;对于用户在</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">XXX</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">进行的下列行为，</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">XXX</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">有权对用户采取删除其信息、禁止用户发言、注销用户账户等限制性措施：包括发布或以电子邮件或以其他方式传送存在恶意、虚假和侵犯他人人身财产权利内容的信息，进行与分享购物无关或不是以分享购物为目的的活动，恶意注册、签到、评论等方式试图扰乱正常购物秩序，将有关干扰、破坏或限制任何计算机软件、硬件或通讯设备功能的软件病毒或其他计算机代码、档案和程序之资料，加以上载、发布、发送电子邮件或以其他方式传送，干扰或破坏</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">XXX</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">网站和服务或与</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">XXX</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">网站和服务相连的服务器和网络，或发布其他违反公共利益或可能严重损害</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">XXX</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">和其它用户合法利益的信息。</span><span style=\"color:#333333;font-size:10.5000pt;font-family:\'微软雅黑\';\"></span> \r\n</p>\r\n<p style=\"text-indent:21.0000pt;text-align:justify;vertical-align:;\">\r\n	<span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">4、用户在此免费授予</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">XXX</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">永久性的独家使用权(并有权对该权利进行再授权)，使</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">XXX</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">有权在全球范围内(全部或部分地)使用、复制、修订、改写、发布、翻译和展示用户公示于</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">XXX</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">网站的各类信息，或制作其派生作品，和或以现在已知或日后开发的任何形式、媒体或技术，将上述信息纳入其它作品内。</span><span style=\"color:#333333;font-size:10.5000pt;font-family:\'微软雅黑\';\"></span> \r\n</p>\r\n<p style=\"text-indent:21.0000pt;text-align:justify;vertical-align:;\">\r\n	<span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">5、对于</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">XXX</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">网络平台已上架商品，</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">XXX</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">有权根据市场变动修改商品价格，而无需提前通知客户。</span><span style=\"color:#333333;font-size:10.5000pt;font-family:\'微软雅黑\';\"></span> \r\n</p>\r\n<p style=\"text-indent:21.0000pt;text-align:justify;vertical-align:;\">\r\n	<span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">6、</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">XXX</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">分享购物模式，秉着双方自愿原则，分享购物存在风险，</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">XXX</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">不对</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">商品竞拍、一元夺宝区所</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">抽取的“幸运编号”结果承担责任，望所有用户谨慎参与。</span><span style=\"color:#333333;font-size:10.5000pt;font-family:\'微软雅黑\';\"></span> \r\n</p>\r\n<p style=\"text-indent:21.0000pt;text-align:justify;vertical-align:;\">\r\n	<span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">7、</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">XXX一元夺宝区，9</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">0</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">天【经过用户申请后】未达到“总需参与人次”的商品，用户可通过客服申请退款，所退款项将在3个工作日内，退还至</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">用户XXX</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">账户中。</span><span style=\"color:#333333;font-size:10.5000pt;font-family:\'微软雅黑\';\"></span> \r\n</p>\r\n<h4 style=\"text-indent:21.0000pt;text-align:justify;vertical-align:;\">\r\n	<span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">六、配送及费用</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\"></span> \r\n</h4>\r\n<p style=\"text-indent:21.0000pt;text-align:justify;vertical-align:;\">\r\n	<span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">XXX</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">将会把产品送到您所指定的送货地址。全国免费配送（港澳台地区除外）。</span><span style=\"color:#333333;font-size:10.5000pt;font-family:\'微软雅黑\';\"></span> \r\n</p>\r\n<p style=\"text-indent:21.0000pt;text-align:justify;vertical-align:;\">\r\n	<span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">请清楚准确地填写您的真实姓名、送货地址及联系方式。因如下情况造成配送延迟或无法配送等，本站将不承担责任：</span><span style=\"color:#333333;font-size:10.5000pt;font-family:\'微软雅黑\';\"></span> \r\n</p>\r\n<p style=\"text-indent:21.0000pt;text-align:justify;vertical-align:;\">\r\n	<span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">1、客户提供错误信息和不详细的地址；</span><span style=\"color:#333333;font-size:10.5000pt;font-family:\'微软雅黑\';\"></span> \r\n</p>\r\n<p style=\"text-indent:21.0000pt;text-align:justify;vertical-align:;\">\r\n	<span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">2、货物送达无人签收，由此造成的重复配送所产生的费用及相关的后果。</span><span style=\"color:#333333;font-size:10.5000pt;font-family:\'微软雅黑\';\"></span> \r\n</p>\r\n<p style=\"text-indent:21.0000pt;text-align:justify;vertical-align:;\">\r\n	<span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">3、不可抗力，例如：自然灾害、交通戒严、突发战争等。</span><span style=\"color:#333333;font-size:10.5000pt;font-family:\'微软雅黑\';\"></span> \r\n</p>\r\n<h4 style=\"text-indent:21.0000pt;text-align:justify;vertical-align:;\">\r\n	<span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">七、商品缺货规则</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\"></span> \r\n</h4>\r\n<p style=\"text-indent:21.0000pt;text-align:justify;vertical-align:;\">\r\n	<span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">由于市场变化及各种以合理商业努力难以控制的因素的影响，</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">XXX</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">网无法承诺用户所获得的商品都会有货；用户获得的商品或服务如果发生缺货，协议双方均无权取消该交易，</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">XXX</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">网将通过有效方式通知用户进行换货，用户可选择换购本商城同等价位的商品（一件或多件），或选择补差价换购高价位商品。</span><span style=\"color:#333333;font-size:10.5000pt;font-family:\'微软雅黑\';\"></span> \r\n</p>\r\n<p style=\"text-indent:21.0000pt;text-align:justify;vertical-align:;\">\r\n	<span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">XXX</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">网可对即将上市的商品或服务进行预售登记，</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">XXX</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">网会在商品或者服务正式上市之后尽最大努力在最快时间内给商品获得者安排发货，预售登记并不做交易处理，不构成要约。</span><span style=\"color:#333333;font-size:10.5000pt;font-family:\'微软雅黑\';\"></span> \r\n</p>\r\n<h4 style=\"text-indent:21.0000pt;text-align:justify;vertical-align:;\">\r\n	<span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">八、责任限制</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\"></span> \r\n</h4>\r\n<p style=\"text-indent:21.0000pt;text-align:justify;vertical-align:;\">\r\n	<span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">1、用户理解并同意，在使用</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">XXX</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">网服务的过程中，可能会遇到不可抗力等风险因素使</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">XXX</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">网服务发生中断。不可抗力是指不能预见、不能克服并不能避免且对一方或双方造成重大影响的客观事件，包括但不限于自然灾害如洪水、地震、瘟疫流行和风暴等以及社会事件如战争、动乱、政府行为等。出现上述情况时，</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">XXX</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">网将努力在第一时间与相关单位配合，及时进行修复，但是由此给用户造成的损失，</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">XXX</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">网将在法律允许的范围内免责。</span><span style=\"color:#333333;font-size:10.5000pt;font-family:\'微软雅黑\';\"></span> \r\n</p>\r\n<p style=\"text-indent:21.0000pt;text-align:justify;vertical-align:;\">\r\n	<span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">2、用户理解并同意，</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">XXX</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">网不能随时预见和防范法律、技术以及其他不可控的风险，对以下情形之一导致的服务中断或受阻，</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">XXX</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">网不承担责任：</span><span style=\"color:#333333;font-size:10.5000pt;font-family:\'微软雅黑\';\"></span> \r\n</p>\r\n<p style=\"text-indent:21.0000pt;text-align:justify;vertical-align:;\">\r\n	<span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">（1）大规模病毒、木马或其他恶意程序、黑客攻击的破坏；</span><span style=\"color:#333333;font-size:10.5000pt;font-family:\'微软雅黑\';\"></span> \r\n</p>\r\n<p style=\"text-indent:21.0000pt;text-align:justify;vertical-align:;\">\r\n	<span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">（2）用户或</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">XXX</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">网的电脑软件、系统、硬件和通信线路出现故障；</span><span style=\"color:#333333;font-size:10.5000pt;font-family:\'微软雅黑\';\"></span> \r\n</p>\r\n<p style=\"text-indent:21.0000pt;text-align:justify;vertical-align:;\">\r\n	<span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">（3）用户操作不当；</span><span style=\"color:#333333;font-size:10.5000pt;font-family:\'微软雅黑\';\"></span> \r\n</p>\r\n<p style=\"text-indent:21.0000pt;text-align:justify;vertical-align:;\">\r\n	<span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">（4）用户通过非</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">XXX</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">网授权的方式使用服务；</span><span style=\"color:#333333;font-size:10.5000pt;font-family:\'微软雅黑\';\"></span> \r\n</p>\r\n<p style=\"text-indent:21.0000pt;text-align:justify;vertical-align:;\">\r\n	<span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">（5）政府管制等原因可能导致的服务中断、数据丢失以及其他的损失和风险。</span><span style=\"color:#333333;font-size:10.5000pt;font-family:\'微软雅黑\';\"></span> \r\n</p>\r\n<p style=\"text-indent:21.0000pt;text-align:justify;vertical-align:;\">\r\n	<span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">（6）其他</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">XXX</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">网无法控制或合理预见的情形。</span><span style=\"color:#333333;font-size:10.5000pt;font-family:\'微软雅黑\';\"></span> \r\n</p>\r\n<p style=\"text-indent:21.0000pt;text-align:justify;vertical-align:;\">\r\n	<span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">3、在法律法规所允许的限度内，因使用</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">XXX</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">服务而引起的任何损害或经济损失，</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">XXX</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">承担的全部责任均不超过用户所购买的与该索赔有关的商品价格。这些责任限制条款将在法律所允许的最大限度内适用，并在用户资格被撤销或终止后仍继续有效。</span><span style=\"color:#333333;font-size:10.5000pt;font-family:\'微软雅黑\';\"></span> \r\n</p>\r\n<h4 style=\"text-indent:21.0000pt;text-align:justify;vertical-align:;\">\r\n	<span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">九、网络服务内容的所有权</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\"></span> \r\n</h4>\r\n<p style=\"text-indent:21.0000pt;text-align:justify;vertical-align:;\">\r\n	<span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">本站定义的网络服务内容包括：文字、软件、声音、图片、录象、图表、广告中的全部内容；电子邮件的全部内容；本站为用户提供的其他信息。所有这些内容受版权、商标、标签和其它财产所有权法律的保护。所以，用户只能在本站和广告商授权下才能使用这些内容，而不能擅自复制、再造这些内容、或创造与内容有关的派生产品。本站所有的文章版权归原文作者和本站共同所有，任何人需要转载本站的文章，必须征得原文作者或本站授权。</span><span style=\"color:#333333;font-size:10.5000pt;font-family:\'微软雅黑\';\"></span> \r\n</p>\r\n<h4 style=\"text-indent:21.0000pt;text-align:justify;vertical-align:;\">\r\n	<span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">十、用户隐私制度</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\"></span> \r\n</h4>\r\n<p style=\"text-indent:21.0000pt;text-align:justify;vertical-align:;\">\r\n	<span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">我们不会向任何第三方提供，出售，出租，分享和交易用户的个人信息。当在以下情况下，用户的个人信息将部分或全部被善意披露：</span><span style=\"color:#333333;font-size:10.5000pt;font-family:\'微软雅黑\';\"></span> \r\n</p>\r\n<p style=\"text-indent:21.0000pt;text-align:justify;vertical-align:;\">\r\n	<span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">1、经用户同意，向第三方披露；</span><span style=\"color:#333333;font-size:10.5000pt;font-family:\'微软雅黑\';\"></span> \r\n</p>\r\n<p style=\"text-indent:21.0000pt;text-align:justify;vertical-align:;\">\r\n	<span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">2、如用户是合资格的知识产权投诉人并已提起投诉，应被投诉人要求，向被投诉人披露，以便双方处理可能的权利纠纷；</span><span style=\"color:#333333;font-size:10.5000pt;font-family:\'微软雅黑\';\"></span> \r\n</p>\r\n<p style=\"text-indent:21.0000pt;text-align:justify;vertical-align:;\">\r\n	<span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">3、根据法律的有关规定，或者行政或司法机构的要求，向第三方或者行政、司法机构披露；</span><span style=\"color:#333333;font-size:10.5000pt;font-family:\'微软雅黑\';\"></span> \r\n</p>\r\n<p style=\"text-indent:21.0000pt;text-align:justify;vertical-align:;\">\r\n	<span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">4、如果用户出现违反中国有关法律或者网站政策的情况，需要向第三方披露；</span><span style=\"color:#333333;font-size:10.5000pt;font-family:\'微软雅黑\';\"></span> \r\n</p>\r\n<p style=\"text-indent:21.0000pt;text-align:justify;vertical-align:;\">\r\n	<span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">5、为提供你所要求的产品和服务，而必须和第三方分享用户的个人信息；</span><span style=\"color:#333333;font-size:10.5000pt;font-family:\'微软雅黑\';\"></span> \r\n</p>\r\n<p style=\"text-indent:21.0000pt;text-align:justify;vertical-align:;\">\r\n	<span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">6、其它本站根据法律或者网站政策认为合适的披露。</span><span style=\"color:#333333;font-size:10.5000pt;font-family:\'微软雅黑\';\"></span> \r\n</p>\r\n<h4 style=\"text-indent:21.0000pt;text-align:justify;vertical-align:;\">\r\n	<span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">十一、法律管辖和适用</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\"></span> \r\n</h4>\r\n<p style=\"text-indent:21.0000pt;text-align:justify;vertical-align:;\">\r\n	<span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">1、本协议的订立、执行和解释及争议的解决均应适用中国法律。</span><span style=\"color:#333333;font-size:10.5000pt;font-family:\'微软雅黑\';\"></span> \r\n</p>\r\n<p style=\"text-indent:21.0000pt;text-align:justify;vertical-align:;\">\r\n	<span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">2、如发生本站服务条款与中国法律相抵触时，则这些条款将完全按法律规定重新解释，而其它合法条款则依旧保持对用户产生法律效力和影响。</span><span style=\"color:#333333;font-size:10.5000pt;font-family:\'微软雅黑\';\"></span> \r\n</p>\r\n<p style=\"text-indent:21.0000pt;text-align:justify;vertical-align:;\">\r\n	<span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">3、本协议的规定是可分割的，如本协议任何规定被裁定为无效或不可执行，该规定可被删除而其余条款应予以执行。</span><span style=\"color:#333333;font-size:10.5000pt;font-family:\'微软雅黑\';\"></span> \r\n</p>\r\n<p style=\"text-indent:21.0000pt;text-align:justify;vertical-align:;\">\r\n	<span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">4、如双方就本协议内容或其执行发生任何争议，双方应尽力友好协商解决；协商不成时，任何一方均可向本站所在地的人民法院提起诉讼。</span><span style=\"color:#333333;font-size:10.5000pt;font-family:\'微软雅黑\';\"></span> \r\n</p>\r\n<p style=\"text-align:justify;vertical-align:;\">\r\n	<span style=\"color:#333333;font-size:10.5000pt;font-family:\'微软雅黑\';\">&nbsp;</span> \r\n</p>\r\n</span> \r\n<p style=\"text-align:justify;vertical-align:;\">\r\n	<span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\"></span><span style=\"color:#333333;font-size:10.5000pt;font-family:\'微软雅黑\';\"></span><span style=\"color:#333333;font-size:10.5000pt;font-family:\'微软雅黑\';\"></span> \r\n</p>', '2658');
INSERT INTO zz_page VALUES ('49', '1', '2', 'admin', '/content/show//49', '0', '1417154355', '1464260978', '1', '一元夺宝常见问题', '', '', '<h4>\r\n	<span style=\"color:#666666;font-size:14pt;font-family:微软雅黑;\"> \r\n	<p style=\"text-align:justify;vertical-align:;\">\r\n		<span style=\"color:#333333;font-weight:bold;font-size:10.5pt;font-family:微软雅黑;background-color:#FFFFFF;\">1、</span><span style=\"color:#333333;font-weight:bold;font-size:10.5pt;font-family:微软雅黑;background-color:#FFFFFF;\">怎样参加1元夺宝？</span><span style=\"color:#333333;font-weight:bold;font-size:10.5pt;font-family:微软雅黑;background-color:#FFFFFF;\"></span> \r\n	</p>\r\n	<p style=\"text-indent:21.0000pt;text-align:justify;vertical-align:;\">\r\n		<span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;background-color:#FFFFFF;\">登陆XXX（</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;background-color:#FFFFFF;\">www.xxx.net</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;background-color:#FFFFFF;\">）注册成为会员</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;background-color:#FFFFFF;\">，就可以参加1元夺宝了。</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;background-color:#FFFFFF;\"></span> \r\n	</p>\r\n	<p style=\"text-align:justify;vertical-align:;\">\r\n		<span style=\"color:#333333;font-weight:bold;font-size:10.5pt;font-family:微软雅黑;background-color:#FFFFFF;\">参加方式：</span><span style=\"color:#333333;font-weight:bold;font-size:10.5pt;font-family:微软雅黑;background-color:#FFFFFF;\"></span> \r\n	</p>\r\n	<p style=\"text-indent:21.0000pt;text-align:justify;vertical-align:;\">\r\n		<span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;background-color:#FFFFFF;\">1、</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;background-color:#FFFFFF;\">购买</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;background-color:#FFFFFF;\">XXX</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;background-color:#FFFFFF;\">网盘空间充值夺宝币，然后选择喜欢的</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;background-color:#FFFFFF;\">商品</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;background-color:#FFFFFF;\">开始夺宝；</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;background-color:#FFFFFF;\"></span> \r\n	</p>\r\n	<p style=\"text-indent:21.0000pt;text-align:justify;vertical-align:;\">\r\n		<span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;background-color:#FFFFFF;\">2、点击一个感兴趣的</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;background-color:#FFFFFF;\">商品</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;background-color:#FFFFFF;\">，选择要参与的人次并支付，直接购买</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;background-color:#FFFFFF;\">XXX</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;background-color:#FFFFFF;\">网盘空间并参与夺宝。</span><span style=\"color:#333333;font-weight:bold;font-size:10.5pt;font-family:微软雅黑;background-color:#FFFFFF;\">1元夺宝，</span><span style=\"color:#333333;font-weight:bold;font-size:10.5pt;font-family:微软雅黑;background-color:#FFFFFF;\">玩转指尖，</span><span style=\"color:#333333;font-weight:bold;font-size:10.5pt;font-family:微软雅黑;background-color:#FFFFFF;\">就是这么简单！</span><span style=\"color:#333333;font-size:10.5000pt;font-family:\'微软雅黑\';\"></span> \r\n	</p>\r\n	<p style=\"text-align:justify;vertical-align:;background:#FFFFFF;\">\r\n		<span style=\"color:#333333;font-weight:bold;font-size:10.5pt;font-family:微软雅黑;\">2、1元夺宝是怎么计算幸运号码的？</span><span style=\"color:#333333;font-weight:bold;font-size:10.5pt;font-family:微软雅黑;\"></span> \r\n	</p>\r\n	<p style=\"text-indent:21.0000pt;text-align:justify;vertical-align:;background:#FFFFFF;\">\r\n		<span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">1）奖品的最后一个号码分配完毕后，将公示该分配时间点前本站全部奖品的最后50个参与时间；</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\"></span> \r\n	</p>\r\n	<p style=\"text-indent:21.0000pt;text-align:justify;vertical-align:;background:#FFFFFF;\">\r\n		<span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">2）将这50个时间的数值进行求和（得出数值A）（每个时间按时、分、秒、毫秒的顺序组合，如20:15:25.362则为201525362）；</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\"></span> \r\n	</p>\r\n	<p style=\"text-indent:21.0000pt;text-align:justify;vertical-align:;background:#FFFFFF;\">\r\n		<span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">3）为保证公平公正公开，系统还会等待一小段时间，取最近下一期中国福利彩票“老时时彩”的开奖结果（一个五位数值B）；</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\"></span> \r\n	</p>\r\n	<p style=\"text-indent:21.0000pt;text-align:justify;vertical-align:;background:#FFFFFF;\">\r\n		<span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">4）（数值A+数值B）除以该奖品总需人次得到的余数&nbsp;+&nbsp;原始数&nbsp;10000001，得到最终幸运号码，拥有该幸运号码者，直接获得该奖品。</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\"></span> \r\n	</p>\r\n	<p style=\"text-indent:21.0000pt;text-align:justify;vertical-align:;background:#FFFFFF;\">\r\n		<span style=\"color:#333333;font-weight:bold;font-size:10.5pt;font-family:微软雅黑;\">注：</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">最后一个号码认购时间距离“老时时彩”最近下一期开奖大于24小时，默认“老时时彩”开奖结果为00000；如遇福彩中心通讯故障，无法获取“老时时彩”开奖结果，最后一个号码分配时间距离故障时间大于24小时，亦默认“老时时彩”开奖结果为00000。</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\"></span> \r\n	</p>\r\n	<h4 style=\"text-indent:21.0000pt;text-align:justify;vertical-align:;\">\r\n		<a href=\"#from=1ydb\"><span style=\"color:#333333;font-weight:normal;font-size:10.5pt;font-family:微软雅黑;background-color:#FFFFFF;\">了解更多“老时时彩”信息</span></a><span style=\"color:#333333;font-weight:normal;text-decoration:underline;font-size:10.5pt;font-family:微软雅黑;background-color:#FFFFFF;\"></span> \r\n	</h4>\r\n	<h4 style=\"text-align:justify;vertical-align:;\">\r\n		<span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;background-color:#FFFFFF;\">3、</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;background-color:#FFFFFF;\">为什么要加入“老时时彩”开奖结果？</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;background-color:#FFFFFF;\"></span> \r\n	</h4>\r\n	<p style=\"text-indent:21.0000pt;text-align:justify;vertical-align:;\">\r\n		<span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;background-color:#FFFFFF;\">引入“老时时彩”开奖结果是为了保证幸运号码计算结果的绝对公平公正。</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;background-color:#FFFFFF;\"></span> \r\n	</p>\r\n	<p style=\"text-align:justify;vertical-align:;\">\r\n		<span style=\"color:#333333;font-weight:bold;font-size:10.5pt;font-family:微软雅黑;background-color:#FFFFFF;\">4、</span><span style=\"color:#333333;font-weight:bold;font-size:10.5pt;font-family:微软雅黑;background-color:#FFFFFF;\">幸运号码的计算结果可信吗？</span><span style=\"color:#333333;font-weight:bold;font-size:10.5pt;font-family:微软雅黑;background-color:#FFFFFF;\"></span> \r\n	</p>\r\n	<p style=\"text-indent:21.0000pt;text-align:justify;vertical-align:;\">\r\n		<span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;background-color:#FFFFFF;\">由</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;background-color:#FFFFFF;\">于使用了“老时时彩”开奖结果作为参数，因此幸运号码肯定是未知的；</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;background-color:#FFFFFF;\">您可以绝对相信计算结果真实、可信。</span><span style=\"color:#333333;font-size:10.5000pt;font-family:\'微软雅黑\';\"></span> \r\n	</p>\r\n	<h4 style=\"text-align:justify;vertical-align:;\">\r\n		<span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">5</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">、怎样查看我参与的商品有没有中奖？</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\"></span> \r\n	</h4>\r\n	<p style=\"text-indent:21.0000pt;text-align:justify;vertical-align:;\">\r\n		<span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">每件商品开奖结果公布之后，登录</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">XXX</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">，进入</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">您的个人中心</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">，</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;background-color:#FFFFFF;\">点击对应的</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;background-color:#FFFFFF;\">夺宝</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;background-color:#FFFFFF;\">记录，即可知道该期夺宝的获得者；如果您获奖，将会有邮件、短信等方式的通知。</span><span style=\"color:#333333;font-weight:bold;font-size:10.5pt;font-family:微软雅黑;\"></span> \r\n	</p>\r\n	<h4 style=\"text-align:justify;vertical-align:;\">\r\n		<span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">6</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">、我获得了商品，我还需要支付其他费用吗？</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\"></span> \r\n	</h4>\r\n	<p style=\"text-indent:21.0000pt;text-align:justify;vertical-align:;\">\r\n		<span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">不需要支付其他任何费用。</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\"></span> \r\n	</p>\r\n	<h4 style=\"text-align:justify;vertical-align:;\">\r\n		<span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">7</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">、当我获得商品以后我该做什么？</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\"></span> \r\n	</h4>\r\n	<p style=\"text-indent:21.0000pt;text-align:justify;vertical-align:;\">\r\n		<span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">在您获得商品后您会收到站内信、短信和电子邮件的通知。</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;background-color:#FFFFFF;\">收到通知后，请到个人中心填写真实的收货地址，完善或确认您的个人信息，以便我们为您派发获得的奖品。</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">我们会在您获得商品后3个工作日内通过电话方式与您取得联系。</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\"></span> \r\n	</p>\r\n	<h4 style=\"text-align:justify;vertical-align:;\">\r\n		<span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">8</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">、</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">XXX</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">的商品是正品吗？怎么保证？</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\"></span> \r\n	</h4>\r\n	<p style=\"text-indent:21.0000pt;text-align:justify;vertical-align:;\">\r\n		<span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">XXX</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">承诺，所有商品100%正品，可享受厂家所提供的全国联保服务，享受商品的保修、换货和退货的义务（国家三包政策）。</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\"></span> \r\n	</p>\r\n	<p style=\"text-align:justify;vertical-align:;\">\r\n		<span style=\"color:#333333;font-weight:bold;font-size:10.5pt;font-family:微软雅黑;background-color:#FFFFFF;\">9、</span><span style=\"color:#333333;font-weight:bold;font-size:10.5pt;font-family:微软雅黑;background-color:#FFFFFF;\">获得的奖品有发票吗？&nbsp;</span><span style=\"color:#333333;font-weight:bold;font-size:10.5pt;font-family:微软雅黑;background-color:#FFFFFF;\"></span> \r\n	</p>\r\n	<p style=\"text-indent:21.0000pt;text-align:justify;vertical-align:;\">\r\n		<span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;background-color:#FFFFFF;\">一元夺宝是用户购买</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;background-color:#FFFFFF;\">XXX</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;background-color:#FFFFFF;\">网盘空间的商业促销活动，因此用户获得的</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;background-color:#FFFFFF;\">商品</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;background-color:#FFFFFF;\">，一元夺宝不提供相关发票。</span><span style=\"color:#333333;font-weight:bold;font-size:10.5pt;font-family:微软雅黑;\"></span> \r\n	</p>\r\n	<h4 style=\"text-align:justify;vertical-align:;\">\r\n		<span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">10</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">、我收到的商品可以换货或者退货吗？</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\"></span> \r\n	</h4>\r\n	<p style=\"text-indent:21.0000pt;text-align:justify;vertical-align:;\">\r\n		<span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">非质量问题，不在三包范围内，不给予退换货。</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;background-color:#FFFFFF;\">请尽量亲自签收并当面拆箱验货，如果发现运输途中造成了奖品的损坏，请不要签收，可以拒签退回。</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;background-color:#FFFFFF;\"></span> \r\n	</p>\r\n	<p style=\"text-align:justify;vertical-align:;background:#FFFFFF;\">\r\n		<span style=\"color:#333333;font-weight:bold;font-size:10.5pt;font-family:微软雅黑;\">11、</span><span style=\"color:#333333;font-weight:bold;font-size:10.5pt;font-family:微软雅黑;\">如果一件</span><span style=\"color:#333333;font-weight:bold;font-size:10.5pt;font-family:微软雅黑;\">商品</span><span style=\"color:#333333;font-weight:bold;font-size:10.5pt;font-family:微软雅黑;\">很久都没达到总需人次怎么办？</span><span style=\"color:#333333;font-weight:bold;font-size:10.5pt;font-family:微软雅黑;\"></span> \r\n	</p>\r\n	<p style=\"text-indent:21.0000pt;text-align:justify;vertical-align:;background:#FFFFFF;\">\r\n		<span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">若某件</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">商</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">品的夺宝号码从开始分配之日起90天【经过用户申请后】未分配完毕，则</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">XXX网站</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">有权取消该件</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">商品</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">的夺宝活动，并向用户退还夺宝币，所退还夺宝币将在3个工作日内退还至用户账户中。</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\"></span> \r\n	</p>\r\n	<p style=\"text-align:justify;vertical-align:;\">\r\n		<span style=\"color:#333333;font-weight:bold;font-size:10.5pt;font-family:微软雅黑;background-color:#FFFFFF;\">12、</span><span style=\"color:#333333;font-weight:bold;font-size:10.5pt;font-family:微软雅黑;background-color:#FFFFFF;\">参与1元夺宝需要注意什么？</span><span style=\"color:#333333;font-weight:bold;font-size:10.5pt;font-family:微软雅黑;background-color:#FFFFFF;\"></span> \r\n	</p>\r\n	<p style=\"text-indent:21.0000pt;text-align:justify;vertical-align:;\">\r\n		<span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;background-color:#FFFFFF;\">为了确保在您获奖后第一时间收到通知，请务必正确填写真实有效的联系电话和收货地址。</span><span style=\"color:#333333;font-weight:bold;font-size:10.5pt;font-family:微软雅黑;\"></span> \r\n	</p>\r\n	<h4 style=\"text-align:justify;vertical-align:;\">\r\n		<span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">13</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">、网上银行充值未及时到帐怎么办？</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\"></span> \r\n	</h4>\r\n	<p style=\"text-indent:21.0000pt;text-align:justify;vertical-align:;\">\r\n		<span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">网上支付未及时到帐可能有以下几个原因造成：</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\"></span> \r\n	</p>\r\n	<p style=\"text-indent:21.0000pt;text-align:justify;vertical-align:;\">\r\n		<span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">第一，由于网速或者支付接口等问题，支付数据没有及时传送到支付系统造成的；</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\"></span> \r\n	</p>\r\n	<p style=\"text-indent:21.0000pt;text-align:justify;vertical-align:;\">\r\n		<span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">第二，网速过慢，数据传输超时，使银行后台支付信息不能成功对接，导致银行交易成功而支付后台显示失败；</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\"></span> \r\n	</p>\r\n	<p style=\"text-indent:21.0000pt;text-align:justify;vertical-align:;background:#FFFFFF;\">\r\n		<span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">第三，如果使用某些防火墙软件，有时会屏蔽银行接口的弹出窗口。</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\"></span> \r\n	</p>\r\n	<p style=\"text-indent:21.0000pt;text-align:justify;vertical-align:;background:#FFFFFF;\">\r\n		<span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">如果支付过程</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">中</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">遇到问题，请与我们联系。</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\"></span> \r\n	</p>\r\n	<p style=\"text-align:justify;vertical-align:;\">\r\n		<span style=\"color:#333333;font-weight:bold;font-size:10.5pt;font-family:微软雅黑;background-color:#FFFFFF;\">14、</span><span style=\"color:#333333;font-weight:bold;font-size:10.5pt;font-family:微软雅黑;background-color:#FFFFFF;\">什么是夺宝币？</span><span style=\"color:#333333;font-weight:bold;font-size:10.5pt;font-family:微软雅黑;background-color:#FFFFFF;\"></span> \r\n	</p>\r\n	<p style=\"text-indent:21.0000pt;text-align:justify;vertical-align:;\">\r\n		<span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;background-color:#FFFFFF;\">夺宝币是1元夺宝的代币，用户每花费1元购买</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;background-color:#FFFFFF;\">XXX</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;background-color:#FFFFFF;\">网盘空间，即可获赠1个夺宝币；1个夺宝币可以直接购买1个夺宝号码。</span><span style=\"color:#333333;font-size:10.5000pt;font-family:\'微软雅黑\';\"></span> \r\n	</p>\r\n	<p style=\"text-align:justify;vertical-align:;\">\r\n		<span style=\"color:#333333;font-weight:bold;font-size:10.5pt;font-family:微软雅黑;background-color:#FFFFFF;\">15、</span><span style=\"color:#333333;font-weight:bold;font-size:10.5pt;font-family:微软雅黑;background-color:#FFFFFF;\">什么是赠币？</span><span style=\"color:#333333;font-weight:bold;font-size:10.5pt;font-family:微软雅黑;background-color:#FFFFFF;\"></span> \r\n	</p>\r\n	<p style=\"text-indent:21.0000pt;text-align:justify;vertical-align:;\">\r\n		<span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;background-color:#FFFFFF;\">用户通过完成我们发布的一些任务，可以获得系统赠送的货币，简称赠币；赠币可以用来参与赠币专区</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;background-color:#FFFFFF;\">商品</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;background-color:#FFFFFF;\">的夺宝。</span><span style=\"color:#333333;font-size:10.5000pt;font-family:\'微软雅黑\';\"></span> \r\n	</p>\r\n	<p style=\"text-align:justify;vertical-align:;\">\r\n		<span style=\"color:#333333;font-weight:bold;font-size:10.5pt;font-family:微软雅黑;background-color:#FFFFFF;\">16、</span><span style=\"color:#333333;font-weight:bold;font-size:10.5pt;font-family:微软雅黑;background-color:#FFFFFF;\">如何进行夺宝币充值？</span><span style=\"color:#333333;font-weight:bold;font-size:10.5pt;font-family:微软雅黑;background-color:#FFFFFF;\"></span> \r\n	</p>\r\n	<p style=\"text-indent:21.0000pt;text-align:justify;vertical-align:;\">\r\n		<span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;background-color:#FFFFFF;\">个人中心可以找到入口进行充值；需要注意的是，充值之后获得的是夺宝币，可以直接用于参与夺宝。</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;background-color:#FFFFFF;\"></span> \r\n	</p>\r\n	<p style=\"text-align:justify;vertical-align:;\">\r\n		<span style=\"color:#333333;font-weight:bold;font-size:10.5pt;font-family:微软雅黑;background-color:#FFFFFF;\">17、</span><span style=\"color:#333333;font-weight:bold;font-size:10.5pt;font-family:微软雅黑;background-color:#FFFFFF;\">夺宝币是否可以提现？</span><span style=\"color:#333333;font-weight:bold;font-size:10.5pt;font-family:微软雅黑;background-color:#FFFFFF;\"></span> \r\n	</p>\r\n	<p style=\"text-indent:21.0000pt;text-align:justify;vertical-align:;\">\r\n		<span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;background-color:#FFFFFF;\">很抱歉，夺宝币无法提现</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\"></span> \r\n	</p>\r\n	<h4 style=\"text-align:justify;vertical-align:;\">\r\n		<span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">18、</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">如何晒单分享？</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\"></span> \r\n	</h4>\r\n	<p style=\"text-indent:21.0000pt;text-align:justify;vertical-align:;\">\r\n		<span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">在您收到商品后，登录</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">XXX</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">网，进入\"</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">个人</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">中心\"，在“晒单分享”区发布晒单信息，通过审核后，您还可获得400-1500</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">会员拍币经验值</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">。在您成功晒单后，您的晒单会出现在网站“晒单分享”区，与大家分享喜悦。</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\"></span> \r\n	</p>\r\n	<p style=\"text-align:justify;vertical-align:;\">\r\n		<span style=\"color:#333333;font-weight:bold;font-size:10.5pt;font-family:微软雅黑;background-color:#FFFFFF;\">19、</span><span style=\"color:#333333;font-weight:bold;font-size:10.5pt;font-family:微软雅黑;background-color:#FFFFFF;\">建议反馈</span><span style=\"color:#333333;font-weight:bold;font-size:10.5pt;font-family:微软雅黑;background-color:#FFFFFF;\"></span> \r\n	</p>\r\n	<p style=\"text-indent:21.0000pt;text-align:justify;vertical-align:;\">\r\n		<span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;background-color:#FFFFFF;\">如果您有任何意见或建议，请</span><a href=\"http://help.mail.163.com/feedback.do?m=add&amp;categoryName=%e4%b8%80%e5%85%83%e5%a4%ba%e5%ae%9d\"><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;background-color:#FFFFFF;\">点击这里</span></a><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;background-color:#FFFFFF;\">与我们联系，谢谢！</span><span style=\"color:#333333;font-size:10.5000pt;font-family:\'微软雅黑\';\"></span> \r\n	</p>\r\n<br />\r\n</span> \r\n</h4>\r\n<p style=\"text-indent:21.0000pt;text-align:justify;vertical-align:;\">\r\n	<span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;background-color:#FFFFFF;\"></span><a href=\"http://help.mail.163.com/feedback.do?m=add&amp;categoryName=%e4%b8%80%e5%85%83%e5%a4%ba%e5%ae%9d\"><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;background-color:#FFFFFF;\"></span></a><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;background-color:#FFFFFF;\"></span><span style=\"color:#333333;font-size:10.5000pt;font-family:\'微软雅黑\';\"></span> \r\n</p>', '1504');
INSERT INTO zz_page VALUES ('52', '1', '2', 'admin', '/content/show//52', '0', '1417154445', '1464260988', '1', '配送及配送费用', '', '', '<p style=\"text-align:justify;vertical-align:;background:#FFFFFF;\">\r\n	<span style=\"color:#666666;font-weight:bold;font-size:10.5pt;font-family:微软雅黑;\"> </span> \r\n</p>\r\n<p class=\"p15\" style=\"text-align:justify;vertical-align:;\">\r\n	<span style=\"font-size:10.5pt;font-family:微软雅黑;\">1、在您获得商品后，</span><span style=\"font-size:10.5pt;font-family:微软雅黑;\">XXX</span><span style=\"font-size:10.5pt;font-family:微软雅黑;\">将在第一时间内免费为你寄出</span><span style=\"font-size:10.5pt;font-family:微软雅黑;background-color:#FFFFFF;\">（港澳台地区除外）</span><span style=\"font-size:10.5pt;font-family:微软雅黑;\">，一般采用签约快递，均为服务好，覆盖网点非常广泛的全国性快递公司或者邮政的EMS，以最大限度保证商品安全。如快递公司无法达到的地方，则使用邮政EMS为您寄送商品。</span><span style=\"font-size:10.5pt;font-family:微软雅黑;\"></span> \r\n</p>\r\n<p class=\"p15\" style=\"text-align:justify;vertical-align:;\">\r\n	<span style=\"font-size:10.5pt;font-family:微软雅黑;\">2、若遇商品暂时缺货或者是有其他方面的问题，</span><span style=\"font-size:10.5pt;font-family:微软雅黑;\">XXX</span><span style=\"font-size:10.5pt;font-family:微软雅黑;\">客服将会及时与您沟通处理。</span><span style=\"font-size:10.5pt;font-family:微软雅黑;\"></span> \r\n</p>\r\n<p class=\"p15\" style=\"text-align:justify;vertical-align:;\">\r\n	<span style=\"font-size:10.5pt;font-family:微软雅黑;\"> </span> \r\n</p>\r\n<p class=\"p15\" style=\"text-align:justify;background-color:#FFFFFF;\">\r\n	<span style=\"font-size:10.5pt;font-family:微软雅黑;\">3、确保收货地址、邮编、电话、Email、地址等各项信息的准确性；</span><span style=\"font-size:10.5pt;font-family:微软雅黑;\"></span> \r\n</p>\r\n<p class=\"p15\" style=\"text-align:justify;background-color:#FFFFFF;\">\r\n	<span style=\"font-size:10.5pt;font-family:微软雅黑;\">4、配送过程中联系方式畅顺无阻，如果联络您的时间超过7天未得到回复，默认您已经放弃此</span><span style=\"font-size:10.5pt;font-family:微软雅黑;\">商品</span><span style=\"font-size:10.5pt;font-family:微软雅黑;\">。</span> \r\n</p>\r\n<br />\r\n<p class=\"p15\" style=\"text-align:justify;vertical-align:;background:#FFFFFF;\">\r\n	<span style=\"color:#666666;font-size:10.5pt;font-family:微软雅黑;\">&nbsp;</span> \r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p style=\"text-align:justify;vertical-align:;\">\r\n	<span style=\"color:#808080;font-size:10.5pt;font-family:Verdana;background-color:#FFFFFF;\"></span><span style=\"color:#808080;font-size:10.5pt;font-family:宋体;background-color:#FFFFFF;\"></span><span style=\"color:#808080;font-size:10.5pt;font-family:Verdana;background-color:#FFFFFF;\"></span><span style=\"font-size:10.5000pt;font-family:\'微软雅黑\';\"></span> \r\n</p>', '1594');
INSERT INTO zz_page VALUES ('72', '1', '2', 'admin', '/content/show//72', '0', '1417599606', '1464260705', '1', '商品验收与签收', '', '', '<p class=\"p17\" style=\"margin-left:17.2500pt;text-indent:-17.2500pt;background:#FFFFFF;\">\r\n	<span style=\"color:#808080;font-weight:bold;font-size:10.5pt;font-family:微软雅黑;\"> </span>\r\n</p>\r\n<p class=\"p15\" style=\"text-align:justify;vertical-align:;background:#FFFFFF;\">\r\n	<span style=\"color:#808080;font-size:10.5pt;font-family:微软雅黑;\">1、签收时请慎重，尽量本人签收，签收时务必仔细检查</span><span style=\"color:#808080;font-size:10.5pt;font-family:微软雅黑;\">商品</span><span style=\"color:#808080;font-size:10.5pt;font-family:微软雅黑;\">，如：外包装是否被开封，</span><span style=\"color:#808080;font-size:10.5pt;font-family:微软雅黑;\">商品</span><span style=\"color:#808080;font-size:10.5pt;font-family:微软雅黑;\">是否破损，配件是否缺失，功能是否正常。在确保无误后再签收，以免产生不必要的纠纷。若有任何疑问，请及时拨打客服电话反馈信息，若因用户未仔细检查</span><span style=\"color:#808080;font-size:10.5pt;font-family:微软雅黑;\">商品</span><span style=\"color:#808080;font-size:10.5pt;font-family:微软雅黑;\">即签收后产生的纠纷，</span><span style=\"color:#808080;font-size:10.5pt;font-family:微软雅黑;\">爱拍网</span><span style=\"color:#808080;font-size:10.5pt;font-family:微软雅黑;\">概不负责，仅承担协调处理的义务；</span><span style=\"color:#808080;font-size:10.5pt;font-family:微软雅黑;\"></span> \r\n</p>\r\n<p class=\"p15\" style=\"text-align:justify;vertical-align:;background:#FFFFFF;\">\r\n	<span style=\"color:#808080;font-size:10.5pt;font-family:微软雅黑;\">2、用户所获</span><span style=\"color:#808080;font-size:10.5pt;font-family:微软雅黑;\">商品</span><span style=\"color:#808080;font-size:10.5pt;font-family:微软雅黑;\">，相关商品质量及保修问题请直接联系生产厂家；</span><span style=\"color:#808080;font-size:10.5pt;font-family:微软雅黑;\"></span> \r\n</p>\r\n<p class=\"p15\" style=\"text-align:justify;vertical-align:;background:#FFFFFF;\">\r\n	<span style=\"color:#808080;font-size:10.5pt;font-family:微软雅黑;\">3、若因您的地址填写错误、联系方式填写有误等情况造成奖品无法完成投递或被退回，所产生的额外费用及后果由用户负责；</span><span style=\"color:#808080;font-size:10.5pt;font-family:微软雅黑;\"></span> \r\n</p>\r\n<p class=\"p15\" style=\"text-align:justify;vertical-align:;background:#FFFFFF;\">\r\n	<span style=\"color:#808080;font-size:10.5pt;font-family:微软雅黑;\">4、如因不可抗拒的自然原因，如地震、洪水等，所造成的奖品配送延迟，</span><span style=\"color:#808080;font-size:10.5pt;font-family:微软雅黑;\">XXX</span><span style=\"color:#808080;font-size:10.5pt;font-family:微软雅黑;\">不承担责任；</span><span style=\"color:#808080;font-size:10.5pt;font-family:微软雅黑;\"></span> \r\n</p>\r\n<p class=\"p15\" style=\"text-align:justify;vertical-align:;background:#FFFFFF;\">\r\n	<span style=\"color:#808080;font-size:10.5pt;font-family:微软雅黑;\">温馨提醒：若</span><span style=\"color:#808080;font-size:10.5pt;font-family:微软雅黑;\">商品</span><span style=\"color:#808080;font-size:10.5pt;font-family:微软雅黑;\">已签收，则说明奖品配送正确无误且不存在影响使用因<span style=\"color:#808080;font-family:微软雅黑;font-size:14px;font-weight:bold;line-height:26px;background-color:#FFFFFF;\">素</span></span> \r\n</p>\r\n<p class=\"p15\" style=\"text-align:justify;vertical-align:;background:#FFFFFF;\">\r\n	<span style=\"color:#808080;font-size:10.5pt;font-family:微软雅黑;\">XXX</span><span style=\"color:#808080;font-size:10.5pt;font-family:微软雅黑;\">有<span style=\"color:#808080;font-family:微软雅黑;font-size:14px;font-weight:bold;line-height:26px;background-color:#FFFFFF;\">权不受理换货申请。</span></span><span style=\"color:#808080;font-size:10.5pt;font-family:微软雅黑;\"></span> \r\n</p>\r\n<p class=\"p15\" style=\"text-align:justify;vertical-align:;background:#FFFFFF;\">\r\n	<br />\r\n</p>\r\n<p class=\"p17\" style=\"text-align:justify;vertical-align:;background:#FFFFFF;\">\r\n	<span style=\"color:#808080;font-size:10.5pt;font-family:微软雅黑;\"></span><span style=\"color:#808080;font-size:10.5pt;font-family:微软雅黑;\"></span> \r\n</p>', '1492');
INSERT INTO zz_page VALUES ('53', '1', '2', 'admin', '/content/show//53', '0', '1417154488', '1464261008', '1', '隐私条款', '', '', '<h3 style=\"background:#FFFFFF;\">\r\n	<p class=\"p0\" style=\"text-align:justify;vertical-align:;\">\r\n		<span style=\"color:#666666;font-size:10.5pt;font-family:\'Microsoft YaHei\';\">XXX</span><span style=\"color:#666666;font-size:10.5pt;font-family:\'Microsoft YaHei\';\">很高兴您能提供更好的建议与意见</span><span style=\"color:#666666;font-size:10.5pt;font-family:\'Microsoft YaHei\';\">,</span><span style=\"color:#666666;font-size:10.5pt;font-family:\'Microsoft YaHei\';\">使我们不断完善与进步，我们收到您的意见与建议后</span><span style=\"color:#666666;font-size:10.5pt;font-family:\'Microsoft YaHei\';\">，</span><span style=\"color:#666666;font-size:10.5pt;font-family:\'Microsoft YaHei\';\">会尽快回复您，并根据建议与意见的可执行程度为您赠送礼品。你可以</span><span style=\"color:#666666;font-size:10.5pt;font-family:\'Microsoft YaHei\';\">点击这里提交您的投诉建议。</span><span style=\"color:#666666;font-size:10.5pt;font-family:宋体;\"></span> \r\n	</p>\r\n<br />\r\n</h3>', '1443');
INSERT INTO zz_page VALUES ('78', '1', '1', 'lnest_admin', '/content/show//78', '0', '1418655189', '1464261178', '1', '币值说明', '', '', '<p style=\"text-align:justify;\" class=\"p16\">\r\n	<span style=\"font-family:微软雅黑;font-size:10.5pt;\"><strong>一、</strong></span><span style=\"font-family:微软雅黑;font-size:10.5pt;\"><strong>什么是拍币</strong>【</span><a href=\"http://www.225.net/content/tiyan\"><span style=\"font-family:微软雅黑;color:#0000ff;font-size:10.5pt;\" class=\"15\">做任务，领拍币</span></a><span style=\"font-family:微软雅黑;font-size:10.5pt;\">】？</span><span style=\"font-family:微软雅黑;font-size:10.5pt;\"></span> \r\n</p>\r\n<p style=\"text-align:justify;text-indent:21pt;\" class=\"p16\">\r\n	<span style=\"background-color:#ffffff;font-family:微软雅黑;color:#444444;font-size:10.5pt;\">XXX赠送给会员的电子货币，以元为单位，可以用来抵用部分商品款，但必须成功竞拍的商品才可以使用拍币抵扣，若是中奖的商品不能使用拍币抵扣，拍币也不可转为现金。<br />\r\n<br />\r\n</span> \r\n</p>\r\n<p style=\"text-align:justify;text-indent:21pt;\" class=\"p16\">\r\n	<span style=\"background-color:#ffffff;font-family:微软雅黑;color:#444444;font-size:10.5pt;\"><span><a href=\"http://www.225.net/content/tiyan\">用途1：参与体验竟拍区，免费竟拍</a></span><br />\r\n<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href=\"http://www.225.net/content/tiyan/db\">用途2：参与免费夺宝区，免费夺宝</a></span><br />\r\n<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;用途3：参与<a href=\"http://www.225.net/auction/lists/kaquan\">卡券拍</a>、<a href=\"http://www.225.net/auction/lists/jingpin\">精品拍区</a>竟拍，并可抵用设定的金额</span><br />\r\n<br />\r\n</span> \r\n</p>\r\n<p style=\"text-align:justify;text-indent:21pt;\" class=\"p16\">\r\n	<br />\r\n<span style=\"background-color:#ffffff;font-family:微软雅黑;color:#444444;font-size:10.5pt;\"></span><span style=\"font-family:\'sans serif\';font-size:10.5pt;\"><!--?xml:namespace prefix = o /--><!--?xml:namespace prefix = o /--></span> \r\n</p>\r\n<p style=\"text-align:justify;\" class=\"p16\">\r\n	<span style=\"font-family:微软雅黑;font-size:10.5pt;\"><strong>二、</strong></span><span style=\"font-family:微软雅黑;font-size:10.5pt;\"><strong>什么是夺宝币？</strong></span><span style=\"font-family:微软雅黑;font-size:10.5pt;\"></span> \r\n</p>\r\n<p style=\"text-align:justify;text-indent:21pt;\" class=\"p16\">\r\n	<span style=\"background-color:#ffffff;font-family:微软雅黑;color:#444444;font-size:10.5pt;\">会员每花费1元购买爱我拍网盘空间1兆，即可获赠相应的1元夺宝币。夺宝币可以用来在1元夺宝区进行夺宝。夺宝币不能转为现金。</span> \r\n</p>\r\n<p style=\"text-align:justify;text-indent:21pt;\" class=\"p16\">\r\n	<br />\r\n<span style=\"background-color:#ffffff;font-family:微软雅黑;color:#444444;font-size:10.5pt;\"></span><span style=\"font-family:\'sans serif\';font-size:10.5pt;\"></span> \r\n</p>\r\n<p style=\"text-align:justify;\" class=\"p16\">\r\n	<span style=\"font-family:微软雅黑;font-size:10.5pt;\"><strong>三、</strong></span><span style=\"font-family:微软雅黑;font-size:10.5pt;\"><strong>如何获得拍币或者夺宝币？</strong></span><span style=\"font-family:微软雅黑;font-size:10.5pt;\"></span> \r\n</p>\r\n<p style=\"text-align:justify;text-indent:21pt;\" class=\"p16\">\r\n	<span style=\"font-family:微软雅黑;font-size:10.5pt;\">&nbsp;注册成为爱我拍会员，完成爱我拍相关任务即可获得相应的拍币或者夺宝币。（具体任务以爱我拍公告、活动为准）</span><span style=\"font-family:微软雅黑;font-size:10.5pt;\"></span> \r\n</p>\r\n<p style=\"text-align:justify;\" class=\"p16\">\r\n	<span style=\"font-family:微软雅黑;font-size:10.5pt;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 1、</span><span style=\"font-family:微软雅黑;font-size:10.5pt;\">获得拍币方式：</span><span style=\"font-family:微软雅黑;font-size:10.5pt;\"></span> \r\n</p>\r\n<p style=\"text-align:justify;text-indent:21pt;\" class=\"p16\">\r\n	<span style=\"font-family:微软雅黑;font-size:10.5pt;\">&nbsp;&nbsp;&nbsp;&nbsp;A、</span><span style=\"font-family:微软雅黑;font-size:10.5pt;\"><a href=\"/regist\">注册会员</a>——<a href=\"/member/safe\">认证邮箱</a>——<a href=\"/member/safe\">认证手机</a>——<a href=\"/content/tiyan\">体验区领取40拍币</a>。</span> \r\n</p>\r\n<p style=\"text-align:justify;text-indent:21pt;\" class=\"p16\">\r\n	<span style=\"font-family:微软雅黑;font-size:10.5pt;\">&nbsp;&nbsp;&nbsp;&nbsp;B、</span><span style=\"font-family:微软雅黑;font-size:10.5pt;\">发送含有你会员号的<a href=\"/member/myivt\">链接</a>，邀请亲朋好友注册会员，获得拍币，<span>【<a class=\"layerTip\" href=\"/member/myivt\">每邀请一位送5拍币</a>】【<a href=\"/member/myivt\">邀请第三位送10夺宝币</a>】【<a href=\"/member/myivt\">邀请第五位，还送电影票或游戏点卡</a>】</span>。</span> \r\n</p>\r\n<p style=\"text-align:justify;text-indent:21pt;\" class=\"p16\">\r\n	<span style=\"font-family:微软雅黑;font-size:10.5pt;\">&nbsp;&nbsp;&nbsp;&nbsp;C、</span><span style=\"font-family:微软雅黑;font-size:10.5pt;\">经您邀请，成功参与竞拍的好友，参与一件竞拍，你都可以获得1个拍币，365天有效（不含体验区）</span><span style=\"font-family:微软雅黑;font-size:10.5pt;\"></span> \r\n</p>\r\n<p style=\"text-align:justify;text-indent:21pt;\" class=\"p16\">\r\n	<span style=\"font-family:微软雅黑;font-size:10.5pt;\">&nbsp;&nbsp;&nbsp;&nbsp;D、</span><span style=\"font-family:微软雅黑;font-size:10.5pt;\">参与竟拍10次或参与夺宝50次后，获得50拍币</span><span style=\"font-family:微软雅黑;font-size:10.5pt;\"></span> \r\n</p>\r\n<p style=\"text-align:justify;text-indent:21pt;\" class=\"p16\">\r\n	<span style=\"font-family:微软雅黑;font-size:10.5pt;\">&nbsp;&nbsp;&nbsp;&nbsp;E、</span><span style=\"font-family:微软雅黑;font-size:10.5pt;\">每天登录并签到得5拍币</span><span style=\"font-family:微软雅黑;font-size:10.5pt;\"></span> \r\n</p>\r\n<p style=\"text-align:justify;\" class=\"p16\">\r\n	<span style=\"font-family:微软雅黑;font-size:10.5pt;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 2、</span><span style=\"font-family:微软雅黑;font-size:10.5pt;\">获得夺宝币方式：</span><span style=\"font-family:微软雅黑;font-size:10.5pt;\"></span> \r\n</p>\r\n<p style=\"text-align:justify;text-indent:21pt;\" class=\"p16\">\r\n	<span style=\"font-family:微软雅黑;font-size:10.5pt;\">&nbsp;&nbsp;&nbsp;&nbsp;A、</span><span style=\"font-family:微软雅黑;font-size:10.5pt;\">夺宝币，只能通过后台按充值，按1M网盘兑换1个夺宝币，获得。</span> \r\n</p>\r\n<p style=\"text-align:justify;text-indent:21pt;\" class=\"p16\">\r\n	<span style=\"font-family:微软雅黑;font-size:10.5pt;\">&nbsp;&nbsp;&nbsp;&nbsp;B、</span><span style=\"font-family:微软雅黑;font-size:10.5pt;\">首次参拍，会自动产生分享码，你可以分享给3位好友，每位你都可以获得5夺宝币哦</span><span style=\"font-family:微软雅黑;font-size:10.5pt;\">。</span><span style=\"font-family:\'sans serif\';font-size:10.5pt;\"></span> \r\n</p>\r\n<p>\r\n	<br />\r\n</p>', '4010');
INSERT INTO zz_page VALUES ('79', '1', '1', 'lnest_admin', '/content/show//79', '0', '1419929897', '1464261165', '1', '什么是竞拍', '', '', '<p style=\"text-align:justify;vertical-align:;\">\r\n	<span style=\"font-size:14px;font-family:微软雅黑;\"> </span>\r\n</p>\r\n<p style=\"text-align:justify;vertical-align:;\">\r\n	<span style=\"font-family:微软雅黑;\"><strong>1、</strong></span><span style=\"font-family:微软雅黑;\"><strong>什么是竞拍</strong></span><span style=\"font-family:微软雅黑;\"></span> \r\n</p>\r\n<p style=\"text-indent:28.0000pt;text-align:justify;vertical-align:;\">\r\n	<span style=\"color:#333333;font-family:微软雅黑;background-color:#FFFFFF;\">竞拍</span><span style=\"color:#333333;font-family:微软雅黑;background-color:#FFFFFF;\">是一种全新</span><span style=\"color:#333333;font-family:微软雅黑;background-color:#FFFFFF;\">的</span><span style=\"color:#333333;font-family:微软雅黑;background-color:#FFFFFF;\">网购模式，以好玩、刺激的竞拍为核心，集娱乐互动、竞争、网购于一体，让参与者通过对商品进行竞拍、从而以远低于</span><span style=\"color:#333333;font-family:微软雅黑;background-color:#FFFFFF;\">市场</span><span style=\"color:#333333;font-family:微软雅黑;background-color:#FFFFFF;\">价格的成本</span><span style=\"color:#333333;font-family:微软雅黑;background-color:#FFFFFF;\">，不仅可以</span><span style=\"color:#333333;font-family:微软雅黑;background-color:#FFFFFF;\">获取最火爆、最时尚的热门产品</span><span style=\"color:#333333;font-family:微软雅黑;background-color:#FFFFFF;\">而且还可以获得</span><span style=\"color:#494949;font-family:微软雅黑;\">日常用品和生活必需品</span><span style=\"color:#333333;font-family:微软雅黑;background-color:#FFFFFF;\">。</span><span style=\"color:#333333;font-family:微软雅黑;background-color:#FFFFFF;\">可以说</span><span style=\"color:#444444;font-family:微软雅黑;background-color:#FFFFFF;\">竟拍充分体现了互联网思维与信息流动所产生的价值，即免费性。</span><span style=\"color:#444444;font-family:微软雅黑;background-color:#FFFFFF;\"></span> \r\n</p>\r\n<p style=\"text-align:justify;vertical-align:;\">\r\n	<span style=\"color:#333333;font-family:微软雅黑;background-color:#FFFFFF;\"><strong>2、</strong></span><span style=\"color:#333333;font-family:微软雅黑;background-color:#FFFFFF;\"><strong>为什么竞拍可以只要市场70%以上的价格获得产品？</strong></span><span style=\"color:#333333;font-family:微软雅黑;background-color:#FFFFFF;\"></span> \r\n</p>\r\n<p style=\"text-indent:28.0000pt;text-align:justify;vertical-align:;\">\r\n	<span style=\"color:#494949;font-family:微软雅黑;\">竞拍是比团购更省钱的购物模式，团购是很多用户集中购买</span><span style=\"color:#444444;font-family:微软雅黑;background-color:#FFFFFF;\">某一商品，从而以更低的打折价格获得，它考虑的是所有用户的普及受惠，类似薄利多销形式。而竞拍则刚好相反，它考虑的是集惠制，是把所有的打折范围集中于部分用户身上，</span><span style=\"color:#444444;font-family:微软雅黑;background-color:#FFFFFF;\">然后通过一定的计算规则按1%至20%的比例，产生中签用户，从而让这些用户能获得更低的折扣范围和更大的省钱空间。</span><span style=\"color:#444444;font-family:微软雅黑;background-color:#FFFFFF;\"></span> \r\n</p>\r\n<p style=\"text-indent:28.0000pt;text-align:justify;vertical-align:;\">\r\n	<span style=\"color:#444444;font-family:微软雅黑;background-color:#FFFFFF;\">竞拍的集惠制，也从另一方面告诉我们，人气聚集越大，所参与的竞拍人数就越多，竞拍的活跃度就越高，转换率就越快，商品信息流动所产生的价值就越大，收益就越高，从而分摊到每位用户的成本就越低</span><span style=\"font-family:微软雅黑;\">。这是因为互联网</span><span style=\"color:#444444;font-family:微软雅黑;background-color:#FFFFFF;\">不同于传统的商业模式，它所具有的互联网思维和信息流动所产生的价值，使得互联网不需要打价格战，而且还可以实现免费或者</span><span style=\"font-family:微软雅黑;\">接近成本、低于成本价销售。也正是基于这一点，XXX商城突破传统电商常规的</span><span style=\"font-family:微软雅黑;background-color:#FFFFFF;\">消费者单向消费模式</span><span style=\"font-family:微软雅黑;background-color:#FFFFFF;\">，</span><span style=\"font-family:微软雅黑;background-color:#FFFFFF;\">将消费者、地面商家、供货商有机的结合起来，整合各项资源，实现商家、消费者，运营</span><span style=\"font-family:微软雅黑;background-color:#FFFFFF;\">商</span><span style=\"font-family:微软雅黑;background-color:#FFFFFF;\">等多方共赢。</span><span style=\"font-family:微软雅黑;\">XXX商城会不定时地跟商家合作，推出商家的一些卡券、各类优质产品，通过</span><span style=\"color:#444444;font-family:微软雅黑;background-color:#FFFFFF;\">合作商家的这些商品产生平台收益。反之，平台人气越高，合作商家推出的商品收益就越多，返馈给用户的竞拍商品折扣也就越多。从而让消费者可以获得更实惠的价格购买到心仪的商品。</span><span style=\"color:#444444;font-family:微软雅黑;background-color:#FFFFFF;\"></span> \r\n</p>\r\n<p style=\"text-indent:28.0000pt;text-align:justify;vertical-align:;\">\r\n	<span style=\"color:#494949;font-family:微软雅黑;\">一般来说，竞拍的商品</span><span style=\"color:#494949;font-family:微软雅黑;\">大部分</span><span style=\"color:#494949;font-family:微软雅黑;\">都是</span><span style=\"color:#494949;font-family:微软雅黑;\">以市场</span><span style=\"color:#494949;font-family:微软雅黑;\">50%至70%以上（以具体商品为准）</span><span style=\"color:#494949;font-family:微软雅黑;\">价格</span><span style=\"color:#494949;font-family:微软雅黑;\">起拍</span><span style=\"color:#494949;font-family:微软雅黑;\">的。用户在竞拍</span><span style=\"color:#494949;font-family:微软雅黑;\">的时候，首次出价需要缴纳保证金，</span><span style=\"color:#494949;font-family:微软雅黑;\">可以</span><span style=\"color:#494949;font-family:微软雅黑;\">多次</span><span style=\"color:#494949;font-family:微软雅黑;\">出价</span><span style=\"color:#494949;font-family:微软雅黑;\">，每次出价幅度都在几毛钱</span><span style=\"color:#494949;font-family:微软雅黑;\">左右</span><span style=\"color:#494949;font-family:微软雅黑;\">，虽然价高得者，但</span><span style=\"color:#494949;font-family:微软雅黑;\">商品</span><span style=\"color:#494949;font-family:微软雅黑;\">的最终</span><span style=\"color:#494949;font-family:微软雅黑;\">成交价格都非常</span><span style=\"color:#494949;font-family:微软雅黑;\">低。另外对于参拍人数比较少的商品，按首次出价</span><span style=\"color:#494949;font-family:微软雅黑;\">5%至10%</span><span style=\"color:#494949;font-family:微软雅黑;\">中奖率获得。无论是那种模式，用户所获得的商品都比在商店或者传统的网购要</span><span style=\"color:#494949;font-family:微软雅黑;\">便宜的多</span><span style=\"color:#494949;font-family:微软雅黑;\">。这些因素都决定了</span><span style=\"color:#444444;font-family:微软雅黑;background-color:#FFFFFF;\">竞拍可以只要市场</span><span style=\"color:#444444;font-family:微软雅黑;background-color:#FFFFFF;\">70%以上的价格获得产品。</span><span style=\"color:#444444;font-family:微软雅黑;background-color:#FFFFFF;\"></span> \r\n</p>\r\n<p style=\"text-align:justify;vertical-align:;\">\r\n	<span style=\"color:#444444;font-family:微软雅黑;background-color:#FFFFFF;\"><strong>3、正品保障</strong></span><span style=\"color:#444444;font-family:微软雅黑;background-color:#FFFFFF;\"></span> \r\n</p>\r\n<p style=\"text-indent:21.0000pt;\">\r\n	<span style=\"color:#666666;font-family:微软雅黑;\">XXX</span><span style=\"color:#666666;font-family:微软雅黑;\">严格控制供应渠道，全部商品均从品牌官方以及品牌经销商直接采购供货，并取得品牌官方网络销售授权书，如果您认为</span><span style=\"color:#666666;font-family:微软雅黑;\">XXX</span><span style=\"color:#666666;font-family:微软雅黑;\">的商品是假货，并能提供国家相关质检机构的证明文件，经确认后，在返还商品金额的同时并提供假一赔十服务保障。为了保障您的利益，对</span><span style=\"color:#666666;font-family:微软雅黑;\">XXX</span><span style=\"color:#666666;font-family:微软雅黑;\">的商品，做如下说明：</span><span style=\"font-family:微软雅黑;\"></span> \r\n</p>\r\n<p>\r\n	<span style=\"color:#666666;font-family:微软雅黑;\">&nbsp; &nbsp;&nbsp;A、</span><span style=\"color:#666666;font-family:微软雅黑;\">XXX</span><span style=\"color:#666666;font-family:微软雅黑;\">对所有商品均保证正品行货，正规渠道发货，所有商品都可以享受生产厂家的全国联保服务，按照国家三包政策，针对所售商品履行保修、换货和退货的义务。</span><span style=\"font-family:微软雅黑;\"></span> \r\n</p>\r\n<p>\r\n	<span style=\"color:#666666;font-family:微软雅黑;\">&nbsp; &nbsp;&nbsp;B、出现国家三包所规定的功能性故障时，经由生产厂家指定或特约售后服务中心检测确认故障属实，您可以选择换货或者维修；超过15日且在保修期内，您只能在保修期内享受免费维修服务。为了不耽误您使用，缩短故障商品的维修时间，我们建议您直接联系生产厂家售后服务中心进行处理。您也可以直接在商品的保修卡中查找该商品对应的全国各地生产厂家售后服务中心联系处理。</span><span style=\"font-family:微软雅黑;\"></span> \r\n</p>\r\n<p>\r\n	<span style=\"color:#666666;font-family:微软雅黑;\">&nbsp; &nbsp;&nbsp;C、</span><span style=\"color:#666666;font-family:微软雅黑;\">XXX</span><span style=\"color:#666666;font-family:微软雅黑;\">真诚提醒广大幸运者在您收到商品的时候，请尽量亲自签收并当面拆箱验货，如果有问题(运输途中的损坏)请不要签收!与快递员交涉，拒签，退回!</span><span style=\"font-family:微软雅黑;\"></span> \r\n</p>\r\n<p>\r\n	<span style=\"color:#666666;font-family:微软雅黑;\">&nbsp;D、在收到商品后发现有质量问题，请您不要私自处理，妥善保留好原包装，第一时间联系</span><span style=\"color:#666666;font-family:微软雅黑;\">XXX</span><span style=\"color:#666666;font-family:微软雅黑;\">客服人员，由</span><span style=\"color:#666666;font-family:微软雅黑;\">XXX</span><span style=\"color:#666666;font-family:微软雅黑;\">同发货商城协商在48小时内解决。如有破损或丢失，我们将无法为您办理退货。</span><span style=\"font-family:微软雅黑;\"></span> \r\n</p>\r\n<p style=\"text-indent:21.0000pt;\">\r\n	<span style=\"color:#666666;font-family:微软雅黑;\">如对协商处理结果存在异议，请您自行到当地生产厂家售后服务中心进行检测，并开据正规检测报告（对于有些生产厂家售后服务中心无法提供检测报告的，需提供维修检验单据），如果检测报告确认属于质量问题，然后将检测报告、问题商品及完整包装附件，一并返还发货商城办理换货手续，产生的相关费用由</span><span style=\"color:#666666;font-family:微软雅黑;\">XXX</span><span style=\"color:#666666;font-family:微软雅黑;\">追究相关责任方承担。</span><span style=\"font-family:微软雅黑;\"></span> \r\n</p>\r\n<p style=\"text-indent:21.0000pt;\">\r\n	<span style=\"color:#666666;font-family:微软雅黑;\">XXX</span><span style=\"color:#666666;font-family:微软雅黑;\">上的电子产品及配件因为生成工艺或仓储物流原因，可能会存在收到或使用过程中出现故障的几率，</span><span style=\"color:#666666;font-family:微软雅黑;\">XXX</span><span style=\"color:#666666;font-family:微软雅黑;\">不能保证所有的商品都没有故障，但我们保证所售商品都是全新正品行货，能够提供正规的售后保障。我们保证商品的正规进货渠道和质量，如果您对收到的商品质量表示怀疑，请提供生产厂家或官方出具的书面鉴定，我们会按照国家法律规定予以处理。但对于任何欺诈性行为，</span><span style=\"color:#666666;font-family:微软雅黑;\">XXX</span><span style=\"color:#666666;font-family:微软雅黑;\">将保留依法追究法律责任的权利。本规则最终解释权由</span><span style=\"color:#666666;font-family:微软雅黑;\">XXX</span><span style=\"color:#666666;font-family:微软雅黑;\">所有。</span> \r\n</p>\r\n<br />\r\n<span style=\"color:#444444;font-size:14pt;font-family:微软雅黑;background-color:#FFFFFF;\"></span> \r\n<p>\r\n	<br />\r\n</p>\r\n<p style=\"text-indent:21.0000pt;\">\r\n	<span style=\"color:#666666;font-size:14px;font-family:微软雅黑;\"></span><span style=\"color:#666666;font-size:14px;font-family:微软雅黑;\"></span><span style=\"color:#666666;font-size:14px;font-family:微软雅黑;\"></span><span style=\"color:#666666;font-size:14px;font-family:微软雅黑;\"></span><span style=\"color:#666666;font-size:14px;font-family:微软雅黑;\"></span><span style=\"color:#666666;font-size:14px;font-family:微软雅黑;\"></span><span style=\"color:#666666;font-size:14px;font-family:微软雅黑;\"></span><span style=\"color:#666666;font-size:14px;font-family:微软雅黑;\"></span><span style=\"color:#444444;font-size:14pt;font-family:微软雅黑;background-color:#FFFFFF;\"></span> \r\n</p>\r\n<p style=\"text-align:justify;vertical-align:;\">\r\n	<strong> </strong>\r\n</p>\r\n<p style=\"text-align:justify;vertical-align:;\">\r\n	<strong> <span style=\"font-size:14px;font-family:\'Microsoft YaHei\';\"> </span></strong>\r\n</p>\r\n<p style=\"text-align:justify;vertical-align:;\">\r\n	<strong> <br />\r\n</strong>\r\n</p>\r\n<strong> \r\n<p style=\"text-indent:21.0000pt;\">\r\n	<span style=\"color:#666666;font-size:14px;font-family:\'Microsoft YaHei\';\"></span><span style=\"color:#666666;font-size:14px;font-family:\'Microsoft YaHei\';\"></span><span style=\"color:#666666;font-size:14px;font-family:\'Microsoft YaHei\';\"></span><span style=\"color:#666666;font-size:14px;font-family:\'Microsoft YaHei\';\"></span><span style=\"color:#666666;font-size:14px;font-family:\'Microsoft YaHei\';\"></span><span style=\"color:#666666;font-size:14px;font-family:\'Microsoft YaHei\';\"></span><span style=\"color:#666666;font-size:14px;font-family:\'Microsoft YaHei\';\"></span><span style=\"color:#666666;font-size:14px;font-family:\'Microsoft YaHei\';\"></span> \r\n</p>\r\n</strong> \r\n<p>\r\n	<br />\r\n</p>', '166');
INSERT INTO zz_page VALUES ('55', '1', '2', 'admin', '/content/show//55', '0', '1417154982', '1464261063', '1', '退换货政策', '', '', '<h2>\r\n</h2>\r\n<h4>\r\n	<span style=\"color:#666666;font-size:10.5pt;font-family:微软雅黑;\">100%正品保证</span><span style=\"font-size:10.5pt;font-family:微软雅黑;\"></span> \r\n</h4>\r\n<p>\r\n	<span style=\"color:#666666;font-size:10.5pt;font-family:微软雅黑;\">XXX</span><span style=\"color:#666666;font-size:10.5pt;font-family:微软雅黑;\">精心挑选优质服务品牌商家，保障全场商品100%品牌正品。</span><span style=\"font-size:10.5000pt;font-family:\'微软雅黑\';\"></span> \r\n</p>\r\n<h4>\r\n	<span style=\"color:#666666;font-size:10.5pt;font-family:微软雅黑;\">100%公平公正</span><span style=\"font-size:10.5pt;font-family:微软雅黑;\"></span> \r\n</h4>\r\n<p>\r\n	<span style=\"color:#666666;font-size:10.5pt;font-family:微软雅黑;\">整个过程是完全透明，您可以随时查看每件商品参与人数，参与次数，参与名单及中奖信息等记录。</span><span style=\"font-size:10.5000pt;font-family:\'微软雅黑\';\"></span> \r\n</p>\r\n<h4>\r\n	<span style=\"color:#666666;font-size:10.5pt;font-family:微软雅黑;\">全国免费快递</span><span style=\"font-size:10.5pt;font-family:微软雅黑;\"></span> \r\n</h4>\r\n<p>\r\n	<span style=\"color:#666666;font-size:10.5pt;font-family:微软雅黑;\">爱我拍</span><span style=\"color:#666666;font-size:10.5pt;font-family:微软雅黑;\">承诺全场所有商品全国免费快递。（港澳台地区除外）</span><span style=\"font-size:10.5000pt;font-family:\'微软雅黑\';\"></span> \r\n</p>\r\n<br />', '1531');
INSERT INTO zz_page VALUES ('75', '1', '2', 'admin', '/content/show//75', '0', '1417599912', '1464261051', '1', '正品承诺', '', '', '<h2>\r\n	<p style=\"text-indent:21.0000pt;\">\r\n		<span style=\"color:#666666;font-size:10.5pt;font-family:\'Microsoft YaHei\';\">XXX</span><span style=\"color:#666666;font-size:10.5pt;font-family:\'Microsoft YaHei\';\">严格控制供应渠道，全部商品均从品牌官方以及品牌经销商直接采购供货，并取得品牌官方网络销售授权书，如果您认为</span><span style=\"color:#666666;font-size:10.5pt;font-family:\'Microsoft YaHei\';\">XXX</span><span style=\"color:#666666;font-size:10.5pt;font-family:\'Microsoft YaHei\';\">的商品是假货，并能提供国家相关质检机构的证明文件，经确认后，在返还商品金额的同时并提供假一赔十服务保障。为了保障您的利益，对</span><span style=\"color:#666666;font-size:10.5pt;font-family:\'Microsoft YaHei\';\">XXX</span><span style=\"color:#666666;font-size:10.5pt;font-family:\'Microsoft YaHei\';\">的商品，做如下说明：</span><span style=\"font-size:12.0000pt;font-family:\'Times New Roman\';\"></span> \r\n	</p>\r\n	<p>\r\n		<span style=\"color:#666666;font-size:10.5pt;font-family:\'Microsoft YaHei\';\">&nbsp; &nbsp; &nbsp;&nbsp;1、</span><span style=\"color:#666666;font-size:10.5pt;font-family:\'Microsoft YaHei\';\">XXX</span><span style=\"color:#666666;font-size:10.5pt;font-family:\'Microsoft YaHei\';\">对所有商品均保证正品行货，正规渠道发货，所有商品都可以享受生产厂家的全国联保服务，按照国家三包政策，针对所售商品履行保修、换货和退货的义务。</span><span style=\"font-size:12.0000pt;font-family:\'Times New Roman\';\"></span> \r\n	</p>\r\n	<p>\r\n		<span style=\"color:#666666;font-size:10.5pt;font-family:\'Microsoft YaHei\';\">&nbsp; &nbsp; &nbsp;&nbsp;2、出现国家三包所规定的功能性故障时，经由生产厂家指定或特约售后服务中心检测确认故障属实，您可以选择换货或者维修；超过15日且在保修期内，您只能在保修期内享受免费维修服务。为了不耽误您使用，缩短故障商品的维修时间，我们建议您直接联系生产厂家售后服务中心进行处理。您也可以直接在商品的保修卡中查找该商品对应的全国各地生产厂家售后服务中心联系处理。</span><span style=\"font-size:12.0000pt;font-family:\'Times New Roman\';\"></span> \r\n	</p>\r\n	<p>\r\n		<span style=\"color:#666666;font-size:10.5pt;font-family:\'Microsoft YaHei\';\">&nbsp; &nbsp; &nbsp;&nbsp;3、</span><span style=\"color:#666666;font-size:10.5pt;font-family:\'Microsoft YaHei\';\">XXX</span><span style=\"color:#666666;font-size:10.5pt;font-family:\'Microsoft YaHei\';\">真诚提醒广大幸运者在您收到商品的时候，请尽量亲自签收并当面拆箱验货，如果有问题(运输途中的损坏)请不要签收!与快递员交涉，拒签，退回!</span><span style=\"font-size:12.0000pt;font-family:\'Times New Roman\';\"></span> \r\n	</p>\r\n	<p>\r\n		<span style=\"color:#666666;font-size:10.5pt;font-family:\'Microsoft YaHei\';\">&nbsp; &nbsp; &nbsp;4、在收到商品后发现有质量问题，请您不要私自处理，妥善保留好原包装，第一时间联系</span><span style=\"color:#666666;font-size:10.5pt;font-family:\'Microsoft YaHei\';\">XXX</span><span style=\"color:#666666;font-size:10.5pt;font-family:\'Microsoft YaHei\';\">客服人员，由</span><span style=\"color:#666666;font-size:10.5pt;font-family:\'Microsoft YaHei\';\">XXX</span><span style=\"color:#666666;font-size:10.5pt;font-family:\'Microsoft YaHei\';\">同发货商城协商在48小时内解决。如有破损或丢失，我们将无法为您办理退货。</span><span style=\"font-size:12.0000pt;font-family:\'Times New Roman\';\"></span> \r\n	</p>\r\n	<p style=\"text-indent:21.0000pt;\">\r\n		<span style=\"color:#666666;font-size:10.5pt;font-family:\'Microsoft YaHei\';\">如对协商处理结果存在异议，请您自行到当地生产厂家售后服务中心进行检测，并开据正规检测报告（对于有些生产厂家售后服务中心无法提供检测报告的，需提供维修检验单据），如果检测报告确认属于质量问题，然后将检测报告、问题商品及完整包装附件，一并返还发货商城办理换货手续，产生的相关费用由</span><span style=\"color:#666666;font-size:10.5pt;font-family:\'Microsoft YaHei\';\">XXX</span><span style=\"color:#666666;font-size:10.5pt;font-family:\'Microsoft YaHei\';\">追究相关责任方承担。</span><span style=\"font-size:12.0000pt;font-family:\'Times New Roman\';\"></span> \r\n	</p>\r\n	<p style=\"text-indent:21.0000pt;\">\r\n		<span style=\"color:#666666;font-size:10.5pt;font-family:\'Microsoft YaHei\';\">XXX</span><span style=\"color:#666666;font-size:10.5pt;font-family:\'Microsoft YaHei\';\">上的电子产品及配件因为生成工艺或仓储物流原因，可能会存在收到或使用过程中出现故障的几率，</span><span style=\"color:#666666;font-size:10.5pt;font-family:\'Microsoft YaHei\';\">XXX</span><span style=\"color:#666666;font-size:10.5pt;font-family:\'Microsoft YaHei\';\">不能保证所有的商品都没有故障，但我们保证所售商品都是全新正品行货，能够提供正规的售后保障。我们保证商品的正规进货渠道和质量，如果您对收到的商品质量表示怀疑，请提供生产厂家或官方出具的书面鉴定，我们会按照国家法律规定予以处理。但对于任何欺诈性行为，</span><span style=\"color:#666666;font-size:10.5pt;font-family:\'Microsoft YaHei\';\">XXX</span><span style=\"color:#666666;font-size:10.5pt;font-family:\'Microsoft YaHei\';\">将保留依法追究法律责任的权利。本规则最终解释权由</span><span style=\"color:#666666;font-size:10.5pt;font-family:\'Microsoft YaHei\';\">XXX</span><span style=\"color:#666666;font-size:10.5pt;font-family:\'Microsoft YaHei\';\">所有。</span><span style=\"font-size:12.0000pt;font-family:\'Times New Roman\';\"></span> \r\n	</p>\r\n	<p>\r\n		<span style=\"font-size:10.5pt;font-family:\'Microsoft YaHei\';\">&nbsp;</span> \r\n	</p>\r\n<span style=\"font-family:Microsoft YaHei;\"></span><br />\r\n</h2>', '1573');
INSERT INTO zz_page VALUES ('54', '1', '2', 'admin', '/content/show//54', '0', '1417599808', '1464261014', '1', '安全支付', '', '', '<h2>\r\n	<p>\r\n		<span style=\"color:#666666;font-size:14px;font-family:\'Microsoft YaHei\';\">XXX</span><span style=\"color:#666666;font-size:14px;font-family:\'Microsoft YaHei\';\">严格遵循网络购物的安全准则，通过网银在线、</span><span style=\"color:#666666;font-size:14px;font-family:\'Microsoft YaHei\';\">支付宝</span><span style=\"color:#666666;font-size:14px;font-family:\'Microsoft YaHei\';\">等安全度高的支付方式，充分保证您在线支付的安全性。</span><span style=\"font-size:10.5000pt;font-family:\'Times New Roman\';\"></span> \r\n	</p>\r\n<br />\r\n</h2>\r\n<p>\r\n	<span style=\"font-size:10.5000pt;font-family:\'宋体\';\">&nbsp;</span> \r\n</p>\r\n<p>\r\n	<br />\r\n</p>', '1521');
INSERT INTO zz_page VALUES ('69', '1', '1', 'lnest_admin', '/content/show//69', '0', '1417412456', '1460361935', '1', '一元夺宝新手学堂', '', '', '<p>\r\n	<img src=\"http://ssf.517kitchen.com/upload/images/gallery/3/8/117_src.jpg\" alt=\"\" title=\"\" height=\"234\" width=\"1159\" /> \r\n</p>\r\n<p>\r\n	<img src=\"http://ssf.517kitchen.com/upload/images/gallery/3/9/118_src.jpg\" alt=\"\" title=\"\" height=\"332\" width=\"1159\" /> \r\n</p>\r\n<p>\r\n	<img src=\"http://ssf.517kitchen.com/upload/images/gallery/3/a/119_src.jpg\" alt=\"\" title=\"\" height=\"386\" width=\"1159\" /> \r\n</p>\r\n<p>\r\n	<img src=\"http://ssf.517kitchen.com/upload/images/gallery/3/b/120_src.jpg\" alt=\"\" title=\"\" height=\"444\" width=\"1159\" /> \r\n</p>\r\n<p>\r\n	<img src=\"http://ssf.517kitchen.com/upload/images/gallery/3/c/121_src.jpg\" alt=\"\" title=\"\" height=\"457\" width=\"1159\" /> \r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p class=\"add-yxp-btn fn-clear\">\r\n	<a href=\"/yunbuy\"><img src=\"http://ssf.517kitchen.com/upload/images/gallery/3/d/122_src.png\" alt=\"\" title=\"\" height=\"77\" width=\"289\" /></a> \r\n</p>\r\n<p class=\"add-yxp-btn fn-clear\">\r\n	00000000000000000000000000000000000GSDFSD&nbsp;\r\n</p>', '42');
INSERT INTO zz_page VALUES ('71', '1', '2', 'admin', '/content/show//71', '0', '1417599145', '1464261198', '1', '一元夺宝规则', '', '', '<p>\r\n	<span style=\"font-size:10.5000pt;font-family:\'微软雅黑\';\"> </span> \r\n</p>\r\n<p style=\"text-align:justify;vertical-align:;\">\r\n	<span style=\"font-weight:bold;font-size:10.5000pt;font-family:\'微软雅黑\';\">一、什么是一元夺宝？</span><span style=\"font-weight:bold;font-size:10.5000pt;font-family:\'微软雅黑\';\"></span> \r\n</p>\r\n<p style=\"text-indent:21.0000pt;text-align:justify;vertical-align:;background:#FFFFFF;\">\r\n	<span style=\"font-size:10.5pt;font-family:微软雅黑;\">一元夺宝，就是指</span><span style=\"font-size:10.5pt;font-family:微软雅黑;\">会员每</span><span style=\"font-size:10.5pt;font-family:微软雅黑;\">花费1元购买</span><span style=\"font-size:10.5pt;font-family:微软雅黑;\">XXX网</span><span style=\"font-size:10.5pt;font-family:微软雅黑;\">盘空间</span><span style=\"font-size:10.5pt;font-family:微软雅黑;\">1兆</span><span style=\"font-size:10.5pt;font-family:微软雅黑;\">，</span><span style=\"font-size:10.5pt;font-family:微软雅黑;\">即可获赠</span><span style=\"font-size:10.5pt;font-family:微软雅黑;\">1个夺宝币，</span><span style=\"font-size:10.5pt;font-family:微软雅黑;\">就有机会获得一件</span><span style=\"font-size:10.5pt;font-family:微软雅黑;\">商品</span><span style=\"font-size:10.5pt;font-family:微软雅黑;\">。</span><span style=\"font-size:10.5pt;font-family:微软雅黑;\">每件商品被平分成若干“等份”，每份</span><span style=\"font-size:10.5pt;font-family:微软雅黑;\">1元即1个夺宝币，同时获得对应一个号码。当一件商品所有等份即相应号码被分配完成后，</span><span style=\"font-size:10.5pt;font-family:微软雅黑;\">根据预先制定的规则计算出一个幸运号码，持有该号码的</span><span style=\"font-size:10.5pt;font-family:微软雅黑;\">会员</span><span style=\"font-size:10.5pt;font-family:微软雅黑;\">，直接获得该</span><span style=\"font-size:10.5pt;font-family:微软雅黑;\">商品</span><span style=\"font-size:10.5pt;font-family:微软雅黑;\">。</span><span style=\"font-size:10.5pt;font-family:微软雅黑;\"></span> \r\n</p>\r\n<p>\r\n	<span style=\"color:#444444;font-weight:bold;font-size:10.5pt;font-family:微软雅黑;background-color:#FFFFFF;\">2、四步骤</span><span style=\"color:#444444;font-weight:bold;font-size:10.5pt;font-family:微软雅黑;background-color:#FFFFFF;\"></span> \r\n</p>\r\n<p style=\"text-indent:21pt;\">\r\n	<span style=\"color:#444444;font-size:10.5pt;font-family:微软雅黑;background-color:#FFFFFF;\">A、获得夺宝币&nbsp;</span><span style=\"color:#444444;font-size:10.5pt;font-family:微软雅黑;background-color:#FFFFFF;\"></span> \r\n</p>\r\n<p style=\"text-indent:21pt;\">\r\n	<span style=\"color:#444444;font-size:10.5pt;font-family:微软雅黑;background-color:#FFFFFF;\">B、挑选心仪的商品&nbsp;</span><span style=\"color:#444444;font-size:10.5pt;font-family:微软雅黑;background-color:#FFFFFF;\"></span> \r\n</p>\r\n<p style=\"text-indent:21pt;\">\r\n	<span style=\"color:#444444;font-size:10.5pt;font-family:微软雅黑;background-color:#FFFFFF;\">C、等待天下掉馅饼&nbsp;</span><span style=\"color:#444444;font-size:10.5pt;font-family:微软雅黑;background-color:#FFFFFF;\"></span> \r\n</p>\r\n<p style=\"text-indent:21pt;\">\r\n	<span style=\"color:#444444;font-size:10.5pt;font-family:微软雅黑;background-color:#FFFFFF;\">D、分享晒单</span><span style=\"color:#444444;font-size:10.5pt;font-family:微软雅黑;background-color:#FFFFFF;\"></span> \r\n</p>\r\n<p style=\"text-indent:21.0000pt;text-align:justify;vertical-align:;\">\r\n	<span style=\"color:#666666;font-size:10.5pt;font-family:微软雅黑;\">晒出您收到的商品实物图片甚至您的靓照，说出您的</span><span style=\"color:#666666;font-size:10.5pt;font-family:微软雅黑;\">XXX购物</span><span style=\"color:#666666;font-size:10.5pt;font-family:微软雅黑;\">心得，让大家一起分享您的快乐。在您收到商品后，您只需登录网站完成晒单，并通过审核，即可获得</span><span style=\"color:#666666;font-size:10.5pt;font-family:微软雅黑;\">1—5</span><span style=\"color:#666666;font-size:10.5pt;font-family:微软雅黑;\">夺宝币</span><span style=\"color:#666666;font-size:10.5pt;font-family:微软雅黑;\">。</span><span style=\"color:#666666;font-size:10.5pt;font-family:微软雅黑;\">如果您的晒单被推荐为精品，不仅可以免费获得</span><span style=\"color:#666666;font-size:10.5pt;font-family:微软雅黑;\">5个夺宝币，而且还可以</span><span style=\"color:#666666;font-size:10.5pt;font-family:微软雅黑;\">被顶置“晒单分享区”首页，</span><span style=\"color:#666666;font-size:10.5pt;font-family:微软雅黑;\">与大家分享喜悦。</span><span style=\"color:#666666;font-size:10.5pt;font-family:微软雅黑;\"></span> \r\n</p>\r\n<p>\r\n	<span style=\"color:#444444;font-weight:bold;font-size:10.5pt;font-family:微软雅黑;background-color:#FFFFFF;\">3、一元夺宝规则</span><span style=\"color:#444444;font-weight:bold;font-size:10.5pt;font-family:微软雅黑;background-color:#FFFFFF;\"></span> \r\n</p>\r\n<p style=\"text-indent:21pt;\">\r\n	<span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;background-color:#FFFFFF;\">A、获得夺宝币：</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;background-color:#FFFFFF;\">用户花费1元购买</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;background-color:#FFFFFF;\">XXX</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;background-color:#FFFFFF;\">网盘空间</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;background-color:#FFFFFF;\">1兆</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;background-color:#FFFFFF;\">，即可获赠1个夺宝币；</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;background-color:#FFFFFF;\"></span> \r\n</p>\r\n<p style=\"text-indent:21pt;\">\r\n	<span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;background-color:#FFFFFF;\">B、挑选喜欢的商品：</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;background-color:#FFFFFF;\">商品</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;background-color:#FFFFFF;\">分配对应数量的号码，1个夺宝币，可以获得其中1个号码（系统随机分配）；</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;background-color:#FFFFFF;\"></span> \r\n</p>\r\n<p style=\"text-indent:21pt;\">\r\n	<span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">C、</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;\">同一件商品可以购买多次或一次购买多份。</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;background-color:#FFFFFF;\"></span> \r\n</p>\r\n<p style=\"text-indent:21pt;\">\r\n	<span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;background-color:#FFFFFF;\">D、获得商品：</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;background-color:#FFFFFF;\">当所有号码都被分配完毕后，系统根据规则计算出1个幸运号码，持有该号码的用户，直接获得该奖品。</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;background-color:#FFFFFF;\"></span> \r\n</p>\r\n<p style=\"text-indent:21pt;\">\r\n	<span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;background-color:#FFFFFF;\">F、</span><span style=\"color:#444444;font-size:10.5pt;font-family:微软雅黑;background-color:#FFFFFF;\">中奖者需要在一周内</span><span style=\"color:#444444;font-size:10.5pt;font-family:微软雅黑;background-color:#FFFFFF;\">领取</span><span style=\"color:#444444;font-size:10.5pt;font-family:微软雅黑;background-color:#FFFFFF;\">，以中奖日期为准，在第七天的16:00为领取有最后期限，逾期取消</span><span style=\"color:#444444;font-size:10.5pt;font-family:微软雅黑;background-color:#FFFFFF;\">中奖</span><span style=\"color:#444444;font-size:10.5pt;font-family:微软雅黑;background-color:#FFFFFF;\">资格。例：2013.1.1中奖，则需要在2013.1.8&nbsp;16:00之前</span><span style=\"color:#444444;font-size:10.5pt;font-family:微软雅黑;background-color:#FFFFFF;\">领取</span><span style=\"color:#444444;font-size:10.5pt;font-family:微软雅黑;background-color:#FFFFFF;\">。</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;background-color:#FFFFFF;\"></span> \r\n</p>\r\n<p>\r\n	<span style=\"color:#444444;font-weight:bold;font-size:10.5pt;font-family:微软雅黑;background-color:#FFFFFF;\">4、</span><span style=\"color:#444444;font-weight:bold;font-size:10.5pt;font-family:微软雅黑;background-color:#FFFFFF;\">幸运号码计算规则</span><span style=\"color:#444444;font-weight:bold;font-size:10.5pt;font-family:微软雅黑;background-color:#FFFFFF;\"></span> \r\n</p>\r\n<p style=\"text-indent:21pt;\">\r\n	<span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;background-color:#FFFFFF;\">A、</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;background-color:#FFFFFF;\">商品</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;background-color:#FFFFFF;\">的最后一个号码分配完毕后，将公示该分配时间点前本站全部奖品的最后100个参与时间；</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;background-color:#FFFFFF;\"></span> \r\n</p>\r\n<p style=\"text-indent:21pt;\">\r\n	<span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;background-color:#FFFFFF;\">B、</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;background-color:#FFFFFF;\">将这100个时间的数值进行求和（得出数值A）（每个时间按时、分、秒、毫秒的顺序组合，如20:15:25.362则为201525362）；</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;background-color:#FFFFFF;\"></span> \r\n</p>\r\n<p style=\"text-indent:21pt;\">\r\n	<span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;background-color:#FFFFFF;\">C、</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;background-color:#FFFFFF;\">为保证公平公正公开，系统还会等待一小段时间，取最近下一期中国福利彩票“老时时彩”的开奖结果（一个五位数值B）；</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;background-color:#FFFFFF;\"></span> \r\n</p>\r\n<p style=\"text-indent:21pt;\">\r\n	<span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;background-color:#FFFFFF;\">D、</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;background-color:#FFFFFF;\">（数值A+数值B）除以该奖品总需人次得到的余数&nbsp;+&nbsp;原始数&nbsp;10000001，得到最终幸运号码，拥有该幸运号码者，直接获得该奖品。</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;background-color:#FFFFFF;\"></span> \r\n</p>\r\n<p style=\"text-indent:21pt;\">\r\n	<span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;background-color:#FFFFFF;\">注：最后一个号码认购时间距离“老时时彩”最近下一期开奖大于24小时，默认“老时时彩”开奖结果为00000；如遇福彩中心通讯故障，无法获取“老时时彩”开奖结果，最后一个号码分配时间距离故障时间大于24小时，亦默认“老时时彩”开奖结果为00000。</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;background-color:#FFFFFF;\"></span> \r\n</p>\r\n<p>\r\n	<a target=\"_blank\" href=\"http://chart.cp.360.cn/kaijiang/ssccq\"><span style=\"color:#0000FF;font-size:10.5pt;font-family:微软雅黑;background-color:#FFFFFF;\">了解更多“老时时彩”信息</span></a><span style=\"color:#0000FF;font-size:10.5pt;font-family:微软雅黑;background-color:#FFFFFF;\"></span> \r\n</p>\r\n<p>\r\n	<span style=\"font-weight:bold;font-size:10.5000pt;font-family:\'微软雅黑\';\">5、</span><span style=\"font-weight:bold;font-size:10.5000pt;font-family:\'微软雅黑\';\">关于老时时彩</span><span style=\"font-weight:bold;font-size:10.5000pt;font-family:\'微软雅黑\';\"></span> \r\n</p>\r\n<p style=\"text-indent:21pt;\">\r\n	<span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;background-color:#FFFFFF;\">A、</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;background-color:#FFFFFF;\">“老时时彩”是由中国福彩中心发行的一种彩票，<span style=\"color:#E53333;\">1元夺宝仅取其结果作为抗干扰数据源</span>，以示公平公正公开，<span style=\"color:#E53333;\">和“老时时彩”本身没有任何关系</span>；</span><span style=\"color:#333333;font-size:10.5000pt;font-family:\'微软雅黑\';\"></span> \r\n</p>\r\n<p style=\"text-indent:21pt;\">\r\n	<span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;background-color:#FFFFFF;\">B、</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;background-color:#FFFFFF;\">“老时时彩”每天10:00-22:00-02:00进行开奖，白天72期，10分钟开奖，夜间48期，5分钟开奖，停开时间以福彩中心公布信息为准；</span><span style=\"color:#333333;font-size:10.5000pt;font-family:\'微软雅黑\';\"></span> \r\n</p>\r\n<p style=\"text-indent:21pt;\">\r\n	<span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;background-color:#FFFFFF;\">C、</span><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;background-color:#FFFFFF;\">了解更多“老时时彩”信息，</span><a href=\"#from=1ydb\"><span style=\"color:#0000FF;font-size:10.5pt;font-family:微软雅黑;background-color:#FFFFFF;\">点击这里</span></a><span style=\"color:#333333;font-size:10.5pt;font-family:微软雅黑;background-color:#FFFFFF;\">访问XXX相关页面，亦可自行至彩点查询。</span><span style=\"color:#333333;font-size:10.5000pt;font-family:\'微软雅黑\';\"></span> \r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	<br />\r\n</p>', '2924');
INSERT INTO zz_page VALUES ('47', '1', '2', 'admin', '/content/show//47', '0', '1417599258', '1464261122', '1', '竞拍常见问题', '', '', '<p style=\"text-align:justify;\">\r\n	<strong>第一条：</strong>参与XXX网络竞拍结束后，将会显示竞拍结果，可在会员中心查询。\r\n</p>\r\n<p style=\"text-align:justify;\">\r\n	<strong>第二条：</strong>竞拍失败的会员，保证金将会在竞拍结束后的1—3个工作日内解冻。解冻后的保证金将会返还给帐户，会员可以继续用于其他竞拍。\r\n</p>\r\n<p style=\"text-align:justify;\">\r\n	<strong>第三条：</strong>会员成功竞拍后，保证金将不会解冻，直接转为商品支付款，会员需要继续支付商品余额。\r\n</p>\r\n<p style=\"text-align:justify;\">\r\n	<strong>第四条：</strong>会员成功竞拍后，如果放弃继续交易，则作为违约处理，保证金将不会解冻。\r\n</p>\r\n<p style=\"text-align:justify;\">\r\n	<strong>第五条：</strong>如果二手拍卖家出现以下情况，买家可以进行申诉。\r\n</p>\r\n<p style=\"text-align:justify;\">\r\n	1、卖家提前关闭交易\r\n</p>\r\n<p style=\"text-align:justify;\">\r\n	2、卖家缺货\r\n</p>\r\n<p style=\"text-align:justify;\">\r\n	3、卖家拒绝按照拍卖价格成交\r\n</p>\r\n<p style=\"text-align:justify;\">\r\n	4、卖家自己或委托他人恶意频繁加价\r\n</p>\r\n<p style=\"text-align:justify;\">\r\n	<strong>第六条：</strong>竞拍成功者需要提供正确的收获地址，如果收获地址更换，则需要及时更改信息，以免商家发货错误。\r\n</p>\r\n<p style=\"text-align:justify;\">\r\n	<strong>第七条：</strong>竞拍商品以网站图片为主，如有多种颜色、尺寸，则应提前联系客服，确认清楚。\r\n</p>\r\n<p style=\"text-align:justify;\">\r\n	<strong>第八条：</strong>由我司发货物件一概为顺丰快递。如京东苹果官网等采购的物件，一律以其官方默认快递为准。\r\n</p>\r\n<p style=\"text-align:justify;\">\r\n	<strong>第九条：</strong>会员可在自己的物流信息察看物流状态。\r\n</p>\r\n<p style=\"text-align:justify;\">\r\n	<strong>第十条：</strong>货物已经发出，如无质量问题，概不退、换货。收到货物后，需要在网站确认收货信息\r\n</p>', '1806');
INSERT INTO zz_page VALUES ('77', '1', '2', 'admin', '/content/show//77', '0', '1418644582', '1464412693', '1', '联系我们', '', '', '<p style=\"font-size:14px;color:#555555;font-family:\'Microsoft Yahei\', Arial, Helvetica, sans-serif;background-color:#FFFFFF;\">\r\n	<span style=\"font-size:10.5pt;color:#3366CC;font-weight:bold;font-family:Arial;\">地址：</span><span style=\"font-size:10.5pt;color:#444444;font-family:Arial;\">厦门市XX区XX</span><span style=\"font-size:10.5pt;color:#444444;font-family:宋体;\">路</span><span style=\"font-size:10.5pt;color:#444444;font-family:宋体;\">XX<span>号楼</span><span>XX</span></span><span style=\"font-size:10.5pt;color:#444444;font-family:Arial;\">&nbsp;(361000)</span><span style=\"font-size:10.5pt;color:#444444;font-family:Arial;\"></span> \r\n</p>\r\n<p style=\"font-size:14px;color:#555555;font-family:\'Microsoft Yahei\', Arial, Helvetica, sans-serif;background-color:#FFFFFF;\">\r\n	<span style=\"font-size:10.5pt;color:#3366CC;font-weight:bold;font-family:Arial;\">电话：</span><span style=\"font-size:10.5pt;color:#3366CC;font-weight:bold;font-family:宋体;\">4000-xxx-xxx</span><span style=\"font-size:10.5pt;color:#3366CC;font-weight:bold;font-family:Arial;\"></span> \r\n</p>\r\n<p style=\"font-size:14px;color:#555555;font-family:\'Microsoft Yahei\', Arial, Helvetica, sans-serif;background-color:#FFFFFF;\">\r\n	<span style=\"font-size:10.5pt;color:#3366CC;font-weight:bold;font-family:Arial;\">传真：</span><span style=\"font-size:12pt;font-family:宋体;\">0592-xxxxxxx</span><span style=\"font-size:10.5pt;font-family:\'Times New Roman\';\"></span> \r\n</p>\r\n<p style=\"font-size:14px;color:#555555;font-family:\'Microsoft Yahei\', Arial, Helvetica, sans-serif;background-color:#FFFFFF;\">\r\n	<span style=\"font-size:10.5pt;color:#3366CC;font-weight:bold;font-family:Arial;\">邮箱：</span><span style=\"font-size:10.5pt;color:#3366CC;font-weight:bold;font-family:宋体;\">xxx@xxx.net</span> \r\n</p>', '3040');
INSERT INTO zz_page VALUES ('48', '1', '2', 'admin', '/content/show//48', '0', '1417599297', '1419836241', '1', '各频道上线时间', '', '', '<p>\r\n	<span style=\"font-size:10.5000pt;font-family:\'Times New Roman\';\"></span> \r\n</p>\r\n<table style=\"width:427.25pt;padding:0pt;\">\r\n	<tbody>\r\n		<tr>\r\n			<td width=\"87\" valign=\"center\" style=\"border:1.0000pt solid #000000;background:#FFFFFF;\">\r\n				<p style=\"text-align:center;\">\r\n					<span style=\"font-size:10.5pt;font-family:微软雅黑;\">频道</span><span style=\"font-size:10.5pt;font-family:微软雅黑;\"></span>\r\n				</p>\r\n			</td>\r\n			<td width=\"110\" valign=\"center\" style=\"border:1.0000pt solid #000000;background:#FFFFFF;\">\r\n				<p style=\"text-align:center;\">\r\n					<span style=\"font-size:10.5pt;font-family:微软雅黑;\">上线</span><span style=\"font-size:10.5pt;font-family:微软雅黑;\"></span>\r\n				</p>\r\n			</td>\r\n			<td width=\"127\" valign=\"center\" style=\"border:1.0000pt solid #000000;background:#FFFFFF;\">\r\n				<p style=\"text-align:center;\">\r\n					<span style=\"font-size:10.5pt;font-family:微软雅黑;\">下线</span><span style=\"font-size:10.5pt;font-family:微软雅黑;\"></span>\r\n				</p>\r\n			</td>\r\n			<td width=\"245\" valign=\"center\" style=\"border:1.0000pt solid #000000;background:#FFFFFF;\">\r\n				<p style=\"text-align:center;\">\r\n					<span style=\"font-size:10.5pt;font-family:微软雅黑;\">发货</span><span style=\"font-size:10.5pt;font-family:微软雅黑;\"></span>\r\n				</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"87\" valign=\"center\" style=\"border:1.0000pt solid #000000;background:#FFFFFF;\">\r\n				<p style=\"text-align:center;\">\r\n					<span style=\"font-size:10.5pt;font-family:微软雅黑;\">卡劵</span><span style=\"font-size:10.5pt;font-family:微软雅黑;\"></span>\r\n				</p>\r\n			</td>\r\n			<td width=\"110\" valign=\"center\" style=\"border:1.0000pt solid #000000;background:#FFFFFF;\">\r\n				<p>\r\n					<span style=\"font-size:10.5pt;font-family:微软雅黑;\">周一10:00</span><span style=\"font-size:10.5pt;font-family:微软雅黑;\"></span>\r\n				</p>\r\n			</td>\r\n			<td width=\"127\" valign=\"center\" style=\"border:1.0000pt solid #000000;background:#FFFFFF;\">\r\n				<p>\r\n					<span style=\"font-size:10.5pt;font-family:微软雅黑;\">下周二11:00</span><span style=\"font-size:10.5pt;font-family:微软雅黑;\"></span>\r\n				</p>\r\n			</td>\r\n			<td width=\"245\" valign=\"center\" style=\"border:1.0000pt solid #000000;background:#FFFFFF;\">\r\n				<p>\r\n					<span style=\"font-size:10.5pt;font-family:微软雅黑;\">付款后3-7个工作日内安排发货（工作日不包括节假日）</span><span style=\"font-size:10.5pt;font-family:微软雅黑;\"></span>\r\n				</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"87\" valign=\"center\" style=\"border:1.0000pt solid #000000;background:#FFFFFF;\">\r\n				<p style=\"text-align:center;\">\r\n					<span style=\"font-size:10.5pt;font-family:微软雅黑;\">精品</span><span style=\"font-size:10.5pt;font-family:微软雅黑;\"></span>\r\n				</p>\r\n			</td>\r\n			<td width=\"110\" valign=\"center\" style=\"border:1.0000pt solid #000000;background:#FFFFFF;\">\r\n				<p>\r\n					<span style=\"font-size:10.5pt;font-family:微软雅黑;\">周二10:00</span><span style=\"font-size:10.5pt;font-family:微软雅黑;\"></span>\r\n				</p>\r\n			</td>\r\n			<td width=\"127\" valign=\"center\" style=\"border:1.0000pt solid #000000;background:#FFFFFF;\">\r\n				<p>\r\n					<span style=\"font-size:10.5pt;font-family:微软雅黑;\">下周三11:00</span><span style=\"font-size:10.5pt;font-family:微软雅黑;\"></span>\r\n				</p>\r\n			</td>\r\n			<td width=\"245\" valign=\"center\" style=\"border:1.0000pt solid #000000;background:#FFFFFF;\">\r\n				<p>\r\n					<span style=\"font-size:10.5pt;font-family:微软雅黑;\">付款后3-7个工作日内安排发货（工作日不包括节假日）</span><span style=\"font-size:10.5pt;font-family:微软雅黑;\"></span>\r\n				</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"87\" valign=\"center\" style=\"border:1.0000pt solid #000000;background:#FFFFFF;\">\r\n				<p style=\"text-align:center;\">\r\n					<span style=\"font-size:10.5pt;font-family:微软雅黑;\">体验拍</span><span style=\"font-size:10.5pt;font-family:微软雅黑;\"></span>\r\n				</p>\r\n			</td>\r\n			<td width=\"110\" valign=\"center\" style=\"border:1.0000pt solid #000000;background:#FFFFFF;\">\r\n				<p>\r\n					<span style=\"font-size:10.5pt;font-family:微软雅黑;\">周三10:00</span><span style=\"font-size:10.5pt;font-family:微软雅黑;\"></span>\r\n				</p>\r\n			</td>\r\n			<td width=\"127\" valign=\"center\" style=\"border:1.0000pt solid #000000;background:#FFFFFF;\">\r\n				<p>\r\n					<span style=\"font-size:10.5pt;font-family:微软雅黑;\">下周四11:00</span><span style=\"font-size:10.5pt;font-family:微软雅黑;\"></span>\r\n				</p>\r\n			</td>\r\n			<td width=\"245\" valign=\"center\" style=\"border:1.0000pt solid #000000;background:#FFFFFF;\">\r\n				<p>\r\n					<span style=\"font-size:10.5pt;font-family:微软雅黑;\">竞拍结束后3-7个工作日内安排发货（工作日不包括节假日）</span><span style=\"font-size:10.5pt;font-family:微软雅黑;\"></span>\r\n				</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n<br />\r\n<br />', '1541');
INSERT INTO zz_page VALUES ('73', '1', '2', 'admin', '/content/show//73', '0', '1417599633', '1468222659', '1', '退换货政策', '', '', '<p class=\\\"p16\\\" style=\\\"background:#FFFFFF;\\\">\r\n	<span style=\\\"font-weight:bold;font-size:10.5pt;font-family:微软雅黑;\\\"> </span>\r\n</p>\r\n<p style=\\\"background:#FFFFFF;\\\">\r\n	<span style=\\\"color:#444444;font-size:10.5pt;font-family:微软雅黑;\\\">货物一经发出，如无质量问题，概不退、换货。</span>\r\n</p>\r\n<p class=\\\"p16\\\" style=\\\"background:#FFFFFF;\\\">\r\n	<span style=\\\"color:#444444;font-size:10.5pt;font-family:微软雅黑;\\\"></span><span style=\\\"color:#444444;font-size:10.5pt;font-family:微软雅黑;\\\"></span> \r\n</p>', '1490');
INSERT INTO zz_page VALUES ('74', '1', '2', 'admin', '/content/show//74', '0', '1417599668', '1419501623', '1', '发货时间', '', '', '<p class=\"p17\" style=\"margin-top:0pt;margin-bottom:0pt;padding:0pt 0pt 0pt 0pt;text-autospace:ideograph-other;text-align:justify;line-height:24.0000pt;vertical-align:;background:#FFFFFF;\">\r\n	<span style=\"color:#808080;letter-spacing:0pt;font-weight:bold;font-size:10.5pt;font-family:微软雅黑;background-position:initial initial;background-repeat:initial initial;\"> </span> \r\n</p>\r\n<p class=\"p15\" style=\"margin-top:0pt;margin-bottom:0pt;padding:0pt 0pt 0pt 0pt;text-autospace:ideograph-other;text-align:justify;line-height:24.0000pt;vertical-align:;background:#FFFFFF;\">\r\n	<span style=\"color:#444444;font-family:Tahoma, Helvetica, SimSun, sans-serif;font-size:14px;line-height:21px;white-space:normal;background-color:#FFFFFF;\"><span style=\"font-family:Microsoft YaHei;\"> </span></span>\r\n</p>\r\n<p>\r\n	<span style=\"font-family:\'Microsoft YaHei\';\">发货时间：</span><span style=\"font-family:\'Microsoft YaHei\';\">每</span><span style=\"font-family:\'Microsoft YaHei\';\">周五、下周二下午发货</span><span style=\"font-family:微软雅黑;\"></span> \r\n</p>\r\n<p>\r\n	<span style=\"font-family:\'Microsoft YaHei\';\">1、周一至周三提交的订单，周四上午开始统计，周五下午发货</span><span style=\"font-family:微软雅黑;\"></span> \r\n</p>\r\n<p>\r\n	<span style=\"font-family:\'Microsoft YaHei\';\">2、周四至周日提交的订单，下周一上午开始统计，下周二下午发货</span>\r\n</p>\r\n<p>\r\n	<span style=\"line-height:1.5;font-family:\'Microsoft YaHei\';\">对本次更改如有任何疑问，请于工作时间内通过QQ客服</span><span style=\"line-height:1.5;font-family:\'Microsoft YaHei\';\">(Q号：2634687978)，或者拨打客服热线：400-0901-225 ，进行咨询。</span>\r\n</p>\r\n<p>\r\n</p>\r\n<p class=\"p15\" style=\"margin-top:0pt;margin-bottom:0pt;padding:0pt 0pt 0pt 0pt;text-autospace:ideograph-other;text-align:justify;line-height:24.0000pt;vertical-align:;background:#FFFFFF;\">\r\n	<span style=\"color:#444444;font-family:Tahoma, Helvetica, SimSun, sans-serif;font-size:14px;line-height:21px;white-space:normal;background-color:#FFFFFF;\"><span style=\"color:#444444;font-family:\'Microsoft YaHei\';font-size:14px;line-height:21px;text-align:justify;white-space:normal;background-color:#FFFFFF;\"></span><span style=\"color:#444444;font-family:\'Microsoft YaHei\';font-size:14px;line-height:21px;text-align:justify;white-space:normal;background-color:#FFFFFF;\"></span><span style=\"font-family:Microsoft YaHei;\"></span></span> \r\n</p>\r\n<p class=\"p15\" style=\"margin-top:0pt;margin-bottom:0pt;padding:0pt 0pt 0pt 0pt;text-autospace:ideograph-other;text-align:justify;line-height:24.0000pt;vertical-align:;background:#FFFFFF;\">\r\n	<br />\r\n</p>\r\n<p class=\"p15\" style=\"margin-top:0pt;margin-bottom:0pt;padding:0pt 0pt 0pt 0pt;text-autospace:ideograph-other;text-align:justify;line-height:24.0000pt;vertical-align:;background:#FFFFFF;\">\r\n	<br />\r\n</p>\r\n<p>\r\n	<br style=\"word-wrap:break-word;color:#444444;font-family:Tahoma, Helvetica, SimSun, sans-serif;font-size:14px;line-height:21px;white-space:normal;background-color:#FFFFFF;\" />\r\n<span style=\"color:#444444;font-family:Tahoma, Helvetica, SimSun, sans-serif;font-size:14px;line-height:21px;white-space:normal;background-color:#FFFFFF;\">&nbsp; &nbsp;</span><br style=\"word-wrap:break-word;color:#444444;font-family:Tahoma, Helvetica, SimSun, sans-serif;font-size:14px;line-height:21px;white-space:normal;background-color:#FFFFFF;\" />\r\n<span style=\"color:#444444;font-family:Tahoma, Helvetica, SimSun, sans-serif;font-size:14px;line-height:21px;white-space:normal;background-color:#FFFFFF;\">&nbsp; &nbsp;</span> \r\n</p>\r\n<p class=\"p17\" style=\"margin-top:0pt;margin-bottom:0pt;padding:0pt 0pt 0pt 0pt;text-autospace:ideograph-other;text-align:justify;line-height:24.0000pt;vertical-align:;background:#FFFFFF;\">\r\n	<span style=\"color:#808080;letter-spacing:0pt;font-size:10.5pt;font-family:微软雅黑;background-position:initial initial;background-repeat:initial initial;\"></span><span style=\"color:#808080;letter-spacing:0pt;font-size:10.5pt;font-family:微软雅黑;\"><o:p></o:p></span> \r\n</p>', '1499');
INSERT INTO zz_page VALUES ('80', '1', '1', 'lnest_admin', '', '0', '1432287386', '1432287386', '1', '官方交流群', '', '', '', '272');
INSERT INTO zz_page VALUES ('86', '1', '43', 'tim', '/content/show//86', '0', '1460363522', '1460363611', '1', '新手测试', '', '', '<p>\r\n	车阿萨德阿萨德的阿萨德按时按时阿萨德阿萨德\r\n</p>\r\n<p>\r\n	<img src=\"/upload/edit/image/20160411/20160411163329_95512.jpg\" alt=\"\" />\r\n</p>', '2');
INSERT INTO zz_page VALUES ('87', '1', '43', 'tim', '', '0', '1460363681', '1460363681', '1', '擦擦市场按时擦拭啥的', '', '', '', '2');
INSERT INTO zz_page VALUES ('88', '1', '43', 'tim', '/content/show//88', '0', '1460363782', '1460363817', '1', '测试', '', '', '大声道阿萨德阿萨德阿大声道阿萨德', '33');
INSERT INTO zz_page VALUES ('89', '1', '43', 'tim', '/content/show//89', '0', '1460364350', '1460364572', '1', '测试栏目', '', '', '<div style=\"text-align:center;\">\r\n	<span style=\"line-height:1.5;\"></span><img src=\"/upload/edit/image/20160411/20160411164859_38896.jpg\" alt=\"\" /><span style=\"line-height:1.5;\">测试栏目测试栏目测试栏目</span>\r\n</div>', '8');

-- ----------------------------
-- Table structure for `zz_payment`
-- ----------------------------
DROP TABLE IF EXISTS `zz_payment`;
CREATE TABLE `zz_payment` (
  `pay_id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `pay_code` varchar(20) NOT NULL DEFAULT '',
  `pay_name` varchar(120) NOT NULL DEFAULT '',
  `pay_fee` varchar(10) NOT NULL DEFAULT '0',
  `pay_desc` text NOT NULL,
  `pay_order` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `pay_config` text NOT NULL,
  `enabled` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `is_cod` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `is_online` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `thumb` varchar(200) NOT NULL DEFAULT '',
  PRIMARY KEY (`pay_id`),
  UNIQUE KEY `pay_code` (`pay_code`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of zz_payment
-- ----------------------------
INSERT INTO zz_payment VALUES ('1', 'alipay', '支付宝', '0', '国内先进的网上支付平台。三种支付接口：担保交易，即时到账，双接口。在线即可开通，零预付，免年费，单笔阶梯费率，无流量限制。', '2', 'a:4:{i:0;a:3:{s:4:\"name\";s:14:\"alipay_account\";s:4:\"type\";s:4:\"text\";s:5:\"value\";s:0:\"\";}i:1;a:3:{s:4:\"name\";s:10:\"alipay_key\";s:4:\"type\";s:4:\"text\";s:5:\"value\";s:0:\"\";}i:2;a:3:{s:4:\"name\";s:14:\"alipay_partner\";s:4:\"type\";s:4:\"text\";s:5:\"value\";s:0:\"\";}i:3;a:3:{s:4:\"name\";s:17:\"alipay_pay_method\";s:4:\"type\";s:6:\"select\";s:5:\"value\";s:1:\"0\";}}', '1', '0', '1', '');
INSERT INTO zz_payment VALUES ('2', 'balance', '余额支付', '0', '使用帐户余额支付。只有会员才能使用，通过设置信用额度，可以透支。', '2', 'a:0:{}', '1', '0', '1', '');
INSERT INTO zz_payment VALUES ('3', 'bank', '银行汇款/转帐', '0', '银行名称\r\n收款人信息：全称 ××× ；帐号或地址 ××× ；开户行 ×××。\r\n注意事项：办理电汇时，请在电汇单“汇款用途”一栏处注明您的订单号。', '0', 'a:0:{}', '0', '0', '0', '');
INSERT INTO zz_payment VALUES ('4', 'cod', '货到付款', '0', '开通城市：×××\r\n货到付款区域：×××', '0', 'a:0:{}', '0', '1', '0', '');
INSERT INTO zz_payment VALUES ('5', 'chinabank', '网银在线', '1%', '网银在线（www.chinabank.com.cn）与中国工商银行、招商银行、中国建设银行、农业银行、民生银行等数十家金融机构达成协议。全面支持全国19家银行的信用卡及借记卡实现网上支付。<br><a href=\"http://cloud.ecshop.com/payment_apply.php?mod=chinabank\" target=\"_blank\">立即在线申请</a>', '1', 'a:2:{i:0;a:3:{s:4:\"name\";s:17:\"chinabank_account\";s:4:\"type\";s:4:\"text\";s:5:\"value\";s:0:\"\";}i:1;a:3:{s:4:\"name\";s:13:\"chinabank_key\";s:4:\"type\";s:4:\"text\";s:5:\"value\";s:0:\"\";}}', '0', '0', '1', '');
INSERT INTO zz_payment VALUES ('7', 'kuaiqian', '快钱', '0', '快钱是国内领先的独立第三方支付企业，旨在为各类企业及个人提供安全、便捷和保密的支付清算与账务服务，其推出的支付产品包括但不限于人民币支付，外卡支付，神州行卡支付，联通充值卡支付，VPOS支付等众多支付产品, 支持互联网、手机、电话和POS等多种终端, 以满足各类企业和个人的不同支付需求。截至2009年6月30日，快钱已拥有4100万注册用户和逾31万商业合作伙伴，并荣获中国信息安全产品测评认证中心颁发的“支付清算系统安全技术保障级一级”认证证书和国际PCI安全认证。', '3', 'a:2:{i:0;a:3:{s:4:\"name\";s:10:\"kq_account\";s:4:\"type\";s:4:\"text\";s:5:\"value\";s:0:\"\";}i:1;a:3:{s:4:\"name\";s:6:\"kq_key\";s:4:\"type\";s:4:\"text\";s:5:\"value\";s:0:\"\";}}', '0', '0', '1', '');
INSERT INTO zz_payment VALUES ('6', 'yeepay', '易宝支付', '0', 'YeePay易宝（北京通融通信息技术有限公司）是专业从事多元化电子支付业务一站式服务的领跑者。在立足于网上支付的同时，YeePay易宝不断创新，将互联网、手机、固定电话整合在一个平台上，继短信支付、手机充值之后，首家推出了YeePay易宝电话支付业务，真正实现了离线支付，为更多传统行业搭建了电子支付的高速公路。YeePay易宝融合世界先进的电子支付文化，聚合众多金融、电信、IT、互联网等领域内的巨擘，旨在通过创新的支付机制，推动中国电子商务新进程。YeePay易宝致力于成为世界一流的电子支付应用和服务提供商，专注于金融增值服务和移动增值服务两大领域，创新并推广多元化、低成本的、安全有效的支付服务。', '0', 'a:0:{}', '0', '0', '1', '[{\"path\":\"\\/upload\\/images\\/gallery\\/j\\/2\\/687_src.jpg\",\"title\":\"\\u6613\\u5b9d\\u652f\\u4ed8Logo\"}]');
INSERT INTO zz_payment VALUES ('8', 'wxpay', '微信端支付', '0', '微信支付', '5', 'a:4:{i:0;a:3:{s:4:\"name\";s:12:\"wxpay_app_id\";s:4:\"type\";s:4:\"text\";s:5:\"value\";s:8:\"23423423\";}i:1;a:3:{s:4:\"name\";s:16:\"wxpay_app_secret\";s:4:\"type\";s:4:\"text\";s:5:\"value\";s:7:\"4234234\";}i:2;a:3:{s:4:\"name\";s:11:\"wxpay_mchid\";s:4:\"type\";s:4:\"text\";s:5:\"value\";s:7:\"2342342\";}i:3;a:3:{s:4:\"name\";s:9:\"wxpay_key\";s:4:\"type\";s:4:\"text\";s:5:\"value\";s:8:\"34234234\";}}', '1', '0', '1', '');
INSERT INTO zz_payment VALUES ('13', 'wxpayapp', '微信APP支付', '0', 'APP支付接口 <a target=\"_blank\" href=\"https://open.weixin.qq.com/cgi-bin/frame?t=home/app_tmpl&lang=zh_CN\">立即申请</a>', '0', 'a:4:{i:0;a:3:{s:4:\"name\";s:12:\"wxpay_app_id\";s:4:\"type\";s:4:\"text\";s:5:\"value\";s:16:\"1452769073427481\";}i:1;a:3:{s:4:\"name\";s:16:\"wxpay_app_secret\";s:4:\"type\";s:4:\"text\";s:5:\"value\";s:16:\"1452769073427481\";}i:2;a:3:{s:4:\"name\";s:11:\"wxpay_mchid\";s:4:\"type\";s:4:\"text\";s:5:\"value\";s:16:\"1452769073427481\";}i:3;a:3:{s:4:\"name\";s:9:\"wxpay_key\";s:4:\"type\";s:4:\"text\";s:5:\"value\";s:16:\"1452769073427481\";}}', '0', '1', '1', '');
INSERT INTO zz_payment VALUES ('12', 'ipaynow', '现在支付', '0', 'APP支付接口', '0', 'a:2:{i:0;a:3:{s:4:\"name\";s:6:\"app_id\";s:4:\"type\";s:4:\"text\";s:5:\"value\";s:16:\"1452769073427481\";}i:1;a:3:{s:4:\"name\";s:10:\"secure_key\";s:4:\"type\";s:4:\"text\";s:5:\"value\";s:32:\"vhHhXW6EiwZR4TldzktBIKpGXLmRMWUv\";}}', '0', '1', '1', '');
INSERT INTO zz_payment VALUES ('10', 'tenpay', '财付通', '0', '财付通（即时到帐接口） - 腾讯旗下在线支付平台，通过国家权威安全认证，支持各大银行网上支付，免支付手续费。', '4', 'a:3:{i:0;a:3:{s:4:\"name\";s:14:\"tenpay_account\";s:4:\"type\";s:4:\"text\";s:5:\"value\";s:0:\"\";}i:1;a:3:{s:4:\"name\";s:10:\"tenpay_key\";s:4:\"type\";s:4:\"text\";s:5:\"value\";s:0:\"\";}i:2;a:3:{s:4:\"name\";s:12:\"magic_string\";s:4:\"type\";s:4:\"text\";s:5:\"value\";s:0:\"\";}}', '0', '0', '1', '');
INSERT INTO zz_payment VALUES ('11', 'yunpay', '云支付（支付宝）', '0', '云支付网站(www.i2e.cn) 是国内先进的网上代收款平台。<br/>云支付收款接口：在线即可开通，<font color=\"red\"><b>集成了如 支付宝、网银、微信支付等</b></font>，即时到账，费率低，个人也可申请。<br/><a href=\"http://i2e.cn/yunpay.php\" target=\"_blank\"><font color=\"red\">立即在线申请</font></a>', '0', 'a:3:{i:0;a:3:{s:4:\"name\";s:14:\"yunpay_partner\";s:4:\"type\";s:4:\"text\";s:5:\"value\";s:4:\"3253\";}i:1;a:3:{s:4:\"name\";s:10:\"yunpay_key\";s:4:\"type\";s:4:\"text\";s:5:\"value\";s:8:\"45345345\";}i:2;a:3:{s:4:\"name\";s:12:\"seller_email\";s:4:\"type\";s:4:\"text\";s:5:\"value\";s:9:\"345345345\";}}', '0', '0', '1', '');

-- ----------------------------
-- Table structure for `zz_pay_log`
-- ----------------------------
DROP TABLE IF EXISTS `zz_pay_log`;
CREATE TABLE `zz_pay_log` (
  `log_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `order_amount` decimal(10,2) unsigned NOT NULL,
  `order_type` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '支付类型:0订单1预存款2夺宝',
  `is_paid` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `order_no` varchar(45) DEFAULT NULL COMMENT '支付接口订单号，以便查询',
  PRIMARY KEY (`log_id`)
) ENGINE=MyISAM AUTO_INCREMENT=295 DEFAULT CHARSET=utf8 ROW_FORMAT=FIXED;

-- ----------------------------
-- Records of zz_pay_log
-- ----------------------------

-- ----------------------------
-- Table structure for `zz_plate_log`
-- ----------------------------
DROP TABLE IF EXISTS `zz_plate_log`;
CREATE TABLE `zz_plate_log` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `mid` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '获得的币类型',
  `username` varchar(255) DEFAULT NULL COMMENT '用户名',
  `cond` tinyint(1) unsigned DEFAULT NULL COMMENT '抽奖条件（1消费人次 2扣除拍币）',
  `cond_number` int(10) unsigned DEFAULT '0' COMMENT '扣除的消费记录金额、扣除拍币 数量',
  `star` tinyint(2) unsigned DEFAULT '0' COMMENT '几等奖',
  `star_type` tinyint(2) DEFAULT '0' COMMENT '获得的币类型 ',
  `star_number` int(10) DEFAULT '0' COMMENT '获得的币数量',
  `desc` varchar(255) DEFAULT NULL COMMENT '日志',
  `c_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`) USING BTREE,
  KEY `mid` (`mid`),
  KEY `cond_mid` (`cond`,`mid`)
) ENGINE=MyISAM AUTO_INCREMENT=117 DEFAULT CHARSET=utf8 ROW_FORMAT=FIXED;

-- ----------------------------
-- Records of zz_plate_log
-- ----------------------------

-- ----------------------------
-- Table structure for `zz_posid`
-- ----------------------------
DROP TABLE IF EXISTS `zz_posid`;
CREATE TABLE `zz_posid` (
  `id` tinyint(2) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(40) NOT NULL DEFAULT '',
  `listorder` tinyint(2) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of zz_posid
-- ----------------------------
INSERT INTO zz_posid VALUES ('1', '首页推荐', '0');
INSERT INTO zz_posid VALUES ('3', '最新推荐', '0');

-- ----------------------------
-- Table structure for `zz_rec`
-- ----------------------------
DROP TABLE IF EXISTS `zz_rec`;
CREATE TABLE `zz_rec` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `userid` int(8) unsigned NOT NULL DEFAULT '0',
  `username` varchar(40) NOT NULL DEFAULT '',
  `url` varchar(60) NOT NULL DEFAULT '',
  `listorder` int(10) unsigned NOT NULL DEFAULT '0',
  `createtime` int(11) unsigned NOT NULL DEFAULT '0',
  `updatetime` int(11) unsigned NOT NULL DEFAULT '0',
  `lang` tinyint(2) unsigned NOT NULL DEFAULT '0',
  `title` text NOT NULL,
  `thumb` mediumtext NOT NULL,
  `type` varchar(255) NOT NULL DEFAULT '',
  `recid` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of zz_rec
-- ----------------------------

-- ----------------------------
-- Table structure for `zz_search`
-- ----------------------------
DROP TABLE IF EXISTS `zz_search`;
CREATE TABLE `zz_search` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `word` varchar(255) NOT NULL COMMENT '搜索词',
  `qty` int(11) NOT NULL DEFAULT '0' COMMENT '搜索次数',
  `last_time` int(11) NOT NULL COMMENT '最后搜索时间',
  `start_time` int(11) NOT NULL COMMENT '第一次搜索时间',
  `ips` text NOT NULL COMMENT '统计所有IP',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=81 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of zz_search
-- ----------------------------

-- ----------------------------
-- Table structure for `zz_send`
-- ----------------------------
DROP TABLE IF EXISTS `zz_send`;
CREATE TABLE `zz_send` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `mid` int(11) NOT NULL DEFAULT '0' COMMENT '会员ID',
  `content` text NOT NULL,
  `type` varchar(20) NOT NULL COMMENT '队列类型：短信 邮件',
  `template_code` varchar(30) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '1发送完成',
  `add_time` int(11) NOT NULL,
  `send_time` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of zz_send
-- ----------------------------

-- ----------------------------
-- Table structure for `zz_share`
-- ----------------------------
DROP TABLE IF EXISTS `zz_share`;
CREATE TABLE `zz_share` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL COMMENT '标题',
  `content` text NOT NULL COMMENT '内容',
  `thumb` varchar(255) NOT NULL COMMENT '缩略图',
  `thumbs` text NOT NULL COMMENT '多图',
  `order_id` int(11) NOT NULL COMMENT '订单ID',
  `extension_code` smallint(3) DEFAULT NULL,
  `obj_name` varchar(60) DEFAULT NULL COMMENT '晒单对象名称',
  `obj_id` int(11) DEFAULT NULL COMMENT '晒单对象ID',
  `qishu` smallint(6) NOT NULL COMMENT '期数',
  `comment` int(6) NOT NULL DEFAULT '0' COMMENT '评论',
  `ding` int(6) NOT NULL DEFAULT '0' COMMENT '顶',
  `luck_code` char(8) DEFAULT NULL COMMENT '中奖号',
  `mid` int(11) NOT NULL COMMENT '用户ID',
  `username` varchar(60) NOT NULL COMMENT '用户名',
  `db_points` int(6) NOT NULL DEFAULT '0' COMMENT '奖励夺宝币',
  `is_rec` smallint(3) NOT NULL DEFAULT '0' COMMENT '是否推荐',
  `addtime` int(10) NOT NULL,
  `is_show` tinyint(1) DEFAULT '1',
  `listorder` mediumint(8) DEFAULT '0',
  `goods_id` int(11) NOT NULL DEFAULT '0',
  `is_points` tinyint(1) DEFAULT '0' COMMENT '是否审核过',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of zz_share
-- ----------------------------

-- ----------------------------
-- Table structure for `zz_sharecode`
-- ----------------------------
DROP TABLE IF EXISTS `zz_sharecode`;
CREATE TABLE `zz_sharecode` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` char(5) NOT NULL COMMENT '分享码',
  `mid` int(11) NOT NULL COMMENT '所属用户ID',
  `username` varchar(60) NOT NULL COMMENT '所属用户名',
  `value` decimal(10,0) NOT NULL COMMENT '价值',
  `add_time` int(10) NOT NULL COMMENT '添加时间',
  `allow_time` smallint(6) NOT NULL COMMENT '允许使用次数',
  `used_time` smallint(6) NOT NULL COMMENT '使用次数',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of zz_sharecode
-- ----------------------------

-- ----------------------------
-- Table structure for `zz_signin`
-- ----------------------------
DROP TABLE IF EXISTS `zz_signin`;
CREATE TABLE `zz_signin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mid` int(11) NOT NULL,
  `username` varchar(60) NOT NULL,
  `points` smallint(6) NOT NULL COMMENT '奖励积分',
  `addtime` int(10) NOT NULL COMMENT '签到时间',
  `ip` varchar(30) DEFAULT NULL,
  `times` int(8) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=98 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of zz_signin
-- ----------------------------

-- ----------------------------
-- Table structure for `zz_sms`
-- ----------------------------
DROP TABLE IF EXISTS `zz_sms`;
CREATE TABLE `zz_sms` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `mobile` varchar(20) DEFAULT NULL,
  `content` text,
  `send_time` int(11) DEFAULT NULL,
  `tpl` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=110 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of zz_sms
-- ----------------------------

-- ----------------------------
-- Table structure for `zz_statistic_view_browser`
-- ----------------------------
DROP TABLE IF EXISTS `zz_statistic_view_browser`;
CREATE TABLE `zz_statistic_view_browser` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `num` int(11) DEFAULT '1' COMMENT '访问次数',
  `browser` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '浏览器类型',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of zz_statistic_view_browser
-- ----------------------------

-- ----------------------------
-- Table structure for `zz_statistic_view_city`
-- ----------------------------
DROP TABLE IF EXISTS `zz_statistic_view_city`;
CREATE TABLE `zz_statistic_view_city` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `city` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `num` int(11) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of zz_statistic_view_city
-- ----------------------------

-- ----------------------------
-- Table structure for `zz_statistic_view_info`
-- ----------------------------
DROP TABLE IF EXISTS `zz_statistic_view_info`;
CREATE TABLE `zz_statistic_view_info` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `date` date DEFAULT NULL,
  `view_num` int(11) DEFAULT '1' COMMENT '每日访问次数',
  `ip_num` int(11) DEFAULT '1' COMMENT '每日访问ip数',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of zz_statistic_view_info
-- ----------------------------

-- ----------------------------
-- Table structure for `zz_statistic_view_log`
-- ----------------------------
DROP TABLE IF EXISTS `zz_statistic_view_log`;
CREATE TABLE `zz_statistic_view_log` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `browser` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `platform` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `version` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `province` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_mobile` tinyint(2) DEFAULT '0',
  `is_robot` tinyint(2) DEFAULT '0',
  `date` date DEFAULT NULL,
  `c_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of zz_statistic_view_log
-- ----------------------------

-- ----------------------------
-- Table structure for `zz_statistic_view_platform`
-- ----------------------------
DROP TABLE IF EXISTS `zz_statistic_view_platform`;
CREATE TABLE `zz_statistic_view_platform` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `platform` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `num` int(11) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of zz_statistic_view_platform
-- ----------------------------

-- ----------------------------
-- Table structure for `zz_templates`
-- ----------------------------
DROP TABLE IF EXISTS `zz_templates`;
CREATE TABLE `zz_templates` (
  `template_id` tinyint(1) unsigned NOT NULL AUTO_INCREMENT,
  `template_code` varchar(30) NOT NULL DEFAULT '',
  `template_subject` varchar(200) NOT NULL DEFAULT '',
  `template_content` text NOT NULL,
  `last_modify` int(10) unsigned NOT NULL DEFAULT '0',
  `last_send` int(10) unsigned NOT NULL DEFAULT '0',
  `send_number` int(10) DEFAULT '0' COMMENT '发送次数',
  `type` varchar(10) NOT NULL,
  `status` tinyint(1) DEFAULT '1',
  `is_system` tinyint(1) NOT NULL DEFAULT '0' COMMENT '1系统模板，不可删除',
  PRIMARY KEY (`template_id`),
  UNIQUE KEY `template_code` (`template_code`),
  KEY `type` (`type`)
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of zz_templates
-- ----------------------------
INSERT INTO zz_templates VALUES ('1', 'send_password', '密码找回', '{$user_name}您好！<br><br>\r\n\r\n您已经进行了密码重置的操作，请点击以下链接(或者复制到您的浏览器):<br>\r\n<a href=\"{$reset_email}\" target=\"_blank\">{$reset_email}</a><br><br>\r\n\r\n以确认您的新密码重置操作！<br><br>\r\n\r\n{$shop_name}<br>\r\n{$send_date}', '1453878710', '1425909372', '57', 'mail', '1', '1');
INSERT INTO zz_templates VALUES ('16', 'sms_rand', '竞拍随机码短信', '亲：{$username}，您的竞拍首次出价的随机码是：{$cod}。', '1457078368', '1415174019', '15', 'sms', '0', '1');
INSERT INTO zz_templates VALUES ('8', 'register_validate', '邮件验证', '{$user_name}您好！<br><br>\r\n\r\n这封邮件是 {$shop_name} 发送的。你收到这封邮件是为了验证你注册邮件地址是否有效。如果您已经通过验证了，请忽略这封邮件。<br>\r\n请点击以下链接(或者复制到您的浏览器)来验证你的邮件地址:<br>\r\n<a href=\"{$validate_email}\" target=\"_blank\">{$validate_email}</a><br><br>\r\n\r\n{$site_config.site_name}<br>\r\n{$send_date}', '1453878708', '1453702244', '3687', 'mail', '1', '1');
INSERT INTO zz_templates VALUES ('15', 'sms_register', '短信验证码', '您的验证码是：{$verify_code}。请不要把验证码泄露给其他人。', '1464081042', '1456731206', '13238', 'sms', '1', '1');
INSERT INTO zz_templates VALUES ('17', 'sms_cod', '中奖短信', '亲 {$username}，你已获得领取商品资格，请登陆我们的官网！领取后3至7个工作日发货！收到货，即时晒单，即可获得1至5个夺宝币！', '1457078365', '1452132201', '541', 'sms', '1', '1');
INSERT INTO zz_templates VALUES ('18', 'sms_chpaypass', '修改支付密码验证', '您的验证码是：{$verify_code}。请不要把验证码泄露给其他人。', '1464081028', '1426384247', '64', 'sms', '1', '1');
INSERT INTO zz_templates VALUES ('19', 'mail_cod', '中奖通知', '恭喜获奖！{$username}，获奖商品：{$goodsname}；请登陆我们的官网领取！领取后3-7个工作日内发货！有任何问题可致电{$site_config.tel}咨询客服！欢迎你来，拍你所想，拍你所爱。', '1453878705', '1426493645', '199', 'mail', '1', '1');
INSERT INTO zz_templates VALUES ('20', 'sms_bankcard', '绑定银行卡验证', '您的验证码是：{$verify_code}。请不要把验证码泄露给其他人。', '1464081022', '1426484724', '26', 'sms', '1', '1');
INSERT INTO zz_templates VALUES ('27', 'sms_password', '密码找回', '您的验证码是：{$verify_code}。请不要把验证码泄露给其他人。', '1464081018', '1456362490', '4', 'sms', '1', '1');
INSERT INTO zz_templates VALUES ('26', 'sms_verifymobile', '绑定手机号验证', '您的验证码是：{$verify_code}。请不要把验证码泄露给其他人。', '1464081069', '1449035872', '2', 'sms', '1', '1');
INSERT INTO zz_templates VALUES ('28', 'sms_manage', '后台登陆验证', '您的动态码是：{$verify_code}。请不要把动态码泄露给其他人。', '0', '0', '0', 'sms', '1', '1');

-- ----------------------------
-- Table structure for `zz_usecode_log`
-- ----------------------------
DROP TABLE IF EXISTS `zz_usecode_log`;
CREATE TABLE `zz_usecode_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sid` int(11) NOT NULL DEFAULT '0' COMMENT '分享码ID',
  `order_id` int(11) NOT NULL DEFAULT '0' COMMENT '订单ID',
  `order_sn` varchar(60) NOT NULL COMMENT '订单号',
  `mid` int(11) NOT NULL DEFAULT '0' COMMENT '使用者ID',
  `username` varchar(60) NOT NULL,
  `use_time` int(10) NOT NULL COMMENT '使用时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of zz_usecode_log
-- ----------------------------

-- ----------------------------
-- Table structure for `zz_verify_code`
-- ----------------------------
DROP TABLE IF EXISTS `zz_verify_code`;
CREATE TABLE `zz_verify_code` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `mobile` varchar(12) NOT NULL,
  `getip` varchar(15) NOT NULL,
  `verifycode` varchar(10) NOT NULL,
  `dateline` int(10) unsigned NOT NULL DEFAULT '0',
  `reguid` mediumint(8) unsigned DEFAULT '0',
  `regdateline` int(10) unsigned DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=88 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of zz_verify_code
-- ----------------------------

-- ----------------------------
-- Table structure for `zz_verify_idcard`
-- ----------------------------
DROP TABLE IF EXISTS `zz_verify_idcard`;
CREATE TABLE `zz_verify_idcard` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mid` int(11) DEFAULT NULL,
  `username` varchar(60) DEFAULT NULL,
  `realname` varchar(12) DEFAULT NULL,
  `card` varchar(60) DEFAULT NULL COMMENT '身份证号',
  `card_image` varchar(225) DEFAULT NULL,
  `card_image2` varchar(225) DEFAULT NULL COMMENT '身份证背面照',
  `status` smallint(3) DEFAULT '1' COMMENT '状态:1待审核2已通过3未通过',
  `remark` text COMMENT '备注',
  `add_time` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of zz_verify_idcard
-- ----------------------------

-- ----------------------------
-- Table structure for `zz_voice`
-- ----------------------------
DROP TABLE IF EXISTS `zz_voice`;
CREATE TABLE `zz_voice` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `mobile` varchar(20) DEFAULT NULL,
  `content` text,
  `send_time` int(11) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL,
  `verifycode` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `mobile` (`mobile`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of zz_voice
-- ----------------------------

-- ----------------------------
-- Table structure for `zz_withdraw_commission`
-- ----------------------------
DROP TABLE IF EXISTS `zz_withdraw_commission`;
CREATE TABLE `zz_withdraw_commission` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mid` int(11) NOT NULL,
  `username` varchar(60) NOT NULL,
  `bankname` varchar(60) NOT NULL COMMENT '提现银行',
  `bankcard` varchar(60) NOT NULL COMMENT '提现账户',
  `commission` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '佣金总额',
  `amount` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '提现总额',
  `fee` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '手续费',
  `sales_tax` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '营业税',
  `income_tax` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '所得税',
  `addtime` int(10) NOT NULL COMMENT '添加时间',
  `status` smallint(3) NOT NULL COMMENT '状态:1待处理2处理中3已处理',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of zz_withdraw_commission
-- ----------------------------

-- ----------------------------
-- Table structure for `zz_wx_autoreply_keyword`
-- ----------------------------
DROP TABLE IF EXISTS `zz_wx_autoreply_keyword`;
CREATE TABLE `zz_wx_autoreply_keyword` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rule_id` int(11) DEFAULT NULL,
  `keyword` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `match` tinyint(2) DEFAULT '0' COMMENT '1完全匹配,0模糊匹配',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of zz_wx_autoreply_keyword
-- ----------------------------
INSERT INTO zz_wx_autoreply_keyword VALUES ('1', '3', '1', '0');

-- ----------------------------
-- Table structure for `zz_wx_autoreply_rule`
-- ----------------------------
DROP TABLE IF EXISTS `zz_wx_autoreply_rule`;
CREATE TABLE `zz_wx_autoreply_rule` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `company` int(11) DEFAULT NULL,
  `name` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `rule_type` enum('subscribe','autoreply','normal') COLLATE utf8_unicode_ci DEFAULT NULL,
  `keywords` varchar(200) COLLATE utf8_unicode_ci DEFAULT '',
  `reply_list` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `msg_count` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `c_time` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of zz_wx_autoreply_rule
-- ----------------------------
INSERT INTO zz_wx_autoreply_rule VALUES ('1', '0', 'subscribe', 'subscribe', '', '{\"msg_type\":\"text\",\"msg_id\":8}', '{\"news\":0,\"text\":1,\"wheel\":0,\"image\":0}', '1410492083');
INSERT INTO zz_wx_autoreply_rule VALUES ('2', '0', 'subscribe', 'autoreply', '', null, null, '1410492085');
INSERT INTO zz_wx_autoreply_rule VALUES ('3', '0', 'test', 'normal', '1', '[{\"msg_type\":\"news\",\"msg_id\":\"1\"}]', '{\"news\":1,\"text\":0,\"wheel\":0,\"image\":0}', null);

-- ----------------------------
-- Table structure for `zz_wx_autoreply_text`
-- ----------------------------
DROP TABLE IF EXISTS `zz_wx_autoreply_text`;
CREATE TABLE `zz_wx_autoreply_text` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `rule_id` int(11) DEFAULT NULL,
  `content` varchar(1200) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of zz_wx_autoreply_text
-- ----------------------------
INSERT INTO zz_wx_autoreply_text VALUES ('8', '1', '哈哈，你来拉。');

-- ----------------------------
-- Table structure for `zz_wx_logs`
-- ----------------------------
DROP TABLE IF EXISTS `zz_wx_logs`;
CREATE TABLE `zz_wx_logs` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `content` text COLLATE utf8_unicode_ci,
  `file` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `c_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=109 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of zz_wx_logs
-- ----------------------------
INSERT INTO zz_wx_logs VALUES ('1', '\n\n\nDone!', 'wechat.log', '2015-12-16 10:48:34');
INSERT INTO zz_wx_logs VALUES ('2', 'array (\n  \'access_token\' => \'8yNl47vMLFL24FDD9ha6aGWDrp4VdeP00_h7FRrdRGDJmp7PH3cW-xZDa2qpwfjdIEuCb2Bo65ml68bMGlunxefatwn37vHyCCUrXNaxY8MPCJbAJALYF\',\n  \'expires_in\' => 7200,\n)', 'wechat.log', '2015-12-16 10:48:35');
INSERT INTO zz_wx_logs VALUES ('3', '\n\n\nDone!', 'wechat.log', '2015-12-16 12:54:14');
INSERT INTO zz_wx_logs VALUES ('4', 'array (\n  \'access_token\' => \'ozy_CMbvmTQ00ng_rHPIbzkmZDh7eW91CopPG0ZijIVx2MyrreuHSrUDup39i9uYWzkqM4rSBzij8m7JfzoOguxYZuRismqViDHuqZJxvmEGKKjAJAMQQ\',\n  \'expires_in\' => 7200,\n)', 'wechat.log', '2015-12-16 12:54:14');
INSERT INTO zz_wx_logs VALUES ('5', '\n\n\nDone!', 'wechat.log', '2015-12-16 15:21:46');
INSERT INTO zz_wx_logs VALUES ('6', 'array (\n  \'access_token\' => \'-2IHNL8rRqedhDvDMiZ3cn6W0rvCUAgMkFFN8hl5nUrZsjDJdxKM4nVafbdQP_E_Nk-Fuh7MjtWwRfN99jQgjGWvOMMvclNbUmeSBo5WSPQXWCiAAAONT\',\n  \'expires_in\' => 7200,\n)', 'wechat.log', '2015-12-16 15:21:47');
INSERT INTO zz_wx_logs VALUES ('7', '\n\n\nDone!', 'wechat.log', '2015-12-16 18:02:24');
INSERT INTO zz_wx_logs VALUES ('8', 'array (\n  \'access_token\' => \'DkZvSJ1h3YL40K3Bq4KYc426wrx-xpDD4OBw0p5fwry9T1SaVmC7NrrvaPBqrUOwWK43GRBHfBuHhQmj5H6dajBOfLXgQDdiSC-nQgE333cONLfAGAXWU\',\n  \'expires_in\' => 7200,\n)', 'wechat.log', '2015-12-16 18:02:24');
INSERT INTO zz_wx_logs VALUES ('9', '\n\n\nDone!', 'wechat.log', '2015-12-17 09:05:30');
INSERT INTO zz_wx_logs VALUES ('10', 'array (\n  \'access_token\' => \'JoUuKHnBC-AGNztB6l5eKldIBP6IahNd9d86GUHRKp2LLsiKj09YpO4uNqrLUmBNYueQlmInAUU7zq3SllWyuW-_dxdaZNRkmM67X6xhBksPNHiAEALJD\',\n  \'expires_in\' => 7200,\n)', 'wechat.log', '2015-12-17 09:05:30');
INSERT INTO zz_wx_logs VALUES ('11', '\n\n\nDone!', 'wechat.log', '2015-12-17 11:31:42');
INSERT INTO zz_wx_logs VALUES ('12', 'array (\n  \'access_token\' => \'9r5-G0mEMGhtZte0gvUeTa_w9XCjddpsjj4CEc7Po0Shc5XZZYBWmSZMH9rdEGQn3gG4hv3C182rFLcxbWH2J8ihWinVnfy-puR8mgsfRYcWTTbADAGDD\',\n  \'expires_in\' => 7200,\n)', 'wechat.log', '2015-12-17 11:31:42');
INSERT INTO zz_wx_logs VALUES ('13', '\n\n\nDone!', 'wechat.log', '2015-12-17 15:28:26');
INSERT INTO zz_wx_logs VALUES ('14', 'array (\n  \'access_token\' => \'TgdQ-4jAd1JsWBAv5VWw1kjnW31FueypavQMEumfV_t9MTKfVlDLYrjRgQ2D8P1s1UJ4A1ucOyUWKLXy4B51hgOTiFSe3vwFd7tbAMxcASkXQThACAOHK\',\n  \'expires_in\' => 7200,\n)', 'wechat.log', '2015-12-17 15:28:27');
INSERT INTO zz_wx_logs VALUES ('15', '\n\n\nDone!', 'wechat.log', '2015-12-18 10:13:11');
INSERT INTO zz_wx_logs VALUES ('16', 'array (\n  \'access_token\' => \'uhM9cKweanskaoaTVJ5h7rDTrsvmqDtrsUp1tAtrPaZ16rM7dRm4Ogt2pdlKjtmh5Of9lq5_xWDphyaaE2bi4otou7WMG0X7mSruQVSg2GMZHUaADAUCP\',\n  \'expires_in\' => 7200,\n)', 'wechat.log', '2015-12-18 10:13:12');
INSERT INTO zz_wx_logs VALUES ('17', '\n\n\nDone!', 'wechat.log', '2015-12-18 23:48:07');
INSERT INTO zz_wx_logs VALUES ('18', 'array (\n  \'access_token\' => \'ZdvHFbZ2YvnR9q6WGob0SNxqzYjqgn8WwIOHa7IcUUFUBp1_6nbba03wHi2o2CFLCrnlXaSGkNu_VvGWZBAK_3ayPqk6pJGtoUZXEjhzDcwWCYeACABHD\',\n  \'expires_in\' => 7200,\n)', 'wechat.log', '2015-12-18 23:48:07');
INSERT INTO zz_wx_logs VALUES ('19', '\n\n\nDone!', 'wechat.log', '2015-12-19 13:25:47');
INSERT INTO zz_wx_logs VALUES ('20', 'array (\n  \'access_token\' => \'AWDyUWhqWAWGyInO_y8Uw_i5UnQDOaC4uJcfoVN6WH8kM5vQyBG8xIpCwMwkysKYJ2xITwa5iz0IEheNUJx6p6BlcoFG-Yl2BIhHE3INLBwVJCfAHAMAT\',\n  \'expires_in\' => 7200,\n)', 'wechat.log', '2015-12-19 13:25:47');
INSERT INTO zz_wx_logs VALUES ('21', '\n\n\nDone!', 'wechat.log', '2015-12-19 16:53:31');
INSERT INTO zz_wx_logs VALUES ('22', 'array (\n  \'access_token\' => \'UL24g8c7uakoAHDlGpXLo8oYC-be5KQVMlCjV6-94XyhQZHNbzORDhFcp17fMd4tfeUFYX6TBbjmSVFcJgwbwJlwPNeuyZAFgaeX4HfbsEIFKJjACAXCB\',\n  \'expires_in\' => 7200,\n)', 'wechat.log', '2015-12-19 16:53:31');
INSERT INTO zz_wx_logs VALUES ('23', '\n\n\nDone!', 'wechat.log', '2015-12-19 22:11:52');
INSERT INTO zz_wx_logs VALUES ('24', 'array (\n  \'access_token\' => \'F4aiqs2LaqQkAr9Uv1PBN1HCLemriXVbR4gvi7ZxvTwtVANz6zTNk2ouTH_SiwSwPq1jNnUD2bxfsSQtXDPsDFzVQvQNcTieZhMcFQIAJ0YHMPiAHACHK\',\n  \'expires_in\' => 7200,\n)', 'wechat.log', '2015-12-19 22:11:52');
INSERT INTO zz_wx_logs VALUES ('25', '\n\n\nDone!', 'wechat.log', '2015-12-20 15:49:51');
INSERT INTO zz_wx_logs VALUES ('26', 'array (\n  \'access_token\' => \'FrVXG3uDMyV-EQafb1a9cKDSUu3g1OTOEFl4Si6Slz_vLo5IjiVzglidlq1iBOB-wKd-DdkZm79ewnPjHT4YCCmu0Etb06TSfikHSrzevVoGNDhABAMTJ\',\n  \'expires_in\' => 7200,\n)', 'wechat.log', '2015-12-20 15:49:51');
INSERT INTO zz_wx_logs VALUES ('27', '\n\n\nDone!', 'wechat.log', '2015-12-21 09:21:14');
INSERT INTO zz_wx_logs VALUES ('28', 'array (\n  \'access_token\' => \'egUHIdDeh9UYfz655Vz6nmCZ6letiIlHidc77Yy_cYu4brnYbim_kN0QY1LBjnTqrmp4HlNdi1gqnDJ5uh108pintpsRYaaxpxlOxFPs13sBAKcAHAUTD\',\n  \'expires_in\' => 7200,\n)', 'wechat.log', '2015-12-21 09:21:14');
INSERT INTO zz_wx_logs VALUES ('29', '\n\n\nDone!', 'wechat.log', '2015-12-21 12:10:11');
INSERT INTO zz_wx_logs VALUES ('30', 'array (\n  \'access_token\' => \'JvNcGzBlwyI7L5r9OmcteyN69ufYM37Fe9NkMBHNJidcfLKtIBhEcNcZf0lm-LA-NJ0sFNqqFYcugcHFrkDIFSk-XWXoh63F4AvZcacBwg0QNVcAIABYG\',\n  \'expires_in\' => 7200,\n)', 'wechat.log', '2015-12-21 12:10:11');
INSERT INTO zz_wx_logs VALUES ('31', '\n\n\nDone!', 'wechat.log', '2015-12-21 14:54:57');
INSERT INTO zz_wx_logs VALUES ('32', 'array (\n  \'access_token\' => \'v_7W3C6_Wp6kNTqRuL6Jpw2cGcdqmKXaW_JM1Pduu9WUSLA_obmRMkOJf2BaFMLcZSQjBKQHNlD05SuiEILcXqjdP2AfzLxkIk9tTd9AleAAHGiAFAIPO\',\n  \'expires_in\' => 7200,\n)', 'wechat.log', '2015-12-21 14:54:57');
INSERT INTO zz_wx_logs VALUES ('33', '\n\n\nDone!', 'wechat.log', '2015-12-21 17:43:21');
INSERT INTO zz_wx_logs VALUES ('34', 'array (\n  \'access_token\' => \'U35g-j6zjIhSaGJJhepOB9dR9mfI8B3YoE8s05-RJRA61TFSLriyNka_ZWdRL2-9Y-3dkSAmhr5yRYlXZttD-2b8qGET0uFfLzlKnvnCn5AQRKbACATUN\',\n  \'expires_in\' => 7200,\n)', 'wechat.log', '2015-12-21 17:43:21');
INSERT INTO zz_wx_logs VALUES ('35', '\n\n\nDone!', 'wechat.log', '2015-12-22 02:39:46');
INSERT INTO zz_wx_logs VALUES ('36', 'array (\n  \'access_token\' => \'0fDQF4JE2sgfzGUr_oTHNNSR4SVeWIwAC9eeajebY5HyLiQw9mfiavSO0xIPb4tAk-hI_vs_lw1IGQ_xJ1wsosXrZKuABiFJ979QoA-YF8sPBUgABALXQ\',\n  \'expires_in\' => 7200,\n)', 'wechat.log', '2015-12-22 02:39:48');
INSERT INTO zz_wx_logs VALUES ('37', '\n\n\nDone!', 'wechat.log', '2015-12-23 15:00:13');
INSERT INTO zz_wx_logs VALUES ('38', 'array (\n  \'access_token\' => \'iStt3-xWPvk0mauRL-uUlydKmdnHZ9XOfIgkT1jIJRhWu3D7gtO_YskLLdqN0wlgq7b_1oDda7VxzLkL_NvCvtefMks2DWF5aYlL_Co9X5gTNBgACAMGU\',\n  \'expires_in\' => 7200,\n)', 'wechat.log', '2015-12-23 15:00:14');
INSERT INTO zz_wx_logs VALUES ('39', '\n\n\nDone!', 'wechat.log', '2015-12-23 18:09:41');
INSERT INTO zz_wx_logs VALUES ('40', 'array (\n  \'access_token\' => \'Qw_n3mRrmhOSq6SDiuYyEG-9kuDPF2aS-PY8OGrTaT_J24TZei5dicBT3kH8MQJwRiHzTu7LgZqUS6guKnf8h_oMRC8vMJQg0y7egdcBGrUESJbADANBS\',\n  \'expires_in\' => 7200,\n)', 'wechat.log', '2015-12-23 18:09:41');
INSERT INTO zz_wx_logs VALUES ('41', '\n\n\nDone!', 'wechat.log', '2015-12-24 10:31:41');
INSERT INTO zz_wx_logs VALUES ('42', 'array (\n  \'access_token\' => \'_8jAU0gB-tSZF-Qole4gGhesIRAlKUisH2vutrLbwb8nKMvVhjPDeLMhHtbDRDzq1YJqppT13kyWQ9AYM63coeOIBAUkdOXfAYuL2Q03ElgILYaACASVI\',\n  \'expires_in\' => 7200,\n)', 'wechat.log', '2015-12-24 10:31:42');
INSERT INTO zz_wx_logs VALUES ('43', '\n\n\nDone!', 'wechat.log', '2015-12-24 14:17:01');
INSERT INTO zz_wx_logs VALUES ('44', 'array (\n  \'access_token\' => \'jCVlWCvah87tMYcqPvc11z1xSeP73tNNWHIlfvmhXiEbdJFpadxm9eN2ebYnV81rA-Tn0NO2P7KgI5nulMgYGX89D8__bxwz6AikzVBdAbQAZHfAGADCK\',\n  \'expires_in\' => 7200,\n)', 'wechat.log', '2015-12-24 14:17:01');
INSERT INTO zz_wx_logs VALUES ('45', '\n\n\nDone!', 'wechat.log', '2016-01-02 23:31:04');
INSERT INTO zz_wx_logs VALUES ('46', 'array (\n  \'errcode\' => 40125,\n  \'errmsg\' => \'invalid appsecret, view more at http://t.cn/RAEkdVq hint: [aMQRkA0673vr23]\',\n)', 'wechat.log', '2016-01-02 23:31:05');
INSERT INTO zz_wx_logs VALUES ('47', '\n\n\nDone!', 'wechat.log', '2016-01-02 23:31:19');
INSERT INTO zz_wx_logs VALUES ('48', 'array (\n  \'errcode\' => 40125,\n  \'errmsg\' => \'invalid appsecret, view more at http://t.cn/RAEkdVq hint: [aGY6ka0687vr22]\',\n)', 'wechat.log', '2016-01-02 23:31:19');
INSERT INTO zz_wx_logs VALUES ('49', '\n\n\nDone!', 'wechat.log', '2016-01-04 12:45:44');
INSERT INTO zz_wx_logs VALUES ('50', 'array (\n  \'errcode\' => 40125,\n  \'errmsg\' => \'invalid appsecret, view more at http://t.cn/RAEkdVq hint: [PVUy2a0756vr18]\',\n)', 'wechat.log', '2016-01-04 12:45:44');
INSERT INTO zz_wx_logs VALUES ('51', '\n\n\nDone!', 'wechat.log', '2016-01-04 12:46:11');
INSERT INTO zz_wx_logs VALUES ('52', 'array (\n  \'errcode\' => 40125,\n  \'errmsg\' => \'invalid appsecret, view more at http://t.cn/RAEkdVq hint: [YzN1iA0783vr21]\',\n)', 'wechat.log', '2016-01-04 12:46:11');
INSERT INTO zz_wx_logs VALUES ('53', '\n\n\nDone!', 'wechat.log', '2016-01-05 12:44:40');
INSERT INTO zz_wx_logs VALUES ('54', 'array (\n  \'errcode\' => 40125,\n  \'errmsg\' => \'invalid appsecret, view more at http://t.cn/RAEkdVq hint: [gJa3.a0095vr21]\',\n)', 'wechat.log', '2016-01-05 12:44:41');
INSERT INTO zz_wx_logs VALUES ('55', '\n\n\nDone!', 'wechat.log', '2016-01-05 15:03:39');
INSERT INTO zz_wx_logs VALUES ('56', 'array (\n  \'errcode\' => 40125,\n  \'errmsg\' => \'invalid appsecret, view more at http://t.cn/RAEkdVq hint: [D89vHA0434vr23]\',\n)', 'wechat.log', '2016-01-05 15:03:40');
INSERT INTO zz_wx_logs VALUES ('57', '\n\n\nDone!', 'wechat.log', '2016-01-13 17:39:12');
INSERT INTO zz_wx_logs VALUES ('58', 'array (\n  \'errcode\' => 40125,\n  \'errmsg\' => \'invalid appsecret, view more at http://t.cn/RAEkdVq hint: [.yRhEa0984vr19]\',\n)', 'wechat.log', '2016-01-13 17:39:13');
INSERT INTO zz_wx_logs VALUES ('59', '\n\n\nDone!', 'wechat.log', '2016-01-14 17:22:43');
INSERT INTO zz_wx_logs VALUES ('60', 'array (\n  \'errcode\' => 40125,\n  \'errmsg\' => \'invalid appsecret, view more at http://t.cn/RAEkdVq hint: [LAGh5a0397vr18]\',\n)', 'wechat.log', '2016-01-14 17:22:43');
INSERT INTO zz_wx_logs VALUES ('61', '\n\n\nDone!', 'wechat.log', '2016-01-14 17:23:38');
INSERT INTO zz_wx_logs VALUES ('62', 'array (\n  \'errcode\' => 40125,\n  \'errmsg\' => \'invalid appsecret, view more at http://t.cn/RAEkdVq hint: [GurT5a0452vr22]\',\n)', 'wechat.log', '2016-01-14 17:23:38');
INSERT INTO zz_wx_logs VALUES ('63', '\n\n\nDone!', 'wechat.log', '2016-01-15 11:53:09');
INSERT INTO zz_wx_logs VALUES ('64', 'array (\n  \'errcode\' => 40125,\n  \'errmsg\' => \'invalid appsecret, view more at http://t.cn/RAEkdVq hint: [_Zx8aa0025vr19]\',\n)', 'wechat.log', '2016-01-15 11:53:10');
INSERT INTO zz_wx_logs VALUES ('65', '\n\n\nDone!', 'wechat.log', '2016-01-15 12:18:43');
INSERT INTO zz_wx_logs VALUES ('66', 'array (\n  \'errcode\' => 40125,\n  \'errmsg\' => \'invalid appsecret, view more at http://t.cn/RAEkdVq hint: [i9sU.A0559vr18]\',\n)', 'wechat.log', '2016-01-15 12:18:44');
INSERT INTO zz_wx_logs VALUES ('67', '\n\n\nDone!', 'wechat.log', '2016-01-15 13:04:27');
INSERT INTO zz_wx_logs VALUES ('68', 'array (\n  \'errcode\' => 40125,\n  \'errmsg\' => \'invalid appsecret, view more at http://t.cn/RAEkdVq hint: [2inXSA0302vr20]\',\n)', 'wechat.log', '2016-01-15 13:04:27');
INSERT INTO zz_wx_logs VALUES ('69', '\n\n\nDone!', 'wechat.log', '2016-01-15 13:10:30');
INSERT INTO zz_wx_logs VALUES ('70', 'array (\n  \'errcode\' => 40125,\n  \'errmsg\' => \'invalid appsecret, view more at http://t.cn/RAEkdVq hint: [.JEzJa0666vr20]\',\n)', 'wechat.log', '2016-01-15 13:10:30');
INSERT INTO zz_wx_logs VALUES ('71', '\n\n\nDone!', 'wechat.log', '2016-01-15 14:49:05');
INSERT INTO zz_wx_logs VALUES ('72', 'array (\n  \'errcode\' => 40125,\n  \'errmsg\' => \'invalid appsecret, view more at http://t.cn/RAEkdVq hint: [Lyib6a0580vr19]\',\n)', 'wechat.log', '2016-01-15 14:49:05');
INSERT INTO zz_wx_logs VALUES ('73', '\n\n\nDone!', 'wechat.log', '2016-01-15 14:49:07');
INSERT INTO zz_wx_logs VALUES ('74', 'array (\n  \'errcode\' => 40125,\n  \'errmsg\' => \'invalid appsecret, view more at http://t.cn/RAEkdVq hint: [c98.Ya0583vr18]\',\n)', 'wechat.log', '2016-01-15 14:49:08');
INSERT INTO zz_wx_logs VALUES ('75', '\n\n\nDone!', 'wechat.log', '2016-01-15 14:49:09');
INSERT INTO zz_wx_logs VALUES ('76', 'array (\n  \'errcode\' => 40125,\n  \'errmsg\' => \'invalid appsecret, view more at http://t.cn/RAEkdVq hint: [55jEna0584vr22]\',\n)', 'wechat.log', '2016-01-15 14:49:09');
INSERT INTO zz_wx_logs VALUES ('77', '\n\n\nDone!', 'wechat.log', '2016-01-15 14:49:09');
INSERT INTO zz_wx_logs VALUES ('78', 'array (\n  \'errcode\' => 40125,\n  \'errmsg\' => \'invalid appsecret, view more at http://t.cn/RAEkdVq hint: [yKbWkA0584vr18]\',\n)', 'wechat.log', '2016-01-15 14:49:09');
INSERT INTO zz_wx_logs VALUES ('79', '\n\n\nDone!', 'wechat.log', '2016-01-19 15:35:28');
INSERT INTO zz_wx_logs VALUES ('80', 'array (\n  \'errcode\' => 40125,\n  \'errmsg\' => \'invalid appsecret, view more at http://t.cn/RAEkdVq hint: [4b9GBA0973vr22]\',\n)', 'wechat.log', '2016-01-19 15:35:29');
INSERT INTO zz_wx_logs VALUES ('81', '\n\n\nDone!', 'wechat.log', '2016-01-19 15:53:15');
INSERT INTO zz_wx_logs VALUES ('82', 'array (\n  \'errcode\' => 40125,\n  \'errmsg\' => \'invalid appsecret, view more at http://t.cn/RAEkdVq hint: [K8_Kka0039vr23]\',\n)', 'wechat.log', '2016-01-19 15:53:15');
INSERT INTO zz_wx_logs VALUES ('83', '\n\n\nDone!', 'wechat.log', '2016-02-18 14:24:33');
INSERT INTO zz_wx_logs VALUES ('84', 'array (\n  \'errcode\' => 40125,\n  \'errmsg\' => \'invalid appsecret, view more at http://t.cn/RAEkdVq hint: [GH_8Ma0712vr21]\',\n)', 'wechat.log', '2016-02-18 14:24:33');
INSERT INTO zz_wx_logs VALUES ('85', '\n\n\nDone!', 'wechat.log', '2016-03-16 15:00:19');
INSERT INTO zz_wx_logs VALUES ('86', 'array (\n  \'access_token\' => \'PLaEsGft1nv230P8Fdlej6xGf5Vx_GVodYyjubNv8NVR4Yd7Pu64IQHffurY3y4H_ruw90KhM2FUhaxWCmFA8ciNx-QYi8SsLNcUwUG9-iYXuFCzEQgI1ov9kqXKINq4PNDjAJAGEU\',\n  \'expires_in\' => 7200,\n)', 'wechat.log', '2016-03-16 15:00:20');
INSERT INTO zz_wx_logs VALUES ('87', '\n\n\nDone!', 'wechat.log', '2016-03-17 14:21:03');
INSERT INTO zz_wx_logs VALUES ('88', 'array (\n  \'access_token\' => \'Il-NbaE2tUU4NGNKdxUetsmkVpFItoAhXJ2-fm3xgC0vRDmh3_h1krqsukNuVAqwIMpIi13CD76gT-aDMqpsWoOUwNqsxptU0jLLr8B_Fu4aP2Gu5k86OspHZ291TcAkZFMjAFANTA\',\n  \'expires_in\' => 7200,\n)', 'wechat.log', '2016-03-17 14:21:04');
INSERT INTO zz_wx_logs VALUES ('89', '\n\n\nDone!', 'wechat.log', '2016-03-25 19:46:14');
INSERT INTO zz_wx_logs VALUES ('90', 'array (\n  \'access_token\' => \'ZkY_I813MR7LaG0XaygFXmw_-KMit3in-c0kA1uu2IKQWVagCsJOhhOur-pjZG9xilcWzBLov-gNzV7p2tA7alqXXcgjLIpZox4n2pKGjc8830JzeyPjwHc0B2UOvdcAQYDgABAXFK\',\n  \'expires_in\' => 7200,\n)', 'wechat.log', '2016-03-25 19:46:15');
INSERT INTO zz_wx_logs VALUES ('91', '\n\n\nDone!', 'wechat.log', '2016-05-31 17:40:52');
INSERT INTO zz_wx_logs VALUES ('92', 'array (\n  \'errcode\' => 40013,\n  \'errmsg\' => \'invalid appid hint: [P2OOsA0743e277]\',\n)', 'wechat.log', '2016-05-31 17:40:53');
INSERT INTO zz_wx_logs VALUES ('93', 'array (\n  \'errcode\' => 40013,\n  \'errmsg\' => \'invalid appid hint: [vgol60743ken1]\',\n)', 'wechat.log', '2016-05-31 17:40:53');
INSERT INTO zz_wx_logs VALUES ('94', '\n\n\nDone!', 'wechat.log', '2016-05-31 17:48:18');
INSERT INTO zz_wx_logs VALUES ('95', 'array (\n  \'errcode\' => 40013,\n  \'errmsg\' => \'invalid appid hint: [iYrdoa0188re59]\',\n)', 'wechat.log', '2016-05-31 17:48:18');
INSERT INTO zz_wx_logs VALUES ('96', 'array (\n  \'errcode\' => 40013,\n  \'errmsg\' => \'invalid appid hint: [uHk8kA0188ken1]\',\n)', 'wechat.log', '2016-05-31 17:48:18');
INSERT INTO zz_wx_logs VALUES ('97', '\n\n\nDone!', 'wechat.log', '2016-05-31 17:48:20');
INSERT INTO zz_wx_logs VALUES ('98', 'array (\n  \'errcode\' => 40013,\n  \'errmsg\' => \'invalid appid hint: [MInTFA0190e277]\',\n)', 'wechat.log', '2016-05-31 17:48:20');
INSERT INTO zz_wx_logs VALUES ('99', 'array (\n  \'errcode\' => 40013,\n  \'errmsg\' => \'invalid appid hint: [L4LjqA0190re59]\',\n)', 'wechat.log', '2016-05-31 17:48:20');
INSERT INTO zz_wx_logs VALUES ('100', '\n\n\nDone!', 'wechat.log', '2016-05-31 17:48:33');
INSERT INTO zz_wx_logs VALUES ('101', 'array (\n  \'errcode\' => 40013,\n  \'errmsg\' => \'invalid appid hint: [zCcQIa0203e277]\',\n)', 'wechat.log', '2016-05-31 17:48:33');
INSERT INTO zz_wx_logs VALUES ('102', 'array (\n  \'errcode\' => 40013,\n  \'errmsg\' => \'invalid appid hint: [0.jVKA0203e277]\',\n)', 'wechat.log', '2016-05-31 17:48:33');
INSERT INTO zz_wx_logs VALUES ('103', '\n\n\nDone!', 'wechat.log', '2016-05-31 17:49:25');
INSERT INTO zz_wx_logs VALUES ('104', 'array (\n  \'errcode\' => 40013,\n  \'errmsg\' => \'invalid appid hint: [Wq.lTA0256re59]\',\n)', 'wechat.log', '2016-05-31 17:49:25');
INSERT INTO zz_wx_logs VALUES ('105', 'array (\n  \'errcode\' => 40013,\n  \'errmsg\' => \'invalid appid hint: [sGjAMA0256ken1]\',\n)', 'wechat.log', '2016-05-31 17:49:26');
INSERT INTO zz_wx_logs VALUES ('106', '\n\n\nDone!', 'wechat.log', '2016-05-31 17:56:21');
INSERT INTO zz_wx_logs VALUES ('107', 'array (\n  \'errcode\' => 40013,\n  \'errmsg\' => \'invalid appid hint: [SVKiDA0671e277]\',\n)', 'wechat.log', '2016-05-31 17:56:21');
INSERT INTO zz_wx_logs VALUES ('108', 'array (\n  \'errcode\' => 40013,\n  \'errmsg\' => \'invalid appid hint: [soIbYa0671ken1]\',\n)', 'wechat.log', '2016-05-31 17:56:21');

-- ----------------------------
-- Table structure for `zz_wx_menu_data`
-- ----------------------------
DROP TABLE IF EXISTS `zz_wx_menu_data`;
CREATE TABLE `zz_wx_menu_data` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `json` text,
  `release` text COMMENT '已发布的菜单信息',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of zz_wx_menu_data
-- ----------------------------
INSERT INTO zz_wx_menu_data VALUES ('1', '{\"button\":[{\"name\":\"\\u593a\\u5b9d\\u5927\\u5385\",\"key\":\"wxmenu_0\"},{\"name\":\"\\u65b0\\u624b\\u5f15\\u5bfc\",\"key\":\"wxmenu_1\"},{\"name\":\"\\u4e2a\\u4eba\\u4e2d\\u5fc3\",\"key\":\"wxmenu_2\"}]}', '{\"wxmenu_0_2\":{\"type\":null,\"key\":\"wxmenu_0_2\",\"data\":null},\"wxmenu_1_0\":{\"type\":null,\"key\":\"wxmenu_1_0\",\"data\":null},\"wxmenu_1_1\":{\"type\":null,\"key\":\"wxmenu_1_1\",\"data\":null},\"wxmenu_1_2\":{\"type\":null,\"key\":\"wxmenu_1_2\",\"data\":null},\"wxmenu_2_1\":{\"type\":null,\"key\":\"wxmenu_2_1\",\"data\":null},\"wxmenu_2_2\":{\"type\":null,\"key\":\"wxmenu_2_2\",\"data\":null}}');

-- ----------------------------
-- Table structure for `zz_wx_news`
-- ----------------------------
DROP TABLE IF EXISTS `zz_wx_news`;
CREATE TABLE `zz_wx_news` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `c_time` int(11) DEFAULT NULL,
  `u_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of zz_wx_news
-- ----------------------------

-- ----------------------------
-- Table structure for `zz_wx_news_item`
-- ----------------------------
DROP TABLE IF EXISTS `zz_wx_news_item`;
CREATE TABLE `zz_wx_news_item` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `news_id` int(11) DEFAULT NULL,
  `title` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `desc` varchar(280) COLLATE utf8_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8_unicode_ci,
  `author` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '作者',
  `cover` int(11) DEFAULT NULL COMMENT '封面图片ID',
  `cover_in_detail` tinyint(2) DEFAULT '0' COMMENT '封面是否显示在正文中',
  `src_link` varchar(256) COLLATE utf8_unicode_ci DEFAULT '',
  `view_num` int(11) DEFAULT '0' COMMENT '浏览次数',
  `c_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of zz_wx_news_item
-- ----------------------------

-- ----------------------------
-- Table structure for `zz_wx_reply`
-- ----------------------------
DROP TABLE IF EXISTS `zz_wx_reply`;
CREATE TABLE `zz_wx_reply` (
  `re_id` int(10) NOT NULL AUTO_INCREMENT COMMENT '索引ID',
  `re_type` smallint(3) DEFAULT '1' COMMENT '回复类型1被关回复2消息自动回复3关键字回复',
  `data_type` smallint(3) DEFAULT '1' COMMENT '内容类型1文字2图文',
  `content` text COLLATE utf8_unicode_ci COMMENT '回复内容',
  `keyword` text COLLATE utf8_unicode_ci COMMENT '匹配关键字',
  `rule_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '规则名称',
  PRIMARY KEY (`re_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of zz_wx_reply
-- ----------------------------

-- ----------------------------
-- Table structure for `zz_wx_token`
-- ----------------------------
DROP TABLE IF EXISTS `zz_wx_token`;
CREATE TABLE `zz_wx_token` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `flag` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '微信后台接口url组成部分',
  `token` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '绑定微信公众号密钥',
  `status` tinyint(2) DEFAULT '0' COMMENT '绑定状态',
  `hid` int(10) DEFAULT NULL COMMENT '所属楼盘ID,0为总微信账号',
  `c_time` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of zz_wx_token
-- ----------------------------
INSERT INTO zz_wx_token VALUES ('1', '1jx037cb621b', '5c728ba2', '1', null, null);

-- ----------------------------
-- Table structure for `zz_yunbuy`
-- ----------------------------
DROP TABLE IF EXISTS `zz_yunbuy`;
CREATE TABLE `zz_yunbuy` (
  `buy_id` int(10) NOT NULL AUTO_INCREMENT,
  `goods_id` int(10) NOT NULL,
  `sid` int(10) NOT NULL DEFAULT '0' COMMENT '源商品',
  `title` varchar(255) NOT NULL COMMENT '商品名称',
  `goods_subtit` varchar(255) NOT NULL DEFAULT '' COMMENT '云购副标题',
  `cid` int(10) NOT NULL DEFAULT '0' COMMENT '分类ID',
  `cover` int(11) NOT NULL COMMENT '商品封面',
  `pics` varchar(60) NOT NULL COMMENT '图片列表',
  `goods_price` double(20,2) NOT NULL COMMENT '商品总价',
  `price` double(20,2) NOT NULL COMMENT '云购单次价格',
  `custom_price` double(20,2) NOT NULL COMMENT '自定义商品价值',
  `need_num` int(10) NOT NULL COMMENT '总需人数',
  `buy_num` int(10) NOT NULL DEFAULT '0' COMMENT '已参与人数',
  `end_num` int(10) NOT NULL DEFAULT '0' COMMENT '剩余人数',
  `qishu` smallint(6) NOT NULL COMMENT '期数',
  `max_qishu` smallint(6) NOT NULL COMMENT '最大期数',
  `is_rec` smallint(3) NOT NULL DEFAULT '0' COMMENT '是否推荐',
  `member_id` int(11) NOT NULL DEFAULT '0' COMMENT '中奖用户ID',
  `member_name` varchar(255) NOT NULL DEFAULT '' COMMENT '中奖用户名',
  `luck_code` char(8) NOT NULL DEFAULT '0' COMMENT '中奖号码',
  `kjjg` varchar(12) NOT NULL DEFAULT '' COMMENT '时时彩开奖结果',
  `time_total` char(20) NOT NULL DEFAULT '' COMMENT '时间总和',
  `add_time` int(10) NOT NULL COMMENT '添加时间',
  `start_time` int(10) NOT NULL COMMENT '开始时间',
  `end_time` varchar(60) NOT NULL DEFAULT '' COMMENT '揭晓时间',
  `wait_time` int(10) DEFAULT NULL COMMENT '等待时间',
  `last_dbtime` varchar(60) NOT NULL DEFAULT '' COMMENT '最后夺宝时间',
  `qihao` varchar(10) NOT NULL DEFAULT '' COMMENT '开奖期号',
  `is_show` varchar(3) NOT NULL DEFAULT '1' COMMENT '是否显示',
  `goods_click` int(11) NOT NULL DEFAULT '0' COMMENT '点击量',
  `listorders` smallint(3) NOT NULL DEFAULT '0' COMMENT '排序',
  `keywords` varchar(120) NOT NULL DEFAULT '',
  `description` mediumtext,
  `type` smallint(3) DEFAULT '1' COMMENT '类型:1普通2增币',
  `posid` tinyint(3) DEFAULT NULL COMMENT '推荐位',
  `thumb` text COMMENT '推荐图',
  `ext_info` text,
  `buynum` int(11) DEFAULT '0' COMMENT '限购人数',
  `thumbs` text,
  `is_off` int(1) unsigned NOT NULL COMMENT '0',
  `gobuy` tinyint(1) DEFAULT '0' COMMENT '1直购商品',
  `mid` int(11) DEFAULT '0' COMMENT '商家会员ID',
  `bus_money` double(11,2) DEFAULT '0.00' COMMENT '商家分润金额',
  PRIMARY KEY (`buy_id`)
) ENGINE=MyISAM AUTO_INCREMENT=420 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of zz_yunbuy
-- ----------------------------

-- ----------------------------
-- Table structure for `zz_yuncart`
-- ----------------------------
DROP TABLE IF EXISTS `zz_yuncart`;
CREATE TABLE `zz_yuncart` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `buy_id` int(10) NOT NULL COMMENT '云购ID',
  `goods_name` varchar(255) NOT NULL COMMENT '产品名称',
  `cover` int(11) NOT NULL COMMENT '封面ID',
  `mid` int(10) NOT NULL COMMENT '用户ID',
  `qishu` smallint(6) NOT NULL COMMENT '期数',
  `qty` smallint(6) NOT NULL COMMENT '购买数量',
  `multi` smallint(6) DEFAULT '1' COMMENT '多期参与',
  `goods_price` decimal(20,0) DEFAULT '0' COMMENT '商品价格',
  `price` decimal(20,0) NOT NULL COMMENT '单价',
  `subtotal` decimal(20,0) NOT NULL COMMENT '小计',
  `type` smallint(3) DEFAULT '1' COMMENT '类型',
  `prev_buy_id` int(11) DEFAULT '0' COMMENT '过期的云购ID',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1115 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of zz_yuncart
-- ----------------------------

-- ----------------------------
-- Table structure for `zz_yuncat`
-- ----------------------------
DROP TABLE IF EXISTS `zz_yuncat`;
CREATE TABLE `zz_yuncat` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT '编号',
  `catname` varchar(255) NOT NULL COMMENT '分类名称',
  `parentid` int(10) NOT NULL DEFAULT '0' COMMENT '父级ID',
  `arrparentid` text NOT NULL COMMENT '父类ID组',
  `arrchildid` text NOT NULL COMMENT '子类ID组',
  `child` tinyint(1) NOT NULL COMMENT '是否有子级',
  `title` varchar(60) NOT NULL COMMENT '页面标题',
  `keywords` varchar(120) NOT NULL COMMENT '页面关键字',
  `description` int(255) NOT NULL COMMENT '页面描述',
  `listorder` smallint(5) NOT NULL DEFAULT '0' COMMENT '排序',
  `thumb` varchar(255) NOT NULL COMMENT '缩略图',
  `url` varchar(255) NOT NULL COMMENT 'URL',
  `ismenu` smallint(3) NOT NULL DEFAULT '0' COMMENT '是否导航',
  `catname_en` varchar(100) DEFAULT NULL,
  `iconfont` varchar(20) DEFAULT NULL COMMENT '字体图标',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of zz_yuncat
-- ----------------------------
INSERT INTO zz_yuncat VALUES ('1', '电脑办公', '0', '0', '1', '0', '', '', '0', '7', '', '/yunbuy/index/?cid=1', '1', '', null);
INSERT INTO zz_yuncat VALUES ('2', '数码影音', '0', '0', '2', '0', '', '', '0', '2', '', '/yunbuy/index/?cid=2', '1', '', null);
INSERT INTO zz_yuncat VALUES ('3', '服装服饰', '0', '0', '3', '0', '', '', '0', '3', '', '/yunbuy/index/?cid=3', '0', '', null);
INSERT INTO zz_yuncat VALUES ('4', '零食饮料', '0', '0', '4', '0', '', '', '0', '4', '', '/yunbuy/index/?cid=4', '1', '', null);
INSERT INTO zz_yuncat VALUES ('8', '户外运动', '0', '0', '8', '0', '', '', '0', '1', '', '/yunbuy/index/?cid=8', '1', '', null);
INSERT INTO zz_yuncat VALUES ('6', '生活电器', '0', '0', '6', '0', '', '', '0', '5', '', '/yunbuy/index/?cid=6', '1', '', null);
INSERT INTO zz_yuncat VALUES ('9', '时尚用品', '0', '0', '9', '0', '', '', '0', '0', '', '/yunbuy/index/?cid=9', '1', '', null);
INSERT INTO zz_yuncat VALUES ('15', '游戏装备', '0', '0', '15', '0', '', '', '0', '0', '', '/yunbuy/index/?cid=15', '1', '', null);
INSERT INTO zz_yuncat VALUES ('18', '珠宝玉器', '0', '0', '18', '0', '', '', '0', '0', '', '/yunbuy/index/?cid=18', '1', '', null);

-- ----------------------------
-- Table structure for `zz_yundb`
-- ----------------------------
DROP TABLE IF EXISTS `zz_yundb`;
CREATE TABLE `zz_yundb` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL COMMENT '订单编号',
  `mid` int(11) NOT NULL,
  `username` varchar(60) NOT NULL,
  `buy_id` int(11) NOT NULL COMMENT '云购编号',
  `goods_name` varchar(60) NOT NULL COMMENT '商品名',
  `goods_price` decimal(20,0) NOT NULL COMMENT '商品总价',
  `price` decimal(20,0) NOT NULL COMMENT '单次价格',
  `qty` smallint(6) NOT NULL COMMENT '参与人次',
  `total` decimal(10,0) NOT NULL COMMENT '总价',
  `cover` int(11) NOT NULL COMMENT '封面',
  `qishu` smallint(6) NOT NULL COMMENT '期数',
  `multi` smallint(6) NOT NULL DEFAULT '1' COMMENT '参与多期',
  `auto_multi` smallint(3) NOT NULL DEFAULT '0' COMMENT '系统自动多期购买1是0否',
  `yun_code` longtext,
  `luck_code` char(50) DEFAULT NULL COMMENT '中奖号',
  `db_time` char(50) NOT NULL DEFAULT '' COMMENT '夺宝时间',
  `timenum` varchar(50) DEFAULT NULL COMMENT '夺宝时间值',
  `status` smallint(3) NOT NULL DEFAULT '1' COMMENT '状态:1未支付2已支付3已中奖4待揭晓5未中奖',
  `ip` varchar(30) NOT NULL DEFAULT '',
  `is_show` smallint(3) NOT NULL DEFAULT '1',
  `is_award` smallint(3) NOT NULL DEFAULT '0' COMMENT '是否领奖0未领奖1已领奖',
  `add_time` int(10) NOT NULL,
  `type` smallint(3) DEFAULT '1' COMMENT '类型',
  `sharecode` char(5) NOT NULL DEFAULT '' COMMENT '分享码',
  `fdis` smallint(3) DEFAULT '0' COMMENT '1永不失效',
  `agents` varchar(100) DEFAULT NULL COMMENT '访问终端',
  PRIMARY KEY (`id`),
  KEY `mid` (`mid`,`order_id`,`buy_id`),
  KEY `tmid` (`mid`),
  KEY `buy_id` (`buy_id`),
  KEY `IDX_DB_TIME` (`db_time`),
  KEY `IDX_ORDER_ID` (`order_id`),
  KEY `IDX_STATUS` (`status`),
  KEY `IDX_STATUS_BUY_ID` (`status`,`buy_id`),
  KEY `IDX_STATUS_DB_TIME` (`status`,`db_time`)
) ENGINE=MyISAM AUTO_INCREMENT=16055 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of zz_yundb
-- ----------------------------

-- ----------------------------
-- Table structure for `zz_yunorder`
-- ----------------------------
DROP TABLE IF EXISTS `zz_yunorder`;
CREATE TABLE `zz_yunorder` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_sn` varchar(60) NOT NULL COMMENT '订单编号',
  `mid` int(11) NOT NULL,
  `username` varchar(60) NOT NULL,
  `pay_points` int(11) NOT NULL DEFAULT '0' COMMENT '支付积分',
  `db_points` int(10) NOT NULL DEFAULT '0' COMMENT '夺宝币',
  `user_money` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '可用余额',
  `discount` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '优惠',
  `total` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '订单总额',
  `order_amount` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '应付金额',
  `pay_id` int(11) NOT NULL DEFAULT '0' COMMENT '支付ID',
  `pay_name` varchar(30) NOT NULL DEFAULT '' COMMENT '支付名称',
  `pay_code` varchar(30) NOT NULL DEFAULT '' COMMENT '支付代码',
  `db_time` varchar(30) NOT NULL DEFAULT '' COMMENT '夺宝时间微秒',
  `add_time` int(10) NOT NULL COMMENT '添加时间',
  `status` smallint(3) DEFAULT '1' COMMENT '状态:1未支付2已支付',
  `type` smallint(3) DEFAULT '1' COMMENT '类型',
  `sharecode` char(5) NOT NULL DEFAULT '' COMMENT '分享码',
  `used_sharecode` char(5) NOT NULL DEFAULT '' COMMENT '使用过分享码',
  `user_bonus_id` varchar(255) NOT NULL DEFAULT '0' COMMENT '发放的抵用券ID',
  `status_buy` tinyint(1) DEFAULT '0' COMMENT '0无直购商品 1直购商品未付款 2直购商品已付款',
  PRIMARY KEY (`order_id`),
  UNIQUE KEY `order_id` (`order_id`),
  KEY `IDX_MID` (`mid`),
  KEY `IDX_ORDER_SN` (`order_sn`)
) ENGINE=MyISAM AUTO_INCREMENT=15813 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of zz_yunorder
-- ----------------------------
