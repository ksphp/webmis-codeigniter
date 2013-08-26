
</div>
<div class="copy"><?php echo $config['copy'];?></div>
<script language="javascript" src="<?php echo base_url('../webmis/plugin/jquery/jquery-1.10.2.min.js');?>"></script>
<script language="javascript" src="<?php echo base_url('../webmis/plugin/Validform_v5.3.2_min.js');?>"></script>
<script language="javascript" src="<?php echo base_url('../webmis/js/webmis_mo.js');?>"></script>
<script language="javascript" src="<?php echo base_url('../webmis/js/admin_mo.js');?>"></script>
<?php if(@$js){ foreach($js as $val){ ?>
<script language="javascript" src="<?php echo base_url($val); ?>"></script>
<?php }}?>
</body>
</html>