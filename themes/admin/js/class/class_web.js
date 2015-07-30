$(function(){
	$.webmis.inc({files:[$webmis_plugin+'form/Validform.min.js']});
/* Index */
	$('#listBG').webmis('TableOddColor');
	$('#class_table').webmis('TableAdjust');
/* Search */
	$('#ico-search').click(function(){
		if(!IsMobile){moWidth = 420;}
		$.webmis.win('open',{title:$(this).text(),width:moWidth,height:320});
		// Content
		$.get($base_url+'class_web/search.html',function(data){
			$.webmis.win('load',data);
			$('#seaSub').webmis('SubClass');
		});
		return false;
	});
/* Add */
	$('#ico-add').click(function(){
		if(!IsMobile){moWidth = 600; moHeight= 460;}
		$.webmis.win('open',{title:$(this).text(),width:moWidth,height:moHeight,overflow:true});
		// Content
		$.get($base_url+'class_web/add.html',function(data){
			$.webmis.win('load',data);
			newsClass();
			classForm();
			
		});
		return false;
	});
/* Edit */
	$('#ico-edit').click(function(){
		var id = $('#listBG').webmis('GetInputID');
		if(id){
			if(!IsMobile){moWidth = 600; moHeight= 460;}
			$.webmis.win('open',{title:$(this).text(),width:moWidth,height:moHeight,overflow:true});
			// Content
			$.post($base_url+'class_web/edit.html',{'id':id},function(data){
				$.webmis.win('load',data);
				$('#classID').val(id);
				newsClass();
				classForm();
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
		actionDel('class_web/delData.html','class_web.html');
		return false;
	});
/* Audit */
	$('#ico-audit').click(function(){
		actionAudit('class_web/auditData.html','class_web.html');
		return false;
	});
	
});

/* Form validation */
function classForm(){
	$('#classSub').webmis('SubClass');
	// Validation
	$("#classForm").Validform({ajaxPost:true,tiptype:2,
		callback:function(data){
			$.Hidemsg();
			if(data.status=="y"){
				var url = $('#getUrl').text();
				$.webmis.win('close','class_web.html'+url);
			}else{
				$.webmis.win('close');
				$.webmis.win('open',{title:data.title,content:'<b class="red">'+data.msg+'</b>',AutoClose:3,AutoCloseText:data.text});
			}
		}
	});
}
/* Menus */
function newsClass(){
	$('#newsClass').webmis('AutoSelect',{
		url:$base_url+'class_web/getMenu.html',
		data:'0',
		type:'post',
		getVal:'#menus_fid'
	});
}