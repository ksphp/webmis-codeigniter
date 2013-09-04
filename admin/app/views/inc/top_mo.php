<!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML Mobile 1.0//EN" "http://www.wapforum.org/DTD/xhtml-mobile10.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="author" content="kingsoul" />
	<title>WebMIS 管理员控制台</title>
	<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
	<link href="<?php echo base_url('../webmis/themes/default/webmis.css'); ?>" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url('themes/default/admin.mo.css'); ?>" rel="stylesheet" type="text/css" />
</head>

<body>
<div class="top">
	<span class="cp"><b id="webmisVersion">WebMIS</b></span>
	<span class="out"><a href="<?php echo base_url('index_c/loginOut.html');?>" >注销</a></span>
	<span class="info"><a href="#"><?php echo $uinfo['uname']; ?></a>(<?php echo $uinfo['name']; ?>)</a></span>
	
</div>
<ul id="Nav" class="nav_one">
	<li class="null">&nbsp;</li>
	<?php echo $navHtml;?>
</ul>
<div id="NavBody" class="nav_body">
	<?php echo $menuHtml;?>
	<div class="nav_hide"><a href="#" id="NavHide">============ 隐藏 ============</a></div>
</div>
<div class="ct_body">
