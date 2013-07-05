var path = $('#filePath').text();
$(function () {
/*
列表
*/
	$('#listBG').webmis('TableOddColor');	//隔行换色
	$('#table').webmis('TableAdjust');  //调整宽度
/*
新建文件夹
*/
	$('.action_addfolder').click(function () {
		$.webmis.win.open({title:'新建文件夹',width:360,height:240});
		//加载内容
		$.get($base_url+'sys_filemanager/addFolder.html',function(data){
			$.webmis.win.load(data);   //加载内容
			$('#dirPath').val(path);
			fileForm(); //表单验证
		});
		return false;
	});
/*
下载
*/	
	$('.action_down').click(function(){
		var id = $('#listBG').webmis('GetInputID',{type:','});
		if(id!=','){
			$.webmis.win.close('sys_filemanager/down.html?path='+path+'&files='+id);
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
				$.post($base_url+'sys_filemanager/delData.html',{'id':id,'path':path},function(data){
					if(data=='1'){
						$.webmis.win.close();
						$.webmis.win.open({content:'<b class="green">删除成功</b>',target:'sys_filemanager.html?path='+path,AutoClose:3});
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
//表单验证
function fileForm(){
	$('#fileSub').webmis('SubClass'); //按钮样式
	//验证提交
	$("#fileForm").Validform({
		ajaxPost:true,
		tiptype:2,
		callback:function(data){
			$.Hidemsg();
			if(data.status=="y"){
				$.webmis.win.close('sys_filemanager.html?path='+path);
			}else{
				$.webmis.win.close();
				$.webmis.win.open({content:'<b class="red">提交失败</b>',AutoClose:3});
			}
		}
	});
}
//打开文件夹
function openDir(path) {
	$.webmis.win.close('sys_filemanager.html?path='+path);
}
//返回上级
function backDir(path) {
	$.webmis.win.close('sys_filemanager.html?path='+path);
}
//刷新目录
function refreshDir(path) {
	$.webmis.win.close('sys_filemanager.html?path='+path);
}