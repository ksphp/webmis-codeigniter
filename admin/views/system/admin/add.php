<form action="<?php echo base_url($this->config->config['index_url'].'sys_admin/addData.html');?>" method="post" id="adminForm">
<table class="table_add">
	<tr>
		<td class="width right">状态:</td>
		<td>
			<select name="state">
				<option value="1">启用</option>
				<option value="2">禁用</option>
			</select>
			<span class="1">&nbsp;</span>
		</td>
	</tr>
	<tr>
		<td class="right">用户名:</td>
		<td>
			<input type="text" name="uname" class="input" style="width: 40%;" datatype="*3-16" errormsg="3~16位之间！" />
			<span class="Validform_checktip"></span>
		</td>
	</tr>
	<tr>
		<td class="right">密码:</td>
		<td>
			<input type="password" name="passwd" class="input" style="width: 70%;" datatype="*6-16" errormsg="6~16位之间！" />
			<span class="Validform_checktip"></span>
		</td>
	</tr>
	<tr>
		<td class="right">确认密码:</td>
		<td>
			<input type="password" class="input" style="width: 70%;" datatype="*" errormsg="密码不一致！" recheck="passwd" />
			<span class="Validform_checktip"></span>
		</td>
	</tr>
	<tr>
		<td class="right">邮箱:</td>
		<td>
			<input type="text" name="email" class="input" style="width: 70%;" datatype="e" errormsg="格式有误！" />
			<span class="Validform_checktip"></span>
		</td>
	</tr>
	<tr>
		<td colspan="2"><b>详细信息</b></td>
	</tr>
	<tr>
		<td class="right">姓名:</td>
		<td>
			<input type="text" name="name" class="input" style="width: 30%;" />
		</td>
	</tr>
	<tr>
		<td class="right">部门:</td>
		<td>
			<input type="text" name="department" class="input" style="width: 60%;" />
		</td>
	</tr>
	<tr>
		<td class="right">职务:</td>
		<td>
			<input type="text" name="position" class="input" style="width: 60%;" />
		</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td>
			<input type="submit" id="adminSub" value="添加" />
		</td>
	</tr>
</table>
</form>