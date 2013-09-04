<table class="ct_table">
	<tr>
		<td class="ct_table_left">
			<ul class="action">
				<li class="title"><?php echo $title; ?></li>
				<li class="action_ct"><?php echo $actionHtml; ?></li>
			</ul>
		</td>
		<td class="ct_table_right">
<!-- Content -->
<table class="table_list">
	<tr class="title" id="menus_table">
		<td width="20"><a href="#" id="checkboxY"></a><a href="#" id="checkboxN"></a></td>
		<td>表名</td>
		<td>字段</td>
		<td>条数</td>
	</tr>
	<tbody id="listBG">
	<?php foreach($table as $val){?>
	<tr>
		<td><input type="checkbox" value="<?php echo $val['name'];?>" /></td>
		<td style="text-align: left;"><?php echo $val['name'];?></td>
		<td style="text-align: left;"><?php echo $val['field'];?></td>
		<td><?php echo $val['num'];?></td>
	</tr>
	<?php } ?>
	</tbody>
</table>
<div class="page">&nbsp;</div>
<!-- Content End -->
		</td>
	</tr>
</table>