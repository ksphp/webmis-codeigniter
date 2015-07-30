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
	<tr class="title" id="admin_log_table">
		<td width="20"><a href="#" id="checkboxY"></a><a href="#" id="checkboxN"></a></td>
		<td>ID</td>
		<td><?php echo $this->lang->line('log_login_type');?></td>
		<td><?php echo $this->lang->line('log_login_uname');?></td>
		<td><?php echo $this->lang->line('log_login_time');?></td>
		<td><?php echo $this->lang->line('log_login_agent');?></td>
	</tr>
	<tbody id="listBG">
	<?php foreach($list as $val){?>
	<tr>
		<td><input type="checkbox" value="<?php echo $val->id;?>" /></td>
		<td><?php echo $val->id;?></td>
		<td><?php echo keyHH($val->type, @$key['type']);?></td>
		<td><?php echo keyHH($val->uname, @$key['uname']);?></td>
		<td><?php echo keyHH($val->time, @$key['time']);?></td>
		<td class="tleft"><?php echo keyHH($val->agent, @$key['agent']);?></td>
	</tr>
	<?php } ?>
	</tbody>
</table>
<div class="page"><div class="pagelist"><?php echo $page.'<span>'.$total.'</span>'; ?></div></div>
<!-- Content End -->