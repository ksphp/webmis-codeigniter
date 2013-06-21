$(function(){
/*
列表
*/
	$('#listBG').WMisTableUI();   //表格样式
	$('#menus_table').WMisMoveTW();  //调整表格宽度
/*
导入
*/
	$('.action_imp').click(function(){
		var id = $('#listBG').WMisGetID();
		if(id){
			$.WMisMsg({title:'导入',width:420,height:160});
			$.post($base_url+'sys_db_restore/imp.html',{'file':id},function(data){
				$('#WebMisMsgCT').html(data);   //加载内容
				$('#impSub').WMisSub(); //按钮样式
				impForm();  //表单验证
			});
		}else{
			$.WMisMsg({content:'<b class="red">请选择！</b>',AutoClose:3});
		}
	});
/*
删除
*/
	$('.action_del').click(function(){
		var id = $('#listBG').WMisGetID({type:','});
		if(id!=','){
			$.WMisMsg({title:'删除',width:210,height:140,content:'<div class="delData"><input type="submit" id="delSub" value="彻底删除" /></div>'});
			$('#delSub').WMisSub(); //按钮样式
			//点击提交
			$('#delSub').click(function(){
				$.post($base_url+'sys_db_restore/delData.html',{'id':id},function(data){
					if(data){
						$.WMisMsgClose();
						$.WMisMsg({content:'<b class="green">删除成功</b>',target:'sys_db_restore.html',AutoClose:3});
					}else{
						$.WMisMsgClose();
						$.WMisMsg({content:'<b class="red">删除失败</b>',AutoClose:3});
					}
				});
			});
		}else{
			$.WMisMsg({content:'<b class="red">请选择！</b>',AutoClose:3});
		}
	});
});

//表单验证
function impForm(){
	$("#restoreForm").Validform({
		ajaxPost:true,
		tiptype:2,
		callback:function(data){
			$.Hidemsg();
			if(data.status=="y"){
				$.WMisMsgClose();
				$.WMisMsg({content:'<b class="green">导入成功</b>',target:'sys_db_backup.html',AutoClose:3});
			}else{
				$.WMisMsgClose();
				$.WMisMsg({content:'<b class="red">导入失败</b>',AutoClose:3});
			}
		}
	});
}