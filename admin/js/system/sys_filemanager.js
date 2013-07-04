$(function () {
/*
列表
*/
	$('#listBG').webmis('TableOddColor');	//隔行换色
	$('#table').webmis('TableAdjust');  //调整宽度
	
});
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