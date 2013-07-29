<form id="newsForm" action="<?php echo base_url('web_news/addData.html');?>" method="post">
<table class="table_add">
	<tbody id="newsBody0">
	<tr>
		<td class="add_right add_width">所属:</td>
		<td>
			<div id="newsClass">&nbsp;</div>
			<input type="hidden" id="menus_fid" name="fid" value="" />
		</td>
	</tr>
	<tr>
		<td class="add_right">标题:</td>
		<td>
			<input type="text" name="title" class="input" style="width: 320px;" datatype="*2-36" errormsg="标题至少2个字符,最多36个字符！" />
			<span class="Validform_checktip"></span>
		</td>
	</tr>
	<tr>
		<td class="add_right">来源:</td>
		<td>
			<input type="text" name="source" class="input" style="width: 160px;" datatype="*2-24" errormsg="来源至少2个字符,最多24个字符！" />
			&nbsp;&nbsp;作者:&nbsp;&nbsp;
			<input type="text" name="author" class="input" style="width: 110px;" datatype="*2-12" errormsg="作者至少2个字符,最多12个字符！" />
			<span class="Validform_checktip"></span>
		</td>
	</tr>
	<tr>
		<td class="add_right">关键字:</td>
		<td>
			<input type="text" name="key" class="input" style="width: 420px;" />
			<span class="c666">&nbsp;&nbsp;&nbsp;&nbsp;如：WebMIS,灵创网络,PHP</span>
		</td>
	</tr>
	<tr>
		<td class="add_right">摘要:</td>
		<td><textarea name="summary" style="width: 560px; height: 180px;" maxlength="300"></textarea><span class="c999">&nbsp;&nbsp;1~300字符</span></td>
	</tr>
	<tr>
		<td class="add_right">缩略图:</td>
		<td>
			<input type="file" id="filedata" name="filedata" />
			<input type="button" value="上传图片" onclick="ajaxFileUpload()" /><span class="c999">&nbsp;&nbsp;宽：110px 高：75px</span><br />
			<input type="text" id="news_img" name="img" class="input" style="width: 520px;" />
		</td>
	</tr>
	<tr>
		<td class="add_right">发布时间:</td>
		<td>
			<input type="text" name="ctime" class="input" style="width: 140px;" value="<?php echo date('Y-m-d H:i:s');?>" />
		</td>
	</tr>
	</tbody>
	<tbody id="newsBody1" style="display: none;">
	<tr>
		<td colspan="2">
			<textarea id="tinymce" name="content">欢迎使用 WEBMIS 系统！</textarea>
		</td>
	</tr>
	</tbody>
	<tr>
		<td>&nbsp;</td>
		<td>
			<input type="submit" id="newsSub" value="添加" />
		</td>
	</tr>
</table>
</form>