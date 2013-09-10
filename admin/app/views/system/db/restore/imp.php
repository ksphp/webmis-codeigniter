<form action="<?php echo base_url('sys_db_restore/impData.html');?>" method="post" id="restoreForm">
<table class="table_add">
	<tr>
		<td class="width right">恢复文件:</td>
		<td>
			<input type="text" name="file" class="input" style="width: 280px;" value="<?php echo $file;?>" />
		</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td class="c666">
			目前只支持恢复SQL文件，如：xxx.sql
		</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td>
			<input type="submit" id="impSub" value="恢复" />
		</td>
	</tr>
</table>
</form>