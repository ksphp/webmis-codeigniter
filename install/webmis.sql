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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

INSERT INTO wmis_sys_admin (`id`, `uname`, `password`, `email`, `name`, `department`, `position`, `rtime`, `state`, `perm`) VALUES (1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin@ksphp.com', '系统管理员', '信息部', '系统管理员', '2010-01-01 08:00:00', '1', '1:0 2:0 16:0 3:0 4:0 14:0 5:0 12:0 23:0 17:0 20:0 6:0 7:1 15:1 8:31 9:31 10:31 22:1 26:1 13:19 24:65 25:145 18:319 19:31 27:63 21:27 11:1');


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
  `agent` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `ico` varchar(12) DEFAULT NULL,
  `remark` varchar(30) NOT NULL,
  `ctime` varchar(19) NOT NULL DEFAULT '2010-01-01 08:00:00',
  `sort` int(3) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;

INSERT INTO wmis_sys_menus (`id`, `fid`, `title`, `url`, `perm`, `ico`, `remark`, `ctime`, `sort`) VALUES (1, 0, '首页', '#', '0', 'ico-home', '首页！', '2010-01-01 08:00:00', 1);
INSERT INTO wmis_sys_menus (`id`, `fid`, `title`, `url`, `perm`, `ico`, `remark`, `ctime`, `sort`) VALUES (2, 0, '系统', '#', '0', 'ico-system', '系统！', '2010-01-01 08:00:00', 2);
INSERT INTO wmis_sys_menus (`id`, `fid`, `title`, `url`, `perm`, `ico`, `remark`, `ctime`, `sort`) VALUES (3, 0, '帮助', '#', '0', 'ico-help', '帮助文档！', '2010-01-01 08:00:00', 4);
INSERT INTO wmis_sys_menus (`id`, `fid`, `title`, `url`, `perm`, `ico`, `remark`, `ctime`, `sort`) VALUES (4, 1, '桌面', '#', '0', 'ico-disktop', '系统桌面！', '2010-01-01 08:00:00', 0);
INSERT INTO wmis_sys_menus (`id`, `fid`, `title`, `url`, `perm`, `ico`, `remark`, `ctime`, `sort`) VALUES (5, 2, '系统管理', '#', '0', 'ico-system1', '系统高级管理！', '2010-01-01 08:00:00', 0);
INSERT INTO wmis_sys_menus (`id`, `fid`, `title`, `url`, `perm`, `ico`, `remark`, `ctime`, `sort`) VALUES (6, 3, '帮助文档', '#', '0', '', '帮助文档！', '2010-01-01 08:00:00', 0);
INSERT INTO wmis_sys_menus (`id`, `fid`, `title`, `url`, `perm`, `ico`, `remark`, `ctime`, `sort`) VALUES (7, 4, '用户首页', 'welcome', '1', 'ico-user1', '系统用户首页！', '2010-01-01 08:00:00', 0);
INSERT INTO wmis_sys_menus (`id`, `fid`, `title`, `url`, `perm`, `ico`, `remark`, `ctime`, `sort`) VALUES (8, 5, '菜单管理', 'sys_menus', '31', 'ico-menu', '系统菜单管理！', '2010-01-01 08:00:00', 0);
INSERT INTO wmis_sys_menus (`id`, `fid`, `title`, `url`, `perm`, `ico`, `remark`, `ctime`, `sort`) VALUES (9, 5, '菜单动作', 'sys_menus_action', '31', 'ico-menuA', '系统菜单动作管理！', '2010-01-01 08:00:00', 0);
INSERT INTO wmis_sys_menus (`id`, `fid`, `title`, `url`, `perm`, `ico`, `remark`, `ctime`, `sort`) VALUES (10, 5, '系统用户', 'sys_admin', '31', 'ico-admin', '系统用户管理！', '2010-01-01 08:00:00', 0);
INSERT INTO wmis_sys_menus (`id`, `fid`, `title`, `url`, `perm`, `ico`, `remark`, `ctime`, `sort`) VALUES (11, 6, '系统帮助', 'system_help', '1', NULL, '系统帮助文档！', '2010-01-01 08:00:00', 0);
INSERT INTO wmis_sys_menus (`id`, `fid`, `title`, `url`, `perm`, `ico`, `remark`, `ctime`, `sort`) VALUES (12, 2, '系统日志', '#', '0', 'ico-logs', '系统日志！', '2012-03-30 09:03:18', 0);
INSERT INTO wmis_sys_menus (`id`, `fid`, `title`, `url`, `perm`, `ico`, `remark`, `ctime`, `sort`) VALUES (13, 12, '登录日志', 'sys_admin_login_log', '19', 'ico-logs1', '系统用户登录日志！', '2012-03-30 09:29:20', 0);
INSERT INTO wmis_sys_menus (`id`, `fid`, `title`, `url`, `perm`, `ico`, `remark`, `ctime`, `sort`) VALUES (14, 1, '帐号管理', '#', '0', 'ico-user', '帐号管理！', '2012-03-30 14:49:29', 0);
INSERT INTO wmis_sys_menus (`id`, `fid`, `title`, `url`, `perm`, `ico`, `remark`, `ctime`, `sort`) VALUES (15, 14, '修改密码', 'sys_change_passwd', '1', 'ico-pwd', '修改密码！', '2012-03-30 14:37:30', 0);
INSERT INTO wmis_sys_menus (`id`, `fid`, `title`, `url`, `perm`, `ico`, `remark`, `ctime`, `sort`) VALUES (16, 0, '网站', '#', '0', 'ico-web', '网站导航！', '2012-03-31 09:10:58', 3);
INSERT INTO wmis_sys_menus (`id`, `fid`, `title`, `url`, `perm`, `ico`, `remark`, `ctime`, `sort`) VALUES (17, 16, '内容管理', '#', '0', '', '内容管理！', '2012-03-31 09:42:59', 0);
INSERT INTO wmis_sys_menus (`id`, `fid`, `title`, `url`, `perm`, `ico`, `remark`, `ctime`, `sort`) VALUES (18, 17, '新闻管理', 'web_news', '319', NULL, '新闻内容管理！', '2012-03-31 10:53:01', 0);
INSERT INTO wmis_sys_menus (`id`, `fid`, `title`, `url`, `perm`, `ico`, `remark`, `ctime`, `sort`) VALUES (19, 17, '导航管理', 'web_class', '31', '', '网站所有新闻分类！', '2012-03-31 10:45:05', 0);
INSERT INTO wmis_sys_menus (`id`, `fid`, `title`, `url`, `perm`, `ico`, `remark`, `ctime`, `sort`) VALUES (20, 16, '留言系统', '#', '0', '', '留言系统！', '2012-03-31 10:49:07', 0);
INSERT INTO wmis_sys_menus (`id`, `fid`, `title`, `url`, `perm`, `ico`, `remark`, `ctime`, `sort`) VALUES (21, 20, '留言管理', 'web_book', '27', '', '网站留言管理！', '2012-03-31 10:30:09', 0);
INSERT INTO wmis_sys_menus (`id`, `fid`, `title`, `url`, `perm`, `ico`, `remark`, `ctime`, `sort`) VALUES (22, 5, '系统配置', 'sys_config', '1', 'ico-system2', '系统配置！', '2012-05-30 19:12:52', 0);
INSERT INTO wmis_sys_menus (`id`, `fid`, `title`, `url`, `perm`, `ico`, `remark`, `ctime`, `sort`) VALUES (23, 2, '数据库', '#', '0', 'ico-db', '数据库管理！', '2012-08-16 14:06:33', 0);
INSERT INTO wmis_sys_menus (`id`, `fid`, `title`, `url`, `perm`, `ico`, `remark`, `ctime`, `sort`) VALUES (24, 23, '数据备份', 'sys_db_backup', '65', 'ico-exp', '数据备份！', '2012-08-16 14:09:42', 0);
INSERT INTO wmis_sys_menus (`id`, `fid`, `title`, `url`, `perm`, `ico`, `remark`, `ctime`, `sort`) VALUES (25, 23, '数据恢复', 'sys_db_restore', '145', 'ico-imp', '数据恢复！', '2012-08-16 14:10:19', 0);
INSERT INTO wmis_sys_menus (`id`, `fid`, `title`, `url`, `perm`, `ico`, `remark`, `ctime`, `sort`) VALUES (26, 5, '文件管理', 'sys_filemanager', '1', 'ico-fileM', '文件管理器！', '2013-07-03 13:33:29', 0);
INSERT INTO wmis_sys_menus (`id`, `fid`, `title`, `url`, `perm`, `ico`, `remark`, `ctime`, `sort`) VALUES (27, 17, '静态页面', 'web_html', '63', '', '静态页面！', '2013-09-04 10:00:12', 0);
INSERT INTO wmis_sys_menus (`id`, `fid`, `title`, `url`, `perm`, `ico`, `remark`, `ctime`, `sort`) VALUES (28, 17, '产品管理', 'web_pro', '63', '', '产品中心！', '2013-09-27 13:06:27', 0);


#
# TABLE STRUCTURE FOR: wmis_sys_menus_action
#

DROP TABLE IF EXISTS wmis_sys_menus_action;

CREATE TABLE `wmis_sys_menus_action` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `name` varchar(6) NOT NULL,
  `perm` varchar(6) NOT NULL,
  `ico` varchar(12) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

INSERT INTO wmis_sys_menus_action (`id`, `name`, `perm`, `ico`) VALUES (1, '列表', '1', 'ico-list');
INSERT INTO wmis_sys_menus_action (`id`, `name`, `perm`, `ico`) VALUES (2, '搜索', '2', 'ico-search');
INSERT INTO wmis_sys_menus_action (`id`, `name`, `perm`, `ico`) VALUES (3, '添加', '4', 'ico-add');
INSERT INTO wmis_sys_menus_action (`id`, `name`, `perm`, `ico`) VALUES (4, '编辑', '8', 'ico-edit');
INSERT INTO wmis_sys_menus_action (`id`, `name`, `perm`, `ico`) VALUES (5, '删除', '16', 'ico-del');
INSERT INTO wmis_sys_menus_action (`id`, `name`, `perm`, `ico`) VALUES (6, '审核', '32', 'ico-audit');
INSERT INTO wmis_sys_menus_action (`id`, `name`, `perm`, `ico`) VALUES (7, '导出', '64', 'ico-exp');
INSERT INTO wmis_sys_menus_action (`id`, `name`, `perm`, `ico`) VALUES (8, '导入', '128', 'ico-imp');
INSERT INTO wmis_sys_menus_action (`id`, `name`, `perm`, `ico`) VALUES (9, '图表', '256', 'ico-chart');


#
# TABLE STRUCTURE FOR: wmis_web_book
#

DROP TABLE IF EXISTS wmis_web_book;

CREATE TABLE `wmis_web_book` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `name` varchar(12) NOT NULL,
  `content` text NOT NULL,
  `ctime` varchar(19) NOT NULL,
  `reply` text NOT NULL,
  `admin` varchar(12) NOT NULL,
  `rtime` varchar(19) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

INSERT INTO wmis_web_book (`id`, `name`, `content`, `ctime`, `reply`, `admin`, `rtime`) VALUES (1, '灵创留言板正式启动', '欢迎各位网友对灵创提出宝贵的意见，我们将在虚心听取中成长！', '2012-04-12 16:28:55', '灵创网络', '灵创网络', '2012-08-16 14:03:03');
INSERT INTO wmis_web_book (`id`, `name`, `content`, `ctime`, `reply`, `admin`, `rtime`) VALUES (2, 'PHP开发底层系统', 'WEBMIS是免费开源PHP开发底层系统，基于CI的MVC模式开发的多用户、多权限解决方案，可以后台添加管理菜单，整合了Jquery，TinyMCE编辑器等插件、实现简洁、美观的弹框效果！ ', '2013-10-31 13:04:10', '', '', '');
INSERT INTO wmis_web_book (`id`, `name`, `content`, `ctime`, `reply`, `admin`, `rtime`) VALUES (3, 'WebMIS 4.0发布', '主要更新：添加前台展示页面、优化代码、支持手机版、自动加载UI的js插件等', '2013-10-31 13:07:17', '', '', '');


#
# TABLE STRUCTURE FOR: wmis_web_class
#

DROP TABLE IF EXISTS wmis_web_class;

CREATE TABLE `wmis_web_class` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `fid` int(3) NOT NULL,
  `title` varchar(12) NOT NULL,
  `url` varchar(32) NOT NULL,
  `ico` varchar(12) DEFAULT NULL,
  `remark` varchar(30) NOT NULL,
  `ctime` varchar(19) NOT NULL DEFAULT '2010-01-01 08:00:00',
  `sort` int(3) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

INSERT INTO wmis_web_class (`id`, `fid`, `title`, `url`, `ico`, `remark`, `ctime`, `sort`) VALUES (1, 0, '首页', 'index_c.html', 'ico-home', '网站首页！', '2012-06-01 14:28:17', 0);
INSERT INTO wmis_web_class (`id`, `fid`, `title`, `url`, `ico`, `remark`, `ctime`, `sort`) VALUES (2, 0, '新闻中心', 'news.html', NULL, '网站分类！', '2012-06-01 17:17:07', 0);
INSERT INTO wmis_web_class (`id`, `fid`, `title`, `url`, `ico`, `remark`, `ctime`, `sort`) VALUES (3, 2, '行业新闻', 'news/lists/industry.html', '', '行业新闻！', '2012-11-02 11:26:09', 0);
INSERT INTO wmis_web_class (`id`, `fid`, `title`, `url`, `ico`, `remark`, `ctime`, `sort`) VALUES (4, 2, '企业动向', 'news/lists/enterprise.html', '', '企业动向！', '2012-11-02 11:27:10', 0);
INSERT INTO wmis_web_class (`id`, `fid`, `title`, `url`, `ico`, `remark`, `ctime`, `sort`) VALUES (5, 7, '关于我们', 'online/show/about.html', NULL, '关于我们！', '2012-11-07 10:32:34', 0);
INSERT INTO wmis_web_class (`id`, `fid`, `title`, `url`, `ico`, `remark`, `ctime`, `sort`) VALUES (6, 0, '产品中心', 'pro.html', NULL, '产品中心！', '2012-11-07 10:56:50', 0);
INSERT INTO wmis_web_class (`id`, `fid`, `title`, `url`, `ico`, `remark`, `ctime`, `sort`) VALUES (7, 0, '在线联系', 'online.html', NULL, '在线联系！', '2012-11-07 11:43:31', 0);
INSERT INTO wmis_web_class (`id`, `fid`, `title`, `url`, `ico`, `remark`, `ctime`, `sort`) VALUES (8, 7, '联系方式', 'online/show/contact.html', NULL, '联系方式！', '2013-09-04 10:24:55', 0);
INSERT INTO wmis_web_class (`id`, `fid`, `title`, `url`, `ico`, `remark`, `ctime`, `sort`) VALUES (9, 6, '笔记本电脑', 'pro/lists/notebook.html', '', '笔记本电脑！', '2013-09-27 14:02:21', 0);
INSERT INTO wmis_web_class (`id`, `fid`, `title`, `url`, `ico`, `remark`, `ctime`, `sort`) VALUES (10, 6, '时尚服装', 'pro/lists/dress.html', '', '时尚服装！', '2013-09-27 14:03:55', 0);
INSERT INTO wmis_web_class (`id`, `fid`, `title`, `url`, `ico`, `remark`, `ctime`, `sort`) VALUES (11, 7, '在线留言', 'online/message.html', '', '在线留言！', '2013-10-15 09:04:28', 0);


#
# TABLE STRUCTURE FOR: wmis_web_html
#

DROP TABLE IF EXISTS wmis_web_html;

CREATE TABLE `wmis_web_html` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `class` varchar(24) NOT NULL,
  `title` varchar(36) NOT NULL,
  `img` varchar(64) DEFAULT NULL,
  `uname` varchar(16) NOT NULL,
  `ctime` datetime NOT NULL,
  `state` varchar(1) NOT NULL DEFAULT '0',
  `click` int(6) NOT NULL,
  `key` varchar(64) DEFAULT NULL,
  `summary` varchar(300) DEFAULT NULL,
  `content` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

INSERT INTO wmis_web_html (`id`, `class`, `title`, `img`, `uname`, `ctime`, `state`, `click`, `key`, `summary`, `content`) VALUES (1, ':7:5:', '关于我们', '', 'admin', '2013-09-27 12:44:19', '1', 0, '关于我们,关于灵创,灵创网络', '关于我们', '<p>&nbsp; &nbsp; &nbsp;&nbsp; 灵创网络专业提供互联网行业相关服务，专精于web基础媒体上的创作团队，是一支极具创意技术和和商业能力的团队组合而成。从创建初就执着于建立高品质的 网站，发觉新的视觉语言，开创新的天地。公司的主要业务有，网站建设制作、网站推广、网站维护、淘宝店铺装修、画册设计、网站整体策划设计制作、企业邮 局、网站资料更新维护、网站营销，为您提供全方位服务。</p>\n<p><strong>WEB软件开发</strong></p>\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 我们自主开发了一套Web版的企业资源管理系统（WebMIS），WebMIS-快速、实用、免费开源的PHP开发底层系统。基于CI的MVC模式开发的多用户、多权限解决方案，整合了Jquery、TinyMCE编辑器等插件、简洁美观的弹框效果；</p>\n<p><strong>网站建设制作</strong></p>\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 多年网站建设经验总结，让我们变得更加专业、专注；</p>\n<p><strong>网站推广</strong></p>\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 引导更多客户流量，让您的网站更有价值；</p>\n<p><strong>网站维护</strong></p>\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 我们来为您更新网站信息，处理网站问题，大幅度降低维护费用；</p>\n<p><strong>&nbsp;Linux服务器架构和维护</strong></p>\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 提供专业、安全的架构方案，我们可以代理维护，从而降低维护费用；</p>\n<p><strong>&nbsp;平面设计、广告设计</strong></p>\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 根据客户要求、整合行业特色，提供优质的设计方案；</p>');
INSERT INTO wmis_web_html (`id`, `class`, `title`, `img`, `uname`, `ctime`, `state`, `click`, `key`, `summary`, `content`) VALUES (2, ':7:8:', '联系方式', '', 'admin', '2013-09-27 12:50:52', '1', 0, '联系方式,联系灵创,灵创网络', '联系方式', '<div style=\"color: #666;\">\n<div style=\"font: 30px 黑体;\"><br /><strong>灵创网络</strong></div>\n<div style=\"font-size: 10px;\">LINGCHUANG NETWORK</div>\n</div>\n<p>地 址：云南.昆明 国家经济技术开发区牛街庄综合市场C幢5-5室<br />邮 编：650217<br />电 话：153681181712( 杨经理 )<br />网 址：www.ksphp.com<br />邮 箱：admin@ksphp.com<br />QQ群：<strong>206642028</strong></p>\n<p>&nbsp;</p>');


#
# TABLE STRUCTURE FOR: wmis_web_news
#

DROP TABLE IF EXISTS wmis_web_news;

CREATE TABLE `wmis_web_news` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `type` varchar(1) NOT NULL DEFAULT '0',
  `class` varchar(24) NOT NULL,
  `title` varchar(36) NOT NULL,
  `img` varchar(128) DEFAULT NULL,
  `source` varchar(24) NOT NULL,
  `author` varchar(12) NOT NULL,
  `uname` varchar(16) NOT NULL,
  `ctime` datetime NOT NULL,
  `click` int(6) NOT NULL,
  `key` varchar(64) DEFAULT NULL,
  `summary` varchar(300) DEFAULT NULL,
  `audit` varchar(16) NOT NULL,
  `atime` date NOT NULL,
  `state` varchar(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

INSERT INTO wmis_web_news (`id`, `type`, `class`, `title`, `img`, `source`, `author`, `uname`, `ctime`, `click`, `key`, `summary`, `audit`, `atime`, `state`) VALUES (1, '0', ':2:4:', '微软开发者解释为什么Windows内核落后于Linux', '/upload/images/news/news01.jpg', 'KSPHP', 'KSPHP', 'webmis', '2013-05-16 10:36:19', 145, '微软开发者,Windows内核落后于Linux', '微软Windows操作系统在复杂负荷情况下的性能落后于Linux，这已是公认的事实。Linux内核发布了一个又一个新版本，我们能看到它不断改进 I/O调度、进程调度、文件系统优化，TCP/IP堆栈的无线网络优化，等等等等。', 'webmis', '2013-05-16', '1');
INSERT INTO wmis_web_news (`id`, `type`, `class`, `title`, `img`, `source`, `author`, `uname`, `ctime`, `click`, `key`, `summary`, `audit`, `atime`, `state`) VALUES (2, '0', ':2:3:', '国际空间站决定弃用 Windows 启用 Linux', '/upload/images/news/news02.jpg', 'KSPHP', 'KSPHP', 'webmis', '2013-05-16 10:40:30', 156, '国际空间站,弃用Windows,启用Linux', '似乎Windows 8就是一个不该出生的孩子。在地球上不受欢迎也就算了，远在太空的国际空间站(ISS)也没有打算接受这个“野心颇大”的系统。据外媒报道，ISS决定在接下来的系统升级中，弃用Windows，转而使用Linux。', 'admin', '2013-09-03', '1');
INSERT INTO wmis_web_news (`id`, `type`, `class`, `title`, `img`, `source`, `author`, `uname`, `ctime`, `click`, `key`, `summary`, `audit`, `atime`, `state`) VALUES (3, '0', ':2:3:', '编译器如何危及应用程序的安全', '', 'oschina', 'oschina', 'admin', '2013-10-31 11:25:46', 0, '编译器如何危及应用程序的安全', '对于编译器如何将人类可读的代码翻译成机器运行的机器码，大多数程序员通常只有大概的概念。在编译过程中，编译器会对代码进行优化，使其能高效的运行。有的时候，编译器在优化上面走的太远了，它甚至移除了本不应该移除的代码，导致应用程序更加脆弱。', 'admin', '2013-10-31', '1');
INSERT INTO wmis_web_news (`id`, `type`, `class`, `title`, `img`, `source`, `author`, `uname`, `ctime`, `click`, `key`, `summary`, `audit`, `atime`, `state`) VALUES (4, '0', ':2:3:', '微软向欧盟申请批准其收购诺基亚协议', '', 'oschina', 'oschina', 'admin', '2013-10-31 11:29:28', 0, '微软向欧盟申请批准其收购诺基亚协议', '据路透社报道，早在上月微软就宣布以54.4亿欧元（约合75亿美元）收购诺基亚手机业务，但直到现在才向欧盟委员会申请批准。这份协议还包括诺基亚向微软授权使用其专利组合10年的内容。', 'admin', '2013-10-31', '1');
INSERT INTO wmis_web_news (`id`, `type`, `class`, `title`, `img`, `source`, `author`, `uname`, `ctime`, `click`, `key`, `summary`, `audit`, `atime`, `state`) VALUES (5, '0', ':2:3:', '罗马尼亚程序员的幸福生活', '/upload/images/news/news03.jpg', 'oschina', 'oschina', 'admin', '2013-10-31 12:22:25', 2, '罗马尼亚程序员的幸福生活', '我做了三年的+Perl程序员，以编程为生已经有7年。我生活中克路治-那波卡市(Cluj-Napoca)，这是罗马尼亚第二大城市。', 'admin', '2013-10-31', '1');
INSERT INTO wmis_web_news (`id`, `type`, `class`, `title`, `img`, `source`, `author`, `uname`, `ctime`, `click`, `key`, `summary`, `audit`, `atime`, `state`) VALUES (6, '0', ':2:3:', '惠普、戴尔竞相推 ARM 架构服务器', '/upload/images/news/news04.jpg', 'oschina', 'oschina', 'admin', '2013-10-31 12:52:20', 6, '惠普、戴尔竞相推,ARM,架构服务器', '据国外媒体报道，惠普和戴尔当地时间周一在ARM TechCon会议上公布了推出ARM服务器的计划。ARM架构服务器处理能力强大，但能耗低于目前的英特尔架构服务器。它们有助于数据中心在处理更多数据的同时，降低成本和能耗。', 'admin', '2013-10-31', '1');
INSERT INTO wmis_web_news (`id`, `type`, `class`, `title`, `img`, `source`, `author`, `uname`, `ctime`, `click`, `key`, `summary`, `audit`, `atime`, `state`) VALUES (7, '0', ':2:3:', '开源的人工智能平台 NuPIC', '', 'oschina', 'oschina', 'admin', '2013-10-31 12:58:24', 6, '开源的人工智能平台,NuPIC', '随着智能设备的普及，人工智能的研究已经不再局限于学术界，Google、Facebook 等公司都进入这个领域。科技公司的优势是大量的用户，这不仅为机器智能研究提供了大量数据，而且为机器智能的训练提供了现实的场景。', 'admin', '2013-10-31', '1');


#
# TABLE STRUCTURE FOR: wmis_web_news_html
#

DROP TABLE IF EXISTS wmis_web_news_html;

CREATE TABLE `wmis_web_news_html` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `nid` int(6) NOT NULL,
  `content` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

INSERT INTO wmis_web_news_html (`id`, `nid`, `content`) VALUES (1, 1, '<p style=\"text-align: center;\">&nbsp;</p>\n<p style=\"text-align: center;\"><img src=\"/upload/images/news/news01.jpg\" alt=\"微软开发者解释为什么Windows内核落后于Linux\" width=\"600\" height=\"277\" /></p>\n<p>&nbsp;</p>\n<p>&nbsp; &nbsp; &nbsp; &nbsp;微软Windows操作系统在复杂负荷情况下的性能落后于Linux，这已是公认的事实。Linux内核发布了一个又一个新版本，我们能看到它不断改进 I/O调度、进程调度、文件系统优化，TCP/IP堆栈的无线网络优化，等等等等。</p>\n<p>&nbsp; &nbsp; &nbsp; &nbsp;一位微软Windows NT内核开发者<a href=\"http://blog.zorinaq.com/?e=74\" target=\"_blank\">承认</a>，Windows内核与Linux内核之间的性能差距正日益拉大。他通过Tor(原因显而易见)在Hacker News上<a href=\"https://news.ycombinator.com/item?id=5689391\" target=\"_blank\">匿名发帖</a>(已 经自行删除)，指出问题的根源不是技术方面而是社会性的。微软开发者几乎没人会为了自己为了荣耀而去改进内核，Linux世界的那些现象在微软这样的大企 业不会发生。能指挥开发者改进特定条件下系统性能的人的动机通常是出于商业意图，而在商业上性能的重要性从来没有被认为攸关生死，所以改进系统性能没有正 式或非正式的程序。</p>\n<p>&nbsp; &nbsp; &nbsp; &nbsp;微软在Windows &nbsp;SP3前开始关注安全是因为他们认为安全是商业目标的存在性威胁，而性能不是存在性威胁。内核不同组件的负责人对外部递交补丁一般都是充满敌意的，非提前 计划的改变可能会影响原定目标，领导会生气，测试组也会生气，产品经理也会发怒。内核开发团队因此没有动机去接受外界递交的补丁。你总能找到理由说不，但 很少有动机去说好的。而在Linux世界，如果能把某一功能的性能改进5%，你将会被万众瞩目。</p>\n<p>&nbsp;</p>');
INSERT INTO wmis_web_news_html (`id`, `nid`, `content`) VALUES (2, 2, '<p>&nbsp; &nbsp; &nbsp; &nbsp;似乎Windows 8就是一个不该出生的孩子。在地球上不受欢迎也就算了，远在太空的国际空间站(ISS)也没有打算接受这个&ldquo;野心颇大&rdquo;的系统。据外媒报道，ISS决定在接下来的系统升级中，弃用Windows，转而使用Linux。</p>\n<p style=\"text-align: center;\"><img src=\"/upload/images/news/news02.jpg\" alt=\"国际空间站决定弃用 Windows 启用 Linux\" width=\"600\" height=\"406\" /></p>\n<p>&nbsp; &nbsp; &nbsp; &nbsp;ISS中的计算机系统由多台在同一网络运行下的笔记本组成。它可以保证宇航员日常重要事项的正常运行；告知宇航员他们所处的位置，管理运行中的设备，甚至还能连接到摄像机，拍摄太空照片与视频并通过互联网分享给地球上的人。</p>\n<p>&nbsp; &nbsp; &nbsp; &nbsp;Linux基金会称，美国太空局的Keith Chuvala将负责这次的系统交接工作。</p>\n<p>&nbsp; &nbsp; &nbsp; &nbsp;Chuvala表示，太空署之所以决定更换系统是为了能够保持ISS计算机系统运行的稳定性--言下之意就是，过于追求形式的Win8其运行效果并没有达到他们的要求。</p>\n<p>&nbsp; &nbsp; &nbsp; &nbsp;日前，Chuvala及其团队成员正在接受来自Linux基金会的相关培训，希望能够尽快在ISS部署Linux。据悉，Linux基金会专门针对USA和NASA两支团队不同的需求开设了2门不同的培训课程。</p>\n<p>&nbsp;</p>');
INSERT INTO wmis_web_news_html (`id`, `nid`, `content`) VALUES (3, 3, '<div id=\"OSChina_News_45510\">\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 对于编译器如何将人类可读的代码翻译成机器运行的机器码，大多数程序员通常只有大概的概念。在编译过程中，编译器会对代码进行优化，使其能高效的运行。有的时候，编译器在优化上面<a href=\"http://developers.slashdot.org/story/13/10/29/2150211/how-your-compiler-can-compromise-application-security\" target=\"_blank\">走的太远了</a>，它甚至移除了本不应该移除的代码，导致应用程序更加脆弱。</p>\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; MIT人工智能和计算机科学实验室的四位研究人员<a href=\"http://pdos.csail.mit.edu/%7Exi/papers/stack-sosp13.pdf\" target=\"_blank\">调查了</a>（PDF） 不稳定优化（optimization-unstable）代码的问题&mdash;&mdash;编译器移除的包含未定义行为的代码。所谓的未定义行为包括了除以0，空指针间接 引用和缓冲溢出等。在某些情况下，编译器完整移除未定义行为代码可能会导致程序出现安全弱点。</p>\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 研究人员开发了一个静态检查器STACK去识别不稳定的 C/C++代码，他们在测试的系统中发现上百个新bug：Linux内核发现32个bug，Mozilla发现3个，Postgres 9个和Python 5个。STACK扫描了Debian Wheezy软件包仓库8575个含有C/C++代码的软件包，发现其中3471个至少包含一个不稳定的代码。研究人员认为这是一个非常普遍的问题。</p>\n<p>&nbsp;</p>\n</div>');
INSERT INTO wmis_web_news_html (`id`, `nid`, `content`) VALUES (4, 4, '<div id=\"OSChina_News_45507\" class=\"Body NewsContent TextContent\">\n<p>&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp; 据路透社报道，早在上月微软就宣布以54.4亿欧元（约合75亿美元）收购诺基亚手机业务，但直到现在才向欧盟委员会申请批准。这份协议还包括诺基亚向微软授权使用其专利组合10年的内容。</p>\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 欧盟委员会称，将对这笔收购交易进行审查，并在12月4日前做出决定。如果微软肯做出让步，缓解竞争担忧，欧盟也可能将审查期限延长10个工作日。欧盟主要审查微软收购交易是否违反了欧盟反垄断法。由于诺基亚是欧洲公司，各国反垄断机构都将审查该交易以确保竞争不被破坏。</p>\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 印度政府已经批准了该协议，为两家公司扫清了一个障碍，据当地媒体称，印度政府认为协议&ldquo;不可能对竞争产生显著的不利影响&rdquo;。微软收购诺基亚是为了加强羽翼未丰的移动业务，直接参与移动硬件和软件市场的竞争。目前美国监管机构还未批准该协议。</p>\n<p>&nbsp;</p>\n</div>');
INSERT INTO wmis_web_news_html (`id`, `nid`, `content`) VALUES (5, 5, '<div id=\"OSChina_News_45506\" class=\"Body NewsContent TextContent\">\n<p><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"/upload/images/news/news03.jpg\" alt=\"\" width=\"560\" height=\"345\" /></p>\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 我做了三年的<a class=\"g-profile\" href=\"http://plus.google.com/105861211446777554422\" target=\"_blank\">+Perl</a>程序员，以编程为生已经有7年。我生活中<a href=\"http://en.wikipedia.org/wiki/Cluj-Napoca\" target=\"_blank\" rel=\"nofollow\">克路治-那波卡市(Cluj-Napoca)</a>，这是罗马尼亚第二大城市。</p>\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 四年前我就开始困惑于一个问题：作为一个程序员，我的生活水平和其他国家的程序员有多大差距？那时候我的税后收入大概是每月700欧元(约5830 元，1欧元=8.331人民币)。就当时罗马尼亚的经济水平，整个社会的平均工资低于每月325.91欧元(2715元)，我的收入差不多是全国水平的两 倍，这让我产生了一种打死都不离开这里的感觉。然而，这只是一种心理感觉，尽管和其他人比起来我挣得很多，但事实上每月我都挣扎在贫困线上。这种拮据归咎 于我缺乏收入管理，背后的原因是我的妻子刚刚成为一名律师，她现在的收入几乎为0，</p>\n<h3>克路治-那波卡市的程序员的收入情况</h3>\n<p>尽管市场在不断的浮动变化，那波卡市里一名有经验的程序员的基本收入大概是这个水平(这里说的收入都是税后水平&mdash;&mdash;净收入)：</p>\n<ul>\n<li>最初是每月400欧元(3330元)</li>\n<li>每6个月涨100欧元(833元)工资</li>\n</ul>\n<p>根据个别情况，这个数目会有差异，可能更好，可能更坏。</p>\n<p>从好的情况讲，一个程序员的工资水平可以用以下方式获得跳跃式的增长：</p>\n<ul>\n<li>通过直接要求</li>\n<li>通过跳槽</li>\n<li>通过离开公司然后反聘回来</li>\n<li>当然，还可以卓越的成绩来跟公司讨价还价，获得涨薪</li>\n</ul>\n<p>从不好的情况讲，如果发生下列情况，一个程序员的工资会增长的很慢：</p>\n<ul>\n<li>公司的运营状况不好</li>\n<li>不善于谈判</li>\n<li>一个不关心员工的老板。</li>\n<li>自己表现不好</li>\n</ul>\n<p>所以，当发现一个有5年经验的程序员拿月薪税后1500欧元(12.5K元)而一个7年经验的只拿月薪1700欧元(14k元)时，就不足为奇了。</p>\n<h3>几大城市收入/消费水平的比较</h3>\n<p>最近我发现了这个<a href=\"http://www.numbeo.com/cost-of-living/\" target=\"_blank\">numbeo</a>网站，它收集世界上各大城市的消费及收入信息，而且，它能让你将两个城市的物价水平，工资及购买力进行<a href=\"http://www.numbeo.com/cost-of-living/comparison.jsp\" target=\"_blank\" rel=\"nofollow\">比较</a>，你能根据它估算出在另一个城市生活所需要的收入水平。根据它提供的数据，我发现以我现在在那波卡市的收入水平不可能在世界其它城市里生活的很好。(表中的金额都以欧元为单位)</p>\n<table>\n<tbody>\n<tr><th>城市</th><th>参考收入</th><th>收入1</th><th>租房价格</th><th>收入2</th><th>年净收入</th></tr>\n<tr>\n<td>伦敦</td>\n<td>4762</td>\n<td>5,396.93</td>\n<td>1,884.00</td>\n<td>7,280.93</td>\n<td>87,371.20</td>\n</tr>\n<tr>\n<td>柏林</td>\n<td>2784</td>\n<td>3,155.20</td>\n<td>800.00</td>\n<td>3,955.20</td>\n<td>47,462.40</td>\n</tr>\n<tr>\n<td>阿姆斯特丹</td>\n<td>3826</td>\n<td>4,336.13</td>\n<td>3,026.00</td>\n<td>7,362.13</td>\n<td>88,345.60</td>\n</tr>\n<tr>\n<td>纽约</td>\n<td>4848</td>\n<td>5,494.40</td>\n<td>2,214.00</td>\n<td>7,708.40</td>\n<td>92,500.80</td>\n</tr>\n<tr>\n<td>旧金山</td>\n<td>4484</td>\n<td>5,081.87</td>\n<td>2,216.00</td>\n<td>7,297.87</td>\n<td>87,574.40</td>\n</tr>\n</tbody>\n</table>\n<h3>这些数字的含义</h3>\n<p><strong>参考收入 &ndash; </strong>是指在那个城市如果想让生活质量达到我现在在那波卡市的生活水平，你需要达到的收入水平。按我在那波卡市每月1500欧元收入算。上表中显示的都是税后收入或净收入。</p>\n<p><strong>收入1 &ndash; </strong>是指如果想在那个城市的生活质量达到在那波卡市的每月1700欧元生活水平质量，你需要达到的净收入。我列出1700欧元水平的原因是它很接近我的水平，这是有7年工作经验的程序员的平均水平。</p>\n<p><strong>租房价格 &ndash; </strong>一个三居室的价格，非市中心。</p>\n<p><strong>收入2 &ndash; </strong>这是收入1栏和租房价格的汇总</p>\n<p><strong>年净收入 &ndash; </strong>是指<em>收入2</em>栏乘以12个月</p>\n<h3>需要更多的数据</h3>\n<p>如果在上表中再加入一列各城市的程序员的平均收入信息，那就更清晰了。遗憾的是，我搜查过的大多数网站上只提供税前年收入。因为各地的税收情况各 异，不可能计算出税后收入。所以，如果你是一个在上述城市生活的程序员，并且知道当地平均净收入的情况，请在评论里分享给大家，我会更新到文章里。</p>\n<h3>克路治-那波卡市(Cluj-Napoca)程序员的生活情况</h3>\n<p>因为罗马尼亚较低的购买力水平，人们日常的消费水平也比较低。看一下<a href=\"http://www.numbeo.com/cost-of-living/city_result.jsp?country=Romania&amp;city=Cluj-Napoca&amp;displayCurrency=EUR\" target=\"_blank\" rel=\"nofollow\">numbeo网站上关于那波卡市</a>的价格水平信息。</p>\n<p>1700欧元每月你可以过上任何想要的生活&mdash;&mdash;如果你是个喜欢聚会的人。你的生活大概可以是这样：</p>\n<ul>\n<li>一顿三餐(3餐12欧元 * 30 days = 360 欧元/月).</li>\n<li>每个周末去最贵的俱乐部玩乐(一晚30欧元 * 8晚 = 240欧元/月)</li>\n<li>工作日喝最贵的酒吧里的啤酒，按最大量算(5瓶啤酒 * 1.5欧元/瓶 * 22天 = 165欧元/月)</li>\n<li>每天只坐出租车(一天5欧元 * 30天 = 150欧元)</li>\n<li>房租和杂费(370欧元)</li>\n<li>总计：1285欧元/月</li>\n</ul>\n<p>如果你生活的健康些，消费会更低。</p>\n<p>克路治-那波卡市(Cluj-Napoca)是一个大学城，学生开学期间人口会增加33%（有10万学生在这里）。几乎每天都有文化活动，音乐会，俱乐部活动或大银幕投影活动可以参加。在这么多人中间我感到年轻了很多(我不是很老，我31岁)。</p>\n<p>我居住在城市的一端，公司在市中心，我开车去那里只需要10分钟，非常方便。</p>\n<h3>结论</h3>\n<p>除了钱外，我还考虑的很多其它因素，比如创业机会。这就是为什么我会选择比较上面几个城市：它们都是创业和IT发展最活跃的城市。如果创业的想法控制了我，这几个城市将是我去的目标。但目前，我仍愿意留在这里，成为那波卡市本地创业社区中的活跃一员。</p>\n<p>[英文原文：<a href=\"http://programming.tudorconstantin.com/2013/10/why-ill-never-leave-romania-as-software.html\">Why I\'ll never leave Romania as a software developer</a> ]</p>\n</div>');
INSERT INTO wmis_web_news_html (`id`, `nid`, `content`) VALUES (6, 6, '<div id=\"OSChina_News_45471\" class=\"Body NewsContent TextContent\">\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 据国外媒体报道，惠普和戴尔当地时间周一在ARM TechCon会议上公布了推出ARM服务器的计划。ARM架构服务器处理能力强大，但能耗低于目前的英特尔架构服务器。它们有助于数据中心在处理更多数据的同时，降低成本和能耗。</p>\n<p><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"/upload/images/news/news04.jpg\" alt=\"\" width=\"600\" height=\"336\" /></p>\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ARM架构<a target=\"_blank\">服务器</a>并非新生事物。多年来，戴尔一直在与Calxeda联合开发ARM架构服务器。但是，由于AMR芯片不能运行大多数企业软件，ARM架构服务器销量并不大，这也是英特尔架构服务器销量大的原因。</p>\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 戴尔今天展示了一款运行Linux操作系统的64位ARM架构服务器。戴尔是多家计划明年推出64位ARM架构服务器的公司之一。市场研究公司Pund-It总裁查尔斯&middot;金(Charles King)表示，今天的展示表明，戴尔明年能如期在市场上发售ARM服务器。</p>\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 惠普今天也发布了配置Calexda ARM架构芯片的Moonshot服务器。惠普2011年推出了配置Calexda ARM架构芯片的Moonshot，但因自身原因没有向客户销售。惠普一直在销售配置英特尔凌动芯片的Moonshot服务器。</p>\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 英 特尔并未停滞不前，约一年前发布了一款64位低能耗凌动芯片。在数据库、操作系统等软件方面，英特尔凌动芯片有优势。ARM架构芯片缺乏数据库、操作系统 等软件。但是，ARM架构芯片在软件支持方面的劣势可能逐步缓解。Red Hat一直在与服务器厂商合作，将其软件移植到32位和64位ARM架构服务器上。</p>\n</div>');
INSERT INTO wmis_web_news_html (`id`, `nid`, `content`) VALUES (7, 7, '<div id=\"p_fullcontent\" class=\"detail TextContent\">\n<p><img class=\"aligncenter size-full wp-image-365690\" style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"/upload/images/news/news05.jpg\" alt=\"AI\" width=\"600\" height=\"375\" /></p>\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 随着智能设备的普及，人工智能的研究已经不再局限于学术界，Google、Facebook 等公司都进入这个领域。科技公司的优势是大量的用户，这不仅为机器智能研究提供了大量数据，而且为机器智能的训练提供了现实的场景。由于人工智能是公司竞 争力的重要方面，很难想象他们会轻易分析其成果。不过，有一家公司却把其人工智能方面的研究开源了。</p>\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 这家公司是 Grok，由 Jeff Hawkins 和生意伙伴联合创建。Jeff Hawkins 曾参与创办 Palm 和 Handspring，但是他真正的激情所在是人工智能和神经科学。在离开 Handspring 之后，Hawkins 创办了红杉理论神经科学研究中心。2005 年，他参与创办 Grok（原名 Numenta），想要把人工智能研究成果转换为市场化的产品。</p>\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 2010年，开发团队发布过一份白皮书，介绍公司的层级实时记忆脑皮质学习算法（<a href=\"http://numenta.org/cla-white-paper.html\" target=\"_blank\">此处</a>有中文版下载）。如今，他们又发布了开源平台 NuPIC，其中包括了公司的算法和软件架构。</p>\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &ldquo;我们不仅仅是把构建项目的工具开源，而是把产品的核心开源了&rdquo;，Grok 开源社群经理 Matthew Taylor 对 <a href=\"http://www.wired.com/wiredenterprise/2013/10/nupic/\" target=\"_blank\">Wired 网站</a>说，&ldquo;没有 NuPIC，Grok 将无法生存。&ldquo;</p>\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Grok 使用的机器学习算法是 Hawkins 创造的，叫做脑皮质学习算法，或简称为 CLA。CLA 试图模仿人脑的结构，特别是负责处理高级认知功能的新皮质部分。目前来说，CLA 还远远无法模拟整个人脑。不过，这已经是机器学习上的重大进步了。</p>\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; NuPIC 并不是唯一开源的机器学习算法，但是它有自己的独特之处。Taylor 说，许多机器学习算法无法适应新模式，而 NuPIC 的运作接近于人脑，&ldquo;当模式变化的时候，它会忘掉旧模式，记忆新模式&rdquo;。如人脑一样，CLA 算法能够适应新的变化。&ldquo;如果有一天，你醒来的时候发现过去认为是蓝色的东西变成了红色，一开始会感到不安，&rdquo;他说，&ldquo;但你会逐渐地适应。&rdquo;</p>\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 目前，使用 NuPIC 的只有 Grok 一家公司，而且进行的是 IT 基础设施监控，不过，NuPIC 的用途是非常广泛的，任何公司都能够用它构建自己的产品。Taylor 说，IBM 和希捷都对 NuPIC 表示了兴趣。同时，项目开源之后，开发者们也可以参与其中。对于那些不懂编码，但是对神经科学或计算机科学感兴趣的人，公司还提供了邮件组。人们可以在那 里交流，贡献自己的想法。</p>\n<p>介绍内容来自: <a href=\"http://www.ifanr.com/365664\" target=\"_blank\">http://www.ifanr.com/365664</a></p>\n</div>');


#
# TABLE STRUCTURE FOR: wmis_web_pro
#

DROP TABLE IF EXISTS wmis_web_pro;

CREATE TABLE `wmis_web_pro` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `class` varchar(24) NOT NULL,
  `title` varchar(36) NOT NULL,
  `img` varchar(64) DEFAULT NULL,
  `uname` varchar(16) NOT NULL,
  `ctime` datetime NOT NULL,
  `state` varchar(1) NOT NULL DEFAULT '0',
  `click` int(6) NOT NULL,
  `key` varchar(64) DEFAULT NULL,
  `summary` varchar(300) DEFAULT NULL,
  `content` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

INSERT INTO wmis_web_pro (`id`, `class`, `title`, `img`, `uname`, `ctime`, `state`, `click`, `key`, `summary`, `content`) VALUES (1, ':6:9:', 'Apple/苹果 Macbook air MD760CH/A', '/upload/images/pro/pro01.png', 'admin', '2013-09-27 14:29:32', '1', 0, 'Apple/苹果,Macbook air,MD760CH/A', '2013年6月最新发布的港版MACBOOK AIR。都是原封哦。不是原封无条件退货。\n全场包顺丰+保价+保税，价格均为到你手的价格。\n标准配置的760和761促销中，价格实惠，大家赶紧出手。现在定制机基本都有现货。', '<p>注意：所有macbook air笔记本只有苹果官方公布的金属银色。宝贝颜色分类只是本店用来区分不同型号配置。.（需要装 WIN8请备注留言）</p>\n<p><img id=\"__mcenew\" style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"/upload/images/pro/pro01.png\" alt=\"Apple/苹果 Macbook air MD760CH/A 711 712 760 761港版笔记本\" width=\"645\" height=\"335\" /></p>\n<p>紫色代表：2013款11寸128G硬盘/4G内存 i5处理器&nbsp; 型号：MD711ZP/A</p>\n<p>红色代表：2013款11寸256G硬盘/4G内存 i5处理器&nbsp; 型号：MD712ZP/A</p>\n<p>灰色代表：2013款13寸128G硬盘/4G内存 i5处理器&nbsp; 型号：MD760ZP/A</p>\n<p>白色代表：2013款13寸256G硬盘/4G内存 i5处理器&nbsp; 型号：MD761ZP/A<br /><br /></p>');
INSERT INTO wmis_web_pro (`id`, `class`, `title`, `img`, `uname`, `ctime`, `state`, `click`, `key`, `summary`, `content`) VALUES (2, ':6:10:', '2013秋新款韩版百搭纯色中长款修身衬衫衬衣(配腰带)', '/upload/images/pro/pro02.jpg', 'admin', '2013-09-27 14:42:41', '1', 0, '2013,秋新款韩版,百搭纯色,中长款,修身衬衫衬衣,配腰带', '质量做工很上乘的一款衬衫、采用柔软舒适的棉质面料、手感很好、亲肤型佳、中等厚度、中长款版型、长约在大腿中部、休闲款式、开襟系扣款、圆领开口、袖子上有系扣、袖摆可卷边穿着、尽显休闲随性感觉、胸前两侧有收褶设计、简洁大方款式、腰部搭配配送的皮革腰带、酷感十足、效果很赞的哟、百搭款的衬衣、MM们一定不要错过喽', '<p><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"/upload/images/pro/pro02.jpg\" alt=\"2013秋新款韩版百搭纯色中长款修身衬衫衬衣(配腰带)\" width=\"560\" height=\"700\" /></p>\n<p>质量做工很上乘的一款衬衫、采用柔软舒适的棉质面料、手感很好、亲肤型佳、中等厚度、中长款版型、长约在大腿中部、休闲款式、开襟系扣款、圆领开口、袖子上有系扣、袖摆可卷边穿着、尽显休闲随性感觉、胸前两侧有收褶设计、简洁大方款式、腰部搭配配送的皮革腰带、酷感十足、效果很赞的哟、百搭款的衬衣、MM们一定不要错过喽</p>');
INSERT INTO wmis_web_pro (`id`, `class`, `title`, `img`, `uname`, `ctime`, `state`, `click`, `key`, `summary`, `content`) VALUES (3, ':6:10:', '耐克官方旗舰店2013专柜正品 男鞋女鞋运动鞋气垫跑步鞋', '/upload/images/pro/pro03.jpg', 'admin', '2013-10-31 15:21:41', '1', 0, '耐克官方旗舰店2013专柜正品 男鞋女鞋运动鞋气垫跑步鞋', 'AIR MAX+ 2012 跑步鞋以终极缓震性与稳定性能捍卫你的疾驰征程，MAX AIR 气垫技术让双脚踏出的每一步都犹如云端漫步般舒适、自由与轻松。', '<p>AIR MAX+ 2012 跑步鞋以终极缓震性与稳定性能捍卫你的疾驰征程，MAX AIR 气垫技术让双脚踏出的每一步都犹如云端漫步般舒适、自由与轻松。</p>\n<p><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"/upload/images/pro/pro03.jpg\" alt=\"\" width=\"650\" /><br /><br />支撑力<br /><br />AIR MAX+ 2012 跑步鞋将为你的双脚带来颠覆性合脚感与支撑力，鞋面双层FUSE技术搭配锯齿鞋套设计可完全贴合脚型，助你时刻以最佳状态开始驰骋之旅。铸模鞋领可防止脚跟在鞋内滑动，即使在高速跑动状态下依然保持超高稳定性。<br /><br />缓震性<br /><br />鞋 如其名，AIR MAX+ 2012 跑步鞋匠心运用Nike强大的MAX AIR 气垫技术，柔软、针对性的缓震缓冲性能可解决下向力对身体机能和运动表现的影响，助你不断刷新个人最佳记录。CUSHLON泡沫中底轻质灵活，可搭配 MAX AIR 气垫提供更全方位的缓震保护。<br /><br />&nbsp;&nbsp;&nbsp; 双层FUSE技术和锯齿鞋套提供轻质灵活性和舒适支撑感<br />&nbsp;&nbsp;&nbsp; 中足采用Flywire技术，鞋头注入式TPU覆面提供轻质、持久支撑和灵活性<br />&nbsp;&nbsp;&nbsp; CUSHLON泡沫中底提供柔软、轻质减震性<br />&nbsp;&nbsp;&nbsp; 外底弯曲槽纹路提升步态流畅性<br />&nbsp;&nbsp;&nbsp; 鞋跟使用BRS1000碳素橡胶材质，带来持久抓地力<br />&nbsp;&nbsp;&nbsp; 重量：仅13.6盎司<br />&nbsp;&nbsp;&nbsp; 专为寻求柔软减震和多变款式的跑者设计的鞋款</p>');
INSERT INTO wmis_web_pro (`id`, `class`, `title`, `img`, `uname`, `ctime`, `state`, `click`, `key`, `summary`, `content`) VALUES (4, ':6:9:', '松下GF2+14/2.5定焦+转接环 廉价便携微单 单反备机', '/upload/images/pro/pro04.jpg', 'admin', '2013-10-31 15:32:08', '1', 0, '松下GF2+14/2.5定焦+转接环 廉价便携微单 单反备机', '除机身、镜头外，还有品牌充+品牌电+8G卡，以及M42转M43、PK转M43的转接环各一个，可以用来转接使用手动老镜头，触屏点击可放大对焦，测光准确。', '<ul style=\"list-style: none; color: #666666; line-height: 24.0px; padding-left: 10.0px; font-size: 12.0px;\">\n<li><strong><span style=\"font-size: 16.0px;\">升级C幅微单，闲置松下GF2+14/2.5定焦套机~</span></strong><br />&nbsp;<img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"/upload/images/pro/pro04.jpg\" alt=\"松下GF2+14/2.5定焦+转接环\" width=\"650\" /></li>\n</ul>\n<p>&nbsp;机身镜头都挺完美，快门次数不到1000，没有磨损或磕碰，镜头镜片镀膜完整，无霉无痕无尘，一切正常使用<br /><br />GF2和GF1近似，体积较GF3/5更大，方方正正，可单手握持，带热靴可以接外闪、引闪，自带内闪可以斜向上释放玩跳闪<br /><br />画质方面，GF2/GF3/GF5都是同一个传感，都一个样，视频方面GF2已经是全高清+双声道，GF3/5为便携还牺牲成了单声道，电池容量也缩减了</p>\n<p><br />除机身、镜头外，还有品牌充+品牌电+8G卡，以及M42转M43、PK转M43的转接环各一个，可以用来转接使用手动老镜头，触屏点击可放大对焦，测光准确。</p>');
INSERT INTO wmis_web_pro (`id`, `class`, `title`, `img`, `uname`, `ctime`, `state`, `click`, `key`, `summary`, `content`) VALUES (5, ':6:10:', '2013新款复古油蜡牛皮长款真皮女钱包韩版大容量抽带三折女士钱夹', '/upload/images/pro/pro05.png', 'admin', '2013-10-31 15:39:26', '1', 0, '2013新款 复古油蜡牛皮 长款真皮女钱 包韩版大容量 抽带三折女士钱夹', '2013新款复古油蜡牛皮长款真皮女钱包韩版大容量抽带三折女士钱夹', '<p><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"/upload/images/pro/pro05.png\" alt=\"2013新款复古油蜡牛皮长款真皮女钱包韩版大容量抽带三折女士钱夹\" width=\"650\" /></p>\n<h3 style=\"text-align: center;\">2013新款复古油蜡牛皮长款真皮女钱包韩版大容量抽带三折女士钱夹</h3>');
INSERT INTO wmis_web_pro (`id`, `class`, `title`, `img`, `uname`, `ctime`, `state`, `click`, `key`, `summary`, `content`) VALUES (6, ':6:10:', '天骄华庭--80后大爱-时尚简约不简单', '/upload/images/pro/pro06.jpg', 'admin', '2013-10-31 15:55:34', '1', 0, '天骄华庭--80后大爱-时尚简约不简单', ' 以简洁明快的设计风格为主调，简洁和实用是现代简约风格的基本特点。简约风格已经大行其道几年了，仍然保持很猛的势头，这是因为人们装修时总希望在经济、 实用、舒适的同时，体现一定的文化品味。而简约风格不仅注重居室的实用性，而且还体现出了现代社会生活的精致与个性，符合现代人的生活品位。', '<p><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"/upload/images/pro/pro06.jpg\" alt=\"天骄华庭--80后大爱-时尚简约不简单\" width=\"650\" /></p>\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 以简洁明快的设计风格为主调，简洁和实用是现代简约风格的基本特点。简约风格已经大行其道几年了，仍然保持很猛的势头，这是因为人们装修时总希望在经济、 实用、舒适的同时，体现一定的文化品味。而简约风格不仅注重居室的实用性，而且还体现出了现代社会生活的精致与个性，符合现代人的生活品位。</p>');


