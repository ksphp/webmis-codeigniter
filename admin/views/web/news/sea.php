<form action="<?php echo base_url($this->config->config['index_url'].'web_news/index.html');?>" method="get">
<table class="table_add">
	<tr>
		<td class="width tright"><?php echo $this->lang->line('web_news_class');?>:</td>
		<td>
			<input type="text" name="class" class="input" style="width: 40%;" /><span class="inputText c2"> :3:9:12:</span>
		</td>
	</tr>
	<tr>
		<td class="tright"><?php echo $this->lang->line('web_news_title');?>:</td>
		<td>
			<input type="text" name="title" class="input" style="width: 90%;" />
		</td>
	</tr>
	<tr>
		<td class="tright"><?php echo $this->lang->line('web_news_source');?>:</td>
		<td>
			<input type="text" name="source" class="input" style="width: 60%;" />
		</td>
	</tr>
	<tr>
		<td class="tright"><?php echo $this->lang->line('web_news_author');?>:</td>
		<td>
			<input type="text" name="author" class="input" style="width: 60%;" />
		</td>
	</tr>
	<tr>
		<td class="tright"><?php echo $this->lang->line('web_news_ctime');?>:</td>
		<td>
			<input type="text" name="ctime" class="input" style="width: 60%;" />
		</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td>
			<input type="submit" id="seaSub" name="search" value="<?php echo $this->lang->line('inc_sea');?>" />
		</td>
	</tr>
</table>
</form>