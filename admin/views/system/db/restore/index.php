<table class="action">
	<tr>
		<td class="title"><?php echo $Menus['Ctitle']; ?></td>
		<td>
			<ul class="action_ct">
				<?php echo $Menus['actionHtml']; ?>
			</ul>
		</td>
	</tr>
</table>
<div class="line">&nbsp;</div>
<!-- Content -->
<table class="table_list">
	<tr class="title" id="menus_table">
		<td width="20"><a href="#" id="checkboxY"></a><a href="#" id="checkboxN"></a></td>
		<td><?php echo $this->lang->line('sys_db_restore_filename');?></td>
		<td width="90"><?php echo $this->lang->line('sys_db_restore_size');?></td>
		<td width="120"><?php echo $this->lang->line('sys_db_restore_ctime');?></td>
	</tr>
	<tbody id="listBG">
	<?php foreach($file as $val){?>
	<tr>
		<td><input type="checkbox" value="<?php echo $val['name'];?>" /></td>
		<td class="tleft"><a href="<?php echo base_url('sys_db_restore/down.html?name='.$val['name']) ;?>"><?php echo $val['name'];?></a></td>
		<td><?php echo formatBytes($val['size']);?></td>
		<td><?php echo date('Y-m-d H:s:i',$val['date']);?></td>
	</tr>
	<?php } ?>
	</tbody>
</table>
<div class="page">&nbsp;</div>
<!-- Content End -->