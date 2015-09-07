<!DOCTYPE html>
<html>

<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no">
	<meta name="format-detection" content="telephone=no">
	<meta name="author" content="KSPHP" />
	<title><?php echo $this->config->config['title'];?></title>
	<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
	<link href="<?php echo base_url('../webmis/themes/'.$this->config->config['webmis_themes'].'/webmis.css'); ?>" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url('../themes/admin/'.$this->config->config['admin_themes'].'/admin.mo.css'); ?>" rel="stylesheet" type="text/css" />
	<script language="javascript" src="<?php echo base_url('../webmis/plugin/jquery/jquery-2.min.js'); ?>"></script>
	<script language="javascript" src="<?php echo base_url('../webmis/jquery.webmis.js'); ?>"></script>
<?php if(@$LoadCSS){foreach($LoadCSS as $val){ ?>
	<link href="<?php echo base_url('../themes/admin/'.$this->config->config['admin_themes'].'/css/'.$val); ?>" rel="stylesheet" type="text/css" />
<?php }}?>
</head>

<body>
<header class="top">
	<div class="logo"></div>
	<span class="info"><?php echo $Menus['userHtml'];?></span>
</header>
<div class="nav_ct">
	<ul id="Nav" class="nav">
<?php
$menus = FALSE;
foreach ($Menus['Date'] as $val){
	$an = $val['id']==$Menus['FID']['FID1']?'an1':'an2';
	$ico = $val['ico']?'<em class="'.$val['ico'].'"></em>':'';
	$title = $this->lang->line($val['title']);
	$title = $title?$title:$val['title'];
	if(@$val['menus']){$menus = $val['menus'];}
?>
		<li><a href="<?php echo base_url($val['url'].'.html');?>" class="<?php echo $an;?>"><?php echo $ico.$title;?></a></li>
<?php }?>
	</ul>
</div>
	<!-- Left Menus -->
	<div class="left_menu"><em class="ico-menus"></em></div>
	<div class="menu_ct">
<?php if($menus){foreach($menus as $val1){
	$title = $this->lang->line($val1['title']);
	$title = $title?$title:$val1['title'];
?>
		<div class="title"><a href="#"><em class="<?php echo $val1['ico'];?>"></em><?php echo $title;?></a></div>
		<ul class="list">
<?php if(@$val1['menus']){foreach($val1['menus'] as $val2){
	$an = $val2['id']==$Menus['FID']['FID3']?'left_an1':'left_an2';
	$title = $this->lang->line($val2['title']);
	$title = $title?$title:$val2['title'];
?>
			<li><a href="<?php echo base_url($val2['url'].'.html');?>" class="<?php echo $an;?>"><em class="<?php echo $val2['ico'];?>"></em><?php echo $title;?></a></li>
<?php }}?>
		</ul>
<?php }}?>
	</div>
<section id="ctBody" class="ct_body">
