<!-- Content -->
<form action="<?php echo base_url($this->config->config['index_url'].'sys_config/editData.html');?>" method="post" id="configForm">
<table class="table_add">
	<tr>
		<td colspan="2"><h3 class="h3_ccc"><?php echo $title;?><span>（系统常规参数）</span></h3><br></td>
	</tr>
	<tr>
		<td class="width tright">配置文件：</td>
		<td>
			<div class="<?php echo is_writable('config/config.php')?'suc':'err';?>"><em>&nbsp;</em><?php echo base_url('config/config.php');?></div>
		</td>
	</tr>
	<tr>
		<td class="tright">后台名称：</td>
		<td>
			<input type="text" name="title" class="input" style="width: 180px;" value="<?php echo $this->config->config['title'];?>" />
		</td>
	</tr>
	<tr>
		<td class="tright">版权信息：</td>
		<td>
			<textarea name="copy" style="width: 520px; height: 70px;" maxlength="200"><?php echo $this->config->config['copy'];?></textarea>
		</td>
	</tr>
	<tr>
		<td class="tright">备份目录：</td>
		<td>
			<input type="text" name="backup" class="input" style="width: 160px;" value="<?php echo $this->config->config['backup'];?>" />
			<span class="inputText c2"><?php echo base_url('backup/');?></span>
		</td>
	</tr>
	<tr>
		<td class="tright">主题：</td>
		<td>
			<select name="admin_themes">
<?php foreach ($admin_themes as $val) {?>
				<option value ="<?php echo $val['name'];?>" <?php echo $this->config->config['admin_themes']==$val['name']?'selected = "selected"':'';?>><?php echo $val['name'];?></option>
<?php }?>
			</select>
			<br/><span class="c2"> <?php echo base_url('views/themes/');?></span>
		</td>
	</tr>
	<tr>
		<td class="tright">WebMIS：</td>
		<td>
			<select name="webmis_themes">
<?php foreach ($webmis_themes as $val) {?>
				<option value ="<?php echo $val['name'];?>" <?php echo $this->config->config['webmis_themes']==$val['name']?'selected = "selected"':'';?>><?php echo $val['name'];?></option>
<?php }?>
			</select>
			<br/><span class="c2"> webmis/themes/</span>
		</td>
	</tr>
	<tr>
		<td class="tright">Jquery：</td>
		<td>
			<select name="jquery">
<?php foreach ($jquery as $val) {?>
				<option value ="<?php echo $val['name'];?>" <?php echo $this->config->config['jquery']==$val['name']?'selected = "selected"':'';?>><?php echo $val['name'];?>(<?php echo formatBytes($val['size']);?>)</option>
<?php }?>
			</select>
			<br/><span class="c2"> webmis/plugin/jquery/</span>
		</td>
	</tr>
	<tr>
		<td colspan="2"><h3 class="h3_ccc">&nbsp;</h3></td>
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