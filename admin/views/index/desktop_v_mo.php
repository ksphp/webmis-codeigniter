<table class="action">
	<tr>
		<td class="title"><?php echo $Menus['Ctitle']; ?></td>
		<td>
			<ul class="action_ct">
				<?php echo $Menus['actionHtml']; ?>
			</ul>
		</td>
	</tr>
</table>
<div class="line">&nbsp;</div>
<!-- Content -->
<table class="table_list">
	<tr>
		<td colspan="2" class="title" style="font-weight: normal;" align="left">
			&nbsp;&nbsp;管理员：<?php echo @$_SESSION['AdminInfo']['uname']; ?>&nbsp;&nbsp;
			部门：<?php echo @$_SESSION['AdminInfo']['department']; ?>&nbsp;&nbsp;
			姓名：<?php echo @$_SESSION['AdminInfo']['name']; ?>
		</td>
	</tr>
	<tbody id="listBG1">
	<tr>
		<td colspan="2" align="left"><b>用户信息</b></td>
	</tr>
	<tr>
		<td width="70" align="right">IP地址:</td>
		<td><?php echo $user['ip']; ?></td>
	</tr>
	<tr>
		<td align="right">操作系统:</td>
		<td><?php echo $user['platform']; ?></td>
	</tr>
	<tr>
		<td align="right">浏览器:</td>
		<td><?php echo $user['browser']; ?></td>
	</tr>
	<tr>
		<td align="right">浏览器版本:</td>
		<td><?php echo $user['version']; ?></td>
	</tr>
	<tr>
		<td align="right">用户请求:</td>
		<td colspan="3" align="left"><?php echo $user['agent']; ?></td>
	</tr>
	</tbody>
	<tbody id="listBG2">
	<tr>
		<td colspan="2" align="left"><b>服务器信息</b></td>
	</tr>
	<tr>
		<td align="right">IP地址:</td>
		<td><?php echo $server['ip']; ?></td>
	</tr>
	<tr>
		<td align="right">服务器端口:</td>
		<td><?php echo $server['port']; ?></td>
	</tr>
	<tr>
		<td align="right">主机名:</td>
		<td><?php echo $server['name']; ?></td>
	</tr>
	<tr>
		<td align="right">后台地址:</td>
		<td><?php echo $server['admin']; ?></td>
	</tr>
	<tr>
		<td align="right">服务器软件:</td>
		<td><?php echo $server['soft']; ?></td>
	</tr>
	<tr>
		<td align="right">访问页面:</td>
		<td><?php echo $server['url']; ?></td>
	</tr>
	</tbody>
	<tbody id="listBG3">
	<tr>
		<td colspan="2" align="left"><b>数据库信息</b></td>
	</tr>
	<tr>
		<td align="right">配置文件:</td>
		<td colspan="3" align="left"><?php echo base_url('config/database.php'); ?></td>
	</tr>
	<tr>
		<td align="right">数据库类型:</td>
		<td><?php echo $db['dbdriver']; ?></td>
	</tr>
	<tr>
		<td align="right">主机名:</td>
		<td><?php echo $db['hostname']; ?></td>
	</tr>
	<tr>
		<td align="right">用户名:</td>
		<td><?php echo $db['username']; ?></td>
	</tr>
	<tr>
		<td align="right">数据库名:</td>
		<td><?php echo $db['database']; ?></td>
	</tr>
	<tr>
		<td align="right">表前缀:</td>
		<td><?php echo $db['dbprefix']; ?></td>
	</tr>
	<tr>
		<td align="right">编码:</td>
		<td><?php echo $db['char_set']; ?></td>
	</tr>
	</tbody>
</table>
<div class="right_line">&nbsp;</div>
<br>
<!-- Content End -->