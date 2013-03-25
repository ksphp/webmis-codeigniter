<?php
$title = '灵创网络—网站建设、企业管理系统开发、Linux服务器架构';
$key = '网站关键字';
$dsp = '内容简介部分';

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
	<link href="<?php echo base_url('public/css/default.css');?>" rel="stylesheet" type="text/css" />
</head>

<body>
<div id="base_url" style="display: none;"><?php echo base_url(); ?></div>
	头部<hr>
