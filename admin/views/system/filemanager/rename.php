<form action="<?php echo base_url($this->config->config['index_url'].'sys_filemanager/reNameData.html');?>" method="post" id="fileForm">
<table class="table_add">
	<tr>
		<td class="tright" width="50"><?php echo $this->lang->line('sys_file_name');?>:</td>
		<td>
			<input type="text" id="file_name" name="name" class="input" style="width:70%;" maxlength="32" datatype="*1-32" errormsg="1~32<?php echo $this->lang->line('inc_form_char');?>" sucmsg="<?php echo $this->lang->line('inc_form_pass');?>" nullmsg="<?php echo $this->lang->line('inc_form_null');?>" />
			<span class="Validform_checktip"></span>
		</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td class="sub">
			<input type="submit" id="fileSub" value="<?php echo $this->lang->line('inc_save');?>" />
			<input type="hidden" id="file_path" name="path">
			<input type="hidden" id="file_rename" name="rename">
		</td>
	</tr>
</table>
</form>