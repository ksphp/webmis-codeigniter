<form action="<?php echo base_url($this->config->config['index_url'].'sys_admin/index.html');?>" method="get">
<table class="table_add">
	<tr>
		<td class="width tright"><?php echo $this->lang->line('sys_admin_state');?>:</td>
		<td>
			<select name="state">
				<option value="">全部</option>
				<option value="1">启用</option>
				<option value="2">禁用</option>
			</select>
			<span class="1">&nbsp;</span>
		</td>
	</tr>
	<tr>
		<td class="tright"><?php echo $this->lang->line('sys_admin_uname');?>:</td>
		<td>
			<input type="text" name="uname" class="input" style="width: 60%;" />
		</td>
	</tr>
	<tr>
		<td class="tright"><?php echo $this->lang->line('sys_admin_email');?>:</td>
		<td>
			<input type="text" name="email" class="input" style="width: 80%;" />
		</td>
	</tr>
	<tr>
		<td class="tright"><?php echo $this->lang->line('sys_admin_name');?>:</td>
		<td>
			<input type="text" name="name" class="input" style="width: 30%;" />
		</td>
	</tr>
	<tr>
		<td class="tright"><?php echo $this->lang->line('sys_admin_dept');?>:</td>
		<td>
			<input type="text" name="department" class="input" style="width: 60%;" />
		</td>
	</tr>
	<tr>
		<td class="tright"><?php echo $this->lang->line('sys_admin_position');?>:</td>
		<td>
			<input type="text" name="position" class="input" style="width: 60%;" />
		</td>
	</tr>
	<tr>
		<td class="tright"><?php echo $this->lang->line('sys_admin_rtime');?>:</td>
		<td>
			<input type="text" name="rtime" class="input" style="width: 60%;" />
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