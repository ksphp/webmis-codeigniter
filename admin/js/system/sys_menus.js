$(function(){
/*
列表
*/
	$('#listBG').WMisTableUI();   //表格样式
	$('#menus_table').WMisMoveTW();  //调整表格宽度
/*
搜索
*/
	$('.action_sea').click(function(){
		$.WMisMsg({title:'搜索',width:340,height:280});
		//加载内容
		$.get($base_url+'sys_menus/search.html',function(data){
			$('#WebMisMsgCT').html(data);   //加载内容
			$('#seaSub').WMisSub(); //按钮样式
		});
	});
/*
添加
*/
	$('.action_add').click(function(){
		$.WMisMsg({title:'添加',width:500,height:420});
		//加载内容
		$.get($base_url+'sys_menus/add.html',function(data){
			$('#WebMisMsgCT').html(data);   //加载内容
			$('#addSub').WMisSub(); //按钮样式
			menusClass();    //查询导航菜单
			menusForm(); //表单验证
			
		});
	});
/*
编辑
*/
	$('.action_edit').click(function(){
		var id = $('#listBG').WMisGetID();
		if(id){
			$.WMisMsg({title:'编辑',width:500,height:420});
			//加载内容
			$.post($base_url+'sys_menus/edit.html',{'id':id},function(data){
				$('#WebMisMsgCT').html(data);   //加载内容
				$('#menusID').val(id);
				$('#editSub').WMisSub(); //按钮样式
				menusClass();    //查询导航菜单
				menusForm(); //表单验证
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
				$.post($base_url+'sys_menus/delData.html',{'id':id},function(data){
					if(data){
						$.WMisMsgClose();
						var url = $('#getUrl').text();
						$.WMisMsg({content:'<b class="green">删除成功</b>',target:'sys_menus.html'+url,AutoClose:3});
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
function menusForm(){
	$("#menusForm").Validform({
		ajaxPost:true,
		tiptype:2,
		beforeCheck:function(data){
			var perm=0;
			$('input[name=permVal]:checked').each(function(){
				perm += parseInt($(this).val());
			});
			$('#menus_perm').val(perm);
		},
		callback:function(data){
			$.Hidemsg();
			if(data.status=="y"){
				var url = $('#getUrl').text();
				$.WMisMsgClose();
				$.WMisMsg({content:'<b class="green">操作成功</b>',target:'sys_menus.html'+url,AutoClose:3});
			}else{
				$.WMisMsgClose();
				$.WMisMsg({content:'<b class="red">操作失败</b>',AutoClose:3});
			}
		}
	});
}

//分类联动
function menusClass(){
	$('#menusClass').AutoSelect({
		url:$base_url+'sys_menus/getMenu.html',
		data:'0',
		type:'post',
		getVal:'#menus_fid'
	});
}