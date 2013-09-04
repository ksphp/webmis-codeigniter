<table class="ct_table">
	<tr>
		<td class="ct_table_left">
			<ul class="action">
				<li class="title"><?php echo $title; ?></li>
				<li class="action_ct"><?php echo $actionHtml; ?></li>
			</ul>
		</td>
		<td class="ct_table_right">
<!-- Content -->
<table class="table_list">
	<tr class="title" id="book_table">
		<td width="20"><a href="#" id="checkboxY"></a><a href="#" id="checkboxN"></a></td>
		<td width="40">ID</td>
		<td>标题</td>
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
		<td style="text-align: left;"><?php echo keyHH($val->title, @$key['title']);?></td>
		<td><a href="#" onclick="bookShow(<?php echo $val->id;?>);return false;"><?php echo sysSubStr($val->content,42,true);?></a></td>
		<td><?php echo keyHH($val->ctime, @$key['ctime']);?></td>
		<td><?php echo keyHH($val->admin, @$key['admin']);?></td>
		<td><?php echo keyHH($val->rtime, @$key['rtime']);?></td>
	</tr>
	<?php } ?>
	</tbody>
</table>
<div class="page"><div class="pagelist"><?php echo $page.'<span>'.$total.'</span>'; ?></div></div>
<!-- Content End -->
		</td>
	</tr>
</table>