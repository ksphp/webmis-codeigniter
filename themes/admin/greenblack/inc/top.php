<!DOCTYPE html>
<html>

<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="author" content="Unknown" />
	<title><?php echo $this->config->config['title'];?></title>
	<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
	<link href="<?php echo base_url('../webmis/themes/'.$this->config->config['webmis_themes'].'/webmis.css'); ?>" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url('../themes/admin/'.$this->config->config['admin_themes'].'/admin.css'); ?>" rel="stylesheet" type="text/css" />
</head>

<body class="top_bg">
<?php if($isIE){?>
	<div class="isIE"><?php echo $this->lang->line('admin_isIE');?></div>
<?php }?>
<header class="top_ct">
	<div class="top_logo"><a href="http://www.ksphp.com" title="WebMIS" target="_blank">&nbsp;</a></div>
	<ul class="nav">
<?php
$menus = FALSE;
foreach ($Menus['Date'] as $val){
	$an = $val['id']==$Menus['FID']['FID1']?'nav_an1':'nav_an2';
	$ico = $val['ico']?'<em class="'.$val['ico'].'"></em>':'';
	if(@$val['menus']){$menus = $val['menus'];}
?>
		<li><a href="<?php echo base_url($val['url'].'.html');?>" class="<?php echo $an;?>"><?php echo $ico.$this->lang->line($val['title']);?></a></li>
<?php }?>
	</ul>
	<span class="top_link"><?php echo $Menus['userHtml'];?></span>
</header>
<section class="ct_body">
	<aside class="ct_left">
<?php if($menus){foreach ($menus as $val1){
	//$class = $val1['id']==$Menus['FID']['FID2']?'left_menu_an1':'left_menu_an2';
?>
		<div class="left_title" onclick="menuTwo('<?php echo $val1['id'];?>',$(this))"><em class="<?php echo $val1['ico'];?>"></em><?php echo $this->lang->line($val1['title']);?></div>
		<ul class="left_list" id="menuThree_<?php echo $val1['id'];?>">
<?php if(@$val1['menus']){foreach ($val1['menus'] as $val2){
	$an = $val2['id']==$Menus['FID']['FID3']?'left_an1':'left_an2';
	$ico = $val2['ico']?'<em class="'.$val2['ico'].'"></em>':'';
?>
			<li><a href="<?php echo base_url($val2['url'].'.html');?>" class="<?php echo $an;?>"><?php echo $ico.$this->lang->line($val2['title']);?></a></li>
<?php }}?>
		</ul>
<?php }}?>
		<div class="left_copy"><?php echo date('Y');?> &copy; <?php echo $this->config->config['copy'];?></div>
	</aside>
	<section class="ct_right">
