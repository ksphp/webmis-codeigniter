#
# TABLE STRUCTURE FOR: wmis_class_web
#

DROP TABLE IF EXISTS `wmis_class_web`;

CREATE TABLE `wmis_class_web` (
  `id` int(3) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `fid` int(3) NOT NULL COMMENT 'FID',
  `title` varchar(12) NOT NULL COMMENT '分类名称',
  `url` varchar(32) NOT NULL COMMENT 'URL地址',
  `ico` varchar(12) DEFAULT NULL COMMENT '图标样式',
  `remark` varchar(30) NOT NULL COMMENT '备注',
  `ctime` datetime DEFAULT NULL COMMENT '创建时间',
  `sort` int(3) NOT NULL DEFAULT '0' COMMENT '排序',
  `state` varchar(1) NOT NULL DEFAULT '0' COMMENT '状态',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

INSERT INTO `wmis_class_web` (`id`, `fid`, `title`, `url`, `ico`, `remark`, `ctime`, `sort`, `state`) VALUES ('1', '0', '首页', 'index_c', 'ico-home', '网站首页！', '2012-06-01 14:28:17', '0', '1');
INSERT INTO `wmis_class_web` (`id`, `fid`, `title`, `url`, `ico`, `remark`, `ctime`, `sort`, `state`) VALUES ('2', '0', '新闻中心', 'news', NULL, '网站分类！', '2012-06-01 17:17:07', '0', '1');


#
# TABLE STRUCTURE FOR: wmis_sys_admin
#

DROP TABLE IF EXISTS `wmis_sys_admin`;

CREATE TABLE `wmis_sys_admin` (
  `id` int(3) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `uname` varchar(16) NOT NULL COMMENT '用户名',
  `password` varchar(32) NOT NULL COMMENT '密码',
  `email` varchar(32) NOT NULL COMMENT '邮箱',
  `name` varchar(12) DEFAULT NULL COMMENT '姓名',
  `department` varchar(12) DEFAULT NULL COMMENT '部门',
  `position` varchar(12) DEFAULT NULL COMMENT '职位',
  `rtime` datetime DEFAULT NULL COMMENT '注册时间',
  `state` varchar(1) NOT NULL DEFAULT '0' COMMENT '状态',
  `perm` text COMMENT '权限',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

INSERT INTO `wmis_sys_admin` (`id`, `uname`, `password`, `email`, `name`, `department`, `position`, `rtime`, `state`, `perm`) VALUES ('1', 'admin', '8d37796cd6857b5b2d6721b2d25829ee', 'admin@ksphp.com', '系统管理员', '信息部', '系统管理员', '2010-01-01 08:00:00', '1', '1:0 2:0 16:0 29:0 3:0 4:0 14:0 5:0 23:0 17:0 20:0 12:0 6:0 7:1 15:1 8:31 9:31 10:31 22:1 26:1 24:65 25:145 18:319 19:63 27:63 28:63 21:27 13:19 11:1');


#
# TABLE STRUCTURE FOR: wmis_sys_menus
#

DROP TABLE IF EXISTS `wmis_sys_menus`;

CREATE TABLE `wmis_sys_menus` (
  `id` int(3) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `fid` int(3) NOT NULL COMMENT 'FID',
  `title` varchar(32) NOT NULL COMMENT 'Name',
  `url` varchar(24) NOT NULL COMMENT 'Controller',
  `perm` varchar(6) NOT NULL DEFAULT '0' COMMENT '动作权限',
  `ico` varchar(12) DEFAULT NULL COMMENT '图标样式',
  `remark` varchar(30) DEFAULT NULL COMMENT 'Remark',
  `ctime` datetime DEFAULT NULL COMMENT '创建时间',
  `sort` int(3) NOT NULL DEFAULT '0' COMMENT '排序',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;

INSERT INTO `wmis_sys_menus` (`id`, `fid`, `title`, `url`, `perm`, `ico`, `remark`, `ctime`, `sort`) VALUES ('1', '0', 'menu_home', 'welcome', '0', 'ico-home', NULL, '2010-01-01 08:00:00', '1');
INSERT INTO `wmis_sys_menus` (`id`, `fid`, `title`, `url`, `perm`, `ico`, `remark`, `ctime`, `sort`) VALUES ('2', '0', 'menu_system', 'system', '0', 'ico-system', NULL, '2010-01-01 08:00:00', '2');
INSERT INTO `wmis_sys_menus` (`id`, `fid`, `title`, `url`, `perm`, `ico`, `remark`, `ctime`, `sort`) VALUES ('3', '0', 'menu_help', 'help', '0', 'ico-help', NULL, '2010-01-01 08:00:00', '5');
INSERT INTO `wmis_sys_menus` (`id`, `fid`, `title`, `url`, `perm`, `ico`, `remark`, `ctime`, `sort`) VALUES ('4', '1', 'menu_home_desktop', '#', '0', 'ico-disktop', NULL, '2010-01-01 08:00:00', '0');
INSERT INTO `wmis_sys_menus` (`id`, `fid`, `title`, `url`, `perm`, `ico`, `remark`, `ctime`, `sort`) VALUES ('5', '2', 'menu_sys_management', '#', '0', 'ico-system1', NULL, '2010-01-01 08:00:00', '0');
INSERT INTO `wmis_sys_menus` (`id`, `fid`, `title`, `url`, `perm`, `ico`, `remark`, `ctime`, `sort`) VALUES ('6', '3', 'menu_help_doc', '#', '0', 'ico-help', NULL, '2010-01-01 08:00:00', '0');
INSERT INTO `wmis_sys_menus` (`id`, `fid`, `title`, `url`, `perm`, `ico`, `remark`, `ctime`, `sort`) VALUES ('7', '4', 'menu_home_userHome', 'desktop', '1', 'ico-user1', NULL, '2010-01-01 08:00:00', '0');
INSERT INTO `wmis_sys_menus` (`id`, `fid`, `title`, `url`, `perm`, `ico`, `remark`, `ctime`, `sort`) VALUES ('8', '5', 'menu_sys_m_menu', 'sys_menus', '31', 'ico-menu', NULL, '2010-01-01 08:00:00', '0');
INSERT INTO `wmis_sys_menus` (`id`, `fid`, `title`, `url`, `perm`, `ico`, `remark`, `ctime`, `sort`) VALUES ('9', '5', 'menu_sys_m_action', 'sys_menus_action', '31', 'ico-menuA', NULL, '2010-01-01 08:00:00', '0');
INSERT INTO `wmis_sys_menus` (`id`, `fid`, `title`, `url`, `perm`, `ico`, `remark`, `ctime`, `sort`) VALUES ('10', '5', 'menu_sys_m_admin', 'sys_admin', '31', 'ico-admin', NULL, '2010-01-01 08:00:00', '0');
INSERT INTO `wmis_sys_menus` (`id`, `fid`, `title`, `url`, `perm`, `ico`, `remark`, `ctime`, `sort`) VALUES ('11', '6', 'menu_help_system', 'help_system', '1', '', NULL, '2010-01-01 08:00:00', '0');
INSERT INTO `wmis_sys_menus` (`id`, `fid`, `title`, `url`, `perm`, `ico`, `remark`, `ctime`, `sort`) VALUES ('12', '29', 'menu_log_system', '#', '0', 'ico-logs', NULL, '2012-03-30 09:03:18', '0');
INSERT INTO `wmis_sys_menus` (`id`, `fid`, `title`, `url`, `perm`, `ico`, `remark`, `ctime`, `sort`) VALUES ('13', '12', 'menu_log_adminLogin', 'log_admin_login', '19', 'ico-logs1', NULL, '2012-03-30 09:29:20', '0');
INSERT INTO `wmis_sys_menus` (`id`, `fid`, `title`, `url`, `perm`, `ico`, `remark`, `ctime`, `sort`) VALUES ('14', '1', 'menu_home_user', '#', '0', 'ico-user', NULL, '2012-03-30 14:49:29', '0');
INSERT INTO `wmis_sys_menus` (`id`, `fid`, `title`, `url`, `perm`, `ico`, `remark`, `ctime`, `sort`) VALUES ('15', '14', 'menu_home_userPWD', 'sys_change_passwd', '1', 'ico-pwd', NULL, '2012-03-30 14:37:30', '0');
INSERT INTO `wmis_sys_menus` (`id`, `fid`, `title`, `url`, `perm`, `ico`, `remark`, `ctime`, `sort`) VALUES ('16', '0', 'menu_web', 'web', '0', 'ico-web', NULL, '2012-03-31 09:10:58', '3');
INSERT INTO `wmis_sys_menus` (`id`, `fid`, `title`, `url`, `perm`, `ico`, `remark`, `ctime`, `sort`) VALUES ('17', '16', 'menu_web_management', '#', '0', 'ico-web', NULL, '2012-03-31 09:42:59', '0');
INSERT INTO `wmis_sys_menus` (`id`, `fid`, `title`, `url`, `perm`, `ico`, `remark`, `ctime`, `sort`) VALUES ('18', '17', 'menu_web_m_news', 'web_news', '319', NULL, NULL, '2012-03-31 10:53:01', '0');
INSERT INTO `wmis_sys_menus` (`id`, `fid`, `title`, `url`, `perm`, `ico`, `remark`, `ctime`, `sort`) VALUES ('19', '17', 'menu_web_class', 'class_web', '63', NULL, NULL, '2012-03-31 10:45:05', '0');
INSERT INTO `wmis_sys_menus` (`id`, `fid`, `title`, `url`, `perm`, `ico`, `remark`, `ctime`, `sort`) VALUES ('22', '5', 'menu_sys_m_config', 'sys_config', '1', 'ico-system2', NULL, '2012-05-30 19:12:52', '0');
INSERT INTO `wmis_sys_menus` (`id`, `fid`, `title`, `url`, `perm`, `ico`, `remark`, `ctime`, `sort`) VALUES ('23', '2', 'menu_sys_database', '#', '0', 'ico-db', NULL, '2012-08-16 14:06:33', '0');
INSERT INTO `wmis_sys_menus` (`id`, `fid`, `title`, `url`, `perm`, `ico`, `remark`, `ctime`, `sort`) VALUES ('24', '23', 'menu_sys_db_backup', 'sys_db_backup', '65', 'ico-exp', NULL, '2012-08-16 14:09:42', '0');
INSERT INTO `wmis_sys_menus` (`id`, `fid`, `title`, `url`, `perm`, `ico`, `remark`, `ctime`, `sort`) VALUES ('25', '23', 'menu_sys_db_recovery', 'sys_db_restore', '145', 'ico-imp', NULL, '2012-08-16 14:10:19', '0');
INSERT INTO `wmis_sys_menus` (`id`, `fid`, `title`, `url`, `perm`, `ico`, `remark`, `ctime`, `sort`) VALUES ('26', '5', 'menu_sys_m_files', 'sys_filemanager', '1', 'ico-fileM', NULL, '2013-07-03 13:33:29', '0');
INSERT INTO `wmis_sys_menus` (`id`, `fid`, `title`, `url`, `perm`, `ico`, `remark`, `ctime`, `sort`) VALUES ('29', '0', 'menu_log', 'log', '0', 'ico-logs', NULL, '2014-06-25 12:30:26', '4');


#
# TABLE STRUCTURE FOR: wmis_sys_menus_action
#

DROP TABLE IF EXISTS `wmis_sys_menus_action`;

CREATE TABLE `wmis_sys_menus_action` (
  `id` int(2) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `name` varchar(32) NOT NULL COMMENT 'Name',
  `perm` varchar(6) NOT NULL COMMENT 'Authority',
  `ico` varchar(12) DEFAULT NULL COMMENT 'ICON',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

INSERT INTO `wmis_sys_menus_action` (`id`, `name`, `perm`, `ico`) VALUES ('1', 'action_list', '1', 'ico-list');
INSERT INTO `wmis_sys_menus_action` (`id`, `name`, `perm`, `ico`) VALUES ('2', 'action_sea', '2', 'ico-search');
INSERT INTO `wmis_sys_menus_action` (`id`, `name`, `perm`, `ico`) VALUES ('3', 'action_add', '4', 'ico-add');
INSERT INTO `wmis_sys_menus_action` (`id`, `name`, `perm`, `ico`) VALUES ('4', 'action_edit', '8', 'ico-edit');
INSERT INTO `wmis_sys_menus_action` (`id`, `name`, `perm`, `ico`) VALUES ('5', 'action_remove', '16', 'ico-del');
INSERT INTO `wmis_sys_menus_action` (`id`, `name`, `perm`, `ico`) VALUES ('6', 'action_audit', '32', 'ico-audit');
INSERT INTO `wmis_sys_menus_action` (`id`, `name`, `perm`, `ico`) VALUES ('7', 'action_export', '64', 'ico-exp');
INSERT INTO `wmis_sys_menus_action` (`id`, `name`, `perm`, `ico`) VALUES ('8', 'action_import', '128', 'ico-imp');
INSERT INTO `wmis_sys_menus_action` (`id`, `name`, `perm`, `ico`) VALUES ('9', 'action_chart', '256', 'ico-chart');


#
# TABLE STRUCTURE FOR: wmis_web_news
#

DROP TABLE IF EXISTS `wmis_web_news`;

CREATE TABLE `wmis_web_news` (
  `id` int(6) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `class` varchar(24) NOT NULL COMMENT '所属分类',
  `title` varchar(36) NOT NULL COMMENT '标题',
  `img` varchar(300) DEFAULT NULL COMMENT '封面图片',
  `upload` text NOT NULL COMMENT '上传文件',
  `source` varchar(24) NOT NULL COMMENT '来源',
  `author` varchar(12) NOT NULL COMMENT '作者',
  `uname` varchar(16) NOT NULL COMMENT '用户名',
  `ctime` datetime DEFAULT NULL COMMENT '发布时间',
  `click` int(6) NOT NULL COMMENT '点击次数',
  `key` varchar(64) DEFAULT NULL COMMENT '关键字',
  `audit` varchar(16) DEFAULT NULL COMMENT '发布人',
  `atime` datetime DEFAULT NULL COMMENT '审核时间',
  `state` varchar(1) NOT NULL DEFAULT '0' COMMENT '状态',
  `summary` varchar(300) DEFAULT NULL COMMENT '摘要',
  `content` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

