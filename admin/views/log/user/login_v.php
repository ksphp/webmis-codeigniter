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
	<tr class="title" id="log_table">
		<td width="20"><a href="#" id="checkboxY"></a><a href="#" id="checkboxN"></a></td>
		<td width="30">ID</td>
		<td width="30">类型</td>
		<td width="100">用户名</td>
		<td width="120">时间</td>
		<td width="100">IP</td>
		<td>Agent</td>
	</tr>
	<tbody id="listBG">
	<?php foreach($list as $val){?>
	<tr>
		<td><input type="checkbox" value="<?php echo $val->id;?>" /></td>
		<td><?php echo $val->id;?></td>
		<td><?php echo keyHH($val->type, @$key['type']);?></td>
		<td><?php echo keyHH($val->uname, @$key['uname']);?></td>
		<td><?php echo keyHH($val->time, @$key['time']);?></td>
		<td><?php echo keyHH($val->ip, @$key['ip']);?></td>
		<td align="left"><?php echo keyHH($val->agent, @$key['agent']);?></td>
	</tr>
	<?php } ?>
	</tbody>
</table>
<div class="page"><div class="pagelist"><?php echo $page.'<span>'.$total.'</span>'; ?></div></div>
<!-- Content End -->