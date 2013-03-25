/*----------------------------
信息提示框
----------------------------*/
/*
	** ******用法******
	** title:标题 默认：'信息提示'
	** width:宽 默认：240
	** height:高 默认：150
	** content:内容
	** target:跳转地址 默认为空：完成后不跳转
	** overflow、AutoClose: 二选一用法，1、overflow:true 内容加自动滚动条；2、AutoClose:3 3秒后自动关闭
	** AlphaBG: 灰色透明背景 默认：0.6
	
	** ******其他******
	** 关闭信息框：$.WMisMsgClose();
	** 先弹出窗口后加载内容：$('#WebMisMsgCT').html(data);
*/
$(function(){
	$.WMisMsg=function(options){
		var defaults = {
			title:'信息提示',
			width:240,
			height:150,
			content:'<div class="load"><span class="onLoad">&nbsp;</span><span class="text">正在加载</span></div>',
			target:false,
			overflow:false,
			AutoClose:false,
			AlphaBG:0.6
		}
		var options = $.extend(defaults, options);
		//创建
		var creatMsgbox=function(){
			var html = '<div id="WebMisMsgBg" class="WebMisMsgBg">&nbsp;</div>';
			html += '<span id="WebMisMsg" class="WebMisMsg" style="width:'+options.width+'px;height:'+options.height+'px">';
			html += '  <div id="WebMisMsgTop" class="WebMisMsg_top">';
			html += '    <span class="title">'+options.title+'</span>';
			html += '    <a href="#" class="close">&nbsp;</a>';
			html += '  </div>';
			html += '  <div class="WebMisMsg_ct">'+options.content+'</div>';
			html += '</span>';
			//加载信息框
			$('#WebMisMsg').remove();
			$('body').prepend(html);
			//点击关闭窗口
			$('#WebMisMsg .close').click(function(){
				$.WMisMsgClose(options.target);
			});
			//ESC键关闭
			$(document).keydown(function(e){
				if(e.which == 27){$.WMisMsgClose(options.target);}
			});
			
			//获取参数
			var bodyWidth = $(document).width();
			var bodyHeight = $(document).height();
			var msg = $('#WebMisMsg');
			//计算垂直居中位置
			var mleft = (bodyWidth-msg.width())/2-10;
			var mtop = (bodyHeight-msg.height())/2;
			//限制顶部
			if(mtop < 10){mtop = 10;}
			//显示信息框
			msg.css({'left':mleft+"px",'top':mtop+"px"}).slideDown('fast');
			$('#WebMisMsgBg').css({'width':bodyWidth+"px",'height':bodyHeight+"px"}).fadeTo("slow",options.AlphaBG);
			//添加移动
			WebMisMsgMove('#WebMisMsgTop','#WebMisMsg');
		}

		//提示框类型
		if(options.overflow){
			options.content = '<div id="WebMisMsgCT" style="width: 100%; height: '+(options.height-55)+'px; overflow: auto;">'+options.content+'</div>';
		}else if(options.AutoClose){
			options.content = '<div style="line-height: 30px; text-align: center; padding-top: 10px;">'+options.content;
			options.content += '<br /><span style="color: #666;"><b id="WebMisMsgIntNum" class="red">&nbsp;</b> 秒后自动关闭</span>';
			options.content += '</div>';
			//开始倒计时
			msgInterval(options.AutoClose,options.target,'#WebMisMsgIntNum');
		}else{
			options.content = '<div id="WebMisMsgCT">'+options.content+'</div>';
		}
		creatMsgbox();
	};
	//关闭信息提示
	$.WMisMsgClose=function(target){
		$('#WebMisMsg').slideUp('fast');
		$('#WebMisMsgBg').remove();
		if(target && target!='false'){
			window.location.href = $base_url+target;
		}
		clearInterval(WebMisInt);
	};
});

//倒计时信息提示
var WebMisInt,WebMisTime;
function msgInterval(time,target,numID){
	WebMisTime = time;
	WebMisInt = setInterval("msgIntervalFun('"+target+"','"+numID+"')",1000);
}
function msgIntervalFun(target,numID){
	if (WebMisTime == 0) {
		$.WMisMsgClose(target);
		clearInterval(WebMisInt);
	}
	$(numID).text(WebMisTime);
	WebMisTime--;
}
//移动信息提示
function WebMisMsgMove(click,move){
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