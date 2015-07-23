<form action="<?php echo base_url($this->config->config['index_url'].'sys_admin/addData.html');?>" method="post" id="adminForm">
<table class="table_add">
	<tr>
		<td class="width tright"><?php echo $this->lang->line('sys_admin_state');?>:</td>
		<td>
			<select name="state">
				<option value="1">启用</option>
				<option value="2">禁用</option>
			</select>
			<span class="1">&nbsp;</span>
		</td>
	</tr>
	<tr>
		<td class="tright"><?php echo $this->lang->line('sys_admin_uname');?>:</td>
		<td>
			<input type="text" name="uname" class="input" style="width: 40%;" datatype="*3-16" errormsg="3~16<?php echo $this->lang->line('inc_form_char');?>" sucmsg="<?php echo $this->lang->line('inc_form_pass');?>" nullmsg="<?php echo $this->lang->line('inc_form_null');?>" />
			<span class="Validform_checktip"></span>
		</td>
	</tr>
	<tr>
		<td class="tright"><?php echo $this->lang->line('sys_admin_pwd1');?>:</td>
		<td>
			<input type="password" name="passwd" class="input" style="width: 70%;" datatype="*6-16" errormsg="6~16<?php echo $this->lang->line('inc_form_char');?>" sucmsg="<?php echo $this->lang->line('inc_form_pass');?>" nullmsg="<?php echo $this->lang->line('inc_form_null');?>" />
			<span class="Validform_checktip"></span>
		</td>
	</tr>
	<tr>
		<td class="tright"><?php echo $this->lang->line('sys_admin_pwd2');?>:</td>
		<td>
			<input type="password" class="input" style="width: 70%;" datatype="*" recheck="passwd" errormsg="<?php echo $this->lang->line('inc_form_pwd');?>" sucmsg="<?php echo $this->lang->line('inc_form_pass');?>" nullmsg="<?php echo $this->lang->line('inc_form_null');?>" />
			<span class="Validform_checktip"></span>
		</td>
	</tr>
	<tr>
		<td class="tright"><?php echo $this->lang->line('sys_admin_email');?>:</td>
		<td>
			<input type="text" name="email" class="input" style="width: 70%;" datatype="e" errormsg="<?php echo $this->lang->line('inc_form_format');?>" sucmsg="<?php echo $this->lang->line('inc_form_pass');?>" nullmsg="<?php echo $this->lang->line('inc_form_null');?>" />
			<span class="Validform_checktip"></span>
		</td>
	</tr>
	<tr>
		<td colspan="2"><b><?php echo $this->lang->line('sys_admin_show');?></b></td>
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
		<td>&nbsp;</td>
		<td>
			<input type="submit" id="adminSub" value="<?php echo $this->lang->line('inc_add');?>" />
		</td>
	</tr>
</table>
</form>