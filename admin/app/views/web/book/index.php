<!-- JS -->
<div id="getUrl" style="display: none;"><?php echo $get_url; ?></div>
<?php foreach($js as $val){ ?>
<script language="javascript" src="<?php echo base_url($val); ?>"></script>
<?php }?>
<!-- Action -->
<div class="right_top">
	<span class="right_action">
		<div class="right_title"><?php echo $title; ?></div>
		<?php echo $actionHtml; ?>
	</span>
</div>
<div class="right_line">&nbsp;</div>
<!-- Action End -->
<!-- Content -->
<table class="table_list">
	<tr class="title" id="book_table">
		<td width="20"><a href="#" onclick="All()">Y</a>/<a href="#" onclick="delAll()">N</a></td>
		<td width="40">ID</td>
		<td>标题</td>
		<td>留言内容</td>
		<td width="120">发布时间</td>
		<td width="100">回复人</td>
		<td width="120">回复时间</td>
	</tr>
	<tbody id="listBG">
	<?php foreach($list as $val){?>
	<tr>
		<td><input type="checkbox" value="<?php echo $val->id;?>" /></td>
		<td><?php echo $val->id;?></td>
		<td style="text-align: left;"><?php echo keyHH($val->title, @$key['title']);?></td>
		<td><a href="#" onclick="bookShow(<?php echo $val->id;?>);return false;"><?php echo sysSubStr($val->content,42,true);?></a></td>
		<td><?php echo keyHH($val->ctime, @$key['ctime']);?></td>
		<td><?php echo keyHH($val->admin, @$key['admin']);?></td>
		<td><?php echo keyHH($val->rtime, @$key['rtime']);?></td>
	</tr>
	<?php } ?>
	</tbody>
</table>
<div class="page"><div class="pagelist"><?php echo $page.'<span>'.$total.'</span>'; ?></div></div>
<!-- Content End -->