$(function(){
	$.webmis.inc({files:[$webmis_plugin+'Validform.min.js']});
/*列表*/
	$('#listBG').webmis('TableOddColor');	//隔行换色
	$('#menus_action_table').webmis('TableAdjust');  //调整宽度
/*搜索*/
	$('#ico-search').click(function(){
		if(!IsMobile){moWidth = 320;}
		$.webmis.win('open',{title:'搜索',width:moWidth,height:210});
		//加载内容
		$.get($base_url+'sys_menus_action/search.html',function(data){
			$.webmis.win('load',data);   //加载内容
			$('#seaSub').webmis('SubClass'); //按钮样式
		});
		return false;
	});
/*添加*/
	$('#ico-add').click(function(){
		if(!IsMobile){moWidth = 360;}
		$.webmis.win('open',{title:'添加',width:moWidth,height:230});
		//加载内容
		$.get($base_url+'sys_menus_action/add.html',function(data){
			$.webmis.win('load',data);   //加载内容
			//默认权限
			$.get($base_url+'sys_menus_action/getTotal.html',function(data){
				var permNum = Math.pow(2,data);
				$('#action_perm').val(permNum);
			});
			menusACTForm(); //表单验证
		});
		return false;
	});
/*编辑*/
	$('#ico-edit').click(function(){
		var id = $('#listBG').webmis('GetInputID');
		if(id){
			if(!IsMobile){moWidth = 360;}
			$.webmis.win('open',{title:'编辑',width:moWidth,height:230});
			//加载内容
			$.post($base_url+'sys_menus_action/edit.html',{'id':id},function(data){
				$.webmis.win('load',data);   //加载内容
				$('#actionID').val(id);
				menusACTForm(); //表单验证
			});
		}else{
			$.webmis.win('open',{content:'<b class="red">请选择！</b>',AutoClose:3});
		}
		return false;
	});
/*删除*/
	$('#ico-del').click(function(){
		actionDel('sys_menus_action/delData.html','sys_menus_action.html');
		return false;
	});
	
});

/*表单验证*/
function menusACTForm(){
	$('#actionSub').webmis('SubClass'); //按钮样式
	//验证提交
	$("#menusACTForm").Validform({
		ajaxPost:true,
		tiptype:2,
		callback:function(data){
			$.Hidemsg();
			if(data.status=="y"){
				var url = $('#getUrl').text();
				$.webmis.win('close','sys_menus_action.html'+url);
			}else{
				$.webmis.win('close');
				$.webmis.win('open',{content:'<b class="red">操作失败</b>',AutoClose:3});
			}
		}
	});
}