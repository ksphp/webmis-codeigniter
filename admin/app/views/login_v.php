<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="author" content="kingsoul" />
	<title>WebMIS 管理员控制台</title>
	<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
	<link href="../webmis/css/admin.css" rel="stylesheet" type="text/css" />
</head>

<body class="login_bg">
<div id="base_url" style="display: none;"><?php echo base_url(); ?></div>
<div class="login_top_bg">
	<div class="login_body">
		<div class="login_top">
			<div class="login_top_logo">&nbsp;</div>
			<span id="webmisVersion" class="login_top_title">WebMIS</span>
		</div>
		<div class="login_ct">
			<span class="text"><input type="text" id="uname" /><br>用户名：</span>
			<span class="text"><input type="password" id="passwd" /><br>密码：</span>
			<div class="login_ct_an">
				<span class="line UI">&nbsp;</span>
				<span class="an"><input type="submit" id="adminLogin" class="an1" value="" /></span>
			</div>
		</div>
		<div class="login_copy">Copyright © <a href="http://www.ksphp.com/" target="_blank"><b>www.ksphp.com</b></a> All rights are reserved.</div>
	</div>
</div>
<script language="javascript" src="../webmis/plugin/jquery/jquery-1.10.2.min.js"></script>
<script language="javascript" src="../webmis/js/webmis.js"></script>
<script language="javascript" src="../webmis/js/admin.login.js"></script>
</body>
</html>