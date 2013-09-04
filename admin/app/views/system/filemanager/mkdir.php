<form action="<?php echo base_url('sys_filemanager.html');?>" method="get" id="fileForm">
<table class="table_add">
	<tr>
		<td colspan="2">&nbsp;</td>
	</tr>
	<tr>
		<td class="add_width add_right">名称:</td>
		<td>
			<input type="text" name="name" class="input" value="新建文件夹" maxlength="16" />
			<span class="Validform_checktip"></span>
		</td>
	</tr>
	<tr>
		<td class="add_right">权限:</td>
		<td>
			<input type="text" name="perm" class="input" value="0755" style="width: 60px;" maxlength="4" />
			<span class="Validform_checktip"></span>
		</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td>
			<input type="submit" id="fileSub" value="创建" />
			<input type="hidden" id="file_path" name="path">
			<input type="hidden" name="action" value="mkdir">
			<input type="hidden" id="file_editor" name="editor">
		</td>
	</tr>
</table>
</form>