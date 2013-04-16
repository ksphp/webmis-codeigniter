var $base_url = '';
$(function(){
	//网址
	$base_url = $('#base_url').text();
	//登录事项
	$('#adminLogin').hover(
		function () {
			$(this).attr('class','an2');
		},
		function () { 
			$(this).attr('class','an1');
		}
	).click(function(){
		var uname = $('#uname').val();
		var passwd = $('#passwd').val();
		if(uname.length < 1 || passwd.length < 1){
			$.WMisMsg({content:'<b class="red">帐号或密码为空！</b>',AutoClose:3});
			return false;
		}else{
			$.post($base_url+'index_c/login.html',{'uname':uname,'passwd':passwd},function(data){
				if(data == 1){
					$.WMisMsgClose('welcome.html');
				}else if(data == 2){
					$.WMisMsg({content:'<b class="red">该用户已被禁用！</b>',AutoClose:3});
				}else{
					$.WMisMsg({content:'<b class="red">帐号或密码有误！</b>',AutoClose:3});
				}
			});
		}
	});
});