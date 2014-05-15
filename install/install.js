$(function () {
	//服务条款
	$('#button1 input').click(function () {
		var val = $(this).prop("checked");
		if (val != true) {
			$(this).parent().parent().find('.an').hide();
		}else {
			$(this).parent().parent().find('.an').show();
		}
	});
});

/* 翻页 */
function Next(num) {
	/* 删除选项卡样式 */
	$('#tab span').each(function(){$(this).removeClass('tab');});
	/* 隐藏内容 */
	$('#install tbody').each(function(){$(this).hide();});
	/* 隐藏所有按钮 */
	$('#button span').each(function(){$(this).hide();});
	$('#tab'+num).addClass('tab');	//改变选项卡
	$('#install'+num).show();	//显示内容
	$('#button'+num).show();	//显示按钮
	
	/* 系统配置 */
	if (num == 3) {
		// 判断文件可读写
		$.get('index.php',{'api':'isWrite'},function (data) {
			$('#isWrite').html(data);
			//按钮
			if ($('#isWrite .err').length != 0) $('#button'+num+' a').eq(1).hide();
			else $('#button'+num+' a').eq(1).show();
			//用户名验证
			$('#Admin input').eq(0).keyup(function () {
				var uname = $(this).val();
				var reg = /[a-z0-9_]{3,16}/;
				//uname.length > 16 || uname.length < 3 || 
				if (!reg.test(uname)) {
					$('#Admin div').html('<span class="err"><em>&nbsp;</em>用户名为“a-z”、“0-9”、“_”字符组合，长度 3～16 个字符！</span>');
				}else {
					$('#Admin div').html('');
				}
			});
			//密码验证
			$('#Admin input').eq(1).keyup(function () {
				var passwd = $(this).val();
				var reg = /[a-z0-9_]{6,16}/;
				if (!reg.test(passwd)) {
					$('#Admin div').html('<span class="err"><em>&nbsp;</em>密码为“a-z”、“0-9”、“_”字符组合，长度 6～16 个字符！</span>');
				}else {
					$('#Admin div').html('');
				}
			});
			//确认密码
			$('#Admin input').eq(2).keyup(function () {
				var passwd1 = $('#Admin input').eq(1).val();
				var passwd2 = $(this).val();
				var reg = /[a-z0-9_]{6,16}/;
				if (passwd1 != passwd2) {
					$('#Admin div').html('<span class="err"><em>&nbsp;</em>密码不一致！</span>');
				}else if(!reg.test(passwd2)) {
					$('#Admin div').html('<span class="err"><em>&nbsp;</em>密码为“a-z”、“0-9”、“_”字符组合，长度 6～16 个字符！</span>');
				}else {
					$('#Admin div').html('<span class="suc"><em>&nbsp;</em>验证通过！</span>');
				}
			});
			//连接数据库
			$('#isDB').click(function () {
				var type = $('#dataBase select').val();
				var host = $('#dataBase input').eq(0).val();
				var uname = $('#dataBase input').eq(1).val();
				var passwd = $('#dataBase input').eq(2).val();
				var dbname = $('#dataBase input').eq(3).val();
				$.get('index.php',{'api':'isDB','type':type,'host':host,'uname':uname,'passwd':passwd,'dbname':dbname},function (data) {
					if (data) {
						$('#dataBase div').html('<span class="err"><em>&nbsp;</em>错误：'+data+'</span>');
					}else {
						$('#dataBase div').html('<span class="suc"><em>&nbsp;</em>连接数据库成功！</span>');
					}
				});
				//点击提交
				$('#config').unbind().click(function () {
					if ($('#Admin .suc').length != 1 || $('#dataBase .suc').length != 1) {
						alert('信息不完整！');
					}else {
						Next(4);
						var admin = $('#Admin input').eq(0).val();
						var adminPWD = $('#Admin input').eq(2).val();
						$.get('index.php',{'api':'config','type':type,'host':host,'uname':uname,'passwd':passwd,'dbname':dbname,'admin':admin,'adminPWD':adminPWD},function (data) {
							$('#istallInfo').html(data);
						});
					}
					return false;
				});
				return false;
			});
		});
	}
}