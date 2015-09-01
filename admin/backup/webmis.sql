#
# TABLE STRUCTURE FOR: wmis_class_web
#

DROP TABLE IF EXISTS `wmis_class_web`;

CREATE TABLE `wmis_class_web` (
  `id` int(3) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `fid` int(3) NOT NULL COMMENT 'FID',
  `title` varchar(16) NOT NULL COMMENT 'Title',
  `url` varchar(32) NOT NULL COMMENT 'URL',
  `ico` varchar(12) DEFAULT NULL COMMENT 'Icon',
  `remark` varchar(30) NOT NULL COMMENT 'Remark',
  `ctime` datetime DEFAULT NULL COMMENT 'Create time',
  `sort` int(3) NOT NULL DEFAULT '0' COMMENT 'Sort',
  `state` varchar(1) NOT NULL DEFAULT '0' COMMENT 'State',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

INSERT INTO `wmis_class_web` (`id`, `fid`, `title`, `url`, `ico`, `remark`, `ctime`, `sort`, `state`) VALUES ('1', '0', 'Home', 'home', 'ico-home', '', '2012-06-01 14:28:17', '0', '1');
INSERT INTO `wmis_class_web` (`id`, `fid`, `title`, `url`, `ico`, `remark`, `ctime`, `sort`, `state`) VALUES ('2', '0', 'News', 'news', '', '', '2012-06-01 17:17:07', '0', '1');


#
# TABLE STRUCTURE FOR: wmis_sys_admin
#

DROP TABLE IF EXISTS `wmis_sys_admin`;

CREATE TABLE `wmis_sys_admin` (
  `id` int(3) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `uname` varchar(16) NOT NULL COMMENT 'UserName',
  `password` varchar(32) NOT NULL COMMENT 'PassWord',
  `email` varchar(32) NOT NULL COMMENT 'Email',
  `name` varchar(24) DEFAULT NULL COMMENT 'Name',
  `department` varchar(12) DEFAULT NULL COMMENT 'Department',
  `position` varchar(12) DEFAULT NULL COMMENT 'Position',
  `rtime` datetime DEFAULT NULL COMMENT 'Registration time',
  `state` varchar(1) NOT NULL DEFAULT '0' COMMENT 'State',
  `perm` text COMMENT 'Authority',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

INSERT INTO `wmis_sys_admin` (`id`, `uname`, `password`, `email`, `name`, `department`, `position`, `rtime`, `state`, `perm`) VALUES ('1', 'admin', '8d37796cd6857b5b2d6721b2d25829ee', 'admin@ksphp.com', 'Administrator', 'Department', 'Position', '2010-01-01 08:00:00', '1', '1:0 2:0 3:0 4:0 5:0 6:0 8:0 10:0 16:0 23:0 19:0 21:0 7:1 9:1 11:31 12:31 13:31 14:1 15:1 17:81 18:145 24:319 25:63 20:19 22:1');
INSERT INTO `wmis_sys_admin` (`id`, `uname`, `password`, `email`, `name`, `department`, `position`, `rtime`, `state`, `perm`) VALUES ('2', 'webmis', '062d13422d6f79880a24408445f214ec', 'test@ksphp.com', 'Test', 'Test', 'Test', '2015-07-22 10:44:58', '1', '1:0 2:0 3:0 4:0 5:0 6:0 8:0 10:0 16:0 23:0 19:0 21:0 7:1 9:1 11:31 12:31 13:31 14:1 15:1 17:65 18:129 24:319 25:63 20:19 22:1');


#
# TABLE STRUCTURE FOR: wmis_sys_menus
#

DROP TABLE IF EXISTS `wmis_sys_menus`;

CREATE TABLE `wmis_sys_menus` (
  `id` int(3) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `fid` int(3) NOT NULL COMMENT 'FID',
  `title` varchar(32) NOT NULL COMMENT 'Name',
  `url` varchar(32) NOT NULL COMMENT 'Controller',
  `perm` varchar(6) NOT NULL DEFAULT '0' COMMENT 'Authority',
  `ico` varchar(16) DEFAULT NULL COMMENT 'ICON',
  `remark` varchar(30) DEFAULT NULL COMMENT 'Remark',
  `ctime` datetime DEFAULT NULL COMMENT 'Create time',
  `sort` int(3) NOT NULL DEFAULT '0' COMMENT 'Sort',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

INSERT INTO `wmis_sys_menus` (`id`, `fid`, `title`, `url`, `perm`, `ico`, `remark`, `ctime`, `sort`) VALUES ('1', '0', 'menu_home', 'welcome', '0', 'ico-home', NULL, '2010-01-01 08:00:00', '1');
INSERT INTO `wmis_sys_menus` (`id`, `fid`, `title`, `url`, `perm`, `ico`, `remark`, `ctime`, `sort`) VALUES ('2', '0', 'menu_system', 'system', '0', 'ico-system', NULL, '2010-01-01 08:00:00', '2');
INSERT INTO `wmis_sys_menus` (`id`, `fid`, `title`, `url`, `perm`, `ico`, `remark`, `ctime`, `sort`) VALUES ('3', '0', 'menu_web', 'web', '0', 'ico-web', NULL, '2012-03-31 09:10:58', '3');
INSERT INTO `wmis_sys_menus` (`id`, `fid`, `title`, `url`, `perm`, `ico`, `remark`, `ctime`, `sort`) VALUES ('4', '0', 'menu_log', 'log', '0', 'ico-logs', NULL, '2014-06-25 12:30:26', '4');
INSERT INTO `wmis_sys_menus` (`id`, `fid`, `title`, `url`, `perm`, `ico`, `remark`, `ctime`, `sort`) VALUES ('5', '0', 'menu_help', 'help', '0', 'ico-help', NULL, '2010-01-01 08:00:00', '5');
INSERT INTO `wmis_sys_menus` (`id`, `fid`, `title`, `url`, `perm`, `ico`, `remark`, `ctime`, `sort`) VALUES ('6', '1', 'menu_home_desktop', '', '0', 'ico-disktop', '', '2010-01-01 08:00:00', '0');
INSERT INTO `wmis_sys_menus` (`id`, `fid`, `title`, `url`, `perm`, `ico`, `remark`, `ctime`, `sort`) VALUES ('7', '6', 'menu_home_userHome', 'desktop', '1', 'ico-user1', NULL, '2010-01-01 08:00:00', '0');
INSERT INTO `wmis_sys_menus` (`id`, `fid`, `title`, `url`, `perm`, `ico`, `remark`, `ctime`, `sort`) VALUES ('8', '1', 'menu_home_user', '', '0', 'ico-user', '', '2012-03-30 14:49:29', '0');
INSERT INTO `wmis_sys_menus` (`id`, `fid`, `title`, `url`, `perm`, `ico`, `remark`, `ctime`, `sort`) VALUES ('9', '8', 'menu_home_userPWD', 'sys_change_passwd', '1', 'ico-pwd', NULL, '2012-03-30 14:37:30', '0');
INSERT INTO `wmis_sys_menus` (`id`, `fid`, `title`, `url`, `perm`, `ico`, `remark`, `ctime`, `sort`) VALUES ('10', '2', 'menu_sys_management', '', '0', 'ico-system1', '', '2010-01-01 08:00:00', '0');
INSERT INTO `wmis_sys_menus` (`id`, `fid`, `title`, `url`, `perm`, `ico`, `remark`, `ctime`, `sort`) VALUES ('11', '10', 'menu_sys_m_menu', 'sys_menus', '31', 'ico-menu', NULL, '2010-01-01 08:00:00', '0');
INSERT INTO `wmis_sys_menus` (`id`, `fid`, `title`, `url`, `perm`, `ico`, `remark`, `ctime`, `sort`) VALUES ('12', '10', 'menu_sys_m_action', 'sys_menus_action', '31', 'ico-menuA', NULL, '2010-01-01 08:00:00', '0');
INSERT INTO `wmis_sys_menus` (`id`, `fid`, `title`, `url`, `perm`, `ico`, `remark`, `ctime`, `sort`) VALUES ('13', '10', 'menu_sys_m_admin', 'sys_admin', '31', 'ico-admin', NULL, '2010-01-01 08:00:00', '0');
INSERT INTO `wmis_sys_menus` (`id`, `fid`, `title`, `url`, `perm`, `ico`, `remark`, `ctime`, `sort`) VALUES ('14', '10', 'menu_sys_m_config', 'sys_config', '1', 'ico-system2', NULL, '2012-05-30 19:12:52', '0');
INSERT INTO `wmis_sys_menus` (`id`, `fid`, `title`, `url`, `perm`, `ico`, `remark`, `ctime`, `sort`) VALUES ('15', '10', 'menu_sys_m_files', 'sys_filemanager', '1', 'ico-fileM', NULL, '2013-07-03 13:33:29', '0');
INSERT INTO `wmis_sys_menus` (`id`, `fid`, `title`, `url`, `perm`, `ico`, `remark`, `ctime`, `sort`) VALUES ('16', '2', 'menu_sys_database', '', '0', 'ico-db', '', '2012-08-16 14:06:33', '0');
INSERT INTO `wmis_sys_menus` (`id`, `fid`, `title`, `url`, `perm`, `ico`, `remark`, `ctime`, `sort`) VALUES ('17', '16', 'menu_sys_db_backup', 'sys_db_backup', '81', 'ico-exp', '', '2012-08-16 14:09:42', '0');
INSERT INTO `wmis_sys_menus` (`id`, `fid`, `title`, `url`, `perm`, `ico`, `remark`, `ctime`, `sort`) VALUES ('18', '16', 'menu_sys_db_recovery', 'sys_db_restore', '145', 'ico-imp', NULL, '2012-08-16 14:10:19', '0');
INSERT INTO `wmis_sys_menus` (`id`, `fid`, `title`, `url`, `perm`, `ico`, `remark`, `ctime`, `sort`) VALUES ('19', '4', 'menu_log_system', '', '0', 'ico-logs', '', '2012-03-30 09:03:18', '0');
INSERT INTO `wmis_sys_menus` (`id`, `fid`, `title`, `url`, `perm`, `ico`, `remark`, `ctime`, `sort`) VALUES ('20', '19', 'menu_log_adminLogin', 'log_admin_login', '19', 'ico-logs1', NULL, '2012-03-30 09:29:20', '0');
INSERT INTO `wmis_sys_menus` (`id`, `fid`, `title`, `url`, `perm`, `ico`, `remark`, `ctime`, `sort`) VALUES ('21', '5', 'menu_help_doc', '', '0', 'ico-help', '', '2010-01-01 08:00:00', '0');
INSERT INTO `wmis_sys_menus` (`id`, `fid`, `title`, `url`, `perm`, `ico`, `remark`, `ctime`, `sort`) VALUES ('22', '21', 'menu_help_system', 'help_system', '1', '', NULL, '2010-01-01 08:00:00', '0');
INSERT INTO `wmis_sys_menus` (`id`, `fid`, `title`, `url`, `perm`, `ico`, `remark`, `ctime`, `sort`) VALUES ('23', '3', 'menu_web_management', '', '0', 'ico-web', '', '2012-03-31 09:42:59', '0');
INSERT INTO `wmis_sys_menus` (`id`, `fid`, `title`, `url`, `perm`, `ico`, `remark`, `ctime`, `sort`) VALUES ('24', '23', 'menu_web_m_news', 'web_news', '319', '', '', '2012-03-31 10:53:01', '0');
INSERT INTO `wmis_sys_menus` (`id`, `fid`, `title`, `url`, `perm`, `ico`, `remark`, `ctime`, `sort`) VALUES ('25', '23', 'menu_web_class', 'class_web', '63', '', '', '2012-03-31 10:45:05', '0');


#
# TABLE STRUCTURE FOR: wmis_sys_menus_action
#

DROP TABLE IF EXISTS `wmis_sys_menus_action`;

CREATE TABLE `wmis_sys_menus_action` (
  `id` int(2) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `name` varchar(32) NOT NULL COMMENT 'Name',
  `perm` varchar(6) NOT NULL COMMENT 'Authority',
  `ico` varchar(24) DEFAULT NULL COMMENT 'ICON',
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


