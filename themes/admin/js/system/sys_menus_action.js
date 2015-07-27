$(function(){
	$.webmis.inc({files:[$webmis_plugin+'Validform.min.js']});
/* Index */
	$('#listBG').webmis('TableOddColor');
	$('#menus_action_table').webmis('TableAdjust');
/* Search */
	$('#ico-search').click(function(){
		if(!IsMobile){moWidth = 360;}
		$.webmis.win('open',{title:$(this).text(),width:moWidth,height:240});
		// Content
		$.get($base_url+'sys_menus_action/search.html',function(data){
			$.webmis.win('load',data);
			$('#seaSub').webmis('SubClass');
		});
		return false;
	});
/* Add */
	$('#ico-add').click(function(){
		if(!IsMobile){moWidth = 380;}
		$.webmis.win('open',{title:$(this).text(),width:moWidth,height:270});
		// Content
		$.get($base_url+'sys_menus_action/add.html',function(data){
			$.webmis.win('load',data);
			// Perm
			$.get($base_url+'sys_menus_action/getTotal.html',function(data){
				var permNum = Math.pow(2,data);
				$('#action_perm').val(permNum);
			});
			menusACTForm();
		});
		return false;
	});
/* Edit */
	$('#ico-edit').click(function(){
		var id = $('#listBG').webmis('GetInputID');
		if(id){
			if(!IsMobile){moWidth = 380;}
			$.webmis.win('open',{title:$(this).text(),width:moWidth,height:270});
			// Content
			$.post($base_url+'sys_menus_action/edit.html',{'id':id},function(data){
				$.webmis.win('load',data);
				$('#actionID').val(id);
				menusACTForm();
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
		actionDel('sys_menus_action/delData.html','sys_menus_action.html');
		return false;
	});
	
});

/* Form validation */
function menusACTForm(){
	$('#actionSub').webmis('SubClass');
	// Validation
	$("#menusACTForm").Validform({ajaxPost:true,tiptype:2,
		callback:function(data){
			$.Hidemsg();
			if(data.status=="y"){
				var url = $('#getUrl').text();
				$.webmis.win('close','sys_menus_action.html'+url);
			}else{
				$.webmis.win('close');
				$.webmis.win('open',{title:data.title,content:'<b class="red">'+data.msg+'</b>',AutoClose:3,AutoCloseText:data.text});
			}
		}
	});
}