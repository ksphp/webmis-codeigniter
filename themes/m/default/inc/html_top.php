<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no">
	<meta name="format-detection" content="telephone=no">
	<meta name="author" content="KSPHP" />
	<title>WebMIS 手机版</title>
	<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
	<link href="<?php echo base_url('../webmis/themes/'.$this->config->config['webmis_themes'].'/webmis.css'); ?>" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url('../themes/m/'.$this->config->config['m_themes'].'/m.css');?>" rel="stylesheet" type="text/css" />
<?php if(@$css){ foreach($css as $val){ ?>
	<link href="<?php echo base_url('../themes/m/'.$this->config->config['m_themes'].'/css/'.$val);?>" rel="stylesheet" type="text/css" />
<?php }}?>
</head>
<body>
