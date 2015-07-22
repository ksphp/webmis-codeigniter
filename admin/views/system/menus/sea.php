<form action="<?php echo base_url($this->config->config['index_url'].'sys_menus/index.html');?>" method="get">
<table class="table_add">
	<tr>
		<td class="width tright">FID:</td>
		<td>
			<input type="text" name="fid" class="input" style="width: 30%;" />
		</td>
	</tr>
	<tr>
		<td class="tright"><?php echo $this->lang->line('sys_menu_name');?>:</td>
		<td>
			<input type="text" name="title" class="input" style="width: 80%;" />
		</td>
	</tr>
	<tr>
		<td class="tright"><?php echo $this->lang->line('sys_menu_cname');?>:</td>
		<td>
			<input type="text" name="url" class="input" style="width: 80%;" />
		</td>
	</tr>
	<tr>
		<td class="tright"><?php echo $this->lang->line('sys_menu_perm');?>:</td>
		<td>
			<input type="text" name="perm" class="input" style="width: 50%;" />
		</td>
	</tr>
	<tr>
		<td class="tright"><?php echo $this->lang->line('sys_menu_icon');?>:</td>
		<td>
			<input type="text" name="ico" class="input" style="width: 50%;" />
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