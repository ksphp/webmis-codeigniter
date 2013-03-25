$(function(){
/*
列表
*/
	$('#listBG').WMisTableUI();   //表格样式
	$('#admin_table').WMisMoveTW();  //调整表格宽度
/*
搜索
*/
	$('.action_sea').click(function(){
		$.WMisMsg({title:'搜索',width:380,height:350});
		//加载内容
		$.get($base_url+'sys_admin/search.html',function(data){
			$('#WebMisMsgCT').html(data);   //加载内容
			$('#seaSub').WMisSub(); //按钮样式
		});
	});
/*
添加
*/
	$('.action_add').click(function(){
		$.WMisMsg({title:'添加',width:420,height:420});
		//加载内容
		$.get($base_url+'sys_admin/add.html',function(data){
			$('#WebMisMsgCT').html(data);   //加载内容
			$('#addSub').WMisSub(); //按钮样式
			adminForm(); //表单验证
			
		});
	});
/*
编辑
*/
	$('.action_edit').click(function(){
		var id = $('#listBG').WMisGetID();
		if(id){
			$.WMisMsg({title:'编辑',width:420,height:380});
			//加载内容
			$.post($base_url+'sys_admin/edit.html',{'id':id},function(data){
				$('#WebMisMsgCT').html(data);   //加载内容
				$('#adminID').val(id);
				$('#editSub').WMisSub(); //按钮样式
				adminForm(); //表单验证
			});
		}else{
			$.WMisMsg({content:'<b class="red">请选择！</b>',AutoClose:3});
		}
	});
/*
删除
*/
	$('.action_del').click(function(){
		var id = $('#listBG').WMisGetID({type:' '});
		if(id!=' '){
			$.WMisMsg({title:'删除',width:210,height:140,content:'<div class="delData"><input type="submit" id="delSub" value="彻底删除" /></div>'});
			$('#delSub').WMisSub(); //按钮样式
			//点击提交
			$('#delSub').click(function(){
				$.post($base_url+'sys_admin/delData.html',{'id':id},function(data){
					if(data){
						$.WMisMsgClose();
						var url = $('#getUrl').text();
						$.WMisMsg({content:'<b class="green">删除成功</b>',target:'sys_admin.html'+url,AutoClose:3});
					}else{
						$.WMisMsgClose();
						$.WMisMsg({content:'<b class="red">删除失败</b>',AutoClose:3});
					}
				});
			});
		}else{
			$.WMisMsg({content:'<b class="red">请选择！</b>',AutoClose:3});
		}
	});
	
});

//表单验证
function adminForm(){
	$("#adminForm").Validform({
		ajaxPost:true,
		tiptype:2,
		callback:function(data){
			$.Hidemsg();
			if(data.status=="y"){
				var url = $('#getUrl').text();
				$.WMisMsgClose();
				$.WMisMsg({content:'<b class="green">操作成功</b>',target:'sys_admin.html'+url,AutoClose:3});
			}else{
				$.WMisMsgClose();
				$.WMisMsg({content:'<b class="red">操作失败</b>',AutoClose:3});
			}
		}
	});
}

/*
编辑权限
*/
function editPerm(id){
	var perm = $('#editPerm'+id).attr('title');
	$.WMisMsg({title:'编辑权限',width:540,height:420,overflow:true});
	//加载内容
	$.post($base_url+'sys_admin/editPerm.html',{'perm':perm},function(data){
		$('#WebMisMsgCT').html(data);   //加载内容
		$('#editPerm').WMisSub(); //按钮样式
		//提交
		$('#editPerm').click(function(){
			var permval = getPerm();
			permData(id,permval)
		});
	});
}

//提交权限
function permData(id,perm){
	$.post($base_url+'sys_admin/permData.html',{'id':id,'perm':perm},function(data){
		if(data){
			$.WMisMsgClose();
			var url = $('#getUrl').text();
			$.WMisMsg({content:'<b class="green">操作成功</b>',target:'sys_admin.html'+url,AutoClose:3});
		}else{
			$.WMisMsgClose();
			$.WMisMsg({content:'<b class="red">操作失败</b>',AutoClose:3});
		}
	});
}

//获取权限
function getPerm(){
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
function getAction(id){
	var perm=0;
	$('#actionPerm_'+id+' input:checked').each(function(){
		perm += parseInt($(this).val());
	});
	return perm;
}