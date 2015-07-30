<form action="<?php echo base_url($this->config->config['index_url'].'class_web/editData.html');?>" method="post" id="classForm">
<table class="table_add">
	<tr>
		<td class="width tright"><?php echo $this->lang->line('class_web_class');?>:</td>
		<td>
			<input type="text" id="menus_fid" name="fid" class="input" style="width: 40px;" value="<?php echo $edit->fid;?>" />
			<span id="newsClass">&nbsp;</span>
		</td>
	</tr>
	<tr>
		<td class="tright"><?php echo $this->lang->line('class_web_title');?>:</td>
		<td>
			<input type="text" name="title" value="<?php echo $edit->title;?>" class="input" style="width: 60%;" datatype="*2-16" errormsg="2~16<?php echo $this->lang->line('inc_form_char');?>" sucmsg="<?php echo $this->lang->line('inc_form_pass');?>" nullmsg="<?php echo $this->lang->line('inc_form_null');?>" />
			<span class="Validform_checktip"></span>
		</td>
	</tr>
	<tr>
		<td class="tright"><?php echo $this->lang->line('class_web_url');?>:</td>
		<td>
			<input type="text" name="url" value="<?php echo $edit->url;?>" class="input" style="width: 60%;" datatype="*2-32" errormsg="2~32<?php echo $this->lang->line('inc_form_char');?>" sucmsg="<?php echo $this->lang->line('inc_form_pass');?>" nullmsg="<?php echo $this->lang->line('inc_form_null');?>" />
			<span class="Validform_checktip"></span>
		</td>
	</tr>
	<tr>
		<td class="tright"><?php echo $this->lang->line('class_web_ico');?>:</td>
		<td>
			<input type="text" name="ico" class="input" style="width: 60px;" value="<?php echo $edit->ico;?>" />
		</td>
	</tr>
	<tr>
		<td class="tright"><?php echo $this->lang->line('class_web_remark');?>:</td>
		<td>
			<textarea name="remark" style="width: 95%; height: 120px;"><?php echo $edit->remark;?></textarea>
		</td>
	</tr>
	<tr>
		<td class="tright"><?php echo $this->lang->line('class_web_sort');?>:</td>
		<td>
			<input type="text" name="sort" class="input" style="width: 60px;" value="<?php echo $edit->sort;?>" />
		</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td>
			<input type="hidden" id="classID" name="id" value="" />
			<input type="submit" id="classSub" value="<?php echo $this->lang->line('inc_edit');?>" />
		</td>
	</tr>
</table>
</form>