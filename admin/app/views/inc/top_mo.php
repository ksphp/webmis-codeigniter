<!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML Mobile 1.0//EN" "http://www.wapforum.org/DTD/xhtml-mobile10.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="author" content="kingsoul" />
	<title>WebMIS 管理员控制台</title>
	<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
	<link href="../webmis/css/admin_mo.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div class="top">
	<span class="cp"><b id="webmisVersion">WebMIS</b></span>
	<span class="out"><a href="<?php echo base_url('index_c/loginOut.html');?>" >注销</a></span>
	<span class="info"><a href="#"><?php echo $uinfo['uname']; ?></a>(<?php echo $uinfo['name']; ?>)</a></span>
	
</div>
<ul class="nav_one">
	<li class="null">&nbsp;</li>
	<li>
		<a href="#" class="an2"><b>首页</b></a>
	</li>
	<li><a href="#" class="an1"><b>系统</b></a></li>
</ul>
<div id="NavBody" class="nav_body">
	<div id="nav_two_1" class="nav_two">
		<div class="title">桌面</div>
		<ul class="nav_three">
			<li><a href="#" >用户首页</a></li>
		</ul>
		<div class="title">账号管理</div>
		<ul class="nav_three">
			<li><a href="" >用户首页</a></li>
		</ul>
	</div>
	<div id="nav_two_2" class="nav_two">
		<div class="title">系统管理</div>
		<ul class="nav_three">
			<li><a href="#" >菜单管理</a></li>
			<li><a href="#" >菜单动作</a></li>
			<li><a href="#" >系统用户</a></li>
			<li><a href="#" >系统配置</a></li>
			<li><a href="#" >文件管理</a></li>
		</ul>
		<div class="title">数据库</div>
		<ul class="nav_three">
			<li><a href="" >数据备份</a></li>
			<li><a href="" >数据恢复</a></li>
		</ul>
	</div>
	<div class="nav_hide"><a href="#">====== 隐藏 ======</a></div>
</div>
<div class="ct_body">
	<!-- 二级菜单 -->
	<ul>
		<li></li>
	</ul>
	<!-- 二级菜单 END -->
