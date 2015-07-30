$(function(){
	$.webmis.inc({files:[$webmis_plugin+'form/Validform.min.js']});
/* Index */
	$('#listBG').webmis('TableOddColor');
	$('#menus_table').webmis('TableAdjust');
/* Import */
	$('#ico-imp').click(function(){
		var id = $('#listBG').webmis('GetInputID');
		if(id){
			if(!IsMobile){moWidth = 450;}
			$.webmis.win('open',{title:$(this).text(),width:moWidth,height:200});
			$.post($base_url+'sys_db_restore/imp.html',{'file':id},function(data){
				$.webmis.win('load',data);
				impForm();
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
		actionDel('sys_db_restore/delData.html','sys_db_restore.html');
		return false;
	});
});

/* Form validation */
function impForm(){
	$('#impSub').webmis('SubClass');
	$("#restoreForm").Validform({ajaxPost:true,tiptype:2,
		callback:function(data){
			$.Hidemsg();
			if(data.status=="y"){
				$.webmis.win('close','sys_db_backup.html');
			}else{
				$.webmis.win('close');
				$.webmis.win('open',{title:data.title,content:'<b class="red">'+data.msg+'</b>',AutoClose:3,AutoCloseText:data.text});
			}
		}
	});
}