<div class="line">&nbsp;</div>
<div class="content">
	<div class="ct">
		<div class="display">
		<div class="left ct_l">
			<div class="box">
				<div class="box_top">
					<span class="title">当前位置：</span>
					<span class="class"><a href="<?php echo base_url('news.html');?>" ><?php echo $navName;?></a>&nbsp;&nbsp;>&nbsp;&nbsp;详细信息</span>
				</div>
				<div class="show_ct">
					<div class="body">
						<div class="title"><h2><?php echo $show->title;?></h2></div>
						<div class="other">发布时间：<?php echo $show->ctime;?>&nbsp;&nbsp;来源：<?php echo $show->source;?>&nbsp;&nbsp;作者：<?php echo $show->author;?>&nbsp;&nbsp;浏览：<?php echo $show->click;?></div>
						<div class="summary"><?php echo $show->summary;?></div>
						<div class="sct"><?php echo $show->content;?></div>
						<div class="show_key">关键词：<?php echo $show->key;?></div>
					</div>
				</div>
			</div>
		</div>
		<div class="right ct_r">
			<!-- 最新资讯 -->
			<div class="box">
				<div class="box_top">
					<span class="title"><a href="#" ><h2>最新资讯</h2></a></span>
					<span class="en">NEWS</span>
				</div>
				<ul class="news_right_tu">
<?php foreach($news1['tu'] as $val){ ?>
					<li><a href="<?php echo base_url('news/show/'.$val->id.'.html');?>" class="tu"><img src="<?php echo $val->img;?>" alt="" width="90" height="60" ></a></li>
<?php } ?>
				</ul>
				<ul class="news_right_list">
<?php foreach($news1['text'] as $val){ ?>
					<li><a href="<?php echo base_url('news/show/'.$val->id.'.html');?>" title="<?php echo $val->title;?>" class="title"><?php echo sysSubStr($val->title,42,true);?></a></li>
<?php } ?>
				</ul>
			</div>
			<!-- 最新资讯 END -->
			<!-- 热门浏览 -->
			<div class="box">
				<div class="box_top">
					<span class="title"><a href="#" ><h2>热门新闻</h2></a></span>
					<span class="en">HOT NEWS</span>
				</div>
				<ul class="news_right_tu">
<?php foreach($news2['tu'] as $val){ ?>
					<li><a href="<?php echo base_url('news/show/'.$val->id.'.html');?>" class="tu"><img src="<?php echo $val->img;?>" alt="" width="90" height="60" ></a></li>
<?php } ?>
				</ul>
				<ul class="news_right_list">
<?php foreach($news2['text'] as $val){ ?>
					<li><a href="<?php echo base_url('news/show/'.$val->id.'.html');?>" title="<?php echo $val->title;?>" class="title"><?php echo sysSubStr($val->title,42,true);?></a></li>
<?php } ?>
				</ul>
			</div>
			<!-- 热门浏览 END -->
		</div>
		</div>
	</div>
</div>