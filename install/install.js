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
		$.get('data.php',{'api':'isWrite'},function (data) {
			$('#isWrite').html(data);
			//测试数据库
			$('#dataBaseTest').click(function () {
				var uname = $('#dataBase input').eq(0).val();
				var passwd = $('#dataBase input').eq(1).val();
				alert(uname+passwd);
				return false;
			});
			//按钮
			if ($('#isWrite .err').length != 0) {
				$('#button'+num+' a').eq(1).hide();
			}else {
				$('#button'+num+' a').eq(1).show();
			}
		});
	}
}