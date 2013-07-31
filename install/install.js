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
	
	/* 判断文件可读写 */
	if (num == 3) {
		$.get('index.php',{'api':'isWrite'},function (data) {
			$('#isWrite').html(data);
			//按钮
			if ($('#isWrite .err').length != 0) $('#button'+num+' a').eq(1).hide();
			else $('#button'+num+' a').eq(1).show();
			//创建管理员
			
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
				return false;
			});
		});
	}
}