<form action="<?php echo base_url($this->config->config['index_url'].'sys_filemanager/addFolder.html');?>" method="post" id="fileForm">
<table class="table_add">
	<tr>
		<td colspan="2" class="line"></td>
	</tr>
	<tr>
		<td class="tright" width="50"><?php echo $this->lang->line('sys_file_name');?>:</td>
		<td>
			<input type="text" name="name" class="input"  style="width: 70%;" maxlength="16" datatype="*1-16" errormsg="1~16<?php echo $this->lang->line('inc_form_char');?>" sucmsg="<?php echo $this->lang->line('inc_form_pass');?>" nullmsg="<?php echo $this->lang->line('inc_form_null');?>" />
			<span class="Validform_checktip"></span>
		</td>
	</tr>
	<tr>
		<td class="tright"><?php echo $this->lang->line('sys_file_perm');?>:</td>
		<td>
			<input type="text" name="perm" class="input" value="0755" style="width: 30%;" maxlength="4" datatype="n4-4" errormsg="4<?php echo $this->lang->line('inc_form_num');?>" sucmsg="<?php echo $this->lang->line('inc_form_pass');?>" nullmsg="<?php echo $this->lang->line('inc_form_null');?>" />
			<span class="Validform_checktip"></span>
		</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td>
			<input type="submit" id="fileSub" value="<?php echo $this->lang->line('inc_add');?>" />
			<input type="hidden" id="file_path" name="path">
		</td>
	</tr>
</table>
</form>