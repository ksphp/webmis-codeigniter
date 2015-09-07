<form action="<?php echo base_url($this->config->config['index_url'].'sys_menus/editData.html');?>" method="post" id="menusForm">
<table class="table_add">
	<tr>
		<td class="width tright"><?php echo $this->lang->line('sys_menu_class');?>:</td>
		<td>
			<input type="text" id="menus_fid" name="fid" class="input" style="width: 40px;" value="<?php echo $edit->fid;?>" />
			<span id="menusClass">&nbsp;</span>
		</td>
	</tr>
	<tr>
		<td class="tright"><?php echo $this->lang->line('sys_menu_name');?>:</td>
		<td>
			<input type="text" name="title" class="input" style="width: 70%;" value="<?php echo $edit->title;?>" datatype="*2-32" errormsg="2~32<?php echo $this->lang->line('inc_form_char');?>" sucmsg="<?php echo $this->lang->line('inc_form_pass');?>" nullmsg="<?php echo $this->lang->line('inc_form_null');?>" />
			<span class="Validform_checktip"></span>
		</td>
	</tr>
	<tr>
		<td class="tright"><?php echo $this->lang->line('sys_menu_cname');?>:</td>
		<td>
			<input type="text" name="url" class="input" style="width: 70%;" value="<?php echo $edit->url;?>" datatype="*0-32" errormsg="0~32<?php echo $this->lang->line('inc_form_char');?>" sucmsg="<?php echo $this->lang->line('inc_form_pass');?>" nullmsg="<?php echo $this->lang->line('inc_form_null');?>" />
			<span class="Validform_checktip"></span>
		</td>
	</tr>
	<tr>
		<td class="tright"><?php echo $this->lang->line('sys_menu_icon');?>:</td>
		<td>
			<input type="text" name="ico" class="input" style="width: 30%;" value="<?php echo $edit->ico;?>" datatype="*0-16" errormsg="0~16<?php echo $this->lang->line('inc_form_char');?>" sucmsg="<?php echo $this->lang->line('inc_form_pass');?>" nullmsg="<?php echo $this->lang->line('inc_form_null');?>" />
			<span class="Validform_checktip"></span>
		</td>
	</tr>
	<tr>
		<td class="tright"><?php echo $this->lang->line('sys_menu_perm');?>:</td>
		<td>
<?php
foreach($action as $val){
	$title = $this->lang->line($val->name);
	$title = $title?$title:$val->name;
?>
			<input type="checkbox" name="permVal" class="Checkbox" value="<?php echo $val->perm;?>" <?php echo intval($edit->perm)&intval($val->perm)?'checked':'';?> /><span class="inputText"><?php echo $title;?></span>
<?php }?>
			<input type="hidden" id="menus_perm" name="perm" value="0" />
		</td>
	</tr>
	<tr>
		<td class="tright"><?php echo $this->lang->line('sys_menu_remark');?>:</td>
		<td>
			<textarea name="remark" style="width: 95%; height: 120px;"><?php echo $edit->remark;?></textarea>
		</td>
	</tr>
	<tr>
		<td class="tright"><?php echo $this->lang->line('sys_menu_sort');?>:</td>
		<td>
			<input type="text" name="sort" class="input" style="width: 80px;" value="<?php echo $edit->sort;?>" />
		</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td class="sub">
			<input type="hidden" id="menusID" name="id" value="" />
			<input type="submit" id="menusSub" value="<?php echo $this->lang->line('inc_edit');?>" />
		</td>
	</tr>
</table>
</form>