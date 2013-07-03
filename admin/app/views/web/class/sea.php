<form action="<?php echo base_url('web_class/index.html');?>" method="get">
<table class="table_add">
	<tr>
		<td class="add_width add_right">FID:</td>
		<td>
			<input type="text" name="fid" class="input" style="width: 60px;" />
		</td>
	</tr>
	<tr>
		<td class="add_right">菜单名:</td>
		<td>
			<input type="text" name="title" class="input" style="width: 180px;" />
		</td>
	</tr>
	<tr>
		<td class="add_right">URL:</td>
		<td>
			<input type="text" name="url" class="input" style="width: 120px;" />
		</td>
	</tr>
	<tr>
		<td class="add_right">备注:</td>
		<td>
			<input type="text" name="remark" class="input" style="width: 180px;" />
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