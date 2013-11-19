<form action="<?php echo base_url('index.php/web_news/index.html');?>" method="get">
<table class="table_add">
	<tr>
		<td class="width right">所属:</td>
		<td>
			<input type="text" name="class" class="input" style="width: 40%;" /><span class="c666">&nbsp;&nbsp;如：:3:9:12:</span>
		</td>
	</tr>
	<tr>
		<td class="right">标题:</td>
		<td>
			<input type="text" name="title" class="input" style="width: 90%;" />
		</td>
	</tr>
	<tr>
		<td class="right">来源:</td>
		<td>
			<input type="text" name="source" class="input" style="width: 60%;" />
		</td>
	</tr>
	<tr>
		<td class="right">作者:</td>
		<td>
			<input type="text" name="author" class="input" style="width: 60%;" />
		</td>
	</tr>
	<tr>
		<td class="right">发布时间:</td>
		<td>
			<input type="text" name="ctime" class="input" style="width: 60%;" />
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