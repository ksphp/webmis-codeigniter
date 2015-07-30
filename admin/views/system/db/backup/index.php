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
		<td><?php echo $this->lang->line('sys_db_backup_table');?></td>
		<td><?php echo $this->lang->line('sys_db_backup_field');?></td>
		<td><?php echo $this->lang->line('sys_db_backup_num');?></td>
	</tr>
	<tbody id="listBG">
	<?php foreach($table as $val){?>
	<tr>
		<td><input type="checkbox" value="<?php echo $val['name'];?>" /></td>
		<td class="tleft"><?php echo $val['name'];?></td>
		<td class="tleft"><?php echo $val['field'];?></td>
		<td><?php echo $val['num'];?></td>
	</tr>
	<?php } ?>
	</tbody>
</table>
<div class="page">&nbsp;</div>
<!-- Content End -->