
<div class="bottom">
	<div class="ct">
		<div class="link"><a href="<?php echo base_url('online/show/about.html');?>" >关于我们</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="<?php echo base_url('online/show/contact.html');?>" >联系方式</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="http://www.ksphp.com/document.html" target="_black">WebMIS文档</a></div>
		<div class="line">&nbsp;</div>
		<div class="bct">
			Copyright © ksphp.com 2012 - 2015 Tencent. All Rights Reserved<br>
			联系电话：153681181712&nbsp;&nbsp;Email:klingsoul@163.com<br>
		</div>
	</div>
</div>
<div id="base_url" style="display: none;"><?php echo base_url(); ?></div>
<div id="IsMobile" style="display: none;"><?php echo $IsMobile; ?></div>
<script language="javascript" src="<?php echo base_url('webmis/plugin/jquery/jquery-1.10.2.min.js'); ?>"></script>
<script language="javascript" src="<?php echo base_url('webmis/jquery.webmis.js'); ?>"></script>
<script language="javascript" src="<?php echo base_url('themes/default/web.js'); ?>"></script>
<?php if(@$js){ foreach($js as $val){ ?>
<script language="javascript" src="<?php echo base_url($val); ?>"></script>
<?php }}?>
</body>
</html>