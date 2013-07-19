<style type="text/css">
.book_body{padding: 10px;}
.book_top{height: 24px; line-height: 24px;}
.book_top .title{float: left;}
.book_top .time{float: right; color: #666;}
.book_ct{border: #ccc 1px solid; line-height: 24px; padding: 5px;}
</style>
<div class="book_body">
	<div class="book_top">
		<span class="title">标题：<b><?php echo $title;?></b></span>
		<span class="time">发布时间：<?php echo $ctime;?></span>
	</div>
	<div class="book_ct"><?php echo $content;?></div>
	<div class="book_top">
		<span class="title">回复人：<b><?php echo $admin;?></b></span>
		<span class="time">回复时间：<?php echo $rtime;?></span>
	</div>
	<div class="book_ct"><?php echo $reply;?></div>
</div>