<form action="<?php echo base_url($this->config->config['index_url'].'sys_admin/editData.html');?>" method="post" id="adminForm">
<table class="table_add">
	<tr>
		<td class="width right">状态:</td>
		<td>
			<select name="state">
				<option value="1" <?php echo $edit->state==1?'':'selected';?> >启用</option>
				<option value="2" <?php echo $edit->state==2?'selected':'';?> >禁用</option>
			</select>
			<span class="1">&nbsp;</span>
		</td>
	</tr>
	<tr>
		<td class="right">用户名:</td>
		<td>
			<?php echo $edit->uname;?>
		</td>
	</tr>
	<tr>
		<td class="right">新密码:</td>
		<td>
			<input type="password" name="passwd" class="input" style="width: 80%;" />
		</td>
	</tr>
	<tr>
		<td class="right">邮箱:</td>
		<td>
			<input type="text" name="email" class="input" style="width: 80%;" datatype="e" errormsg="格式有误！" value="<?php echo $edit->email;?>" />
			<span class="Validform_checktip"></span>
		</td>
	</tr>
	<tr>
		<td colspan="2"><b>详细信息</b></td>
	</tr>
	<tr>
		<td class="right">姓名:</td>
		<td>
			<input type="text" name="name" class="input" style="width: 30%;" value="<?php echo $edit->name;?>" />
		</td>
	</tr>
	<tr>
		<td class="right">部门:</td>
		<td>
			<input type="text" name="department" class="input" style="width: 60%;" value="<?php echo $edit->department;?>" />
		</td>
	</tr>
	<tr>
		<td class="right">职务:</td>
		<td>
			<input type="text" name="position" class="input" style="width: 60%;" value="<?php echo $edit->position;?>" />
		</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td>
			<input type="hidden" id="adminID" name="id" value="" />
			<input type="submit" id="adminSub" value="更新" />
		</td>
	</tr>
</table>
</form>