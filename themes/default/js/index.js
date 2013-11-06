$(function(){
	//加载文件
	$.webmis.inc({files:[
		$webmis_plugin + 'slide/jquery.slides.min.js',	//广告插件
		$webmis_plugin + 'slide/slide.js'	//广告插件
	]});
	//Index AD
	$('#slides').slidesjs({ width: 1000,height: 320,play: {active: true,auto: true,interval: 5000}});
	//上下滚动
	$("#inMsg").Slide({effect : "scroolTxt",speed : "normal",timer : 3000,steps:1});
});