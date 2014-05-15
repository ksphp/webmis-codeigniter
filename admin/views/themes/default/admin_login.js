$(function(){
	//版本信息
	$('#webmisVersion').webmisVersion();
	//登录框位置
	var autoSize = function(size){
		var top = $(window).height()/7;
		$('.login_body').css({'top':top});
	}
	autoSize();
	$(window).resize(function(){autoSize();});
	//登录
	var login = function(){
		var uname = $('#uname').val();
		var passwd = $('#passwd').val();
		var is_mobile = $('#is_mobile').text();
		if(uname.length < 1 || passwd.length < 1){
			$.webmis.win('open',{content:'<b class="red">帐号或密码为空！</b>',AutoClose:3});
			return false;
		}else{
			$.post($base_url+'index_c/login.html',{'uname':uname,'passwd':passwd,'is_mobile':is_mobile},function(data){
				if(data == 1){
					$.webmis.win('close','welcome.html');
				}else if(data == 2){
					$.webmis.win('open',{content:'<b class="red">该用户已被禁用！</b>',AutoClose:3});
				}else{
					$.webmis.win('open',{content:'<b class="red">帐号或密码有误！</b>',AutoClose:3});
				}
			});
		}
	}
	//回车触发
	$(document).keypress(function(e){if(e.which == 13){login();}});
	//点击按钮触发
	$('#adminLogin').click(login);
});