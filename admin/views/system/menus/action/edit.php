<form action="<?php echo base_url($this->config->config['index_url'].'sys_menus_action/editData.html');?>" method="post" id="menusACTForm">
<table class="table_add">
	<tr>
		<td class="width tright"><?php echo $this->lang->line('sys_menu_a_name');?>:</td>
		<td>
			<input type="text" name="name" value="<?php echo $edit->name;?>" class="input" style="width: 80%;" datatype="*2-32" errormsg="2~32<?php echo $this->lang->line('inc_form_char');?>" sucmsg="<?php echo $this->lang->line('inc_form_pass');?>" nullmsg="<?php echo $this->lang->line('inc_form_null');?>" />
			<span class="Validform_checktip"></span>
		</td>
	</tr>
	<tr>
		<td class="tright"><?php echo $this->lang->line('sys_menu_a_perm');?>:</td>
		<td>
			<input type="text" name="perm" value="<?php echo $edit->perm;?>" class="input" style="width: 40%;" datatype="n1-6" errormsg="1~6<?php echo $this->lang->line('inc_form_num');?>" sucmsg="<?php echo $this->lang->line('inc_form_pass');?>" nullmsg="<?php echo $this->lang->line('inc_form_null');?>" />
			<span class="Validform_checktip"></span>
		</td>
	</tr>
	<tr>
		<td class="tright"><?php echo $this->lang->line('sys_menu_a_icon');?>:</td>
		<td>
			<input type="text" name="ico" value="<?php echo $edit->ico;?>" class="input" style="width: 40%;" datatype="*2-24" errormsg="2~24<?php echo $this->lang->line('inc_form_char');?>" sucmsg="<?php echo $this->lang->line('inc_form_pass');?>" nullmsg="<?php echo $this->lang->line('inc_form_null');?>" />
			<span class="Validform_checktip"></span>
		</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td class="sub">
			<input type="hidden" id="actionID" name="id" value="" />
			<input type="submit" id="actionSub" value="<?php echo $this->lang->line('inc_edit');?>" />
		</td>
	</tr>
</table>
</form>