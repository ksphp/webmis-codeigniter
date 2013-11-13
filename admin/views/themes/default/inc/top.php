<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="author" content="kingsoul" />
	<title><?php echo $this->config->config['title'];?></title>
	<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
	<link href="<?php echo base_url('../webmis/themes/'.$this->config->config['webmis_themes'].'/webmis.css'); ?>" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url('views/themes/'.$this->config->config['admin_themes'].'/admin.css'); ?>" rel="stylesheet" type="text/css" />
</head>

<body>
<div class="top_bg">
	<div id="top" class="top">
		<div class="top_logo">&nbsp;</div>
		<span class="top_link"><a href="#"><b><?php echo $uinfo['uname']; ?></b></a>&nbsp;&nbsp;[&nbsp;<?php echo $uinfo['department']; ?>-<?php echo $uinfo['name']; ?>&nbsp;]&nbsp;&nbsp;|&nbsp;&nbsp;<a href="<?php echo base_url('sys_change_passwd.html');?>">修改密码</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="<?php echo base_url('index_c/loginOut.html');?>"><b>注销</b></a></span>
	</div>
	<div class="top_nav">
		<div class="title"><a href="http://www.ksphp.com/" target="_blank"><b id="webmisVersion">WebMIS</b> [ {elapsed_time} ]</a></div>
		<div id="nav" class="nav">
			<ul id="webmis_menu" class="nav_menu">
<?php foreach($Nav as $val){?>
				<li><a href="#" id="nav_<?php echo $val->id;?>" class="nav_an2" onclick="menuOne('<?php echo $val->id;?>');return false;"><em class="<?php echo $val->ico;?>"></em>&nbsp;<?php echo $val->title;?></a>
				<li class="UI lines">&nbsp;</li>
<?}?>
			</ul>
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
<?php foreach (@$Menu as $val1) {?>
							<!-- <?php echo $val1->url;?> -->
							<div id="menuOne_<?php echo $val1->id;?>" class="menuOne">
<?php foreach (@$val1->menus as $val2) {?>
								<div id="menuTwo_<?php echo $val2->id;?>" class="menu_an_bg1 UI" onclick="menuTwo('<?php echo $val2->id;?>')"><span class="title"><?php echo $val2->title;?></span><span id="tu" class="jia UI">&nbsp;</span></div>
								<ul id="menuThree_<?php echo $val2->id;?>" class="menu_list">
<?php foreach (@$val2->menus as $val3) {?>
									<li><a href="<?php echo base_url($val3->url.'.html');?>"><em class="<?php echo $val3->ico;?>"></em>&nbsp;&nbsp;<?php echo $val3->title;?></a></li>
<?php }?>
								</ul>
<?php }?>
							</div>
							<!-- <?php echo $val1->url;?> End -->
<?php }?>
					</div>
				</div>
			</td>
			<td class="tb_line">
				<div id="LeftMenus" class="UI tu" title="显示/隐藏">&nbsp;</div>
			</td>
			<td class="tb_right">
