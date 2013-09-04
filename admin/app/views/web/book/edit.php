<form action="<?php echo base_url('web_book/editData.html');?>" method="post" id="bookForm">
<table class="table_add">
	<tr>
		<td class="add_width add_right">标题:</td>
		<td>
			<?php echo $title;?>
		</td>
	</tr>
	<tr>
		<td class="add_right">发布时间:</td>
		<td>
			<?php echo $ctime;?>
		</td>
	</tr>
	<tr>
		<td class="add_right">留言内容:</td>
		<td><?php echo $content;?></td>
	</tr>
	<tr>
		<td class="add_right">回复:</td>
		<td>
			<textarea name="reply" style="width: 360px; height: 160px;" datatype="s2-100" errormsg="至少2个字符,最多100个字符！"><?php echo $reply;?></textarea>
			<span class="Validform_checktip"></span>
		</td>
	</tr>
	<tr>
		<td class="add_right">回复人:</td>
		<td>
			<input name="admin" class="input" datatype="s2-12" errormsg="至少2个字符,最多12个字符！" value="<?php echo $admin;?>" />
			<span class="Validform_checktip"></span>
		</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td>
			<input type="hidden" id="bookID" name="id" value="" />
			<input type="submit" id="bookSub" value="编辑" />
		</td>
	</tr>
</table>
</form>