<!-- JS -->
<div id="getUrl" style="display: none;"><?php echo $get_url; ?></div>
<?php foreach($js as $val){ ?>
<script language="javascript" src="<?php echo base_url($val); ?>"></script>
<?php }?>
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
	<tr class="title" id="class_table">
		<td width="20"><a href="#" onclick="All()">Y</a>/<a href="#" onclick="delAll()">N</a></td>
		<td width="40">ID</td>
		<td width="40">FID</td>
		<td width="120">菜单名</td>
		<td>URL</td>
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
		<td><?php echo keyHH($val->ctime, @$key['ctime']);?></td>
		<td align="left"><?php echo keyHH($val->remark, @$key['remark']);?></td>
		<td><?php echo $val->sort;?></td>
	</tr>
	<?php } ?>
	</tbody>
</table>
<div class="page"><div class="pagelist"><?php echo $page.'<span>'.$total.'</span>'; ?></div></div>
<!-- Content End -->