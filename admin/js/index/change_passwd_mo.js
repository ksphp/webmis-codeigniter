$(function(){
	$.webmis.inc({files:[$webmis_plugin+'Validform.min.js']});
	$('#changeSub').webmis('SubClass'); //按钮样式
	//表单验证
	$("#changePWdForm").Validform({
		ajaxPost:true,
		tiptype:2,
		callback:function(data){
			$.Hidemsg();
			if(data.status=="y"){
				$.webmis.win('open',{content:'<b class="green">操作成功</b>',target:'index_c/loginOut.html',AutoClose:3});
			}else{
				$.webmis.win('open',{content:'<b class="red">操作失败</b>',AutoClose:3});
			}
		}
	});
});