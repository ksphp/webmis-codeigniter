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
<form action="<?php echo base_url('sys_config/editData.html');?>" method="post" id="configForm">
<table class="table_add">
	<tr>
		<td class="add_width add_right">后台名称：</td>
		<td>
			<input type="text" name="title" class="input" style="width: 180px;" value="<?php echo $config['title'];?>" />
		</td>
	</tr>
	<tr>
		<td class="add_right">版权信息：</td>
		<td>
			<textarea name="copy" style="width: 520px; height: 70px;" maxlength="200"><?php echo $config['copy'];?></textarea>
		</td>
	</tr>
	<tr>
		<td class="add_right">备份目录：</td>
		<td>
			<input type="text" name="backdir" class="input" style="width: 160px;" value="<?php echo $config['backdir'];?>" />
		</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td>
			<input type="submit" id="editSub" value="保存配置" />
		</td>
	</tr>
	<tr>
		<td colspan="2">&nbsp;</td>
	</tr>
</table>
</form>
<!-- Content End -->