<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="author" content="kingsoul" />
	<title><?php echo $this->config->config['title'];?></title>
	<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
	<link href="<?php echo base_url('../webmis/themes/'.$this->config->config['webmis_themes'].'/webmis.css'); ?>" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url('views/themes/'.$this->config->config['admin_themes'].'/admin.css'); ?>" rel="stylesheet" type="text/css" />
	<!--[if lt IE 9]><script src="<?php echo base_url('../webmis/plugin/html5.js'); ?>" type="text/javascript"></script><![endif]-->
</head>

<body class="top_bg">
<header id="top" class="top">
	<div class="top_logo">&nbsp;</div>
	<span class="top_link"><a href="#"><b><?php echo $uinfo['uname']; ?></b></a>&nbsp;&nbsp;[&nbsp;<?php echo $uinfo['department']; ?>-<?php echo $uinfo['name']; ?>&nbsp;]&nbsp;&nbsp;|&nbsp;&nbsp;<a href="<?php echo base_url('sys_change_passwd.html');?>">修改密码</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="<?php echo base_url('index_c/loginOut.html');?>"><b>注销</b></a></span>
</header>
<header class="top_nav">
	<div class="title"><a href="http://www.ksphp.com/" target="_blank"><b id="webmisVersion">WebMIS</b> [ {elapsed_time} ]</a></div>
	<div id="nav" class="nav">
		<ul id="webmis_menu" class="nav_menu">
<?php foreach($Menu as $val){
	$an = $val->id==$this->Fid2?'nav_an1':'nav_an2';
	$ico = $val->ico?'<em class="'.$val->ico.'"></em>':'';
?>
			<li><a href="<?php echo base_url($val->url.'.html');?>" class="<?php echo $an;?>"><?php echo $ico.$val->title;?></a>
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
<?php foreach (@$Menu as $val1) {if(@$val1->menus){?>
			<div class="menu_title">------ <span id="menu_title"><?php echo $val1->title;?></span> ------</div>
			<div class="menu_ct">
				<div class="menuOne">
<?php foreach (@$val1->menus as $val2) {
	$an = $val2->id==$this->Fid3?'menu_an_bg2':'menu_an_bg1';
?>
					<div class="<?php echo $an;?> UI" onclick="menuTwo('<?php echo $val2->id;?>',$(this))"><span class="title"><?php echo $val2->title;?></span><span id="tu" class="jian UI">&nbsp;</span></div>
					<ul id="menuThree_<?php echo $val2->id;?>" class="menu_list">
<?php foreach (@$val2->menus as $val3) {
	$an = $val3->id==$this->Cid?'menu_an1':'menu_an2'; 
	$ico = $val3->ico?'<em class="'.$val3->ico.'"></em>':'';
?>
						<li><a href="<?php echo base_url($this->config->config['index_url'].$val3->url.'.html');?>" class="<?php echo $an;?>"><?php echo $ico.$val3->title;?></a></li>
<?php }?>
					</ul>
<?php }?>
				</div>
			</div>
<?php }}?>
		</div>
	</aside>
	<section class="ct_line"><div id="LeftMenus" class="UI tu" title="显示/隐藏">&nbsp;</div></section>
	<section class="ct_right">





