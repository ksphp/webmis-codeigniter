<form action="<?php echo base_url('sys_menus/index.html');?>" method="get">
<table class="table_add">
	<tr>
		<td class="width right">FID:</td>
		<td>
			<input type="text" name="fid" class="input" style="width: 60%;" />
		</td>
	</tr>
	<tr>
		<td class="right">菜单名:</td>
		<td>
			<input type="text" name="title" class="input" style="width: 90%;" />
		</td>
	</tr>
	<tr>
		<td class="right">URL:</td>
		<td>
			<input type="text" name="url" class="input" style="width: 90%;" />
		</td>
	</tr>
	<tr>
		<td class="right">动作值:</td>
		<td>
			<input type="text" name="perm" class="input" style="width: 60%;" />
		</td>
	</tr>
	<tr>
		<td class="right">图标:</td>
		<td>
			<input type="text" name="ico" class="input" style="width: 60%;" />
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