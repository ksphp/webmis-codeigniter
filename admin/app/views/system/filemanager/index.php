<!-- Action -->
<div class="right_top">
	<span class="right_action">
		<div class="right_title"><?php echo $title; ?></div>
		<?php echo $actionHtml; ?>
		 <span>|</span>
		 <a class="action_upload" href="#"><em class="UI">&nbsp;</em>上传</a>
		 <span>|</span>
		 <a class="action_addfolder" href="#"><em class="UI">&nbsp;</em>新建文件夹</a>
		 <span>|</span>
		 <a class="action_down" href="#"><em class="UI">&nbsp;</em>下载</a>
		 <span>|</span>
		 <a class="action_delfolder" href="#"><em class="UI">&nbsp;</em>删除</a>
		 <span>|</span>
		 <a class="action_file" href="#"><em class="UI">&nbsp;</em>文件</a>
	</span>
</div>
<div class="right_line">&nbsp;</div>
<!-- Action End -->
<!-- Content -->
<table class="table_list">
	<tr>
		<td colspan="6" align="left">
			<span>当前位置：</span>
			<span id="fileUrl">/upload/</span>
			<span>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="#" >返回上级</a></span>
		</td>
	</tr>
	<tr class="title" id="table">
		<td width="20"><a href="#" id="checkboxY">√</a><a href="#" id="checkboxN">×</a></td>
		<td>名称</td>
		<td width="120">创建时间</td>
		<td width="120">修改时间</td>
		<td width="80">大小</td>
		<td width="40">权限</td>
	</tr>
	<tbody id="listBG">
	</tbody>
</table>
<!-- Content End -->