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
	<tr class="title" id="menus_action_table">
		<td width="20"><a href="#" id="checkboxY"></a><a href="#" id="checkboxN"></a></td>
		<td>ID</td>
		<td><?php echo $this->lang->line('sys_menu_a_title');?></td>
		<td><?php echo $this->lang->line('sys_menu_a_name');?></td>
		<td><?php echo $this->lang->line('sys_menu_a_perm');?></td>
		<td><?php echo $this->lang->line('sys_menu_a_icon');?></td>
	</tr>
	<tbody id="listBG">
	<?php foreach($list as $val){?>
	<tr>
		<td><input type="checkbox" value="<?php echo $val->id;?>" /></td>
		<td><?php echo $val->id;?></td>
		<td><?php echo $this->lang->line($val->name);?></td>
		<td><?php echo keyHH($val->name, @$key['name']);?></td>
		<td><?php echo keyHH($val->perm, @$key['perm']);?></td>
		<td><?php echo keyHH($val->ico, @$key['ico']);?></td>
	</tr>
	<?php } ?>
	</tbody>
</table>
<div class="page"><div class="pagelist"><?php echo $page.'<span>'.$total.'</span>'; ?></div></div>
<!-- Content End -->