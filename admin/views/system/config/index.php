<!-- Content -->
<form action="<?php echo base_url($this->config->config['index_url'].'sys_config/editData.html');?>" method="post" id="configForm">
<table class="table_add">
	<tr>
		<td colspan="2"><h3 class="h3_ccc"><?php echo $Menus['Ctitle'];?></h3><br></td>
	</tr>
	<tr>
		<td class="width tright"><?php echo $this->lang->line('sys_config_file');?>：</td>
		<td>
			<div class="<?php echo is_writable('config/config.php')?'suc':'err';?>"><em>&nbsp;</em><?php echo base_url('config/config.php');?></div>
		</td>
	</tr>
	<tr>
		<td class="tright"><?php echo $this->lang->line('sys_config_title');?>：</td>
		<td>
			<input type="text" name="title" class="input" style="width: 180px;" value="<?php echo $this->config->config['title'];?>" />
		</td>
	</tr>
	<tr>
		<td class="tright"><?php echo $this->lang->line('sys_config_copy');?>：</td>
		<td>
			<textarea name="copy" style="width: 520px; height: 70px;" maxlength="200"><?php echo $this->config->config['copy'];?></textarea>
		</td>
	</tr>
	<tr>
		<td class="tright"><?php echo $this->lang->line('sys_config_backup');?>：</td>
		<td>
			<input type="text" name="backup" class="input" style="width: 160px;" value="<?php echo $this->config->config['backup'];?>" />
			<span class="inputText c2"><?php echo base_url('backup/');?></span>
		</td>
	</tr>
	<tr>
		<td class="tright"><?php echo $this->lang->line('sys_config_themes');?>：</td>
		<td>
			<select name="admin_themes">
<?php foreach ($admin_themes as $val) {if($val['name']!='js'){?>
				<option value ="<?php echo $val['name'];?>" <?php echo $this->config->config['admin_themes']==$val['name']?'selected = "selected"':'';?>><?php echo $val['name'];?></option>
<?php }}?>
			</select>
			<br/><span class="c2"> themes/admin</span>
		</td>
	</tr>
	<tr>
		<td class="tright"><?php echo $this->lang->line('sys_config_webmis');?>：</td>
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
		<td class="tright"><?php echo $this->lang->line('sys_config_lang');?>：</td>
		<td>
			<select name="lang">
<?php foreach ($lang as $val) {?>
				<option value ="<?php echo $val['name'];?>" <?php echo $this->config->config['language']==$val['name']?'selected = "selected"':'';?>><?php echo $val['name'];?></option>
<?php }?>
			</select>
			<br/><span class="c2"> <?php echo base_url('language');?></span>
		</td>
	</tr>
	<tr>
		<td colspan="2"><h3 class="h3_ccc">&nbsp;</h3></td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td>
			<input type="submit" id="editSub" value="<?php echo $this->lang->line('inc_save');?>" />
		</td>
	</tr>
	<tr>
		<td colspan="2">&nbsp;</td>
	</tr>
</table>
</form>
<!-- Content End -->