var msgCreate = function (options,obj) {
	var defaults = {
		width: 210,
		height: 80,
		top: -160,
		left: -120,
		arrowLeft: 70,
		arrowStyle: true,
		reverse: true,
		bgColor: 'rgba(100,100,100,0.8)',
		arrowColor: 'rgba(0,0,0,0.6)'
	}
	var options = $.extend(defaults, options);
	//
	obj.find('.msgShowBG').css({
		width:options.width, height:options.height, margin: options.top+'px 0 0 '+options.left+'px', 'background-color':options.bgColor,
		display:'none', position:'absolute', 'z-index':100, 'line-height':'22px', 'padding':'10px', 'border-radius':'6px', 'box-shadow':'1px 1px 2px #000'
	});
	//添加箭头
	var atop = options.height+10;
	if (options.reverse) {atop = -30;}
	var html = '<canvas id="msgArrow" width="100" height="20" style="position: absolute; z-index: 101; margin: '+atop+'px 0 0 '+options.arrowLeft+'px">Html5标签</canvas>';
	obj.find('.msgShowBG').prepend(html);
	//Html5 画图
	c = obj.find("#msgArrow")[0];
	cxt=c.getContext("2d");
	cxt.fillStyle = options.arrowColor;
	if (options.arrowStyle && options.reverse) {
		cxt.moveTo(20,20);
		cxt.lineTo(60,0);
		cxt.lineTo(70,20);
	}else if (!options.arrowStyle && options.reverse) {
		cxt.moveTo(20,20);
		cxt.lineTo(30,0);
		cxt.lineTo(70,20);
	}else if (options.arrowStyle && !options.reverse) {
		cxt.moveTo(20,0);
		cxt.lineTo(60,20);
		cxt.lineTo(70,0);
	}else {
		cxt.moveTo(20,0);
		cxt.lineTo(30,20);
		cxt.lineTo(70,0);
	}
	cxt.fill();
	//显示隐藏
	obj.hover(function(){
		obj.find('.msgShowBG').show();
	},function(){
		obj.find('.msgShowBG').hide();
	}).click(function(){
		obj.find('.msgShowBG').hide();
	});
}