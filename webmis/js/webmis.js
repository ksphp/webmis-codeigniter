/*
* WebMIS 3.2
* Copyright (c) 灵创网络 http://www.ksphp.com/
* Date: 2013-06-28
* 主要用于封装WebMIS前段样式
*/
var $base_url = 'http://www.ksphp.com/';
var $webmis_root = '/webmis/';

$(function(){
	$base_url = $('#base_url').text();  //网址
	
	/*
	** 加载 css,js
	*/
	var include = function (options) {
		var defaults = {files: '', doc: 'body'}
		var options = $.extend(defaults, options);
		var files = options.files;
		for (var i=0; i<files.length; i++) {
			var att = files[i].replace(/^\s|\s$/g, "").split('.');
			var ext = att[att.length - 1].toLowerCase();
			var isCSS = ext == "css";
			var tag = isCSS ? "link" : "script";
			var attr = isCSS ? " type='text/css' rel='stylesheet' " : " language='javascript' type='text/javascript' ";
			var link = (isCSS ? "href" : "src") + "='" + files[i] + "'";
			$(options.doc).append("<" + tag + attr + link + "></" + tag + ">");
		}
	}

	/*
	** 信息提示框
	*/
	//关闭窗口
	var closeWin = function (target) {
		$('#WebMisWin').slideUp('fast');
		$('#WebMisWinBg').remove();
		if(target && target!='false'){
			window.location.href = $base_url+target;
		}
		clearInterval(WebMisInt);
	}
	//打开窗口
	var openWin = function (options) {
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

		//提示框类型
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
	//加载内容
	var loadWin = function (data) {
		$('#WebMisWinCT').html(data);   //加载内容
	}

/*
** WebMis UI插件
*/
	$.fn.webmis = function (effect,options) {
		var $this = this;
		
		/*
		** ******联动菜单******
		** url:数据源
		** data:专递的变量，变量名为：fid
		** getVal:返回的数据值，用表单接收
		** getValType:返回的数据格式，(1)'' 返回选中值 (2)':' 返回字符串，如 ':1:2:3:'
		** type:AJAX提交类型 如、get、post
		** dataType:AJAX返回数据类型
		** num:联动菜单数 默认：3级内
		*/
		var AutoSelect = function (options) {
			var defaults = {url:'',data:'',getVal:'',getValType:'',type:'GET',dataType:'json',num:4}
			var options = $.extend(defaults, options);
			var valArr = new Array();
			var idName = $this.attr('id');
			//获取数据
			var getData=function(num){
				$.ajax({url:options.url,data:{'fid':options.data},type:options.type,dataType:options.dataType,
					success:function(db){
						var html = '<select id="'+idName+'_'+num+'">';
						html += '<option value="">---请选择---</option>';
						for(var i= 0; i < db.length;i++){
							html += '<option value="'+db[i].id+'">'+db[i].title+'</option>';
						}
						html += '</select>';
						$('#'+idName).append(html);
						$('#'+idName+'_'+num).change(function(){
							//清除
							for(var i= 1; i < options.num+1;i++){
								if(i>num){
									$('#'+idName+'_'+i).remove();  //删除当前以后Select
									valArr.splice(i-1,1);          //删除当前以后数组元素
								}
							}
							//追加
							options.data = $(this).val();
							if(options.data){
								if(options.getValType){
									//将字符串写入数组
									valArr[num-1]= options.data+options.getValType;
									//组合字符串
									var chr = options.getValType;
									for(var i= 0; i < valArr.length;i++){
										chr += valArr[i];
									}
									$(options.getVal).val(chr);
								}else{
									$(options.getVal).val(options.data);
								}
								getData(num+1);
							}
						});
					}
				});
			}
			//提交数据
			if(options.url){
				getData(1);
			}
		}
		
		/*
		** ******返回Input选择ID******
		** 1、type: 'one' 返回第一条 ID
		** 2、type:' ' 返回，如' 1 2 3 '
		*/
		var GetInputID = function (options) {
			var defaults = {type:'one'}
			var options = $.extend(defaults, options);
			var id = options.type;
			if(options.type == 'one'){
				id = $this.find('input:checked').val();
			}else{
				$this.find('input:checked').each(function(){
					id += $(this).val()+options.type;
				});
			}
			return id;
		}
		
		/*
		** ******按钮样式******
		*/
		var SubClass = function (options) {
			var defaults = {overClass:'SubClass2',outClass:'SubClass1'}
			var options = $.extend(defaults, options);
			$this.addClass(options.outClass).hover(
				function () { 
					$(this).addClass(options.overClass);
				},
				function () { 
					$(this).removeClass(options.overClass);
				}
			);
		};
		
		/*
		** ******表格隔行换色******
		*/
		var TableOddColor = function (options) {
			var defaults = {oddClass:'TableTrBg1',overClass:'TableTrBg2'}
			var options = $.extend(defaults, options);
			//隔行变色
			$this.children('tr:odd').addClass(options.oddClass);
			//鼠标经过样式变化处
			$this.children('tr').hover(
				function () { 
					$(this).addClass(options.overClass);
				},
				function () { 
					$(this).removeClass(options.overClass);
				}
			);
		}
	
		/*
		** ******调整表格高宽******
		*/
		var TableAdjust = function () {
			//移动
			var moveTableWidht=function(id){
				var _move = false;
				var _x,_w,x,w;
				var __x;
				$(id).unbind().mousedown(function(e){
					_move=true;
					_x=e.pageX;
					_w = $(this).parent().prev().width();
				});
				$(document).mousemove(function(e){
					if(_move){
						__x = e.pageX;
						w = _w+(__x-_x);
						$(id).parent().prev().width(w);
					}
				}).mouseup(function(){
					_move=false;
				});
			}
			//添加
			var i= 1;
			var html = '';
			$this.find('td').each(function(){
				if(i!=1){
					html = '<div id="TableAdjust'+i+'" class="TableAdjust">&nbsp;</div>';
					$(this).prepend(html);
					moveTableWidht('#TableAdjust'+i);
				}
				i++;
			});
		}

		/*
		** ******命名空间******
		*/
		switch (effect){
			case 'AutoSelect':
				AutoSelect(options);
			break;
			case 'GetInputID':
				return GetInputID(options);
			break;
			case 'SubClass':
				SubClass(options);
			break;
			case 'TableOddColor':
				TableOddColor(options);
			break;
			case 'TableAdjust':
				TableAdjust();
			break;
		};
	};
	/*
	** ******命名空间******
	*/
	$.webmis={
		inc: include,
		win: {open: openWin, load: loadWin, close: closeWin},
		test: function () {alert('test');}
	};
	
});

/*
** ******倒计时信息提示******
*/
var WebMisInt,WebMisTime;
function WinInterval(time,target,numID){
	WebMisTime = time;
	WebMisInt = setInterval("WinIntervalFun('"+target+"','"+numID+"')",1000);
}
function WinIntervalFun(target,numID){
	if (WebMisTime == 0) {
		$.webmis.win.close(target);
		clearInterval(WebMisInt);
	}
	$(numID).text(WebMisTime);
	WebMisTime--;
}

/*
** ******移动窗口******
*/
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