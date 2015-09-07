<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no">
	<meta name="format-detection" content="telephone=no">
	<meta name="author" content="KSPHP" />
	<title><?php echo $this->lang->line('inc_title');?></title>
	<meta name="author" content="KSPHP" />
	<meta name="keywords" content="<?php echo $this->lang->line('inc_key');?>" />
	<meta  name="description"  content="<?php echo $this->lang->line('inc_des');?>"/>
	<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
	<link href="<?php echo base_url('../webmis/themes/'.$this->config->config['webmis_themes'].'/webmis.css'); ?>" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url('../themes/m/'.$this->config->config['m_themes'].'/m.css');?>" rel="stylesheet" type="text/css" />
	<script language="javascript" src="<?php echo base_url('../webmis/plugin/jquery/jquery-2.min.js'); ?>"></script>
	<script language="javascript" src="<?php echo base_url('../webmis/jquery.webmis.js'); ?>"></script>
<?php if(@$LoadCSS){foreach($LoadCSS as $val){ ?>
	<link href="<?php echo base_url('../themes/m/'.$this->config->config['m_themes'].'/css/'.$val);?>" rel="stylesheet" type="text/css" />
<?php }}?>
</head>
<body>
