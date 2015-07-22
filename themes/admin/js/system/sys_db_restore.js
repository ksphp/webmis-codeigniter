$(function(){
	$.webmis.inc({files:[$webmis_plugin+'Validform.min.js']});
/*列表*/
	$('#listBG').webmis('TableOddColor');	//隔行换色
	$('#menus_table').webmis('TableAdjust');  //调整宽度
/*导入*/
	$('#ico-imp').click(function(){
		var id = $('#listBG').webmis('GetInputID');
		if(id){
			if(!IsMobile){moWidth = 450;}
			$.webmis.win('open',{title:$(this).text(),width:moWidth,height:200});
			$.post($base_url+'sys_db_restore/imp.html',{'file':id},function(data){
				$.webmis.win('load',data);   //加载内容
				impForm();  //表单验证
			});
		}else{
			$.webmis.win('open',{content:'<b class="red">请选择！</b>',AutoClose:3});
		}
		return false;
	});
/*删除*/
	$('#ico-del').click(function(){
		actionDel('sys_db_restore/delData.html','sys_db_restore.html');
		return false;
	});
});

/*表单验证*/
function impForm(){
	$('#impSub').webmis('SubClass'); //按钮样式
	$("#restoreForm").Validform({ajaxPost:true,tiptype:2,
		callback:function(data){
			$.Hidemsg();
			if(data.status=="y"){
				$.webmis.win('close');
				$.webmis.win('open',{content:'<b class="green">导入成功</b>',target:'sys_db_backup.html',AutoClose:3});
			}else{
				$.webmis.win('close');
				$.webmis.win('open',{content:'<b class="red">导入失败</b>',AutoClose:3});
			}
		}
	});
}