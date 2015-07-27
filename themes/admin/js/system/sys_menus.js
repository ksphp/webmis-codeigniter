$(function(){
	$.webmis.inc({files:[$webmis_plugin+'Validform.min.js']});
/* Index */
	$('#listBG').webmis('TableOddColor');
	$('#menus_table').webmis('TableAdjust');
/* Search */
	$('#ico-search').click(function(){
		if(!IsMobile){moWidth = 420;}
		$.webmis.win('open',{title:$(this).text(),width:moWidth,height:320});
		// Content
		$.get($base_url+'sys_menus/search.html',function(data){
			$.webmis.win('load',data);
			$('#seaSub').webmis('SubClass');
		});
		return false;
	});
/* Add */
	$('#ico-add').click(function(){
		if(!IsMobile){moWidth = 720; moHeight= 540;}
		$.webmis.win('open',{title:$(this).text(),width:moWidth,height:moHeight,overflow:true});
		// Content
		$.get($base_url+'sys_menus/add.html',function(data){
			$.webmis.win('load',data);
			menusClass();
			menusForm();
		});
		return false;
	});
/* Edit */
	$('#ico-edit').click(function(){
		var id = $('#listBG').webmis('GetInputID');
		if(id){
			if(!IsMobile){moWidth = 720; moHeight= 540;}
			$.webmis.win('open',{title:$(this).text(),width:moWidth,height:moHeight,overflow:true});
			// Content
			$.post($base_url+'sys_menus/edit.html',{'id':id},function(data){
				$.webmis.win('load',data);
				$('#menusID').val(id);
				menusClass();
				menusForm();
			});
		}else{
			$.get($base_url+'index_c/getLang/msg',{msg_title:'',msg_select:'',msg_auto_close:''},function (data){
				$.webmis.win('open',{title:data.msg_title, content:'<b class="red">'+data.msg_select+'</b>',AutoClose:3,AutoCloseText:data.msg_auto_close});
			},'json');
		}
		return false;
	});
/* Del */
	$('#ico-del').click(function(){
		actionDel('sys_menus/delData.html','sys_menus.html');
		return false;
	});
	
});

/* Form validation */
function menusForm(){
	$('#menusSub').webmis('SubClass');
	//  Validation
	$("#menusForm").Validform({ajaxPost:true,tiptype:2,
		beforeCheck:function(data){
			var perm=0;
			$('input[name=permVal]:checked').each(function(){
				perm += parseInt($(this).val());
			});
			$('#menus_perm').val(perm);
		},
		callback:function(data){
			$.Hidemsg();
			if(data.status=="y"){
				var url = $('#getUrl').text();
				$.webmis.win('close','sys_menus.html'+url);
			}else{
				$.webmis.win('close');
				$.webmis.win('open',{title:data.title,content:'<b class="red">'+data.msg+'</b>',AutoClose:3,AutoCloseText:data.text});
			}
		}
	});
}

/* Menus */
function menusClass(){
	$('#menusClass').webmis('AutoSelect',{
		url:$base_url+'sys_menus/getMenu.html',
		data:'0',
		type:'post',
		getVal:'#menus_fid'
	});
}