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
			<!-- 热门产品 -->
			<div class="box">
				<div class="box_top">
					<span class="title"><a href="#" ><h2>热门产品</h2></a></span>
					<span class="en">Pro</span>
				</div>
				<ul class="news_right_tu">
<?php foreach($pro['tu'] as $val){ ?>
					<li><a href="<?php echo base_url('pro/show/'.$val->id.'.html');?>" class="tu"><img src="<?php echo $val->img;?>" alt="" width="90" height="60" ></a></li>
<?php } ?>
				</ul>
				<ul class="news_right_list">
<?php foreach($pro['text'] as $val){ ?>
					<li><a href="<?php echo base_url('pro/show/'.$val->id.'.html');?>" title="<?php echo $val->title;?>" class="title"><?php echo sysSubStr($val->title,42,true);?></a></li>
<?php } ?>
				</ul>
			</div>
			<!-- 热门产品 END -->
		</div>
		<div class="right ct_l">
			<div class="box">
				<div class="box_top">
					<span class="title"><a href="<?php echo base_url('pro.html');?>" ><h2><?php echo $navName;?></h2></a></span>
					<span class="class"><?php echo $ctitle;?></span>
				</div>
				<ul class="pro_list">
<?php foreach($list as $val){?>
					<li>
						<a href="<?php echo base_url('pro/show/'.$val->id.'.html');?>" class="tu"><img src="<?php echo $val->img;?>" alt="<?php echo $val->title;?>" width="150" height="100" ></a>
						<div class="title"><a href="<?php echo base_url('pro/show/'.$val->id.'.html');?>" ><?php echo sysSubStr($val->title,26,true);?></a></div>
					</li>
<?php } ?>
				</ul>
				<div class="page"><div class="pagelist"><?php echo $page.'<span>'.$total.'</span>'; ?></div></div>
			</div>
		</div>
		</div>
	</div>
</div>