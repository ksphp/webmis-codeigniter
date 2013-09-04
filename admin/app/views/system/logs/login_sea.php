<form action="<?php echo base_url('sys_admin_login_log/index.html');?>" method="get">
<table class="table_add">
	<tr>
		<td class="add_width add_right">类型:</td>
		<td>
			<input type="text" name="type" class="input" style="width: 60px;" />
		</td>
	</tr>
	<tr>
		<td class="add_right">用户名:</td>
		<td>
			<input type="text" name="uname" class="input" style="width: 160px;" />
		</td>
	</tr>
	<tr>
		<td class="add_right">时间:</td>
		<td>
			<input type="text" name="time" class="input" style="width: 160px;" />
		</td>
	</tr>
	<tr>
		<td class="add_right">IP:</td>
		<td>
			<input type="text" name="ip" class="input" style="width: 160px;" />
		</td>
	</tr>
	<tr>
		<td class="add_right">Agent:</td>
		<td>
			<input type="text" name="agent" class="input" style="width: 160px;" />
		</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td>
			<input type="submit" id="seaSub" name="search" value="搜索" />
		</td>
	</tr>
</table>
</form>