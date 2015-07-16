<style type="text/css">
.book_body{padding: 10px;}
.book_top{height: 24px; line-height: 24px;}
.book_top .title{float: left;}
.book_top .time{float: right; color: #666;}
.book_ct{border: #ccc 1px solid; line-height: 24px; padding: 5px;}
</style>
<div class="book_body">
	<div class="book_top">
		<span class="title">昵称：<b><?php echo $show->name;?></b></span>
		<span class="time">发布时间：<?php echo $show->ctime;?></span>
	</div>
	<div class="book_ct"><?php echo $show->content;?></div>
	<div class="book_top">
		<span class="title">回复人：<b><?php echo $show->admin;?></b></span>
		<span class="time">回复时间：<?php echo $show->rtime;?></span>
	</div>
	<div class="book_ct"><?php echo $show->reply;?></div>
</div>