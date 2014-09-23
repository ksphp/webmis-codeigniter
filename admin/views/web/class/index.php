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
	<tr class="title" id="class_table">
		<td width="20"><a href="#" id="checkboxY"></a><a href="#" id="checkboxN"></a></td>
		<td width="40">ID</td>
		<td width="40">FID</td>
		<td width="120">菜单名</td>
		<td>URL</td>
		<td>图标</td>
		<td width="120">创建时间</td>
		<td>备注</td>
		<td width="30">排序</td>
		<td width="40">审核</td>
	</tr>
	<tbody id="listBG">
	<?php foreach($list as $val){?>
	<tr>
		<td><input type="checkbox" value="<?php echo $val->id;?>" /></td>
		<td><?php echo $val->id;?></td>
		<td><?php echo keyHH($val->fid, @$key['fid']);?></td>
		<td><?php echo keyHH($val->title, @$key['title']);?></td>
		<td><?php echo keyHH($val->url, @$key['url']);?></td>
		<td><?php echo keyHH($val->ico, @$key['ico']);?></td>
		<td><?php echo keyHH($val->ctime, @$key['ctime']);?></td>
		<td align="left"><?php echo keyHH($val->remark, @$key['remark']);?></td>
		<td><?php echo $val->sort;?></td>
		<td><?php echo $adminState[$val->state];?></td>
	</tr>
	<?php } ?>
	</tbody>
</table>
<div class="page"><div class="pagelist"><?php echo $page.'<span>'.$total.'</span>'; ?></div></div>
<!-- Content End -->