<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title>WebMIS PHP快速开发框架</title>
	<meta name="author" content="Unknown" />
	<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
	<link href="<?php echo base_url('../webmis/themes/'.$this->config->config['webmis_themes'].'/webmis.css'); ?>" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url('../themes/web/'.$this->config->config['web_themes'].'/web.css');?>" rel="stylesheet" type="text/css" />
<?php if(@$css){ foreach($css as $val){ ?>
	<link href="<?php echo base_url('../themes/web/'.$this->config->config['web_themes'].'/css/'.$val);?>" rel="stylesheet" type="text/css" />
<?php }}?>
</head>
<body>
