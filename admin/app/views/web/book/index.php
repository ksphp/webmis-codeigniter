<table class="action">
	<tr>
		<td class="title"><?php echo $title; ?></td>
		<td>
			<ul class="action_ct">
				<?php echo $actionHtml; ?>
			</ul>
		</td>
	</tr>
</table>
<div class="line">&nbsp;</div>
<!-- Content -->
<table class="table_list">
	<tr class="title" id="book_table">
		<td width="20"><a href="#" id="checkboxY"></a><a href="#" id="checkboxN"></a></td>
		<td width="40">ID</td>
		<td>昵称</td>
		<td>留言内容</td>
		<td width="120">发布时间</td>
		<td width="100">回复人</td>
		<td width="120">回复时间</td>
	</tr>
	<tbody id="listBG">
	<?php foreach($list as $val){?>
	<tr>
		<td><input type="checkbox" value="<?php echo $val->id;?>" /></td>
		<td><?php echo $val->id;?></td>
		<td style="text-align: left;"><a href="#" onclick="bookShow(<?php echo $val->id;?>);return false;"><?php echo keyHH($val->name, @$key['name']);?></a></td>
		<td><?php echo sysSubStr($val->content,42,true);?></td>
		<td><?php echo keyHH($val->ctime, @$key['ctime']);?></td>
		<td><?php echo keyHH($val->admin, @$key['admin']);?></td>
		<td><?php echo keyHH($val->rtime, @$key['rtime']);?></td>
	</tr>
	<?php } ?>
	</tbody>
</table>
<div class="page"><div class="pagelist"><?php echo $page.'<span>'.$total.'</span>'; ?></div></div>
<!-- Content End -->