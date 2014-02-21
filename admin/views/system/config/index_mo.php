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
<form action="<?php echo base_url($this->config->config['index_url'].'sys_config/editData.html');?>" method="post" id="configForm">
<table class="table_add">
	<tr>
		<td class="width right">配置文件：</td>
		<td>
			<div class="<?php echo is_writable('config/config.php')?'suc':'err';?>"><em>&nbsp;</em><?php echo base_url('config/config.php');?></div>
		</td>
	</tr>
	<tr>
		<td class="right">后台名称：</td>
		<td>
			<input type="text" name="title" class="input" style="width: 80%;" value="<?php echo $this->config->config['title'];?>" />
		</td>
	</tr>
	<tr>
		<td class="right">版权信息：</td>
		<td>
			<textarea name="copy" style="width: 90%; height: 80px;" maxlength="200"><?php echo $this->config->config['copy'];?></textarea>
		</td>
	</tr>
	<tr>
		<td class="right">备份目录：</td>
		<td>
			<input type="text" name="backup" class="input" style="width: 40%;" value="<?php echo $this->config->config['backup'];?>" />
			<br/><span class="c999"><?php echo base_url('backup/');?></span>
		</td>
	</tr>
	<tr>
		<td class="right">主题：</td>
		<td>
			<select name="admin_themes">
<?php foreach ($admin_themes as $val) {?>
				<option value ="<?php echo $val['name'];?>" <?php echo $this->config->config['admin_themes']==$val['name']?'selected = "selected"':'';?>><?php echo $val['name'];?></option>
<?php }?>
			</select>
			<br/><span class="c999"><?php echo base_url('views/themes/');?></span>
		</td>
	</tr>
	<tr>
		<td class="right">WebMIS：</td>
		<td>
			<select name="webmis_themes">
<?php foreach ($webmis_themes as $val) {?>
				<option value ="<?php echo $val['name'];?>" <?php echo $this->config->config['webmis_themes']==$val['name']?'selected = "selected"':'';?>><?php echo $val['name'];?></option>
<?php }?>
			</select>
			<br/><span class="c999"> webmis/themes/</span>
		</td>
	</tr>
	<tr>
		<td class="right">Jquery：</td>
		<td>
			<select name="jquery">
<?php foreach ($jquery as $val) {?>
				<option value ="<?php echo $val['name'];?>" <?php echo $this->config->config['jquery']==$val['name']?'selected = "selected"':'';?>><?php echo $val['name'];?>(<?php echo formatBytes($val['size']);?>)</option>
<?php }?>
			</select>
			<br/><span class="c999"> webmis/plugin/jquery/</span>
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