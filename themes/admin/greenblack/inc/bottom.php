
	</section>
</section>
<div id="base_url" style="display: none;"><?php echo base_url().$this->config->config['index_url']; ?></div>
<div id="IsMobile" style="display: none;"><?php echo $this->IsMobile; ?></div>
<div id="DisplayTop" style="display: none;"><?php echo @$_SESSION['DisplayTop']; ?></div>
<div id="getUrl" style="display: none;"><?php echo @$get_url; ?></div>
<script language="javascript" src="<?php echo base_url('../webmis/plugin/jquery/jquery-2.min.js'); ?>"></script>
<!--[if lte IE 9]>
<script language="javascript" src="<?php echo base_url('../webmis/plugin/jquery/jquery-1.min.js'); ?>"></script>
<script src="<?php echo base_url('../webmis/plugin/html5.js'); ?>" type="text/javascript"></script>
<link href="<?php echo base_url('../themes/admin/'.$this->config->config['admin_themes'].'/ie.css'); ?>" rel="stylesheet" type="text/css" />
<[endif] -->
<script language="javascript" src="<?php echo base_url('../webmis/jquery.webmis.js'); ?>"></script>
<script language="javascript" src="<?php echo base_url('../themes/admin/'.$this->config->config['admin_themes'].'/admin.js'); ?>"></script>
<?php if(@$js){ foreach($js as $val){ ?>
<script language="javascript" src="<?php echo base_url('../themes/admin/js/'.$val); ?>"></script>
<?php }}?>
<script>var _hmt = _hmt || [];(function() {var hm = document.createElement("script");hm.src = "//hm.baidu.com/hm.js?42c6e4ddf1d67ece9be84ce625cd398b";var s = document.getElementsByTagName("script")[0]; s.parentNode.insertBefore(hm, s);})();</script>
</body>
</html>