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