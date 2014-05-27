/*打开窗口*/
var openVod = function (options) {
	var defaults = {
		title:'Html5 视频播放器',
		src:'http://www.ksphp.com/vod/test.mp4',
		width:640,
		height:390,
		controls:true,
		preload:true,
		autoplay:true,
		AlphaBG:0.5
	}
	var options = $.extend(defaults, options);
	//创建
	var CreatVodBox=function(){
		var h = $(window).height();
		var vh = (h - options.height - 30)/2;
		var html = '<section id="WebMisVodBg" style="height: '+h+'px; background-color: rgba(0,0,0,'+options.AlphaBG+');"><section id="WebMisVodCT" style="width: '+options.width+'px; margin-top: '+vh+'px"><div class="display">';
		html += '<header class="WebMisVodTop"><span class="title">'+options.title+'</span><em class="close">&nbsp;</em></header>';
		html += '<video src="'+options.src+'" width="100%" height="'+options.height+'" controls="'+options.controls+'" preload="'+options.preload+'" autoplay="'+options.autoplay+'"></video>';
		html += '</div></section></section>';
		$('body').prepend(html);
		$('#WebMisVodBg').fadeIn();
		//点击关闭窗口
		$('#WebMisVodCT .close').click(function(){
			$('#WebMisVodBg').fadeOut(function(){$(this).remove();});
		});
	}
	CreatVodBox();
}