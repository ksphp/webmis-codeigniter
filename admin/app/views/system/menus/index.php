<!-- Action -->
<div class="right_top">
	<span class="right_action">
		<div class="right_title"><?php echo $title; ?></div>
		<?php echo $actionHtml; ?>
	</span>
</div>
<div class="right_line">&nbsp;</div>
<!-- Action End -->
<!-- Content -->
<table class="table_list">
	<tr class="title" id="menus_table">
		<td width="20"><a href="#" id="checkboxY">√</a><a href="#" id="checkboxN">×</a></td>
		<td width="40">ID</td>
		<td width="40">FID</td>
		<td>菜单名</td>
		<td>URL</td>
		<td width="60">动作值</td>
		<td width="120">创建时间</td>
		<td>备注</td>
		<td width="30">排序</td>
	</tr>
	<tbody id="listBG">
	<?php foreach($list as $val){?>
	<tr>
		<td><input type="checkbox" value="<?php echo $val->id;?>" /></td>
		<td><?php echo $val->id;?></td>
		<td><?php echo keyHH($val->fid, @$key['fid']);?></td>
		<td><?php echo keyHH($val->title, @$key['title']);?></td>
		<td><?php echo keyHH($val->url, @$key['url']);?></td>
		<td><?php echo keyHH($val->perm, @$key['perm']);?></td>
		<td><?php echo keyHH($val->ctime, @$key['ctime']);?></td>
		<td align="left"><?php echo keyHH($val->remark, @$key['remark']);?></td>
		<td><?php echo $val->sort;?></td>
	</tr>
	<?php } ?>
	</tbody>
</table>
<div class="page"><div class="pagelist"><?php echo $page.'<span>'.$total.'</span>'; ?></div></div>
<!-- Content End -->