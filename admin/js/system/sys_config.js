$(function(){
	$('#editSub').WMisSub(); //按钮样式
	//表单验证
	$("#configForm").Validform({
		ajaxPost:true,
		tiptype:2,
		callback:function(data){
			$.Hidemsg();
			if(data.status=="y"){
				$.WMisMsgClose();
				$.WMisMsg({content:'<b class="green">保存成功</b>',target:'sys_config.html',AutoClose:3});
			}else{
				$.WMisMsgClose();
				$.WMisMsg({content:'<b class="red">保存失败</b>',AutoClose:3});
			}
		}
	});
});