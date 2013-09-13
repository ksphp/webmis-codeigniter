
<div class="bottom">
	<div class="ct">Bottom</div>
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