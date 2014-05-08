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
					<li><a href="<?php echo base_url($this->config->config['index_url'].$val->url); ?>" ><?php echo $val->title; ?></a></li>
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
					<li><a href="<?php echo base_url($this->config->config['index_url'].'news/show/'.$val->id.'.html');?>" class="tu"><img src="<?php echo $val->img;?>" alt="" width="90" height="60" ></a></li>
<?php } ?>
				</ul>
				<ul class="news_right_list">
<?php foreach($news['text'] as $val){ ?>
					<li><a href="<?php echo base_url($this->config->config['index_url'].'news/show/'.$val->id.'.html');?>" title="<?php echo $val->title;?>" class="title"><?php echo sysSubStr($val->title,42,true);?></a></li>
<?php } ?>
				</ul>
			</div>
			<!-- 最新资讯 END -->
		</div>
		<div class="right ct_l">
			<div class="box">
				<div class="box_top">
					<span class="title"><a href="<?php echo base_url($this->config->config['index_url'].'online.html');?>" ><h2><?php echo $navName;?></h2></a></span>
					<span class="class"><?php echo $ctitle;?></span>
				</div>
				<div class="html_ct"><?php echo $show->content; ?></div>
			</div>
		</div>
		</div>
	</div>
</div>