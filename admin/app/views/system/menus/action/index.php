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
	<tr class="title" id="menus_action_table">
		<td width="20"><a href="#" onclick="All()">Y</a>/<a href="#" onclick="delAll()">N</a></td>
		<td width="60">ID</td>
		<td width="80">名称</td>
		<td width="80">权限值</td>
		<td>Class</td>
	</tr>
	<tbody id="listBG">
	<?php foreach($list as $val){?>
	<tr>
		<td><input type="checkbox" value="<?php echo $val->id;?>" /></td>
		<td><?php echo $val->id;?></td>
		<td><?php echo keyHH($val->name, @$key['name']);?></td>
		<td><?php echo keyHH($val->perm, @$key['perm']);?></td>
		<td><?php echo keyHH($val->class, @$key['class']);?></td>
	</tr>
	<?php } ?>
	</tbody>
</table>
<div class="page"><div class="pagelist"><?php echo $page.'<span>'.$total.'</span>'; ?></div></div>
<!-- Content End -->
