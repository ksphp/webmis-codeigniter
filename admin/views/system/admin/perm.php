<style type="text/css">
.perm{width: 100%; line-height: 16px; padding: 5px 0;}
.perm a{font-size: 16px;}
.perm span{display: inline-block;}
.perm input{width: 15px; height: 15px;}
.perm .text{padding: 0 6px;}
.perm .text1{padding: 0 6px 0 10px;}
.perm .text2{padding: 0 6px 0 30px;}
.perm .text3{padding: 0 6px 0 50px;}
.perm .text4{padding: 0 6px 0 70px;}
.perm_action{background: #EFF4FA;}
.perm_an{width: 100%; padding: 20px 0; text-align: center;}
</style>
<?php
echo $menusHtml;
?>
<div class="perm_an">
	<input type="submit" id="editPerm" value="<?php echo $this->lang->line('inc_save');?>" />
</div>