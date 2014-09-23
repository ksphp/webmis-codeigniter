<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="author" content="Unknown" />
	<title><?php echo $this->config->config['title'];?></title>
	<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
	<link href="<?php echo base_url('../webmis/themes/'.$this->config->config['webmis_themes'].'/webmis.css'); ?>" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url('views/themes/'.$this->config->config['admin_themes'].'/admin.css'); ?>" rel="stylesheet" type="text/css" />
	<!--[if lt IE 9]>
	<script src="<?php echo base_url('../webmis/plugin/html5.js'); ?>" type="text/javascript"></script>
	<link href="<?php echo base_url('views/themes/'.$this->config->config['admin_themes'].'/ie.css'); ?>" rel="stylesheet" type="text/css" />
	<![endif]-->
</head>

<body class="top_bg">
<header class="top_ct">
	<div class="top_logo"><a href="http://www.ksphp.com" title="WebMIS" target="_blank">&nbsp;</a></div>
	<ul class="nav">
<?php foreach($Menu as $val){
	$an = $val->id==$this->Fid2?'nav_an1':'nav_an2';
	$ico = $val->ico?'<em class="'.$val->ico.'"></em>':'';
?>
		<li><a href="<?php echo base_url($val->url.'.html');?>" class="<?php echo $an;?>"><?php echo $ico.$val->title;?></a></li>
<?php }?>
	</ul>
	<span class="top_link"><a href="#"><b><?php echo $uinfo['uname']; ?></b></a>&nbsp;&nbsp;[&nbsp;<?php echo $uinfo['department']; ?>-<?php echo $uinfo['name']; ?>&nbsp;]&nbsp;&nbsp;|&nbsp;&nbsp;<a href="<?php echo base_url('index_c/loginOut.html');?>"><b>注销</b></a></span>
</header>
<section class="ct_body">
	<aside class="ct_left">
<?php foreach (@$Menu as $val1) {if(@$val1->menus){?>
<?php foreach (@$val1->menus as $val2) {
	$an = $val2->id==$this->Cid?'left_an1':'left_an2'; 
?>
		<div class="left_title" onclick="menuTwo('<?php echo $val2->id;?>',$(this))"><em class="<?php echo $val2->ico;?>"></em><?php echo $val2->title;?></div>
		<ul class="left_list" id="menuThree_<?php echo $val2->id;?>">
<?php foreach (@$val2->menus as $val2) {
	$an = $val2->id==$this->Cid?'left_an1':'left_an2'; 
?>
			<li><a href="<?php echo base_url($val2->url.'.html');?>" class="<?php echo $an;?>"><em class="<?php echo $val2->ico;?>"></em><?php echo $val2->title;?></a></li>
<?php }?>
		</ul>
<?php }?>
<?php }}?>
		<div class="left_copy"><?php echo date('Y');?> &copy; <?php echo $this->config->config['copy'];?></div>
	</aside>
	<section class="ct_right">





