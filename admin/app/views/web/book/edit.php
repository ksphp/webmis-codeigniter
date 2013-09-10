<form action="<?php echo base_url('web_book/editData.html');?>" method="post" id="bookForm">
<table class="table_add">
	<tr>
		<td class="width right">标题:</td>
		<td>
			<?php echo $edit->title;?>
		</td>
	</tr>
	<tr>
		<td class="right">发布时间:</td>
		<td>
			<?php echo $edit->ctime;?>
		</td>
	</tr>
	<tr>
		<td class="right">留言内容:</td>
		<td><?php echo $edit->content;?></td>
	</tr>
	<tr>
		<td class="right">回复:</td>
		<td>
			<textarea name="reply" style="width: 95%; height: 160px;" datatype="s2-100" errormsg="至少2个字符,最多100个字符！"><?php echo $edit->reply;?></textarea>
			<span class="Validform_checktip"></span>
		</td>
	</tr>
	<tr>
		<td class="right">回复人:</td>
		<td>
			<input name="admin" class="input" datatype="s2-12" errormsg="至少2个字符,最多12个字符！" value="<?php echo $edit->admin;?>" />
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