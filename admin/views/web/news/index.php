<table class="action">
	<tr>
		<td class="title"><?php echo $Menus['Ctitle']; ?></td>
		<td>
			<ul class="action_ct">
				<?php echo $Menus['actionHtml']; ?>
			</ul>
		</td>
	</tr>
</table>
<div class="line">&nbsp;</div>
<!-- Content -->
<table class="table_list">
	<tr class="title" id="news_table">
		<td width="20"><a href="#" id="checkboxY"></a><a href="#" id="checkboxN"></a></td>
		<td>ID</td>
		<td><?php echo $this->lang->line('web_news_title');?></td>
		<td><?php echo $this->lang->line('web_news_class');?></td>
		<td><?php echo $this->lang->line('web_news_source');?></td>
		<td><?php echo $this->lang->line('web_news_author');?></td>
		<td width="120"><?php echo $this->lang->line('web_news_ctime');?></td>
		<td><?php echo $this->lang->line('web_news_click');?></td>
		<td width="40"><?php echo $this->lang->line('web_news_state');?></td>
	</tr>
	<tbody id="listBG">
	<?php foreach($list as $val){?>
	<tr>
		<td><input type="checkbox" value="<?php echo $val->id;?>" /></td>
		<td><?php echo $val->id;?></td>
		<td class="tleft">
			<a href="#" onclick="newsShow(<?php echo $val->id;?>,'<?php echo $this->lang->line('web_news_view');?>');return false;" style="font-weight: bold;"><?php echo keyHH($val->title, @$key['title']);?></a><?php echo $val->img?'<span class="c666">[图]</span>':'';?>
		</td>
		<td class="tleft">
			<?php
			$arr = array_filter(explode(':', $val->class));
			foreach($arr as $val1){
				echo $class[$val1].'('.$val1.') > ';
			}
			?>
		</td>
		<td><?php echo keyHH($val->source, @$key['source']);?></td>
		<td><?php echo keyHH($val->author, @$key['author']);?></td>
		<td><?php echo keyHH($val->ctime, @$key['ctime']);?></td>
		<td><?php echo $val->click;?></td>
		<td><?php echo $adminState[$val->state];?></td>
	</tr>
	<?php } ?>
	</tbody>
</table>
<div class="page"><div class="pagelist"><?php echo $page.'<span>'.$total.'</span>'; ?></div></div>
<!-- Content End -->