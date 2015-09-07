
	</section>
</section>
<div id="base_url" style="display: none;"><?php echo base_url().$this->config->config['index_url']; ?></div>
<div id="Lang" style="display: none;"><?php echo $this->Lang; ?></div>
<div id="IsMobile" style="display: none;"><?php echo $this->IsMobile; ?></div>
<div id="DisplayTop" style="display: none;"><?php echo @$_SESSION['DisplayTop']; ?></div>
<div id="getUrl" style="display: none;"><?php echo @$get_url; ?></div>
<script language="javascript" src="<?php echo base_url('../themes/admin/'.$this->config->config['admin_themes'].'/admin.js'); ?>"></script>
<?php if(@$LoadJS){ foreach($LoadJS as $val){ ?>
<script language="javascript" src="<?php echo base_url('../themes/admin/js/'.$val); ?>"></script>
<?php }}?>
</body>
</html>