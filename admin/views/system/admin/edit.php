<form action="<?php echo base_url($this->config->config['index_url'].'sys_admin/editData.html');?>" method="post" id="adminForm">
<table class="table_add">
	<tr>
		<td class="width tright"><?php echo $this->lang->line('sys_admin_state');?>:</td>
		<td>
			<select name="state">
				<option value="1" <?php echo $edit->state==1?'':'selected';?> ><?php echo $this->lang->line('sys_admin_enable');?></option>
				<option value="2" <?php echo $edit->state==2?'selected':'';?> ><?php echo $this->lang->line('sys_admin_disable');?></option>
			</select>
			<span class="1">&nbsp;</span>
		</td>
	</tr>
	<tr>
		<td class="tright"><?php echo $this->lang->line('sys_admin_uname');?>:</td>
		<td>
			<?php echo $edit->uname;?>
		</td>
	</tr>
	<tr>
		<td class="tright"><?php echo $this->lang->line('sys_admin_npwd');?>:</td>
		<td>
			<input type="password" name="passwd" class="input" style="width: 80%;" />
		</td>
	</tr>
	<tr>
		<td class="tright"><?php echo $this->lang->line('sys_admin_email');?>:</td>
		<td>
			<input type="text" name="email" class="input" value="<?php echo $edit->email;?>" style="width: 80%;" datatype="e" errormsg="<?php echo $this->lang->line('inc_form_format');?>" sucmsg="<?php echo $this->lang->line('inc_form_pass');?>" nullmsg="<?php echo $this->lang->line('inc_form_null');?>" />
			<span class="Validform_checktip"></span>
		</td>
	</tr>
	<tr>
		<td colspan="2"><b><?php echo $this->lang->line('sys_admin_show');?></b></td>
	</tr>
	<tr>
		<td class="tright"><?php echo $this->lang->line('sys_admin_name');?>:</td>
		<td>
			<input type="text" name="name" class="input" style="width: 30%;" value="<?php echo $edit->name;?>" />
		</td>
	</tr>
	<tr>
		<td class="tright"><?php echo $this->lang->line('sys_admin_dept');?>:</td>
		<td>
			<input type="text" name="department" class="input" style="width: 60%;" value="<?php echo $edit->department;?>" />
		</td>
	</tr>
	<tr>
		<td class="tright"><?php echo $this->lang->line('sys_admin_position');?>:</td>
		<td>
			<input type="text" name="position" class="input" style="width: 60%;" value="<?php echo $edit->position;?>" />
		</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td>
			<input type="hidden" id="adminID" name="id" value="" />
			<input type="submit" id="adminSub" value="<?php echo $this->lang->line('inc_edit');?>" />
		</td>
	</tr>
</table>
</form>