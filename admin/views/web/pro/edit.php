<form id="proForm" action="<?php echo base_url($this->config->config['index_url'].'web_pro/editData.html');?>" method="post">
<table class="table_add">
	<tbody id="proBody0">
	<tr>
		<td class="tright width">所属:</td>
		<td>
			<input type="text" id="menus_fid" name="fid" class="input" style="width: 60px;" value="<?php echo $edit->class;?>" />
			<span id="proClass">&nbsp;</span>
		</td>
	</tr>
	<tr>
		<td class="tright">标题:</td>
		<td>
			<input type="text" name="title" class="input" style="width: 70%;" datatype="*2-36" errormsg="标题至少2个字符,最多36个字符！" value="<?php echo $edit->title;?>" />
			<span class="Validform_checktip"></span>
		</td>
	</tr>
	<tr>
		<td class="tright">关键词:</td>
		<td>
			<input type="text" name="key" class="input" style="width: 70%;" value="<?php echo $edit->key;?>" />
			<span class="inputText c2">如：WebMIS,灵创网络,PHP</span>
		</td>
	</tr>
	<tr>
		<td class="tright">摘要:</td>
		<td><textarea name="summary" style="width: 95%; height: 180px;" maxlength="300"><?php echo $edit->summary;?></textarea><span class="inputText c2">1~300字符</span></td>
	</tr>
	<tr>
		<td class="tright">缩略图:</td>
		<td>
			<input type="text" name="img" class="input" style="width: 70%;" value="<?php echo $edit->img;?>" />
			<span class="inputText c2">宽：200px 高：160px</span>
		</td>
	</tr>
	<tr>
		<td class="tright">发布时间:</td>
		<td>
			<input type="text" name="ctime" class="input" style="width: 130px;" value="<?php echo $edit->ctime;?>" />
		</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td>
			<input type="hidden" id="proID" name="id" value="" />
			<input type="submit" id="proSub" value="编辑" />
		</td>
	</tr>
	</tbody>
	<tbody id="proBody1" style="display: none;">
	<tr>
		<td colspan="2">
			<textarea id="tinymce" name="content"><?php echo $edit->content;?></textarea>
		</td>
	</tr>
	</tbody>
</table>
</form>
<div style="padding: 0 10px;" id="proBody2" class="noDisplay">
<table class="table_list">
	<tr class="title">
		<td width="150">缩略图</td>
		<td>文件地址</td>
		<td width="60">操作</td>
	</tr>
	<tbody id="listBG">
<?php
$path = "/upload/images/pro/";
$url = array_filter(explode(',', $edit->upload));
$i = 0;
foreach ($url as $val){
	$i++;
?>
	<tr id="ImgCT_<?php echo $i;?>">
		<td><a href="<?php echo $path.$val;?>" id="ImgShow_<?php echo $i;?>" target="_black" title="点击查看"><img src="<?php echo $path.$val;?>" width="100" height="65" /></a></td>
		<td class="tleft">
			<form action="<?php echo base_url('web_pro/upImgData/'.$i.'.html');?>" method="post" enctype="multipart/form-data" id="upIMG_<?php echo $i;?>">
			<div>
				<input type="file" name="upimg_<?php echo $i;?>" size="20" />
				<input type="submit" id="ImgSub" value="上传" />
				<input type="hidden" id="ImgInput_<?php echo $i;?>" name="img_url" value="<?php echo $val;?>" />
				<input type="hidden" name="id" value="<?php echo $edit->id;?>" />
			</div>
			</form>
			<div style="padding-top: 5px;">图片地址：<span id="ImgURL_<?php echo $i;?>"><?php echo $path.$val;?></span></div>
		</td>
		<td><a href="" onclick="RemoveIMG('<?php echo $i;?>');return false;">删除</a></td>
	</tr>
<?php }?>
	</tbody>
	<tr>
		<td colspan="3">
			<a href="" onclick="AddIMG(); return false;">添加图片</a>
			<input type="hidden" id="NumIMG" value="<?php echo $i;?>" />
			<input type="hidden" id="ImgID" value="<?php echo $edit->id;?>" />
		</td>
	</tr>
	
</table>
</div>