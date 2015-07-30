<!DOCTYPE html>
<html>

<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="author" content="KSPHP.com" />
	<title><?php echo $this->config->config['title'];?></title>
	<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
	<link href="<?php echo base_url('../themes/admin/'.$this->config->config['admin_themes'].'/admin.css'); ?>" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url('../webmis/themes/'.$this->config->config['webmis_themes'].'/webmis.css'); ?>" rel="stylesheet" type="text/css" />
</head>

<body class="body">
<?php if($isIE){?>
	<div class="isIE"><?php echo $this->lang->line('inc_isIE');?></div>
<?php }?>
	<div id="Lang" class="lang_ct">
		<?php echo $LangName;?>
		<ul class="lang">
			<li><a href="<?php echo base_url('?lang=en-us'); ?>">en-us | English</a></li>
			<li><a href="<?php echo base_url('?lang=zh-cn'); ?>">zh-cn | 简体中文</a></li>
		</ul>
	</div>
<section>
	<section class="login_body">
		<header class="login_top">
			<div class="login_top_logo">&nbsp;</div>
			<span id="webmisVersion" class="login_top_title">WebMIS</span>
		</header>
		<aside class="login_ct">
			<span class="text"><input type="text" id="uname" /><br><?php echo $this->lang->line('inc_uname');?>：</span>
			<span class="text"><input type="password" id="passwd" /><br><?php echo $this->lang->line('inc_passwd');?>：</span>
			<div class="login_ct_an">
				<a href="#" id="adminLogin" title="<?php echo $this->lang->line('inc_login');?>"><?php echo $this->lang->line('inc_login');?></a>
			</div>
		</aside>
		<footer class="login_copy">
			Copyright © <?php echo $this->config->config['copy'];?> All rights are reserved.<br/>
			<a href="<?php echo base_url('../'); ?>" ><?php echo $this->lang->line('inc_home');?></a>&nbsp;|&nbsp;
			<a href="<?php echo base_url('?mode=pc'); ?>" ><?php echo $this->lang->line('inc_pc');?></a>&nbsp;|&nbsp;
			<a href="<?php echo base_url('?mode=mobile'); ?>" ><?php echo $this->lang->line('inc_mobile');?></a>
		</footer>
	</section>
</section>
<div id="base_url" style="display: none;"><?php echo base_url().$this->config->config['index_url']; ?></div>
<div id="is_mobile" style="display: none;"><?php echo @$is_mobile; ?></div>
<script language="javascript" src="<?php echo base_url('../webmis/plugin/jquery/jquery-2.min.js'); ?>"></script>
<script language="javascript" src="<?php echo base_url('../webmis/jquery.webmis.js'); ?>"></script>
<script language="javascript" src="<?php echo base_url('../themes/admin/'.$this->config->config['admin_themes'].'/admin_login.js');?>"></script>
</body>
</html>