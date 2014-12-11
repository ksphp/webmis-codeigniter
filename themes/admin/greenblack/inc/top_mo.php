<!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML Mobile 1.0//EN" "http://www.wapforum.org/DTD/xhtml-mobile10.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="author" content="kingsoul" />
	<title><?php echo $this->config->config['title'];?></title>
	<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
	<link href="<?php echo base_url('../webmis/themes/'.$this->config->config['webmis_themes'].'/webmis.css'); ?>" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url('../themes/admin/'.$this->config->config['admin_themes'].'/admin.mo.css'); ?>" rel="stylesheet" type="text/css" />
	<!--[if lt IE 9]><script src="<?php echo base_url('../webmis/plugin/html5.js'); ?>" type="text/javascript"></script><![endif]-->
	<script>var _hmt = _hmt || [];(function() {var hm = document.createElement("script");hm.src = "//hm.baidu.com/hm.js?42c6e4ddf1d67ece9be84ce625cd398b";var s = document.getElementsByTagName("script")[0];s.parentNode.insertBefore(hm, s);})();</script>
</head>

<body>
<header class="top">
	<span class="cp"><b id="webmisVersion">WebMIS</b></span>
	<span class="info"><a href="#"><?php echo $uinfo['uname']; ?></a>&nbsp;&nbsp;<a href="<?php echo base_url('index_c/loginOut.html');?>" class="out">注销</a></span>
</header>
<ul id="Nav" class="nav_one">
	<li class="null">&nbsp;</li>
<?php foreach($Menu as $val){?>
	<li><a href="#" id="nav_<?php echo $val->id;?>" class="an2" onclick="menuOne('<?php echo $val->id;?>');return false;"><?php echo $val->title;?></a></li>
<?php }?>
</ul>
<section id="NavBody" class="nav_body">
<?php foreach (@$Menu as $val1) {?>
	<div id="menuOne_<?php echo $val1->id;?>" class="nav_two">
<?php foreach (@$val1->menus as $val2) {?>
		<div class="title"><?php echo $val2->title;?></div>
		<ul class="nav_three">
<?php foreach (@$val2->menus as $val3) {
	$ico = $val3->ico?'<em class="'.$val3->ico.'"></em>':'';
?>
			<li><a href="<?php echo base_url($this->config->config['index_url'].$val3->url.'.html');?>"><?php echo $ico.$val3->title;?></a></li>
<?php }?>
		</ul>
<?php }?>
	</div>
<?php }?>
	<div class="nav_hide"><a href="#" id="NavHide">============ 隐藏 ============</a></div>
</section>
<section class="ct_body">
