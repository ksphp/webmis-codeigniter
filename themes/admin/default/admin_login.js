$(function(){
	//版本信息
	$('#webmisVersion').webmisVersion();
	//登录框位置
	var autoSize = function(size){
		var top = $(window).height()/6;
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
				if(data.status == 'suc'){
					$.webmis.win('close','welcome.html');
				}else{
					$.webmis.win('open',{content:data.msg,AutoClose:3});
				}
			},'json');
		}
		return false;
	}
	//回车触发
	$(document).keypress(function(e){if(e.which == 13){login();}});
	//点击按钮触发
	$('#adminLogin').click(login);
});