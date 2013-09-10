$(function(){
	$.webmis.inc({files:[$webmis_plugin+'Validform.min.js']});
/*列表*/
	$('#listBG').webmis('TableOddColor');	//隔行换色
	$('#book_table').webmis('TableAdjust');  //调整宽度
/*搜索*/
	$('#ico-search').click(function(){
		if(!IsMobile){moWidth = 340;}
		$.webmis.win('open',{title:'搜索',width:moWidth,height:260});
		//加载内容
		$.get($base_url+'web_book/search.html',function(data){
			$.webmis.win('load',data);   //加载内容
			$('#seaSub').webmis('SubClass'); //按钮样式
		});
		return false;
	});
/*编辑*/
	$('#ico-edit').click(function(){
		var id = $('#listBG').webmis('GetInputID');
		if(id){
			if(!IsMobile){moWidth = 500; moHeight= 420;}
			$.webmis.win('open',{title:'编辑',width:moWidth,height:moHeight,overflow:true});
			//加载内容
			$.post($base_url+'web_book/edit.html',{'id':id},function(data){
				$.webmis.win('load',data);   //加载内容
				$('#bookID').val(id);
				bookForm(); //表单验证
			});
		}else{
			$.webmis.win('open',{content:'<b class="red">请选择！</b>',AutoClose:3});
		}
		return false;
	});
/*删除*/
	$('.action_del').click(function(){
		actionDel('web_book/delData.html','web_book.html');
		return false;
	});
	
});

/*表单验证*/
function bookForm(){
	$('#bookSub').webmis('SubClass'); //按钮样式
	//验证提交
	$("#bookForm").Validform({
		ajaxPost:true,
		tiptype:2,
		callback:function(data){
			$.Hidemsg();
			if(data.status=="y"){
				var url = $('#getUrl').text();
				$.webmis.win('close','web_book.html'+url);
			}else{
				$.webmis.win('close');
				$.webmis.win('open',{content:'<b class="red">操作失败</b>',AutoClose:3});
			}
		}
	});
}

/*详细信息*/
function bookShow(id){
	if(!IsMobile){moWidth = 500; moHeight= 420;}
	$.webmis.win('open',{title:'预览',width:moWidth,height:moHeight,overflow:true});
	//加载内容
	$.post($base_url+'web_book/show.html',{'id':id},function(data){
		$.webmis.win('load',data);
	});
}