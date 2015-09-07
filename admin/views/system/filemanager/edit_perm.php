<form action="<?php echo base_url($this->config->config['index_url'].'sys_filemanager/editPermData.html');?>" method="post" id="fileForm">
<table class="table_add">
	<tr>
		<td class="tright" width="50"><?php echo $this->lang->line('sys_file_perm');?>:</td>
		<td>
			<input type="text" id="file_perm" name="perm" class="input" style="width: 70%;" maxlength="4" datatype="n4-4" errormsg="4<?php echo $this->lang->line('inc_form_num');?>" sucmsg="<?php echo $this->lang->line('inc_form_pass');?>" nullmsg="<?php echo $this->lang->line('inc_form_null');?>" />
			<span class="Validform_checktip"></span>
		</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td class="sub">
			<input type="submit" id="fileSub" value="<?php echo $this->lang->line('inc_save');?>" />
			<input type="hidden" id="file_path" name="path">
		</td>
	</tr>
</table>
</form>