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
	/* 是否可以连接数据库 */
	}elseif($api == 'isDB') {
		try {
			$dsn = $_GET['type'].':dbname='.$_GET['dbname'].';host='.$_GET['host'];
			$uname = $_GET['uname'];
			$passwd = $_GET['passwd'];
			$db = new PDO($dsn,$uname,$passwd);
		}catch (PDOException $e) {
		   echo $e->getMessage();
		   exit;
		}
	}elseif($api == 'config') {
		try {
			$type = $_GET['type'];
			$host = $_GET['host'];
			$uname = $_GET['uname'];
			$passwd = $_GET['passwd'];
			$dbname = $_GET['dbname'];
			$admin = $_GET['admin'];
			$adminPWD = md5($_GET['adminPWD']);
			$db = new PDO($type.':dbname='.$dbname.';host='.$host,$uname,$passwd);
			$db->query('set names utf8;');
			echo '<p class="suc"><em>&nbsp;</em>连接数据库成功！</p>';
			
			/* 导入数据库文件 */
			$content = file_get_contents('webmis.sql');
			if(!$content) {
				echo '<p class="err"><em>&nbsp;</em>打开失败：webmis.sql</p>';
			}else {
				echo '<p class="suc"><em>&nbsp;</em>打开成功：webmis.sql</p>';
				$content = preg_replace("/#(.*)/i","",$content);
				$content = preg_replace("/'admin'/","'".$admin."'",$content);
				$content = preg_replace("/'21232f297a57a5a743894a0e4a801fc3'/","'".$adminPWD."'",$content);
				echo '<p class="suc"><em>&nbsp;</em>写入管理员信息！</p>';
				$data = '<p class="suc"><em>&nbsp;</em>数据导入成功！</p>';
				/* 导入数据 */
				$sqls = array_filter(explode(";\n",$content));
				foreach($sqls as $sql){
					$sql = trim($sql);
					if($sql) {
						if(!$db->query($sql)) {
							$err = $db->errorInfo();
							$data = '<p class="err"><em>&nbsp;</em>数据导入失败：<br>'.$err[2].'</p>';
							break;
						}
					}
				}
				echo $data;
			}

			/* CI数据库配置文件 */
			$file1 = '../admin/app/config/database.php';
			$file2 = '../web/config/database.php';
			$ct1 = file_get_contents($file1);
			$ct2 = file_get_contents($file2);
			if(!$ct1) {
				echo '<p class="err"><em>&nbsp;</em>打开失败：<br>'.$file1.'</p>';
			}elseif(!$ct2) {
				echo '<p class="err"><em>&nbsp;</em>打开失败：<br>'.$file2.'</p>';
			}else {
				echo '<p class="suc"><em>&nbsp;</em>打开成功：CI数据库配置文件</p>';
				$pat = "/\['hostname'\] = '(.*)'/";
				$rep = "['hostname'] = '".$host."'";
				$ct1 = preg_replace($pat,$rep,$ct1);
				echo '<p class="suc"><em>&nbsp;</em>配置：修改主机名</p>';
				$pat = "/\['username'\] = '(.*)'/";
				$rep = "['username'] = '".$uname."'";
				$ct1 = preg_replace($pat,$rep,$ct1);
				echo '<p class="suc"><em>&nbsp;</em>配置：修改用户名</p>';
				$pat = "/\['password'\] = '(.*)'/";
				$rep = "['password'] = '".$passwd."'";
				$ct1 = preg_replace($pat,$rep,$ct1);
				echo '<p class="suc"><em>&nbsp;</em>配置：修改密码</p>';
				$pat = "/\['database'\] = '(.*)'/";
				$rep = "['database'] = '".$dbname."'";
				$ct1 = preg_replace($pat,$rep,$ct1);
				echo '<p class="suc"><em>&nbsp;</em>配置：数据库名</p>';
				$pat = "/\['dbdriver'\] = '(.*)'/";
				$rep = "['dbdriver'] = '".$type."'";
				$ct1 = preg_replace($pat,$rep,$ct1);
				echo '<p class="suc"><em>&nbsp;</em>配置：'.$type.'</p>';
				/* 写入后台配置文件 */
				$fp=fopen($file1,'w');
				if(fwrite($fp,$ct1)){
					echo '<p class="suc"><em>&nbsp;</em>写入成功：'.$file1.'</p>';
				}else {
					echo '<p class="err"><em>&nbsp;</em>写入失败：'.$file1.'</p>';
				};
				fclose($fp);
				/* 写入前台配置文件 */
				$fp=fopen($file2,'w');
				if(fwrite($fp,$ct1)){
					echo '<p class="suc"><em>&nbsp;</em>写入成功：'.$file2.'</p>';
				}else {
					echo '<p class="err"><em>&nbsp;</em>写入失败：'.$file2.'</p>';
				};
				fclose($fp);
				echo '<p class="suc"><em>&nbsp;</em>完成<br></p>';
				echo '<p class="c666">注意：<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1、安装完成后，请删除“install”目录；<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2、为了安全考虑，请修改登录接口“admin”，同时配置目录下的“.htaccess”文件；</p>';
			}
		
		}catch (PDOException $e) {
			echo '<p class="err"><em>&nbsp;</em>连接数据库失败：'.$e->getMessage().'</p>';
		   exit;
		}
	}else {
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="author" content="kingsoul" />
	<title><?php echo $config['title'];?></title>
	<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
	<link href="install.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div class="body">
	<div class="top">
		<div class="top_logo">&nbsp;</div>
		<span class="top_link">
			<a href="http://www.ksphp.com" target="_black" >官方网站</a>&nbsp;&nbsp;|&nbsp;&nbsp;
			<a href="http://www.ksphp.com/document.html" target="_black" >WebMIS文档</a>&nbsp;&nbsp;|&nbsp;&nbsp;
			<a href="http://www.ksphp.com/helps.html" target="_black" >帮助</a>
		</span>
	</div>
	<div class="ct">
		<div id="tab" class="ct_top"><span id="tab1" class="tab">服务条款</span>&nbsp;>&nbsp;<span id="tab2">环境安装</span>&nbsp;>&nbsp;<span id="tab3">系统配置</span>&nbsp;>&nbsp;<span id="tab4">完成</span></div>
		<!-- 安装说明 -->
		<div class="ct_ct">
			<div class="ct_ct_body">
			<table id="install">
				<tbody id="install1">
				<tr>
					<td class="logo">&nbsp;</td>
					<td>WebMIS-快速、实用、免费开源的PHP开发底层系统。基于CI的MVC模式开发的多用户、多权限解决方案，整合了Jquery、TinyMCE编辑器等插件、简洁美观的弹框效果；</td>
				</tr>
				<tr>
					<td colspan="2">
						<div class="code in_term"><?php echo file_get_contents('GPL.txt');?></div>
					</td>
				</tr>
				</tbody>
				<tbody id="install2" style="display: none;">
				<tr>
					<td colspan="2"><b>服务器环境配置：</b>必须开启重写</td>
				</tr>
				<tr>
					<td colspan="2">
						<div class="left in_conf code">
							<b>[ Apache ]</b><br>
							开启重写<br><br>
							方法一：<br>
							[...]<br>
							&nbsp;&nbsp;&nbsp;&nbsp;AllowOverride All  #开启重写<br>
							&nbsp;&nbsp;&nbsp;&nbsp;Options Indexes FollowSymLinks  #浏览目录<br>
							[...]
							方法二：<br>
							> a2enmod rewrite<br><br>
							然后配置“/”和“amin”下的 .htaccess 文件 <br>
						</div>
						<div class="right in_conf code">
							<b>[ Nginx ]</b><br>
							去除index.php<br><br>
							location / {<br>
							&nbsp;&nbsp;&nbsp;&nbsp;#Hide index.php<br>
							&nbsp;&nbsp;&nbsp;&nbsp;if (!-e $request_filename) {<br>
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;rewrite ^/(.*) /index.php last;<br>
							&nbsp;&nbsp;&nbsp;&nbsp;}<br>
							}<br>
							location /admin/ {<br>
							&nbsp;&nbsp;&nbsp;&nbsp;#Hide index.php<br>
							&nbsp;&nbsp;&nbsp;&nbsp;if (!-e $request_filename) {<br>
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;rewrite ^/admin/(.*) /admin/index.php last;<br>
							&nbsp;&nbsp;&nbsp;&nbsp;}<br>
							}<br>
						</div>
					</td>
				</tr>
				</tbody>
				<tbody id="install3" style="display: none;">
				<tr>
					<td colspan="2"><b>文件是否可写：</b></td>
				</tr>
				<tr>
					<td colspan="2" id="isWrite" class="code">&nbsp;</td>
				</tr>
				<tr>
					<td colspan="2"><b>数据库配置：</b>&nbsp;&nbsp;&nbsp;&nbsp;1、采用PHP的PDO类；&nbsp;&nbsp;&nbsp;&nbsp;2、创建数据库，编码“UTF-8”</td>
				</tr>
				<tr>
					<td colspan="2" id="dataBase" class="code">
						<div><span class="err"><em>&nbsp;</em>请填写数据库信息，并点击“连接”！</span></div>
						<p>类&nbsp;&nbsp;&nbsp;&nbsp;型：&nbsp;&nbsp; 
						<select style="width: 110px;">
							<option value="mysql" >MySQL</option>
							<option value="mssql" >SQL Server</option>
						</select> &nbsp;&nbsp;
						主机：&nbsp;&nbsp; <input type="text" class="input" style="width: 160px;" value="localhost">&nbsp;&nbsp;</p>
						<p>用户名：&nbsp;&nbsp; <input type="text" class="input" style="width: 100px;" value="root">&nbsp;&nbsp;
						密码：&nbsp;&nbsp; <input type="password" class="input" style="width: 160px;">&nbsp;&nbsp;</p>
						<p>数据库：&nbsp;&nbsp; <input type="text" class="input" style="width: 100px;" value="webmis"></p>
						<p><a href="#" id="isDB" class="an" style="margin-left: 60px;">连接</a></p>
					</td>
				</tr>
				<tr>
					<td colspan="2"><b>系统管理员：</b></td>
				</tr>
				<tr>
					<td colspan="2" id="Admin" class="code">
						<div><span class="err"><em>&nbsp;</em>请填写管理员信息！</span></div>
						<p>用户名：&nbsp;&nbsp; <input type="text" class="input" style="width: 100px;" value="admin" maxlength="16"></p>
						<p>密&nbsp;&nbsp;&nbsp;&nbsp;码：&nbsp;&nbsp; <input type="password" class="input" style="width: 160px;" maxlength="16">&nbsp;&nbsp;
						确认：&nbsp;&nbsp; <input type="password" class="input" style="width: 160px;" maxlength="16"></p>
					</td>
				</tr>
				</tbody>
				<tbody id="install4" style="display: none;">
					<tr>
					<td colspan="2" id="istallInfo"><p class="load"><em>&nbsp;</em>正在安装...</p></td>
				</tr>
				</tbody>
			</table>
			</div>
		</div>
		<!-- 安装说明 End -->
		<div id="button" class="ct_bt">
			<font class="ct_bt_msg">提示：如果看不出“圆角框”，请升级或更换浏览器！</font>
			<span id="button1" class="ct_bt_an" style="display: block;">
				<label><input type="checkbox" />&nbsp;&nbsp;同意服务条款</label>&nbsp;&nbsp;
				<a href="#" class="an" onclick="Next(2);return false;" style="display: none;">下一步</a>
			</span>
			<span id="button2" class="ct_bt_an">
				<a href="#" class="an" onclick="Next(1);return false;">上一步</a>&nbsp;&nbsp;<a href="#" class="an" onclick="Next(3);return false;">下一步</a>
			</span>
			<span id="button3" class="ct_bt_an">
				<a href="#" class="an" onclick="Next(2);return false;">上一步</a>&nbsp;&nbsp;<a href="#" id="config" class="an" onclick="return false;">下一步</a>
			</span>
			<span id="button4" class="ct_bt_an">
				<a href="../" class="an">完成</a>
			</span>
		</div>
	</div>
	<div class="copy">Built by KSPHP and the <b><a href="http://www.ksphp.com" >KSPHP.COM</a></b> community</div>
</div>
<script language="javascript" src="../webmis/plugin/jquery/jquery-1.10.2.min.js"></script>
<script language="javascript" src="install.js"></script>
</body>
</html>
<?php }?>