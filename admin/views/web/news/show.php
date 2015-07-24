<div class="show_body">
	<div class="show_title"><?php echo $show->title;?></div>
	<div class="show_other">
		<?php echo $this->lang->line('web_news_source');?>：<?php echo $show->source;?>&nbsp;&nbsp;
		<?php echo $this->lang->line('web_news_author');?>：<?php echo $show->author;?>&nbsp;&nbsp;
		<?php echo $this->lang->line('web_news_ctime');?>：<?php echo $show->ctime;?>&nbsp;&nbsp;
		<?php echo $this->lang->line('web_news_click');?>：<?php echo $show->click;?>
	</div>
	<div class="show_summary"><?php echo $show->summary;?></div>
	<div class="show_ct">
		<?php echo $show->content;?>
	</div>
	<div class="show_key"><?php echo $this->lang->line('web_news_key');?>：<?php echo $show->key;?></div>
</div>