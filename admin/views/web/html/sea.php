<form action="<?php echo base_url('index.php/web_html/index.html');?>" method="get">
<table class="table_add">
	<tr>
		<td class="width right">所属:</td>
		<td>
			<input type="text" name="class" class="input" style="width: 60px;" /><span class="c666">&nbsp;&nbsp;如：:3:9:12:</span>
		</td>
	</tr>
	<tr>
		<td class="right">标题:</td>
		<td>
			<input type="text" name="title" class="input" style="width: 80%;" />
		</td>
	</tr>
	<tr>
		<td class="right">创建人:</td>
		<td>
			<input type="text" name="uname" class="input" style="width: 80%;" />
		</td>
	</tr>
	<tr>
		<td class="right">创建时间:</td>
		<td>
			<input type="text" name="ctime" class="input" style="width: 80%;" />
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