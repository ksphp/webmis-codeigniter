
	<div id="base_url" style="display: none;"><?php echo base_url().$this->config->config['index_url']; ?></div>
	<script language="javascript" src="<?php echo base_url('../webmis/plugin/jquery/jquery-2.min.js'); ?>"></script>
	<script language="javascript" src="<?php echo base_url('../webmis/jquery.webmis.js'); ?>"></script>
	<script language="javascript" src="<?php echo base_url('../themes/m/'.$this->config->config['m_themes'].'/m.js');?>"></script>
<?php if(@$js){ foreach($js as $val){ ?>
	<script language="javascript" src="<?php echo base_url('../themes/m/'.$this->config->config['m_themes'].'/js/'.$val); ?>"></script>
<?php }}?>
<script>var _hmt = _hmt || [];(function() {var hm = document.createElement("script");hm.src = "//hm.baidu.com/hm.js?42c6e4ddf1d67ece9be84ce625cd398b";var s = document.getElementsByTagName("script")[0]; s.parentNode.insertBefore(hm, s);})();</script>
</body>
</html>