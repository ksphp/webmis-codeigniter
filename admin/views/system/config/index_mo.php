<!-- Content -->
<form action="<?php echo base_url($this->config->config['index_url'].'sys_config/editData.html');?>" method="post" id="configForm">
<table class="table_add">
	<tr>
		<td colspan="2"><h3 class="h3_ccc"><?php echo $this->lang->line('sys_config_update');?></h3></td>
	</tr>
	<tr>
		<td colspan="2">&nbsp;</td>
	</tr>
	<tr>
		<td class="width tright"><?php echo $this->lang->line('sys_config_admin');?>：</td>
		<td><b style="font-size: 14px; color: #666;"><?php echo $this->config->config['version_admin'];?></b> [<a href="<?php echo base_url('sys_config/update/admin.html');?>"><?php echo $this->lang->line('sys_config_update');?></a>]</td>
	</tr>
	<tr>
		<td class="width tright"><?php echo $this->lang->line('sys_config_webmis');?>：</td>
		<td><b style="font-size: 14px; color: #666;"><?php echo $this->config->config['version_webmis'];?></b> [<a href="<?php echo base_url('sys_config/update/webmis.html');?>"><?php echo $this->lang->line('sys_config_update');?></a>]</td>
	</tr>
	<tr>
		<td class="width tright"><?php echo $this->lang->line('sys_config_CodeIgniter');?>：</td>
		<td><b style="font-size: 14px; color: #666;"><?php echo $this->config->config['version_CodeIgniter'];?></b> [<a href="<?php echo base_url('sys_config/update/CodeIgniter.html');?>"><?php echo $this->lang->line('sys_config_update');?></a>]</td>
	</tr>
	<tr>
		<td colspan="2">&nbsp;</td>
	</tr>
	<tr>
		<td colspan="2"><h3 class="h3_ccc"><?php echo $Menus['Ctitle'];?></h3><br></td>
	</tr>
	<tr>
		<td class="width tright"><?php echo $this->lang->line('sys_config_file');?>：</td>
		<td>
			<div class="<?php echo is_writable('config/config.php')?'suc':'err';?>"><em>&nbsp;</em><b>config/config.php</b></div>
		</td>
	</tr>
	<tr>
		<td class="tright"><?php echo $this->lang->line('sys_config_title');?>：</td>
		<td>
			<input type="text" name="title" class="input" style="width: 80%;" value="<?php echo $this->config->config['title'];?>" />
		</td>
	</tr>
	<tr>
		<td class="tright"><?php echo $this->lang->line('sys_config_copy');?>：</td>
		<td>
			<textarea name="copy" style="width: 90%; height: 70px;"><?php echo $this->config->config['copy'];?></textarea>
		</td>
	</tr>
	<tr>
		<td class="tright"><?php echo $this->lang->line('sys_config_backup');?>：</td>
		<td>
			<input type="text" name="backup" class="input" style="width: 40%;" value="<?php echo $this->config->config['backup'];?>" />
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
			<br/><span class="c2"><?php echo $URL;?>themes/admin</span>
		</td>
	</tr>
	<tr>
		<td class="tright"><?php echo $this->lang->line('sys_config_wthemes');?>：</td>
		<td>
			<select name="webmis_themes">
<?php foreach ($webmis_themes as $val) {?>
				<option value ="<?php echo $val['name'];?>" <?php echo $this->config->config['webmis_themes']==$val['name']?'selected = "selected"':'';?>><?php echo $val['name'];?></option>
<?php }?>
			</select>
			<br/><span class="c2"><?php echo $URL;?>webmis/themes/</span>
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
		<td class="sub">
			<input type="submit" id="editSub" value="<?php echo $this->lang->line('inc_save');?>" />
		</td>
	</tr>
	<tr>
		<td colspan="2">&nbsp;</td>
	</tr>
</table>
</form>
<!-- Content End -->