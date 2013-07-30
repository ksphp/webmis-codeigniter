<?php
	$api = $_GET['api'];
	/* 判断文件读写 */
	if($api == 'isWrite') {
		$class = is_writable('../admin/app/config/database.php')?'suc':'err';
		echo '<div class="'.$class.'"><em>&nbsp;</em>admin/app/config/database.php&nbsp;&nbsp;#后台数据库配置文件</div>';
		$class = is_writable('../web/config/database.php')?'suc':'err';
		echo '<div class="'.$class.'"><em>&nbsp;</em>web/config/database.php&nbsp;&nbsp;#网站数据库配置文件</div>';
		$class = is_writable('webmis.sql')?'suc':'err';
		echo '<div class="'.$class.'"><em>&nbsp;</em>install/webmis.sql&nbsp;&nbsp;#数据库文件</div>';
		$class = is_writable('../upload')?'suc':'err';
		echo '<div class="'.$class.'"><em>&nbsp;</em>upload&nbsp;&nbsp;#文件上传目录</div>';
	}
?>