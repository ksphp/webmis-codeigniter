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
  `ico` varchar(12) DEFAULT NULL,
  `remark` varchar(30) NOT NULL,
  `ctime` varchar(19) NOT NULL DEFAULT '2010-01-01 08:00:00',
  `sort` int(3) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

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
  `img` varchar(60) DEFAULT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

INSERT INTO wmis_web_news (`id`, `type`, `class`, `title`, `img`, `source`, `author`, `uname`, `ctime`, `click`, `key`, `summary`, `audit`, `atime`, `state`) VALUES (1, '0', ':2:4:', '微软开发者解释为什么Windows内核落后于Linux', '/upload/images/news/80961368671891.jpg', 'KSPHP', 'KSPHP', 'webmis', '2013-05-16 10:36:19', 144, '微软开发者,Windows内核落后于Linux', '微软Windows操作系统在复杂负荷情况下的性能落后于Linux，这已是公认的事实。Linux内核发布了一个又一个新版本，我们能看到它不断改进 I/O调度、进程调度、文件系统优化，TCP/IP堆栈的无线网络优化，等等等等。', 'webmis', '2013-05-16', '1');
INSERT INTO wmis_web_news (`id`, `type`, `class`, `title`, `img`, `source`, `author`, `uname`, `ctime`, `click`, `key`, `summary`, `audit`, `atime`, `state`) VALUES (2, '0', ':2:3:', '国际空间站决定弃用 Windows 启用 Linux', '/upload/images/news/36831368672071.jpg', 'KSPHP', 'KSPHP', 'webmis', '2013-05-16 10:40:30', 140, '国际空间站,弃用Windows,启用Linux', '似乎Windows 8就是一个不该出生的孩子。在地球上不受欢迎也就算了，远在太空的国际空间站(ISS)也没有打算接受这个“野心颇大”的系统。据外媒报道，ISS决定在接下来的系统升级中，弃用Windows，转而使用Linux。', 'admin', '2013-09-03', '1');


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

INSERT INTO wmis_web_news_html (`id`, `nid`, `content`) VALUES (1, 1, '<p style=\"text-align: center;\">&nbsp;</p>\n<p style=\"text-align: center;\"><img src=\"/upload/images/news/80961368671891.jpg\" alt=\"微软开发者解释为什么Windows内核落后于Linux\" width=\"600\" height=\"277\" /></p>\n<p>&nbsp;</p>\n<p>&nbsp; &nbsp; &nbsp; &nbsp;微软Windows操作系统在复杂负荷情况下的性能落后于Linux，这已是公认的事实。Linux内核发布了一个又一个新版本，我们能看到它不断改进 I/O调度、进程调度、文件系统优化，TCP/IP堆栈的无线网络优化，等等等等。</p>\n<p>&nbsp; &nbsp; &nbsp; &nbsp;一位微软Windows NT内核开发者<a href=\"http://blog.zorinaq.com/?e=74\" target=\"_blank\">承认</a>，Windows内核与Linux内核之间的性能差距正日益拉大。他通过Tor(原因显而易见)在Hacker News上<a href=\"https://news.ycombinator.com/item?id=5689391\" target=\"_blank\">匿名发帖</a>(已 经自行删除)，指出问题的根源不是技术方面而是社会性的。微软开发者几乎没人会为了自己为了荣耀而去改进内核，Linux世界的那些现象在微软这样的大企 业不会发生。能指挥开发者改进特定条件下系统性能的人的动机通常是出于商业意图，而在商业上性能的重要性从来没有被认为攸关生死，所以改进系统性能没有正 式或非正式的程序。</p>\n<p>&nbsp; &nbsp; &nbsp; &nbsp;微软在Windows &nbsp;SP3前开始关注安全是因为他们认为安全是商业目标的存在性威胁，而性能不是存在性威胁。内核不同组件的负责人对外部递交补丁一般都是充满敌意的，非提前 计划的改变可能会影响原定目标，领导会生气，测试组也会生气，产品经理也会发怒。内核开发团队因此没有动机去接受外界递交的补丁。你总能找到理由说不，但 很少有动机去说好的。而在Linux世界，如果能把某一功能的性能改进5%，你将会被万众瞩目。</p>\n<p>&nbsp;</p>');
INSERT INTO wmis_web_news_html (`id`, `nid`, `content`) VALUES (2, 2, '<p>&nbsp; &nbsp; &nbsp; &nbsp;似乎Windows 8就是一个不该出生的孩子。在地球上不受欢迎也就算了，远在太空的国际空间站(ISS)也没有打算接受这个&ldquo;野心颇大&rdquo;的系统。据外媒报道，ISS决定在接下来的系统升级中，弃用Windows，转而使用Linux。</p>\n<p style=\"text-align: center;\"><img src=\"/upload/images/news/36831368672071.jpg\" alt=\"国际空间站决定弃用 Windows 启用 Linux\" width=\"600\" height=\"406\" /></p>\n<p>&nbsp; &nbsp; &nbsp; &nbsp;ISS中的计算机系统由多台在同一网络运行下的笔记本组成。它可以保证宇航员日常重要事项的正常运行；告知宇航员他们所处的位置，管理运行中的设备，甚至还能连接到摄像机，拍摄太空照片与视频并通过互联网分享给地球上的人。</p>\n<p>&nbsp; &nbsp; &nbsp; &nbsp;Linux基金会称，美国太空局的Keith Chuvala将负责这次的系统交接工作。</p>\n<p>&nbsp; &nbsp; &nbsp; &nbsp;Chuvala表示，太空署之所以决定更换系统是为了能够保持ISS计算机系统运行的稳定性--言下之意就是，过于追求形式的Win8其运行效果并没有达到他们的要求。</p>\n<p>&nbsp; &nbsp; &nbsp; &nbsp;日前，Chuvala及其团队成员正在接受来自Linux基金会的相关培训，希望能够尽快在ISS部署Linux。据悉，Linux基金会专门针对USA和NASA两支团队不同的需求开设了2门不同的培训课程。</p>\n<p>&nbsp;</p>');


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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

INSERT INTO wmis_web_pro (`id`, `class`, `title`, `img`, `uname`, `ctime`, `state`, `click`, `key`, `summary`, `content`) VALUES (1, ':6:9:', 'Apple/苹果 Macbook air MD760CH/A', '/upload/images/pro/201309270001.png', 'admin', '2013-09-27 14:29:32', '1', 0, 'Apple/苹果,Macbook air,MD760CH/A', '2013年6月最新发布的港版MACBOOK AIR。都是原封哦。不是原封无条件退货。\n全场包顺丰+保价+保税，价格均为到你手的价格。\n标准配置的760和761促销中，价格实惠，大家赶紧出手。现在定制机基本都有现货。', '<p>注意：所有macbook air笔记本只有苹果官方公布的金属银色。宝贝颜色分类只是本店用来区分不同型号配置。.（需要装 WIN8请备注留言）</p>\n<p><img id=\"__mcenew\" style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"/upload/images/pro/201309270001.png\" alt=\"Apple/苹果 Macbook air MD760CH/A 711 712 760 761港版笔记本\" width=\"645\" height=\"335\" /></p>\n<p>紫色代表：2013款11寸128G硬盘/4G内存 i5处理器&nbsp; 型号：MD711ZP/A</p>\n<p>红色代表：2013款11寸256G硬盘/4G内存 i5处理器&nbsp; 型号：MD712ZP/A</p>\n<p>灰色代表：2013款13寸128G硬盘/4G内存 i5处理器&nbsp; 型号：MD760ZP/A</p>\n<p>白色代表：2013款13寸256G硬盘/4G内存 i5处理器&nbsp; 型号：MD761ZP/A<br /><br /></p>');
INSERT INTO wmis_web_pro (`id`, `class`, `title`, `img`, `uname`, `ctime`, `state`, `click`, `key`, `summary`, `content`) VALUES (2, ':6:10:', '2013秋新款韩版百搭纯色中长款修身衬衫衬衣(配腰带)', '/upload/images/pro/201309270002.jpg', 'admin', '2013-09-27 14:42:41', '1', 0, '2013,秋新款韩版,百搭纯色,中长款,修身衬衫衬衣,配腰带', '质量做工很上乘的一款衬衫、采用柔软舒适的棉质面料、手感很好、亲肤型佳、中等厚度、中长款版型、长约在大腿中部、休闲款式、开襟系扣款、圆领开口、袖子上有系扣、袖摆可卷边穿着、尽显休闲随性感觉、胸前两侧有收褶设计、简洁大方款式、腰部搭配配送的皮革腰带、酷感十足、效果很赞的哟、百搭款的衬衣、MM们一定不要错过喽', '<p><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"/upload/images/pro/201309270002.jpg\" alt=\"2013秋新款韩版百搭纯色中长款修身衬衫衬衣(配腰带)\" width=\"560\" height=\"700\" /></p>\n<p>质量做工很上乘的一款衬衫、采用柔软舒适的棉质面料、手感很好、亲肤型佳、中等厚度、中长款版型、长约在大腿中部、休闲款式、开襟系扣款、圆领开口、袖子上有系扣、袖摆可卷边穿着、尽显休闲随性感觉、胸前两侧有收褶设计、简洁大方款式、腰部搭配配送的皮革腰带、酷感十足、效果很赞的哟、百搭款的衬衣、MM们一定不要错过喽</p>');


