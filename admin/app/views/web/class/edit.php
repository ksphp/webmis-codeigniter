<form action="<?php echo base_url('web_class/editData.html');?>" method="post" id="classForm">
<table class="table_add">
	<tr>
		<td class="add_width add_right">所属:</td>
		<td>
			<input type="text" id="menus_fid" name="fid" class="input" style="width: 40px;" value="<?php echo $fid;?>" />
			<span id="newsClass">&nbsp;</span>
		</td>
	</tr>
	<tr>
		<td class="add_right">菜单名:</td>
		<td>
			<input type="text" name="title" class="input" style="width: 180px;" datatype="s2-12" errormsg="至少2个字符,最多12个字符！" value="<?php echo $title;?>" />
			<span class="Validform_checktip"></span>
		</td>
	</tr>
	<tr>
		<td class="add_right">URL:</td>
		<td>
			<input type="text" name="url" class="input" style="width: 180px;" datatype="*2-32" errormsg="至少2个字符,最多32个字符！" value="<?php echo $url;?>" />
			<span class="Validform_checktip"></span>
		</td>
	</tr>
	<tr>
		<td class="add_right">备注:</td>
		<td>
			<textarea name="remark" style="width: 320px; height: 120px;"><?php echo $remark;?></textarea>
		</td>
	</tr>
	<tr>
		<td class="add_right">排序:</td>
		<td>
			<input type="text" name="sort" style="width: 60px;" value="<?php echo $sort;?>" />
		</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td>
			<input type="hidden" id="classID" name="id" value="" />
			<input type="submit" id="editSub" value="编辑" />
		</td>
	</tr>
</table>
</form>