$(function(){
/*
列表
*/
	$('#listBG').WMisTableUI();   //表格样式
	$('#menus_table').WMisMoveTW();  //调整表格宽度
/*
导出
*/
	$('.action_exp').click(function(){
		var id = $('#listBG').WMisGetID({type:' '});
		if(id!=' '){
			$.WMisMsg({title:'导出',width:480,height:340,overflow:true});
			$.post($base_url+'sys_db_backup/exp.html',{'table':id},function(data){
				$('#WebMisMsgCT').html(data);   //加载内容
				$('#expSub').WMisSub(); //按钮样式
				expForm();  //表单验证
			});
		}else{
			$.WMisMsg({content:'<b class="red">请选择！</b>',AutoClose:3});
		}
	});
});

//表单验证
function expForm(){
	$("#backForm").Validform({
		ajaxPost:true,
		tiptype:2,
		callback:function(data){
			$.Hidemsg();
			if(data.status=="y"){
				$.WMisMsgClose();
				$.WMisMsg({content:'<b class="green">操作成功</b>',target:'sys_db_restore.html',AutoClose:3});
			}else{
				$.WMisMsgClose();
				$.WMisMsg({content:'<b class="red">操作失败</b>',AutoClose:3});
			}
		}
	});
}