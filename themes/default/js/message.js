$(function(){
	$('#msgADD').click(function () {
		var name = $('#msg_name').val();
		var content = $('#msg_content').val();
		if (!name) {
			$('#msgBody').html('“昵称”不能为空！');
		}else if (!content) {
			$('#msgBody').html('“内容”不能为空！');
		}else {
			$.post($base_url+'online/messageAdd.html',{'name':name,'content':content},function (data) {
				if (data) {
					window.location.href = $base_url+'online/message.html';
				}else {
					alert('发表留言失败！');
				}
			});
		}
		return false;
	});
});