var path = $('#filePath').text();
var file_root = $('#file_root').text();
var file_action = $('#file_action').text();
var file_editor = $('#file_editor').text();
var fileGetUrl = '&action='+file_action+'&editor='+file_editor
$(function () {
	//加载文件
	$.webmis.inc({files:[
		$webmis_plugin + 'jquery/jquery.form.js',
	]});
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
			$('#file_path').val(path);
			$('#file_editor').val(file_editor);
			$("#fileForm").ajaxForm(function(data) {
				if(data=='1'){
					$.webmis.win.close();
					$.webmis.win.open({content:'<b class="green">新建成功</b>',target:'sys_filemanager.html?path='+path+fileGetUrl,AutoClose:3});
				}else{
					$.webmis.win.close();
					$.webmis.win.open({content:'<b class="red">新建失败</b>',AutoClose:3});
				}
			});
			$('#fileSub').webmis('SubClass'); //按钮样式
		});
		return false;
	});
/*
上传
*/
	$('.action_upload').click(function(){
		//加载文件
		$.webmis.inc({files:[
			$webmis_plugin + 'uploadify/jquery.uploadify.min.js',
			$webmis_plugin + 'uploadify/uploadify.css'
		]});
		$.webmis.win.open({title:'上传文件',width:480,height:360,overflow:true});
		//加载内容
		$.get($base_url+'sys_filemanager/upload.html',function(data){
			$.webmis.win.load(data);   //加载内容
			//上传插件
			$("#file_upload").uploadify({
				'formData': {'path' : file_root+path,'someKey' : 'someValue'},
				'swf': $webmis_plugin + 'uploadify/uploadify.swf',
				'uploader': $webmis_plugin + 'uploadify/uploadify.php',
				'buttonImage' : $webmis_plugin + 'uploadify/browse-btn.png',
				'auto': false,
			});
			//点击按钮
			$('#fileSub').click(function (){
				$('#file_upload').uploadify('upload','*');
				return false;
			}).webmis('SubClass');
			//关闭窗口
			$('#WebMisWin .close').click(function (){
				refreshDir($('#filePath').text());
			});
		});
		return false;
	});
/*
下载
*/	
	$('.action_down').click(function(){
		var id = $('#listBG').webmis('GetInputID',{type:','});
		if(id!=','){
			$.webmis.win.close('sys_filemanager.html?path='+path+'&action=down&editor='+file_editor+'&files='+id);
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
				$.get($base_url+'sys_filemanager.html',{'id':id,'path':path,'action':'del','editor':file_editor},function(data){
					if(data=='1'){
						$.webmis.win.close();
						$.webmis.win.open({content:'<b class="green">删除成功</b>',target:'sys_filemanager.html?path='+path+fileGetUrl,AutoClose:3});
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

//打开文件夹
function openDir(path) {
	$.webmis.win.close('sys_filemanager.html?path='+path+fileGetUrl);
}
//打开文件
function openFile(path,ext) {
	var view_img = ['jpg','png','gif','ico'];
	var view_file = ['php','css','js','htm','html','sql','md']
	if ($.inArray(ext, view_img) != -1) {
		$.webmis.win.open({title:'预览图片',width:520,height:400,overflow:true});
		//图片类
		var img = new Image();
		img.src = file_root+path;
		// 加载完成执行
		img.onload = function(){
			//压缩比例
			var maxWidth = 520;
			var maxHeight = 340;
			var Ratio = 1;
			var w = img.width;
			var h = img.height;
			var wRatio = maxWidth/w;
			var hRatio = maxHeight/h;
			if (wRatio < 1 || hRatio < 1) {
				Ratio = (wRatio<=hRatio?wRatio:hRatio);
			}
			if (Ratio<1){
				w = Math.floor(w * Ratio);
				h = Math.floor(h * Ratio);
			}
			//加载内容
			$.webmis.win.load('<table class="fileImgView"><tr><td><img src="'+img.src+'" width="'+w+'" height="'+h+'"></td></tr></table>');
		};
	}else if ($.inArray(ext, view_file) != -1){
		$.webmis.win.open({title:'预览文件',width:720,height:500,overflow:true});
		$.get($base_url+'sys_filemanager.html',{'ext':ext,'path':path,'action':'viewfile','editor':file_editor},function(data){
			$.webmis.win.load(data);
		});
	}else {
		$.webmis.win.open({content:'<b class="red">该文件不能预览！</b>',AutoClose:3});
	}
}
//编辑权限
function editPerm(name,perm) {
	$.webmis.win.open({title:'编辑权限',width:240,height:180});
	//加载内容
	$.get($base_url+'sys_filemanager/editPerm.html',function(data){
		$.webmis.win.load(data);   //加载内容
		$('#file_path').val(path+name);
		$('#file_perm').val(perm);
		$('#file_editor').val(file_editor);
		$("#fileForm").ajaxForm(function(data) {
			if(data=='1'){
				$.webmis.win.close();
				$.webmis.win.open({content:'<b class="green">编辑成功</b>',target:'sys_filemanager.html?path='+path+fileGetUrl,AutoClose:3});
			}else{
				$.webmis.win.close();
				$.webmis.win.open({content:'<b class="red">编辑失败</b>',AutoClose:3});
			}
		});
		$('#fileSub').webmis('SubClass'); //按钮样式
	});
}
//返回上级
function backDir(path) {
	$.webmis.win.close('sys_filemanager.html?path='+path+fileGetUrl);
}
//刷新目录
function refreshDir(path) {
	$.webmis.win.close('sys_filemanager.html?path='+path+fileGetUrl);
}
//插入到编辑器
function insertEditor(path) {
	var closed = window.parent.document.getElementsByClassName('mce-filemanager');
	$(window.parent.document).find('#'+file_editor).val(file_root+path);
	$(closed).find('.mce-close').trigger('click');
}