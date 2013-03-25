<form action="<?php echo base_url('sys_admin/editData.html');?>" method="post" id="adminForm">
<table class="table_add">
	<tr>
		<td class="add_width add_right">状态:</td>
		<td>
			<select name="state">
				<option value="1" <?php echo $state==1?'':'selected';?> >启用</option>
				<option value="2" <?php echo $state==2?'selected':'';?> >禁用</option>
			</select>
			<span class="1">&nbsp;</span>
		</td>
	</tr>
	<tr>
		<td class="add_right">用户名:</td>
		<td>
			<?php echo $uname;?>
		</td>
	</tr>
	<tr>
		<td class="add_right">新密码:</td>
		<td>
			<input type="password" name="passwd" class="input" style="width: 180px;" />
		</td>
	</tr>
	<tr>
		<td class="add_right">邮箱:</td>
		<td>
			<input type="text" name="email" class="input" style="width: 180px;" datatype="e" errormsg="格式有误！" value="<?php echo $email;?>" />
			<span class="Validform_checktip"></span>
		</td>
	</tr>
	<tr>
		<td colspan="2"><b>详细信息</b></td>
	</tr>
	<tr>
		<td class="add_right">姓名:</td>
		<td>
			<input type="text" name="name" class="input" style="width: 80px;" value="<?php echo $name;?>" />
		</td>
	</tr>
	<tr>
		<td class="add_right">部门:</td>
		<td>
			<input type="text" name="department" class="input" style="width: 120px;" value="<?php echo $department;?>" />
		</td>
	</tr>
	<tr>
		<td class="add_right">职务:</td>
		<td>
			<input type="text" name="position" class="input" style="width: 120px;" value="<?php echo $position;?>" />
		</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td>
			<input type="hidden" id="adminID" name="id" value="" />
			<input type="submit" id="editSub" value="更新" />
		</td>
	</tr>
</table>
</form>