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

INSERT INTO wmis_sys_admin (`id`, `uname`, `password`, `email`, `name`, `department`, `position`, `rtime`, `state`, `perm`) VALUES (1, 'admin', 'f6fdffe48c908deb0f4c3bd36c032e72', 'admin@ksphp.com', '系统管理员', '信息部', '系统管理员', '2010-01-01 08:00:00', '1', '1:0 2:0 16:0 3:0 4:0 14:0 5:0 12:0 23:0 17:0 20:0 6:0 7:1 15:0 8:31 9:31 10:31 22:1 26:0 13:19 24:65 25:145 18:319 19:31 21:27 11:1');
INSERT INTO wmis_sys_admin (`id`, `uname`, `password`, `email`, `name`, `department`, `position`, `rtime`, `state`, `perm`) VALUES (2, 'webmis', '062d13422d6f79880a24408445f214ec', 'test@ksphp.com', '测试用户', '测试部', '测试员', '2013-03-25 13:57:03', '1', '1:0 2:0 16:0 3:0 4:0 14:0 5:0 12:0 23:0 17:0 20:0 6:0 7:1 15:0 8:31 9:31 22:1 26:0 13:19 24:65 25:129 18:319 19:31 21:27 11:1');


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
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8;

INSERT INTO wmis_sys_admin_login_log (`id`, `type`, `uname`, `ip`, `time`) VALUES (1, '登录', 'admin', '127.0.0.1', '2013-07-03 11:22:52');
INSERT INTO wmis_sys_admin_login_log (`id`, `type`, `uname`, `ip`, `time`) VALUES (2, '退出', 'admin', '127.0.0.1', '2013-07-03 13:34:29');
INSERT INTO wmis_sys_admin_login_log (`id`, `type`, `uname`, `ip`, `time`) VALUES (3, '失败', 'admin', '127.0.0.1', '2013-07-03 13:34:37');
INSERT INTO wmis_sys_admin_login_log (`id`, `type`, `uname`, `ip`, `time`) VALUES (4, '登录', 'admin', '127.0.0.1', '2013-07-03 13:34:44');
INSERT INTO wmis_sys_admin_login_log (`id`, `type`, `uname`, `ip`, `time`) VALUES (5, '退出', 'Auto Logout', '127.0.0.1', '2013-07-03 20:28:56');
INSERT INTO wmis_sys_admin_login_log (`id`, `type`, `uname`, `ip`, `time`) VALUES (6, '失败', 'admin', '127.0.0.1', '2013-07-04 10:37:25');
INSERT INTO wmis_sys_admin_login_log (`id`, `type`, `uname`, `ip`, `time`) VALUES (7, '登录', 'admin', '127.0.0.1', '2013-07-04 10:37:31');
INSERT INTO wmis_sys_admin_login_log (`id`, `type`, `uname`, `ip`, `time`) VALUES (8, '退出', 'admin', '127.0.0.1', '2013-07-04 15:59:53');
INSERT INTO wmis_sys_admin_login_log (`id`, `type`, `uname`, `ip`, `time`) VALUES (9, '登录', 'admin', '127.0.0.1', '2013-07-04 16:00:04');
INSERT INTO wmis_sys_admin_login_log (`id`, `type`, `uname`, `ip`, `time`) VALUES (10, '退出', 'Auto Logout', '127.0.0.1', '2013-07-05 18:51:59');
INSERT INTO wmis_sys_admin_login_log (`id`, `type`, `uname`, `ip`, `time`) VALUES (11, '登录', 'admin', '127.0.0.1', '2013-07-05 18:52:11');
INSERT INTO wmis_sys_admin_login_log (`id`, `type`, `uname`, `ip`, `time`) VALUES (12, '退出', 'Auto Logout', '127.0.0.1', '2013-07-06 10:52:11');
INSERT INTO wmis_sys_admin_login_log (`id`, `type`, `uname`, `ip`, `time`) VALUES (13, '登录', 'admin', '127.0.0.1', '2013-07-06 10:52:20');
INSERT INTO wmis_sys_admin_login_log (`id`, `type`, `uname`, `ip`, `time`) VALUES (14, '退出', 'admin', '127.0.0.1', '2013-07-06 13:59:59');
INSERT INTO wmis_sys_admin_login_log (`id`, `type`, `uname`, `ip`, `time`) VALUES (15, '登录', 'admin', '127.0.0.1', '2013-07-06 14:00:08');
INSERT INTO wmis_sys_admin_login_log (`id`, `type`, `uname`, `ip`, `time`) VALUES (16, '退出', 'Auto Logout', '127.0.0.1', '2013-07-07 13:41:52');
INSERT INTO wmis_sys_admin_login_log (`id`, `type`, `uname`, `ip`, `time`) VALUES (17, '登录', 'admin', '127.0.0.1', '2013-07-07 13:41:59');
INSERT INTO wmis_sys_admin_login_log (`id`, `type`, `uname`, `ip`, `time`) VALUES (18, '退出', 'Auto Logout', '127.0.0.1', '2013-07-07 14:38:34');
INSERT INTO wmis_sys_admin_login_log (`id`, `type`, `uname`, `ip`, `time`) VALUES (19, '登录', 'admin', '127.0.0.1', '2013-07-07 14:38:41');
INSERT INTO wmis_sys_admin_login_log (`id`, `type`, `uname`, `ip`, `time`) VALUES (20, '退出', 'Auto Logout', '127.0.0.1', '2013-07-08 11:58:29');
INSERT INTO wmis_sys_admin_login_log (`id`, `type`, `uname`, `ip`, `time`) VALUES (21, '登录', 'admin', '127.0.0.1', '2013-07-08 11:58:36');
INSERT INTO wmis_sys_admin_login_log (`id`, `type`, `uname`, `ip`, `time`) VALUES (22, '退出', 'Auto Logout', '127.0.0.1', '2013-07-08 16:17:14');
INSERT INTO wmis_sys_admin_login_log (`id`, `type`, `uname`, `ip`, `time`) VALUES (23, '退出', 'Auto Logout', '127.0.0.1', '2013-07-08 16:17:19');
INSERT INTO wmis_sys_admin_login_log (`id`, `type`, `uname`, `ip`, `time`) VALUES (24, '登录', 'admin', '127.0.0.1', '2013-07-08 16:17:29');
INSERT INTO wmis_sys_admin_login_log (`id`, `type`, `uname`, `ip`, `time`) VALUES (25, '退出', 'Auto Logout', '127.0.0.1', '2013-07-08 19:54:55');
INSERT INTO wmis_sys_admin_login_log (`id`, `type`, `uname`, `ip`, `time`) VALUES (26, '登录', 'admin', '127.0.0.1', '2013-07-08 19:55:12');
INSERT INTO wmis_sys_admin_login_log (`id`, `type`, `uname`, `ip`, `time`) VALUES (27, '退出', 'Auto Logout', '127.0.0.1', '2013-07-10 13:36:46');
INSERT INTO wmis_sys_admin_login_log (`id`, `type`, `uname`, `ip`, `time`) VALUES (28, '退出', 'Auto Logout', '127.0.0.1', '2013-07-10 13:36:46');
INSERT INTO wmis_sys_admin_login_log (`id`, `type`, `uname`, `ip`, `time`) VALUES (29, '登录', 'admin', '127.0.0.1', '2013-07-16 10:19:06');
INSERT INTO wmis_sys_admin_login_log (`id`, `type`, `uname`, `ip`, `time`) VALUES (30, '退出', 'Auto Logout', '127.0.0.1', '2013-07-16 13:17:52');
INSERT INTO wmis_sys_admin_login_log (`id`, `type`, `uname`, `ip`, `time`) VALUES (31, '退出', 'Auto Logout', '127.0.0.1', '2013-07-16 13:17:58');
INSERT INTO wmis_sys_admin_login_log (`id`, `type`, `uname`, `ip`, `time`) VALUES (32, '退出', 'Auto Logout', '127.0.0.1', '2013-07-16 13:18:02');
INSERT INTO wmis_sys_admin_login_log (`id`, `type`, `uname`, `ip`, `time`) VALUES (33, '失败', 'admin', '127.0.0.1', '2013-07-17 08:38:38');
INSERT INTO wmis_sys_admin_login_log (`id`, `type`, `uname`, `ip`, `time`) VALUES (34, '登录', 'admin', '127.0.0.1', '2013-07-17 08:38:43');
INSERT INTO wmis_sys_admin_login_log (`id`, `type`, `uname`, `ip`, `time`) VALUES (35, '退出', 'Auto Logout', '127.0.0.1', '2013-07-17 17:26:22');
INSERT INTO wmis_sys_admin_login_log (`id`, `type`, `uname`, `ip`, `time`) VALUES (36, '失败', 'admin', '127.0.0.1', '2013-07-17 17:26:33');
INSERT INTO wmis_sys_admin_login_log (`id`, `type`, `uname`, `ip`, `time`) VALUES (37, '失败', 'admin', '127.0.0.1', '2013-07-17 17:26:40');
INSERT INTO wmis_sys_admin_login_log (`id`, `type`, `uname`, `ip`, `time`) VALUES (38, '登录', 'admin', '127.0.0.1', '2013-07-17 17:26:50');
INSERT INTO wmis_sys_admin_login_log (`id`, `type`, `uname`, `ip`, `time`) VALUES (39, '失败', 'admin', '127.0.0.1', '2013-07-18 14:00:15');
INSERT INTO wmis_sys_admin_login_log (`id`, `type`, `uname`, `ip`, `time`) VALUES (40, '登录', 'admin', '127.0.0.1', '2013-07-18 14:00:19');
INSERT INTO wmis_sys_admin_login_log (`id`, `type`, `uname`, `ip`, `time`) VALUES (41, '登录', 'admin', '127.0.0.1', '2013-07-18 14:34:29');


#
# TABLE STRUCTURE FOR: wmis_sys_config
#

DROP TABLE IF EXISTS wmis_sys_config;

CREATE TABLE `wmis_sys_config` (
  `name` varchar(12) NOT NULL,
  `contnet` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO wmis_sys_config (`name`, `contnet`) VALUES ('copy', 'Built by KSPHP and the <a href=\"http://www.ksphp.com/\" target=\"_blank\"><b>KSPHP.COM</b></a> community');
INSERT INTO wmis_sys_config (`name`, `contnet`) VALUES ('title', 'WebMIS 管理员控制台');
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
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

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
INSERT INTO wmis_sys_menus (`id`, `fid`, `title`, `url`, `perm`, `remark`, `ctime`, `sort`) VALUES (18, 17, '新闻管理', 'web_news', '319', '新闻内容管理！', '2012-03-31 10:53:01', 0);
INSERT INTO wmis_sys_menus (`id`, `fid`, `title`, `url`, `perm`, `remark`, `ctime`, `sort`) VALUES (19, 17, '导航管理', 'web_class', '31', '网站所有新闻分类!', '2012-03-31 10:45:05', 0);
INSERT INTO wmis_sys_menus (`id`, `fid`, `title`, `url`, `perm`, `remark`, `ctime`, `sort`) VALUES (20, 16, '留言系统', 'M2_book', '0', '留言系统!', '2012-03-31 10:49:07', 0);
INSERT INTO wmis_sys_menus (`id`, `fid`, `title`, `url`, `perm`, `remark`, `ctime`, `sort`) VALUES (21, 20, '留言管理', 'web_book', '27', '网站留言管理!', '2012-03-31 10:30:09', 0);
INSERT INTO wmis_sys_menus (`id`, `fid`, `title`, `url`, `perm`, `remark`, `ctime`, `sort`) VALUES (22, 5, '系统配置', 'sys_config', '1', '系统配置!', '2012-05-30 19:12:52', 0);
INSERT INTO wmis_sys_menus (`id`, `fid`, `title`, `url`, `perm`, `remark`, `ctime`, `sort`) VALUES (23, 2, '数据库', 'M2_DB', '0', '数据库管理！', '2012-08-16 14:06:33', 0);
INSERT INTO wmis_sys_menus (`id`, `fid`, `title`, `url`, `perm`, `remark`, `ctime`, `sort`) VALUES (24, 23, '数据备份', 'sys_db_backup', '65', '数据备份！', '2012-08-16 14:09:42', 0);
INSERT INTO wmis_sys_menus (`id`, `fid`, `title`, `url`, `perm`, `remark`, `ctime`, `sort`) VALUES (25, 23, '数据恢复', 'sys_db_restore', '145', '数据恢复！', '2012-08-16 14:10:19', 0);
INSERT INTO wmis_sys_menus (`id`, `fid`, `title`, `url`, `perm`, `remark`, `ctime`, `sort`) VALUES (26, 5, '文件管理', 'sys_filemanager', '0', '文件管理器！', '2013-07-03 13:33:29', 0);


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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

INSERT INTO wmis_sys_menus_action (`id`, `name`, `perm`, `class`) VALUES (1, '列表', '1', 'action_list');
INSERT INTO wmis_sys_menus_action (`id`, `name`, `perm`, `class`) VALUES (2, '搜索', '2', 'action_sea');
INSERT INTO wmis_sys_menus_action (`id`, `name`, `perm`, `class`) VALUES (3, '添加', '4', 'action_add');
INSERT INTO wmis_sys_menus_action (`id`, `name`, `perm`, `class`) VALUES (4, '编辑', '8', 'action_edit');
INSERT INTO wmis_sys_menus_action (`id`, `name`, `perm`, `class`) VALUES (5, '删除', '16', 'action_del');
INSERT INTO wmis_sys_menus_action (`id`, `name`, `perm`, `class`) VALUES (6, '审核', '32', 'action_audit');
INSERT INTO wmis_sys_menus_action (`id`, `name`, `perm`, `class`) VALUES (7, '导出', '64', 'action_exp');
INSERT INTO wmis_sys_menus_action (`id`, `name`, `perm`, `class`) VALUES (8, '导入', '128', 'action_imp');
INSERT INTO wmis_sys_menus_action (`id`, `name`, `perm`, `class`) VALUES (9, '图表', '256', 'action_chart');


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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

INSERT INTO wmis_web_news (`id`, `type`, `class`, `title`, `img`, `source`, `author`, `uname`, `ctime`, `click`, `key`, `summary`, `audit`, `atime`, `state`) VALUES (1, '0', ':2:4:', '微软开发者解释为什么Windows内核落后于Linux', '', 'KSPHP', 'KSPHP', 'webmis', '2013-05-16 10:36:19', 0, '微软开发者,Windows内核落后于Linux', '微软Windows操作系统在复杂负荷情况下的性能落后于Linux，这已是公认的事实。Linux内核发布了一个又一个新版本，我们能看到它不断改进 I/O调度、进程调度、文件系统优化，TCP/IP堆栈的无线网络优化，等等等等。', 'webmis', '2013-05-16', '1');
INSERT INTO wmis_web_news (`id`, `type`, `class`, `title`, `img`, `source`, `author`, `uname`, `ctime`, `click`, `key`, `summary`, `audit`, `atime`, `state`) VALUES (2, '0', ':2:3:', '国际空间站决定弃用 Windows 启用 Linux', '', 'KSPHP', 'KSPHP', 'webmis', '2013-05-16 10:40:30', 0, '国际空间站,弃用Windows,启用Linux', '似乎Windows 8就是一个不该出生的孩子。在地球上不受欢迎也就算了，远在太空的国际空间站(ISS)也没有打算接受这个“野心颇大”的系统。据外媒报道，ISS决定在接下来的系统升级中，弃用Windows，转而使用Linux。', 'webmis', '2013-05-16', '1');


#
# TABLE STRUCTURE FOR: wmis_web_news_html
#

DROP TABLE IF EXISTS wmis_web_news_html;

CREATE TABLE `wmis_web_news_html` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `nid` int(6) NOT NULL,
  `content` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

INSERT INTO wmis_web_news_html (`id`, `nid`, `content`) VALUES (1, 1, '<p style=\"text-align: center;\">&nbsp;</p>\n<p style=\"text-align: center;\"><img src=\"../upload/images/20130621/80961368671891.jpg\" alt=\"微软开发者解释为什么Windows内核落后于Linux\" /></p>\n<p>&nbsp;</p>\n<p>&nbsp; &nbsp; &nbsp; &nbsp;微软Windows操作系统在复杂负荷情况下的性能落后于Linux，这已是公认的事实。Linux内核发布了一个又一个新版本，我们能看到它不断改进 I/O调度、进程调度、文件系统优化，TCP/IP堆栈的无线网络优化，等等等等。</p>\n<p>&nbsp; &nbsp; &nbsp; &nbsp;一位微软Windows NT内核开发者<a href=\"http://blog.zorinaq.com/?e=74\" target=\"_blank\">承认</a>，Windows内核与Linux内核之间的性能差距正日益拉大。他通过Tor(原因显而易见)在Hacker News上<a href=\"https://news.ycombinator.com/item?id=5689391\" target=\"_blank\">匿名发帖</a>(已 经自行删除)，指出问题的根源不是技术方面而是社会性的。微软开发者几乎没人会为了自己为了荣耀而去改进内核，Linux世界的那些现象在微软这样的大企 业不会发生。能指挥开发者改进特定条件下系统性能的人的动机通常是出于商业意图，而在商业上性能的重要性从来没有被认为攸关生死，所以改进系统性能没有正 式或非正式的程序。</p>\n<p>&nbsp; &nbsp; &nbsp; &nbsp;微软在Windows &nbsp;SP3前开始关注安全是因为他们认为安全是商业目标的存在性威胁，而性能不是存在性威胁。内核不同组件的负责人对外部递交补丁一般都是充满敌意的，非提前 计划的改变可能会影响原定目标，领导会生气，测试组也会生气，产品经理也会发怒。内核开发团队因此没有动机去接受外界递交的补丁。你总能找到理由说不，但 很少有动机去说好的。而在Linux世界，如果能把某一功能的性能改进5%，你将会被万众瞩目。</p>\n<p>&nbsp;</p>');
INSERT INTO wmis_web_news_html (`id`, `nid`, `content`) VALUES (2, 2, '<p>&nbsp; &nbsp; &nbsp; &nbsp;似乎Windows 8就是一个不该出生的孩子。在地球上不受欢迎也就算了，远在太空的国际空间站(ISS)也没有打算接受这个&ldquo;野心颇大&rdquo;的系统。据外媒报道，ISS决定在接下来的系统升级中，弃用Windows，转而使用Linux。</p>\n<p style=\"text-align: center;\"><img src=\"../upload/images/20130621/36831368672071.jpg\" alt=\"国际空间站决定弃用 Windows 启用 Linux\" /></p>\n<p>&nbsp; &nbsp; &nbsp; &nbsp;ISS中的计算机系统由多台在同一网络运行下的笔记本组成。它可以保证宇航员日常重要事项的正常运行；告知宇航员他们所处的位置，管理运行中的设备，甚至还能连接到摄像机，拍摄太空照片与视频并通过互联网分享给地球上的人。</p>\n<p>&nbsp; &nbsp; &nbsp; &nbsp;Linux基金会称，美国太空局的Keith Chuvala将负责这次的系统交接工作。</p>\n<p>&nbsp; &nbsp; &nbsp; &nbsp;Chuvala表示，太空署之所以决定更换系统是为了能够保持ISS计算机系统运行的稳定性--言下之意就是，过于追求形式的Win8其运行效果并没有达到他们的要求。</p>\n<p>&nbsp; &nbsp; &nbsp; &nbsp;日前，Chuvala及其团队成员正在接受来自Linux基金会的相关培训，希望能够尽快在ISS部署Linux。据悉，Linux基金会专门针对USA和NASA两支团队不同的需求开设了2门不同的培训课程。</p>\n<p>&nbsp;</p>');


