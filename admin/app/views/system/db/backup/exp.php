<form action="<?php echo base_url('sys_db_backup/expData.html');?>" method="post" id="backForm">
<table class="table_add">
	<tr>
		<td class="width right">文件名:</td>
		<td>
			<input type="text" name="name" class="input" style="width: 70%;" value="<?php echo $fname;?>" datatype="s2-30" errormsg="2~30个字符！" />
			<span class="Validform_checktip"></span>
		</td>
	</tr>
	<tr>
		<td class="right">格式:</td>
		<td>
			<select name="format">
				<option value="sql">.sql</option>
				<option value="zip">.zip</option>
				<option value="gzip">.gzip</option>
				<option value="txt">.txt</option>
			</select>
		</td>
	</tr>
	<tr>
		<td class="right">目录:</td>
		<td>
			<select name="dir">
				<option value="<?php echo $backdir;?>"><?php echo $backdir;?></option>
			</select>
		</td>
	</tr>
	<tr>
		<td class="right">内容:</td>
		<td>
			<textarea name="table" style="width: 95%; height: 120px;"><?php echo $table;?></textarea>
		</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td>
			<input type="submit" id="expSub" value="导出" />
		</td>
	</tr>
</table>
</form>