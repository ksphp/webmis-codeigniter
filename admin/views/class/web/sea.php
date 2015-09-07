<form action="<?php echo base_url($this->config->config['index_url'].'class_web/index.html');?>" method="get">
<table class="table_add">
	<tr>
		<td class="width tright">FID:</td>
		<td>
			<input type="text" name="fid" class="input" style="width: 30%;" />
		</td>
	</tr>
	<tr>
		<td class="tright"><?php echo $this->lang->line('class_web_title');?>:</td>
		<td>
			<input type="text" name="title" class="input" style="width: 80%;" />
		</td>
	</tr>
	<tr>
		<td class="tright"><?php echo $this->lang->line('class_web_url');?>:</td>
		<td>
			<input type="text" name="url" class="input" style="width: 80%;" />
		</td>
	</tr>
	<tr>
		<td class="tright"><?php echo $this->lang->line('class_web_ico');?>:</td>
		<td>
			<input type="text" name="ico" class="input" style="width: 30%;" />
		</td>
	</tr>
	<tr>
		<td class="tright"><?php echo $this->lang->line('class_web_remark');?>:</td>
		<td>
			<input type="text" name="remark" class="input" style="width: 80%;" />
		</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td class="sub">
			<input type="submit" id="seaSub" name="search" value="<?php echo $this->lang->line('inc_sea');?>" />
		</td>
	</tr>
</table>
</form>