<form action="<?php echo base_url($this->config->config['index_url'].'sys_db_restore/impData.html');?>" method="post" id="restoreForm">
<table class="table_add">
	<tr>
		<td class="width tright"><?php echo $this->lang->line('sys_db_restore_file');?>:</td>
		<td>
			<input type="text" name="file" class="input" style="width: 90%;" value="<?php echo $file;?>" />
		</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td class="c666"><?php echo $this->lang->line('sys_db_restore_text');?></td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td>
			<input type="submit" id="impSub" value="<?php echo $this->lang->line('inc_import');?>" />
		</td>
	</tr>
</table>
</form>