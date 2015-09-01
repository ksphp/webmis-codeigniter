<div id="file_root" style="display: none;"><?php echo $file_root; ?></div>
<div id="file_action" style="display: none;"><?php echo $file_action; ?></div>
<div id="file_editor" style="display: none;"><?php echo $file_editor; ?></div>
<!-- Action -->
<table class="action">
	<tr>
		<td class="title"><?php echo $Menus['Ctitle']; ?></td>
		<td>
			<ul class="action_ct">
				<li><a href="#" onclick="backDir('<?php echo dirname($filelist['path']); ?>');return false;"><em class="ico-back"></em><span><?php echo $this->lang->line('sys_file_up');?></span></a></li>
				<li><a href="#" id="ico-addfolder"><em class="ico-addfolder"></em><span><?php echo $this->lang->line('sys_file_new').$this->lang->line('sys_file_folder');?></span></a></li>
				<li><a href="#" id="ico-addfile"><em class="ico-addfile"></em><span><?php echo $this->lang->line('sys_file_new').$this->lang->line('sys_file_file');?></span></a></li>
				<li><a href="#" onclick="refreshDir('<?php echo $filelist['path']; ?>');return false;"><em class="ico-refresh"></em><span><?php echo $this->lang->line('sys_file_refresh');?></span></a></li>
				<li><a href="#" id="ico-upload"><em class="ico-upload"></em><span><?php echo $this->lang->line('sys_file_upload');?></span></a></li>
				<li><a href="#" id="ico-down"><em class="ico-down"></em><span><?php echo $this->lang->line('sys_file_down');?></span></a></li>
				<li><a href="#" id="ico-fdel"><em class="ico-fdel"></em><span><?php echo $this->lang->line('sys_file_remove');?></span></a></li>
			</ul>
		</td>
	</tr>
</table>
<div class="line">&nbsp;</div>
<!-- Content -->
<table class="table_list">
	<tr>
		<td colspan="5" align="left">
			<?php echo $this->lang->line('sys_file_path');?>：<span id="filePath"><?php echo $filelist['path']; ?></span>
		</td>
	</tr>
	<tr class="title" id="table">
		<td width="20"><a href="#" id="checkboxY"></a><a href="#" id="checkboxN"></a></td>
		<td><?php echo $this->lang->line('sys_file_name');?></td>
		<td><?php echo $this->lang->line('sys_file_size');?></td>
		<td><?php echo $this->lang->line('sys_file_perm');?></td>
		<td><?php echo $this->lang->line('sys_file_action');?></td>
	</tr>
	<tbody id="listBG">
<?php if(@$filelist['folder']){foreach($filelist['folder'] as $val){ ?>
	<tr>
		<td><input type="checkbox" value="<?php echo $val['name'];?>" /></td>
		<td class="tleft" style="font-size: 14px;"><a href="#" onclick="openDir('<?php echo $filelist['path'].$val['name']; ?>');return false;"><em class="ico-folder">&nbsp;</em><?php echo $val['name']; ?></a></td>
		<td><?php echo $val['size']; ?></td>
		<td><a href="#" onclick="editPerm('<?php echo $val['name']; ?>','<?php echo $val['perm']; ?>','<?php echo $this->lang->line('sys_file_perm');?>');return false;"><?php echo $val['perm']; ?></a></td>
		<td><a href="#" onclick="reName('<?php echo $val['name']; ?>','<?php echo $this->lang->line('sys_file_rename');?>');return false;"><?php echo $this->lang->line('sys_file_rename');?></a></td>
	</tr>
<?php }} ?>
<?php if(@$filelist['files']){foreach($filelist['files'] as $val){ ?>
	<tr>
		<td><input type="checkbox" value="<?php echo $val['name'];?>" /></td>
		<td class="tleft" style="font-size: 14px;"><a href="#" onclick="openFile('<?php echo $filelist['path'].$val['name']; ?>','<?php echo $val['ext']; ?>');return false;"><em class="<?php echo $val['class']; ?>">&nbsp;</em><?php echo $val['name']; ?></a></td>
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
	文件夹：<?php echo $filelist['dirNum']; ?>&nbsp;&nbsp;
	文件：<?php echo $filelist['fileNum']; ?>&nbsp;&nbsp;
	大小：<?php echo $filelist['size']; ?>
</div>
<!-- Content End -->