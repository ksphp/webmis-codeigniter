$(function(){
/*
列表
*/
	$('#listBG').WMisTableUI();   //表格样式
	$('#news_table').WMisMoveTW();  //调整表格宽度
/*
搜索
*/
	$('.action_sea').click(function(){
		$.WMisMsg({title:'搜索',width:340,height:300});
		//加载内容
		$.get($base_url+'web_news/search.html',function(data){
			$('#WebMisMsgCT').html(data);   //加载内容
			$('#seaSub').WMisSub(); //按钮样式
		});
	});
/*
添加
*/
	$('.action_add').click(function(){
		$.WMisMsg({title:'添加',width:840,height:580,overflow:true});
		//加载内容
		$.get($base_url+'web_news/add.html',function(data){
			$('#WebMisMsgCT').html(data);   //加载内容
			newsClass();    //查询导航菜单
			newsForm(); //表单验证
		});
		return false;
	});
/*
编辑
*/
	$('.action_edit').click(function(){
		var id = $('#listBG').WMisGetID();
		if(id){
			$.WMisMsg({title:'编辑',width:840,height:580,overflow:true});
			//加载内容
			$.post($base_url+'web_news/edit.html',{'id':id},function(data){
				$('#WebMisMsgCT').html(data);   //加载内容
				$('#newsID').val(id);
				newsClass();	//查询导航菜单
				newsForm(); //表单验证
			});
		}else{
			$.WMisMsg({content:'<b class="red">请选择！</b>',AutoClose:3});
		}
		return false;
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
				$.post($base_url+'web_news/delData.html',{'id':id},function(data){
					if(data){
						$.WMisMsgClose();
						var url = $('#getUrl').text();
						$.WMisMsg({content:'<b class="green">删除成功</b>',target:'web_news.html'+url,AutoClose:3});
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
/*
审核
*/
	$('.action_audit').click(function(){
		var id = $('#listBG').WMisGetID({type:' '});
		if(id!=' '){
			$.WMisMsg({title:'审核',width:240,height:140,content:'<div class="delData"><input type="submit" id="auditSub1" value="通过" />&nbsp;&nbsp;<input type="submit" id="auditSub2" value="不通过" /></div>'});
			$('#auditSub1,#auditSub2').WMisSub(); //按钮样式
			//通过
			$('#auditSub1').click(function(){
				auditData(id,'1');
			});
			//不通过
			$('#auditSub2').click(function(){
				auditData(id,'2');
			});
		}else{
			$.WMisMsg({content:'<b class="red">请选择！</b>',AutoClose:3});
		}
		//提交数据
		var auditData = function(id,state){
			$.post($base_url+'web_news/auditData.html',{'id':id,'state':state},function(data){
				if(data){
					$.WMisMsgClose();
					var url = $('#getUrl').text();
					$.WMisMsg({content:'<b class="green">审核成功</b>',target:'web_news.html'+url,AutoClose:3});
				}else{
					$.WMisMsgClose();
					$.WMisMsg({content:'<b class="red">审核失败</b>',AutoClose:3});
				}
			});
		}
	});
/*
图表
*/
	$('.action_chart').click(function(){
		$.WMisMsg({title:'统计图',width:620,height:450,overflow:true});
		//获取数据
		$.post($base_url+'web_news/chartData.html',function(data){
			//创建图表
			$('#WebMisMsgCT').highcharts({
				chart: {type: 'pie'},
				title: {text: '<b>新闻分类统计图</b>'},
				tooltip: {pointFormat: '{series.name}: <b>{point.percentage}%</b>',percentageDecimals: 1},
				plotOptions: {pie: {allowPointSelect: true,cursor: 'pointer',dataLabels: {enabled: true,color: '#000000',connectorColor: '#000000',formatter: function() {return '<b>'+ this.point.name +'</b>: '+ this.y +' 条';}}}},
				series: [{name: '百分比',data: data}]
        });
		},'json');
	});
	
});

//表单验证
function newsForm(){
	$('#newsSub').WMisSub(); //按钮样式
	//编辑器
	tinymce.init({
		selector:'#tinymce',
		theme: "modern",
		language: "zh_CN",
		plugins: [
			"advlist autolink lists link image charmap print preview hr anchor pagebreak",
			"searchreplace wordcount visualblocks visualchars code fullscreen",
			"insertdatetime media nonbreaking save table contextmenu directionality emoticons template paste textcolor"
			//"filemanager autoresize"
		],
		image_advtab: true,
		toolbar1: "insertfile undo redo | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | forecolor backcolor emoticons | link image media | code preview",
		file_browser_callback : function(field_name, url, type, win) {
			tinymce.activeEditor.windowManager.open({
   			url: '/webmis/plugin/filemanager/dialog.php?editor='+field_name+'&lang='+tinymce.settings.language,
   			title: 'FileManager',
   			filetype:'all',
				width: 900,
				height: 560
			}, {
				//custom_param: 1
				window : win,
				input : field_name
			});
		}
	});
	//验证提交
	$("#newsForm").Validform({
		ajaxPost:true,
		tiptype:2,
		callback:function(data){
			$.Hidemsg();
			if(data.status=="y"){
				var url = $('#getUrl').text();
				$.WMisMsgClose('web_news.html'+url);
			}else{
				$.WMisMsgClose();
				$.WMisMsg({content:'<b class="red">操作失败</b>',AutoClose:3});
			}
		}
	});
}

//分类联动
function newsClass(){
	$('#newsClass').AutoSelect({
		url:$base_url+'web_news/getMenu.html',
		data:'0',
		getValType:':',
		type:'post',
		getVal:'#menus_fid'
	});
}
//上传缩略图
function ajaxFileUpload(){
	var type = '1';
	$.ajaxFileUpload({
		url:$base_url+'web_news/upload/'+type+'.html',
		secureuri:false,
		fileElementId:'filedata',
			dataType: 'json',
			success: function (data, status){
				var obj = eval(data);
				$('#news_img').val(data.msg.url);
			},
			error: function (data, status, e){
				$('#news_img').val('');
			}
		});
}
//显示详细信息
function newsShow(id){
	$.WMisMsg({title:'预览',width:720,height:580,overflow:true});
	//加载内容
	$.post($base_url+'web_news/show.html',{'id':id},function(data){
		$('#WebMisMsgCT').html(data);
	});
}