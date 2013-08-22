$(function(){
/*
列表
*/
	$('#listBG').webmis('TableOddColor');	//隔行换色
	$('#menus_table').webmis('TableAdjust');  //调整宽度
/*
搜索
*/
	$('.action_sea').click(function(){
		$.webmis.win.open({title:'搜索',width:340,height:280});
		//加载内容
		$.get($base_url+'sys_menus/search.html',function(data){
			$.webmis.win.load(data);   //加载内容
			$('#seaSub').webmis('SubClass'); //按钮样式
		});
		return false;
	});
/*
添加
*/
	$('.action_add').click(function(){
		$.webmis.win.open({title:'添加',width:640,height:420});
		//加载内容
		$.get($base_url+'sys_menus/add.html',function(data){
			$.webmis.win.load(data);   //加载内容
			menusClass();    //查询导航菜单
			menusForm(); //表单验证
		});
		return false;
	});
/*
编辑
*/
	$('.action_edit').click(function(){
		var id = $('#listBG').webmis('GetInputID');
		if(id){
			$.webmis.win.open({title:'编辑',width:640,height:420});
			//加载内容
			$.post($base_url+'sys_menus/edit.html',{'id':id},function(data){
				$.webmis.win.load(data);   //加载内容
				$('#menusID').val(id);
				menusClass();    //查询导航菜单
				menusForm(); //表单验证
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
		actionDel('sys_menus/delData.html','sys_menus.html');
		return false;
	});
	
});

/*表单验证*/
function menusForm(){
	$('#menusSub').webmis('SubClass'); //按钮样式
	//验证提交
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
				$.webmis.win.close();
				$.webmis.win.open({content:'<b class="green">操作成功</b>',target:'sys_menus.html'+url,AutoClose:3});
			}else{
				$.webmis.win.close();
				$.webmis.win.open({content:'<b class="red">操作失败</b>',AutoClose:3});
			}
		}
	});
}

/*分类联动*/
function menusClass(){
	$('#menusClass').webmis('AutoSelect',{
		url:$base_url+'sys_menus/getMenu.html',
		data:'0',
		type:'post',
		getVal:'#menus_fid'
	});
}