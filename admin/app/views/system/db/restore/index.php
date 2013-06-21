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
	<tr class="title" id="menus_table">
		<td width="20"><a href="#" onclick="All()">Y</a>/<a href="#" onclick="delAll()">N</a></td>
		<td>文件名</td>
		<td>大小</td>
		<td>创建时间</td>
	</tr>
	<tbody id="listBG">
	<?php foreach($file as $val){?>
	<tr>
		<td><input type="checkbox" value="<?php echo $val['name'];?>" /></td>
		<td style="text-align: left;"><a href="<?php echo base_url('sys_db_restore/down.html?name='.$val['name']) ;?>"><?php echo $val['name'];?></a></td>
		<td><?php echo formatBytes($val['size']);?></td>
		<td><?php echo date('Y-m-d H:s:i',$val['date']);?></td>
	</tr>
	<?php } ?>
	</tbody>
</table>
<div class="page">&nbsp;</div>
<!-- Content End -->