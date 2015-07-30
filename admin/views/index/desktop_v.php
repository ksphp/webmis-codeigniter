<table class="action">
	<tr>
		<td class="title"><?php echo $Menus['Ctitle']; ?></td>
		<td>
			<ul class="action_ct">
				<?php echo $Menus['actionHtml']; ?>
			</ul>
		</td>
	</tr>
</table>
<div class="line">&nbsp;</div>
<!-- Content -->
<table class="table_list">
	<tr>
		<td colspan="2" class="title" style="font-weight: normal;" align="left">&nbsp;&nbsp;
			<?php echo $this->lang->line('desktop_uname');?>：<?php echo @$_SESSION['AdminInfo']['uname']; ?>&nbsp;&nbsp;
			<?php echo $this->lang->line('desktop_name');?>：<?php echo @$_SESSION['AdminInfo']['name']; ?>&nbsp;&nbsp;
			<?php echo $this->lang->line('desktop_dept');?>：<?php echo @$_SESSION['AdminInfo']['department']; ?>&nbsp;&nbsp;
			<?php echo $this->lang->line('desktop_position');?>：<?php echo @$_SESSION['AdminInfo']['position']; ?>
		</td>
	</tr>
	<tbody id="listBG1">
	<tr>
		<td colspan="2" class="tleft"><b><?php echo $this->lang->line('desktop_userinfo');?></b></td>
	</tr>
	<tr>
		<td width="70" class="tright"><?php echo $this->lang->line('desktop_user_IP');?>：</td>
		<td class="tleft"><?php echo $user['ip']; ?></td>
	</tr>
	<tr>
		<td class="tright"><?php echo $this->lang->line('desktop_user_os');?>：</td>
		<td class="tleft"><?php echo $user['platform']; ?></td>
	</tr>
	<tr>
		<td class="tright"><?php echo $this->lang->line('desktop_user_browser');?>：</td>
		<td class="tleft"><?php echo $user['browser']; ?></td>
	</tr>
	<tr>
		<td class="tright"><?php echo $this->lang->line('desktop_user_version');?>：</td>
		<td class="tleft"><?php echo $user['version']; ?></td>
	</tr>
	<tr>
		<td class="tright"><?php echo $this->lang->line('desktop_user_agent');?>：</td>
		<td colspan="3" class="tleft"><?php echo $user['agent']; ?></td>
	</tr>
	</tbody>
	<tbody id="listBG2">
	<tr>
		<td colspan="2" class="tleft"><b><?php echo $this->lang->line('desktop_sysinfo');?></b></td>
	</tr>
	<tr>
		<td class="tright"><?php echo $this->lang->line('desktop_sys_IP');?>：</td>
		<td class="tleft"><?php echo $server['ip']; ?></td>
	</tr>
	<tr>
		<td class="tright"><?php echo $this->lang->line('desktop_sys_port');?>：</td>
		<td class="tleft"><?php echo $server['port']; ?></td>
	</tr>
	<tr>
		<td class="tright"><?php echo $this->lang->line('desktop_sys_domain');?>：</td>
		<td class="tleft"><?php echo $server['name']; ?></td>
	</tr>
	<tr>
		<td class="tright"><?php echo $this->lang->line('desktop_sys_web');?>：</td>
		<td class="tleft"><?php echo $server['soft']; ?></td>
	</tr>
	<tr>
		<td class="tright"><?php echo $this->lang->line('desktop_sys_admin');?>：</td>
		<td class="tleft"><?php echo $server['admin']; ?></td>
	</tr>
	<tr>
		<td class="tright"><?php echo $this->lang->line('desktop_sys_url');?>：</td>
		<td class="tleft"><?php echo $server['url']; ?></td>
	</tr>
	</tbody>
	<tbody id="listBG3">
	<tr>
		<td colspan="2" class="tleft"><b><?php echo $this->lang->line('desktop_dbinfo');?></b></td>
	</tr>
	<tr>
		<td class="tright"><?php echo $this->lang->line('desktop_db_config');?>：</td>
		<td colspan="3" class="tleft"><?php echo base_url('config/database.php'); ?></td>
	</tr>
	<tr>
		<td class="tright"><?php echo $this->lang->line('desktop_db_driver');?>：</td>
		<td class="tleft"><?php echo $db['dbdriver']; ?></td>
	</tr>
	<tr>
		<td class="tright"><?php echo $this->lang->line('desktop_db_hostname');?>：</td>
		<td class="tleft"><?php echo $db['hostname']; ?></td>
	</tr>
	<tr>
		<td class="tright"><?php echo $this->lang->line('desktop_db_uname');?>：</td>
		<td class="tleft"><?php echo $db['username']; ?></td>
	</tr>
	<tr>
		<td class="tright"><?php echo $this->lang->line('desktop_db_name');?>：</td>
		<td class="tleft"><?php echo $db['database']; ?></td>
	</tr>
	<tr>
		<td class="tright"><?php echo $this->lang->line('desktop_db_prefix');?>：</td>
		<td class="tleft"><?php echo $db['dbprefix']; ?></td>
	</tr>
	<tr>
		<td class="tright"><?php echo $this->lang->line('desktop_db_set');?>：</td>
		<td class="tleft"><?php echo $db['char_set']; ?></td>
	</tr>
	</tbody>
</table>
<div class="right_line">&nbsp;</div>
<br>
<!-- Content End -->