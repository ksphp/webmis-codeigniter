<form action="<?php echo base_url('sys_menus_action/addData.html');?>" method="post" id="menusACTForm">
<table class="table_add">
	<tr>
		<td class="add_width add_right">动作名称:</td>
		<td>
			<input type="text" name="name" class="input" style="width: 120px;" datatype="s2-6" errormsg="2~6个字符内！" />
			<span class="Validform_checktip"></span>
		</td>
	</tr>
	<tr>
		<td class="add_right">权限:</td>
		<td>
			<input type="text" id="action_perm" name="perm" class="input" style="width: 120px;" datatype="s2-6" errormsg="2~6个字符内！" />
			<span class="Validform_checktip"></span>
		</td>
	</tr>
	<tr>
		<td class="add_right">样式:</td>
		<td>
			<input type="text" name="class" class="input" style="width: 120px;" datatype="s2-12" errormsg="2~12个字符内！" />
			<span class="Validform_checktip"></span>
		</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td>
			<input type="submit" id="addSub" value="添加" />
		</td>
	</tr>
</table>
</form>