<form action="<?php echo base_url('sys_menus_action/index.html');?>" method="get">
<table class="table_add">
	<tr>
		<td class="add_width add_right">名称:</td>
		<td>
			<input type="text" name="name" class="input" style="width: 160px;" />
		</td>
	</tr>
	<tr>
		<td class="add_right">权限:</td>
		<td>
			<input type="text" name="perm" class="input" style="width: 160px;" />
		</td>
	</tr>
	<tr>
		<td class="add_right">样式:</td>
		<td>
			<input type="text" name="class" class="input" style="width: 160px;" />
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