<form action="<?php echo base_url('web_class/addData.html');?>" method="post" id="classForm">
<table class="table_add">
	<tr>
		<td class="width right">所属:</td>
		<td>
			<div id="newsClass">&nbsp;</div>
			<input type="hidden" id="menus_fid" name="fid" value="0" />
		</td>
	</tr>
	<tr>
		<td class="right">菜单名:</td>
		<td>
			<input type="text" name="title" class="input" style="width: 60%;" datatype="s2-12" errormsg="至少2个字符,最多12个字符！" />
			<span class="Validform_checktip"></span>
		</td>
	</tr>
	<tr>
		<td class="right">URL:</td>
		<td>
			<input type="text" name="url" class="input" style="width: 60%;" datatype="*2-32" errormsg="至少2个字符,最多32个字符！" />
			<span class="Validform_checktip"></span>
		</td>
	</tr>
	<tr>
		<td class="right">图标:</td>
		<td>
			<input type="text" name="ico" class="input" style="width: 60px;" />
		</td>
	</tr>
	<tr>
		<td class="right">备注:</td>
		<td>
			<textarea name="remark" style="width: 95%; height: 120px;"></textarea>
		</td>
	</tr>
	<tr>
		<td class="right">排序:</td>
		<td>
			<input type="text" name="sort" class="input" value="0" style="width: 60px;" />
		</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td>
			<input type="submit" id="classSub" value="添加" />
		</td>
	</tr>
</table>
</form>