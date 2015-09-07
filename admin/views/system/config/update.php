<!-- Content -->
<form action="<?php echo base_url($this->config->config['index_url'].'sys_config/update/'.$Name.'.html');?>" method="post">
<table class="table_add">
	<tr>
		<td colspan="2"><h3 class="h3_ccc"><?php echo $this->lang->line('sys_config_update');?></h3><br/></td>
	</tr>
	<tr>
		<td class="width tright"><?php echo $Title;?>：</td>
		<td><?php echo '<b style="font-size: 14px; color: #666;">'.$this->config->config[$VersionName].'</b> '.$checkUpdate.' '.$Msg;?></td>
	</tr>
	<tr>
		<td class="width tright"><?php echo $this->lang->line('sys_config_update_log');?>：</td>
		<td><?php echo $LogFile;?> [<a href="<?php echo base_url('sys_config/clearLog/'.$Name.'.html');?>"><?php echo $this->lang->line('sys_config_update_clear');?></a>]</td>
	</tr>
	<tr>
		<td colspan="2">
			<div class="code"><?php echo $Log;?></div>
		</td>
	</tr>
</table>
</form>
<!-- Content End -->