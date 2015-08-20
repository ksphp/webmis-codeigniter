var file_root = $('#fileRoot').text();
var path = $('#filePath').text();
$(function () {
	$.webmis.inc({files:[
		$webmis_plugin + 'tinymce/tinymce.min.js',
		$webmis_plugin+'Validform.min.js'
	]});
/* Index */
	$('#listBG').webmis('TableOddColor');
	$('#table').webmis('TableAdjust');
/* Mkdir */
	$('#ico-addfolder').click(function () {
		if(!IsMobile){moWidth = 420;}
		$.webmis.win('open',{title:$(this).text(),width:moWidth,height:210});
		// Content
		$.get($base_url+'sys_filemanager/Folder.html',function(data){
			$.webmis.win('load',data);
			$('#fileSub').webmis('SubClass');
			$('#file_path').val(path);
			$("#fileForm").Validform({ajaxPost:true,tiptype:2,
				callback:function(data){
					$.Hidemsg();
					if(data.status=="y"){
						$.webmis.win('close','sys_filemanager.html?path='+path);
					}else{
						$.webmis.win('close');
						$.webmis.win('open',{title:data.title,content:'<b class="red">'+data.msg+'</b>',AutoClose:3,AutoCloseText:data.text});
					}
				}
			});
		});
		return false;
	});
/* NewFile */
	$('#ico-addfile').click(function () {
		if(!IsMobile){moWidth = 360;}
		$.webmis.win('open',{title:$(this).text(),width:moWidth,height:180});
		// Content
		$.get($base_url+'sys_filemanager/File.html',function(data){
			$.webmis.win('load',data);
			$('#fileSub').webmis('SubClass');
			$('#file_path').val(path);
			$("#fileForm").Validform({ajaxPost:true,tiptype:2,
				callback:function(data){
					$.Hidemsg();
					if(data.status=="y"){
						$.webmis.win('close','sys_filemanager.html?path='+path);
					}else{
						$.webmis.win('close');
						$.webmis.win('open',{title:data.title,content:'<b class="red">'+data.msg+'</b>',AutoClose:3,AutoCloseText:data.text});
					}
				}
			});
		});
		return false;
	});
/* Upload */
	$('#ico-upload').click(function(){
		// Upload Plugin
		$.webmis.inc({files:[
			$webmis_plugin + 'uploadify/jquery.uploadify.min.js',
			$webmis_plugin + 'uploadify/uploadify.css'
		]});
		if(!IsMobile){moWidth = 540; moHeight= 450;}
		$.webmis.win('open',{title:$(this).text(),width:moWidth,height:moHeight,overflow:true});
		// Content
		$.get($base_url+'sys_filemanager/upload.html',function(data){
			$.webmis.win('load',data);
			$("#file_upload").uploadify({
				'formData': {'path' : file_root+path,'someKey' : 'someValue'},
				'swf': $webmis_plugin + 'uploadify/uploadify.swf',
				'uploader': $webmis_plugin + 'uploadify/uploadify.php',
				'buttonImage' : $webmis_plugin + 'uploadify/browse-btn.png',
				'auto': false,
			});
			// Upload
			$('#fileSub').click(function (){
				$('#file_upload').uploadify('upload','*');
				return false;
			}).webmis('SubClass');
			// Close
			$('#WebMisWin .close').click(function (){
				refreshDir($('#filePath').text());
			});
		});
		return false;
	});
/* Download */	
	$('#ico-down').click(function(){
		var id = $('#listBG').webmis('GetInputID',{type:','});
		if(id!=','){
			$.webmis.win('close','sys_filemanager/down.html?path='+path+'&files='+id);
		}else{
			$.get($base_url+'home/getLang/msg',{msg_title:'',msg_select:'',msg_auto_close:''},function (data){
				$.webmis.win('open',{title:data.msg_title, content:'<b class="red">'+data.msg_select+'</b>',AutoClose:3,AutoCloseText:data.msg_auto_close});
			},'json');
		}
		return false;
	});
/* Remove */
	$('#ico-fdel').click(function(){
		actionDel('sys_filemanager/delData.html?path='+path,'sys_filemanager.html?path='+path);
		return false;
	});
});

/* UpLevel */
function backDir(path) {
	$.webmis.win('close','sys_filemanager.html?path='+path);
}
/* Refresh */
function refreshDir(path) {
	$.webmis.win('close','sys_filemanager.html?path='+path);
}
/* OpenDir */
function openDir(path) {
	$.webmis.win('close','sys_filemanager.html?path='+path);
}

/* EditPerm */
function editPerm(name,perm,title) {
	$.webmis.win('open',{title:title,width:320,height:180});
	// Content
	$.get($base_url+'sys_filemanager/editPerm.html',function(data){
		$.webmis.win('load',data);
		$('#fileSub').webmis('SubClass');
		$('#file_path').val(path+name);
		$('#file_perm').val(perm);
		$("#fileForm").Validform({ajaxPost:true,tiptype:2,
			callback:function(data){
				$.Hidemsg();
				if(data.status=="y"){
					$.webmis.win('close','sys_filemanager.html?path='+path);
				}else{
					$.webmis.win('close');
					$.webmis.win('open',{title:data.title,content:'<b class="red">'+data.msg+'</b>',AutoClose:3,AutoCloseText:data.text});
				}
			}
		});
	});
}

/* Rename */
function reName(name,title) {
	if(!IsMobile){moWidth = 360;}
	$.webmis.win('open',{title:title,width:moWidth,height:180});
	// Content
	$.get($base_url+'sys_filemanager/reName.html',function(data){
		$.webmis.win('load',data);
		$('#fileSub').webmis('SubClass');
		$('#file_path').val(path);
		$('#file_name').val(name);
		$('#file_rename').val(name);
		$("#fileForm").Validform({ajaxPost:true,tiptype:2,
			callback:function(data){
				$.Hidemsg();
				if(data.status=="y"){
					$.webmis.win('close','sys_filemanager.html?path='+path);
				}else{
					$.webmis.win('close');
					$.webmis.win('open',{title:data.title,content:'<b class="red">'+data.msg+'</b>',AutoClose:3,AutoCloseText:data.text});
				}
			}
		});
	});
}

/* Open File */
function openFile(path,ext) {
	var view_img = ['jpg','png','gif','ico'];
	var view_file = ['php','css','js','htm','html','sql','txt','md'];
	if ($.inArray(ext, view_img) != -1) {
		$.get($base_url+'home/getLang/msg',{msg_view:''},function (data){
			if(!IsMobile){moWidth = 520; moHeight= 400;}
			$.webmis.win('open',{title:data.msg_view,width:moWidth,height:moHeight,overflow:true});
			// Image Class
			var img = new Image();
			img.src = file_root+path;
			img.onload = function(){
				// Auto width or height
				var maxWidth = moWidth
				var maxHeight = moHeight-31;
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
				// Content
				$.webmis.win('load','<table class="fileImgView"><tr><td><img src="'+img.src+'" width="'+w+'" height="'+h+'"></td></tr></table>');
			};
		},'json');
	}else if ($.inArray(ext, view_file) != -1){
		$.get($base_url+'home/getLang/msg',{msg_view:''},function (data){
			if(!IsMobile){moWidth = 720; moHeight= 500;}
			$.webmis.win('open',{title:data.msg_view,width:moWidth,height:moHeight,overflow:true});
			$.get($base_url+'sys_filemanager/viewFile.html',{'path':path},function(data){
				$.webmis.win('load',data);
			});
		},'json');
	}else {
		$.get($base_url+'home/getLang/msg',{msg_view:'',msg_not_view:'',msg_auto_close:''},function (data){
			$.webmis.win('open',{title:data.msg_view, content:'<b class="red">'+data.msg_not_view+'</b>',AutoClose:3,AutoCloseText:data.msg_auto_close});
		},'json');
	}
}

/* Edit File */
function editFile(file,ext,title,lang) {
	var edit_file = ['php','css','js','htm','html','sql','txt','md'];
	var edit_tinymce = ['md','txt'];
	if ($.inArray(ext, edit_file) != -1){
		if(!IsMobile){moWidth = 840; moHeight= 600;}
		$.webmis.win('open',{title:title,width:moWidth,height:moHeight,overflow:true});
		$.get($base_url+'sys_filemanager/editFile.html',{'file':file},function(data){
			$.webmis.win('load',data);
			$('#fileSub').webmis('SubClass');
			// Editor
			if ($.inArray(ext, edit_tinymce) != -1) {
				Tinymce('#tinymce',lang);
			}
			// Validform
			$("#fileForm").Validform({ajaxPost:true,tiptype:2,
				callback:function(data){
					$.Hidemsg();
					if(data.status=="y"){
						$.webmis.win('close','sys_filemanager.html?path='+path);
					}else{
						$.webmis.win('close');
						$.webmis.win('open',{title:data.title,content:'<b class="red">'+data.msg+'</b>',AutoClose:3,AutoCloseText:data.text});
					}
				}
			});
		});
	}else {
		$.get($base_url+'home/getLang/msg',{msg_edit:'',msg_not_edit:'',msg_auto_close:''},function (data){
			$.webmis.win('open',{title:data.msg_edit, content:'<b class="red">'+data.msg_not_edit+'</b>',AutoClose:3,AutoCloseText:data.msg_auto_close});
		},'json');
	}
}

/* Editr */
function Tinymce(obj,lang){
	var Lang = '';
	if(lang=='zh-cn'){Lang = 'zh_CN';}
	tinymce.init({
		selector: obj,
		language: Lang,
		convert_urls: false,
		height: 430,
		menubar: false,
		plugins: [
			"advlist autolink lists link image charmap print preview hr anchor pagebreak",
			"searchreplace wordcount visualblocks visualchars code fullscreen",
			"insertdatetime media nonbreaking save table contextmenu directionality emoticons template paste textcolor"
		],
		toolbar1: "insertfile undo redo | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | forecolor backcolor emoticons | link image media | code preview"
	});
}