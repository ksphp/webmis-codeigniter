<form id="htmlForm" action="<?php echo base_url($this->config->config['index_url'].'web_html/addData.html');?>" method="post">
<table class="table_add">
	<tbody id="htmlBody0">
	<tr>
		<td class="tright width">所属:</td>
		<td>
			<div id="htmlClass">&nbsp;</div>
			<input type="hidden" id="menus_fid" name="fid" value="" />
		</td>
	</tr>
	<tr>
		<td class="tright">标题:</td>
		<td>
			<input type="text" name="title" class="input" style="width: 70%;" datatype="*2-36" errormsg="标题至少2个字符,最多36个字符！" />
			<span class="Validform_checktip"></span>
		</td>
	</tr>
	<tr>
		<td class="tright">关键词:</td>
		<td>
			<input type="text" name="key" class="input" style="width: 70%;" />
			<span class="inputText c2">如：WebMIS,灵创网络,PHP</span>
		</td>
	</tr>
	<tr>
		<td class="tright">摘要:</td>
		<td><textarea name="summary" style="width: 95%; height: 180px;" maxlength="300"></textarea><span class="inputText c2">1~300字符</span></td>
	</tr>
	<tr>
		<td class="tright">缩略图:</td>
		<td>
			<input type="text" name="img" class="input" style="width: 70%;" />
			<span class="inputText c2">宽：200px 高：160px</span>
		</td>
	</tr>
	<tr>
		<td class="tright">发布时间:</td>
		<td>
			<input type="text" name="ctime" class="input" style="width: 130px;" value="<?php echo date('Y-m-d H:i:s');?>" />
		</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td>
			<input type="submit" id="htmlSub" value="添加" />
		</td>
	</tr>
	</tbody>
	<tbody id="htmlBody1" style="display: none;">
	<tr>
		<td colspan="2">
			<textarea id="tinymce" name="content">欢迎使用 WEBMIS 系统！</textarea>
		</td>
	</tr>
	</tbody>
</table>
</form>