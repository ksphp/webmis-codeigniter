$(function(){
	$.webmis.inc({files:[$webmis_plugin+'Validform.min.js']});
/*列表*/
	$('#listBG').webmis('TableOddColor');	//隔行换色
	$('#menus_table').webmis('TableAdjust');  //调整宽度
/*搜索*/
	$('#ico-search').click(function(){
		if(!IsMobile){moWidth = 420;}
		$.webmis.win('open',{title:$(this).text(),width:moWidth,height:320});
		//加载内容
		$.get($base_url+'sys_menus/search.html',function(data){
			$.webmis.win('load',data);   //加载内容
			$('#seaSub').webmis('SubClass'); //按钮样式
		});
		return false;
	});
/*添加*/
	$('#ico-add').click(function(){
		if(!IsMobile){moWidth = 720; moHeight= 540;}
		$.webmis.win('open',{title:$(this).text(),width:moWidth,height:moHeight,overflow:true});
		//加载内容
		$.get($base_url+'sys_menus/add.html',function(data){
			$.webmis.win('load',data);   //加载内容
			menusClass();    //查询导航菜单
			menusForm(); //表单验证
		});
		return false;
	});
/*编辑*/
	$('#ico-edit').click(function(){
		var id = $('#listBG').webmis('GetInputID');
		if(id){
			if(!IsMobile){moWidth = 720; moHeight= 540;}
			$.webmis.win('open',{title:$(this).text(),width:moWidth,height:moHeight,overflow:true});
			//加载内容
			$.post($base_url+'sys_menus/edit.html',{'id':id},function(data){
				$.webmis.win('load',data);   //加载内容
				$('#menusID').val(id);
				menusClass();    //查询导航菜单
				menusForm(); //表单验证
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
				$.webmis.win('close','sys_menus.html'+url);
			}else{
				$.webmis.win('close');
				$.webmis.win('open',{content:'<b class="red">操作失败</b>',AutoClose:3});
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