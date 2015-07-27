$(function(){
	$.webmis.inc({files:[$webmis_plugin+'Validform.min.js']});
	$('#editSub').webmis('SubClass');
	//表单验证
	$("#configForm").Validform({
		ajaxPost:true,
		tiptype:2,
		callback:function(data){
			$.Hidemsg();
			if(data.status=="y"){
				$.webmis.win('close','sys_config.html');
			}else{
				$.webmis.win('close');
				$.webmis.win('open',{title:data.title,content:'<b class="red">'+data.msg+'</b>',AutoClose:3,AutoCloseText:data.text});
			}
		}
	});
});