<form action="<?php echo base_url($this->config->config['index_url'].'sys_filemanager.html');?>" method="get" id="fileForm">
<table class="table_add">
	<tr>
		<td class="width tright">名称:</td>
		<td>
			<input type="text" name="name" class="input"  style="width: 80%;" value="新建文件夹" maxlength="16" />
			<span class="Validform_checktip"></span>
		</td>
	</tr>
	<tr>
		<td class="tright">权限:</td>
		<td>
			<input type="text" name="perm" class="input" value="0755" style="width: 30%;" maxlength="4" />
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