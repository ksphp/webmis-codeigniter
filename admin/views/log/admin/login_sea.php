<form action="<?php echo base_url($this->config->config['index_url'].'log_admin_login/index.html');?>" method="get">
<table class="table_add">
	<tr>
		<td class="width tright"><?php echo $this->lang->line('log_login_type');?>:</td>
		<td>
			<input type="text" name="type" class="input" style="width: 40%;" />
		</td>
	</tr>
	<tr>
		<td class="tright"><?php echo $this->lang->line('log_login_uname');?>:</td>
		<td>
			<input type="text" name="uname" class="input" style="width: 80%;" />
		</td>
	</tr>
	<tr>
		<td class="tright"><?php echo $this->lang->line('log_login_time');?>:</td>
		<td>
			<input type="text" name="time" class="input" style="width: 80%;" />
		</td>
	</tr>
	<tr>
		<td class="tright"><?php echo $this->lang->line('log_login_IP');?>:</td>
		<td>
			<input type="text" name="ip" class="input" style="width: 80%;" />
		</td>
	</tr>
	<tr>
		<td class="tright"><?php echo $this->lang->line('log_login_agent');?>:</td>
		<td>
			<input type="text" name="agent" class="input" style="width: 80%;" />
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