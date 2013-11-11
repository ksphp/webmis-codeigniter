<form action="<?php echo base_url('sys_menus_action/index.html');?>" method="get">
<table class="table_add">
	<tr>
		<td class="width right">名称:</td>
		<td>
			<input type="text" name="name" class="input" style="width: 80%;" />
		</td>
	</tr>
	<tr>
		<td class="right">权限:</td>
		<td>
			<input type="text" name="perm" class="input" style="width: 80%;" />
		</td>
	</tr>
	<tr>
		<td class="right">图标:</td>
		<td>
			<input type="text" name="ico" class="input" style="width: 80%;" />
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