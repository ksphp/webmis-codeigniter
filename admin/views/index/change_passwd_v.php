<!-- Content -->
<form action="<?php echo base_url($this->config->config['index_url'].'sys_change_passwd/changePasswd.html');?>" method="post" id="changePWdForm">
<table class="table_add">
	<tr>
		<td colspan="2"><h3 class="h3_ccc"><?php echo $Menus['Ctitle'];?></h3><br></td>
	</tr>
	<tr>
		<td class="width tright"><?php echo $this->lang->line('sys_pwd_uname');?>:</td>
		<td>
			<b id="uname"><?php echo @$_SESSION['AdminInfo']['uname']; ?></b>
			<input type="hidden" name="uname" value="<?php echo @$_SESSION['AdminInfo']['uname']; ?>" />
		</td>
	</tr>
	<tr>
		<td class="tright"><?php echo $this->lang->line('sys_pwd_pwd1');?>:</td>
		<td>
			<input type="password" name="passwd" class="input" style="width: 180px;" datatype="*6-16" errormsg="6~16<?php echo $this->lang->line('inc_form_char');?>" sucmsg="<?php echo $this->lang->line('inc_form_pass');?>" nullmsg="<?php echo $this->lang->line('inc_form_null');?>" />
			<span class="Validform_checktip"></span>
		</td>
	</tr>
	<tr>
		<td class="tright"><?php echo $this->lang->line('sys_pwd_pwd2');?>:</td>
		<td>
			<input type="password" class="input" style="width: 180px;" datatype="*" recheck="passwd" errormsg="<?php echo $this->lang->line('inc_form_pwd');?>" sucmsg="<?php echo $this->lang->line('inc_form_pass');?>" nullmsg="<?php echo $this->lang->line('inc_form_null');?>" />
			<span class="Validform_checktip"></span>
		</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td>
			<input type="submit" id="changeSub" value="<?php echo $this->lang->line('sys_pwd_change');?>" />
		</td>
	</tr>
	<tr>
		<td colspan="2">&nbsp;</td>
	</tr>
</table>
</form>
<!-- Content End -->