<form action="<?php echo base_url($this->config->config['index_url'].'web_class/index.html');?>" method="get">
<table class="table_add">
	<tr>
		<td class="width tright">FID:</td>
		<td>
			<input type="text" name="fid" class="input" style="width: 30%;" />
		</td>
	</tr>
	<tr>
		<td class="tright">菜单名:</td>
		<td>
			<input type="text" name="title" class="input" style="width: 80%;" />
		</td>
	</tr>
	<tr>
		<td class="tright">URL:</td>
		<td>
			<input type="text" name="url" class="input" style="width: 80%;" />
		</td>
	</tr>
	<tr>
		<td class="tright">图标:</td>
		<td>
			<input type="text" name="ico" class="input" style="width: 30%;" />
		</td>
	</tr>
	<tr>
		<td class="tright">备注:</td>
		<td>
			<input type="text" name="remark" class="input" style="width: 80%;" />
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