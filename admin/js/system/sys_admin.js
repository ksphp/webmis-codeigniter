$(function(){
/*
列表
*/
	$('#listBG').webmis('TableOddColor');	//隔行换色
	$('#admin_table').webmis('TableAdjust');  //调整宽度
/*
搜索
*/
	$('.action_sea').click(function(){
		$.webmis.win.open({title:'搜索',width:380,height:350});
		//加载内容
		$.get($base_url+'sys_admin/search.html',function(data){
			$.webmis.win.load(data);	//加载内容
			$('#seaSub').webmis('SubClass');	//按钮样式
		});
		return false;
	});
/*
添加
*/
	$('.action_add').click(function(){
		$.webmis.win.open({title:'添加',width:420,height:420});
		//加载内容
		$.get($base_url+'sys_admin/add.html',function(data){
			$.webmis.win.load(data);   //加载内容
			adminForm(); //表单验证
		});
		return false;
	});
/*
编辑
*/
	$('.action_edit').click(function(){
		var id = $('#listBG').webmis('GetInputID');
		if(id){
			$.webmis.win.open({title:'编辑',width:420,height:380});
			//加载内容
			$.post($base_url+'sys_admin/edit.html',{'id':id},function(data){
				$.webmis.win.load(data);   //加载内容
				$('#adminID').val(id);
				adminForm(); //表单验证
			});
		}else{
			$.webmis.win.open({content:'<b class="red">请选择！</b>',AutoClose:3});
		}
		return false;
	});
/*
删除
*/
	$('.action_del').click(function(){
		actionDel('sys_admin/delData.html','sys_admin.html');
		return false;
	});
	
});

/*表单验证*/
function adminForm(){
	$('#adminSub').webmis('SubClass'); //按钮样式
	//验证提交
	$("#adminForm").Validform({
		ajaxPost:true,
		tiptype:2,
		callback:function(data){
			$.Hidemsg();
			if(data.status=="y"){
				var url = $('#getUrl').text();
				$.webmis.win.close();
				$.webmis.win.open({content:'<b class="green">操作成功</b>',target:'sys_admin.html'+url,AutoClose:3});
			}else{
				$.webmis.win.close();
				$.webmis.win.open({content:'<b class="red">操作失败</b>',AutoClose:3});
			}
		}
	});
}

/*
编辑权限
*/
function editPerm(id){
	var perm = $('#editPerm'+id).attr('title');
	$.webmis.win.open({title:'编辑权限',width:540,height:420,overflow:true});
	//加载内容
	$.post($base_url+'sys_admin/editPerm.html',{'perm':perm},function(data){
		$.webmis.win.load(data);   //加载内容
		$('#editPerm').webmis('SubClass'); //按钮样式
		//提交
		$('#editPerm').click(function(){
			var permval = getPerm();
			permData(id,permval)
		});
	});
	//提交权限
	var permData = function (id,perm){
		$.post($base_url+'sys_admin/permData.html',{'id':id,'perm':perm},function(data){
			if(data){
				$.webmis.win.close();
				var url = $('#getUrl').text();
				$.webmis.win.open({content:'<b class="green">操作成功</b>',target:'sys_admin.html'+url,AutoClose:3});
			}else{
				$.webmis.win.close();
				$.webmis.win.open({content:'<b class="red">操作失败</b>',AutoClose:3});
			}
		});
	}
	//获取权限
	var getPerm = function (){
		var perm = '';
		//一级菜单
		$('#oneMenuPerm input:checked').each(function(){
			perm += $(this).val()+':0 ';
		});
		//二级菜单
		$('#twoMenuPerm input:checked').each(function(){
			perm += $(this).val()+':0 ';
		});
		//三级菜单
		$('#threeMenuPerm input[name=threeMenuPerm]:checked').each(function(){
			var id = $(this).val();
			var act = getAction(id);
			perm += id+':'+act+' ';
		});
		return perm;
	}
	//获取权限动作值
	var getAction = function (id){
		var perm=0;
		$('#actionPerm_'+id+' input:checked').each(function(){
			perm += parseInt($(this).val());
		});
		return perm;
	}
}