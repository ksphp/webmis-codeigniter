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
				$.webmis.win('close');
				$.webmis.win('open',{content:'<b class="green">保存成功</b>',target:'sys_config.html',AutoClose:3});
			}else{
				$.webmis.win('close');
				$.webmis.win('open',{content:'<b class="red">保存失败</b>',AutoClose:3});
			}
		}
	});
});