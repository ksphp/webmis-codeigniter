$(function(){
/*
列表
*/
	$('#listBG').WMisTableUI();   //表格样式
	$('#menus_action_table').WMisMoveTW();  //调整表格宽度
/*
搜索
*/
	$('.action_sea').click(function(){
		$.WMisMsg({title:'搜索',width:320,height:210});
		//加载内容
		$.get($base_url+'sys_menus_action/search.html',function(data){
			$('#WebMisMsgCT').html(data);   //加载内容
			$('#seaSub').WMisSub(); //按钮样式
		});
	});
/*
添加
*/
	$('.action_add').click(function(){
		$.WMisMsg({title:'添加',width:360,height:230});
		//加载内容
		$.get($base_url+'sys_menus_action/add.html',function(data){
			$('#WebMisMsgCT').html(data);   //加载内容
			$('#addSub').WMisSub(); //按钮样式
			//默认权限
			$.get($base_url+'sys_menus_action/getTotal.html',function(data){
				var permNum = Math.pow(2,data);
				$('#action_perm').val(permNum);
			});
			menusACTForm(); //表单验证
			
		});
	});
/*
编辑
*/
	$('.action_edit').click(function(){
		var id = $('#listBG').WMisGetID();
		if(id){
			$.WMisMsg({title:'编辑',width:360,height:230});
			//加载内容
			$.post($base_url+'sys_menus_action/edit.html',{'id':id},function(data){
				$('#WebMisMsgCT').html(data);   //加载内容
				$('#actionID').val(id);
				$('#editSub').WMisSub(); //按钮样式
				menusACTForm(); //表单验证
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
				$.post($base_url+'sys_menus_action/delData.html',{'id':id},function(data){
					if(data){
						$.WMisMsgClose();
						var url = $('#getUrl').text();
						$.WMisMsg({content:'<b class="green">删除成功</b>',target:'sys_menus_action.html'+url,AutoClose:3});
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
function menusACTForm(){
	$("#menusACTForm").Validform({
		ajaxPost:true,
		tiptype:2,
		callback:function(data){
			$.Hidemsg();
			if(data.status=="y"){
				var url = $('#getUrl').text();
				$.WMisMsgClose();
				$.WMisMsg({content:'<b class="green">操作成功</b>',target:'sys_menus_action.html'+url,AutoClose:3});
			}else{
				$.WMisMsgClose();
				$.WMisMsg({content:'<b class="red">操作失败</b>',AutoClose:3});
			}
		}
	});
}