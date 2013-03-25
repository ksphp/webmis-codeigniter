/*
* WebMIS 3.0
* Copyright (c) 灵创网络 http://www.ksphp.com/
* Date: 2012-05-18
* 主要用于封装WebMIS前段样式
*/ 
var $base_url = '';
$(function(){
	//网址
	$base_url = $('#base_url').text();
	
/*----------------------------
公共插件
----------------------------*/
	/*
	** ******按钮样式******
	** overClass:'sub02' 鼠标经过样式
	** outClass:'sub01'  鼠标离开样式
	*/    
	$.fn.WMisSub = function(options){
		var defaults = {overClass:'sub02',outClass:'sub01'}
		var options = $.extend(defaults, options);
		this.addClass(options.outClass).hover(
			function () { 
				$(this).addClass(options.overClass);
			},
			function () { 
				$(this).removeClass(options.overClass);
			}
		);
	};
	
/*----------------------------
WebMis
----------------------------*/
	/*
	** ******表格UI******
	** oddClass:'bg1' 隔行颜色
	** overClass:'bg2'  鼠标经过样式
	*/    
	$.fn.WMisTableUI = function(options){
		var defaults = {oddClass:'bg1',overClass:'bg2'}
		var options = $.extend(defaults, options);
		//隔行变色
		this.children('tr:odd').addClass(options.oddClass);
		//鼠标经过样式变化处
		this.children('tr').hover(
			function () { 
				$(this).addClass(options.overClass);
			},
			function () { 
				$(this).removeClass(options.overClass);
			}
		);
	};
	/*
	** ******调整表格宽度******
	*/
	$.fn.WMisMoveTW = function(){
		//移动
		var moveTableWidht=function(id){
			var _move = false;
			var _x,_w,x,w;
			var __x;
			//按下鼠标
			$(id).unbind().mousedown(function(e){
				_move=true;
				_x=e.pageX;
				_w = $(this).parent().prev().width();
			});
			//鼠标移动
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
		this.find('td').each(function(){
			if(i!=1){
				html = '<div id="table_move'+i+'" class="table_list_line">&nbsp;</div>';
				$(this).prepend(html);
				moveTableWidht('#table_move'+i);
			}
			i++;
		});
	};
	/*
	** ******返回选中ID******
	** 1、type:'one'  返回一条
	** 2、type:' '  返回字符串，如' 1 2 3 '
	*/
	$.fn.WMisGetID = function(options){
		var defaults = {type:'one'}
		var options = $.extend(defaults, options);
		var id = options.type;
		if(options.type == 'one'){
			id = $(this).find('input:checked').val();
		}else{
			$(this).find('input:checked').each(function(){
				id += $(this).val()+options.type;
			});
		}
		return id;
	};
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
	$.fn.AutoSelect = function(options){
		var defaults = {url:'',data:'',getVal:'',getValType:'',type:'GET',dataType:'json',num:4}
		var options = $.extend(defaults, options);
		var valArr = new Array();
		var idName = $(this).attr('id');
		//获取数据
		var getData=function(num){
			$.ajax({url:options.url,data:{'fid':options.data},type:options.type,dataType:options.dataType,
				success:function(db){
					var html = '<select id="'+idName+'_'+num+'">';
					html += '<option value="">------请选择------</option>';
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
	};
	
});