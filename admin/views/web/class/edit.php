<form action="<?php echo base_url($this->config->config['index_url'].'web_class/editData.html');?>" method="post" id="classForm">
<table class="table_add">
	<tr>
		<td class="width tright">所属:</td>
		<td>
			<input type="text" id="menus_fid" name="fid" class="input" style="width: 40px;" value="<?php echo $edit->fid;?>" />
			<span id="newsClass">&nbsp;</span>
		</td>
	</tr>
	<tr>
		<td class="tright">菜单名:</td>
		<td>
			<input type="text" name="title" class="input" style="width: 60%;" datatype="s2-12" errormsg="至少2个字符,最多12个字符！" value="<?php echo $edit->title;?>" />
			<span class="Validform_checktip"></span>
		</td>
	</tr>
	<tr>
		<td class="tright">URL:</td>
		<td>
			<input type="text" name="url" class="input" style="width: 60%;" datatype="*2-32" errormsg="至少2个字符,最多32个字符！" value="<?php echo $edit->url;?>" />
			<span class="Validform_checktip"></span>
		</td>
	</tr>
	<tr>
		<td class="tright">图标:</td>
		<td>
			<input type="text" name="ico" class="input" style="width: 60px;" value="<?php echo $edit->ico;?>" />
		</td>
	</tr>
	<tr>
		<td class="tright">备注:</td>
		<td>
			<textarea name="remark" style="width: 95%; height: 120px;"><?php echo $edit->remark;?></textarea>
		</td>
	</tr>
	<tr>
		<td class="tright">排序:</td>
		<td>
			<input type="text" name="sort" class="input" style="width: 60px;" value="<?php echo $edit->sort;?>" />
		</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td>
			<input type="hidden" id="classID" name="id" value="" />
			<input type="submit" id="classSub" value="编辑" />
		</td>
	</tr>
</table>
</form>