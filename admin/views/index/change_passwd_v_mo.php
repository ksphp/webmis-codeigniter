<!-- Content -->
<form action="<?php echo base_url($this->config->config['index_url'].'sys_change_passwd/changePasswd.html');?>" method="post" id="changePWdForm">
<table class="table_add">
	<tr>
		<td colspan="2"><h3 class="h3_ccc"><?php echo $title;?></h3><br></td>
	</tr>
	<tr>
		<td class="width right">用户名:</td>
		<td>
			<b id="uname"><?php echo $uinfo['uname']; ?></b>
			<input type="hidden" name="uname" value="<?php echo $uinfo['uname']; ?>" />
		</td>
	</tr>
	<tr>
		<td class="right">新密码:</td>
		<td>
			<input type="password" name="passwd" class="input" style="width: 180px;" datatype="*6-16" errormsg="6~16位之间！" />
			<span class="Validform_checktip"></span>
		</td>
	</tr>
	<tr>
		<td class="right">确认密码:</td>
		<td>
			<input type="password" class="input" style="width: 180px;" datatype="*" errormsg="密码不一致！" recheck="passwd" />
			<span class="Validform_checktip"></span>
		</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td>
			<input type="submit" id="changeSub" value="修改密码" />
		</td>
	</tr>
	<tr>
		<td colspan="2">&nbsp;</td>
	</tr>
</table>
</form>
<!-- Content End -->