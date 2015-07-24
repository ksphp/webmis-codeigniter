<div id="TabName1" class="noDisplay"><?php echo $this->lang->line('web_news_tab1');?></div>
<div id="TabName2" class="noDisplay"><?php echo $this->lang->line('web_news_tab2');?></div>
<div id="TabName3" class="noDisplay"><?php echo $this->lang->line('web_news_tab3');?></div>
<form id="newsForm" action="<?php echo base_url($this->config->config['index_url'].'web_news/editData.html');?>" method="post">
<table class="table_add">
	<tbody id="newsBody0">
	<tr>
		<td class="tright" width="80"><?php echo $this->lang->line('web_news_class');?>:</td>
		<td>
			<input type="text" id="menus_fid" name="fid" class="input" style="width: 60px;" value="<?php echo $edit->class;?>" />
			<span id="newsClass">&nbsp;</span>
		</td>
	</tr>
	<tr>
		<td class="tright"><?php echo $this->lang->line('web_news_title');?>:</td>
		<td>
			<input type="text" name="title" value="<?php echo $edit->title;?>" class="input" style="width: 80%;" datatype="*2-36" errormsg="2~36<?php echo $this->lang->line('inc_form_char');?>" sucmsg="<?php echo $this->lang->line('inc_form_pass');?>" nullmsg="<?php echo $this->lang->line('inc_form_null');?>" />
			<span class="Validform_checktip"></span>
		</td>
	</tr>
	<tr>
		<td class="tright"><?php echo $this->lang->line('web_news_source');?>:</td>
		<td>
			<input type="text" name="source" value="<?php echo $edit->source;?>" class="input" style="width: 30%;" datatype="*2-24" errormsg="2~24<?php echo $this->lang->line('inc_form_char');?>" sucmsg="<?php echo $this->lang->line('inc_form_pass');?>" nullmsg="<?php echo $this->lang->line('inc_form_null');?>" />
			<span class="inputText"><?php echo $this->lang->line('web_news_author');?>:</span>
			<input type="text" name="author" value="<?php echo $edit->author;?>" class="input" style="width: 20%;" datatype="*2-12" errormsg="<?php echo $this->lang->line('inc_form_char');?>" sucmsg="<?php echo $this->lang->line('inc_form_pass');?>" nullmsg="<?php echo $this->lang->line('inc_form_null');?>"  />
			<span class="Validform_checktip"></span>
		</td>
	</tr>
	<tr>
		<td class="tright"><?php echo $this->lang->line('web_news_key');?>:</td>
		<td>
			<input type="text" name="key" value="<?php echo $edit->key;?>" class="input" style="width: 70%;" />
			<span class="inputText c2">WebMIS,灵创网络,PHP</span>
		</td>
	</tr>
	<tr>
		<td class="tright"><?php echo $this->lang->line('web_news_summary');?>:</td>
		<td><textarea name="summary" style="width: 95%; height: 120px;" maxlength="300"><?php echo $edit->summary;?></textarea><span class="inputText c2">1~300<?php echo $this->lang->line('inc_form_char');?></span></td>
	</tr>
	<tr>
		<td class="tright"><?php echo $this->lang->line('web_news_img');?>:</td>
		<td>
			<input type="text" name="img" value="<?php echo $edit->img;?>" class="input" style="width: 70%;" /><span class="inputText c2">Width：110px Height：75px</span>
		</td>
	</tr>
	<tr>
		<td class="tright"><?php echo $this->lang->line('web_news_ctime');?>:</td>
		<td>
			<input type="text" name="ctime" value="<?php echo $edit->ctime;?>" class="input" style="width: 130px;" />
		</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td>
			<input type="hidden" id="newsID" name="id" value="" />
			<input type="submit" id="newsSub" value="<?php echo $this->lang->line('inc_add');?>" />
		</td>
	</tr>
	</tbody>
	<tbody id="newsBody1" style="display: none;">
	<tr>
		<td colspan="2">
			<textarea id="tinymce" name="content"><?php echo $edit->content;?></textarea>
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
<?php
$path = "/upload/images/news/";
$url = array_filter(explode(',', $edit->upload));
$i = 0;
foreach ($url as $val){
	$i++;
?>
	<tr id="ImgCT_<?php echo $i;?>">
		<td><a href="<?php echo $path.$val;?>" id="ImgShow_<?php echo $i;?>" target="_black" title="<?php echo $this->lang->line('web_news_preview');?>"><img src="<?php echo $path.$val;?>" width="100" height="65" /></a></td>
		<td class="tleft">
			<form action="<?php echo base_url('web_news/upImgData/'.$i.'.html');?>" method="post" enctype="multipart/form-data" id="upIMG_<?php echo $i;?>">
			<div>
				<input type="file" name="upimg_<?php echo $i;?>" size="20" />
				<input type="submit" id="ImgSub" value="<?php echo $this->lang->line('inc_up');?>" />
				<input type="hidden" id="ImgInput_<?php echo $i;?>" name="img_url" value="<?php echo $val;?>" />
				<input type="hidden" name="id" value="<?php echo $edit->id;?>" />
			</div>
			</form>
			<div style="padding-top: 5px;"><?php echo $this->lang->line('web_news_url');?>：<span id="ImgURL_<?php echo $i;?>"><?php echo $path.$val;?></span></div>
		</td>
		<td><a href="" onclick="RemoveIMG('<?php echo $i;?>');return false;"><?php echo $this->lang->line('inc_remove');?></a></td>
	</tr>
<?php }?>
	</tbody>
	<tr>
		<td colspan="3">
			<a href="" onclick="AddIMG(); return false;"><?php echo $this->lang->line('web_news_addimg');?></a>
			<input type="hidden" id="NumIMG" value="<?php echo $i;?>" />
			<input type="hidden" id="ImgID" value="<?php echo $edit->id;?>" />
		</td>
	</tr>
	
</table>
</div>