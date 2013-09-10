<form action="<?php echo base_url('sys_admin/index.html');?>" method="get">
<table class="table_add">
	<tr>
		<td class="width right">状态:</td>
		<td>
			<select name="state">
				<option value="">全部</option>
				<option value="1">启用</option>
				<option value="2">禁用</option>
			</select>
			<span class="1">&nbsp;</span>
		</td>
	</tr>
	<tr>
		<td class="right">用户名:</td>
		<td>
			<input type="text" name="uname" class="input" style="width: 120px;" />
		</td>
	</tr>
	<tr>
		<td class="right">邮箱:</td>
		<td>
			<input type="text" name="email" class="input" style="width: 180px;" />
		</td>
	</tr>
	<tr>
		<td class="right">姓名:</td>
		<td>
			<input type="text" name="name" class="input" style="width: 60px;" />
		</td>
	</tr>
	<tr>
		<td class="right">部门:</td>
		<td>
			<input type="text" name="department" class="input" style="width: 120px;" />
		</td>
	</tr>
	<tr>
		<td class="right">职务:</td>
		<td>
			<input type="text" name="position" class="input" style="width: 120px;" />
		</td>
	</tr>
	<tr>
		<td class="right">注册时间:</td>
		<td>
			<input type="text" name="rtime" class="input" style="width: 120px;" />
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