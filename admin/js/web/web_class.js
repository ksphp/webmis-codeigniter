$(function(){
	$.webmis.inc({files:[$webmis_plugin+'Validform.min.js']});
/*列表*/
	$('#listBG').webmis('TableOddColor');	//隔行换色
	$('#class_table').webmis('TableAdjust');  //调整宽度
/*搜索*/
	$('#ico-search').click(function(){
		$.webmis.win('open',{title:'搜索',width:340,height:250});
		//加载内容
		$.get($base_url+'web_class/search.html',function(data){
			$.webmis.win('load',data);   //加载内容
			$('#seaSub').webmis('SubClass'); //按钮样式
		});
		return false;
	});
/*添加*/
	$('#ico-add').click(function(){
		$.webmis.win('open',{title:'添加',width:500,height:380});
		//加载内容
		$.get($base_url+'web_class/add.html',function(data){
			$.webmis.win('load',data);   //加载内容
			newsClass();    //查询导航菜单
			classForm(); //表单验证
			
		});
		return false;
	});
/*编辑*/
	$('#ico-edit').click(function(){
		var id = $('#listBG').webmis('GetInputID');
		if(id){
			$.webmis.win('open',{title:'编辑',width:500,height:380,overflow:true});
			//加载内容
			$.post($base_url+'web_class/edit.html',{'id':id},function(data){
				$.webmis.win('load',data);   //加载内容
				$('#classID').val(id);
				newsClass();    //查询导航菜单
				classForm(); //表单验证
			});
		}else{
			$.webmis.win('open',{content:'<b class="red">请选择！</b>',AutoClose:3});
		}
		return false;
	});
/*删除*/
	$('#ico-del').click(function(){
		actionDel('web_class/delData.html','web_class.html');
		return false;
	});
	
});

/*表单验证*/
function classForm(){
	$('#classSub').webmis('SubClass'); //按钮样式
	//验证提交
	$("#classForm").Validform({
		ajaxPost:true,
		tiptype:2,
		callback:function(data){
			$.Hidemsg();
			if(data.status=="y"){
				var url = $('#getUrl').text();
				$.webmis.win('close','web_class.html'+url);
			}else{
				$.webmis.win('close');
				$.webmis.win('open',{content:'<b class="red">操作失败</b>',AutoClose:3});
			}
		}
	});
}
/*分类联动*/
function newsClass(){
	$('#newsClass').webmis('AutoSelect',{
		url:$base_url+'web_class/getMenu.html',
		data:'0',
		type:'post',
		getVal:'#menus_fid'
	});
}