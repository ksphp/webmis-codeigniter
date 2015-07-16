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
	if(@$val['menus']){$menus = $val['menus'];}
?>
		<li><a href="<?php echo base_url($val['url'].'.html');?>" class="<?php echo $an;?>"><?php echo $ico.$val['title'];?></a></li>
<?php }?>
	</ul>
</div>
	<!-- 左侧菜单 -->
	<div class="left_menu">M</div>
	<div class="menu_ct">
<?php if($menus){foreach($menus as $val1){?>
		<div class="title"><a href="#"><em class="<?php echo $val1['ico'];?>"></em><?php echo $val1['title'];?></a></div>
		<ul class="list">
<?php if(@$val1['menus']){foreach($val1['menus'] as $val2){
	$an = $val2['id']==$Menus['FID']['FID3']?'left_an1':'left_an2';
?>
			<li><a href="<?php echo base_url($val2['url'].'.html');?>" class="<?php echo $an;?>"><em class="<?php echo $val2['ico'];?>"></em><?php echo $val2['title'];?></a></li>
<?php }}?>
		</ul>
<?php }}?>
	</div>
<section id="ctBody" class="ct_body">
