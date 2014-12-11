
	</section>
</section>
<div id="base_url" style="display: none;"><?php echo base_url().$this->config->config['index_url']; ?></div>
<div id="IsMobile" style="display: none;"><?php echo $this->IsMobile; ?></div>
<div id="DisplayTop" style="display: none;"><?php echo @$_SESSION['DisplayTop']; ?></div>
<div id="getUrl" style="display: none;"><?php echo @$get_url; ?></div>
<script language="javascript" src="<?php echo base_url('../webmis/plugin/jquery/'.$this->config->config['jquery']); ?>"></script>
<script language="javascript" src="<?php echo base_url('../webmis/jquery.webmis.js'); ?>"></script>
<script language="javascript" src="<?php echo base_url('../themes/admin/'.$this->config->config['admin_themes'].'/admin.js'); ?>"></script>
<?php if(@$js){ foreach($js as $val){ ?>
<script language="javascript" src="<?php echo base_url('../themes/admin/js/'.$val); ?>"></script>
<?php }}?>
</body>
</html>