$(function(){
	$.webmis.inc({files:[$webmis_plugin+'form/Validform.min.js']});
	$('#changeSub').webmis('SubClass');
	// Form validation
	$("#changePWdForm").Validform({
		ajaxPost:true,
		tiptype:2,
		callback:function(data){
			$.Hidemsg();
			if(data.status=="y"){
				$.webmis.win('open',{title:data.title,content:'<b class="green">'+data.msg+'</b>',target:'home/loginOut.html',AutoClose:3,AutoCloseText:data.text});
			}else{
				$.webmis.win('open',{title:data.title,content:'<b class="red">'+data.msg+'</b>',AutoClose:3,AutoCloseText:data.text});
			}
		}
	});
});
