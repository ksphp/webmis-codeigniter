
</section>
<footer class="copy">Copyright © <?php echo $this->config->config['copy'];?></footer>
<div id="base_url" style="display: none;"><?php echo base_url().$this->config->config['index_url']; ?></div>
<div id="IsMobile" style="display: none;"><?php echo $this->IsMobile; ?></div>
<div id="getUrl" style="display: none;"><?php echo @$get_url; ?></div>
<div id="NavId" style="display: none;"><?php echo $this->Fid2; ?></div>
<script language="javascript" src="<?php echo base_url('../webmis/plugin/jquery/'.$this->config->config['jquery']); ?>"></script>
<script language="javascript" src="<?php echo base_url('../webmis/jquery.webmis.js'); ?>"></script>
<script language="javascript" src="<?php echo base_url('../themes/admin/'.$this->config->config['admin_themes'].'/admin.mo.js'); ?>"></script>
<?php if(@$js){ foreach($js as $val){ ?>
<script language="javascript" src="<?php echo base_url('../themes/admin/js/'.$val); ?>"></script>
<?php }}?>
</body>
</html>