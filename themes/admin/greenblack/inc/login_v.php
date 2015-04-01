<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="author" content="Unknown" />
	<title><?php echo $this->config->config['title'];?></title>
	<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
	<link href="<?php echo base_url('../themes/admin/'.$this->config->config['admin_themes'].'/admin.css'); ?>" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url('../webmis/themes/'.$this->config->config['webmis_themes'].'/webmis.css'); ?>" rel="stylesheet" type="text/css" />
	<!--[if lt IE 9]><script src="<?php echo base_url('../webmis/plugin/html5.js'); ?>" type="text/javascript"></script><![endif]-->
	<script>var _hmt = _hmt || [];(function() {var hm = document.createElement("script");hm.src = "//hm.baidu.com/hm.js?42c6e4ddf1d67ece9be84ce625cd398b";var s = document.getElementsByTagName("script")[0];s.parentNode.insertBefore(hm, s);})();</script>
</head>

<body>
<section>
	<section class="login_body">
		<header class="login_top">
			<div class="login_top_logo">&nbsp;</div>
			<span id="webmisVersion" class="login_top_title">WebMIS</span>
		</header>
		<aside class="login_ct">
			<span class="text"><input type="text" id="uname" /><br>用户名：</span>
			<span class="text"><input type="password" id="passwd" /><br>密码：</span>
			<div class="login_ct_an">
				<a href="#" id="adminLogin">登录</a>
			</div>
		</aside>
		<footer class="login_copy">
			Copyright © <?php echo $this->config->config['copy'];?> All rights are reserved.<br>
			<a href="<?php echo base_url('?mode=pc'); ?>" >电脑版</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="<?php echo base_url('?mode=mobile'); ?>" >手机版</a>
		</footer>
	</section>
</section>
<div id="base_url" style="display: none;"><?php echo base_url().$this->config->config['index_url']; ?></div>
<div id="is_mobile" style="display: none;"><?php echo $is_mobile; ?></div>
<script language="javascript" src="<?php echo base_url('../webmis/plugin/jquery/jquery-2.min.js'); ?>"></script>
<!--[if lte IE 9]>
<script language="javascript" src="<?php echo base_url('../webmis/plugin/jquery/jquery-1.min.js'); ?>"></script>
<script src="<?php echo base_url('../webmis/plugin/html5.js'); ?>" type="text/javascript"></script>
<![endif]-->
<script language="javascript" src="<?php echo base_url('../webmis/jquery.webmis.js'); ?>"></script>
<script language="javascript" src="<?php echo base_url('../themes/admin/'.$this->config->config['admin_themes'].'/admin_login.js');?>"></script>
</body>
</html>