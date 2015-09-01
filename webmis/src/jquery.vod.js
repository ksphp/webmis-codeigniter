/*打开窗口*/
var openVod = function (options) {
	var defaults = {
		title:'Html5 视频播放器',
		src:'http://www.ksphp.com/upload/vod/test.mp4',
		poster:'http://www.ksphp.com/upload/vod/test.jpg',
		width:680,
		height:420,
		controls:'controls',
		preload:'preload',
		autoplay:'',
		AlphaBG:0.5
	}
	var options = $.extend(defaults, options);
	//创建
	var CreatVodBox=function(){
		var h = $(window).height();
		var vh = (h - options.height - 30)/2;
		var html = '<section id="WebMisVodBg" style="height: '+h+'px; background-color: rgba(0,0,0,'+options.AlphaBG+');"><section id="WebMisVodCT" style="width: '+options.width+'px; margin-top: '+vh+'px"><div class="display">';
		html += '<header class="WebMisVodTop"><span class="title">'+options.title+'</span><em class="close">&nbsp;</em></header>';
		html += '<video src="'+options.src+'" poster="'+options.poster+'" width="100%" height="'+options.height+'" '+options.controls+' '+options.preload+' '+options.autoplay+'></video>';
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