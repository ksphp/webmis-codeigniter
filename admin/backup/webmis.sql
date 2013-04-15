#
# TABLE STRUCTURE FOR: wmis_sys_admin
#

DROP TABLE IF EXISTS wmis_sys_admin;

CREATE TABLE `wmis_sys_admin` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `uname` varchar(16) NOT NULL,
  `password` varchar(32) NOT NULL,
  `email` varchar(32) NOT NULL,
  `name` varchar(12) NOT NULL,
  `department` varchar(12) NOT NULL,
  `position` varchar(12) NOT NULL,
  `rtime` varchar(19) NOT NULL DEFAULT '2010-01-01 08:00:00',
  `state` varchar(1) NOT NULL DEFAULT '0',
  `perm` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

INSERT INTO wmis_sys_admin (`id`, `uname`, `password`, `email`, `name`, `department`, `position`, `rtime`, `state`, `perm`) VALUES (1, 'admin', 'f6fdffe48c908deb0f4c3bd36c032e72', 'admin@ksphp.com', '系统管理员', '信息部', '系统管理员', '2010-01-01 08:00:00', '1', '1:0 2:0 16:0 3:0 4:0 14:0 5:0 12:0 23:0 17:0 20:0 6:0 7:1 15:0 8:31 9:31 10:31 22:1 13:19 24:65 25:145 18:63 19:31 21:27 11:1');
INSERT INTO wmis_sys_admin (`id`, `uname`, `password`, `email`, `name`, `department`, `position`, `rtime`, `state`, `perm`) VALUES (2, 'webmis', '062d13422d6f79880a24408445f214ec', 'test@ksphp.com', '测试用户', '测试部', '测试员', '2013-03-25 13:57:03', '1', '1:0 2:0 16:0 3:0 4:0 14:0 5:0 12:0 23:0 17:0 20:0 6:0 7:1 15:0 8:31 9:31 10:31 22:1 13:19 24:65 25:129 18:63 19:31 21:27 11:1');


#
# TABLE STRUCTURE FOR: wmis_sys_admin_login_log
#

DROP TABLE IF EXISTS wmis_sys_admin_login_log;

CREATE TABLE `wmis_sys_admin_login_log` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `type` varchar(2) NOT NULL,
  `uname` varchar(12) NOT NULL,
  `ip` varchar(16) NOT NULL,
  `time` varchar(19) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=utf8;

INSERT INTO wmis_sys_admin_login_log (`id`, `type`, `uname`, `ip`, `time`) VALUES (1, '失败', 'kingsoul', '127.0.0.1', '2012-10-25 13:40:51');
INSERT INTO wmis_sys_admin_login_log (`id`, `type`, `uname`, `ip`, `time`) VALUES (2, '禁用', 'admin', '127.0.0.1', '2012-10-25 13:40:59');
INSERT INTO wmis_sys_admin_login_log (`id`, `type`, `uname`, `ip`, `time`) VALUES (3, '登录', 'admin', '127.0.0.1', '2012-10-25 13:41:26');
INSERT INTO wmis_sys_admin_login_log (`id`, `type`, `uname`, `ip`, `time`) VALUES (4, '退出', 'admin', '127.0.0.1', '2012-10-25 13:42:04');
INSERT INTO wmis_sys_admin_login_log (`id`, `type`, `uname`, `ip`, `time`) VALUES (5, '登录', 'admin', '127.0.0.1', '2012-10-25 13:42:10');
INSERT INTO wmis_sys_admin_login_log (`id`, `type`, `uname`, `ip`, `time`) VALUES (6, '退出', 'admin', '127.0.0.1', '2012-10-25 13:42:14');
INSERT INTO wmis_sys_admin_login_log (`id`, `type`, `uname`, `ip`, `time`) VALUES (7, '登录', 'admin', '127.0.0.1', '2012-10-25 13:42:19');
INSERT INTO wmis_sys_admin_login_log (`id`, `type`, `uname`, `ip`, `time`) VALUES (8, '失败', 'kingsoul', '127.0.0.1', '2012-10-25 14:20:55');
INSERT INTO wmis_sys_admin_login_log (`id`, `type`, `uname`, `ip`, `time`) VALUES (9, '登录', 'admin', '127.0.0.1', '2012-10-25 14:21:07');
INSERT INTO wmis_sys_admin_login_log (`id`, `type`, `uname`, `ip`, `time`) VALUES (10, '失败', 'kingsoul', '127.0.0.1', '2012-10-29 16:31:14');
INSERT INTO wmis_sys_admin_login_log (`id`, `type`, `uname`, `ip`, `time`) VALUES (11, '失败', 'kingsoul', '127.0.0.1', '2012-10-29 16:31:15');
INSERT INTO wmis_sys_admin_login_log (`id`, `type`, `uname`, `ip`, `time`) VALUES (12, '失败', 'admin', '127.0.0.1', '2012-10-29 16:31:27');
INSERT INTO wmis_sys_admin_login_log (`id`, `type`, `uname`, `ip`, `time`) VALUES (13, '失败', 'admin', '127.0.0.1', '2012-10-29 16:31:28');
INSERT INTO wmis_sys_admin_login_log (`id`, `type`, `uname`, `ip`, `time`) VALUES (14, '登录', 'admin', '127.0.0.1', '2012-10-29 16:31:35');
INSERT INTO wmis_sys_admin_login_log (`id`, `type`, `uname`, `ip`, `time`) VALUES (15, '退出', 'admin', '127.0.0.1', '2012-10-29 16:32:45');
INSERT INTO wmis_sys_admin_login_log (`id`, `type`, `uname`, `ip`, `time`) VALUES (16, '登录', 'admin', '127.0.0.1', '2012-10-29 16:36:56');
INSERT INTO wmis_sys_admin_login_log (`id`, `type`, `uname`, `ip`, `time`) VALUES (17, '登录', 'admin', '127.0.0.1', '2012-10-29 17:05:47');
INSERT INTO wmis_sys_admin_login_log (`id`, `type`, `uname`, `ip`, `time`) VALUES (18, '退出', 'Auto Logout', '127.0.0.1', '2012-10-30 12:48:06');
INSERT INTO wmis_sys_admin_login_log (`id`, `type`, `uname`, `ip`, `time`) VALUES (19, '登录', 'admin', '127.0.0.1', '2012-10-30 12:49:54');
INSERT INTO wmis_sys_admin_login_log (`id`, `type`, `uname`, `ip`, `time`) VALUES (20, '退出', 'admin', '127.0.0.1', '2012-10-30 12:59:27');
INSERT INTO wmis_sys_admin_login_log (`id`, `type`, `uname`, `ip`, `time`) VALUES (21, '登录', 'admin', '127.0.0.1', '2012-10-30 13:41:50');
INSERT INTO wmis_sys_admin_login_log (`id`, `type`, `uname`, `ip`, `time`) VALUES (22, '失败', 'kingsoul', '127.0.0.1', '2012-10-31 13:16:44');
INSERT INTO wmis_sys_admin_login_log (`id`, `type`, `uname`, `ip`, `time`) VALUES (23, '登录', 'admin', '127.0.0.1', '2012-10-31 13:16:51');
INSERT INTO wmis_sys_admin_login_log (`id`, `type`, `uname`, `ip`, `time`) VALUES (24, '登录', 'admin', '127.0.0.1', '2012-10-31 13:48:41');
INSERT INTO wmis_sys_admin_login_log (`id`, `type`, `uname`, `ip`, `time`) VALUES (25, '退出', 'admin', '127.0.0.1', '2012-10-31 13:57:30');
INSERT INTO wmis_sys_admin_login_log (`id`, `type`, `uname`, `ip`, `time`) VALUES (26, '登录', 'admin', '127.0.0.1', '2012-10-31 14:14:05');
INSERT INTO wmis_sys_admin_login_log (`id`, `type`, `uname`, `ip`, `time`) VALUES (27, '失败', 'kingsoul', '127.0.0.1', '2012-11-01 14:03:34');
INSERT INTO wmis_sys_admin_login_log (`id`, `type`, `uname`, `ip`, `time`) VALUES (28, '登录', 'admin', '127.0.0.1', '2012-11-01 14:03:41');
INSERT INTO wmis_sys_admin_login_log (`id`, `type`, `uname`, `ip`, `time`) VALUES (29, '退出', 'Auto Logout', '127.0.0.1', '2012-11-01 18:05:21');
INSERT INTO wmis_sys_admin_login_log (`id`, `type`, `uname`, `ip`, `time`) VALUES (30, '登录', 'admin', '127.0.0.1', '2012-11-01 18:17:01');
INSERT INTO wmis_sys_admin_login_log (`id`, `type`, `uname`, `ip`, `time`) VALUES (31, '退出', 'Auto Logout', '127.0.0.1', '2012-11-02 08:26:18');
INSERT INTO wmis_sys_admin_login_log (`id`, `type`, `uname`, `ip`, `time`) VALUES (32, '登录', 'admin', '127.0.0.1', '2012-11-02 08:32:08');
INSERT INTO wmis_sys_admin_login_log (`id`, `type`, `uname`, `ip`, `time`) VALUES (33, '退出', 'admin', '127.0.0.1', '2012-11-02 08:55:41');
INSERT INTO wmis_sys_admin_login_log (`id`, `type`, `uname`, `ip`, `time`) VALUES (34, '登录', 'admin', '127.0.0.1', '2012-11-02 08:56:48');
INSERT INTO wmis_sys_admin_login_log (`id`, `type`, `uname`, `ip`, `time`) VALUES (35, '退出', 'Auto Logout', '127.0.0.1', '2012-11-02 13:34:13');
INSERT INTO wmis_sys_admin_login_log (`id`, `type`, `uname`, `ip`, `time`) VALUES (36, '失败', 'admin', '127.0.0.1', '2012-11-02 13:49:51');
INSERT INTO wmis_sys_admin_login_log (`id`, `type`, `uname`, `ip`, `time`) VALUES (37, '失败', 'admin', '127.0.0.1', '2012-11-02 13:49:52');
INSERT INTO wmis_sys_admin_login_log (`id`, `type`, `uname`, `ip`, `time`) VALUES (38, '登录', 'admin', '127.0.0.1', '2012-11-02 13:50:01');
INSERT INTO wmis_sys_admin_login_log (`id`, `type`, `uname`, `ip`, `time`) VALUES (39, '退出', 'admin', '127.0.0.1', '2012-11-02 14:00:34');
INSERT INTO wmis_sys_admin_login_log (`id`, `type`, `uname`, `ip`, `time`) VALUES (40, '退出', 'Auto Logout', '127.0.0.1', '2012-11-02 19:19:52');
INSERT INTO wmis_sys_admin_login_log (`id`, `type`, `uname`, `ip`, `time`) VALUES (41, '登录', 'admin', '127.0.0.1', '2012-11-07 10:31:06');
INSERT INTO wmis_sys_admin_login_log (`id`, `type`, `uname`, `ip`, `time`) VALUES (42, '退出', 'Auto Logout', '127.0.0.1', '2012-11-13 19:24:03');
INSERT INTO wmis_sys_admin_login_log (`id`, `type`, `uname`, `ip`, `time`) VALUES (43, '失败', 'kingsoul', '127.0.0.1', '2012-11-13 19:24:14');
INSERT INTO wmis_sys_admin_login_log (`id`, `type`, `uname`, `ip`, `time`) VALUES (44, '登录', 'admin', '127.0.0.1', '2012-11-13 19:24:25');
INSERT INTO wmis_sys_admin_login_log (`id`, `type`, `uname`, `ip`, `time`) VALUES (45, '退出', 'admin', '127.0.0.1', '2012-11-13 20:10:21');
INSERT INTO wmis_sys_admin_login_log (`id`, `type`, `uname`, `ip`, `time`) VALUES (46, '退出', 'kingsoul', '127.0.0.1', '2013-03-25 13:43:40');
INSERT INTO wmis_sys_admin_login_log (`id`, `type`, `uname`, `ip`, `time`) VALUES (47, '失败', 'kingsoul', '127.0.0.1', '2013-03-25 13:43:50');
INSERT INTO wmis_sys_admin_login_log (`id`, `type`, `uname`, `ip`, `time`) VALUES (48, '登录', 'admin', '127.0.0.1', '2013-03-25 13:43:58');
INSERT INTO wmis_sys_admin_login_log (`id`, `type`, `uname`, `ip`, `time`) VALUES (49, '退出', 'admin', '127.0.0.1', '2013-03-25 13:44:38');
INSERT INTO wmis_sys_admin_login_log (`id`, `type`, `uname`, `ip`, `time`) VALUES (50, '登录', 'admin', '127.0.0.1', '2013-03-25 13:44:49');
INSERT INTO wmis_sys_admin_login_log (`id`, `type`, `uname`, `ip`, `time`) VALUES (51, '退出', 'admin', '127.0.0.1', '2013-03-25 13:48:40');
INSERT INTO wmis_sys_admin_login_log (`id`, `type`, `uname`, `ip`, `time`) VALUES (52, '登录', 'admin', '127.0.0.1', '2013-03-25 13:48:47');
INSERT INTO wmis_sys_admin_login_log (`id`, `type`, `uname`, `ip`, `time`) VALUES (53, '退出', 'admin', '127.0.0.1', '2013-03-25 14:03:49');
INSERT INTO wmis_sys_admin_login_log (`id`, `type`, `uname`, `ip`, `time`) VALUES (54, '登录', 'webmis', '127.0.0.1', '2013-03-25 14:05:46');
INSERT INTO wmis_sys_admin_login_log (`id`, `type`, `uname`, `ip`, `time`) VALUES (55, '退出', 'Auto Logout', '127.0.0.1', '2013-03-25 14:37:20');
INSERT INTO wmis_sys_admin_login_log (`id`, `type`, `uname`, `ip`, `time`) VALUES (56, '登录', 'admin', '127.0.0.1', '2013-03-25 15:02:49');
INSERT INTO wmis_sys_admin_login_log (`id`, `type`, `uname`, `ip`, `time`) VALUES (57, '退出', 'Auto Logout', '127.0.0.1', '2013-03-26 09:05:41');
INSERT INTO wmis_sys_admin_login_log (`id`, `type`, `uname`, `ip`, `time`) VALUES (58, '登录', 'admin', '127.0.0.1', '2013-03-26 09:05:47');
INSERT INTO wmis_sys_admin_login_log (`id`, `type`, `uname`, `ip`, `time`) VALUES (59, '退出', 'admin', '127.0.0.1', '2013-03-26 09:06:42');
INSERT INTO wmis_sys_admin_login_log (`id`, `type`, `uname`, `ip`, `time`) VALUES (60, '失败', 'admin', '127.0.0.1', '2013-03-26 09:06:49');
INSERT INTO wmis_sys_admin_login_log (`id`, `type`, `uname`, `ip`, `time`) VALUES (61, '登录', 'admin', '127.0.0.1', '2013-03-26 09:06:58');


#
# TABLE STRUCTURE FOR: wmis_sys_config
#

DROP TABLE IF EXISTS wmis_sys_config;

CREATE TABLE `wmis_sys_config` (
  `name` varchar(12) NOT NULL,
  `contnet` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO wmis_sys_config (`name`, `contnet`) VALUES ('copy', 'Built by KSPHP and the <a href=\"http://www.ksphp.com/\" target=\"_blank\"><b>KSPHP.COM</b></a> community');
INSERT INTO wmis_sys_config (`name`, `contnet`) VALUES ('title', 'WebMIS v3.0管理员控制台');
INSERT INTO wmis_sys_config (`name`, `contnet`) VALUES ('backdir', 'backup');


#
# TABLE STRUCTURE FOR: wmis_sys_menus
#

DROP TABLE IF EXISTS wmis_sys_menus;

CREATE TABLE `wmis_sys_menus` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `fid` int(3) NOT NULL,
  `title` varchar(12) NOT NULL,
  `url` varchar(24) NOT NULL,
  `perm` varchar(6) NOT NULL DEFAULT '0',
  `remark` varchar(30) NOT NULL,
  `ctime` varchar(19) NOT NULL DEFAULT '2010-01-01 08:00:00',
  `sort` int(3) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

INSERT INTO wmis_sys_menus (`id`, `fid`, `title`, `url`, `perm`, `remark`, `ctime`, `sort`) VALUES (1, 0, '首页', 'M1', '0', '系统首页', '2010-01-01 08:00:00', 1);
INSERT INTO wmis_sys_menus (`id`, `fid`, `title`, `url`, `perm`, `remark`, `ctime`, `sort`) VALUES (2, 0, '系统', 'M1', '0', '系统管理、配置', '2010-01-01 08:00:00', 2);
INSERT INTO wmis_sys_menus (`id`, `fid`, `title`, `url`, `perm`, `remark`, `ctime`, `sort`) VALUES (3, 0, '帮助', 'M1', '0', '帮助文档！', '2010-01-01 08:00:00', 4);
INSERT INTO wmis_sys_menus (`id`, `fid`, `title`, `url`, `perm`, `remark`, `ctime`, `sort`) VALUES (4, 1, '桌面', 'M2', '0', '系统桌面！', '2010-01-01 08:00:00', 0);
INSERT INTO wmis_sys_menus (`id`, `fid`, `title`, `url`, `perm`, `remark`, `ctime`, `sort`) VALUES (5, 2, '系统管理', 'M2_System', '0', '系统高级管理！', '2010-01-01 08:00:00', 0);
INSERT INTO wmis_sys_menus (`id`, `fid`, `title`, `url`, `perm`, `remark`, `ctime`, `sort`) VALUES (6, 3, '帮助文档', 'M2_HelpText', '0', '帮助文档!', '2010-01-01 08:00:00', 0);
INSERT INTO wmis_sys_menus (`id`, `fid`, `title`, `url`, `perm`, `remark`, `ctime`, `sort`) VALUES (7, 4, '用户首页', 'welcome', '1', '系统用户首页！', '2010-01-01 08:00:00', 0);
INSERT INTO wmis_sys_menus (`id`, `fid`, `title`, `url`, `perm`, `remark`, `ctime`, `sort`) VALUES (8, 5, '菜单管理', 'sys_menus', '31', '系统菜单管理！', '2010-01-01 08:00:00', 0);
INSERT INTO wmis_sys_menus (`id`, `fid`, `title`, `url`, `perm`, `remark`, `ctime`, `sort`) VALUES (9, 5, '菜单动作', 'sys_menus_action', '31', '系统菜单动作管理！', '2010-01-01 08:00:00', 0);
INSERT INTO wmis_sys_menus (`id`, `fid`, `title`, `url`, `perm`, `remark`, `ctime`, `sort`) VALUES (10, 5, '系统用户', 'sys_admin', '31', '系统用户管理！', '2010-01-01 08:00:00', 0);
INSERT INTO wmis_sys_menus (`id`, `fid`, `title`, `url`, `perm`, `remark`, `ctime`, `sort`) VALUES (11, 6, '系统帮助', 'system_help', '1', '系统帮助文档！', '2010-01-01 08:00:00', 0);
INSERT INTO wmis_sys_menus (`id`, `fid`, `title`, `url`, `perm`, `remark`, `ctime`, `sort`) VALUES (12, 2, '系统日志', 'M2_system_log', '0', '系统日志！', '2012-03-30 09:03:18', 0);
INSERT INTO wmis_sys_menus (`id`, `fid`, `title`, `url`, `perm`, `remark`, `ctime`, `sort`) VALUES (13, 12, '登录日志', 'sys_admin_login_log', '19', '系统用户登录日志！', '2012-03-30 09:29:20', 0);
INSERT INTO wmis_sys_menus (`id`, `fid`, `title`, `url`, `perm`, `remark`, `ctime`, `sort`) VALUES (14, 1, '帐号管理', 'M2_user', '0', '帐号管理!', '2012-03-30 14:49:29', 0);
INSERT INTO wmis_sys_menus (`id`, `fid`, `title`, `url`, `perm`, `remark`, `ctime`, `sort`) VALUES (15, 14, '修改密码', 'sys_change_passwd', '0', '修改密码!', '2012-03-30 14:37:30', 0);
INSERT INTO wmis_sys_menus (`id`, `fid`, `title`, `url`, `perm`, `remark`, `ctime`, `sort`) VALUES (16, 0, '网站', 'M1', '0', '网站导航！', '2012-03-31 09:10:58', 3);
INSERT INTO wmis_sys_menus (`id`, `fid`, `title`, `url`, `perm`, `remark`, `ctime`, `sort`) VALUES (17, 16, '内容管理', 'M2_content', '0', '内容管理!', '2012-03-31 09:42:59', 0);
INSERT INTO wmis_sys_menus (`id`, `fid`, `title`, `url`, `perm`, `remark`, `ctime`, `sort`) VALUES (18, 17, '新闻管理', 'web_news', '63', '新闻内容管理！', '2012-03-31 10:53:01', 0);
INSERT INTO wmis_sys_menus (`id`, `fid`, `title`, `url`, `perm`, `remark`, `ctime`, `sort`) VALUES (19, 17, '导航管理', 'web_class', '31', '网站所有新闻分类!', '2012-03-31 10:45:05', 0);
INSERT INTO wmis_sys_menus (`id`, `fid`, `title`, `url`, `perm`, `remark`, `ctime`, `sort`) VALUES (20, 16, '留言系统', 'M2_book', '0', '留言系统!', '2012-03-31 10:49:07', 0);
INSERT INTO wmis_sys_menus (`id`, `fid`, `title`, `url`, `perm`, `remark`, `ctime`, `sort`) VALUES (21, 20, '留言管理', 'web_book', '27', '网站留言管理!', '2012-03-31 10:30:09', 0);
INSERT INTO wmis_sys_menus (`id`, `fid`, `title`, `url`, `perm`, `remark`, `ctime`, `sort`) VALUES (22, 5, '系统配置', 'sys_config', '1', '系统配置!', '2012-05-30 19:12:52', 0);
INSERT INTO wmis_sys_menus (`id`, `fid`, `title`, `url`, `perm`, `remark`, `ctime`, `sort`) VALUES (23, 2, '数据库', 'M2_DB', '0', '数据库管理！', '2012-08-16 14:06:33', 0);
INSERT INTO wmis_sys_menus (`id`, `fid`, `title`, `url`, `perm`, `remark`, `ctime`, `sort`) VALUES (24, 23, '数据备份', 'sys_db_backup', '65', '数据备份！', '2012-08-16 14:09:42', 0);
INSERT INTO wmis_sys_menus (`id`, `fid`, `title`, `url`, `perm`, `remark`, `ctime`, `sort`) VALUES (25, 23, '数据恢复', 'sys_db_restore', '145', '数据恢复！', '2012-08-16 14:10:19', 0);


#
# TABLE STRUCTURE FOR: wmis_sys_menus_action
#

DROP TABLE IF EXISTS wmis_sys_menus_action;

CREATE TABLE `wmis_sys_menus_action` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `name` varchar(6) NOT NULL,
  `perm` varchar(6) NOT NULL,
  `class` varchar(12) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

INSERT INTO wmis_sys_menus_action (`id`, `name`, `perm`, `class`) VALUES (1, '列表', '1', 'action_list');
INSERT INTO wmis_sys_menus_action (`id`, `name`, `perm`, `class`) VALUES (2, '搜索', '2', 'action_sea');
INSERT INTO wmis_sys_menus_action (`id`, `name`, `perm`, `class`) VALUES (3, '添加', '4', 'action_add');
INSERT INTO wmis_sys_menus_action (`id`, `name`, `perm`, `class`) VALUES (4, '编辑', '8', 'action_edit');
INSERT INTO wmis_sys_menus_action (`id`, `name`, `perm`, `class`) VALUES (5, '删除', '16', 'action_del');
INSERT INTO wmis_sys_menus_action (`id`, `name`, `perm`, `class`) VALUES (6, '审核', '32', 'action_audit');
INSERT INTO wmis_sys_menus_action (`id`, `name`, `perm`, `class`) VALUES (7, '导出', '64', 'action_exp');
INSERT INTO wmis_sys_menus_action (`id`, `name`, `perm`, `class`) VALUES (8, '导入', '128', 'action_imp');


#
# TABLE STRUCTURE FOR: wmis_web_book
#

DROP TABLE IF EXISTS wmis_web_book;

CREATE TABLE `wmis_web_book` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `title` varchar(30) NOT NULL,
  `content` text NOT NULL,
  `ctime` varchar(19) NOT NULL,
  `reply` text NOT NULL,
  `admin` varchar(12) NOT NULL,
  `rtime` varchar(19) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

INSERT INTO wmis_web_book (`id`, `title`, `content`, `ctime`, `reply`, `admin`, `rtime`) VALUES (1, '灵创留言板正式启动', '欢迎各位网友对灵创提出宝贵的意见，我们将在虚心听取中成长！', '2012-04-12 16:28:55', '灵创网络', '灵创网络', '2012-08-16 14:03:03');


#
# TABLE STRUCTURE FOR: wmis_web_class
#

DROP TABLE IF EXISTS wmis_web_class;

CREATE TABLE `wmis_web_class` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `fid` int(3) NOT NULL,
  `title` varchar(12) NOT NULL,
  `url` varchar(32) NOT NULL,
  `remark` varchar(30) NOT NULL,
  `ctime` varchar(19) NOT NULL DEFAULT '2010-01-01 08:00:00',
  `sort` int(3) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

INSERT INTO wmis_web_class (`id`, `fid`, `title`, `url`, `remark`, `ctime`, `sort`) VALUES (1, 0, '首页', 'index_c.html', '网站首页！', '2012-06-01 14:28:17', 0);
INSERT INTO wmis_web_class (`id`, `fid`, `title`, `url`, `remark`, `ctime`, `sort`) VALUES (2, 0, '新闻中心', 'news.html', '网站分类！', '2012-06-01 17:17:07', 0);
INSERT INTO wmis_web_class (`id`, `fid`, `title`, `url`, `remark`, `ctime`, `sort`) VALUES (3, 2, '行业新闻', 'news/list/industry.html', '行业新闻！', '2012-11-02 11:26:09', 0);
INSERT INTO wmis_web_class (`id`, `fid`, `title`, `url`, `remark`, `ctime`, `sort`) VALUES (4, 2, '企业动向', 'news/list/enterprise.html', '企业动向！', '2012-11-02 11:27:10', 0);
INSERT INTO wmis_web_class (`id`, `fid`, `title`, `url`, `remark`, `ctime`, `sort`) VALUES (5, 0, '企业文化', 'enterprise.html', '企业文化！', '2012-11-07 10:32:34', 0);
INSERT INTO wmis_web_class (`id`, `fid`, `title`, `url`, `remark`, `ctime`, `sort`) VALUES (6, 0, '产品中心', 'pro.html', '产品中心！', '2012-11-07 10:56:50', 0);
INSERT INTO wmis_web_class (`id`, `fid`, `title`, `url`, `remark`, `ctime`, `sort`) VALUES (7, 0, '在线联系', 'online.html', '在线联系！', '2012-11-07 11:43:31', 0);


#
# TABLE STRUCTURE FOR: wmis_web_news
#

DROP TABLE IF EXISTS wmis_web_news;

CREATE TABLE `wmis_web_news` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `type` varchar(1) NOT NULL DEFAULT '0',
  `class` varchar(24) NOT NULL,
  `title` varchar(36) NOT NULL,
  `img` varchar(60) DEFAULT NULL,
  `source` varchar(24) NOT NULL,
  `author` varchar(12) NOT NULL,
  `uname` varchar(16) NOT NULL,
  `ctime` datetime NOT NULL,
  `click` int(6) NOT NULL,
  `key` varchar(30) NOT NULL,
  `summary` varchar(300) DEFAULT NULL,
  `audit` varchar(16) NOT NULL,
  `atime` date NOT NULL,
  `state` varchar(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: wmis_web_news_html
#

DROP TABLE IF EXISTS wmis_web_news_html;

CREATE TABLE `wmis_web_news_html` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `nid` int(6) NOT NULL,
  `content` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

