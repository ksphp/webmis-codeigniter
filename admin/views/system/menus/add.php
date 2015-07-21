<form action="<?php echo base_url($this->config->config['index_url'].'sys_menus/addData.html');?>" method="post" id="menusForm">
<table class="table_add">
	<tr>
		<td class="width tright">所属:</td>
		<td>
			<div id="menusClass">&nbsp;</div>
			<input type="hidden" id="menus_fid" name="fid" value="0" />
		</td>
	</tr>
	<tr>
		<td class="tright">菜单名:</td>
		<td>
			<input type="text" name="title" class="input" style="width: 70%;" datatype="s2-12" errormsg="至少2个字符,最多12个字符！" />
			<span class="Validform_checktip"></span>
		</td>
	</tr>
	<tr>
		<td class="tright">URL:</td>
		<td>
			<input type="text" name="url" class="input" style="width: 70%;" datatype="*1-32" errormsg="至少1个字符,最多32个字符！" />
			<span class="Validform_checktip"></span>
		</td>
	</tr>
	<tr>
		<td class="tright">图标:</td>
		<td>
			<input type="text" name="ico" class="input" style="width: 30%;" />
		</td>
	</tr>
	<tr>
		<td class="tright">子权限:</td>
		<td>
<?php foreach($action as $val){?>
			<input type="checkbox" name="permVal" class="Checkbox" value="<?php echo $val->perm;?>" /><span class="inputText"><?php echo $val->name;?></span>
<?php }?>
			<input type="hidden" id="menus_perm" name="perm" value="0" />
		</td>
	</tr>
	<tr>
		<td class="tright">备注:</td>
		<td>
			<textarea name="remark" style="width: 95%; height: 120px;"></textarea>
		</td>
	</tr>
	<tr>
		<td class="tright">排序:</td>
		<td>
			<input type="text" name="sort" class="input" value="0" style="width: 80px;" />
		</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td>
			<input type="submit" id="menusSub" value="添加" />
		</td>
	</tr>
</table>
</form>