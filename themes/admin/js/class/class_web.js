$(function(){
	$.webmis.inc({files:[$webmis_plugin+'Validform.min.js']});
/*列表*/
	$('#listBG').webmis('TableOddColor');	//隔行换色
	$('#class_table').webmis('TableAdjust');  //调整宽度
/*搜索*/
	$('#ico-search').click(function(){
		if(!IsMobile){moWidth = 420;}
		$.webmis.win('open',{title:'搜索',width:moWidth,height:320});
		//加载内容
		$.get($base_url+'class_web/search.html',function(data){
			$.webmis.win('load',data);   //加载内容
			$('#seaSub').webmis('SubClass'); //按钮样式
		});
		return false;
	});
/*添加*/
	$('#ico-add').click(function(){
		if(!IsMobile){moWidth = 600; moHeight= 460;}
		$.webmis.win('open',{title:'添加',width:moWidth,height:moHeight,overflow:true});
		//加载内容
		$.get($base_url+'class_web/add.html',function(data){
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
			if(!IsMobile){moWidth = 600; moHeight= 460;}
			$.webmis.win('open',{title:'编辑',width:moWidth,height:moHeight,overflow:true});
			//加载内容
			$.post($base_url+'class_web/edit.html',{'id':id},function(data){
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
		actionDel('class_web/delData.html','class_web.html');
		return false;
	});
/*审核*/
	$('#ico-audit').click(function(){
		actionAudit('class_web/auditData.html','class_web.html');
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
				$.webmis.win('close','class_web.html'+url);
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
		url:$base_url+'class_web/getMenu.html',
		data:'0',
		type:'post',
		getVal:'#menus_fid'
	});
}