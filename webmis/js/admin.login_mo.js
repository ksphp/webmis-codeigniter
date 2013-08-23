$(function(){
	var doch = $(document).height();
	var bodyh = $('body').height();
	var mtop = (doch-bodyh)/2;
	$('.login_body').css({'margin-top':mtop});
	//登录
	$('#adminLogin').click(function(){
		var uname = $('#uname').val();
		var passwd = $('#passwd').val();
		alert('点击登录');
		return false;
	});
});