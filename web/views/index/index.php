<!-- AD -->
<div class="ad_bg">
	<div class="ad_ct">
		<div id="slides">

			<div class="ad1">
				<div class="ad1_ct">
					<div class="ad1_text">
						<h2>最快速、最实用的PHP开发底层系统</h2>
						WEBMIS是免费开源PHP开发底层系统，基于CI的MVC模式开发的多用户、多权限解决方案，可以后台添加管理菜单，整合了Jquery，TinyMCE编辑器等插件、实现简洁、美观的弹框效果！
					</div>
					<div class="ad1_ct2">
						<div class="ad1_an"><a class="an1" target="_black" href="https://github.com/ksphp/webmis">&nbsp;</a>&nbsp;&nbsp;<a class="an2" target="_black" href="http://webmis.ksphp.com/admin">&nbsp;</a></div>
						<div class="ad1_admin">帐号：webmis  密码：ksphp.com</div>
						<div class="ad1_info">
							<span>发布日期: 2013-09-23</span>
							<span>版本信息: 4.0</span>
							<span>运行环境: PHP+MYSQL+Apache(Nginx)</span>
							<span>软件大小: 4.2M</span>
						</div>
					</div>
				</div>
			</div>
			
			<div class="ad2">
				<div class="ad2_ct">
					<div class="ad2_text">
						<div class="title">
							<h2>网站建设</h2><b>Website construction</b>
						</div>
						<p class="text">承接云南省各地州市网站建设制作、网站推广、网站SEO优化、网站维护、淘宝店铺装修、网站资料更新维护、网站营销、网站整体策划设计制作、企业邮局、画册设计等业务；<br>网站建设我们免费提供自主研发的WEBMIS信息资源管理系统，采用PHP的MVC开发模式整体构造优化、功能丰富、移植性强的特点。并且，贯穿整体网站优化的要求，能快速被搜索引擎收录。</p>
					</div>
					<div class="ad2_contact">联系人：杨先生&nbsp;&nbsp;电话：153681181712&nbsp;&nbsp;Email：admin@ksphp.com</div>
				</div>
			</div>
			
		</div>
	</div>
</div>
<div class="line">&nbsp;</div>
<div class="content">
	<div class="ct">
		<div class="display">
		<!-- 最新资讯 -->
			<div class="left in_news box">
				<div class="box_top">
					<span class="title"><a href="<?php echo base_url('news.html');?>" ><h2>最新资讯</h2></a></span>
					<span class="class">新闻资讯展示</span>
					<span class="more"><a href="<?php echo base_url('news.html');?>" title="更多" >More</a></span>
				</div>
				<ul class="in_news_one">
<?php foreach($news['tu'] as $val){ ?>
					<li class="tu"><a href="<?php echo base_url('news/show/'.$val->id.'.html');?>"><img src="<?php echo base_url($val->img);?>" alt="<?php echo $val->title;?>" title="<?php echo $val->title;?>" width="100" height="65" /></a></li>
					<li class="text">
						<a href="<?php echo base_url('news/show/'.$val->id.'.html');?>" title="<?php echo $val->title;?>" ><?php echo sysSubStr($val->title,18); ?></a><br>
						<?php echo sysSubStr($val->summary,120,true); ?> 
					</li>
<?php }?>
				</ul>
				<ul class="in_news_list">
<?php foreach($news['text'] as $val){?>
					<li><span class="title"><a href="<?php echo base_url('news/show/'.$val->id.'.html');?>" title="<?php echo $val->title;?>" ><?php echo sysSubStr($val->title,48,true);?></a></span><span class="time"><?php echo sysSubStr($val->ctime,10);?></span></li>
<?php }?>
				</ul>
			</div>
		<!-- 最新资讯 END -->
		<!-- 产品展示 -->
		<div class="left in_pro box">
			<div class="box_top">
				<span class="title"><a href="<?php echo base_url('pro.html');?>" ><h2>产品展示</h2></a></span>
				<span class="class">热卖商品展示！</span>
				<span class="more"><a href="<?php echo base_url('pro.html');?>" title="更多" >More</a></span>
			</div>
			<ul id="taobaoPro" class="in_pro_list">
<?php foreach($pro as $val){ ?>
				<li>
					<a href="<?php echo base_url('pro/show/'.$val->id.'.html');?>" class="tu" ><img src="<?php echo $val->img;?>" alt="<?php echo $val->title;?>" title="<?php echo $val->title;?>" width="110" height="80" ></a>
					<div class="text"><a href="<?php echo base_url('pro/show/'.$val->id.'.html');?>" ><?php echo sysSubStr($val->title,16,true);?></a></div>
				</li>
<?php }?>
			</ul>
		</div>
		<!-- 产品展示 END -->
		<!-- 在线留言 -->
		<div class="right in_msg box">
			<div class="box_top">
				<span class="title"><a href="<?php echo base_url('pro.html');?>" ><h2>在线留言</h2></a></span>
				<span class="class">发布留言！</span>
				<span class="more"><a href="<?php echo base_url('pro.html');?>" title="更多" >More</a></span>
			</div>
			<div id="inMsg" class="in_msg_ct">
				<ul class="JQ-slide-content">
					<li>留言内容1</li>
					<li>留言内容2</li>
					<li>留言内容3</li>
					<li>留言内容4</li>
					<li>留言内容5</li>
					<li>留言内容6</li>
					<li>留言内容7</li>
					<li>留言内容8</li>
				</ul>
			</div>
		</div>
		<!-- 在线留言 END -->
		</div>
	</div>
</div>