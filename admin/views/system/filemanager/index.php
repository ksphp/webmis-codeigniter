<div id="file_root" style="display: none;"><?php echo $file_root; ?></div>
<div id="file_action" style="display: none;"><?php echo $file_action; ?></div>
<div id="file_editor" style="display: none;"><?php echo $file_editor; ?></div>
<!-- Action -->
<table class="action">
	<tr>
		<td class="title"><?php echo $Menus['Ctitle']; ?></td>
		<td>
			<ul class="action_ct">
				<li><a href="#" onclick="backDir('<?php echo dirname($filelist['path']); ?>');return false;"><em class="ico-back"></em><?php echo $this->lang->line('sys_file_up');?></a></li>
				<li><a href="#" id="ico-addfolder"><em class="ico-addfolder"></em><?php echo $this->lang->line('sys_file_new').$this->lang->line('sys_file_folder');?></a></li>
				<li><a href="#" id="ico-addfile"><em class="ico-addfile"></em><?php echo $this->lang->line('sys_file_new').$this->lang->line('sys_file_file');?></a></li>
				<li><a href="#" onclick="refreshDir('<?php echo $filelist['path']; ?>');return false;"><em class="ico-refresh"></em><?php echo $this->lang->line('sys_file_refresh');?></a></li>
				<li><a href="#" id="ico-upload"><em class="ico-upload"></em><?php echo $this->lang->line('sys_file_upload');?></a></li>
				<li><a href="#" id="ico-down"><em class="ico-down"></em><?php echo $this->lang->line('sys_file_down');?></a></li>
				<li><a href="#" id="ico-fdel"><em class="ico-fdel"></em><?php echo $this->lang->line('sys_file_remove');?></a></li>
			</ul>
		</td>
	</tr>
</table>
<div class="line">&nbsp;</div>
<!-- Content -->
<table class="table_list">
	<tr>
		<td colspan="7" align="left" class="c2">
			<?php echo $this->lang->line('sys_file_path');?>：<span id="filePath"><?php echo $filelist['path']; ?></span>
		</td>
	</tr>
	<tr class="title" id="table">
		<td width="20"><a href="#" id="checkboxY"></a><a href="#" id="checkboxN"></a></td>
		<td><?php echo $this->lang->line('sys_file_name');?></td>
		<td width="120"><?php echo $this->lang->line('sys_file_ctime');?></td>
		<td width="120"><?php echo $this->lang->line('sys_file_mtime');?></td>
		<td width="80"><?php echo $this->lang->line('sys_file_size');?></td>
		<td width="40"><?php echo $this->lang->line('sys_file_perm');?></td>
		<td width="120"><?php echo $this->lang->line('sys_file_action');?></td>
	</tr>
	<tbody id="listBG">
<?php if(@$filelist['folder']){foreach($filelist['folder'] as $val){ ?>
	<tr>
		<td><input type="checkbox" value="<?php echo $val['name'];?>" /></td>
		<td class="tleft" style="font-size: 14px;"><a href="#" onclick="openDir('<?php echo $filelist['path'].$val['name']; ?>');return false;"><em class="ico-folder">&nbsp;</em><?php echo $val['name']; ?></a></td>
		<td><?php echo $val['ctime']; ?></td>
		<td><?php echo $val['mtime']; ?></td>
		<td><?php echo $val['size']; ?></td>
		<td><a href="#" onclick="editPerm('<?php echo $val['name']; ?>','<?php echo $val['perm']; ?>','<?php echo $this->lang->line('sys_file_perm');?>');return false;"><?php echo $val['perm']; ?></a></td>
		<td><a href="#" onclick="reName('<?php echo $val['name']; ?>','<?php echo $this->lang->line('sys_file_rename');?>');return false;"><?php echo $this->lang->line('sys_file_rename');?></a></td>
	</tr>
<?php }} ?>
<?php if(@$filelist['files']){foreach($filelist['files'] as $val){ ?>
	<tr>
		<td><input type="checkbox" value="<?php echo $val['name'];?>" /></td>
		<td class="tleft" style="font-size: 14px;"><a href="#" onclick="openFile('<?php echo $filelist['path'].$val['name']; ?>','<?php echo $val['ext']; ?>');return false;"><em class="<?php echo $val['class']; ?>">&nbsp;</em><?php echo $val['name']; ?></a></td>
		<td><?php echo $val['ctime']; ?></td>
		<td><?php echo $val['mtime']; ?></td>
		<td><?php echo $val['size']; ?></td>
		<td><a href="#" onclick="editPerm('<?php echo $val['name']; ?>','<?php echo $val['perm']; ?>','<?php echo $this->lang->line('sys_file_perm');?>');return false;"><?php echo $val['perm']; ?></a></td>
		<td>
			<a href="#" onclick="reName('<?php echo $val['name']; ?>','<?php echo $this->lang->line('sys_file_rename');?>');return false;"><?php echo $this->lang->line('sys_file_rename');?></a> | 
			<a href="#" onclick="editFile('<?php echo $filelist['path'].$val['name']; ?>','<?php echo $val['ext']; ?>','<?php echo $this->lang->line('sys_file_edit');?>');return false;"><?php echo $this->lang->line('sys_file_edit');?></a>
		</td>
	</tr>
<?php }} ?>
	</tbody>
</table>
<div class="page">
	<?php echo $this->lang->line('sys_file_folder');?>：<?php echo $filelist['dirNum']; ?>&nbsp;&nbsp;
	<?php echo $this->lang->line('sys_file_file');?>：<?php echo $filelist['fileNum']; ?>&nbsp;&nbsp;
	<?php echo $this->lang->line('sys_file_size');?>：<?php echo $filelist['size']; ?>
</div>
<!-- Content End -->