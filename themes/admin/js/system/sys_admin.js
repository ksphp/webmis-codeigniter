$(function(){
	$.webmis.inc({files:[$webmis_plugin+'form/Validform.min.js']});
/* Index */
	$('#listBG').webmis('TableOddColor');
	$('#admin_table').webmis('TableAdjust');
/* Search */
	$('#ico-search').click(function(){
		if(!IsMobile){moWidth = 520; moHeight= 400;}
		$.webmis.win('open',{title:$(this).text(),width:moWidth,height:moHeight,overflow:true});
		// Content
		$.get($base_url+'sys_admin/search.html',function(data){
			$.webmis.win('load',data);
			$('#seaSub').webmis('SubClass');
		});
		return false;
	});
/* Add */
	$('#ico-add').click(function(){
		if(!IsMobile){moWidth = 620; moHeight= 480;}
		$.webmis.win('open',{title:$(this).text(),width:moWidth,height:moHeight,overflow:true});
		// Content
		$.get($base_url+'sys_admin/add.html',function(data){
			$.webmis.win('load',data);
			adminForm();
		});
		return false;
	});
/* Edit */
	$('#ico-edit').click(function(){
		var id = $('#listBG').webmis('GetInputID');
		if(id){
			if(!IsMobile){moWidth = 620; moHeight= 420;}
			$.webmis.win('open',{title:$(this).text(),width:moWidth,height:moHeight,overflow:true});
			// Content
			$.post($base_url+'sys_admin/edit.html',{'id':id},function(data){
				$.webmis.win('load',data);
				$('#adminID').val(id);
				adminForm();
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
		actionDel('sys_admin/delData.html','sys_admin.html');
		return false;
	});
	
});

/* Form validation */
function adminForm(){
	$('#adminSub').webmis('SubClass');
	// Validation
	$("#adminForm").Validform({ajaxPost:true,tiptype:2,
		callback:function(data){
			$.Hidemsg();
			if(data.status=="y"){
				var url = $('#getUrl').text();
				$.webmis.win('close','sys_admin.html'+url);
			}else{
				$.webmis.win('close');
				$.webmis.win('open',{title:data.title,content:'<b class="red">'+data.msg+'</b>',AutoClose:3,AutoCloseText:data.text});
			}
		}
	});
}

/* Edit Perm */
function editPerm(id,title){
	var perm = $('#editPerm'+id).attr('title');
	if(!IsMobile){moWidth = 720; moHeight= 540;}
	$.webmis.win('open',{title:title,width:moWidth,height:moHeight,overflow:true});
	// Content
	$.post($base_url+'sys_admin/editPerm.html',{'perm':perm},function(data){
		$.webmis.win('load',data);
		$('#editPerm').webmis('SubClass');
		//提交
		$('#editPerm').click(function(){
			var permval = getPerm();
			permData(id,permval)
		});
	});
	// Sub Perm
	var permData = function (id,perm){
		$.post($base_url+'sys_admin/permData.html',{'id':id,'perm':perm},function(data){
			if(data.status=='y'){
				var url = $('#getUrl').text();
				$.webmis.win('close','sys_admin.html'+url);
			}else{
				$.webmis.win('close');
				$.webmis.win('open',{title:data.title,content:'<b class="red">'+data.msg+'</b>',AutoClose:3,AutoCloseText:data.text});
			}
		},'json');
	}
	// Get Perm
	var getPerm = function (){
		var perm = '';
		// One
		$('#oneMenuPerm input:checked').each(function(){
			perm += $(this).val()+':0 ';
		});
		// Two
		$('#twoMenuPerm input:checked').each(function(){
			perm += $(this).val()+':0 ';
		});
		// Three
		$('#threeMenuPerm input[name=threeMenuPerm]:checked').each(function(){
			var id = $(this).val();
			var act = getAction(id);
			perm += id+':'+act+' ';
		});
		return perm;
	}
	// Get Perm Menu
	var getAction = function (id){
		var perm=0;
		$('#actionPerm_'+id+' input:checked').each(function(){
			perm += parseInt($(this).val());
		});
		return perm;
	}
}