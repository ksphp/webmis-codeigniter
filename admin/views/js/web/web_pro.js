$(function(){
	//加载文件
	$.webmis.inc({files:[
		$webmis_plugin + 'Validform.min.js', //表单验证
		$webmis_plugin + 'tinymce/tinymce.min.js'	//编辑器插件
	]});
/*列表*/
	$('#listBG').webmis('TableOddColor');	//隔行换色
	$('#table').webmis('TableAdjust');  //调整宽度
/*搜索*/
	$('#ico-search').click(function(){
		if(!IsMobile){moWidth = 340;}
		$.webmis.win('open',{title:'搜索',width:moWidth,height:250});
		//加载内容
		$.get($base_url+'web_pro/search.html',function(data){
			$.webmis.win('load',data);   //加载内容
			$('#seaSub').webmis('SubClass'); //按钮样式
		});
		return false;
	});
/*添加*/
	$('#ico-add').click(function(){
		if(!IsMobile){moWidth = 840; moHeight= 560;}
		$.webmis.win('open',{title:'添加',width:moWidth,height:moHeight,overflow:true});
		//加载内容
		$.get($base_url+'web_pro/add.html',function(data){
			$.webmis.win('load',data);   //加载内容
			proClass();    //查询导航菜单
			proForm(); //表单验证
		});
		return false;
	});
/*编辑*/
	$('#ico-edit').click(function(){
		var id = $('#listBG').webmis('GetInputID');
		if(id){
			if(!IsMobile){moWidth = 840; moHeight= 560;}
			$.webmis.win('open',{title:'编辑',width:moWidth,height:moHeight,overflow:true});
			//加载内容
			$.post($base_url+'web_pro/edit.html',{'id':id},function(data){
				$.webmis.win('load',data);   //加载内容
				$('#proID').val(id);
				proClass();	//查询导航菜单
				proForm(); //表单验证
			});
		}else{
			$.webmis.win('open',{content:'<b class="red">请选择！</b>',AutoClose:3});
		}
		return false;
	});
/*删除*/
	$('#ico-del').click(function(){
		actionDel('web_pro/delData.html','web_pro.html');
		return false;
	});
/*审核*/
	$('#ico-audit').click(function(){
		actionAudit('web_pro/auditData.html','web_pro.html');
		return false;
	});
	
});

/* 表单验证 */
function proForm(){
	$('#proSub').webmis('SubClass'); //按钮样式
	$.webmis.win('menu',{change:'#proBody', menus:['基本信息','详细内容']});  //选项卡
	//编辑器
	if(!IsMobile){moWidth = 900;}
	tinymce.init({
		selector:'#tinymce',
		language: "zh_CN",
		convert_urls: false,
		height: 400,
		menubar: false,
		plugins: [
			"advlist autolink lists link image charmap print preview hr anchor pagebreak",
			"searchreplace wordcount visualblocks visualchars code fullscreen",
			"insertdatetime media nonbreaking save table contextmenu directionality emoticons template paste textcolor"
		],
		toolbar1: "insertfile undo redo | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | forecolor backcolor emoticons | link image media | code preview",
		file_browser_callback : function(field_name, url, type, win) {
			var file = $('#'+field_name).val();
			tinymce.activeEditor.windowManager.open({
   			url: $base_url+'sys_filemanager.html?action=editor&editor='+field_name+'&file='+file,
   			title: 'FileManager',
   			classes:'filemanager',
				width: moWidth,
				height: 580
			}, {
				custom_param: 1
			});
		}
	});
	//验证提交
	$("#proForm").Validform({
		ajaxPost:true,
		tiptype:2,
		callback:function(data){
			$.Hidemsg();
			if(data.status=="y"){
				var url = $('#getUrl').text();
				$.webmis.win('close','web_pro.html'+url);
			}else{
				$.webmis.win('close');
				$.webmis.win('open',{content:'<b class="red">操作失败</b>',AutoClose:3});
			}
		}
	});
}
/* 分类联动 */
function proClass(){
	$('#proClass').webmis('AutoSelect',{
		url:$base_url+'web_pro/getMenu.html',
		data:'0',
		getValType:':',
		type:'post',
		getVal:'#menus_fid'
	});
}
/* 显示详细信息 */
function proShow(id){
	if(!IsMobile){moWidth = 720; moHeight= 580;}
	$.webmis.win('open',{title:'预览',width:moWidth,height:moHeight,overflow:true});
	//加载内容
	$.post($base_url+'web_pro/show.html',{'id':id},function(data){
		$.webmis.win('load',data);
	});
}