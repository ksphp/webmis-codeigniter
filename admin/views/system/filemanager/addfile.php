<form action="<?php echo base_url($this->config->config['index_url'].'sys_filemanager/addFile.html');?>" method="post" id="fileForm">
<table class="table_add">
	<tr>
		<td colspan="2" class="line"></td>
	</tr>
	<tr>
		<td class="tright" width="50"><?php echo $this->lang->line('sys_file_name');?>:</td>
		<td>
			<input type="text" name="file" class="input" value="test.txt" style="width: 70%;" maxlength="20" datatype="*2-20" errormsg="2~20<?php echo $this->lang->line('inc_form_char');?>" sucmsg="<?php echo $this->lang->line('inc_form_pass');?>" nullmsg="<?php echo $this->lang->line('inc_form_null');?>" />
			<span class="Validform_checktip"></span>
		</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td class="sub">
			<input type="submit" id="fileSub" value="<?php echo $this->lang->line('inc_add');?>" />
			<input type="hidden" id="file_path" name="path">
		</td>
	</tr>
</table>
</form>