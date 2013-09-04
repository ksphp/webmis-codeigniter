<form id="htmlForm" action="<?php echo base_url('web_html/editData.html');?>" method="post">
<table class="table_add">
	<tbody id="htmlBody0">
	<tr>
		<td class="add_right add_width">所属:</td>
		<td>
			<input type="text" id="menus_fid" name="fid" class="input" style="width: 60px;" value="<?php echo $edit->class;?>" />
			<span id="htmlClass">&nbsp;</span>
		</td>
	</tr>
	<tr>
		<td class="add_right">标题:</td>
		<td>
			<input type="text" name="title" class="input" style="width: 320px;" datatype="*2-36" errormsg="标题至少2个字符,最多36个字符！" value="<?php echo $edit->title;?>" />
			<span class="Validform_checktip"></span>
		</td>
	</tr>
	<tr>
		<td class="add_right">关键词:</td>
		<td>
			<input type="text" name="key" class="input" style="width: 320px;" value="<?php echo $edit->key;?>" />
			<span class="c666">&nbsp;&nbsp;&nbsp;&nbsp;如：WebMIS,灵创网络,PHP</span>
		</td>
	</tr>
	<tr>
		<td class="add_right">摘要:</td>
		<td><textarea name="summary" style="width: 560px; height: 180px;" maxlength="300"><?php echo $edit->summary;?></textarea><span>&nbsp;&nbsp;1~300字符</span></td>
	</tr>
	<tr>
		<td class="add_right">缩略图:</td>
		<td>
			<input type="text" name="img" class="input" style="width: 550px;" value="<?php echo $edit->img;?>" />
			<span class="c999">&nbsp;&nbsp;宽：200px 高：160px</span>
		</td>
	</tr>
	<tr>
		<td class="add_right">发布时间:</td>
		<td>
			<input type="text" name="ctime" class="input" style="width: 140px;" value="<?php echo $edit->ctime;?>" />
		</td>
	</tr>
	</tbody>
	<tbody id="htmlBody1" style="display: none;">
	<tr>
		<td colspan="2">
			<textarea id="tinymce" name="content"><?php echo $edit->content;?></textarea>
		</td>
	</tr>
	</tbody>
	<tr>
		<td>&nbsp;</td>
		<td>
			<input type="hidden" id="htmlID" name="id" value="" />
			<input type="submit" id="htmlSub" value="编辑" />
		</td>
	</tr>
</table>
</form>