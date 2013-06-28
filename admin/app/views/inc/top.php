<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="author" content="kingsoul" />
	<title><?php echo $config['title'];?></title>
	<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
	<script language="javascript" src="/webmis/plugin/jquery/jquery-1.9.1.min.js"></script>
	<script language="javascript" src="/webmis/js/webmis.js"></script>
	<script language="javascript" src="/webmis/js/config.js"></script>
</head>

<body class="body_bg">
<div id="base_url" style="display: none;"><?php echo $base_url; ?></div>
<div id="NavId" style="display: none;"><?php echo $NavId; ?></div>
<div id="MenuTwoId" style="display: none;"><?php echo $MenuTwoId; ?></div>
<div class="top_bg">
	<div id="top" class="top">
		<div class="top_logo">&nbsp;</div>
		<span class="top_link">管理员：<a href="#"><?php echo $uinfo['uname']; ?></a>&nbsp;&nbsp;[&nbsp;&nbsp;<?php echo $uinfo['department']; ?>-<?php echo $uinfo['name']; ?>&nbsp;&nbsp;]&nbsp;&nbsp;<a href="<?php echo base_url('index_c/loginOut.html');?>"><b>注销</b></a></span>
	</div>
	<div class="top_nav">
		<div class="title"><a href="http://www.ksphp.com/" target="_blank"><b>WebMIS v3.2</b> [ {elapsed_time} ]</a></div>
		<div id="nav" class="nav">
			<div class="line UI">&nbsp;</div>
			<?php echo $navHtml; ?>
		</div>
		<div class="other"><a href="#" id="TopMenus" class="UI" title="显示/隐藏">&nbsp;</a></div>
	</div>
	<div class="top_nav_bg">&nbsp;</div>
	<table class="tb_ct">
		<tr>
			<td id="tb_left" class="tb_left">
				<div id="menus" class="menu">
					<div class="menu_title">------ <span id="menu_title">Menu</span> ------</div>
					<div class="menu_ct">
						<?php echo $menuHtml; ?>
					</div>
				</div>
			</td>
			<td class="tb_line">
				<div id="LeftMenus" class="UI tu" title="显示/隐藏">&nbsp;</div>
			</td>
			<td class="tb_right">
