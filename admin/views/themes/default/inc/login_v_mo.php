<!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML Mobile 1.0//EN" "http://www.wapforum.org/DTD/xhtml-mobile10.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="author" content="kingsoul" />
	<title><?php echo $this->config->config['title'];?></title>
	<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
	<link href="<?php echo base_url('views/themes/'.$this->config->config['admin_themes'].'/admin.mo.css'); ?>" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url('../webmis/themes/'.$this->config->config['webmis_themes'].'/webmis.css'); ?>" rel="stylesheet" type="text/css" />
</head>

<body class="login_bg">
<div id="base_url" style="display: none;"><?php echo base_url().$this->config->config['index_url']; ?></div>
<div id="is_mobile" style="display: none;"><?php echo $is_mobile; ?></div>
<div class="login_body">
	<div class="login_top">
		<div class="login_top_logo">&nbsp;</div>
		<span id="webmisVersion" class="login_top_title">WebMIS</span>
	</div>
	<div class="login_ct">
		<div class="text"><input type="text" id="uname" /><br>用户名：</div>
		<div class="text"><input type="password" id="passwd" /><br>密码：</div>
		<div class="login_an">
			<a href="#" id="adminLogin">登&nbsp;&nbsp;录</a>
		</div>
	</div>
	<div class="login_copy">
		Copyright © <a href="http://www.ksphp.com/" target="_blank"><b>www.ksphp.com</b></a><br>
		<a href="<?php echo base_url('?mode=pc'); ?>" >电脑版</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="<?php echo base_url('?mode=mobile'); ?>" >手机版</a>
	</div>
</div>
<script language="javascript" src="<?php echo base_url('../webmis/plugin/jquery/'.$this->config->config['jquery']); ?>"></script>
<script language="javascript" src="<?php echo base_url('../webmis/jquery.webmis.js'); ?>"></script>
<script language="javascript" src="<?php echo base_url('views/themes/'.$this->config->config['admin_themes'].'/admin_login.mo.js'); ?>"></script>
</body>
</html>