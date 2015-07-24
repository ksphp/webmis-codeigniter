<form id="newsForm" action="<?php echo base_url($this->config->config['index_url'].'web_news/addData.html');?>" method="post">
<table class="table_add">
	<tbody id="newsBody0">
	<tr>
		<td class="tright" width="80"><?php echo $this->lang->line('web_news_class');?>:</td>
		<td>
			<div id="newsClass">&nbsp;</div>
			<input type="hidden" id="menus_fid" name="fid" value="" />
		</td>
	</tr>
	<tr>
		<td class="tright"><?php echo $this->lang->line('web_news_title');?>:</td>
		<td>
			<input type="text" name="title" class="input" style="width: 80%;" datatype="*2-36" errormsg="2~36<?php echo $this->lang->line('inc_form_char');?>" sucmsg="<?php echo $this->lang->line('inc_form_pass');?>" nullmsg="<?php echo $this->lang->line('inc_form_null');?>" />
			<span class="Validform_checktip"></span>
		</td>
	</tr>
	<tr>
		<td class="tright"><?php echo $this->lang->line('web_news_source');?>:</td>
		<td>
			<input type="text" name="source" class="input" style="width: 30%;" datatype="*2-24" errormsg="2~24<?php echo $this->lang->line('inc_form_char');?>" sucmsg="<?php echo $this->lang->line('inc_form_pass');?>" nullmsg="<?php echo $this->lang->line('inc_form_null');?>" />
			<span class="inputText"><?php echo $this->lang->line('web_news_author');?>:</span>
			<input type="text" name="author" class="input" style="width: 20%;" datatype="*2-12" errormsg="2~12<?php echo $this->lang->line('inc_form_char');?>" sucmsg="<?php echo $this->lang->line('inc_form_pass');?>" nullmsg="<?php echo $this->lang->line('inc_form_null');?>" />
			<span class="Validform_checktip"></span>
		</td>
	</tr>
	<tr>
		<td class="tright"><?php echo $this->lang->line('web_news_key');?>:</td>
		<td>
			<input type="text" name="key" class="input" style="width: 70%;" />
			<span class="inputText c2">WebMIS,灵创网络,PHP</span>
		</td>
	</tr>
	<tr>
		<td class="tright"><?php echo $this->lang->line('web_news_summary');?>:</td>
		<td><textarea name="summary" style="width: 95%; height: 120px;" maxlength="300"></textarea><span class="inputText c2">1~300<?php echo $this->lang->line('inc_form_char');?></span></td>
	</tr>
	<tr>
		<td class="tright"><?php echo $this->lang->line('web_news_img');?>:</td>
		<td>
			<input type="text" name="img" class="input" style="width: 70%;" /><span class="inputText c2">Width：110px Height：75px</span>
		</td>
	</tr>
	<tr>
		<td class="tright"><?php echo $this->lang->line('web_news_ctime');?>:</td>
		<td>
			<input type="text" name="ctime" class="input" style="width: 130px;" value="<?php echo date('Y-m-d H:i:s');?>" />
		</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td>
			<input type="submit" id="newsSub" value="<?php echo $this->lang->line('inc_add');?>" />
		</td>
	</tr>
	</tbody>
	<tbody id="newsBody1" style="display: none;">
	<tr>
		<td colspan="2">
			<textarea id="tinymce" name="content">Welcome to use WEBMIS！</textarea>
		</td>
	</tr>
	</tbody>
</table>
</form>
<div style="padding: 0 10px;" id="newsBody2" class="noDisplay">
<table class="table_list">
	<tr class="title">
		<td width="150"><?php echo $this->lang->line('web_news_preview');?></td>
		<td><?php echo $this->lang->line('web_news_url');?></td>
		<td width="60"><?php echo $this->lang->line('web_news_action');?></td>
	</tr>
	<tbody id="listBG">
	<tr>
		<td colspan="3">Editing status！<input type="hidden" id="NumIMG" value="0" /></td>
	</tr>
	</tbody>
</table>
</div>