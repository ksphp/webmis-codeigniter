<table class="ct_table">
	<tr>
		<td class="ct_table_left">
			<ul class="action">
				<li class="title"><?php echo $title; ?></li>
				<li class="action_ct"><?php echo $actionHtml; ?></li>
			</ul>
		</td>
		<td class="ct_table_right">
<!-- Content -->
<table class="table_list">
	<tr>
		<td colspan="4" class="title" style="font-weight: normal;" align="left">
			&nbsp;&nbsp;管理员：<?php echo $uinfo['uname']; ?>&nbsp;&nbsp;
			部门：<?php echo $uinfo['department']; ?>&nbsp;&nbsp;
			姓名：<?php echo $uinfo['name']; ?>
		</td>
	</tr>
	<tbody id="listBG1">
	<tr>
		<td colspan="4" align="left"><b>用户信息</b></td>
	</tr>
	<tr>
		<td width="100" align="right">IP地址:</td>
		<td><?php echo $user['ip']; ?></td>
		<td width="100" align="right">操作系统:</td>
		<td><?php echo $user['platform']; ?></td>
	</tr>
	<tr>
		<td align="right">浏览器:</td>
		<td><?php echo $user['browser']; ?></td>
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
		<td colspan="4" align="left"><b>服务器信息</b></td>
	</tr>
	<tr>
		<td align="right">IP地址:</td>
		<td><?php echo $server['ip']; ?></td>
		<td align="right">服务器端口:</td>
		<td><?php echo $server['port']; ?></td>
	</tr>
	<tr>
		<td align="right">主机名:</td>
		<td><?php echo $server['name']; ?></td>
		<td align="right">后台地址:</td>
		<td><?php echo $server['admin']; ?></td>
	</tr>
	<tr>
		<td align="right">服务器软件:</td>
		<td><?php echo $server['soft']; ?></td>
		<td align="right">访问页面:</td>
		<td><?php echo $server['url']; ?></td>
	</tr>
	</tbody>
	<tbody id="listBG3">
	<tr>
		<td colspan="4" align="left"><b>数据库信息</b></td>
	</tr>
	<tr>
		<td align="right">配置文件:</td>
		<td colspan="3" align="left"><?php echo base_url('app/config/database.php'); ?></td>
	</tr>
	<tr>
		<td align="right">数据库类型:</td>
		<td><?php echo $db['dbdriver']; ?></td>
		<td align="right">主机名:</td>
		<td><?php echo $db['hostname']; ?></td>
	</tr>
	<tr>
		<td align="right">用户名:</td>
		<td><?php echo $db['username']; ?></td>
		<td align="right">数据库名:</td>
		<td><?php echo $db['database']; ?></td>
	</tr>
	<tr>
		<td align="right">表前缀:</td>
		<td><?php echo $db['dbprefix']; ?></td>
		<td align="right">编码:</td>
		<td><?php echo $db['char_set']; ?></td>
	</tr>
	</tbody>
</table>
<br><br>
<!-- Content End -->
		</td>
	</tr>
</table>