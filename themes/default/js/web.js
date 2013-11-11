var IsMobile = $('#IsMobile').text();
var moWidth = $(document).width()-20;
var moHeight = $(window).height()-60;
$(function(){
	//版本信息
	$('#webmisVersion').webmisVersion();
	$('#nav').webmis('Menu');
});