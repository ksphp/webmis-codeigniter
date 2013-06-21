<form action="<?php echo base_url('web_book/index.html');?>" method="get">
<table class="table_add">
	<tr>
		<td class="add_width add_right">标题:</td>
		<td>
			<input type="text" name="title" class="input" style="width: 180px;" />
		</td>
	</tr>
	<tr>
		<td class="add_right">发布时间:</td>
		<td>
			<input type="text" name="ctime" class="input" style="width: 120px;" />
		</td>
	</tr>
	<tr>
		<td class="add_right">回复人:</td>
		<td>
			<input type="text" name="admin" class="input" style="width: 80px;" />
		</td>
	</tr>
	<tr>
		<td class="add_right">回复时间:</td>
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