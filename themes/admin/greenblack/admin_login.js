$(function(){
	// Version
	$('#webmisVersion').webmisVersion();
	// Lang
	$('#Lang').hover(function(){
		$(this).find('ul').show();
	},function(){
		$(this).find('ul').hide();
	});
	// Login Position
	var autoSize = function(size){
		var top = $(window).height()/5;
		$('.login_body').css({'top':top});
	}
	autoSize();
	$(window).resize(function(){autoSize();});
	// Login
	var login = function(){
		var uname = $('#uname').val();
		var passwd = $('#passwd').val();
		var is_mobile = $('#is_mobile').text();
		if(uname.length < 1 || passwd.length < 1){
			$.get($base_url+'home/getLang/msg',{msg_title:'',msg_isNull:'',msg_auto_close:''},function (data){
				$.webmis.win('open',{title:data.msg_title, content:'<b class="red">'+data.msg_isNull+'</b>',AutoClose:3,AutoCloseText:data.msg_auto_close});
			},'json');
			return false;
		}else{
			$.post($base_url+'home/login.html',{'uname':uname,'passwd':passwd,'is_mobile':is_mobile},function(data){
				if(data.status == 'suc'){
					$.webmis.win('close','welcome.html');
				}else{
					$.webmis.win('open',{title:data.title,content:data.msg,AutoClose:3,AutoCloseText:data.text});
				}
			},'json');
			return false;
		}
	}
	// Enter
	$(document).keypress(function(e){if(e.which == 13){login();}});
	// Click
	$('#adminLogin').click(login);
});