$(function(){
/*
列表
*/
	$('#listBG').webmis('TableOddColor');	//隔行换色
	$('#menus_table').webmis('TableAdjust');  //调整宽度
/*
导入
*/
	$('.action_imp').click(function(){
		var id = $('#listBG').webmis('GetInputID');
		if(id){
			$.webmis.win.open({title:'导入',width:420,height:160});
			$.post($base_url+'sys_db_restore/imp.html',{'file':id},function(data){
				$.webmis.win.load(data);   //加载内容
				impForm();  //表单验证
			});
		}else{
			$.webmis.win.open({content:'<b class="red">请选择！</b>',AutoClose:3});
		}
		return false;
	});
/*
删除
*/
	$('.action_del').click(function(){
		var id = $('#listBG').webmis('GetInputID',{type:','});
		if(id!=','){
			$.webmis.win.open({title:'删除',width:210,height:140,content:'<div class="delData"><input type="submit" id="delSub" value="彻底删除" /></div>'});
			$('#delSub').webmis('SubClass'); //按钮样式
			//点击提交
			$('#delSub').click(function(){
				$.post($base_url+'sys_db_restore/delData.html',{'id':id},function(data){
					if(data){
						$.webmis.win.close();
						$.webmis.win.open({content:'<b class="green">删除成功</b>',target:'sys_db_restore.html',AutoClose:3});
					}else{
						$.webmis.win.close();
						$.webmis.win.open({content:'<b class="red">删除失败</b>',AutoClose:3});
					}
				});
			});
		}else{
			$.webmis.win.open({content:'<b class="red">请选择！</b>',AutoClose:3});
		}
		return false;
	});
});

/*表单验证*/
function impForm(){
	$('#impSub').webmis('SubClass'); //按钮样式
	$("#restoreForm").Validform({
		ajaxPost:true,
		tiptype:2,
		callback:function(data){
			$.Hidemsg();
			if(data.status=="y"){
				$.webmis.win.close();
				$.webmis.win.open({content:'<b class="green">导入成功</b>',target:'sys_db_backup.html',AutoClose:3});
			}else{
				$.webmis.win.close();
				$.webmis.win.open({content:'<b class="red">导入失败</b>',AutoClose:3});
			}
		}
	});
}