/*打开窗口*/
var openWin = function (options) {
	var defaults = {
		title:'信息提示',
		width:240,
		height:150,
		content:'<div class="load"><span class="onLoad">&nbsp;</span><span class="text">正在加载</span></div>',
		target:false,
		overflow:false,
		AutoClose:false,
		AlphaBG:0.4
	}
	var options = $.extend(defaults, options);
	//创建
	var creatWinbox=function(){
		var html = '<div id="WebMisWinBg" class="WebMisWinBg">&nbsp;</div>';
		html += '<span id="WebMisWin" class="WebMisWin" style="width:'+options.width+'px;height:'+options.height+'px">';
		html += '  <div id="WebMisWinTop" class="WebMisWin_top">';
		html += '    <span class="title">'+options.title+'</span>';
		html += '    <a href="#" class="close">&nbsp;</a>';
		html += '  </div>';
		html += '  <div class="WebMisWin_ct">'+options.content+'</div>';
		html += '</span>';
		//加载信息框
		$('#WebMisWin').remove();
		$('body').prepend(html);
		//点击关闭窗口
		$('#WebMisWin .close').click(function(){
			closeWin(options.target);
			return false;
		});
		//ESC键关闭
		$(document).keydown(function(e){
			if(e.which == 27){closeWin(options.target);}
		});
		//获取参数
		var winWindt = $(window).width();
		var winHeight = $(window).height();
		var bodyWidth = $(document).width();
		var bodyHeight = $(document).height();
		var Win = $('#WebMisWin');
		//计算垂直居中位置
		var mleft = (winWindt-Win.width())/2-10;
		var mtop = (winHeight-Win.height())/2;
		//限制顶部
		if(mtop < 10){mtop = 10;}
		//显示信息框
		Win.css({'left':mleft+"px",'top':mtop+"px"}).slideDown('fast');
		$('#WebMisWinBg').css({'width':bodyWidth+"px",'height':bodyHeight+"px"}).fadeTo("slow",options.AlphaBG);
		//添加移动
		WebMisWinMove('#WebMisWinTop','#WebMisWin');
	}
	//类型
	if(options.overflow){
		options.content = '<div id="WebMisWinCT" style="width: 100%; height: '+(options.height-55)+'px; overflow: auto;">'+options.content+'</div>';
	}else if(options.AutoClose){
		options.content = '<div style="line-height: 30px; text-align: center; padding-top: 10px;">'+options.content;
		options.content += '<br /><span style="color: #666;"><b id="WebMisWinIntNum" class="red">&nbsp;</b> 秒后自动关闭</span>';
		options.content += '</div>';
		//开始倒计时
		WinInterval(options.AutoClose,options.target,'#WebMisWinIntNum');
	}else{
		options.content = '<div id="WebMisWinCT">'+options.content+'</div>';
	}
	creatWinbox();
}

/*关闭窗口*/
var closeWin = function (target) {
	$('#WebMisWin').slideUp('fast');
	$('#WebMisWinBg').remove();
	if(target && target!='false'){
		window.location.href = $base_url+target;
	}
	clearInterval(WebMisInt);
}

/*加载内容*/
var loadWin = function (data) {
	$('#WebMisWinCT').html(data);
}

/*添加选项卡*/
var addWinMenu = function (options) {
	var defaults = {change: '#winTopMenuBody', menus: ['选项卡1','选项卡2','选项卡3']}
	var options = $.extend(defaults, options);
	//添加选项
	var menu = options.menus;
	var html = '<span id="WebMisTopMenu" class="WebMisTopMenu">';
	var an = 'an1';
	for (var i=0; i<menu.length; i++) {
		if (i!=0) {an = 'an2';}
		html += '<a herf="#" class="'+an+'" num="'+i+'">'+menu[i]+'</a>';
	}
	html += '</span>';
	$('#WebMisWinTop').append(html);
	//添加事项
 		$('#WebMisTopMenu a').click(function() {
		var num = $(this).attr('num');
		var n = 0;
		//初始化
		$('#WebMisTopMenu a').each(function(){
			$(this).attr('class','an2');
			$(options.change+n).hide();
			n++;
		});
		//改变
		$(this).attr('class','an1');
		$(options.change+num).show();
	});
}

/* 倒计时信息提示 */
var WebMisInt,WebMisTime;
function WinInterval(time,target,numID){
	WebMisTime = time;
	WebMisInt = setInterval("WinIntervalFun('"+target+"','"+numID+"')",1000);
}
function WinIntervalFun(target,numID){
	if (WebMisTime == 0) {
		$.webmis.win('close',target);
		clearInterval(WebMisInt);
	}
	$(numID).text(WebMisTime);
	WebMisTime--;
}

/* 移动窗口 */
function WebMisWinMove(click,move){
	var _move = false;
	var _x,_y,_w,_h,x,y;
	var padding = 0;
	//鼠标按下
	$(click).unbind().mousedown(function(e){
		_move=true;
		_x=e.pageX-parseInt($(move).css("left"));
		_y=e.pageY-parseInt($(move).css("top"));
		_w = $(window).width()-padding;
		_h = $(window).height()-padding;
	});
	//鼠标移动
	$(document).mousemove(function(e){
		if(_move){
			x=e.pageX-_x;
			y=e.pageY-_y;
			//控制范围
			if(y < padding){y=padding};
			if(x > _w){x=_w};
			if(y > _h){y=_h};
			//当前位置
			$(move).css({'top':y,'left':x});
		}
	}).mouseup(function(){
		_move=false;
	});
}