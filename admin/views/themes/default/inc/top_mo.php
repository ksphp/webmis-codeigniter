<!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML Mobile 1.0//EN" "http://www.wapforum.org/DTD/xhtml-mobile10.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="author" content="kingsoul" />
	<title><?php echo $this->config->config['title'];?></title>
	<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
	<link href="<?php echo base_url('../webmis/themes/'.$this->config->config['webmis_themes'].'/webmis.css'); ?>" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url('views/themes/'.$this->config->config['admin_themes'].'/admin.mo.css'); ?>" rel="stylesheet" type="text/css" />
</head>

<body>
<div class="top">
	<span class="cp"><b id="webmisVersion">WebMIS</b></span>
	<span class="out"><a href="<?php echo base_url('index_c/loginOut.html');?>" >注销</a></span>
	<span class="info"><a href="#"><?php echo $uinfo['uname']; ?></a>(<a href="https://me.alipay.com/webmis" target="_blank"> 捐赠 </a>)</span>
	
</div>
<ul id="Nav" class="nav_one">
	<li class="null">&nbsp;</li>
<?php foreach($Menu as $val){?>
	<li><a href="#" id="nav_<?php echo $val->id;?>" class="an2" onclick="menuOne('<?php echo $val->id;?>');return false;"><?php echo $val->title;?></a></li>
<?php }?>
</ul>
<div id="NavBody" class="nav_body">
<?php foreach (@$Menu as $val1) {?>
	<div id="menuOne_<?php echo $val1->id;?>" class="nav_two">
<?php foreach (@$val1->menus as $val2) {?>
		<div class="title"><?php echo $val2->title;?></div>
		<ul class="nav_three">
<?php foreach (@$val2->menus as $val3) {?>
			<li><a href="<?php echo base_url($this->config->config['index_url'].$val3->url.'.html');?>" class="<?php echo $val3->ico;?>">&nbsp;<?php echo $val3->title;?></a></li>
<?php }?>
		</ul>
<?php }?>
	</div>
<?php }?>
	<div class="nav_hide"><a href="#" id="NavHide">============ 隐藏 ============</a></div>
</div>
<div class="ct_body">
