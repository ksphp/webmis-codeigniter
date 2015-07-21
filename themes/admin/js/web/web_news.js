$(function(){
	//加载文件
	$.webmis.inc({files:[
		$webmis_plugin + 'Validform.min.js', //表单验证
		$webmis_plugin + 'highcharts/highcharts.js',	//图表插件
		$webmis_plugin + 'tinymce/tinymce.min.js',	//编辑器插件
		$webmis_plugin + 'jquery.form.js'
	]});
/*列表*/
	$('#listBG').webmis('TableOddColor');	//隔行换色
	$('#news_table').webmis('TableAdjust');  //调整宽度
/*搜索*/
	$('#ico-search').click(function(){
		if(!IsMobile){moWidth = 420;}
		$.webmis.win('open',{title:'搜索',width:moWidth,height:320});
		//加载内容
		$.get($base_url+'web_news/search.html',function(data){
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
		$.get($base_url+'web_news/add.html',function(data){
			$.webmis.win('load',data);   //加载内容
			newsClass();    //查询导航菜单
			newsForm(); //表单验证
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
			$.post($base_url+'web_news/edit.html',{'id':id},function(data){
				$.webmis.win('load',data);   //加载内容
				$('#newsID').val(id);
				newsClass();	//查询导航菜单
				newsForm(); //表单验证
			});
		}else{
			$.webmis.win('open',{content:'<b class="red">请选择！</b>',AutoClose:3});
		}
		return false;
	});
/*删除*/
	$('#ico-del').click(function(){
		actionDel('web_news/delData.html','web_news.html');
		return false;
	});
/*审核*/
	$('#ico-audit').click(function(){
		actionAudit('web_news/auditData.html','web_news.html');
		return false;
	});
/*图表*/
	$('#ico-chart').click(function(){
		if(!IsMobile){moWidth = 620; moHeight= 450;}
		$.webmis.win('open',{title:'统计图',width:moWidth,height:moHeight,overflow:true});
		//获取数据
		$.post($base_url+'web_news/chartData.html',function(data){
			//创建图表
			$('#WebMisWinCT').highcharts({
				chart: {type: 'pie'},
				title: {text: '<b>新闻分类统计图</b>'},
				tooltip: {pointFormat: '{series.name}: <b>{point.percentage}%</b>',percentageDecimals: 1},
				plotOptions: {pie: {allowPointSelect: true,cursor: 'pointer',dataLabels: {enabled: true,color: '#000000',connectorColor: '#000000',formatter: function() {return '<b>'+ this.point.name +'</b>: '+ this.y +' 条';}}}},
				series: [{name: '百分比',data: data}]
        	});
		},'json');
		return false;
	});
	
});

/*表单验证*/
function newsForm(){
	$('#newsSub').webmis('SubClass'); //按钮样式
	$.webmis.win('menu',{change:'#newsBody', menus:['基本信息','详细内容','图片管理']});  //选项卡
	//编辑器
	TinyMce('#tinymce');
	//验证提交
	$("#newsForm").Validform({
		ajaxPost:true,
		tiptype:2,
		callback:function(data){
			$.Hidemsg();
			if(data.status=="y"){
				var url = $('#getUrl').text();
				$.webmis.win('close','web_news.html'+url);
			}else{
				$.webmis.win('close');
				$.webmis.win('open',{content:'<b class="red">操作失败</b>',AutoClose:3});
			}
		}
	});
	//上传文件
	$('#listBG').webmis('TableOddColor');	//隔行换色
	var num = $("#NumIMG").val();
	if(num > 0){for(i=num;i>0;i--){uploadIMG(i);}}
}
/* 编辑器 */
function TinyMce(obj){
	if(!IsMobile){moWidth = 900;}
	tinymce.init({
		selector: obj,
		language: "zh_CN",
		convert_urls: false,
		height: 420,
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
}
/*分类联动*/
function newsClass(){
	$('#newsClass').webmis('AutoSelect',{
		url:$base_url+'web_news/getMenu.html',
		data:'0',
		getValType:':',
		type:'post',
		getVal:'#menus_fid'
	});
}
/*显示详细信息*/
function newsShow(id){
	if(!IsMobile){moWidth = 720; moHeight= 580;}
	$.webmis.win('open',{title:'预览',width:moWidth,height:moHeight,overflow:true});
	//加载内容
	$.post($base_url+'web_news/show.html',{'id':id},function(data){
		$.webmis.win('load',data);
	});
}

/* 添加图片 */
function AddIMG(){
	var id = $("#ImgID").val();
	var num = parseInt($("#NumIMG").val())+1;
	var html = '<tr id="ImgCT_'+num+'">';
	html += '<td><a href="" id="ImgShow_'+num+'" target="_black" title="点击查看"><img src="" width="100" height="65" /></a></td>';
	html += '<td class="tleft">';
	html += '<form action="'+$base_url+'web_news/upImgData/'+num+'.html" method="post" enctype="multipart/form-data" id="upIMG_'+num+'">';
	html += '<div>';
	html += '<input type="file" name="upimg_'+num+'" size="20" />';
	html += '<input type="submit" id="verifySub" value="上传" />';
	html += '<input type="hidden" id="ImgInput_'+num+'" name="img_url" value="" />';
	html += '<input type="hidden" name="id" value="'+id+'" />';
	html += '</div></form>';
	html += '<div style="padding-top: 5px;">图片地址：<span id="ImgURL_'+num+'"></span></div>';
	html += '</td>';
	html += '<td><a href="" onclick="RemoveIMG(\''+num+'\');return false;">删除</a></td>';
	html += '</tr>';
	//追加内容
	$("#listBG").append(html);
	$("#NumIMG").val(num);
	//触发事项
	uploadIMG(num);
}

/* 上传图片 */
function uploadIMG(num){
	var path = "/upload/images/news/";
	var lock = false;
	if(lock){return;} lock=true;
	$("#upIMG_"+num).ajaxForm({
		dataType:'json', 
		success:function(data) {
		if(data){
			$("#ImgURL_"+data.num).text(path+data.name);
			$("#ImgShow_"+data.num).attr("href",path+data.name).find('img').attr("src",path+data.name);
			$("#ImgInput_"+data.num).val(data.name);
		}
		lock=false;
	}});
	return false;
}

/* 删除图片 */
function RemoveIMG($num){
	var id = $("#ImgID").val();
	var url = $("#ImgInput_"+$num).val();
	if(id && url){
		var lock = false;
		if(lock){return;} lock=true;
		$.post($base_url+'web_news/RemoveIMG/'+$num+'.html',{'id':id,'img_url':url},function(data){
			if(data.status=='y'){
				$("#ImgCT_"+$num).remove();
			}else{
				alert('删除失败！');
			}
			lock=false;
		},"json");
	}else{
		$("#ImgCT_"+$num).remove();
	}
}