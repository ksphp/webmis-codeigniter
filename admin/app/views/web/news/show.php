<style type="text/css">
.news_body{padding: 20px;}
.news_title{height: 50px; line-height: 50px; text-align: center; font-size: 16px; font-weight: bold;}
.news_other{text-align: center; color: #999; padding: 5px 0;}
.news_key{line-height: 24px; border: #CCC 1px solid; background: #F2F2F2; padding: 10px;}
.news_ct{line-height: 24px; font-size: 14px; padding-top: 10px;}
</style>
<div class="show_body">
	<div class="show_title"><?php echo $show->title;?></div>
	<div class="show_other">
		来源：<?php echo $show->source;?>&nbsp;&nbsp;
		作者：<?php echo $show->author;?>&nbsp;&nbsp;
		发布时间：<?php echo $show->ctime;?>&nbsp;&nbsp;
		浏览次数：<?php echo $show->click;?>
	</div>
	<div class="show_summary"><?php echo $show->summary;?></div>
	<div class="show_ct">
		<?php echo $show->content;?>
	</div>
	<div class="show_key">关键字：<?php echo $show->key;?></div>
</div>