<?php
$title = 'WEBMIS是免费开源PHP开发框架系统';
$key = 'WEBMIS,灵创网络,免费开源,PHP开发底层系统,多用户、多权限解决方案';
$dsp = 'WEBMIS是免费开源PHP开发框架系统，基于CI的MVC模式开发的多用户、多权限解决方案，可以后台添加管理菜单，整合了Jquery，TinyMCE编辑器等插件、实现简洁、美观的弹框效果！';

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
	<!--[if lt IE 9]><script src="<?php echo base_url('webmis/plugin/html5.js'); ?>" type="text/javascript"></script><![endif]-->
</head>

<body>
	