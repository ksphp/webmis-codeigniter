$(function(){
	$.webmis.inc({files:[
		$webmis_plugin + 'form/Validform.min.js',
		$webmis_plugin + 'chart/Chart.min.js',
		$webmis_plugin + 'edit/tinymce/tinymce.min.js',
		$webmis_plugin + 'form/jquery.form.js',
		$webmis_plugin + 'date/datepicker/datepicker.js',
		$webmis_plugin + 'date/datepicker/datepicker.css'
	]});
/* Index */
	$('#listBG').webmis('TableOddColor');
	$('#news_table').webmis('TableAdjust');
/* Search */
	$('#ico-search').click(function(){
		if(!IsMobile){moWidth = 420;}
		$.webmis.win('open',{title:$(this).text(),width:moWidth,height:320});
		// Content
		$.get($base_url+'web_news/search.html',function(data){
			$.webmis.win('load',data);
			$('#seaSub').webmis('SubClass');
		});
		return false;
	});
/* Add */
	$('#ico-add').click(function(){
		if(!IsMobile){moWidth = 840; moHeight= 560;}
		$.webmis.win('open',{title:$(this).text(),width:moWidth,height:moHeight,overflow:true});
		// Content
		$.get($base_url+'web_news/add.html',function(data){
			$.webmis.win('load',data);
			newsClass();
			newsForm();
		});
		return false;
	});
/* Edit */
	$('#ico-edit').click(function(){
		var id = $('#listBG').webmis('GetInputID');
		if(id){
			if(!IsMobile){moWidth = 840; moHeight= 560;}
			$.webmis.win('open',{title:$(this).text(),width:moWidth,height:moHeight,overflow:true});
			// Content
			$.post($base_url+'web_news/edit.html',{'id':id},function(data){
				$.webmis.win('load',data);
				$('#newsID').val(id);
				newsClass();
				newsForm();
			});
		}else{
			$.get($base_url+'home/getLang/msg',{msg_title:'',msg_select:'',msg_auto_close:''},function (data){
				$.webmis.win('open',{title:data.msg_title, content:'<b class="red">'+data.msg_select+'</b>',AutoClose:3,AutoCloseText:data.msg_auto_close});
			},'json');
		}
		return false;
	});
/* Del */
	$('#ico-del').click(function(){
		actionDel('web_news/delData.html','web_news.html');
		return false;
	});
/* Audit */
	$('#ico-audit').click(function(){
		actionAudit('web_news/auditData.html','web_news.html');
		return false;
	});
/* Chart */
	$('#ico-chart').click(function(){
		if(!IsMobile){moWidth = 620; moHeight= 450;}
		$.webmis.win('open',{title:$(this).text(),width:moWidth,height:moHeight,overflow:true});
		// Content
		$.post($base_url+'web_news/chartData.html',function(data){
			// Create
			$('#WebMisWinCT').html('<div style="padding: 50px;"><canvas id="myChart" style="width: 100%; height: 100%;"></canvas>');
			var ctx = $("#myChart").get(0).getContext("2d");
			var myNewChart = new Chart(ctx).Pie(data);
		},'json');
		return false;
	});
	
});

/* Form validation */
function newsForm(){
	$('#newsSub').webmis('SubClass');
	$.webmis.win('menu',{change:'#newsBody', menus:[$('#TabName1').text(),$('#TabName2').text(),$('#TabName3').text()]});
	// Lang
	var lang = $('#Lang').text();
	var Lang = '';
	if(lang=='zh-cn'){
		Lang = 'zh_CN';
		$.webmis.inc({files:[$webmis_plugin + 'date/datepicker/datepicker.zh-CN.js']});
	}
	// Date
	$('#datepicker').datepicker({dateFormat: "yyyy-mm-dd",weekStart: 1});
	// Editr
	TinyMce('#tinymce',Lang);
	// Validform
	$("#newsForm").Validform({ajaxPost:true,tiptype:2,
		callback:function(data){
			$.Hidemsg();
			if(data.status=="y"){
				var url = $('#getUrl').text();
				$.webmis.win('close','web_news.html'+url);
			}else{
				$.webmis.win('close');
				$.webmis.win('open',{title:data.title,content:'<b class="red">'+data.msg+'</b>',AutoClose:3,AutoCloseText:data.text});
			}
		}
	});
	// Upload
	$('#listBG').webmis('TableOddColor');
	var num = $("#NumIMG").val();
	if(num > 0){for(i=num;i>0;i--){uploadIMG(i);}}
}
/* Editr */
function TinyMce(obj,Lang){
	tinymce.init({
		selector: obj,
		language: Lang,
		convert_urls: false,
		height: 428,
		menubar: false,
		plugins: [
			"advlist autolink lists link image charmap print preview hr anchor pagebreak",
			"searchreplace wordcount visualblocks visualchars code fullscreen",
			"insertdatetime media nonbreaking save table contextmenu directionality emoticons template paste textcolor"
		],
		toolbar1: "insertfile undo redo | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | forecolor backcolor emoticons | link image media | code preview"
	});
}
/* Menus */
function newsClass(){
	$('#newsClass').webmis('AutoSelect',{
		url:$base_url+'web_news/getMenu.html',
		data:'0',
		getValType:':',
		type:'post',
		getVal:'#menus_fid'
	});
}
/* News Show */
function newsShow(id,title){
	if(!IsMobile){moWidth = 720; moHeight= 580;}
	$.webmis.win('open',{title:title,width:moWidth,height:moHeight,overflow:true});
	//加载内容
	$.post($base_url+'web_news/show.html',{'id':id},function(data){
		$.webmis.win('load',data);
	});
}

/* Add IMG */
function AddIMG(){
	var id = $("#ImgID").val();
	var num = parseInt($("#NumIMG").val())+1;
	$.get($base_url+'web_news/getImghtml/'+id+'/'+num+'.html',function (html){
		// Content
		$("#listBG").append(html);
		$("#NumIMG").val(num);
		// On
		uploadIMG(num);
	});
}

/* Upload IMG */
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

/* Remove IMG */
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
				alert('Error！');
			}
			lock=false;
		},"json");
	}else{
		$("#ImgCT_"+$num).remove();
	}
}