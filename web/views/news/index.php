<div class="line">&nbsp;</div>
<div class="content">
	<div class="ct">
		<div class="display">
		<div class="left ct_l">
			<div class="box">
				<div class="box_top">
					<span class="title"><a href="<?php echo base_url('news.html');?>" ><h2><?php echo $navName;?></h2></a></span>
					<span class="class"><?php echo $ctitle;?></span>
				</div>
				<ul class="news_list">
<?php foreach($list as $val){?>
					<li>
						<a href="<?php echo base_url('news/show/'.$val->id.'.html');?>" class="tu"><img src="<?php echo $val->img;?>" width="120" height="80" alt="<?php echo $val->title;?>" ></a>
						<div class="news_list_ct">
							<h3><a href="<?php echo base_url('news/show/'.$val->id.'.html');?>" ><?php echo $val->title;?></a></h3>
							<div class="other">发布时间：<?php echo $val->ctime;?>&nbsp;&nbsp;|&nbsp;&nbsp;来源：<?php echo $val->source;?>&nbsp;&nbsp;|&nbsp;&nbsp;作者：<?php echo $val->author;?>&nbsp;&nbsp;|&nbsp;&nbsp;浏览：<?php echo $val->click;?></div>
							<a href="<?php echo base_url('news/show/'.$val->id.'.html');?>"><?php echo sysSubStr($val->summary,300,true);?></a>
						</div>
					</li>
<?php } ?>
				</ul>
				<div class="page"><div class="pagelist"><?php echo $page.'<span>'.$total.'</span>'; ?></div></div>
			</div>
		</div>
		<div class="right ct_r">
			<!-- 热门浏览 -->
			<div class="box">
				<div class="box_top">
					<span class="title"><a href="#" ><h2>热门新闻</h2></a></span>
					<span class="en">HOT NEWS</span>
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
			<!-- 热门浏览 END -->
		</div>
		</div>
	</div>
</div>