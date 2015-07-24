$(function(){
	$.webmis.inc({files:[$webmis_plugin+'Validform.min.js']});
/*列表*/
	$('#listBG').webmis('TableOddColor');	//隔行换色
	$('#menus_table').webmis('TableAdjust');  //调整宽度
/*导出*/
	$('#ico-exp').click(function(){
		var id = $('#listBG').webmis('GetInputID',{type:' '});
		if(id!=' '){
			if(!IsMobile){moWidth = 520; moHeight= 420;}
			$.webmis.win('open',{title:$(this).text(),width:moWidth,height:moHeight,overflow:true});
			$.post($base_url+'sys_db_backup/exp.html',{'table':id},function(data){
				$.webmis.win('load',data);   //加载内容
				expForm();  //表单验证
			});
		}else{
			$.get($base_url+'welcome/getLang/msg',{msg_title:'',msg_select:'',msg_auto_close:''},function (data){
				$.webmis.win('open',{title:data.msg_title, content:'<b class="red">'+data.msg_select+'</b>',AutoClose:3,AutoCloseText:data.msg_auto_close});
			},'json');
		}
		return false;
	});
/*删除*/
	$('#ico-del').click(function(){
		actionDel('sys_db_backup/delData.html','sys_db_backup.html');
		return false;
	});
});

/*表单验证*/
function expForm(){
	$('#expSub').webmis('SubClass'); //按钮样式
	//验证提交
	$("#backForm").Validform({
		ajaxPost:true,
		tiptype:2,
		callback:function(data){
			$.Hidemsg();
			if(data.status=="y"){
				$.webmis.win('close');
				$.webmis.win('open',{content:'<b class="green">操作成功</b>',target:'sys_db_restore.html',AutoClose:3});
			}else{
				$.webmis.win('close');
				$.webmis.win('open',{content:'<b class="red">操作失败</b>',AutoClose:3});
			}
		}
	});
}