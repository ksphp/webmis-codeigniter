<form action="<?php echo base_url('sys_menus_action/editData.html');?>" method="post" id="menusACTForm">
<table class="table_add">
	<tr>
		<td class="add_width add_right">动作名称:</td>
		<td>
			<input type="text" name="name" class="input" style="width: 120px;" datatype="s2-6" errormsg="2~6个字符内！" value="<?php echo $edit->name;?>" />
			<span class="Validform_checktip"></span>
		</td>
	</tr>
	<tr>
		<td class="add_right">权限:</td>
		<td>
			<input type="text" name="perm" class="input" style="width: 120px;" datatype="s1-6" errormsg="1~6个字符内！" value="<?php echo $edit->perm;?>" />
			<span class="Validform_checktip"></span>
		</td>
	</tr>
	<tr>
		<td class="add_right">图标:</td>
		<td>
			<input type="text" name="ico" class="input" style="width: 120px;" datatype="*2-12" errormsg="2~12个字符内！" value="<?php echo $edit->ico;?>" />
			<span class="Validform_checktip"></span>
		</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td>
			<input type="hidden" id="actionID" name="id" value="" />
			<input type="submit" id="actionSub" value="更新" />
		</td>
	</tr>
</table>
</form>