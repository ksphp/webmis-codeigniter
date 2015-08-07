
	<div class="web_copy">
		Copyright © <a href="http://webmis.ksphp.com/admin" id="webmisVersion">ksphp.com</a> Tencent. All Rights Reserved
	</div>
	<div id="base_url" style="display: none;"><?php echo base_url().$this->config->config['index_url']; ?></div>
	<script language="javascript" src="<?php echo base_url('themes/web/'.$this->config->config['web_themes'].'/web.js');?>"></script>
<?php if(@$js){ foreach($js as $val){ ?>
	<script language="javascript" src="<?php echo base_url('themes/web/'.$this->config->config['web_themes'].'/js/'.$val); ?>"></script>
<?php }}?>
</body>
</html>