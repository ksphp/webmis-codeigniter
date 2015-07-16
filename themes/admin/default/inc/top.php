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
<header id="top" class="top">
	<div class="top_logo"><a href="http://www.ksphp.com" title="WebMIS" target="_blank">&nbsp;</a></div>
	<span class="top_link"><?php echo $Menus['userHtml'];?></span>
</header>
<header class="top_nav">
	<div class="title"><a href="http://www.ksphp.com/" target="_blank"><b id="webmisVersion">WebMIS</b> [ {elapsed_time} ]</a></div>
	<div id="nav" class="nav">
		<ul id="webmis_menu" class="nav_menu">
<?php
$menus = FALSE;
$menusTitle = '';
foreach ($Menus['Date'] as $val){
	$an = $val['id']==$Menus['FID']['FID1']?'nav_an1':'nav_an2';
	$ico = $val['ico']?'<em class="'.$val['ico'].'"></em>':'';
	if(@$val['menus']){$menus = $val['menus'];$menusTitle=$val['title'];}
?>
			<li><a href="<?php echo base_url($val['url'].'.html');?>" class="<?php echo $an;?>"><?php echo $ico.$val['title'];?></a>
			<li class="UI lines">&nbsp;</li>
<?php }?>
		</ul>
	</div>
	<div class="other"><a href="#" id="TopMenus" class="UI" title="显示/隐藏">&nbsp;</a></div>
</header>
<div class="top_nav_bg">&nbsp;</div>
<section class="ct_body">
	<aside class="ct_left">
		<div id="menus" class="menu">
			<div class="menu_title">----- <span id="menu_title"><?php echo $menusTitle;?></span> -----</div>
			<div class="menu_ct">
				<div class="menuOne">
<?php if($menus){foreach ($menus as $val1){
	$an = $val1['id']==$Menus['FID']['FID2']?'menu_an_bg2':'menu_an_bg1';
?>
					<div class="<?php echo $an;?> UI" onclick="menuTwo('<?php echo $val1['id'];?>',$(this))"><span class="title"><?php echo $val1['title'];?></span><span id="tu" class="jian UI">&nbsp;</span></div>
					<ul id="menuThree_<?php echo $val1['id'];?>" class="menu_list">
<?php if(@$val1['menus']){foreach ($val1['menus'] as $val2){
	$an = $val2['id']==$Menus['FID']['FID3']?'menu_an1':'menu_an2';
	$ico = $val2['ico']?'<em class="'.$val2['ico'].'"></em>':'';
?>
						<li><a href="<?php echo base_url($val2['url'].'.html');?>" class="<?php echo $an;?>"><?php echo $ico.$val2['title'];?></a></li>
<?php }}?>
					</ul>
<?php }}?>
				</div>
			</div>
		</div>
		<div class="left_copy"><?php echo date('Y');?> &copy; <?php echo $this->config->config['copy'];?></div>
	</aside>
	<section class="ct_line"><div id="LeftMenus" class="UI tu" title="显示/隐藏">&nbsp;</div></section>
	<section class="ct_right">





