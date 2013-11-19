<form action="<?php echo base_url('index.php/sys_filemanager.html');?>" method="get" id="fileForm">
<table class="table_add">
	<tr>
		<td colspan="2">&nbsp;</td>
	</tr>
	<tr>
		<td class="width right">名称:</td>
		<td>
			<input type="text" id="file_name" name="name" class="input" style="width:80%;" maxlength="16" />
			<input type="hidden" id="file_rename" name="rename">
		</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td>
			<input type="submit" id="fileSub" value="编辑" />
			<input type="hidden" id="file_path" name="path">
			<input type="hidden" id="file_editor" name="editor">
			<input type="hidden" name="action" value="rename">
		</td>
	</tr>
</table>
</form>