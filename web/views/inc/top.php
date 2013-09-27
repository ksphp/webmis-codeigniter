<?php
$title = 'WEBMIS是免费开源PHP开发底层系统';
$key = 'WEBMIS,灵创网络,免费开源,PHP开发底层系统,多用户、多权限解决方案';
$dsp = 'WEBMIS是免费开源PHP开发底层系统，基于CI的MVC模式开发的多用户、多权限解决方案，可以后台添加管理菜单，整合了Jquery，TinyMCE编辑器等插件、实现简洁、美观的弹框效果！';

if($navName){
	$title = $navName=='首页'?$title:$navName.'_'.$title;
	if(@$show->title){$title = $show->title.'_'.$title;}
}
if(@$show->key){$key = @$show->key.','.$key;}
if(@$show->summary){$dsp = @$show->summary;}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title><?php echo $title;?></title>
	<meta name="author" content="kingsoul" />
	<meta name="keywords" content="<?php echo $key;?>" />
	<meta  name="description"  content="<?php echo $dsp;?>"/>
	<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
	<link href="<?php echo base_url('webmis/themes/default/webmis.css'); ?>" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url('themes/default/web.css');?>" rel="stylesheet" type="text/css" />
</head>

<body>
<div class="top">
	<div class="ct">
		<div class="logo"><a href="<?php echo base_url();?>" title="WebMIS" ><img src="<?php echo base_url('themes/default/images/webmis.gif');?>" width="123" height="42" alt="WebMIS" ></a></div>
		<ul class="top_sea">
			<li class="links"><a href="<?php echo base_url('online/show/about.html');?>" >关于我们</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="<?php echo base_url('online/show/contact.html');?>" >联系方式</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="http://www.ksphp.com/document.html" target="_black">WebMIS文档</a></li>
			<li><input type="text" /></li>
			<li><a href="" class="sea_an" >搜索</a></li>
		</ul>
	</div>
</div>
<div class="top_nav">
	<div class="ct">
		<span id="webmisVersion" class="version">WebMIS</span>
		<ul id="nav" class="nav">
			<?php echo $navHtml;?>
		</ul>
	</div>
</div>
	