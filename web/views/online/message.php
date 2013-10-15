<div class="line">&nbsp;</div>
<div class="content">
	<div class="ct">
		<div class="display">
		<div class="left ct_r">
			<!-- 分类 -->
			<div class="box">
				<div class="box_top">
					<span class="title"><a href="#" ><h2>分类</h2></a></span>
					<span class="en">Class</span>
				</div>
				<ul class="news_class">
<?php foreach($class as $val){ ?>
					<li><a href="<?php echo base_url($val->url); ?>" ><?php echo $val->title; ?></a></li>
<?php } ?>
				</ul>
			</div>
			<!-- 分类 END -->
			<!-- 最新资讯 -->
			<div class="box">
				<div class="box_top">
					<span class="title"><a href="#" ><h2>最新资讯</h2></a></span>
					<span class="en">NEWS</span>
				</div>
				<ul class="news_right_tu">
<?php foreach($news['tu'] as $val){ ?>
					<li><a href="<?php echo base_url('news/show/'.$val->id.'.html');?>" class="tu"><img src="<?php echo $val->img;?>" alt="" width="90" height="60" ></a></li>
<?php } ?>
				</ul>
				<ul class="news_right_list">
<?php foreach($news['text'] as $val){ ?>
					<li><a href="<?php echo base_url('news/show/'.$val->id.'.html');?>" title="<?php echo $val->title;?>" class="title"><?php echo sysSubStr($val->title,42,true);?></a></li>
<?php } ?>
				</ul>
			</div>
			<!-- 最新资讯 END -->
		</div>
		<div class="right ct_l">
			<div class="box">
				<div class="box_top">
					<span class="title"><a href="<?php echo base_url('online.html');?>" ><h2><?php echo $navName;?></h2></a></span>
					<span class="class">在线留言</span>
				</div>
<?php foreach($list as $val){?>
				<div class="msgCT">
					<div class="msg_top">昵称：<b><?php echo $val->name;?></b></span><span class="right"><?php echo $val->ctime;?></span></div>
					<div><?php echo $val->content;?></div>
<?php if($val->reply) {?>
					<div class="msg_top"><span class="left">回复人：<b><?php echo $val->admin;?></b></span><span class="right"><?php echo $val->rtime;?></span></div>
					<div><?php echo $val->reply;?></div>
<?php } ?>
				</div>
<?php } ?>
				<div class="page"><div class="pagelist"><?php echo $page.'<span>'.$total.'</span>'; ?></div></div>
				<table class="msg_add">
					<tr>
						<td colspan="2"><div class="title"><b>发表留言</b>：<span id="msgBody" class="c999">发表自己的看法！</span></div></td>
					</tr>
					<tr>
						<td width="80" align="right">昵称( <span class="red">*</span> )：</td>
						<td><input type="text" id="msg_name" class="input" style="width: 200px;"></td>
					</tr>
					<tr>
						<td align="right">内容( <span class="red">*</span> )：</td>
						<td><textarea id="msg_content" style="width: 80%; height: 120px;" maxlength="300"></textarea></td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td><a href="#" id="msgADD" class="msg_an" >发表留言</a></td>
					</tr>
				</table>
			</div>
		</div>
		</div>
	</div>
</div>