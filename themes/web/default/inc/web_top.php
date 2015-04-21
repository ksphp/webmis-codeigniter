<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title>WebMIS 基于CI的PHP免费开源框架</title>
	<meta name="author" content="KSPHP" />
	<meta name="keywords" content="WebMIS,PHP快速开发框架,PHP开源框架,CI快速开发框架,CodeIgniter框架,网站建设CMS框架,灵创网络" />
	<meta  name="description"  content="WEBMIS是免费开源PHP开发CMS系统，基于CI的MVC模式开发的多用户、多权限解决方案，可以后台添加管理菜单，整合了Jquery，TinyMCE编辑器等插件、实现简洁、美观的弹框效果！"/>
	<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
	<link href="<?php echo base_url('../webmis/themes/'.$this->config->config['webmis_themes'].'/webmis.css'); ?>" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url('../themes/web/'.$this->config->config['web_themes'].'/web.css');?>" rel="stylesheet" type="text/css" />
<?php if(@$css){ foreach($css as $val){ ?>
	<link href="<?php echo base_url('../themes/web/'.$this->config->config['web_themes'].'/css/'.$val);?>" rel="stylesheet" type="text/css" />
<?php }}?>
</head>
<body>
